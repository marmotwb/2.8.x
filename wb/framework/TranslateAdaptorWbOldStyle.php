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
 * @description  Loads translation table from old languagefiles before WB-2.9.0.
 *               Can handle Languagecodes like 'de_DE_BAY' (2ALPHA_2ALPHA_2-4ALNUM)
 */
class TranslateAdaptorWbOldStyle implements TranslateAdaptorInterface {

	protected $sAddon     = '';
	protected $sFilePath  = '';
/**
 * Constructor
 * @param string descriptor of the Addon (i.e. '' || 'modules\myAddon'
 */
	public function __construct($sAddon = '')
	{
		$this->sAddon = $sAddon;
	}
/**
 * Load languagefile
 * @param string $sLangCode
 * @return array|bool an array of translations or FALSE on error
 */
	public function loadLanguage($sLangCode)
	{
		$sLanguagePath = $this->_getAddonPath();
		$aTranslations = array();
		$sLangFile = strtolower($sLangCode.'.php');
		if( ($aDirContent = scandir($sLanguagePath)) !== false) {
			foreach($aDirContent as $sFile) {
				if($sLangFile === strtolower($sFile)) {
					$sLangFile = $sLanguagePath.$sFile;
					if(is_readable($sLangFile)) {
						$aTmp = $this->_importArrays($sLangFile);
						$aTranslations = array_merge($aTranslations, $aTmp);
						break;
					}
				}
			}
		}
		return (sizeof($aTranslations) > 0 ? $aTranslations : false);
	}
/**
 * Find first existing language
 * @return string Code of first found basic language
 */
	public function findFirstLanguage()
	{
		$sLanguagePath = $this->_getAddonPath();
	// search for first available and readable language file
		$sRetval = '';
		if(is_readable($sLanguagePath)) {
			$iterator = new DirectoryIterator($sLanguagePath);
			foreach ($iterator as $oFileInfo) {
				$sPattern = '/^[a-z]{2,3}\.php/siU';
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
 * set path to translation files
 * @throws TranslationException
 */
	private function _getAddonPath()
	{
	// set environment
		$sAddon   = trim(str_replace('\\', '/', $this->sAddon), '/');
		$sAppDirname = str_replace('\\', '/', dirname(dirname(__FILE__))).'/';
		$sLanguagePath = $sAppDirname.$sAddon.'/languages/';
		if(is_dir($sLanguagePath) && is_readable($sLanguagePath)) {
		// valid directory found
			return $sLanguagePath;
		}
		if(preg_match('/^admin.*/sU', $sAddon))
		{
		// get used acp dirname
			$sTmp = trim(WbAdaptor::getInstance()->AcpDir, '/');
		// if path starts with 'admin/' then replace with used acp dirname
			$sLanguagePath = $sAppDirname.preg_replace('/^admin/sU', $sTmp, $sAddon).'/languages/';
			if(is_dir($sLanguagePath) && is_readable($sLanguagePath)) {
			// valid directory found
				return $sLanguagePath;
			}
		}
		throw new TranslationException('\''.$sAddon.'/languages\' is not a direcory or not readable!');
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
				if(!is_array($value)) {
				// skip all multiarray definitions from compatibility mode
					$aLanguageTable[$sSection.'_'.$key] = $value;
				}
			}
		}
		return $aLanguageTable;
	}
} // end of class TranslateAdaptorWbOldStyle
