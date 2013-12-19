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
 * AccessFile.php
 *
 * @category     Core
 * @package      Core_Routing
 * @subpackage   Accessfiles
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @lastmodified $Date: $
 * @since        File available since 17.01.2013
 * @description  Single standard accessfile with additional var-entries
 */
class AccessFile {

	/** int first private property */
	protected $oReg             = null;
	protected $sAccessFilesRoot = '';      // basedir of the current AccessFile structure
	protected $sFileName        = '';      // filename and path from AccessFilesRoot (without extension)
	protected $sFullFileName    = '';      // full path and filename (without extension)
	protected $sFileExtension   = '.php';  // extension for all accessfiles (default: '.php')
	protected $aVars            = array(); // variables in accessfile
	protected $aConsts          = array(); // constants in accessfile
	protected $iErrorNo         = 0;

	const VAR_STRING  = 'string';
	const VAR_BOOL    = 'bool';
	const VAR_BOOLEAN = 'bool';
	const VAR_INT     = 'int';
	const VAR_INTEGER = 'int';
	const VAR_FLOAT   = 'float';

	const FORCE_DELETE = true;

	/**
	 * Constructor
	 * @param string  $sAccessFilesRoot  full path to the base directory of accessfiles-tree
	 * @param string  $sFileName         subdirectory and filename of the new access file from AccessFilesRoot<br />
	 *                                   (indirect addressing (./ | ../) is not allowed here!!)
	 * @param integer $iPageId           (default: 0) Id of the page or 0 for dummy files
	 * @throws AccessFileInvalidFilePathException
	 */
	public function __construct($sAccessFilesRoot, $sFileName, $iPageId = 0)
	{
		$this->oReg = WbAdaptor::getInstance();
		$this->sFileExtension = $this->oReg->PageExtension;
	// sanitize AccessFilesRoot
		if (($sX = realpath($sAccessFilesRoot)) == false) {
			throw new AccessFileInvalidFilePathException('invalid path for AccessFilesRoot given [ '.$sAccessFilesRoot.' ]');
		}
		$sAccessFilesRoot = rtrim(str_replace('\\', '/', $sX), '/').'/';
	// check location of AccessFilesRoot
		if (!preg_match('/^' . preg_quote($this->oReg->AppPath, '/') . '/siU', $sAccessFilesRoot)) {
			throw new AccessFileInvalidFilePathException('tried to place AccessFilesRoot out of application path [ '.$sAccessFilesRoot.' ]');
		}
		$this->sAccessFilesRoot = $sAccessFilesRoot;
	// sanitize Filename
		$sFileName = preg_replace('/'.preg_quote($this->sFileExtension, '/').'$/', '', $sFileName);
		$this->sFileName = ltrim(rtrim(trim(str_replace('\\', '/', $sFileName)), '/'), './');
		if (preg_match('/\.\.+\//', $this->sFileName)) {
			throw new AccessFileInvalidFilePathException('relative path (./ or ../) is not allowed in Filename!! [ '.$this->sFileName.' ]');
		}
		$this->sFullFileName = $this->sAccessFilesRoot . $this->sFileName;
		$this->aVars['iPageId'] = intval($iPageId);

	}
	/**
	 * Set Id of current page
	 * @param integer PageId
	 */
	public function setPageId($iPageId)
	{
		$this->addVar('iPageId', $iPageId, $sType = self::VAR_INTEGER);
	}

	/**
	 * Add new variable into the vars list
	 * @param string name of the variable without leading '$'
	 * @param mixed Value of the variable (Only scalar data (boolean, integer, float and string) are allowed)
	 * @param string Type of the variable (use class constants to define)
	 */
	public function addVar($sName, $mValue, $sType = self::VAR_STRING)
	{
		$mValue = $this->sanitizeValue($mValue, $sType);
		$this->aVars[$sName] = $mValue;
	}

