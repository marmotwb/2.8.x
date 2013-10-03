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
 * ParentPageTree.php
 *
 * @category     WbACP
 * @package      WbACP_Pages
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 05.08.2013
 * @description  xyz
 */

class a_pages_SmallRawPageTree extends a_pages_PageTree{

/**
 * create a page tree as a well formatted, unordered list
 * @param int use page-ID as root of the generated page tree. (default: 0)
 * @return string the whoole list
 */
	protected function _createTree($iTreeRoot = 0)
	{
		// generate the page lines
		$this->_IterateTree($iTreeRoot);
		return '';
	}
/**
 * iterate through all nodes which having subnodes
 * @param integer start iteration from this parent page ( 0 = root)
 * @return string all of the item lines
 */
	protected function _IterateTree($iParent = 0)
	{
		$sOutput = '';
	// Get page list from database
		if(($oPages = $this->_oDb->query($this->_makeSql($iParent))))
		{
			$this->_queries++;
			$iMinPosition = 1;
			while($aPage = $oPages->fetchRow(MYSQL_ASSOC))
			{ // iterate through the current branch
				if($this->_aReg['PAGE_LEVEL_LIMIT'] && ($aPage['level'] > $this->_aReg['PAGE_LEVEL_LIMIT'])) {
					return '';
				}
				$aPage['min_position'] = ($aPage['position'] < $iMinPosition ? $aPage['position'] : $iMinPosition);
				$this->_iLineColor = $this->_iPagesTotal++ % 2;
				$aPage['iswriteable'] = false;
				if( $this->_oApp->ami_group_member($aPage['admin_users']) ||
					$this->_oApp->is_group_match($this->_oApp->get_groups_id(), $aPage['admin_groups']))
				{
					if(($aPage['visibility'] == 'deleted' && $this->_aReg['PAGE_TRASH'] == 'inline') ||
					   ($aPage['visibility'] != 'deleted'))
					{
						$aPage['iswriteable'] = true;
						$this->_iPagesWriteable++;
					}
				} else {
					if($aPage['visibility'] == 'private') { continue; }
				}
			// add this item to the secondary list of parents
				$this->_addToParentList($aPage);
			// if there are children, iterate through this children now
				if((bool)$aPage['children']) {
					$this->_IterateTree($aPage['page_id']);
				}
			}
		}
		return $sOutput;
	}


} // end of class LanguagePageTree
