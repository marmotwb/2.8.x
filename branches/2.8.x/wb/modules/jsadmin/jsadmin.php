<?php
/**
 *
 * @category        modules
 * @package         JsAdmin
 * @author          WebsiteBaker Project, modified by Swen Uth for Website Baker 2.7
 * @copyright       (C) 2006, Stepan Riha
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL: http://svn.websitebaker2.org/branches/2.8.x/wb/modules/menu_link/save.php $
 * @lastmodified    $Date: 2011-01-10 13:21:47 +0100 (Mo, 10 Jan 2011) $
 *
*/

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }

function get_setting($name, $default = '') {
	global $database;
	$rs = $database->query("SELECT value FROM ".TABLE_PREFIX."mod_jsadmin WHERE name = '".$name."'");
	if($row = $rs->fetchRow())
		return $row['value'];
	return
		$default;
}

function save_setting($name, $value) {
	global $database;

	$prev_value = get_setting($name, false);

	if($prev_value === false) {
		$database->query("INSERT INTO ".TABLE_PREFIX."mod_jsadmin (name,value) VALUES ('$name','$value')");
	} else {
		$database->query("UPDATE ".TABLE_PREFIX."mod_jsadmin SET value = '$value' WHERE name = '$name'");
	}
}

// the follwing variables to use and check existing the YUI
$WB_MAIN_RELATIVE_PATH="../..";
$YUI_PATH = '/include/yui';
$js_yui_min = "-min";  // option for smaller code so faster
$js_yui_scripts = Array();
$js_yui_scripts[] = $YUI_PATH.'/yahoo/yahoo'.$js_yui_min.'.js';
$js_yui_scripts[] = $YUI_PATH.'/event/event'.$js_yui_min.'.js';
$js_yui_scripts[] = $YUI_PATH.'/dom/dom'.$js_yui_min.'.js';
$js_yui_scripts[] = $YUI_PATH.'/connection/connection'.$js_yui_min.'.js';
$js_yui_scripts[] = $YUI_PATH.'/dragdrop/dragdrop'.$js_yui_min.'.js';

?>