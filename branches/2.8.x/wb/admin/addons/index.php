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
$admin = new admin('Addons', 'addons');

// Setup template object
$template = new Template(THEME_PATH.'/templates');
$template->set_file('page', 'addons.htt');
$template->set_block('page', 'main_block', 'main');

// Insert values into the template object
$template->set_var(array(
		'ADMIN_URL' => ADMIN_URL,
		'THEME_URL' => THEME_URL,
		'WB_URL' => WB_URL
	)
);

/**
 *	Setting up the blocks
 */
$template->set_block('main_block', "modules_block", "modules");
$template->set_block('main_block', "templates_block", "templates");
$template->set_block('main_block', "languages_block", "languages");
$template->set_block('main_block', "reload_block", "reload");

/**
 *	Insert permission values into the template object
 *	Obsolete as we are using blocks ... see "parsing the blocks" section
 */
$display_none = "style=\"display: none;\"";
if($admin->get_permission('modules') != true) 	$template->set_var('DISPLAY_MODULES', $display_none);	
if($admin->get_permission('templates') != true)	$template->set_var('DISPLAY_TEMPLATES', $display_none);
if($admin->get_permission('languages') != true)	$template->set_var('DISPLAY_LANGUAGES', $display_none);
if(!isset($_GET['advanced']) || $admin->get_permission('admintools') != true)
	$template->set_var('DISPLAY_RELOAD', $display_none);

/**
 *	Insert section names and descriptions
 */
$template->set_var(array(
	'ADDONS_OVERVIEW' => $MENU['ADDONS'],
	'MODULES' => $MENU['MODULES'],
	'TEMPLATES' => $MENU['TEMPLATES'],
	'LANGUAGES' => $MENU['LANGUAGES'],
	'MODULES_OVERVIEW' => $OVERVIEW['MODULES'],
	'TEMPLATES_OVERVIEW' => $OVERVIEW['TEMPLATES'],
	'LANGUAGES_OVERVIEW' => $OVERVIEW['LANGUAGES'],
	'TXT_ADMIN_SETTINGS' => $TEXT['ADMIN'] . ' ' . $TEXT['SETTINGS'],
	'MESSAGE_RELOAD_ADDONS' => $MESSAGE['ADDON']['RELOAD'],
	'TEXT_RELOAD' => $TEXT['RELOAD'],
	'RELOAD_URL' => ADMIN_URL . '/addons/reload.php',
	'URL_ADVANCED' => $admin->get_permission('admintools') ? 
		'<a href="' . ADMIN_URL . '/addons/index.php?advanced">' . $TEXT['ADVANCED'] . '</a>' : ''
	)
);

/**
 *	Parsing the blocks ...
 */
if ( $admin->get_permission('modules') == true) $template->parse('main_block', "modules_block", true);
if ( $admin->get_permission('templates') == true) $template->parse('main_block', "templates_block", true);
if ( $admin->get_permission('languages') == true) $template->parse('main_block', "languages_block", true);
if ( isset($_GET['advanced']) AND $admin->get_permission('admintools') == true) $template->parse('main_block', "reload_block", true);

/**
 *	Parse template object
 */
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

/**
 *	Print admin footer
 */
$admin->print_footer();

?>