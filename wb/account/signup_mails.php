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

            $search  = array();
            $replace = array();
		//WB_MAILER settings
			$sServerEmail = (defined('SERVER_EMAIL') && SERVER_EMAIL != '' ? SERVER_EMAIL : emailAdmin());
			$sWebMailer   = (defined('WBMAILER_DEFAULT_SENDERNAME') && WBMAILER_DEFAULT_SENDERNAME != '' ? WBMAILER_DEFAULT_SENDERNAME : 'WebsiteBaker Mailer');

			$aDebugUserMail  = array();
			$aDebugAdminMail = array();

			$bSendRegistrationMailtoUser = false;
			// Send mail to Admin easy old style
			if(!CONFIRMED_REGISTRATION)
			{
			// first send to admin
				$bSendRegistrationMailtoAdmin = false;
				$sql  = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` ';
				$sql .= 'ORDER BY `user_id` DESC ';
				$user_id = $database->get_one($sql)+1;

				$mail_replyto = $email_to;
				$mail_replyName = $sDisplayName;
				$mail_message = $mLang->MESSAGE_SIGNUP2_ADMIN_INFO;
				$email_subject = $mLang->MESSAGE_SIGNUP2_NEW_USER;
				$search = array('{LOGIN_EMAIL}','{LOGIN_ID}', '{SIGNUP_DATE}', '{LOGIN_NAME}', '{LOGIN_IP}');
				$replace = array($email_to, $email_fromname.' ('.$user_id.')', date(DATE_FORMAT.' '.TIME_FORMAT,$get_ts ), $sLoginName, $get_ip);
				$mail_message = str_replace($search, $replace, $mail_message);
				$email_body = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $mail_message );
				$success_email_to = ((defined('OWNER_EMAIL') && OWNER_EMAIL != '') ? OWNER_EMAIL : emailAdmin());
				$bSendRegistrationMailtoAdmin = $wb->mail($sServerEmail,$success_email_to,$email_subject,$email_body,$mail_replyName,$mail_replyto);

// prepare confirmation mail to user, easy old style
				if(($email_to != '') && $bSaveRegistration) {
					$sEmailSubject = $mLang->MESSAGE_SIGNUP2_SUBJECT_LOGIN_INFO;
					$mail_message  = $mLang->MESSAGE_SIGNUP2_BODY_LOGIN_INFO.$mLang->MESSAGE_SUCCESS_EMAIL_TEXT_GENERATED;
					$search  = array('{LOGIN_DISPLAY_NAME}', '{LOGIN_WEBSITE_TITLE}', '{LOGIN_NAME}', '{LOGIN_PASSWORD}');
					$replace = array($sDisplayName, WEBSITE_TITLE, $sLoginName, $sNewPassword);
					$mail_message = str_replace($search, $replace, $mail_message);
				}
			} else {
// prepare confirmation mail to user, Register with confirmation
				if(($email_to != '') && $bSaveRegistration) {
//					$daylight_saving = date('I');
					$sConfirmedTimeOut = gmdate('Y/m/d H:i',$sTimeOut).' GMT';
					$sEmailSubject = $mLang->MESSAGE_SIGNUP_ACTIVATION;
					$search = array("{LOGIN_DISPLAY_NAME}", "{LOGIN_WEBSITE_TITLE}", "{LOGIN_NAME}", "{LINK}", "{CONFIRMED_REGISTRATION_ENDTIME}" );
					$replace = array($sDisplayName, WEBSITE_TITLE, $sLoginName, $sConfirmedLink,$sConfirmedTimeOut);
					$mail_message = $mLang->MESSAGE_SEND_CONFIRMED_REGISTRATION.$mLang->MESSAGE_SUCCESS_EMAIL_TEXT_GENERATED;
					$mail_message = str_replace($search, $replace, $mail_message);
//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />'; 
//print_r( $mail_message ); print '</pre>'; // flush ();sleep(10); die();
				}
			}
// now send user email, first prepare values for both of type
			$email_body = '';
			$regex = "/[^a-z0-9ßöäüÖÄÜ !?:;,.\/_\-=+@#$&\*\(\)]/im";
			$recipient = preg_replace( $regex, "?", $sDisplayName );
			$email_fromname = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "?", $recipient );
			$email_body = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $mail_message );
			$bSendRegistrationMailtoUser = $wb->mail($sServerEmail,$email_to,$sEmailSubject,$email_body,$sWebMailer);
