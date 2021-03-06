<?php
/**
 *
 * @category        admin
 * @package         modules
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// Include the config file
require('../../config.php');
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\modules');
require_once(WB_PATH .'/framework/functions.php');
require_once(WB_PATH.'/framework/class.admin.php');
// No print admin header
$admin = new admin('Addons', 'modules_view', false);
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS);
}
// After check print the header
$admin->print_header();

if(!isset($_POST['file']) OR $_POST['file'] == "") {
	$admin->print_error($oTrans->MESSAGE_GENERIC_FORGOT_OPTIONS);
} else {
	$file = preg_replace('/[^a-z0-9_-]/i', "", $_POST['file']);  // fix secunia 2010-92-2
}

// Check if the template exists
if(!is_dir(WB_PATH.'/modules/'.$file)) {
	$admin->print_error($file.'::'.$oTrans->MESSAGE_GENERIC_NOT_INSTALLED);
}

// Check if the template exists
if(!is_readable(WB_PATH.'/modules/'.$file)) {
	$admin->print_error($oTrans->MESSAGE_ADMIN_INSUFFICIENT_PRIVELLIGES);
}
// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('modules_details.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'modules_details.htt');
$template->set_block('page', 'main_block', 'main');
$template->set_var($oTrans->getLangArray());
// Insert values
$module = false;
$sql = 'SELECT * FROM  `'.TABLE_PREFIX.'addons` '
     . 'WHERE `type` = \'module\' '
     . 'AND `directory`= \''.$file.'\' ';
if( ($result = $database->query($sql)) ){
	$module = $result->fetchRow(MYSQL_ASSOC);
}
if(!$module) { $admin->print_error($oTrans->MESSAGE_GENERIC_NOT_INSTALLED); }
/*-- insert all needed vars from language files ----------------------------------------*/
$template->set_var($oTrans->getLangArray());

// check if a module description exists for the displayed backend language
$tool_description = false;
if(function_exists('file_get_contents') && file_exists(WB_PATH.'/modules/'.$file.'/languages/'.LANGUAGE .'.php')) {
	// read contents of the module language file into string
	$data = @file_get_contents(WB_PATH .'/modules/' .$file .'/languages/' .LANGUAGE .'.php');
	// use regular expressions to fetch the content of the variable from the string
	$tool_description = get_variable_content('module_description', $data, false, false);
	// replace optional placeholder {WB_URL} with value stored in config.php
	if($tool_description !== false && strlen(trim($tool_description)) != 0) {
		$tool_description = str_replace('{WB_URL}', WB_URL, $tool_description);
	} else {
		$tool_description = false;
	}
}
if($tool_description !== false) {
	// Override the module-description with correct desription in users language
	$module['description'] = $tool_description;
}

$template->set_var(array(
								'NAME' => $module['name'],
								'AUTHOR' => $module['author'],
								'DESCRIPTION' => $module['description'],
								'VERSION' => $module['version'],
								'DESIGNED_FOR' => $module['platform'],
								'ADMIN_URL' => ADMIN_URL,
								'WB_URL' => WB_URL,
								'THEME_URL' => THEME_URL
								)
						);

switch ($module['function']) {
	case NULL:
		$type_name = $oTrans->TEXT_UNKNOWN;
		break;
	case 'page':
		$type_name = $oTrans->TEXT_PAGE;
		break;
	case 'wysiwyg':
		$type_name = $oTrans->TEXT_WYSIWYG_EDITOR;
		break;
	case 'tool':
		$type_name = $oTrans->TEXT_ADMINISTRATION_TOOL;
		break;
	case 'admin':
		$type_name = $oTrans->TEXT_ADMIN;
		break;
	case 'administration':
		$type_name = $oTrans->TEXT_ADMINISTRATION;
		break;
	case 'snippet':
		$type_name = $oTrans->TEXT_CODE_SNIPPET;
		break;
	default:
		$type_name = $oTrans->TEXT_UNKNOWN;
}
$template->set_var('TYPE', $type_name);


// Parse module object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');
// Print admin footer
$admin->print_footer();
