<?php
/**
 *
 * @category        admin
 * @package         settings
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// Include config file
if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}
if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

if(isset($_GET['advanced']) && $_GET['advanced'] == 'yes') {
	$admin = new admin('Settings', 'settings_advanced');
} else {
	$admin = new admin('Settings', 'settings_basic');
}

// add new values, later in upgrade-script
$cfg = array(
	'wbmail_signature' => defined('WBMAIL_SIGNATURE') ? WBMAIL_SIGNATURE : '',
	'confirmed_registration' => (defined('CONFIRMED_REGISTRATION') ? CONFIRMED_REGISTRATION : '0'),
	'page_extendet' => (defined('PAGE_EXTENDET') ? PAGE_EXTENDET : 'true'),
	);
db_update_key_value( 'settings', $cfg );

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');
require_once(WB_PATH.'/framework/functions-utf8.php');

// Setup template object, parse vars to it, then parse it
// Create new template object
$oTpl = new Template(dirname($admin->correct_theme_source('settings.htt')),'comment');
//$oTpl->debug = true;
//$oTpl->filename_comments = true;
//$oTpl->unknown_regexp = "strict";
//$oTpl->halt_on_error = "report" ;

$oTpl->set_file('page',  'settings.htt');
$oTpl->set_block('page', 'main_block', 'main');

//$mLang = ModLanguage::getInstance();
//$mLang->setLanguage(dirname(__FILE__).'/languages/', LANGUAGE, DEFAULT_LANGUAGE);
$mLang = Translate::getinstance();
$mLang->enableAddon('admin\settings');
/*-- insert all needed vars from language files ----------------------------------------*/
$oTpl->set_var($mLang->getLangArray());

$oTpl->set_var('FTAN', $admin->getFTAN());

// Query current settings in the db, then loop through them and print them
$query = "SELECT * FROM `".TABLE_PREFIX."settings`";
if($results = $database->query($query)) {
    while($setting = $results->fetchRow(MYSQL_ASSOC)) {
    	$setting_name = $setting['name'];
    	$setting_value = ( $setting_name != 'wbmailer_smtp_password' ) ? htmlspecialchars($setting['value']) : htmlentities($setting['value'], ENT_COMPAT, 'UTF-8');
    	$oTpl->set_var(strtoupper($setting_name),($setting_value));
    }
}

$is_advanced = (isset($_GET['advanced']) && $_GET['advanced'] == 'yes');
// Tell the browser whether or not to show advanced options
    if($is_advanced)
    {
    	$oTpl->set_var('DISPLAY_ADVANCED', '');
    	$oTpl->set_var('ADVANCED_FILE_PERMS_ID', 'file_perms_box');
    	$oTpl->set_var('BASIC_FILE_PERMS_ID', 'hide');
    	$oTpl->set_var('ADVANCED', 'yes');
    	$oTpl->set_var('ADVANCED_BUTTON', '&lt;&lt; '.$mLang->TEXT_HIDE_ADVANCED);
    	$oTpl->set_var('ADVANCED_LINK', 'index.php?advanced=no');

    } else {
    	$oTpl->set_var('DISPLAY_ADVANCED', ' style="display: none;"');
    	$oTpl->set_var('BASIC_FILE_PERMS_ID', 'file_perms_box');
    	$oTpl->set_var('ADVANCED_FILE_PERMS_ID', 'hide');

    	$oTpl->set_var('ADVANCED', 'no');
    	$oTpl->set_var('ADVANCED_BUTTON', $mLang->TEXT_SHOW_ADVANCED.' &gt;&gt;');
    	$oTpl->set_var('ADVANCED_LINK', 'index.php?advanced=yes');
    }

	$sSelected = ' selected="selected"';
	$checked   = ' checked="checked"';

	$oTpl->set_var(array(
		'WB_URL' => WB_URL,
		'THEME_URL' => THEME_URL,
		'ADMIN_URL' => ADMIN_URL,
	 ));

