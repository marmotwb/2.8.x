<?php
/**
 *  Copyright (C) 2012 Werner v.d. Decken <wkl@isteam.de>
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * @category     WBCore
 * @package      WBCore_Security
 * @author       Werner v.d. Decken <wkl@isteam.de>
 * @copyright    Werner v.d. Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.0.3
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        Datei vorhanden seit Release 1.2.0
 * @description  This class is interfacing the Portable PHP password hashing framework.<br />
 *               Version 0.4 / ISTeam Rev. 0.1<br />
 *               ISTeam changes: added SHA-256, SHA-512 (2012/10/27 Werner v.d. Decken)
 */

// backwardcompatibility for PHP 5.2.2 + WB2.8.x
if(!class_exists('PasswordHash')) {
	include(dirname(dirname(__FILE__)).'/include/phpass/PasswordHash.php'); 
}


class Password extends PasswordHash
//class Password extends vendors\phpass\PasswordHash
{

	const CRYPT_LOOPS_MIN     =  6;  // minimum numbers of loops is 2^6 (64) very, very quick
	const CRYPT_LOOPS_MAX     = 31;  // maximum numbers of loops is 2^31 (2,147,483,648) extremely slow
	const CRYPT_LOOPS_DEFAULT = 12;  // default numbers of loopf is 2^12 (4096) a good average

	const HASH_TYPE_PORTABLE  = true;  // use MD5 only
	const HASH_TYPE_AUTO      = false; // select highest available crypting methode

	const PW_LENGTH_MIN       =   6;
	const PW_LENGTH_MAX       = 100;
	const PW_LENGTH_DEFAULT   =  10;

	const PW_USE_LOWERCHAR    = 0x0001; // use lower chars
	const PW_USE_UPPERCHAR    = 0x0002; // use upper chars
	const PW_USE_DIGITS       = 0x0004; // use numeric digits
	const PW_USE_SPECIAL      = 0x0008; // use special chars
	const PW_USE_ALL          = 0xFFFF; // use all possibilities

/**
 * 
 * @param int number of iterations as exponent of 2 (must be between 4 and 31)
 * @param bool TRUE = use MD5 only | FALSE = automatic
 */
	public function __construct($iIterationCountLog2 = self::CRYPT_LOOPS_DEFAULT, $bPortableHashes = self::HASH_TYPE_AUTO)
	{
		parent::__construct($iIterationCountLog2, $bPortableHashes);
	}
/**
 * make hash from password
 * @param string password to hash
 * @return string generated hash. Null if failed.
 */
	public function makeHash($sPassword)
	{
		$sNewHash = parent::HashPassword($sPassword);
		return ($sNewHash == '*') ? null : $sNewHash;
	}
/**
 * @param string Password to test against given Hash
 * @param string existing stored hash
 * @return bool true if PW matches the stored hash
 */
	public function checkIt($sPassword, $sStoredHash)
	{
		// compatibility layer for deprecated, simple and old MD5 hashes
		if(preg_match('/^[0-9a-f]{32}$/si', $sStoredHash)) {
			return (md5($sPassword) === $sStoredHash);
		}
		return parent::CheckPassword($sPassword, $sStoredHash);
	}
/**
 * Check password for forbidden characters
 * @param string password to test
 * @return bool
 */
	public static function isValid($sPassword)
	{
		$sBlackList = '\"\'\,\;\<\>\?\\\{\|\}\~ '
		            . '\x00-\x20\x22\x27\x2c\x3b\x3c\x3e\x3f\x5c\x7b-\x7f\xff';
		$bRetval = !preg_match('/['.$sBlackList.']/si', $sPassword);
		return $bRetval;
	}
/**
 * generate a case sensitive mnemonic password including numbers and special chars
 * makes no use of confusing characters like 'O' and '0' and so on.
 * @param int length of the generated password. default = PW_LENGTH_DEFAULT
 * @param int defines which elemets are used to generate a password. Default = PW_USE_ALL
 * @return string
 */
	public static function createNew($iLength = self::PW_LENGTH_DEFAULT, $iElements = self::PW_USE_ALL)
	{
		$aChars = array(
			array('b','c','d','f','g','h','j','k','m','n','p','q','r','s','t','v','w','x','y','z'),
			array('B','C','D','F','G','H','J','K','M','N','P','Q','R','S','T','V','W','X','Y','Z'),
			array('a','e','i','o','u'),
			array('A','E','U'),
			array('!','-','@','_',':','.','+','%','/','*','=')
		);
		$iElements = ($iElements & self::PW_USE_ALL) == 0 ? self::PW_USE_ALL : $iElements;
		if(($iLength < self::PW_LENGTH_MIN) || ($iLength > self::PW_LENGTH_MAX)) {
			$iLength = self::PW_LENGTH_DEFAULT;
		}
	// at first create random arrays of lowerchars and uperchars
	// alternating between vowels and consonants
		$aUpperCase = array();
		$aLowerCase = array();
		for($x = 0; $x < ceil($iLength / 2); $x++) {
			// consonants
			$i1 = rand(1000, 10000) % sizeof($aChars[0]);
			$aLowerCase[] = $aChars[0][$i1];
			$i2 = rand(1000, 10000) % sizeof($aChars[1]);
			$aUpperCase[] = $aChars[1][$i2];
			// vowels
			$i3 = rand(1000, 10000) % sizeof($aChars[2]);
			$aLowerCase[] = $aChars[2][$i3];
			$i4 = rand(1000, 10000) % sizeof($aChars[3]);
			$aUpperCase[] = $aChars[3][$i4];
		}
	// create random arrays of numeric digits 2-9 and  special chars
		$aDigits       = array();
		$aSpecialChars = array();
		for($x = 0; $x < $iLength; $x++) {
			$aDigits[] = (rand(1000, 10000) % 8) + 2;
			$aSpecialChars[] = $aChars[4][rand(1000, 10000) % sizeof($aChars[4])];
		}
		// take string or merge chars depending from $iElements
		$aPassword = array();
		$bMerge = false;
		if($iElements & self::PW_USE_LOWERCHAR) {
			$aPassword = $aLowerCase;
			$bMerge = true;
		}
		if($iElements & self::PW_USE_UPPERCHAR) {
			if($bMerge) {
				$iNumberOfUpperChars = rand(1000, 10000) % ($iLength);
				$aPassword = self::_mergeIntoPassword($aPassword, $aUpperCase, $iNumberOfUpperChars);
			}else {
				$aPassword = $aUpperCase;
				$bMerge = true;
			}
		}
		if($iElements & self::PW_USE_DIGITS) {
			if($bMerge) {
				$x = (rand(1000, 10000) % ceil($iLength / 2.5));
				$iNumberOfDigits = $x ? $x : 1;
				$aPassword = self::_mergeIntoPassword($aPassword, $aDigits, $iNumberOfDigits);
			}else {
				$aPassword = $aDigits;
				$bMerge = true;
			}
		}
		if($iElements & self::PW_USE_SPECIAL) {
			if($bMerge) {
				$x = rand(1000, 10000) % ceil($iLength / 5);
				$iNumberOfSpecialChars = $x ? $x : 1;
				$aPassword = self::_mergeIntoPassword($aPassword, $aSpecialChars, $iNumberOfSpecialChars);
			}else {
				$aPassword = $aSpecialChars;
				$bMerge = true;
			}
		}
		$sPassword = implode('', array_slice($aPassword, 0, $iLength));
		return $sPassword;
	}
/**
 * merges $iCount chars from $aInsert randomly into $aPassword
 * @param array $aPassword
 * @param array $aInsert
 * @param integer $iCount
 * @return array
 */
	private static function _mergeIntoPassword($aPassword, $aInsert, $iCount)
	{
		$aListOfIndexes = array();
		while(sizeof($aListOfIndexes) < $iCount) {
			$x = rand(1000, 10000) % sizeof($aInsert);
			$aListOfIndexes[$x] = $x;
		}
		foreach($aListOfIndexes as $x) {
			$aPassword[$x] = $aInsert[$x];
		}
		return $aPassword;
	}

} // end of class PasswordHash
