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

// *** Helper function *******************************************************************
function getInfoFromLanguageFile($sFile)
{
	$mRetval = array();
	$mLang = Translate::getinstance();
    $oReg  = WbAdaptor::getInstance();
	// check for valid language code
	if(preg_match('/^([A-Z]{2}.php)/', $sFile)) {
		if(is_file($oReg->AppPath.'languages/'.$sFile) ) {
			if(is_readable($oReg->AppPath.'languages/'.$sFile) ) {
				require($oReg->AppPath.'languages/'.$sFile);
				$mRetval['CODE'] = $language_code;
				$mRetval['NAME'] = $language_name;
				$mRetval['AUTHOR'] = $language_author;
				$mRetval['VERSION'] = $language_version;
				$mRetval['DESIGNED_FOR'] = $language_platform;
			}else {
				$mRetval = $mLang->MESSAGE_ADMIN_INSUFFICIENT_PRIVELLIGES;
			}
		}else {
			$mRetval = $mLang->MESSAGE_GENERIC_NOT_INSTALLED;
		}
	}else {
		$mRetval= $mLang->MESSAGE_GENERIC_FORGOT_OPTIONS;
	}
	return $mRetval;
}
// ***************************************************************************************
// Include the config code
require('../../config.php');
// Print admin header
$mLang = Translate::getinstance();
$mLang->enableAddon('admin\addons');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'languages_view', false);
if(!$admin->checkFTAN()) {
	$admin->print_header();
	$admin->print_error($mLang->MESSAGE_GENERIC_SECURITY_ACCESS);
}
// After check print the header
$admin->print_header();
// Get language code
$sFile = (string)$admin->get_post('code').'.php';
// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('languages_details.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'languages_details.htt');
$template->set_block('page', 'main_block', 'main');
//getinfo
$aValues = getInfoFromLanguageFile($sFile);
if(!is_array($aValues)) {
	$admin->print_error($aValues);
}
$aValues['ADMIN_URL'] = ADMIN_URL;
$aValues['WB_URL']    = WB_URL;
$aValues['THEME_URL'] = THEME_URL;

// Insert values
$template->set_var($aValues);
/*-- insert all needed vars from language files ----------------------------------------*/
$template->set_var($mLang->getLangArray());

// Parse language object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');
// Print admin footer
$admin->print_footer();
