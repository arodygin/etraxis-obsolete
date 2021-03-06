<?php

//------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system
//  Copyright (C) 2005-2011  Artem Rodygin
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
require_once('../dbo/fields.php');
require_once('../dbo/records.php');
require_once('../dbo/views.php');
/**#@-*/

global $column_type_align;
global $column_type_res;

init_page(LOAD_TAB, GUEST_IS_ALLOWED);

// process search mode, if one is specified

if (isset($_REQUEST['search']))
{
    debug_write_log(DEBUG_NOTICE, 'REQUEST["search"] is set.');

    $search_text = ustrcut($_REQUEST['search'], MAX_SEARCH_TEXT);

    if (ustrlen($search_text) == 0)
    {
        $_SESSION[VAR_SEARCH_MODE] = FALSE;
    }
    else
    {
        $_SESSION[VAR_SEARCH_MODE] = TRUE;
        $_SESSION[VAR_SEARCH_TEXT] = $search_text;
    }
}

$tab = $_SESSION[VAR_SEARCH_MODE] ? 2 : 1;  // ID of this tab

if (isset($_REQUEST['use_filters']))
{
    $_SESSION[VAR_USE_FILTERS] = (bool) $_REQUEST['use_filters'];
}

// records list is submitted

if (try_request('submitted') == 'read')
{
    foreach ($_REQUEST as $request)
    {
        if (substr($request, 0, 3) == 'rec')
        {
            record_read(intval(substr($request, 3)));
        }
    }

    exit;
}
elseif (try_request('submitted') == 'unread')
{
    foreach ($_REQUEST as $request)
    {
        if (substr($request, 0, 3) == 'rec')
        {
            record_unread(intval(substr($request, 3)));
        }
    }

    exit;
}

// get list of records

$columns = columns_list();

$sort = $page = NULL;
$list = records_list($columns, $sort, $page, $_SESSION[VAR_SEARCH_MODE], $_SESSION[VAR_SEARCH_TEXT]);

$rec_from = $rec_to = 0;

// local JS functions
$resTitle  = get_js_resource(RES_NEW_RECORD_ID);
$resOK     = get_js_resource(RES_OK_ID);
$resNext   = get_js_resource(RES_NEXT_ID);
$resCancel = get_js_resource(RES_CANCEL_ID);

$resSearch = $_SESSION[VAR_SEARCH_MODE]
           ? ustr2html($_SESSION[VAR_SEARCH_TEXT])
           : get_html_resource(RES_SEARCH_ID);

$xml = <<<JQUERY
<onready>

$("#view{$tab}").combobox();

$("#view{$tab}").change(function() {
    var id = $("#view{$tab}").val();

    $.post("setview.php?id=" + id, function() {
        reloadTab();
    });
});

$(".search").val("{$resSearch}");

</onready>
JQUERY;

if ($_SESSION[VAR_AUTO_REFRESH] != 0)
{
    $xml .= sprintf('<onready>' .
                    'setTimeout("reloadTab()", %d);' .
                    '</onready>',
                    $_SESSION[VAR_AUTO_REFRESH] * MSECS_IN_MINUTE);
}

$xml .= <<<JQUERY
<script>

function recordCreateForceToStep2 ()
{
    var items = $("#projectform #project").children().length;

    if (items == 1)
    {
        recordCreateStep2();
    }
}

function recordCreateForceToStep3 ()
{
    var items = $("#templateform #template").children().length;

    if (items == 1)
    {
        recordCreateStep3();
    }
}

function recordCreateStep1 ()
{
    jqModal("{$resTitle}", "create.php", "{$resNext}", "{$resCancel}", "recordCreateStep2()", null, "recordCreateForceToStep2()");
}

function recordCreateStep2 ()
{
    closeModal();
    jqModal("{$resTitle}", "create.php?" + $("#projectform").serialize(), "{$resNext}", "{$resCancel}", "recordCreateStep3()", null, "recordCreateForceToStep3()");
}

function recordCreateStep3 ()
{
    closeModal();
    jqModal("{$resTitle}", "create.php?" + $("#templateform").serialize(), "{$resOK}", "{$resCancel}", "$('#mainform').submit()");
}

function markAs (mark)
{
    $("#records{$tab} :input[name=submitted]").val(mark);
    $("#records{$tab}").submit();
}

