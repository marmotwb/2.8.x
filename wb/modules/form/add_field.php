<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description
 */

// Include config file
$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require($config_file);

}

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

// Include the ordering class
require(WB_PATH.'/framework/class.order.php');
// Get new order
$order = new order(TABLE_PREFIX.'mod_form_fields', 'position', 'field_id', 'section_id');
$position = $order->get_new($section_id);

$field_id = 0;
try {
// Insert new row into database
	$sql = 'INSERT INTO `'.TABLE_PREFIX.'mod_form_fields` '
	     . 'SET `section_id`='.$section_id.', '
	     .     '`page_id`='.$page_id.', '
	     .     '`position`='.$position.', '
	     .     '`required`=0';
	$database->query($sql);
	$field_id = $database->LastInsertId;
} catch(WbDatabaseException $e) {
	$admin->print_error($database->get_error(), WB_URL.'/modules/form/modify_field.php?page_id='.$page_id.'&section_id='.$section_id.'&field_id='.$admin->getIDKEY($field_id));
}

// Insert new row into database
//$database->query("INSERT INTO ".TABLE_PREFIX."mod_form_fields (section_id,page_id,position,required) VALUES ('$section_id','$page_id','$position','0')");

// Get the id
//$field_id = $database->get_one("SELECT LAST_INSERT_ID()");

// Say that a new record has been added, then redirect to modify page
//if($database->is_error()) {
//	$admin->print_error($database->get_error(), WB_URL.'/modules/form/modify_field.php?page_id='.$page_id.'&section_id='.$section_id.'&field_id='.$admin->getIDKEY($field_id));
//} else {
//	$admin->print_success($TEXT['SUCCESS'],     WB_URL.'/modules/form/modify_field.php?page_id='.$page_id.'&section_id='.$section_id.'&field_id='.$admin->getIDKEY($field_id));
//}

$admin->print_success($TEXT['SUCCESS'], WB_URL.'/modules/form/modify_field.php?page_id='.$page_id.'&section_id='.$section_id.'&field_id='.$admin->getIDKEY($field_id));
// Print admin footer
$admin->print_footer();
