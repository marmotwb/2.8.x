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
		global $OK ,$FAIL;
		$database=WbDatabase::getInstance();
		$mLang = Translate::getinstance();
		$sModName = basename(dirname(__FILE__));
		$mLang->enableAddon('modules\\'.$sModName);
		$msg    = array();
		$callingScript = $_SERVER["SCRIPT_NAME"];
// check if upgrade startet by upgrade-script to echo a message
		$tmp = 'upgrade-script.php';
		$globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;
// check for missing tables, if true stop the upgrade
		$aTable = array('mod_news_posts','mod_news_groups','mod_news_comments','mod_news_settings');
		$aPackage = UpgradeHelper::existsAllTables($aTable);
		if( sizeof($aPackage) > 0){
			$msg[] =  'TABLE '.implode(' missing! '.$FAIL.'<br />TABLE ',$aPackage).' missing! '.$FAIL;
			$msg[] = "WYSIWYG upgrade failed $FAIL";
			if($globalStarted) {
				echo '<strong>'.implode('<br />',$msg).'</strong><br />';
			}
			$mLang->disableAddon();
			return ( ($globalStarted==true ) ? $globalStarted : $msg);
		} else {
			/**
			 * check database engine
			 */
			 for($x=0; $x<sizeof($aTable);$x++) {
				if(($sOldType = $database->getTableEngine($database->TablePrefix.$aTable[$x]))) {
					if(('myisam' != strtolower($sOldType))) {
						if(!$database->query('ALTER TABLE `'.$database->TablePrefix.$aTable[$x].'` Engine = \'MyISAM\' ')) {
							$msg[] = $database->get_error()." $FAIL";
						} else{
							$msg[] = 'TABLE `'.$database->TablePrefix.$aTable[$x].'` changed to Engine = \'MyISAM\''." $OK";
						}
					} else {
						 $msg[] = 'TABLE `'.$database->TablePrefix.$aTable[$x].'` has Engine = \'MyISAM\''." $OK";
					}
				} else {
					$msg[] = $database->get_error()." $FAIL";
				}
			}

			$sPagesPath = WB_PATH.PAGES_DIRECTORY;
			$sPostsPath = $sPagesPath.'/posts';
// create /posts/ - directory if not exists
			if(is_writable($sPagesPath)) {
				if(!($bRetval = is_dir($sPostsPath))) {
					$iOldUmask = umask(0) ;
					// sanitize directory mode to 'o+rwx/g+x/u+x' and create path
					$bRetval = mkdir($sPostsPath, (OCTAL_DIR_MODE |0711), true); 
					umask($iOldUmask);
				}
				if($bRetval) {
					$msg[] = 'Directory "'.PAGES_DIRECTORY.'/posts/" already exists or created.'." $OK";
				}else {
					$msg[] = ($mLang->MESSAGE_PAGES_CANNOT_CREATE_ACCESS_FILE)." $FAIL";
				}
			}else {
					$msg[] = ($mLang->MESSAGE_PAGES_CANNOT_CREATE_ACCESS_FILE)." $FAIL";
			}
	// check if new fields must be added
			$doImportDate = true;
			if(!$database->field_exists($database->TablePrefix.'mod_news_posts', 'created_when')) {
				if(!$database->field_add($database->TablePrefix.'mod_news_posts', 'created_when',
				                        'INT NOT NULL DEFAULT \'0\' AFTER `commenting`')) {
					$msg[] = $mLang->MESSAGE_RECORD_MODIFIED_FAILED." $FAIL";
				} else {
					$msg[] = 'TABLE `'.$database->TablePrefix.'mod_news_posts` Datafield `created_when` added.'." $OK";
				}
			} else { 
				$msg[] = 'TABLE `'.$database->TablePrefix.'mod_news_posts` Datafield `created_when` already exists.'." $OK";
				$doImportDate = false; 
			}

			if(!$database->field_exists($database->TablePrefix.'mod_news_posts', 'created_by')) {
				if(!$database->field_add($database->TablePrefix.'mod_news_posts', 'created_by',
				                        'INT NOT NULL DEFAULT \'0\' AFTER `created_when`')) {
					$msg[] = $mLang->MESSAGE_RECORD_MODIFIED_FAILED." $FAIL";
				} else {
					$msg[] = 'TABLE `'.$database->TablePrefix.'mod_news_posts` Datafield `created_by` added.'." $OK";
				}
			} else { 
				$msg[] = 'TABLE `'.$database->TablePrefix.'mod_news_posts` Datafield `created_by` already exists.'." $OK";
				$doImportDate = false; 
			}
// preset new fields `created_by` and `created_by` from existing values
			if($doImportDate) {
				$sql  = 'UPDATE `'.$database->TablePrefix.'mod_news_posts` ';
				$sql .= 'SET `created_by`=`posted_by`, `created_when`=`posted_when`';
				$database->query($sql);
			}
	if($doImportDate) {
	/**
	 * rebuild news post folder
	 */
//	$array = rebuildFolderProtectFile($sPostsPath);
		// now iterate through all existing accessfiles,
		// write its creation date into database
			if(is_writable($sPostsPath)) {
				$oDir = new DirectoryIterator($sPostsPath);
				$count = 0;
				foreach ($oDir as $fileinfo)
				{
					$fileName = $fileinfo->getFilename();
					if((!$fileinfo->isDot()) &&
					   ($fileName != 'index.php') &&
					   (substr_compare($fileName,PAGE_EXTENSION,(0-strlen(PAGE_EXTENSION)),strlen(PAGE_EXTENSION)) === 0)
					  )
					{
					// save creation date from old accessfile
						if($doImportDate) {
							$link = '/posts/'.preg_replace('/'.preg_quote(PAGE_EXTENSION).'$/i', '', $fileinfo->getFilename());
							$sql  = 'UPDATE `'.$database->TablePrefix.'mod_news_posts` ';
							$sql .= 'SET `created_when`='.$fileinfo->getMTime().' ';
							$sql .= 'WHERE `link`=\''.$link.'\'';
							if($database->query($sql)) {
								// delete old access file
								unlink($fileinfo->getPathname());
								$count++;
							}
						}
					}
				}
				unset($oDir);
			}
			if($count > 0) {
				$msg[] = 'Save date of creation from '.$count.' old accessfiles and delete these files.'." $OK";
			}
	}
// ************************************************
// Check the validity of 'create-file-timestamp' and balance against 'posted-timestamp'
			$sql  = 'UPDATE `'.$database->TablePrefix.'mod_news_posts` ';
			$sql .= 'SET `created_when`=`published_when` ';
			$sql .= 'WHERE `published_when`<`created_when`';
			$database->query($sql);
			$sql  = 'UPDATE `'.$database->TablePrefix.'mod_news_posts` ';
			$sql .= 'SET `created_when`=`posted_when` ';
			$sql .= 'WHERE `published_when`=0 OR `published_when`>`posted_when`';
			$database->query($sql);
// ************************************************
			$aReport = array('FilesDeleted'=>0,'FilesCreated'=>0,);
        	$sModulReorg = 'm_news_Reorg';
        	if( !$globalStarted && class_exists($sModulReorg) ) {
        		$oReorg = new $sModulReorg($sModulReorg::LOG_EXTENDED);
				$aReturnMsg = $oReorg->execute(); // show details
                $aReport = $oReorg->getReport();
                unset($oReorg);
        	}

			// only for upgrade-script
			if($globalStarted) {
				if($bDebug) {
					echo '<strong>'.implode('<br />',$msg).'</strong><br />';
				}
			} 
		}

//		$msg[] = '<strong>'.$aReport['FilesDeleted'].' Files successful deleted</strong>';
		$msg[] = '<strong>Number of new formated access files: '.$aReport['FilesCreated'].'</strong>';
		$msg[] = "<strong>News upgrade successfull finished</strong>";
		if($globalStarted) {
			echo "<strong>News upgrade successfull finished $OK</strong><br />";
		}
		$mLang->disableAddon();
		return ( ($globalStarted==true ) ? $globalStarted : $msg);
	}
//}
// end mod_news_Upgrade

// ------------------------------------
// Don't show the messages twice
$bDebugModus = ((isset($bDebugModus)) ? $bDebugModus : false);
if( is_array($msg = mod_news_Upgrade($bDebugModus)) ) {
// only show if manuell upgrade
	echo ''.implode('<br />',$msg).'<br />';
}
/* **** END UPGRADE ********************************************************* */
