<?php
/**
 *
 * @category        module
 * @package         droplet
 * @author          Ruud Eisinga (Ruud) John (PCWacht)
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
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

require('../../config.php');

// Include WB admin wrapper script
require_once(WB_PATH.'/framework/class.admin.php');
require_once(WB_PATH.'/framework/functions.php');

// check website baker platform (with WB 2.7, Admin-Tools were moved out of settings dialogue)
if(file_exists(ADMIN_PATH .'/admintools/tool.php')) {
	$admintool_link = ADMIN_URL .'/admintools/index.php';
	$module_edit_link = ADMIN_URL .'/admintools/tool.php?tool=droplets';
	$admin = new admin('admintools', 'admintools');
} else {
	$admintool_link = ADMIN_URL .'/settings/index.php?advanced=yes#administration_tools"';
	$module_edit_link = ADMIN_URL .'/settings/tool.php?tool=droplets';
	$admin = new admin('Settings', 'settings_advanced');
}

// Get id
$droplet_id = $admin->checkIDKEY('droplet_id', false, 'GET');
if (!$droplet_id) {
 $admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL);
 exit();
}

// Delete droplet
$database->query("DELETE FROM ".TABLE_PREFIX."mod_droplets WHERE id = '$droplet_id' LIMIT 1");

// Check if there is a db error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error(), WB_URL.'/modules/droplets/modify_droplet.php?droplet_id='.$droplet_id);
} else {
    $admin->print_success($TEXT['SUCCESS'], $module_edit_link);
}

// Print admin footer
$admin->print_footer();

?>