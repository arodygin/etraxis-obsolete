<?php

/**
 * Groups
 *
 * This module provides API to work with eTraxis groups.
 * See also {@link http://www.etraxis.org/docs-schema.php#tbl_groups tbl_groups} database table.
 *
 * @package DBO
 * @subpackage Groups
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
//  Artem Rodygin           2005-02-26      new-001: Records tracking web-based system should be implemented.
//  Artem Rodygin           2005-08-23      new-053: All the calls of DAL API functions should be moved to DBO API.
//  Artem Rodygin           2005-08-25      new-058: Global groups should be implemented.
//  Artem Rodygin           2005-08-29      bug-069: PHP Warning: odbc_exec(): SQL error: Violation of PRIMARY KEY constraint 'pk_membership'.
//  Artem Rodygin           2005-09-01      bug-079: String database columns are not enough to store UTF-8 values.
//  Artem Rodygin           2005-09-27      new-141: Source code review.
//  Artem Rodygin           2005-10-22      bug-163: Some filters are malfunctional.
//  Artem Rodygin           2006-04-21      bug-238: PHP Warning: odbc_exec(): SQL error: Violation of UNIQUE KEY constraint 'ix_groups'.
//  Artem Rodygin           2006-04-21      bug-239: Unexpected message "Group with entered name already exists".
//  Artem Rodygin           2006-06-25      new-222: Email reminders.
//  Artem Rodygin           2006-09-26      new-318: Group permissions should be template-wide.
//  Artem Rodygin           2006-10-08      bug-333: /src/dbo/groups.php: Unused function argument: $link.
//  Artem Rodygin           2007-01-05      new-491: [SF1647212] Group-wide transition permission.
//  Daniel Jungbluth        2007-10-08      new-594: [SF1809444] Assigning users to groups via listbox
//  Artem Rodygin           2007-11-27      new-633: The 'dbx' extension should not be used.
//  Artem Rodygin           2008-03-10      new-683: Filters should be sharable with groups, not with accounts.
//  Artem Rodygin           2008-10-12      new-751: LDAP // Multiple Base DN support.
//  Artem Rodygin           2009-06-12      new-824: PHP 4 is discontinued.
//  Artem Rodygin           2009-06-17      bug-825: Database gets empty strings instead of NULL values.
//  Artem Rodygin           2009-09-09      new-826: Native unicode support for Microsoft SQL Server.
//--------------------------------------------------------------------------------------------------

/**#@+
 * Dependency.
 */
require_once('../engine/engine.php');
/**#@-*/

//--------------------------------------------------------------------------------------------------
//  Definitions.
//--------------------------------------------------------------------------------------------------

/**#@+
 * Data restriction.
 */
define('MAX_GROUP_NAME',        25);
define('MAX_GROUP_DESCRIPTION', 100);
/**#@-*/

//--------------------------------------------------------------------------------------------------
//  Functions.
//--------------------------------------------------------------------------------------------------

/**
 * Finds in database and returns the information about specified group.
 *
 * @param int $id {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id Group ID}.
 * @return array Array with data if group is found in database, FALSE otherwise.
 */
function group_find ($id)
{
    debug_write_log(DEBUG_TRACE, '[group_find]');
    debug_write_log(DEBUG_DUMP,  '[group_find] $id = ' . $id);

    $rs = dal_query('groups/fndid.sql', $id);

    if ($rs->rows == 0)
    {
        return FALSE;
    }

    $row = $rs->fetch();
    $row['is_global'] = is_null($row['project_id']);

    return $row;
}

/**
 * Returns {@link CRecordset DAL recordset} which contains all existing global groups and all the local
 * groups of specified project, sorted in accordance with current sort mode.
 *
 * @param int $id {@link http://www.etraxis.org/docs-schema.php#tbl_projects_project_id Project ID}.
 * @param int &$sort Sort mode (used as output only). The function retrieves current sort mode from
 * client cookie ({@link COOKIE_GROUPS_SORT}) and updates it, if it's out of valid range.
 * @param int &$page Number of current page tab (used as output only). The function retrieves current
 * page from client cookie ({@link COOKIE_GROUPS_PAGE}) and updates it, if it's out of valid range.
 * @return CRecordset Recordset with list of groups.
 */
