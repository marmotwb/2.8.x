<?php
/**
 *
 * @category        backend
 * @package         admin
 * @subpackage      pages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
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

// Include config file
require('../../config.php');

require_once(WB_PATH."/include/jscalendar/jscalendar-functions.php");
/**/
// Create new admin object
require_once(WB_PATH.'/framework/class.admin.php');
// suppress to print the header, so no new FTAN will be set
$admin = new admin('Pages', 'pages_modify',false);

// Make sure people are allowed to access this page
if(MANAGE_SECTIONS == false) {
	$admin->send_header('Location: '.ADMIN_URL.'/pages/index.php');
	exit(0);
}

// Get page id
if(!isset($_GET['page_id']) || !is_numeric($_GET['page_id'])) {
	$admin->send_header("Location: index.php");
	exit(0);
} else {
	$page_id = (int)$_GET['page_id'];
}

if (!$admin->checkFTAN())
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],ADMIN_URL.'/pages/sections.php?page_id='.$page_id);
}
/*
if( (!($page_id = $admin->checkIDKEY('page_id', 0, $_SERVER['REQUEST_METHOD']))) )
{
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
	exit();
}
*/

// After check print the header
$admin->print_header();

$sBackLink = ADMIN_URL.'/pages/sections.php?page_id='.$page_id;

// Get perms
// Get page details
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'pages` ';
$sql .= 'WHERE page_id = '.$page_id.'';

if($oPage = $database->query($sql)){
    $results_array = $oPage->fetchRow();
} else {
	$admin->print_error($database->get_error());
    $aMsg = array();
    $aMsg[] = $MESSAGE['GENERIC_NOT_UPGRADED'];
    if($results->numRows() == 0) {
    	$aMsg[] = $MESSAGE['PAGES_NOT_FOUND'];
    }
    if($database->is_error()) {
    	$aMsg[] = $database->get_error();
    }
	$admin->print_error(implode('<br />',$aMsg), $sBackLink );
}

$old_admin_users  = explode(',', $results_array['admin_users']);
$old_admin_groups = explode(',', $results_array['admin_groups']);
$in_old_group = false;
foreach($admin->get_groups_id() as $cur_gid){
    if (in_array($cur_gid, $old_admin_groups)) {
        $in_old_group = TRUE;
    }
}
if((!$in_old_group) && !is_numeric(array_search($admin->get_user_id(), $old_admin_users))) {
	$admin->print_error($MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS']);
}

// Set module permissions
$module_permissions = $_SESSION['MODULE_PERMISSIONS'];
$aMsg = array();
$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'sections` ';
$sql .= 'WHERE page_id = '.$page_id.' ';
$sql .= 'ORDER BY position ASC';

if(!($oSection = $database->query($sql))) {
    $aMsg = array();
    $aMsg[] = $MESSAGE['GENERIC_NOT_UPGRADED'];
    if($database->is_error()) {
    	$aMsg[] = $database->get_error();
    }
	$admin->print_error(implode('<br />',$aMsg), $sBackLink );
}

$aSqlSection = array();
// Loop through sections and set sql values for update
while($section = $oSection->fetchRow(MYSQL_ASSOC)) {

    $section_id  = $section['section_id'];
    $sid = 'wb'.$section_id;

    $dst = date('I') ? ' UTC' : ''; // daylight saving time? date('P')

    $iBlock      = $admin->get_post_escaped('block'.$section_id);
    $iBlock      = ($iBlock==null) ? $section['block'] : $iBlock;

    $sStartDate  = $admin->get_post_escaped('start_date'.$section_id);;
    $sStartDate  = ($sStartDate==null)||($sStartDate=='') ? 0 : jscalendar_to_timestamp($sStartDate)-TIMEZONE;

    $sEndDate   = $admin->get_post_escaped('end_date'.$section_id);
    $sEndDate   = ($sEndDate==null)||($sEndDate=='') ? 0 : jscalendar_to_timestamp($sEndDate)-TIMEZONE;

    $aSqlSection[$sid][]  = 'UPDATE `'.TABLE_PREFIX.'sections` SET ';
    $aSqlSection[$sid][] .= '`block`= \''.$iBlock.'\', ';
    $aSqlSection[$sid][] .= '`module` = \''.$section['module'].'\', ';
    $aSqlSection[$sid][] .= '`publ_start` = \''.$sStartDate.'\',';
    $aSqlSection[$sid][] .= '`publ_end` = \''.$sEndDate.'\' ';
    $aSqlSection[$sid][] .= 'WHERE `section_id` = \''.$section_id.'\' ';
}

foreach( $aSqlSection as $sid ) {

    $sql = implode('',$sid);
    if(!($oSection = $database->query($sql))) {
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
