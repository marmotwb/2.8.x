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
 * AccessFileHelper.php
 *
 * @category     Core
 * @package      Core_Routing
 * @copyright    M.v.d.Decken <manuela@isteam.de>
 * @author       M.v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 01.08.2013
 * @description  this class provides some helper methodes to handle access files
 */

class AccessFileHelper {

/**
 * do not delete start directory of deltree
 */
	const DEL_ROOT_PRESERVE = 0;
/**
 * delete start directory of deltree
 */
	const DEL_ROOT_DELETE   = 1;
/**
 * to store the last delTree log
 */
	static $aDelTreeLog = array();

/**
 * private constructor to deny instantiating
 */
	private function __construct() {
		;
	}
/**
 * Test if file is an access file
 * @param       string $sFileName  qualified path/file
 * @return      boolean
 * @description test given file for typical accessfile signature
 */
	static public function isAccessFile($sFileName)
	{
		$bRetval = false;
		if (($sFile = file_get_contents($sFileName)) !== false)
		{
			$sPattern = '/^\s*?<\?php.*?\$i?page_?id\s*=\s*[0-9]+;.*?(?:require|include)'
					. '(?:_once)?\s*\(\s*\'.*?index\.php\'\s?\);/siU';
			$bRetval = (bool) preg_match($sPattern, $sFile);
			unset($sFile);
		}
		return $bRetval;
	}
/**
 * Delete all contents of basedir, but not the basedir itself
 * @param string  $sRootDir the content of which should be deleted
 * @param integer $iMode    the mode can be set to self::DEL_ROOT_PRESERVE(default) or self::DEL_ROOT_DELETE
 * @return boolean          false if a file or directory can't be deleted
 */
	static public function delTree($sRootDir, $iMode = self::DEL_ROOT_PRESERVE)
	{
		// check if root dir is inside the installation and is writeable
		$oReg = WbAdaptor::getInstance();
		self::$aDelTreeLog = array();
		$bResult = true;
		if (!is_writeable($sRootDir))
		{
			return false;
			self::$aDelTreeLog[] = 'insufficient rights or directory not empty in : '.str_replace($oReg->AppPath, '', $sRootDir);
		}
		$oIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sRootDir), RecursiveIteratorIterator::CHILD_FIRST);
		foreach ($oIterator as $oPath)
		{
			$sPath = trim(str_replace('\\', '/', $oPath->__toString()), '/');
			if ($oPath->isDir())
			{
				// proceed directories
				if (!rmdir($sPath))
				{
					$bResult = false;
					self::$aDelTreeLog[] = 'insufficient rights or directory not empty in : '.str_replace($oReg->AppPath, '', $sPath);
				}else {
					self::$aDelTreeLog[] = 'Directory successful removed : '.str_replace($oReg->AppPath, '', $sPath);
				}
			} elseif ($oPath->isFile())
			{
				// proceed files
				if (!unlink($sPath))
				{
					$bResult = false;
					self::$aDelTreeLog[] = 'insufficient rights or directory not empty in : '.str_replace($oReg->AppPath, '', $sPath);
				}else {
					self::$aDelTreeLog[] = 'File successful deleted : '.str_replace($oReg->AppPath, '', $sPath);
				}
			}
		}
		if (($iMode & self::DEL_ROOT_DELETE))
		{
			if ($bResult)
			{ // if there was no error before
				if (rmdir($sRootDir))
				{
					self::$aDelTreeLog[] = 'Directory successful removed : '.str_replace($oReg->AppPath, '', $sRootDir);
					return $bResult;
				}
			}
			self::$aDelTreeLog[] = 'insufficient rights or directory not empty in : '.str_replace($oReg->AppPath, '', $sRootDir);
		}
		return $bResult;
	}
/**
 * returns the log of the last delTree request
 * @return array
 */
	static function getDelTreeLog()
	{
		return self::$aDelTreeLog;
	}

} // end of class AccessFileHelper
