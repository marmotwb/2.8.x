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
 * Translate.php
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
 * @description
 */
class Translate {
	
//  @object hold the Singleton instance 
	private static $_oInstance   = null;
	
	protected $_sAdaptor         = 'WbOldStyle';
	protected $_sDefaultLanguage = 'en';
	protected $_sUserLanguage    = 'en';
	protected $_aAddons          = array();
	protected $_aTranslations    = array();

/** prevent class from public instancing and get an object to hold extensions */
	protected function  __construct() {}
/** prevent from cloning existing instance */
	private function __clone() {}
/**
 * get a valid instance of this class
 * @return object
 */
	static public function getInstance() {
		if( is_null(self::$_oInstance) ) {
            $c = __CLASS__;
            self::$_oInstance = new $c;
		}
		return self::$_oInstance;
	}
/**
 * Initialize the Translations
 * @param string DefaultLanguage code ('de' || 'de_CH' || 'de_CH_uri')
 * @param string UserLanguage code ('de' || 'de_CH' || 'de_CH_uri')
 * @throws TranslationException
 */
	public function initialize($sDefaultLanguage, $sUserLanguage = '', $sAdaptor = 'WbOldStyle') 
	{
		if(!class_exists('TranslateAdaptor'.$sAdaptor)) {
			throw new TranslationException('unable to load adaptor: '.$sAdaptor);
		}
		$this->_sAdaptor = $sAdaptor;
		$this->_sDefaultLanguage = $sDefaultLanguage;
		// if no user language is set then use default language
		$this->_sUserLanguage = ($sUserLanguage == '' ? $sDefaultLanguage : $sUserLanguage);
		$sPattern = '/^[a-z]{2,3}(?:(?:\_[a-z]{2})?(?:\_[a-z0-9]{2,4})?)$/siU';
		// validate language codes
		if(preg_match($sPattern, $this->_sDefaultLanguage) &&
		   preg_match($sPattern, $this->_sUserLanguage))
		{
		// load core translations and activate it
			$oTmp = new TranslationTable('', $this->_sDefaultLanguage, $this->_sUserLanguage);
			$this->_aAddons['core'] = $oTmp->load($this->_sAdaptor);
			$this->_aTranslations[0] = $this->_aAddons['core'];
			if(sizeof($this->_aAddons['core']) == 0) {
			// throw an exception for missing translations
				throw new TranslationException('missing core translations');
			}
		}else {
		// throw an exception for invalid or missing language codes
			$sMsg = 'Invalid language codes: ['.$this->_sDefaultLanguage.'] ['.$this->_sUserLanguage.']';
			throw new TranslationException($sMsg);
		}
	}
/**
 * Add new addon
 * @param string Addon descriptor (i.e. 'modules\myAddon')
 * @return bool 
 */	
	public function addAddon($sAddon)
	{
		if(!(strtolower($sAddon) == 'core' || $sAddon == '' || isset($this->_aAddons[$sAddon]))) {
		// load requested addon translations if needed and possible
			$oTmp = new TranslationTable($sAddon, $this->_sDefaultLanguage, $this->_sUserLanguage);
			$this->_aAddons[$sAddon] = $oTmp->load($this->_sAdaptor);
		}
	}
/**
 * Activate Addon
 * @param string Addon descriptor (i.e. 'modules\myAddon')
 */	
	public function enableAddon($sAddon)
	{
		if(!(strtolower($sAddon) == 'core' || $sAddon == '')) {
			if(!isset($this->_aAddons[$sAddon])) {
				$this->addAddon($sAddon);
			}
			$this->_aTranslations[1] = $this->_aAddons[$sAddon];
		}
		
	}
	
	public function disableAddon()
	{
		if(isset($this->_aTranslations[1])) {
			unset($this->_aTranslations[1]);
		}
	}
	
/**
 * Is key available
 * @param string Language key
 * @return bool
 */
	public function __isset($sKey)
	{
		foreach($this->_aTranslations as $oAddon) {
			if(isset($oAddon->$sKey)) {
			// is true if at least one translation is found
				return true;
			}
		}
		return false;
	}
/**
 * Get translation text
 * @param string Language key
 * @return string Translation text
 */	
	public function __get($sKey)
	{
		$sRetval = '';
		foreach($this->_aTranslations as $oAddon) {
			if(isset($oAddon->$sKey)) {
			// search the last matching translation (Core -> Addon)
				$sRetval = $oAddon->$sKey;
			}
		}
		return $sRetval;
	}
/**
 * Return complete table of translations
 * @return array
 * @deprecated for backward compatibility only. Will be removed shortly
 */	
	public function getLangArray()
	{
		$aTranslations = array();
		foreach($this->_aTranslations as $aTranslation) {
			$aTranslations = array_merge($aTranslations, $aTranslation);
		}
		return $aTranslations;
	}
	
} // end of class Translate
// //////////////////////////////////////////////////////////////////////////////////// //
/**
 * TranslationException
 *
 * @category     Core
 * @package      Core_Translation
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      2.9.0
 * @revision     $Revision$
 * @lastmodified $Date$
 * @description  Exceptionhandler for the Translation class and depending classes
 */
class TranslationException extends AppException {}