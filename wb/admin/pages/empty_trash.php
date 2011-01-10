<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL: http://svn282.websitebaker-dev.de/branches/2.8.x/wb/admin/pages/empty_trash.php $
 * @lastmodified    $Date: 2010-05-29 10:36:20 +0200 (Sa, 29. Mai 2010) $
 *
 */

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages');

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Get page list from database
// $database = new database();
$query = "SELECT * FROM ".TABLE_PREFIX."pages WHERE visibility = 'deleted' ORDER BY level DESC";
$get_pages = $database->query($query);

// Insert values into main page list
if($get_pages->numRows() > 0)	{
	while($page = $get_pages->fetchRow()) {
		// Delete page subs
		$sub_pages = get_subs($page['page_id'], array());
		foreach($sub_pages AS $sub_page_id) {
			delete_page($sub_page_id);
		}	
		// Delete page
		delete_page($page['page_id']);
	}
}

// Check if there is a db error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error());
} else {
	$admin->print_success($TEXT['TRASH_EMPTIED']);
}

// Print admin 
$admin->print_footer();

?>