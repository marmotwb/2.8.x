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
	$sUserLanguage = strip_tags($wb->StripCodeFromText($wb->get_post('language')));
	$timezone = intval($wb->StripCodeFromText($wb->get_post('timezone')))*60*60;
	$date_format = strip_tags($wb->StripCodeFromText($wb->get_post('date_format')));
	$time_format = strip_tags($wb->StripCodeFromText($wb->get_post('time_format')));

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
		$_SESSION['TIME_FORMAT'] = $time_format;
		$_SESSION['DATE_FORMAT'] = $date_format;
		$_SESSION['TIMEZONE'] = $timezone;
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
