<?php
/**
 * @category     WebsiteBaker
 * @package      WebsiteBaker_Core
 * @author       Werner v.d.Decken
 * @copyright    WebsiteBaker Org e.V.
 * @license      http://www.gnu.org/licenses/gpl.html
 * @version      $Id$
 * @filesource   $HeadURL$
 * @since        Datei vorhanden seit Release 2.8.2
 * @lastmodified $Date$
 */
class ModLanguage {

	private $_sCurrentLanguage   = '';
	private $_sDefaultLanguage   = '';
	private $_sLanguageDirectory = '';
	private $_sLanguageFile      = '';
	private $_LanguageTable      = array();
	private $_bLoaded            = false;

	private static $_oInstance   = null;
/* prevent from public instancing */
	protected function  __construct() { }
/* prevent from cloning */
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
 * set language and load needed language file
 * @param string $sDirectory full path to the language files
 * @param string $sLanguage 2-letters language code
 * @param string $sDefault 2-letters default-language code
 */
	public function setLanguage($sDirectory, $sLanguage, $sDefault = 'EN')
	{
		$sBasePath = realpath(dirname(dirname(__FILE__)));
		$sLangDir = realpath($sDirectory);
		if(!preg_match('/^'.preg_quote($sBasePath, '/').'/', $sLangDir)) {
			throw new SecDirectoryTraversalException();
		}
		$sLangDir = str_replace('\\', '/', $sLangDir);
		$sLangDir = rtrim($sLangDir, '/').'/';
		$sLanguage = strtoupper($sLanguage);
		$sLanguage = strtoupper($sDefault);
		if($this->_sLanguageDirectory != $sLangDir ||
		   $this->_sCurrentLanguage != $sLanguage ||
		   $this->_sDefaultLanguage != $sDefault)
		{
		// only load language if not already loaded
			$this->_sLanguageDirectory = rtrim($sLangDir, '/').'/';
			$this->_sCurrentLanguage = $sLanguage;
			$this->_sDefaultLanguage = $sDefault;

			if(!$this->_findLanguageFile()) {
				$msg  = 'unable to find valid language definition file in<br />';
				$msg .= '"'.str_replace($sBasePath, '', $this->_sLanguageDirectory).'"';
				throw new TranslationException($msg);
			}
			$this->_importArrays();
		}
		$this->_bLoaded = (sizeof($this->_LanguageTable) > 0);
	}
/**
 * return requested translation for a key
 * @param string $sLanguageKey 2-uppercase letters language code
 * @return string found translation or empty string 
 */
	public function __get($sLanguageKey)
	{
		$sRetval = (isset($this->_LanguageTable[$sLanguageKey])
		            ? $this->_LanguageTable[$sLanguageKey] : '{missing: '.$sLanguageKey.'}');
		return $sRetval;
	}
/**
 * returns the whoole language array for use in templateengine
 * @return array
 */
	public function getLangArray()
	{
		return $this->_LanguageTable;
	}
/**
 * search language file in order: LANGUAGE - DEFAULT_LANGUAGE - FIRST_FOUND
 * @return boolean
 */
	private function _findLanguageFile()
	{
		$bMatch = false;
		$dir = $this->_sLanguageDirectory;
		if(is_readable($dir.$this->_sCurrentLanguage.'.php')) {
		// check actual language
			$this->_sLanguageFile = $dir.$this->_sCurrentLanguage.'.php';
			$bMatch = true;
		}else {
			if(is_readable($dir.$this->_sDefaultLanguage.'.php')) {
			// check default language
				$this->_sLanguageFile = $dir.$this->_sDefaultLanguage.'.php';
				$bMatch = true;
			}else {
			// search for first available and readable language file
				if(is_readable($dir)) {
					$iterator = new DirectoryIterator($dir);
					foreach ($iterator as $fileinfo) {
						if(!preg_match('/^[A-Z]{2}\.php$/', $fileinfo->getBasename())) { continue; }
						$sLanguageFile = str_replace('\\', '/', $fileinfo->getPathname());
						if(is_readable($sLanguageFile)) {
							$this->_sLanguageFile = $sLanguageFile;
							$bMatch = true;
							break;
						}
					}
				}
			}
		}
		return $bMatch;
	}
/**
 * import key-values from language file
 */
	private function _importArrays()
	{
		include($this->_sLanguageFile);
		$aLangSections = array('HEADING', 'TEXT', 'MESSAGE', 'MENU', 'OVERVIEW', 'GENERIC');
		foreach($aLangSections as $sSection) {
			if(isset(${$sSection}) && is_array(${$sSection})) {
				foreach(${$sSection} as $key => $value) {
					$this->_LanguageTable[$sSection.'_'.$key] = $value;
				}
			}
		}
	}
} // end class Translate
/**
 *  Exception class for Translation
 */
class TranslationException extends AppException {}

