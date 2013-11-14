<?php
/**
 *
 * @category        modules
 * @package         news
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require($config_file);
}

// show the info banner
$print_info_banner = true;
// Include WB admin wrapper script to fetch page_id and section_id for backlink
require(WB_PATH.'/modules/admin.php');

// Make news post access files dir
if(!function_exists('make_dir')) {require(WB_PATH.'/framework/functions.php');}

if(!make_dir(WB_PATH.PAGES_DIRECTORY.'/posts')) {
	$admin->print_error($MESSAGE['GENERIC_BAD_PERMISSIONS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id );
} else {
    // Include the ordering class
    require(WB_PATH.'/framework/class.order.php');
    // Get new order
    $order = new order(TABLE_PREFIX.'mod_news_posts', 'position', 'post_id', 'section_id');
    $position = $order->get_new($section_id);
    $post_id = 0;
    
    try {
    // Get default commenting
    	$sql = 'SELECT `commenting` FROM `'.TABLE_PREFIX.'mod_news_settings` '
    	     . 'WHERE `section_id`='.(int)$section_id;
    	$query_settings = $database->query($sql);
    	$fetch_settings = $query_settings->fetchRow(MYSQL_ASSOC);
    	$commenting = $fetch_settings['commenting'];
    // Insert new row into database
    	$sql = 'INSERT INTO `'.TABLE_PREFIX.'mod_news_posts` '
    	     . 'SET `section_id`='.$section_id.', '
    	     .     '`page_id`='.$page_id.', '
    	     .     '`position`='.$position.', '
    	     .     '`commenting`=\''.$commenting.'\', '
    	     .     '`created_when`='.time().', '
    	     .     '`created_by`='.(int)$admin->get_user_id().', '
    	     .     '`posted_when`='.time().', '
    	     .     '`posted_by`='.(int)$admin->get_user_id().', '
    	     .     '`active`=1';
    	$database->query($sql);
    	$post_id = $admin->getIDKEY($database->LastInsertId);
    } catch(WbDatabaseException $e) {
        $sSectionIdPrefix = ( defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? SEC_ANCHOR : 'Sec' );
    	$admin->print_error($database->get_error(), WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.'#'.$sSectionIdPrefix.$section_id );
    }
        $admin->print_success($TEXT['SUCCESS'], WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.'&section_id='.$section_id.'&post_id='.$post_id );
    }
$admin->print_footer();
