<?php
/**
 * The new 'info.ini' is mandatory from 2.8.4 !!!
 * This file 'info-php' is for backward compatibility only!!!!!
 * From 2.8.4 new core methods will no longer use the old vars from info.php!
 * It will be removed at least at 1th of June 2015 !!!!
 */
    if (!defined('SYSTEM_RUN')) die('illegal access!');
    $aX = UpgradeHelper::convInfoIni2InfoPhp(__DIR__);
    if ($aX) {
        $sPrefix = array_shift($aX);
        extract($aX, EXTR_PREFIX_ALL, $sPrefix);
    } else {
        throw new AppException('error on converting values from '.basename(__DIR__).'/info.ini');
    }

