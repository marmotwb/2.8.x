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
 * Reorg.php
 *
 * @category     Module
 * @package      Module_news
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 17.01.2013
 * @description  Reorganisation jobs for the 'news' module
 */

class m_news_Reorg {

	protected $_oReg = null;
	protected $_sPagesDir = '';

/**
 * Execute reorganisation
 * @return string all occured messages 
 */
	public function execute() 
	{
		$sOutput = null;
		$this->_oReg = null;
		if(class_exists('WbAdaptor')) {
			$this->_oReg = WbAdaptor::getInstance();
			$sTmp = trim($this->_oReg->PagesDir, '/');
			$sTmp = ($sTmp == '' ? '' : $sTmp);
			$this->_sPagesDir = $sTmp;
			$sOutput = $this->createAccessFiles();
		}
		// add here the requests for additional reorg methods
		return $sOutput;
	}
/**
 * Creates all Accessfiles from DB
 * @return string all occured messages 
 */
	protected function createAccessFiles()
	{
		$count = 0;
		$aReturnMsg = array();
		$sql  = 'SELECT `page_id`,`post_id`,`section_id`,`link` ';
		$sql .= 'FROM `'.$this->_oReg->TablePrefix.'mod_news_posts`';
		$sql .= 'WHERE `link` != \'\'';
		if(($oPosts = WbDatabase::getInstance()->query($sql))) {
			while($aPost = $oPosts->fetchRow(MYSQL_ASSOC))
			{
				$sAccessFile = $this->_oReg->AppPath.$this->_sPagesDir
				               . rtrim(str_replace('\\', '/', $aPost['link']), '/')
				               . $this->_oReg->PageExtension;
				$aOptionalCommand = array(
					'$section_id   = '.$aPost['section_id'].';',
					'$post_section = '.$aPost['section_id'].';',
					'$post_id      = '.$aPost['post_id'].';'
				);

				if(create_access_file($sAccessFile, $aPost['page_id'], 0, $aOptionalCommand)){
					$count++;	
				} else {
					$aReturnMsg[] = 'Can\'t create '.$sAccessFile;	
				}
			}
			$aReturnMsg[] = 'Number of new created access files: '.$count;
		}
		return $aReturnMsg;
	}
	// add here some additional reorg methods **************************************** *//
} // end of class Reorg