//  Insert permissions values
	if($admin->get_permission('settings_advanced') != true)
	{
		$oTpl->set_var('DISPLAY_ADVANCED_BUTTON', 'hide');
	}

    /**
     * <!-- BEGIN show_page_level_limit_block -->
     * Insert page level limits
     */
    $oTpl->set_block('main_block', 'show_page_level_limit_block', 'show_page_level_limit');
    /**
     * <!-- BEGIN page_level_limit_list_block -->
     */
    $oTpl->set_block('show_page_level_limit_block', 'page_level_limit_list_block', 'page_level_limit_list');
	for($i = 1; $i <= 10; $i++)
	{
		$oTpl->set_var('NUMBER', $i);
		if(PAGE_LEVEL_LIMIT == $i)
	    {
			$oTpl->set_var('SELECTED', $sSelected);
		} else {
			$oTpl->set_var('SELECTED', '');
		}
		$oTpl->parse('page_level_limit_list', 'page_level_limit_list_block', true);
	}

    /**
     * <!-- END page_level_limit_list_block -->
     * <!-- END show_page_level_limit_block -->
     */
    if($is_advanced)
    {
    	$oTpl->parse('show_page_level_limit', 'show_page_level_limit_block', false);
    } else {
    	$oTpl->parse('show_page_level_limit', '');
    }

    /**
     * Work-out if page trash feature is disabled, in-line, or separate
     */
	if(PAGE_TRASH == 'disabled')
	{
    	$oTpl->set_var(array(
				'PAGE_TRASH_DISABLED' => $checked,
				'PAGE_TRASH_INLINE' => '',
				'DISPLAY_PAGE_TRASH_SEPARATE' => 'display: none;',
				));
	} elseif(PAGE_TRASH == 'inline')
	{
    	$oTpl->set_var(array(
				'PAGE_TRASH_INLINE' => $checked,
				'PAGE_TRASH_DISABLED' => '',
				'DISPLAY_PAGE_TRASH_SEPARATE' => 'display: none;',
				));
	} elseif(PAGE_TRASH == 'separate')
	{
		$oTpl->set_var('PAGE_TRASH_SEPARATE', $checked);
		$oTpl->set_var('DISPLAY_PAGE_TRASH_SEPARATE', 'display: inline;');
	}

    /**
     * <!-- BEGIN show_checkbox_1_block -->
     * advanced yes
     */
    $oTpl->set_block('main_block', 'show_checkbox_1_block', 'show_checkbox_1');
//  Work-out if page languages feature is enabled
	if(defined('PAGE_LANGUAGES') && PAGE_LANGUAGES == true)
	{
    	$oTpl->set_var(array(
				'PAGE_LANGUAGES_ENABLED' => $checked,
				'PAGE_LANGUAGES_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'PAGE_LANGUAGES_DISABLED' => $checked,
				'PAGE_LANGUAGES_ENABLED' => '',
				));
	}

//  Work-out if page extended feature is enabled
	if(defined('PAGE_EXTENDET') && PAGE_EXTENDET == true)
	{
    	$oTpl->set_var(array(
				'PAGE_EXTENDET_ENABLED' => $checked,
				'PAGE_EXTENDET_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'PAGE_EXTENDET_DISABLED' => $checked,
				'PAGE_EXTENDET_ENABLED' => '',
				));
	}

//  Work-out if multiple menus feature is enabled
	if(defined('MULTIPLE_MENUS') && MULTIPLE_MENUS == true)
	{
    	$oTpl->set_var(array(
				'MULTIPLE_MENUS_ENABLED' => $checked,
				'MULTIPLE_MENUS_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'MULTIPLE_MENUS_DISABLED' => $checked,
				'MULTIPLE_MENUS_ENABLED' => '',
				));
	}

    /**
     * <!-- END show_checkbox_1_block -->
     * advanced yes
     */
    if($is_advanced)
    {
    	$oTpl->parse('show_checkbox_1', 'show_checkbox_1_block');
    } else {
    	$oTpl->parse('show_checkbox_1', '');
    }

//  Work-out if media home folder feature is enabled
    $oTpl->set_var('TEXT_HOME_FOLDERS', $mLang->TEXT_HOME_FOLDERS);
	if(HOME_FOLDERS)
	{
    	$oTpl->set_var(array(
				'HOME_FOLDERS_ENABLED' => $checked,
				'HOME_FOLDERS_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'HOME_FOLDERS_DISABLED' => $checked,
				'HOME_FOLDERS_ENABLED' => '',
				));
	}

    $oTpl->set_block('main_block', 'show_checkbox_2_block', 'show_checkbox_2');
//  Work-out if manage sections feature is enabled
	if(MANAGE_SECTIONS)
	{
    	$oTpl->set_var(array(
				'MANAGE_SECTIONS_ENABLED' => $checked,
				'MANAGE_SECTIONS_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'MANAGE_SECTIONS_DISABLED' => $checked,
				'MANAGE_SECTIONS_ENABLED' => '',
				));
	}

	// Work-out if section blocks feature is enabled
	if(defined('SECTION_BLOCKS') && SECTION_BLOCKS == true)
	{
    	$oTpl->set_var(array(
				'SECTION_BLOCKS_ENABLED' => $checked,
				'SECTION_BLOCKS_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'SECTION_BLOCKS_DISABLED' => $checked,
				'SECTION_BLOCKS_ENABLED' => '',
				));
	}

    /**
     *
     */
    if($is_advanced)
    {
     	$oTpl->parse('show_checkbox_2', 'show_checkbox_2_block');
    } else {
    	$oTpl->parse('show_checkbox_2', '');
    }

	// Work-out if intro feature is enabled
	if(INTRO_PAGE)
	{
    	$oTpl->set_var(array(
				'INTRO_PAGE_ENABLED' => $checked,
				'INTRO_PAGE_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'INTRO_PAGE_DISABLED' => $checked,
				'INTRO_PAGE_ENABLED' => '',
				));
	}
