<?php
/**
 *
 * @category        admin
 * @package         groups
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL:  $
 * @lastmodified    $Date:  $
 *
 */

// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Access', 'groups_add');

if (!$admin->checkFTAN())
{
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL);
	exit();
}

// Gather details entered
$group_name = $admin->get_post('group_name');

// Create a javascript back link
$js_back = "javascript: history.go(-1);";

// Check values
if($group_name == "") {
	$admin->print_error($MESSAGE['GROUPS']['GROUP_NAME_BLANK'], $js_back);
}
$results = $database->query("SELECT * FROM ".TABLE_PREFIX."groups WHERE name = '$group_name'");  
if($results->numRows()>0) {
	$admin->print_error($MESSAGE['GROUPS']['GROUP_NAME_EXISTS'], $js_back);  
}

// Get system and module permissions
require(ADMIN_PATH.'/groups/get_permissions.php');

// Update the database
$query = "INSERT INTO ".TABLE_PREFIX."groups (name,system_permissions,module_permissions,template_permissions) VALUES ('$group_name','$system_permissions','$module_permissions','$template_permissions')";

$database->query($query);
if($database->is_error()) {
	$admin->print_error($database->get_error());
} else {
	$admin->print_success($MESSAGE['GROUPS']['ADDED'], ADMIN_URL.'/groups/index.php');
}

// Print admin footer
$admin->print_footer();

?>