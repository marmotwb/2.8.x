<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          Ryan Djurovich, WebsiteBaker Project
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

require('../../config.php');

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');
// load module language file
$lang = (dirname(__FILE__)) . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? (dirname(__FILE__)) . '/languages/EN.php' : $lang );
/* */

include_once (WB_PATH.'/framework/functions.php');

// Get page
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$page = intval(isset(${$requestMethod}['page'])) ? ${$requestMethod}['page'] : 1;

// Get id
$submission_id = intval($admin->checkIDKEY('submission_id', false, 'GET'));
if (!$submission_id) {
 $admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL.'/pages/modify.php?page='.$page.'&amp;page_id='.$page_id.'#submissions');
}

// Get submission details
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_submissions` ';
$sql .= 'WHERE `submission_id` = '.$submission_id.' ';
if($query_content = $database->query($sql)) {

	$submission = $query_content->fetchRow(MYSQL_ASSOC);
}

//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//print_r( $page ); print '</pre>';

// Get the user details of whoever did this submission
$sql  = 'SELECT `username`,`display_name` FROM `'.TABLE_PREFIX.'users` ';
$sql .= 'WHERE `user_id` = '.$submission['submitted_by'];
if($get_user = $database->query($sql)) {
	if($get_user->numRows() != 0) {
		$user = $get_user->fetchRow(MYSQL_ASSOC);
	} else {
		$user['display_name'] = $TEXT['GUEST'];
		$user['username'] = $TEXT['UNKNOWN'];
	}
}
//$sec_anchor = (defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? '#'.SEC_ANCHOR.$section['section_id'] : '' );
$sec_anchor = '#submissions';
?>
<table class="frm-submission" summary="" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td><?php echo $TEXT['SUBMISSION_ID']; ?>:</td>
	<td><?php echo $submission['submission_id']; ?></td>
</tr>
<tr>
	<td><?php echo $TEXT['SUBMITTED']; ?>:</td>
	<td><?php echo gmdate(DATE_FORMAT .', '.TIME_FORMAT, $submission['submitted_when']+TIMEZONE); ?></td>
</tr>
<tr>
	<td><?php echo $TEXT['USER'].' ('.$TEXT['USERNAME'].')'; ?>:</td>
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

<input type="button" value="<?php echo $TEXT['CLOSE']; ?>" onclick="javascript: window.location = '<?php echo ADMIN_URL; ?>/pages/modify.php?page=<?php echo $page?>&amp;page_id=<?php echo $page_id.$sec_anchor; ?>';" style="width: 150px; margin-top: 5px;" />
<input type="button" value="<?php echo $TEXT['DELETE']; ?>" onclick="javascript: confirm_link('<?php echo $TEXT['ARE_YOU_SURE']; ?>', '<?php echo WB_URL; ?>/modules/form/delete_submission.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&submission_id=<?php echo $admin->getIDKEY($submission_id).$sec_anchor; ?>');" style="width: 150px; margin-top: 5px;" />
<?php

// Print admin footer
$admin->print_footer();