/**
 * <!-- BEGIN show_checkbox_3_block -->
 */
    $oTpl->set_block('main_block', 'show_checkbox_3_block', 'show_checkbox_3');
//  Work-out if homepage redirection feature is enabled
	if(defined('HOMEPAGE_REDIRECTION') && HOMEPAGE_REDIRECTION == true)
	{
    	$oTpl->set_var(array(
				'HOMEPAGE_REDIRECTION_ENABLED' => $checked,
				'HOMEPAGE_REDIRECTION_DISABLED' => '',
				));
	} else {
//		$oTpl->set_var('HOMEPAGE_REDIRECTION_DISABLED', $checked);
    	$oTpl->set_var(array(
				'HOMEPAGE_REDIRECTION_DISABLED' => $checked,
				'HOMEPAGE_REDIRECTION_ENABLED' => '',
				));
	}
//  Work-out if smart login feature is enabled
	if(defined('SMART_LOGIN') && SMART_LOGIN == true)
	{
		$oTpl->set_var('SMART_LOGIN_ENABLED', $checked);
    	$oTpl->set_var(array(
				'SMART_LOGIN_ENABLED' => $checked,
				'SMART_LOGIN_DISABLED' => '',
				));
	} else {
		$oTpl->set_var('SMART_LOGIN_DISABLED', $checked);
    	$oTpl->set_var(array(
				'SMART_LOGIN_DISABLED' => $checked,
				'SMART_LOGIN_ENABLED' => '',
				));
	}

    /**
     * <!-- END show_checkbox_3_block -->
     */
    if($is_advanced)
    {
    	$oTpl->parse('show_checkbox_3', 'show_checkbox_3_block');
    } else {
    	$oTpl->parse('show_checkbox_3', 'show_checkbox_3_block', '');
    }

//  Work-out if frontend login feature is enabled
	if(FRONTEND_LOGIN)
	{
    	$oTpl->set_var(array(
				'PRIVATE_ENABLED' => $checked,
				'PRIVATE_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'PRIVATE_DISABLED' => $checked,
				'PRIVATE_ENABLED' => '',
				));
	}

	if(CONFIRMED_REGISTRATION)
	{
    	$oTpl->set_var(array(
				'CONFIRMED_REGISTRATION_ENABLED' => $checked,
				'CONFIRMED_REGISTRATION_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'CONFIRMED_REGISTRATION_DISABLED' => $checked,
				'CONFIRMED_REGISTRATION_ENABLED' => '',
				));
	}

//  Insert groups into signup list
    $oTpl->set_block('main_block', 'group_list_block', 'group_list');
    $sql = "SELECT `group_id`, `name` FROM `".TABLE_PREFIX."groups` WHERE `group_id` != '1'";
	if($results = $database->query($sql)) {
    	if($results->numRows() > 0)
    	{
    		while($group = $results->fetchRow(MYSQL_ASSOC))
    	    {
    			$oTpl->set_var('ID', $group['group_id']);
    			$oTpl->set_var('NAME', $group['name']);
    			if(FRONTEND_SIGNUP == $group['group_id'])
    	        {
    				$oTpl->set_var('SELECTED', $sSelected);
    			} else {
    				$oTpl->set_var('SELECTED', '');
    			}
    			$oTpl->parse('group_list', 'group_list_block', true);
    		}
    	} else {
    		$oTpl->set_var('ID', 'disabled');
    		$oTpl->set_var('NAME', $mLang->MESSAGE_GROUPS_NO_GROUPS_FOUND);
    		$oTpl->parse('group_list', 'group_list_block', true);
    	}
	}

    /**
     * <!-- BEGIN show_redirect_timer_block -->
     */
    $oTpl->set_block('main_block', 'show_redirect_timer_block', 'show_redirect_timer');

    /**
     * <!-- END show_redirect_timer_block -->
     */
    if($is_advanced)
    {
    	$oTpl->parse('show_redirect_timer', 'show_redirect_timer_block');
    } else {
    	$oTpl->parse('show_redirect_timer', '');
    }

    /**
     * <!-- BEGIN show_php_error_level_block -->
     */
	// Insert default error reporting values
	require(ADMIN_PATH.'/interface/er_levels.php');
    $oTpl->set_block('main_block', 'show_php_error_level_block',  'show_php_error_level');
    $oTpl->set_block('show_php_error_level_block', 'php_error_list_block',  'php_error_list');
	foreach($ER_LEVELS AS $value => $title)
	{
		$oTpl->set_var('VALUE', $value);
		$oTpl->set_var('NAME', $title);
	    $selected = (ER_LEVEL == $value) ? $sSelected : '';
	    $oTpl->set_var('SELECTED', $selected);
		$oTpl->parse('php_error_list', 'php_error_list_block', true);
	}

    /**
     * <!-- END show_php_error_level_block -->
     */
    if($is_advanced)
    {
    	$oTpl->parse('show_php_error_level',  'show_php_error_level_block');
    } else {
    	$oTpl->parse('show_php_error_level', '');
    }

    /**
     * <!-- BEGIN show_wysiwyg_block -->
     */
