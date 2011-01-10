<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 *  * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// prevent this file from being accessed directly
if(!defined('WB_PATH')) die(header('Location: ../index.php'));

$table = TABLE_PREFIX .'mod_output_filter';
$database->query("DROP TABLE IF EXISTS `$table`");

$database->query("CREATE TABLE `$table` (
	`email_filter` VARCHAR(1) NOT NULL DEFAULT '0',
	`mailto_filter` VARCHAR(1) NOT NULL DEFAULT '0',
	`at_replacement` VARCHAR(255) NOT NULL DEFAULT '(at)',
	`dot_replacement` VARCHAR(255) NOT NULL DEFAULT '(dot)'
	)"
);

// add default values to the module table
$database->query("INSERT INTO ".TABLE_PREFIX
	."mod_output_filter (email_filter, mailto_filter, at_replacement, dot_replacement) VALUES ('0', '0', '(at)', '(dot)')");

?>