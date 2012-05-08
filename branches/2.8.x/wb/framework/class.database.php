<?php
/**
 * Temporary class to detect invalid instancing
 *
 * @author wkl
 */
class database {


	public function  __construct() {

		$this->showError();
	}

	public function  __call($name, $arguments) {
		$this->showError();
	}
	private function showError() {
		
		$y = debug_backtrace();
		$msg  = '<div style="margin: 100px auto; width: 70%">';
		$msg .= '<p style="color: #dd0000; font-weight: bold;">Runtime Error !!</p>';
		$msg .= '<p>Ouups...  there is a invalid statement found!!</p>';
		$msg .= '<p>In File: <b>'.$y[0]['file'].'</b> Line: <b>'.$y[0]['line'].'</b><br />tried to create an invalid <b>'.$y[0]['class'].'</b> - object</p>';
		$msg .= '<p>Please contact the module author to solve this problem.</p>';
		$msg .= '<p>Also you can get information and help from the ';
		$msg .= '<a href="http://www.websitebaker2.org/forum/index.php/board,2.0.html">WebsiteBaker Forum</a></p>';
		$msg .= '<hr />';
		$msg .= '<p style="color: #dd0000; font-weight: bold;">Runtime Error !!</p>';
		$msg .= '<p>Ouups...  hier wurde ein ung&uuml;ltiges Kommando gefunden!!</p>';
		$msg .= '<p>In Datei: <b>'.$y[0]['file'].'</b> - Zeile: <b>'.$y[0]['line'].'</b><br />es wurde versucht, ein ung&uuml;ltiges <b>'.$y[0]['class'].'</b> - Objekt zu erstellen.</p>';
		$msg .= '<p>Bitte kontaktieren Sie den Modulautor um dieses Problem zu l&ouml;sen.</p>';
		$msg .= '<p>Ebenso k&ouml;nnen sie auch Informationen und Hilfe im ';
		$msg .= '<a href="http://www.websitebaker2.org/forum/index.php/board,31.0.html">WebsiteBaker Forum</a> finden.</p>';
		$msg .= '</div>';
		die($msg);
		
	}

}