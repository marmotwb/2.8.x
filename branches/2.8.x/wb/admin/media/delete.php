<?php
/**
 *
 * @category        admin
 * @package         admintools
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL:  $
 * @lastmodified    $Date:  $
 *
 */

// Create admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Media', 'media_delete', false);

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Get the current dir
$directory = $admin->get_get('dir');
if($directory == '/') {
	$directory = '';
}

// Check to see if it contains ..
if (!check_media_path($directory)) {
	$admin->print_header();
	$admin->print_error($MESSAGE['MEDIA']['DOT_DOT_SLASH']);
}

// Get the temp id
$file_id = $admin->checkIDKEY('id', false, 'GET');
if (!$file_id) {
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], WB_URL);
}

// Get home folder not to show
$home_folders = get_home_folders();

// Figure out what folder name the temp id is
if($handle = opendir(WB_PATH.MEDIA_DIRECTORY.'/'.$directory)) {
	// Loop through the files and dirs an add to list
   while (false !== ($file = readdir($handle))) {
		if(substr($file, 0, 1) != '.' AND $file != '.svn' AND $file != 'index.php') {
			if(is_dir(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$file)) {
				if(!isset($home_folders[$directory.'/'.$file])) {
					$DIR[] = $file;
				}
			} else {
				$FILE[] = $file;
			}
		}
	}
	$temp_id = 0;
	if(isset($DIR)) {
		sort($DIR);
		foreach($DIR AS $name) {
			$temp_id++;
			if(!isset($delete_file) AND $file_id == $temp_id) {
				$delete_file = $name;
				$type = 'folder';
			}
		}
	}
	if(isset($FILE)) {
		sort($FILE);
		foreach($FILE AS $name) {
			$temp_id++;
			if(!isset($delete_file) AND $file_id == $temp_id) {
				$delete_file = $name;
				$type = 'file';
			}
		}
	}
}

// Check to see if we could find an id to match
if(!isset($delete_file)) {
	$admin->print_error($MESSAGE['MEDIA']['FILE_NOT_FOUND'], "browse.php?dir=$directory", false);
}
$relative_path = WB_PATH.MEDIA_DIRECTORY.'/'.$directory.'/'.$delete_file;
// Check if the file/folder exists
if(!file_exists($relative_path)) {
	$admin->print_error($MESSAGE['MEDIA']['FILE_NOT_FOUND'], "browse.php?dir=$directory", false);	
}

// Find out whether its a file or folder
if($type == 'folder') {
	// Try and delete the directory
	if(rm_full_dir($relative_path)) {
		$admin->print_success($MESSAGE['MEDIA']['DELETED_DIR'], "browse.php?dir=$directory");
	} else {
		$admin->print_error($MESSAGE['MEDIA']['CANNOT_DELETE_DIR'], "browse.php?dir=$directory", false);
	}
} else {
	// Try and delete the file
	if(unlink($relative_path)) {
		$admin->print_success($MESSAGE['MEDIA']['DELETED_FILE'], "browse.php?dir=$directory");
	} else {
		$admin->print_error($MESSAGE['MEDIA']['CANNOT_DELETE_FILE'], "browse.php?dir=$directory", false);
	}
}

?>