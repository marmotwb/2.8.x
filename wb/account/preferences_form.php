<?php
/**
*
* @category        frontend
* @package         account
* @author          WebsiteBaker Project
* @copyright       2009-2012, WebsiteBaker Org. e.V.
* @link	           http://www.websitebaker2.org/
* @license         http://www.gnu.org/licenses/gpl.html
* @platform        WebsiteBaker 2.8.x
* @requirements    PHP 5.2.2 and higher
* @version         $Id$
* @filesource      $HeadURL$
* @lastmodified    $Date$
*
*/

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
require_once(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php');
throw new IllegalFileException();
}
/* -------------------------------------------------------- */

$oReg  = WbAdaptor::getInstance();
$mLang = Translate::getinstance();

if($wb->is_authenticated() === false) {
// User needs to login first
    header("Location: ".WB_URL."/account/login.php?redirect=".$wb->link);
    exit(0);
}

/**
 *
 */
$sUserLanguage = LANGUAGE;
// Check existing language
	$sql  = 'SELECT `language` ';
	$sql .= 'FROM `'.TABLE_PREFIX.'users` ';
	$sql .= 'WHERE `user_id` = '.$wb->get_user_id();
    if ($sUserLanguage = $database->get_one($sql)) {
		$_SESSION['LANGUAGE'] = $sUserLanguage;
    }

$sDefaultLanguage = DEFAULT_LANGUAGE;
//$sLang = $wb->get_session('LANGUAGE');
$sLanguage = LANGUAGE.'.php';

$LanguageDir = WB_PATH .'/account/languages/';
$sLanguageFile = ( file_exists($LanguageDir.$sUserLanguage.'.php') ? $LanguageDir.$sUserLanguage.'.php' : $LanguageDir.$sLanguage);
$sLanguageFile = ( is_readable($sLanguageFile) ?  $sLanguageFile :  $LanguageDir.$sDefaultLanguage.'.php'   );
// load module default language file (EN)
require($sLanguageFile);

if(!function_exists('utf8_check')) { require(WB_PATH.'/framework/functions-utf8.php'); }

$sIncludeHeadLinkCss = '';
if( is_readable(WB_PATH .'/account/frontend.css')) {
	$sIncludeHeadLinkCss .= '<link href="'.WB_URL.'/account/frontend.css"';
	$sIncludeHeadLinkCss .= ' rel="stylesheet" type="text/css" media="screen" />'."\n";
}

$error = array();
$success = array();

$template = new Template(WB_PATH .'/account/htt','keep');

// show template
$template->set_file('page', 'preferences.htt');
$template->set_block('page', 'main_block', 'main');

/**
 *
 */
switch($wb->get_post('action')):
    case 'details':
        require_once(WB_PATH .'/account/details.php');
        break;
    case 'email':
        require_once(WB_PATH .'/account/email.php');
        break;
    case 'password':
        require_once(WB_PATH .'/account/password.php');
        break;
    default:
// do nothing
endswitch; // switch

// get existing values from database
$sql  = "SELECT `display_name`,`email`,`language`,`timezone`,`date_format`,`time_format` ";
$sql .= "FROM `".TABLE_PREFIX."users` ";
$sql .= "WHERE `user_id` = '".$wb->get_user_id()."'";

if($rowset = $database->query($sql)) {
    $row = $rowset->fetchRow();
    $_SESSION['LANGUAGE'] = $row['language'];
    $_SESSION['EMAIL'] = $row['email'];
    $_SESSION['DISPLAY_NAME'] = $row['display_name'];
    $_SESSION['TIMEZONE'] = $row['timezone'];
    $_SESSION['DATE_FORMAT'] = $row['date_format'];
    $_SESSION['TIME_FORMAT'] = $row['time_format'];
}
if($database->is_error()) $error[] = $database->get_error();
// insert values into form
$template->set_var('DISPLAY_NAME', $row['display_name']);
$template->set_var('EMAIL', $row['email']);
$template->set_var('ACTION_URL', WB_URL.'/account/preferences.php');

