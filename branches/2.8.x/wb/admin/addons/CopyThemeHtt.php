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

class CopyThemeHtt {

	private static $_sSkelPath  = ''; 
	private static $_sThemePath = '';
	private static $_sOs        = '';
	private static $_sFileMode  = '';
	private static $_aLang      = '';
/**
 * import all needed global constants and variables
 */
	private static function init()
	{
//		self::$_sSkelPath  = ADMIN_PATH.'/themes/templates/';
		self::$_sSkelPath  = ADMIN_PATH.'/skel/themes/htt/';
		self::$_sThemePath = THEME_PATH.'/templates/';
		self::$_sOs        = OPERATING_SYSTEM;
		self::$_sFileMode  = STRING_FILE_MODE;
		self::$_aLang      = $GLOBALS['MESSAGE'];
	}
/**
 * returns the difference between default and current theme
 * @param string $sSourceDir
 * @param string $sDestinationDir
 * @param string $sExtension
 * @return array
 */
	public static function getDivList($sSourceDir, $sDestinationDir, $sExtension)
	{
		$aDestinationTemplates = self::getFiles($sDestinationDir, $sExtension);
		$aDefaultTemplates = self::getFiles($sSourceDir, $sExtension);
		$aRetval = array_diff($aDefaultTemplates, $aDestinationTemplates);
		return $aRetval;
	}
/**
 * copy template files from default theme dir into the current theme dir
 * @param array $aFileList
 * @return array|null
 */
	public static function doImport($aFileList)
	{
		self::init();
		$aErrors = array();
		if(is_array($aFileList)) {
			if(isset($aFileList['none'])) { unset($aFileList['none']); }
			if(sizeof($aFileList) > 0 ) {
				foreach($aFileList as $sFile) {
					$sFile = basename($sFile);
					if(copy(self::$_sSkelPath.$sFile, self::$_sThemePath.$sFile)) {
						if(self::$_sOs == 'linux') {
							chmod(self::$_sThemePath.$sFile, self::$_sFileMode);
						}
					}else {
						$aErrors[] = self::$_aLang['UPLOAD_ERR_CANT_WRITE'].' ['.$sFile.']';
					}
				}
			}
		}
		if(sizeof($aErrors) > 0) {
			return $aErrors;
		}else {
			return null;
		}
	}
/**
 * generate a filelist containing all files with $sExtension from dir $sDirectory
 * @param string $sDirectory
 * @param string $sExtension
 * @return array
 */
	private static function getFiles($sDirectory, $sExtension)
	{
		$aRetval = array();
		try {
			$oIterator = new DirectoryIterator($sDirectory);
			foreach ($oIterator as $oFileinfo) {
				if ($oFileinfo->isFile() && 
				   (pathinfo($oFileinfo->getFilename(), PATHINFO_EXTENSION) == $sExtension))
				{
					$aRetval[$oFileinfo->getBasename('.'.$sExtension)] = $oFileinfo->getBasename();
				}
			}
		} catch (Exception $e) {
			return array();
		}
		ksort($aRetval);
		return $aRetval;
	}
}