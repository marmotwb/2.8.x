<?php
/**
 *
 * @category        modules
 * @package         wrapper
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @version      	$Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

if(defined('WB_URL')) {
	
	// Create table
	// $database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_wrapper`");
	$mod_wrapper = 'CREATE TABLE IF NOT EXISTS `'.TABLE_PREFIX.'mod_wrapper` ('
		. ' `section_id` INT NOT NULL DEFAULT \'0\','
		. ' `page_id` INT NOT NULL DEFAULT \'0\','
		. ' `url` TEXT NOT NULL,'
		. ' `height` INT NOT NULL DEFAULT \'0\','
		. ' PRIMARY KEY ( `section_id` ) '
		. ' )';
	$database->query($mod_wrapper);
}

?>