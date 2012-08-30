<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich,WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Create new admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_intro',false);
if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}

// Get posted content
if(!isset($_POST['content'])) {
	header("Location: intro".PAGE_EXTENSION."");
	exit(0);
} else {
	$content = $admin->strip_slashes($_POST['content']);
}

// $content = $admin->strip_slashes($content);

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

$admin->print_header();
// Write new content
$filename = WB_PATH.PAGES_DIRECTORY.'/intro'.PAGE_EXTENSION;
if(file_put_contents($filename, utf8_encode($content))===false){
	$admin->print_error($MESSAGE['PAGES_NOT_SAVED']);
} else {
	change_mode($filename);
	$admin->print_success($MESSAGE['PAGES_INTRO_SAVED']);
}
if(!is_writable($filename)) {
	$admin->print_error($MESSAGE['PAGES_INTRO_NOT_WRITABLE']);
}

// Print admin footer
$admin->print_footer();
