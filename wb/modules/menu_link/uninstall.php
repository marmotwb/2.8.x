<?php
/**
 *
 * @category        modules
 * @package         Menu Link
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
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

// prevent this file from being accesses directly
if(defined('WB_PATH') == false) {
	exit("Cannot access this file directly"); 
}

$table = TABLE_PREFIX ."mod_menu_link";
$database->query("DROP TABLE `$table`");

?>