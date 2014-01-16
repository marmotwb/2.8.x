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
		$oDb = WbDatabase::getInstance();
        $oReg = WbAdaptor::getInstance();
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
				if(($sOldType = $oDb->getTableEngine($oDb->TablePrefix.$aTable[$x]))) {
					if(('myisam' != strtolower($sOldType))) {
						if(!$oDb->query('ALTER TABLE `'.$oDb->TablePrefix.$aTable[$x].'` Engine = \'MyISAM\' ')) {
							$msg[] = $oDb->get_error();
						} else{
							$msg[] = 'TABLE `'.$oDb->TablePrefix.$aTable[$x].'` changed to Engine = \'MyISAM\''." $OK";
						}
					} else {
						 $msg[] = 'TABLE `'.$oDb->TablePrefix.$aTable[$x].'` has Engine = \'MyISAM\''." $OK";
					}
				} else {
					$msg[] = $oDb->get_error();
				}
			}
// add change or missing index
			$sTable = $oDb->TablePrefix.'mod_wysiwyg';
			if($oDb->index_exists($sTable, 'PRIMARY')) {
				$sql = 'ALTER TABLE `'.$oDb->DbName.'`.`'.$sTable.'` DROP PRIMARY KEY';
				if(!$oDb->query($sql)) {
					$msg[] = ''.$oDb->get_error();
				}
			}
			if(!$oDb->index_add($sTable, '', 'section_id', 'PRIMARY')) {
				$msg[] = ''.$oDb->get_error();
			} else {
				$msg[] = 'Create PRIMARY KEY ( `section_id` )'." $OK";
			}
// change table structure
			$sTable = $oDb->TablePrefix.'mod_wysiwyg';
			$sDescription = 'LONGTEXT NOT NULL';
			$sFieldName = 'text';
			if(!$oDb->field_modify($sTable,$sFieldName,$sDescription)) {
				$msg[] = ''.$oDb->get_error();
			} else {
				$msg[] = 'Field ( `text` ) description has been changed successfully'." $OK";
			}
			$sFieldName = 'content';
			if(!$oDb->field_modify($sTable,$sFieldName,$sDescription)) {
				$msg[] = ''.$oDb->get_error();
			} else {
				$msg[] = 'Field ( `content` ) description has been changed successfully'." $OK";
			}
// change internal absolute links into Sysvar placeholders and repair already existing entries
			$sTable = $oDb->TablePrefix.'mod_wysiwyg';
            $sql = 'SELECT `section_id`, `content` FROM `'.$oDb->TablePrefix.'mod_wysiwyg` ';
            if (($oEntrySet = $oDb->doQuery($sql))) {
                $iRecords = 0;
                $iReplaced = 0;
                $aSearch = array( '/\{SYSVAR\:MEDIA_REL\}\/*/s',
                                  '/\{SYSVAR\:WB_URL\}\/*/s',
                                  '/'.preg_quote('"'.$oReg->AppUrl.$oReg->MediaDir, '/').'*/s',
                                  '/'.preg_quote('"'.$oReg->AppUrl, '/').'*/s',
                                  '/(\{SYSVAR\:AppUrl\.MediaDir\})\/+/s',
                                  '/(\{SYSVAR\:AppUrl\})\/+/s'
                                );
                $aReplace = array( '{SYSVAR:AppUrl.MediaDir}', '{SYSVAR:AppUrl}', '{SYSVAR:AppUrl.MediaDir}', '{SYSVAR:AppUrl}', '\1', '\1');
                while (($aEntry = $oEntrySet->fetchRow(MYSQL_ASSOC))) {
                    $iCount = 0;
                    $aEntry['content'] = preg_replace($aSearch, $aReplace, $aEntry['content'], -1, $iCount);
                    if ($iCount > 0) {
                        $iReplaced += $iCount;
                        $sql = 'UPDATE `'.$oDb->TablePrefix.'mod_wysiwyg` '
                             . 'SET `content`=\''.$oDb->escapeString($aEntry['content']).'\' '
                             . 'WHERE `section_id`='.$aEntry['section_id'];
                        $oDb->doQuery($sql);
                        $iRecords++;
                    }
                }
                $msg[] = '['.$iRecords.'] records with ['.$iReplaced.'] SYSVAR placeholder(s) repaired/inserted'." $OK";
// only for $callingScript upgrade-script.php
                if($globalStarted && $bDebug) {
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
