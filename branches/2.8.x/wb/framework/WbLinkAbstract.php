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
 * WbLinkAbstract.php
 *
 * @category     Core
 * @package      Core_Interfaces
 * @subpackage   WbLink outputfilter
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 03.11.2013
 * @description  Interface definition for all addon/ * /WbLink.php
 */
abstract class WbLinkAbstract {

	protected $oDb  = null;
	protected $oReg = null;

	final public function __construct()
	{
		$this->oDb  = WbDatabase::getInstance();
		$this->oReg = WbAdaptor::getInstance();
	}

	abstract public function makeLinkFromTag(array $aReplacement);
	abstract public function &generateOptionsList();

/**
 *
 * @param string $sAddonName
 * @param string $sAddonTableName
 * @param string $sPageIdName
 * @param string $sSectionIdName
 * @param string $sItemIdName
 * @param string $sDateTimeName
 * @param string $sTitleName
 * @param string $sActivatedName
 * @return array by reference
 */
	final protected function &_executeListGeneration(
	                                                  $sAddonName      = 'news',
	                                                  $sAddonTableName = 'mod_news_posts',
	                                                  $sPageIdName     = 'page_id',
	                                                  $sSectionIdName  = 'section_id',
	                                                  $sItemIdName     = 'post_id',
	                                                  $sDateTimeName   = 'created_when',
	                                                  $sTitleName      = 'title',
	                                                  $sActivatedName  = 'active'
	                                                )
	{
		$aAddonItems = array();
		//generate news lists
		$sql = 'SELECT `p`.`'.$sItemIdName.'` `ItemId`, `p`.`'.$sPageIdName.'` `PageId`, '
		     .        '`s`.`section_id` `SectionId`, `p`.`'.$sTitleName.'` `Title` '
		     . 'FROM `'.$this->oDb->TablePrefix.'sections` `s` '
			 . 'LEFT JOIN `'.$this->oDb->TablePrefix.$sAddonTableName.'` `p` ON `s`.`section_id`= `p`.`'.$sSectionIdName.'` '
			 . 'WHERE `p`.`'.$sActivatedName.'`>0 AND `s`.`module`=\''.$sAddonName.'\' '
			 . 'ORDER BY `s`.`page_id`, `s`.`section_id`, `p`.`'.$sDateTimeName.'` DESC';
		if (( $oRes = $this->oDb->doQuery($sql))) {
			$iCurrentPage    = 0;
			$iCurrentSection = 0;
			$iSectionCounter = 0;
			while ($aItem = $oRes->fetchRow(MYSQL_ASSOC)) {
				if ($iCurrentPage != $aItem['PageId']) {
					$iCurrentPage = $aItem['PageId'];
					$aAddonItems[$iCurrentPage.'P'] = array();
				}
				if ($iCurrentSection != $aItem['SectionId']) {
					$iCurrentSection = $aItem['SectionId'];
					$aAddonItems[$iCurrentPage.'P'][] = array();
					$iSectionCounter = sizeof($aAddonItems[$iCurrentPage.'P'])-1;
				}
				$aAddonItems[$iCurrentPage.'P'][$iSectionCounter][] = array(
				    'wblink' => '[wblink'.$aItem['PageId'].'?addon='.$sAddonName.'&item='.$aItem['ItemId'].']',
				    'title'  => preg_replace("/\r?\n/", "\\n", $this->oDb->escapeString($aItem['Title']))
				);
			}
		}
		return $aAddonItems;
	}


} // end of class WbLinkAbstract
