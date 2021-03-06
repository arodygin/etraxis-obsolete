/*----------------------------------------------------------------------------*/
/*                                                                            */
/*  eTraxis - Records tracking web-based system                               */
/*  Copyright (C) 2010  Artem Rodygin                                         */
/*                                                                            */
/*  This program is free software: you can redistribute it and/or modify      */
/*  it under the terms of the GNU General Public License as published by      */
/*  the Free Software Foundation, either version 3 of the License, or         */
/*  (at your option) any later version.                                       */
/*                                                                            */
/*  This program is distributed in the hope that it will be useful,           */
/*  but WITHOUT ANY WARRANTY; without even the implied warranty of            */
/*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             */
/*  GNU General Public License for more details.                              */
/*                                                                            */
/*  You should have received a copy of the GNU General Public License         */
/*  along with this program.  If not, see <http://www.gnu.org/licenses/>.     */
/*                                                                            */
/*----------------------------------------------------------------------------*/
/*  Server: MySQL 5.0                                                         */
/*----------------------------------------------------------------------------*/

use etraxis;

/*----------------------------------------------------------------------------*/
/*  tbl_sys_vars                                                              */
/*----------------------------------------------------------------------------*/

update tbl_sys_vars
set var_value = '3.0'
where var_name = 'FEATURE_LEVEL';

/*----------------------------------------------------------------------------*/
/*  tbl_accounts                                                              */
/*----------------------------------------------------------------------------*/

alter table tbl_accounts drop column fset_id;

/*----------------------------------------------------------------------------*/
/*  Obsolete tables.                                                          */
/*----------------------------------------------------------------------------*/

drop table tbl_fset_filters;
drop table tbl_fsets;
drop table tbl_def_columns;

/*----------------------------------------------------------------------------*/
/*  tbl_view_filters                                                          */
/*----------------------------------------------------------------------------*/

create table tbl_view_filters
(
    view_id int not null,
    filter_id int not null
);

alter table tbl_view_filters add primary key
(
    view_id,
    filter_id
);

alter table tbl_view_filters add constraint foreign key fk_view_filters_view_id
(
    view_id
)
references tbl_views
(
    view_id
);

alter table tbl_view_filters add constraint foreign key fk_view_filters_filter_id
(
    filter_id
)
references tbl_filters
(
    filter_id
);

/*----------------------------------------------------------------------------*/
