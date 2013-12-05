<?php
/**
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS HEADER.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * save.php
 * 
 * @category     Core
 * @package      Core_Environment
 * @subpackage   Installer
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websitebaker.org>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.2
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 2012-04-01
 * @description  xyz
 */

$debug = true;
if(!defined('DEBUG')) { define('DEBUG', true); }

include(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php'); 
include(dirname(dirname(__FILE__)).'/framework/WbAutoloader.php');
WbAutoloader::doRegister(array('admin'=>'a', 'modules'=>'m'));

function errorLogs($error_str)
{
	$log_error = true;
	if ( ! function_exists('error_log') ) { $log_error = false; }
	$log_file = @ini_get('error_log');
	if ( !empty($log_file) && ('syslog' != $log_file) && !@is_writable($log_file) ) {
		$log_error = false;
	}
	if ( $log_error ) {@error_log($error_str, 0);}
}

/**
 * Read DB settings from configuration file
 * @return string
 * @throws RuntimeException
 * 
 */
	function _readConfiguration($sRetvalType = 'url') {
		// check for valid file request. Becomes more stronger in next version
		$x = debug_backtrace();
		$bValidRequest = false;
		if(sizeof($x) != 0) {
			foreach($x as $aStep) {
				// define the scripts which can read the configuration
				if(preg_match('/(save.php|index.php|config.php|upgrade-script.php)$/si', $aStep['file'])) {
					$bValidRequest = true;
					break;
				}
			}
		}else {
			$bValidRequest = true;
		}
		if(!$bValidRequest) {
			throw new RuntimeException('illegal function request!'); 
		}
		$aRetval = array();
		$sSetupFile = dirname(dirname(__FILE__)).'/setup.ini.php';
		if(is_readable($sSetupFile)) {
			$aCfg = parse_ini_file($sSetupFile, true);
			foreach($aCfg['Constants'] as $key=>$value) {
				switch($key):
					case 'DEBUG':
						$value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
						break;
					case 'WB_URL':
					case 'AppUrl':
						$value = trim(str_replace('\\', '/', $value), '/'); 
						if(!defined('WB_URL')) { define('WB_URL', $value); }
						break;
					case 'ADMIN_DIRECTORY':
					case 'AcpDir':
						$value = trim(str_replace('\\', '/', $value), '/'); 
						if(!defined('ADMIN_DIRECTORY')) { define('ADMIN_DIRECTORY', $value); }
						break;
					default:
						if(!defined($key)) { define($key, $value); }
						break;
				endswitch;
			}
			$db = $aCfg['DataBase'];
			$db['type'] = isset($db['type']) ? $db['type'] : 'mysql';
			$db['user'] = isset($db['user']) ? $db['user'] : 'foo';
			$db['pass'] = isset($db['pass']) ? $db['pass'] : 'bar';
			$db['host'] = isset($db['host']) ? $db['host'] : 'localhost';
			$db['port'] = isset($db['port']) ? $db['port'] : '3306';
			$db['port'] = ($db['port'] != '3306') ? $db['port'] : '';
			$db['name'] = isset($db['name']) ? $db['name'] : 'dummy';
			$db['charset'] = isset($db['charset']) ? $db['charset'] : 'utf8';
			$db['table_prefix'] = (isset($db['table_prefix']) ? $db['table_prefix'] : '');
			if(!defined('TABLE_PREFIX')) {define('TABLE_PREFIX', $db['table_prefix']);}
			if($sRetvalType == 'dsn') {
				$aRetval[0] = $db['type'].':dbname='.$db['name'].';host='.$db['host'].';'
				            . ($db['port'] != '' ? 'port='.(int)$db['port'].';' : '');
				$aRetval[1] = array('CHARSET' => $db['charset'], 'TABLE_PREFIX' => $db['table_prefix']);
				$aRetval[2] = array( 'user' => $db['user'], 'pass' => $db['pass']);
			}else { // $sRetvalType == 'url'
				$aRetval[0] = $db['type'].'://'.$db['user'].':'.$db['pass'].'@'
				            . $db['host'].($db['port'] != '' ? ':'.$db['port'] : '').'/'.$db['name']
				            . '?Charset='.$db['charset'].'&TablePrefix='.$db['table_prefix'];
			}
			unset($db, $aCfg);
			return $aRetval;
		}
		throw new RuntimeException('unable to read setup.ini.php');
	}

if (true === $debug) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}
// Start a session
if(!defined('SESSION_STARTED')) {
	session_name('wb_session_id');
	session_start();
	define('SESSION_STARTED', true);
}
// get random-part for session_name()
list($usec,$sec) = explode(' ',microtime());
srand((float)$sec+((float)$usec*100000));
$session_rand = rand(1000,9999);

