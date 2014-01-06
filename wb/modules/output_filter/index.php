<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @author          Christian Sommer, WB-Project, Werner v.d. Decken
 * @copyright       2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.4
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
require_once( dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
if(!defined('WB_PATH')) { throw new IllegalFileException(); }
/* -------------------------------------------------------- */

/* ************************************************************************** */
/**
 * execute the frontend output filter to modify email addresses
 * @param string $sContent actual content
 * @return string modified content
 */
	function executeFrontendOutputFilter($sContent) {
		// get output filter settings from database
		$filter_settings = getOutputFilterSettings();
		$sFilterDirectory = str_replace('\\', '/', __DIR__).'/filters/';
		$output_filter_mode = 0;
		$output_filter_mode |= ($filter_settings['email_filter'] * pow(2, 0));  // n | 2^0
		$output_filter_mode |= ($filter_settings['mailto_filter'] * pow(2, 1)); // n | 2^1
		define('OUTPUT_FILTER_AT_REPLACEMENT', $filter_settings['at_replacement']);
		define('OUTPUT_FILTER_DOT_REPLACEMENT', $filter_settings['dot_replacement']);
        if (!function_exists('OutputFilterApi')) {
            require (__DIR__.'/OutputFilterApi.php');
        }
/* ### fixed default filters ################################################ */
        $sContent = OutputFilterApi('ReplaceSysvar', $sContent);
        $sContent = OutputFilterApi('WbLink', $sContent);
/* ************************************************************************** */
/* *** from here insert requests of individual variable filter ************** */

/* ### filter type: execute droplets filter ################################# */
        $sContent = OutputFilterApi('Droplets', $sContent);
/* ### filter type: protect email addresses ################################# */
		if( ($output_filter_mode & pow(2, 0)) || ($output_filter_mode & pow(2, 1)) ) {
			if (file_exists($sFilterDirectory.'filterEmail.php')) {
				require_once($sFilterDirectory.'filterEmail.php');
				$sContent = doFilterEmail($sContent, $output_filter_mode);
			}
		}
/* ### filter type: make use of Thorn's OutputFilterDashboard ############### */
        if($filter_settings['opf'] == 1){
            $sContent = OutputFilterApi('OpF', $sContent);
        }

/* *** end of individual variable filter ************************************ */
/* ************************************************************************** */
/* ### fixed default filters ################################################ */
        $sContent = OutputFilterApi('ReplaceSysvar', $sContent);
        $sContent = OutputFilterApi('WbLink', $sContent);
        if($filter_settings['sys_rel'] == 1){
            $sContent = OutputFilterApi('RelUrl', $sContent);
		}
        $sContent = OutputFilterApi('CssToHead', $sContent);
/* ### end of filters ####################################################### */
		return $sContent;
	}
/* ************************************************************************** */
/**
 * function to read the current filter settings
 * @global object $database
 * @global object $admin
 * @param void
 * @return array contains all settings
 */
	function getOutputFilterSettings() {
        $oDb = WbDatabase::getInstance();
	// set default values
		$settings = array(
			'sys_rel'         => 0,
            'opf'             => 0,
			'email_filter'    => 0,
			'mailto_filter'   => 0,
			'at_replacement'  => '(at)',
			'dot_replacement' => '(dot)'
		);
	// be sure field 'sys_rel' is in table
		$oDb->field_add( $oDb->TablePrefix.'mod_output_filter', 'sys_rel', 'INT NOT NULL DEFAULT \'0\' FIRST');
	// request settings from database
		$sql = 'SELECT * FROM `'.$oDb->TablePrefix.'mod_output_filter` ';
		if(($res = $oDb->doQuery($sql))) {
			if(($rec = $res->fetchRow(MYSQL_ASSOC))) {
				$settings = $rec;
			}
		}
	// return array with filter settings
		return $settings;
	}
/* ************************************************************************** */
