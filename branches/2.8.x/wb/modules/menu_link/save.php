<?php
/**
 *
 * @category        modules
 * @package         menu_link
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

require_once('../../config.php');

// Include WB admin wrapper script
$update_when_modified = true; // Tells script to update when this page was last updated
require(WB_PATH.'/modules/admin.php');

if (!$admin->checkFTAN())
{
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL);
	exit();
}

// Update id, anchor and target
if(isset($_POST['menu_link'])) {
	$foreign_page_id = $admin->add_slashes($_POST['menu_link']);
	$page_target = $admin->add_slashes($_POST['page_target']);
	$url_target = $admin->add_slashes($_POST['target']);
	$r_type = $admin->add_slashes($_POST['r_type']);
	if(isset($_POST['extern']))
		$extern = $admin->add_slashes($_POST['extern']);
	else
		$extern='';

	$table_pages = TABLE_PREFIX.'pages';
	$table_mod = TABLE_PREFIX.'mod_menu_link';
	$database->query("UPDATE `$table_pages` SET `target` = '$url_target' WHERE `page_id` = '$page_id'");
	$database->query("UPDATE `$table_mod` SET `target_page_id` = '$foreign_page_id', `anchor` = '$page_target', `extern` = '$extern', `redirect_type` = '$r_type' WHERE `page_id` = '$page_id'");
}

// Check if there is a database error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error(), $js_back);
} else {
	$admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// Print admin footer
$admin->print_footer();

?>