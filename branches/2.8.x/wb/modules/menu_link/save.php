<?php
/**
 *
 * @category        modules
 * @package         menu_link
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.4
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
*/

require_once('../../config.php');

$admin_header = false;
// Tells script to update when this page was last updated
$update_when_modified = true;
// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');
$backlink = ADMIN_URL.'/pages/modify.php?page_id='.(int)$page_id;
if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],$backlink );
}
$admin->print_header();

// Update id, anchor and target
if(isset($_POST['menu_link'])) {
	$foreign_page_id = intval($_POST['menu_link']);
	$url_target = $admin->StripCodeFromText($_POST['target']);
	$r_type = intval($_POST['r_type']);
	$page_target = $admin->StripCodeFromText($_POST['page_target']);
	if(isset($_POST['extern']))
		$extern = $admin->StripCodeFromText($_POST['extern']);
	else
		$extern='';

	$table_pages = TABLE_PREFIX.'pages';
	$table_mod = TABLE_PREFIX.'mod_menu_link';
	$database->query("UPDATE `$table_pages` SET `target` = '$url_target' WHERE `page_id` = '$page_id'");
//	$database->query("UPDATE `$table_mod` SET `target_page_id` = '$foreign_page_id', `anchor` = '$page_target', `extern` = '$extern', `redirect_type` = '$r_type' WHERE `page_id` = '$page_id'");

	// Check that it doesn't already exist
	$sqlwhere = 'WHERE `page_id`='.$page_id.'';
	$sqlOne  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'mod_menu_link` '.$sqlwhere;
	if( $database->get_one($sqlOne) ) {
		$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_menu_link`  SET';
	}else{
		// Load into DB
		$sql  = 'INSERT INTO `'.TABLE_PREFIX.'mod_menu_link`  SET ';
		$sqlwhere = '';
		$sql .= '`section_id`='.$section_id.', '
		      . '`page_id`='.$page_id.', ';
	}
	$sql .= '`target_page_id` = \''.$foreign_page_id.'\', '
	      . '`anchor` =  \''.$database->escapeString($page_target).'\', '
	      . '`extern` = \''.$database->escapeString($extern).'\', '
	      . '`redirect_type` = \''.$r_type.'\' '
	      . $sqlwhere;
}

// Check if there is a database error, otherwise say successful
if($database->query($sql)) {
	$admin->print_success($MESSAGE['PAGES_SAVED'],$backlink );
} else {
	$admin->print_error($database->get_error(), $js_back);
}

// Print admin footer
$admin->print_footer();
