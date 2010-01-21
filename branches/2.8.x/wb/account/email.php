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
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @filesource		$HeadURL$
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 *
 * @author          WebsiteBaker Project
 * @link			http://www.websitebaker2.org/
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://start.websitebaker2.org/impressum-datenschutz.php
 * @license         http://www.gnu.org/licenses/gpl.html
 * @version         $Id$
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @lastmodified    $Date$
 *
 */

if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

// Get the values entered
$current_password = $wb->get_post('current_password');
$email = $wb->get_post('email');

// Create a javascript back link
$js_back = "javascript: history.go(-1);";

// Get existing password
$database = new database();
$query = "SELECT user_id FROM ".TABLE_PREFIX."users WHERE user_id = '".$wb->get_user_id()."' AND password = '".md5($current_password)."'";
$results = $database->query($query);

// Validate values
if($results->numRows() == 0) {
	$wb->print_error($MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'], $js_back, false);
}
// Validate values
if(!$wb->validate_email($email)) {
	$wb->print_error($MESSAGE['USERS']['INVALID_EMAIL'], $js_back, false);
}

$email = $wb->add_slashes($email);

// Update the database
$database = new database();
$query = "UPDATE ".TABLE_PREFIX."users SET email = '$email' WHERE user_id = '".$wb->get_user_id()."' AND password = '".md5($current_password)."'";
$database->query($query);
if($database->is_error()) {
	$wb->print_error($database->get_error,'index.php', false);
} else {
	$wb->print_success($MESSAGE['PREFERENCES']['EMAIL_UPDATED'], WB_URL.'/account/preferences.php');
	$_SESSION['EMAIL'] = $email;
}

?>