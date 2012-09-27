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
if(defined('WB_PATH') == false)
{
	die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}
/* -------------------------------------------------------- */
if (!function_exists('ObfuscateIp')) {
	function ObfuscateIp() {
	    $sClientIp = (isset($_SERVER['REMOTE_ADDR']))
	                         ? $_SERVER['REMOTE_ADDR'] : '000.000.000.000';
//	    $iClientIp = ip2long($sClientIp);
//	    $sClientIp = long2ip(($iClientIp & ~65535));
	    return $sClientIp;
	}
}

if (!function_exists('emailAdmin')) {
	function emailAdmin() {
		global $database,$admin;
        $retval = $admin->get_email();
        if($admin->get_user_id()!='1') {
			$sql  = 'SELECT `email` FROM `'.TABLE_PREFIX.'users` ';
			$sql .= 'WHERE `user_id`=\'1\' ';
	        $retval = $database->get_one($sql);
        }
		return $retval;
	}
}

// load module language file
$mLang = ModLanguage::getInstance();
//WB_MAILER settings
$sServerEmail = (defined('SERVER_EMAIL') && SERVER_EMAIL != '' ? SERVER_EMAIL : emailAdmin());
$sWebMailer   = (defined('WBMAILER_DEFAULT_SENDERNAME') && WBMAILER_DEFAULT_SENDERNAME != '' ? WBMAILER_DEFAULT_SENDERNAME : 'WebsiteBaker Mailer');

/**
 * now send user email, if activation don't failed'
 *
 *
 */

if(($email_to != '') && $bSaveRegistration ) {

	$email_body = '';
//	$get_ip = ObfuscateIp();
	$get_ts = time();
	$mail_message = $mLang->MESSAGE_SEND_CONFIRMED_ACTIVATION.$mLang->MESSAGE_SUCCESS_EMAIL_TEXT_GENERATED;
	$search = array('{LOGIN_DISPLAY_NAME}', '{LOGIN_WEBSITE_TITLE}',  '{{webmaster_email}}');
	$replace = array($sDisplayName, WEBSITE_TITLE, $sServerEmail);
	$mail_message = str_replace($search, $replace, $mail_message);

	$email_subject = $mLang->MESSAGE_SIGNUP_ACTIVATION;
	$regex = "/[^a-z0-9ßöäüÖÄÜ !?:;,.\/_\-=+@#$&\*\(\)]/im";
	$recipient = preg_replace( $regex, "?", $sDisplayName );
	$email_fromname = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "?", $recipient );
	$email_body = preg_replace( "/(content-type:|bcc:|cc:|from:)/im", "", $mail_message );

    $bSendRegistrationMailtoUser = $wb->mail($sServerEmail,$email_to,$email_subject,$email_body,$sWebMailer);
}

	$mail_replyto = $email_to;
	$mail_replyName = $sDisplayName;
	$mail_message = $MESSAGE['SIGNUP2_ADMIN_INFO'];
	$email_subject = $MESSAGE['SIGNUP2_NEW_USER'];
	$search = array('{LOGIN_EMAIL}','{LOGIN_ID}', '{SIGNUP_DATE}', '{LOGIN_NAME}', '{LOGIN_IP}');
	$replace = array($email_to, $email_fromname.' ('.$iUserId.')', date(DATE_FORMAT.' '.TIME_FORMAT,$get_ts ), $sLoginName, $sLoginIp);
	$mail_message = str_replace($search, $replace, $mail_message);
	$email_body = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $mail_message );
	$success_email_to = emailAdmin();

	$bSendRegistrationMailtoAdmin = $wb->mail($sServerEmail,$success_email_to,$email_subject,$email_body,$mail_replyName,$mail_replyto);

	$output = '';
	msgQueue::clear();
	// success registration output
	$oTpl = new Template(dirname(__FILE__).'/htt','keep');
	$oTpl->set_file('page', 'success.htt');
	$oTpl->debug = false; // false, true
	$oTpl->set_block('page', 'main_block', 'main');
	// show messages, default block off
	$oTpl->set_block('main_block', 'show_registration_block', 'message');
	$oTpl->parse('message', '');
	if( ($msg = msgQueue::getSuccess()) != '')
	{
		$output = $wb->format_message($msg, 'ok');
		$oTpl->set_var('MESSAGE_VALUE',$output);
		$oTpl->parse('message', 'show_registration_block', true);
	}
	$oTpl->set_var(array(
			'BACK' => $TEXT['BACK'],
			'HTTP_REFERER' => isset($_SESSION['HTTP_REFERER']) ? $_SESSION['HTTP_REFERER'] : WB_URL.'/',
			)
		);

	if(CONFIRMED_REGISTRATION) {
		$sMessage  = $mLang->MESSAGE_SIGNUP2_SUBJECT_NEW_USER.'<br /> ';
		$sMessage .= $mLang->MESSAGE_ACTIVATED_NEW_USER;
		$oTpl->set_var('MESSAGE',$sMessage);
	} else {
		$sMessage  = $mLang->MESSAGE_SIGNUP2_SUBJECT_NEW_USER.' ';
		$sMessage .= $mLang->MESSAGE_SIGNUP_REGISTRATION;
		$oTpl->set_var('MESSAGE',$sMessage);
	}
	//$oTpl->parse('message', 'message_block', true);
	$oTpl->parse('main', 'main_block', false);
	$output = $oTpl->finish($oTpl->parse('output', 'page'));
	unset($oTpl);
	print $output;
