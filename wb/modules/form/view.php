<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description
 */

// Must include code to stop this file being access directly
/* -------------------------------------------------------- */
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}
/* -------------------------------------------------------- */

// load module language file
$lang = (dirname(__FILE__)) . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? (dirname(__FILE__)) . '/languages/EN.php' : $lang );

include_once(WB_PATH .'/framework/functions.php');
$aWebsiteTitle = (defined('WEBSITE_TITLE') && WEBSITE_TITLE != '' ? WEBSITE_TITLE : $_SERVER['SERVER_NAME']);
$replace = array('WEBSITE_TITLE' => $aWebsiteTitle );
$MOD_FORM['EMAIL_SUBJECT'] = replace_vars($MOD_FORM['EMAIL_SUBJECT'], $replace);
$MOD_FORM['SUCCESS_EMAIL_TEXT'] = replace_vars($MOD_FORM['SUCCESS_EMAIL_TEXT'], $replace);
$MOD_FORM['SUCCESS_EMAIL_SUBJECT'] = replace_vars($MOD_FORM['SUCCESS_EMAIL_SUBJECT'], $replace);
/*
function removebreaks($value) {
	return trim(preg_replace('=((<CR>|<LF>|0x0A/%0A|0x0D/%0D|\\n|\\r)\S).*=i', null, $value));
}
function checkbreaks($value) {
	return $value === removebreaks($value);
}
*/
$aSuccess =array();
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

// Function for generating an optionsfor a select field
if (!function_exists('make_option')) {
	function make_option(&$n, $k, $values) {
		// start option group if it exists
		if (substr($n,0,2) == '[=') {
		 	$n = '<optgroup label="'.substr($n,2,strlen($n)).'">';
		} elseif ($n == ']') {
			$n = '</optgroup>'."\n";
		} else {
			if(in_array($n, $values)) {
				$n = '<option selected="selected" value="'.$n.'">'.$n.'</option>'."\n";
			} else {
				$n = '<option value="'.$n.'">'.$n.'</option>'."\n";
			}
		}
	}
}
// Function for generating a checkbox
if (!function_exists('make_checkbox')) {
	function make_checkbox(&$key, $idx, $params) {
		$field_id = $params[0][0];
		$seperator = $params[0][1];

		$label_id = 'wb_'.preg_replace('/[^a-z0-9]/i', '_', $key).$field_id;
		if(in_array($key, $params[1])) {
			$key = '<input class="frm-field_checkbox" type="checkbox" id="'.$label_id.'" name="field'.$field_id.'['.$idx.']" value="'.$key.'" />'.PHP_EOL.'<label for="'.$label_id.'" class="frm-checkbox_label">'.$key.'</lable>'.$seperator;
		} else {
			$key = '<input class="frm-field_checkbox" type="checkbox" id="'.$label_id.'" name="field'.$field_id.'['.$idx.']" value="'.$key.'" />'.PHP_EOL.'<label for="'.$label_id.'" class="frm-checkbox_label">'.$key.'</label>'.$seperator;
		}
	}
}
// Function for generating a radio button
if (!function_exists('make_radio')) {
	function make_radio(&$n, $idx, $params) {
		$field_id = $params[0];
		$group = $params[1];
		$seperator = $params[2];
		$label_id = 'wb_'.preg_replace('/[^a-z0-9]/i', '_', $n).$field_id;
		if($n == $params[3]) {
			$n = '<input class="frm-field_checkbox" type="radio" id="'.$label_id.'" name="field'.$field_id.'" value="'.$n.'" checked="checked" />'.PHP_EOL.'<label for="'.$label_id.'" class="frm-checkbox_label">'.$n.'</label>'.$seperator;
		} else {
			$n = '<input class="frm-field_checkbox" type="radio" id="'.$label_id.'" name="field'.$field_id.'" value="'.$n.'" />'.PHP_EOL.'<label for="'.$label_id.'" class="frm-checkbox_label">'.$n.'</label>'.$seperator;
		}
	}
}

if (!function_exists("new_submission_id") ) {
	function new_submission_id() {
		$submission_id = '';
		$salt = "abchefghjkmnpqrstuvwxyz0123456789";
		srand((double)microtime()*1000000);
		$i = 0;
		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($salt, $num, 1);
			$submission_id = $submission_id . $tmp;
			$i++;
		}
		return $submission_id;
	}
}

