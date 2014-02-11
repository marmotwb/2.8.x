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
//if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\media');

$admin = new admin('Media', 'media', false);

// Include the WB functions file
if(!function_exists('directory_list')) { require(WB_PATH.'/framework/functions.php'); }

// Get the current dir
$directory = $admin->get_get('dir');
$directory = ($directory == '/') ?  '' : $directory;

$dirlink = 'browse.php?dir='.$directory;
$rootlink = 'browse.php?dir=';
// $file_id = intval($admin->get_get('id'));

// Get the current dir
$currentHome = $admin->get_home_folder();
// check for correct directory
if ($currentHome && stripos(WB_PATH.MEDIA_DIRECTORY.$rootlink,WB_PATH.MEDIA_DIRECTORY.$currentHome)===false) {
	$rootlink = $currentHome;
}

// first Check to see if it contains ..
if (!check_media_path($directory)) {
	$admin->print_error($oTrans->MESSAGE_MEDIA_DIR_DOT_DOT_SLASH, $rootlink, false);
}

// Get the temp id
$file_id = intval($admin->checkIDKEY('id', false, $_SERVER['REQUEST_METHOD']));
if (!$file_id) {
	$admin->print_error($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS, $dirlink, false);
}

// Get home folder not to show
$home_folders = get_home_folders();
// Check for potentially malicious files
$forbidden_file_types  = preg_replace( '/\s*[,;\|#]\s*/','|',RENAME_FILES_ON_UPLOAD);

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

if(!isset($rename_file)) {
	$admin->print_error($oTrans->MESSAGE_MEDIA_FILE_NOT_FOUND, $dirlink, false);
}

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('media_rename.htt')));
$template->set_file('page', 'media_rename.htt');
$template->set_block('page', 'main_block', 'main');
//echo WB_PATH.'/media/'.$directory.'/'.$rename_file;
$template->set_var($oTrans->getLangArray());

if($type == 'folder') {
	$template->set_var('DISPlAY_EXTENSION', 'hide');
	$extension = '';
} else {
	$template->set_var('DISPlAY_EXTENSION', '');
	$extension = strstr($rename_file, '.');
}

if($type == 'folder') {
	$type = $TEXT['FOLDER'];
} else {
	$type = $TEXT['FILE'];
}

$template->set_var(array(
					'THEME_URL' => THEME_URL,
					'FILENAME' => $rename_file,
					'DIR' => $directory,
					'FILE_ID' => $admin->getIDKEY($file_id),
					// 'FILE_ID' => $file_id,
					'TYPE' => $type,
					'EXTENSION' => $extension,
					'FTAN' => $admin->getFTAN()
				)
			);
// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');
