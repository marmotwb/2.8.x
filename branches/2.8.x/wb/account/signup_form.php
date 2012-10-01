<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          Ryan Djurovich, WebsiteBaker Project
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

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

// load module language file
$lang = (dirname(__FILE__)) . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? (dirname(__FILE__)) . '/languages/EN.php' : $lang );

require_once(WB_PATH.'/include/captcha/captcha.php');

include_once (WB_PATH.'/framework/functions.php');

$mLang = ModLanguage::getInstance();
$mLang->setLanguage(dirname(__FILE__).'/languages/', LANGUAGE, DEFAULT_LANGUAGE);

//echo '<style type="text/css">';
//include(WB_PATH .'/account/frontend.css');
//echo "\n</style>\n";

if(isset($_POST['action']) && $_POST['action']=='send') {
	require(dirname(__FILE__).'/save_signup.php');
} else {
	$output = '';
	msgQueue::clear();
	unset($_SESSION['USERNAME']);
	unset($_SESSION['LANGUAGE']);
	unset($_SESSION['DISPLAY_NAME']);
	unset($_SESSION['EMAIL']);
	unset($_SESSION['TIMEZONE']);
}

if($_SESSION['display_form']){

// set template file and assign module and template block
	$oTpl = new Template(dirname(__FILE__).'/htt','keep');
	$oTpl->set_file('page', 'signup.htt');
	$oTpl->debug = false; // false, true
	$oTpl->set_block('page', 'main_block', 'main');
// generell vars
	$oTpl->set_var(array(
		'FTAN' => $wb->getFTAN(),
		'ACTION_URL' => WB_URL.'/account/signup.php',
		'WB_URL' => WB_URL,
		'THEME_URL' => THEME_URL,
		'HTTP_REFERER' => $_SESSION['HTTP_REFERER'],
		'MESSAGE_VALUE' => '',
		'ERROR_VALUE' => '',
		'HEADING_SIGNUP' => $TEXT['SIGNUP'],
		'TEXT_LANGUAGE' => $TEXT['LANGUAGE'],
		'TEXT_SIGNUP' => $TEXT['SIGNUP'],
		'TEXT_RESET' => $TEXT['RESET'],
		'TEXT_CANCEL' => $TEXT['CANCEL'],
		)
	);

	$sSelected = ' selected="selected"';
	$checked   = ' checked="checked"';
// show messages, default block off
	$oTpl->set_block('main_block', 'message_block', 'message');
	$oTpl->parse('message', '');
	if( ($msg = msgQueue::getError()) != '')
	{
		$output = $wb->format_message($msg, 'error');
		$oTpl->set_var('MESSAGE_VALUE',$output);
		$oTpl->parse('message', 'message_block', true);
	}
	$oTpl->set_var('MESSAGE','');

// show captcha
	$oTpl->set_block('main_block', 'asp_block', 'asp');
	if(ENABLED_ASP) {
		$oTpl->set_var('DISPLAY_ASP','nixhier');
		$oTpl->parse('asp', 'asp_block', true);
	} else {
		$oTpl->parse('asp', '', true);
	}

// login label vars
	$oTpl->set_var(array(
		'TEXT_INFO' => $SFS_TEXT['INFO'],
		'TEXT_USERNAME' => $TEXT['USERNAME'],
		'TEXT_DISPLAY_NAME' => $TEXT['DISPLAY_NAME'],
		'TEXT_EMAIL' => $TEXT['EMAIL'],
		)
	);

// set data vars stored in session if validation failed
	$iTime = time();
	$_SESSION['submitted_when'] = $iTime;
	$oTpl->set_var(array(
		'SET_TIME' => $iTime,
		'DISPLAY_USER' => $wb->get_session('USERNAME'),
		'DISPLAY_NAME' => $wb->get_session('DISPLAY_NAME'),
		'EMAIL' => $wb->get_session('EMAIL'),
		)
	);

// detect client language
	$oTpl->set_block('main_block', 'language_list_block', 'language_list');
	$sAutoLanguage = DEFAULT_LANGUAGE; // default, if no information from client available
	if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		if(preg_match('/([a-z]{2})(?:-[a-z]{2})*/i', strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']), $matches)) {
			$sAutoLanguage = strtoupper($matches[1]);
		}
	}
	$sAutoLanguage = isset($_SESSION['LANGUAGE']) ? $_SESSION['LANGUAGE'] : $sAutoLanguage;
	// Insert language values
	$sql  = 'SELECT `name`, `directory` FROM `'.TABLE_PREFIX.'addons` ';
	$sql .= 'WHERE `type` = \'language\' ';
//	$sql .= 'AND `function` != \'theme\' ';
	$sql .= 'ORDER BY `directory`';
	if( ($result = $database->query($sql)) && ($result->numRows() > 0) )
//	$result = $database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'language' ORDER BY directory");
//	if($result->numRows() > 0)
	{
		while($addon = $result->fetchRow())
		{
	        $langIcons = (empty($addon['directory'])) ? 'none' : strtolower($addon['directory']);

			$oTpl->set_var('CODE',        $addon['directory']);
			$oTpl->set_var('NAME',        $addon['name']);
			$oTpl->set_var('FLAG',        THEME_URL.'/images/flags/'.$langIcons);
			$oTpl->set_var('SELECTED',    ($sAutoLanguage == $addon['directory'] ? $sSelected : '') );
			$oTpl->parse('language_list', 'language_list_block', true);
		}
	}

// if type == confirmed_registration mail show password block, otherwise old login with captcha
	$oTpl->set_block('main_block', 'password_block', 'password');
	$oTpl->set_block('main_block', 'captcha_block', 'captcha');
	if(CONFIRMED_REGISTRATION) {
		$oTpl->parse('captcha', '', true);
		$oTpl->set_var(array(
				'TEXT_NEW_PASSWORD' => $TEXT['NEW_PASSWORD'],
				'TEXT_RETYPE_NEW_PASSWORD' => $TEXT['RETYPE_NEW_PASSWORD'],
				'HELP_SIGNUP_REMEMBER_PASSWORD' => $HELP['SIGNUP_REMEMBER_PASSWORD'],
				)
			);
		$oTpl->parse('password', 'password_block',true);
	} else {
		$oTpl->parse('password', '');
		if(ENABLED_CAPTCHA) {
			ob_start();
			call_captcha();
			$captcha = ob_get_clean();
			$oTpl->set_var(array(
					'TEXT_VERIFICATION' => $TEXT['VERIFICATION'],
					'CAPTCHA' => $captcha,
					)
				);
			$oTpl->parse('captcha', 'captcha_block', true);
		} else {
			$oTpl->parse('captcha', '', true);
		}
	}

	// Parse template object
	$oTpl->parse('main', 'main_block', false);
	$output = $oTpl->finish($oTpl->parse('output', 'page'));
	unset($oTpl);
	print $output;
	$output = '';
} else {
	// success registration output
	$oTpl = new Template(dirname(__FILE__).'/htt','keep');
	$oTpl->set_file('page', 'success.htt');
	$oTpl->debug = false; // false, true
	$oTpl->set_block('page', 'main_block', 'main');
	// show messages, default block off
	$oTpl->set_block('main_block', 'show_registration_block', 'message');
	$oTpl->parse('message', '');
	if( ($msg = msgQueue::getSuccess()) != '')
	{
		$output = $wb->format_message($msg, 'ok');
		$oTpl->set_var('MESSAGE_VALUE',$output);
		$oTpl->parse('message', 'show_registration_block', true);
	}
	$oTpl->set_var(array(
			'BACK' => $TEXT['BACK'],
			'HTTP_REFERER' => isset($_SESSION['HTTP_REFERER']) ? $_SESSION['HTTP_REFERER'] : WB_URL,
			)
		);

	if(CONFIRMED_REGISTRATION) {
		$sMessage  = $MESSAGE['SIGNUP2_SUBJECT_NEW_USER'].' ';
		$sMessage .= $MESSAGE['SIGNUP_CONFIRMED_REGISTRATION'];
		$oTpl->set_var('MESSAGE',$sMessage);
	} else {
		$sMessage  = $MESSAGE['SIGNUP2_SUBJECT_NEW_USER'].' ';
		$sMessage .= $MESSAGE['SIGNUP_REGISTRATION'];
		$oTpl->set_var('MESSAGE',$sMessage);
	}
	//$oTpl->parse('message', 'message_block', true);
	$oTpl->parse('main', 'main_block', false);
	$output = $oTpl->finish($oTpl->parse('output', 'page'));
	unset($oTpl);
	print $output;
}