// Function to set error
function set_error($message, $field_name = '') {
	global $_POST;
	if(isset($message) AND $message != '') {
		// Copy values entered into session so user doesn't have to re-enter everything
		if(isset($_POST['website_title'])) {
			$_SESSION['website_title'] = $_POST['website_title'];
			$_SESSION['default_timezone'] = $_POST['default_timezone'];
			$_SESSION['default_language'] = $_POST['default_language'];
			if(!isset($_POST['operating_system'])) {
				$_SESSION['operating_system'] = 'linux';
			} else {
				$_SESSION['operating_system'] = $_POST['operating_system'];
			}
			if(!isset($_POST['world_writeable'])) {
				$_SESSION['world_writeable'] = false;
			} else {
				$_SESSION['world_writeable'] = true;
			}
			$_SESSION['database_host'] = $_POST['database_host'];
			$_SESSION['database_username'] = $_POST['database_username'];
			$_SESSION['database_password'] = '';
			$_SESSION['database_name'] = $_POST['database_name'];
			$_SESSION['table_prefix'] = $_POST['table_prefix'];
			if(!isset($_POST['install_tables'])) {
				$_SESSION['install_tables'] = true;
			} else {
				$_SESSION['install_tables'] = true;
			}
			$_SESSION['website_title'] = $_POST['website_title'];
			$_SESSION['admin_username'] = $_POST['admin_username'];
			$_SESSION['admin_email'] = $_POST['admin_email'];
			$_SESSION['admin_password'] = '';
			$_SESSION['admin_repassword'] = '';
		}
		// Set the message
		$_SESSION['message'] = $message;
		// Set the element(s) to highlight
		if($field_name != '') {
			$_SESSION['ERROR_FIELD'] = $field_name;
		}
		// Specify that session support is enabled
		$_SESSION['session_support'] = '<font class="good">Enabled</font>';
		// Redirect to first page again and exit
		header('Location: index.php?sessions_checked=true');
		exit();
	}
}
/* */

// Function to workout what the default permissions are for files created by the webserver
function default_file_mode($temp_dir) {
	$v = explode(".",PHP_VERSION);
	$v = $v[0].$v[1];
	if($v > 41 AND is_writable($temp_dir)) {
		$filename = $temp_dir.'/test_permissions.txt';
		$handle = fopen($filename, 'w');
		fwrite($handle, 'This file is to get the default file permissions');
		fclose($handle);
		$default_file_mode = '0'.substr(sprintf('%o', fileperms($filename)), -3);
		unlink($filename);
	} else {
		$default_file_mode = '0666';
	}
	return $default_file_mode;
}

// Function to workout what the default permissions are for directories created by the webserver
function default_dir_mode($temp_dir) {
	$v = explode(".",PHP_VERSION);
	$v = $v[0].$v[1];
	if($v > 41 AND is_writable($temp_dir)) {
		$dirname = $temp_dir.'/test_permissions/';
		mkdir($dirname);
		$default_dir_mode = '0'.substr(sprintf('%o', fileperms($dirname)), -3);
		rmdir($dirname);
	} else {
		$default_dir_mode = '0777';
	}
	return $default_dir_mode;
}

