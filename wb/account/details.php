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

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }

// Create a javascript back link
$js_back = WB_URL.'/account/preferences.php';

if (!$wb->checkFTAN())
{
	$wb->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], $js_back);
	exit();
}

// Get and sanitize entered values
$display_name = $wb->add_slashes(strip_tags($wb->get_post('display_name')));
$language = strtoupper($wb->get_post('language'));
$language = (preg_match('/^[A-Z]{2}$/', $language) ? $language : DEFAULT_LANGUAGE);
$timezone = (int) $wb->get_post_escaped('timezone')*60*60;

// date_format must be a key from /interface/date_formats
$date_format = $wb->get_post('date_format');
$date_format_key  = str_replace(' ', '|', $date_format);
$user_time = true;
include( ADMIN_PATH.'/interface/date_formats.php' );
$date_format = (array_key_exists($date_format_key, $DATE_FORMATS) ? $date_format : 'system_default');
$date_format = ($date_format == 'system_default' ? '' : $date_format);
unset($DATE_FORMATS);

// time_format must be a key from /interface/time_formats	
$time_format = $wb->get_post('time_format');
$time_format_key  = str_replace(' ', '|', $time_format);
$user_time = true;
include( ADMIN_PATH.'/interface/time_formats.php' );
$time_format = (array_key_exists($time_format_key, $TIME_FORMATS) ? $time_format : 'system_default');
$time_format = ($time_format == 'system_default' ? '' : $time_format);
unset($TIME_FORMATS);

// Update the database
// $database = new database();
$query = "UPDATE ".TABLE_PREFIX."users SET display_name = '$display_name', language = '$language', timezone = '$timezone', date_format = '$date_format', time_format = '$time_format' WHERE user_id = '".$wb->get_user_id()."'";
$database->query($query);
if($database->is_error()) {
	$wb->print_error($database->get_error,$js_back,false);
} else {
	$wb->print_success($MESSAGE['PREFERENCES']['DETAILS_SAVED'] );
	$_SESSION['DISPLAY_NAME'] = $display_name;
	$_SESSION['LANGUAGE'] = $language;
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
	// Update timezone
	if($timezone != '-72000') {
		$_SESSION['TIMEZONE'] = $timezone;
		if(isset($_SESSION['USE_DEFAULT_TIMEZONE'])) { unset($_SESSION['USE_DEFAULT_TIMEZONE']); }
	} else {
		$_SESSION['USE_DEFAULT_TIMEZONE'] = true;
		if(isset($_SESSION['TIMEZONE'])) { unset($_SESSION['TIMEZONE']); }
	}
}

?>