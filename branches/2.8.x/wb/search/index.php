<?php
/*
*
*                       About WebsiteBaker
*
* Website Baker is a PHP-based Content Management System (CMS)
* designed with one goal in mind: to enable its users to produce websites
* with ease.
*
*                       LICENSE INFORMATION
*
* WebsiteBaker is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* WebsiteBaker is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
* See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*
*                   WebsiteBaker Extra Information
*
*
*/
/**
 *
 * @category        frontend
 * @package         search
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @filesource		$HeadURL$
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 *
 * @author          WebsiteBaker Project
 * @link			http://www.websitebaker2.org/
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://start.websitebaker2.org/impressum-datenschutz.php
 * @license         http://www.gnu.org/licenses/gpl.html
 * @version         $Id$
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @lastmodified    $Date$
 *
 */

// Include the config file
require('../config.php');

// Required page details
$page_id = 0;
$page_description = '';
$page_keywords = '';
define('PAGE_ID', 0);
define('ROOT_PARENT', 0);
define('PARENT', 0);
define('LEVEL', 0);
define('PAGE_TITLE', $TEXT['SEARCH']);
define('MENU_TITLE', $TEXT['SEARCH']);
define('MODULE', '');
define('VISIBILITY', 'public');
define('PAGE_CONTENT', 'search.php');

// Find out what the search template is
$database = new database();
$query_template = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'template' LIMIT 1");
$fetch_template = $query_template->fetchRow();
$template = $fetch_template['value'];
if($template != '') {
	define('TEMPLATE', $template);
}
unset($template);

//Get the referrer page ID if it exists
if(isset($_REQUEST['referrer']) && is_numeric($_REQUEST['referrer']) && intval($_REQUEST['referrer']) > 0) {
	define('REFERRER_ID', intval($_REQUEST['referrer']));
} else {
	define('REFERRER_ID', 0);
}

// Include index (wrapper) file
require(WB_PATH.'/index.php');

?>