<?php
/**
 *
 * @category        backend
 * @package         wysiwyg
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
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

// suppress to print the header, so no new FTAN will be set
$admin_header = false;
// Tells script to update when this page was last updated
$update_when_modified = true;
// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}
// After check print the header
$admin->print_header();

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

$MEDIA_URL = WB_URL.MEDIA_DIRECTORY;
// Update the mod_wysiwygs table with the contents
if(isset($_POST['content'.$section_id])) {
    $content = $_POST['content'.$section_id];
    $searchfor = '#(<.*= *\")('.quotemeta($MEDIA_URL).')(.*\".*>)#iU';
    $content = preg_replace($searchfor, '$1{SYSVAR:MEDIA_REL}$3', $content);
    $content = $admin->add_slashes($content);
	// searching in $text will be much easier this way
	$text = umlauts_to_entities(strip_tags($content), strtoupper(DEFAULT_CHARSET), 0);
	$query = "UPDATE ".TABLE_PREFIX."mod_wysiwyg SET content = '$content', text = '$text' WHERE section_id = '$section_id'";
	$database->query($query);	
}

$sec_anchor = (defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? '#'.SEC_ANCHOR.$section['section_id'] : '' );
if(defined('EDIT_ONE_SECTION') and EDIT_ONE_SECTION)
{
    $edit_page = ADMIN_URL.'/pages/modify.php?page_id='.$page_id.'&wysiwyg='.$section_id;
} else {
    $edit_page = ADMIN_URL.'/pages/modify.php?page_id='.$page_id.$sec_anchor;
}

// Check if there is a database error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error(), $js_back);
} else {
	$admin->print_success($MESSAGE['PAGES']['SAVED'], $edit_page );
}

// Print admin footer
$admin->print_footer();
