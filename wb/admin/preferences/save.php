<?php
/**
 *
 * @category        admin
 * @package         preferences
 * @author          Independend-Software-Team
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.4.9 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */


// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Preferences');
$js_back = "javascript: history.go(-1);"; // Create a javascript back link

function save_preferences( &$admin, &$database)
{
	global $MESSAGE;
	$err_msg = array();
	$min_pass_length = 6;
// first check form-tan
	if(!$admin->checkFTAN()){ $err_msg[] = $MESSAGE['PAGES']['NOT_SAVED']; }
// Get entered values and validate all
	// remove any dangerouse chars from display_name
	$display_name     = $admin->add_slashes(strip_tags(trim($admin->get_post('display_name'))));
	$display_name     = ( $display_name == '' ? $admin->get_display_name() : $display_name );
	// check that display_name is unique in whoole system (prevents from User-faking)
	$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'users` ';
	$sql .= 'WHERE `user_id` <> '.(int)$admin->get_user_id().' AND `display_name` LIKE "'.$display_name.'"';
	if( $database->get_one($sql) > 0 ){ $err_msg[] = $MESSAGE['USERS']['USERNAME_TAKEN']; }
// language must be 2 upercase letters only
	$language         = strtoupper($admin->get_post('language'));
	$language         = (preg_match('/^[A-Z]{2}$/', $language) ? $language : DEFAULT_LANGUAGE);
// timezone must be between -12 and +13  or -20 as system_default
	$timezone         = $admin->get_post('timezone');
	$timezone         = (is_numeric($timezone) ? $timezone : -20);
	$timezone         = ( ($timezone >= -12 && $timezone <= 13) ? $timezone : -20 ) * 3600;
// date_format must be a key from /interface/date_formats
	$date_format      = $admin->get_post('date_format');
	$date_format_key  = str_replace(' ', '|', $date_format);
	$user_time = true;
	include( ADMIN_PATH.'/interface/date_formats.php' );
	$date_format = (array_key_exists($date_format_key, $DATE_FORMATS) ? $date_format : 'system_default');
	$date_format = ($date_format == 'system_default' ? '' : $date_format);
	unset($DATE_FORMATS);
// time_format must be a key from /interface/time_formats	
	$time_format      = $admin->get_post('time_format');
	$time_format_key  = str_replace(' ', '|', $time_format);
	$user_time = true;
	include( ADMIN_PATH.'/interface/time_formats.php' );
	$time_format = (array_key_exists($time_format_key, $TIME_FORMATS) ? $time_format : 'system_default');
	$time_format = ($time_format == 'system_default' ? '' : $time_format);
	unset($TIME_FORMATS);
// email should be validatet by core
	$email            = ( $admin->get_post('email') == null ? '' : $admin->get_post('email') );
	if( !$admin->validate_email($email) )
	{
		$email = '';
		$err_msg[] = $MESSAGE['USERS']['INVALID_EMAIL'];
	}else {
	// check that email is unique in whoole system
		$email = $admin->add_slashes($email);
		$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'users` ';
		$sql .= 'WHERE `user_id` <> '.(int)$admin->get_user_id().' AND `email` LIKE "'.$email.'"';
		if( $database->get_one($sql) > 0 ){ $err_msg[] = $MESSAGE['USERS']['EMAIL_TAKEN']; }
	}
// receive password vars and calculate needed action
	$current_password = $admin->get_post('current_password');
	$current_password = ($current_password == null ? '' : $current_password);
	$new_password_1   = $admin->get_post('new_password_1');
	$new_password_1   = (($new_password_1 == null || $new_password_1 == '') ? '' : $new_password_1);
	$new_password_2   = $admin->get_post('new_password_2');
	$new_password_2   = (($new_password_2 == null || $new_password_2 == '') ? '' : $new_password_2);
	if($current_password == '')
	{
		$err_msg[] = $MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'];
	}else {
	// if new_password is empty, still let current one
		if( $new_password_1 == '' )
		{
			$new_password_1 = $current_password;
			$new_password_2 = $current_password;
		}

	// is password lenght matching min_pass_lenght ?
		if( $new_password_1 != $current_password )
		{
			if( strlen($new_password_1) < $min_pass_length )
			{
				$err_msg[] = $MESSAGE['USERS']['PASSWORD_TOO_SHORT'];
			}
			$pattern = '/[^'.$admin->password_chars.']/';
			if( preg_match($pattern, $new_password_1) )
			{
				$err_msg[] = $MESSAGE['PREFERENCES']['INVALID_CHARS'];
			}
		}
	// is password lenght matching min_pass_lenght ?
		if( $new_password_1 != $current_password && strlen($new_password_1) < $min_pass_length )
		{
			$err_msg[] = $MESSAGE['USERS']['PASSWORD_TOO_SHORT'];
		}
	// password_1 matching password_2 ?
		if( $new_password_1 != $new_password_2 )
		{
			$err_msg[] = $MESSAGE['USERS']['PASSWORD_MISMATCH'];
		}
	}
	$current_password = md5($current_password);
	$new_password_1   = md5($new_password_1);
	$new_password_2   = md5($new_password_2);
// if no validation errors, try to update the database, otherwise return errormessages
	if(sizeof($err_msg) == 0)
	{
		$sql  = 'UPDATE `'.TABLE_PREFIX.'users` ';
		$sql .= 'SET `display_name` = "'.$display_name.'", ';
		$sql .=     '`password` = "'.$new_password_1.'", ';
		$sql .=     '`email` = "'.$email.'", ';
		$sql .=     '`language` = "'.$language.'", ';
		$sql .=     '`timezone` = "'.$timezone.'", ';
		$sql .=     '`date_format` = "'.$date_format.'", ';
		$sql .=     '`time_format` = "'.$time_format.'" ';
		$sql .= 'WHERE `user_id` = '.(int)$admin->get_user_id().' AND `password` = "'.$current_password.'"';
		if( $database->query($sql) )
		{
			$sql_info = mysql_info($database->db_handle);
			if(preg_match('/matched: *([1-9][0-9]*)/i', $sql_info) != 1)
			{  // if the user_id and password dosn't match
				$err_msg[] = $MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'];
			}else {
				// update successfull, takeover values into the session
				$_SESSION['DISPLAY_NAME'] = $display_name;
				$_SESSION['LANGUAGE'] = $language;
				$_SESSION['TIMEZONE'] = $timezone;
				$_SESSION['EMAIL'] = $email;
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
		}else {
			$err_msg[] = 'invalid database UPDATE call in '.__FILE__.'::'.__FUNCTION__.'before line '.__LINE__;
		}
	}
	return ( (sizeof($err_msg) > 0) ? implode('<br />', $err_msg) : '' );
}
$retval = save_preferences($admin, $database);
if( $retval == '')
{
	$admin->print_success($MESSAGE['PREFERENCES']['DETAILS_SAVED']);
	$admin->print_footer();
}else {
	$admin->print_error($retval, $js_back);
}

?>