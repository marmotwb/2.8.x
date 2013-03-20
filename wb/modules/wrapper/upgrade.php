<?php
/**
 *
 * @category        modules
 * @package         wrapper
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
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
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

	function mod_wrapper_upgrade($bDebug=false) {
		global $OK ,$FAIL;
		$database=WbDatabase::getInstance();
		$msg = array();
		$callingScript = $_SERVER["SCRIPT_NAME"];
		// check if upgrade startet by upgrade-script to echo a message
		$tmp = 'upgrade-script.php';
		$globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;
// check for missing tables, if true stop the upgrade
		$aTable = array('mod_wrapper');
		$aPackage = UpgradeHelper::existsAllTables($aTable);
		if( sizeof($aPackage) > 0){
			$msg[] =  'TABLE '.implode(' missing! '.$FAIL.'<br />TABLE ',$aPackage).' missing! '.$FAIL;
			$msg[] = 'Mod_Wrapper upgrade failed'." $FAIL";
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
// only for upgrade-script
			if($globalStarted) {
				if($bDebug) {
					echo '<strong>'.implode('<br />',$msg).'</strong><br />';
				}
			}
		}
		$msg[] = 'Mod_Wrapper upgrade successfull finished '." $OK";
		if($globalStarted) {
			echo "<strong>Mod_Wrapper upgrade successfull finished $OK</strong><br />";
		}
		return ( ($globalStarted==true ) ? $globalStarted : $msg);
	}
// ------------------------------------

$bDebugModus = ((isset($bDebugModus)) ? $bDebugModus : false);
// Don't show the messages twice
if( is_array($msg = mod_wrapper_upgrade($bDebugModus)) ) {
	echo '<strong>'.implode('<br />',$msg).'</strong><br />';
}
