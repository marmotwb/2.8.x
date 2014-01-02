<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * OutputFilterApi.php
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
 * @since        File available since 25.12.2013
 * @deprecated   This file is deprecated since the  ...
 * @description xyz
 */
function OutputFilterApi($sFilterName, $sContent)
{
    $oReg = WbAdaptor::getInstance();
    $sFilterDir = __DIR__.'/filters/filter';
    if (!preg_match('/^[a-z][a-z0-9\-]*$/si', $sFilterName)) {
        return $sContent;
    }
    if (is_readable($sFilterDir.$sFilterName.$oReg->PageExtension)) {
        require_once($sFilterDir.$sFilterName.$oReg->PageExtension);
        $sFilterFunc = 'doFilter'.$sFilterName;
        $sContent = $sFilterFunc($sContent);
    }
    return $sContent;
}

