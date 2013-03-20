<?php
/**
 *
 * @category        modules
 * @package         JsAdmin
 * @author          WebsiteBaker Project, modified by Swen Uth for Website Baker 2.7
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
*/

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
} else {
	$sError = array();
	// Create table
	if(!$database->SqlImport(dirname(__FILE__).'/sql/mod_jsadmin.sql','',false)){
		$sError[] = $database->get_error();
	}
// Create table
	if(!$database->SqlImport(dirname(__FILE__).'/sql/data_jsadmin.sql','',false)){
		$sError[] = $database->get_error();
	}
}
