<?php
/**
 *
 * @category        admin
 * @package         templates
 * @author          Ryan Djurovich, WebsiteBaker Project
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

// Include the config file
require('../../config.php');
require_once(WB_PATH .'/framework/functions.php');
require_once(WB_PATH.'/framework/class.admin.php');
// suppress to print the header, so no new FTAN will be set
$admin = new admin('Addons', 'templates_view', false);
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}

// After check print the header
$admin->print_header();
// Get template name
if(!isset($_POST['file']) OR $_POST['file'] == "") {
	$admin->print_error($MESSAGE['GENERIC_FORGOT_OPTIONS']);
} else {
	$file = preg_replace('/[^a-z0-9_-]/i', "", $_POST['file']);  // fix secunia 2010-92-2
}

// Check if the template exists
if(!is_dir(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($MESSAGE['GENERIC_NOT_INSTALLED']);
}

// Check if the template exists
if(!is_readable(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES']);
}

/*
if(!isset($_POST['file']) OR $_POST['file'] == "") {
	header("Location: index.php");
	exit(0);
} else {
	$file = preg_replace('/[^a-z0-9_-]/i', "", $_POST['file']);  // fix secunia 2010-92-2
}

if(!file_exists(WB_PATH.'/templates/'.$file)) {
	header("Location: index.php");
	exit(0);
}
// Check if the template exists
if(!is_dir(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($MESSAGE['GENERIC_NOT_INSTALLED']);
}
*/

// Print admin header
//$admin = new admin('Addons', 'templates_view');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('templates_details.htt')));
// $template->debug = true;
$template->set_file('page', 'templates_details.htt');
$template->set_block('page', 'main_block', 'main');
$template->set_var('FTAN', $admin->getFTAN());

// Insert values
$result = $database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'template' AND directory = '$file'");
if($result->numRows() > 0) {
	$row = $result->fetchRow();
}

// check if a template description exists for the displayed backend language
$tool_description = false;
if(function_exists('file_get_contents') && file_exists(WB_PATH.'/templates/'.$file.'/languages/'.LANGUAGE .'.php')) {
	// read contents of the template language file into string
	$data = @file_get_contents(WB_PATH .'/templates/' .$file .'/languages/' .LANGUAGE .'.php');
	// use regular expressions to fetch the content of the variable from the string
	$tool_description = get_variable_content('template_description', $data, false, false);
	// replace optional placeholder {WB_URL} with value stored in config.php
	if($tool_description !== false && strlen(trim($tool_description)) != 0) {
		$tool_description = str_replace('{WB_URL}', WB_URL, $tool_description);
	} else {
		$tool_description = false;
	}
}
if($tool_description !== false) {
	// Override the template-description with correct desription in users language
	$row['description'] = $tool_description;
}

$template->set_var(array(
      'NAME' => $row['name'],
      'AUTHOR' => $row['author'],
      'DESCRIPTION' => $row['description'],
      'VERSION' => $row['version'],
      'DESIGNED_FOR' => $row['platform'],
      'LICENSE' => $row['license'],
    )
);

$mLang = ModLanguage::getInstance();
$mLang->setLanguage(ADMIN_PATH.'/addons/languages/', LANGUAGE, DEFAULT_LANGUAGE);

/*-- insert all needed vars from language files ----------------------------------------*/
$template->set_var($mLang->getLangArray());

$template->set_var('TEXT_FUNCTION', ($row['function'] == 'theme' ? $mLang->TEXT_THEME : $mLang->TEXT_TEMPLATE));
// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();