//  Insert WYSIWYG modules
    $oTpl->set_block('main_block', 'show_wysiwyg_block',        'show_wysiwyg');
    $oTpl->set_block('show_wysiwyg_block', 'editor_list_block', 'editor_list');
	$file='none';
	$module_name=$mLang->TEXT_NONE;
	$oTpl->set_var('FILE', $file);
	$oTpl->set_var('NAME', $module_name);
	$selected = (!defined('WYSIWYG_EDITOR') || $file == WYSIWYG_EDITOR) ? $sSelected : '';
	$oTpl->set_var('SELECTED', $selected);
	$oTpl->parse('editor_list', 'editor_list_block', true);
	$sql  = 'SELECT `name`, `directory` FROM `'.TABLE_PREFIX.'addons` ';
	$sql .= 'WHERE `type` = \'module\' ';
	$sql .= 'AND `function` = \'wysiwyg\' ';
	$sql .= 'ORDER BY `name`';
	if( ($result = $database->query($sql)) && ($result->numRows() > 0) )
	{
		while($addon = $result->fetchRow(MYSQL_ASSOC))
	    {
			if( $admin->get_permission($addon['directory'],'module' ) )
			{
				$oTpl->set_var('FILE', $addon['directory']);
				$oTpl->set_var('NAME', $addon['name']);
				$selected = (!defined('WYSIWYG_EDITOR') || $addon['directory'] == WYSIWYG_EDITOR) ? $sSelected : '';
				$oTpl->set_var('SELECTED', $selected);
				$oTpl->parse('editor_list', 'editor_list_block', true);
			}
		}
	}

    /**
     * <!-- END show_wysiwyg_block -->
     */
    if($is_advanced)
    {
    	$oTpl->parse('show_wysiwyg','show_wysiwyg_block');
    } else {
    	$oTpl->parse('show_wysiwyg', '');
    }

//  Insert language values
    $oTpl->set_block('main_block', 'language_list_block', 'language_list');
	$sql  = 'SELECT `name`, `directory` FROM `'.TABLE_PREFIX.'addons` ';
	$sql .= 'WHERE `type` = \'language\' ';
	$sql .= 'AND `function` != \'theme\' ';
	$sql .= 'ORDER BY `directory`';
	if( ($result = $database->query($sql)) && ($result->numRows() > 0) )
	{
		while($addon = $result->fetchRow(MYSQL_ASSOC)) {
	        $langIcons = (empty($addon['directory'])) ? 'none' : strtolower($addon['directory']);

			$oTpl->set_var('CODE',        $addon['directory']);
			$oTpl->set_var('NAME',        $addon['name']);
			$oTpl->set_var('FLAG',        THEME_URL.'/images/flags/'.$langIcons);
			$oTpl->set_var('SELECTED',    (DEFAULT_LANGUAGE == $addon['directory'] ? $sSelected : '') );
			$oTpl->parse('language_list', 'language_list_block', true);
		}
	}
    /**
     * <!-- BEGIN show_charset_block -->
     */
//  Insert default charset values
    $oTpl->set_block('main_block', 'show_charset_block', 'show_charset');
	require(ADMIN_PATH.'/interface/charsets.php');
    $oTpl->set_block('show_charset_block', 'charset_list_block', 'charset_list');
	foreach($CHARSETS AS $code => $title) {
		$oTpl->set_var('VALUE', $code);
		$oTpl->set_var('NAME', $title);
		if(DEFAULT_CHARSET == $code) {
			$oTpl->set_var('SELECTED', $sSelected);
		} else {
			$oTpl->set_var('SELECTED', '');
		}
		$oTpl->parse('charset_list', 'charset_list_block', true);
	}
    /**
     * <!-- END show_charset_block -->
     */
    if($is_advanced)
    {
    	$oTpl->parse('show_charset', 'show_charset_block');
    } else {
    	$oTpl->parse('show_charset', '');
    }

//  nsert default timezone values
	require(ADMIN_PATH.'/interface/timezones.php');
    $oTpl->set_block('main_block', 'timezone_list_block','timezone_list');
	foreach($TIMEZONES AS $hour_offset => $title)
	{
//  Make sure we dont list "System Default" as we are setting this value!
		if($hour_offset != '-20') {
			$oTpl->set_var('VALUE', $hour_offset);
			$oTpl->set_var('NAME', $title);
			if(DEFAULT_TIMEZONE == $hour_offset*60*60) {
				$oTpl->set_var('SELECTED', $sSelected);
			} else {
				$oTpl->set_var('SELECTED', '');
			}
			$oTpl->parse('timezone_list', 'timezone_list_block', true);
		}
	}

