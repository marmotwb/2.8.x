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
// Create new admin object
if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}

if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

$admin = new admin('Pages', 'pages_settings');
/*-- Parent page list ------------------------------------------------------------------*/
	function parent_list($parent)
	{
		global $admin, $database, $oTpl, $aCurrentPage, $field_set;
		$sDisabled = ' disabled="disabled"';
		$sSelected = ' selected="selected"';

		$sql = 'SELECT `page_id`, `level`, `link`, `parent`, `menu_title`, `page_title`, '
		     .        '`language`, `admin_groups`, `admin_users`, `visibility`, '
		     .        '`viewing_groups`, `viewing_users` '
		     . 'FROM `'.TABLE_PREFIX.'pages` '
			 . 'WHERE `parent`='.$parent.' '
			 . 'ORDER BY `position` ASC';
		$get_pages = $database->query($sql);

		while($page = $get_pages->fetchRow(MYSQL_ASSOC))
		{
			if(!$admin->page_is_visible($page)) { continue; }
			// if parent = 0 set flag_icon
			$oTpl->set_var('FLAG_ROOT_ICON',' none ');
			if( $page['parent'] == 0  && $field_set) {
				$oTpl->set_var('FLAG_ROOT_ICON','url('.WB_REL.'/'.str_replace(WB_URL, '', THEME_URL).'/images/flags/'.strtolower($page['language']).'.png)');
			}
			// If the current page cannot be parent, then its children neither
			$list_next_level = true;
			// Stop users from adding pages with a level of more than the set page level limit
			if($page['level']+1 < PAGE_LEVEL_LIMIT)
			{
			// Get user permisions
				$can_modify = ($admin->ami_group_member($page['admin_groups']) ||
				               $admin->is_group_match($admin->get_user_id(), $page['admin_users']));
				// Title -'s prefix
				$title_prefix = '';
				for($i = 1; $i <= $page['level']; $i++) { $title_prefix .= ' - - &nbsp;'; }
				$oTpl->set_var(array(
							'ID' => $page['page_id'],
							'TITLE' => ($title_prefix.$page['menu_title']),
							'MENU-TITLE' => ($title_prefix.$page['menu_title']),
							'PAGE-TITLE' => ($title_prefix.$page['page_title']),
							'FLAG_ICON' => ' none ',
							));
				if($aCurrentPage['parent'] == $page['page_id']) {
					$oTpl->set_var('SELECTED', $sSelected);
				} elseif($aCurrentPage['page_id'] == $page['page_id']) {
					$oTpl->set_var('SELECTED', $sDisabled.' class="disabled"');
					$list_next_level=false;
				} elseif($can_modify != true) {
					$oTpl->set_var('SELECTED', $sDisabled.' class="disabled"');
				} else {
					$oTpl->set_var('SELECTED', '');
				}
				$oTpl->parse('parent_page_list', 'parent_page_list_block', true);
			}
			if ($list_next_level) {
			  parent_list($page['page_id']);
			}
		}
	} // end of function parent_list
/* -------------------------------------------------------------------------------------*/
//	$mLang = ModLanguage::getInstance();
//	$mLang->setLanguage(dirname(__FILE__).'/languages/', LANGUAGE, DEFAULT_LANGUAGE);
	$mLang = Translate::getinstance();
	$mLang->enableAddon('admin\pages');
	$oDb = WbDatabase::getInstance();
	$sDisabled = ' disabled="disabled"';
	$sSelected = ' selected="selected"';
	$sChecked  = ' checked="checked"';

// Get page id
	$page_id = $_GET['page_id'] ? intval($_GET['page_id']) : 0;
	if(!$page_id) {
		header("Location: index.php");
		exit(0);
	}
