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

require_once('../config.php');
ini_set('display_errors','0');

require_once(WB_PATH.'/framework/class.admin.php');

// Create new frontend object
$wb = new admin();

//require_once(dirname(__FILE__).'/MySignUp.php');
//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.$page_id.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//print_r( dirname(__FILE__) ); print '</pre>';

//
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

// Load the language file
//if(!file_exists(WB_PATH.'/languages/'.LANGUAGE.'.php')) {
//	exit('Error loading language file '.LANGUAGE.', please check configuration');
//} else {
//	require_once(WB_PATH.'/languages/'.LANGUAGE.'.php');
//	$load_language = false;
//}

$lang = WB_PATH . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? WB_PATH . '/languages/EN.php' : $lang );

$_SESSION['display_form'] = true;

$page_id = isset($_SESSION['PAGE_ID']) ? intval($_SESSION['PAGE_ID']) : 0;

$page_description = '';
$page_keywords = '';
define('PAGE_ID', $page_id);
define('ROOT_PARENT', 0);
define('PARENT', 0);
define('LEVEL', 0);
define('PAGE_TITLE', $TEXT['SIGNUP']);
define('MENU_TITLE', $TEXT['SIGNUP']);
define('MODULE', '');
define('VISIBILITY', 'public');

define('PAGE_CONTENT', WB_PATH.'/account/signup_form.php');

// Set auto authentication to false
$auto_auth = false;

// Include the index (wrapper) file
require(WB_PATH.'/index.php');