function group_list ($id, &$sort, &$page)
{
    debug_write_log(DEBUG_TRACE, '[group_list]');
    debug_write_log(DEBUG_DUMP,  '[group_list] $id = ' . $id);

    $sort_modes = array
    (
        1 => 'group_name asc, project_id asc',
        2 => 'description asc, group_name asc, project_id asc',
        3 => 'group_name desc, project_id desc',
        4 => 'description desc, group_name desc, project_id desc',
    );

    $sort = try_request('sort', try_cookie(COOKIE_GROUPS_SORT));
    $sort = ustr2int($sort, 1, count($sort_modes));

    $page = try_request('page', try_cookie(COOKIE_GROUPS_PAGE));
    $page = ustr2int($page, 1, MAXINT);

    save_cookie(COOKIE_GROUPS_SORT, $sort);
    save_cookie(COOKIE_GROUPS_PAGE, $page);

    return dal_query('groups/list.sql', $id, $sort_modes[$sort]);
}

/**
 * Returns {@link CRecordset DAL recordset} which contains all current members of specified group.
 *
 * @param int $id {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group to be enumerated.
 * @return CRecordset Recordset with list of accounts.
 */
function group_amongs ($id)
{
    debug_write_log(DEBUG_TRACE, '[group_amongs]');
    debug_write_log(DEBUG_DUMP,  '[group_amongs] $id = ' . $id);

    return dal_query('groups/mamongs.sql', $id);
}

/**
 * Returns {@link CRecordset DAL recordset} which contains all non-members of specified group.
 *
 * @param int $id {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group to be enumerated.
 * @return CRecordset Recordset with list of accounts.
 */
function group_not_amongs ($id)
{
    debug_write_log(DEBUG_TRACE, '[group_not_amongs]');
    debug_write_log(DEBUG_DUMP,  '[group_not_amongs] $id = ' . $id);

    // Create list of user names for all current members.
    $members = array();

    $list = dal_query('groups/mamongs.sql', $id);

    while (($row = $list->fetch()))
    {
        array_push($members, ustrtolower($row['username']));
    }

    // Arrays to store resulted data.
    $account_id = array();
    $username   = array();
    $fullname   = array();

    // Enumerate all registered accounts.
    $list = dal_query('accounts/list.sql', 'username asc');

    // Push to arrays everyone, who is not in list of current members.
    while (($user = $list->fetch()))
    {
        if (!in_array(ustrtolower($user['username']), $members))
        {
            array_push($account_id, $user['account_id']);
            array_push($username,   $user['username']);
            array_push($fullname,   $user['fullname']);
        }
    }

    // If LDAP is enabled, add all LDAP non-members too.
    if (LDAP_ENABLED)
    {
        // Enumerate all LDAP accounts from LDAP server.
        $list = ldap_findallusers();

        // Push to arrays everyone, who is not in list of current members.
        foreach ($list as $user)
        {
            if (!in_array(ustrtolower($user['username']), $members))
            {
                array_push($account_id, NULL);
                array_push($username,   $user['username']);
                array_push($fullname,   $user['fullname']);
            }
        }
    }

    // Sort all found ono-members in alphabetical order.
    array_multisort($fullname, $username, $account_id);

    // Compose (fake) resulted "recordset".
    $retval = array();

    for ($i = 0; $i < count($fullname); $i++)
    {
        $entry = array('account_id' => $account_id[$i],
                       'username'   => $username[$i],
                       'fullname'   => $fullname[$i]);

        array_push($retval, $entry);
    }

    return $retval;
}

/**
 * Validates group information before creation or modification.
 *
 * @param string $group_name {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_name Group name}.
 * @return int Error code:
 * <ul>
 * <li>{@link NO_ERROR} - data are valid</li>
 * <li>{@link ERROR_INCOMPLETE_FORM} - at least one of required field is empty</li>
 * </ul>
 */
function group_validate ($group_name)
{
    debug_write_log(DEBUG_TRACE, '[group_validate]');
    debug_write_log(DEBUG_DUMP,  '[group_validate] $group_name = ' . $group_name);

    if (ustrlen($group_name) == 0)
    {
        debug_write_log(DEBUG_NOTICE, '[group_validate] At least one required field is empty.');
        return ERROR_INCOMPLETE_FORM;
    }

    return NO_ERROR;
}