//  Insert date format list
	require(ADMIN_PATH.'/interface/date_formats.php');
    $oTpl->set_block('main_block', 'date_format_list_block', 'date_format_list');
	foreach($DATE_FORMATS AS $format => $title) {
		$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
		if($format != 'system_default') {
			$oTpl->set_var('VALUE', $format);
		} else {
			$oTpl->set_var('VALUE', '');
		}
		$oTpl->set_var('NAME', $title);
		if(DEFAULT_DATE_FORMAT == $format) {
			$oTpl->set_var('SELECTED', $sSelected);
		} else {
			$oTpl->set_var('SELECTED', '');
		}
		$oTpl->parse('date_format_list', 'date_format_list_block', true);
	}

//  Insert time format list
	require(ADMIN_PATH.'/interface/time_formats.php');
    $oTpl->set_block('main_block', 'time_format_list_block', 'time_format_list');
	foreach($TIME_FORMATS AS $format => $title) {
		$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
		if($format != 'system_default') {
			$oTpl->set_var('VALUE', $format);
		} else {
			$oTpl->set_var('VALUE', '');
		}
		$oTpl->set_var('NAME', $title);
		if(DEFAULT_TIME_FORMAT == $format) {
			$oTpl->set_var('SELECTED', $sSelected);
		} else {
			$oTpl->set_var('SELECTED', '');
		}
		$oTpl->parse('time_format_list', 'time_format_list_block', true);
	}

// Insert templates
    $oTpl->set_block('main_block', 'template_list_block',         'template_list');
	$sql  = 'SELECT `name`, `directory` FROM `'.TABLE_PREFIX.'addons` ';
	$sql .= 'WHERE `type` = \'template\' ';
	$sql .= 'AND `function` != \'theme\' ';
	$sql .= 'ORDER BY `name`';
	if( ($result = $database->query($sql)) && ($result->numRows() > 0) )
	{
		while($addon = $result->fetchRow(MYSQL_ASSOC))
		{
			if( $admin->get_permission($addon['directory'],'template' ) )
			{
				$oTpl->set_var('FILE', $addon['directory']);
				$oTpl->set_var('NAME', $addon['name']);
				$selected = (($addon['directory'] == DEFAULT_TEMPLATE) ? $sSelected : '');
				$oTpl->set_var('SELECTED', $selected);
				$oTpl->parse('template_list', 'template_list_block', true);
			}
		}
	}

// Insert backend theme
    $oTpl->set_block('main_block', 'theme_list_block',            'theme_list');
	$sql  = 'SELECT `name`, `directory` FROM `'.TABLE_PREFIX.'addons` ';
	$sql .= 'WHERE `type` = \'template\' ';
	$sql .= 'AND `function` = \'theme\' ';
	$sql .= 'ORDER BY `name`';

	if( ($result = $database->query($sql)) && ($result->numRows() > 0) )
	{
		while($addon = $result->fetchRow(MYSQL_ASSOC))
		{
			if( $admin->get_permission($addon['directory'],'template' ) )
			{
				$oTpl->set_var('FILE', $addon['directory']);
				$oTpl->set_var('NAME', $addon['name']);
				$selected = (($addon['directory'] == DEFAULT_THEME) ? $sSelected : '');
				$oTpl->set_var('SELECTED', $selected);
				$oTpl->parse('theme_list', 'theme_list_block', true);
			}
		}
	}

//  Work-out if warn_page_leave feature is enabled
//	if (defined('WARN_PAGE_LEAVE') && WARN_PAGE_LEAVE == true)
//	{
//    	$oTpl->set_var(array(
//				'WARN_PAGE_LEAVE_ENABLED' => $checked,
//				'WARN_PAGE_LEAVE_DISABLED' => '',
//				));
//	} else {
//    	$oTpl->set_var(array(
//				'MANAGE_SECTIONS_DISABLED' => $checked,
//				'WARN_PAGE_LEAVE_DISABLED' => '',
//				));
//	}

/*  Make's sure GD library is installed */
//	if(extension_loaded('gd') && function_exists('imageCreateFromJpeg'))
//	{
//		$oTpl->set_var('GD_EXTENSION_ENABLED', '');
//	} else {
//		$oTpl->set_var('GD_EXTENSION_ENABLED', ' style="display: none;"');
//	}

//  Insert permissions values
//	if($admin->get_permission('settings_advanced') != true)
//	{
//		$oTpl->set_var('DISPLAY_ADVANCED_BUTTON', 'hide');
//	}

