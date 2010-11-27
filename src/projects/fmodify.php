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
require_once('../dbo/fields.php');
require_once('../dbo/values.php');
/**#@-*/

init_page();

if (get_user_level() != USER_LEVEL_ADMIN)
{
    debug_write_log(DEBUG_NOTICE, 'User must have admin rights to be allowed.');
    header('Location: index.php');
    exit;
}

// check that requested field exists

$id    = ustr2int(try_request('id'));
$field = field_find($id);

if (!$field)
{
    debug_write_log(DEBUG_NOTICE, 'Field cannot be found.');
    header('Location: index.php');
    exit;
}

if (!$field['is_locked'])
{
    debug_write_log(DEBUG_NOTICE, 'Template must be locked.');
    header('Location: fview.php?id=' . $id);
    exit;
}

// changed field has been submitted

$error  = NO_ERROR;
$fields = field_count($field['state_id']);

if (try_request('submitted') == 'mainform')
{
    debug_write_log(DEBUG_NOTICE, 'Data are submitted.');

    $field_name    = ustrcut($_REQUEST['field_name'], MAX_FIELD_NAME);
    $field_order   = ustr2int($_REQUEST['field_order'], 1, $fields);
    $is_required   = ($field['field_type'] == FIELD_TYPE_CHECKBOX ? FALSE : isset($_REQUEST['is_required']));
    $guest_access  = isset($_REQUEST['guest_access']);
    $add_separator = isset($_REQUEST['add_separator']);
    $description   = ustrcut($_REQUEST['description'], MAX_FIELD_DESCRIPTION);

    switch ($field['field_type'])
    {
        case FIELD_TYPE_NUMBER:

            $param1  = $_REQUEST['min_value'];
            $param2  = $_REQUEST['max_value'];
            $default = $_REQUEST['def_value'];
            $default = (ustrlen($default) == 0 ? NULL : intval($default));
            $error   = field_validate_number($field_name, $param1, $param2, $default);

            break;

        case FIELD_TYPE_STRING:

            $param1 = $_REQUEST['max_length'];
            $param2 = NULL;
            $error  = field_validate_string($field_name, $param1);

            break;

        case FIELD_TYPE_MULTILINED:

            $param1 = $_REQUEST['max_length'];
            $param2 = NULL;
            $error  = field_validate_multilined($field_name, $param1);

            break;

        case FIELD_TYPE_CHECKBOX:

            $param1  = NULL;
            $param2  = NULL;
            $default = ustr2int(try_request('def_value', 1), 0, 1);
            $error   = NO_ERROR;

            break;

        case FIELD_TYPE_LIST:

            $param1  = NULL;
            $param2  = NULL;
            $default = try_request('def_value');
            $default = (ustrlen($default) == 0 ? NULL : ustr2int($default, 1, MAXINT));
            $error   = NO_ERROR;

            break;

        case FIELD_TYPE_RECORD:

            $param1  = NULL;
            $param2  = NULL;
            $default = NULL;
            $error   = NO_ERROR;

            break;

        case FIELD_TYPE_DATE:

            $param1  = ustrcut($_REQUEST['min_value'], ustrlen(MIN_FIELD_DATE));
            $param2  = ustrcut($_REQUEST['max_value'], ustrlen(MIN_FIELD_DATE));
            $default = ustrcut($_REQUEST['def_value'], ustrlen(MIN_FIELD_DATE));
            $default = (ustrlen($default) == 0 ? NULL : $default);
            $error   = field_validate_date($field_name, $param1, $param2, $default);

            break;

        case FIELD_TYPE_DURATION:

            $param1  = ustrcut($_REQUEST['min_value'], ustrlen(time2ustr(MAX_FIELD_DURATION)));
            $param2  = ustrcut($_REQUEST['max_value'], ustrlen(time2ustr(MAX_FIELD_DURATION)));
            $default = ustrcut($_REQUEST['def_value'], ustrlen(time2ustr(MAX_FIELD_DURATION)));
            $default = (ustrlen($default) == 0 ? NULL : $default);
            $error   = field_validate_duration($field_name, $param1, $param2, $default);

            break;

        default: ;  // nop
    }

    if ($error == NO_ERROR)
    {
        $regex_check   = NULL;
        $regex_search  = NULL;
        $regex_replace = NULL;

        $field_param1 = $param1;
        $field_param2 = $param2;

        if ($field['field_type'] == FIELD_TYPE_STRING)
        {
            $regex_check   = ustrcut($_REQUEST['regex_check'],   MAX_FIELD_REGEX);
            $regex_search  = ustrcut($_REQUEST['regex_search'],  MAX_FIELD_REGEX);
            $regex_replace = ustrcut($_REQUEST['regex_replace'], MAX_FIELD_REGEX);
            $default       = ustrcut($_REQUEST['def_value'], $field_param1);
            $default       = (ustrlen($default) == 0 ? NULL : value_find_string($default));
        }
        elseif ($field['field_type'] == FIELD_TYPE_MULTILINED)
        {
            $regex_check   = ustrcut($_REQUEST['regex_check'],   MAX_FIELD_REGEX);
            $regex_search  = ustrcut($_REQUEST['regex_search'],  MAX_FIELD_REGEX);
            $regex_replace = ustrcut($_REQUEST['regex_replace'], MAX_FIELD_REGEX);
            $default       = ustrcut($_REQUEST['def_value'], $field_param1);
            $default       = (ustrlen($default) == 0 ? NULL : value_find_multilined($default));
        }
        elseif ($field['field_type'] == FIELD_TYPE_DATE)
        {
            $default = (is_null($default) ? NULL : ustr2int($default, MIN_FIELD_DATE, MAX_FIELD_DATE));
        }
        elseif ($field['field_type'] == FIELD_TYPE_DURATION)
        {
            $field_param1 = ustr2time($field_param1);
            $field_param2 = ustr2time($field_param2);
            $default      = (is_null($default) ? NULL : ustr2time($default));
        }

        $error = field_modify($id,
                              $field['state_id'],
                              $field_name,
                              $field['field_order'],
                              $field_order,
                              $field['field_type'],
                              $is_required,
                              $add_separator,
                              $guest_access,
                              $description,
                              $regex_check,
                              $regex_search,
                              $regex_replace,
                              $field_param1,
                              $field_param2,
                              $default);

        if ($error == NO_ERROR)
        {
            if ($field['field_type'] == FIELD_TYPE_LIST)
            {
                $list_items = ustrcut($_REQUEST['list_items'], MAX_FIELD_LIST_ITEMS);
                field_create_list_items($field['state_id'], $field_name, $list_items);
            }

            header('Location: fview.php?id=' . $id);
            exit;
        }
    }
}
else
{
    debug_write_log(DEBUG_NOTICE, 'Data are being requested.');

    $field_name    = $field['field_name'];
    $field_order   = $field['field_order'];
    $is_required   = $field['is_required'];
    $add_separator = $field['add_separator'];
    $guest_access  = $field['guest_access'];
    $description   = $field['description'];
    $regex_check   = $field['regex_check'];
    $regex_search  = $field['regex_search'];
    $regex_replace = $field['regex_replace'];
    $param1        = $field['param1'];
    $param2        = $field['param2'];
    $default       = $field['value_id'];

    if ($field['field_type'] == FIELD_TYPE_LIST)
    {
        $list_items = field_pickup_list_items($id);
    }
    elseif ($field['field_type'] == FIELD_TYPE_DURATION)
    {
        $param1 = time2ustr($param1);
        $param2 = time2ustr($param2);
    }

    if (!is_null($default))
    {
        switch ($field['field_type'])
        {
            case FIELD_TYPE_STRING:
            case FIELD_TYPE_MULTILINED:
                $default = value_find($field['field_type'], $default);
                break;

            case FIELD_TYPE_DURATION:
                $default = time2ustr($default);
                break;

            default: ;  // nop
        }
    }
}

