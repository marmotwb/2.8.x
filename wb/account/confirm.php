<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
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
$mLang = Translate::getInstance();
$mLang->enableAddon('account');

if(!class_exists('frontend', false)){ include(WB_PATH.'/framework/class.frontend.php'); }

require_once(WB_PATH.'/framework/functions.php');

// Create new frontend object
$wb = new frontend(false);

// load module language file
//$sAutoLanguage = isset($_SESSION['LANGUAGE']) ? $_SESSION['LANGUAGE'] : AccountSignup::GetBowserLanguage(DEFAULT_LANGUAGE);

//$langDir = WB_PATH . '/languages/' . LANGUAGE . '.php';
//require_once(!file_exists($langDir) ? WB_PATH . '/languages/EN.php' : $langDir );

// form faked? Check the honeypot-fields.
if(ENABLED_ASP && isset($_POST['username']) && (
	(!isset($_POST['submitted_when']) OR !isset($_SESSION['submitted_when']) ) OR
		($_POST['submitted_when'] != $_SESSION['submitted_when']) OR
			(!isset($_POST['email-address']) OR $_POST['email-address']) OR
				(!isset($_POST['name']) OR $_POST['name']) OR
					(!isset($_POST['full_name']) OR $_POST['full_name'])
	))
{
	$wb->send_header(WB_URL.'/index.php');
}

$page_id = defined('REFERRER_ID') ? REFERRER_ID : isset($_SESSION['PAGE_ID']) ? $_SESSION['PAGE_ID'] : 0;
// needed for backlink/cancel
$_SESSION['HTTP_REFERER'] = isset($_SESSION['HTTP_REFERER']) ? ($_SESSION['HTTP_REFERER']) : WB_URL.'/';
// action modus
$_POST['action'] = !isset($_POST['action']) ? 'show' : $_POST['action'];

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
define('PAGE_TITLE', $mLang->TEXT_SIGNUP);
define('MENU_TITLE', $mLang->TEXT_SIGNUP);
define('MODULE', '');
define('VISIBILITY', 'public');

define('PAGE_CONTENT', WB_PATH.'/account/confirm_form.php');

$mLang->disableAddon();
// Include the index (wrapper) file
require(WB_PATH.'/index.php');

