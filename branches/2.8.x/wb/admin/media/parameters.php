<?php
/**
 *
 * @category        admin
 * @package         media
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

function __unserialize($sObject) {  // found in php manual :-)
    if($sObject=='') { return array( 'global' => array( 'admin_only' => false,'show_thumbs' => false ) );}
	$__ret = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $sObject );
	return unserialize($__ret);
}
$oDb = WbDatabase::getInstance();
$pathsettings = array( 'global' => array( 'admin_only' => false,'show_thumbs' => false ) );
if(DEFAULT_THEME != '') {
	$sql = 'SELECT * FROM `'.$oDb->TablePrefix.'settings` '
         . 'WHERE `name`=\'mediasettings\'';
	$query = $oDb->doQuery($sql);
    if ($query && (($settings = $query->fetchRow(MYSQL_ASSOC)))) {
		$pathsettings = __unserialize($settings['value']);
	} else {
		$sql = 'INSERT INTO `'.$oDb->TablePrefix.'settings` '
             . 'SET `name`=\'mediasettings\', '
             .     '`value`=\'\'';
		$oDb->doQuery($sql);
	}
}
