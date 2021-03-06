<?php
/**
 *
 * @category        backend
 * @package         framework
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
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
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(__FILE__).'/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

// Load the other required class files if they are not already loaded
if(!class_exists('wb', false)){ include(WB_PATH.'/framework/class.wb.php'); }

// Get WB version
require_once(ADMIN_PATH.'/interface/version.php');

// Include EditArea wrapper functions
// require_once(WB_PATH . '/include/editarea/wb_wrapper_edit_area.php');
// require_once(WB_PATH . '/framework/SecureForm.php');


/**
 * admin
 *
 * @package
 * @copyright
 * @version 2012
 * @access public
 */
class admin extends wb {
	// Authenticate user then auto print the header
	/**
	 * admin::__construct()
	 *
	 * @param string $section_name
	 * @param string $section_permission
	 * @param bool $auto_header
	 * @param bool $auto_auth
	 * @return void
	 */
	public function __construct($section_name= '##skip##', $section_permission = 'start', $auto_header = true, $auto_auth = true)
	{
		parent::__construct(SecureForm::BACKEND);
        $this->_oTrans->enableAddon('templates\\'.$this->_oReg->DefaultTheme);
    	if( $section_name != '##skip##' )
    	{
    		// Specify the current applications name
    		$this->section_name = $section_name;
    		$this->section_permission = $section_permission;
    		$maintance = ( defined('SYSTEM_LOCKED') && (SYSTEM_LOCKED==true) ? true : false );
    		// Authenticate the user for this application
    		if( ($auto_auth == true) )
    		{
    			// First check if the user is logged-in
    			if($this->is_authenticated() == false)
    			{
    				header('Location: '.ADMIN_URL.'/login/index.php');
    				exit(0);
    			}
    			// Now check if they are allowed in this section
    			if($this->get_permission($section_permission) == false) {
//    				die($MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES']);
                    $sErrorMsgFile = $this->correct_theme_source('ErrorMsgFile.htt');
            		if(file_exists($sErrorMsgFile))
            		{
                        $this->print_header();
                        $oTpl = new Template(dirname( $sErrorMsgFile ));
//                        $oTpl->debug = true;
                        $sBackLink = (isset($_SERVER['QUERY_STRING'])&& ($_SERVER['QUERY_STRING']!='')) ? $_SERVER['HTTP_REFERER'].'?'.$_SERVER['QUERY_STRING'] :  $_SERVER['HTTP_REFERER'];
            		    $oTpl->set_file( 'page', 'ErrorMsgFile.htt' );
            	 	    $oTpl->set_var( 'THEME_URL', THEME_URL );
            			$oTpl->set_var( 'PAGE_ICON', 'negative');
            			$oTpl->set_var( 'ERROR_TITLE', $this->_oTrans->MESSAGE_MEDIA_DIR_ACCESS_DENIED);
            	 	    $oTpl->set_var( 'PAGE_TITLE', $this->_oTrans->MESSAGE_ADMIN_INSUFFICIENT_PRIVELLIGES);
            	 	    $oTpl->set_var( 'BACK_LINK', $sBackLink );
            	 	    $oTpl->set_var( 'TEXT_BACK', $this->_oTrans->TEXT_BACK);
                		$output = $oTpl->finish($oTpl->parse('output', 'page'));
        			}
        			throw new ErrorMsgException($output);
                }
    		}

			if( ($maintance==true) || $this->get_session('USER_ID')!= 1 )
			{
           	//  check for show maintenance screen and terminate if needed
        		$this->ShowMaintainScreen('locked');
            }

    		// Check if the backend language is also the selected language. If not, send headers again.
    		$sql = 'SELECT `language` FROM `'.$this->_oDb->TablePrefix.'users` '
    		     . 'WHERE `user_id`='.(int)$this->get_user_id();
            $user_language = preg_replace('/([a-z]{2}).*/i', '\1', strtoupper((string)$this->_oDb->getOne($sql)));
    		// obtain the admin folder (e.g. /admin)
    		$admin_folder = str_replace(WB_PATH, '', ADMIN_PATH);

    		if( (LANGUAGE != $user_language) && file_exists(WB_PATH .'/languages/' .$user_language .'.php')
    			&& strpos($_SERVER['SCRIPT_NAME'],$admin_folder.'/') !== false) {
    			// check if page_id is set
    			$page_id_url = (isset($_GET['page_id'])) ? '&page_id=' .(int) $_GET['page_id'] : '';
    			$section_id_url = (isset($_GET['section_id'])) ? '&section_id=' .(int) $_GET['section_id'] : '';
    			 //  check if there is an query-string
    			if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != '') {
    				header('Location: '.$_SERVER['SCRIPT_NAME'] .'?lang='.$user_language .$page_id_url .$section_id_url.'&'.$_SERVER['QUERY_STRING']);
    			} else {
    				header('Location: '.$_SERVER['SCRIPT_NAME'] .'?lang='.$user_language .$page_id_url .$section_id_url);
    			}
    			exit();
    		}

    		// Auto header code
    		if($auto_header == true) {
    			$this->print_header();
    		}
    	}
	}

	// Print the admin header
	/**
	 *
	 * @param string $body_tags
	 * @return void
	 */
	function print_header($body_tags = '')
	{
		// $GLOBALS['FTAN'] = $this->getFTAN();
		$this->createFTAN();
		$sql = 'SELECT `value` FROM `'.$this->_oDb->TablePrefix.'settings` '
             . 'WHERE `name`=\'website_title\'';
        $title = (string)$this->_oDb->getOne($sql);
		// Setup template object, parse vars to it, then parse it
		$header_template = new Template(dirname($this->correct_theme_source('header.htt')) );
		$header_template->set_file('page', 'header.htt');
		$header_template->set_block('page', 'header_block', 'header');
        $header_template->set_var($this->_oTrans->getLangArray());
		if(defined('DEFAULT_CHARSET')) {
			$charset=DEFAULT_CHARSET;
		} else {
			$charset='utf-8';
		}

		// work out the URL for the 'View menu' link in the WB backend
		// if the page_id is set, show this page otherwise show the root directory of WB
		$view_url = WB_URL;
		if(isset($_GET['page_id'])) {
			// extract page link from the database
			$sql = 'SELECT `link` FROM `'.$this->_oDb->TablePrefix.'pages` '
			     . 'WHERE `page_id`='.intval($_GET['page_id']);
            $row = (string)$this->_oDb->getOne($sql);
            if ($row) { $view_url .= PAGES_DIRECTORY .$row. PAGE_EXTENSION; }
		}

        $HelpUrl = ((strtolower(LANGUAGE)!='de') ? '/en/help.php' : '/de/hilfe.php');
		$sServerAdress = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '127.0.0.1';
		$header_template->set_var(	array(
							'SECTION_FORGOT' => $this->_oTrans->MENU_FORGOT,
							'SECTION_NAME' => $this->_oTrans->MENU_LOGIN,
							'BODY_TAGS' => $body_tags,
							'WEBSITE_TITLE' => $title,
							'TEXT_ADMINISTRATION' => $this->_oTrans->TEXT_ADMINISTRATION,
							'CURRENT_USER' => $this->_oTrans->MESSAGE_START_CURRENT_USER,
							'DISPLAY_NAME' => $this->get_display_name(),
							'CHARSET' => $charset,
							//'LANGUAGE' => strtolower(LANGUAGE),
							'LANGUAGE' => LANGUAGE,
							'VERSION' => VERSION,
							'SP' => (defined('SP') ? SP : ''),
							'REVISION' => REVISION,
							'SERVER_ADDR' => ((int)$this->get_user_id()==1 ? $sServerAdress : ''),
							'WB_URL' => WB_URL,
							'ADMIN_URL' => ADMIN_URL,
							'THEME_URL' => THEME_URL,
							'START_URL' => ADMIN_URL.'/index.php',
							'START_CLASS' => 'start',
							'TITLE_START' => $this->_oTrans->TEXT_READ_MORE,
							'TITLE_VIEW' => $this->_oTrans->TEXT_WEBSITE,
							'TITLE_HELP' => 'WebsiteBaker '.$this->_oTrans->MENU_HELP,
							'URL_VIEW' => $view_url,
							'TITLE_LOGOUT' => $this->_oTrans->MENU_LOGIN,
							'LOGIN_DISPLAY_HIDDEN' => !$this->is_authenticated() ? 'hidden' : '',
							'LOGIN_DISPLAY_NONE' => !$this->is_authenticated() ? 'none' : '',
							'LOGIN_LINK' => $_SERVER['SCRIPT_NAME'],
							'LOGIN_ICON' => 'login',
							'START_ICON' => 'blank',
							'URL_HELP' => 'http://www.websitebaker.org'.$HelpUrl,
							'BACKEND_MODULE_CSS' => $this->register_backend_modfiles('css'),	// adds backend.css
							'BACKEND_MODULE_JS'  => $this->register_backend_modfiles('js')		// adds backend.js
						)
					);
		$header_template->set_block('header_block', 'maintenance_block', 'maintenance');
		if($this->get_user_id() == 1)
		{
			$sys_locked = (((int)(defined('SYSTEM_LOCKED') ? SYSTEM_LOCKED : 0)) == 1);
			$header_template->set_var('MAINTENANCE_MODE', ($sys_locked ? $this->_oTrans->TEXT_MAINTENANCE_OFF : $this->_oTrans->TEXT_MAINTENANCE_ON));
			$header_template->set_var('MAINTENANCE_ICON', THEME_URL.'/images/'.($sys_locked ? 'lock' : 'unlock').'.png');
			$header_template->set_var('MAINTAINANCE_URL', ADMIN_URL.'/settings/locking.php');
			$header_template->parse('maintenance', 'maintenance_block', true);
		}else
		{
			$header_template->set_block('maintenance_block', '');
		}

		// Create the menu
        $UrlLang = ((strtolower(LANGUAGE)!='de') ? 'en' : strtolower(LANGUAGE));
		if(!$this->is_authenticated())
		{
    		$header_template->set_var('STYLE', 'login');
    		$menu = array(
//						array('http://www.websitebaker.org/', '_blank', 'WebsiteBaker Home', 'help', 0),
//						array($view_url, '_blank', $TEXT['FRONTEND'], '', 0),
//						array(ADMIN_URL.'/login/index.php', '', $MENU['LOGIN'], '', 0)
						);
		} else {
			$header_template->set_var('STYLE', 'start');
			$header_template->set_var(	array(
                        'SECTION_NAME' => $this->_oTrans->{'MENU'.strtoupper($this->section_name)},
						'TITLE_LOGOUT' => $this->_oTrans->MENU_LOGOUT,
						'LOGIN_DISPLAY_NONE' => '',
						'START_ICON' => 'home',
						'LOGIN_ICON' => 'logout',
						'LOGIN_LINK' => ADMIN_URL.'/logout/index.php',
						'TITLE_START' => $this->_oTrans->MENU_START
						)
					);

			// @array ( $url, $target, $title, $page_permission, $permission_required )
			$menu = array(
//					array(ADMIN_URL.'/index.php', '', $MENU['START'], 'start', 1 ),
					array(ADMIN_URL.'/pages/index.php', '', $this->_oTrans->MENU_PAGES, 'pages', 1),
// 					array($view_url, '_blank', $MENU['FRONTEND'], 'pages', 1),
					array(ADMIN_URL.'/media/index.php', '', $this->_oTrans->MENU_MEDIA, 'media', 1),
					array(ADMIN_URL.'/addons/index.php', '', $this->_oTrans->MENU_ADDONS, 'addons', 1),
					array(ADMIN_URL.'/preferences/index.php', '', $this->_oTrans->MENU_PREFERENCES, 'preferences', 1),
					array(ADMIN_URL.'/settings/index.php', '', $this->_oTrans->MENU_SETTINGS, 'settings', 1),
					array(ADMIN_URL.'/admintools/index.php', '', $this->_oTrans->MENU_ADMINTOOLS, 'admintools', 1),
					array(ADMIN_URL.'/access/index.php', '', $this->_oTrans->MENU_ACCESS, 'access', 1),
//					array('http://addons.websitebaker2.org/', '', 'WB-Addons', 'preferences', 1),
//					array('http://template.websitebaker2.org/', '', 'WB-Template', 'preferences', 1),
//					array('http://www.websitebaker.org/', '_blank', 'WebsiteBaker Home', '', 0),
//					array(ADMIN_URL.'/logout/index.php', '', $MENU['LOGOUT'], '', 0)
					);
		}

		$header_template->set_block('header_block', 'linkBlock', 'link');
		foreach($menu AS $menu_item)
		{
			$link = $menu_item[0];
			$target = ($menu_item[1] == '') ? '_self' : $menu_item[1];
			$title = $menu_item[2];
			$permission_title = $menu_item[3];
			$required = $menu_item[4];
			$replace_old = array(ADMIN_URL, WB_URL, '/', 'index.php');
			if($required == false || ($this->is_authenticated() && $this->get_link_permission($permission_title)) )
			{
				$header_template->set_var('LINK', $link);
				$header_template->set_var('TARGET', $target);
				// If link is the current section apply a class name
				if($permission_title == strtolower($this->section_name)) {
					$header_template->set_var('CLASS', $menu_item[3] . ' current');
					$header_template->set_var('STYLE', $menu_item[3] );
				} else {
					$header_template->set_var('CLASS', $menu_item[3] );
				}
				$header_template->set_var('TITLE', $title);
				// Print link
				$header_template->parse('link', 'linkBlock', true);
			}
		}
		$header_template->parse('header', 'header_block', false);
		$header_template->pparse('output', 'page');
		unset($header_template);
        $this->_oTrans->disableAddon();
	}

	// Print the admin footer
	function print_footer($activateJsAdmin = false) {
		global $starttime, $iPhpDeclaredClasses;
		// include the required file for Javascript admin
		if($activateJsAdmin == true) {
			if(file_exists(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php')){
				@include_once(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php');
			}
		}
		// Setup template object, parse vars to it, then parse it
		$footer_template = new Template(dirname($this->correct_theme_source('footer.htt')));
		$footer_template->set_file('page', 'footer.htt');
		$footer_template->set_block('page', 'footer_block', 'header');
        $footer_template->set_var($this->_oTrans->getLangArray());
		$footer_template->set_var(array(
						'BACKEND_BODY_MODULE_JS' => $this->register_backend_modfiles_body('js'),
						'WB_URL' => WB_URL,
						'ADMIN_URL' => ADMIN_URL,
						'THEME_URL' => THEME_URL,
			 ) );

		$footer_template->set_block('footer_block', 'show_debug_block', 'show_debug');

		$bDebug = (defined('DEBUG') ? DEBUG : false);
		$bDevInfo = (defined('DEV_INFOS') && (DEV_INFOS == true) && (1 == $this->get_user_id()) ? true : false);
//         if( $debug && (1 == $this->get_user_id()))
        if( $bDevInfo )
		{

			$footer_template->set_var('MEMORY', number_format(memory_get_peak_usage(true), 0, ',', '.').'&nbsp;Byte' );
//			$footer_template->set_var('MEMORY', number_format(memory_get_usage(true), 0, ',', '.').'&nbsp;Byte' );
			$footer_template->set_var('QUERIES', $this->_oDb->getQueryCount );
			// $footer_template->set_var('QUERIES', 'disabled' );
	        $included_files =  get_included_files();
			$footer_template->set_var('INCLUDES', sizeof($included_files) );
	        $included_classes =  get_declared_classes();
			$footer_template->set_var('CLASSES', sizeof($included_classes)-$iPhpDeclaredClasses );

			$sum_classes = 0;
			$sum_filesize = 0;
			$footer_template->set_block('show_debug_block', 'show_block_list', 'show_list');
			$footer_template->set_block('show_block_list', 'include_block_list', 'include_list');
			// $bDebug = true;  for testing
			foreach($included_files as $filename)
			{
				if(!is_readable($filename)) { continue; }
				if($bDebug)
				{
					$footer_template->set_var('INCLUDES_ARRAY', str_replace(WB_PATH, '',$filename) );
					$footer_template->set_var('FILESIZE', number_format(filesize($filename), 0, ',', '.').'&nbsp;Byte');
					$footer_template->parse('include_list', 'include_block_list', true);
				}
				$sum_filesize += filesize($filename);
			}
			$footer_template->parse('show_list', 'show_block_list', true);

			$endtime = array_sum(explode(" ",microtime()));
			$iEndTime = $endtime;
			$iStartTime = $starttime;
			if(!$bDebug)
			{
				$footer_template->parse('show_list', '');
				$footer_template->parse('include_list', '');
			}

			$footer_template->set_var('FILESIZE', ini_get('memory_limit'));
			$footer_template->set_var('TXT_SUM_FILESIZE', 'Summary size of included files:&nbsp;');
			$footer_template->set_var('SUM_FILESIZE', number_format($sum_filesize, 0, ',', '.').'&nbsp;Byte');
			$footer_template->set_var('SUM_CLASSES', number_format($sum_classes, 0, ',', '.').'&nbsp;Byte');
			$footer_template->set_var('PAGE_LOAD_TIME', round($iEndTime-$iStartTime,3 ));
			$footer_template->set_var('DUMP_CLASSES', '<pre>'.var_export($included_classes,true).'</pre>');

			$footer_template->parse('show_debug', 'show_debug_block', true);
        } else {
			$footer_template->parse('show_debug', '');
			$footer_template->parse('show_list', '');

        }
		$footer_template->parse('header', 'footer_block', false);
		$footer_template->pparse('output', 'page');
		unset($footer_template);

	}

	// Return a system permission
	function get_permission($name, $type = 'system') {

		// Append to permission type
		$type .= '_permissions';
		// Check if we have a section to check for
		if($name == 'start') {
			return true;
		} else {
			// Set system permissions var
			$system_permissions = $this->get_session('SYSTEM_PERMISSIONS');
			// Set module permissions var
			$module_permissions = $this->get_session('MODULE_PERMISSIONS');
			// Set template permissions var
			$template_permissions = $this->get_session('TEMPLATE_PERMISSIONS');
			// Return true if system perm = 1
			if (isset($$type) && is_array($$type) && is_numeric(array_search($name, $$type))) {
				if($type == 'system_permissions') {
					return true;
				} else {
					return false;
				}
			} else {
				if($type == 'system_permissions') {
					return false;
				} else {
					return true;
				}
			}
		}

	}

 function get_user_details($user_id) {
  global $database;
  $retval = array('username'=>'unknown','display_name'=>'Unknown','email'=>'');
  $sql  = 'SELECT `username`,`display_name`,`email` ';
  $sql .= 'FROM `'.TABLE_PREFIX.'users` ';
  $sql .= 'WHERE `user_id`='.(int)$user_id;
  if( ($resUsers = $database->query($sql)) ) {
   if( ($recUser = $resUsers->fetchRow()) ) {
    $retval = $recUser;
   }
  }
  return $retval;
 }

    //
	function get_section_details( $section_id, $backLink = 'index.php' ) {
	global $database, $TEXT;
		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'sections` ';
		$sql .= 'WHERE `section_id`='.intval($section_id);
		if(($resSection = $database->query($sql))){
			if(!($recSection = $resSection->fetchRow())) {
				$this->print_header();
				$this->print_error($TEXT['SECTION'].' '.$TEXT['NOT_FOUND'], $backLink, true);
			}
			} else {
				$this->print_header();
				$this->print_error($database->get_error(), $backLink, true);
			}
		return $recSection;
	}

	function get_page_details( $page_id, $backLink = 'index.php' ) {
		global $database, $TEXT;
		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'pages` ';
		$sql .= 'WHERE `page_id`='.intval($page_id);
		if(($resPages = $database->query($sql))){
			if(!($recPage = $resPages->fetchRow())) {
			$this->print_header();
			$this->print_error($TEXT['PAGE'].' '.$TEXT['NOT_FOUND'], $backLink, true);
			}
		} else {
			$this->print_header();
			$this->print_error($database->get_error(), $backLink, true);
		}
		return $recPage;
	}

	function get_page_permission($page,$action='admin') {
		if($action != 'viewing') { $action = 'admin'; }
		$action_groups = $action.'_groups';
		$action_users  = $action.'_users';
		$groups = $users = '0';
		if(is_array($page)) {
			$groups = $page[$action_groups];
			$users  = $page[$action_users];
		} else {
			global $database;
			$sql  = 'SELECT `'.$action_groups.'`,`'.$action_users.'` ';
			$sql .= 'FROM `'.TABLE_PREFIX.'pages` ';
			$sql .= 'WHERE `page_id`='.(int)$page;
			if( ($res = $database->query($sql)) ) {
				if( ($rec = $res->fetchRow()) ) {
					$groups = $rec[$action_groups];
					$users  = $rec[$action_users];
				}
			}
		}
		return ($this->ami_group_member($groups) || $this->is_group_match($this->get_user_id(), $users));
	}

	// Returns a system permission for a menu link
	function get_link_permission($title) {
		$title = str_replace('_blank', '', $title);
		$title = strtolower($title);
		// Set system permissions var
		$system_permissions = $this->get_session('SYSTEM_PERMISSIONS');
		// Set module permissions var
		$module_permissions = $this->get_session('MODULE_PERMISSIONS');
		if($title == 'start') {
			return true;
		} else {
			// Return true if system perm = 1
			if(is_numeric(array_search($title, $system_permissions))) {
				return true;
			} else {
				return false;
			}
		}
	}

	// Function to add optional module Javascript or CSS stylesheets into the <body> section of the backend
	function register_backend_modfiles_body($file_id="js")
		{
		// sanity check of parameter passed to the function
		$file_id = strtolower($file_id);
		if($file_id !== "javascript" && $file_id !== "js")
		{
			return;
		}
		global $database;
        $body_links = "";
		// define default baselink and filename for optional module javascript and stylesheet files
		if($file_id == "js") {
			$base_link = '<script src="'.WB_URL.'/modules/{MODULE_DIRECTORY}/backend_body.js" type="text/javascript"></script>';
			$base_file = "backend_body.js";
		}

        $sActionRequest = isset($_POST['tool']) ? $_POST['tool'] : null;
        $sActionRequest = isset($_GET['tool'])  ? $_GET['tool']  : $sActionRequest;

		// check if backend_body.js files needs to be included to the <body></body> section of the backend
		if(isset($sActionRequest))
			{
			// check if displayed page contains a installed admin tool
			$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'addons` ';
			$sql .= 'WHERE `type`=\'module\' AND `function`=\'tool\' AND `directory`=\''.addslashes($sActionRequest).'\'';
			$result = $database->query($sql);
			if($result->numRows())
				{
				// check if admin tool directory contains a backend_body.js file to include
				$tool = $result->fetchRow();
				if(file_exists(WB_PATH ."/modules/" .$tool['directory'] ."/$base_file"))
				{
					// return link to the backend_body.js file
					return str_replace("{MODULE_DIRECTORY}", $tool['directory'], $base_link);
				}
			}
		} elseif(isset($_GET['page_id']) or isset($_POST['page_id']))
		{
			// check if displayed page in the backend contains a page module
			if (isset($_GET['page_id']))
			{
				$page_id = (int) addslashes($_GET['page_id']);
			} else {
				$page_id = (int) addslashes($_POST['page_id']);
			}
			// gather information for all models embedded on actual page
			$sql = 'SELECT `module` FROM `'.TABLE_PREFIX.'sections` WHERE `page_id`='.(int)$page_id;
			$query_modules = $database->query($sql);
			while($row = $query_modules->fetchRow()) {
				// check if page module directory contains a backend_body.js file
				if(file_exists(WB_PATH ."/modules/" .$row['module'] ."/$base_file")) {
					// create link with backend_body.js source for the current module
					$tmp_link = str_replace("{MODULE_DIRECTORY}", $row['module'], $base_link);
					// ensure that backend_body.js is only added once per module type
					if(strpos($body_links, $tmp_link) === false) {
						$body_links .= $tmp_link ."\n";
					}
				}
			}
			// write out links with all external module javascript/CSS files, remove last line feed
			return rtrim($body_links);
		}
	}


	// Function to add optional module Javascript or CSS stylesheets into the <head> section of the backend
	function register_backend_modfiles($file_id="css") {
		// sanity check of parameter passed to the function
		$file_id = strtolower($file_id);
		if($file_id !== "css" && $file_id !== "javascript" && $file_id !== "js") {
			return;
		}

		global $database;
		// define default baselink and filename for optional module javascript and stylesheet files
		$head_links = "";
		if($file_id == "css") {
      	$base_link = '<link href="'.WB_URL.'/modules/{MODULE_DIRECTORY}/backend.css"';
			$base_link.= ' rel="stylesheet" type="text/css" media="screen" />';
			$base_file = "backend.css";
		} else {
			$base_link = '<script src="'.WB_URL.'/modules/{MODULE_DIRECTORY}/backend.js" type="text/javascript"></script>';
			$base_file = "backend.js";
		}

        $sActionRequest = isset($_POST['tool']) ? $_POST['tool'] : null;
        $sActionRequest = isset($_GET['tool'])  ? $_GET['tool']  : $sActionRequest;

		// check if backend.js or backend.css files needs to be included to the <head></head> section of the backend
		if(isset($sActionRequest)) {
			// check if displayed page contains a installed admin tool
			$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'addons` ';
			$sql .= 'WHERE `type`=\'module\' AND `function`=\'tool\' AND `directory`=\''.addslashes($sActionRequest).'\'';
			$result = $database->query($sql);
			if($result->numRows()) {
				// check if admin tool directory contains a backend.js or backend.css file to include
				$tool = $result->fetchRow();
				if(file_exists(WB_PATH ."/modules/" .$tool['directory'] ."/$base_file")) {
        			// return link to the backend.js or backend.css file
					return str_replace("{MODULE_DIRECTORY}", $tool['directory'], $base_link);
				}
			}
		} elseif(isset($_GET['page_id']) || isset($_POST['page_id'])) {
			// check if displayed page in the backend contains a page module
			if (isset($_GET['page_id'])) {
				$page_id = (int)$_GET['page_id'];
			} else {
				$page_id = (int)$_POST['page_id'];
			}

    		// gather information for all models embedded on actual page
			$sql = 'SELECT `module` FROM `'.TABLE_PREFIX.'sections` WHERE `page_id`='.(int)$page_id;
			$query_modules = $database->query($sql);

    		while($row = $query_modules->fetchRow()) {
				// check if page module directory contains a backend.js or backend.css file
      		if(file_exists(WB_PATH ."/modules/" .$row['module'] ."/$base_file")) {
					// create link with backend.js or backend.css source for the current module
					$tmp_link = str_replace("{MODULE_DIRECTORY}", $row['module'], $base_link);
        			// ensure that backend.js or backend.css is only added once per module type
        			if(strpos($head_links, $tmp_link) === false) {
						$head_links .= $tmp_link ."\n";
					}
				}
    		}
    		// write out links with all external module javascript/CSS files, remove last line feed
			return rtrim($head_links);
		}
	}
}
