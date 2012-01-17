<?php
/**
 *
 * @category        modules
 * @package         wysiwyg
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */
$sMediaUrl = WB_URL.MEDIA_DIRECTORY;
// Get content 
$content = '';
$sql = 'SELECT `content` FROM `'.TABLE_PREFIX.'mod_wysiwyg` WHERE `section_id`='.(int)$section_id;
if( ($content = $database->get_one($sql)) ) {
	$content = str_replace('{SYSVAR:MEDIA_REL}', $sMediaUrl, $content );
}
echo $content;
