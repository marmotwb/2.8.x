<?php
/**
 *
 * @category        modules
 * @package         Menu Link
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */


/* History:
2.8 - June 2009
- Improved the pagelist (thorn)
- Added different redirect types 301 or 302 (thorn)
- Set platform version 2.8

2.7 - 24. Jan. 2008 - doc
- added language support, changed platform to 2.7

2.6.1.1 - 16. Jan. 2008 - thorn
- added table mod_menu_link
- added install.php, delete.php, add.php
- changed wb/index.php: redirect if page is menu_link
- removed special-handling of menu_link in: admin/pages/settings2.php

*/

$module_directory = 'menu_link';
$module_name = 'Menu Link';
$module_function = 'page';
$module_version = '2.8.1';
$module_platform = '2.8.4';
$module_author = 'Ryan Djurovich, thorn';
$module_license = 'GNU General Public License';
$module_description = 'This module allows you to insert a link into the menu.';