// Work-out if the form has been submitted or not
if($_POST == array())
{
	require_once(WB_PATH.'/include/captcha/captcha.php');

	// Set new submission ID in session
	$_SESSION['form_submission_id'] = new_submission_id();
    $out = '';
	$header = '';
	$field_loop = '';
	$footer = '';
	$form_name = 'form';
	$use_xhtml_strict = false;
	// Get settings
	$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_settings` ';
	$sql .= 'WHERE section_id = '.$section_id.' ';
	if($query_settings = $database->query($sql))
	{
		if($query_settings->numRows() > 0)
		{
			$fetch_settings = $query_settings->fetchRow(MYSQL_ASSOC);
			$header = str_replace('{WB_URL}',WB_URL,$fetch_settings['header']);
			$field_loop = $fetch_settings['field_loop'];
			$footer = str_replace('{WB_URL}',WB_URL,$fetch_settings['footer']);
			$use_captcha = $fetch_settings['use_captcha'];
			$form_name = 'form';
			$use_xhtml_strict = false;
			$page_id = $fetch_settings['page_id'];
		}
	}

// do not use sec_anchor, can destroy some layouts
$sec_anchor = (defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? '#'.SEC_ANCHOR.$fetch_settings['section_id'] : 'section_'.$section_id );

	// Get list of fields
	$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_fields` ';
	$sql .= 'WHERE section_id = '.$section_id.' ';
	$sql .= 'ORDER BY position ASC ';

	if($query_fields = $database->query($sql)) {
		if($query_fields->numRows() > 0) {
?>
			<form <?php echo ( ( (strlen($form_name) > 0) AND (false == $use_xhtml_strict) ) ? "id=\"".$form_name.$section_id."\"" : ""); ?> action="<?php echo htmlspecialchars(strip_tags($_SERVER['SCRIPT_NAME'])).'';?>" method="post">
            <fieldset>
				<input type="hidden" name="submission_id" value="<?php echo $_SESSION['form_submission_id']; ?>" />
				<?php
				$iFormRequestId = isset($_GET['fri']) ? intval($_GET['fri']) : 0;
				if($iFormRequestId) {
					echo '<input type="hidden" name="fri" value="'.$iFormRequestId.'" />'."\n";
				}
				?>
				<?php // echo $admin->getFTAN(); ?>
				<?php
				if(ENABLED_ASP) { // first add some honeypot-fields
				?>
					<input type="hidden" name="submitted_when" value="<?php $t=time(); echo $t; $_SESSION['submitted_when']=$t; ?>" />
					<p class="nixhier">
					email address:
					<label for="email">Leave this field email-address blank:</label>
					<input id="email" name="email" size="56" value="" /><br />
					Homepage:
					<label for="homepage">Leave this field homepage blank:</label>
					<input id="homepage" name="homepage" size="55" value="" /><br />
					URL:
					<label for="url">Leave this field url blank:</label>
					<input id="url" name="url" size="61" value="" /><br />
					Comment:
					<label for="comment">Leave this field comment blank:</label>
					<textarea id="comment" name="comment" cols="50" rows="10"></textarea><br />
					</p>
			<?php }

	// Print header  MYSQL_ASSOC
		   echo $header."\n";
			while($field = $query_fields->fetchRow(MYSQL_ASSOC)) {
				// Set field values
				$field_id = $field['field_id'];
				$value = $field['value'];
				// Print field_loop after replacing vars with values
				$vars = array('{TITLE}', '{REQUIRED}');
				if (($field['type'] == "radio") || ($field['type'] == "checkbox")) {
					$field_title = $field['title'];
				} elseif($field['type'] == 'heading') {
					$field_title = PHP_EOL.'<label>'.$field['title'].'</label>'.PHP_EOL;
				}else {
					$field_title = PHP_EOL.'<label for="field'.$field_id.'">'.$field['title'].'</label>'.PHP_EOL;
				}
				$values = array($field_title);
				if ($field['required'] == 1) {
					$values[] = '<span class="frm-required">*</span>';
				} else {
					$values[] = '';
				}
				if($field['type'] == 'textfield') {
					$vars[] = '{FIELD}';
					$max_lenght_para = (intval($field['extra']) ? ' maxlength="'.intval($field['extra']).'"' : '');
					$values[] = '<input type="text" name="field'.$field_id.'" id="field'.$field_id.'"'.$max_lenght_para.' value="'.(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:$value).'" class="frm-textfield" />';
				} elseif($field['type'] == 'textarea') {
					$vars[] = '{FIELD}';
					$values[] = '<textarea name="field'.$field_id.'" id="field'.$field_id.'" class="frm-textarea" cols="30" rows="8">'.(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:$value).'</textarea>';
				} elseif($field['type'] == 'select') {
					$vars[] = '{FIELD}';
					$options = explode(',', $value);
					array_walk($options, 'make_option', (isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:array()));
					$field['extra'] = explode(',',$field['extra']);
					$field['extra'][1] = ($field['extra'][1]=='multiple') ? $field['extra'][1].'="'.$field['extra'][1].'"' : '';
					$values[] = '<select name="field'.$field_id.'[]" id="field'.$field_id.'" size="'.$field['extra'][0].'" '.$field['extra'][1].' class="frm-select">'.implode($options).'</select>'."\n";
				} elseif($field['type'] == 'heading') {
					$vars[] = '{FIELD}';
					$str = '<input type="hidden" name="field'.$field_id.'" id="field'.$field_id.'" value="===['.$field['title'].']===" />';
					$values[] = ( true == $use_xhtml_strict) ? "<div>".$str."</div>" : $str;
					$tmp_field_loop = $field_loop;		// temporarily modify the field loop template
					$field_loop = $field['extra'];
				} elseif($field['type'] == 'checkbox') {
					$vars[] = '{FIELD}';
					$options = explode(',', $value);
					array_walk($options, 'make_checkbox', array(array($field_id,$field['extra']),(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:array())));
                    $x = sizeof($options)-1;
					$options[$x]=substr($options[$x],0,strlen($options[$x]));
					$values[] = implode($options);
				} elseif($field['type'] == 'radio') {
					$vars[] = '{FIELD}';
					$options = explode(',', $value);
					array_walk($options, 'make_radio', array($field_id,$field['title'],$field['extra'], (isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:'')));
                    $x = sizeof($options)-1;
					$options[$x]=substr($options[$x],0,strlen($options[$x]));
					$values[] = implode($options);
				} elseif($field['type'] == 'email') {
					$vars[] = '{FIELD}';
					$max_lenght_para = (intval($field['extra']) ? ' maxlength="'.intval($field['extra']).'"' : '');
					$values[] = '<input type="text" name="field'.$field_id.'" id="field'.$field_id.'" value="'.(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:'').'"'.$max_lenght_para.' class="frm-email" />';
				}
				if(isset($_SESSION['field'.$field_id])) unset($_SESSION['field'.$field_id]);
				if($field['type'] != '') {
					echo str_replace($vars, $values, $field_loop);
				}
				if (isset($tmp_field_loop)){ $field_loop = $tmp_field_loop; }
			}
			// Captcha
			if($use_captcha) { ?>
				<tr>
				<td class="frm-field_title"><?php echo $TEXT['VERIFICATION']; ?>:</td>
				<td><?php call_captcha(); ?></td>
				</tr>
				<?php
			}
		// Print footer
		// $out = $footer.PHP_EOL;
		$out .= str_replace('{SUBMIT_FORM}', $MOD_FORM['SUBMIT_FORM'], $footer);
		echo $out;
// Add form end code
?>
        </fieldset>
</form>
<?php
		}
	}

} else {

	// Check that submission ID matches
	if(isset($_SESSION['form_submission_id']) AND isset($_POST['submission_id']) AND $_SESSION['form_submission_id'] == $_POST['submission_id']) {

	   $mail_replyto = '';
	   $mail_replyName = '';
		if( $wb->is_authenticated() && $wb->get_email() ) {
		   $mail_replyto = $wb->get_email();
		   $mail_replyName = htmlspecialchars($wb->add_slashes($wb->get_display_name()));
		}

		// Set new submission ID in session
		$_SESSION['form_submission_id'] = new_submission_id();

		if(ENABLED_ASP && ( // form faked? Check the honeypot-fields.
			(!isset($_POST['submitted_when']) OR !isset($_SESSION['submitted_when'])) OR
			($_POST['submitted_when'] != $_SESSION['submitted_when']) OR
			(!isset($_POST['email']) OR $_POST['email']) OR
			(!isset($_POST['homepage']) OR $_POST['homepage']) OR
			(!isset($_POST['comment']) OR $_POST['comment']) OR
			(!isset($_POST['url']) OR $_POST['url'])
		)) {
			// spam
			header("Location: ".WB_URL."");
            exit();
		}
		// Submit form data
		// First start message settings
		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_settings` ';
		$sql .= 'WHERE `section_id` = '.(int)$section_id.'';
		if($query_settings = $database->query($sql) )
		{
			if($query_settings->numRows() > 0)
			{
				$fetch_settings = $query_settings->fetchRow(MYSQL_ASSOC);

				// $email_to = $fetch_settings['email_to'];
				$email_to = (($fetch_settings['email_to'] != '') ? $fetch_settings['email_to'] : emailAdmin());
				$email_from = $wb->add_slashes(SERVER_EMAIL);
/*
				if(substr($email_from, 0, 5) == 'field') {
					// Set the email from field to what the user entered in the specified field
					$email_from = htmlspecialchars($wb->add_slashes($_POST[$email_from]));
				}
*/
				$email_fromname = $fetch_settings['email_fromname'];
 				$email_fromname = (($mail_replyName='') ? $fetch_settings['email_fromname'] : $mail_replyName);
// 				$email_fromname = (($mail_replyName='') ? htmlspecialchars($wb->add_slashes($fetch_settings['email_fromname'])) : $mail_replyName);

				if(substr($email_fromname, 0, 5) == 'field') {
					// Set the email_fromname to field to what the user entered in the specified field
					$email_fromname = htmlspecialchars($wb->add_slashes($_POST[$email_fromname]));
				}

				$email_subject = (($fetch_settings['email_subject'] != '') ? $fetch_settings['email_subject'] : $MOD_FORM['EMAIL_SUBJECT']);
				$success_page = $fetch_settings['success_page'];
				$success_email_to = $mail_replyto;
				$success_email_from = $wb->add_slashes(SERVER_EMAIL);
				$success_email_fromname = $fetch_settings['success_email_fromname'];
/*
*/
				if($mail_replyto == '') {
					$success_email_to = (($fetch_settings['success_email_to'] != '') ? $fetch_settings['success_email_to'] : '');
					if(substr($success_email_to, 0, 5) == 'field') {
						// Set the success_email to field to what the user entered in the specified field
						 $mail_replyto = $success_email_to = htmlspecialchars($wb->add_slashes($_POST[$success_email_to]));
					}
					$success_email_to = '';
					$email_fromname = $TEXT['GUEST'];
//					$success_email_fromname = $TEXT['UNKNOWN'];
//					$email_from = $TEXT['UNKNOWN'];
				}

				$success_email_text = htmlspecialchars($wb->add_slashes($fetch_settings['success_email_text']));
				$success_email_text = (($success_email_text != '') ? $success_email_text : $MOD_FORM['SUCCESS_EMAIL_TEXT']);
				$success_email_subject = (($fetch_settings['success_email_subject'] != '') ? $fetch_settings['success_email_subject'] : $MOD_FORM['SUCCESS_EMAIL_SUBJECT']);
				$max_submissions = $fetch_settings['max_submissions'];
				$stored_submissions = $fetch_settings['stored_submissions'];
				$use_captcha = $fetch_settings['use_captcha'];
			} else {
				exit($TEXT['UNDER_CONSTRUCTION']);
			}
		}

		$email_body = '';
		// Create blank "required" array
		$required = array();

		// Captcha
		if($use_captcha) {
			if(isset($_POST['captcha']) AND $_POST['captcha'] != ''){
				// Check for a mismatch get email user_id
				if(!isset($_POST['captcha']) OR !isset($_SESSION['captcha']) OR $_POST['captcha'] != $_SESSION['captcha']) {
					$replace = array('webmaster_email' => emailAdmin() );
					$captcha_error = replace_vars($MOD_FORM['INCORRECT_CAPTCHA'], $replace);
					$required[]= '';
				}
			} else {
				$replace = array('webmaster_email'=>emailAdmin() );
				$captcha_error = replace_vars($MOD_FORM['INCORRECT_CAPTCHA'],$replace );
				$required[]= '';
			}
		}
		if(isset($_SESSION['captcha'])) { unset($_SESSION['captcha']); }

/* for StripCodeFromText test only
[[loginbox]]

<script type="text/javascript">
var WB_URL = '{WB_URL}';
var THEME_URL = '{THEME_URL}';
var ADMIN_URL = '{ADMIN_URL}';
var LANGUAGE = '{LANGUAGE}';
</script>

Hier testen wir Module und stellen Tutorials zur Verfügung

<?php
function confirm_link(message, url) {
	if(confirm(message)) location.href = url;
}
?>
*/
//

		// Loop through fields and add to message body
		// Get list of fields
		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_fields` ';
		$sql .= 'WHERE `section_id` = '.(int)$section_id.' ';
		$sql .= 'ORDER BY position ASC';
		if($query_fields = $database->query($sql)) {
			if($query_fields->numRows() > 0) {
				while($field = $query_fields->fetchRow(MYSQL_ASSOC)) {
					// Add to message body
					if($field['type'] != '') {
						if(!empty($_POST['field'.$field['field_id']]))
						{
                            $sPostVar = '';
                            $aPostVar['field'.$field['field_id']] = array();
                            // do not allow code in user input!
                            if (is_array($_POST['field'.$field['field_id']])) {

                                foreach ($_POST['field'.$field['field_id']] as $key=>$val) {
                                	$aPostVar['field'.$field['field_id']][$key] =  $wb->strip_slashes($wb->StripCodeFromText($val),true);
                                }
                                $_SESSION['field'.$field['field_id']] = $aPostVar['field'.$field['field_id']];
							} else {
                                $sPostVar = $wb->strip_slashes($wb->StripCodeFromText($wb->get_post('field'.$field['field_id']),true));
                                $_SESSION['field'.$field['field_id']] = $sPostVar;
							}

							if($field['type'] == 'email' AND $wb->validate_email($sPostVar) == false) {
								$email_error = $MESSAGE['USERS_INVALID_EMAIL'];
								$required[]= '';
							}
							if($field['type'] == 'heading') {
								$email_body .= $sPostVar."\n\n";

							} elseif (($sPostVar!='')) {
								$email_body .= $field['title'].": ".$sPostVar."\n\n";
							} elseif(sizeof($aPostVar['field'.$field['field_id']] > 0) ) {
								$email_body .= $field['title'].": ";
								foreach ($aPostVar['field'.$field['field_id']] as $key=>$val) {
									$email_body .= $val."\n";
								}
								$email_body .= "\n";
							}

						} elseif($field['required'] == 1) {
							$required[] = $field['title'];
						}
					}
				} //  while
			}  // numRows
		} //  query

// Check if the user forgot to enter values into all the required fields
		if(sizeof($required )) {

			if(!isset($MESSAGE['MOD_FORM_REQUIRED_FIELDS'])) {
				echo '<h3>You must enter details for the following fields</h3>';
			} else {
				echo '<h3>'.$MESSAGE['MOD_FORM_REQUIRED_FIELDS'].'</h3>';
			}
			echo "<ol class=\"warning\">\n";
			foreach($required AS $field_title) {
				if($field_title!=''){
					echo '<li>'.$field_title."</li>\n";
				}
			}

			if(isset($email_error)) {
				echo '<li>'.$email_error."</li>\n";
			}

			if(isset($captcha_error)) {
				echo '<li>'.$captcha_error."</li>\n";
			}
			// Create blank "required" array
			$required = array();
			echo "</ol>\n";

			echo '<p>&nbsp;</p>'."\n".'<p><a href="'.htmlspecialchars(strip_tags($_SERVER['SCRIPT_NAME'])).'">'.$TEXT['BACK'].'</a></p>'."\n";
		} else {
			if(isset($email_error)) {
				echo '<br /><ol class=\"warning\">'."\n";
				echo '<li>'.$email_error.'</li>'."\n";
				echo '</ol>'."\n";
				echo '<a href="'.htmlspecialchars(strip_tags($_SERVER['SCRIPT_NAME'])).'">'.$TEXT['BACK'].'</a>';
			} elseif(isset($captcha_error)) {
				echo '<br /><ol class=\"warning\">'."\n";
				echo '<li>'.$captcha_error.'</li>'."\n";
				echo '</ol>'."\n";
				echo '<p>&nbsp;</p>'."\n".'<p><a href="'.htmlspecialchars(strip_tags($_SERVER['SCRIPT_NAME'])).'">'.$TEXT['BACK'].'</a></p>'."\n";
			} else {
				// Check how many times form has been submitted in last hour
				$last_hour = time()-3600;
				$sql  = 'SELECT `submission_id` FROM `'.TABLE_PREFIX.'mod_form_submissions` ';
				$sql .= 'WHERE `submitted_when` >= '.$last_hour.'';
				$sql .= '';
				if($query_submissions = $database->query($sql))
				{
					if($query_submissions->numRows() > $max_submissions)
					{
						// Too many submissions so far this hour
						echo $MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'];
						$success = false;
					} else {
						// Adding the IP to the body and try to send the email
						// $email_body .= "\n\nIP: ".$_SERVER['REMOTE_ADDR'];
						$iFormRequestId = isset($_POST['fri']) ? intval($_POST['fri']) : 0;
						if($iFormRequestId) {
							$email_body .= "\n\nFormRequestID: ".$iFormRequestId;
						}
						$recipient = preg_replace( "/[^a-z0-9 !?:;,.\/_\-=+@#$&\*\(\)]/im", "", $email_fromname );
						$email_fromname = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $recipient );
						$email_body = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $email_body );

						if($mail_replyto != '') {

							if($email_from != '') {
								$success = $wb->mail(SERVER_EMAIL,$email_to,$email_subject,$email_body,$email_fromname,$mail_replyto);
							} else {
								$success = $wb->mail('',$email_to,$email_subject,$email_body,$email_fromname,$mail_replyto);
							}
						}

						if($success==true)
						{
							$recipient = preg_replace( "/[^a-z0-9 !?:;,.\/_\-=+@#$&\*\(\)]/im", "", $success_email_fromname );
							$success_email_fromname = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $recipient );
							$success_email_text = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $success_email_text );
							if($success_email_to != '')
							{
								if($success_email_from != '')
								{
									$success = $wb->mail(SERVER_EMAIL,$success_email_to,$success_email_subject,($success_email_text).'<br /><br />'.($email_body).$MOD_FORM['SUCCESS_EMAIL_TEXT_GENERATED'],$success_email_fromname);
								} else {
									$success = $wb->mail('',$success_email_to,$success_email_subject,($success_email_text).'<br /><br />'.($email_body).$MOD_FORM['SUCCESS_EMAIL_TEXT_GENERATED'],$success_email_fromname);
								}
							}
						}

						if($success==true)
						{
							$aSuccess[] .= 'INSERT INTO '.TABLE_PREFIX.'mod_form_submissions<br /> ';;
							// Write submission to database
							if(isset($wb) AND $wb->is_authenticated() AND $wb->get_user_id() > 0) {
								$submitted_by = $wb->get_user_id();
							} else {
								$submitted_by = 0;
							}
							$email_body = htmlspecialchars($wb->add_slashes($email_body));
							$sql  = 'INSERT INTO '.TABLE_PREFIX.'mod_form_submissions ';
							$sql .= 'SET ';
							$sql .= 'page_id='.$wb->page_id.',';
							$sql .= 'section_id='.$section_id.',';
							$sql .= 'submitted_when='.time().',';
							$sql .= 'submitted_by=\''.$submitted_by.'\', ';
							$sql .= 'body=\''.$email_body.'\' ';
							if($database->query($sql))
							{
								// Get the page id
								$iSubmissionId = intval($database->get_one("SELECT LAST_INSERT_ID()"));

								if(!$database->is_error()) {
									$success = true;
								}
								// Make sure submissions table isn't too full
								$query_submissions = $database->query("SELECT submission_id FROM ".TABLE_PREFIX."mod_form_submissions ORDER BY submitted_when");
								$num_submissions = $query_submissions->numRows();
								if($num_submissions > $stored_submissions)
								{
									// Remove excess submission
									$num_to_remove = $num_submissions-$stored_submissions;
									while($submission = $query_submissions->fetchRow(MYSQL_ASSOC))
									{
										if($num_to_remove > 0)
										{
											$submission_id = $submission['submission_id'];
											$database->query("DELETE FROM ".TABLE_PREFIX."mod_form_submissions WHERE submission_id = '$submission_id'");
											$num_to_remove = $num_to_remove-1;
										}
									}
								} // $num_submissions
							}  // numRows
						} // $success
		 			}
	 			} // end how many times form has been submitted in last hour
			}
		}  // email_error
	} else {

	echo '<p>&nbsp;</p>'."\n".'<p><a href="'.htmlspecialchars(strip_tags($_SERVER['SCRIPT_NAME'])).'">'.$TEXT['BACK'].'</a></p>'."\n";
	}

	$success_page = ( (isset($success_page) ) ? $success_page : $page_id);
	$sql  = 'SELECT `link` FROM `'.TABLE_PREFIX.'pages` ';
	$sql .= 'WHERE `page_id` = '.(int)$success_page;
	$sSuccessLink = WB_URL;  // if failed set default
	if( ($link = $database->get_one($sql)) ) {
	   $sSuccessLink = WB_URL.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
	}
	// Now check if the email was sent successfully
	if(isset($success) && $success == true)
	{
	   if ($success_page=='none') {

			// Get submission details
			$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_submissions` ';
			$sql .= 'WHERE submission_id = '.$iSubmissionId.' ';
			if($query_content = $database->query($sql)) {
				$submission = $query_content->fetchRow(MYSQL_ASSOC);
			}
			$Message = '';
			$NixHier = 'nixhier';
			// Get the user details of whoever did this submission
			$sql  = 'SELECT `username`,`display_name` FROM `'.TABLE_PREFIX.'users` ';
			$sql .= 'WHERE `user_id` = '.$submission['submitted_by'];
			if($get_user = $database->query($sql))
			{
				if($get_user->numRows() != 0) {
					$user = $get_user->fetchRow(MYSQL_ASSOC);
				} else {
					$Message = $MOD_FORM['PRINT'];
					$NixHier = '';
					$user['display_name'] = $TEXT['GUEST'];
					$user['username'] = $TEXT['UNKNOWN'];
				}
			}

			$aSubSuccess = array();
			// set template file and assign module and template block
			$oTpl = new Template(WB_PATH.'/modules/form/htt','keep');
			// $tpl = new Template(dirname($admin->correct_theme_source('switchform.htt')),'keep');
			$oTpl->set_file('page', 'submessage.htt');
			$oTpl->debug = false; // false, true
			$oTpl->set_block('page', 'main_block', 'main');
            $oTpl->set_var(array(
            		'ADMIN_URL' => ADMIN_URL,
            		'THEME_URL' => THEME_URL,
            		'MODULE_URL' => WB_URL.'/modules/form',
            		'WB_URL' => WB_URL
            	)
            );
			$oTpl->set_var(array(
					'SUCCESS_EMAIL_TEXT' => $success_email_text,
					'TEXT_SUBMISSION_ID' => $TEXT['SUBMISSION_ID'],
					'submission_submission_id' => $submission['submission_id'],
					'TEXT_SUBMITTED' => $TEXT['SUBMITTED'],
					'submission_submitted_when' => gmdate( DATE_FORMAT .', '.TIME_FORMAT, $submission['submitted_when']+TIMEZONE ),
					'NIX_HIER' => $NixHier,
					'TEXT_USER' => $TEXT['USER'],
					'TEXT_USERNAME' => $TEXT['USERNAME'],
					'TEXT_PRINT_PAGE' => $TEXT['PRINT_PAGE'],
					'TEXT_REQUIRED_JS' => $TEXT['REQUIRED_JS'],
					'user_display_name' => $user['display_name'],
					'user_username' => $user['username'],
					'SUCCESS_PRINT' => $Message,
					'submission_body' => nl2br($submission['body'])
					)
				);

			$oTpl->parse('main', 'main_block', false);
			$output = $oTpl->finish($oTpl->parse('output', 'page'));
			unset($oTpl);
			print $output;

  		} else {
			echo "<script type='text/javascript'>location.href='".$sSuccessLink."';</script>";
		}
		// clearing session on success
		$query_fields = $database->query("SELECT field_id FROM ".TABLE_PREFIX."mod_form_fields WHERE section_id = '$section_id'");
		while($field = $query_fields->fetchRow(MYSQL_ASSOC)) {
			$field_id = $field['field_id'];
			if(isset($_SESSION['field'.$field_id])) unset($_SESSION['field'.$field_id]);
		}
	} else {
		if(isset($success) && $success == false) {
			echo '<br />'.$MOD_FORM['ERROR'];
			echo '<p>&nbsp;</p>'."\n".'<p><a href="'.htmlspecialchars(strip_tags($_SERVER['SCRIPT_NAME'])).'">'.$TEXT['BACK'].'</a></p>'."\n";
		}
	}

}