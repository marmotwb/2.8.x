<?php
/**
 *
 * @category        admin
 * @package         media
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}
//if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }
$modulePath = dirname(__FILE__);

/*
// Get image
	$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
	$image = (isset(${$requestMethod}['img']) ? ${$requestMethod}['img'] : '');
print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
print_r( $_GET ); print '</pre>';  die(); // flush ();sleep(10);
*/

if (isset($_GET['img']) && isset($_GET['t'])) {
    if(!class_exists('PhpThumbFactory', false)){ include($modulePath.'/inc/ThumbLib.inc.php'); }
//	require_once($modulePath.'/inc/ThumbLib.inc.php');
	$image = addslashes($_GET['img']);
	$type = intval($_GET['t']);
//	$media = WB_PATH.MEDIA_DIRECTORY.'/';
	$thumb = PhpThumbFactory::create(WB_PATH.MEDIA_DIRECTORY.'/'.$image);

	if ($type == 1) {
        $thumb->adaptiveResize(20,20);
//        $thumb->resize(30,30);
//		$thumb->cropFromCenter(80,50);
// 		$thumb->resizePercent(40);
	} else {
//    	$thumb->adaptiveResize(250,250);
 		$thumb->resizePercent(30);
//		$thumb->cropFromCenter(80,50);
	}
	$thumb->show();

 }
