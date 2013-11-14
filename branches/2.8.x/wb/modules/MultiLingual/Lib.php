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
 * Lib.php
 *
 * @category     Modules
 * @package      Modules_MultiLingual
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websiteBaker.org>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.6.8
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 09.01.2013
 * @description  provides a flexible posibility for changeing to a translated page
 */

class m_MultiLingual_Lib {
/** @var object instance of the WbAdaptor object */
	protected $_oReg = null;
/** @var object instance of the application object */
	private $_oApp     = null;
/** @var object instance of the database object */
	private $_oDb      = null;

	private $_defaultPageId = 0;


/** @var array holds several values from the default.ini */	
	private $_config      = array();
/** @var array set several values for Twig_Environment */	
	private $_aTwigEnv    = array();
/** @var array set several values for Twig_Loader */	
	private $_aTwigLoader = array();
/** @var string set icon extension */	
	private $_sExtension  = array();
/**
 * constructor used to import some application constants and objects
 */	
	public function __construct() 
	{
		// import global vars and objects
		if(!defined('ADMIN_REL')) { define('ADMIN_REL', WB_REL.'/'.ADMIN_DIRECTORY); }
		$this->_oApp        = (isset($GLOBALS['admin']) ? $GLOBALS['admin'] : $GLOBALS['wb']);
		$this->_oDb         = WbDatabase::getInstance();
		$this->_oReg        = WbAdaptor::getInstance();
		$this->_config      = $this->_aConfig = $this->getConfig((dirname(__FILE__)).'/default.ini');
		$this->_aTwigEnv    = $this->_config['twig-environment'];
		$this->_aTwigLoader = $this->_config['twig-loader-file'];
	}

	/**
	 * methode to update a var/value-pair into table
	 * @param integer $iPageId which page shall be updated
	 * @param string $sTable the pages table
	 * @param integer $iEntry 
	 * @return bool
	 */ 
	private function _updatePageCode($iPageId, $sTable, $iNewPageCode = null)
	{
		// if new Pagecode is missing then set the own page ID
		$entry = ( !isset($iNewPageCode) ? $iPageId : $iNewPageCode);
		$sql = 'UPDATE `'.$this->_oDb->TablePrefix.$sTable.'` '
		     . 'SET `page_code`='.$entry.', '
		     .     '`modified_when` = '.time().' '
		     . 'WHERE `page_id` = '.$iPageId;
		return (bool)$this->_oDb->query($sql);
	}

	/**
	 * compose the needed SQL statement
	 * @param integer $sLangKey
	 * @return database object with given SQL statement
	 */			
	private function _getLangInUsedDbResult ( $sLangKey='' ) 
	{
		$sql = 'SELECT DISTINCT `language`,'
		     .                 '`page_id`,`level`,`parent`,`root_parent`,`page_code`,`link`,'
		     .                 '`visibility`,`viewing_groups`,`viewing_users`,`position`,'
		     .                 '`page_title`,`tooltip` '
		     . 'FROM `'.$this->_oDb->TablePrefix.'pages` '
		     . 'WHERE `level`= \'0\' '
		     .   'AND `root_parent`=`page_id` '
		     .   'AND (`visibility`!=\'none\' '
		     .   'AND `visibility`!=\'hidden\') '
		     .   ( ($sLangKey!='') ? ' AND `language` = \''.$sLangKey.'\'' : '')
		     .   'GROUP BY `language` '
		     .   'ORDER BY `position`';
		return $this->_oDb->query($sql);
	}

	/**
	* 
	* search for pages with given page code and create a DB result object
	* @param integer Pagecode to search for
	* @return object result object or null on error
	*/
	private function _getPageCodeDbResult( $iPageCode )
	{
		$sql = 'SELECT `language`,'
		     .        '`page_id`,`level`,`parent`,`root_parent`,`page_code`,`link`,'
		     .        '`visibility`,`viewing_groups`,`viewing_users`,`position`,'
		     .        '`page_title`,`tooltip` '
		     .  'FROM `'.$this->_oDb->TablePrefix.'pages`'
		     .  'WHERE `page_code` = '.$iPageCode.' '
		     .  'ORDER BY `position`';
		return $this->_oDb->query($sql);
	}

	/**
	 * compose the needed SQL statement
	 * @param integer $sLangKey
	 * @return database object with given SQL statementt
	 */
	private function _getLangAddonsDbResult ( $sLangKey='' ) 
	{
		$sql = 'SELECT `directory`,`name`  FROM `'.$this->_oDb->TablePrefix.'addons` '
		     . 'WHERE `type` = \'language\' '
		     . ( ($sLangKey!='') ? ' AND `directory` = \''.$langKey.'\' ' : '')
		     . 'ORDER BY `directory`';
		return $this->_oDb->query($sql);
	}

	/**
	 * 
	 * @param integer $parent
	 * @return database object with given SQL statement
	 */
	private function _getPageListDbResult ( $parent ) 
	{
	    $sql = 'SELECT `language`,`tooltip`,'
		     .        '`page_id`,`page_title`,`menu_title`, `page_code`, `parent` '
		     . 'FROM `'.$this->_oDb->TablePrefix.'pages` '
		     . 'WHERE `parent` = '.$parent. ' '
		     . 'ORDER BY `position`';
		return $this->_oDb->query($sql);
	}