/*-- get all details of current page ---------------------------------------------------*/
	$sql = 'SELECT * FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
	if( ($oPages = $database->query($sql)) ) {
		$aCurrentPage = $oPages->fetchRow(MYSQL_ASSOC);
		// Work-out if we should set seo_title
		$aCurrentPage['seo_title'] = basename($aCurrentPage['link']);
		// Work-out if we should check for existing page_code
		$field_set = isset($aCurrentPage['page_code']);
		if( !$admin->ami_group_member($aCurrentPage['admin_groups']) &&
			!$admin->is_group_match($admin->get_user_id(), $aCurrentPage['admin_users']) )
		{
			$admin->print_error($MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS']);
		}
	}else {
		$admin->print_header();
		$admin->print_error($database->get_error());
	}
	if(!isset($aCurrentPage['page_code'])) {
		$database->field_add(TABLE_PREFIX.'pages', 'page_code', 'INT NOT NULL DEFAULT \'0\'');
	}
	if($oPages->numRows() == 0) {
		$admin->print_header();
		$admin->print_error($MESSAGE['PAGES_NOT_FOUND']);
	}
/* -------------------------------------------------------------------------------------*/

/*-- test if multilanguage page_code -----------------------------------------------------*/
    function getLangInUsedDbResult ( $sLangKey='' ) {
    global $admin,$aCurrentPage;
    	$aPage = array();
    	$aRetval = array();
    	$oDb = WbDatabase::getInstance();
    	if( (defined('PAGE_LANGUAGES') && PAGE_LANGUAGES) && class_exists('m_MultiLingual_Lib'))
    	{
    		$sql = 'SELECT DISTINCT `language`,'
    		     .                 '`page_id`,`level`,`parent`,`root_parent`,`page_code`,`link`,'
    		     .                 '`visibility`,`viewing_groups`,`viewing_users`,`position`,`page_title` '
                 . 'FROM `'.$oDb->TablePrefix.'pages` '
                 . 'WHERE `level`= 0 '
                 .   'AND `root_parent`=`page_id` '
                 .   'AND (`visibility`!=\'none\' '
                 .   'AND `visibility`!=\'hidden\') '
                 .   ( ($sLangKey!='') ? ' AND `language` = \''.$sLangKey.'\' ' : '')
//                 .   ( (defined('MULTIPLE_MENUS') && MULTIPLE_MENUS == 'true') ? ' AND `menu` = \''.$aCurrentPage['menu'].'\' ' : '')
                 .   'GROUP BY `language` '
                 .   'ORDER BY `position`';
        	if($oRes = $oDb->query($sql)){
        		while($aPage = $oRes->fetchRow(MYSQL_ASSOC))
        		{
        			if(!$admin->page_is_visible($aPage)) {continue;}
        			$aRetval[$aPage['language']] = $aPage;
        		}
            }
    	}
        return ( sizeof($aRetval) ? $aRetval : false);
    }
/* -------------------------------------------------------------------------------------*/
// Get display name of person who last modified the page
	$user=$admin->get_user_details($aCurrentPage['modified_by']);
// Convert the unix ts for modified_when to human a readable form
	if($aCurrentPage['modified_when'] != 0) {
		$modified_ts = gmdate(TIME_FORMAT.', '.DATE_FORMAT, $aCurrentPage['modified_when']+TIMEZONE);
	} else {
		$modified_ts = 'Unknown';
	}
// Setup template object, parse vars to it, then parse it
// Create new template object
	$oTpl = new Template(dirname($admin->correct_theme_source('pages_settings.htt')),'keep' );
	$oTpl->set_file('page', 'pages_settings.htt');
	$oTpl->set_block('page', 'main_block', 'main');
	$oTpl->set_var('FTAN', $admin->getFTAN());
//    $sShowIconDirText = $mLang->TEXT_EXPAND'].' ';
	$sql = 'SELECT `value` FROM `'.TABLE_PREFIX.'settings` WHERE `name` = \'page_extendet\'';
//	if($page_extend = $database->get_one($sql)) {}
	$page_extend = (defined('PAGE_EXTENDET') ? filter_var(PAGE_EXTENDET, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : false);
	$sShowIconDirText = ($page_extend==true) ? $mLang->TEXT_HIDE_ADVANCED : $mLang->TEXT_SHOW_ADVANCED;

	$oTpl->set_var(array(
			'PAGE_ID'              => $aCurrentPage['page_id'],
			'PAGE_IDKEY'           => $admin->getIDKEY($aCurrentPage['page_id']),
			'PAGE_TITLE'           => ($aCurrentPage['page_title']),
			'PAGE_LINK'            => ($aCurrentPage['link']),
			'MENU_TITLE'           => ($aCurrentPage['menu_title']),
			'SEO_TITLE'            => ($aCurrentPage['seo_title']=='') ? $aCurrentPage['menu_title'] : $aCurrentPage['seo_title'],
			'DESCRIPTION'          => ($aCurrentPage['description']),
			'KEYWORDS'             => ($aCurrentPage['keywords']),
			'MODIFIED_BY'          => $user['display_name'],
			'MODIFIED_BY_USERNAME' => $user['username'],
			'MODIFIED_WHEN'        => $modified_ts,
			'TEXT_SAVE_BACK'       => $mLang->TEXT_SAVE.' &amp; '.$mLang->TEXT_BACK,
			'TEXT_EXTENDED'        => $sShowIconDirText,
			'VISIBILITY'           => 'visibility',
			'ADMIN_URL'            => ADMIN_URL,
			'WB_URL'               => WB_URL,
			'THEME_URL'            => THEME_URL
			));

	if( $admin->get_permission('pages_modify') )
	{
		$oTpl->set_var(array(
				'MODIFY_LINK_BEFORE' => '<a href="'.ADMIN_URL.'/pages/modify.php?page_id='.$aCurrentPage['page_id'].'">',
				'MODIFY_LINK_AFTER' => '</a>',
				'DISPLAY_MANAGE_MODIFY' => 'link',
				));
	} else {
		$oTpl->set_var(array(
				'MODIFY_LINK_BEFORE' => '<span class="bold grey">',
				'MODIFY_LINK_AFTER' => '</span>',
				'DISPLAY_MANAGE_MODIFY' => 'link',
				));
	}


/*-- workout if we should show the "manage sections" link ------------------------------*/
	$sql = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'sections` '
	     . 'WHERE `page_id`='.$page_id.' AND `module`=\'menu_link\'';
	$bIsMenuLink = (intval($database->get_one($sql)) != 0);
//	$oTpl->set_block('main_block', 'show_manage_sections_block', 'show_manage_sections');
//	if(!$bIsMenuLink && (MANAGE_SECTIONS == true) && $admin->get_permission('pages_add') )
	if((MANAGE_SECTIONS == true) && $admin->get_permission('pages_add') )
	{
//		$oTpl->parse('show_manage_sections', 'show_manage_sections_block', true);
		$oTpl->set_var(array(
				'SECTIONS_LINK_BEFORE' => '<a href="'.ADMIN_URL.'/pages/sections.php?page_id='.$aCurrentPage['page_id'].'">',
				'SECTIONS_LINK_AFTER' => '</a>',
				'DISPLAY_MANAGE_SECTIONS' => 'link',
				));
	} else {
//		$oTpl->set_block('show_manage_sections', '');
		$oTpl->set_var(array(
				'SECTIONS_LINK_BEFORE' => '<span class="bold grey">',
				'SECTIONS_LINK_AFTER' => '</span>',
				'DISPLAY_MANAGE_SECTIONS' => 'link',
				));
	}

/*-- collect page-icons for select boxes -----------------------------------------------*/
  $sAllowedImageTypes = '\.jpg|\.jpeg|\.png|\.gif';
	$aPageIcons = array();
	$aIcon = array();
	$sTemplate = ($aCurrentPage['template'] == '' ? DEFAULT_TEMPLATE : $aCurrentPage['template']);
	$sIconDir = str_replace('\\', '/', ((defined('PAGE_ICON_DIR') && PAGE_ICON_DIR != '') ? PAGE_ICON_DIR : MEDIA_DIRECTORY));
	$sIconDir = str_replace('/*', '/'.$sTemplate, $sIconDir);
	$bIconDirHide = ($page_extend==true) ? 'display:block;' : 'display:none;';

//	$oTpl->set_var('ICON_DIR', WB_REL.$sIconDir);
	$sHelp = replaceVars($mLang->HELP_PAGE_IMAGE_DIR, array('icon_dir'=>WB_REL.$sIconDir ) );

	$sql = 'SELECT `link` FROM `'.TABLE_PREFIX.'pages` '
	     . 'WHERE `page_id`='.$page_id.' ';
	$sAccesFile = (($database->get_one($sql)));
	$sFilename = replaceVars($mLang->HELP_SEO_TITLE, array('filename'=>PAGES_DIRECTORY.$sAccesFile.PAGE_EXTENSION ) );

	$oTpl->set_var('PAGE_EXTENDET_HIDE',  $bIconDirHide);
	$oTpl->set_var('p_page_icon_dir',  p($sHelp,$mLang->TEXT_PAGE_ICON_DIR));
	$oTpl->set_var('p_menu_icon0_dir', p($sHelp,$mLang->TEXT_MENU_ICON_0_DIR));
	$oTpl->set_var('p_menu_icon1_dir', p($sHelp,$mLang->TEXT_MENU_ICON_1_DIR));
	$oTpl->set_var('p_menu_page_code', p($mLang->HELP_PAGE_CODE,$mLang->TEXT_PAGE_CODE));
	$oTpl->set_var('p_menu_filename',  p($sFilename,$mLang->TEXT_SEO_TITLE));

	if(is_readable(WB_PATH.$sIconDir)) {
		$oIterator = new DirectoryIterator(WB_PATH.$sIconDir);
		foreach ($oIterator as $fileinfo) {
			if(preg_match('/'.$sAllowedImageTypes.'$/i', $fileinfo->getFilename())) {
				$sItem = str_replace(str_replace('\\', '/', WB_PATH), '',
						             str_replace('\\', '/', $fileinfo->getPathname()));
//				$sItem = WB_REL.$sItem;
				$aPageIcons[] = array('VALUE'=>$sItem, 'NAME'=>$fileinfo->getFilename());
			}
		}
	}
/*-- show page-icon select box ---------------------------------------------------------*/
	$oTpl->set_block('main_block', 'page_icon_list_block', 'page_icon_list');
	if(sizeof($aPageIcons)>0){
		foreach($aPageIcons as $value) {
			$aIcon = $value;
			$aIcon['SELECTED'] = ($aCurrentPage['page_icon'] == $aIcon['VALUE'] ? $sSelected : '');
			$oTpl->set_var($aIcon);
			$oTpl->parse('page_icon_list', 'page_icon_list_block', true);
		}
	} else {
	$oTpl->parse('page_icon_list', '');
	}
/*-- show menu-icon-0 select box -------------------------------------------------------*/
	$oTpl->set_block('main_block', 'menu_icon0_list_block', 'menu_icon0_list');
	if(sizeof($aPageIcons)>0){
		foreach($aPageIcons as $value) {
			$aIcon = $value;
			$aIcon['SELECTED'] = ($aCurrentPage['menu_icon_0'] == $aIcon['VALUE'] ? $sSelected : '');
			$oTpl->set_var($aIcon);
			$oTpl->parse('menu_icon0_list', 'menu_icon0_list_block', true);
		}
	} else {
	$oTpl->parse('menu_icon0_list', '');
	}
/*-- show menu-icon-1 select box -------------------------------------------------------*/
	$oTpl->set_block('main_block', 'menu_icon1_list_block', 'menu_icon1_list');
	if(sizeof($aPageIcons)>0){
		foreach($aPageIcons as $value) {
			$aIcon = $value;
			$aIcon['SELECTED'] = ($aCurrentPage['menu_icon_1'] == $aIcon['VALUE'] ? $sSelected : '');
			$oTpl->set_var($aIcon);
			$oTpl->parse('menu_icon1_list', 'menu_icon1_list_block', true);
		}
	} else {
	$oTpl->parse('menu_icon1_list', '');
	}
/*-- show visibility select box --------------------------------------------------------*/
	$aVisibility = array();
    $sLangKey = '';
    if( sizeof(getLangInUsedDbResult())>1 ) {
        $sLangKey = DEFAULT_LANGUAGE;
    	$aLangStartPageId = array();
        $aLangStartPageId = getLangInUsedDbResult($sLangKey);
        $iLangStartPageId = $aLangStartPageId[$sLangKey]['page_id'];
    }

	$aVisibility['PUBLIC_SELECTED']     = ($aCurrentPage['visibility'] == 'public' ? $sSelected : '');
	$aVisibility['PRIVATE_SELECTED']    = ($aCurrentPage['visibility'] == 'private' ? $sSelected : '');
	$aVisibility['REGISTERED_SELECTED'] = ($aCurrentPage['visibility'] == 'registered' ? $sSelected : '');
	$aVisibility['HIDDEN_SELECTED']     = ($aCurrentPage['visibility'] == 'hidden' ? $sSelected : '');
	$aVisibility['NO_VIS_SELECTED']     = ($aCurrentPage['visibility'] == 'none' ? $sSelected : '');
    if( ($aCurrentPage['language'] == $sLangKey) && ($aCurrentPage['page_id']==$iLangStartPageId) ) {
    	$aVisibility['HIDDEN_SELECTED'] = ($aCurrentPage['visibility'] == 'hidden' ? $sDisabled : $sDisabled);
    	$aVisibility['NO_VIS_SELECTED'] = ($aCurrentPage['visibility'] == 'none' ? $sDisabled : $sDisabled);
    }
	$oTpl->set_var($aVisibility);
/*-- admin group list block ------------------------------------------------------------*/
	$aAdminGroups = explode(',', '1,'.$aCurrentPage['admin_groups']);
	$sAdminGroups = implode(',', array_unique($aAdminGroups));
	$sql = 'SELECT `group_id` `ID`, `name` `NAME`, `system_permissions` `permissions` '
	     . 'FROM `'.TABLE_PREFIX.'groups` '
	     . 'ORDER BY (`ID` NOT IN('.$sAdminGroups.')), `NAME`';
	if( ($oGroups = $database->query($sql)))
	{
		$oTpl->set_block('main_block', 'admin_group_list_block', 'admin_group_list');
		while( $aGroup = $oGroups->fetchRow(MYSQL_ASSOC))
		{
			if($aGroup['ID'] == 1) {
			// never uncheck admin group
				$aGroup['CHECKED'] = $sChecked;
				$aGroup['DISABLED'] = $sDisabled;
			}else {
			// skip groups without system_permissions
				if(!$admin->is_group_match('pages_modify', $aGroup['permissions'])) { continue; }
			// check already selected groups
				$bChecked = $admin->is_group_match($aGroup['ID'], $aCurrentPage['admin_groups']);
			// disable selected groups where current user is not member of
				$bDisabled = !$admin->ami_group_member('1');
				$aGroup['CHECKED']  = $bChecked ? $sChecked : '';
				$aGroup['DISABLED'] = ($bChecked && $bDisabled) ? $sDisabled : '';
			}
			unset($aGroup['permissions']);
			$oTpl->set_var($aGroup);
			$oTpl->parse('admin_group_list', 'admin_group_list_block', true);
		}
	}

/*-- viewer group list block -----------------------------------------------------------*/
	$aViewingGroups = explode(',', '1,'.$aCurrentPage['viewing_groups']);
	$sViewingGroups = implode(',', array_unique($aViewingGroups));
	$oTpl->set_block('main_block', 'viewer_group_list_block', 'viewer_group_list');
	$sql = 'SELECT `group_id` `ID`, `name` `NAME` '
		 . 'FROM `'.TABLE_PREFIX.'groups` '
	     . 'ORDER BY (`ID` NOT IN('.$sViewingGroups.')), `NAME`';
	if(($oGroups = $database->query($sql))) {
		while($aGroup = $oGroups->fetchRow(MYSQL_ASSOC)) {
			if($aGroup['ID'] == 1) {
			// never uncheck admin group
				$aGroup['CHECKED'] = $sChecked;
				$aGroup['DISABLED'] = $sDisabled;
			}else {
			// check already selected groups
				$bChecked = $admin->is_group_match($aGroup['ID'], $aCurrentPage['viewing_groups']);
			// disable selected groups where current user is not member of
				$bDisabled = !$admin->ami_group_member('1');
				$aGroup['CHECKED']  = $bChecked ? $sChecked : '';
				$aGroup['DISABLED'] = ($bChecked && $bDisabled) ? $sDisabled : '';
			}
			$oTpl->set_var($aGroup);
			$oTpl->parse('viewer_group_list', 'viewer_group_list_block', true);
		}
	}

/*-- admin user list block -------------------------------------------------------------*/
// admin_group_show_list_block
	$oTpl->set_block('main_block', 'admin_group_show_list_block', 'admin_group_show_list');

	$aAdminUsers = ($aCurrentPage['admin_users'] == ''
	                ? array()
	                : explode(',', $aCurrentPage['admin_users']));
	$aAdminUsers = explode(',', $aCurrentPage['admin_users']);
	$oTpl->set_block('admin_group_show_list_block', 'admin_user_list_block', 'admin_user_list');
	$sAllowedAdminUsers = trim(implode(',',$aAdminUsers));
	$sAllowedAdminUsers = $sAllowedAdminUsers ? $sAllowedAdminUsers : '-1';
	$sql = 'SELECT `user_id`, `display_name`,`username` '
		 . 'FROM `'.TABLE_PREFIX.'users` '
	     . 'WHERE `active`=1 '
	     . 'ORDER BY (`user_id` NOT IN('.$sAllowedAdminUsers.')), `display_name`';
	if( ($oUsers = $database->query($sql)) ) {
		while($aUser = $oUsers->fetchRow(MYSQL_ASSOC)) {
			if($aUser['user_id'] == 1) { continue; }
			$oTpl->set_var(array(
				'ID'        => $aUser['user_id'],
				'NAME'      => $aUser['display_name'].' ('.$aUser['username'].')',
			    'SELECTED'  => (in_array($aUser['user_id'], $aAdminUsers) ? $sSelected : ''),
			));
			$oTpl->parse('admin_user_list', 'admin_user_list_block', true);
		}
	}
	if($admin->ami_group_member('1')) {
		$oTpl->parse('admin_group_show_list', 'admin_group_show_list_block', true);

	} else {
		$oTpl->parse('admin_group_show_list', '', true);
	}

/*-- viewer users list block -----------------------------------------------------------*/
	$aViewingUsers = ($aCurrentPage['viewing_users'] == ''
	                  ? array()
	                  : explode(',', $aCurrentPage['viewing_users']));
	$aViewingUsers = explode(',', $aCurrentPage['viewing_users']);
	$oTpl->set_block('main_block', 'viewer_user_list_block', 'viewer_user_list');
	$sAllowedViewingUsers = trim(implode(',',$aViewingUsers));
	$sAllowedViewingUsers = $sAllowedViewingUsers ? $sAllowedViewingUsers : '-1';
	$sql = 'SELECT `user_id`, `display_name`,`username` '
		 . 'FROM `'.TABLE_PREFIX.'users` '
	     . 'WHERE `active`=1 '
	     . 'ORDER BY (`user_id` NOT IN('.$sAllowedViewingUsers.')), `display_name`';
	if( ($oUsers = $database->query($sql)) ) {
		while($aUser = $oUsers->fetchRow(MYSQL_ASSOC)) {
			if($aUser['user_id'] == 1) { continue; }
			$oTpl->set_var(array(
				'ID'        => $aUser['user_id'],
				'NAME'      => $aUser['display_name'].' ('.$aUser['username'].')',
			    'SELECTED'  => (in_array($aUser['user_id'], $aViewingUsers) ? $sSelected : ''),
			));
			$oTpl->parse('viewer_user_list', 'viewer_user_list_block', true);
		}
	}

/*-- size user lists -------------------------------------------------------------------*/
	$aSkaleSizeOfList = array(0 => 5, 12 => 10, 25 => 20, 50 => 30, 75 => 40, 100 => 50);
	$iListSize = 6;
	if($oUsers) {
		$iNumberOfUsers = $oUsers->numRows();
		foreach($aSkaleSizeOfList as $key => $val){
			if($iNumberOfUsers > $key) {
				$iListSize = $val;
			}else { break; }
		}
	}
	$oTpl->set_var('USER_LIST_SIZE', $iListSize);

/*-- show private viewers block --------------------------------------------------------*/
	if($aCurrentPage['visibility'] == 'private' OR $aCurrentPage['visibility'] == 'registered')
	{
		$oTpl->set_var('DISPLAY_VIEWERS', '');
	} else {
		$oTpl->set_var('DISPLAY_VIEWERS', 'display:none;');
	}
/*-- start multilanguage page_code -----------------------------------------------------*/
//    $sLangKey='';
	$oTpl->set_block('main_block', 'show_page_code_block',  'show_page_code');
	if( (defined('PAGE_LANGUAGES') && PAGE_LANGUAGES) &&
		 isset($aCurrentPage['page_code']) && sizeof(getLangInUsedDbResult())>1 )
	{
		$aTplBlockData = array();
	// workout field is set but module missing
		$aTplBlockData['PAGE_CODE_LABEL_TEXT'] = $mLang->TEXT_PAGE_CODE;
		$aTplBlockData['PAGE_CODE_UPDATE_URL'] = WB_REL.'/modules/MultiLingual/update_keys.php?page_id='.$page_id;
	// read the tree of the found root element
		$oPageList = new a_pages_SmallRawPageTree();
		$aLangCodePagesList = $oPageList->getParentList($iLangStartPageId);
	// create option list for the select box
		$oTpl->set_block('show_page_code_block', 'page_code_list_block', 'page_code_list');
		$aTplItemData = array();
		$bPageCodeIsSelected = false;
	// add 'no selection' option at top
		if($admin->get_permission('pages_add_l0') OR !$aCurrentPage['level'])
		{
			$sThemeRel = WB_REL.'/'.str_replace(WB_URL, '', THEME_URL).'/images/flags/'.strtolower($sLangKey).'.png';
			$aTplItemData['PAGE_CODE_ICON_URL'] = 'url('.$sThemeRel.')';
			$aTplItemData['PAGE_CODE_VALUE']      = $iLangStartPageId;
			$aTplItemData['PAGE_CODE_PAGE_TITLE'] = $sLangKey;
			$bPageCodeIsSelected = ($aCurrentPage['page_code'] == 0);
			$aTplItemData['PAGE_CODE_SELECTED'] = ($bPageCodeIsSelected ? $sSelected : '');
			$oTpl->set_var($aTplItemData);
			$oTpl->parse('page_code_list', 'page_code_list_block', true);
			$aTplItemData = array();
		}
		$iLastEntryLevel = 0;
		$bSkipChildren = false;
	// loop through all items
		while (list(, $aPage) = each($aLangCodePagesList)) 
		{
		// skip child pages where current user has no rights for
			if($bSkipChildren && ($aPage['level'] > $iLastEntryLevel)) { continue; }
			$bSkipChildren   = false;
			$iLastEntryLevel = $aPage['level'];
		//skip entry if it's not visible
			if(($admin->page_is_visible($aPage)==false) && ($aPage['visibility'] <> 'none') ) { continue; }
		// insert language flag on level 0
			$sThemeRel = WB_REL.'/'.str_replace(WB_URL, '', THEME_URL).'/images/flags/'.strtolower($sLangKey).'.png';
			$aTplItemData['PAGE_CODE_ICON_URL'] = ($aPage['level'] ? 'none' : 'url('.$sThemeRel.')');
		// create indent chars
			$sTitlePrefix = str_repeat('--&nbsp;', $aPage['level']).'&nbsp;';
			$aTplItemData['PAGE_CODE_PAGE_TITLE'] = $sTitlePrefix . $aPage['menu_title'];
			$aTplItemData['PAGE_CODE_VALUE']      = intval($aPage['page_id']);
		// set SELECTED status of this entry
			if( $aPage['page_id'] == $aCurrentPage['page_code']
			    && $aCurrentPage['page_code'] != 0
				&& !$bPageCodeIsSelected
			  )
			{ // 
				$aTplItemData['PAGE_CODE_SELECTED'] = $sSelected;
				$bPageCodeIsSelected = true;
			} elseif(!$aPage['iswriteable'])
			{ // 
				$aTplItemData['PAGE_CODE_SELECTED'] = $sDisabled.' class="disabled"';
				$bSkipChildren = true;
			} else {
				$aTplItemData['PAGE_CODE_SELECTED'] = '';
			}
		// output item data
			$oTpl->set_var($aTplItemData);
			$oTpl->parse('page_code_list', 'page_code_list_block', true);
			$aTplItemData = array();
		}
	// output block data
		$oTpl->set_var($aTplBlockData);
		$oTpl->parse('show_page_code', 'show_page_code_block', true);
	}else {
		$oTpl->set_block('show_page_code', '');
	}
/*-- end multilanguage page_code -------------------------------------------------------*/

/*-- show list of parent pages ---------------------------------------------------------*/
	$oTpl->set_block('main_block', 'parent_page_list_block', 'parent_page_list');
	if($admin->get_permission('pages_add_l0') == true OR $aCurrentPage['level'] == 0) {
		$oTpl->set_var(array(
					'ID' => '0',
					'TITLE' => $mLang->TEXT_NONE,
					'SELECTED' => ($aCurrentPage['parent'] == 0 ? $sSelected : ''),
					) );
		$oTpl->parse('parent_page_list', 'parent_page_list_block', true);
	}

	parent_list(0);
	$oTpl->set_var('DISPLAY_MODIFIED', ($modified_ts == 'Unknown' ? 'hide' : ''));

/*-- show list of templates ------------------------------------------------------------*/
	$oTpl->set_block('main_block', 'template_list_block', 'template_list');
	$sql = 'SELECT * FROM `'.TABLE_PREFIX.'addons` '
	     . 'WHERE `type`=\'template\' AND `function`=\'template\' '
	     . 'ORDER BY `name`';
	if(($res_templates = $database->query($sql))) {
		while($rec_template = $res_templates->fetchRow(MYSQL_ASSOC)) {
			// Check if the user has perms to use this template
			if($rec_template['directory'] == $aCurrentPage['template'] OR
			   $admin->get_permission($rec_template['directory'], 'template'))
			{
				$oTpl->set_var('VALUE', $rec_template['directory']);
				$oTpl->set_var('NAME', $rec_template['name']);
				if($rec_template['directory'] == $aCurrentPage['template']) {
					$oTpl->set_var('SELECTED', $sSelected);
				} else {
					$oTpl->set_var('SELECTED', '');
				}
				$oTpl->parse('template_list', 'template_list_block', true);
			}
		}
	}

/*-- show menu select box --------------------------------------------------------------*/
	$oTpl->set_block('main_block', 'show_menu_list_block', 'show_menu_list');
	if(MULTIPLE_MENUS)
	{
	/*-- get menusettings from template info file --------------------------------------*/
		function getTemplateInfo($sTpl = '') {
			if(!$sTpl) { $sTpl = DEFAULT_TEMPLATE; }
			$sTplFile = WB_PATH.'/templates/'.$sTpl.'/info.php';
			if(is_readable($sTplFile)) { require_once($sTplFile); }
			$menu = isset($menu) ? $menu : array();
			return $menu;
		}
		$aMenu = getTemplateInfo($aCurrentPage['template']);
		// set menu[1] as default if there's no entry in info.php
		$aMenu[1] = (!isset($aMenu[1]) OR ($aMenu[1] == '')) ? $mLang->TEXT_MAIN : $aMenu[1];
		$oTpl->set_block('show_menu_list_block', 'menu_list_block', 'menu_list');
		foreach($aMenu as $iIndex => $sMenuName) {
			$aVars = array();
			$aVars['NAME']  = $sMenuName;
			$aVars['VALUE'] = $iIndex;
			$aVars['SELECTED'] = ($aCurrentPage['menu'] == $iIndex) ? $sSelected : '';
			$oTpl->set_var($aVars);
			$oTpl->parse('menu_list', 'menu_list_block', true);
		}
		$oTpl->parse('show_menu_list', 'show_menu_list_block', true);
	}else {
		$oTpl->set_block('show_menu_list', '');
	}

/*-- show language select box ----------------------------------------------------------*/

	if( ($oLanguages = $admin->getAvailableLanguagesObjectInstance()) )
	{
		$aAvailLanguages = array();
		while($aLanguage = $oLanguages->fetchRow(MYSQL_ASSOC)) {
			$aAvailLanguages[$aLanguage['directory']] = $aLanguage['name'];
		}
		natsort($aAvailLanguages);
		$oTpl->set_block('main_block', 'language_list_block', 'language_list');
		foreach($aAvailLanguages as $key => $val) {
			$oTpl->set_var(array(
				'VALUE' => $key,
				'NAME'  => $val,
				'FLAG_LANG_ICONS' => 'url('.THEME_URL.'/images/flags/'.strtolower($key).'.png)',
				'SELECTED' => ($aCurrentPage['language'] == $key ? $sSelected : ''),
			));
			$oTpl->parse('language_list', 'language_list_block', true);
		}
	}

/*-- show search activated box ---------------------------------------------------------*/
	$oTpl->set_var('SEARCHING_SELECTED_ON',  ($aCurrentPage['searching'] == 0) ? '' : $sSelected);
	$oTpl->set_var('SEARCHING_SELECTED_OFF', ($aCurrentPage['searching'] == 0) ? $sSelected : '');

/*-- show target select box ------------------------------------------------------------*/
	$oTpl->set_var('TOP_SELECTED',   ($aCurrentPage['target'] == '_top'   ? $sSelected : ''));
	$oTpl->set_var('SELF_SELECTED',  ($aCurrentPage['target'] == '_self'  ? $sSelected : ''));
	$oTpl->set_var('BLANK_SELECTED', ($aCurrentPage['target'] == '_blank' ? $sSelected : ''));

/*-- insert all needed vars from language files ----------------------------------------*/
	$oTpl->set_var($mLang->getLangArray());
/*-- finalize the page -----------------------------------------------------------------*/
	$oTpl->parse('main', 'main_block', false);
	$oTpl->pparse('output', 'page');
// Print admin footer
	$mLang->disableAddon();
	$admin->print_footer();

function p($text,$lang)
{
	global $admin;
	$retVal  = 'onmouseover="return overlib(';
	$retVal .= '\''.$text.'\',';
	$retVal .= 'CAPTION,\''.$lang.'\',';
	$retVal .= 'FGCOLOR,\'#ffffff\',';
	$retVal .= 'BGCOLOR,\'#557c9e\',';
	$retVal .= 'BORDER,1,';
//	$retVal .= 'WIDTH,';
//	$retVal .= 'HEIGHT,';
//	$retVal .= 'STICKY,';
	$retVal .= 'CAPTIONSIZE,\'13px\',';
	$retVal .= 'CLOSETEXT,\'X\',';
	$retVal .= 'CLOSESIZE,\'14px\',';
	$retVal .= 'CLOSECOLOR,\'#ffffff\',';
	$retVal .= 'TEXTSIZE,\'12px\',';
	$retVal .= 'VAUTO,';
	$retVal .= 'HAUTO,';
//	$retVal .= 'MOUSEOFF,';
	$retVal .= 'WRAP,';
	$retVal .= 'CELLPAD,5';
	$retVal .= ')" onmouseout="return nd()"';
//	$retVal .= '';
	return $retVal;
}

/**
* replace varnames with values in a string
*
* @param string $subject: stringvariable with vars placeholder
* @param array $replace: values to replace vars placeholder
* @return string
*/
function replaceVars($subject = '', $replace = null )
{
	if(is_array($replace)==true)
	{
		foreach ($replace  as $key => $value) {
			$subject = str_replace("{{".$key."}}", $value, $subject);
		}
	}
	return $subject;
}
