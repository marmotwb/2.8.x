<?php
/*
*
*                       About WebsiteBaker
*
* Website Baker is a PHP-based Content Management System (CMS)
* designed with one goal in mind: to enable its users to produce websites
* with ease.
*
*                       LICENSE INFORMATION
*
* WebsiteBaker is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* WebsiteBaker is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
* See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*
*                   WebsiteBaker Extra Information
*
*
*/
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

require_once('../config.php');

if(!is_numeric(FRONTEND_SIGNUP)) {
	if(INTRO_PAGE) {
		header('Location: '.WB_URL.PAGES_DIRECTORY.'/index.php');
		exit(0);
	} else {
		header('Location: '.WB_URL.'/index.php');
		exit(0);
	}
}

if(ENABLED_ASP && isset($_POST['username']) && ( // form faked? Check the honeypot-fields.
	(!isset($_POST['submitted_when']) OR !isset($_SESSION['submitted_when'])) OR 
	($_POST['submitted_when'] != $_SESSION['submitted_when']) OR
	(!isset($_POST['email-address']) OR $_POST['email-address']) OR
	(!isset($_POST['name']) OR $_POST['name']) OR
	(!isset($_POST['full_name']) OR $_POST['full_name'])
)) {
	exit(header("Location: ".WB_URL.PAGES_DIRECTORY.""));
}

// Load the language file
if(!file_exists(WB_PATH.'/languages/'.DEFAULT_LANGUAGE.'.php')) {
	exit('Error loading language file '.DEFAULT_LANGUAGE.', please check configuration');
} else {
	require_once(WB_PATH.'/languages/'.DEFAULT_LANGUAGE.'.php');
	$load_language = false;
}


// Required page details
$page_id = 0;
$page_description = '';
$page_keywords = '';
define('PAGE_ID', 0);
define('ROOT_PARENT', 0);
define('PARENT', 0);
define('LEVEL', 0);
define('PAGE_TITLE', $TEXT['SIGNUP']);
define('MENU_TITLE', $TEXT['SIGNUP']);
define('MODULE', '');
define('VISIBILITY', 'public');

// Set the page content include file
if(isset($_POST['username'])) {
	define('PAGE_CONTENT', WB_PATH.'/account/signup2.php');
} else {
	define('PAGE_CONTENT', WB_PATH.'/account/signup_form.php');
}

// Set auto authentication to false
$auto_auth = false;

// Include the index (wrapper) file
require(WB_PATH.'/index.php');

?>