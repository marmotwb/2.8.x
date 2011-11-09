<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @author          Christian Sommer, WB-Project, Werner v.d. Decken
 * @copyright       2011-, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.2
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
require_once( dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
if(!defined('WB_PATH')) { throw new IllegalFileException(); }
/* -------------------------------------------------------- */

$table = TABLE_PREFIX .'mod_output_filter';
$database->query("DROP TABLE IF EXISTS `$table`");

$database->query("CREATE TABLE `$table` (
	`sys_rel` INT NOT NULL DEFAULT '0',
	`email_filter` VARCHAR(1) NOT NULL DEFAULT '0',
	`mailto_filter` VARCHAR(1) NOT NULL DEFAULT '0',
	`at_replacement` VARCHAR(255) NOT NULL DEFAULT '(at)',
	`dot_replacement` VARCHAR(255) NOT NULL DEFAULT '(dot)'
	)"
);

// add default values to the module table
$database->query("INSERT INTO ".TABLE_PREFIX
	."mod_output_filter (sys_rel,email_filter, mailto_filter, at_replacement, dot_replacement) VALUES ('0','1', '1', '(at)', '(dot)')");
