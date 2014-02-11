<?php
/**
 *
 * @category        admin
 * @package         preferences
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.4
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// prevent this file from being accessed directly
//if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }
//Workaround if this is first page (WBAdmin in use)

// put all inside a function to prevent global vars
function build_page( admin $admin )
{
	$oReg   = WbAdaptor::getInstance();
    $oDb    = WbDatabase::getInstance();
    $oTrans = Translate::getInstance();
	$oTrans->enableAddon('admin\\preferences');
	include_once(WB_PATH.'/framework/functions-utf8.php');
	// Setup template object, parse vars to it, then parse it
	// Setup template object, parse vars to it, then parse it
	// Create new template object
	$template = new Template(dirname($admin->correct_theme_source('preferences.htt')));
	$template->set_file( 'page', 'preferences.htt' );
	$template->set_block( 'page', 'main_block', 'main' );
	$template->set_var($oTrans->getLangArray());

// read user-info from table users and assign it to template
	$sql  = 'SELECT `display_name`, `username`, `email` FROM `'.$oDb->TablePrefix.'users` ';
	$sql .= 'WHERE `user_id` = '.(int)$admin->get_user_id();
	if (($res_user = $oDb->doQuery($sql))) {
		if (($rec_user = $res_user->fetchRow(MYSQL_ASSOC))) {
			$template->set_var('DISPLAY_NAME', $rec_user['display_name']);
			$template->set_var('USERNAME',     $rec_user['username']);
			$template->set_var('EMAIL',        $rec_user['email']);
			$template->set_var('ADMIN_URL',    ADMIN_URL);
		}
	}
// read available languages from table addons and assign it to the template
//	$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'addons` ';
//	$sql .= 'WHERE `type` = \'language\' ORDER BY `directory`';
//	if( $res_lang = $database->query($sql) )
//	{
//		$template->set_block('main_block', 'language_list_block', 'language_list');
//		while( $rec_lang = $res_lang->fetchRow(MYSQL_ASSOC) )
//		{
//	        $langIcons = (empty($rec_lang['directory'])) ? 'none' : strtolower($rec_lang['directory']);
//			$template->set_var('CODE',        $rec_lang['directory']);
//			$template->set_var('NAME',        $rec_lang['name']);
//			$template->set_var('FLAG',        THEME_URL.'/images/flags/'.$langIcons);
//			$template->set_var('SELECTED',    (LANGUAGE == $rec_lang['directory'] ? ' selected="selected"' : '') );
//			$template->parse('language_list', 'language_list_block', true);
//		}
//	}

$aLangAddons = array();
$aLangBrowser = array();


// default, if no information from client available
$sAutoLanguage = DEFAULT_LANGUAGE;
// read available languages from table addons
$aLangAddons = $admin->getAvailableLanguages();

$aLangUsed = array_flip(explode(',',$admin->getLanguagesInUsed()));
$aLangUsed = array_intersect_key($aLangAddons, $aLangUsed);
if( (sizeof($aLangUsed)<2) || !($oReg->PageLanguages) ){
    $aLangUsed =  $aLangAddons;    
}
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
	include_once( ADMIN_PATH.'/interface/timezones.php' );
	$template->set_block('main_block', 'timezone_list_block', 'timezone_list');
	foreach( $TIMEZONES AS $hour_offset => $title )
	{
		$template->set_var('VALUE',    $hour_offset);
		$template->set_var('NAME',     $title);
		$template->set_var('SELECTED', ($admin->get_timezone() == ($hour_offset * 3600) ? ' selected="selected"' : '') );
		$template->parse('timezone_list', 'timezone_list_block', true);
	}
// Insert date format list
	$user_time = true;
	include_once( ADMIN_PATH.'/interface/date_formats.php' );
	$template->set_block('main_block', 'date_format_list_block', 'date_format_list');

	foreach( $DATE_FORMATS AS $format => $title )
	{
		$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
		$template->set_var( 'VALUE', ($format != 'system_default' ? $format : 'system_default') );
		$template->set_var( 'NAME',  $title );
		if( ($admin->get_session('DATE_FORMAT') == $format && !isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) ||
			('system_default' == $format && isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) )
		{
			$template->set_var('SELECTED', ' selected="selected"');
		}else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('date_format_list', 'date_format_list_block', true);
	}
// Insert time format list
	$user_time = true;
	include_once( ADMIN_PATH.'/interface/time_formats.php' );
	$template->set_block('main_block', 'time_format_list_block', 'time_format_list');
	foreach( $TIME_FORMATS AS $format => $title )
	{
		$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
		$template->set_var('VALUE', $format != 'system_default' ? $format : 'system_default' );
		$template->set_var('NAME',  $title);
		if( ($admin->get_session('TIME_FORMAT') == $format && !isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) ||
		    ('system_default' == $format && isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) )
		{
			$template->set_var('SELECTED', ' selected="selected"');
		} else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('time_format_list', 'time_format_list_block', true);
	}

// assign systemvars to template
	$template->set_var(array( 'ADMIN_URL'  => ADMIN_URL,
	                          'WB_URL'     => WB_URL,
                              'THEME_URL'  => THEME_URL,
		                      'ACTION_URL' => ADMIN_URL.'/preferences/save.php'
                            )
                      );
	$template->set_var('FTAN', $admin->getFTAN());
	$template->set_var('FORM_NAME', 'preferences_save');
// assign language vars
	$template->set_var(array( 
                              'EMPTY_STRING'             => ''
                            )
                      );
// Parse template for preferences form
	$template->parse('main', 'main_block', false);
	$output = $template->finish($template->parse('output', 'page'));

	return $output;
}
// test if valid $admin-object already exists (bit complicated about PHP4 Compatibility)
if( !(isset($admin) && is_object($admin) && (get_class($admin) == 'admin')) )
{
    require( '../../config.php' );
	$admin = new admin('Preferences');
}
echo build_page($admin);
$admin->print_footer();
