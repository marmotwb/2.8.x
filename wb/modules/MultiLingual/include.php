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
 * include.php
 *
 * @category     Modules
 * @package      Modules_MultiLingual
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websiteBaker.org>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 09.01.2013
 * @description  provides a flexible posibility for changeing to a translated page
 */

if(!function_exists('language_menu'))
{
	function language_menu($sExtension = "auto")
	{
		global $wb;
		$sExtension = strtolower($sExtension);
		switch($sExtension)
		{
			case 'png':
			case 'svg':
				break;
			default:
				$sExtension = 'auto';
		}

		if ( $wb->page_id  < 1){ return false; }
		$oPageLang = new m_MultiLingual_Lib();
        $oPageLang->setExtension($sExtension);
		$sRetVal = $oPageLang->getLangMenu();
		return $sRetVal;
	}
}
