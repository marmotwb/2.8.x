<?php
/**
 *
 * @category        backend
 * @package         modules
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Stop this file being access directly
if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

// Get page id
if(isset($_GET['page_id']) && is_numeric($_GET['page_id']))
{
	$page_id = $_GET['page_id'];
} elseif(isset($_POST['page_id']) && is_numeric($_POST['page_id']))
{
	$page_id = $_POST['page_id'];
} else {
	header("Location: index.php");
	exit(0);
}

// Get section id if there is one
if(isset($_GET['section_id']) && is_numeric($_GET['section_id']))
{
	$section_id = $_GET['section_id'];
} elseif(isset($_POST['section_id']) && is_numeric($_POST['section_id']))
{
	$section_id = $_POST['section_id'];
} else {
	// Check if we should redirect the user if there is no section id
	if(!isset($section_required))
	{
		$section_id = 0;
	} else {
		header("Location: $section_required");
		exit(0);
	}
}

// Create js back link
$js_back = 'javascript: history.go(-1);';

// Create new admin object
include(WB_PATH.'/framework/class.admin.php');
// header will be set here, see database->is_error
$admin = new admin('Pages', 'pages_modify');

// Get perms
// $database = new database();
$sql  = 'SELECT `admin_groups`,`admin_users` FROM `'.TABLE_PREFIX.'pages` ';
$sql .= 'WHERE `page_id` = '.intval($page_id);

$res_pages = $database->query($sql);
$rec_pages = $res_pages->fetchRow();

$old_admin_groups = explode(',', str_replace('_', '', $rec_pages['admin_groups']));
$old_admin_users  = explode(',', str_replace('_', '', $rec_pages['admin_users']));

$in_group = FALSE;
foreach($admin->get_groups_id() as $cur_gid)
{
    if (in_array($cur_gid, $old_admin_groups))
	{
        $in_group = TRUE;
    }
}
if((!$in_group) && !is_numeric(array_search($admin->get_user_id(), $old_admin_users)))
{
	$admin->print_error($MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS']);
}

// Workout if the developer wants to show the info banner
if(isset($print_info_banner) && $print_info_banner == true)
{
	// Get page details
	// $database = new database(); not needed
	$sql  = 'SELECT `page_id`,`page_title`,`modified_by`,`modified_when` FROM `'.TABLE_PREFIX.'pages` ';
	$sql .= 'WHERE `page_id` = '.intval($page_id);
	$res_pages = $database->query($sql);
	if($database->is_error())
	{
		// $admin->print_header();  don't know why
		$admin->print_error($database->get_error());
	}
	if($results->numRows() == 0)
	{
		// $admin->print_header();   don't know why
		$admin->print_error($MESSAGE['PAGES']['NOT_FOUND']);
	} else {
		$res_pages = $results->fetchRow();
	}

	// Get display name of person who last modified the page
	$user = $admin->get_user_details($res_pages['modified_by']);

	// Convert the unix ts for modified_when to human a readable form
	if($res_pages['modified_when'] != 0)
	{
		$modified_ts = gmdate(TIME_FORMAT.', '.DATE_FORMAT, $res_pages['modified_when']+TIMEZONE);
	} else {
		$modified_ts = 'Unknown';
	}

	// Include page info script
	$template = new Template(THEME_PATH.'/templates');
	$template->set_file('page', 'pages_modify.htt');
	$template->set_block('page', 'main_block', 'main');
	$template->set_var(array(
				'PAGE_ID' => $res_pages['page_id'],
				'PAGE_TITLE' => ($res_pages['page_title']),
				'MODIFIED_BY' => $user['display_name'],
				'MODIFIED_BY_USERNAME' => $user['username'],
				'MODIFIED_WHEN' => $modified_ts,
				'ADMIN_URL' => ADMIN_URL
				));

	if($modified_ts == 'Unknown')
	{
		$template->set_var('CLASS_DISPLAY_MODIFIED', 'hide');
	} else {
		$template->set_var('CLASS_DISPLAY_MODIFIED', '');
	}

	// Work-out if we should show the "manage sections" link
    $sql  = 'SELECT `section_id` FROM `'.TABLE_PREFIX.'sections` ';
	$sql .= 'WHERE `page_id` = '.intval($page_id).' AND `module` = "menu_link"';
	if( ( $res_sections = $database->query($sql) ) && ($database->is_error() == false ) )
	{
		if($res_sections->numRows() > 0)
		{
			$template->set_var('DISPLAY_MANAGE_SECTIONS', 'none');
		}elseif(MANAGE_SECTIONS == 'enabled')
		{
			$template->set_var('TEXT_MANAGE_SECTIONS', $HEADING['MANAGE_SECTIONS']);
		}else {
			$template->set_var('DISPLAY_MANAGE_SECTIONS', 'none');
		}
	} else {
		$admin->print_error($database->get_error());
	}

	// Insert language TEXT
	$template->set_var(array(
				'TEXT_CURRENT_PAGE' => $TEXT['CURRENT_PAGE'],
				'TEXT_CHANGE' => $TEXT['CHANGE'],
				'LAST_MODIFIED' => $MESSAGE['PAGES']['LAST_MODIFIED'],
				'TEXT_CHANGE_SETTINGS' => $TEXT['CHANGE_SETTINGS'],
				'HEADING_MODIFY_PAGE' => $HEADING['MODIFY_PAGE']
				));

	// Parse and print header template
	$template->parse('main', 'main_block', false);
	$template->pparse('output', 'page');
}

// Work-out if the developer wants us to update the timestamp for when the page was last modified
if(isset($update_when_modified) && $update_when_modified == true)
{
	$sql  = 'UPDATE `'.TABLE_PREFIX.'pages` ';
	$sql .= 'SET `modified_when` = '.time().', ';
	$sql .=     '`modified_by`   = '.intval($admin->get_user_id()).' ';
	$sql .=     'WHERE page_id   = '.intval($page_id);
	$database->query($sql);
}

?>