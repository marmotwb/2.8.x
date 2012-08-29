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

//overwrite php.ini on Apache servers for valid SESSION ID Separator
if(function_exists('ini_set')) {
	ini_set('arg_separator.output', '&amp;');
}

// load module language file
$lang = (dirname(__FILE__)) . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? (dirname(__FILE__)) . '/languages/EN.php' : $lang );

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
<table summary="" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="left" width="50%">
		<input type="button" value="<?php echo $TEXT['ADD'].' '.$TEXT['FIELD']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/form/add_field.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>';" style="width: 100%;" />
	</td>
	<td align="right" width="50%">
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
		<table summary="" width="100%" cellpadding="2" cellspacing="0" border="0">
		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<th width="20" style="padding-left: 5px;">&nbsp;</th>
				<th width="30" style="text-align: right;">ID</th>
				<th width="400"><?php print $TEXT['FIELD']; ?></th>
				<th width="175"><?php print $TEXT['TYPE']; ?></th>
				<th width="100"><?php print $TEXT['REQUIRED']; ?></th>
				<th width="175">
				<?php
					echo $TEXT['MULTISELECT'];
				?>
				</th>
				<th width="175" colspan="3">
				<?php
					echo $TEXT['ACTIONS'];
				?>
				</th>
			</tr>
		</thead>
		<tbody>
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
				<td style="text-align: center;">
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
				<td width="20" style="text-align: center;">
				<?php if($field['position'] != 1) { ?>
					<a href="<?php echo WB_URL; ?>/modules/form/move_up.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;field_id=<?php echo $admin->getIDKEY($field['field_id']); ?>" title="<?php echo $TEXT['MOVE_UP']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/up_16.png" border="0" alt="^" />
					</a>
				<?php } ?>
				</td>
				<td width="20" style="text-align: center;">
				<?php if($field['position'] != $num_fields) { ?>
					<a href="<?php echo WB_URL; ?>/modules/form/move_down.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;field_id=<?php echo $admin->getIDKEY($field['field_id']); ?>" title="<?php echo $TEXT['MOVE_DOWN']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/down_16.png" border="0" alt="v" />
					</a>
				<?php } ?>
				</td>
				<td width="20" style="text-align: center;">
<?php
				$url = (WB_URL.'/modules/form/delete_field.php?page_id='.$page_id.'&amp;section_id='.$section_id.'&amp;field_id='.$admin->getIDKEY($field['field_id']))
?>
					<a href="javascript:confirm_link('<?php echo url_encode($TEXT['ARE_YOU_SURE']); ?>','<?php echo $url; ?>');" title="<?php echo $TEXT['DELETE']; ?>">
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
		</tbody>
		</table>
		<?php
	} else {
		echo $TEXT['NONE_FOUND'];
	}
}
// Query overview submissions table
/*
*/
$sql  = 'SELECT `perpage_submissions` FROM `'.TABLE_PREFIX.'mod_form_settings`  ';
$sql .= 'WHERE `section_id` = '.(int)$section_id.' ';
//$sql .= 'ORDER BY `submitted_when` ASC ';
$limit = $database->get_one($sql);

$page = 1;
if(isset($_GET['page']) && is_numeric(trim($_GET['page'])))
{
	$page = intval(mysql_real_escape_string($_GET['page']));
}

// How many adjacent pages should be shown on each side?
$adjacents = 1;

$startrow = ($page * $limit) - ($limit);

$sql  = 'SELECT s.*, u.`display_name`, u.`email` ';
$sql .=            'FROM `'.TABLE_PREFIX.'mod_form_submissions` s ';
$sql .= 'LEFT OUTER JOIN `'.TABLE_PREFIX.'users` u ';
$sql .= 'ON u.`user_id` = s.`submitted_by` ';
$sql .= 'WHERE s.`section_id` = '.(int)$section_id.' ';
$sql .= 'ORDER BY s.`submitted_when` DESC ';
//$sql .= "LIMIT $startrow,$limit ";

