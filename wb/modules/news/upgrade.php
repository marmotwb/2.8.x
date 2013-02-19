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
 * @package      Module_news
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
require_once( dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
if(!defined('WB_PATH')) { throw new IllegalFileException(); }
/* -------------------------------------------------------- */
/* **** START UPGRADE ******************************************************* */
if(!function_exists('mod_news_Upgrade'))
{
	function mod_news_Upgrade()
	{
		global $database, $admin, $MESSAGE,$bDebugModus;
		$msg = array();
		$callingScript = $_SERVER["SCRIPT_NAME"];
// check if upgrade startet by upgrade-script to echo a message
		$tmp = 'upgrade-script.php';
		$globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;
		/**
		 * check database engine
		 */
		$aTable = array('mod_news_posts','mod_news_groups','mod_news_comments','mod_news_settings');
		 for($x=0; $x<sizeof($aTable);$x++) {
			if(($sOldType = $database->getTableEngine(TABLE_PREFIX.$aTable[$x]))) {
				if(('myisam' != strtolower($sOldType))) {
					if(!$database->query('ALTER TABLE `'.TABLE_PREFIX.$aTable[$x].'` Engine = \'MyISAM\' ')) {
						$msg[] = $database->get_error();
					} else{
		                $msg[] = 'TABLE `'.TABLE_PREFIX.$aTable[$x].'` changed to Engine = \'MyISAM\'';
					}
				} else {
							 $msg[] = 'TABLE `'.TABLE_PREFIX.$aTable[$x].'` has Engine = \'MyISAM\'';
				}
			} else {
				$msg[] = $database->get_error();
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
				$msg[] = 'Directory "'.PAGES_DIRECTORY.'/posts/" already exists or created.';
			}else {
				$msg[] = ($MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE']);
			}
		}else {
				$msg[] = ($MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE']);
		}
	// check if new fields must be added
		$doImportDate = true;
		if(!$database->field_exists(TABLE_PREFIX.'mod_news_posts', 'created_when')) {
			if(!$database->field_add(TABLE_PREFIX.'mod_news_posts', 'created_when',
			                        'INT NOT NULL DEFAULT \'0\' AFTER `commenting`')) {
					$msg[] = $MESSAGE['RECORD_MODIFIED_FAILED'];
			} else {
				$msg[] = 'TABLE `'.TABLE_PREFIX.'mod_news_posts` Datafield `created_when` added.';
			}
		} else { 
			$msg[] = 'TABLE `'.TABLE_PREFIX.'mod_news_posts` Datafield `created_when` already exists.';
			$doImportDate = false; 
		}

		if(!$database->field_exists(TABLE_PREFIX.'mod_news_posts', 'created_by')) {
			if(!$database->field_add(TABLE_PREFIX.'mod_news_posts', 'created_by',
			                        'INT NOT NULL DEFAULT \'0\' AFTER `created_when`')) {
				$msg[] = $MESSAGE['RECORD_MODIFIED_FAILED'];
			}
		} else { 
			$msg[] = 'TABLE `'.TABLE_PREFIX.'mod_news_posts` Datafield `created_by` already exists.';
			$doImportDate = false; 
		}
 	// preset new fields `created_by` and `created_by` from existing values
		if($doImportDate) {
			$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
			$sql .= 'SET `created_by`=`posted_by`, `created_when`=`posted_when`';
			$database->query($sql);
		}

	/**
	 * rebuild news post folder
	 */
//	$array = rebuildFolderProtectFile($sPostsPath);
	// now iterate through all existing accessfiles,
	// write its creation date into database
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
					$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
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

		if($count > 0) {
			$msg[] = 'Save date of creation from '.$count.' old accessfiles and delete these files.';
		}
// ************************************************
	// Check the validity of 'create-file-timestamp' and balance against 'posted-timestamp'
		$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
		$sql .= 'SET `created_when`=`published_when` ';
		$sql .= 'WHERE `published_when`<`created_when`';
		$database->query($sql);
		$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
		$sql .= 'SET `created_when`=`posted_when` ';
		$sql .= 'WHERE `published_when`=0 OR `published_when`>`posted_when`';
		$database->query($sql);
// ************************************************

        // only for upgrade-script
        if($globalStarted) {
            if($bDebugModus) {
                foreach($msg as $title) {
                    echo '<strong>'.$title.'</strong><br />';
                }
            }
        } 
        return ( ($globalStarted==true ) ? $globalStarted : $msg);
	}
}
// end mod_news_Upgrade

// ------------------------------------
// only show if manuell upgrade
if( is_array($msg = mod_news_Upgrade()) ) {
	$sModulReorg = 'm_news_Reorg';
	if(class_exists($sModulReorg)) {
		$oReorg = new $sModulReorg();
		$msg = array_merge($msg, $oReorg->execute() ); // show details
//		$msg = array_merge($msg,(new $sModulReorg())->execute()); // show details
	}
    foreach($msg as $title) {
        echo '<strong>'.$title.'</strong><br />';
    }
	echo '<strong>News upgrade finished </strong><br /><br>';
}
/* **** END UPGRADE ********************************************************* */