	/**
	 * Add new constant into the constants list
	 * @param string name of the constant (upper case chars only)
	 * @param mixed Value of the variable (Only scalar data (boolean, integer, float and string) are allowed)
	 * @param string Type of the variable (use class constants to define)
	 * @throws AccessFileConstForbiddenException
	 * @deprecated constants are not allowed from WB-version 2.9 and up
	 */
	public function addConst($sName, $mValue, $sType = self::VAR_STRING)
	{
		if (version_compare($this->oReg->AppVersion, '2.9', '<'))
		{
			$mValue = $this->sanitizeValue($mValue, $sType);
			$this->aConsts[strtoupper($sName)] = $mValue;
		} else {
			throw new AccessFileConstForbiddenException('define constants is not allowed from WB-version 2.9 and up');
		}
	}

/**
 * Write the accessfile
 * @throws AccessFileWriteableException
 */
	public function write() 
	{
	// full path and filename
		$sFileName = $this->sFullFileName.$this->sFileExtension;
	// remove AppPath from File for use in error messages
		$sDisplayFilename = str_replace($this->oReg->AppPath, '', $sFileName);
	// do not allow writing if PageId is missing!
		if (!$this->aVars['iPageId']) {
			throw new AccessFileWriteableException('Missing PageId for file [' . $sDisplayFilename . ']');
		}
	// build the content for the access file
		$sContent = $this->buildFileContent($this->buildPathToIndexFile($sFileName));
	// create path if file does not already exists
		if (!file_exists($sFileName)) {
			$this->createPath($sFileName);
		}
	// create new file or overwrite existing one
		if (!file_put_contents($sFileName, $sContent)) {
			throw new AccessFileWriteableException('Unable to write file [' . $sDisplayFilename . ']');
		}
	// do chmod if os is not windows
		if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
			chmod($sFileName, $this->oReg->OctalFileMode);
		}
	}

