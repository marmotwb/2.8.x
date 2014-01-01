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
 * $_SESSION['USED_LANGUAGES']="NL,EN,DE";
 * if BROWSER_LANGUAGE is in USED_LANGUAGES then use BROWSER_LANGUAGE
 * and provide all other USED_LANGUAGES to choose
 * IF BROWSER_LANGUAGE is NOT in USED_LANGUAGES then use const LANGUAGE
 * and provide all other USED_LANGUAGES to choose
 *
 *
 */

// Include config file
$config_file = realpath('../framework/initialize.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
    $sAutoLanguage = 'EN';
// detect client language
    if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    	if(preg_match('/([a-z]{2})(?:-[a-z]{2})*/i', strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']), $matches)) {
    		$sAutoLanguage = strtoupper($matches[1]);
    	}
    }
    $sAutoLanguage=( isset($_SESSION['LANGUAGE'] ) ? $_SESSION['LANGUAGE'] : $sAutoLanguage);
    if(!defined('LANGUAGE')) { define('LANGUAGE',$sAutoLanguage); }

	require_once($config_file);
}

ini_set('display_errors','0');

if(!class_exists('frontend', false)){ include(WB_PATH.'/framework/class.frontend.php'); }

require_once(WB_PATH.'/framework/functions.php');

// Create new frontend object
$wb = new frontend(false);

if( ( (intval(FRONTEND_SIGNUP)==0) &&
    (  0 == (isset($_SESSION['USER_ID']) ? intval($_SESSION['USER_ID']) : 0) )))
{
	$wb->send_header(WB_URL.'/index.php');
//	if(INTRO_PAGE) {
//	} else {
//		header('Location: '.WB_URL.'/index.php');
//		exit(0);
//	}
}

// form faked? Check the honeypot-fields.
if(ENABLED_ASP && isset($_POST['username']) && (
	(!isset($_POST['submitted_when']) OR !isset($_SESSION['submitted_when']) ) OR
//		($_POST['submitted_when'] != $_SESSION['submitted_when']) OR
			(!isset($_POST['email-address']) OR $_POST['email-address']) OR
				(!isset($_POST['name']) OR $_POST['name']) OR
					(!isset($_POST['full_name']) OR $_POST['full_name'])
	))
{
	$wb->send_header(WB_URL.'/index.php');
}

//$langDir = WB_PATH . '/languages/' . LANGUAGE . '.php';
//require_once(!file_exists($langDir) ? WB_PATH . '/languages/EN.php' : $langDir );

$_SESSION['display_form'] = true;

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

define('PAGE_TITLE', $TEXT['SIGNUP']);
define('MENU_TITLE', $TEXT['SIGNUP']);
define('MODULE', '');
define('VISIBILITY', 'public');

define('PAGE_CONTENT', WB_PATH.'/account/signup_form.php');

// Set auto authentication to false
$auto_auth = false;

// Include the index (wrapper) file
require(WB_PATH.'/index.php');

exit();
