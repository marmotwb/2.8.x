<?php
/**
 *
 * @category        backend
 * @package         install
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version      	$Id$
 * @filesource		$HeadURL:  $
 * @lastmodified    $Date: $
 *
 */

$debug = true;

include(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php'); 
include(dirname(dirname(__FILE__)).'/framework/WbAutoloader.php');
WbAutoloader::doRegister(array('admin'=>'a', 'modules'=>'m'));

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
if(substr($wb_url, strlen($wb_url)-1, 1) == "/") {
	$wb_url = substr($wb_url, 0, strlen($wb_url)-1);
}
if(substr($wb_url, strlen($wb_url)-1, 1) == "\\") {
	$wb_url = substr($wb_url, 0, strlen($wb_url)-1);
}
if(substr($wb_url, strlen($wb_url)-1, 1) == "/") {
	$wb_url = substr($wb_url, 0, strlen($wb_url)-1);
}
if(substr($wb_url, strlen($wb_url)-1, 1) == "\\") {
	$wb_url = substr($wb_url, 0, strlen($wb_url)-1);
}
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
	$dir_mode = '0777';
} elseif(isset($_POST['world_writeable']) AND $_POST['world_writeable'] == 'true') {
	$file_mode = '0777';
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
if(!isset($_POST['database_password'])) {
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
$config_content = "" .
"<?php\n".
"\n".
"define('DEBUG', false);\n".
"define('DB_TYPE', 'mysql');\n".
"define('DB_HOST', '$database_host');\n".
"define('DB_NAME', '$database_name');\n".
"define('DB_USERNAME', '$database_username');\n".
"define('DB_PASSWORD', '$database_password');\n".
"define('TABLE_PREFIX', '$table_prefix');\n".
"\n".
"define('WB_URL', '$wb_url');\n".
"define('ADMIN_DIRECTORY', 'admin'); // no leading/trailing slash or backslash!! A simple directory only!!\n".
"\n".
"require_once(dirname(__FILE__).'/framework/initialize.php');\n";

$config_filename = '../config.php';
// Check if the file exists and is writable first.
if(file_exists($config_filename) AND is_writable($config_filename)) {
	if(!$handle = fopen($config_filename, 'w')) {
		set_error("Cannot open the configuration file ($config_filename)");
	} else {
		if (fwrite($handle, $config_content) === FALSE) {
			set_error("Cannot write to the configuration file ($config_filename)");
		}
		// Close file
		fclose($handle);
	}
} else {
	set_error("The configuration file $config_filename is not writable. Change its permissions so it is, then re-run step 4.");
}

// Define configuration vars
define('DEBUG', false);
define('DB_TYPE', 'mysql');
define('DB_HOST', $database_host);
define('DB_NAME', $database_name);
define('DB_USERNAME', $database_username);
define('DB_PASSWORD', $database_password);
define('TABLE_PREFIX', $table_prefix);
define('WB_PATH', dirname(dirname(__FILE__)));
define('WB_URL', $wb_url);
define('ADMIN_DIRECTORY', 'admin');
define('ADMIN_PATH', WB_PATH.'/'.ADMIN_DIRECTORY);
define('ADMIN_URL', $wb_url.'/'.ADMIN_DIRECTORY);

// Check if the user has entered a correct path
	if(!file_exists(WB_PATH.'/framework/class.admin.php')) {
		set_error('It appears the Absolute path that you entered is incorrect');
	}
	$sSqlUrl = DB_TYPE.'://'.DB_USERNAME.':'.DB_PASSWORD.'@'.DB_HOST.'/'.DB_NAME;
	$database = WbDatabase::getInstance();
	$database->doConnect($sSqlUrl);

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

	$settings_rows=	"INSERT INTO `".TABLE_PREFIX."settings` "
	." (setting_id, name, value) VALUES "
	." ( 1, 'wb_version', '".VERSION."'),"
	." ( 2, 'website_title', '$website_title'),"
	." ( 3, 'website_description', ''),"
	." ( 4, 'website_keywords', ''),"
	." ( 5, 'website_header', ''),"
	." ( 6, 'website_footer', ''),"
	." ( 7, 'wysiwyg_style', 'font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;'),"
	." ( 8, 'rename_files_on_upload', 'ph.*?,cgi,pl,pm,exe,com,bat,pif,cmd,src,asp,aspx,js,txt'),"
	." ( 9, 'er_level', '0'),"
	." (10, 'default_language', '$default_language'),"
	." (11, 'app_name', 'wb_$session_rand'),"
	." (12, 'sec_anchor', 'section_'),"
	." (13, 'default_timezone', '$default_timezone'),"
	." (14, 'default_date_format', 'Y-m-d'),"
	." (15, 'default_time_format', 'h:i A'),"
	." (16, 'redirect_timer', '1500'),"
	." (17, 'home_folders', 'true'),"
	." (18, 'warn_page_leave', '1'),"
	." (19, 'default_template', 'round'),"
	." (20, 'default_theme', 'wb_theme'),"
	." (21, 'default_charset', 'utf-8'),"
	." (22, 'multiple_menus', 'true'),"
	." (23, 'page_level_limit', '6'),"
	." (24, 'intro_page', 'false'),"
	." (25, 'page_trash', 'inline'),"
	." (26, 'homepage_redirection', 'false'),"
	." (27, 'page_languages', 'true'),"
	." (28, 'wysiwyg_editor', 'fckeditor'),"
	." (29, 'manage_sections', 'true'),"
	." (30, 'section_blocks', 'false'),"
	." (31, 'smart_login', 'false'),"
	." (32, 'frontend_login', 'false'),"
	." (33, 'frontend_signup', 'false'),"
	." (34, 'search', 'public'),"
	." (35, 'page_extension', '.php'),"
	." (36, 'page_spacer', '-'),"
	." (37, 'pages_directory', '/pages'),"
	." (38, 'rename_files_on_upload', 'ph.*?,cgi,pl,pm,exe,com,bat,pif,cmd,src,asp,aspx,js,txt'),"
	." (39, 'media_directory', '/media'),"
	." (40, 'operating_system', '$operating_system'),"
	." (41, 'string_file_mode', '$file_mode'),"
	." (42, 'string_dir_mode', '$dir_mode'),"
	." (43, 'wbmailer_routine', 'phpmail'),"
	." (44, 'server_email', '$admin_email'),"
	." (45, 'wbmailer_default_sendername', 'WebsiteBaker Mailer'),"
	." (46, 'wbmailer_smtp_host', ''),"
	." (47, 'wbmailer_smtp_auth', ''),"
	." (48, 'wbmailer_smtp_username', ''),"
	." (49, 'wbmailer_smtp_password', ''),"
	." (50, 'fingerprint_with_ip_octets', '2'),"
	." (51, 'secure_form_module', ''),"
	." (52, 'mediasettings', ''),"
	." (53, 'wb_revision', '".REVISION."'),"
 	." (54, 'wb_sp', '".SP."'),"
	." (55, 'page_icon_dir', '/templates/*/title_images'),"
	." (56, 'dev_infos', 'false'),"
	." (57, 'groups_updated', '".time()."'),"
	." (58, 'wbmail_signature', ''),"
	." (59, 'confirmed_registration', '1'),"
	." (60, 'page_extendet', 'true'),"
	." (62, 'system_locked', '0')";
	if(!$database->query($settings_rows)) { set_error($database->get_error()); }

	// Admin group
	$full_system_permissions  = 'access,addons,admintools,admintools_view,groups,groups_add,groups_delete,groups_modify,groups_view,';
	$full_system_permissions .= 'languages,languages_install,languages_uninstall,languages_view,media,media_create,media_delete,media_rename,media_upload,media_view,';
	$full_system_permissions .= 'modules,modules_advanced,modules_install,modules_uninstall,modules_view,pages,pages_add,pages_add_l0,pages_delete,pages_intro,pages_modify,pages_settings,pages_view,';
	$full_system_permissions .= 'preferences,preferences_view,settings,settings_advanced,settings_basic,settings_view,templates,templates_install,templates_uninstall,templates_view,users,users_add,users_delete,users_modify,users_view';
	$insert_admin_group = "INSERT INTO `".TABLE_PREFIX."groups` VALUES ('1', 'Administrators', '$full_system_permissions', '', '')";
	if(!$database->query($insert_admin_group)) { set_error($database->get_error()); }

// Admin user
	$insert_admin_user = "INSERT INTO `".TABLE_PREFIX."users` VALUES (1, 1, '1', 1, '$admin_username', '".md5($admin_password)."', '', 0, '', 0, 'Administrator', '$admin_email', $default_timezone, '', '', '$default_language', '', 0, '');";
	if(!$database->query($insert_admin_user)) { set_error($database->get_error()); }

// Search layout default data
	$sSqlFileName = dirname(__FILE__).'/sql/wb_search_data.sql';
	if(!$database->SqlImport($sSqlFileName,TABLE_PREFIX, false)) { set_error($database->get_error()); }

	require_once(WB_PATH.'/framework/initialize.php');
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
