<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * InstallHelper.php
 *
 * @category     Core
 * @package      Core_package
 * @subpackage   Name of the subpackage if needed
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 19.09.2014
 * @deprecated   This class is deprecated since the ...
 * @description  xyz
 */
class InstallHelper {


/*
 Find all available languages in /language/ folder and build option list from
*/
    public static function getAvailableLanguages($sLanguageDirectory)
    {
        $aRetval = array();
        $sLangDir = rtrim(str_replace('\\', '/', $sLanguageDirectory), '/').'/';
        $aAvailableLanguages = preg_replace('/^.*\/([A-Z]{2})\.php$/iU', '\1', glob($sLangDir.'??.php'));
        sort($aAvailableLanguages, SORT_NATURAL);
        foreach ($aAvailableLanguages as $sLangCode) {
            if (is_readable($sLangDir.$sLangCode.'.php')) {
                if (($sContent = file_get_contents($sLangDir.$sLangCode.'.php', false, null, -1, 2048)) !== false) {
                    if (preg_match('/.*\s*\$language_name\s*=\s*([\'\"])([^\1]*)\1\s*;/siU', $sContent, $aMatches)) {
                        $aRetval[$sLangCode] = $aMatches[2];
                    }
                }
            }
        }
        return $aRetval;
    }

}

// end of class Helper
