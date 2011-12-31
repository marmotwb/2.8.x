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

//overwrite php.ini on Apache servers for valid SESSION ID Separator
if(function_exists('ini_set')) {
	ini_set('arg_separator.output', '&amp;');
}
include_once(WB_PATH.'/framework/functions.php');

$sec_anchor = (defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? '#'.SEC_ANCHOR.$section['section_id'] : '' );

//Delete all form fields with no title
$sql  = 'DELETE FROM `'.TABLE_PREFIX.'mod_form_fields` ';
$sql .= 'WHERE page_id = '.(int)$page_id.' ';
$sql .=   'AND section_id = '.(int)$section_id.' ';
$sql .=   'AND title=\'\' ';
if( !$database->query($sql) ) {
// error msg
}

?>
<table summary="" cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td align="left" width="33%">
		<input type="button" value="<?php echo $TEXT['ADD'].' '.$TEXT['FIELD']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/form/add_field.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>';" style="width: 100%;" />
	</td>
	<td align="right" width="33%">
		<input type="button" value="<?php echo $TEXT['SETTINGS']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/form/modify_settings.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>';" style="width: 100%;" />
	</td>
</tr>
</table>

<br />

<h2><?php echo $TEXT['MODIFY'].'/'.$TEXT['DELETE'].' '.$TEXT['FIELD']; ?></h2>
<?php

