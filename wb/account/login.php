<?php
/**
 *
 * @category        frontend
 * @package         account
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

// Include config file
$config_file = realpath('../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require_once($config_file);
}

if(!class_exists('login', false)){ include(WB_PATH.'/framework/class.login.php'); }
if(!class_exists('frontend', false)){ include(WB_PATH.'/framework/class.frontend.php'); }

require_once(WB_PATH.'/framework/functions.php');

$wb = new frontend(false);

// Make sure the login is enabled
if(!FRONTEND_LOGIN) {
		header('Location: '.WB_URL.'/');
		exit(0);
//	if(INTRO_PAGE) {
//		header('Location: '.WB_URL.PAGES_DIRECTORY.'/index.php');
//		exit(0);
//	} else {
//	}
}

$page_id = defined('REFERRER_ID') ? REFERRER_ID : isset($_SESSION['PAGE_ID']) ? $_SESSION['PAGE_ID'] : 0;

// Required page details
$page_description = '';
$page_keywords = '';
// Work out level
$level = ($page_id > 0 )? level_count($page_id): $page_id;
// Work out root parent
$root_parent = ($page_id > 0 )? root_parent($page_id): $page_id;

define('PAGE_ID', $page_id);
define('ROOT_PARENT', $root_parent);
define('PARENT', 0);
define('LEVEL', $level);

define('PAGE_TITLE', $TEXT['PLEASE_LOGIN']);
define('MENU_TITLE', $TEXT['PLEASE_LOGIN']);
define('VISIBILITY', 'public');
// Set the page content include file
define('PAGE_CONTENT', WB_PATH.'/account/login_form.php');

// Create new login app
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$redirect  = strip_tags(isset(${$requestMethod}['redirect']) ? ${$requestMethod}['redirect'] : '');
//$redirect = ( (empty($redirect)) ?  $_SERVER['HTTP_REFERER'] : $redirect);
$_SESSION['HTTP_REFERER'] = str_replace(WB_URL,'',$redirect);

$loginUrl  = WB_URL.'/account/login.php';
$loginUrl .= (!empty($redirect) ? '?redirect=' .$_SESSION['HTTP_REFERER'] : '');

$ThemeUrl  = WB_URL.$wb->correct_theme_source('warning.html');
// Setup template object, parse vars to it, then parse it
$ThemePath = realpath(WB_PATH.$wb->correct_theme_source('loginBox.htt'));

$thisApp = new Login(
				array(
						"MAX_ATTEMPS" => "3",
						"WARNING_URL" => $ThemeUrl."/warning.html",
						"USERNAME_FIELDNAME" => 'username',
						"PASSWORD_FIELDNAME" => 'password',
						"REMEMBER_ME_OPTION" => SMART_LOGIN,
						"MIN_USERNAME_LEN" => "2",
						"MIN_PASSWORD_LEN" => "2",
						"MAX_USERNAME_LEN" => "30",
						"MAX_PASSWORD_LEN" => "30",
						"LOGIN_URL" => $loginUrl,
						"DEFAULT_URL" => WB_URL."/index.php",
						"TEMPLATE_DIR" => $ThemePath,
						"TEMPLATE_FILE" => "login.htt",
						"FRONTEND" => true,
						"FORGOTTEN_DETAILS_APP" => WB_URL."/account/forgot.php",
						"USERS_TABLE" => TABLE_PREFIX."users",
						"GROUPS_TABLE" => TABLE_PREFIX."groups",
						"REDIRECT_URL" => $redirect
                    )
		);

// Set extra outsider var
$globals[] = 'thisApp';

// Include the index (wrapper) file
require(WB_PATH.'/index.php');
