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
		if(($oTables = $oDb->query( 'SHOW TABLES LIKE "'.$sPattern.'%"'))) {
			while($aTable = $oTables->fetchRow(MYSQL_NUM)) {
				$sTable =  preg_replace('/^'.preg_quote($oDb->TablePrefix, '/').'/s', '', $aTable[0]);
				if(isset($aTablesList[$sTable])) {
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


} // end of class UpgradeHelper

