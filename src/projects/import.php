<?php

//------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system
//  Copyright (C) 2008-2010  Artem Rodygin
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
require_once('../dbo/templates.php');
/**#@-*/

init_page();

if (get_user_level() != USER_LEVEL_ADMIN)
{
    debug_write_log(DEBUG_NOTICE, 'User must have admin rights to be allowed.');
    header('Location: index.php');
    exit;
}

// XML file is submitted

if (try_request('submitted') == 'mainform')
{
    debug_write_log(DEBUG_NOTICE, 'Data are submitted.');

    $id = NULL;

    $error = isset($_FILES['xmlfile'])
           ? template_import($_FILES['xmlfile'], $id)
           : ERROR_UPLOAD_NO_FILE;

    if ($error == NO_ERROR)
    {
        header('Location: tview.php?id='. $id);
        exit;
    }
}
else
{
    debug_write_log(DEBUG_NOTICE, 'Data are being requested.');

    $error = NO_ERROR;
}

// generate page

$xml = '<breadcrumbs>'
     . '<breadcrumb url="index.php">' . get_html_resource(RES_PROJECTS_ID) . '</breadcrumb>'
     . '</breadcrumbs>'
     . '<tabs>'
     . '<tab url="index.php">'                . get_html_resource(RES_PROJECTS_ID) . '</tab>'
     . '<tab url="create.php">'               . get_html_resource(RES_CREATE_ID)   . '</tab>'
     . '<tab url="import.php" active="true">' . get_html_resource(RES_IMPORT_ID)   . '</tab>'
     . '<content>'
     . '<form name="mainform" action="import.php" upload="' . (ATTACHMENTS_MAXSIZE * 1024) . '">'
     . '<group>'
     . '<control name="xmlfile" required="' . get_html_resource(RES_REQUIRED3_ID) . '">'
     . '<label>' . get_html_resource(RES_TEMPLATE_ID) . '</label>'
     . '<filebox/>'
     . '</control>'
     . '</group>'
     . '<button default="true">' . get_html_resource(RES_OK_ID) . '</button>'
     . '<note>' . get_html_resource(RES_ALERT_REQUIRED_ARE_EMPTY_ID) . '</note>'
     . '<note>' . ustrprocess(get_html_resource(RES_ALERT_UPLOAD_FORM_SIZE_ID), ATTACHMENTS_MAXSIZE) . '</note>'
     . '</form>';

// if some error was specified to display, force an alert

switch ($error)
{
    case ERROR_UPLOAD_INI_SIZE:
        $xml .= '<script>alert("' . get_js_resource(RES_ALERT_UPLOAD_INI_SIZE_ID) . '");</script>';
        break;

    case ERROR_UPLOAD_FORM_SIZE:
        $xml .= '<script>alert("' . ustrprocess(get_js_resource(RES_ALERT_UPLOAD_FORM_SIZE_ID), ATTACHMENTS_MAXSIZE) . '");</script>';
        break;

    case ERROR_UPLOAD_PARTIAL:
        $xml .= '<script>alert("' . get_js_resource(RES_ALERT_UPLOAD_PARTIAL_ID) . '");</script>';
        break;

    case ERROR_UPLOAD_NO_FILE:
        $xml .= '<script>alert("' . get_js_resource(RES_ALERT_UPLOAD_NO_FILE_ID) . '");</script>';
        break;

    case ERROR_UPLOAD_NO_TMP_DIR:
        $xml .= '<script>alert("' . get_js_resource(RES_ALERT_UPLOAD_NO_TMP_DIR_ID) . '");</script>';
        break;

    case ERROR_UPLOAD_CANT_WRITE:
        $xml .= '<script>alert("' . get_js_resource(RES_ALERT_UPLOAD_CANT_WRITE_ID) . '");</script>';
        break;

    case ERROR_UPLOAD_EXTENSION:
        $xml .= '<script>alert("' . get_js_resource(RES_ALERT_UPLOAD_EXTENSION_ID) . '");</script>';
        break;

    case ERROR_DATE_VALUE_OUT_OF_RANGE:
    case ERROR_DEFAULT_VALUE_OUT_OF_RANGE:
    case ERROR_INCOMPLETE_FORM:
    case ERROR_INTEGER_VALUE_OUT_OF_RANGE:
    case ERROR_INVALID_DATE_VALUE:
    case ERROR_INVALID_EMAIL:
    case ERROR_INVALID_INTEGER_VALUE:
    case ERROR_INVALID_TIME_VALUE:
    case ERROR_INVALID_USERNAME:
    case ERROR_MIN_MAX_VALUES:
    case ERROR_NOT_FOUND:
    case ERROR_TIME_VALUE_OUT_OF_RANGE:
    case ERROR_UNKNOWN:
    case ERROR_XML_PARSER:
        $xml .= '<script>alert("' . get_js_resource(RES_ALERT_XML_PARSER_ERROR_ID) . '");</script>';
        break;

    default: ;  // nop
}

$xml .= '</content>'
      . '</tabs>';

echo(xml2html($xml, get_html_resource(RES_IMPORT_ID)));

?>