$_SESSION['HTTP_REFERER'] =( ($_SESSION['LANGUAGE'] != LANGUAGE ) ? WB_URL.'?lang='.$_SESSION['LANGUAGE'] : $_SESSION['HTTP_REFERER']);
$template->set_block('main_block', 'show_detail_send_block', 'show_detail_send');
$template->set_block('main_block', 'show_email_send_block', 'show_email_send');
$template->set_block('main_block', 'show_password_send_block', 'show_password_send');

$aLangAddons = array();
$aLangBrowser = array();
// default, if no information from client available
$sAutoLanguage = DEFAULT_LANGUAGE;

// read available languages from table addons
$aLangAddons = $admin->getAvailableLanguages();

$aLangUsed = array_flip(explode(',',$wb->getLanguagesInUsed()));
$aLangUsed = array_intersect_key($aLangAddons, $aLangUsed);
if( (sizeof($aLangUsed)<2) || !($oReg->PageLanguages) ){
    $aLangUsed =  $aLangAddons;    
}

if( !(array_key_exists($sUserLanguage, $aLangUsed)) ) {
    $template->parse('show_detail_send', '');
    $template->parse('show_email_send', '');
    $template->parse('show_password_send', '');
} else {
    $template->parse('show_detail_send', 'show_detail_send_block');
    $template->parse('show_email_send', 'show_email_send_block');
    $template->parse('show_password_send', 'show_password_send_block');
}

// Insert language text and messages visibilty="hidden"
// WB_URL.'/account/preferences.php'
$template->set_var(array(
    'REFERER_ID' => ( $wb->get_session('HTTP_REFERER')!='' ? $_SESSION['HTTP_REFERER'] : WB_URL),
    'HTTP_REFERER' => (!(array_key_exists($sUserLanguage, $aLangUsed)) ?WB_URL.'/account/preferences.php':( $wb->get_session('HTTP_REFERER')!='' ? $_SESSION['HTTP_REFERER'] : WB_URL)),
    'CSS_BLOCK'	=> $sIncludeHeadLinkCss,
    'TEXT_SAVE'	=> $TEXT['SAVE'],
    'TEXT_RESET' => $TEXT['RESET'],
    'SUBMIT_BUTTON' => (!(array_key_exists($sUserLanguage, $aLangUsed)) ?'submit':'button'),
    'VALUE_BUTTON' => (!(array_key_exists($sUserLanguage, $aLangUsed)) ?'details':'cancel'),
    'TEXT_CANCEL' => (!(array_key_exists($sUserLanguage, $aLangUsed)) ? $MOD_PREFERENCE['SAVE_LANGUAGE']:$TEXT['CANCEL']),
    'MOD_PREFERENCE_SET_PREFERENCES_LANGUAGE' => !(array_key_exists($sUserLanguage, $aLangUsed)) ? $MOD_PREFERENCE['SET_PREFERENCES_LANGUAGE']:'',
    'DISPLAY_PREFERENCES_LANGUAGE' => !(array_key_exists($sUserLanguage, $aLangUsed)) ? '':'display:none',
	'TEXT_DISPLAY_NAME'	=> $TEXT['DISPLAY_NAME'],
    'TEXT_EMAIL' => $TEXT['EMAIL'],
    'TEXT_LANGUAGE' => $TEXT['LANGUAGE'],
    'TEXT_TIMEZONE' => $TEXT['TIMEZONE'],
    'TEXT_DATE_FORMAT' => $TEXT['DATE_FORMAT'],
    'TEXT_TIME_FORMAT' => $TEXT['TIME_FORMAT'],
    'TEXT_CURRENT_PASSWORD' => $TEXT['CURRENT_PASSWORD'],
    'TEXT_NEW_PASSWORD' => $TEXT['NEW_PASSWORD'],
    'TEXT_RETYPE_NEW_PASSWORD' => $TEXT['RETYPE_NEW_PASSWORD']
    )
);

// read available languages from table addons and assign it to the template
$template->set_block('main_block', 'language_list_block', 'language_list');
foreach( $aLangUsed as $sDirectory => $sName  )
{
	$langIcons = ( empty($sDirectory) ? 'none' : strtolower($sDirectory));

	$template->set_var('CODE',        $sDirectory);
	$template->set_var('NAME',        $sName);
	$template->set_var('FLAG',        THEME_URL.'/images/flags/'.$langIcons);
	$template->set_var('SELECTED',    ( $_SESSION['LANGUAGE'] == $sDirectory ? ' selected="selected"' : '') );

	$template->parse('language_list', 'language_list_block', true);
}