/**
 *
 *
 */
    $oTpl->set_block('main_block', 'show_search_block','show_search');
	$query = "SELECT * FROM `".TABLE_PREFIX."search` WHERE `extra` = '' ";
	if($results = $database->query($query))
    {
    	// Query current settings in the db, then loop through them and print them
    	while($setting = $results->fetchRow(MYSQL_ASSOC))
    	{
    		$setting_name = $setting['name'];
    		$setting_value = htmlspecialchars(($setting['value']));
    		switch($setting_name) {
    			// Search header
    			case 'header':
    				$oTpl->set_var('SEARCH_HEADER', $setting_value);
    			break;
    			// Search results header
    			case 'results_header':
    				$oTpl->set_var('SEARCH_RESULTS_HEADER', $setting_value);
    			break;
    			// Search results loop
    			case 'results_loop':
    				$oTpl->set_var('SEARCH_RESULTS_LOOP', $setting_value);
    			break;
    			// Search results footer
    			case 'results_footer':
    				$oTpl->set_var('SEARCH_RESULTS_FOOTER', $setting_value);
    			break;
    			// Search no results
    			case 'no_results':
    				$oTpl->set_var('SEARCH_NO_RESULTS', $setting_value);
    			break;
    			// Search footer
    			case 'footer':
    				$oTpl->set_var('SEARCH_FOOTER', $setting_value);
    			break;
    			// Search module-order
    			case 'module_order':
    				$oTpl->set_var('SEARCH_MODULE_ORDER', $setting_value);
    			break;
    			// Search max lines of excerpt
    			case 'max_excerpt':
    				$oTpl->set_var('SEARCH_MAX_EXCERPT', $setting_value);
    			break;
    			// time-limit
    			case 'time_limit':
    				$oTpl->set_var('SEARCH_TIME_LIMIT', $setting_value);
    			break;
    			// Search template
    			case 'template':
    				$search_template = $setting_value;
    			break;
    		}
    	}
	}

// Insert templates for search settings
    $oTpl->set_block('main_block', 'search_template_list_block',  'search_template_list');
	$search_template = ( ($search_template == DEFAULT_TEMPLATE) || ($search_template == '') ) ? '' : $search_template;
	$selected = ( ($search_template != DEFAULT_TEMPLATE) ) ?  $sSelected : '';

	$oTpl->set_var(array(
	        'FILE' => '',
			'TEXT_MODULE_ORDER' => $mLang->TEXT_MODULE_ORDER,
	        'NAME' => $mLang->TEXT_SYSTEM_DEFAULT,
	        'SELECTED' => $selected
	    ));
	$oTpl->parse('search_template_list', 'search_template_list_block', true);
	$sql  = 'SELECT `name`, `directory` FROM `'.TABLE_PREFIX.'addons` ';
	$sql .= 'WHERE `type` = \'template\' ';
	$sql .= 'AND `function` = \'template\' ';
	$sql .= 'ORDER BY `name`';
    if( ($result = $database->query($sql)) && ($result->numRows() > 0) )
	{
		while($addon = $result->fetchRow(MYSQL_ASSOC))
	    {
			if( $admin->get_permission($addon['directory'],'template' ) )
			{
				$oTpl->set_var('FILE', $addon['directory']);
				$oTpl->set_var('NAME', $addon['name']);
		        $selected = ($addon['directory'] == $search_template) ? $sSelected :  '';
				$oTpl->set_var('SELECTED', $selected);
				$oTpl->parse('search_template_list', 'search_template_list_block', true);
			}
		}
	}

	// Insert search select
//    $oTpl->set_var(array(
//		'TEXT_REGISTERED' => $mLang->TEXT_REGISTERED'],
//		'TEXT_PUBLIC' => $mLang->TEXT_PUBLIC,
//		'TEXT_PRIVATE' => $mLang->TEXT_PRIVATE'],
//		'TEXT_NONE' => $mLang->TEXT_NONE'],
//		'TEXT_MAX_EXCERPT' => $mLang->TEXT_MAX_EXCERPT'],
//		'TEXT_TIME_LIMIT' => $mLang->TEXT_TIME_LIMIT'],
//		'TEXT_VISIBILITY' => $mLang->TEXT_VISIBILITY'],
//		'TEXT_SEARCH' => $mLang->TEXT_SEARCH'],
//		));
	if(SEARCH == 'private')
	{
    	$oTpl->set_var(array(
				'PRIVATE_SEARCH' => $sSelected,
				'REGISTERED_SEARCH' => '',
				'NONE_SEARCH' => '',
				));
	} elseif(SEARCH == 'public') {
    	$oTpl->set_var(array(
				'PRIVATE_SEARCH' => '',
				'REGISTERED_SEARCH' => '',
				'NONE_SEARCH' => '',
				));
	} elseif(SEARCH == 'registered') {
    	$oTpl->set_var(array(
				'PRIVATE_SEARCH' => '',
				'REGISTERED_SEARCH' => $sSelected,
				'NONE_SEARCH' => '',
				));
	} elseif(SEARCH == 'none') {
    	$oTpl->set_var(array(
				'PRIVATE_SEARCH' => '',
				'REGISTERED_SEARCH' => '',
				'NONE_SEARCH' => $sSelected,
				));
	}

