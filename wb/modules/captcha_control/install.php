<?php
/**
 *
 * @category        modules
 * @package         captcha_control
 * @author          Independend-Software-Team
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// prevent this file from being accessed directly
if(!defined('WB_PATH')) { exit('Cannot access this file directly'); }

$table = TABLE_PREFIX.'mod_captcha_control';
$database->query("DROP TABLE IF EXISTS `$table`");

$database->query("CREATE TABLE `$table` (
	`enabled_captcha` VARCHAR(1) NOT NULL DEFAULT '1',
	`enabled_asp` VARCHAR(1) NOT NULL DEFAULT '0',
	`captcha_type` VARCHAR(255) NOT NULL DEFAULT 'calc_text',
	`asp_session_min_age` INT(11) NOT NULL DEFAULT '20',
	`asp_view_min_age` INT(11) NOT NULL DEFAULT '10',
	`asp_input_min_age` INT(11) NOT NULL DEFAULT '5',
	`ct_text` LONGTEXT NOT NULL
	)"
);

// add new row using the table default values defined above
$database->query("
	INSERT INTO `$table`
		(`enabled_captcha`, `enabled_asp`, `captcha_type`)
	VALUES
		('1', '1', 'calc_text')
");
