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
 * @copyright    M.v.d.Decken <manuela@isteam.de>
 * @author       M.v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @lastmodified $Date: $
 * @since        File available since 17.01.2013
 * @description  Create a single standard accessfile with additional var-entries
 */
class AccessFile {

	/** int first private property */
	protected $_oReg      = null;
	protected $_sFileName = '';
	protected $_aVars     = array();
	protected $_aConsts   = array();
	protected $_iErrorNo  = 0;

	const VAR_STRING  = 'string';
	const VAR_BOOL    = 'bool';
	const VAR_BOOLEAN = 'bool';
	const VAR_INT     = 'int';
	const VAR_INTEGER = 'int';
	const VAR_FLOAT   = 'float';

	const FORCE_DELETE = true;

	/**
	 * Constructor
	 * @param string full path and filename to the new access file
	 * @param integer Id of the page or 0 for dummy files
	 */
	public function __construct($sFileName, $iPageId = 0)
	{
		$this->_oReg = WbAdaptor::getInstance();
		$this->_sFileName = str_replace('\\', '/', $sFileName);
		if (!preg_match('/^' . preg_quote($this->_oReg->AppPath, '/') . '/siU', $this->_sFileName)) {
			throw new AccessFileInvalidFilePathException('tried to place file out of application path');
		}
		$this->_aVars['iPageId'] = intval($iPageId);
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
		$mValue = $this->_sanitizeValue($mValue, $sType);
		$this->_aVars[$sName] = $mValue;
	}

