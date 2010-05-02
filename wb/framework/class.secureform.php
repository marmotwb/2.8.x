<?php
/**
 *
 * @category        security
 * @package         framework
 * @author          ISTeam easy-Project
 * @copyright       2009-2010, Independend-Software-Team
 * @link            http://easy.isteam.de/
 * @license         http://creativecommons.org/licenses/by-nc-nd/3.0/de/
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.4.9 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 * SecureForm
 * Version 0.1
 *
 * creates Formular transactionnumbers for unique use
 */

class SecureForm {

	/* insert global vars here... */

	var $_FTAN   = '';
	var $_IDKEYs = '';
	var $_salt   = '';

	function SecureForm()
	{
//		$this->__construct();
		$this->_FTAN  = '';
		$this->_salt = $this->_generate_salt();
		if(isset($_SESSION['IDKEYS']))
		{
			$this->_IDKEYs = $_SESSION['IDKEYS'];
		}else {
			$this->_IDKEYs = array();
		}
	}
//	function __construct()
//	{
//		var $_FTAN  = '';
//		if(isset($_SESSION['FTAN'])) { unset($_SESSION['FTAN']); }
//	}


	function _generate_salt()
	{
		// server depending values
 		$salt  = ( isset($_SERVER['SERVER_SIGNATURE']) ) ? $_SERVER['SERVER_SIGNATURE'] : '2';
		$salt .= ( isset($_SERVER['SERVER_SOFTWARE']) ) ? $_SERVER['SERVER_SOFTWARE'] : '3';
		$salt .= ( isset($_SERVER['SERVER_NAME']) ) ? $_SERVER['SERVER_NAME'] : '5';
		$salt .= ( isset($_SERVER['SERVER_ADDR']) ) ? $_SERVER['SERVER_ADDR'] : '7';
		$salt .= ( isset($_SERVER['SERVER_PORT']) ) ? $_SERVER['SERVER_PORT'] : '11';
		$salt .= ( isset($_SERVER['SERVER_ADMIN']) ) ? $_SERVER['SERVER_ADMIN'] : '13';
		$salt .= PHP_VERSION;
		// client depending values
		$salt .= ( isset($_SERVER['HTTP_ACCEPT']) ) ? $_SERVER['HTTP_ACCEPT'] : '17';
		$salt .= ( isset($_SERVER['HTTP_ACCEPT_CHARSET']) ) ? $_SERVER['HTTP_ACCEPT_CHARSET'] : '19';
		$salt .= ( isset($_SERVER['HTTP_ACCEPT_ENCODING']) ) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '23';
		$salt .= ( isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '29';
		$salt .= ( isset($_SERVER['HTTP_CONNECTION']) ) ? $_SERVER['HTTP_CONNECTION'] : '31';
		$salt .= ( isset($_SERVER['HTTP_USER_AGENT']) ) ? $_SERVER['HTTP_USER_AGENT'] : '37';
		return $salt;
	}
/*
 * creates Formular transactionnumbers for unique use
 * @access public
 * @param bool $asTAG: true returns a complete prepared, hidden HTML-Input-Tag (default)
 *                    false returns an array including FTAN0 and FTAN1
 * @return mixed:      array or string
 *
 * requirements: an active session must be available
 */
	function getFTAN( $as_tag = true)
	{
		if( $this->_FTAN == '')
		{
			if(function_exists('microtime'))
			{
				list($usec, $sec) = explode(" ", microtime());
				$time = (string)((float)$usec + (float)$sec);
			}else{
				$time = (string)time();
			}
			$this->_FTAN = md5($time.$this->_salt);
			$_SESSION['FTAN'] = $this->_FTAN;

		}
		$ftan0 = 'a'.substr($this->_FTAN, -(10 + hexdec(substr($this->_FTAN, 1))), 10);
		$ftan1 = 'a'.substr($this->_FTAN, hexdec(substr($this->_FTAN, -1)), 10);
		if($as_tag == true)
		{
			return '<input type="hidden" name="'.$ftan0.'" value="'.$ftan1.'" title="" />';
		}else{
			return array('FTAN0' => $ftan0, 'FTAN1' => $ftan1);
		}
	}

/*
 * checks received form-transactionnumbers against session-stored one
 * @access public
 * @param string $mode: requestmethode POST(default) or GET
 * @return bool:    true if numbers matches against stored ones
 *
 * requirements: an active session must be available
 * this check will prevent from multiple sending a form. history.back() also will never work
 */
	function checkFTAN( $mode = 'POST')
	{
		$retval = false;
		if(isset($_SESSION['FTAN']) && strlen($_SESSION['FTAN']) == strlen(md5('dummy')))
		{
			$ftan = $_SESSION['FTAN'];
			$ftan0 = 'a'.substr($ftan, -(10 + hexdec(substr($ftan, 1))), 10);
			$ftan1 = 'a'.substr($ftan, hexdec(substr($ftan, -1)), 10);
			unset($_SESSION['FTAN']);
			if(strtoupper($mode) == 'POST')
			{
				$retval = (isset($_POST[$ftan0]) && $_POST[$ftan0] == ($ftan1));
				$_POST[$ftan0] = '';
			}else{
				$retval = (isset($_GET[$ftan0]) && $_GET[$ftan0] == ($ftan1));
				$_GET[$ftan0] = '';
			}
		}
		return $retval;
	}

/*
 * save values in session and returns a ID-key
 * @access public
 * @param mixed $value: the value for witch a key shall generated and memorized
 * @return string:      a MD5-Key to use instead of the real value
 *
 * requirements: an active session must be available
 */
	function getIDKEY($value)
	{
		$isarray = is_array($value);
		if( $isarray ) { $value = serialize($value); }
		$key = md5($this->_salt.(string)$value);
		if( $isarray ) { $key[5] = 'h'; }
		$added = false;
		while(!$added)
		{
			if( !array_key_exists($key, $this->_IDKEYs) )
			{
				$this->_IDKEYs[$key] = $value;
				$added = true;
			}else {
			// if key already exist, increment the last four digits until the key is unique
				$key = substr($key, -4).dechex(('0x'.substr($key0, -4)) + 1);
			}
		}
		$_SESSION['IDKEYS'] = $this->_IDKEYs;
		return $key;
	}

/*
 * search for key in session and returns the original value
 * @access public
 * @param string $key: the alias-key from the original value
 * @return mixed: the original value (string, numeric, array) or NULL if request fails
 *
 * requirements: an active session must be available
 */
	function checkIDKEY( $key )
	{
		$value = null;
		if( array_key_exists($key, $this->_IDKEYs))
		{
			$value = $this->_IDKEYs[$key];
			unset($this->_IDKEYs[$key]);
			$_SESSION['IDKEYS'] = $this->_IDKEYs;
			if($value[5] == 'h') { $value = unserialize($value); }
		}
		return $value;
	}
    //put your code here
}
?>