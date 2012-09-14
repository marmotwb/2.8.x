<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */
/* */

// Create new admin object and print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');

// suppress to print the header, so no new FTAN will be set
$admin = new admin('Pages', 'pages_settings',false);

// Get page id
if(!isset($_POST['page_id']) || (isset($_POST['page_id']) && preg_match('/[^0-9a-z]/i',$_POST['page_id'])) )
{
	header("Location: index.php");
	exit(0);
} else {
//	$page_id = $admin->checkIDKEY('page_id');
//	$page_id = (int)$_POST['page_id']; || preg_match('/[^0-9a-f]/i',$_POST['page_id'])
	if((!($page_id = $admin->checkIDKEY('page_id')))) {
		$admin->print_header();
		$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL.'/pages/index.php');
	}
}

/*
if( (!($page_id = $admin->checkIDKEY('page_id', 0, $_SERVER['REQUEST_METHOD']))) )
{
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}
*/
$pagetree_url = ADMIN_URL.'/pages/index.php';
$target_url = ADMIN_URL.'/pages/settings.php?page_id='.$page_id;

if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],$target_url);
}
// After check print the header
$admin->print_header();

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Get values
$page_title = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->get_post_escaped('page_title')));
$menu_title = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->get_post_escaped('menu_title')));
$page_code = intval($admin->get_post('page_code')) ;
$description = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->add_slashes($admin->get_post('description'))));
$keywords = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->add_slashes($admin->get_post('keywords'))));
$parent = intval($admin->get_post('parent')); // fix secunia 2010-91-3
$visibility = $admin->get_post_escaped('visibility');
if (!in_array($visibility, array('public', 'private', 'registered', 'hidden', 'none'))) {$visibility = 'public';} // fix secunia 2010-93-3
$template = preg_replace('/[^a-z0-9_-]/i', "", $admin->get_post('template')); // fix secunia 2010-93-3
$template = (($template == DEFAULT_TEMPLATE ) ? '' : $template);
$target = preg_replace("/\W/", "", $admin->get_post('target'));
$aAdminGroups   = (isset($_POST['admin_groups']) ? $_POST['admin_groups'] : array(1));
$aAdminUsers    = (isset($_POST['admin_users']) ? $_POST['admin_users'] : array());
$aViewingGroups = (isset($_POST['viewing_groups']) ? $_POST['viewing_groups'] : array(1));
$aViewingUsers  = (isset($_POST['viewing_users']) ? $_POST['viewing_users'] : array());
$searching = intval($admin->get_post('searching'));
$language = strtoupper($admin->get_post('language'));
$language = (preg_match('/^[A-Z]{2}$/', $language) ? $language : DEFAULT_LANGUAGE);
$menu = intval($admin->get_post('menu')); // fix secunia 2010-91-3
$menu = ($menu==0) ? 1 : $menu;
$page_code = (isset($_POST['page_code']) ? intval($_POST['page_code']) : 0);
$sPageIcon = (isset($_POST['page_icon']) ? $_POST['page_icon'] : 0);
$sMenuIcon0 = (isset($_POST['menu_icon_0']) ? $_POST['menu_icon_0'] : 0);
$sMenuIcon1 = (isset($_POST['menu_icon_1']) ? $_POST['menu_icon_1'] : 0);

// Validate data
if($page_title == '' || substr($page_title,0,1)=='.')
{
	$admin->print_error($MESSAGE['PAGES_BLANK_PAGE_TITLE']);
}
if($menu_title == '' || substr($menu_title,0,1)=='.')
{
	$admin->print_error($MESSAGE['PAGES_BLANK_MENU_TITLE']);
}

// Get existing perms
$sql = 'SELECT `parent`,`link`,`position`,`admin_groups`,`admin_users` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id`='.$page_id;
$results = $database->query($sql);

$results_array = $results->fetchRow();
$old_parent = $results_array['parent'];
$old_link = $results_array['link'];
$old_position = $results_array['position'];

