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
 * WbLink.php
 *
 * @category     Addons
 * @package      Addons_News
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 04.11.2013
 * @description  This class implements an interface for the wblink-outputfilter
 *
 * @inherited WbDatabase $oDb
 * @inherited WbAdaptor  $oReg
 *
 */

class m_news_WbLink extends WbLinkAbstract
{
/**
 * makeLinkFromTag
 * @param type $aReplacement
 * @return string
 * @description
 */
	public function makeLinkFromTag(array $aReplacement)
	{
	// set link on failure ('#' means, still stay on current page)
		$sRetval = '#';
	// search `link` from posts table and create absolute URL
		$sql = 'SELECT `link` '
			 . 'FROM `'.$this->oDb->TablePrefix.'mod_news_posts` '
			 . 'WHERE `post_id`='.$aReplacement['Args']['item'];
		if(($sLink = $this->oDb->get_one($sql)))
		{
			$sLink = trim(str_replace('\\', '/', $sLink), '/');
		// test if valid accessfile is available
			if(is_readable($this->oReg->AppPath.$this->oReg->PagesDir.$sLink.$this->oReg->PageExtension))
			{
				$sRetval = $this->oReg->AppUrl.$this->oReg->PagesDir.$sLink.$this->oReg->PageExtension;
			}
		}
		return $sRetval;
	}

//	public function generateLinkList(Template $oTpl)
//	{
//		;
//	}
} // end of class m_news_WbLink
