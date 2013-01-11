<?php
/**
 *
 * @category        admin
 * @package         settings
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// prevent this file from being accessed directly in the browser (would set all entries in DB settings table to '')
if(!isset($_POST['default_language']) || $_POST['default_language'] == '') die(header('Location: index.php'));

// Find out if the user was view advanced options or not
$advanced = ($_POST['advanced'] == 'yes') ? '?advanced=yes' : '';

// Print admin header
//require('../../config.php');
//require_once(WB_PATH.'/framework/class.admin.php');

// Include config file
$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require($config_file);
}

if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

require_once(WB_PATH.'/framework/functions.php');

// suppress to print the header, so no new FTAN will be set
if($advanced == '')
{
	$admin = new admin('Settings', 'settings_basic',false);
} else {
	$admin = new admin('Settings', 'settings_advanced',false);
}

// Create a javascript back link
$js_back = ADMIN_URL.'/settings/index.php'.$advanced;
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],$js_back );
}
// After check print the header
$admin->print_header();

// Ensure that the specified default email is formally valid
if(isset($_POST['server_email']))
{
	$_POST['server_email'] = strip_tags($_POST['server_email']);
//    // $pattern = '/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9]([-a-z0-9_]?[a-z0-9])*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z]{2})|([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})(\.([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})){3})(:[0-9]{1,5})?\r/im';
//    $pattern = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,6}))$/';
//    if(false == preg_match($pattern, $_POST['server_email']))
	if(!$admin->validate_email($_POST['server_email']))
    {
		$admin->print_error($MESSAGE['USERS_INVALID_EMAIL'].
			'<br /><strong>Email: '.htmlentities($_POST['server_email']).'</strong>', $js_back);
	}
}

if($admin->StripCodeFromText($admin->get_post('wbmailer_routine'))=='smtp') {

	$checkSmtpHost = (($admin->StripCodeFromText($admin->get_post('wbmailer_smtp_host'))=='') ? false : true);
//	$checkSmtpHost = (isset($_POST['wbmailer_smtp_host']) && ($_POST['wbmailer_smtp_host']=='') ? false : true);
	$checkSmtpUser = (($admin->StripCodeFromText($admin->get_post('wbmailer_smtp_username'))=='') ? false : true);
//	$checkSmtpUser = (isset($_POST['wbmailer_smtp_username']) && ($_POST['wbmailer_smtp_username']=='') ? false : true);
	$checkSmtpPassword = (($admin->StripCodeFromText($admin->get_post('wbmailer_smtp_password'))=='') ? false : true);
//	$checkSmtpPassword = (isset($_POST['wbmailer_smtp_password']) && ($_POST['wbmailer_smtp_password']=='') ? false : true);

	if(!$checkSmtpHost || !$checkSmtpUser || !$checkSmtpPassword) {
		$admin->print_error($TEXT['REQUIRED'].' '.$TEXT['WBMAILER_SMTP_AUTH'].
			'<br /><strong>'.$MESSAGE['GENERIC_FILL_IN_ALL'].'</strong>', $js_back);
	}

}

// Work-out file mode
if($advanced == '')
{
	$file_mode = STRING_FILE_MODE;
	$dir_mode = STRING_DIR_MODE;
	// Check if should be set to 777 or left alone
//	if(isset($_POST['world_writeable']) && $_POST['world_writeable'] == 'true')
//    {
//		$file_mode = '0777';
//		$dir_mode = '0777';
//	} else {
//		$file_mode = STRING_FILE_MODE;
//		$dir_mode = STRING_DIR_MODE;
//	}
} else {
	$file_mode = STRING_FILE_MODE;
	$dir_mode = STRING_DIR_MODE;
	if($admin->get_user_id()=='1')
	{
		// Work-out the octal value for file mode
		$u = 0;
		if(isset($_POST['file_u_r']) && $_POST['file_u_r'] == 'true') {
			$u = $u+4;
		}
		if(isset($_POST['file_u_w']) && $_POST['file_u_w'] == 'true') {
			$u = $u+2;
		}
		if(isset($_POST['file_u_e']) && $_POST['file_u_e'] == 'true') {
			$u = $u+1;
		}
		$g = 0;
		if(isset($_POST['file_g_r']) && $_POST['file_g_r'] == 'true') {
			$g = $g+4;
		}
		if(isset($_POST['file_g_w']) && $_POST['file_g_w'] == 'true') {
			$g = $g+2;
		}
		if(isset($_POST['file_g_e']) && $_POST['file_g_e'] == 'true') {
			$g = $g+1;
		}
		$o = 0;
		if(isset($_POST['file_o_r']) && $_POST['file_o_r'] == 'true') {
			$o = $o+4;
		}
		if(isset($_POST['file_o_w']) && $_POST['file_o_w'] == 'true') {
			$o = $o+2;
		}
		if(isset($_POST['file_o_e']) && $_POST['file_o_e'] == 'true') {
			$o = $o+1;
		}
		$file_mode = "0".$u.$g.$o;
		// Work-out the octal value for dir mode
		$u = 0;
		if(isset($_POST['dir_u_r']) && $_POST['dir_u_r'] == 'true') {
			$u = $u+4;
		}
		if(isset($_POST['dir_u_w']) && $_POST['dir_u_w'] == 'true') {
			$u = $u+2;
		}
		if(isset($_POST['dir_u_e']) && $_POST['dir_u_e'] == 'true') {
			$u = $u+1;
		}
		$g = 0;
		if(isset($_POST['dir_g_r']) && $_POST['dir_g_r'] == 'true') {
			$g = $g+4;
		}
		if(isset($_POST['dir_g_w']) && $_POST['dir_g_w'] == 'true') {
			$g = $g+2;
		}
		if(isset($_POST['dir_g_e']) && $_POST['dir_g_e'] == 'true') {
			$g = $g+1;
		}
		$o = 0;
		if(isset($_POST['dir_o_r']) && $_POST['dir_o_r'] == 'true') {
			$o = $o+4;
		}
		if(isset($_POST['dir_o_w']) && $_POST['dir_o_w'] == 'true') {
			$o = $o+2;
		}
		if(isset($_POST['dir_o_e']) && $_POST['dir_o_e'] == 'true') {
			$o = $o+1;
		}
		$dir_mode = "0".$u.$g.$o;
	}
}

$allow_tags_in_fields = array(
    'website_header',
    'website_footer',
    'wbmail_signature'
    );
$allow_empty_values = array(
    'website_header',
    'website_footer',
    'wbmail_signature',
    'wysiwyg_style',
    'pages_directory',
    'page_icon_dir',
    'rename_files_on_upload',
    'page_spacer',
    'page_icon_dir',
    );
$disallow_in_fields = array(
    'pages_directory',
    'media_directory',
    'wb_version'
    );
$StripCodeFromInput = array(
    'website_title',
    'website_description',
    'website_keywords',
    'wbmail_signature',
    'wysiwyg_style',
    'pages_directory',
    'page_icon_dir',
    'media_directory',
    'page_extension',
    'rename_files_on_upload',
    'page_spacer',
    'page_icon_dir',
    );

// Query current settings in the db, then loop through them and update the db with the new value
$settings = array();
$old_settings = array();
// Query current settings in the db, then loop through them to get old values
$sql  = 'SELECT `name`, `value` FROM `'.TABLE_PREFIX.'settings`';
$sql .= 'ORDER BY `name`';

if($res_settings = $database->query($sql)) {
	$passed = false;
	while($setting = $res_settings->fetchRow(MYSQL_ASSOC))
	{
		$setting_name = $setting['name'];
		$old_settings[$setting_name] = $setting['value'];
		$value = $admin->get_post($setting_name);
		$value = isset($_POST[$setting_name]) ? $value : $old_settings[$setting_name] ;
		switch ($setting_name) {
			case 'default_timezone':
		    	$value = (is_numeric($value) ? $value : 0);
		    	$value = ( ($value >= -12 && $value <= 13) ? $value :0 ) * 3600;
				$passed = true;
				break;
			case 'string_dir_mode':
				$value=$dir_mode;
				$passed = true;
				break;
			case 'string_file_mode':
				$value=$file_mode;
	 			$passed = true;
    			break;
			case 'sec_anchor':
                $value = $admin->StripCodeFromText($value);
				$value=(($value=='') ? 'section_' : $value);
	 			$passed = true;
				break;
			case 'media_directory':
				$value = ( (strpos($value,'/',0)===false) && ($value!= '') ) ? '/'.$value : rtrim($value,'/'); 
	 			$passed = true;
				break;
			case 'pages_directory':
				if( ($database->get_one('SELECT COUNT(*) FROM `'.TABLE_PREFIX.'pages`'))==0 ) {
					$value = rtrim($admin->StripCodeFromText($value));
					$passed = true;
				} else {
					$value = rtrim($old_settings[$setting_name]);
				}
				$value = ( (strpos($value,'/',0)===false) && ($value != '')  ? '/'.$value : rtrim($value,'/') ); 
				break;
			case 'wbmailer_smtp_auth':
				$value = true ;
	 			$passed = true;
				break;
			default :
                $passed = in_array($setting_name, $allow_empty_values);
                if(in_array($setting_name, $StripCodeFromInput) ) {
                    $value = $admin->StripCodeFromText($value);
                }
				break;
		}

	    if (!in_array($setting_name, $allow_tags_in_fields))
	    {
	        $value = strip_tags($value);
	    }

	    if ( !in_array($value, $disallow_in_fields) && (isset($_POST[$setting_name]) || $passed == true) )
	    {
	        $value = trim($admin->add_slashes($value));
	        $sql = 'UPDATE `'.TABLE_PREFIX.'settings` ';
	        $sql .= 'SET `value` = \''.($value).'\' '; // mysql_escape_string
	        $sql .= 'WHERE `name` != \'wb_version\' ';
	        $sql .= 'AND `name` = \''.$setting_name.'\' ';
	        if (!$database->query($sql))
	        {
				if($database->is_error()) {
					$admin->print_error($database->get_error, $js_back );
				}
	        }
		}
	}

}
/**
 * now save search settings
 */