if($query_submissions = $database->query($sql)) {
    $totalrows = $query_submissions->numRows();

// set template file and assign module and template block
	$oTpl = new Template(dirname(__FILE__).'/htt','keep');
	$oTpl->set_file('page', 'OverviewSubmission.htt');
	$oTpl->debug = false; // false, true
	$oTpl->set_block('page', 'main_block', 'main');
// generell vars
	$oTpl->set_var(array(
		'TEXT_SUBMISSIONS' => $TEXT['SUBMISSIONS'],
		'WB_URL' => WB_URL,
		'THEME_URL' => THEME_URL,
		'MESSAGE_VALUE' => '',
		'PAGINATION' => '',
		'PAGE_ID' => $page_id,
		'SECTION_ID' => $section_id,
		'TEXT_SUBMITTED' => $TEXT['SUBMITTED'],
		'TEXT_USER' => $TEXT['USER'],
		'TEXT_EMAIL' => $TEXT['EMAIL'],
		'MOD_FORM_FROM' => $MOD_FORM['FROM'],
		'TEXT_NONE_FOUND' => '',
		)
	);

	$oTpl->set_block('main_block', 'language_list_block', 'language_list');
	if($query_submissions->numRows() > 0) {
//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//print_r( $_SERVER ); print '</pre>'; // flush ();sleep(10); die();
		if($startrow > 0  ){
			$query_submissions->seekRow($startrow);
		} else {
			$query_submissions->rewind();
		}
		// List submissions
        $currentrow = 0;
		$row = 'a';
    	$oTpl->set_block('main_block', 'loop_submmission_block', 'loop_submmission');
		while($submission = $query_submissions->fetchRow(MYSQL_ASSOC) )
        {
			$currentrow++;
	        $submission['display_name'] = (($submission['display_name']!=null) ? $submission['display_name'] : '');
			$sBody = $submission['body'];
			$regex = "/[a-z0-9\-_]?[a-z0-9.\-_]+[a-z0-9\-_]?@[a-z0-9.-]+\.[a-z]{2,}/iU";
			preg_match ($regex, $sBody, $output);
// workout if output is empty
			$submission['email'] = (isset($output['0']) ? $output['0'] : '');
			$querystr = 'page='.$page.'&amp;page_id='.$page_id.'&amp;section_id='.$section_id.'&amp;submission_id='.$admin->getIDKEY($submission['submission_id']);
			$row = $row=='a' ? 'b' : 'a';

			$oTpl->set_var('ROW_BIT',$row);
			$oTpl->set_var('QUERYSTR', $querystr);
			$oTpl->set_var('TEXT_ARE_YOU_SURE', url_encode($TEXT['ARE_YOU_SURE']));
			$oTpl->set_var('SUBMISSION_IDKEY', $admin->getIDKEY($submission['submission_id']));
			$oTpl->set_var('TEXT_DELETE', $TEXT['DELETE']);
			$oTpl->set_var('PAGE', $page);
			$oTpl->set_var('TEXT_OPEN', $TEXT['OPEN']);
			$oTpl->set_var('SUBMISSION_ID', $submission['submission_id']);
			$oTpl->set_var('SUBMISSION_CREATE_WHEN', gmdate(DATE_FORMAT.', '.TIME_FORMAT, $submission['submitted_when']+TIMEZONE ));
			$oTpl->set_var('SUBMISSION_BY', $submission['display_name']);
			$oTpl->set_var('SUBMISSION_EMAIL', $submission['email']);

			$oTpl->parse('loop_submmission', 'loop_submmission_block', true);

			if ($currentrow==$limit) { break;}
		}
        $script_name = $_SERVER['SCRIPT_NAME'];
        //include_once((dirname(__FILE__)) .'/DiggPagination.php');
        $pagination = m_form_DiggPagination::Pager($page,$totalrows,$limit,$adjacents,$script_name);
    	$oTpl->set_var(array(
    		'PAGINATION' => $pagination,
    		)
    	);

	} else {
			$oTpl->set_var('TEXT_NONE_FOUND', $TEXT['NONE_FOUND']);
    }
} else {
	echo $database->get_error().'<br />';
	echo $sql;

}

// Parse template object
$oTpl->parse('main', 'main_block', false);
$output = $oTpl->finish($oTpl->parse('output', 'page'));
unset($oTpl);
print $output;
$output = '';
