<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

/* -------------------------------------------------------- */
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<head><title>Access denied</title></head><body><h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2></body></html>');
}
/* -------------------------------------------------------- */


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

$_SESSION['username'] = '';
$_SESSION['DISPLAY_NAME'] = '';
$_SESSION['email'] = '';
$_SESSION['display_form'] = true;

if(isset($_POST['action']) && $_POST['action']=='send') {
	$_SESSION['username'] = strtolower(strip_tags($wb->get_post_escaped('username')));
	$_SESSION['DISPLAY_NAME'] = strip_tags($wb->get_post_escaped('display_name'));
	$_SESSION['email'] = $wb->get_post('email');

	$aErrorMsg = array();

	if($_SESSION['username'] != "")
	{
		// Check if username already exists
		$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` WHERE `username` = \''.$_SESSION['username'].'\'';
		if($database->get_one($sql)){
			$aErrorMsg[] = $MESSAGE['USERS_USERNAME_TAKEN'];
			$_SESSION['username'] = '';
		} else {
			if(!preg_match('/^[a-z]{1}[a-z0-9_-]{3,}$/i', $_SESSION['username'])) {
				$aErrorMsg[] = $MESSAGE['USERS_NAME_INVALID_CHARS'];
				$_SESSION['username'] = '';
		 	}
		}
	} else {
		$aErrorMsg[] = $MESSAGE['LOGIN_USERNAME_BLANK'];
	}

	if($_SESSION['DISPLAY_NAME'] == "") {
		$aErrorMsg[] = $MESSAGE['GENERIC_FILL_IN_ALL'];
	}

	if($_SESSION['email'] != "") {
		// Check if the email already exists
		$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` WHERE `email` = \''.mysql_escape_string($_SESSION['email']).'\'';
		if($database->get_one($sql)){
			$aErrorMsg[] = $MESSAGE['USERS_EMAIL_TAKEN'];
			$_SESSION['email'] = '';
		} else {
			if(!$wb->validate_email($_SESSION['email'])){
				$aErrorMsg[] = $MESSAGE['USERS_INVALID_EMAIL'];
				$_SESSION['email'] = '';
			}
		}
	} else {
		$aErrorMsg[] = $MESSAGE['SIGNUP_NO_EMAIL'];
	}

	$sServerEmail = (defined('SERVER_EMAIL') && SERVER_EMAIL != '' ? SERVER_EMAIL : emailAdmin());
	// Captcha
	if(ENABLED_CAPTCHA) {
		if(isset($_POST['captcha']) AND $_POST['captcha'] != ''){
			// Check for a mismatch get email user_id
			if(!isset($_POST['captcha']) OR !isset($_SESSION['captcha']) OR $_POST['captcha'] != $_SESSION['captcha']) {
				$replace = array('SERVER_EMAIL' => emailAdmin() );
				$aErrorMsg[] = replace_vars($MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'], $replace);
			}
		} else {
			$replace = array('SERVER_EMAIL'=>emailAdmin() );
			$aErrorMsg[] = replace_vars($MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'],$replace );
		}

	}
	if(isset($_SESSION['captcha'])) { unset($_SESSION['captcha']); }

	if (sizeof($aErrorMsg)) {
		$aTmp = array_unshift ($aErrorMsg,'');
		$sMessage = implode('<li>',$aErrorMsg);
?><div style="width: 100%; overflow: hidden; border: 2px #990000 solid; background-color: #ffb9b9;">
	<div style="width: 100%; padding: 5px;">
<ul style="list-style-type: decimal-leading-zero;">
	<?php print $sMessage ?></li>
</ul>
	</div>
</div>

<?php

	} else {
		// Generate a random password then update the database with it
		$new_pass = '';
		$salt = "abchefghjkmnpqrstuvwxyz0123456789";
		srand((double)microtime()*1000000);
		$i = 0;
		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($salt, $num, 1);
			$new_pass = $new_pass . $tmp;
			$i++;
		}
		$md5_password = md5($new_pass);

		$sLoginName = $_SESSION['username'];
		$sDisplayName = $_SESSION['DISPLAY_NAME'];
		$groups_id = FRONTEND_SIGNUP;
		$email_to = $_SESSION['email'];
		$get_ts = time();
		$get_ip = $_SERVER['REMOTE_ADDR'];

		$email_subject = $MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'];
		$search = array('{LOGIN_DISPLAY_NAME}', '{LOGIN_WEBSITE_TITLE}', '{LOGIN_NAME}', '{LOGIN_PASSWORD}');
		$replace = array($sDisplayName, WEBSITE_TITLE, $sLoginName, $new_pass);
		$mail_message = str_replace($search, $replace, $MESSAGE['SIGNUP2_BODY_LOGIN_INFO']);

		$email_body = '';
		$recipient = preg_replace( "/[^a-z0-9 !?:;,.\/_\-=+@#$&\*\(\)]/im", "", $sDisplayName );
		$email_fromname = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $recipient );
		$email_body = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $mail_message );

		if($email_to != '') {
// 	if($wb->mail(SERVER_EMAIL,$mail_to,$email_subject,$email_body)) { }
			$success = false;
			if(	$wb->mail($sServerEmail,$email_to,$email_subject,$email_body,WB_MAILER) ) {
				$sql  = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` ';
				$sql .= 'ORDER BY `user_id` DESC ';
		        $user_id = $database->get_one($sql)+1;

				$email_subject = $MESSAGE['SIGNUP2_NEW_USER'];
				$search = array('{LOGIN_EMAIL}','{LOGIN_ID}', '{SIGNUP_DATE}', '{LOGIN_NAME}', '{LOGIN_IP}');
				$replace = array($email_to, $email_fromname.' ('.$user_id.')', date(DATE_FORMAT.' '.TIME_FORMAT,$get_ts ), $sLoginName, $get_ip);
				$mail_message = str_replace($search, $replace, $MESSAGE['SIGNUP2_ADMIN_INFO']);
				$email_body = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $mail_message );
				$success_email_to = emailAdmin();
 				$success = $wb->mail($sServerEmail,$success_email_to,$email_subject,$email_body,$email_fromname);
			}
		}

		if($success) {

			$sql  = 'INSERT INTO `'.TABLE_PREFIX.'users` SET ';
			$sql .= 'group_id = \''.$groups_id.'\', ';
			$sql .= 'groups_id = \''.$groups_id.'\', ';
			$sql .= 'active = \'1\', ';
			$sql .= 'username = \''.$sLoginName.'\', ';
			$sql .= 'password = \''.$md5_password.'\', ';
			$sql .= 'display_name = \''.$sDisplayName.'\', ';
			$sql .= 'email = \''.$email_to.'\', ';
			$sql .= 'login_when = \''.$get_ts.'\', ';
			$sql .= 'login_ip = \''.$get_ip.'\' ';
			if($database->query($sql)) {
				$_SESSION['display_form'] = false;
				unset($_SESSION['username']);
				unset($_SESSION['DISPLAY_NAME']);
				unset($_SESSION['email']);
				unset($_POST);
// send msgbox
?><div style="width: 100%; overflow: hidden; border: 2px #336600 solid; background-color: #ccff99;">
	<div style="width: 100%; padding: 5px; text-align:center;">
		<?php print $MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] ?>
		<div style="margin: 5px auto;"><br />
		<button type="button" value="cancel" onClick="javascript: window.location = '<?php print $_SESSION['HTTP_REFERER'] ?>';"><?php print $TEXT['BACK'] ?></button>
		</div>
	</div>
</div>
<?php
			}
		}
	}
}

