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
 * TranslateAdaptorWb3Mysql.php
 *
 * @category     Core
 * @package      Core_Translation
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 12.05.2013
 * @description  Loads translation table from MySQL Language table<br />
 *               Can handle Languagecodes like 'de_DE_BAY' (2ALPHA_2ALPHA_2-4ALNUM)
 */

class TranslateAdaptorWb3Mysql implements TranslateAdaptorInterface {

	protected $sAddon      = '';
	protected $sFilePath   = '';
	private   $_oDb        = null;
	private   $_sTableName = 'translations';
/**
 * Constructor
 * @param string descriptor of the Addon (i.e. '' || 'modules\myAddon'
 */
	public function __construct($sAddon = '')
	{
		$this->_oDb = WbDatabase::getInstance();
		$this->sAddon = $sAddon;
	}
/**
 * Load languagefile
 * @param string $sLangCode
 * @return array|bool an array of translations or FALSE on error
 */
	public function loadLanguage($sLangCode)
	{
		$aTranslations = array();
		$sql = 'SELECT `keyword`, `value` '
		     . 'FROM `'.$this->_oDb->getTablePrefix.$this->_sTableName.'` '
		     . 'WHERE `addon`=\''.$this->sAddon.'\' '
		     .        'AND `lang` LIKE \''.addcslashes($sLangCode ,'_?').'\'';
		if(($oTransSet = $this->_oDb->query($sql))) {
			while($aTrans = $oTransSet->fetchRow(MYSQL_ASSOC)) {
				$aTranslations[] = $aTrans;
			}
		}
		return $aTranslations;
	}
/**
 * Find first existing language
 * @return string Code of first found basic language
 */
	public function findFirstLanguage()
	{
		$sql = 'SELECT `lang` '
		     . 'FROM `'.$this->_oDb->getTablePrefix.$this->_sTableName.'` '
		     . 'WHERE `addon`=\''.$this->sAddon.'\' '
		     .        'AND `lang` LIKE \'__\'';
		$sfirstMatch = $this->_oDb->get_one($sql);
		return ($sfirstMatch ? $sfirstMatch : 'en');
	}

}
// end of class TranslateAdaptorWb3Mysql

