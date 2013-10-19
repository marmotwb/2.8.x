<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.4
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// Create new admin object and print admin header
if(!defined('WB_URL'))
{
	$config_file = realpath('../../config.php');
	if(file_exists($config_file) && !defined('WB_URL'))
	{
		require($config_file);
	}
}
if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

//$lang_dir = dirname(__FILE__).'/languages/';
//$lang = file_exists($lang_dir.LANGUAGE.'.php') ? LANGUAGE : 'EN';
//require_once($lang_dir.$lang.'.php');
//if( !isset($mLang->TEXT_PAGE_LANG_LOADED) ) { require($lang_dir.$lang.'.php'); }

// suppress to print the header, so no new FTAN will be set
$admin = new admin('Pages', 'pages_settings',false);
$pagetree_url = ADMIN_URL.'/pages/index.php';

$mLang = Translate::getinstance();
$mLang->enableAddon('admin\pages');

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
		$admin->print_error($mLang->MESSAGE_GENERIC_SECURITY_ACCESS, $pagetree_url);
	}
}

/*
if( (!($page_id = $admin->checkIDKEY('page_id', 0, $_SERVER['REQUEST_METHOD']))) )
{
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}
*/
$target_url = ADMIN_URL.'/pages/settings.php?page_id='.$page_id;

if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($mLang->MESSAGE_GENERIC_SECURITY_ACCESS,$target_url);
}

// After check print the header
$admin->print_header();

if(isset($_POST['extendet_submit'])) {
//	$val = (((($page_exented=='1') ? $page_exented : 0)) + 1) % 2;
	$val = (defined('PAGE_EXTENDET') ? filter_var(PAGE_EXTENDET, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : false);
	$sql  = (defined('PAGE_EXTENDET') ? 'UPDATE `' : 'INSERT INTO `') . TABLE_PREFIX . 'settings` SET ';
	$sql .= '`name`=\'page_extendet\', ';
	$sql .= '`value`=\''.($val ? 'false' : 'true').'\' ';
	$sql .= (defined('PAGE_EXTENDET') ? 'WHERE `name`=\'page_extendet\'' : '');
    if($database->query($sql)) {
// redirect to backend
echo "<p style=\"text-align:center;\"> If the script</strong> could not be start automatically.\n" .
     "Please click <a style=\"font-weight:bold;\" " .
     "href=\"".$target_url."\">on this link</a> to start the script!</p>\n";
echo "<script type=\"text/javascript\">
<!--
// Get the location object
var locationObj = document.location;
// Set the value of the location object
document.location = '$target_url';
-->
</script>";

    } else {
    	$admin->print_error($database->get_error(), $target_url );
    }
}

// Include the WB functions file
if(!function_exists('directory_list')) { require(WB_PATH.'/framework/functions.php'); }

// Get values
//$page_title = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->get_post_escaped('page_title')));
//$menu_title = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->get_post_escaped('menu_title')));
//$seo_title = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->get_post_escaped('seo_title')));
//$description = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->add_slashes($admin->get_post('description'))));
//$keywords = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->add_slashes($admin->get_post('keywords'))));

$page_title = ($admin->StripCodeFromText($admin->get_post('page_title')));
$menu_title = ($admin->StripCodeFromText($admin->get_post('menu_title')));
$seo_title = ($admin->StripCodeFromText($admin->get_post('seo_title')));
$description = ($admin->StripCodeFromText($admin->get_post('description')));
$keywords = ($admin->StripCodeFromText($admin->get_post('keywords')));

$page_code = intval($admin->get_post('page_code')) ;
$parent = intval($admin->get_post('parent')); // fix secunia 2010-91-3
$visibility = $admin->StripCodeFromText($admin->get_post('visibility'));
if (!in_array($visibility, array('public', 'private', 'registered', 'hidden', 'none'))) {$visibility = 'public';} // fix secunia 2010-93-3
$template = preg_replace('/[^a-z0-9_-]/i', "", $admin->get_post('template')); // fix secunia 2010-93-3
$template = (($template == DEFAULT_TEMPLATE ) ? '' : $template);
$target = preg_replace("/\W/", "", $admin->get_post('target'));
$aAdminGroups   = (isset($_POST['admin_groups']) ? $_POST['admin_groups'] : array('1'));
$aAdminUsers    = (isset($_POST['admin_users']) ? $_POST['admin_users'] : array());
$aViewingGroups = (isset($_POST['viewing_groups']) ? $_POST['viewing_groups'] : array('1'));
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
	$admin->print_error($mLang->PAGES_BLANK_PAGE_TITLE,$target_url);
}
if($menu_title == '' || substr($menu_title,0,1)=='.')
{
	$admin->print_error($mLang->MESSAGE_PAGES_BLANK_MENU_TITLE,$target_url);
}
if($seo_title == '' || substr($seo_title,0,1)=='.')
{
	$seo_title = $menu_title;
}

