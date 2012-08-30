<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          Ryan Djurovich,WebsiteBaker Project
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

$page_id = (!empty($_SESSION['PAGE_ID']) ? $_SESSION['PAGE_ID'] : 0);

// Required page details
// $page_id = 0;
$page_description = '';
$page_keywords = '';
define('PAGE_ID', $page_id);
define('ROOT_PARENT', 0);
define('PARENT', 0);
define('LEVEL', 0);
define('PAGE_TITLE', $MENU['FORGOT']);
define('MENU_TITLE', $MENU['FORGOT']);
define('VISIBILITY', 'public');

if(!FRONTEND_LOGIN) {
	if(INTRO_PAGE) {
		header('Location: '.WB_URL.PAGES_DIRECTORY.'/index.php');
		exit(0);
	} else {
		header('Location: '.WB_URL.'/index.php');
		exit(0);
	}
}

// Set the page content include file
define('PAGE_CONTENT', WB_PATH.'/account/forgot_form.php');

// Set auto authentication to false
$auto_auth = false;

// Include the index (wrapper) file
require(WB_PATH.'/index.php');
