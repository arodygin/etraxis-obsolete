<?php

/**
 * @package eTraxis
 * @ignore
 */

//--------------------------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system.
//  Copyright (C) 2005-2009 by Artem Rodygin
//
//  This program is free software; you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation; either version 2 of the License, or
//  (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License along
//  with this program; if not, write to the Free Software Foundation, Inc.,
//  51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
//
//--------------------------------------------------------------------------------------------------
//  Author                  Date            Description of modifications
//--------------------------------------------------------------------------------------------------
//  Artem Rodygin           2005-06-08      new-001: Records tracking web-based system should be implemented.
//  Artem Rodygin           2005-07-04      bug-010: Missing 'require' operators.
//  Artem Rodygin           2005-07-23      new-011: Color scheme should be modified.
//  Artem Rodygin           2005-07-28      new-012: Records field 'description' should be renamed with 'subject'.
//  Artem Rodygin           2005-07-31      new-006: Records search.
//  Artem Rodygin           2005-08-23      new-053: All the calls of DAL API functions should be moved to DBO API.
//  Artem Rodygin           2005-09-01      bug-079: String database columns are not enough to store UTF-8 values.
//  Artem Rodygin           2005-09-07      new-100: 'Date' field type should be implemented.
//  Artem Rodygin           2005-09-27      new-141: Source code review.
//  Artem Rodygin           2005-10-05      new-148: Version info should be centralized.
//  Artem Rodygin           2005-10-09      new-155: Browser header should contain detailed page info.
//  Artem Rodygin           2005-11-08      bug-174: Generated pages should contain <!DOCTYPE> tag.
//  Artem Rodygin           2005-11-17      new-176: Change eTraxis design.
//  Artem Rodygin           2005-11-26      bug-186: Bookmarks in list of changes redirects to record history.
//  Artem Rodygin           2006-03-19      new-175: Implement user roles in permissions.
//  Artem Rodygin           2006-04-21      new-247: The 'responsible' user role should be obliterated.
//  Artem Rodygin           2006-05-27      bug-263: User is able to view history and changes of some record while he is not allowed to view this record.
//  Artem Rodygin           2006-07-27      new-261: UI design should be adopted to slow connection.
//  Artem Rodygin           2006-09-26      new-318: Group permissions should be template-wide.
//  Artem Rodygin           2006-10-08      bug-355: /src/records/changes.php: Global variables $page and $sort were used before they were defined.
//  Artem Rodygin           2006-11-20      new-392: Local users should not be extended with '@eTraxis' when LDAP is disabled.
//  Artem Rodygin           2007-03-26      new-520: Sending email per click on line in record's history.
//  Artem Rodygin           2007-11-27      new-633: The 'dbx' extension should not be used.
//  Artem Rodygin           2007-12-04      new-641: Remove "mailto" link from history & changes.
//  Yury Udovichenko        2007-12-25      new-485: Text formating in comments.
//  Artem Rodygin           2008-01-11      bug-663: Author permissions are ignored.
//  Artem Rodygin           2008-04-20      new-703: Separated permissions set for current responsible.
//  Artem Rodygin           2008-11-10      new-749: Guest access for unauthorized users.
//  Artem Rodygin           2008-11-18      new-762: Forward logged in user to the page he has tried to open before authentication.
//  Artem Rodygin           2009-01-12      bug-784: Logged in user must be forwarded to the page he has tried to open before authentication.
//  Artem Rodygin           2009-06-12      new-824: PHP 4 is discontinued.
//--------------------------------------------------------------------------------------------------

/**#@+
 * Dependency.
 */
require_once('../engine/engine.php');
require_once('../dbo/accounts.php');
require_once('../dbo/fields.php');
require_once('../dbo/values.php');
require_once('../dbo/records.php');
/**#@-*/

init_page(GUEST_IS_ALLOWED);

$id     = ustr2int(try_request('id'));
$record = record_find($id);

if (!$record)
{
    debug_write_log(DEBUG_NOTICE, 'Record cannot be found.');
    header('Location: index.php');
    exit;
}

$permissions = record_get_permissions($record['template_id'], $record['creator_id'], $record['responsible_id']);

if (!can_record_be_displayed($permissions))
{
    if (get_user_level() == USER_LEVEL_GUEST)
    {
        save_cookie(COOKIE_URI, $_SERVER['REQUEST_URI']);
    }

    debug_write_log(DEBUG_NOTICE, 'Record cannot be displayed.');
    header('Location: index.php');
    exit;
}

$sort = $page = NULL;
$list = changes_list($id,
                     $record['creator_id'],
                     is_null($record['responsible_id']) ? 0 : $record['responsible_id'],
                     $sort, $page);