// Get existing perms
$sql  = 'SELECT `parent`,`link`,`position`,`admin_groups`,`admin_users`,`menu_title` ';
$sql .= 'FROM `'.TABLE_PREFIX.'pages` WHERE `page_id`='.$page_id;
$results = $database->query($sql);

$results_array = $results->fetchRow(MYSQL_ASSOC);
$old_parent = $results_array['parent'];
$old_link = $results_array['link'];
$old_position = $results_array['position'];

if($admin->ami_group_member('1')) {
	if(!$admin->ami_group_member($results_array['admin_groups']) &&
	   !$admin->is_group_match($admin->get_user_id(), $results_array['admin_users']))
	{
		$admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
	}
	// Setup admin groups
	$aAdminGroups = (is_array($aAdminGroups) ? $aAdminGroups : array(1));
	array_unshift($aAdminGroups, 1);
	$sAdminGroups = implode(',', array_unique($aAdminGroups));
	$sAdminGroups = (preg_match('/^,|[^0-9,]|,,|,$/', $sAdminGroups) ? '1' : $sAdminGroups);

	$aAdminUsers = (is_array($aAdminUsers) ? $aAdminUsers : array());
	$sAdminUsers = implode(',', array_diff($aAdminUsers, array(0)));
	$sAdminUsers = (preg_match('/^,|[^0-9,]|,,|,$/', $sAdminUsers) ? array() : $sAdminUsers);
}

$aViewingGroups = (is_array($aViewingGroups) ? $aViewingGroups : array(1));
array_unshift($aViewingGroups, 1);
$sViewingGroups = implode(',', array_unique($aViewingGroups));
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
} else {
// Work out level
	$level = level_count($page_id);
// Work out root parent
	$root_parent = root_parent($page_id);
}
// preparing root_check to protect system directories and important files from being overwritten if PAGES_DIR = '/'
	$denied = false;
	$forbidden  = array();
	$aTempIniList  = array();
	$aTempIniList = parse_ini_file(dirname(__FILE__).'/default.ini',true);
	$bAccessFileOverwrite = $aTempIniList['PagesEnvironment']['AccessFileOverwrite'];
	$aTempIniList['ProtectedNames']['List'][] = (defined('ADMIN_DIRECTORY') ? trim(ADMIN_DIRECTORY,'/') : 'admin');
	$aTempIniList['ProtectedNames']['List'][] = (defined('MEDIA_DIRECTORY') ? trim(MEDIA_DIRECTORY,'/') : 'media');
	$aTempIniList['ProtectedNames']['List'][] = (defined('PAGES_DIRECTORY') ? trim(PAGES_DIRECTORY,'/') : 'pages');
	$forbidden = $aTempIniList['ProtectedNames'];

$link = '/'.page_filename($seo_title);
if( ($parent == '0') ) {
	if( defined('PAGES_DIRECTORY') && trim(PAGES_DIRECTORY,'/')=='' ) {
// Work-out what the link should be
		$denied = in_array(trim($link,'/'), $forbidden['List']);
		if( $denied )
		{
//			$link .= '_' .$page_id;
			$admin->print_error($mLang->MESSAGE_PAGES_CANNOT_MODIFY_PROTECTED_FILE);
		}
	}
	$filename = WB_PATH.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
} else {
	$parent_section = '';
	$parent_titles = array_reverse(get_parent_titles($parent));

	foreach($parent_titles AS $parent_title) {
		$parent_section .= '/'.page_filename($parent_title);
	}

	if($parent_section == '/') {
		$parent_section = '';
	}
	$link = $parent_section.$link;
	$filename = WB_PATH.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
}

