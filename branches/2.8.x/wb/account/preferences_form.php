<?php
/**
 *
 * @category        frontend
 * @package         account
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

// prevent this file from being accesses directly
if(defined('WB_PATH') == false) {	exit("Cannot access this file directly"); }

	if($wb->is_authenticated() === false) {
// User needs to login first
		header("Location: ".WB_URL."/account/login.php?redirect=".$wb->link);
		exit(0);
	}

$_SESSION['PAGE_LINK'] = get_page_link( $_SESSION['PAGE_ID'] );
$_SESSION['HTTP_REFERER'] = page_link($_SESSION['PAGE_LINK']);

// load module default language file (EN)
	require_once(WB_PATH .'/account/languages/EN.php');
// check for user defined language file, load it and override EN-Settings with
	if(file_exists(WB_PATH .'/account/languages/' .LANGUAGE .'.php')) {
		require_once(WB_PATH .'/account/languages/' .LANGUAGE .'.php');
	}
	require_once(WB_PATH.'/framework/functions-utf8.php');
	echo '<style type="text/css">';
	include(WB_PATH .'/account/frontend.css');
	echo "\n</style>\n";
	$user_time = true;
	require(ADMIN_PATH.'/interface/timezones.php');
	require(ADMIN_PATH.'/interface/date_formats.php');
	require(ADMIN_PATH.'/interface/time_formats.php');
	$error = array();
	$success = array();
	$template = new Template(WB_PATH .'/account','remove');

	switch($wb->get_post('action')):
		case 'details':
			require_once(WB_PATH .'/account/details.php');
			break;
		case 'email':
			require_once(WB_PATH .'/account/email.php');

			break;
		case 'password':
			require_once(WB_PATH .'/account/password.php');
			break;
		default:
			// do nothing
	endswitch; // switch

// show template
	$template->set_file('page', 'template.html');
	$template->set_block('page', 'main_block', 'main');
// get existing values from database
	$sql = "SELECT display_name,email FROM ".TABLE_PREFIX."users WHERE user_id = '".$wb->get_user_id()."'";
	$rowset = $database->query($sql);
	if($database->is_error()) $error[] = $database->get_error();
	$row = $rowset->fetchRow();
// insert values into form
	$template->set_var('DISPLAY_NAME', $row['display_name']);
	$template->set_var('EMAIL', $row['email']);

// Insert language values
	$template->set_block('main_block', 'language_list_block', 'language_list');
	$sql = "SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'language' order by name";
	$rowset = $database->query($sql);
	if($rowset->numRows() > 0) {
		while($row = $rowset->fetchRow()) {
			$l_codes[$row['name']] = $row['directory'];
			$l_names[$row['name']] = entities_to_7bit($row['name']); // sorting-problem workaround
		}
		asort($l_names);
		foreach($l_names as $l_name=>$v) {
			// Insert code and name
			$template->set_var(array( 'CODE' => $l_codes[$l_name], 'NAME' => $l_name ));
		// Check if it is selected
			if(LANGUAGE == $l_codes[$l_name]) {
				$template->set_var('SELECTED', ' selected="selected"');
			} else {
				$template->set_var('SELECTED', '');
			}
			$template->parse('language_list', 'language_list_block', true);
		}
	}

// Insert default timezone values
	$template->set_block('main_block', 'timezone_list_block', 'timezone_list');
	foreach($TIMEZONES AS $hour_offset => $title) {
		$template->set_var('VALUE', $hour_offset);
		$template->set_var('NAME', $title);
		if($wb->get_timezone() == $hour_offset*3600) {
			$template->set_var('SELECTED', 'selected="selected"');
		} else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('timezone_list', 'timezone_list_block', true);
	}

// Insert date format list
	$template->set_block('main_block', 'date_format_list_block', 'date_format_list');
	foreach($DATE_FORMATS AS $format => $title) {
		$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
		if($format != 'system_default') {
			$template->set_var('VALUE', $format);
		} else {
			$template->set_var('VALUE', '');
		}
		$template->set_var('NAME', $title);
		if(DATE_FORMAT == $format AND !isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) {
			$template->set_var('SELECTED', 'selected="selected"');
		} elseif($format == 'system_default' AND isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) {
			$template->set_var('SELECTED', 'selected="selected"');
		} else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('date_format_list', 'date_format_list_block', true);
	}

// Insert time format list
	$template->set_block('main_block', 'time_format_list_block', 'time_format_list');
	foreach($TIME_FORMATS AS $format => $title) {
		$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
		if($format != 'system_default') {
			$template->set_var('VALUE', $format);
		} else {
			$template->set_var('VALUE', '');
		}
		$template->set_var('NAME', $title);
		if(TIME_FORMAT == $format AND !isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) {
			$template->set_var('SELECTED', 'selected="selected"');
		} elseif($format == 'system_default' AND isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) {
			$template->set_var('SELECTED', 'selected="selected"');
		} else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('time_format_list', 'time_format_list_block', true);
	}
// Insert language headings
	$template->set_var(array(
								'HEADING_MY_SETTINGS' => $HEADING['MY_SETTINGS'],
								'HEADING_MY_EMAIL'    => $HEADING['MY_EMAIL'],
								'HEADING_MY_PASSWORD' => $HEADING['MY_PASSWORD']
								)
						);
// Insert language text and messages
	$template->set_var(array(
								'HTTP_REFERER' => $_SESSION['HTTP_REFERER'],
								'TEXT_SAVE'	=> $TEXT['SAVE'],
								'TEXT_RESET' => $TEXT['RESET'],
								'TEXT_CANCEL' => $TEXT['CANCEL'],
								'TEXT_DISPLAY_NAME'	=> $TEXT['DISPLAY_NAME'],
								'TEXT_EMAIL' => $TEXT['EMAIL'],
								'TEXT_LANGUAGE' => $TEXT['LANGUAGE'],
								'TEXT_TIMEZONE' => $TEXT['TIMEZONE'],
								'TEXT_DATE_FORMAT' => $TEXT['DATE_FORMAT'],
								'TEXT_TIME_FORMAT' => $TEXT['TIME_FORMAT'],
								'TEXT_CURRENT_PASSWORD' => $TEXT['CURRENT_PASSWORD'],
								'TEXT_NEW_PASSWORD' => $TEXT['NEW_PASSWORD'],
								'TEXT_RETYPE_NEW_PASSWORD' => $TEXT['RETYPE_NEW_PASSWORD']
								)
						);

// Insert module releated language text and messages
	$template->set_var(array(
								'MOD_PREFERENCE_PLEASE_SELECT'	=> $MOD_PREFERENCE['PLEASE_SELECT'],
								'MOD_PREFERENCE_SAVE_SETTINGS'	=> $MOD_PREFERENCE['SAVE_SETTINGS'],
								'MOD_PREFERENCE_SAVE_EMAIL'			=> $MOD_PREFERENCE['SAVE_EMAIL'],
								'MOD_PREFERENCE_SAVE_PASSWORD'	=> $MOD_PREFERENCE['SAVE_PASSWORD'],
								)
						);
// Insert error and/or success messages
	$template->set_block('main_block', 'error_block', 'error_list');
	if(sizeof($error)>0){
		foreach($error AS $value){
			$template->set_var('ERROR_VALUE', $value);
			$template->parse('error_list', 'error_block', true);
		}
	}

	$template->set_block('main_block', 'success_block', 'success_list');
	if(sizeof($success)!=0){
		foreach($success AS $value){
			$template->set_var('SUCCESS_VALUE', $value);
			$template->parse('success_list', 'success_block', true);
		}
	}
// Parse template for preferences form
	$template->parse('main', 'main_block', false);
	$template->pparse('output', 'page');
