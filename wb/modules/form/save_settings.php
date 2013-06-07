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

require('../../config.php');

$admin_header = false;
// Tells script to update when this page was last updated
$update_when_modified = true;
// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}
$admin->print_header();

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
$lang = (dirname(__FILE__)) . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? (dirname(__FILE__)) . '/languages/EN.php' : $lang );
// later in upgrade.php (add pagination)
$table_name = TABLE_PREFIX.'mod_form_settings';
$field_name = 'perpage_submissions';
$description = "INT NOT NULL DEFAULT '10' AFTER `max_submissions`";
$database->field_add($table_name, $field_name, $description);

// This code removes any <?php tags and adds slashes
$friendly = array('&lt;', '&gt;', '?php');
$raw = array('<', '>', '');

//$header     = CleanInput('header');
$header = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('header'),true));
//$field_loop = CleanInput('field_loop');
$field_loop = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('field_loop'),true));
//$footer     = CleanInput('footer');
$footer = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('footer'),true));
//$email_to   = CleanInput('email_to');
$email_to = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('email_to'),true));
$email_to   = ($email_to != '' ? $email_to : emailAdmin());
$email_from = $admin->add_slashes(SERVER_EMAIL);
//$use_captcha =CleanInput('use_captcha');
$use_captcha = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('use_captcha'),true));

if( isset($_POST['email_fromname_field']) && ($_POST['email_fromname_field'] != '')) {
    $email_fromname = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('email_fromname_field'),true));
} else {
    $email_fromname = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('email_fromname'),true));
}

$email_fromname = ($email_fromname != '' ? $email_fromname : WBMAILER_DEFAULT_SENDERNAME);
$email_subject = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('email_subject'),true));
$success_page = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('success_page'),true));
$success_email_to = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('success_email_to'),true));
$success_email_from = $admin->add_slashes(SERVER_EMAIL);
$success_email_fromname = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('success_email_fromname'),true));
$success_email_fromname = ($success_email_fromname != '' ? $success_email_fromname : $email_fromname);
$success_email_text = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('success_email_text'),true));
$success_email_text = (($success_email_text != '') ? $success_email_text : '');
$success_email_subject = $admin->add_slashes($admin->StripCodeFromText($admin->get_post('success_email_subject'),true));
$success_email_subject = (($success_email_subject  != '') ? $success_email_subject : '');

if(!is_numeric($_POST['max_submissions'])) {
	$max_submissions = 50;
} else {
	$max_submissions = intval($_POST['max_submissions']);
}
if(!is_numeric($_POST['stored_submissions'])) {
	$stored_submissions = 100;
} else {
	$stored_submissions = intval($_POST['stored_submissions']);
}
if(!is_numeric($_POST['perpage_submissions'])) {
	$perpage_submissions = 10;
} else {
	$perpage_submissions = intval($_POST['perpage_submissions']);
}

// Make sure max submissions is not greater than stored submissions if stored_submissions <>0
if($max_submissions > $stored_submissions) {
	$max_submissions = $stored_submissions;
}
$sSectionIdPrefix = (defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? SEC_ANCHOR : 'Sec' );

// Update settings
$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_form_settings` SET ';
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
$sql .= 'WHERE `section_id` = '.(int)$section_id.' ';
$sql .= '';
if($database->query($sql)) {
	$admin->print_success($TEXT['SUCCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id.'#'.$sSectionIdPrefix.$section_id);
}
// Check if there is a db error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error(), ADMIN_URL.'/pages/modify.php?page_id='.$page_id.'#'.$sSectionIdPrefix.$section_id);
}
// Print admin footer
$admin->print_footer();
