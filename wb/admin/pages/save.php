<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Get page & section id
if(!isset($_POST['page_id']) OR !is_numeric($_POST['page_id'])) {
	header("Location: index.php");
	exit(0);
} else {
	$page_id = intval($_POST['page_id']);
}
if(!isset($_POST['section_id']) OR !is_numeric($_POST['section_id'])) {
	header("Location: index.php");
	exit(0);
} else {
	$section_id = intval($_POST['section_id']);
}

// Create new admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_modify');

// Get perms
$sql  = 'SELECT `admin_groups`,`admin_users` FROM `'.TABLE_PREFIX.'pages` ';
$sql .= 'WHERE `page_id` = '.$page_id;
$results = $database->query($sql);
$results_array = $results->fetchRow();
$old_admin_groups = explode(',', str_replace('_', '', $results_array['admin_groups']));
$old_admin_users = explode(',', str_replace('_', '', $results_array['admin_users']));
$in_old_group = FALSE;
foreach($admin->get_groups_id() as $cur_gid)
{
    if (in_array($cur_gid, $old_admin_groups))
    {
        $in_old_group = TRUE;
    }
}
if((!$in_old_group) AND !is_numeric(array_search($admin->get_user_id(), $old_admin_users)))
{
	$admin->print_error($MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS']);
}
// Get page module
$sql  = 'SELECT `module` FROM `'.TABLE_PREFIX.'sections` ';
$sql .= 'WHERE `page_id`='.$page_id.' AND `section_id`='.$section_id;
$module = $database->get_one($sql);
if(!$module)
{
	$admin->print_error( $database->is_error() ? $database->get_error() : $MESSAGE['PAGES']['NOT_FOUND']);
}
//$results = $database->query($sql);
//if($database->is_error()) {
//	$admin->print_error($database->get_error());
//}
//if($results->numRows() == 0) {
//	$admin->print_error($MESSAGE['PAGES']['NOT_FOUND']);
//}
//$results_array = $results->fetchRow();
//$module = $results_array['module'];

// Update the pages table
$now = time();
$sql  = 'UPDATE `'.TABLE_PREFIX.'pages` SET ';
$sql .= '`modified_when` = '.$now.', `modified_by` = '.$admin->get_user_id().' ';
$sql .= 'WHERE `page_id` = '.$page_id;
$database->query($sql);

// Include the modules saving script if it exists
if(file_exists(WB_PATH.'/modules/'.$module.'/save.php'))
{
	include_once(WB_PATH.'/modules/'.$module.'/save.php');
}
// Check if there is a db error, otherwise say successful
if($database->is_error())
{
	$admin->print_error($database->get_error(), $js_back);
} else {
	$admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// Print admin footer
$admin->print_footer();

?>