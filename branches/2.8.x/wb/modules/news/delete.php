<?php
/**
 *
 * @category        modules
 * @package         news
 * @author          WebsiteBaker Project
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Must include code to stop this file being access directly
/* -------------------------------------------------------- */
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<head><title>Access denied</title></head><body><h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2></body></html>');
}
/* -------------------------------------------------------- */

//get and remove all php files created for the news section
$query_details = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_news_posts WHERE section_id = '$section_id'");
if($query_details->numRows() > 0) {
	while($link = $query_details->fetchRow()) {
		if(is_writable(WB_PATH.PAGES_DIRECTORY.$link['link'].PAGE_EXTENSION)) {
		unlink(WB_PATH.PAGES_DIRECTORY.$link['link'].PAGE_EXTENSION);
		}
	}
}
//check to see if any other sections are part of the news page, if only 1 news is there delete it
$query_details = $database->query("SELECT * FROM ".TABLE_PREFIX."sections WHERE page_id = '$page_id'");
if($query_details->numRows() == 1) {
	$query_details2 = $database->query("SELECT * FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id'");
	$link = $query_details2->fetchRow();
	if(is_writable(WB_PATH.PAGES_DIRECTORY.$link['link'].PAGE_EXTENSION)) {
		unlink(WB_PATH.PAGES_DIRECTORY.$link['link'].PAGE_EXTENSION);
	}
}

$database->query("DELETE FROM ".TABLE_PREFIX."mod_news_posts WHERE section_id = '$section_id'");
$database->query("DELETE FROM ".TABLE_PREFIX."mod_news_groups WHERE section_id = '$section_id'");
$database->query("DELETE FROM ".TABLE_PREFIX."mod_news_comments WHERE section_id = '$section_id'");
$database->query("DELETE FROM ".TABLE_PREFIX."mod_news_settings WHERE section_id = '$section_id'");
