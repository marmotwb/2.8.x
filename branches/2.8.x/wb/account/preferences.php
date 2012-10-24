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

// Include config file
$config_file = realpath('../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require_once($config_file);
}

if(!class_exists('frontend', false)){ include(WB_PATH.'/framework/class.frontend.php'); }

require_once(WB_PATH.'/framework/functions.php');

$wb = new frontend(false);
$permission = new admin('##skip##');

if(!FRONTEND_LOGIN) {
	$wb->send_header('Location: '.WB_URL.'/');
	exit(0);
}

if ($wb->is_authenticated()==false) {
	$wb->send_header('Location: '.WB_URL.'/account/login.php');
	exit(0);
}

if ($permission->get_permission('preferences')==false) {
	$wb->send_header('Location: '.WB_URL.'/');
	exit(0);
}

$page_id = defined('REFERRER_ID') ? REFERRER_ID : isset($_SESSION['PAGE_ID']) ? $_SESSION['PAGE_ID'] : 0;

// Required page details
$page_description = '';
$page_keywords = '';
// Work out level
$level = ($page_id > 0 )? level_count($page_id): $page_id;
// Work out root parent
$root_parent = ($page_id > 0 )? root_parent($page_id): $page_id;

define('PAGE_ID', $page_id);
define('ROOT_PARENT', $root_parent);
define('PARENT', 0);
define('LEVEL', $level);

define('PAGE_TITLE', $MENU['PREFERENCES']);
define('MENU_TITLE', $MENU['PREFERENCES']);
define('MODULE', '');
define('VISIBILITY', 'public');

define('PAGE_CONTENT', WB_PATH.'/account/preferences_form.php');

// Include the index (wrapper) file
require(WB_PATH.'/index.php');
