<?php
/*
 *
 * @category        modules
 * @package         code
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.4
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id: save.php 1425 2011-02-03 23:16:12Z Luisehahne $
 * @filesource      $HeadURL: http://svn.websitebaker2.org/branches/2.8.x/wb/modules/code/save.php $
 * @lastmodified    $Date: 2011-02-04 00:16:12 +0100 (Fr, 04. Feb 2011) $
 *
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
} else {
// Insert an extra row into the database
//$database->query("INSERT INTO ".TABLE_PREFIX."mod_code (page_id,section_id) VALUES ('$page_id','$section_id')");
	$database = WbDatabase::getInstance();
	try {
		$sql = 'INSERT INTO `'.TABLE_PREFIX.'mod_code` '
		     . 'SET `section_id`='.$section_id.', '
		     .     '`page_id`='.$page_id.' ';
		$database->query($sql);
	} catch(WbDatabaseException $e) {
		$sError = $database->get_error();
	}
}
