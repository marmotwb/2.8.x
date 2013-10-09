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
 * initialize.php
 *
 * @category     Core
 * @package      Core_Environment
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File replaced since 05.02.2013
 * @description  set the basic environment to run WebsiteBaker
 */

/* *** define some helper functions *** */
/**
 * sanitize $_SERVER['HTTP_REFERER']
 * @param string $sWbUrl qualified startup URL of current application
 */
	function SanitizeHttpReferer($sWbUrl = WB_URL) {
		$sTmpReferer = '';
		if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
			$aRefUrl = parse_url($_SERVER['HTTP_REFERER']);
			if ($aRefUrl !== false) {
				$aRefUrl['host'] = isset($aRefUrl['host']) ? $aRefUrl['host'] : '';
				$aRefUrl['path'] = isset($aRefUrl['path']) ? $aRefUrl['path'] : '';
				$aRefUrl['fragment'] = isset($aRefUrl['fragment']) ? '#'.$aRefUrl['fragment'] : '';
				$aWbUrl = parse_url(WB_URL);
				if ($aWbUrl !== false) {
					$aWbUrl['host'] = isset($aWbUrl['host']) ? $aWbUrl['host'] : '';
					$aWbUrl['path'] = isset($aWbUrl['path']) ? $aWbUrl['path'] : '';
					if (strpos($aRefUrl['host'].$aRefUrl['path'],
							   $aWbUrl['host'].$aWbUrl['path']) !== false) {
						$aRefUrl['path'] = preg_replace('#^'.$aWbUrl['path'].'#i', '', $aRefUrl['path']);
						$sTmpReferer = WB_URL.$aRefUrl['path'].$aRefUrl['fragment'];
					}
					unset($aWbUrl);
				}
				unset($aRefUrl);
			}
		}
		$_SERVER['HTTP_REFERER'] = $sTmpReferer;
	}
/**
 * Set constants for system/install values
 * @throws RuntimeException
 */
	function SetInstallPathConstants() {
		if(!defined('DEBUG')){ define('DEBUG', false); } // normaly set in config file
		if(!defined('ADMIN_DIRECTORY')){ define('ADMIN_DIRECTORY', 'admin'); }
		if(!preg_match('/xx[a-z0-9_][a-z0-9_\-\.]+/i', 'xx'.ADMIN_DIRECTORY)) {
			throw new RuntimeException('Invalid admin-directory: ' . ADMIN_DIRECTORY);
		}
		if(!defined('WB_PATH')){ define('WB_PATH', dirname(dirname(__FILE__))); }
		if(!defined('ADMIN_URL')){ define('ADMIN_URL', WB_URL.'/'.ADMIN_DIRECTORY); }
		if(!defined('ADMIN_PATH')){ define('ADMIN_PATH', WB_PATH.'/'.ADMIN_DIRECTORY); }
		if(!defined('WB_REL')){
			$x1 = parse_url(WB_URL);
			define('WB_REL', (isset($x1['path']) ? $x1['path'] : ''));
		}
		if(!defined('ADMIN_REL')){ define('ADMIN_REL', WB_REL.'/'.ADMIN_DIRECTORY); }
		if(!defined('DOCUMENT_ROOT')) {
            define('DOCUMENT_ROOT', preg_replace('/'.preg_quote(str_replace('\\', '/', WB_REL), '/').'$/', '', str_replace('\\', '/', WB_PATH)));			
            // creating $_SERVER['DOCUMENT_ROOT'] for Windows IIS Server
            $_SERVER['DOCUMENT_ROOT'] = DOCUMENT_ROOT;
		}
		if(!defined('TMP_PATH')){ define('TMP_PATH', WB_PATH.'/temp'); }
	}
