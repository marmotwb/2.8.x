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

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');
/* */
// Get id
$submission_id = $admin->checkIDKEY('submission_id', false, 'GET');
if (!$submission_id) {
 $admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// Get submission details
$query_content = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_form_submissions WHERE submission_id = '$submission_id'");
$submission = $query_content->fetchRow();

// Get the user details of whoever did this submission
$query_user = "SELECT username,display_name FROM ".TABLE_PREFIX."users WHERE user_id = '".$submission['submitted_by']."'";
$get_user = $database->query($query_user);
if($get_user->numRows() != 0) {
	$user = $get_user->fetchRow();
} else {
	$user['display_name'] = 'Unknown';
	$user['username'] = 'unknown';
}

?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td><?php echo $TEXT['SUBMISSION_ID']; ?>:</td>
	<td><?php echo $submission['submission_id']; ?></td>
</tr>
<tr>
	<td><?php echo $TEXT['SUBMITTED']; ?>:</td>
	<td><?php echo gmdate(TIME_FORMAT.', '.DATE_FORMAT, $submission['submitted_when']+TIMEZONE); ?></td>
</td>
<tr>
	<td><?php echo $TEXT['USER']; ?>:</td>
	<td><?php echo $user['display_name'].' ('.$user['username'].')'; ?></td>
</tr>
<tr>
	<td colspan="2">
		<hr />
	</td>
</tr>
<tr>
	<td colspan="2">
		<?php echo nl2br($submission['body']); ?>
	</td>
</tr>
</table>

<br />

<input type="button" value="<?php echo $TEXT['CLOSE']; ?>" onclick="javascript: window.location = '<?php echo ADMIN_URL; ?>/pages/modify.php?page_id=<?php echo $page_id; ?>';" style="width: 150px; margin-top: 5px;" />
<input type="button" value="<?php echo $TEXT['DELETE']; ?>" onclick="javascript: confirm_link('<?php echo $TEXT['ARE_YOU_SURE']; ?>', '<?php echo WB_URL; ?>/modules/form/delete_submission.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&submission_id=<?php echo $admin->getIDKEY($submission_id); ?>');" style="width: 150px; margin-top: 5px;" />
<?php

// Print admin footer
$admin->print_footer();

?>