/**
 * Creates new group.
 *
 * @param int $project_id {@link http://www.etraxis.org/docs-schema.php#tbl_projects_project_id ID}
 * of project which new group should be created in. NULL should be used to create a global group.
 * @param string $group_name {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_name Group name}.
 * @param string $description Optional {@link http://www.etraxis.org/docs-schema.php#tbl_groups_description description}.
 * @return int Error code:
 * <ul>
 * <li>{@link NO_ERROR} - group is successfully created</li>
 * <li>{@link ERROR_ALREADY_EXISTS} - group with specified {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_name group name} already exists</li>
 * </ul>
 */
function group_create ($project_id, $group_name, $description)
{
    debug_write_log(DEBUG_TRACE, '[group_create]');
    debug_write_log(DEBUG_DUMP,  '[group_create] $project_id  = ' . $project_id);
    debug_write_log(DEBUG_DUMP,  '[group_create] $group_name  = ' . $group_name);
    debug_write_log(DEBUG_DUMP,  '[group_create] $description = ' . $description);

    // Check that there is no group with the same name and in the same project.
    $rs = dal_query('groups/fndk.sql', ($project_id == 0 ? 'is null' : '=' . $project_id), ustrtolower($group_name));

    if ($rs->rows != 0)
    {
        debug_write_log(DEBUG_NOTICE, '[group_create] Group already exists.');
        return ERROR_ALREADY_EXISTS;
    }

    // Create a group.
    dal_query('groups/create.sql',
              $project_id == 0 ? NULL : $project_id,
              $group_name,
              ustrlen($description) == 0 ? NULL : $description);

    return NO_ERROR;
}

/**
 * Modifies specified group.
 *
 * @param int $id {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group to be modified.
 * @param int $project_id {@link http://www.etraxis.org/docs-schema.php#tbl_projects_project_id ID}
 * of project which the group belongs to. NULL should be used to specify a global group.
 * @param string $group_name New {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_name group name}.
 * @param string $description New {@link http://www.etraxis.org/docs-schema.php#tbl_groups_description description}.
 * @return int Error code:
 * <ul>
 * <li>{@link NO_ERROR} - group is successfully modified</li>
 * <li>{@link ERROR_ALREADY_EXISTS} - another group with specified {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_name group name} already exists</li>
 * </ul>
 */
function group_modify ($id, $project_id, $group_name, $description)
{
    debug_write_log(DEBUG_TRACE, '[group_modify]');
    debug_write_log(DEBUG_DUMP,  '[group_modify] $id          = ' . $id);
    debug_write_log(DEBUG_DUMP,  '[group_create] $project_id  = ' . $project_id);
    debug_write_log(DEBUG_DUMP,  '[group_modify] $group_name  = ' . $group_name);
    debug_write_log(DEBUG_DUMP,  '[group_modify] $description = ' . $description);

    // Check that there is no group with the same group name, besides this one.
    $rs = dal_query('groups/fndku.sql', $id, (is_null($project_id) ? 'is null' : '=' . $project_id), ustrtolower($group_name));

    if ($rs->rows != 0)
    {
        debug_write_log(DEBUG_NOTICE, '[group_modify] Group already exists.');
        return ERROR_ALREADY_EXISTS;
    }

    // Modify the group.
    dal_query('groups/modify.sql',
              $id,
              $group_name,
              ustrlen($description) == 0 ? NULL : $description);

    return NO_ERROR;
}

/**
 * Checks whether group can be deleted.
 *
 * @param int $id {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group to be deleted.
 * @return bool TRUE if group can be deleted, FALSE otherwise.
 */
function is_group_removable ($id)
{
    debug_write_log(DEBUG_TRACE, '[is_group_removable]');
    debug_write_log(DEBUG_DUMP,  '[is_group_removable] $id = ' . $id);

    return TRUE;
}

/**
 * Deletes specified group.
 *
 * @param int $id {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group to be deleted.
 * @return int Always {@link NO_ERROR}.
 */
