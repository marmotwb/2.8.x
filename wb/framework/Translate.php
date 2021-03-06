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
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 12.01.2013
 * @description  basic class of the Translate package
 */
class Translate {
	
/** holds the active singleton instance */
	private static $_oInstance     = null;
/** name of the default adaptor */	
	protected $sAdaptor            = 'WbOldStyle';
/** setting for the system language (default: en) */
	protected $sSystemLanguage     = 'en';
/** setting for the default runtime language (default: en) */
	protected $sDefaultLanguage    = 'en';
/** setting for the user defined language (default: en) */
	protected $sUserLanguage       = 'en';
/** switch cache on/off */
	protected $bUseCache           = true;
/** defines if the keys of undefines translation should be preserved */
	protected $bRemoveMissing      = false;
/** can hold up to 31 boolean option settings */
	protected $iOptions            = 0;
/** List of loaded translation tables */
	protected $aLoadedAddons       = array();
/** TranslationTable object of the core and additional one activated addon */	
	protected $aActiveTranslations = array();
// **  */
    protected $aPrivatePriorities = array();
/** possible option flags */	
	const CACHE_DISABLED = 1; // ( 2^0 )
	const KEEP_MISSING   = 2; // ( 2^1 )
/** types of translation tables */
    const TABLE_CORE               = 0;
    const TABLE_ADDON              = 1;
    const TABLE_THEME              = 2;
    const TABLE_TEMPLATE           = 2;
    const FIRST_USER_DEFINED_TABLE = 10;
    const STEP_USER_DEFINED_TABLES = 5;
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
 * @param string SystemLanguage code ('de' || 'de_CH' || 'de_CH_uri')
 * @param string DefaultLanguage code ('de' || 'de_CH' || 'de_CH_uri')
 * @param string UserLanguage code ('de' || 'de_CH' || 'de_CH_uri')
 * @param string Name of the adaptor to use
 * @param integer possible options (DISABLE_CACHE | KEEP_MISSING)
 * @throws TranslationException
 */
	public function initialize($sSystemLanguage, 
	                           $sDefaultLanguage, 
	                           $sUserLanguage = '', 
	                           $sAdaptor = 'WbOldStyle', 
	                           $iOptions = 0)
	{
		if(!class_exists('TranslateAdaptor'.$sAdaptor)) {
			throw new TranslationException('unable to load adaptor: '.$sAdaptor);
		}
		$this->sAdaptor       = 'TranslateAdaptor'.$sAdaptor;
		$this->bUseCache      = (!($iOptions & self::CACHE_DISABLED));
		$this->bRemoveMissing = (!($iOptions & self::KEEP_MISSING));
		// if no system language is set then use language 'en'
		$this->sSystemLanguage = (trim($sSystemLanguage) == '' ? 'en' : $sSystemLanguage);
		// if no default language is set then use system language
		$this->sDefaultLanguage = (trim($sDefaultLanguage) == '' 
		                            ? $this->sSystemLanguage 
		                            : $sDefaultLanguage);
		// if no user language is set then use default language
		$this->sUserLanguage = (trim($sUserLanguage) == '' 
		                         ? $this->sDefaultLanguage
		                         : $sUserLanguage);
		$sPattern = '/^[a-z]{2,3}(?:(?:[_-][a-z]{2})?(?:[_-][a-z0-9]{2,4})?)$/siU';
		// validate language codes
		if(preg_match($sPattern, $this->sSystemLanguage) &&
		   preg_match($sPattern, $this->sDefaultLanguage) &&
		   preg_match($sPattern, $this->sUserLanguage))
		{
		// load core translations and activate it
			$oTmp = new TranslationTable('', 
			                             $this->sSystemLanguage, 
			                             $this->sDefaultLanguage, 
			                             $this->sUserLanguage,
			                             $this->bUseCache);
			$this->aLoadedAddons['core'] = $oTmp->load($this->sAdaptor);
			$this->aActiveTranslations[self::TABLE_CORE] = $this->aLoadedAddons['core'];
			if(sizeof($this->aLoadedAddons['core']) == 0) {
			// throw an exception for missing translations
				throw new TranslationException('missing core translations');
			}
		}else {
		// throw an exception for invalid or missing language codes
			$sMsg = 'Invalid language codes: ['.$this->sSystemLanguage.'] or ['
			      . $this->sDefaultLanguage.'] or ['.$this->sUserLanguage.']';
			throw new TranslationException($sMsg);
		}
	}
/**
 * Add new addon
 * @param string Addon descriptor (i.e. 'modules\myAddon')
 * @param string (optional)Adaptor name (default: $this->sAdaptor)
 * @return bool 
 */	
	public function addAddon($sAddon, $sAdaptor = null)
	{
		if($sAdaptor) {
			if(!class_exists('TranslateAdaptor'.$sAdaptor)) {
				throw new TranslationException('unable to load adaptor: '.$sAdaptor);
			}
			$sAdaptor = 'TranslateAdaptor'.$sAdaptor;
		}else {
			$sAdaptor = $this->sAdaptor;
		}
		$sAddon = str_replace('/', '\\', $sAddon);
		if(!(strtolower($sAddon) == 'core' || $sAddon == '' || isset($this->aLoadedAddons[$sAddon]))) {
		// load requested addon translations if needed and possible
			$oTmp = new TranslationTable($sAddon, 
			                             $this->sSystemLanguage, 
			                             $this->sDefaultLanguage, 
			                             $this->sUserLanguage,
			                             $this->bUseCache);
			$this->aLoadedAddons[$sAddon] = $oTmp->load($sAdaptor);
		}
	}
/**
 * Activate Addon
 * @param string Addon descriptor (i.e. 'modules\myAddon')
 * @param string (optional)Adaptor name (default: $this->sAdaptor)
 */	
	public function enableAddon($sAddon, $sAdaptor = null)
	{
		$sAddon = str_replace('/', '\\', $sAddon);
		if(!(strtolower($sAddon) == 'core' || $sAddon == '')) {
			if(!isset($this->aLoadedAddons[$sAddon])) {
				$this->addAddon($sAddon, $sAdaptor);
			}
			$this->aActiveTranslations[self::TABLE_ADDON] = $this->aLoadedAddons[$sAddon];
		}
		
	}
/**
 * Dissable active addon
 */	
	public function disableAddon()
	{
		if(isset($this->aActiveTranslations[self::TABLE_ADDON])) {
			unset($this->aActiveTranslations[self::TABLE_ADDON]);
		}
	}
/**
 * Activate additional translation table
 * @param string $sAddon    Addon descriptor (i.e. 'modules\myAddon')
 * @param int    $iPriority (default: self::FIRST_USER_DEFINED_TABLE)
 * @param string $sAdaptor  (optional)Adaptor name (default: $this->sAdaptor)
 */
	public function enablePrivateTable($sAddon, $iPriority = self::FIRST_USER_DEFINED_TABLE, $sAdaptor = null)
	{
        switch (($iPriority = intval($iPriority))) :
            case self::TABLE_THEME:
            case self::TABLE_TEMPLATE:
                break;
            default:
                $iPriority = ($iPriority < self::FIRST_USER_DEFINED_TABLE ? self::FIRST_USER_DEFINED_TABLE : $iPriority);
            // search for first free priority position
                while (array_key_exists($iPriority, $this->aActiveTranslations)) {
                    $iPriority += self::STEP_USER_DEFINED_TABLES;
                }
                break;
        endswitch;
    // sanitize Addon descriptor
		$sAddon = str_replace('/', '\\', $sAddon);
		if(!(strtolower($sAddon) == 'core' || $sAddon == '')) {
        // if addon is not already in list then add it now
			if(!isset($this->aLoadedAddons[$sAddon])) {
				$this->addAddon($sAddon, $sAdaptor);
			}
            // copy table into activate list
			$this->aActiveTranslations[$iPriority] = $this->aLoadedAddons[$sAddon];
            // save dependency of addon<->priority
            $this->aPrivatePriorities[$sAddon] = $iPriority;
            // sort active list ascending by priority
            ksort($this->aActiveTranslations);
		}

	}
/**
 * Remove private table from ActiveTranslations table
 * @param string $sAddon    Addon descriptor (i.e. 'modules\myAddon')
 */
	public function disablePrivateTable($sAddon)
    {
    // sanitize addon descriptor
		$sAddon = str_replace('/', '\\', $sAddon);
        if (isset($this->aPrivatePriorities[$sAddon])) {
        // get priority for this addon if it's loaded
            $iPriority = $this->aPrivatePriorities[$sAddon];
        // check if addon is activated
            if (isset($this->aActiveTranslations[$iPriority]) && $iPriority >= self::FIRST_USER_DEFINED_TABLE) {
            // deactivate addon and remove it from priority list
                unset($this->aActiveTranslations[$iPriority]);
                unset($this->aPrivatePriorities[$sAddon]);
            // sort active translation list for ascending priority
                ksort($this->aActiveTranslations);
            }
        }
    }
/**
 * Is key available
 * @param string Language key
 * @return bool
 */
	public function __isset($sKey)
	{
		foreach($this->aActiveTranslations as $oAddon) {
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
		$sRetval = ($this->bRemoveMissing ? '' : '#'.$sKey.'#');
		foreach($this->aActiveTranslations as $oAddon) {
			if(isset($oAddon->$sKey)) {
			// search the last matching translation (Core -> Addon)
				$sRetval = $oAddon->$sKey;
			}
		}
		return $sRetval;
	}
/**
 * Protect class from property injections
 * @param string name of property
 * @param mixed value
 * @throws TranslationException
 */	
	public function __set($name, $value) {
		throw new TranslationException('tried to set a readonly or nonexisting property ['.$name.']!! ');
	}
/**
 * Get translation text with replaced placeholders
 * @param type $sKey
 * @param type $aArguments
 * @return type
 */
    public function __call($sKey, $aArguments)
    {
		$sRetval = '';
		foreach($this->aActiveTranslations as $oAddon) {
			if(isset($oAddon->$sKey)) {
			// search the last matching translation (Core -> Addon)
				$sRetval = $oAddon->$sKey;
			}
		}
		if(sizeof($aArguments) > 0 && $sRetval != '') {
			foreach($aArguments as $iKey=>$sArgument) {
				if(is_string($sArgument)) {
					$sRetval = preg_replace('/\{'.$iKey.'\}/', $sArgument, $sRetval);
				}
			}
		}
		return ($sRetval != '' ? $sRetval : ($this->bRemoveMissing ? '' : '#'.$sKey.'#'));
    }

/**
 * Return complete table of translations
 * @return array
 * @deprecated for backward compatibility only. Will be removed shortly
 */	
	public function getLangArray()
	{
		$aSumTranslations = array();
		foreach($this->aActiveTranslations as $oTranslationTable) {
			if(get_class($oTranslationTable) == 'TranslationTable') {
				$aSumTranslations = array_merge($aSumTranslations, $oTranslationTable->getArray());
			}
		}
		return $aSumTranslations;
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