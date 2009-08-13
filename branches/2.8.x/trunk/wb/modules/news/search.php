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

function news_search($func_vars) {
	extract($func_vars, EXTR_PREFIX_ALL, 'func');

	// how many lines of excerpt we want to have at most
	$max_excerpt_num = $func_default_max_excerpt;
	// do we want excerpt from comments?
	$excerpt_from_comments = true; // TODO: make this configurable
	$divider = ".";
	$result = false;

	// fetch all active news-posts (from active groups) in this section.
	$t = time();
	$table_posts = TABLE_PREFIX."mod_news_posts";
	$table_groups = TABLE_PREFIX."mod_news_groups";
	$query = $func_database->query("
		SELECT p.post_id, p.title, p.content_short, p.content_long, p.link, p.posted_when, p.posted_by
		FROM $table_posts AS p LEFT OUTER JOIN $table_groups AS g ON p.group_id = g.group_id
		WHERE p.section_id='$func_section_id' AND p.active = '1' AND ( g.active IS NULL OR g.active = '1' )
		AND (published_when = '0' OR published_when <= $t) AND (published_until = 0 OR published_until >= $t)
		ORDER BY p.post_id DESC
	");
	// now call print_excerpt() for every single post
	if($query->numRows() > 0) {
		while($res = $query->fetchRow()) {
			$text = $res['title'].$divider.$res['content_short'].$divider.$res['content_long'].$divider;
			// fetch comments and add to $text
			if($excerpt_from_comments) {
				$table = TABLE_PREFIX."mod_news_comments";
				$commentquery = $func_database->query("
					SELECT title, comment
					FROM $table
					WHERE post_id='{$res['post_id']}'
					ORDER BY commented_when ASC
				");
				if($commentquery->numRows() > 0) {
					while($c_res = $commentquery->fetchRow()) {
						$text .= $c_res['title'].$divider.$c_res['comment'].$divider;
					}
				}
			}
			$mod_vars = array(
				'page_link' => $res['link'], // use direct link to news-item
				'page_link_target' => "",
				'page_title' => $func_page_title,
				'page_description' => $res['title'], // use news-title as description
				'page_modified_when' => $res['posted_when'],
				'page_modified_by' => $res['posted_by'],
				'text' => $text,
				'max_excerpt_num' => $max_excerpt_num
			);
			if(print_excerpt2($mod_vars, $func_vars)) {
				$result = true;
			}
		}
	}
	
	// now fetch group-titles - ignore those without (active) postings
	$table_groups = TABLE_PREFIX."mod_news_groups";
	$table_posts = TABLE_PREFIX."mod_news_posts";
	$query = $func_database->query("
		SELECT DISTINCT g.title, g.group_id
		FROM $table_groups AS g INNER JOIN $table_posts AS p ON g.group_id = p.group_id
		WHERE g.section_id='$func_section_id' AND g.active = '1' AND p.active = '1'
	");
	// now call print_excerpt() for every single group, too
	if($query->numRows() > 0) {
		while($res = $query->fetchRow()) {
			$mod_vars = array(
				'page_link' => $func_page_link,
				'page_link_target' => "&g=".$res['group_id'],
				'page_title' => $func_page_title,
				'page_description' => $func_page_description,
				'page_modified_when' => $func_page_modified_when,
				'page_modified_by' => $func_page_modified_by,
				'text' => $res['title'].$divider,
				'max_excerpt_num' => $max_excerpt_num
			);
			if(print_excerpt2($mod_vars, $func_vars)) {
				$result = true;
			}
		}
	}
	return $result;
}

?>
