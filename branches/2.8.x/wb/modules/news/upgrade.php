<?php
/**
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS HEADER.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * upgrade.php
 * 
 * @category     Module
 * @package      news
 * @subpackage   upgrade
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websitebaker.org>
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 17.01.2013
 * @description  xyz
 * 
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}


/* -------------------------------------------------------- */
/* **** START UPGRADE ******************************************************* */
//if(!function_exists('mod_news_Upgrade'))
//{
	function mod_news_Upgrade($bDebug=false)
	{
	// set environment
		global $OK ,$FAIL;
		$aMandatoryTables = array('mod_news_posts','mod_news_groups','mod_news_comments','mod_news_settings');
		$oDb              = WbDatabase::getInstance();
		$oLang            = Translate::getInstance();
		$oReg             = WbAdaptor::getInstance();
		$msg              = array();
		$sCallingScript   = $_SERVER['SCRIPT_NAME'];
		$sPagesPath       = $oReg->AppPath.$oReg->PagesDir;
		$sPostsPath       = $sPagesPath.'/posts';
		$sModName         = basename(dirname(__FILE__));
		$oLang->enableAddon('modules\\'.$sModName);
	// check if upgrade startet by upgrade-script to echo a message
		$bGlobalStarted = preg_match('/upgrade\-script\.php$/', $sCallingScript);
/* --- check for missing tables, if true stop the upgrade ----------------------------- */
		$aMissingTables = UpgradeHelper::getMissingTables($aMandatoryTables);
		if( sizeof($aMissingTables) > 0){
			$msg[] = 'TABLE '.implode(' missing! '.$FAIL.'<br />TABLE ', $aMissingTables).' missing! '.$FAIL;
			$msg[] = 'WYSIWYG upgrade failed '.$FAIL;
			if($bGlobalStarted) {
				echo '<strong>'.implode('<br />',$msg).'</strong><br />';
			}
			$oLang->disableAddon();
			return ( ($bGlobalStarted==true ) ? $bGlobalStarted : $msg);
		}
/* --- check for database engine ------------------------------------------------------ */
		for($x=0; $x<sizeof($aMandatoryTables);$x++) {
			if(($sOldType = $oDb->getTableEngine($oDb->TablePrefix.$aMandatoryTables[$x]))) {
				if(('myisam' != strtolower($sOldType))) {
					if(!$oDb->query('ALTER TABLE `'.$oDb->TablePrefix.$aMandatoryTables[$x].'` Engine = \'MyISAM\' ')) {
						$msg[] = $oDb->get_error()." $FAIL";
					}else {
						$msg[] = 'TABLE `'.$oDb->TablePrefix.$aMandatoryTables[$x].'` changed to Engine = \'MyISAM\''." $OK";
					}
				} else {
					 $msg[] = 'TABLE `'.$oDb->TablePrefix.$aMandatoryTables[$x].'` has Engine = \'MyISAM\''." $OK";
				}
			} else {
				$msg[] = $oDb->get_error()." $FAIL";
			}
		}
/* --- create posts/ - directory if not exists ---------------------------------------- */
		if(!($bRetval = is_dir($sPostsPath))) 
		{ 
		// /posts - dir missing
			if(is_writable($sPagesPath))
			{
			// try to create the directory
				$iOldUmask = umask(0) ;
				if(!($bRetval = mkdir($sPostsPath, $oReg->OctalDirMode, true)))
				{
					$msg[] = 'Not able to create directory "'.str_replace($oReg->AppPath, '', $sPostsPath).'". '.$FAIL;
				}
				umask($iOldUmask);
			}else
			{
				$msg[] = 'Directory "'.str_replace($oReg->AppPath, '', $sPostsPath).'" is not writeable.'." $FAIL";
				$bRetval = false;
			}
			if(!$bRetval) { 
				$oLang->disableAddon();
				return ( ($bGlobalStarted==true ) ? $bGlobalStarted : $msg);
			}
		}
		$msg[] = 'Directory "'.str_replace($oReg->AppPath, '', $sPostsPath).'" exists.'." $OK";
/* --- create new db fields if `created_when` and `created_by` is missing ------------- */
		$doImportDate = 0;
		$aMsgList = array(
			0 => 'Datafield `'.$oDb->TablePrefix.'mod_news_posts`.`created_when` exists. '.$OK,
			1 => 'Datafield `'.$oDb->TablePrefix.'mod_news_posts`.`created_by` exists. '.$OK,
			2 => 'missing Datafield `'.$oDb->TablePrefix.'mod_news_posts`.`created_when`. '.$FAIL,
			3 => 'missing Datafield `'.$oDb->TablePrefix.'mod_news_posts`.`created_by`. '.$FAIL,
			4 => 'Datafield `'.$oDb->TablePrefix.'mod_news_posts`.`created_when` created. '.$OK,
			5 => 'Datafield `'.$oDb->TablePrefix.'mod_news_posts`.`created_by` created. '.$OK,
		);
		if($oDb->field_exists($oDb->TablePrefix.'mod_news_posts', 'created_when')) {
			$doImportDate |= pow(2, 0);
		}else {
			if($oDb->field_add($oDb->TablePrefix.'mod_news_posts', 'created_when', 'INT NOT NULL DEFAULT \'0\' AFTER `commenting`')) {
				$doImportDate |= (pow(2, 0) | pow(2, 4));
			}else {
				$doImportDate |= pow(2, 2);
			}
		}
		if($oDb->field_exists($oDb->TablePrefix.'mod_news_posts', 'created_by')) {
			$doImportDate |= pow(2, 1);
		}else {
			if($oDb->field_add($oDb->TablePrefix.'mod_news_posts', 'created_by', 'INT NOT NULL DEFAULT \'0\' AFTER `created_when`')) {
				$doImportDate |= (pow(2, 1) | pow(2, 5));
			}else {
				$doImportDate |= pow(2, 3);
			}
		}
		// build messages
		foreach($aMsgList as $iKey => $sMsgText) {
			if($doImportDate & pow(2, $iKey)) { $msg[] = $sMsgText; }
		}
		// break if not all fields exists now
		if(!($doImportDate & (pow(2, 0) | pow(2, 1)))) {
			$oLang->disableAddon();
			return ($bGlobalStarted ? $bGlobalStarted : $msg);
		}
/* --- import creation date from old style accessfiles -------------------------------- */
		// preset new fields `created_by` and `created_by` from existing values
		// if both fields are created new
		if($doImportDate & (pow(2, 4) | pow(2, 5)))
		{
		// first copy values inside the table and exchange all \ by / in field `link`
			$sql  = 'UPDATE `'.$oDb->TablePrefix.'mod_news_posts` '
			      . 'SET `created_by`=`posted_by`, '
			      .     '`created_when`=`posted_when`, '
			      .     '`link`= REPLACE(`link`, \'\\\', \'/\')';
			$oDb->query($sql);
		// read Timestamps from old styled accessfiles
			$iCount = 0;
			$aMatches = glob($sPostsPath.'*'.$oReg->PageExtension);
			if(is_array($aMatches)) {
				foreach($aMatches as $sFile) {
					$sLink = str_replace($sPagesPath, '', str_replace('\\', '/', $sFile));
					$sLink = '/'.preg_replace('/'.preg_quote($oReg->PageExtension).'$/i', '', $sLink);
					$sql = 'UPDATE `'.$oDb->TablePrefix.'mod_news_posts` '
					     . 'SET `created_when`='.filemtime($sFile).' '
					     . 'WHERE `link`=\''.$sLink.'\'';
					if(($oDb->query('$sql'))) { $iCount++; }
				}
			}
			if($iCount) {
				$msg[] = 'Creation date of &#62;'.$iCount.'&#60; posts has been imported from old styled accessfiles.'." $OK";
			}
		// Check the validity of 'create-file-timestamp' and balance against 'posted-timestamp'
			$sql = 'UPDATE `'.$oDb->TablePrefix.'mod_news_posts` '
			     . 'SET `created_when`=`published_when` '
			     . 'WHERE `published_when`<`created_when`';
			$oDb->query($sql);
			$sql = 'UPDATE `'.$oDb->TablePrefix.'mod_news_posts` '
			     . 'SET `created_when`=`posted_when` '
			     . 'WHERE `published_when`=0 OR `published_when`>`posted_when`';
			$oDb->query($sql);
		}
/* --- insert SYSVAR placeholders and repair already existing ------------------------- */
        $sql = 'SELECT `post_id`, `content_long`, `content_short` '
             . 'FROM `'.$oDb->TablePrefix.'mod_news_posts` ';
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
                $aSubject = array($aEntry['content_long'], $aEntry['content_short']);
                $aNewContents = preg_replace($aSearch, $aReplace, $aSubject, -1, $iCount);
                if ($iCount > 0) {
                    $iReplaced += $iCount;
                    $sql = 'UPDATE `'.$oDb->TablePrefix.'mod_news_posts` '
                         . 'SET `content_long`=\''.$oDb->escapeString($aNewContents[0]).'\', '
                         .     '`content_short`=\''.$oDb->escapeString($aNewContents[1]).'\' '
                         . 'WHERE `post_id`='.$aEntry['post_id'];
                    $oDb->doQuery($sql);
                    $iRecords++;
                }
            }
            $msg[] = '['.$iRecords.'] records with ['.$iReplaced.'] SYSVAR placeholder(s) repaired/inserted'." $OK";
        }
