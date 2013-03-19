<?php
/**
 *
 * @category        modules
 * @package         form
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, Website Baker Org. e.V.
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
// Create tables
	$aError = array();
	// Create table
	if(!$database->SqlImport(dirname(__FILE__).'/sql/form284db.sql','',false)){
		$aError[] = $database->get_error();
	}
}
