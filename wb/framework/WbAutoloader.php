<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WbAutoloader
{

	static private $_aSearchpatterns = array();
	static private $_aReplacements = array();

/**
 * Register WB - CoreAutoloader as SPL autoloader
 * @param array $aDirectories list of 'directory'=>'shortKey'
 */
	static public function doRegister(array $aDirectories)
	{
		if(!sizeof(self::$_aSearchpatterns)) {
			if(sizeof($aDirectories > 0)) {
				self::$_aSearchpatterns[] = '/(^.[^_].*$)/i';
				self::$_aReplacements[] = basename(dirname(__FILE__)).'_$1';
				foreach($aDirectories as $value => $shortKey) {
					self::$_aSearchpatterns[] = '/^'.$shortKey.'_/i';
					self::$_aReplacements[] = $value.'_';
				}
			}
		}
		spl_autoload_register(array(new self, 'CoreAutoloader'));
	}
/**
 * tries autoloading the given class
 * @param  string $sClassName
 */
	static public function CoreAutoloader($sClassName)
	{
		if($sClassName == 'database'){
			$sFileName = dirname(__FILE__).'/class.database.php';
			if(is_file($sFileName)) { include($sFileName); }
		}else {
			$sClassName = preg_replace(self::$_aSearchpatterns, self::$_aReplacements, $sClassName);
			$sFileName = dirname(dirname(__FILE__)).'/'.str_replace('_', '/', $sClassName).'.php';
			if(is_file($sFileName = dirname(dirname(__FILE__)).'/'.str_replace('_', '/', $sClassName).'.php')) {
				include($sFileName);
			}
		}
	}
} // end class Autoloader