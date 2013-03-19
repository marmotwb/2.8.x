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
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 12.01.2013
 */
class TranslationTable {

	protected $aTranslations = array();
	protected $aLanguages    = array();
	protected $sSystemLang   = 'en';
	protected $sDefaultLang  = 'en';
	protected $sUserLang     = 'en';
	protected $sAddon        = '';
	protected $oReg          = null;
	protected $sTempPath     = '';
	protected $iDirMode      = 0777;
	protected $bUseCache     = true;

	/**
 * Constructor
 * @param string relative pathname of the Addon (i.e. '' || 'modules/myAddon/')
 * @param string System language code ( 2*3ALPHA[[_2ALPHA]_2*4ALNUM] )
 * @param string Default language code ( 2*3ALPHA[[_2ALPHA]_2*4ALNUM] )
 * @param string User language code ( 2*3ALPHA[[_2ALPHA]_2*4ALNUM] )
 * @param boolean true if caching is enabled
 */	
	public function __construct($sAddon, 
	                            $sSystemLanguage, 
	                            $sDefaultLanguage, 
	                            $sUserLanguage,
	                            $bUseCache = true)
	{
		$this->bUseCache             = $bUseCache;
		$this->sSystemLang           = $sSystemLanguage;
		$this->sDefaultLang          = $sDefaultLanguage;
		$this->sUserLang             = $sUserLanguage;
		$this->sAddon                = $sAddon;
		if(class_exists('WbAdaptor')) {
			$this->sTempPath         = WbAdaptor::getInstance()->TempPath;
			$this->iDirMode          = WbAdaptor::getInstance()->OctalDirMode;
		}else {
			$this->sTempPath         = dirname(dirname(__FILE__)).'/temp/';
		}
		$this->aLanguages['system']  = array();
		$this->aLanguages['default'] = array();
		$this->aLanguages['user']    = array();
	}
/**
 * Load language definitions
 * @return TranslationTable a valid translation table object
 * @throws TranslationException
 */	
	public function load($sAdaptor)
	{
		$sCacheFile = '';
		if($this->bUseCache) {
			$sCachePath	= $this->getCachePath();
			$sCacheFile = $sCachePath.md5($this->sAddon.$this->sSystemLang.
										  $this->sDefaultLang.$this->sUserLang).'.php';
		}
		if($this->bUseCache && is_readable($sCacheFile)) {
				$this->aTranslations = $this->loadCacheFile($sCacheFile);
		}else {
			$bLanguageFound = false;
			$oAdaptor= new $sAdaptor($this->sAddon);
			if(!$oAdaptor instanceof TranslateAdaptorInterface) {
				$sMsg = 'Class ['.$sAdaptor.'] does not implement the '
				      . 'interface [TranslateAdaptorInterface]';
				throw new TranslationException($sMsg);
			}
		// load system language first
			if(($aResult = $this->loadLanguageSegments($this->sSystemLang, $oAdaptor)) !== false) {
			// load system language
				$this->aLanguages['system'] = $aResult;
				$bLanguageFound = true;
			}
			if($this->sDefaultLang != $this->sSystemLang) {
			// load default language if it's not equal system language
				if(($aResult = $this->loadLanguageSegments($this->sDefaultLang, $oAdaptor)) !== false) {
					$this->aLanguages['default'] = $aResult;
					$bLanguageFound = true;
				}
			}else {
			// copy system language
				$this->aLanguages['default'] = $this->aLanguages['system'];
			}
			if($this->sUserLang != $this->sDefaultLang 
			   && $this->sUserLang != $this->sSystemLang) {
			// load user language if it's not equal default language or system language
				if(($aResult = $this->loadLanguageSegments($this->sUserLang, $oAdaptor)) !== false) {
					$this->aLanguages['user'] = $aResult;
					$bLanguageFound = true;
				}
			}elseif($this->sUserLang == $this->sDefaultLang) {
			// copy default language
				$this->aLanguages['user'] = $this->aLanguages['default'];
			}elseif($this->sUserLang == $this->sSystemLang) {
			// copy system language
				$this->aLanguages['user'] = $this->aLanguages['system'];
			}
			if($bLanguageFound) {
			// copy user into default if default is missing
				if(sizeof($this->aLanguages['user']) && !sizeof($this->aLanguages['default'])) {
					$this->aLanguages['default'] = $this->aLanguages['user'];
				}
			// copy default into system if system is missing
				if(sizeof($this->aLanguages['default']) && !sizeof($this->aLanguages['system'])) {
					$this->aLanguages['system'] = $this->aLanguages['default'];
				}
			}
		// if absolutely no requested language found, simply get the first available language
			if(!$bLanguageFound) {
				$sFirstLanguage = $oAdaptor->findFirstLanguage();
			// load first found language if its not already loaded
				if(($aResult = $this->loadLanguageSegments($sFirstLanguage, $oAdaptor)) !== false) {
					$this->aLanguages['system'] = $aResult;
					$bLanguageFound = true;
				}
			}
			if($bLanguageFound) {
				$this->aTranslations = array_merge($this->aTranslations,
				                                    $this->aLanguages['system'],
				                                    $this->aLanguages['default'],
				                                    $this->aLanguages['user']);
				$this->writeCacheFile($sCacheFile);
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
		return isset($this->aTranslations[$sKey]);
	}
/**
 * Get translation text
 * @param string Language key
 * @return string Translation text
 */	
	public function __get($sKey)
	{
		if(isset($this->aTranslations[$sKey])) {
			return $this->aTranslations[$sKey];
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
		$aRetval = (is_array($this->aTranslations) ? $this->aTranslations : array());
		return $aRetval;
	}
/**
 * Load Language
 * @param string Language Code
 * @param object Adaptor object
 * @return bool|array
 */
	protected function loadLanguageSegments($sLangCode, $oAdaptor)
	{
		$aTranslations = array();
		// sanitize the language code
		$aLangCode = explode('_', preg_replace('/[^a-z0-9]/i', '_', strtolower($sLangCode)));
		$sConcatedLang = '';
		foreach($aLangCode as $sLang)
		{ // iterate all segments of the language code
			$sConcatedLang .= ($sConcatedLang == '' ? '' :  '_').$sLang;
			if( ($aResult = $oAdaptor->loadLanguage($sConcatedLang)) !== false ) {
				$aTranslations = array_merge($aTranslations, $aResult);
			}
		}
		return (sizeof($aTranslations) > 0 ? $aTranslations : false);
	}
/**
 * getCachePath
 * @return string a valid path for caching or null on error
 */
	protected function getCachePath()
	{
		$sCachePath = $this->sTempPath.__CLASS__.'/cache/';
		if(!file_exists($sCachePath) && is_writeable($this->sTempPath)) {
			$iOldUmask = umask(0); 
			mkdir($sCachePath, $this->iDirMode, true);
			umask($iOldUmask); 
		}
		if(is_writable($sCachePath)) {
			return $sCachePath;
		}else {
			return null;
		}
	}
/**
 * load cached translation table
 * @param string path/name of the cachefile
 * @return array list of translations
 */	
	protected function loadCacheFile($sCacheFile)
	{
		$aTranslation = array();
		include($sCacheFile);
		return $aTranslation;
	}
/**
 * Write cache from translation
 * @param string path/name of the cachefile
 */	
	protected function writeCacheFile($sCacheFile)
	{
		if($this->bUseCache) {
			$sOutput = '<?php'."\n".'/* autogenerated cachefile */'."\n";
			while (list($key, $value) = each($this->aTranslations)) {
				$sOutput .= '$aTranslation[\''.$key.'\'] = \''.addslashes($value).'\';'."\n";
			}
			file_put_contents($sCacheFile, $sOutput, LOCK_EX);
		}
	}
} // end of class TranslationTable