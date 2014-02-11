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

// Print admin header
if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\media');

//if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

$admin = new admin('Media', 'media');

$starttime = explode(" ", microtime());
$starttime = $starttime[0]+$starttime[1];
include ('parameters.php');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('media.htt')));
$template->set_file('page', 'media.htt');
$template->set_block('page', 'main_block', 'main');
$template->set_var($oTrans->getLangArray());
// Include the WB functions file
if(!function_exists('directory_list')) { require(WB_PATH.'/framework/functions.php'); }

// Target location
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$directory = (isset(${$requestMethod}['dir'])) ? ${$requestMethod}['dir'] : '';

$directory = ($directory == '/') ?  '' : $directory;
$dirlink = 'index.php?dir='.$directory;
$rootlink = 'index.php?dir=';

// Get home folder not to show
$home_folders = (defined('HOME_FOLDERS') && HOME_FOLDERS) ? get_home_folders() : array();

// Insert values
$template->set_block('main_block', 'dir_list_block', 'dir_list');
$dirs = directory_list(WB_PATH.MEDIA_DIRECTORY);
$currentHome = (defined('HOME_FOLDERS') && HOME_FOLDERS) ? $admin->get_home_folder() : '';
if ($currentHome!=''){
	$dirs = directory_list(WB_PATH.MEDIA_DIRECTORY.$currentHome);
}
else
{
	$dirs = directory_list(WB_PATH.MEDIA_DIRECTORY);
}

$array_lowercase = array_map('strtolower', $dirs);
array_multisort($array_lowercase, SORT_ASC, SORT_STRING, $dirs);
foreach($dirs AS $name) {

	if(!isset($home_folders[str_replace(WB_PATH.MEDIA_DIRECTORY, '', $name)]) || $currentHome =='' )
    {
		$template->set_var('NAME', str_replace(WB_PATH, '', $name));
		$template->parse('dir_list', 'dir_list_block', true);
	}
}

// Insert permissions values
if($admin->get_permission('media_create') != true) {
	$template->set_var('DISPLAY_CREATE', 'hide');
}
if($admin->get_permission('media_upload') != true) {
	$template->set_var('DISPLAY_UPLOAD', 'hide');
}
if ($_SESSION['GROUP_ID'] != 1 && (isset($pathsettings['global']['admin_only']) && $pathsettings['global']['admin_only'])) {
    // Only show admin the settings link
	$template->set_var('DISPLAY_SETTINGS', 'hide');
}
// Workout if the up arrow should be shown
if(($dirs == '') or ($dirs==$currentHome) or (!array_key_exists('dir', $_GET))) {
	$display_up_arrow = 'hide';
} else {
	$display_up_arrow = '';
}

// Insert language headings
$template->set_var(array(
					'HOME_DIRECTORY' => $currentHome,
//					'HOME_DIRECTORY' => ( $currentHome!='') ? $currentHome : $directory,
					'DISPLAY_UP_ARROW' => $display_up_arrow // **!
				)
			);
// insert urls
$template->set_var(array(
					'ADMIN_URL' => ADMIN_URL,
					'WB_URL' => WB_URL,
					'WB_PATH' => WB_PATH,
					'THEME_URL' => THEME_URL
				)
			);
// Insert language text and messages
$template->set_var(array(
					'MEDIA_DIRECTORY' => MEDIA_DIRECTORY,
//					'MEDIA_DIRECTORY' => ($currentHome!='') ? MEDIA_DIRECTORY : $currentHome,
					'TEXT_NAME' => $oTrans->TEXT_TITLE,
					'CHANGE_SETTINGS' => $oTrans->TEXT_MODIFY_SETTINGS,
					'OPTIONS' => $oTrans->TEXT_OPTION,
					'FTAN' => $admin->getFTAN()
				)
			);

// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');
/*
$endtime=explode(" ", microtime());
$endtime=$endtime[0]+$endtime[1];
$debugVMsg = '';
if($admin->ami_group_member('1') ) {
	$debugVMsg  = "<p>Mask loaded in ".round($endtime - $starttime,6)." Sec,&nbsp;&nbsp;";
	$debugVMsg .= "Memory in use ".number_format(memory_get_usage(true), 0, ',', '.')."&nbsp;Byte,&nbsp;&nbsp;";
	$debugVMsg .= sizeof(get_included_files())."&nbsp;included files</p>";
	// $debugVMsg = print_message($debugVMsg,'#','debug',-1,false);
	print $debugVMsg.'<br />';
 }
*/
// Print admin
$admin->print_footer();
