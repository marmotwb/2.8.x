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

// Include the config code
require('../../config.php');

// Print admin header
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'languages_view', false);
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}
// After check print the header
$admin->print_header();

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
	$admin->print_error($MESSAGE['GENERIC_FORGOT_OPTIONS']);
}

// Check if the template exists
if(!is_file(WB_PATH.'/languages/'.$file) ) {
	$admin->print_error($MESSAGE['GENERIC_NOT_INSTALLED']);
}

// Check if the template exists
if(!is_readable(WB_PATH.'/languages/'.$file) ) {
	$admin->print_error($MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES']);
}

/*
print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
print_r( $file ); print '</pre>'; // flush ();sleep(10); die();

if (!preg_match('/^[A-Z]{2}$/', $code)) {
	header("Location: index.php");
	exit(0);
}

// Check if the language exists
if(!file_exists(WB_PATH.'/languages/'.$code.'.php')) {
	header("Location: index.php");
	exit(0);
}
*/

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('languages_details.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'languages_details.htt');
$template->set_block('page', 'main_block', 'main');

// Insert values
require(WB_PATH.'/languages/'.$file);
$template->set_var(array(
						'CODE' => $language_code,
						'NAME' => $language_name,
						'AUTHOR' => $language_author,
						'VERSION' => $language_version,
						'DESIGNED_FOR' => $language_platform,
						'ADMIN_URL' => ADMIN_URL,
						'WB_URL' => WB_URL,
						'THEME_URL' => THEME_URL
						)
				);

$mLang = ModLanguage::getInstance();
$mLang->setLanguage(ADMIN_PATH.'/addons/languages/', LANGUAGE, DEFAULT_LANGUAGE);

/*-- insert all needed vars from language files ----------------------------------------*/
$template->set_var($mLang->getLangArray());

// Parse language object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();
