<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
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

// This code removes any <?php tags and adds slashes
$friendly = array('&lt;', '&gt;', '?php');
$raw = array('<', '>', '');
$header = $admin->add_slashes($_POST['header']);
$field_loop = $admin->add_slashes($_POST['field_loop']);
$footer = $admin->add_slashes($_POST['footer']);
$email_to = $admin->add_slashes($_POST['email_to']);
$use_captcha = $admin->add_slashes($_POST['use_captcha']);
if($_POST['email_from_field'] == '') {
	$email_from = $admin->add_slashes($_POST['email_from']);
} else {
	$email_from = $admin->add_slashes($_POST['email_from_field']);
}
$email_fromname = $admin->add_slashes($_POST['email_fromname']);
$email_subject = $admin->add_slashes($_POST['email_subject']);
$success_page = $admin->add_slashes($_POST['success_page']);
$success_email_to = $admin->add_slashes($_POST['success_email_to']);
$success_email_from = $admin->add_slashes($_POST['success_email_from']);
$success_email_fromname = $admin->add_slashes($_POST['success_email_fromname']);
$success_email_text = $admin->add_slashes($_POST['success_email_text']);
$success_email_subject = $admin->add_slashes($_POST['success_email_subject']);
if(!is_numeric($_POST['max_submissions'])) {
	$max_submissions = 50;
} else {
	$max_submissions = $_POST['max_submissions'];
}
if(!is_numeric($_POST['stored_submissions'])) {
	$stored_submissions = 100;
} else {
	$stored_submissions = $_POST['stored_submissions'];
}
// Make sure max submissions is not greater than stored submissions if stored_submissions <>0
if($max_submissions > $stored_submissions) {
	$max_submissions = $stored_submissions;
}

// Update settings
$database->query("UPDATE ".TABLE_PREFIX."mod_form_settings SET header = '$header', field_loop = '$field_loop', footer = '$footer', email_to = '$email_to', email_from = '$email_from', email_fromname = '$email_fromname', email_subject = '$email_subject', success_page = '$success_page', success_email_to = '$success_email_to', success_email_from = '$success_email_from', success_email_fromname = '$success_email_fromname', success_email_text = '$success_email_text', success_email_subject = '$success_email_subject', max_submissions = '$max_submissions', stored_submissions = '$stored_submissions', use_captcha = '$use_captcha' WHERE section_id = '$section_id'");

// Check if there is a db error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error(), ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
} else {
	$admin->print_success($TEXT['SUCCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// Print admin footer
$admin->print_footer();

?>