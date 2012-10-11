<?php
/**
 *
 * @category        frontend
 * @package         page
 * @author          WebsiteBaker Project
 * @copyright       2009-, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Include config file
$config_file = dirname(__FILE__).'/config.php';
if(file_exists($config_file) && !defined('WB_URL'))
{
	require_once($config_file);
}

// Check if the config file has been set-up
if(!defined('TABLE_PREFIX'))
{
/*
 * Remark:  HTTP/1.1 requires a qualified URI incl. the scheme, name
 * of the host and absolute path as the argument of location. Some, but
 * not all clients will accept relative URIs also.
 */
	$host       = $_SERVER['HTTP_HOST'];
	$uri        = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
	$file       = 'install/index.php';
	$target_url = 'http://'.$host.$uri.'/'.$file;
	$sResponse  = $_SERVER['SERVER_PROTOCOL'].' 307 Temporary Redirect';
	header($sResponse);
	header('Location: '.$target_url);
	exit;	// make sure that subsequent code will not be executed
}

//require_once(WB_PATH.'/framework/class.frontend.php');

if(!class_exists('frontend', false)){ include(WB_PATH.'/framework/class.frontend.php'); }

// Create new frontend object
if (!isset($wb)) {
    $wb = new frontend();
}

// Figure out which page to display
// Stop processing if intro page was shown
$wb->page_select() or die();

// Collect info about the currently viewed page
// and check permissions
$wb->get_page_details();

// Collect general website settings
$wb->get_website_settings();

// Load functions available to templates, modules and code sections
// also, set some aliases for backward compatibility
require(WB_PATH.'/framework/frontend.functions.php');

// redirect menu-link
/**
 *
 * Removed the extra handling of menu links in index.php
 * Moved it to the view.php of module menu links.
 * Now the extra functionality of this module is seperated from the
 * core and you can uninstall it if you like.
 * Freeing the core from unnecessary code.
 *
 *
 */

ob_start();
require(WB_PATH.'/templates/'.TEMPLATE.'/index.php');
$output = ob_get_contents();
if(ob_get_length() > 0) { ob_end_clean(); }
// execute frontend output filters
	if(file_exists(WB_PATH .'/modules/output_filter/index.php')) {
		include_once(WB_PATH .'/modules/output_filter/index.php');
		if(function_exists('executeFrontendOutputFilter')) {
			$output = executeFrontendOutputFilter($output);
		}
	}
// now send complete page to the browser
echo $output;
// end of wb-script
exit;