$StripCodeFromISearch = array(
    'search_header',
    'search_results_header',
    'search_results_loop',
    'search_results_footer',
    'search_footer',
    'search_module_order',
    'search_max_excerpt',
    'search_no_results',
    'search_time_limit',
    'search_max_excerpt',
    );
$allow_empty_values = array(
    'header',
    'results_header',
    'results_loop',
    'results_footer',
    'footer',
    'module_order',
    'no_results',
    );
$allow_tags_in_fields = array(
    'header',
    'results_header',
    'results_loop',
    'results_footer',
    'no_results',
    'footer',
    );

// Query current search settings in the db, then loop through them and update the db with the new value
$sql  = 'SELECT `name`, `value` FROM `'.TABLE_PREFIX.'search` ';
$sql .= 'WHERE `extra` =  \'\' ';
if( !($oSearch = $database->query($sql)) ) {
    if($database->is_error()) {
    	$admin->print_error(explode(';',$database->get_error()), $js_back );
    }
}

while($aSearch = $oSearch->fetchRow(MYSQL_ASSOC))
{
	$passed = false;
	$old_value = $aSearch['value'];
	$sSearchName = $aSearch['name'];
	$sPostName = 'search_'.$sSearchName;

    $value = $admin->get_post($sPostName);
    $value = isset($value) ?  $value : $old_value;
    if(in_array($sPostName, $StripCodeFromISearch) ) {
        $value = $admin->StripCodeFromText($value);
    }

/**
 *  hold old value if post is empty
 *  check search template
 */
	switch ($sSearchName) {
		case 'template':
 			$passed = true;
            $value =  ( !($admin->get_post($sPostName)) || ($value == DEFAULT_TEMPLATE ) ) ? '' : $admin->get_post($sPostName);
			break;
		case 'max_excerpt':
 			$passed = true;
        	if(preg_match('/[^0-9]+/i', $value)) {
                $value = $old_value;
        	}
			break;
		case 'time_limit':
            $passed = true;
        	if(preg_match('/[^0-9]+/i', $value)) {
                $value = $old_value;
        	}
			break;
		default :
        	$passed = ($admin->get_post($sPostName) || in_array($sSearchName, $allow_empty_values));

            if (!in_array($sSearchName, $allow_tags_in_fields))
            {
                $value = strip_tags($value);
            }
			break;
	}

    if ( ($passed == true) )
	{
		$value = $admin->add_slashes($value);
        $sql  = 'UPDATE `'.TABLE_PREFIX.'search` ';
        $sql .= 'SET `value` = \''.$value.'\' ';
        $sql .= 'WHERE `name` = \''.$sSearchName.'\' ';
        $sql .= 'AND `extra` = \'\' ';
		if($database->query($sql)) {

		}
		$sql_info = mysql_info($database->db_handle);
    }
}

// Check if there was an error updating the db
if($database->is_error()) {
	$admin->print_error($database->get_error, $js_back );
} else {
	$admin->print_success($MESSAGE['SETTINGS_SAVED'], $js_back );
}
$admin->print_footer();
