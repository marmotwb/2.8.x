<?php
/**
 *
 * @category        modules
 * @package         JsAdmin
 * @author          WebsiteBaker Project, modified by Swen Uth for Website Baker 2.7
 * @copyright       (C) 2006, Stepan Riha,2009-2012, WebsiteBaker Org. e.V. 
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
if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}

if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }
$admin = new  admin('##skip##');
if(isset($_GET['page_id']) AND is_numeric($_GET['page_id']) AND is_numeric(@$_GET['position'])) {
	$position = (int)$_GET['position'];
	$bModified = true;
    $bDebug = false;
//  Include WB admin wrapper script
//	$update_when_modified = true;
//  Tells script to update when this page was last updated
//	require(WB_PATH.'/modules/admin.php');

    if( isset($_GET['file_id']) || (isset($_GET['group_id'])) ) {
    	if(isset($_GET['group_id']) && is_numeric($_GET['group_id'])) {
    		$id = (int)$_GET['group_id'];
    		$id_field = 'group_id';
    		$table = TABLE_PREFIX.'mod_download_gallery_groups';
    		$common_field = 'section_id';
    	} else {
    		$id = (int)$_GET['file_id'];
    		$id_field = 'file_id';
    		$table = TABLE_PREFIX.'mod_download_gallery_files';
    		$common_field = 'group_id';
    	}
    } elseif( isset($_GET['page_id']) || (isset($_GET['section_id'])) ) {
    	// Get common fields
    	if(isset($_GET['section_id']) && is_numeric($_GET['section_id'])) {
    		$page_id = (int)$_GET['page_id'];
    		$id = (int)$_GET['section_id'];
    		$id_field = 'section_id';
    		$common_field = 'page_id';
    		$table = TABLE_PREFIX.'sections';
    	} else {
    		$id = (int)$_GET['page_id'];
    		$id_field = 'page_id';
    		$common_field = 'parent';
    		$table = TABLE_PREFIX.'pages';
    	}
    }

    $iPageId = intval($_GET['page_id']);
	// Get current index
    $sql = 'SELECT `'.$common_field.'`,`position`,`page_id` FROM `'.$table.'` WHERE `'.$id_field.'` ='.(int)$id; //.' AND page_id='.$iPageId;
    if($oRes=$database->query($sql)) {
        if($aPage = $oRes->fetchRow(MYSQL_ASSOC)){
    		$common_id = intval($aPage[$common_field]);
    		$old_position = intval($aPage['position']);
    		$iPageId = intval($aPage['page_id']);
        }
    }

/* 
	// Get current index
	$sql = <<<EOT
SELECT `$common_field`, `position` FROM `$table` WHERE `$id_field` = $id
EOT;
	echo "$sql<br>";
	$rs = $database->query($sql);
	if($row = $rs->fetchRow()) {
		$common_id = $row[$common_field];
		$old_position = $row['position'];
	}
	echo "$old_position<br>";
	if($old_position == $position)
		return;
*/
// all echos with <pre> coded for looking in firebug console
$sSqlModify =  ($bModified == true) ? ',`modified_when` = '.time().',`modified_by` = '.$admin->get_user_id().' ' : '';
if($old_position != $position) {
	echo $output = ($bDebug == false) ? "\n" : "<pre>$sql</pre>\n";
	// Build query to update affected rows
	if($old_position < $position)
		$sql = <<<EOT
UPDATE `$table` SET `position` = `position` - 1
	WHERE `position` > $old_position AND `position` <= $position
		AND `$common_field` = $common_id
EOT;
	else
		$sql = <<<EOT
UPDATE `$table` SET `position` = `position` + 1
	WHERE `position` >= $position AND `position` < $old_position
		AND `$common_field` = $common_id
EOT;
	echo $output = ($bDebug == false) ? "\n" : "<pre>$sql</pre>\n";
	$database->query($sql);
	// Build query to update specified row
	$sql = <<<EOT
UPDATE `$table` SET `position` = $position$sSqlModify
	WHERE `$id_field` = $id
EOT;
	echo $output = ($bDebug == false) ? "\n" : "<pre>$sql</pre>\n";
	$database->query($sql);
}
} else {
	die("Missing parameters");
	header("Location: index.php");
	exit(0);
}