// Insert default timezone values
$user_time = true;
require(ADMIN_PATH.'/interface/timezones.php');
$template->set_block('main_block', 'timezone_list_block', 'timezone_list');
foreach($TIMEZONES AS $hour_offset => $title) {
	$template->set_var('VALUE',    $hour_offset);
	$template->set_var('NAME',     $title);
	$template->set_var('SELECTED', ($wb->get_timezone() == ($hour_offset * 3600) ? ' selected="selected"' : '') );
	$template->parse('timezone_list', 'timezone_list_block', true);
}
// Insert date format list
$user_time = true;
require(ADMIN_PATH.'/interface/date_formats.php');
$template->set_block('main_block', 'date_format_list_block', 'date_format_list');
foreach($DATE_FORMATS AS $format => $title)
{
	$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
	if($format != 'system_default') {
	    $template->set_var('VALUE', $format);
	} else {
	    $template->set_var('VALUE', '');
	}
	$template->set_var('NAME', $title);
	if($wb->get_session('DATE_FORMAT') == $format AND !isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) {
	    $template->set_var('SELECTED', 'selected="selected"');
	} elseif($format == 'system_default' AND isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) {
	    $template->set_var('SELECTED', 'selected="selected"');
	} else {
	    $template->set_var('SELECTED', '');
	}
	$template->parse('date_format_list', 'date_format_list_block', true);
}

// Insert time format list
$user_time = true;
require(ADMIN_PATH.'/interface/time_formats.php');
$template->set_block('main_block', 'time_format_list_block', 'time_format_list');
foreach($TIME_FORMATS AS $format => $title)
{
	$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
	if($format != 'system_default') {
	    $template->set_var('VALUE', $format);
	} else {
	    $template->set_var('VALUE', '');
	}
	$template->set_var('NAME', $title);
	if($wb->get_session('TIME_FORMAT') == $format AND !isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) {
	    $template->set_var('SELECTED', 'selected="selected"');
	} elseif($format == 'system_default' AND isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) {
	    $template->set_var('SELECTED', 'selected="selected"');
	} else {
	$template->set_var('SELECTED',  '');
	}
	$template->parse('time_format_list', 'time_format_list_block', true);
}
// Insert language headings
$template->set_var(array(
    'HEADING_MY_SETTINGS' => $HEADING['MY_SETTINGS'],
    'HEADING_MY_EMAIL'    => $HEADING['MY_EMAIL'],
    'HEADING_MY_PASSWORD' => $HEADING['MY_PASSWORD']
    )
);

// Insert module releated language text and messages
$template->set_var(array(
    'MOD_PREFERENCE_PLEASE_SELECT'  => $MOD_PREFERENCE['PLEASE_SELECT'],
    'MOD_PREFERENCE_SAVE_SETTINGS'  => $MOD_PREFERENCE['SAVE_SETTINGS'],
    'MOD_PREFERENCE_SAVE_EMAIL'     => $MOD_PREFERENCE['SAVE_EMAIL'],
    'MOD_PREFERENCE_SAVE_PASSWORD'  => $MOD_PREFERENCE['SAVE_PASSWORD'],
    )
);
// Insert error and/or success messages
$template->set_block('main_block', 'error_block', 'error_list');
$template->set_var('ERROR_VALUE', '');
if(sizeof($error)>0){
    $template->set_var('ERROR_VALUE', $wb->format_message(implode('<br />',$error),'error'));
    $template->parse('error_list', 'error_block', true);
} else {
    $template->parse('error_list', '');
}

$template->set_block('main_block', 'success_block', 'success_list');
$template->set_var('SUCCESS_VALUE', '');
if(sizeof($success)!=0){
    $template->set_var('SUCCESS_VALUE', $wb->format_message(implode('<br />',$success),'ok'));
    $template->parse('success_list', 'success_block', true);
} else {
    $template->parse('success_list', '');
}
// Parse template for preferences form
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');
