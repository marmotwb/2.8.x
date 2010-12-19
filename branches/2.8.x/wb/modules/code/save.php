<?php
/**
 *
 * @category        modules
 * @package         code
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

// Update the mod_wysiwygs table with the contents
if(isset($_POST['content'])) {
	$tags = array('<?php', '?>' , '<?');
	$content = $admin->add_slashes(str_replace($tags, '', $_POST['content']));
	$query = "UPDATE ".TABLE_PREFIX."mod_code SET content = '$content' WHERE section_id = '$section_id'";
	$database->query($query);	
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