// Loop through existing fields
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_fields` ';
$sql .= 'WHERE `section_id` = '.(int)$section_id.' ';
$sql .= 'ORDER BY `position` ASC';
if($query_fields = $database->query($sql)) {
	if($query_fields->numRows() > 0) {
		$num_fields = $query_fields->numRows();
		$row = 'a';
		?>
		<table summary="" cellpadding="2" cellspacing="0" border="0" width="100%">
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td width="20" style="padding-left: 5px;">&nbsp;</td>
				<td width="30" style="text-align: right;">ID</td>
				<td width="400"><?php print $TEXT['FIELD']; ?></td>
				<td width="175"><?php print $TEXT['TYPE']; ?></td>
				<td width="100"><?php print $TEXT['REQUIRED']; ?></td>
				<td width="175">
				<?php
					echo $TEXT['MULTISELECT'];
				?>
				</td>
				<td width="175" colspan="3">
				<?php
					echo $TEXT['ACTIONS'];
				?>
				</td>
			</tr>
		<?php
		while($field = $query_fields->fetchRow(MYSQL_ASSOC)) {
			?>
			<tr class="row_<?php echo $row; ?>">
				<td style="padding-left: 5px;">
					<a href="<?php echo WB_URL; ?>/modules/form/modify_field.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;field_id=<?php echo $admin->getIDKEY($field['field_id']); ?>" title="<?php echo $TEXT['MODIFY']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/modify_16.png" border="0" alt="^" />
					</a>
				</td>
				<td style="text-align: right;">
					<a href="<?php echo WB_URL; ?>/modules/form/modify_field.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;field_id=<?php echo $admin->getIDKEY($field['field_id']); ?>">
						<?php echo $field['field_id']; ?>
					</a>
				</td>
				<td>
					<a href="<?php echo WB_URL; ?>/modules/form/modify_field.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;field_id=<?php echo $admin->getIDKEY($field['field_id']); ?>">
						<?php echo $field['title']; ?>
					</a>
				</td>
				<td>
					<?php
					if($field['type'] == 'textfield') {
						echo $TEXT['SHORT_TEXT'];
					} elseif($field['type'] == 'textarea') {
						echo $TEXT['LONG_TEXT'];
					} elseif($field['type'] == 'heading') {
						echo $TEXT['HEADING'];
					} elseif($field['type'] == 'select') {
						echo $TEXT['SELECT_BOX'];
					} elseif($field['type'] == 'checkbox') {
						echo $TEXT['CHECKBOX_GROUP'];
					} elseif($field['type'] == 'radio') {
						echo $TEXT['RADIO_BUTTON_GROUP'];
					} elseif($field['type'] == 'email') {
						echo $TEXT['EMAIL_ADDRESS'];
					}
					?>
				</td>
				<td>
				<?php
				if ($field['type'] != 'group_begin') {
					if($field['required'] == 1) { echo $TEXT['YES']; } else { echo $TEXT['NO']; }
				}
				?>
				</td>
				<td>
				<?php
				if ($field['type'] == 'select') {
					$field['extra'] = explode(',',$field['extra']);
					 if($field['extra'][1] == 'multiple') { echo $TEXT['YES']; } else { echo $TEXT['NO']; }
				}
				?>
				</td>
				<td width="20">
				<?php if($field['position'] != 1) { ?>
					<a href="<?php echo WB_URL; ?>/modules/form/move_up.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;field_id=<?php echo $admin->getIDKEY($field['field_id']); ?>" title="<?php echo $TEXT['MOVE_UP']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/up_16.png" border="0" alt="^" />
					</a>
				<?php } ?>
				</td>
				<td width="20">
				<?php if($field['position'] != $num_fields) { ?>
					<a href="<?php echo WB_URL; ?>/modules/form/move_down.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;field_id=<?php echo $admin->getIDKEY($field['field_id']); ?>" title="<?php echo $TEXT['MOVE_DOWN']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/down_16.png" border="0" alt="v" />
					</a>
				<?php } ?>
				</td>
				<td width="20">
<?php
				$url = (WB_URL.'/modules/form/delete_field.php?page_id='.$page_id.'&amp;section_id='.$section_id.'&amp;field_id='.$admin->getIDKEY($field['field_id']))
 ?>
					<a href="javascript: confirm_link('<?php echo url_encode($TEXT['ARE_YOU_SURE']); ?>', '<?php echo $url; ?>');" title="<?php echo $TEXT['DELETE']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/delete_16.png" border="0" alt="X" />
					</a>
				</td>
			</tr>
			<?php
			// Alternate row color
			if($row == 'a') {
				$row = 'b';
			} else {
				$row = 'a';
			}
		}
		?>
		</table>
		<?php
	} else {
		echo $TEXT['NONE_FOUND'];
	}
}
?>

<br /><br />

<h2><?php echo $TEXT['SUBMISSIONS']; ?></h2>

<?php

// Query submissions table
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'mod_form_submissions` ';
$sql .= 'WHERE `section_id` = '.(int)$section_id.' ';
$sql .= 'ORDER BY `submitted_when` ASC ';
if($query_submissions = $database->query($sql)) {
	if($query_submissions->numRows() > 0) {
		?>
		<table summary="" cellpadding="2" cellspacing="0" border="0" width="100%">
		<?php
		// List submissions
		$row = 'a';
		while($submission = $query_submissions->fetchRow(MYSQL_ASSOC)) {
			?>
			<tr class="row_<?php echo $row; ?>">
				<td width="20" style="padding-left: 5px;">
					<a href="<?php echo WB_URL; ?>/modules/form/view_submission.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;submission_id=<?php echo $admin->getIDKEY($submission['submission_id']); ?>" title="<?php echo $TEXT['OPEN']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/folder_16.png" alt="<?php echo $TEXT['OPEN']; ?>" border="0" />
					</a>
				</td>
				<td width="237"><?php echo $TEXT['SUBMISSION_ID'].': '.$submission['submission_id']; ?></td>
				<td><?php echo $TEXT['SUBMITTED'].': '.gmdate(TIME_FORMAT.', '.DATE_FORMAT, $submission['submitted_when']+TIMEZONE); ?></td>
				<td width="20">
<?php
				$url = (WB_URL.'/modules/form/delete_submission.php?page_id='.$page_id.'&amp;section_id='.$section_id.'&amp;submission_id='.$admin->getIDKEY($submission['submission_id']))
 ?>
					<a href="javascript: confirm_link('<?php echo url_encode($TEXT['ARE_YOU_SURE']); ?>', '<?php echo $url; ?>');" title="<?php echo $TEXT['DELETE']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/delete_16.png" border="0" alt="X" />
					</a>
				</td>
			</tr>
			<?php
			// Alternate row color
			if($row == 'a') {
				$row = 'b';
			} else {
				$row = 'a';
			}
		}
		?>
		</table>
		<?php
	} else {
		echo $TEXT['NONE_FOUND'];
	}
}