/**
 * searchParentPageId
 * @param string $sAccessFilesRoot
 * @param string $sFullFilePath
 * @return int   found page-id
 * @description  find first valid accessfile backwards in the parent line<br />
 *               or the start page if no parent is found.
 */
	protected function searchParentPageId($sAccessFilesRoot, $sFullFilePath)
	{


		return $iPageId;
	}
	/**
	 * Rename an existing Accessfile
	 * @param  string  $sNewName the new filename without path and without extension
	 * @return boolean
	 * @throws AccessFileAccessFileRenameException
	 */
	public function rename($sNewName)
	{
		// validate and sanitize new filename
		$sPattern = '/(^'.preg_quote($this->sAccessFilesRoot, '/').'|^'.preg_quote($this->oReg->AppPath, '/')
		          . ')?([^\/]*?)(?:'.preg_quote($this->sFileExtension, '/').')?$/s';
		if (!preg_match($sPattern, $sNewName, $aMatches)) {
		// sorry, but the given filename is not valid!
			throw new AccessFileRenameException('invalid filename [' . str_replace($this->oReg->AppPath, '', $sNewName) . ']');
		}
		$sOldFileName = $this->sFullFileName;
		// $aMatches[sizeof($aMatches)-1] contains the new filename without extension only
		$sNewFileName = preg_replace('/(^.*?)[^\/]*$/', '\1'.$aMatches[sizeof($aMatches)-1], $sOldFileName);
		$sDisplayOldFileName = str_replace($this->oReg->AppPath, '', $sOldFileName);
		$sDisplayNewFileName = str_replace($this->oReg->AppPath, '', $sNewFileName);

		if (file_exists($sNewFileName.$this->sFileExtension) || file_exists($sNewFileName.'/')) {
		// if new filename or directory already exists
			throw new AccessFileRenameException('new file or new dirname already exists ['.$sDisplayNewFileName.'{'.$this->sFileExtension.'}]');
		}
		if (!is_writeable($sOldFileName.$this->sFileExtension)) {
		// old file is not writable an can not be renamed
			throw new AccessFileRenameException('file not exists or file is readonly ['.$sDisplayOldFileName.$this->sFileExtension.']');
		}
		$bSubdirRenamed = false; // set default value
		if (file_exists($sOldFileName.'/')) { //
			if (is_writeable($sOldFileName.'/')) {
				if (!( $bSubdirRenamed = rename($sOldFileName.'/', $sOldFileName.'/'))) {
					throw new AccessFileRenameException('unable to rename directory ['.$sDisplayOldFileName.'/] to ['.$sDisplayNewFileName.'/]');
				}
			} else {
				throw new AccessFileRenameException('directory is not writeable ['.$sDisplayOldFileName.'/]');
			}
		}
		// try to rename accessfile
		if (!rename($sOldFileName.$this->sFileExtension, $sNewFileName.$this->sFileExtension)) {
			if ($bSubdirRenamed) { rename($sNewFileName.'/', $sOldFileName.'/'); }
			$sMsg = 'unable to rename file ['.$sDisplayOldFileName.$this->sFileExtension
			      . '] to ['.$sDisplayOldFileName.$this->sFileExtension.']';
			throw new AccessFileRenameException($sMsg);
		}
		return true;
	}

	/**
	 * Delete the actual Accessfile
	 * @return boolean true if successfull
	 * @throws AccessFileIsNoAccessfileException
	 * @throws AccessFileWriteableException
	 */
	public function delete($bForceDelete = true)
	{
		$sFileName = $this->sFullFileName.$this->sFileExtension;

		if (!AccessFileHelper::isAccessFile($sFileName)) {
			throw new AccessFileIsNoAccessfileException('requested file is NOT an accessfile');
		}
		if (file_exists($sFileName) && is_writeable($sFileName))
		{
			if (is_writeable($this->sFullFileName)) {
				AccessFileHelper::delTree($this->sFullFileName, AccessFileHelper::DEL_ROOT_DELETE);
			}
			unlink($sFileName);
			$sFileName = '';
		} else {
			throw new AccessFileWriteableException('requested file not exists or permissions missing');
		}
	}

	/**
	 * getFilename
	 * @return string path+name of the current accessfile
	 */
	public function getFileName()
	{
		return $this->sFullFileName.$this->sFileExtension;
	}

	/**
	 * getPageId
	 * @return integer
	 */
	public function getPageId()
	{
		return (isset($this->aVars['iPageId']) ? $this->aVars['iPageId'] : 0);
	}
	/**
	 * get number of the last occured error
	 * @return int
	 */
	public function getError()
	{
		return $this->iErrorNo;
	}
	/**
	 * set number of error
	 * @param type $iErrNo
	 */
	protected function setError($iErrNo = self::ERR_NONE)
	{
		$this->iErrorNo = $iErrNo;
	}
	/**
	 * Create Path to Accessfile
	 * @param string full path/name to new access file
	 * @throws AccessFileWriteableException
	 * @throws AccessFileInvalidStructureException
	 */
	protected function createPath($sFilename)
	{
		$sFilename = str_replace($this->sAccessFilesRoot, '', $sFilename);
		$sPagesDir = $this->sAccessFilesRoot;
		if (($iSlashPosition = mb_strrpos($sFilename, '/')) !== false) {
			// if subdirs exists, then procceed extended check
			$sExtension = preg_replace('/.*?(\.[a-z][a-z0-9]+)$/siU', '\1', $sFilename);
			$sParentDir = mb_substr($sFilename, 0, $iSlashPosition);
			if (file_exists($sPagesDir . $sParentDir)) {
				if (!is_writable($sPagesDir . $sParentDir)) {
					throw new AccessFileWriteableException('No write permissions for ' . $sPagesDir . $sParentDir);
				}
			} else {
				// if parentdir not exists
				if (file_exists($sPagesDir . $sParentDir . $sExtension)) {
					// but parentaccessfile exists, create parentdir and ok
					$iOldUmask = umask(0);
					$bRetval = mkdir($sPagesDir . $sParentDir, $this->oReg->OctalDirMode);
					umask($iOldUmask);
				} else {
					throw new AccessFileInvalidStructureException('invalid structure - missing file: ' . $sFilename);
				}
				if (!$bRetval) {
					throw new AccessFileWriteableException('Unable to create ' . $sPagesDir . $sParentDir);
				}
			}
		}
	}
	/**
	 * Sanitize value
	 * @param mixed Value to sanitize
	 * @param string Type of the variable (use class constants to define)
	 * @return string printable value
	 * @throws InvalidArgumentException
	 */
	protected function sanitizeValue($mValue, $sType)
	{
		$mRetval = '';
		switch ($sType)
		{
			case self::VAR_BOOLEAN:
			case self::VAR_BOOL:
				$mRetval = (filter_var(strtolower($mValue), FILTER_VALIDATE_BOOLEAN) ? '1' : '0');
				break;
			case self::VAR_INTEGER:
			case self::VAR_INT:
				if (filter_var($mValue, FILTER_VALIDATE_INT) === false) {
					throw new InvalidArgumentException('value is not an integer');
				}
				$mRetval = (string) $mValue;
				break;
			case self::VAR_FLOAT:
				if (filter_var($mValue, FILTER_VALIDATE_FLOAT) === false) {
					throw new InvalidArgumentException('value is not a float');
				}
				$mRetval = (string) $mValue;
				break;
			default: // VAR_STRING
				$mRetval = '\'' . (string) $mValue . '\'';
				break;
		}
		return $mRetval;
	}

	/**
	 * Calculate backsteps in directory
	 * @param string accessfile
	 */
	protected function buildPathToIndexFile($sFileName)
	{
		$iBackSteps = substr_count(str_replace($this->oReg->AppPath, '', $sFileName), '/');
		return str_repeat('../', $iBackSteps) . 'index.php';
	}

	/**
	 * Build the content of the new accessfile
	 * @param string $sIndexFile name and path to the wb/index.php file
	 * @return string
	 */
	protected function buildFileContent($sIndexFile)
	{
		$sFileContent
				= '<?php' . "\n"
				. '// *** This file was created automatically by ' ."\n"
				. '// *** ' . $this->oReg->AppName	. ' Ver.' . $this->oReg->AppVersion
				. ($this->oReg->AppServicePack != '' ? ' '.$this->oReg->AppServicePack : '')
				. ' Rev.' . $this->oReg->AppRevision . "\n"
				. '// *** on ' . date('c') . "\n"
				. '//' . "\n"
				. '// *** Warning *************************************' . "\n"
				. '// *** Please do not manually change this file!' . "\n"
				. '// *** It will be recreated from time to time and' . "\n"
				. '// *** then all manual changes will get lost!!' . "\n"
				. '// *************************************************' . "\n"
				. '//' . "\n";
		foreach ($this->aVars as $sKey => $sVar) {
			$sFileContent .= "\t" . '$' . $sKey . ' = ' . $sVar . ';' . "\n";
		}
		foreach ($this->aConsts as $sKey => $sVar) {
			$sFileContent .= "\t" . 'define(\'' . $sKey . '\', ' . $sVar . '); // ** deprecated command **' . "\n";
		}
		$sFileContent
				.="\t" . 'require(\'' . $sIndexFile . '\');' . "\n"
				. "\t" . 'exit();' . "\n"
				. '// *************************************************' . "\n"
				. '// end of file' . "\n";
		return $sFileContent;
	}

}

// end of class AccessFile
// //////////////////////////////////////////////////////////////////////////////////// //
/**
 * AccessFileException
 *
 * @category     WBCore
 * @package      WBCore_Accessfiles
 * @author       M.v.d.Decken <manuela@isteam.de>
 * @copyright    M.v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      2.9.0
 * @revision     $Revision: 12 $
 * @lastmodified $Date: 2012-12-29 21:39:37 +0100 (Sa, 29 Dez 2012) $
 * @description  Exceptionhandler for the Accessfiles and depending classes
 */

class AccessFileException extends AppException { }
class AccessFileInvalidStructureException extends AccessFileException { }
class AccessFileIsNoAccessfileException extends AccessFileException { }
class AccessFileConstForbiddenException extends AccessFileException { }
class AccessFileInvalidFilePathException extends AccessFileException { }
class AccessFileRenameException extends AccessFileException { }
class AccessFileWriteableException extends AccessFileException { }
