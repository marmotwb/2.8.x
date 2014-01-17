<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}
// Create new admin object and print admin header
if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }
$oReg  = WbAdaptor::getInstance();
$oDb   = WbDatabase::getInstance();
$mLang = Translate::getinstance();
$mLang->enableAddon('admin\pages');

// suppress to print the header, so no new FTAN will be set
$admin = new admin('Pages', 'pages_add', false);
if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($mLang->MESSAGE_GENERIC_SECURITY_ACCESS);
}

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Get values
//$title = str_replace(array("[[", "]]"), '', htmlspecialchars($admin->get_post_escaped('title')));
$title = ($admin->StripCodeFromText($admin->get_post('title')));
$module = preg_replace('/[^a-z0-9_-]/i', "", $admin->get_post('type')); // fix secunia 2010-93-4
$parent = intval($admin->get_post('parent')); // fix secunia 2010-91-2
$visibility = $admin->get_post('visibility');
if (!in_array($visibility, array('public', 'private', 'registered', 'hidden', 'none'))) {$visibility = 'public';} // fix secunia 2010-91-2
$admin_groups = $admin->get_post('admin_groups');
$viewing_groups = $admin->get_post('viewing_groups');

// Work-out if we should check for existing page_code
$field_set = $oDb->isField($oDb->TablePrefix.'pages', 'page_code');

// add Admin to admin and viewing-groups
$admin_groups[] = 1;
$viewing_groups[] = 1;

// After check print the header
$admin->print_header();
// check parent page permissions:
if ($parent!=0) {
	if (!$admin->get_page_permission($parent,'admin'))
    {
        $admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
    }

} elseif (!$admin->get_permission('pages_add_l0','system'))
{
	$admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
}

// check module permissions:
if (!$admin->get_permission($module, 'module'))
{
	$admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
}

// Validate data
if($title == '' || substr($title,0,1)=='.')
{
	$admin->print_error($title.'::'.$mLang->MESSAGE_PAGES_BLANK_PAGE_TITLE);
}

// Check to see if page created has needed permissions
if(!in_array(1, $admin->get_groups_id()))
{
	$admin_perm_ok = false;
	foreach ($admin_groups as $adm_group)
    {
		if (in_array($adm_group, $admin->get_groups_id()))
        {
			$admin_perm_ok = true;
		}
	}
	if ($admin_perm_ok == false)
    {
		$admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
	}
	$admin_perm_ok = false;
	foreach ($viewing_groups as $view_group)
    {
		if (in_array($view_group, $admin->get_groups_id()))
        {
			$admin_perm_ok = true;
		}
	}
	if ($admin_perm_ok == false)
    {
		$admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
	}
}

$admin_groups = implode(',', $admin_groups);
$viewing_groups = implode(',', $viewing_groups);

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

$link = '/'.page_filename($title);
// Work-out what the link and page filename should be
if($parent == '0')
{
	// rename menu titles: index && intro to prevent clashes with intro page feature and WB core file /pages/index.php
	if( defined('PAGES_DIRECTORY') && trim(PAGES_DIRECTORY,'/')=='' ) {
// Work-out what the link should be
		$denied = in_array(trim($link,'/'), $forbidden['List']);
		if( $denied )
		{
//			$link .= '_'.$iNextPageId;
			$admin->print_error($mLang->MESSAGE_PAGES_CANNOT_CREATE_PROTECTED_FILE);
		}
	}
	$filename = WB_PATH.PAGES_DIRECTORY.$link.PAGE_EXTENSION;

} else {
	$parent_section = '';
	$parent_titles = array_reverse(get_parent_titles($parent));
	foreach($parent_titles AS $parent_title)
    {
		$parent_section .= page_filename($parent_title).'/';
	}
	if($parent_section == '/') { $parent_section = ''; }
	$link = '/'.$parent_section.page_filename($title);
	$filename = WB_PATH.PAGES_DIRECTORY.'/'.$parent_section.page_filename($title).PAGE_EXTENSION;
	make_dir(WB_PATH.PAGES_DIRECTORY.'/'.$parent_section);
}

// Check if a page with same page filename exists
//$get_same_page = $oDb->query("SELECT page_id FROM ".TABLE_PREFIX."pages WHERE link = '$link'");
//if($get_same_page->numRows() > 0 OR file_exists(WB_PATH.PAGES_DIRECTORY.$link.PAGE_EXTENSION) OR file_exists(WB_PATH.PAGES_DIRECTORY.$link.'/'))
//{
//	$admin->print_error($MESSAGE['PAGES_PAGE_EXISTS']);
//}
$bLinkExists = file_exists(WB_PATH.PAGES_DIRECTORY.$link.PAGE_EXTENSION) || file_exists(WB_PATH.PAGES_DIRECTORY.$link);

// UNLOCK TABLES
$sql = 'SELECT COUNT(*) FROM `'.$oDb->TablePrefix.'pages` '
     . 'WHERE `link` = \''.$link.'\' ';
