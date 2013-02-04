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
 * TranslationTable.php
 *
 * @category     Core
 * @package      Core_Translation
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 12.01.2013
 */
class TranslationTable {

	private $_aTranslations = array();
	private $_sSystemLang   = 'en';
	private $_sDefaultLang  = 'en';
	private $_sUserLang     = 'en';
	private $_sAddon        = '';
	
/**
 * Constructor
 * @param string relative pathname of the Addon (i.e. '' || 'modules/myAddon/')
 * @param string Default language code ( 2ALPHA[[_2ALPHA]_2*4ALNUM] )
 * @param string User language code ( 2ALPHA[[_2ALPHA]_2*4ALNUM] )
 */	
	public function __construct($sAddon, $sDefaultLanguage, $sUserLanguage = '')
	{
		$this->_sDefaultLang = $sDefaultLanguage;
		$this->_sUserLang = ($sUserLanguage == '' ? $sDefaultLanguage : $sUserLanguage);
		$this->_sAddon = $sAddon;
	}
/**
 * Load language definitions
 * @return TranslationTable a valid translation table object
 * @throws TranslationException
 */	
	public function load($sAdaptor)
	{
		$c = 'TranslateAdaptor'.$sAdaptor;
		$oTmp = new $c($this->_sAddon);
		// load default language first
		if( ($aResult = $oTmp->loadLanguage($this->_sDefaultLang)) !== false ) {
			$this->_aTranslations = $aResult;
		}
		if($this->_sUserLang != $this->_sDefaultLang) {
		// load user language if its not equal default language
			if( ($aResult = $oTmp->loadLanguage($this->_sUserLang)) !== false ) {
				$this->_aTranslations = array_merge($this->_aTranslations, $aResult);
			}
		}
		if(($this->_sSystemLang != $this->_sUserLang) && 
		   ($this->_sSystemLang != $this->_sDefaultLang)) {
		// load system language if its not already loaded
			if( ($aResult = $oTmp->loadLanguage($this->_sSystemLang)) !== false ) {
				$this->_aTranslations = array_merge($this->_aTranslations, $aResult);
			}
		}
		if(sizeof($this->_aTranslations) == 0) {
		// if absolutely no requested language found, simply get the first available 
			$sFirstLanguage = $oTmp->findFirstLanguage();
		// load first found language if its not already loaded
			if( ($aResult = $oTmp->loadLanguage($sFirstLanguage)) !== false ) {
				$this->_aTranslations = array_merge($this->_aTranslations, $aResult);
			}
		}
		return $this;
	}
/**
 * Is key available
 * @param string Language key
 * @return bool
 */
	public function __isset($sKey)
	{
		return isset($this->_aTranslations[$sKey]);
	}
/**
 * Get translation text
 * @param string Language key
 * @return string Translation text
 */	
	public function __get($sKey)
	{
		if(isset($this->_aTranslations[$sKey])) {
			return $this->_aTranslations[$sKey];
		}else {
			return '';
		}
	}
/**
 * returns the whoole translation array
 * @return array
 * @deprecated for backward compatibility only. Will be removed shortly
 */	
	public function getArray()
	{
		return $this->_aTranslations;
	}
} // end of class TranslationTable