// $database = new database();
// Check if a page with same page filename exists
$sql = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'pages` '
     . 'WHERE `link` = \''.$link.'\' '
     .   'AND `page_id` != '.$page_id;
if( ($iSamePages = intval($database->get_one($sql))) > 0 ){
	$admin->print_error($mLang->MESSAGE_PAGES_PAGE_EXISTS, $target_url);
}

//if($get_same_page = $database->query($sql)){
//	if($get_same_page->numRows() > 0)
//	{
//		$admin->print_error($mLang->MESSAGE_PAGES_PAGE_EXISTS, $target_url);
//	}
//}

// Update page with new order
//$sql = 'UPDATE `'.TABLE_PREFIX.'pages` SET `parent`='.$parent.', `position`='.$position.' WHERE `page_id`='.$page_id.'';
//$database->query($sql);

// Get page trail
$page_trail = get_page_trail($page_id);

// Update page settings in the pages table
$sql = 'UPDATE `'.TABLE_PREFIX.'pages` '
	 . 'SET `parent`='.$parent.', '
	 .     '`page_title`=\''.$database->escapeString($page_title).'\', '
	 .     '`tooltip`=\''.$database->escapeString($page_title).'\', '
	 .     '`page_icon` =\''.$database->escapeString($sPageIcon).'\', '
	 .     '`menu_title`=\''.$database->escapeString($menu_title).'\', '
	 .     '`menu_icon_0` =\''.$database->escapeString($sMenuIcon0).'\', '
	 .     '`menu_icon_1` =\''.$database->escapeString($sMenuIcon1).'\', '
	 .     '`menu`='.$menu.', '
	 .     '`level`='.$level.', '
	 .     '`page_trail`=\''.$page_trail.'\', '
	 .     '`root_parent`='.$root_parent.', '
	 .     '`link`=\''.$database->escapeString($link).'\', '
	 .     '`template`=\''.$template.'\', '
	 .     '`target`=\''.$target.'\', '
	 .     '`description`=\''.$database->escapeString($description).'\', '
	 .     '`keywords`=\''.$database->escapeString($keywords).'\', '
	 .     '`position`='.$position.', '
	 .     '`visibility`=\''.$visibility.'\', '
	 .     '`searching`='.$searching.', '
	 .     '`language`=\''.$language.'\', ';
if($admin->ami_group_member('1')) {
	$sql .= ''
	     . '`admin_groups`=\''.$sAdminGroups.'\', '
	     . '`admin_users`=\''.$sAdminUsers.'\', ';
}
	$sql .= ''
	 . '`viewing_groups`=\''.$sViewingGroups.'\', '
	 . '`viewing_users`=\''.$sViewingUsers.'\', '
	 . '`page_code`='.$page_code.' '
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

// using standard function by core,
function fix_page_trail($page_id) {
	global $database,$admin,$target_url,$pagetree_url,$mLang;

	$target_url = (isset($_POST['back_submit'])) ? $pagetree_url : $target_url;
	
// Work out level
	$level = level_count($page_id);
// Work out root parent
	$root_parent = root_parent($page_id);
// Work out page trail
	$page_trail = get_page_trail($page_id);

// Update page with new level and link
	$sql  = 'UPDATE `'.TABLE_PREFIX.'pages` '
	      . 'SET `root_parent` = '.$root_parent.', '
	      .     '`level` = '.$level.', '
	      .     '`page_trail` = \''.$page_trail.'\' '
	      .'WHERE `page_id` = '.$page_id;

	if($database->query($sql)) {
		$admin->print_success($mLang->MESSAGE_PAGES_SAVED_SETTINGS, $target_url );
	} else {
		$admin->print_error($database->get_error(), $target_url );
	}
}

// Fix sub-pages page trail
fix_page_trail($page_id);

/**
 * 
 * BEGIN page "access file" code
 * first check for existing pages directory
 * if not exists try to create
 * otherwise acess denied
 * 
 */