/**
 * Read DB settings from configuration file
 * @return string
 * @throws RuntimeException
 * 
 */
	function readConfiguration($sRetvalType = 'url') {
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
		} else {
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
						if(!defined('DEBUG')) { define('DEBUG', $value); }
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
			$db['charset'] = isset($db['charset']) ? trim($db['charset']) : '';
			$db['table_prefix'] = (isset($db['table_prefix']) ? $db['table_prefix'] : '');
			if(!defined('TABLE_PREFIX')) { define('TABLE_PREFIX', $db['table_prefix']); }
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
/* ***************************************************************************************
 * Start initialization                                                                  *
 ****************************************************************************************/
// initialize debug evaluation values ---	
	$sDbConnectType = 'url'; // depending from class WbDatabase it can be 'url' or 'dsn'
	$starttime = array_sum(explode(" ",microtime()));
	$iPhpDeclaredClasses = sizeof(get_declared_classes());
// disable all kind of magic_quotes in PHP versions before 5.4 ---
	if(version_compare(PHP_VERSION, '5.4.0', '<')) {
		if(get_magic_quotes_gpc() || get_magic_quotes_runtime()) {
			@ini_set('magic_quotes_sybase', 0);
			@ini_set('magic_quotes_gpc', 0);
			@ini_set('magic_quotes_runtime', 0);
		}
	}
// load db configuration ---
	if(defined('DB_TYPE')) {
		$sTmp = ($sTmp=((defined('DB_PORT') && DB_PORT !='') ? DB_PORT : '')) ? ':'.$sTmp : '';
		$sTmp = DB_TYPE.'://'.DB_USERNAME.':'.DB_PASSWORD.'@'.DB_HOST.$sTmp.'/'.DB_NAME.'?Charset=';
		$sTmp .= (defined('DB_CHARSET') ? DB_CHARSET : '').'&TablePrefix='.TABLE_PREFIX;
		$aSqlData = array( 0 => $sTmp);
	}else {
		$aSqlData = readConfiguration($sDbConnectType);
	}
// sanitize $_SERVER['HTTP_REFERER'] ---
	SanitizeHttpReferer(WB_URL); 
	SetInstallPathConstants();
// register WB basic autoloader ---
	$sTmp = dirname(__FILE__).'/WbAutoloader.php';
	if(!class_exists('WbAutoloader')){ 
		include($sTmp);
	}
	WbAutoloader::doRegister(array(ADMIN_DIRECTORY=>'a', 'modules'=>'m'));
// register TWIG autoloader ---
	$sTmp = dirname(dirname(__FILE__)).'/include/Sensio/Twig/lib/Twig/Autoloader.php';
	if(!class_exists('Twig_Autoloader')) { 
		include($sTmp); 
	}
	Twig_Autoloader::register();
// aktivate exceptionhandler ---
	if(!function_exists('globalExceptionHandler')) {
		include(dirname(__FILE__).'/globalExceptionHandler.php');
	}
// ---------------------------
// Create global database instance ---
	$database = WbDatabase::getInstance();
	if($sDbConnectType == 'dsn') {
		$bTmp = $database->doConnect($aSqlData[0], $aSqlData[1]['user'], $aSqlData[1]['pass'], $aSqlData[2]);
	}else {
		$bTmp = $database->doConnect($aSqlData[0]);
	}
	unset($aSqlData);
// load global settings from database and define global consts from ---
	$sql = 'SELECT `name`, `value` FROM `'.TABLE_PREFIX.'settings`';
	if(($oSettings = $database->query($sql))) {
		if(!$oSettings->numRows()) { throw new AppException('no settings found'); }
		while($aSetting = $oSettings->fetchRow(MYSQL_ASSOC)) {
			//sanitize true/false values
			$aSetting['value'] = ($aSetting['value'] == 'true' 
								  ? true 
								  : ($aSetting['value'] == 'false' 
									 ? false 
									 : $aSetting['value'])
								 );
			$sSettingName = strtoupper($aSetting['name']);
			switch($sSettingName):
				case 'STRING_FILE_MODE':
					$iTmp = ((intval(octdec($aSetting['value'])) & ~0111)|0600);
					if(!defined('OCTAL_FILE_MODE')) { define('OCTAL_FILE_MODE', $iTmp); }
					if(!defined('STRING_FILE_MODE')) { define('STRING_FILE_MODE', sprintf('0%03o', $iTmp)); }
					break;
				case 'STRING_DIR_MODE':
					$iTmp = (intval(octdec($aSetting['value'])) |0711);
					if(!defined('OCTAL_DIR_MODE')) { define('OCTAL_DIR_MODE', $iTmp); }
					if(!defined('STRING_DIR_MODE')) { define('STRING_DIR_MODE', sprintf('0%03o', $iTmp)); }
					break;
				case 'PAGES_DIRECTORY':
					// sanitize pages_directory
					$sTmp = trim($aSetting['value'], '/');
					$sTmp = ($sTmp == '' ? '' : '/'.$sTmp);
					if(!defined('PAGES_DIRECTORY')) { define('PAGES_DIRECTORY', $sTmp); }
					break;
				default: // make global const from setting
					if(!defined($sSettingName)) { define($sSettingName, $aSetting['value']); }
					break;
			endswitch;
		}
	}else { throw new AppException($database->get_error()); }
// set error-reporting from loaded settings ---
	if(intval(ER_LEVEL) > 0 ) {
		error_reporting(ER_LEVEL);
		if( intval(ini_get ( 'display_errors' )) == 0 ) {
			ini_set('display_errors', 1);
		}
	}
// Start a session ---
	if(!defined('SESSION_STARTED')) {
		session_name(APP_NAME.'_session_id');
		@session_start();
		define('SESSION_STARTED', true);
	}
// get/set server timezone ---
	if(!defined('SERVER_TIMEZONE')) { define('SERVER_TIMEZONE', "UTC"); }
	date_default_timezone_set( SERVER_TIMEZONE );
	if(!defined('MAX_TIME')) { define('MAX_TIME', (pow(2, 31)-1)); } // 32-Bit Timestamp of 19 Jan 2038 03:14:07 GMT
	$sTmp = (isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT'] != '') ? $_SERVER['HTTP_DNT'] : '0';
	if(!defined('DO_NOT_TRACK')) { define('DO_NOT_TRACK', ($sTmp[0] == '1')); }
// get/set users timezone ---
	if(!defined('TIMEZONE')) { define('TIMEZONE', (isset($_SESSION['TIMEZONE']) ? $_SESSION['TIMEZONE'] : DEFAULT_TIMEZONE)); }
	if(!defined('DATE_FORMAT')) { define('DATE_FORMAT', (isset($_SESSION['DATE_FORMAT']) ? $_SESSION['DATE_FORMAT'] : DEFAULT_DATE_FORMAT)); }
	if(!defined('TIME_FORMAT')) { define('TIME_FORMAT', (isset($_SESSION['TIME_FORMAT']) ? $_SESSION['TIME_FORMAT'] : DEFAULT_TIME_FORMAT)); }
// set Theme directory --- 
	if(!defined('THEMA_URL')) { define('THEME_URL',  WB_URL.'/templates/'.DEFAULT_THEME); }
	if(!defined('THEME_PATH')) { define('THEME_PATH', WB_PATH.'/templates/'.DEFAULT_THEME); }
	if(!defined('THEME_REL')) { define('THEME_REL',  WB_REL.'/templates/'.DEFAULT_THEME); }
// extended wb editor settings
	if(!defined('EDIT_ONE_SECTION')) { define('EDIT_ONE_SECTION', false); }
	if(!defined('EDITOR_WIDTH')) { define('EDITOR_WIDTH', 0); }
// define form security class and preload it ---
	$sSecMod = (defined('SECURE_FORM_MODULE') && SECURE_FORM_MODULE != '') ? '.'.SECURE_FORM_MODULE : '';
	$sSecMod = WB_PATH.'/framework/SecureForm'.$sSecMod.'.php';
	require_once($sSecMod);
// *** begin deprecated part *************************************************************
// load settings for use in Captch and ASP module
	if (!defined('WB_INSTALL_PROCESS') && !defined('ENABLED_CAPTCHA')) {
		$sql = 'SELECT * FROM `'.TABLE_PREFIX.'mod_captcha_control`';
		// request settings from database
		if(($oSettings = $database->query($sql))) {
			if(($aSetting = $oSettings->fetchRow(MYSQL_ASSOC))) {
				define('ENABLED_CAPTCHA', ($aSetting['enabled_captcha'] == '1'));
				define('ENABLED_ASP', ($aSetting['enabled_asp'] == '1'));
				define('CAPTCHA_TYPE', $aSetting['captcha_type']);
				define('ASP_SESSION_MIN_AGE', (int)$aSetting['asp_session_min_age']);
				define('ASP_VIEW_MIN_AGE', (int)$aSetting['asp_view_min_age']);
				define('ASP_INPUT_MIN_AGE', (int)$aSetting['asp_input_min_age']);
			}
		}
	}
	if(defined('ENABLED_ASP') && ENABLED_ASP && !isset($_SESSION['session_started'])) {
		$_SESSION['session_started'] = time();
	}
// *** end of deprecated part ************************************************************
// get user language ---
	$sRequestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
	// check if get/post value is available
	$sTempLanguage = (isset(${$sRequestMethod}['lang']) ? ${$sRequestMethod}['lang'] : '');
	// validate language code
	if(preg_match('/^[a-z]{2}$/si', $sTempLanguage)) {
	// if there's valid get/post
		define('LANGUAGE', strtoupper($sTempLanguage));
		$_SESSION['LANGUAGE']=LANGUAGE;
	}else {
		if(isset($_SESSION['LANGUAGE']) && $_SESSION['LANGUAGE']) {
		// if there's valid session value
			define('LANGUAGE', $_SESSION['LANGUAGE']);
		}else {
		// otherwise set to default
			define('LANGUAGE', DEFAULT_LANGUAGE);
		}
	}
// activate translations / load language definitions
/** begin of deprecated part || will be replaced by class Translate **/	
// Load Language file
	if(!file_exists(WB_PATH.'/languages/'.LANGUAGE.'.php')) {
		$sMsg = 'Error loading language file '.LANGUAGE.', please check configuration';
		throw new AppException($sMsg);
	} else {
	// include language file
		require_once(WB_PATH.'/languages/'.LANGUAGE.'.php');
	}
/** end of deprecated part **/
// instantiate and initialize adaptor for temporary registry replacement ---
	if(class_exists('WbAdaptor')) {
		WbAdaptor::getInstance()->getWbConstants();
	}
// load and activate new global translation table
	Translate::getInstance()->initialize('en',
										 (defined('DEFAULT_LANGUAGE') ? DEFAULT_LANGUAGE : ''), 
										 (defined('LANGUAGE') ? LANGUAGE : ''),
										 'WbOldStyle',
										 (DEBUG ? Translate::CACHE_DISABLED|Translate::KEEP_MISSING : 0)
										);
	if(!class_exists('PasswordHash', false)) { include(WB_PATH.'/include/phpass/PasswordHash.php'); }
	$oPass = Password::getInstance(new PasswordHash(Password::CRYPT_LOOPS_DEFAULT, Password::HASH_TYPE_AUTO));
	if(defined('PASSWORD_CRYPT_LOOPS')) { $oPass->setIteration(PASSWORD_CRYPT_LOOPS); }
	if(defined('PASSWORD_HASH_TYPES'))  { $oPass->setHashType(PASSWORD_HASH_TYPES); }
// *** END OF FILE ***********************************************************************
 