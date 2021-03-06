<?php
/**
 *
 * @category        admin
 * @package         preferences
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

function save_preferences( admin $admin)
{

    $oDb = WbDatabase::getInstance();
    $oTrans = Translate::getInstance();
    $oTrans->enableAddon('admin\\preferences');
//    $template->set_var($oTrans->getLangArray());
	$err_msg = array();
	$iMinPassLength = 6;
	$bPassRequest = false;
	$bMailHasChanged = false;
// first check form-tan
	if(!$admin->checkFTAN()){
	   $err_msg[] = $oTrans->MESSAGE_GENERIC_SECURITY_ACCESS;
    } else {
// Get entered values and validate all
	// remove any dangerouse chars from display_name
        $display_name = $admin->add_slashes(strip_tags($admin->StripCodeFromText($admin->get_post('display_name'),true)));
    	$display_name = ( $display_name == '' ? $admin->get_display_name() : $display_name );
// check that display_name is unique in whoole system (prevents from User-faking)
    	$sql  = 'SELECT COUNT(*) FROM `'.$oDb->TablePrefix.'users` ';
    	$sql .= 'WHERE `user_id` <> '.(int)$admin->get_user_id().' AND `display_name` LIKE "'.$display_name.'"';
    	if( $oDb->getOne($sql) > 0 ){ $err_msg[] = $oTrans->MESSAGE_USERS_USERNAME_TAKEN.' ('.$oTrans->TEXT_DISPLAY_NAME.')'; }
// language must be 2 upercase letters only
    	$language         = strtoupper($admin->get_post('language'));
    	$language         = (preg_match('/^[A-Z]{2}$/', $language) ? $language : DEFAULT_LANGUAGE);
// timezone must be between -12 and +13  or -20 as system_default
		$timezone         = ($admin->get_post('timezone'));
		$timezone         = ( (is_numeric($timezone) && ($timezone!=0)) ? $timezone : -20);
		$timezone         = ( ($timezone >= -12 && $timezone <= 13) ? $timezone : -20 ) * 3600;
// date_format must be a key from /interface/date_formats
		$date_format      = $admin->get_post('date_format');
		$date_format = (($date_format==DEFAULT_DATE_FORMAT) ? '' : $date_format);
		$date_format_key  = str_replace(' ', '|', $date_format);
		$user_time = true;
		include( ADMIN_PATH.'/interface/date_formats.php' );
		$date_format = (array_key_exists($date_format_key, $DATE_FORMATS) ? $date_format : 'system_default');
		$date_format = ($date_format == 'system_default' ? '' : $date_format);
		unset($DATE_FORMATS);
// time_format must be a key from /interface/time_formats
		$time_format = $admin->get_post('time_format');
		$time_format = (($time_format==DEFAULT_TIME_FORMAT) ? '' : $time_format);
		$time_format_key  = str_replace(' ', '|', $time_format);
		$user_time = true;
		include( ADMIN_PATH.'/interface/time_formats.php' );
		$time_format = (array_key_exists($time_format_key, $TIME_FORMATS) ? $time_format : 'system_default');
		$time_format = ($time_format == 'system_default' ? '' : $time_format);
		unset($TIME_FORMATS);
// email should be validatet by core

//    	$email = trim( $admin->get_post('email') == null ? '' : $admin->get_post('email') );
        $email = $admin->add_slashes(strip_tags($admin->StripCodeFromText($admin->get_post('email'),true)));
    	if( !$admin->validate_email($email) )
    	{
    		$email = '';
    		$err_msg[] = $oTrans->MESSAGE_USERS_INVALID_EMAIL;
    	} else {
    		if($email != '') {
    		// check that email is unique in whoole system
    			$sql = 'SELECT `email` FROM `'.$oDb->TablePrefix.'users` '
    			     . 'WHERE `user_id` = '.(int)$admin->get_user_id().' AND `email` LIKE \''.$email.'\'';
                $IsOldMail = $oDb->getOne($sql);
    		// check that email is unique in whoole system
    			$email = $admin->add_slashes($email);
    			$sql = 'SELECT `email` FROM `'.$oDb->TablePrefix.'users` '
    			     . 'WHERE `user_id` <> '.(int)$admin->get_user_id().' AND `email` LIKE \''.$email.'\'';
                $checkMail = $oDb->getOne($sql);

    			if( $checkMail == $email ){ $err_msg[] = $oTrans->MESSAGE_USERS_EMAIL_TAKEN; }
                $bMailHasChanged = ($email != $IsOldMail);
    		}
    	}

// receive password vars and calculate needed action
	    $sCurrentPassword = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('current_password'),true));
	    $sNewPassword = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('new_password_1'),true));
	    $sNewPasswordRetyped = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('new_password_2'),true));

	    if($bMailHasChanged == true)
	    {
	        $bPassRequest = $bMailHasChanged;
	    } else {
	        $bPassRequest = ( ( $sCurrentPassword != '') || ($sNewPassword != '') || ($sNewPasswordRetyped != '') ) ? true : false;
	    }
	    // Check existing password
		$sql = 'SELECT `password` '
		     . 'FROM `'.$oDb->TablePrefix.'users` '
		     . 'WHERE `user_id` = '.$admin->get_user_id();
		if ( $bPassRequest && md5($sCurrentPassword) != $oDb->getOne($sql) ) {
	// access denied
			$err_msg[] = $oTrans->MESSAGE_PREFERENCES_CURRENT_PASSWORD_INCORRECT;
	} else {
	// validate new password
			$sPwHashNew = false;
			if( ($sNewPassword != '') || ($sNewPasswordRetyped != '') ) {
				if(strlen($sNewPassword) < $iMinPassLength) {
					$err_msg[] = $oTrans->MESSAGE_USERS_PASSWORD_TOO_SHORT;
				} else {
					if($sNewPassword != $sNewPasswordRetyped) {
						$err_msg[] =  $oTrans->MESSAGE_USERS_PASSWORD_MISMATCH;
					} else {
						$pattern = '/[^'.$admin->password_chars.']/';
						if (preg_match($pattern, $sNewPassword)) {
							$err_msg[] = $oTrans->MESSAGE_PREFERENCES_INVALID_CHARS;
						} else {
							$sPwHashNew = md5($sNewPassword);
						}
					}
				}
			}

	// if no validation errors, try to update the database, otherwise return errormessages
			if(sizeof($err_msg) == 0)
			{
				$sql = 'UPDATE `'.$oDb->TablePrefix.'users` '
				     . 'SET `display_name`=\''.$display_name.'\', '
				     .     '`language`=\''.$language.'\', '
				     .     '`timezone`=\''.$timezone.'\', '
				     .     '`date_format`=\''.$date_format.'\', '
				     .     '`time_format`=\''.$time_format.'\'';
				if ($sPwHashNew) {
					$sql .=     ', `password`=\''.$sPwHashNew.'\'';
				}
				if ($email != '') {
					$sql .=     ', `email`=\''.$email.'\'';
				}
				$sql .= ' WHERE `user_id`='.(int)$admin->get_user_id();
				if ($oDb->doQuery($sql)) {
					// update successfull, takeover values into the session
					$_SESSION['DISPLAY_NAME'] = $display_name;
					$_SESSION['LANGUAGE'] = $language;
					$_SESSION['EMAIL'] = $email;
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
				} else {
					$err_msg[] = 'invalid database UPDATE call in '.__FILE__.'::'.__FUNCTION__.'before line '.__LINE__;
				}
			}
		}

	}

	return ( (sizeof($err_msg) > 0) ? implode('<br />', $err_msg) : '' );
}

$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require_once($config_file);
}

// suppress to print the header, so no new FTAN will be set
$admin = new admin('Preferences','start', false);

$retval = save_preferences($admin);
if ($retval == '') {
	// print the header
	$admin->print_header();
	$admin->print_success(Translate::getInstance()->MESSAGE_PREFERENCES_DETAILS_SAVED);
	$admin->print_footer();
} else {
	// print the header
	$admin->print_header();
	$admin->print_error($retval);
}
