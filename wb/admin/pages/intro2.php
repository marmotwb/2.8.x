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
 * @filesource		$HeadURL: http://svn.websitebaker2.org/branches/2.8.x/wb/admin/users/save.php $
 * @lastmodified    $Date: 2011-01-10 13:21:47 +0100 (Mo, 10. Jan 2011) $
 *
 */

// Get posted content
if(!isset($_POST['content'])) {
	header("Location: intro".PAGE_EXTENSION."");
	exit(0);
} else {
	$content = $_POST['content'];
}

// Create new admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_intro');

$content=$admin->strip_slashes($content);

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Write new content
$filename = WB_PATH.PAGES_DIRECTORY.'/intro'.PAGE_EXTENSION;
$handle = fopen($filename, 'w');
if(is_writable($filename)) {
	if(fwrite($handle, $content)) {
		fclose($handle);
		change_mode($filename, 'file');
		$admin->print_success($MESSAGE['PAGES']['INTRO_SAVED']);
	} else {
		fclose($handle);
		$admin->print_error($MESSAGE['PAGES']['INTRO_NOT_WRITABLE']);
	}
} else {
	$admin->print_error($MESSAGE['PAGES']['INTRO_NOT_WRITABLE']);
}

// Print admin footer
$admin->print_footer();

?>