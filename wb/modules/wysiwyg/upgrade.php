<?php
/**
 *
 * @category        modules
 * @package         wysiwyg
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.3
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

	function mod_wysiwyg_upgrade ($bDebug=false) {
		global $OK ,$FAIL;
		$database=WbDatabase::getInstance();
		$msg = array();
		$callingScript = $_SERVER["SCRIPT_NAME"];
		// check if upgrade startet by upgrade-script to echo a message
		$tmp = 'upgrade-script.php';
		$globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;
// check for missing tables, if true stop the upgrade
		$aTable = array('mod_wysiwyg');
		$aPackage = UpgradeHelper::existsAllTables($aTable);
		if( sizeof($aPackage) > 0){
			$msg[] =  'TABLE '.implode(' missing! '.$FAIL.'<br />TABLE ',$aPackage).' missing! '.$FAIL;
			$msg[] = 'WYSIWYG upgrade failed '." $FAIL";
			if($globalStarted) {
				echo '<strong>'.implode('<br />',$msg).'</strong><br />';
			}
			return ( ($globalStarted==true ) ? $globalStarted : $msg);
		} else {
			for($x=0; $x<sizeof($aTable);$x++) {
				if(($sOldType = $database->getTableEngine($database->TablePrefix.$aTable[$x]))) {
					if(('myisam' != strtolower($sOldType))) {
						if(!$database->query('ALTER TABLE `'.$database->TablePrefix.$aTable[$x].'` Engine = \'MyISAM\' ')) {
							$msg[] = $database->get_error();
						} else{
							$msg[] = 'TABLE `'.$database->TablePrefix.$aTable[$x].'` changed to Engine = \'MyISAM\''." $OK";
						}
					} else {
						 $msg[] = 'TABLE `'.$database->TablePrefix.$aTable[$x].'` has Engine = \'MyISAM\''." $OK";
					}
				} else {
					$msg[] = $database->get_error();
				}
			}
// add change or missing index
			$sTable = $database->TablePrefix.'mod_wysiwyg';
			if($database->index_exists($sTable, 'PRIMARY')) {
				$sql = 'ALTER TABLE `'.$database->DbName.'`.`'.$sTable.'` DROP PRIMARY KEY';
				if(!$database->query($sql)) {
					$msg[] = ''.$database->get_error();
				}
			}
			if(!$database->index_add($sTable, '', 'section_id', 'PRIMARY')) {
				$msg[] = ''.$database->get_error();
			} else {
				$msg[] = 'Create PRIMARY KEY ( `section_id` )'." $OK";
			}
// change table structure
			$sTable = $database->TablePrefix.'mod_wysiwyg';
			$sDescription = 'LONGTEXT NOT NULL';
			$sFieldName = 'text';
			if(!$database->field_modify($sTable,$sFieldName,$sDescription)) {
				$msg[] = ''.$database->get_error();
			} else {
				$msg[] = 'Field ( `text` ) description has been changed successfully'." $OK";
			}
			$sFieldName = 'content';
			if(!$database->field_modify($sTable,$sFieldName,$sDescription)) {
				$msg[] = ''.$database->get_error();
			} else {
				$msg[] = 'Field ( `content` ) description has been changed successfully'." $OK";
			}
// change internal absolute links into relative links
			$sTable = $database->TablePrefix.'mod_wysiwyg';
			$sql  = 'UPDATE `'.$sTable.'` ';
			$sql .= 'SET `content` = REPLACE(`content`, \'"'.WB_URL.MEDIA_DIRECTORY.'\', \'"{SYSVAR:MEDIA_REL}\')';
			if (!$database->query($sql)) {
				$msg[] = ''.$database->get_error();
			} else {
				$msg[] = 'Change internal absolute links into relative links'." $OK";
			}
// only for $callingScript upgrade-script.php
			if($globalStarted) {
				if($bDebug) {
					echo '<strong>'.implode('<br />',$msg).'</strong><br />';
				}
			}
		}
		$msg[] = 'WYSIWYG upgrade successfull finished'." $OK";
		if($globalStarted) {
			echo "<strong>WYSIWYG upgrade successfull finished $OK</strong><br />";
		}
		return ( ($globalStarted==true ) ? $globalStarted : $msg);
	}
// ------------------------------------
$bDebugModus = ((isset($bDebugModus)) ? $bDebugModus : false);
if( is_array($msg = mod_wysiwyg_upgrade($bDebugModus)) ) {
	echo '<strong>'.implode('<br />',$msg).'</strong><br />';
}
