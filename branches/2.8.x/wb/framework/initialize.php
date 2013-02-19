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
		define('ADMIN_REL', WB_REL.'/'.ADMIN_DIRECTORY);
		if(!defined('DOCUMENT_ROOT')) {
			
			define('DOCUMENT_ROOT', preg_replace('/'.preg_quote(WB_REL, '/').'$/', '', WB_PATH));
		}
		define('TMP_PATH', WB_PATH.'/temp');
	}
/**
 * Read DB settings from configuration file
 * @return string
 * @throws RuntimeException
 * 
 */
	function readConfiguration($sRetvalType = 'url') {
		$x = debug_backtrace();
		if(sizeof($x) != 0) { throw new RuntimeException('illegal function request!'); }
		$aRetval = array();
		$sSetupFile = dirname(dirname(__FILE__)).'/setup.ini.php';
		if(is_readable($sSetupFile)) {
			$aCfg = parse_ini_file($sSetupFile, true);
			foreach($aCfg['Constants'] as $key=>$value) {
				if($key == 'debug') { $value = filter_var($value, FILTER_VALIDATE_BOOLEAN); }
				if(!defined(strtoupper($key))) { define(strtoupper($key), $value); }
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
			define('TABLE_PREFIX', $db['table_prefix']);
			if($sRetvalType == 'dsn') {
				$aRetval[0] = $db['type'].':dbname='.$db['name'].';host='.$db['host'].';'
				            . ($db['port'] != '' ? 'port='.(int)$db['port'].';' : '');
				$aRetval[1] = array('CHARSET' => $db['charset'], 'TABLE_PREFIX' => $db['table_prefix']);
				$aRetval[2] = array( 'user' => $db['user'], 'pass' => $db['pass']);
			}else { // $sRetvalType == 'url'
				$aRetval[0] = $db['type'].'://'.$db['user'].':'.$db['pass'].'@'
				            . $db['host'].($db['port'] != '' ? ':'.$db['port'] : '').'/'.$db['name'];
			}
			unset($db, $aCfg);
			return $sRetval;
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
// define constant systemenvironment settings ---
	SetInstallPathConstants();
	date_default_timezone_set('UTC');
	if(!defined('MAX_TIME')) { define('MAX_TIME', (pow(2, 31)-1)); } // 32-Bit Timestamp of 19 Jan 2038 03:14:07 GMT
	if(!defined('DO_NOT_TRACK')) { define('DO_NOT_TRACK', (isset($_SERVER['HTTP_DNT']))); }
// register WB basic autoloader ---
	$sTmp = dirname(__FILE__).'/WbAutoloader.php';
	if(!class_exists('WbAutoloader', false)){ include($sTmp); }
	WbAutoloader::doRegister(array(ADMIN_DIRECTORY=>'a', 'modules'=>'m'));
// register TWIG autoloader ---
//	$sTmp = dirname(dirname(__FILE__)).'/include/Sensio/Twig/lib/Twig/Autoloader.php';
	$sTmp = dirname(dirname(__FILE__)).'/include/Twig/Autoloader.php';
	if(!class_exists('Twig_Autoloader', false)){ include($sTmp); }
	Twig_Autoloader::register();
// aktivate exceptionhandler ---
	if(!function_exists('globalExceptionHandler')) {
		include(dirname(__FILE__).'/globalExceptionHandler.php');
	}
// load db configuration ---
	if(defined('DB_TYPE')) {
		$aSqlData = array( 0 => DB_TYPE.'://'.DB_USERNAME.':'.DB_PASSWORD.'@'.DB_HOST.'/'.DB_NAME);
	}else {
		$aSqlData = readConfiguration($sDbConnectType);
	}
// sanitize $_SERVER['HTTP_REFERER'] ---
	SanitizeHttpReferer(WB_URL); 
// ---------------------------
// Create global database instance ---
	$database = WbDatabase::getInstance();
	if($sDbConnectType == 'dsn') {
		$database->doConnect($aSqlData[0], $aSqlData[1]['user'], $aSqlData[1]['pass'], $aSqlData[2]);
	}else {
		$database->doConnect($aSqlData[0], TABLE_PREFIX);
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
			// make global const from setting
			@define(strtoupper($aSetting['name']), $aSetting['value']);
		}
	}else { throw new AppException($database->get_error()); }
// get/set users timezone ---
	define('TIMEZONE',    (isset($_SESSION['TIMEZONE'])    ? $_SESSION['TIMEZONE']    : DEFAULT_TIMEZONE));
	define('DATE_FORMAT', (isset($_SESSION['DATE_FORMAT']) ? $_SESSION['DATE_FORMAT'] : DEFAULT_DATE_FORMAT));
	define('TIME_FORMAT', (isset($_SESSION['TIME_FORMAT']) ? $_SESSION['TIME_FORMAT'] : DEFAULT_TIME_FORMAT));
// set Theme directory --- 
	define('THEME_URL',  WB_URL.'/templates/'.DEFAULT_THEME);
	define('THEME_PATH', WB_PATH.'/templates/'.DEFAULT_THEME);
	define('THEME_REL',  WB_REL.'/templates/'.DEFAULT_THEME);
// extended wb editor settings
	define('EDIT_ONE_SECTION', false);
	define('EDITOR_WIDTH', 0);
// define numeric, octal values for chmod operations ---	
	$string_file_mode = STRING_FILE_MODE; // STRING_FILE_MODE is set deprecated
	define('OCTAL_FILE_MODE',(int) octdec($string_file_mode));
	$string_dir_mode = STRING_DIR_MODE; // STRING_DIR_MODE is set deprecated
	define('OCTAL_DIR_MODE',(int) octdec($string_dir_mode));
// define form security class and preload it ---
	$sSecMod = (defined('SECURE_FORM_MODULE') && SECURE_FORM_MODULE != '') ? '.'.SECURE_FORM_MODULE : '';
	$sSecMod = WB_PATH.'/framework/SecureForm'.$sSecMod.'.php';
	require_once($sSecMod);
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
// *** begin deprecated part *************************************************************
// load settings for use in Captch and ASP module
	if (!defined("WB_INSTALL_PROCESS")) {
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
	                                     'WbOldStyle');
// *** END OF FILE ***********************************************************************
	