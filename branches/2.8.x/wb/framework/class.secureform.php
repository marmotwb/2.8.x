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

	var $_FTAN  = '';
	var $_IDKEYs = array();

	function SecureForm()
	{
//		$this->__construct();
		$this->_FTAN  = '';
// 		if(isset($_SESSION['FTAN'])) { unset($_SESSION['FTAN']); }
	}
//	function __construct()
//	{
//		var $_FTAN  = '';
//		if(isset($_SESSION['FTAN'])) { unset($_SESSION['FTAN']); }
//	}

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
			$salt  = ( isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '');
			$salt .= ( isset($_SERVER['HTTP_ACCEPT_CHARSET']) ? $_SERVER['HTTP_ACCEPT_CHARSET'] : '');
			$salt .= ( isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '');
			$salt .= ( isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '');
			$salt .= ( isset($_SERVER['HTTP_CONNECTION']) ? $_SERVER['HTTP_CONNECTION'] : '');
			$salt .= ( isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
			$salt .= ( isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '');
			$salt  = ( $salt !== '' ) ? $salt : 'eXtremelyHotTomatoJuice';
			$this->_FTAN = md5($time.$salt);
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



    //put your code here
}
?>