function add_slashes($input) {
	if ( get_magic_quotes_gpc() || ( !is_string($input) ) ) {
		return $input;
	}
	$output = addslashes($input);
	return $output;
}

// Begin check to see if form was even submitted
// Set error if no post vars found
if(!isset($_POST['website_title'])) {
	set_error('Please fill-in the wesite title below');
}
// End check to see if form was even submitted

// Begin path and timezone details code

// Check if user has entered the installation url
if(!isset($_POST['wb_url']) OR $_POST['wb_url'] == '') {
	set_error('Please enter an absolute URL', 'wb_url');
} else {
	$wb_url = $_POST['wb_url'];
}
// Remove any slashes at the end of the URL
$wb_url = trim(str_replace('\\', '/', $wb_url), '/').'/';
// Get the default time zone
if(!isset($_POST['default_timezone']) OR !is_numeric($_POST['default_timezone'])) {
	set_error('Please select a valid default timezone', 'default_timezone');
} else {
	$default_timezone = $_POST['default_timezone']*60*60;
}
// End path and timezone details code

// Get the default language
$allowed_languages = array('BG','CA', 'CS', 'DA', 'DE', 'EN', 'ES', 'ET', 'FI', 'FR', 'HR', 'HU', 'IT', 'LV', 'NL', 'NO', 'PL', 'PT', 'RU','SE','SK','TR');
if(!isset($_POST['default_language']) OR !in_array($_POST['default_language'], $allowed_languages)) {
	set_error('Please select a valid default backend language','default_language');
} else {
	$default_language = $_POST['default_language'];
	// make sure the selected language file exists in the language folder
	if(!file_exists('../languages/' .$default_language .'.php')) {
		set_error('The language file: \'' .$default_language .'.php\' is missing. Upload file to language folder or choose another language','default_language');
	}
}
// End default language details code

// Begin operating system specific code
// Get operating system
if(!isset($_POST['operating_system']) OR $_POST['operating_system'] != 'linux' AND $_POST['operating_system'] != 'windows') {
	set_error('Please select a valid operating system');
} else {
	$operating_system = $_POST['operating_system'];
}
// Work-out file permissions
if($operating_system == 'windows') {
	$file_mode = '0777';
	$dir_mode = '0666';
} elseif(isset($_POST['world_writeable']) AND $_POST['world_writeable'] == 'true') {
	$file_mode = '0666';
	$dir_mode = '0777';
} else {
	$file_mode = default_file_mode('../temp');
	$dir_mode = default_dir_mode('../temp');
}
// End operating system specific code

// Begin database details code
// Check if user has entered a database host
if(!isset($_POST['database_host']) OR $_POST['database_host'] == '') {
	set_error('Please enter a database host name', 'database_host');
} else {
	$database_host = $_POST['database_host'];
 }
// Check if user has entered a database name
if(!isset($_POST['database_name']) OR $_POST['database_name'] == '') {
	set_error('Please enter a database name', 'database_name');
} else {
	// make sure only allowed characters are specified
	if(!preg_match('/^[a-z0-9_-]*$/i', $_POST['database_name'])) {
		// contains invalid characters (only a-z, A-Z, 0-9 and _ allowed to avoid problems with table/field names)
		set_error('Only characters a-z, A-Z, 0-9, - and _ allowed in database name.', 'database_name');
	}
	$database_name = $_POST['database_name'];
}
// Get table prefix
if(!preg_match('/^[a-z0-9_]*$/i', $_POST['table_prefix'])) {
	// contains invalid characters (only a-z, A-Z, 0-9 and _ allowed to avoid problems with table/field names)
	set_error('Only characters a-z, A-Z, 0-9 and _ allowed in table_prefix.', 'table_prefix');
} else {
	$table_prefix = $_POST['table_prefix'];
}

// Check if user has entered a database username
if(!isset($_POST['database_username']) OR $_POST['database_username'] == '') {
	set_error('Please enter a database username','database_username');
} else {
	$database_username = $_POST['database_username'];
}
// Check if user has entered a database password
if(!isset($_POST['database_password'])&& ($_POST['database_password']==='') ) {
	set_error('Please enter a database password', 'database_password');
} else {
	$database_password = $_POST['database_password'];
}

