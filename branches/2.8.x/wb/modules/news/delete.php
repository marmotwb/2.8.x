<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

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

?>