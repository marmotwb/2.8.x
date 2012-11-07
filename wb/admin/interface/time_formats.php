<?php
/**
 *
 * @category        admin
 * @package         interface
 * @author          Ryan Djurovich (2004-2009),WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 * Time format list file
 * This file is used to generate a list of time formats for the user to select
 *
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

// Define that this file is loaded
if(!defined('TIME_FORMATS_LOADED')) {
	define('TIME_FORMATS_LOADED', true);
}

// Create array
$TIME_FORMATS = array();

// Get the current time (in the users timezone if required)
$actual_time = time()+ ((isset($user_time) AND $user_time == true) ? TIMEZONE : DEFAULT_TIMEZONE);

// Add values to list
$TIME_FORMATS['h:i|A'] = gmdate('h:i A', $actual_time);
$TIME_FORMATS['h:i|a'] = gmdate('h:i a', $actual_time);
$TIME_FORMATS['H:i:s'] = gmdate('H:i:s', $actual_time);
$TIME_FORMATS['H:i']   = gmdate('H:i',   $actual_time);

// Add "System Default" to list (if we need to)
if(isset($user_time) AND $user_time == true) {
	if(isset($TEXT['SYSTEM_DEFAULT'])) {
		$TIME_FORMATS['system_default'] = gmdate(DEFAULT_TIME_FORMAT, $actual_time).' ('.$TEXT['SYSTEM_DEFAULT'].')';
	} else {
		$TIME_FORMATS['system_default'] = gmdate(DEFAULT_TIME_FORMAT, $actual_time).' (System Default)';
	}
}

// Reverse array so "System Default" is at the top
$TIME_FORMATS = array_reverse($TIME_FORMATS, true);