// Find out if the user wants to install tables and data
$install_tables = ((isset($_POST['install_tables']) AND $_POST['install_tables'] == 'true'));
// End database details code

// Begin website title code
// Get website title
if(!isset($_POST['website_title']) OR $_POST['website_title'] == '') {
	set_error('Please enter a website title', 'website_title');
} else {
	$website_title = add_slashes($_POST['website_title']);
}
// End website title code

// Begin admin user details code
// Get admin username
if(!isset($_POST['admin_username']) OR $_POST['admin_username'] == '') {
	set_error('Please enter a username for the Administrator account','admin_username');
} else {
	$admin_username = $_POST['admin_username'];
}
// Get admin email and validate it
if(!isset($_POST['admin_email']) OR $_POST['admin_email'] == '') {
	set_error('Please enter an email for the Administrator account','admin_email');
} else {
	if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i', $_POST['admin_email'])) {
		$admin_email = $_POST['admin_email'];
	} else {
		set_error('Please enter a valid email address for the Administrator account','admin_email');
	}
}
// Get the two admin passwords entered, and check that they match
if(!isset($_POST['admin_password']) OR $_POST['admin_password'] == '') {
	set_error('Please enter a password for the Administrator account','admin_password');
} else {
	$admin_password = $_POST['admin_password'];
}
if(!isset($_POST['admin_repassword']) OR $_POST['admin_repassword'] == '') {
	set_error('Please make sure you re-enter the password for the Administrator account','admin_repassword');
} else {
	$admin_repassword = $_POST['admin_repassword'];
}
if($admin_password != $admin_repassword) {
	set_error('Sorry, the two Administrator account passwords you entered do not match','admin_repassword');
}
// End admin user details code

// Try and write settings to config file
$sConfigContent = 
 ";<?php die('sorry, illegal file access'); ?>#####\n"
.";################################################\n"
."; WebsiteBaker configuration file\n"
."; auto generated ".date('Y-m-d h:i:s A e ')."\n"
.";################################################\n"
."[Constants]\n"
."DEBUG   = false\n"
."AppUrl  = \"".$wb_url."\"\n"
."AcpDir  = \"admin/\"\n"
.";##########\n"
."[DataBase]\n"
."type    = \"mysql\"\n"
."user    = \"".$database_username."\"\n"
."pass    = \"".$database_password."\"\n"
."host    = \"".$database_host."\"\n"
."port    = \"3306\"\n"
."name    = \"".$database_name."\"\n"
."charset = \"utf8\"\n"
."table_prefix = \"".$table_prefix."\"\n"
.";\n"
.";################################################\n";
$sConfigFile = realpath('../setup.ini.php');
$sConfigName = basename($sConfigFile);
// Check if the file exists and is writable first.
if(file_exists($sConfigFile) && is_writable($sConfigFile)) {
	if(!$handle = fopen($sConfigFile, 'w')) {
		set_error("Cannot open the configuration file ($sConfigName)");
	} else {
		if (fwrite($handle, $sConfigContent) === FALSE) {
			set_error("Cannot write to the configuration file ($sConfigName)");
		}
		// Close file
		fclose($handle);
	}
} else {
	set_error("The configuration file $sConfigName is not writable. Change its permissions so it is, then re-run step 4.");
}

//_SetInstallPathConstants();
if(!defined('WB_INSTALL_PROCESS')){ define('WB_INSTALL_PROCESS', true ); }
if(!defined('WB_URL')){ define('WB_URL', trim( $wb_url,'/' )); }
if(!defined('WB_PATH')){ define('WB_PATH', dirname(dirname(__FILE__))); }
if(!defined('ADMIN_URL')){ define('ADMIN_URL', WB_URL.'/admin'); }
if(!defined('ADMIN_PATH')){ define('ADMIN_PATH', WB_PATH.'/admin'); }
// load db configuration ---
$sDbConnectType = 'url'; // depending from class WbDatabase it can be 'url' or 'dsn'
$aSqlData = _readConfiguration($sDbConnectType);