// page's title

$title = ustrprocess(get_html_resource(RES_FIELD_X_ID), ustr2html($field['field_name']));

// generate breadcrumbs

$xml = gen_context_menu('sindex.php?id=', 'findex.php?id=', 'fview.php?id=', $field['project_id'], $field['template_id'], $field['state_id'])
     . '<breadcrumbs>'
     . '<breadcrumb url="index.php">' . get_html_resource(RES_PROJECTS_ID) . '</breadcrumb>'
     . '<breadcrumb url="tindex.php?id=' . $field['project_id']  . '">' . ustrprocess(get_html_resource(RES_PROJECT_X_ID),  ustr2html($field['project_name']))  . '</breadcrumb>'
     . '<breadcrumb url="sindex.php?id=' . $field['template_id'] . '">' . ustrprocess(get_html_resource(RES_TEMPLATE_X_ID), ustr2html($field['template_name'])) . '</breadcrumb>'
     . '<breadcrumb url="findex.php?id=' . $field['state_id']    . '">' . ustrprocess(get_html_resource(RES_STATE_X_ID),    ustr2html($field['state_name']))    . '</breadcrumb>'
     . '<breadcrumb url="fview.php?id=' . $id . '">' . $title . '</breadcrumb>'
     . '<breadcrumb url="fmodify.php?id=' . $id . '">' . get_html_resource(RES_MODIFY_ID) . '</breadcrumb>'
     . '</breadcrumbs>';

