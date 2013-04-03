<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description
 */

if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
} else {
	$table_name = TABLE_PREFIX.'mod_form_settings';
	$field_name = 'perpage_submissions';
	$description = "INT NOT NULL DEFAULT '10' AFTER `max_submissions`";
	if(!$database->field_exists($table_name,$field_name)) {
		$database->field_add($table_name, $field_name, $description);
	}

	// Insert an extra rows into the database
	$header = '<table class="frm-field_table">';
	$field_loop = '<tr>'.PHP_EOL.'<td class=\"frm-field_title\">{TITLE}{REQUIRED}:</td>'.PHP_EOL.'<td>{FIELD}</td>'.PHP_EOL.'</tr>';
	$footer = '<tr>'.PHP_EOL.'
<td>'.PHP_EOL.'
<input type=\"submit\" name=\"submit\" value=\"{SUBMIT_FORM}\" />'.PHP_EOL.'
</td>'.PHP_EOL.'
</tr>'.PHP_EOL.'
</table>'.PHP_EOL;
	$email_to = '';
	$email_from = '';
	$email_fromname = '';
	$email_subject = '';
	$success_page = 'none';
	$success_email_to = '';
	$success_email_from = '';
	$success_email_fromname = '';
	$success_email_text = '';
	// $success_email_text = addslashes($success_email_text);
	$success_email_subject = '';
	$max_submissions = 50;
	$stored_submissions = 50;
	$perpage_submissions = 10;
	$use_captcha = true;
	
	// Insert settings
	$sql  = 'INSERT INTO  `'.TABLE_PREFIX.'mod_form_settings` SET ';
	$sql .= '`section_id` = \''.$section_id.'\', ';
	$sql .= '`page_id` = \''.$page_id.'\', ';
	$sql .= '`header` = \''.$header.'\', ';
	$sql .= '`field_loop` = \''.$field_loop.'\', ';
	$sql .= '`footer` = \''.$footer.'\', ';
	$sql .= '`email_to` = \''.$email_to.'\', ';
	$sql .= '`email_from` = \''.$email_from.'\', ';
	$sql .= '`email_fromname` = \''.$email_fromname.'\', ';
	$sql .= '`email_subject` = \''.$email_subject.'\', ';
	$sql .= '`success_page` = \''.$success_page.'\', ';
	$sql .= '`success_email_to` = \''.$success_email_to.'\', ';
	$sql .= '`success_email_from` = \''.$success_email_from.'\', ';
	$sql .= '`success_email_fromname` = \''.$success_email_fromname.'\', ';
	$sql .= '`success_email_text` = \''.$success_email_text.'\', ';
	$sql .= '`success_email_subject` = \''.$success_email_subject.'\', ';
	$sql .= '`max_submissions` = \''.$max_submissions.'\', ';
	$sql .= '`stored_submissions` = \''.$stored_submissions.'\', ';
	$sql .= '`perpage_submissions` = \''.$perpage_submissions.'\', ';
	$sql .= '`use_captcha` = \''.$use_captcha.'\' ';
	$sql .= '';
	if($database->query($sql)) {
		// $admin->print_success($TEXT['SUCCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id.$sec_anchor);
	}
}