if(!file_exists(WB_PATH.'/framework/class.admin.php')) {
	set_error('It appears the Absolute path that you entered is incorrect');
}

$database = WbDatabase::getInstance();
try{
	if($sDbConnectType == 'dsn') {
		$bTmp = @$database->doConnect($aSqlData[0], $aSqlData[1]['user'], $aSqlData[1]['pass'], $aSqlData[2]);
	}else {
		$bTmp = @$database->doConnect($aSqlData[0], TABLE_PREFIX);
	}
} catch (WbDatabaseException $e) {
	if(!file_put_contents($sConfigFile,"<?php\n")) {
		set_error("Cannot write to the configuration file ($sSetupFile)");
	}
	set_error($e->getMessage()); 
}

unset($aSqlData);
// write the config.php
$sConfigContent = "<?php\n"
    ."/* this file is for backward compatibility only */\n"
    ."/* never put any code in this file! */\n"
    ."include_once(dirname(__FILE__).'/framework/initialize.php');\n";
$sSetupFile = WB_PATH.'/config.php';
if(!file_put_contents($sSetupFile,$sConfigContent)) {
	set_error("Cannot write to the configuration file ($sSetupFile)");
}
$sSecMod = (defined('SECURE_FORM_MODULE') && SECURE_FORM_MODULE != '') ? '.'.SECURE_FORM_MODULE : '';
$sSecMod = WB_PATH.'/framework/SecureForm'.$sSecMod.'.php';
require_once($sSecMod);
require_once(WB_PATH.'/framework/class.admin.php');

// Dummy class to allow modules' install scripts to call $admin->print_error
	class admin_dummy extends admin
	{
		var $error='';
		function print_error($message, $link = 'index.php', $auto_footer = true)
		{
			$this->error=$message;
		}
	}