// generate common controls

$xml .= '<content>'
      . '<form name="mainform" action="fmodify.php?id=' . $id . '">'
      . '<group title="' . get_html_resource(RES_FIELD_INFO_ID) . '">'
      . '<control name="field_name" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
      . '<label>' . get_html_resource(RES_FIELD_NAME_ID) . '</label>'
      . '<editbox maxlen="' . MAX_FIELD_NAME . '">' . ustr2html($field_name) . '</editbox>'
      . '</control>'
      . '<control name="field_order" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
      . '<label>' . get_html_resource(RES_ORDER_ID) . '</label>'
      . '<editbox maxlen="' . ustrlen($fields) . '">' . ustr2html($field_order) . '</editbox>'
      . '</control>';

$notes = '<note>' . get_html_resource(RES_ALERT_REQUIRED_ARE_EMPTY_ID) . '</note>';

// generate controls for 'number' field

if ($field['field_type'] == FIELD_TYPE_NUMBER)
{
    $xml .= '<control name="min_value" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MIN_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . (ustrlen(MAX_FIELD_INTEGER) + 1) . '">'
          . ustr2html($param1)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="max_value" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MAX_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . (ustrlen(MAX_FIELD_INTEGER) + 1) . '">'
          . ustr2html($param2)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="def_value">'
          . '<label>' . get_html_resource(RES_DEFAULT_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . (ustrlen(MAX_FIELD_INTEGER) + 1) . '">'
          . ustr2html($default)
          . '</editbox>'
          . '</control>';

    $notes .= '<note>' . ustrprocess(get_html_resource(RES_ALERT_INTEGER_VALUE_OUT_OF_RANGE_ID), -MAX_FIELD_INTEGER, +MAX_FIELD_INTEGER) . '</note>'
            . '<note>' . get_html_resource(RES_ALERT_MIN_MAX_VALUES_ID) . '</note>';
}

// generate controls for 'string' field

elseif ($field['field_type'] == FIELD_TYPE_STRING)
{
    $xml .= '<control name="max_length" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MAX_LENGTH_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(MAX_FIELD_STRING) . '">'
          . ustr2html($param1)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="def_value">'
          . '<label>' . get_html_resource(RES_DEFAULT_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . MAX_FIELD_STRING . '">'
          . ustr2html($default)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="regex_check">'
          . '<label>' . get_html_resource(RES_REGEX_CHECK_ID) . '</label>'
          . '<editbox maxlen="' . MAX_FIELD_REGEX . '">'
          . ustr2html($regex_check)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="regex_search">'
          . '<label>' . get_html_resource(RES_REGEX_SEARCH_ID) . '</label>'
          . '<editbox maxlen="' . MAX_FIELD_REGEX . '">'
          . ustr2html($regex_search)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="regex_replace">'
          . '<label>' . get_html_resource(RES_REGEX_REPLACE_ID) . '</label>'
          . '<editbox maxlen="' . MAX_FIELD_REGEX . '">'
          . ustr2html($regex_replace)
          . '</editbox>'
          . '</control>';

    $notes .= '<note>' . ustrprocess(get_html_resource(RES_ALERT_INTEGER_VALUE_OUT_OF_RANGE_ID), 1, MAX_FIELD_STRING) . '</note>';
}

// generate controls for 'multilined' field

elseif ($field['field_type'] == FIELD_TYPE_MULTILINED)
{
    $xml .= '<control name="max_length" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MAX_LENGTH_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(MAX_FIELD_MULTILINED) . '">'
          . ustr2html($param1)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="def_value">'
          . '<label>' . get_html_resource(RES_DEFAULT_VALUE_ID) . '</label>'
          . '<textbox rows="' . HTML_TEXTBOX_MIN_HEIGHT . '" resizeable="true" maxlen="' . MAX_FIELD_MULTILINED . '">'
          . ustr2html($default)
          . '</textbox>'
          . '</control>';

    $xml .= '<control name="regex_check">'
          . '<label>' . get_html_resource(RES_REGEX_CHECK_ID) . '</label>'
          . '<editbox maxlen="' . MAX_FIELD_REGEX . '">'
          . ustr2html($regex_check)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="regex_search">'
          . '<label>' . get_html_resource(RES_REGEX_SEARCH_ID) . '</label>'
          . '<editbox maxlen="' . MAX_FIELD_REGEX . '">'
          . ustr2html($regex_search)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="regex_replace">'
          . '<label>' . get_html_resource(RES_REGEX_REPLACE_ID) . '</label>'
          . '<editbox maxlen="' . MAX_FIELD_REGEX . '">'
          . ustr2html($regex_replace)
          . '</editbox>'
          . '</control>';

    $notes .= '<note>' . ustrprocess(get_html_resource(RES_ALERT_INTEGER_VALUE_OUT_OF_RANGE_ID), 1, MAX_FIELD_MULTILINED) . '</note>';
}

// generate controls for 'checkbox' field

elseif ($field['field_type'] == FIELD_TYPE_CHECKBOX)
{
    $xml .= '<control name="def_value">'
          . '<label>' . get_html_resource(RES_DEFAULT_VALUE_ID) . '</label>'
          . '<radio value="1"' . ($default != 0 ? ' checked="true">' : '>') . get_html_resource(RES_ON_ID)  . '</radio>'
          . '<radio value="0"' . ($default == 0 ? ' checked="true">' : '>') . get_html_resource(RES_OFF_ID) . '</radio>'
          . '</control>';
}

// generate controls for 'list' field

elseif ($field['field_type'] == FIELD_TYPE_LIST)
{
    $xml .= '<control name="list_items" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_LIST_ITEMS_ID) . '</label>'
          . '<textbox rows="' . HTML_TEXTBOX_MIN_HEIGHT . '" resizeable="true" maxlen="' . MAX_FIELD_LIST_ITEMS . '">'
          . ustr2html($list_items)
          . '</textbox>'
          . '</control>';

    $xml .= '<control name="def_value">'
          . '<label>' . get_html_resource(RES_DEFAULT_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(MAXINT) . '">'
          . ustr2html($default)
          . '</editbox>'
          . '</control>';
}

// generate controls for 'date' field

elseif ($field['field_type'] == FIELD_TYPE_DATE)
{
    $xml .= '<control name="min_value" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MIN_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(MAX_FIELD_DATE) . '">'
          . ustr2html($param1)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="max_value" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MAX_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(MAX_FIELD_DATE) . '">'
          . ustr2html($param2)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="def_value">'
          . '<label>' . get_html_resource(RES_DEFAULT_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(MAX_FIELD_DATE) . '">'
          . ustr2html($default)
          . '</editbox>'
          . '</control>';

    $notes .= '<note>' . ustrprocess(get_html_resource(RES_ALERT_DATE_VALUE_OUT_OF_RANGE_ID),    MIN_FIELD_DATE, MAX_FIELD_DATE) . '</note>'
            . '<note>' . ustrprocess(get_html_resource(RES_ALERT_DEFAULT_VALUE_OUT_OF_RANGE_ID), MIN_FIELD_DATE, MAX_FIELD_DATE) . '</note>'
            . '<note>' . get_html_resource(RES_ALERT_MIN_MAX_VALUES_ID) . '</note>';
}

// generate controls for 'duration' field

elseif ($field['field_type'] == FIELD_TYPE_DURATION)
{
    $xml .= '<control name="min_value" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MIN_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(time2ustr(MAX_FIELD_DURATION)) . '">'
          . ustr2html($param1)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="max_value" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
          . '<label>' . get_html_resource(RES_MAX_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(time2ustr(MAX_FIELD_DURATION)) . '">'
          . ustr2html($param2)
          . '</editbox>'
          . '</control>';

    $xml .= '<control name="def_value">'
          . '<label>' . get_html_resource(RES_DEFAULT_VALUE_ID) . '</label>'
          . '<editbox maxlen="' . ustrlen(time2ustr(MAX_FIELD_DURATION)) . '">'
          . ustr2html($default)
          . '</editbox>'
          . '</control>';

    $notes .= '<note>' . ustrprocess(get_html_resource(RES_ALERT_TIME_VALUE_OUT_OF_RANGE_ID), time2ustr(MIN_FIELD_DURATION), time2ustr(MAX_FIELD_DURATION)) . '</note>'
            . '<note>' . get_html_resource(RES_ALERT_MIN_MAX_VALUES_ID) . '</note>';
}

// generate common controls

$xml .= '<control name="description">'
      . '<label>' . get_html_resource(RES_DESCRIPTION_ID) . '</label>'
      . '<textbox rows="' . HTML_TEXTBOX_MIN_HEIGHT . '" resizeable="true" maxlen="' . MAX_FIELD_DESCRIPTION . '">'
      . ustr2html($description)
      . '</textbox>'
      . '</control>';

if ($field['field_type'] != FIELD_TYPE_CHECKBOX)
{
    $xml .= '<control name="is_required">'
          . '<label/>'
          . ($is_required
                ? '<checkbox checked="true">'
                : '<checkbox>')
          . ustrtolower(get_html_resource(RES_REQUIRED2_ID))
          . '</checkbox>'
          . '</control>';
}

$xml .= '<control name="guest_access">'
      . '<label/>'
      . ($guest_access
            ? '<checkbox checked="true">'
            : '<checkbox>')
      . ustrtolower(get_html_resource(RES_GUEST_ACCESS_ID))
      . '</checkbox>'
      . '</control>';

$xml .= '<control name="add_separator">'
      . '<label/>'
      . ($add_separator
            ? '<checkbox checked="true">'
            : '<checkbox>')
      . ustrtolower(get_html_resource(RES_ADD_SEPARATOR_ID))
      . '</checkbox>'
      . '</control>';

// generate buttons

$xml .= '</group>'
      . '<button default="true">' . get_html_resource(RES_OK_ID) . '</button>'
      . '<button url="fview.php?id=' . $id . '">' . get_html_resource(RES_CANCEL_ID) . '</button>'
      . $notes
      . '</form>'
      . '</content>';

// if some error was specified to display, force an alert

switch ($error)
{
    case ERROR_INCOMPLETE_FORM:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . get_html_resource(RES_ALERT_REQUIRED_ARE_EMPTY_ID) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_ALREADY_EXISTS:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . get_html_resource(RES_ALERT_FIELD_ALREADY_EXISTS_ID) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_INVALID_INTEGER_VALUE:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . get_html_resource(RES_ALERT_INVALID_INTEGER_VALUE_ID) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_INTEGER_VALUE_OUT_OF_RANGE:

        if ($field['field_type'] == FIELD_TYPE_NUMBER)
        {
            $xml .= '<scriptonreadyitem>'
                  . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . ustrprocess(get_html_resource(RES_ALERT_INTEGER_VALUE_OUT_OF_RANGE_ID), -MAX_FIELD_INTEGER, +MAX_FIELD_INTEGER) . '","' . get_html_resource(RES_OK_ID) . '");'
                  . '</scriptonreadyitem>';
        }
        elseif ($field['field_type'] == FIELD_TYPE_STRING)
        {
            $xml .= '<scriptonreadyitem>'
                  . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . ustrprocess(get_html_resource(RES_ALERT_INTEGER_VALUE_OUT_OF_RANGE_ID), 1, MAX_FIELD_STRING) . '","' . get_html_resource(RES_OK_ID) . '");'
                  . '</scriptonreadyitem>';
        }
        elseif ($field['field_type'] == FIELD_TYPE_MULTILINED)
        {
            $xml .= '<scriptonreadyitem>'
                  . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . ustrprocess(get_html_resource(RES_ALERT_INTEGER_VALUE_OUT_OF_RANGE_ID), 1, MAX_FIELD_MULTILINED) . '","' . get_html_resource(RES_OK_ID) . '");'
                  . '</scriptonreadyitem>';
        }

        break;

    case ERROR_MIN_MAX_VALUES:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . get_html_resource(RES_ALERT_MIN_MAX_VALUES_ID) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_INVALID_DATE_VALUE:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . get_html_resource(RES_ALERT_INVALID_DATE_VALUE_ID) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_DATE_VALUE_OUT_OF_RANGE:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . ustrprocess(get_html_resource(RES_ALERT_DATE_VALUE_OUT_OF_RANGE_ID), MIN_FIELD_DATE, MAX_FIELD_DATE) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_INVALID_TIME_VALUE:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . get_html_resource(RES_ALERT_INVALID_TIME_VALUE_ID) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_TIME_VALUE_OUT_OF_RANGE:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . ustrprocess(get_html_resource(RES_ALERT_TIME_VALUE_OUT_OF_RANGE_ID), time2ustr(MIN_FIELD_DURATION), time2ustr(MAX_FIELD_DURATION)) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    case ERROR_DEFAULT_VALUE_OUT_OF_RANGE:
        $xml .= '<scriptonreadyitem>'
              . 'jqAlert("' . get_html_resource(RES_ERROR_ID) . '","' . ustrprocess(get_html_resource(RES_ALERT_DEFAULT_VALUE_OUT_OF_RANGE_ID), $param1, $param2) . '","' . get_html_resource(RES_OK_ID) . '");'
              . '</scriptonreadyitem>';
        break;

    default: ;  // nop
}

echo(xml2html($xml, $title));

?>
