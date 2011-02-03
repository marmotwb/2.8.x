<?php
/**
 *
 * @category        modules
 * @package         output_filter
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
 *
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }

// check if module language file exists for the language set by the user (e.g. DE, EN)
$MOD_MAIL_FILTER['WARNING']	= '<p style="color: red; line-height:1.5em;"><strong>Warning: </strong>This function is now available as a Droplet. The next major release of website baker will not include this filter anymore. Please concider using the <a href="?tool=droplets">Droplet</a> [[EmailFilter]]</p>';
if(!file_exists(WB_PATH .'/modules/output_filter/languages/'.LANGUAGE .'.php')) {
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH .'/modules/output_filter/languages/EN.php');
} else {
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH .'/modules/output_filter/languages/'.LANGUAGE .'.php');
}
// check if data was submitted
if(isset($_POST['save_settings'])) {
	
	if (!$admin->checkFTAN())
	{
		$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],$_SERVER['REQUEST_URI'],false);
		exit();
	}
	// get overall output filter settings
	$email_filter = (isset($_POST['email_filter']) && $_POST['email_filter'] == '1') ? '1' : '0';
	$mailto_filter = (isset($_POST['mailto_filter']) && $_POST['mailto_filter'] == '1') ? '1' : '0';
	
	// get email replacement settings
	$at_replacement = isset($_POST['at_replacement']) ?strip_tags($_POST['at_replacement']) : '';
	$at_replacement = (strlen(trim($at_replacement)) > 0) ? $admin->add_slashes($at_replacement) : '(at)';
	$dot_replacement = isset($_POST['dot_replacement']) ?strip_tags($_POST['dot_replacement']) : '';
	$dot_replacement = (strlen(trim($dot_replacement)) > 0) ? $admin->add_slashes($dot_replacement) : '(dot)';
	
	// update database settings
	$database->query("UPDATE " .TABLE_PREFIX ."mod_output_filter SET email_filter = '$email_filter', 
		mailto_filter = '$mailto_filter', at_replacement = '$at_replacement', dot_replacement = '$dot_replacement'");

	// check if there is a database error, otherwise say successful
	if($database->is_error()) {
		$admin->print_error($database->get_error(), $js_back);
	} else {
		$admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL.'/admintools/tool.php?tool=output_filter');
	}

} else {
	// write out heading
	echo '<h2>' .$MOD_MAIL_FILTER['HEADING'] .'</h2>';

	// include filter functions
	require_once(WB_PATH .'/modules/output_filter/filter-routines.php');
	
	// read the mail filter settings from the database 
	$data = get_output_filter_settings();
	
	// output the form with values from the database
	echo '<p>' .$MOD_MAIL_FILTER['HOWTO'] .'</p>';
	echo $MOD_MAIL_FILTER['WARNING'];
?>
<form name="store_settings" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
<?php echo $admin->getFTAN(); ?>
	<table width="98%" cellspacing="0" cellpadding="5px" class="row_a">
	<tr><td colspan="2"><strong><?php echo $MOD_MAIL_FILTER['BASIC_CONF'];?>:</strong></td></tr>
	<tr>
		<td width="35%"><?php echo $MOD_MAIL_FILTER['EMAIL_FILTER'];?>:</td>
		<td>
			<input type="radio" <?php echo ($data['email_filter']=='1') ?'checked="checked"' :'';?>
				name="email_filter" value="1"><?php echo $MOD_MAIL_FILTER['ENABLED'];?>
			<input type="radio" <?php echo (($data['email_filter'])=='0') ?'checked="checked"' :'';?>
				name="email_filter" value="0"><?php echo $MOD_MAIL_FILTER['DISABLED'];?>
		</td>
	</tr>
	<tr>
		<td><?php echo $MOD_MAIL_FILTER['MAILTO_FILTER'];?>:</td>
		<td>
			<input type="radio" <?php echo ($data['mailto_filter']=='1') ?'checked="checked"' :'';?>
				name="mailto_filter" value="1"><?php echo $MOD_MAIL_FILTER['ENABLED'];?>
			<input type="radio" <?php echo (($data['mailto_filter'])=='0') ?'checked="checked"' :'';?>
				name="mailto_filter" value="0"><?php echo $MOD_MAIL_FILTER['DISABLED'];?>
		</td>
	</tr>
	<tr><td colspan="2"><br /><strong><?php echo $MOD_MAIL_FILTER['REPLACEMENT_CONF'];?>:</strong></td></tr>
	<tr>
		<td><?php echo $MOD_MAIL_FILTER['AT_REPLACEMENT'];?>:</td>
		<td><input type="text" style="width: 160px" value="<?php echo $data['at_replacement'];?>" 
			name="at_replacement"/></td>
	</tr>
	<tr>
		<td><?php echo $MOD_MAIL_FILTER['DOT_REPLACEMENT'];?>:</td>
		<td><input type="text" style="width: 160px" value="<?php echo $data['dot_replacement'];?>" 
			name="dot_replacement"/></td>
	</tr>
	</table>
	<input type="submit" name="save_settings" style="margin-top:10px; width:140px;" value="<?php echo $TEXT['SAVE']; ?>" />
</form>
<?php
}

?>