	private function _getPageCodeValues(  $iPageCode=0 )
	{
		$aRetval = array();
		if( ($oRes = $this->_getPageCodeDbResult($iPageCode)) )
		{
			while($page = $oRes->fetchRow(MYSQL_ASSOC))
			{
				if(!$this->_oApp->page_is_visible($page)) {continue;}
				$aRetval[$page['language']] = $page;
			}
		}
		return $aRetval;
	}

	private function _getPageList($parent, $this_page=0 )
	{
		static $entries = array();
		if( ($oLang = $this->_getPageListDbResult($parent)) )
		{
			while($value = $oLang->fetchRow(MYSQL_ASSOC))
			{
				if (( $value['page_id'] != $this_page ) )
				{
					$entries [$value['page_id']]['language'] = $value['language'];
					$entries [$value['page_id']]['menu_title'] = $value['menu_title'];
					$this->_getPageList($value['page_id'], $this_page );
				}
			}
		}
		return $entries;
	}


    protected function getConfig($sFilename)
    {
        if(is_readable($sFilename)){
            return parse_ini_file($sFilename, true);
        }else {
            return null;
        }
    }


	private function _getAllowedLanguagesFromAddons($sLangKey='')
	{
		$aLangAddons = array();
		if( ($oLang = $this->_getLangAddonsDbResult($sLangKey)) )
		{
			while( $aLang = $oLang->fetchRow(MYSQL_ASSOC) )
			{
				$aLangAddons[$aLang['directory']] = $aLang['name'];
			}
		}
		return $aLangAddons;
	}

	/**
	 * 
	 * 
	 * @param 
	 * @return array of first visible language pages with defined fields
	 */
	private function _getLanguagesDetailsInUsed ( $sLangKey='' ) 
	{
		$aRetval = array();
		if( ($oRes = $this->_getLangInUsedDbResult($sLangKey)) ) 
		{
			while($page = $oRes->fetchRow(MYSQL_ASSOC))
			{
				if(!$this->_oApp->page_is_visible($page)) {continue;}
				$aRetval[$page['language']] = $page;
			}
		}
		return $aRetval;
	}
	
	/**
	* m_MultiLingual_Lib::getLangMenuData()
	* 
	* @param mixed $config
	* @param mixed $oApp
	* @return
	*/
	private function _getLangMenuData ( ) 
	{
		$aTplData = array();
	// get root pages for all used languages
		$aAllowedRootLanguages = $this->_getLanguagesDetailsInUsed( );
		if(sizeof($aAllowedRootLanguages)>1)
		{
		// get all pages witch the same page_code
			$aMatchingPages = $this->_getPageCodeValues( $this->_oApp->page['page_code'] );
		// remove all pages from list with not avaliable languages
			$aPossibleMatchingPages = array_intersect_key($aMatchingPages, $aAllowedRootLanguages);
		// add Allowed root pages to possible matches
			$aAvailablePages = array_merge($aPossibleMatchingPages, $aAllowedRootLanguages);
			foreach ( $aAvailablePages AS $aPage)
			{
				$aTplData[] = array(
				    'sIconUrl'         => $this->_oReg->AppRel . 'modules/'
					                    . basename(dirname(__FILE__)) . '/',
				    'bCurrentLanguage' => (($aPage['language'] == $this->_oReg->Language) ? true : false),
				    'sTargetPageUrl'   => $this->_oReg->AppRel . $this->_oReg->PagesDir
				                        . trim($aAvailablePages[$aPage['language']]['link'],'/')
					                    . $this->_oReg->PageExtension,
				    'sPageTitle'       => $aAvailablePages[$aPage['language']]['page_title'],
				    'sFilename'        => strtolower($aAvailablePages[$aPage['language']]['language']),
				    'sImageType'       => $this->_sExtension,
					'sToolTip'         => $aAvailablePages[$aPage['language']]['tooltip']
				);
			}
		}
		return $aTplData;
	}

	/**
	* m_MultiLingual_Lib::getLangMenu()
	* 
	* @param mixed $config
	* @param mixed $oApp
	* @return
	*/
	private function _getLangMenuTwig ( ) 
	{
		$loader = new Twig_Loader_Filesystem( dirname(__FILE__).$this->_aTwigLoader['templates_dir'] );
		$twig   = new Twig_Environment( $loader );
		$data['aTargetList']   = $this->_getLangMenuData( );
		return $twig->render($this->_aTwigLoader['default_template'], $data);
	}

    private function _detectIE()
    {
        preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $aMatches);
        if (count($aMatches)>1){
          return true;
        }
        return false;
    }
    
	public function setExtension($sExtension = 'auto') 
	{   
		if($sExtension == 'auto' || $sExtension == 'svg') {
			$this->_sExtension = ($this->_detectIE() == true) ? 'png' : 'svg';
		} else {
			$this->_sExtension = 'png';
		}
		return;
	}
    
	public function getLangMenu() 
	{
		return $this->_getLangMenuTwig ( );
	}

	public function updateDefaultPagesCode (  ) 
	{
		$retVal  = false;
		$aLangs  = $this->_getLanguagesDetailsInUsed(  );
		$entries = $this->_getPageList( 0 );
// fill page_code with page_id for default_language
		while( list( $page_id, $val ) = each ( $entries ) )
		{
			if( $val['language'] == $this->_oReg->DefaultLanguage ) {
				if( ($retVal = $this->_updatePageCode((int)$page_id, 'pages', (int)$page_id ))==false ){ break;  }
			}
		}
		return $retVal;
	}
	
}
