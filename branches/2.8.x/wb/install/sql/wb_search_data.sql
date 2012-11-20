-- phpMyAdmin SQL Dump
-- Date of creation: 2012-11-17 12:37am
-- Server Version: 5.1.41
--
-- initial data for table `{TABLE_PREFIX}search`
--
INSERT INTO `{TABLE_PREFIX}search` VALUES(1, 'header', '<h1>[TEXT_SEARCH]</h1>\r\n<form name="searchpage" action="[WB_URL]/search/index.php" method="get">\r\n<table cellpadding="3" cellspacing="0" border="0" style="width:100%; max-width:500px">\r\n<tr>\r\n<td>\r\n<input type="hidden" name="search_path" value="[SEARCH_PATH]" />\r\n<input type="hidden" name="referrer" value="[REFERRER]" />\r\n<input type="text" name="string" value="[SEARCH_STRING]" style="width: 100%;" />\r\n</td>\r\n<td width="100">\r\n<input type="submit" value="[TEXT_SEARCH]" style="width: 100%;" />\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan="2">\r\n<input type="radio" name="match" id="match_all" value="all"[ALL_CHECKED] />\r\n<label for="match_all">[TEXT_ALL_WORDS]</label>\r\n<input type="radio" name="match" id="match_any" value="any"[ANY_CHECKED] />\r\n<label for="match_any">[TEXT_ANY_WORDS]</label>\r\n<input type="radio" name="match" id="match_exact" value="exact"[EXACT_CHECKED] />\r\n<label for="match_exact">[TEXT_EXACT_MATCH]</label>\r\n</td>\r\n</tr>\r\n</table>\r\n</form>\r\n<hr />', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(2, 'footer', '', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(3, 'results_header', '<p>[TEXT_RESULTS_FOR] "<strong>[SEARCH_STRING]</strong>":</p>\r\n<div class="searchresults">', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(4, 'results_loop', '<h3 style="margin:10px 0 3px 0;"><a href="[LINK]">[TITLE]</a></h3>\r\n<div style="font-size:0.8em;">[TEXT_LAST_UPDATED_BY] [DISPLAY_NAME] [TEXT_ON] [DATE]</div>\r\n<p style="padding: 0 0 5px 0; margin: 2px 0 10px 0; border-bottom: 1px solid #777;">[DESCRIPTION].. [EXCERPT]</p>', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(5, 'results_footer', '</div>', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(6, 'no_results', '<p>[TEXT_NO_RESULTS]</p>', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(7, 'module_order', 'faqbaker,manual,wysiwyg', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(8, 'max_excerpt', '5', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(9, 'time_limit', '0', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(10, 'cfg_enable_old_search', 'true', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(11, 'cfg_search_keywords', 'true', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(12, 'cfg_search_description', 'true', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(13, 'cfg_show_description', 'true', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(14, 'cfg_enable_flush', 'true', '');
INSERT INTO `{TABLE_PREFIX}search` VALUES(15, 'template', '', '');
-- End of file