</script>
JQUERY;

// generate buttons

if (get_user_level() != USER_LEVEL_GUEST)
{
    if (can_record_be_created())
    {
        $xml .= '<button action="recordCreateStep1()">' . get_html_resource(RES_CREATE_ID) . '</button>';
    }
}

if ($list->rows != 0)
{
    if (get_user_level() != USER_LEVEL_GUEST)
    {
        $xml .= '<buttonset>'
              . '<button action="markAs(\'read\')">'   . get_html_resource(RES_MARK_AS_READ_ID)   . '</button>'
              . '<button action="markAs(\'unread\')">' . get_html_resource(RES_MARK_AS_UNREAD_ID) . '</button>'
              . '</buttonset>';
    }

    $xml .= '<button url="export.php">' . get_html_resource(RES_EXPORT_ID) . '</button>';
}

if ($_SESSION[VAR_SEARCH_MODE] && get_user_level() != USER_LEVEL_GUEST)
{
    $xml .= '<button action="reloadTab(\'list.php?search=' . urlencode($_SESSION[VAR_SEARCH_TEXT]) . '&amp;use_filters=' . (!$_SESSION[VAR_USE_FILTERS]) . '\')">'
          . get_html_resource($_SESSION[VAR_USE_FILTERS] ? RES_DISABLE_FILTERS_ID : RES_ENABLE_FILTERS_ID)
          . '</button>';
}

// generate list of available views

if (get_user_level() != USER_LEVEL_GUEST)
{
    $xml .= '<dropdown name="view' . $tab . '">'
          . '<listitem value="0">' . get_html_resource(RES_NO_VIEW_ID) . '</listitem>';

    $views = dal_query('views/list.sql', $_SESSION[VAR_USERID], 'view_name');

    while (($view = $views->fetch()))
    {
        $xml .= ($view['view_id'] ==  $_SESSION[VAR_VIEW]
                    ? '<listitem value="' . $view['view_id'] . '" selected="true">'
                    : '<listitem value="' . $view['view_id'] . '">')
              . ustr2html($view['view_name'])
              . '</listitem>';
    }

    $xml .= '</dropdown>';
}

// generate list of records

