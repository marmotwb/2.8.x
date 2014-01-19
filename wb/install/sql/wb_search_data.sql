-- phpMyAdmin SQL Dump
-- Date of creation: 2012-11-17 12:37am
-- Server Version: 5.1.41
-- Revision     $Revision$
-- Link         $HeadURL$
-- Date of modified $Date$
-- initial data for table `{TABLE_PREFIX}search`
--
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='header',
	`value`='<h1>[TEXT_SEARCH]</h1>\n<form name="searchpage" action="[WB_URL]/search/index.php" method="get">\n<table cellpadding="3" cellspacing="0" border="0" style="width:100%; max-width:500px">\n<tr>\n<td>\n<input type="hidden" name="search_path" value="[SEARCH_PATH]" />\n<input type="hidden" name="referrer" value="[REFERRER_ID]" />\n<input type="text" name="string" value="[SEARCH_STRING]" style="width: 100%;" />\n</td>\n<td width="100">\n<input type="submit" value="[TEXT_SEARCH]" style="width: 100%;" />\n</td>\n</tr>\n<tr>\n<td colspan="2">\n<input type="radio" name="match" id="match_all" value="all"[ALL_CHECKED] />\n<label for="match_all">[TEXT_ALL_WORDS]</label>\n<input type="radio" name="match" id="match_any" value="any"[ANY_CHECKED] />\n<label for="match_any">[TEXT_ANY_WORDS]</label>\n<input type="radio" name="match" id="match_exact" value="exact"[EXACT_CHECKED] />\n<label for="match_exact">[TEXT_EXACT_MATCH]</label>\n</td>\n</tr>\n</table>\n</form>\n<hr />',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='footer',
	`value`='',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='results_header',
	`value`='<p>[TEXT_RESULTS_FOR] <strong>[SEARCH_STRING]</strong>:</p>\n<div class="searchresults">',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='results_loop',
	`value`='<h3 style="margin:10px 0 3px 0;"><a href="[LINK]">[TITLE]</a></h3>\n<div style="font-size:0.8em;">[TEXT_LAST_UPDATED_BY] [DISPLAY_NAME] [TEXT_ON] [DATE]</div>\n<p style="padding: 0 0 5px 0; margin: 2px 0 10px 0; border-bottom: 1px solid #777;">[DESCRIPTION].. [EXCERPT]</p>',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='results_footer',
	`value`='</div>',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='no_results',
	`value`='<p>[TEXT_NO_RESULTS]</p>',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='module_order',
	`value`='wysiwyg',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='max_excerpt',
	`value`='5',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='time_limit',
	`value`='0',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='cfg_enable_old_search',
	`value`='true',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='cfg_search_keywords',
	`value`='true',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='cfg_search_description',
	`value`='true',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='cfg_show_description',
	`value`='true',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='cfg_enable_flush',
	`value`='true',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='template',
	`value`='',
	`extra`='';
-- End of file