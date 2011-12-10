<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2011, Website Baker Org. e.V.
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
		die('<head><title>Access denied</title></head><body><h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2></body></html>');
}
/* -------------------------------------------------------- */

// Insert an extra rows into the database
$header = '<table cellpadding=\"2\" cellspacing=\"0\" border=\"0\" width=\"98%\" summary=\"form\">';
$field_loop = '<tr><td class=\"field_title\">{TITLE}{REQUIRED}:</td><td>{FIELD}</td></tr>';
$footer = '<tr><td>&nbsp;</td>
<td>
<input type=\"submit\" name=\"submit\" value=\"Submit Form\" />
</td>
</tr>
</table>';
$email_to = $admin->get_email();
$email_from = '';
$email_fromname = '';
$email_subject = 'Results from form on website...';
$success_page = 'none';
$success_email_to = '';
$success_email_from = $admin->get_email();
$success_email_fromname = '';
$success_email_text = 'Thank you for submitting your form on '.WEBSITE_TITLE;
$success_email_text = addslashes($success_email_text);
$success_email_subject = 'You have submitted a form';
$max_submissions = 50;
$stored_submissions = 50;
$use_captcha = true;
$database->query("INSERT INTO ".TABLE_PREFIX."mod_form_settings (page_id,section_id,header,field_loop,footer,email_to,email_from,email_fromname,email_subject,success_page,success_email_to,success_email_from,success_email_fromname,success_email_text,success_email_subject,max_submissions,stored_submissions,use_captcha) VALUES ('$page_id','$section_id','$header','$field_loop','$footer','$email_to','$email_from','$email_fromname','$email_subject','$success_page','$success_email_to','$success_email_from','$success_email_fromname','$success_email_text','$success_email_subject','$max_submissions','$stored_submissions','$use_captcha')");