/* --- rebuild all access files ------------------------------------------------------- */
		$aReport = array('FilesDeleted'=>0,'FilesCreated'=>0,);
		$oReorg = new m_news_Reorg(ModuleReorgAbstract::LOG_EXTENDED);
		$oReorg->execute(); // show details
		$aReport = $oReorg->getReport();
		unset($oReorg);
/* --- for running from upgrade-script.php only --------------------------------------- */
		if($bGlobalStarted && $bDebug) {
			echo '<strong>'.implode('<br />',$msg).'</strong><br />';
		}
/* ------------------------------------------------------------------------------------ */
		$msg[] = '<strong>Number of new formated access files: '.$aReport['FilesCreated'].'</strong>';
		$msg[] = "<strong>News upgrade successfull finished</strong>";
		if($bGlobalStarted) {
			echo "<strong>News upgrade successfull finished $OK</strong><br />";
		}
		$oLang->disableAddon();
		return ($bGlobalStarted ? $bGlobalStarted : $msg);
	}
// end mod_news_Upgrade

// ------------------------------------
// Don't show the messages twice
	$bDebugModus = ((isset($bDebugModus)) ? $bDebugModus : false);
	if( is_array($msg = mod_news_Upgrade($bDebugModus)) ) {
// only show if manuell upgrade
		echo implode('<br />', $msg).'<br />';
	}
/* **** END UPGRADE ********************************************************* */
