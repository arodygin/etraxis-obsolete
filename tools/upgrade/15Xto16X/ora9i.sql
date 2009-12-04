/*------------------------------------------------------------------------------------------------*/
/*                                                                                                */
/*  eTraxis - Records tracking web-based system.                                                  */
/*  Copyright (C) 2007 by Artem Rodygin                                                           */
/*                                                                                                */
/*  This program is free software; you can redistribute it and/or modify                          */
/*  it under the terms of the GNU General Public License as published by                          */
/*  the Free Software Foundation; either version 2 of the License, or                             */
/*  (at your option) any later version.                                                           */
/*                                                                                                */
/*  This program is distributed in the hope that it will be useful,                               */
/*  but WITHOUT ANY WARRANTY; without even the implied warranty of                                */
/*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                                 */
/*  GNU General Public License for more details.                                                  */
/*                                                                                                */
/*  You should have received a copy of the GNU General Public License along                       */
/*  with this program; if not, write to the Free Software Foundation, Inc.,                       */
/*  51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.                                   */
/*                                                                                                */
/*------------------------------------------------------------------------------------------------*/
/*  Server: Oracle9i                                                                              */
/*------------------------------------------------------------------------------------------------*/
/*  Author                  Date            Description of modifications                          */
/*------------------------------------------------------------------------------------------------*/
/*  Artem Rodygin           2007-09-09      new-563: Custom separators inside fields set.         */
/*------------------------------------------------------------------------------------------------*/

connect etraxis/password@database;

/*------------------------------------------------------------------------------------------------*/
/*  tbl_sys_vars                                                                                  */
/*------------------------------------------------------------------------------------------------*/

create table tbl_sys_vars
(
    var_name  varchar2 (32)  not null,
    var_value varchar2 (100) null
);

alter table tbl_sys_vars add constraint ix_sys_vars unique
(
    var_name
);

insert into tbl_sys_vars (var_name, var_value)
values ('DATABASE_TYPE', 'Oracle9i');

insert into tbl_sys_vars (var_name, var_value)
values ('FEATURE_LEVEL', '1.6');

/*------------------------------------------------------------------------------------------------*/
/*  tbl_fields                                                                                    */
/*------------------------------------------------------------------------------------------------*/

alter table tbl_fields
add add_separator number (10) null;
/

update tbl_fields
set add_separator = 0;

alter table tbl_fields
modify add_separator number (10) not null;

/*------------------------------------------------------------------------------------------------*/