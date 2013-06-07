<?php
/**
 *
 * @category        backend
 * @package         admin
 * @subpackage      pages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
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

// Include config file
require('../../config.php');

require_once(WB_PATH."/include/jscalendar/jscalendar-functions.php");
/**/
// Create new admin object
if(!class_exists('admin')) {
	require_once(WB_PATH.'/framework/class.admin.php');
}
// suppress to print the header, so no new FTAN will be set
$admin = new admin('Pages', 'pages_modify',false);

// Make sure people are allowed to access this page
if(MANAGE_SECTIONS == false) {
	$admin->send_header('Location: '.ADMIN_URL.'/pages/index.php');
	exit(0);
}
// Get page id
$iPageId = (isset($_GET['page_id']) ? intval($_GET['page_id']) : 0);
if(!$iPageId) {
	$admin->send_header("Location: index.php");
	exit(0);
}
if (!$admin->checkFTAN()) {
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],ADMIN_URL.'/pages/sections.php?page_id='.$iPageId);
}

// After check print the header
$admin->print_header();
$sBackLink = ADMIN_URL.'/pages/sections.php?page_id='.$iPageId;

// Get perms
// Get page details
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'pages` ';
$sql .= 'WHERE `page_id`='.$iPageId;
$aMsg = array();
if(($oPage = $database->query($sql))) {
    if(!$oPage->numRows()) {
    	$aMsg[] = $MESSAGE['PAGES_NOT_FOUND'];
	}else {
		if(!($aPage = $oPage->fetchRow())) {
			$aMsg[] = $MESSAGE['PAGES_NOT_FOUND'];
		}
	}
}else {
    if($database->is_error()) {
    	$aMsg[] = $database->get_error();
    }
}
if(sizeof($aMsg)>0) {
    array_unshift($aMsg, $MESSAGE['GENERIC_NOT_UPGRADED']);
	$admin->print_error(implode('<br />',$aMsg), $sBackLink );
	exit;
}

if(!$admin->ami_group_member($aPage['admin_users']) &&
   !$admin->is_group_match($admin->get_groups_id(), $aPage['admin_groups']))
{
	$admin->print_error($MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'], $sBackLink);
}

// Set module permissions
// $module_permissions = $_SESSION['MODULE_PERMISSIONS'];
$aMsg = array();
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'sections` ';
$sql .= 'WHERE `page_id`='.$iPageId.' ';
$sql .= 'ORDER BY `position` ASC';
if(!($oSection = $database->query($sql))) {
    $aMsg = array();
    $aMsg[] = $MESSAGE['GENERIC_NOT_UPGRADED'];
    if($database->is_error()) {
    	$aMsg[] = $database->get_error();
    }
	$admin->print_error(implode('<br />',$aMsg), $sBackLink );
	exit;
}

$aSql = array();
// Loop through sections and build sql statements for update
while($section = $oSection->fetchRow(MYSQL_ASSOC)) 
{
	$section_id  = $section['section_id'];
	$sid = 'wb'.$section_id;
	$dst = date('I') ? ' UTC' : ''; // daylight saving time? date('P')
	$iBlock      = intval($admin->get_post('block'.$section_id));
	$iBlock      = ($iBlock==0) ? $section['block'] : $iBlock;

	$sStartDate  = $admin->get_post_escaped('start_date'.$section_id);
	$sStartDate  = ($sStartDate==null)||($sStartDate=='') ? 0 : jscalendar_to_timestamp($sStartDate)-TIMEZONE;
	$sEndDate    = $admin->get_post_escaped('end_date'.$section_id);
	$sEndDate    = ($sEndDate==null)||($sEndDate=='') ? 0 : jscalendar_to_timestamp($sEndDate)-TIMEZONE;
	$aSql[]  = 'UPDATE `'.TABLE_PREFIX.'sections` '
	         . 'SET `block`=\''.(int)$iBlock.'\', '
	         .     '`module`=\''.$section['module'].'\', '
	         .     '`publ_start`=\''.$sStartDate.'\','
	         .     '`publ_end`=\''.$sEndDate.'\' '
	         . 'WHERE `section_id`='.(int)$section_id;
}
// Update all of the sql statements
foreach( $aSql as $sSql ) {
	if(!$database->query($sSql)) {
	    $aMsg = array();
	    $aMsg[] = $MESSAGE['GENERIC_NOT_UPGRADED'];
	    if($database->is_error()) {
	        $aMsg[] = $database->get_error();
	    }
	$admin->print_error(implode('<br />',$aMsg), $sBackLink );
	}
}

$admin->print_success($MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'], $sBackLink );
// Print admin footer
$admin->print_footer();
