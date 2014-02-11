<?php
/**
 *
 * @category        admin
 * @package         admintools
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
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

if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}
//if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\media');
// Include the WB functions file
if(!function_exists('directory_list')) { require(WB_PATH.'/framework/functions.php'); }

// suppress to print the header, so no new FTAN will be set
$admin = new admin('Media', 'media_create', false);

// Get dir name and target location
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$name = (isset(${$requestMethod}['name'])) ? ${$requestMethod}['name'] : '';

// Check to see if name or target contains ../
if(strstr($name, '..')) {
	$admin->print_header();
	$admin->print_error($oTrans->MESSAGE_MEDIA_NAME_DOT_DOT_SLASH);
}

// Remove bad characters
$name = trim(media_filename($name),'.');

// Target location
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$target = (isset(${$requestMethod}['target'])) ? ${$requestMethod}['target'] : '';

if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS);
}
// After check print the header
$admin->print_header();

if (!check_media_path($target, false)) {
	$admin->print_error($oTrans->MESSAGE_MEDIA_TARGET_DOT_DOT_SLASH);
}

// Create relative path of the new dir name
$directory = WB_PATH.$target.'/'.$name;

// Check to see if the folder already exists
if(file_exists($directory)) {
	$admin->print_error($oTrans->MESSAGE_MEDIA_DIR_EXISTS);
}

if ( sizeof(createFolderProtectFile( $directory )) )
{
	$admin->print_error($oTrans->MESSAGE_MEDIA_DIR_NOT_MADE);
} else {
	$usedFiles = array();
    // feature freeze
	// require_once(ADMIN_PATH.'/media/dse.php');
	$admin->print_success($oTrans->MESSAGE_MEDIA_DIR_MADE);
}

// Print admin
$admin->print_footer();
