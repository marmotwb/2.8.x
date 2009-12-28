<?php
/***************************************************************************
* SVN Version information:
*
* $Id$
*
*****************************************************************************
*
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
*****************************************************************************
*                   WebsiteBaker Extra Information
*
*
*
*
*****************************************************************************/

/**
 *
 * @category     modules
 * @package      menu_link
 * @author       Ryan Djurovich
 * @copyright    2004-2009, Ryan Djurovich
 * @copyright    2009, Website Baker Org. e.V.
 * @version      $Id$
 * @platform     WebsiteBaker 2.8.x
 * @requirements >= PHP 4.3.4
 * @license      http://www.gnu.org/licenses/gpl.html
 *
 *
 */

require_once('../../config.php');

// Include WB admin wrapper script
$update_when_modified = true; // Tells script to update when this page was last updated
require(WB_PATH.'/modules/admin.php');

// Update id, anchor and target
if(isset($_POST['menu_link'])) {
	$foreign_page_id = $admin->add_slashes($_POST['menu_link']);
	$page_target = $admin->add_slashes($_POST['page_target']);
	$url_target = $admin->add_slashes($_POST['target']);
	$r_type = $admin->add_slashes($_POST['r_type']);
	if(isset($_POST['extern']))
		$extern = $admin->add_slashes($_POST['extern']);
	else
		$extern='';

	$table_pages = TABLE_PREFIX.'pages';
	$table_mod = TABLE_PREFIX.'mod_menu_link';
	$database->query("UPDATE `$table_pages` SET `target` = '$url_target' WHERE `page_id` = '$page_id'");
	$database->query("UPDATE `$table_mod` SET `target_page_id` = '$foreign_page_id', `anchor` = '$page_target', `extern` = '$extern', `redirect_type` = '$r_type' WHERE `page_id` = '$page_id'");
}

// Check if there is a database error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error(), $js_back);
} else {
	$admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// Print admin footer
$admin->print_footer();

?>