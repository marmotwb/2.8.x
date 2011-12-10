<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description     
 */

// Must include code to stop this file being access directly
/* -------------------------------------------------------- */
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<head><title>Access denied</title></head><body><h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2></body></html>');
}
/* -------------------------------------------------------- */

$database->query("DELETE FROM ".TABLE_PREFIX."search WHERE name = 'module' AND value = 'form'");
$database->query("DELETE FROM ".TABLE_PREFIX."search WHERE extra = 'form'");

$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_form_fields`");
$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_form_settings`");
$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_form_submissions`");
