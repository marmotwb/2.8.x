<?php
/**
 *
 * @category        modules
 * @package         JsAdmin
 * @author          WebsiteBaker Project, modified by Swen Uth for Website Baker 2.7
 * @copyright       (C) 2006, Stepan Riha
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
*/

// prevent this file from being accessed directly
if(!defined('WB_PATH')) { exit('Cannot access this file directly'); }

// add new rows to table "settings"

$table = TABLE_PREFIX ."mod_jsadmin";
$database->query("DROP TABLE IF EXISTS `$table`");

$database->query("
	CREATE TABLE `$table` (
    `id` INT(11) NOT NULL DEFAULT '0',
		`name` VARCHAR(255) NOT NULL DEFAULT '0',
		`value` INT(11) NOT NULL DEFAULT '0',
   	PRIMARY KEY (`id`)
	)
");

global $database;
$database->query("INSERT INTO ".$table." (id,name,value) VALUES ('1','mod_jsadmin_persist_order','1')");
$database->query("INSERT INTO ".$table." (id,name,value) VALUES ('2','mod_jsadmin_ajax_order_pages','1')");
$database->query("INSERT INTO ".$table." (id,name,value) VALUES ('3','mod_jsadmin_ajax_order_sections','1')");

?>