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

/**
 * @var object $oDb the active instance of WbDatabase 
 */
	protected $oDb    = null;
/**
 * @var object $oReg the active instance of WbAdaptor
 */
	protected $oReg   = null;
/**
 * @var string $sAddon the name of the addon, which extends this class
 */
	protected $sAddon = '';
/**
 * protected constructor
 */
	final public function __construct()
	{
		$this->oDb    = WbDatabase::getInstance();
		$this->oReg   = WbAdaptor::getInstance();
		$this->sAddon = preg_replace('/^.*?_([^_]+)_[^_]*?$/', '\1', get_class($this));
	}


	abstract public function makeLinkFromTag(array $aReplacement);
	abstract public function &generateOptionsList();

/**
 * executeListGeneration
 * @return array by reference
 */
	final protected function &_executeListGeneration()
	{
		$aAddonItems = array();
		//generate news lists
		$sql = 'SELECT `p`.`'.$this::FIELDNAME_ITEM_ID.'` `ItemId`, `p`.`'.$this::FIELDNAME_PAGE_ID.'` `PageId`, '
		     .        '`s`.`section_id` `SectionId`, `p`.`'.$this::FIELDNAME_TITLE.'` `Title` '
		     . 'FROM `'.$this->oDb->TablePrefix.'sections` `s` '
			 . 'LEFT JOIN `'.$this->oDb->TablePrefix.$this::TABLE_NAME.'` `p` ON `s`.`section_id`= `p`.`'.$this::FIELDNAME_SECTION_ID.'` '
			 . 'WHERE `s`.`module`=\''.$this->sAddon.'\' '
		     . ($this::FIELDNAME_ACTIVE != '' ? 'AND `p`.`'.$this::FIELDNAME_ACTIVE.'`>0 ' : '')
			 . 'ORDER BY `s`.`page_id`, `s`.`section_id`'.($this::FIELDNAME_TIMESTAMP != '' ? ', `p`.`'.$this::FIELDNAME_TIMESTAMP.'` DESC' : '');
		if (( $oRes = $this->oDb->doQuery($sql))) {
		// preset group changer flags
			$iCurrentPage    = 0;
			$iCurrentSection = 0;
			$iSectionCounter = 0;
			while ($aItem = $oRes->fetchRow(MYSQL_ASSOC)) {
			// iterate all matches
				if ($iCurrentPage != $aItem['PageId']) {
				// change group by PageId
					$iCurrentPage = $aItem['PageId'];
					$aAddonItems[$iCurrentPage.'P'] = array();
				}
				if ($iCurrentSection != $aItem['SectionId']) {
				// change group by SectionId
					$iCurrentSection = $aItem['SectionId'];
					$aAddonItems[$iCurrentPage.'P'][] = array();
					$iSectionCounter = sizeof($aAddonItems[$iCurrentPage.'P'])-1;
				}
				// save current record
				$aAddonItems[$iCurrentPage.'P'][$iSectionCounter][] = array(
				    'wblink' => '[wblink'.$aItem['PageId'].'?addon='.$this->sAddon.'&item='.$aItem['ItemId'].']',
				    'title'  => preg_replace("/\r?\n/", "\\n", $this->oDb->escapeString($aItem['Title']))
				);
			}
		}
		return $aAddonItems;
	}
/**
 * makeLinkFromTag
 * @param string $sBasePath
 * @param array $aReplacement
 * @return string a valid URL or '#' on error
 */
	protected function _makeLinkFromTag($sBasePath, array $aReplacement)
	{
	// set link on failure ('#' means, still stay on current page)
		$sRetval = '#';
	// search `link` from posts table and create absolute URL
		$sql = 'SELECT `'.$this::FIELDNAME_LINK.'` '
			 . 'FROM `'.$this->oDb->TablePrefix.$this::TABLE_NAME.'` '
			 . 'WHERE `'.$this::FIELDNAME_ITEM_ID.'`='.$aReplacement['item'];
		if (($sLink = $this->oDb->get_one($sql))) {
			$sLink     = trim(str_replace('\\', '/', $sLink), '/');
			$sBasePath = trim(str_replace('\\', '/', $sBasePath), '/').'/';
		// test if valid accessfile is available
			$sFilePath = $sBasePath.$sLink.$this->oReg->PageExtension;
			if (is_readable($sFilePath)) {
				$sRelPath = preg_replace('/^'.preg_quote($this->oReg->AppPath, '/').'/', '', $sFilePath);
				$sRetval = $this->oReg->AppUrl.$sRelPath.$aReplacement['ancor'];
			}
		}
		return $sRetval;
	}
} // end of class WbLinkAbstract
