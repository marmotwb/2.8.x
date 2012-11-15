<?php
/**
 *
 * @category        admin
 * @package         media
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
if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

$admin = new admin('Media', 'media', false);

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Get the current dir
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$directory = (isset(${$requestMethod}['dir'])) ? ${$requestMethod}['dir'] : '';
$directory = ($directory == '/') ?  '' : $directory;

$dirlink = 'browse.php?dir='.$directory;
$rootlink = 'browse.php?dir=';
// $file_id = intval($admin->get_post('id'));

// Get the current dir
$currentHome = $admin->get_home_folder();
// check for correct directory
if ($currentHome && stripos(WB_PATH.MEDIA_DIRECTORY.$rootlink,WB_PATH.MEDIA_DIRECTORY.$currentHome)===false) {
	$rootlink = $currentHome;
}

// first Check to see if it contains ..
if (!check_media_path($directory)) {
	$admin->print_error($MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'],$rootlink, false);
}

// Get the temp id
$file_id = intval($admin->checkIDKEY('id', false, $_SERVER['REQUEST_METHOD']));
if (!$file_id) {
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],$dirlink, false);
}

// Check for potentially malicious files
$forbidden_file_types  = preg_replace( '/\s*[,;\|#]\s*/','|',RENAME_FILES_ON_UPLOAD);
// Get home folder not to show
$home_folders = get_home_folders();

// Figure out what folder name the temp id is
if($handle = opendir(WB_PATH.MEDIA_DIRECTORY.'/'.$directory)) {
	// Loop through the files and dirs an add to list
   while (false !== ($file = readdir($handle))) {
		$info = pathinfo($file);
		$ext = isset($info['extension']) ? $info['extension'] : '';
		if(substr($file, 0, 1) != '.' AND $file != '.svn' AND $file != 'index.php') {
			if( !preg_match('/'.$forbidden_file_types.'$/i', $ext) ) {
				if(is_dir(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$file)) {
					if(!isset($home_folders[$directory.'/'.$file])) {
						$DIR[] = $file;
					}
				} else {
					$FILE[] = $file;
				}
			}
		}
	}
	$temp_id = 0;
	if(isset($DIR)) {
		sort($DIR);
		foreach($DIR AS $name) {
			$temp_id++;
			if($file_id == $temp_id) {
				$rename_file = $name;
				$type = 'folder';
			}
		}
	}
	if(isset($FILE)) {
		sort($FILE);
		foreach($FILE AS $name) {
			$temp_id++;
			if($file_id == $temp_id) {
				$rename_file = $name;
				$type = 'file';
			}
		}
	}
}

$file_id = $admin->getIDKEY($file_id);

if(!isset($rename_file)) {
	$admin->print_error($MESSAGE['MEDIA_FILE_NOT_FOUND'], $dirlink, false);
}

// Check if they entered a new name
if(media_filename($admin->get_post('name')) == "") {
	$admin->print_error($MESSAGE['MEDIA_BLANK_NAME'], "rename.php?dir=$directory&id=$file_id", false);
} else {
	$old_name = $admin->get_post('old_name');
	$new_name =  media_filename($admin->get_post('name'));
}

// Check if they entered an extension
if($type == 'file') {
	if(media_filename($admin->get_post('extension')) == "") {
		$admin->print_error($MESSAGE['MEDIA_BLANK_EXTENSION'], "rename.php?dir=$directory&id=$file_id", false);
	} else {
		$extension = media_filename($admin->get_post('extension'));
	}
} else {
	$extension = '';
}

// Join new name and extension
$name = $new_name.$extension;

$info = pathinfo(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$name);
$ext = isset($info['extension']) ? $info['extension'] : '';
$dots = (substr($info['basename'], 0, 1) == '.') || (substr($info['basename'], -1, 1) == '.');

if( preg_match('/'.$forbidden_file_types.'$/i', $ext) || $dots == '.' ) {
	$admin->print_error($MESSAGE['MEDIA_CANNOT_RENAME'], "rename.php?dir=$directory&id=$file_id", false);
}

// Check if the name contains ..
if(strstr($name, '..')) {
	$admin->print_error($MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'], "rename.php?dir=$directory&id=$file_id", false);
}

// Check if the name is index.php
if($name == 'index.php') {
	$admin->print_error($MESSAGE['MEDIA_NAME_INDEX_PHP'], "rename.php?dir=$directory&id=$file_id", false);
}

// Check that the name still has a value
if($name == '') {
	$admin->print_error($MESSAGE['MEDIA_BLANK_NAME'], "rename.php?dir=$directory&id=$file_id", false);
}

$info = pathinfo(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$rename_file);
$ext = isset($info['extension']) ? $info['extension'] : '';
$dots = (substr($info['basename'], 0, 1) == '.') || (substr($info['basename'], -1, 1) == '.');

if( preg_match('/'.$forbidden_file_types.'$/i', $ext) || $dots == '.' ) {
	$admin->print_error($MESSAGE['MEDIA_CANNOT_RENAME'], "rename.php?dir=$directory&id=$file_id", false);
}

// Check if we should overwrite or not
if($admin->get_post('overwrite') != 'yes' AND file_exists(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$name) == true) {
	if($type == 'folder') {
		$admin->print_error($MESSAGE['MEDIA_DIR_EXISTS'], "rename.php?dir=$directory&id=$file_id", false);
	} else {
		$admin->print_error($MESSAGE['MEDIA_FILE_EXISTS'], "rename.php?dir=$directory&id=$file_id", false);
	}
}

// Try and rename the file/folder
if(rename(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$rename_file, WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$name)) {
	$usedFiles = array();
    // feature freeze
	// require_once(ADMIN_PATH.'/media/dse.php');

	$admin->print_success($MESSAGE['MEDIA_RENAMED'], $dirlink);
} else {
	$admin->print_error($MESSAGE['MEDIA_CANNOT_RENAME'], "rename.php?dir=$directory&id=$file_id", false);
}