if($is_advanced)
{
	$oTpl->parse('show_search', 'show_search_block');
} else {
	$oTpl->parse('show_search', '');
}

    $oTpl->set_block('main_block', 'show_access_block','show_access');
//  Work-out which wbmailer routine should be checked
	$oTpl->set_var(array(
		'TEXT_WBMAILER_SMTP_AUTH_NOTICE' => $mLang->TEXT_REQUIRED.' '.$mLang->TEXT_WBMAILER_SMTP_AUTH,
		'SMTP_AUTH_SELECTED' => $checked,
		'TEXT_WBMAILER_DEFAULT_SETTINGS_NOTICE' => $mLang->TEXT_WBMAILER_DEFAULT_SETTINGS_NOTICE,
		'TEXT_WBMAILER_DEFAULT_SENDER_MAIL' => $mLang->TEXT_WBMAILER_DEFAULT_SENDER_MAIL,
		'TEXT_WBMAILER_DEFAULT_SENDER_NAME' => $mLang->TEXT_WBMAILER_DEFAULT_SENDER_NAME,
		'TEXT_WBMAILER_NOTICE' => $mLang->TEXT_WBMAILER_NOTICE,
		'TEXT_WBMAILER_FUNCTION' => $mLang->TEXT_WBMAILER_FUNCTION,
		'TEXT_WBMAILER_SMTP_HOST' => $mLang->TEXT_WBMAILER_SMTP_HOST,
		'TEXT_WBMAILER_PHP' => $mLang->TEXT_WBMAILER_PHP,
		'TEXT_WBMAILER_SMTP' => $mLang->TEXT_WBMAILER_SMTP,
		'TEXT_WBMAILER_SMTP_AUTH' => $mLang->TEXT_WBMAILER_SMTP_AUTH,
		'TEXT_WBMAILER_SMTP_USERNAME' => $mLang->TEXT_WBMAILER_SMTP_USERNAME,
		'TEXT_WBMAILER_SMTP_PASSWORD' => $mLang->TEXT_WBMAILER_SMTP_PASSWORD,
		));

	// Work-out if developer infos feature is enabled
	if(defined('DEV_INFOS') && DEV_INFOS == true)
	{
    	$oTpl->set_var(array(
				'DEV_INFOS_ENABLED' => $checked,
				'DEV_INFOS_DISABLED' => '',
				));
	} else {
    	$oTpl->set_var(array(
				'DEV_INFOS_DISABLED' => $checked,
				'DEV_INFOS_ENABLED' => '',
				));
	}

//  Work-out which server os should be checked
	if(OPERATING_SYSTEM == 'linux')
	{
		$oTpl->set_var('LINUX_SELECTED', $checked);
		$oTpl->set_var('WINDOWS_SELECTED', '');
	} elseif(OPERATING_SYSTEM == 'windows') {
		$oTpl->set_var('WINDOWS_SELECTED', $checked);
		$oTpl->set_var('LINUX_SELECTED', '');
	}

	if(WBMAILER_ROUTINE == 'phpmail')
	{
		$oTpl->set_var('PHPMAIL_SELECTED', $checked);
		$oTpl->set_var('SMTP_VISIBILITY', ' style="display: none;"');
//		$oTpl->set_var('SMTP_VISIBILITY_AUTH', '');
		$oTpl->set_var('SMTP_AUTH_SELECTED', '');
		$oTpl->set_var('SMTPMAIL_SELECTED',  '');
	} elseif(WBMAILER_ROUTINE == 'smtp')
	{
		$oTpl->set_var('SMTPMAIL_SELECTED', $checked);
		$oTpl->set_var('PHPMAIL_SELECTED', '');
		$oTpl->set_var('SMTP_VISIBILITY', '');
//		$oTpl->set_var('SMTP_VISIBILITY_AUTH', '');
	}
/* deprecated
	// Work-out if SMTP authentification should be checked
	if(WBMAILER_SMTP_AUTH)
	{
		$oTpl->set_var('SMTP_AUTH_SELECTED', $checked);
		if(WBMAILER_ROUTINE == 'smtp')
	    {
			$oTpl->set_var('SMTP_VISIBILITY_AUTH', '');

		} else {
			$oTpl->set_var('SMTP_VISIBILITY_AUTH', ' style="display: none;"');
		}
	} else {
		$oTpl->set_var('SMTP_VISIBILITY_AUTH', ' style="display: none;"');
	}
*/

	// Work-out if 777 permissions are set
	$oTpl->set_var('WORLD_WRITEABLE_SELECTED', '');
	if(STRING_FILE_MODE == '0777' AND STRING_DIR_MODE == '0777')
	{
		$oTpl->set_var('WORLD_WRITEABLE_SELECTED', $checked);
	}


	$oTpl->set_var(array(
		'FILE_U_R_CHECKED' => '',
		'FILE_U_W_CHECKED' => '',
		'FILE_U_E_CHECKED' => '',
		'FILE_G_R_CHECKED' => '',
		'FILE_G_W_CHECKED' => '',
		'FILE_G_E_CHECKED' => '',
		'FILE_O_R_CHECKED' => '',
		'FILE_O_W_CHECKED' => '',
		'FILE_O_E_CHECKED' => '',
		'DIR_U_R_CHECKED' => '',
		'DIR_U_W_CHECKED' => '',
		'DIR_U_E_CHECKED' => '',
		'DIR_G_R_CHECKED' => '',
		'DIR_G_W_CHECKED' => '',
		'DIR_G_E_CHECKED' => '',
		'DIR_O_R_CHECKED' => '',
		'DIR_O_W_CHECKED' => '',
		'DIR_O_E_CHECKED' => '',
		));

