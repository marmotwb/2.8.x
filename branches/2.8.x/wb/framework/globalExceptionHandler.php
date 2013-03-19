<?php
/**
 * @category        WebsiteBaker
 * @package         WebsiteBaker_core
 * @author          Werner v.d.Decken
 * @copyright       WebsiteBaker.org e.V.
 * @link            http://websitebaker2.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @version         $Id$
 * @filesource		$HeadURL$
 *
 * Global exception-handler
 * This module will activate a global exception handler to catch all thrown exceptions
 *
 */
/**
 * define several default exceptions directly to prevent from extra loading requests
 */
/**
 *
 */
	class AppException extends Exception{
		public function __toString() {
			$file = str_replace(dirname(dirname(__FILE__)), '', $this->getFile());
			if(DEBUG) {
				$trace = $this->getTrace();
				$result = 'Exception: "'.$this->getMessage().'" @ ';
				if($trace[0]['class'] != '') {
				  $result .= $trace[0]['class'].'->';
				}
				$result .= $trace[0]['function'].'(); in'.$file.'<br />'."\n";
				if(mysql_errno()) {
					$result .= mysql_errno().': '.mysql_error().'<br />'."\n";
				}
				$result .= '<pre>'."\n";
				$result .= print_r($trace, true)."\n";
				$result .= '</pre>'."\n";
			}else {
				$result = 'Exception: "'.$this->getMessage().'" >> Exception detected in: ['.$file.']<br />'."\n";
			}
			return $result;
		}
	}
/**
 * define Exception to show error after accessing a forbidden file
 */
	class IllegalFileException extends LogicException {
		public function __toString() {
			$file = str_replace(dirname(dirname(__FILE__)), '', $this->getFile());
			$out  = '<div style="color: #ff0000; text-align: center;"><br />';
			$out .= '<br /><br /><h1>Illegale file access</h1>';
			$out .= '<h2>'.$file.'</h2></div>';
			return $out;
		}
	} // end of class
/**
 * define Exception to show error message
 */
	class ErrorMsgException extends Exception {
		public function __toString() {
            $out  = $this->getMessage();
			return $out;
		}
	} // end of class

/* -- several security exceptions ----------------------------------------------------- */
	class SecurityException extends RuntimeException { 	}

	class SecDirectoryTraversalException extends SecurityException {
		public function __toString() {
			$out  = 'possible directory traversal attack<br />'."\n";
			$out .= '\''.$e->getMessage().'\'<br />'."\n";
			return $out;
		}
	}
/* ------------------------------------------------------------------------------------ */
/**
 *
 * @param Exception $e
 */
	function globalExceptionHandler($e) {
		// hide server internals from filename where the exception was thrown
		$file = str_replace(dirname(dirname(__FILE__)), '', $e->getFile());
		// select some exceptions for special handling
		if ($e instanceof SecurityException) {
			$out = 'Exception: "'.(string)$e.'" @ ';
		    $trace = $e->getTrace();
			if($trace[0]['class'] != '') {
				$out .= $trace[0]['class'].'->';
			}
			$out .= $trace[0]['function'].'();<br />';
			$out .= 'in "'.$file.'"'."\n";
			echo $out;
		}elseif ($e instanceof AppException) {
			echo (string)$e;
		}elseif ($e instanceof IllegalFileException) {
			$sResponse  = $_SERVER['SERVER_PROTOCOL'].' 403 Forbidden';
			header($sResponse);
			echo $e;
		}elseif($e instanceof ErrorMsgException) {
			echo (string)$e;
		}elseif($e instanceof RuntimeException) {
			$out  = 'There was a serious runtime error:'."\n";
			$out .= $e->getMessage()."\n";
			$out .= 'in line ('.$e->getLine().') of ('.$file.')'."\n";
			echo $out;
		}else {
		// default exception handling
			$out  = 'There was an unknown exception:'."\n";
			$out .= $e->getMessage()."\n";
			$out .= 'in line ('.$e->getLine().') of ('.$file.')'."\n";
			echo $out;
		}
	}
/**
 * now activate the new defined handler
 */
	set_exception_handler('globalExceptionHandler');
