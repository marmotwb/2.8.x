<?php
/**
 *
 * @category        admin
 * @package         modules
 * @author          Ryan Djurovich, Christian Sommer, WebsiteBaker Project
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

/**
 * check if there is anything to do
 */

/**
 * check if user has permissions to access this file
 */
// include WB configuration file and WB admin class
require_once('../../config.php');

$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\modules');

// check user permissions for admintools (redirect users with wrong permissions)
$admin = new admin('Admintools', 'admintools', false, false);

if (!(isset($_POST['action']) && in_array($_POST['action'], array('install', 'upgrade', 'uninstall')))) { die(header('Location: index.php?advanced')); }
if (!(isset($_POST['file']) && $_POST['file'] != '' && (strpos($_POST['file'], '..') === false))){  die(header('Location: index.php?advanced'));  }

$js_back = ADMIN_URL . '/modules/index.php?advanced';
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS, $js_back);
}

if ($admin->get_permission('admintools') == false) { die(header('Location: ../../index.php')); }

// check if the referer URL if available
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] :
	(isset($HTTP_SERVER_VARS['HTTP_REFERER']) ? $HTTP_SERVER_VARS['HTTP_REFERER'] : '');
$referer = '';
// if referer is set, check if script was invoked from "admin/modules/index.php"
$required_url = ADMIN_URL . '/modules/index.php';
if ($referer != '' && (!(strpos($referer, $required_url) !== false || strpos($referer, $required_url) !== false))) 
{ die(header('Location: ../../index.php')); }

// include WB functions file
require_once(WB_PATH . '/framework/functions.php');

//// load WB language file
//require_once(WB_PATH . '/languages/' . LANGUAGE .'.php');

// create Admin object with admin header
$admin = new admin('Addons', '', true, false);

/**
 * Manually execute the specified module file (install.php, upgrade.php or uninstall.php)
 */
// check if specified module folder exists
$mod_path = WB_PATH . '/modules/' . basename(WB_PATH . '/' . $_POST['file']);

// let the old variablename if module use it
$module_dir = $mod_path;
if (!file_exists($mod_path . '/' . $_POST['action'] . '.php'))
{
	$admin->print_header();
    $admin->print_error($oTrans->TEXT_NOT_FOUND.': <tt>"'.htmlentities(basename($mod_path)).'/'.$_POST['action'].'.php"</tt> ', $js_back);
}

// include modules install.php script
require($mod_path . '/' . $_POST['action'] . '.php');

// load module info into database and output status message
load_module($mod_path, false);
$msg = $oTrans->TEXT_EXECUTE . ': <tt>"' . htmlentities(basename($mod_path)) . '/' . $_POST['action'] . '.php"</tt>';

switch ($_POST['action'])
{
	case 'install':
		// $admin->print_header();
		$admin->print_success($msg, $js_back);
		break;

	case 'upgrade':
		upgrade_module(basename($mod_path), false);
		// $admin->print_header();
		$admin->print_success($msg, $js_back);
		break;
	
	case 'uninstall':
		// $admin->print_header();
		$admin->print_success($msg, $js_back);
		break;
}