if( (($iSamePages = intval($oDb->getOne($sql))) > 0) || $bLinkExists ){
	$admin->print_error($MESSAGE['PAGES_PAGE_EXISTS']);
}

// Include the ordering class
require(WB_PATH.'/framework/class.order.php');
$order = new order($oDb->TablePrefix.'pages', 'position', 'page_id', 'parent');
// First clean order
$order->clean($parent);
// Get new order
$position = $order->get_new($parent);

// Work-out if the page parent (if selected) has a seperate template or language to the default
$query_parent = $oDb->doQuery("SELECT template, language FROM ".$oDb->TablePrefix."pages WHERE page_id = '$parent'");
if($query_parent->numRows() > 0)
{
	$fetch_parent = $query_parent->fetchRow();
	$template = $fetch_parent['template'];
	$language = $fetch_parent['language'];
} else {
	$template = '';
	$language = DEFAULT_LANGUAGE;
}

// Insert page into pages table
$sql = 'INSERT INTO `'.$oDb->TablePrefix.'pages` '
     . 'SET `parent` = '.$parent.', '
     .     '`target` = \'_top\', '
     .     '`page_title` = \''.$title.'\', '
     .     '`menu_title` = \''.$title.'\', '
     .     '`tooltip` = \''.$title.'\', '
     .     '`template` = \''.$template.'\', '
     .     '`visibility` = \''.$visibility.'\', '
     .     '`position` = '.$position.', '
     .     '`menu` = 1, '
     .     '`language` = \''.$language.'\', '
     .     '`searching` = 1, '
     .     '`modified_when` = '.time().', '
     .     '`modified_by` = '.$admin->get_user_id().', '
     .     '`admin_groups` = \''.$admin_groups.'\', '
     .     '`viewing_groups` = \''.$viewing_groups.'\'';

if(!$oDb->doQuery($sql)) {
	if($oDb->isError())
	{
		$admin->print_error($oDb->getError());
	}
}

// Get the page id
//$page_id = $oDb->getOne("SELECT LAST_INSERT_ID()");
$page_id = $oDb->LastInsertId;
// Work out level
$level = level_count($page_id);
// Work out root parent
$root_parent = root_parent($page_id);
// Work out page trail
$page_trail = get_page_trail($page_id);

/*
$oDb->doQuery("UPDATE ".$oDb->TablePrefix."pages SET link = '$link', level = '$level', root_parent = '$root_parent', page_trail = '$page_trail' WHERE page_id = '$page_id'");
*/
// Update page with new level and link
$sql = 'UPDATE `'.$oDb->TablePrefix.'pages` '
     . 'SET `root_parent` = '.$root_parent.', '
     .     '`level` = '.$level.', '
     .     '`link` = \''.$link.'\', '
     .     '`page_trail` = \''.$page_trail.'\' '
     .     ( (defined('PAGE_LANGUAGES') && PAGE_LANGUAGES) && $field_set
              && ($language == DEFAULT_LANGUAGE) && class_exists('m_MultiLingual_Lib')
             ? ', `page_code` = '.(int)$page_id.' '
             : ''
           )
     . 'WHERE `page_id` = '.$page_id;
$oDb->doQuery($sql);
if($oDb->isError())
{
	$admin->print_error($oDb->getError());
}

// add position 1 to new page section
$position = 1;

// Add new record into the sections table
// Insert module into DB
$sql = 'INSERT INTO `'.$oDb->TablePrefix.'sections` '
     . 'SET `page_id` = '.(int)$page_id.', '
     .     '`module` = \''.$module.'\', '
     .     '`position` = '.(int)$position.', '
     .     '`block` = \'1\', '
     .     '`publ_start` = \'0\','
     .     '`publ_end` = \'0\' ';
if($oDb->doQuery($sql)) {
	// Get the section id
	$section_id = $oDb->getOne("SELECT LAST_INSERT_ID()");
	// Include the selected modules add file if it exists
	if(file_exists(WB_PATH.'/modules/'.$module.'/add.php'))
    {
		require(WB_PATH.'/modules/'.$module.'/add.php');
	}
}
// Create a new file in the /pages dir
$sNewLink = str_replace($oReg->AppPath.$oReg->PagesDir, '', str_replace('\\', '/', $filename));
try{
    $oAccFile = new AccessFile($oReg->AppPath.$oReg->PagesDir, $sNewLink, $page_id);
    $oAccFile->write();
    unset($oAccFile);
} catch (AccessFileException $e) {
    $sMsg = $oLang->MESSAGE_PAGES_CANNOT_CREATE_ACCESS_FILE
          . '<br />'.$e->getMessage();
    $admin->print_error($sMsg);
}
// Check if there is a db error, otherwise say successful
if($oDb->isError()) {
	$admin->print_error($oDb->getError().' (sections)');
} else {
	$admin->print_success($mLang->MESSAGE_PAGES_ADDED, ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

$mLang->disableAddon();
// Print admin footer
$admin->print_footer();