$bCanCreateAcessFiles = make_dir(WB_PATH.PAGES_DIRECTORY);
$bCanCreateAcessFiles = (($bCanCreateAcessFiles==true) ? file_exists(WB_PATH) && is_writable(WB_PATH.PAGES_DIRECTORY) : false );

if( !$bCanCreateAcessFiles )
{
	$admin->print_error($mLang->MESSAGE_PAGES_CANNOT_CREATE_ACCESS_FILE, $target_url);
} else {
// Create a new file in the /pages dir if title changed
	$old_filename = WB_PATH.PAGES_DIRECTORY.$old_link.PAGE_EXTENSION;
	$sub_pages = get_subs($page_id, array());
//	$sub_pages = get_subs($sub_pages['0'], array());

// First check if we need or force to create a new file
	if( ($old_link != $link) || (!file_exists($filename)) || ( $bAccessFileOverwrite==true ) ) {
// Delete old file
		$old_filename = WB_PATH.PAGES_DIRECTORY.$old_link.PAGE_EXTENSION;
		if(file_exists($old_filename))
		{
			unlink($old_filename);
		}
// Create access file
		create_access_file($filename,$page_id,$level);
		if(!file_exists($filename)) {
			$admin->print_error($mLang->MESSAGE_PAGES_CANNOT_CREATE_ACCESS_FILE);
		}
// Move a directory for this page
		if(is_writeable(WB_PATH.PAGES_DIRECTORY.$old_link.'/') && !is_dir(WB_PATH.PAGES_DIRECTORY.$link.'/'))
		{
			rename(WB_PATH.PAGES_DIRECTORY.$old_link.'/', WB_PATH.PAGES_DIRECTORY.$link.'/');
		}
// Update any pages that had the old link with the new one
		$old_link_len = strlen($old_link);
// $query_subs = $database->query("SELECT page_id,link,level FROM ".TABLE_PREFIX."pages WHERE link LIKE '%$old_link/%' ORDER BY LEVEL ASC");
		$sql = 'SELECT `page_id`,`link`,`level` FROM `'.TABLE_PREFIX.'pages` '
		      .'WHERE `link` LIKE \'%'.$old_link.'/%\' '
		      .'ORDER BY `level` ASC ';
		if ($oResSubs = $database->query($sql) ) {
			if($oResSubs->numRows() > 0)
			{
				while($sub = $oResSubs->fetchRow(MYSQL_ASSOC))
				{
					// Double-check to see if it contains old link
					if(substr($sub['link'], 0, $old_link_len) == $old_link) {
						// Get new link
						$replace_this = $old_link;
						$old_sub_link_len =strlen($sub['link']);
						$new_sub_link = $link.'/'.substr($sub['link'],$old_link_len+1,$old_sub_link_len);
						// Work out level
						$new_sub_level = level_count($sub['page_id']);
						// Update level and link
// $database->query("UPDATE ".TABLE_PREFIX."pages SET link = '$new_sub_link', level = '$new_sub_level' WHERE page_id = '".$sub['page_id']."' LIMIT 1");
						$sql = 'UPDATE `'.TABLE_PREFIX.'pages` SET '
						      .'`link` = \''.$new_sub_link.'\', '
						      .'`level` = '.(int)$new_sub_level.' '
						      .'WHERE `page_id` = '.$sub['page_id'];
						if( $database->query($sql) ) {
							// Re-write the access file for this page
							$old_subpage_file = WB_PATH.PAGES_DIRECTORY.$new_sub_link.PAGE_EXTENSION;
							if(file_exists($old_subpage_file)) {
								unlink($old_subpage_file);
							}
							$sAccessFile = WB_PATH.PAGES_DIRECTORY.$new_sub_link.PAGE_EXTENSION;
							create_access_file($sAccessFile, $sub['page_id'], $new_sub_level);
							if(!file_exists($sAccessFile)) {
								$admin->print_error($mLang->MESSAGE_PAGES_CANNOT_CREATE_ACCESS_FILE);
							} else {
							}
						}
					}
				}
			}
		}
	}
}
$dir = (WB_PATH.PAGES_DIRECTORY);
//$aDebugMessage = rebuildFolderProtectFile($dir);
//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//print_r( $aDebugMessage ); print '</pre>';

$admin->print_footer();