if ($list->rows == 0)
{
    debug_write_log(DEBUG_NOTICE, 'List of changes is empty.');
    header('Location: view.php?id=' . $id);
    exit;
}

$rec_from = $rec_to = 0;

$xml = '<page' . gen_xml_page_header(record_id($id, $record['template_prefix'])) . '>'
     . gen_xml_menu()
     . '<path>'
     . gen_xml_rec_root(try_cookie(COOKIE_SEARCH_MODE, FALSE))
     . '<pathitem url="view.php?id='    . $id . '">' . ustrprocess(get_html_resource(RES_RECORD_X_ID), record_id($id, $record['template_prefix'])) . '</pathitem>'
     . '<pathitem url="changes.php?id=' . $id . '">' . ustrprocess(get_html_resource(RES_CHANGES_ID)) . '</pathitem>'
     . '</path>'
     . '<content>';

if ($list->rows != 0)
{
    $columns = array
    (
        RES_TIMESTAMP_ID,
        RES_ORIGINATOR_ID,
        RES_FIELD_NAME_ID,
        RES_OLD_VALUE_ID,
        RES_NEW_VALUE_ID,
    );

    $widths = array (NULL, NULL, NULL, 50, 50);

    $xml .= '<list>'
          . gen_xml_bookmarks($page, $list->rows, $rec_from, $rec_to, 'changes.php?id=' . $id . '&amp;')
          . '<hrow>';

    for ($i = 1; $i <= count($columns); $i++)
    {
        $width = (is_null($widths[$i - 1]) ? NULL : ' width="' . $widths[$i - 1] . '"');

        if ($i < 4)
        {
            $smode = ($sort == $i ? ($i + count($columns)) : $i);
            $url   = ' url="changes.php?id=' . $id . '&amp;sort=' . $smode . '&amp;page=' . $page . '"';
        }
        else
        {
            $url = NULL;
        }

        $xml .= '<hcell' . $url . $width . '>'
              . get_html_resource($columns[$i - 1])
              . '</hcell>';
    }

    $xml .= '</hrow>';

    $list->seek($rec_from - 1);

    for ($i = $rec_from; $i <= $rec_to; $i++)
    {
        $row = $list->fetch();

        $old_value = value_find($row['field_type'], $row['old_value_id']);
        $new_value = value_find($row['field_type'], $row['new_value_id']);

        if ($row['field_type'] == FIELD_TYPE_CHECKBOX)
        {
            $old_value = get_html_resource($old_value ? RES_YES_ID : RES_NO_ID);
            $new_value = get_html_resource($new_value ? RES_YES_ID : RES_NO_ID);
        }
        elseif ($row['field_type'] == FIELD_TYPE_LIST)
        {
            $old_value = (is_null($old_value) ? NULL : value_find_listvalue($row['field_id'], $old_value));
            $new_value = (is_null($new_value) ? NULL : value_find_listvalue($row['field_id'], $new_value));
        }
        elseif ($row['field_type'] == FIELD_TYPE_RECORD)
        {
            $old_value = (is_null($old_value) ? NULL : 'rec#' . $old_value);
            $new_value = (is_null($new_value) ? NULL : 'rec#' . $new_value);
        }
        elseif ($row['field_type'] == FIELD_TYPE_DATE)
        {
            $old_value = (is_null($old_value) ? NULL : get_date(ustr2date($old_value)));
            $new_value = (is_null($new_value) ? NULL : get_date(ustr2date($new_value)));
        }

        $xml .= '<row>'
              . '<cell align="left">' . get_datetime($row['event_time']) . '</cell>'
              . '<cell url="mailto:' . $row['email'] . '" align="left">' . ustr2html($row['fullname']) . ' (' . ustr2html(account_get_username($row['username'])) . ')</cell>'
              . '<cell align="left">' . (is_null($row['field_name']) ? get_html_resource(RES_SUBJECT_ID) : ustr2html($row['field_name'])) . '</cell>'
              . '<cell align="left" wrap="true">' . (is_null($old_value) ? get_html_resource(RES_NONE_ID) : update_references($old_value)) . '</cell>'
              . '<cell align="left" wrap="true">' . (is_null($new_value) ? get_html_resource(RES_NONE_ID) : update_references($new_value)) . '</cell>'
              . '</row>';
    }

    $xml .= '</list>';
}

$xml .= '<button url="view.php?id=' . $id . '" default="true">' . get_html_resource(RES_BACK_ID) . '</button>'
      . '</content>'
      . '</page>';

echo(xml2html($xml));

?>