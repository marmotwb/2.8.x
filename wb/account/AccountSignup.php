<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

 require_once(WB_PATH."/framework/class.frontend.php");

 class AccountSignup
 {

	 const SIGNUP_DEBUG = false;

	 static public $oWbInstance = null;

     static public function getWbInstance()
     {
          if( $oWbInstance = null ) {
              $oWbInstance = new frontend();
          }
     }

	/**
	 * get systemadnistrator e-mail
	 *
	 * @return string
	 */
	static public function emailAdmin()
	{
        $retval = '';
		$sql  = 'SELECT `email` FROM `'.TABLE_PREFIX.'users` ';
		$sql .= 'WHERE `user_id`=\'1\' ';
        $retval = WbDatabase::getInstance()->get_one($sql);
		return $retval;
	}

	/**
	 * get user e-mail
	 *
	 * @return string
	 */
	static public function emailUser($iUserId=1)
	{
        $retval = '';
		$sql  = 'SELECT `email` FROM `'.TABLE_PREFIX.'users` ';
		$sql .= 'WHERE `user_id`=\''.$iUserId.'\' ';
        $retval = WbDatabase::getInstance()->get_one($sql);
		return $retval;
	}

	 /**
	  * hidden last two blocks from user ip
	  *
	  * @return string
	  */
	 static public function ObfuscateIp()
	 {
	    $sClientIp = (isset($_SERVER['REMOTE_ADDR']))
	                         ? $_SERVER['REMOTE_ADDR'] : '000.000.000.000';
	    $iClientIp = ip2long($sClientIp);
	    $sClientIp = long2ip(($iClientIp & ~65535));
	    return $sClientIp;
	}

	static public function deleteOutdatedConfirmations()
	{
		$sql = 'DELETE FROM `'.TABLE_PREFIX.'users` WHERE `confirm_timeout` BETWEEN 1 AND '.time();
		WbDatabase::getInstance()->query($sql);
	}

	/**
	 * AccountSignup::checkPassWordConfirmCode()
	 *
	 * @param string $sPassword
	 * @param string $sConfirmCode
	 * @return boolean
	 */
	static public function checkPassWordConfirmCode( $sPassword, $sConfirmCode )
	{
        $retVal = 0;
		if( preg_match('/[0-9a-f]{32}/i', $sConfirmCode) ) {
			$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` '
			     . 'WHERE `password`=\''.md5($sPassword).'\' '
			     .       'AND `confirm_code`=\''.$sConfirmCode.'\'';
			if( $retVal = WbDatabase::getInstance()->get_one($sql)) {
				return $retVal;
			}
		}
		return $retVal;
	}

	/**
	 * AccountSignup::GetBowserLanguage()
	 *
	 * @param string $defaultLanguage
	 * @return string upper 2 digits
	 */
	static public function GetBowserLanguage( $defaultLanguage ='en' )
	{
		$sAutoLanguage = strtoupper($defaultLanguage); // default, if no information from client available
		if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			if(preg_match('/([a-z]{2})(?:-[a-z]{2})*/i', strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']), $matches)) {
				$sAutoLanguage = strtoupper($matches[1]);
			}
		}
		return $sAutoLanguage;
	}

	static public function saveNewConfirmation($sConfirmCode) {
		$sql = 'UPDATE `'.TABLE_PREFIX.'users` '
		     . 'SET `active`=1, '
//		     .     '`groups_id`='.DEFAULT_GROUP.', '
		     .     '`confirm_code`=\'\', '
		     .     '`confirm_timeout`=0 '
		     . 'WHERE `confirm_code`=\''.$sConfirmCode.'\'';
		WbDatabase::getInstance()->query($sql);
	}

	static public function spamSecure($sVal) {
		return preg_replace('/(\n+|\r+|%0A|%0D)/i', '', $sVal);
	}

}
