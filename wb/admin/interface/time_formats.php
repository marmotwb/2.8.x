<?php
/**
 *
 * @category        admin
 * @package         interface
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.4.9 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 * Time format list file
 * This file is used to generate a list of time formats for the user to select
 *
 */

if(!defined('WB_URL')) {
	header('Location: ../../../index.php');
	exit(0);
}

// Define that this file is loaded
if(!defined('TIME_FORMATS_LOADED')) {
	define('TIME_FORMATS_LOADED', true);
}

// Create array
$TIME_FORMATS = array();

// Get the current time (in the users timezone if required)
$actual_time = time()+ ((isset($user_time) AND $user_time == true) ? TIMEZONE : DEFAULT_TIMEZONE);

// Add values to list
$TIME_FORMATS['g:i|A'] = gmdate('g:i A', $actual_time);
$TIME_FORMATS['g:i|a'] = gmdate('g:i a', $actual_time);
$TIME_FORMATS['H:i:s'] = gmdate('H:i:s', $actual_time);
$TIME_FORMATS['H:i'] = gmdate('H:i', $actual_time);

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

?>