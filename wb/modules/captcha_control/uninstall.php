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

$table = TABLE_PREFIX .'mod_captcha_control';
$database->query("DROP TABLE `$table`");
