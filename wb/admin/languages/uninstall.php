<?php
/**
 *
 * @category        admin
 * @package         languages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description
 *
 */

// Include config file
$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require($config_file);
}

if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

$admin = new admin('Addons', 'languages_uninstall', false);
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}
// After check print the header
$admin->print_header();
$oLang = Translate::getInstance();
$oLang->enableAddon('admin\\languages');

// Get language name
if(!isset($_POST['code']) OR $_POST['code'] == "") {
	$code = '';
	$file = '';
} else {
	$code = $_POST['code'];
	$file = $_POST['code'].'.php';
}
// fix secunia 2010-93-2
if (!preg_match('/^([A-Z]{2}.php)/', $file)) {
	$admin->print_error($oLang->MESSAGE_GENERIC_FORGOT_OPTIONS);
}

// Check if the template exists
if(!is_file(WB_PATH.'/languages/'.$file)) {
	$admin->print_error($oLang->MESSAGE_GENERIC_NOT_INSTALLED);
}

// Check if the template exists
if(!is_readable(WB_PATH.'/languages/'.$file)) {
	$admin->print_error($oLang->MESSAGE_ADMIN_INSUFFICIENT_PRIVELLIGES);
}

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Check if the language is in use
if($code == DEFAULT_LANGUAGE OR $code == LANGUAGE) {
	$admin->print_error($oLang->MESSAGE_GENERIC_CANNOT_UNINSTALL_IN_USE);
} else {
	$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'users` ';
	$sql .= 'WHERE`language`=\''.$database->escapeString($code).'\'';
	if( $database->get_one($sql) ) {
		$admin->print_error($oLang->MESSAGE_GENERIC_CANNOT_UNINSTALL_IN_USE);
	}
}

// Try to delete the language code
if(!unlink(WB_PATH.'/languages/'.$file)) {
	$admin->print_error($oLang->MESSAGE_GENERIC_CANNOT_UNINSTALL);
} else {
	// Remove entry from DB
	$sql  = 'DELETE FROM `'.TABLE_PREFIX.'addons` ';
	$sql .= 'WHERE `directory`=\''.$database->escapeString($code).'\' ';
	$sql .=   'AND `type`=`type`=\'language\' ';
	if( $database->query($sql) ) {
        // Print success message
        $admin->print_success($oLang->MESSAGE_GENERIC_UNINSTALLED);
    } else {
    	$admin->print_error($oLang->MESSAGE_GENERIC_CANNOT_UNINSTALL.'<br />'.$database->get_error());
    }
}

// Print admin footer
$admin->print_footer();
