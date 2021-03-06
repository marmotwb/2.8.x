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

include(dirname(__DIR__).'/framework/globalExceptionHandler.php');
include(dirname(__DIR__).'/framework/WbAutoloader.php');
WbAutoloader::doRegister(array('admin'=>'a', 'modules'=>'m', 'templates'=>'t', 'include'=>'i'));
include(__DIR__.'/InstallHelper.php');
// register PHPMailer autoloader ---
if (!function_exists('PHPMailerAutoload')) {
    require(dirname(__DIR__).'/include/phpmailer/PHPMailerAutoload.php');
}

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
$sLanguageDirectory = dirname(__DIR__).'/languages/';
$allowed_languages = InstallHelper::getAvailableLanguages($sLanguageDirectory);
if (
    !isset($_POST['default_language']) ||
    !array_key_exists($_POST['default_language'], $allowed_languages)
) {
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
    if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $_POST['admin_email'])) {
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
if (mb_strlen($admin_password) < 6) {
    set_error('Sorry, the password must have 6 chars at last','admin_password');
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
."socket  = \"\"\n"
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
require(ADMIN_PATH.'/interface/version.php');

/*****************************
Begin Create Database Tables
*****************************/
$oSqlInst = new SqlImport($database, __DIR__.'/sql/install-struct.sql');
if ($oSqlInst) {
    if (!$oSqlInst->doImport('install')) {
        set_error($oSqlInst->getError());
    }
}
$oSqlInst = new SqlImport($database, __DIR__.'/sql/install-data.sql');
if ($oSqlInst) {
    if (!$oSqlInst->doImport('install')) {
        set_error($oSqlInst->getError());
    }
}
unset($oSqlInst);
$sql = // additional settings from install input
       'REPLACE INTO `'.TABLE_PREFIX.'settings` (`name`, `value`) VALUES '
     .        '(\'wb_version\', \''.VERSION.'\'), '
     .        '(\'website_title\', \''.$website_title.'\'), '
     .        '(\'default_language\', \''.$default_language.'\'), '
     .        '(\'app_name\', \'wb_'.$session_rand.'\'), '
     .        '(\'default_timezone\', \''.$default_timezone.'\'), '
     .        '(\'operating_system\', \''.$operating_system.'\'), '
     .        '(\'string_file_mode\', \''.$file_mode.'\'), '
     .        '(\'string_dir_mode\', \''.$dir_mode.'\'), '
     .        '(\'server_email\', \''.$admin_email.'\'), '
     .        '(\'wb_revision\', \''.REVISION.'\'), '
     .        '(\'wb_sp\', \''.SP.'\'), '
     .        '(\'groups_updated\', \''.time().'\')';
if (! ($database->query($sql))) {
    set_error('unable to write \'install presets\' into table \'settings\'');
}
$sql = // add the Admin user
     'INSERT INTO `'.TABLE_PREFIX.'users` '
    .'SET `user_id`=1, '
    .    '`group_id`=1, '
    .    '`groups_id`=\'1\', '
    .    '`active`=\'1\', '
    .    '`username`=\''.$admin_username.'\', '
    .    '`password`=\''.md5($admin_password).'\', '
    .    '`email`=\''.$admin_email.'\', '
    .    '`timezone`=\''.$default_timezone.'\', '
    .    '`language`=\''.$default_language.'\', '
    .    '`display_name`=\'Administrator\'';
if (! ($database->query($sql))) {
    set_error('unable to write Administrator account into table \'users\'');
}
/**********************
END OF TABLES IMPORT
**********************/
// initialize the system
require_once(WB_PATH.'/framework/initialize.php');
require_once(WB_PATH.'/framework/class.admin.php');
/***********************
// Dummy class to allow modules' install scripts to call $admin->print_error
***********************/
class admin_dummy extends admin
{
    public $error='';
    public function print_error($message, $link = 'index.php', $auto_footer = true)
    {
        $this->error=$message;
    }
}
// Include WB functions file
    require_once(WB_PATH.'/framework/functions.php');
// Re-connect to the database, this time using in-build database class
//  require_once(WB_PATH.'/framework/class.login.php');
    // Include the PclZip class file (thanks to
    require_once(WB_PATH.'/include/pclzip/pclzip.lib.php');
    // Install add-ons
    $admin=new admin_dummy('Start','',false,false);
// Load addons and templates into DB
    $aScanDirs = array(
        'module'   => dirname(__DIR__).'/modules/',
        'template' => dirname(__DIR__).'/templates/',
        'language' => dirname(__DIR__).'/languages/'
    );
    foreach ($aScanDirs as $sType => $sPath) {
        $sCommand = 'load_'.$sType;
        if ($sType != 'language') {
            foreach (glob($sPath, GLOB_ONLYDIR) as $sMatchingPath) {
                if ($sType == 'module') {
                    $sCommand($sMatchingPath, true);
                    if ($admin->error) { set_error($admin->error); }
                } elseif ($sType == 'template') {
                    $sCommand($sMatchingPath);
                }
            }
        } else {
            foreach (glob(dirname(__DIR__).'/languages/??.php') as $sMatchingPath) {
                if (preg_match('/\/[A-Z]{2}\.php$/sU', $sMatchingPath)) {
                    $sCommand($sMatchingPath);
                }
            }
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
