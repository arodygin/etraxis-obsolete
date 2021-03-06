<?php

//------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system
//  Copyright (C) 2005-2010  Artem Rodygin
//
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
//------------------------------------------------------------------------------

/**
 * @package eTraxis
 * @ignore
 */

/**#@+
 * Dependency.
 */
require_once('../engine/engine.php');
require_once('../dbo/projects.php');
require_once('../dbo/states.php');
require_once('../dbo/fields.php');
/**#@-*/

global $field_type_res;

init_page(LOAD_TAB);

if (get_user_level() != USER_LEVEL_ADMIN)
{
    debug_write_log(DEBUG_NOTICE, 'User must have admin rights to be allowed.');
    exit;
}

// check that requested state exists

$id    = ustr2int(try_request('id'));
$state = state_find($id);

if (!$state)
{
    debug_write_log(DEBUG_NOTICE, 'State cannot be found.');
    exit;
}

// local JS functions

$resTitle1 = ustrprocess(get_js_resource(RES_NEW_FIELD_ID), 1, 2);
$resTitle2 = ustrprocess(get_js_resource(RES_NEW_FIELD_ID), 2, 2);
$resOK     = get_js_resource(RES_OK_ID);
$resNext   = get_js_resource(RES_NEXT_ID);
$resCancel = get_js_resource(RES_CANCEL_ID);

$xml = <<<JQUERY
<script>

function fieldCreateStep1 ()
{
    jqModal("{$resTitle1}", "fcreate.php?id={$id}", "{$resNext}", "{$resCancel}", "fieldCreateStep2()");
}

function fieldCreateStep2 ()
{
    closeModal();

    jqModal("{$resTitle2}", "fcreate.php?id={$id}&amp;" + $("#mainform").serialize(), "{$resOK}", "{$resCancel}", "$('#modaldlg form').submit()");
}

</script>
JQUERY;

// get list of fields

$sort = $page = NULL;
$list = fields_list($id, $sort, $page);

$from = $to = 0;

// generate buttons

$xml .= ($state['is_locked']
            ? '<button action="fieldCreateStep1()">'
            : '<button disabled="true">')
     . get_html_resource(RES_CREATE_ID)
     . '</button>';

// generate list of fields

if ($list->rows != 0)
{
    $columns = array
    (
        RES_ORDER_ID,
        RES_FIELD_NAME_ID,
        RES_FIELD_TYPE_ID,
        RES_REQUIRED_ID,
        RES_GUEST_ACCESS_ID,
    );

    $bookmarks = gen_xml_bookmarks($page, $list->rows, $from, $to, 'findex.php?id=' . $id . '&amp;');

    $xml .= '<list>'
          . '<hrow>';

    for ($i = 1; $i <= count($columns); $i++)
    {
        $smode = ($sort == $i ? ($i + count($columns)) : $i);

        $xml .= "<hcell url=\"findex.php?id={$id}&amp;sort={$smode}\">"
              . get_html_resource($columns[$i - 1])
              . '</hcell>';
    }

    $xml .= '</hrow>';

    $list->seek($from - 1);

    for ($i = $from; $i <= $to; $i++)
    {
        $row = $list->fetch();

        $xml .= "<row url=\"fview.php?id={$row['field_id']}\">"
              . '<cell>' . ustr2html($row['field_order']) . '</cell>'
              . '<cell>' . ustr2html($row['field_name'])  . '</cell>'
              . '<cell>' . get_html_resource($field_type_res[$row['field_type']]) . '</cell>'
              . '<cell>' . get_html_resource($row['is_required']  ? RES_YES_ID : RES_NO_ID) . '</cell>'
              . '<cell>' . get_html_resource($row['guest_access'] ? RES_YES_ID : RES_NO_ID) . '</cell>'
              . '</row>';
    }

    $xml .= '</list>'
          . $bookmarks;
}

echo(xml2html($xml));

?>
