<?php
/**
 *
 * @category        modules
 * @package         SecureFormSwitcher
 * @author          WebsiteBaker Project, D Woellbrink
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.2
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false)
{
	die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}

// load module language file
$mod_path = (dirname(__FILE__));
$mod_rel = str_replace('\\','/',str_replace(WB_PATH,'',$mod_path));
$sModulesUrl = WB_URL.$mod_rel;
//echo realpath($mod_rel);
require_once( $mod_path.'/language_load.php' );
// callback function for settings name
function converttoupper($val, $key, $vars) {
	$vars[0][$key] = strtoupper($key);
	$vars[1][$vars[0][$key]] = ($val);
}

// create backlinks
$js_back =  ADMIN_URL.'/admintools/tool.php?tool=SecureFormSwitcher';
$backlink =  ADMIN_URL.'/admintools/index.php';

$FileNotFound = '&nbsp;';
// defaults settings
$default_cfg = array(
	'secure_form_module' => '',
	'wb_secform_secret' => '5609bnefg93jmgi99igjefg',
	'wb_secform_secrettime' => '86400',
	'wb_secform_timeout' => '7200',
	'wb_secform_tokenname' => 'formtoken',
	'wb_secform_usefp' => 'true',
	'fingerprint_with_ip_octets' => '2',
);
$setting = $default_cfg;
$MultitabTarget = WB_PATH.'/framework/SecureForm.mtab.php';
// get stored settings to set in mask
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'settings` ';
$sql .= 'WHERE `name` = \'secure_form_module\'';
$sql .=    'OR `name`=\'fingerprint_with_ip_octets\' ';
$sql .=    'OR `name`=\'wb_secform_usefp\' ';
$sql .=    'OR `name`=\'wb_secform_tokenname\' ';
$sql .=    'OR `name`=\'wb_secform_timeout\' ';
$sql .=    'OR `name`=\'wb_secform_secrettime\' ';
$sql .=    'OR `name`=\'wb_secform_secret\' ';
if($res = $database->query($sql) ) {
	if($res->numRows() > 0) {
		while($rec = $res->fetchRow(MYSQL_ASSOC)) {
	        $setting[$rec['name']] = $rec['value'];
		}
	} else {
		// add missing values
		db_update_key_value('settings', $setting );
	}
}

$action = 'show';
$action = isset($_POST['save_settings']) ? 'save_settings' : $action;
$action = isset($_POST['save_settings_default']) ? 'save_settings_default' : $action;
$action = isset($_POST['save_settings']) ? 'save_settings' : $action;
//$action = isset($_POST['cancel']) ? 'cancel' : $action;

switch ($action) :
	case 'save_settings':
		$cfg = array(
			'secure_form_module' => (isset($_POST['ftan_switch']) ? $_POST['ftan_switch'] : 'mtab'),
			'wb_secform_secret' => (isset($_POST['wb_secform_secret']) ? $_POST['wb_secform_secret'] : $setting['wb_secform_secret'] ),
			'wb_secform_secrettime' => (isset($_POST['wb_secform_secrettime']) ? $_POST['wb_secform_secrettime'] : $setting['wb_secform_secrettime'] ),
			'wb_secform_timeout' => (isset($_POST['wb_secform_timeout']) ? $_POST['wb_secform_timeout'] : $setting['wb_secform_timeout'] ),
			'wb_secform_tokenname' => (isset($_POST['wb_secform_tokenname']) ? $_POST['wb_secform_tokenname'] : $setting['wb_secform_tokenname'] ),
			'wb_secform_usefp' => (isset($_POST['wb_secform_usefp']) ? $_POST['wb_secform_usefp'] : $setting['wb_secform_usefp'] ),
			'fingerprint_with_ip_octets' => (isset($_POST['fingerprint_with_ip_octets']) ? $_POST['fingerprint_with_ip_octets'] : $setting['fingerprint_with_ip_octets'] ),
		);
		// unset($_POST);
		$_SESSION['CFG'] = $cfg;
		break;
	case 'save_settings_default':
		$cfg = $default_cfg;
		$cfg['secure_form_module'] = $setting['secure_form_module'];
		break;
endswitch;

switch ($action) :
	case 'save_settings':
	case 'save_settings_default':
		if (!$admin->checkFTAN())
		{
// 			if(!$admin_header) { $admin->print_header(); }
			$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],$_SERVER['REQUEST_URI']);
		}
		if(file_exists($MultitabTarget)) {
			$val = ( isset($_POST['ftan_switch'])  ? ($_POST['ftan_switch']) : 'mtab');
		} else {
			$cfg['secure_form_module'] = '';
			$FileNotFound = $SFS_TEXT['FILE_FORMTAB_NOT_GOUND'];
		}

		db_update_key_value('settings', $cfg );
		// check if there is a database error, otherwise say successful
		if(!$admin_header) { $admin->print_header(); }
		if($database->is_error()) {
			$admin->print_error($database->get_error(), $js_back);
		} else {
            if(isset($_SESSION['CFG'])) { unset($_SESSION['CFG']);}
			$admin->print_success($MESSAGE['PAGES_SAVED'], $js_back);
		}
		break;
endswitch;

// set template file and assign module and template block
$oSecureTpl = new Template(WB_PATH.'/modules/SecureFormSwitcher/htt','keep');
// $tpl = new Template(dirname($admin->correct_theme_source('switchform.htt')),'keep');
$oSecureTpl->set_file('page', 'switchform.htt');
$oSecureTpl->debug = false; // false, true
$oSecureTpl->set_block('page', 'main_block', 'main');

$checked  = ($setting['secure_form_module']!='');
$target   = ($checked) ? '.'.$setting['secure_form_module'] : '';
$target   = WB_PATH.'/framework/SecureForm'.$target.'.php';
$ftanMode = ($checked ? $SFS_TEXT['SECURE_FORM'] : $SFS_TEXT['SECURE_FORMMTAB']);

$SingleTabStatus = intval($checked==false);
$MultitabStatus = intval($checked==true);
$NotFoundClass = '';
$HiddenClass = 'none';
$FileNotFound = '';
if(!file_exists($MultitabTarget)) {
	$SingleTabStatus = true;
	$MultitabStatus = false;
	$FileNotFound = $SFS_TEXT['FILE_FORMTAB_NOT_FOUND'];
	$HiddenClass = 'warning';
}

// convert settings name to upper
array_walk($setting,'converttoupper', array(&$search, &$replace ));

$oSecureTpl->set_var($replace);
$oSecureTpl->set_var(array(
	'FTAN' => $admin->getFTAN(),
	'ADMIN_URL' => ADMIN_URL,
	'WB_URL' => WB_URL,
	'URL_VIEW' => WB_URL,
	'THEME_URL' => THEME_URL,
	'SERVER_REQUEST_URI' => $_SERVER['REQUEST_URI'],
	'TEXT_CANCEL' => $TEXT['CANCEL'],
	'BACKLINK' => $backlink,
	'TEXT_INFO' => $SFS_TEXT['INFO'],
	'TEXT_SUBMIT' => $SFS_TEXT['SUBMIT'],
	'TEXT_MSUBMIT' => $SFS_TEXT['RESET_SETTINGS'],
	'TXT_HEADING' => $SFS_TEXT['SECURE_FORM'.strtoupper($setting['secure_form_module'])],
	'SELECTED' => ( ($SingleTabStatus) ? ' checked="checked"' : ''),
	'SELECTED_TAB' => ( ($MultitabStatus) ? ' checked="checked"' : ''),
	'SUBMIT_TYPE' => ($checked ? 'multitab' : 'singletab'),
	'MODULES_URL' => $sModulesUrl,
	'MSELECTED' => '',
	'MSELECTED_TAB' => '',
	'DISPLAY_MISSING_MTAB' =>  $HiddenClass,
//	'DISPLAY_RIGHT_SUBMIT' =>  ( ($MultitabStatus) ? '' : 'none'),
	'FTAN_COLOR' => ($checked ? 'grey' : 'norm'),
	'TXT_SUBMIT_FORM' => $SFS_TEXT['SUBMIT_FORM'],
	'TXT_SUBMIT_FORMTAB' => $SFS_TEXT['SUBMIT_FORMTAB'],
	'FILE_FORMTAB_WARNING' => $NotFoundClass,
	'FILE_FORMTAB_NOT_FOUND' => $FileNotFound,
	)
);

$oSecureTpl->set_var(array(
		'USEIP_SELECTED' => '',
		'TXT_SECFORM_USEIP' => $CAPTION['WB_SECFORM_USEIP'],
		'TEXT_DEFAULT_SETTINGS' => $HEADING['DEFAULT_SETTINGS'],
		'USEIP_DEFAULT' => $default_cfg['fingerprint_with_ip_octets'],
		'USEFP_CHECKED_TRUE' => (($setting['wb_secform_usefp']=='true') ? ' checked="checked"' : ''),
		'USEFP_CHECKED_FALSE' => (($setting['wb_secform_usefp']=='false') ? ' checked="checked"' : ''),
		'TEXT_DEFAULT_SETTINGS' => $HEADING['DEFAULT_SETTINGS'],
	)
);

foreach($HELP as $key=>$value)
{
	$sHelp[$key] = $value;
	$oSecureTpl->set_var('p_'.strtolower($key),  p($sHelp[$key],$CAPTION[$key] ));
//	echo ' {p_'.strtolower($key).'}<br />';
}

$oSecureTpl->set_block('main_block', 'useip_mtab_loop', 'mtab_loop');
	for($x=0; $x < 5; $x++) {
		// iu value == default set first option with standardtext
		if(intval($default_cfg['fingerprint_with_ip_octets'])==$x ) {
			$oSecureTpl->set_var(array(
					'USEIP_VALUE' => $x,
					'USEIP_DEFAULT_SELECTED' => ((intval($setting['fingerprint_with_ip_octets'])==$x) ? ' selected="selected"' : ''),
					'USEIP_SELECTED' => '',
					)
			);
		} else {
			$oSecureTpl->set_var(array(
					'USEIP_VALUE' => $x,
					'USEIP_SELECTED' => ((intval($setting['fingerprint_with_ip_octets'])==$x) && (intval($setting['fingerprint_with_ip_octets'])!=intval($default_cfg['fingerprint_with_ip_octets'])) ? ' selected="selected"' : ''),
				)
			);
		}
		$oSecureTpl->parse('mtab_loop','useip_mtab_loop', true);
	}

$oSecureTpl->set_block('main_block', 'show_mtab_block', 'show_mtab');
$oSecureTpl->set_block('main_block', 'mtab_block', 'mtab');
if($checked) {
	$oSecureTpl->set_var(array(
			'TEXT_ENABLED' => $SFS_TEXT['ON'],
			'TEXT_DISABLED' => $SFS_TEXT['OFF'],
			'TXT_SECFORM_TOKENNAME' => $CAPTION['WB_SECFORM_TOKENNAME'],
			'TXT_SECFORM_TIMEOUT' => $CAPTION['WB_SECFORM_TIMEOUT'],
			'TXT_SECFORM_SECRETTIME' => $CAPTION['WB_SECFORM_SECRETTIME'],
			'TXT_SECFORM_SECRET' => $CAPTION['WB_SECFORM_SECRET'],
			'TXT_SECFORM_USEFP' => $CAPTION['WB_SECFORM_USEFP'],
			'SECFORM_USEFP' => 'true',
		)
	);

	$oSecureTpl->parse('mtab','mtab_block', true);
	$oSecureTpl->parse('show_mtab','show_mtab_block', true);
} else  {
	$oSecureTpl->parse('mtab', '');
	$oSecureTpl->parse('show_mtab', '');
}

// Parse template object
$oSecureTpl->parse('main', 'main_block', false);
$output = $oSecureTpl->finish($oSecureTpl->parse('output', 'page'));
unset($oSecureTpl);
print $output;


/**
 * p()
 *
 * @param string $text
 * @param string $caption
 * @return
 */
function p($sTooltip,$sCaption)
{
	global $admin;
	$retVal  = 'onmouseover="return overlib(';
	$retVal .= '\''.$sTooltip.'\',';
	$retVal .= 'CAPTION,\''.$sCaption.'\',';
	$retVal .= 'FGCOLOR,\'#ffffff\',';
	$retVal .= 'BGCOLOR,\'#557c9e\',';
	$retVal .= 'BORDER,1,';
	$retVal .= 'WIDTH,';
	$retVal .= 'HEIGHT,';
	$retVal .= 'STICKY,';
	$retVal .= 'CAPTIONSIZE,\'13px\',';
	$retVal .= 'CLOSETEXT,\'X\',';
	$retVal .= 'CLOSESIZE,\'16px\',';
	$retVal .= 'CLOSECOLOR,\'#ffffff\',';
	$retVal .= 'TEXTSIZE,\'12px\',';
	$retVal .= 'VAUTO,';
	$retVal .= 'HAUTO,';
	$retVal .= 'MOUSEOFF,';
	$retVal .= 'WRAP,';
	$retVal .= 'CELLPAD,5';
	$retVal .= ')" onmouseout="return nd();"';
//	$retVal .= '';

	return $retVal;
}
