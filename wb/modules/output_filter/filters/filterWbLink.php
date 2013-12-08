<?php


/**
 * ParseWbLink
 * @param string $sContent
 * @return array details of all found Wblink-Tags
 * @description parse 
 */
	function _parseWbLink(&$sContent)
	{
		$aResults = array();
		$aMatches = array();
		$sPattern = '/\[wblink([0-9]+)(\#([^\?]+))?(\?([^\]]+))?\]/is';
		if (preg_match_all($sPattern, $sContent, $aMatches, PREG_SET_ORDER)) {
			foreach ($aMatches as $aTag) {
				$aResults[$aTag[0]] = array();
				$aResults[$aTag[0]]['pageid'] = $aTag[1];
				$aResults[$aTag[0]]['ancor']  = (isset($aTag[3]) ? $aTag[3] : '');
				$aResults[$aTag[0]]['params'] = array();
				$aTag[5] = (isset($aTag[5]) ? $aTag[5] : '');
				$aTmpArgs = preg_split('/&amp;|&/i', $aTag[5], -1, PREG_SPLIT_NO_EMPTY);
				foreach ($aTmpArgs as $sArgument) {
					$aArgs = explode('=', $sArgument);
					$aResults[$aTag[0]]['params'][$aArgs[0]] = $aArgs[1];
				}
			}
		}
		return $aResults;
	}
/*
 * @param  string $content : contains the full content of the current page
 * @return string
 * @description replace all "[wblink{page_id}{?addon=n&item=n...}]" with real links to accessfiles<br />
 *     All modules must offer the class 'WbLink'(implementing 'WbLinkAbstract'), to be taken into consideration.
 */
	function doFilterWbLink($sContent)
	{
		$oDb  = WbDatabase::getInstance();
		$oReg = WbAdaptor::getInstance();
		$aReplaceList = array();
		$aTagList = _parseWblink($sContent);
		// iterate list if replacements are available
		foreach ($aTagList as $sKey=>$aTag) {
		// set link on failure ('#' means, still stay on current page)
			$aReplaceList[$sKey] = '#';
		// sanitize possible ancor
			$aTag['ancor'] = ($aTag['ancor'] == '' ? '' : '#'.$aTag['ancor']);
		// handle normal pages links
			if (sizeof($aTag['params']) == 0) {
				$sql = 'SELECT `link` FROM `'.$oDb->TablePrefix.'pages` WHERE `page_id` = '.(int)$aTag['pageid'];
				if(($sLink = $oDb->get_one($sql)))
				{
					$sLink = trim(str_replace('\\', '/', $sLink), '/');
				// test if valid accessfile is available
					if(is_readable($oReg->AppPath.$oReg->PagesDir.$sLink.$oReg->PageExtension))
					{
					// create absolute URL
						$aReplaceList[$sKey] = $oReg->AppUrl.$oReg->PagesDir.$sLink.$oReg->PageExtension.$aTag['ancor'];
					}
				}
		// handle links of modules
			} else { 
			// build name of the needed class
				$sClass = 'm_'.$aTag['params']['addon'].'_WbLink';
			// remove addon name from replacement array
//				unset($aReplacement['Args']['addon']);
				if(class_exists($sClass))
				{
				// instantiate class
					$oWbLink = new $sClass();
				// the class must implement the interface
					if($oWbLink instanceof WbLinkAbstract)
					{
						$aTag['params']['pageid'] = $aTag['pageid'];
						$aTag['params']['ancor']  = $aTag['ancor'];
					// create real link from replacement data
						$aReplaceList[$sKey] = $oWbLink->makeLinkFromTag($aTag['params']);
					}
				}
			}
		// extract indexes into a new array
			$aSearchList = array_keys($aReplaceList);
		// replace all identified wblink-tags in content
			$sContent = str_replace($aSearchList, $aReplaceList, $sContent);
		}
		return $sContent;
	}


//		$oDb  = WbDatabase::getInstance();
//		$oReg = WbAdaptor::getInstance();
//		$aReplaceList = array();
//		$sPattern = '/\[wblink([0-9]+)\??([^\]]*)\]/is';
//		if(preg_match_all($sPattern,$sContent,$aMatches))
//		{
//		// iterate through all found matches
//			foreach($aMatches[0] as $iKey => $sKeyString )
//			{
//				$aReplaceList[$sKeyString] = array();
//			// use original Tag to save PageId
//				$aReplaceList[$sKeyString]['PageId'] = $aMatches[1][$iKey];
//			// if there are additional arguments given
//				if($aMatches[2][$iKey])
//				{
//					$aReplaceList[$sKeyString]['Args'] = array();
//					$aArgs = preg_split('/&amp;|&/i', $aMatches[2][$iKey], -1, PREG_SPLIT_NO_EMPTY);
//					foreach($aArgs as $sArgument)
//					{
//						$aTmp = explode('=', $sArgument);
//						$aReplaceList[$sKeyString]['Args'][$aTmp[0]] = $aTmp[1];
//					}
//				}
//			}
//			if(sizeof($aReplaceList) > 0)
//			{ // iterate list if replacements are available
//				foreach($aReplaceList as $sKey => $aReplacement)
//				{
//				// set link on failure ('#' means, still stay on current page)
//					$aReplaceList[$sKey] = '#';
//				// handle normal pages links
//					if(!isset($aReplacement['Args']))
//					{
//					// read corresponding link from table 'pages'
//						$sql = 'SELECT `link` FROM `'.$oDb->TablePrefix.'pages` WHERE `page_id` = '.(int)$aReplacement['PageId'];
//						if(($sLink = $oDb->get_one($sql)))
//						{
//							$sLink = trim(str_replace('\\', '/', $sLink), '/');
//						// test if valid accessfile is available
//							if(is_readable($oReg->AppPath.$oReg->PagesDir.$sLink.$oReg->PageExtension))
//							{
//							// create absolute URL
//								$aReplaceList[$sKey] = $oReg->AppUrl.$oReg->PagesDir.$sLink.$oReg->PageExtension;
//							}
//						}
//					// handle links of modules
//					}else
//					{
//					// build name of the needed class
//						$sClass = 'm_'.$aReplacement['Args']['addon'].'_WbLink';
//					// remove addon name from replacement array
//						unset($aReplacement['Args']['addon']);
//						if(class_exists($sClass))
//						{
//						// instantiate class
//							$oWbLink = new $sClass();
//						// the class must implement the interface
//							if($oWbLink instanceof WbLinkAbstract)
//							{
//							// create real link from replacement data
//								$aReplaceList[$sKey] = $oWbLink->makeLinkFromTag($aReplacement['Args']);
//							}
//						}
//					}
//				}
//			// extract indexes into a new array
//				$aSearchList = array_keys($aReplaceList);
//			// replace all identified wblink-tags in content
//				$sContent = str_replace($aSearchList, $aReplaceList, $sContent);
//			}
//		}
//		return $sContent;
//	}
