<?php
/**
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS HEADER.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * update_keys.php
 *
 * @category     Modules
 * @package      Modules_MultiLingual
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websiteBaker.org>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.6.8
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 09.01.2013
 * @description  xyz
 */

// Create new admin object
if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}

$mod_path = dirname(__FILE__);
//$mod_rel = str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\', '/', $mod_path ));
$mod_name = basename($mod_path);

// Get page id
// Include WB admin wrapper script
// Tells script to update when this page was last updated
$update_when_modified = false; 
require(WB_PATH.'/modules/admin.php');
$temp_page_id =  intval( htmlentities($page_id ) );

$oTrans = Translate::getInstance();
// check for page languages
$oPageLang = new m_MultiLingual_Lib();
$Result = $oPageLang->updateDefaultPagesCode(); 
if($database->is_error())
{
	$admin->print_error($database->get_error(), ADMIN_URL.'/pages/settings.php?page_id='.$temp_page_id );
} else {
	$admin->print_success($oTrans->MESSAGE_PAGES_UPDATE_SETTINGS, ADMIN_URL.'/pages/settings.php?page_id='.$temp_page_id );
}
