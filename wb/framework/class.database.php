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
		$msg  = '<div style="margin: 100px auto; width: 70%; background-color: #ffcccc; padding: 10px;">';
		$msg .= '<p style="color: #dd0000; font-weight: bold;">Runtime Error !!</p>';
		$msg .= '<p>Ouups...  there is a invalid statement found!!</p>';
		$msg .= '<p>In File: <b>'.$y[1]['file'].'</b> Line: <b>'.$y[1]['line'].'</b><br />';
		$msg .= 'tried to create an invalid <b>'.$y[1]['class'].'</b> - object</p>';
		$msg .= '<p>Please replace <span style="color:#dd0000; font-weight:bold;">';
		$msg .= '$database = new database();</span> by <span style="color:#00bb00; font-weight:bold;">';
		$msg .= '$database = WbDatabase::getInstance();</span>.</p>';
		$msg .= '<p>Also you can get information and help from the ';
		$msg .= '<a href="http://www.websitebaker.org/forum/index.php/board,2.0.html">WebsiteBaker Forum</a></p>';
		$msg .= '<hr />';
		$msg .= '<p style="color: #dd0000; font-weight: bold;">Runtime Error !!</p>';
		$msg .= '<p>Ouups...  hier wurde ein ung&uuml;ltiges Kommando gefunden!!</p>';
		$msg .= '<p>In der Datei: <b>'.$y[1]['file'].'</b> - Zeile: <b>'.$y[1]['line'].'</b><br />';
		$msg .= 'wurde versucht, ein ung&uuml;ltiges <b>'.$y[1]['class'].'</b> - Objekt zu erstellen.</p>';
		$msg .= '<p>Bitte ersetzen Sie <span style="color:#dd0000; font-weight:bold;">';
		$msg .= '$database = new database();</span> durch <span style="color:#00bb00; font-weight:bold;">';
		$msg .= '$database = WbDatabase::getInstance();</span>.</p>';
		$msg .= '<p>Auch k&ouml;nnen sie auch Informationen und Hilfe im ';
		$msg .= '<a href="http://www.websitebaker.org/forum/index.php/board,31.0.html">WebsiteBaker Forum</a> finden.</p>';
		$msg .= '</div>';
		die($msg);
		
	}

}