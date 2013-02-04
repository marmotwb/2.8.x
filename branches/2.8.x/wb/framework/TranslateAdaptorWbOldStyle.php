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
 * @description  Loads translation table from old languagefiles before WB-2.9.0.
 *               Can handle Languagecodes like 'de_DE_BAY' (2ALPHA_2ALPHA_2-4ALNUM)
 */
class TranslateAdaptorWbOldStyle {

	protected $sAppPath   = '';
	protected $sAddon     = '';
	protected $aLangTable = array();
	protected $sFilePath  = '';
/**
 * Constructor
 * @param string descriptor of the Addon (i.e. '' || 'modules\myAddon'
 */
	public function __construct($sAddon = '')
	{
		$this->sAddon = $sAddon;
		$this->sAppPath = dirname(dirname(__FILE__)).'/';
		$this->sFilePath = $this->sAppPath
		                 . trim(str_replace('\\', '/', $sAddon), '/').'/languages/';
	}
/**
 * Load languagefile
 * @param string $sLangCode
 * @return array|bool an array of translations or FALSE on error
 */
	public function loadLanguage($sLangCode)
	{
		$aTranslations = array();
		// sanitize the language code
		$aLangCode = explode('_', preg_replace('/[^a-z0-9]/i', '_', strtolower($sLangCode)));
		$sConcatedLang = '';
		foreach($aLangCode as $sLang)
		{ // iterate all segments of the language code
			$sLangFile = '';
			$sLang = strtolower($sLang);
			// seek lowerchars file
			if(is_readable($this->sFilePath.$sConcatedLang.$sLang.'.php')) {
				$sLangFile = $this->sFilePath.$sConcatedLang.$sLang.'.php';
			}else {
				// seek upperchars file
				$sLang = strtoupper($sLang);
				if(is_readable($this->sFilePath.$sConcatedLang.$sLang.'.php')) {
					$sLangFile = $this->sFilePath.$sConcatedLang.$sLang.'.php';
				}
			}
			if($sLangFile) {
			// import the fond file
				$sConcatedLang .= $sLangFile.'_';
				$aTmp = $this->_importArrays($sLangFile);
				$aTranslations = array_merge($aTranslations, $aTmp);
			}
		}
		return (sizeof($aTranslations) > 0 ? $aTranslations : false);
	}
/**
 * Find first existing language
 * @return string Code of first found language
 */
	public function findFirstLanguage()
	{
	// search for first available and readable language file
		$sRetval = '';
		if(is_readable($this->sFilePath)) {
			$iterator = new DirectoryIterator($this->sFilePath);
			foreach ($iterator as $oFileInfo) {
				$sPattern = '/^[a-z0-9]{2}(?:(?:\_[a-z0-9]{2})?(?:\_[a-z0-9]{2,4})?)\.php/siU';
				if(!preg_match($sPattern, $oFileInfo->getBasename())) { continue; }
				if($oFileInfo->isReadable()) {
					$sRetval = $oFileInfo->getBasename('.php');
					break;
				}
			}
		}
		return $sRetval;
	}
/**
 * Import language definitions into array
 * @param string load language from filename
 * @return array contains all found translations
 */
	private function _importArrays($sLanguageFile)
	{
		// include the file
		include($sLanguageFile);
		// get all available loaded vars of this method
		$aAllVars = get_defined_vars();
		$aLangSections = array();
		$aLanguageTable = array();
		foreach($aAllVars as $key=>$value) {
		// extract the names of arrays from language file
			if(is_array($value)) {
				$aLangSections[] = $key;
			}
		}
		foreach($aLangSections as $sSection) {
		// walk through all arrays
			foreach(${$sSection} as $key => $value) {
			// and import all found translations
				$aLanguageTable[$sSection.'_'.$key] = $value;
			}
		}
		return $aLanguageTable;
	}
} // end of class TranslateAdaptorWbOldStyle
