<?php
/**
 *
 * @category        admin
 * @package         logout
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

require('../../config.php');

// delete remember key of current user from database
if (isset($_SESSION['USER_ID']) && isset($database)) {
	$table = TABLE_PREFIX . 'users';
    $oDb = WbDatabase::getInstance();
	$sql = 'UPDATE `'.$oDb->TablePrefix.'users` '
         . 'SET `remember_key`=\'\' '
         . 'WHERE `user_id`='.(int)$_SESSION['USER_ID'];
	$oDb->doQuery($sql);
}

// delete remember key cookie if set
if (isset($_COOKIE['REMEMBER_KEY'])) {
	setcookie('REMEMBER_KEY', '', time() - 3600, '/');
}

// delete most critical session variables manually
$_SESSION['USER_ID'] = null;
$_SESSION['GROUP_ID'] = null;
$_SESSION['GROUPS_ID'] = null;
$_SESSION['USERNAME'] = null;
$_SESSION['PAGE_PERMISSIONS'] = null;
$_SESSION['SYSTEM_PERMISSIONS'] = null;

// overwrite session array
$_SESSION = array();

// delete session cookie if set
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// delete the session itself
session_destroy();

// redirect to admin login
die(header('Location: ' . ADMIN_URL . '/login/index.php'));

?>