if ($list->rows != 0)
{
    $bookmarks = gen_xml_bookmarks($page, $list->rows, $rec_from, $rec_to, 'list.php?');

    $xml .= '<form name="records' . $tab . '" action="list.php" success="reloadTab">'
          . '<list>'
          . '<hrow>'
          . '<hcell checkboxes="true"/>';

    foreach ($columns as $i => $column)
    {
        $smode = (abs($sort) == ($i + 1) ? -$sort : $i + 1);

        $xml .= "<hcell url=\"list.php?sort={$smode}\">";

        if ($column['column_type'] >= COLUMN_TYPE_MINIMUM &&
            $column['column_type'] <= COLUMN_TYPE_MAXIMUM)
        {
            $xml .= get_html_resource($column_type_res[$column['column_type']]);
        }
        else
        {
            $xml .= ustr2html($column['field_name']);
        }

        $xml .= '</hcell>';
    }

    $xml .= '</hrow>';

    $mark_as_read = (isset($_REQUEST['read']) && $_REQUEST['read'] == 1);
    $read_time    = time();

    $list->seek($rec_from - 1);

    for ($i = $rec_from; $i <= $rec_to; $i++)
    {
        $row = $list->fetch();

        if ($mark_as_read && get_user_level() != USER_LEVEL_GUEST)
        {
            dal_query('records/unread.sql', $row['record_id'], $_SESSION[VAR_USERID]);
            dal_query('records/read.sql',   $row['record_id'], $_SESSION[VAR_USERID], $read_time);

            $row['read_time'] = $read_time;
        }

        if (is_record_closed($row))
        {
            $color = 'grey';
        }
        elseif (is_record_postponed($row))
        {
            $color = 'blue';
        }
        elseif (is_record_critical($row))
        {
            $color = 'red';
        }
        else
        {
            $color = NULL;
        }

        $bold = ((get_user_level() == USER_LEVEL_GUEST) || ($row['read_time'] >= $row['change_time'])
                ? 'false'
                : 'true');

        $xml .= "<row name=\"rec{$row['record_id']}\" url=\"view.php?id={$row['record_id']}\" color=\"{$color}\">";

        foreach ($columns as $column)
        {
            $value  = NULL;
            $nowrap = 'false';
            $align  = 'left';

            switch ($column['column_type'])
            {
                case COLUMN_TYPE_ID:
                    $value  = record_id($row['record_id'], $row['template_prefix']);
                    $nowrap = 'true';
                    break;

                case COLUMN_TYPE_STATE_ABBR:
                    $value = ustr2html($row['state_abbr']);
                    break;

                case COLUMN_TYPE_PROJECT:
                    $value = ustr2html($row['project_name']);
                    break;

                case COLUMN_TYPE_SUBJECT:
                    $value = update_references($row['subject'], BBCODE_SEARCH_ONLY);
                    break;

                case COLUMN_TYPE_AUTHOR:
                    $value = ustr2html($row['author_fullname']);
                    break;

                case COLUMN_TYPE_RESPONSIBLE:
                    $value = ustr2html($row['responsible_fullname']);

                    if (is_null($value))
                    {
                        $value = '<i>' . get_html_resource(RES_NONE_ID) . '</i>';
                    }

                    break;

                case COLUMN_TYPE_LAST_EVENT:
                    $value = get_record_last_event($row);
                    $align = 'right';
                    break;

                case COLUMN_TYPE_AGE:
                    $value = get_record_age($row);
                    $align = 'right';
                    break;

                case COLUMN_TYPE_CREATION_DATE:
                    $value = get_date($row['creation_time']);
                    break;

                case COLUMN_TYPE_TEMPLATE:
                    $value = ustr2html($row['template_name']);
                    break;

                case COLUMN_TYPE_STATE_NAME:
                    $value = ustr2html($row['state_name']);
                    break;

                case COLUMN_TYPE_LAST_STATE:
                    $value = get_record_last_state($row);
                    $align = 'right';
                    break;

                case COLUMN_TYPE_NUMBER:
                case COLUMN_TYPE_FLOAT:
                    $value = $row['value' . $column['column_id']];
                    $align = 'right';
                    break;

                case COLUMN_TYPE_STRING:
                    $value = update_references($row['value' . $column['column_id']], BBCODE_SEARCH_ONLY);
                    break;

                case COLUMN_TYPE_MULTILINED:
                    $value = $row['value' . $column['column_id']];

                    if (ustrlen($value) > MAX_FIELD_STRING + 3)
                    {
                        $value = usubstr($value, 0, MAX_FIELD_STRING) . '...';
                    }

                    $value = update_references($value, BBCODE_SEARCH_ONLY);
                    break;

                case COLUMN_TYPE_CHECKBOX:

                    if (!is_null($row['value' . $column['column_id']]))
                    {
                        $value = get_html_resource($row['value' . $column['column_id']] == 0 ? RES_NO_ID : RES_YES_ID);
                    }

                    break;

                case COLUMN_TYPE_LIST_NUMBER:
                    $value = $row['value' . $column['column_id']];
                    $align = 'center';
                    break;

                case COLUMN_TYPE_LIST_STRING:
                    $value = update_references($row['value' . $column['column_id']], BBCODE_SEARCH_ONLY);
                    break;

                case COLUMN_TYPE_RECORD:

                    if (!is_null($row['value' . $column['column_id']]))
                    {
                        $value = record_id($row['value' . $column['column_id']]);
                    }

                    break;

                case COLUMN_TYPE_DATE:

                    if (!is_null($row['value' . $column['column_id']]))
                    {
                        $value = get_date($row['value' . $column['column_id']]);
                    }

                    break;

                case COLUMN_TYPE_DURATION:

                    if (!is_null($row['value' . $column['column_id']]))
                    {
                        $value = time2ustr($row['value' . $column['column_id']]);
                    }

                    $align = 'right';
                    break;

                default:
                    debug_write_log(DEBUG_WARNING, 'Unknown column type.');
            }

            $xml .= "<cell align=\"{$align}\" bold=\"{$bold}\" nowrap=\"{$nowrap}\">{$value}</cell>";
        }

        $xml .= '</row>';
    }

    $xml .= '</list>'
          . '</form>'
          . $bookmarks;
}

echo(xml2html($xml));

?>
