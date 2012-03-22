<?php
/**
 *
 * @category        WBCore
 * @package         WBCore_addons
 * @author          Werner v.d.Decken
 * @copyright       Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @revision        $Revision$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 */

class CopyTheme{

// global vars
	private $_oDb             = null;
	private $_aLang           = array();
	private $_aGlobals        = array();
// class properties
	private $_sThemesBasePath = ''; // (/var/www/httpdocs/wb/templates)
	private $_sSourceDir      = ''; // (default_theme)
	private $_sNewThemeDir    = ''; // (MyNewBackendTheme)
	private $_sNewThemeName   = ''; // ('my new Backend Theme')

	private $_aErrors         = array();

/**
 *
 * @param string $sSourceThemePath (THEME_PATH.'/templates/'.DEFAULT_THEME)
 * @param string $sNewThemeName (NewName)
 */
	public function __construct()
	{
	// import global vars
		$this->_oDb   = $GLOBALS['database'];
		$this->_aLang = $GLOBALS['MESSAGE'];
	// import global Consts
		$this->_aGlobals['TablePrefix']     = TABLE_PREFIX;
		$this->_aGlobals['Debug']           = (defined('DEBUG') && DEBUG === true);
		$this->_aGlobals['IsLinux']         = ((substr(__FILE__, 0, 1)) == '/');
		$this->_aGlobals['StringDirMode']   = STRING_DIR_MODE;
		$this->_aGlobals['StringFileMode']  = STRING_FILE_MODE;
	}
/**
 * start copy current theme into a new theme
 * @param string $sSourceThemePath (/var/www/httpdocs/wb/templates/destination_theme)
 * @param string $sNewThemeName (NewName)
 * @return bool 
 */
	public function execute($sSourceThemePath, $sNewThemeName)
	{
		$bRetval = false;
		$this->clearError();
		$this->_init($sSourceThemePath, $sNewThemeName);
		if(!is_writeable($this->_sThemesBasePath)) {
			$this->_setError( $this->_aLang['THEME_DESTINATION_READONLY'].' >> '
			                  .$this->_sThemesBasePath );
			return false;
		}
		if($this->_copyTree()) {
			if($this->_modifyInfoFile()) {
				if($this->_registerNewTheme()) {
					return true;
				}
			}
		}
		$dir = $this->_sThemesBasePath.'/'.$this->_sNewThemeDir;
		$this->_doRollback($dir);
		return false;
	}
/**
 * initialize the class
 * @param string $sSourceThemePath (/var/www/httpdocs/wb/templates/destination_theme)
 * @param string $sNewThemeName (NewName)
 * @return boolean
 */
	private function _init($sSourceThemePath, $sNewThemeName)
	{
	// sanitize arguments and calculate local vars
		$this->_sThemesBasePath = str_replace('\\','/', dirname($sSourceThemePath));
		$this->_sSourceDir = basename($sSourceThemePath);
		$this->_sNewThemeDir = $this->_SanitizeNewDirName($sNewThemeName);
		$this->_sNewThemeName = $this->_SanitizeNewName($sNewThemeName);
	}
/**
 * sanitize the new name and make it unique
 * @param string $sName
 * @return string
 */
	private function _SanitizeNewName($sName)
	{
		$sName = (trim($sName) == '' ? 'MyNewTheme' : $sName);
		$sName = mysql_real_escape_string($sName);
		$iCount = '';
		do {
			$sSearch = $sName.($iCount ? ' '.$iCount : '');
			$sql = 'SELECT COUNT(*) FROM `'.$this->_aGlobals['TablePrefix'].'addons` '
				 . 'WHERE LOWER(`name`)=\''.strtolower($sSearch).'\' AND `function`=\'theme\'';
			$exists = $this->_oDb->get_one($sql);
			$iCount = (int)$iCount + 1;
		}while($exists);
		return ($sName != $sSearch ? $sSearch : $sName);
	}
/**
 * generate a unique valid dirname from template name
 * @param string $sName
 * @return string
 */	
	private function _SanitizeNewDirName($sName)
	{
		// remove all of the ASCII controllcodes
		$sName = preg_replace('/[^0-9a-zA-Z \-_]/', '', strtolower($sName));
		$sName = str_replace(array('-', '_'), array('- ', ' '), $sName);
		$sName = str_replace(' ', '', ucwords($sName));
		$sName = ($sName == '' ? 'MyNewTheme' : $sName);
		$iCount = '';
		do {
			$sSearch = $sName.($iCount ? '_'.$iCount : '');
			$sql = 'SELECT COUNT(*) FROM `'.$this->_aGlobals['TablePrefix'].'addons` '
				 . 'WHERE `directory`=\''.$sSearch.'\' AND `function`=\'theme\'';
			$exists = $this->_oDb->get_one($sql);
			$iCount = (int)$iCount + 1;
		}while($exists);
		return ($sName != $sSearch ? $sSearch : $sName);
	}
/**
 * copy the complete theme - directory tree with all included files
 * @return boolean true if ok
 */
	private function _copyTree()
	{
		$bRetval = true;
		$sSourceDir = $this->_sThemesBasePath.'/'.$this->_sSourceDir;
		// build file list to copy into destination theme
		$aFileList = array();
		try {
			$oIterator = new RecursiveDirectoryIterator($sSourceDir);
			foreach (new RecursiveIteratorIterator($oIterator) as $cur) {
				if($cur->isDir() || strpos($cur, '.svn') !== false) { continue; }
				$sPattern = '/^'.preg_quote($sSourceDir, '/').'/';
				$sFilename = preg_replace($sPattern, '', $cur->getPathname());
				$sFilePath = preg_replace($sPattern, '', $cur->getPath());
				$aFileList[$sFilename] = $sFilePath;
			}
			natsort($aFileList);
		}catch(Exeption $e) {
			$msg  = 'CopyTheme::_copyTree => '.$this->_aLang['GENERIC_FAILED_COMPARE'];
			$msg .= '<br />'.$e->getMessage();
			$this->_setError($msg);
			$bRetval = false;
		}
		if($bRetval) {
		// create all needed directories
			$aDirectories = array_unique(array_values($aFileList));
			$bRetval = $this->_createDirs($aDirectories);
		}
		if($bRetval) {
			// copy all needed files
			$aFiles = array_keys($aFileList);
			$bRetval = $this->_copyFiles($aFiles);
		}
		return $bRetval;
	}
/**
 * create all the directories from $aNewDirs-list under $sBaseDir
 * @param array $aNewDirList ( array('', '/images', '/images/files')
 */
	private function _createDirs($aNewDirList)
	{
		$bRetval = true;
		foreach($aNewDirList as $sDir) {
			$sNewDir = $this->_sThemesBasePath.'/'.$this->_sNewThemeDir.$sDir;
			if(!file_exists($sNewDir) &&  mkdir($sNewDir, 0777, true)) {
				if($this->_aGlobals['IsLinux']) {
					if(!chmod($sNewDir, $this->_aGlobals['StringDirMode'])) {
						$sMsg = 'CopyTheme::createDirs::chmod('.$sNewDir.') >> '
								.$this->_aLang['GENERIC_FAILED_COMPARE'];
						$this->_setError($sMsg);
						$bRetval = false;
						break;
					}
				}
			}else {
				$sMsg = 'CopyTheme::createDirs::mkdir('.$sNewDir.') >> '
						.$this->_aLang['GENERIC_FAILED_COMPARE'];
				$this->_setError($sMsg);
				$bRetval = false;
				break;
			}
		}
		return $bRetval;
	}
/**
 * copies a list of files from source directory to destination directory
 * @param array $aFileList (array('/index.php', '/images/index.php', '/images/files/index.php')
 */
	private function _copyFiles($aFileList)
	{
		$bRetval = true;
		$sSourceDir = $this->_sThemesBasePath.'/'.$this->_sSourceDir;
		$sDestinationDir = $this->_sThemesBasePath.'/'.$this->_sNewThemeDir;
		foreach($aFileList as $sFile) {
			if(copy($sSourceDir.$sFile, $sDestinationDir.$sFile)) {
				if($this->_aGlobals['IsLinux']) {
					if(!chmod($sDestinationDir.$sFile, $this->_aGlobals['StringFileMode'])) {
						$sMsg = 'CopyTheme::copyFiles::chmod('.$sDestinationDir.$sFile.') >> '
								.$this->_aLang['GENERIC_FAILED_COMPARE'];
						$this->_setError($sMsg);
						$bRetval = false;
						break;
					}
				}
			}else {
				$sMsg = 'CopyTheme::copyFiles::copy('.$sDestinationDir.$sFile.') >> '
						.$this->_aLang['GENERIC_FAILED_COMPARE'];
				$this->_setError($sMsg);
				$bRetval = false;
				break;
			}
		}
		return $bRetval;
	}
/**
 * register a available theme in the database (gets values from info.php)
 * @return bool TRUE if ok
 */
	private function _registerNewTheme()
	{
		$bRetval = true;
		$sThemeInfoFile = $this->_sThemesBasePath.'/'.$this->_sNewThemeDir.'/info.php';
		$aVariables = $this->_getThemeInfo($sThemeInfoFile);
		$sql = 'INSERT INTO `'.$this->_aGlobals['TablePrefix'].'addons` '
		     . 'SET `type`=\'template\', '
		     .     '`function`=\'theme\', '
		     .     '`directory`=\''.$aVariables['directory'].'\', '
		     .     '`name`=\''.$aVariables['name'].'\', '
		     .     '`description`=\''.mysql_real_escape_string($aVariables['description']).'\', '
		     .     '`version`=\''.$aVariables['version'].'\', '
		     .     '`platform`=\''.$aVariables['platform'].'\', '
		     .     '`author`=\''.mysql_real_escape_string($aVariables['author']).'\', '
		     .     '`license`=\''.mysql_real_escape_string($aVariables['license']).'\'';
		if(!$this->_oDb->query($sql)) {
			$sMsg = 'CopyTheme::registerNewTheme('.$this->_sNewThemeName.') >> '
			        .$this->_aLang['GENERIC_NOT_UPGRADED'];
			$sMsg .= (($this->_aGlobals['Debug']) ? '<br />'.$this->_oDb->get_error() : '');
			$this->_setError($sMsg);
			$bRetval = false;
		}
		return $bRetval;
	}
/**
 * modify info-file of copied theme
 * @return bool TRUE if ok
 */
	private function _modifyInfoFile()
	{
		$bRetval = false;
		$sThemeInfoFile = $this->_sThemesBasePath.'/'.$this->_sNewThemeDir.'/info.php';
		$aVariables = $this->_getThemeInfo($sThemeInfoFile);
		$aVariables['directory']   = $this->_sNewThemeDir;
		$aVariables['name']        = $this->_sNewThemeName;
		$aVariables['version']     = '0.0.1';
		$aVariables['description'] = '(copy): '.$aVariables['description'];
		if(file_exists($sThemeInfoFile)) {
			$sInfoContent = file_get_contents($sThemeInfoFile);
			foreach($aVariables as $key=>$val) {
				$sSearch  = '/(\$template_'.$key.'\s*=\s*(["\'])).*?(\2)\s*;/s';
				$sReplace = ($val != '' && is_numeric($val[0])) ? '${1}' : '$1';
				$sReplace .= $val.'$2;';
				$sInfoContent = preg_replace($sSearch, $sReplace, $sInfoContent);
			}
			// remove trailing "\?\>" to sanitize the php file
			$sInfoContent = preg_replace('/\s*?\?>\s*$/', '', $sInfoContent)."\n";
			if(file_put_contents($sThemeInfoFile, $sInfoContent) !== false) {
				return true;
			}
		}
		$this->_setError('CopyTheme::modifyInfoFile('.$this->_sNewThemeDir.'/info.php) >> '
		               .$this->_aLang['GENERIC_NOT_UPGRADED']);
		return $bRetval;
	}
/**
 * read old values from old info-file
 * @param string $sThemeInfoFile
 * @return array
 */
	private function _getThemeInfo($sThemeInfoFile)
	{
		if(file_exists($sThemeInfoFile)) {
			include $sThemeInfoFile;
			return array(
				'directory' => $template_directory?$template_directory:null,
				'name' => $template_name?$template_name:null,
				'version' => $template_version?$template_version:null,
				'description' => $template_description?$template_description:null,
				'platform' => $template_platform?$template_platform:null,
				'author' => $template_author?$template_author:null,
				'license' => $template_license?$template_license:null,
			);
		} else {
			return array(
				'directory' => null,
				'name' => null,
				'version' => null,
				'description' => null,
				'platform' => null,
				'author' => null,
				'license' => null,
			);
		}
	}
/**
 * on Error undo all already done copy/create actions
 * @param string $dir
 */
	private function _doRollback($dir)
	{
		$iFileErrors = 0;
		$iDirErrors  = 0;
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir),
												  RecursiveIteratorIterator::CHILD_FIRST);
		foreach ($iterator as $path) {
			if ($path->isDir()) {
				rmdir($path->__toString());
			} else {
				unlink($path->__toString());
			}
		}
		unset($path);
		unset($iterator);
		if(file_exists($dir)) { rmdir($dir); }
	}
/**
 * add a new error message to the queue
 * @param string $sErrMsg
 */
	private function _setError($sErrMsg)
	{
		$this->_aErrors[] = $sErrMsg;
	}
/**
 * clear the errors queue
 */
	public function clearError()
	{
		$this->_aErrors = array();
	}
/**
 * true if there is an error otherwise false
 * @return bool
 */
	public function isError()
	{
		return (sizeof($this->_aErrors) > 0);
	}
/**
 * gets all error messages as multiline string
 * @param bool $nl2br true seperates lines by "<br />" else by "\n"
 * @return string 
 */
	public function getError($nl2br = true)
	{
		$sClue = ($nl2br ? '<br />' : "\n");
		$sErrorMsg = implode($sClue, $this->_aErrors);
		return $sErrorMsg;
	}


} // end class