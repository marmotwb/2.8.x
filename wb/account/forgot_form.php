<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
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
// Check if the user has already submitted the form, otherwise show it
if(isset($_POST['email']) && $_POST['email'] != "" )
{
	$email = strip_tags($_POST['email']);
// Check if the email exists in the database
	$sql  = 'SELECT `user_id`,`username`,`display_name`,`email`,`last_reset`,`password` '.
	        'FROM `'.TABLE_PREFIX.'users` '.
	        'WHERE `email`=\''.$wb->add_slashes($_POST['email']).'\'';
	if(($results = $database->query($sql)))
	{
		if(($results_array = $results->fetchRow()))
		{ // Get the id, username, email, and last_reset from the above db query
		// Check if the password has been reset in the last 2 hours
			if( (time() - (int)$results_array['last_reset']) < (2 * 3600) ) {
			// Tell the user that their password cannot be reset more than once per hour
				$message = $MESSAGE['FORGOT_PASS']['ALREADY_RESET'];
			} else {
				require_once(WB_PATH.'/framework/PasswordHash.php');
				$pwh = new PasswordHash(0, true);
				$old_pass = $results_array['password'];
			// Generate a random password then update the database with it
				$new_pass = $pwh->NewPassword();
				$sql = 'UPDATE `'.TABLE_PREFIX.'users` '.
				       'SET `password`=\''.$pwh->HashPassword($new_pass, true).'\', '.
				           '`last_reset`='.time().' '.
				       'WHERE `user_id`='.(int)$results_array['user_id'];
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
						$message = $MESSAGE['FORGOT_PASS_CANNOT_EMAIL'];
					}
				}else { // Error updating database
					$message = $MESSAGE['RECORD_MODIFIED_FAILED'];
					if(DEBUG) {
						$message .= '<br />'.$database->get_error();
						$message .= '<br />'.$sql;
					}
				}
			}
		}else { // no record found - Email doesn't exist, so tell the user
			$message = $MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'];
		}
	} else { // Query failed
		$message = 'SystemError:: Database query failed!';
		if(DEBUG) {
			$message .= '<br />'.$database->get_error();
			$message .= '<br />'.$sql;
		}
	}
} else {
	$email = '';
}

if(isset($message) && $message != '') {
	$message = $MESSAGE['FORGOT_PASS']['NO_DATA'];
	$message_color = 'FF0000';
} else {
	$message = $MESSAGE['FORGOT_PASS_NO_DATA'];
	$message_color = '000000';
}

$_SESSION['PAGE_LINK'] = get_page_link( $_SESSION['PAGE_ID'] );
$_SESSION['HTTP_REFERER'] = page_link($_SESSION['PAGE_LINK']);
	
?>
<div style="margin: 1em auto;">
	<button type="button" value="cancel" onClick="javascript: window.location = '<?php print $_SESSION['HTTP_REFERER'] ?>';"><?php print $TEXT['CANCEL'] ?></button>
</div>
<h1 style="text-align: center;"><?php echo $MENU['FORGOT']; ?></h1>
<form name="forgot_pass" action="<?php echo WB_URL.'/account/forgot.php'; ?>" method="post">
	<input type="hidden" name="url" value="{URL}" />
		<table cellpadding="5" cellspacing="0" border="0" align="center" width="500">
		<tr>
			<td height="40" align="center" style="color: #<?php echo $message_color; ?>;" colspan="2">
			<?php echo $message; ?>
			</td>
		</tr>
<?php if(!isset($display_form) OR $display_form != false) { ?>
		<tr>
			<td height="10" colspan="2"></td>
		</tr>
		<tr>
			<td width="165" height="30" align="right"><?php echo $TEXT['EMAIL']; ?>:</td>
			<td><input type="text" maxlength="255" name="email" value="<?php echo $email; ?>" style="width: 180px;" /></td>
			<td><input type="submit" name="submit" value="<?php echo $TEXT['SEND_DETAILS']; ?>" style="width: 180px; font-size: 10px; color: #003366; border: 1px solid #336699; background-color: #DDDDDD; padding: 3px; text-transform: uppercase;" /></td>
		</tr>
<?php } ?>
		</table>
</form>