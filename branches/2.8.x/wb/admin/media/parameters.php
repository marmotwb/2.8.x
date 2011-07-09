<?php
/**
 *
 * @category        admin
 * @package         admintools
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL:  $
 * @lastmodified    $Date:  $
 *
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }

function __unserialize($sObject) {  // found in php manual :-)
	$__ret =preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $sObject );
	return unserialize($__ret);
}
$pathsettings = array();
$query = $database->query ( "SELECT * FROM ".TABLE_PREFIX."settings where `name`='mediasettings'" );
if ($query && $query->numRows() > 0) {
	$settings = $query->fetchRow();
	$pathsettings = __unserialize($settings['value']);
} else {
	$database->query ( "INSERT INTO ".TABLE_PREFIX."settings (`name`,`value`) VALUES ('mediasettings','')" );
}

