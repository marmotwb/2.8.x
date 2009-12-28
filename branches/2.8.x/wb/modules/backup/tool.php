<?php

/****************************************************************************
* SVN Version information:
*
* $Id$
*
*****************************************************************************
*
*****************************************************************************
*                          WebsiteBaker
*
* WebsiteBaker Project <http://www.websitebaker2.org/>
* Copyright (C) 2009, Website Baker Org. e.V.
*         http://start.websitebaker2.org/impressum-datenschutz.php
* Copyright (C) 2004-2009, Ryan Djurovich
*
*                        About WebsiteBaker
*
* Website Baker is a PHP-based Content Management System (CMS)
* designed with one goal in mind: to enable its users to produce websites
* with ease.
*
*****************************************************************************
*
*****************************************************************************
*                   WebsiteBaker Extra Information (where needed)
*
*
*
*****************************************************************************
*
*****************************************************************************
*                        LICENSE INFORMATION
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
*****************************************************************************/
/**
 *
 * @category     modules
 * @package      backup
 * @author       Ryan Djurovich
 * @copyright    2004-2009, Ryan Djurovich
 * @copyright    2009, Website Baker Org. e.V.
 * @version      $Id$
 * @platform     WebsiteBaker 2.8.x
 * @requirements >= PHP 4.3.4
 * @license      http://www.gnu.org/licenses/gpl.html
 *
 *
 */

// Direct access prevention
defined('WB_PATH') OR die(header('Location: ../index.php'));

// check if module language file exists for the language set by the user (e.g. DE, EN)
if(!file_exists(WB_PATH .'/modules/backup/languages/'.LANGUAGE .'.php')) {
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH .'/modules/backup/languages/EN.php');
} else {
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH .'/modules/backup/languages/'.LANGUAGE .'.php');
}

// Show form
?>
<br />
<form name="prompt" method="post" action="<?php echo WB_URL; ?>/modules/backup/backup-sql.php">
		<input type="radio" checked="checked" name="tables" value="ALL"><?php echo $MOD_BACKUP['BACKUP_ALL_TABLES']; ?><br>
		<input type="radio" name="tables" value="WB"><?php echo $MOD_BACKUP['BACKUP_WB_SPECIFIC']; ?><br><br> 
	<input type="submit" name="backup" value="<?php echo $TEXT['BACKUP_DATABASE']; ?>" onClick="javascript: if(!confirm('<?php echo $MESSAGE['GENERIC']['PLEASE_BE_PATIENT']; ?>')) { return false; }" />
</form>