	/**
	 * Add new constant into the constants list
	 * @param string name of the constant (upper case chars only)
	 * @param mixed Value of the variable (Only scalar data (boolean, integer, float and string) are allowed)
	 * @param string Type of the variable (use class constants to define)
	 * @deprecated constants are not allowed from WB-version 2.9 and up
	 */
	public function addConst($sName, $mValue, $sType = self::VAR_STRING)
	{
		if (version_compare($this->_oReg->AppVersion, '2.9', '<'))
		{
			$mValue = $this->_sanitizeValue($mValue, $sType);
			$this->_aConsts[strtoupper($sName)] = $mValue;
		} else {
			throw new AccessFileConstForbiddenException('define constants is not allowed from WB-version 2.9 and up');
		}
	}

/**
 * Write the accessfile
 * @throws AccessFileException
 */
	public function write() 
	{
		// remove AppPath from File for use in error messages
		$sTmp = str_replace($this->_oReg->AppPath, '', $this->_sFileName);
		if (file_exists($this->_sFileName)) {
			throw new AccessFileAlreadyExistsException('Accessfile already exists: * ' . $sTmp . ' *');
		}

		if (!$this->_aVars['iPageId']) {
			// search for the parent pageID if current ID is 0
			$this->_aVars['iPageId'] = $this->searchParentPageId($this->_sFileName);
		}
		$sIndexFile = $this->_buildPathToIndexFile($this->_sFileName);
		$this->_createPath($this->_sFileName);
		$sContent = $this->_buildFileContent($sIndexFile);
		if (!file_put_contents($this->_sFileName, $sContent)) {
			throw new AccessFileNotWriteableException('Unable to write file * ' . $sTmp . ' *');
		}
		if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') { // Only chmod if os is not windows
			chmod($this->_sFileName, $this->_oReg->OctalFileMode);
		}
	}

	/**
	 * Rename an existing Accessfile
	 * @param  string  $sNewName the new filename without path and without extension
	 * @return boolean
	 * @throws AccessFileInvalidFilenameException
	 * @throws AccessFileAlreadyExistsException
	 * @throws AccessFileAccessFileRenameException
	 */
	public function rename($sNewName)
	{
		// sanitize new filename
		if (!preg_match('/[^\.\\ \/]*/si', $sNewName)) {
			throw new AccessFileInvalidFilenameException('invalid filename [' . str_replace($this->_oReg->AppPath, '', $sNewName) . ']');
		}
		// prepare old/new file-/dirname
		$sOldFilename   = $this->_sFileName;
		$sOldSubDirname = dirname($sOldFilename) . '/';
		$sPattern = '/^(' . preg_quote($sOldSubDirname, '/') . ')([^\/\.]+?)(\.[a-z0-9]+)$/siU';
		$sNewFilename = preg_replace($sPattern, '\1' . $sNewName . '\3', $sOldFilename);
		$sNewSubDirname = dirname($sNewFilename) . '/';
		if (file_exists($sNewFilename) || file_exists($sNewSubDirname)) {
			// if new filename or directory already exists
			throw new AccessFileAlreadyExistsException('new file/dirname already exists [' . str_replace($this->_oReg->AppPath, '', $sNewName) . ']');
		}
		if(!is_writeable($sOldFilename)) {
			throw new AccessFileRenameException('unable to rename file or file not exists [' . str_replace($this->_oReg->AppPath, '', $sOldFilename) . ']');
		}
		$bSubdirRenamed = false; // set default value
		if(file_exists($sOldSubDirname))
		{ //
			if(is_writeable($sOldSubDirname))
			{
				if(!( $bSubdirRenamed = rename($sOldSubDirname, $sNewSubDirname))) {
					throw new AccessFileRenameException('unable to rename directory [' . str_replace($this->_oReg->AppPath, '', $sOldSubDirname) . ']');
				}
			} else {
				throw new AccessFileRenameException('directory is not writeable [' . str_replace($this->_oReg->AppPath, '', $sOldSubDirname) . ']');
			}
		}
		// try to rename accessfile
		if(!rename($sOldFilename, $sNewFilename)) {
			if($bSubdirRenamed) { rename($sNewSubDirname, $sOldSubDirname); }
			throw new AccessFileRenameException('unable to rename file [' . str_replace($this->_oReg->AppPath, '', $sOldFilename) . ']');
		}
		return true;
	}

	/**
	 * Delete the actual Accessfile
	 * @return boolean true if successfull
	 * @throws AccessFileIsNoAccessfileException
	 * @throws AccessFileNotWriteableException
	 */
	public function delete($bForceDelete = true)
	{
		$sFileName = $this->_sFileName;
		if (!AccessFileHelper::isAccessFile($sFileName)) {
			throw new AccessFileIsNoAccessfileException('requested file is NOT an accessfile');
		}
		if (file_exists($sFileName) && is_writeable($sFileName))
		{
			$sPattern = '/^(.*?)(\.[a-z0-9]+)$/siU';
			$sDir = preg_replace($sPattern, '\1/', $sFileName);
			if (is_writeable($sDir)) {
				AccessFileHelper::delTree($sDir, AccessFileHelper::DEL_ROOT_DELETE);
			}
			unlink($sFileName);
			$sFileName = '';
		} else {
			throw new AccessFileNotWriteableException('requested file not exists or permissions missing');
		}
	}

	/**
	 * getFilename
	 * @return string path+name of the current accessfile
	 */
	public function getFileName()
	{
		return $this->_sFileName;
	}

	/**
	 * getPageId
	 * @return integer
	 */
	public function getPageId()
	{
		return (isset($this->_aVars['iPageId']) ? $this->_aVars['iPageId'] : 0);
	}
	/**
	 * get number of the last occured error
	 * @return int
	 */
	public function getError()
	{
		return $this->_iErrorNo;
	}
	/**
	 * set number of error
	 * @param type $iErrNo
	 */
	protected function _setError($iErrNo = self::ERR_NONE)
	{
		$this->_iErrorNo = $iErrNo;
	}
	/**
	 * Create Path to Accessfile
	 * @param string full path/name to new access file
	 * @throws AccessFileNotWriteableException
	 * @throws AccessFileInvalidStructureException
	 */
	protected function _createPath($sFilename)
	{
		$sFilename = str_replace($this->_oReg->AppPath . $this->_oReg->PagesDir, '', $sFilename);
		$sPagesDir = $this->_oReg->AppPath . $this->_oReg->PagesDir;

		if (($iSlashPosition = mb_strrpos($sFilename, '/')) !== false)
		{
			// if subdirs exists, then procceed extended check
			$sExtension = preg_replace('/.*?(\.[a-z][a-z0-9]+)$/siU', '\1', $sFilename);
			$sParentDir = mb_substr($sFilename, 0, $iSlashPosition);
			if (file_exists($sPagesDir . $sParentDir))
			{
				if (!is_writable($sPagesDir . $sParentDir)) {
					throw new AccessFileNotWriteableException('No write permissions for ' . $sPagesDir . $sParentDir);
				}
			} else
			{
				// if parentdir not exists
				if (file_exists($sPagesDir . $sParentDir . $sExtension))
				{
					// but parentaccessfile exists, create parentdir and ok
					$iOldUmask = umask(0);
					$bRetval = mkdir($sPagesDir . $sParentDir, $this->_oReg->OctalDirMode);
					umask($iOldUmask);
				} else {
					throw new AccessFileInvalidStructureException('invalid structure ' . $sFilename);
				}
				if (!$bRetval) {
					throw new AccessFileNotWriteableException('Unable to create ' . $sPagesDir . $sParentDir);
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
	protected function _sanitizeValue($mValue, $sType)
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
	protected function _buildPathToIndexFile($sFileName)
	{
		$iBackSteps = substr_count(str_replace($this->_oReg->AppPath, '', $sFileName), '/');
		return str_repeat('../', $iBackSteps) . 'index.php';
	}

	/**
	 * Build the content of the new accessfile
	 * @param string $sIndexFile name and path to the wb/index.php file
	 * @return string
	 */
	protected function _buildFileContent($sIndexFile)
	{
		$sFileContent
				= '<?php' . "\n"
				. '// *** This file was created automatically by ' ."\n"
				. '// *** ' . $this->_oReg->AppName	. ' Ver.' . $this->_oReg->AppVersion
				. ($this->_oReg->AppServicePack != '' ? ' '.$this->_oReg->AppServicePack : '')
				. ' Rev.' . $this->_oReg->AppRevision . "\n"
				. '// *** on ' . date('c') . "\n"
				. '//' . "\n"
				. '// *** Warning *************************************' . "\n"
				. '// *** Please do not manually change this file!' . "\n"
				. '// *** It will be recreated from time to time and' . "\n"
				. '// *** then all manual changes will get lost!!' . "\n"
				. '// *************************************************' . "\n"
				. '//' . "\n";
		foreach ($this->_aVars as $sKey => $sVar) {
			$sFileContent .= "\t" . '$' . $sKey . ' = ' . $sVar . ';' . "\n";
		}
		foreach ($this->_aConsts as $sKey => $sVar) {
			$sFileContent .= "\t" . 'define(\'' . $sKey . '\', ' . $sVar . '); // ** deprecated command **' . "\n";
		}
		$sFileContent
				.="\t" . 'require(\'' . $sIndexFile . '\');' . "\n"
				. "\t" . 'exit(0);' . "\n"
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

class AccessFileException extends Exception { }
class AccessFileConstForbiddenException extends AccessFileException { }
class AccessFileInvalidFilePathException extends AccessFileException { }
class AccessFileInvalidFilenameException extends AccessFileException { }
class AccessFileAlreadyExistsException extends AccessFileException { }
class AccessFileNotWriteableException extends AccessFileException { }
class AccessFileIsInvalidFilenameException extends AccessFileException { }
class AccessFileIsNoAccessfileException extends AccessFileException { }
class AccessFileInvalidStructureException extends AccessFileException { }
class AccessFileRenameException extends AccessFileException { }
