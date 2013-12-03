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
 * UpgradeHelper.php
 *
 * @category     Core
 * @package      Core_Upgrade
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 17.03.2013
 * @description  some helper function for upgrade-script.php
 */
class UpgradeHelper {

/**
 * Compare available tables against a list of tables
 * @param  array list of needed table names without TablePrefix
 * @return array list of missing tables
 * @description this method is the replaement for self::existsAllTables()
 */
	public static function getMissingTables(array $aTablesList)
	{
		$aTablesList = array_flip($aTablesList);
		$oDb = WbDatabase::getInstance();
		$sPattern = addcslashes ( $oDb->TablePrefix, '%_' );
		if (($oTables = $oDb->query( 'SHOW TABLES LIKE "'.$sPattern.'%"'))) {
			while ($aTable = $oTables->fetchRow(MYSQL_NUM)) {
				$sTable =  preg_replace('/^'.preg_quote($oDb->TablePrefix, '/').'/s', '', $aTable[0]);
				if (isset($aTablesList[$sTable])) {
					unset($aTablesList[$sTable]);
				}
			}
		}
		return array_flip($aTablesList);
	}
/**
 * Alias for self::getMissingTables()
 * @param array list of needed table names without TablePrefix
 * @return array list of missing tables
 */
	public static function existsAllTables(array $aTablesList)
	{
		return self::getMissingTables($aTablesList);
	}
/**
 * Sanitize and repair Pagetree links
 * @return boolean|int number of updated records or false on error
 */
	public static function sanitizePagesTreeLinkStructure()
	{
		$oDb = WbDatabase::getInstance();
		$iCounter = 0;
		$aPages = array();
		try {
			$sql = 'SELECT `page_id`, `link`, `page_trail` '
				 . 'FROM `'.$oDb->TablePrefix.'pages` '
				 . 'ORDER BY `page_id`';
			$oPages = $oDb->doQuery($sql);
			// read 'page_id', 'link' and 'page_trail' from all pages
			while ($aPage = $oPages->fetchRow(MYSQL_ASSOC)) {
				// extact filename only from complete link
				$aPages[$aPage['page_id']]['filename'] = preg_replace('/.*?\/([^\/]*$)/', '\1', $aPage['link']);
				$aPages[$aPage['page_id']]['page_trail'] = $aPage['page_trail'];
				$aPages[$aPage['page_id']]['link'] = $aPage['link'];
			}
			foreach ($aPages as $iKey=>$aRecord) {
			// iterate all pages
				$aTmp = array();
				$aIds = explode(',', $aRecord['page_trail']);
				// rebuild link from filenames using page_trail
				foreach($aIds as $iId) {
					$aTmp[] = $aPages[$iId]['filename'];
				}
				$sLink = '/'.implode('/', $aTmp);
				if ($sLink != $aPages[$iKey]['link']) {
				// update page if old link is different to new generated link
					$sql = 'UPDATE `'.$oDb->TablePrefix.'pages` '
						 . 'SET `link`=\''.$sLink.'\' '
						 . 'WHERE `page_id`='.$iKey;
					$oDb->doQuery($sql);
					$iCounter++;
				}
			}
		} catch(WbDatabaseException $e) {
			return false;
		}
		return $iCounter;
	}
/**
 *
 * @param string $sMsg Message to show
 */
	public static function dieWithMessage($sMsg)
	{
		$sMsg = 'Fatal error occured during initial startup.<br /><br />'.PHP_EOL.$sMsg
			  . '<br />'.PHP_EOL.'Please correct these errors and then '
			  . '<a href="http://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'" '
			  . 'title="restart">klick here to restart the upgrade-script</a>.<br />'.PHP_EOL;
		die($sMsg);
	}
/**
 *
 * @param string $sAppPath path to the current installation
 * @return boolean
 */
	public static function checkSetupFiles($sAppPath)
	{
		if (defined('DB_PASSWORD')) {
		// old config.php is active
			if (!is_writable($sAppPath.'config.php') || !is_writable($sAppPath.'config.php.new') || !is_writable($sAppPath.'setup.ini.php.new'))
			{
			// stop script if there's an error occured
				$sMsg = 'Following files must exist and be writable to run upgrade:<br />'
				      . '<ul><li>config.php</li>'.(file_exists($sAppPath.'config.php.new') ? '<li>config.php.new</li>' : '')
				      . '<li>setup.ini.php.new</li></ul>';
				self::dieWithMessage($sMsg);
			} else { // ok, let's change the files now!
				if (file_exists($aAppPath.'setup.ini.php')) {
				// if 'setup.ini.php' exists
					if (!is_writeable($aAppPath.'setup.ini.php')) {
					// but it's not writable
						$sMsg = 'The file \'setup.ini.php\' already exists but is not writeable!';
						self::dieWithMessage($sMsg);
					}
				} else {
				// try to rename 'setup.ini.php.new' into 'setup.ini.php'
					if (!rename($aAppPath.'setup.ini.php.new', $aAppPath.'setup.ini.php')) {
						$sMsg = 'Can not rename \''.$aAppPath.'setup.ini.php.new\' into \''.$aAppPath.'setup.ini.php\' !!<br />'
						      . 'Create an empty file \''.$aAppPath.'setup.ini.php\' and make it writeable for the server!';
						self::dieWithMessage($sMsg);
					}
				}
			// now first read constants from old config.php
				$sContent = file_get_contents($sAppPath.'config.php');
				$sPattern = '/^\s*define\s*\(\s*([\'\"])(.*?)\1\s*,.*;\s*$/m';
				if (preg_match_all($sPattern, $sContent, $aMatches)) {
				// get all already defined consts
					$aAllConsts = get_defined_constants(true);
					$aSetupConsts = array();
				// collect the needed values from defined consts
					foreach($aMatches[2] as $sConstName) {
						$aSetupConsts[$sConstName] = (isset($aAllConsts['user'][$sConstName]) ? $aAllConsts['user'][$sConstName] : '');
					}
				// try to sanitize available values
					$aSetupConsts['DB_TYPE'] = ((isset($aSetupConsts['DB_TYPE']) && $aSetupConsts['DB_TYPE'] != '') ? $aSetupConsts['DB_TYPE'] : 'mysql');
					$aSetupConsts['DB_PORT'] = ((isset($aSetupConsts['DB_PORT']) && $aSetupConsts['DB_PORT'] != '') ? $aSetupConsts['DB_PORT'] : '3306');
					$aSetupConsts['DB_CHARSET'] = (isset($aSetupConsts['DB_CHARSET']) ? $aSetupConsts['DB_CHARSET'] : '');
					$aSetupConsts['DB_CHARSET'] = preg_replace('/[^0-9a-z]*/i', '', $aSetupConsts['DB_CHARSET']);
					$aSetupConsts['TABLE_PREFIX'] = (isset($aSetupConsts['TABLE_PREFIX']) ? $aSetupConsts['TABLE_PREFIX'] : '');
					$aSetupConsts['ADMIN_DIRECTORY'] = trim(str_replace('\\', '/', preg_replace('/^'.preg_quote(WB_PATH, '/').'/', '', ADMIN_PATH)), '/').'/';
					$aSetupConsts['WB_URL'] = rtrim(str_replace('\\', '/', WB_URL), '/').'/';
				// Try and write settings to config file
					if (writeSetupIni($sAppPath, $aSetupConsts)) {
						if (writeConfig($sAppPath)) {
							return true;
						} else {
							$sMsg ='Error writing \''.$sAppPath.'config.php\'!';
						}
					} else {
						$sMsg ='Error writing \''.$sAppPath.'setup.ini.php\'!';
					}
				} else {
					$sMsg = 'No valid content found in \''.$sAppPath.'config.php\'!';
				}
				self::dieWithMessage($sMsg);
			}
		} else {
			$sFileContent = file_get_contents($sAppPath.'config.php');
			if (preg_match('/\s*define\s*\(.*\)\s*;/i', $sFileContent)) {
			// if config.php does not contain any defines
				if (is_writable($sAppPath.'config.php')) {
				// overwrite config.php with default content for compatibility
					if (self::writeConfig($sAppPath.'config.php')) {
						return true;
					} else  {
						$sMsg ='Error writing \''.$sAppPath.'config.php\'!';
					}
				} else {
					$sMsg ='File is not writable \''.$sAppPath.'config.php\'!';
				}
				self::dieWithMessage($sMsg);
			}
		}
	}
/**
 *
 * @param string $sAppPath the path where setup.ini.php is located
 * @param array  $aSetupValues
 * @return boolean
 */
	public static function writeSetupIni($sAppPath, array $aSetupValues)
	{
		$sSetupContent =
			";<?php die('sorry, illegal file access'); ?>#####\n"
		   .";################################################\n"
		   ."; WebsiteBaker configuration file\n"
		   ."; auto generated ".date('Y-m-d h:i:s A e ')."\n"
		   .";################################################\n"
		   ."[Constants]\n"
		   ."DEBUG   = false\n"
		   ."AppUrl  = \"".$aSetupValues['WB_URL']."\"\n"
		   ."AcpDir  = \"".$aSetupValues['ADMIN_DIRECTORY']."\"\n"
		   .";##########\n"
		   ."[DataBase]\n"
		   ."type    = \"".$aSetupValues['DB_TYPE']."\"\n"
		   ."user    = \"".$aSetupValues['DB_USERNAME']."\"\n"
		   ."pass    = \"".$aSetupValues['DB_PASSWORD']."\"\n"
		   ."host    = \"".$aSetupValues['DB_HOST']."\"\n"
		   ."port    = \"".$aSetupValues['DB_PORT']."3306\"\n"
		   ."name    = \"".$aSetupValues['DB_NAME']."\"\n"
		   ."charset = \"".$aSetupValues['DB_CHARSET']."\"\n"
		   ."table_prefix = \"".$aSetupValues['TABLE_PREFIX']."\"\n"
		   .";\n"
		   .";################################################\n";
		$sSetupFile = $sAppPath.'setup.ini.php';
		if (file_put_contents($sSetupFile, $sSetupContent)) {
			return true;
		}
		return false;
	}
/**
 * 
 * @param string $sAppPath the path where config.php is located
 * @return boolean
 */
	public static function writeConfig($sAppPath)
	{
		$sConfigContent = "<?php\n"
			."/* this file is for backward compatibility only */\n"
			."/* never put any code in this file! */\n"
			."include_once(dirname(__FILE__).'/framework/initialize.php');\n";
		$sConfigFile = $sAppPath.'config.php';
		if (file_put_contents($sConfigFile, $sConfigContent)) {
			return true;
		}
		return false;
	}

} // end of class UpgradeHelper

