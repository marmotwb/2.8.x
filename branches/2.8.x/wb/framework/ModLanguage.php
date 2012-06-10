<?php
/**
 * @category     WebsiteBaker
 * @package      WebsiteBaker_Core
 * @author       Werner v.d.Decken
 * @copyright    WebsiteBaker Org e.V.
 * @license      http://www.gnu.org/licenses/gpl.html
 * @version      $Id$
 * @filesource   $HeadURL$
 * @since        Datei vorhanden seit Release 2.8.4
 * @lastmodified $Date$
 */
class ModLanguage {

// @var string 2 upercase chars for hardcoded system default language
	private $_sSystemLanguage    = 'EN';
// @var string 2 upercase chars for default fallback language
	private $_sDefaultLanguage   = '';
// @var string 2 upercase chars for current active language
	private $_sCurrentLanguage   = '';
// @var string full directory with trailing slash to search language files in
	private $_sLanguageDirectory = '';
// @array list to hold the complete resulting translation table
	private $_aLanguageTable     = array();
// @array list of all loaded/merged languages
	private $_aLoadedLanguages   = array();

// @boolean set to TRUE if language is successfully loaded
	private $_bLoaded            = false;
// @object hold the Singleton instance
	private static $_oInstance   = null;

/**
 *  prevent class from public instancing
 */
	final protected function  __construct() { }
/**
 *  prevent from cloning existing instance
 */
	final private function __clone() {}
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
 * return requested translation for a key
 * @param string $sLanguageKey 2-uppercase letters language code
 * @return string found translation or empty string
 * @throws TranslationException
 */
	public function __get($sLanguageKey)
	{
		if($this->_bLoaded) {
			$sRetval = (isset($this->_aLanguageTable[$sLanguageKey])
						? $this->_aLanguageTable[$sLanguageKey] : '{missing: '.$sLanguageKey.'}');
			return $sRetval;
		}
		$msg = 'No translation table loaded';
		throw new TranslationException($msg);
	}
/**
 * returns the whoole language array for use in templateengine
 * @return array
 * @throws TranslationException
 */
	public function getLangArray()
	{
		if($this->_bLoaded) {
			return $this->_aLanguageTable;
		}
		$msg = 'No translation table loaded';
		throw new TranslationException($msg);
	}
/**
 * set language and load needed language file
 * @param string $sDirectory full path to the language files
 * @param string $sLanguage 2 chars current active language code
 * @param string $sDefault 2 chars default fallback language code
 * @throws SecDirectoryTraversalException [global exception]
 * @throws TranslationException [private exception]
 */
	public function setLanguage($sDirectory, $sCurrentLanguage, $sDefaultLanguage = 'EN')
	{
		// sanitize arguments
		$sBasePath = realpath(dirname(dirname(__FILE__)));
		$sLangDir  = realpath($sDirectory);
		if(preg_match('/^'.preg_quote($sBasePath, '/').'/', $sLangDir)) {
			$sLangDir  = rtrim(str_replace('\\', '/', $sLangDir), '/').'/';
			$sCurrentLanguage = strtoupper($sCurrentLanguage);
			$sDefaultLanguage = strtoupper($sDefaultLanguage);
			// check if the requested language is not already loaded
			if($this->_sLanguageDirectory != $sLangDir ||
			   $this->_sCurrentLanguage   != $sCurrentLanguage ||
			   $this->_sDefaultLanguage   != $sDefaultLanguage)
			{
			// now load and merge the files in order SYSTEM - DEFAULT - CURRENT
				$this->_aLanguageTable = array();
				// at first load DEFAULT_LANGUAGE
				$this->_loadLanguage($sLangDir, $sDefaultLanguage);
				// at second merge CURRENT_LANGUAGE to front if not already loaded
				if(!in_array($sCurrentLanguage, $this->_aLoadedLanguages)) {
					$this->_loadLanguage($sLangDir, $sCurrentLanguage);
				}
				// at last merge SYSTEM_LANGUAGE to background if not already loaded
				if(!in_array($this->_sSystemLanguage, $this->_aLoadedLanguages)) {
					$this->_loadLanguage($sLangDir, $this->_sSystemLanguage, true);
				}
				// if no predefined language was fond, search for first available language
				if(sizeof($this->_aLanguageTable) == 0) {
					// if absolutely no language was fond, throw an exception
					if(false !== ($sRandomLanguage = $this->_findFirstLanguage($sLangDir))) {
						$this->_loadLanguage($sLangDir, $sRandomLanguage);
					}
				}
				// remember last settings
				$this->_sLanguageDirectory = $sLangDir;
				$this->_sCurrentLanguage   = $sCurrentLanguage;
				$this->_sDefaultLanguage   = $sDefaultLanguage;
			}
			if(!($this->_bLoaded = (sizeof($this->_aLanguageTable) != 0))) {
				$msg  = 'unable to find valid language definition file in<br />';
				$msg .= '"'.str_replace($sBasePath, '', $this->_sLanguageDirectory).'"';
				throw new TranslationException($msg);
			}
			$this->_bLoaded = true;
		}else {
			throw new SecDirectoryTraversalException($sLangDir);
		}
	}
/**
 * load language from given directory
 * @param string $sLangDir
 * @param string $sLanguage
 */
	private function _loadLanguage($sLangDir, $sLanguage, $bLoadSystemLanguage = false)
	{
		if(is_readable($sLangDir.$sLanguage.'.php')) {
			$aTemp = $this->_importArrays($sLangDir.$sLanguage.'.php');
			if($bLoadSystemLanguage) {
				$this->_aLanguageTable = array_merge($aTemp, $this->_aLanguageTable);
			}else {
				$this->_aLanguageTable = array_merge($this->_aLanguageTable, $aTemp);
			}
			$this->_aLoadedLanguages[] = $sLanguage;
		}
	}
/**
 * find first available language in given directory
 * @param  string $sLangDir the directory to scan for language files
 * @return string returns the 2 char language code or FALSE if search fails
 */
	private function _findFirstLanguage($sLangDir)
	{
	// search for first available and readable language file
		$sRetval = false;
		if(is_readable($sLangDir)) {
			$iterator = new DirectoryIterator($sLangDir);
			foreach ($iterator as $fileinfo) {
				if(!preg_match('/^[A-Z]{2}\.php$/', $fileinfo->getBasename())) { continue; }
				$sLanguageFile = $fileinfo->getPathname();
				if(is_readable($sLanguageFile)) {
					$sRetval = basename($sLanguageFile, '.php');
					break;
				}
			}
		}
		return $sRetval;
	}
/**
 * import key-values from language file
 * @param  string $sLanguageFile
 * @return array of language definitions
 */
	private function _importArrays($sLanguageFile)
	{
		include($sLanguageFile);
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
} // end class Translate
/**
 *  Exception class for Translation
 */
class TranslationException extends AppException {}
