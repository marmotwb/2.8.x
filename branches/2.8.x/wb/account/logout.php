<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
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

require("../config.php");

if(isset($_COOKIE['REMEMBER_KEY'])) {
	setcookie('REMEMBER_KEY', '', time()-3600, '/');
}

$redirect = ((isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') ?  $_SERVER['HTTP_REFERER'] : WB_URL.'/index.php');

$_SESSION['USER_ID'] = null;
$_SESSION['GROUP_ID'] = null;
$_SESSION['GROUPS_ID'] = null;
$_SESSION['USERNAME'] = null;
$_SESSION['PAGE_PERMISSIONS'] = null;
$_SESSION['SYSTEM_PERMISSIONS'] = null;
$_SESSION = array();

session_unset();
unset($_COOKIE[session_name()]);
session_destroy();

if(INTRO_PAGE) {
	header('Location: '.WB_URL.PAGES_DIRECTORY.'/index.php');
} else {
	header('Location: '.$redirect);
}

