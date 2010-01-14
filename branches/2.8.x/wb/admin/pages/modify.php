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
*****************************************************************************
*                   WebsiteBaker Extra Information
*
*
*
*
*****************************************************************************/
/**
 * @category    admin
 * @package     pages
 * @author      Ryan Djurovich
 * @copyright   2004-2009, Ryan Djurovich
 * @copyright   2009-2010, Website Baker Org. e.V.
 * @version     $Id$
 * @platform    WebsiteBaker 2.8.x
 * @requirements >= PHP 4.3.4
 * @license     http://www.gnu.org/licenses/gpl.html
 *
 */

// Get page id
if(!isset($_GET['page_id']) OR !is_numeric($_GET['page_id'])) {
	header("Location: index.php");
	exit(0);
} else {
	$page_id = $_GET['page_id'];
}

// Create new admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_modify');

// Get perms
if(!$admin->get_page_permission($page_id,'admin')) {
	$admin->print_error($MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS']);
}

$sectionId = isset($_GET['wysiwyg']) ? htmlspecialchars($admin->get_get('wysiwyg')) : NULL;

// Get page details
$results_array=$admin->get_page_details($page_id);

// Get display name of person who last modified the page
$user=$admin->get_user_details($results_array['modified_by']);

// Convert the unix ts for modified_when to human a readable form

$modified_ts = ($results_array['modified_when'] != 0)
        ? $modified_ts = gmdate(TIME_FORMAT.', '.DATE_FORMAT, $results_array['modified_when']+TIMEZONE)
        : 'Unknown';

// Include page info script
$template = new Template(THEME_PATH.'/templates');
$template->set_file('page', 'pages_modify.htt');
$template->set_block('page', 'main_block', 'main');
$template->set_var(array(
								'PAGE_ID' => $results_array['page_id'],
								'PAGE_TITLE' => ($results_array['page_title']),
								'MENU_TITLE' => ($results_array['menu_title']),
								'MODIFIED_BY' => $user['display_name'],
								'MODIFIED_BY_USERNAME' => $user['username'],
								'MODIFIED_WHEN' => $modified_ts,
								'ADMIN_URL' => ADMIN_URL,
								'WB_URL' => WB_URL,
								'WB_PATH' => WB_PATH,
								'THEME_URL' => THEME_URL
								)
						);
if($modified_ts == 'Unknown') {
	$template->set_var('CLASS_DISPLAY_MODIFIED', 'hide');
} else {
	$template->set_var('CLASS_DISPLAY_MODIFIED', '');
}

// Work-out if we should show the "manage sections" link
$query_sections = $database->query("SELECT section_id FROM ".TABLE_PREFIX."sections WHERE page_id = '$page_id' AND module = 'menu_link'");
if($query_sections->numRows() > 0) {
	$template->set_var('DISPLAY_MANAGE_SECTIONS', 'display:none;');
} elseif(MANAGE_SECTIONS == 'enabled') {
	$template->set_var('TEXT_MANAGE_SECTIONS', $HEADING['MANAGE_SECTIONS']);
} else {
	$template->set_var('DISPLAY_MANAGE_SECTIONS', 'display:none;');
}

// Insert language TEXT
$template->set_var(array(
								'TEXT_CURRENT_PAGE' => $TEXT['CURRENT_PAGE'],
								'TEXT_CHANGE_SETTINGS' => $TEXT['CHANGE_SETTINGS'],
								'LAST_MODIFIED' => $MESSAGE['PAGES']['LAST_MODIFIED'],
								'HEADING_MODIFY_PAGE' => $HEADING['MODIFY_PAGE']
								)
						);

// Parse and print header template
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// get template used for the displayed page (for displaying block details)
if (SECTION_BLOCKS)
{
	$sql = "SELECT `template` from `" . TABLE_PREFIX . "pages` WHERE `page_id` = '$page_id' ";
	$result = $database->query($sql);
	if ($result && $result->numRows() == 1) {
		$row = $result->fetchRow();
		$page_template = ($row['template'] == '') ? DEFAULT_TEMPLATE : $row['template'];
		// include template info file if exists
		if (file_exists(WB_PATH . '/templates/' . $page_template . '/info.php')) {
			include_once(WB_PATH . '/templates/' . $page_template . '/info.php');
		}
	}
}

// Get sections for this page
$module_permissions = $_SESSION['MODULE_PERMISSIONS'];
// workout for edit only one section for faster pageloading
// Constant later set in wb_settings, in meantime defined in framework/initialize.php
if(defined('EDIT_ONE_SECTION') and EDIT_ONE_SECTION and is_numeric($sectionId))
{
$query_sections = $database->query("SELECT section_id, module, block
	FROM ".TABLE_PREFIX."sections WHERE section_id = '$sectionId' ORDER BY position ASC");
}
else
{
$query_sections = $database->query("SELECT section_id, module, block
	FROM ".TABLE_PREFIX."sections WHERE page_id = '$page_id' ORDER BY position ASC");
}

if($query_sections->numRows() > 0)
{
	while($section = $query_sections->fetchRow())
    {
		$section_id = $section['section_id'];
		$module = $section['module'];
		//Have permission?
		if(!is_numeric(array_search($module, $module_permissions)))
        {
			// Include the modules editing script if it exists
			if(file_exists(WB_PATH.'/modules/'.$module.'/modify.php'))
            {
				print /* '<a name="'.$section_id.'"></a>'. */"\n";
				// output block name if blocks are enabled
				if (SECTION_BLOCKS) {
					if (isset($block[$section['block']]) && trim(strip_tags(($block[$section['block']]))) != '')
                    {
						$block_name = htmlentities(strip_tags($block[$section['block']]));
					} else {
						if ($section['block'] == 1)
                        {
							$block_name = $TEXT['MAIN'];
						} else {
							$block_name = '#' . (int) $section['block'];
						}
					}
					print '<div id="wb'.$section['section_id'].'"><b>' . $TEXT['BLOCK'] . ': </b>' . $block_name;
					print '<b>  Modul: </b>' . $section['module']." ";
					print '<b>  ID: </b>' . $section_id."</div>\n";
				}
				require(WB_PATH.'/modules/'.$module.'/modify.php');
			}
		}
	}
}

// Print admin footer
$admin->print_footer();

?>