//  Work-out which file mode boxes are checked
	if(extract_permission(STRING_FILE_MODE, 'u', 'r'))
	{
		$oTpl->set_var('FILE_U_R_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'u', 'w'))
	{
		$oTpl->set_var('FILE_U_W_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'u', 'e'))
	{
		$oTpl->set_var('FILE_U_E_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'g', 'r'))
	{
		$oTpl->set_var('FILE_G_R_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'g', 'w'))
	{
		$oTpl->set_var('FILE_G_W_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'g', 'e'))
	{
		$oTpl->set_var('FILE_G_E_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'o', 'r'))
	{
		$oTpl->set_var('FILE_O_R_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'o', 'w'))
	{
		$oTpl->set_var('FILE_O_W_CHECKED', $checked);
	}
	if(extract_permission(STRING_FILE_MODE, 'o', 'e'))
	{
		$oTpl->set_var('FILE_O_E_CHECKED', $checked);
	}
	// Work-out which dir mode boxes are checked
	if(extract_permission(STRING_DIR_MODE, 'u', 'r'))
	{
		$oTpl->set_var('DIR_U_R_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'u', 'w'))
	{
		$oTpl->set_var('DIR_U_W_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'u', 'e'))
	{
		$oTpl->set_var('DIR_U_E_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'g', 'r'))
	{
		$oTpl->set_var('DIR_G_R_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'g', 'w'))
	{
		$oTpl->set_var('DIR_G_W_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'g', 'e'))
	{
		$oTpl->set_var('DIR_G_E_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'o', 'r'))
	{
		$oTpl->set_var('DIR_O_R_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'o', 'w'))
	{
		$oTpl->set_var('DIR_O_W_CHECKED', $checked);
	}
	if(extract_permission(STRING_DIR_MODE, 'o', 'e'))
	{
		$oTpl->set_var('DIR_O_E_CHECKED', $checked);
	}
	$sReadOnly = '';
	$sPagesEditType = 'text';
	if( $bPagesCanModify = ($database->get_one('SELECT COUNT(*) FROM `'.TABLE_PREFIX.'pages`'))!=0 ) {
		$sReadOnly = ' readonly="readonly"';
		$sPagesEditType = 'grey bold';
	}

	$oTpl->set_var(array(
		'PAGES_DIRECTORY' => PAGES_DIRECTORY,
		'PAGES_READONLY' => $sReadOnly,
		'PAGES_EDIT_TYPE' => $sPagesEditType,
		'PAGE_ICON_DIR'   => PAGE_ICON_DIR,
		'MEDIA_DIRECTORY' => MEDIA_DIRECTORY,
		'PAGE_EXTENSION' => PAGE_EXTENSION,
		'PAGE_SPACER' => PAGE_SPACER,
		'TABLE_PREFIX' => TABLE_PREFIX
	 ));

	// Insert Server Email value into template
	$oTpl->set_var('SERVER_EMAIL', SERVER_EMAIL);

// Insert language text and messages
	$oTpl->set_var(array(
		'TEXT_CHANGES' => $mLang->TEXT_CHANGES,
		'TEXT_FILES' => strtoupper(substr($mLang->TEXT_FILES, 0, 1)).substr($mLang->TEXT_FILES, 1),
		'TEXT_WARN_PAGE_LEAVE' => '',
		'TEXT_WORLD_WRITEABLE_FILE_PERMISSIONS' => $mLang->TEXT_WORLD_WRITEABLE_FILE_PERMISSIONS,
		'MODE_SWITCH_WARNING' => $mLang->MESSAGE_SETTINGS_MODE_SWITCH_WARNING,
		'WORLD_WRITEABLE_WARNING' => $mLang->MESSAGE_SETTINGS_WORLD_WRITEABLE_WARNING
		));

if($is_advanced && $admin->get_user_id()=='1')
{
	$oTpl->parse('show_access', 'show_access_block');
}else {
	$oTpl->parse('show_access' , '');
}

// Parse template objects output
$oTpl->parse('main', 'main_block',false);
$oTpl->pparse('output', 'page');
//$oTpl->p('page');
unset($oTpl);
$mLang->disableAddon();
$admin->print_footer();
