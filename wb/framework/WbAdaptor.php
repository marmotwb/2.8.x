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
 * WbAdaptor.php
 *
 * @category     Core
 * @package      Core_package
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @lastmodified $Date$
 * @since        File available since 18.01.2013
 * @deprecated   This class will be removed if Registry comes activated
 * @description  This adaptor is a temporary replacement for the future registry class
 */
class WbAdaptor {

/** active instance */	
	protected static $_oInstance = null;
/** array hold settings */	
	protected $_aSys = array();
/** constructor */
	protected function __construct() 
	{
		$this->_aSys = array('System' => array(), 'Request' => array());
	}
/**
 * Get active instance 
 * @return WbAdaptor
 */
	public static function getInstance()
	{
		if(self::$_oInstance == null) {
			$c = __CLASS__;
			self::$_oInstance = new $c();
			
		}
		return self::$_oInstance;
	}
/**
 * handle unknown properties
 * @param string name of the property
 * @param mixed value to set
 * @throws InvalidArgumentException
 */	
	public function __set($name, $value) 
	{
		throw new InvalidArgumentException('tried to set readonly or nonexisting property [ '.$name.' }!! ');
	}
/**
 * Get value of a variable
 * @param string name of the variable
 * @return mixed
 */	
	public function __get($sVarname)
	{
		if( isset($this->_aSys['Request'][$sVarname])) {
			return $this->_aSys['Request'][$sVarname];
		}elseif( isset($this->_aSys['System'][$sVarname])) {
			return $this->_aSys['System'][$sVarname];
		}elseif( isset($this->_aSys[$sVarname])) {
			return $this->_aSys[$sVarname];
		}else {
			return null;
		}
	}
/**
 * Check if var is set
 * @param string name of the variable
 * @return bool
 */	
	public function __isset($sVarname)
	{
		$bRetval = (isset($this->_aSys['Request'][$sVarname]) ||
		            isset($this->_aSys['System'][$sVarname]) ||
		            isset($this->_aSys[$sVarname]));
		return $bRetval;
	}
/**
 * Import WB-Constants
 */	
	public function getWbConstants()
	{
		$this->_aSys = array('System' => array(), 'Request' => array());
		$aConsts = get_defined_constants(true);
		foreach($aConsts['user'] as $sKey=>$sVal)
		{
		// skip possible existing database constants
			if (preg_match('/^db_|^TABLE_PREFIX$/i', $sKey)) { continue; }
		// change all path items to trailing slash scheme
			switch($sKey):
				case 'WB_URL': 
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'AppUrl';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'WB_REL':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'AppRel';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'WB_PATH':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'AppPath';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'ADMIN_URL':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'AcpUrl';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'ADMIN_REL':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'AcpRel';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'ADMIN_PATH':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'AcpPath';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'THEME_URL':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'ThemeUrl';
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
				case 'THEME_REL':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'ThemeRel';
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
				case 'THEME_PATH':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'ThemePath';
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
				case 'TMP_PATH':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'TempPath';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'ADMIN_DIRECTORY':
					$sVal = trim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'AcpDir';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'DOCUMENT_ROOT':
					$sVal = rtrim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'DocumentRoot';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'PAGES_DIRECTORY':
					$sVal = trim(str_replace('\\', '/', $sVal), '/').'/';
					$sVal = $sVal=='/' ? '' : $sVal;
					$sKey = 'PagesDir';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'MEDIA_DIRECTORY':
					$sVal = trim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'MediaDir';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'DEFAULT_TEMPLATE':
					$sVal = trim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'DefaultTemplate';
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
				case 'DEFAULT_THEME':
					$sVal = trim(str_replace('\\', '/', $sVal), '/').'/';
					$sKey = 'DefaultTheme';
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
				case 'OCTAL_FILE_MODE':
					$sVal = ((intval($sVal) & ~0111)|0600); // o-x/g-x/u-x/o+rw
					$sKey = 'OctalFileMode';
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
				case 'OCTAL_DIR_MODE':
					$sVal = (intval($sVal) |0711); // o+rwx/g+x/u+x
					$sKey = 'OctalDirMode';
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
				case 'WB_VERSION':
					$sKey = 'AppVersion';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'WB_REVISION':
					$sKey = 'AppRevision';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				case 'WB_SP':
					$sKey = 'AppServicePack';
					$this->_aSys['System'][$sKey] = $sVal; 
					break;
				default:
					$sVal = ($sVal == 'true' ? true : ($sVal == 'false' ? false : $sVal));
					$sKey = str_replace(' ', '', ucwords(str_replace('_', ' ', strtolower($sKey))));
					$this->_aSys['Request'][$sKey] = $sVal; 
					break;
			endswitch;
			$this->_aSys[$sKey] = $sVal;
		}
		$this->_aSys['AppName'] = 'WebsiteBaker';
		$this->_aSys['System']['AppName'] = 'WebsiteBaker';
		$this->_aSys['Request']['AppName'] = 'WebsiteBaker';
	}

} // end of class WbAdaptor

