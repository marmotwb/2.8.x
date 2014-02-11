<?php
/**
 *
 * @category        admin
 * @package         modules
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

// do not display notices and warnings during installation
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

// Setup admin object
//require('../../config.php');
$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require($config_file);
}

$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\modules');
$admin = new admin('Addons', 'modules_install', false);
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS);
}
// After check print the header
$admin->print_header();

// Check if user uploaded a file
if(!isset($_FILES['userfile'])) {
	header("Location: index.php");
	exit(0);
}

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Set temp vars
$temp_dir = WB_PATH.'/temp/';
$temp_file = $temp_dir . $_FILES['userfile']['name'];
$temp_unzip = WB_PATH.'/temp/unzip/';

if(!$_FILES['userfile']['error']) {
	// Try to upload the file to the temp dir
	if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $temp_file))
	{
		$admin->print_error($oTrans->MESSAGE_GENERIC_BAD_PERMISSIONS);
	}
} else {
    $iErrorMessage = ( isset($_FILES['userfile']['error']) && ( $_FILES['userfile']['error'] > 0 ) ? $_FILES['userfile']['error'] : UNKNOW_UPLOAD_ERROR );
// index for language files
	$key = 'UNKNOW_UPLOAD_ERROR';
    switch ( $iErrorMessage ) {
        case UPLOAD_ERR_INI_SIZE:
            $key = 'UPLOAD_ERR_INI_SIZE';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $key = 'UPLOAD_ERR_FORM_SIZE';
            break;
        case UPLOAD_ERR_PARTIAL:
            $key = 'UPLOAD_ERR_PARTIAL';
            break;
        case UPLOAD_ERR_NO_FILE:
            $key = 'UPLOAD_ERR_NO_FILE';
             break;
       case UPLOAD_ERR_NO_TMP_DIR:
            $key = 'UPLOAD_ERR_NO_TMP_DIR';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $key = 'UPLOAD_ERR_CANT_WRITE';
            break;
        case UPLOAD_ERR_EXTENSION:
            $key = 'UPLOAD_ERR_EXTENSION';
            break;
        default:
            $key = 'UNKNOW_UPLOAD_ERROR';
    }
    $admin->print_error($oTrans->{'MESSAGE_'.$key}.'<br />'.$oTrans->MESSAGE_GENERIC_CANNOT_UPLOAD);
}

// Include the PclZip class file (thanks to
require_once(WB_PATH.'/include/pclzip/pclzip.lib.php');

// Remove any vars with name "module_directory"
unset($module_directory);

// Setup the PclZip object
$archive = new PclZip($temp_file);
// Unzip the files to the temp unzip folder
$list = $archive->extract(PCLZIP_OPT_PATH, $temp_unzip);

// Check if uploaded file is a valid Add-On zip file
if (!($list && file_exists($temp_unzip . 'index.php')))
{
  $admin->print_error($oTrans->MESSAGE_GENERIC_INVALID_ADDON_FILE);
}

// Include the modules info file
require($temp_unzip.'info.php');

// Perform Add-on requirement checks before proceeding
require(WB_PATH . '/framework/addon.precheck.inc.php');
preCheckAddon($temp_file);
// Delete the temp unzip directory
rm_full_dir($temp_unzip);

// Check if the file is valid
if(!isset($module_directory))
{
	if(file_exists($temp_file)) { unlink($temp_file); } // Remove temp file
	$admin->print_error($oTrans->MESSAGE_GENERIC_INVALID);
}

// Check if this module is already installed
// and compare versions if so
$new_module_version = $module_version;
$action="install";
if(is_dir(WB_PATH.'/modules/'.$module_directory))
{
	if(file_exists(WB_PATH.'/modules/'.$module_directory.'/info.php'))
    {
		require(WB_PATH.'/modules/'.$module_directory.'/info.php');
		// Version to be installed is older than currently installed version
		if (versionCompare($module_version, $new_module_version, '>='))
        {

			if(file_exists($temp_file)) { unlink($temp_file); } // Remove temp file
			$admin->print_error($oTrans->MESSAGE_GENERIC_ALREADY_INSTALLED);
		}

		$action="upgrade";

	}
}

// Check if module dir is writable
if(!is_writable(WB_PATH.'/modules/'))
{
	if(file_exists($temp_file)) { unlink($temp_file); } // Remove temp file
	$admin->print_error($oTrans->MESSAGE_GENERIC_BAD_PERMISSIONS);
}

// Set module directory
$module_dir = WB_PATH.'/modules/'.$module_directory;

// Make sure the module dir exists, and chmod if needed
make_dir($module_dir);

// Unzip module to the module dir
if(isset($_POST['overwrite'])){
	$list = $archive->extract(PCLZIP_OPT_PATH, $module_dir, PCLZIP_OPT_REPLACE_NEWER );
} else {
	$list = $archive->extract(PCLZIP_OPT_PATH, $module_dir );
}

if(!$list)
{
	$admin->print_error($oTrans->MESSAGE_GENERIC_CANNOT_UNZIP);
}
/*

if ($list == 0) {
  $admin->print_error("ERROR : ".$archive->errorInfo(true));
}
*/
// Delete the temp zip file
if(file_exists($temp_file)) { unlink($temp_file); }

// Chmod all the uploaded files
$dir = dir($module_dir);
while (false !== $entry = $dir->read())
{
	// Skip pointers
	if(substr($entry, 0, 1) != '.' AND $entry != '.svn' AND !is_dir($module_dir.'/'.$entry))
    {
		// Chmod file
		change_mode($module_dir.'/'.$entry, 'file');
	}
}
/* */
// Run the modules install // upgrade script if there is one
if(file_exists($module_dir.'/'.$action.'.php'))
{
	require($module_dir.'/'.$action.'.php');
}

// Print success message
if ($action=="install")
{
	// Load module info into DB
	load_module(WB_PATH.'/modules/'.$module_directory, false);
	$admin->print_success($oTrans->MESSAGE_GENERIC_INSTALLED);
} elseif ($action=="upgrade")
{

	upgrade_module($module_directory, false);
	$admin->print_success($oTrans->MESSAGE_GENERIC_UPGRADED);
}

// Print admin footer
$admin->print_footer();