if($admin->ami_group_member('1')) {
	if(!$admin->ami_group_member($results_array['admin_groups']) &&
	   !$admin->is_group_match($admin->get_user_id(), $results_array['admin_users']))
	{
		$admin->print_error($MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS']);
	}
	// Setup admin groups
	$aAdminGroups = (is_array($aAdminGroups) ? $aAdminGroups : array(1));
	array_unshift($aAdminGroups, 1);
	$sAdminGroups = implode(',', array_unique($aAdminGroups, SORT_REGULAR));
	$sAdminGroups = (preg_match('/^,|[^0-9,]|,,|,$/', $sAdminGroups) ? '1' : $sAdminGroups);

	$aAdminUsers = (is_array($aAdminUsers) ? $aAdminUsers : array());
	$sAdminUsers = implode(',', array_diff($aAdminUsers, array(0)));
	$sAdminUsers = (preg_match('/^,|[^0-9,]|,,|,$/', $sAdminUsers) ? array() : $sAdminUsers);
}

$aViewingGroups = (is_array($aViewingGroups) ? $aViewingGroups : array(1));
array_unshift($aViewingGroups, 1);
$sViewingGroups = implode(',', array_unique($aViewingGroups, SORT_REGULAR));
$sViewingGroups = (preg_match('/^,|[^0-9,]|,,|,$/', $sViewingGroups) ? '1' : $sViewingGroups);

$aViewingUsers = (is_array($aViewingUsers) ? $aViewingUsers : array());
$sViewingUsers = implode(',', array_diff($aViewingUsers, array(0)));
$sViewingUsers = (preg_match('/^,|[^0-9,]|,,|,$/', $sViewingUsers) ? array() : $sViewingUsers);

$sPageIcon = (($sPageIcon == '0') ? '' : $sPageIcon);
if(!is_readable(WB_PATH.$sPageIcon)) { $sPageIcon = ''; }
$sMenuIcon0 = (($sMenuIcon0 == '0') ? '' : $sMenuIcon0);
if(!is_readable(WB_PATH.$sMenuIcon0)) { $sMenuIcon0 = ''; }
$sMenuIcon1 = (($sMenuIcon1 == '0') ? '' : $sMenuIcon1);
if(!is_readable(WB_PATH.$sMenuIcon1)) { $sMenuIcon1 = ''; }

// If needed, get new order
if($parent != $old_parent)
{
	// Include ordering class
	require(WB_PATH.'/framework/class.order.php');
	$order = new order(TABLE_PREFIX.'pages', 'position', 'page_id', 'parent');
	// Get new order
	$position = $order->get_new($parent);
	// Clean new order
	$order->clean($parent);
} else {
	$position = $old_position;
}

// Work out level and root parent
if ($parent!='0')
{
	$level = level_count($parent)+1;
	$root_parent = root_parent($parent);
}
else {
	$level = '0';
	$root_parent = '0';
}

// Work-out what the link should be
if($parent == '0')
{
	$link = '/'.page_filename($menu_title);
	// rename menu titles: index && intro to prevent clashes with intro page feature and WB core file /pages/index.php
	if($link == '/index' || $link == '/intro')
    {
		$link .= '_' .$page_id;
		$filename = WB_PATH.PAGES_DIRECTORY.'/'.page_filename($menu_title).'_'.$page_id .PAGE_EXTENSION;
	} else {
		$filename = WB_PATH.PAGES_DIRECTORY.'/'.page_filename($menu_title).PAGE_EXTENSION;
	}
} else {
	$parent_section = '';
	$parent_titles = array_reverse(get_parent_titles($parent));
	foreach($parent_titles AS $parent_title)
    {
		$parent_section .= page_filename($parent_title).'/';
	}
	if($parent_section == '/')
    {
      $parent_section = '';
    }
	$link = '/'.$parent_section.page_filename($menu_title);
	$filename = WB_PATH.PAGES_DIRECTORY.'/'.$parent_section.page_filename($menu_title).PAGE_EXTENSION;
}

// Check if a page with same page filename exists
// $database = new database();
$sql = 'SELECT `page_id`,`page_title` FROM `'.TABLE_PREFIX.'pages` WHERE `link` = "'.$link.'" AND `page_id` != '.$page_id;
$get_same_page = $database->query($sql);

if($get_same_page->numRows() > 0)
{
	$admin->print_error($MESSAGE['PAGES_PAGE_EXISTS']);
}

// Update page with new order
$sql = 'UPDATE `'.TABLE_PREFIX.'pages` SET `parent`='.$parent.', `position`='.$position.' WHERE `page_id`='.$page_id.'';
// $database = new database();
$database->query($sql);

// Get page trail
$page_trail = get_page_trail($page_id);

// Update page settings in the pages table
$sql = 'UPDATE `'.TABLE_PREFIX.'pages` '
     . 'SET `parent`='.$parent.', '
     .     '`page_title`=\''.$page_title.'\', '
     .     '`tooltip`=\''.$page_title.'\', '
     .     '`page_icon` =\''.mysql_real_escape_string($sPageIcon).'\', '
     .     '`menu_title`=\''.$menu_title.'\', '
     .     '`menu_icon_0` =\''.mysql_real_escape_string($sMenuIcon0).'\', '
     .     '`menu_icon_1` =\''.mysql_real_escape_string($sMenuIcon1).'\', '
     .     '`menu`='.$menu.', '
     .     '`level`='.$level.', '
     .     '`page_trail`=\''.$page_trail.'\', '
     .     '`root_parent`='.$root_parent.', '
     .     '`link`=\''.$link.'\', '
     .     '`template`=\''.$template.'\', '
     .     '`target`=\''.$target.'\', '
     .     '`description`=\''.$description.'\', '
     .     '`keywords`=\''.$keywords.'\', '
     .     '`position`='.$position.', '
     .     '`visibility`=\''.$visibility.'\', '
     .     '`searching`='.$searching.', '
     .     '`language`=\''.$language.'\', ';
if($admin->ami_group_member('1')) {
	$sql .= ''
	     .     '`admin_groups`=\''.$sAdminGroups.'\', '
	     .     '`admin_users`=\''.$sAdminUsers.'\', ';
}
$sql .= ''
     .     '`viewing_groups`=\''.$sViewingGroups.'\', '
     .     '`viewing_users`=\''.$sViewingUsers.'\', '
     .     '`page_code`='.$page_code.' '
     . 'WHERE `page_id`='.$page_id;

if(!$database->query($sql)) {
	$target_url = ADMIN_URL.'/pages/settings.php?page_id='.$page_id;
	$admin->print_error($database->get_error(), $target_url );
}
// Clean old order if needed
if($parent != $old_parent)
{
	$order->clean($old_parent);
}

/* BEGIN page "access file" code */

// Create a new file in the /pages dir if title changed
if(!is_writable(WB_PATH.PAGES_DIRECTORY.'/'))
{
	$admin->print_error($MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE']);
} else {
    $old_filename = WB_PATH.PAGES_DIRECTORY.$old_link.PAGE_EXTENSION;
	// First check if we need to create a new file
	if(($old_link != $link) || (!file_exists($old_filename)))
    {
		// Delete old file
		$old_filename = WB_PATH.PAGES_DIRECTORY.$old_link.PAGE_EXTENSION;
		if(file_exists($old_filename))
        {
			unlink($old_filename);
		}
		// Create access file
		create_access_file($filename,$page_id,$level);
		// Move a directory for this page
		if(file_exists(WB_PATH.PAGES_DIRECTORY.$old_link.'/') && is_dir(WB_PATH.PAGES_DIRECTORY.$old_link.'/'))
        {
			rename(WB_PATH.PAGES_DIRECTORY.$old_link.'/', WB_PATH.PAGES_DIRECTORY.$link.'/');
		}
		// Update any pages that had the old link with the new one
		$old_link_len = strlen($old_link);
        $sql = '';
		$query_subs = $database->query("SELECT page_id,link,level FROM ".TABLE_PREFIX."pages WHERE link LIKE '%$old_link/%' ORDER BY LEVEL ASC");

		if($query_subs->numRows() > 0)
        {
			while($sub = $query_subs->fetchRow())
            {
				// Double-check to see if it contains old link
				if(substr($sub['link'], 0, $old_link_len) == $old_link)
                {
					// Get new link
					$replace_this = $old_link;
					$old_sub_link_len =strlen($sub['link']);
					$new_sub_link = $link.'/'.substr($sub['link'],$old_link_len+1,$old_sub_link_len);
					// Work out level
					$new_sub_level = level_count($sub['page_id']);
					// Update level and link
					$database->query("UPDATE ".TABLE_PREFIX."pages SET link = '$new_sub_link', level = '$new_sub_level' WHERE page_id = '".$sub['page_id']."' LIMIT 1");
					// Re-write the access file for this page
					$old_subpage_file = WB_PATH.PAGES_DIRECTORY.$new_sub_link.PAGE_EXTENSION;
					if(file_exists($old_subpage_file))
                    {
						unlink($old_subpage_file);
					}
					create_access_file(WB_PATH.PAGES_DIRECTORY.$new_sub_link.PAGE_EXTENSION, $sub['page_id'], $new_sub_level);
				}
			}
		}
	}
}

// Function to fix page trail of subs
function fix_page_trail($parent,$root_parent)
{
	// Get objects and vars from outside this function
	global $admin, $template, $database, $TEXT, $MESSAGE;
	// Get page list from database
	// $database = new database();
	$query = "SELECT page_id FROM ".TABLE_PREFIX."pages WHERE parent = '$parent'";
	$get_pages = $database->query($query);
	// Insert values into main page list
	if($get_pages->numRows() > 0)
    {
		while($page = $get_pages->fetchRow())
        {
			// Fix page trail

			$database->query("UPDATE ".TABLE_PREFIX."pages SET ".($root_parent != 0 ?"root_parent = '$root_parent', ":"")." page_trail = '".get_page_trail($page['page_id'])."' WHERE page_id = '".$page['page_id']."'");
			// Run this query on subs
			fix_page_trail($page['page_id'],$root_parent);
		}
	}
}

// Fix sub-pages page trail
fix_page_trail($page_id,$root_parent);

/* END page "access file" code */

//$pagetree_url = ADMIN_URL.'/pages/index.php';
//$target_url = ADMIN_URL.'/pages/settings.php?page_id='.$page_id;
// Check if there is a db error, otherwise say successful
if($database->is_error())
{
	$admin->print_error($database->get_error(), $target_url );
} else {
	$admin->print_success($MESSAGE['PAGES_SAVED_SETTINGS'], $target_url );
}

// Print admin footer
$admin->print_footer();