//  core tables only structure
	$sSqlFileName = dirname(__FILE__).'/sql/websitebaker.sql';
	if(!$database->SqlImport($sSqlFileName,TABLE_PREFIX, false)) { set_error($database->get_error()); }

	require(ADMIN_PATH.'/interface/version.php');

	$sql = 'INSERT INTO `'.TABLE_PREFIX.'settings` (`name`, `value`) VALUES '
	     . '(\'wb_version\', \''.VERSION.'\'), '
	     . '(\'website_title\', \''.$website_title.'\'), '
	     . '(\'website_description\', \'\'), '
	     . '(\'website_keywords\', \'\'), '
	     . '(\'website_header\', \'\'), '
	     . '(\'website_footer\', \'\'), '
	     . '(\'wysiwyg_style\', \'font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;\'), '
	     . '(\'er_level\', \'0\'), '
	     . '(\'default_language\', \''.$default_language.'\'), '
	     . '(\'app_name\', \'wb_'.$session_rand.'\'), '
	     . '(\'sec_anchor\', \'Sec\'), '
	     . '(\'server_timezone\', \'UTC\'), '
	     . '(\'default_timezone\', \''.$default_timezone.'\'), '
	     . '(\'default_date_format\', \'Y-m-d\'), '
	     . '(\'default_time_format\', \'h:i A\'), '
	     . '(\'redirect_timer\', \'1500\'), '
	     . '(\'home_folders\', \'true\'), '
	     . '(\'warn_page_leave\', \'1\'), '
	     . '(\'default_template\', \'round\'), '
	     . '(\'default_theme\', \'wb_theme\'), '
	     . '(\'default_charset\', \'utf-8\'), '
	     . '(\'multiple_menus\', \'true\'), '
	     . '(\'page_level_limit\', \'6\'), '
	     . '(\'intro_page\', \'false\'), '
	     . '(\'page_trash\', \'inline\'), '
	     . '(\'homepage_redirection\', \'false\'), '
	     . '(\'page_languages\', \'true\'), '
	     . '(\'wysiwyg_editor\', \'fckeditor\'), '
	     . '(\'manage_sections\', \'true\'), '
	     . '(\'section_blocks\', \'false\'), '
	     . '(\'smart_login\', \'false\'), '
	     . '(\'frontend_login\', \'false\'), '
	     . '(\'frontend_signup\', \'false\'), '
	     . '(\'search\', \'public\'), '
	     . '(\'page_extension\', \'.php\'), '
	     . '(\'page_spacer\', \'-\'), '
	     . '(\'pages_directory\', \'/pages\'), '
	     . '(\'rename_files_on_upload\', \'ph.*?,cgi,pl,pm,exe,com,bat,pif,cmd,src,asp,aspx,js,txt\'), '
	     . '(\'media_directory\', \'/media\'), '
	     . '(\'operating_system\', \''.$operating_system.'\'), '
	     . '(\'string_file_mode\', \''.$file_mode.'\'), '
	     . '(\'string_dir_mode\', \''.$dir_mode.'\'), '
	     . '(\'wbmailer_routine\', \'phpmail\'), '
	     . '(\'server_email\', \''.$admin_email.'\'), '
	     . '(\'wbmailer_default_sendername\', \'WebsiteBaker Mailer\'), '
	     . '(\'wbmailer_smtp_host\', \'\'), '
	     . '(\'wbmailer_smtp_auth\', \'\'), '
	     . '(\'wbmailer_smtp_username\', \'\'), '
	     . '(\'wbmailer_smtp_password\', \'\'), '
	     . '(\'fingerprint_with_ip_octets\', \'2\'), '
	     . '(\'secure_form_module\', \'\'), '
	     . '(\'mediasettings\', \'\'), '
	     . '(\'wb_revision\', \''.REVISION.'\'), '
 	     . '(\'wb_sp\', \''.SP.'\'), '
	     . '(\'page_icon_dir\', \'/templates/*/title_images\'), '
	     . '(\'dev_infos\', \'false\'), '
	     . '(\'groups_updated\', \''.time().'\'), '
	     . '(\'wbmail_signature\', \'\'), '
	     . '(\'confirmed_registration\', \'1\'), '
	     . '(\'page_extendet\', \'true\'), '
	     . '(\'system_locked\', \'0\'), '
	     . '(\'password_crypt_loops\', \'12\'), '
	     . '(\'password_hash_type\', \'false\'), '
	     . '(\'password_length\', \'10\'), '
		 . '(\'password_use_types\', \''.(int)0xFFFF.'\') '
	     . '';
	if(!$database->query($sql)) { set_error($database->get_error()); }

	// Admin group
	$full_system_permissions  = 'access,addons,admintools,admintools_view,groups,groups_add,groups_delete,'
	                          . 'groups_modify,groups_view,languages,languages_install,languages_uninstall,'
	                          . 'languages_view,media,media_create,media_delete,media_rename,media_upload,'
	                          . 'media_view,modules,modules_advanced,modules_install,modules_uninstall,'
	                          . 'modules_view,pages,pages_add,pages_add_l0,pages_delete,pages_intro,'
	                          . 'pages_modify,pages_settings,pages_view,preferences,preferences_view,'
	                          . 'settings,settings_advanced,settings_basic,settings_view,templates,'
	                          . 'templates_install,templates_uninstall,templates_view,users,users_add,'
	                          . 'users_delete,users_modify,users_view';
	$sql = 'INSERT INTO `'.TABLE_PREFIX.'groups` '
	     . 'SET `group_id` =1,'
	     .     '`name`=\'Administrators\','
		 .     '`system_permissions`=\''.$full_system_permissions.'\','
		 .     '`module_permissions`=\'\','
		 .     '`template_permissions`=\'\'';
	if(!$database->query($sql)) { set_error($database->get_error()); }

// Admin user
	$insert_admin_user = "INSERT INTO `".TABLE_PREFIX."users` VALUES (1, 1, '1', 1, '$admin_username', '".md5($admin_password)."', '', 0, '', 0, 'Administrator', '$admin_email', $default_timezone, '', '', '$default_language', '', 0, '');";
	if(!$database->query($insert_admin_user)) { set_error($database->get_error()); }

