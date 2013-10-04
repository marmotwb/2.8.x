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
	`value`='<h1>[TEXT_SEARCH]</h1>\r\n<form name="searchpage" action="[WB_URL]/search/index.php" method="get">\r\n<table cellpadding="3" cellspacing="0" border="0" style="width:100%; max-width:500px">\r\n<tr>\r\n<td>\r\n<input type="hidden" name="search_path" value="[SEARCH_PATH]" />\r\n<input type="hidden" name="referrer" value="[REFERRER_ID]" />\r\n<input type="text" name="string" value="[SEARCH_STRING]" style="width: 100%;" />\r\n</td>\r\n<td width="100">\r\n<input type="submit" value="[TEXT_SEARCH]" style="width: 100%;" />\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan="2">\r\n<input type="radio" name="match" id="match_all" value="all"[ALL_CHECKED] />\r\n<label for="match_all">[TEXT_ALL_WORDS]</label>\r\n<input type="radio" name="match" id="match_any" value="any"[ANY_CHECKED] />\r\n<label for="match_any">[TEXT_ANY_WORDS]</label>\r\n<input type="radio" name="match" id="match_exact" value="exact"[EXACT_CHECKED] />\r\n<label for="match_exact">[TEXT_EXACT_MATCH]</label>\r\n</td>\r\n</tr>\r\n</table>\r\n</form>\r\n<hr />',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='footer',
	`value`='',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='results_header',
	`value`='<p>[TEXT_RESULTS_FOR] <strong>[SEARCH_STRING]</strong>:</p>\r\n<div class="searchresults">',
	`extra`='';
INSERT INTO `{TABLE_PREFIX}search` SET
	`name`='results_loop',
	`value`='<h3 style="margin:10px 0 3px 0;"><a href="[LINK]">[TITLE]</a></h3>\r\n<div style="font-size:0.8em;">[TEXT_LAST_UPDATED_BY] [DISPLAY_NAME] [TEXT_ON] [DATE]</div>\r\n<p style="padding: 0 0 5px 0; margin: 2px 0 10px 0; border-bottom: 1px solid #777;">[DESCRIPTION].. [EXCERPT]</p>',
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
	`value`='faqbaker,manual,wysiwyg',
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