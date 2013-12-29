<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
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

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */
// Check if the user has already submitted the form, otherwise show it
$message = $MESSAGE['FORGOT_PASS_NO_DATA'];
$errMsg ='';

$redirect_url = (isset($redirect_url) && ($redirect_url!='')  ? $redirect_url : $_SESSION['HTTP_REFERER'] );
$redirect = (isset($redirect_url) && ($redirect_url!='')  ? '?redirect='.$redirect_url : '' );

if(isset($_POST['email']) && is_string($_POST['email']) )
{

    if($_POST['email'] != "" )
    {
    
    	$email = strip_tags($_POST['email']);
    	if($wb->validate_email($email) == false)
        {
    		$errMsg = $MESSAGE['USERS_INVALID_EMAIL'];
    		$email = '';
    	} else {
        // Check if the email exists in the database
        	$sql  = 'SELECT `user_id`,`username`,`display_name`,`email`,`last_reset`,`password` '
        	      . 'FROM `'.TABLE_PREFIX.'users` '
        	      . 'WHERE `email`=\''.$wb->add_slashes($email).'\'';

        	if(($results = $database->query($sql)))
        	{
        		if(($results_array = $results->fetchRow(MYSQL_ASSOC)))
        		{ // Get the id, username, email, and last_reset from the above db query
        		// Check if the password has been reset in the last 2 hours
        			if( (time() - (int)$results_array['last_reset']) < (2 * 3600) ) {
        			// Tell the user that their password cannot be reset more than once per hour
        				$errMsg = $MESSAGE['FORGOT_PASS_ALREADY_RESET'];
        			} else {
        				$pwh = Password::getInstance();
        				$old_pass = $results_array['password'];
        			// Generate a random password then update the database with it
        				$new_pass = $pwh->createNew();
        				$sql = 'UPDATE `'.TABLE_PREFIX.'users` '
        				     . 'SET `password`=\''.md5($new_pass).'\', '
        				     .     '`last_reset`='.time().' '
        				     . 'WHERE `user_id`='.(int)$results_array['user_id'];
        				unset($pwh); // destroy $pwh-Object
        				if($database->query($sql))
        				{ // Setup email to send
        					$mail_to = $email;
        					$mail_subject = $MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'];
        				// Replace placeholders from language variable with values
        					$search = array('{LOGIN_DISPLAY_NAME}', '{LOGIN_WEBSITE_TITLE}', '{LOGIN_NAME}', '{LOGIN_PASSWORD}');
        					$replace = array($results_array['display_name'], WEBSITE_TITLE, $results_array['username'], $new_pass);
        					$mail_message = str_replace($search, $replace, $MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT']);
        				// Try sending the email
        					if($wb->mail(SERVER_EMAIL,$mail_to,$mail_subject,$mail_message)) {
        						$message = $MESSAGE['FORGOT_PASS_PASSWORD_RESET'];
        						$display_form = false;
        					}else { // snd mail failed, rollback
        						$sql = 'UPDATE `'.TABLE_PREFIX.'users` '.
        						       'SET `password`=\''.$old_pass.'\' '.
        						       'WHERE `user_id`='.(int)$results_array['user_id'];
        						$database->query($sql);
        						$errMsg = $MESSAGE['FORGOT_PASS_CANNOT_EMAIL'];
        					}
        				}else { // Error updating database
        					$errMsg = $MESSAGE['RECORD_MODIFIED_FAILED'];
        					if(DEBUG) {
        						$message .= '<br />'.$database->get_error();
        						$message .= '<br />'.$sql;
        					}
        				}
        			}
        		}else { // no record found - Email doesn't exist, so tell the user
        			$errMsg = $MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'];
        		}
        	} else { // Query failed
        		$errMsg = 'SystemError:: Database query failed!';
//            	$errMsg = $MESSAGE['USERS_INVALID_EMAIL'];
        		if(DEBUG) {
        			$errMsg .= '<br />'.$database->get_error();
        			$errMsg .= '<br />'.$sql;
        		}
        	}
    	}
    }  else {
    	$email = '';
    }
    
} else {
	$email = '';
}

if( ($errMsg=='') && ($message != '')) {
	// $message = $MESSAGE['FORGOT_PASS_NO_DATA'];
	$message_color = '000000';
} else {
	$message = $errMsg;
	$message_color = 'ff0000';
}

$sIncludeHeadLinkCss = '';
if( is_readable(WB_PATH .'/account/frontend.css')) {
	$sIncludeHeadLinkCss .= '<link href="'.WB_URL.'/account/frontend.css"';
	$sIncludeHeadLinkCss .= ' rel="stylesheet" type="text/css" media="screen" />'."\n";
}

// set template file and assign module and template block
	$oTpl = new Template(dirname(__FILE__).'/htt','keep');
	$oTpl->set_file('page', 'forgot.htt');
	$oTpl->debug = false; // false, true
	$oTpl->set_block('page', 'main_block', 'main');

	$oTpl->set_block('main_block', 'message_block', 'message');
	$oTpl->set_block('message', '');
	if(!isset($display_form) OR $display_form != false) {}
// generell vars
	$oTpl->set_var(array(
		'FTAN' => $wb->getFTAN(),
		'ACTION_URL' => WB_URL.'/account/forgot.php',
		'LOGIN_URL' => WB_URL.'/account/login.php'.$redirect,
		'REDIRECT_URL' => $redirect_url,
		'URL' => $redirect_url,
		'WB_URL' => WB_URL,
		'THEME_URL' => THEME_URL,
		'TEMPLATE_URL' => TEMPLATE_DIR,
        'CSS_BLOCK'	=> $sIncludeHeadLinkCss,
		'HTTP_REFERER' => $_SESSION['HTTP_REFERER'],
		'MESSAGE_VALUE' => '',
		'ERROR_VALUE' => '',
		'THISAPP_MESSAGE_VALUE' => $message,
		'TEXT_USERNAME' => $TEXT['USERNAME'],
		'TEXT_EMAIL' => $TEXT['EMAIL'],
//		'USER_FIELDNAME' => $username_fieldname,
		'TEXT_SEND_DETAILS' => $TEXT['NEW_PASSWORD'],
		'TEXT_NEED_TO_LOGIN' => $TEXT['NEED_TO_LOGIN'],
		'MENU_FORGOT' => $MENU['FORGOT'],
		'TEXT_RESET' => $TEXT['RESET'],
		'TEXT_CANCEL' => $TEXT['CANCEL'],
		)
	);

	//$oTpl->parse('message', 'message_block', true);
	$oTpl->parse('main', 'main_block', false);
	$output = $oTpl->finish($oTpl->parse('output', 'page'));
	unset($oTpl);
	print $output;