function group_delete ($id)
{
    debug_write_log(DEBUG_TRACE, '[group_delete]');
    debug_write_log(DEBUG_DUMP,  '[group_delete] $id = ' . $id);

    dal_query('groups/rdelall.sql',   $id);
    dal_query('groups/fshdelall.sql', $id);
    dal_query('groups/fpdelall.sql',  $id);
    dal_query('groups/gtdelall.sql',  $id);
    dal_query('groups/gpdelall.sql',  $id);
    dal_query('groups/msdelall.sql',  $id);
    dal_query('groups/delete.sql',    $id);

    return NO_ERROR;
}

/**
 * Adds specified account to list of members of specified group.
 *
 * @param int $gid {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group which the account should be added to.
 * @param int $aid {@link http://www.etraxis.org/docs-schema.php#tbl_accounts_account_id ID} of account to be added.
 * @return int Always {@link NO_ERROR}.
 */
function group_membership_add ($gid, $aid)
{
    debug_write_log(DEBUG_TRACE, '[group_membership_add]');
    debug_write_log(DEBUG_DUMP,  '[group_membership_add] $gid = ' . $gid);
    debug_write_log(DEBUG_DUMP,  '[group_membership_add] $aid = ' . $aid);

    dal_query('groups/mremove.sql', $gid, $aid);
    dal_query('groups/madd.sql',    $gid, $aid);

    return NO_ERROR;
}

/**
 * Removes specified account from list of members of specified group.
 *
 * @param int $gid {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group which the account should be removed from.
 * @param int $aid {@link http://www.etraxis.org/docs-schema.php#tbl_accounts_account_id ID} of account to be removed.
 * @return int Always {@link NO_ERROR}.
 */
function group_membership_remove ($gid, $aid)
{
    debug_write_log(DEBUG_TRACE, '[group_membership_remove]');
    debug_write_log(DEBUG_DUMP,  '[group_membership_remove] $gid = ' . $gid);
    debug_write_log(DEBUG_DUMP,  '[group_membership_remove] $aid = ' . $aid);

    dal_query('groups/mremove.sql', $gid, $aid);

    return NO_ERROR;
}

/**
 * Finds in database and returns current permissions of specified group for specified template.
 *
 * @param int $gid {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group whose permissions should be retrieved.
 * @param int $tid {@link http://www.etraxis.org/docs-schema.php#tbl_templates_template_id ID} of template which permissions should be retrieved for.
 * @return int Current {@link http://www.etraxis.org/docs-schema.php#tbl_group_perms permissions} set, or 0 if no permissions are set.
 */
function group_get_permissions ($gid, $tid)
{
    debug_write_log(DEBUG_TRACE, '[group_get_permissions]');
    debug_write_log(DEBUG_DUMP,  '[group_get_permissions] $gid = ' . $gid);
    debug_write_log(DEBUG_DUMP,  '[group_get_permissions] $tid = ' . $tid);

    $rs = dal_query('groups/gpget.sql', $gid, $tid);

    return ($rs->rows == 0 ? 0 : $rs->fetch('perms'));
}

/**
 * Sets permissions of specified group for specified template.
 *
 * @param int $gid {@link http://www.etraxis.org/docs-schema.php#tbl_groups_group_id ID} of group whose permissions should be set.
 * @param int $tid {@link http://www.etraxis.org/docs-schema.php#tbl_templates_template_id ID} of template which permissions should be set for.
 * @param int $perm New {@link http://www.etraxis.org/docs-schema.php#tbl_group_perms permissions} set.
 * @return int Always {@link NO_ERROR}.
 */
function group_set_permissions ($gid, $tid, $perm)
{
    debug_write_log(DEBUG_TRACE, '[group_set_permissions]');
    debug_write_log(DEBUG_DUMP,  '[group_set_permissions] $gid  = ' . $gid);
    debug_write_log(DEBUG_DUMP,  '[group_set_permissions] $tid  = ' . $tid);
    debug_write_log(DEBUG_DUMP,  '[group_set_permissions] $perm = ' . $perm);

    dal_query('groups/gpremove.sql', $gid, $tid);
    dal_query('groups/gpadd.sql',    $gid, $tid, $perm);

    return NO_ERROR;
}

?>