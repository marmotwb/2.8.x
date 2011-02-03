<?php
/**
 *
 * @category        admin
 * @package         admintools
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL:  $
 * @lastmodified    $Date:  $
 *
 */

// Get dir name and target location
if(!isset($_POST['name']) OR $_POST['name'] == '') {
	header("Location: index.php");
	exit(0);
} else {
	$name = $_POST['name'];
}
if(!isset($_POST['target']) OR $_POST['target'] == '') {
	header("Location: index.php");
	exit(0);
} else {
	$target = $_POST['target'];
}

// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Media', 'media_create');

if (!$admin->checkFTAN())
{
	$admin->print_error('CR5::'.$MESSAGE['GENERIC_SECURITY_ACCESS']);
	exit();
}

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Check to see if name or target contains ../
if(strstr($name, '..')) {
	$admin->print_error($MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH']);
}
if (!check_media_path($target, false)) {
	w_debug("target: $target");
	$admin->print_error($MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH']);
}

// Remove bad characters
$name = media_filename($name);
  
// Create relative path of the new dir name
$relative = WB_PATH.$target.'/'.$name;

// Check to see if the folder already exists
if(file_exists($relative)) {
	$admin->print_error($MESSAGE['MEDIA']['DIR_EXISTS']);
}

// Try and make the dir
if(make_dir($relative)) {
	// Create index.php file
	$content = ''.
"<?php

header('Location: ../');

?>";
	$handle = fopen($relative.'/index.php', 'w');
	fwrite($handle, $content);
	fclose($handle);
	change_mode($relative.'/index.php', 'file');
	$admin->print_success($MESSAGE['MEDIA']['DIR_MADE']);
} else {
	$admin->print_error($MESSAGE['MEDIA']['DIR_NOT_MADE']);
}

// Print admin 
$admin->print_footer();

?>