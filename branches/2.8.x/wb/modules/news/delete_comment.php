<?php
/**
 *
 * @category        modules
 * @package         news
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
$update_when_modified = true; // Tells script to update when this page was last updated
require(WB_PATH.'/modules/admin.php');

$cid = $admin->checkIDKEY('comment_id', false, 'GET');
$pid = $admin->checkIDKEY('post_id', false, 'GET');
if (!$pid || !$cid) {
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL);
	exit();
} else {
	$comment_id = $cid;
	$post_id = $admin->getIDKEY($pid);
}

// Update row
$database->query("DELETE FROM ".TABLE_PREFIX."mod_news_comments  WHERE comment_id = '$comment_id'");

// Check if there is a db error, otherwise say successful
if($database->is_error())
{
	$admin->print_error($database->get_error(), WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.'&section_id='.$section_id.'&post_id='.$post_id);
}
else
{
	$admin->print_success($TEXT['SUCCESS'], WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.'&section_id='.$section_id.'&post_id='.$post_id);
}

// Print admin footer
$admin->print_footer();

?>