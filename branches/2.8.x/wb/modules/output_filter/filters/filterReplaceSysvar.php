<?php
/**
 * doFilterReplaceSysvar
 * @param string to modify
 * @return string
 * Convert the {SYSVAR:xxxx} Placeholders into their real value
 */
	function doFilterReplaceSysvar($sContent) {
        $oReg = WbAdaptor::getInstance();
        $aSearches = array();
        $aReplacements = array();
        // search for all SYSVARs
        if (preg_match_all('/\{SYSVAR\:([^\}]+)\}/sU', $sContent, $aMatches)) {
            $aMatches = array_unique($aMatches[1], SORT_STRING);
            foreach ($aMatches as $sMatch) {
                $sTmp = '';
                $aTmp = preg_split('/\./', $sMatch);
                foreach ($aTmp as $sSysvar) {
                    if (!isset($oReg->{$sSysvar})) {
                        $sTmp = '';
                        break;
                    }
                    $sTmp .= $oReg->{$sSysvar};
                }
                if ($sTmp) {
                    $aSearches[] = '{SYSVAR:'.$sMatch.'}';
                    $aReplacements[] = $sTmp;
                }
            }
            $sContent = str_replace($aSearches, $aReplacements, $sContent);
        }
		return $sContent;
	}
