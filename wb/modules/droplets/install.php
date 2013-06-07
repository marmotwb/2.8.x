<?php
/**
 *
 * @category        module
 * @package         droplet
 * @author          Ruud Eisinga (Ruud) John (PCWacht)
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
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
	if(!function_exists('insertDropletFile')) { require('droplets.functions.php'); }
	$database = WbDatabase::getInstance();
	$sError = '';
	$msg = array();
	$sBaseDir = realpath(dirname(__FILE__).'/example/');
	$sBaseDir    = rtrim(str_replace('\\', '/', $sBaseDir), '/').'/';
	// Create table
	if($database->SqlImport(dirname(__FILE__).'/sql/mod_droplet.sql','',false)){
		$aDropletFiles = getDropletFromFiles($sBaseDir);
		$bOverwriteDroplets = true;
		insertDropletFile($aDropletFiles,$msg,$bOverwriteDroplets,$admin);
	}

}
