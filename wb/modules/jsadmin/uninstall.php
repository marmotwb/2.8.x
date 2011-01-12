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
 * @filesource		$HeadURL: http://svn.websitebaker2.org/branches/2.8.x/wb/modules/menu_link/save.php $
 * @lastmodified    $Date: 2011-01-10 13:21:47 +0100 (Mo, 10 Jan 2011) $
 *
*/

// prevent this file from being accessed directly
if(!defined('WB_PATH')) { exit('Cannot access this file directly'); }

$table = TABLE_PREFIX ."mod_jsadmin";
$database->query("DROP TABLE `$table`");
?>