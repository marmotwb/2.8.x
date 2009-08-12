<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Access', 'access');

// Setup template object
$template = new Template(THEME_PATH.'/templates');
$template->set_file('page', 'access.htt');

$template->set_block('page', 'main_block', 'main');
$template->set_block('main_block', 'users_block', 'user');
$template->set_block('main_block', 'groups_block', 'group');

// Insert values into the template object
$template->set_var(array(
		'ADMIN_URL' => ADMIN_URL,
		'THEME_URL' => THEME_URL,
		'WB_URL' => WB_URL
	)
);

/**
 *	Insert permission values into the template object
 *	Deprecated - as we are using blocks.
 */
$display_none = "style=\"display: none;\"";
if($admin->get_permission('users') != true)	$template->set_var('DISPLAY_USERS', $display_none);
if($admin->get_permission('groups') != true) $template->set_var('DISPLAY_GROUPS', $display_none);

// Insert section names and descriptions
$template->set_var(array(
		'USERS' => $MENU['USERS'],
		'GROUPS' => $MENU['GROUPS'],
		'ACCESS' => $MENU['ACCESS'],
		'USERS_OVERVIEW' => $OVERVIEW['USERS'],
		'GROUPS_OVERVIEW' => $OVERVIEW['GROUPS'],
	)
);

if ( $admin->get_permission('users') == true )	$template->parse('main_block', "users_block", true);
if ( $admin->get_permission('groups') == true )	$template->parse('main_block', "groups_block", true);

// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();

?>