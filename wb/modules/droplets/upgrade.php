<?php
/**
 *
 * @category        module
 * @package         droplet
 * @author          Ruud Eisinga (Ruud) John (PCWacht)
 * @author          WebsiteBaker Project
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
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {

	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

if(!function_exists('insertDropletFile')) { require('droplets.functions.php'); }

	function mod_droplets_upgrade($bDebug=false) {
		global $admin;
		$OK  = ' <span style="color:#006400; font-weight:bold;">OK</span> ';
		$FAIL = ' <span style="color:#ff0000; font-weight:bold;">FAILED</span> ';
		$database=WbDatabase::getInstance();
		$msg = array();
		$callingScript = $_SERVER["SCRIPT_NAME"];
		// check if upgrade startet by upgrade-script to echo a message
		$tmp = 'upgrade-script.php';
		$globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;
// check for missing tables, if true stop the upgrade
		$aTable = array('mod_droplets');
		$aPackage = UpgradeHelper::existsAllTables($aTable);
		if( sizeof($aPackage) > 0){
			$msg[] =  'TABLE '.implode(' missing! '.$FAIL.'<br />TABLE ',$aPackage).' missing! '.$FAIL;
			$msg[] = 'Droplets upgrade failed'." $FAIL";
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
			$table_name = $database->TablePrefix.'mod_droplets';
			$description = "INT NOT NULL DEFAULT '0' AFTER `active`";
			$field_name = 'show_wysiwyg';
			if(!$database->field_exists($table_name,$field_name)) {
				$database->field_add($table_name, $field_name, $description);
				$msg[] = 'Add field `show_wysiwyg` AFTER `active`';
			} else {
				$msg[] = 'Field `show_wysiwyg` already exists'." $OK";
			}
			$field_name = 'admin_view';
			if(!$database->field_exists($table_name,$field_name)) {
				$database->field_add($table_name, $field_name, $description);
				$msg[] = 'Add field `admin_view` AFTER `active`';
			} else {
				$msg[] = 'Field `admin_view` already exists'." $OK";
			}
			$field_name = 'admin_edit';
			if(!$database->field_exists($table_name,$field_name)) {
				$database->field_add($table_name, $field_name, $description);
				$msg[] = 'Add field `admin_edit` AFTER `active`';
			} else {
				$msg[] = 'Field `admin_edit` already exists'." $OK";
			}

			$sBaseDir = realpath(dirname(__FILE__).'/example/');
			$sBaseDir    = rtrim(str_replace('\\', '/', $sBaseDir), '/').'/';
			$aDropletFiles = getDropletFromFiles($sBaseDir);

			$bOverwriteDroplets = false;
			insertDropletFile($aDropletFiles,$msg,$bOverwriteDroplets,$admin);
// only for upgrade-script
			if($globalStarted) {
				if($bDebug) {
					echo '<strong>'.implode('<br />',$msg).'</strong><br />';
				}
			}
		}
		$msg[] = 'Droplets upgrade successfull finished ';
		if($globalStarted) {
			echo "<strong>Droplets upgrade successfull finished $OK</strong><br />";
		}
		return ( ($globalStarted==true ) ? $globalStarted : $msg);
	}
// ------------------------------------

$bDebugModus = ((isset($bDebugModus)) ? $bDebugModus : false);
if( is_array($msg = mod_droplets_upgrade($bDebugModus))) {
	echo '<strong>'.implode('<br />',$msg).'</strong><br />';
}
