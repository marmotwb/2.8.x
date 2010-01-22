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

require_once("../config.php");

// Make sure the login is enabled
if(!FRONTEND_LOGIN) {
	if(INTRO_PAGE) {
		header('Location: '.WB_URL.PAGES_DIRECTORY.'/index.php');
		exit(0);
	} else {
		header('Location: '.WB_URL.'/index.php');
		exit(0);
	}
}

// Required page details
$page_id = 0;
$page_description = '';
$page_keywords = '';
define('PAGE_ID', 0);
define('ROOT_PARENT', 0);
define('PARENT', 0);
define('LEVEL', 0);
define('PAGE_TITLE', $TEXT['PLEASE_LOGIN']);
define('MENU_TITLE', $TEXT['PLEASE_LOGIN']);
define('VISIBILITY', 'public');
// Set the page content include file
define('PAGE_CONTENT', WB_PATH.'/account/login_form.php');

require_once(WB_PATH.'/framework/class.login.php');

// Create new login app
$redirect = strip_tags((isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : '');
$thisApp = new Login(
							array(
									"MAX_ATTEMPS" => "3",
									"WARNING_URL" => THEME_URL."/templates/warning.html",
									"USERNAME_FIELDNAME" => 'username',
									"PASSWORD_FIELDNAME" => 'password',
									"REMEMBER_ME_OPTION" => SMART_LOGIN,
									"MIN_USERNAME_LEN" => "2",
									"MIN_PASSWORD_LEN" => "2",
									"MAX_USERNAME_LEN" => "30",
									"MAX_PASSWORD_LEN" => "30",
									"LOGIN_URL" => WB_URL."/account/login.php?redirect=" .$redirect,
									"DEFAULT_URL" => WB_URL.PAGES_DIRECTORY."/index.php",
									"TEMPLATE_DIR" => THEME_PATH."/templates",
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


?>