// Search layout default data
	$sSqlFileName = dirname(__FILE__).'/sql/wb_search_data.sql';
	if(!$database->SqlImport($sSqlFileName,TABLE_PREFIX, false)) { set_error($database->get_error()); }

	require_once(WB_PATH.'/framework/initialize.php');
// 
// Include WB functions file
	require_once(WB_PATH.'/framework/functions.php');
// Re-connect to the database, this time using in-build database class
	require_once(WB_PATH.'/framework/class.login.php');
	// Include the PclZip class file (thanks to
	require_once(WB_PATH.'/include/pclzip/pclzip.lib.php');
	// Install add-ons
	if(file_exists(WB_PATH.'/install/modules')) {
		// Unpack pre-packaged modules
	}
	if(file_exists(WB_PATH.'/install/templates')) {
		// Unpack pre-packaged templates
	}
	if(file_exists(WB_PATH.'/install/languages')) {
		// Unpack pre-packaged languages
	}

	$admin=new admin_dummy('Start','',false,false);
	// Load addons into DB
	$dirs['modules'] = WB_PATH.'/modules/';
	$dirs['templates'] = WB_PATH.'/templates/';
	$dirs['languages'] = WB_PATH.'/languages/';

	foreach($dirs AS $type => $dir) {
		if(($handle = opendir($dir))) {
			while(false !== ($file = readdir($handle))) {
				if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'admin.php' AND $file != 'index.php') {
					// Get addon type
					if($type == 'modules') {
						load_module($dir.'/'.$file, true);
						// Pretty ugly hack to let modules run $admin->set_error
						// See dummy class definition admin_dummy above
						if ($admin->error!='') {
							set_error($admin->error);
						}
					} elseif($type == 'templates') {
						load_template($dir.'/'.$file);
					} elseif($type == 'languages') {
						load_language($dir.'/'.$file);
					}
				}
			}
			closedir($handle);
		}
	}

// Check if there was a database error
	if($database->is_error()) {
		set_error($database->get_error());
	}

	if ( sizeof(createFolderProtectFile( WB_PATH.MEDIA_DIRECTORY )) ) {  }
	if ( sizeof(createFolderProtectFile( WB_PATH.MEDIA_DIRECTORY.'/home' )) ) {  }
	if ( sizeof(createFolderProtectFile( WB_PATH.PAGES_DIRECTORY )) ) {  }

// end of if install_tables

$ThemeUrl = WB_URL.$admin->correct_theme_source('warning.html');
// Setup template object, parse vars to it, then parse it
$ThemePath = realpath(WB_PATH.$admin->correct_theme_source('loginBox.htt'));

// Log the user in and go to Website Baker Administration
$thisApp = new Login(
	array(
			"MAX_ATTEMPS" => "50",
			"WARNING_URL" => $ThemeUrl."/warning.html",
			"USERNAME_FIELDNAME" => 'admin_username',
			"PASSWORD_FIELDNAME" => 'admin_password',
			"REMEMBER_ME_OPTION" => SMART_LOGIN,
			"MIN_USERNAME_LEN" => "2",
			"MIN_PASSWORD_LEN" => "3",
			"MAX_USERNAME_LEN" => "30",
			"MAX_PASSWORD_LEN" => "30",
			'LOGIN_URL' => ADMIN_URL."/login/index.php",
			'DEFAULT_URL' => ADMIN_URL."/start/index.php",
			'TEMPLATE_DIR' => $ThemePath,
			'TEMPLATE_FILE' => 'loginBox.htt',
			'FRONTEND' => false,
			'FORGOTTEN_DETAILS_APP' => ADMIN_URL."/login/forgot/index.php",
			'USERS_TABLE' => TABLE_PREFIX."users",
			'GROUPS_TABLE' => TABLE_PREFIX."groups",
	)
);
