<?php
/****************************************************************************
* SVN Version information:
*
* $Id$
*
*****************************************************************************
*                          WebsiteBaker
*
* WebsiteBaker Project <http://www.websitebaker2.org/>
* Copyright (C) 2009, Website Baker Org. e.V.
*         http://start.websitebaker2.org/impressum-datenschutz.php
* Copyright (C) 2004-2009, Ryan Djurovich
*
*                        About WebsiteBaker
*
* Website Baker is a PHP-based Content Management System (CMS)
* designed with one goal in mind: to enable its users to produce websites
* with ease.
*
*****************************************************************************
*
*****************************************************************************
*                        LICENSE INFORMATION
*
* WebsiteBaker is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* WebsiteBaker is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
* See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
****************************************************************************
*
*                   WebsiteBaker Extra Information
*
*
*
*
*****************************************************************************/
/**
 *
 * @category     admin
 * @package      start
 * @author       Ryan Djurovich
 * @copyright    2004-2009, Ryan Djurovich
 * @copyright    2009-2010, Website Baker Org. e.V.
 * @version      $Id$
 * @platform     WebsiteBaker 2.8.x
 * @requirements >= PHP 4.3.4
 * @license      http://www.gnu.org/licenses/gpl.html
 *
 */

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Start','start');

// Setup template object
$template = new Template(THEME_PATH.'/templates');
$template->set_file('page', 'start.htt');
$template->set_block('page', 'main_block', 'main');

// Insert values into the template object
$template->set_var(array(
								'WELCOME_MESSAGE' => $MESSAGE['START']['WELCOME_MESSAGE'],
								'CURRENT_USER' => $MESSAGE['START']['CURRENT_USER'],
								'DISPLAY_NAME' => $admin->get_display_name(),
								'ADMIN_URL' => ADMIN_URL,
								'WB_URL' => WB_URL,
								'THEME_URL' => THEME_URL,
								'WB_VERSION' => WB_VERSION
								)
						);

// Insert permission values into the template object
if($admin->get_permission('pages') != true) {
	$template->set_var('DISPLAY_PAGES', 'display:none;');
}
if($admin->get_permission('media') != true) {
	$template->set_var('DISPLAY_MEDIA', 'display:none;');
}
if($admin->get_permission('addons') != true) {
	$template->set_var('DISPLAY_ADDONS', 'display:none;');
}
if($admin->get_permission('access') != true) {
	$template->set_var('DISPLAY_ACCESS', 'display:none;');
}
if($admin->get_permission('settings') != true) {
	$template->set_var('DISPLAY_SETTINGS', 'display:none;');
}
if($admin->get_permission('admintools') != true) {
	$template->set_var('DISPLAY_ADMINTOOLS', 'display:none;');
}

// Check if installation directory still exists
if(file_exists(WB_PATH.'/install/')) {
	// Check if user is part of Adminstrators group
	if(in_array(1, $admin->get_groups_id())) {
		$template->set_var('WARNING', $MESSAGE['START']['INSTALL_DIR_EXISTS']);
	} else {
		$template->set_var('DISPLAY_WARNING', 'display:none;');
	}
} else {
	$template->set_var('DISPLAY_WARNING', 'display:none;');
}

// Insert "Add-ons" section overview (pretty complex compared to normal)
$addons_overview = $TEXT['MANAGE'].' ';
$addons_count = 0;
if($admin->get_permission('modules') == true) {
	$addons_overview .= '<a href="'.ADMIN_URL.'/modules/index.php">'.$MENU['MODULES'].'</a>';
	$addons_count = 1;
}
if($admin->get_permission('templates') == true) {
	if($addons_count == 1) { $addons_overview .= ', '; }
	$addons_overview .= '<a href="'.ADMIN_URL.'/templates/index.php">'.$MENU['TEMPLATES'].'</a>';
	$addons_count = 1;
}
if($admin->get_permission('languages') == true) {
	if($addons_count == 1) { $addons_overview .= ', '; }
	$addons_overview .= '<a href="'.ADMIN_URL.'/languages/index.php">'.$MENU['LANGUAGES'].'</a>';
}

// Insert "Access" section overview (pretty complex compared to normal)
$access_overview = $TEXT['MANAGE'].' ';
$access_count = 0;
if($admin->get_permission('users') == true) {
	$access_overview .= '<a href="'.ADMIN_URL.'/users/index.php">'.$MENU['USERS'].'</a>';
	$access_count = 1;
}
if($admin->get_permission('groups') == true) {
	if($access_count == 1) { $access_overview .= ', '; }
	$access_overview .= '<a href="'.ADMIN_URL.'/groups/index.php">'.$MENU['GROUPS'].'</a>';
	$access_count = 1;
}

// Insert section names and descriptions
$template->set_var(array(
								'PAGES' => $MENU['PAGES'],
								'MEDIA' => $MENU['MEDIA'],
								'ADDONS' => $MENU['ADDONS'],
								'ACCESS' => $MENU['ACCESS'],
								'PREFERENCES' => $MENU['PREFERENCES'],
								'SETTINGS' => $MENU['SETTINGS'],
								'ADMINTOOLS' => $MENU['ADMINTOOLS'],
								'HOME_OVERVIEW' => $OVERVIEW['START'],
								'PAGES_OVERVIEW' => $OVERVIEW['PAGES'],
								'MEDIA_OVERVIEW' => $OVERVIEW['MEDIA'],
								'ADDONS_OVERVIEW' => $addons_overview,
								'ACCESS_OVERVIEW' => $access_overview,
								'PREFERENCES_OVERVIEW' => $OVERVIEW['PREFERENCES'],
								'SETTINGS_OVERVIEW' => $OVERVIEW['SETTINGS'],
								'ADMINTOOLS_OVERVIEW' => $OVERVIEW['ADMINTOOLS']
								)
						);

// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();

?>