<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @author          Christian Sommer, WB-Project, Werner v.d. Decken
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.2
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */
// Must include code to stop this file being access directly
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

	function mod_output_filter_upgrade($bDebug=false) {
		global $OK ,$FAIL;
		$database=WbDatabase::getInstance();
		$msg = array();
		$callingScript = $_SERVER["SCRIPT_NAME"];
		// check if upgrade startet by upgrade-script to echo a message
		$tmp = 'upgrade-script.php';
		$globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;
// check for missing tables, if true stop the upgrade
		$aTable = array('mod_output_filter');
		$aPackage = UpgradeHelper::existsAllTables($aTable);
		if( sizeof($aPackage) > 0){
			$msg[] =  'TABLE '.implode(' missing! '.$FAIL.'<br />TABLE ',$aPackage).' missing! '.$FAIL;
			$msg[] = 'Output_filter upgrade failed'." $FAIL";
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
			$table_name = $database->TablePrefix.'mod_output_filter';
			$field_name = 'sys_rel';
			$description = 'INT(11) NOT NULL DEFAULT \'0\' FIRST';
			if(!$database->field_exists($table_name,$field_name)) {
				$database->field_add($table_name, $field_name, $description);
				$msg[] = 'Add field `sys_rel` FIRST'." $OK";
			} else {
				$msg[] = 'Field `sys_rel` already exists'." $OK";
			}
// change table structure
			$sTable = $database->TablePrefix.'mod_output_filter';
			$sDescription = 'int(11) NOT NULL DEFAULT \'0\'';
			$sFieldName = 'sys_rel';
			if(!$database->field_modify($sTable,$sFieldName,$sDescription)) {
				$msg[] = ''.$database->get_error();
			} else {
				$msg[] = 'Field ( `sys_rel` ) description has been changed successfully'." $OK";
			}
			$sDescription = 'int(11) NOT NULL DEFAULT \'1\'';
			$sFieldName = 'email_filter';
			if(!$database->field_modify($sTable,$sFieldName,$sDescription)) {
				$msg[] = ''.$database->get_error();
			} else {
				$msg[] = 'Field ( `email_filter` ) description has been changed successfully'." $OK";
			}
			$sFieldName = 'mailto_filter';
			if(!$database->field_modify($sTable,$sFieldName,$sDescription)) {
				$msg[] = ''.$database->get_error();
			} else {
				$msg[] = 'Field ( `mailto_filter` ) description has been changed successfully'." $OK";
			}
// only for upgrade-script
			if($globalStarted) {
				if($bDebug) {
					echo '<strong>'.implode('<br />',$msg).'</strong><br />';
				}
			}
		}
		$msg[] = 'Output_filter upgrade successfull finished '." $OK";
		if($globalStarted) {
			echo "<strong>Output_filter upgrade successfull finished $OK</strong><br />";
		}
		return ( ($globalStarted==true ) ? $globalStarted : $msg);
	}
// ------------------------------------

$bDebugModus = ((isset($bDebugModus)) ? $bDebugModus : false);
// Don't show the messages twice
if( is_array($msg = mod_output_filter_upgrade($bDebugModus)) ) {
	echo '<strong>'.implode('<br />',$msg).'</strong><br />';
}
