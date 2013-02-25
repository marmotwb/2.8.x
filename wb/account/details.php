<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
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

// Get entered values
	$display_name = strip_tags($wb->StripCodeFromText($wb->get_post('display_name')));
// language must be 2 upercase letters only
	$sUserLanguage = strip_tags($wb->StripCodeFromText($wb->get_post('language')));
	$sUserLanguage = (preg_match('/^[A-Z]{2}$/', $sUserLanguage) ? $sUserLanguage : DEFAULT_LANGUAGE);
// timezone must be between -12 and +13  or -20 as system_default
	$timezone = ($wb->StripCodeFromText($wb->get_post('timezone')));
	$timezone = ( (is_numeric($timezone) && ($timezone!=0)) ? $timezone : -20);
	$timezone = ( ($timezone >= -12 && $timezone <= 13) ? $timezone : -20 ) * 3600;
// date_format must be a key from /interface/date_formats
	$date_format = strip_tags($wb->StripCodeFromText($wb->get_post('date_format')));
	$date_format = (($date_format==DEFAULT_DATE_FORMAT) ? '' : $date_format);
	$date_format_key  = str_replace(' ', '|', $date_format);
	$user_time = true;
	include( ADMIN_PATH.'/interface/date_formats.php' );
	$date_format = (array_key_exists($date_format_key, $DATE_FORMATS) ? $date_format : 'system_default');
	$date_format = ($date_format == 'system_default' ? '' : $date_format);
	unset($DATE_FORMATS);
// time_format must be a key from /interface/time_formats
	$time_format = strip_tags($wb->StripCodeFromText($wb->get_post('time_format')));
	$time_format = (($time_format==DEFAULT_TIME_FORMAT) ? '' : $time_format);
	$time_format_key  = str_replace(' ', '|', $time_format);
	$user_time = true;
	include( ADMIN_PATH.'/interface/time_formats.php' );
	$time_format = (array_key_exists($time_format_key, $TIME_FORMATS) ? $time_format : 'system_default');
	$time_format = ($time_format == 'system_default' ? '' : $time_format);
	unset($TIME_FORMATS);

//  Update the database
	$sql  = "UPDATE `".TABLE_PREFIX."users` SET ";
	$sql .= "`display_name` = '".$display_name."', `language` = '".$sUserLanguage."', ";
	$sql .= "`timezone` = '".$timezone."', `date_format` = '".$date_format."', ";
	$sql .= "`time_format` = '".$time_format."' ";
	$sql .=	"WHERE `user_id` = '".$wb->get_user_id()."'";
	$database->query($sql);
	if($database->is_error()) {
		$error[] = $database->get_error();
	} else {
		$success[] = $MOD_PREFERENCE['DETAILS_SAVED'];
		$_SESSION['DISPLAY_NAME'] = $display_name;
		$_SESSION['LANGUAGE'] = $sUserLanguage;
		$_SESSION['TIMEZONE'] = $timezone;
		if(isset($_SESSION['USE_DEFAULT_TIMEZONE'])) { unset($_SESSION['USE_DEFAULT_TIMEZONE']); }
// Update date format
		if($date_format != '') {
			$_SESSION['DATE_FORMAT'] = $date_format;
			if(isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) { unset($_SESSION['USE_DEFAULT_DATE_FORMAT']); }
		} else {
			$_SESSION['USE_DEFAULT_DATE_FORMAT'] = true;
			if(isset($_SESSION['DATE_FORMAT'])) { unset($_SESSION['DATE_FORMAT']); }
		}
// Update time format
		if($time_format != '') {
			$_SESSION['TIME_FORMAT'] = $time_format;
			if(isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) { unset($_SESSION['USE_DEFAULT_TIME_FORMAT']); }
		} else {
			$_SESSION['USE_DEFAULT_TIME_FORMAT'] = true;
			if(isset($_SESSION['TIME_FORMAT'])) { unset($_SESSION['TIME_FORMAT']); }
		}
	}
