<?php
/**
 *
 * @category        modules
 * @package         news
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}

	$header      = '<table class="loop-header">'.PHP_EOL
	             . '  <tbody>'.PHP_EOL;
	$post_loop   = '    <tr class="post-top">'.PHP_EOL
	             . '      <td class="post-title"><a href="[LINK]">[TITLE]</a></td>'.PHP_EOL
	             . '      <td class=\"post-date\">[CREATED_DATE], [CREATED_TIME]</td>'.PHP_EOL
	             . '    </tr>'.PHP_EOL
	             . '    <tr>'.PHP_EOL
	             . '      <td class="post-short" colspan="2">'.PHP_EOL
	             . '        <span style="visibility:[SHOW_READ_MORE];">'.PHP_EOL
	             . '         <a href="[LINK]">[TEXT_READ_MORE]</a>'.PHP_EOL
	             . '        </span>'.PHP_EOL
	             . '      </td>'.PHP_EOL
	             . '    </tr>';
	$footer      = '  </tbody>'.PHP_EOL
	             . '</table>'.PHP_EOL
	             . '<table class="page-header" style="display: [DISPLAY_PREVIOUS_NEXT_LINKS]>'.PHP_EOL
	             . '  <tbody>'.PHP_EOL
	             . '    <tr>'.PHP_EOL
	             . '      <td class="page-left">[PREVIOUS_PAGE_LINK]</td>'.PHP_EOL
	             . '      <td class="page-center">[OF]</td>'.PHP_EOL
	             . '      <td class="page-right">[NEXT_PAGE_LINK]</td>'.PHP_EOL
	             . '    </tr>'.PHP_EOL
	             . '  </tbody>'.PHP_EOL
	             . '</table>'.PHP_EOL;
	$post_header = '<table class="post-header">'.PHP_EOL
	             . '  <tbody>'.PHP_EOL
	             . '    <tr>'.PHP_EOL
	             . '      <td><h1>[TITLE]</h1></td>'.PHP_EOL
	             . '      <td rowspan="3" style="display: [DISPLAY_IMAGE]">[GROUP_IMAGE]</td>'.PHP_EOL
	             . '    </tr>'.PHP_EOL
	             . '    <tr>'.PHP_EOL
	             . '      <td class="public-info"><b>[TEXT_POSTED_BY] [DISPLAY_NAME] ([USERNAME]) [TEXT_ON] [PUBLISHED_DATE]</b></td>'.PHP_EOL
	             . '    </tr>'.PHP_EOL
	             . '    <tr style="display: [DISPLAY_GROUP]">'.PHP_EOL
	             . '      <td class="group-page"><a href="[BACK]">[PAGE_TITLE]</a> &gt;&gt; <a href="[BACK]?g=[GROUP_ID]">[GROUP_TITLE]</a></td>'.PHP_EOL
	             . '    </tr>'.PHP_EOL
	             . '  </tbody>'.PHP_EOL
	             . '</table>'.PHP_EOL;
	$post_footer = '<p>[TEXT_LAST_CHANGED]: [MODI_DATE] [TEXT_AT] [MODI_TIME]</p>'.PHP_EOL
	             . '<a href=\"[BACK]\">[TEXT_BACK]</a>'.PHP_EOL;

	$comments_header  = ''.PHP_EOL
	                  . '<h3>[TEXT_COMMENTS]</h3>'.PHP_EOL
	                  . '<table class="comment-header">'.PHP_EOL
	                  . '  <tbody>'.PHP_EOL;
	$comments_loop    = ''.PHP_EOL
	                  . '    <tr>'.PHP_EOL
	                  . '      <td class="comment_title">[TITLE]</td>'.PHP_EOL
	                  . '      <td class="comment_info">[TEXT_BY] [DISPLAY_NAME] [TEXT_ON] [DATE] [TEXT_AT] [TIME]</td>'.PHP_EOL
	                  . '    </tr>'.PHP_EOL
	                  . '    <tr>'.PHP_EOL
	                  . '      <td colspan="2" class="comment-text">[COMMENT]</td>'.PHP_EOL
	                  . '    </tr>'.PHP_EOL
	                  . ''.PHP_EOL;
	$comments_footer  = ''.PHP_EOL
	                  . '  </tbody>'.PHP_EOL
	                  . '</table>'.PHP_EOL
	                  . '<br /><a href=\"[ADD_COMMENT_URL]\">[TEXT_ADD_COMMENT]</a>'.PHP_EOL
	                  . ''.PHP_EOL;
	$comments_page    = ''.PHP_EOL
	                  . '<h2>[TEXT_COMMENT]</h2>'.PHP_EOL
	                  . '<h3>[POST_TITLE]</h3><br />'.PHP_EOL
	                  . ''.PHP_EOL;

$commenting = 'none';
$use_captcha = true;

$sql = 'INSERT INTO `'.TABLE_PREFIX.'mod_news_settings` '
     . 'SET `section_id`='.$section_id.', '
     .     '`page_id`='.$page_id.', '
     .     '`header`=\''.$header.'\', '
     .     '`post_loop`=\''.$post_loop.'\', '
     .     '`footer`=\''.$footer.'\', '
     .     '`post_header`=\''.$post_header.'\', '
     .     '`post_footer`=\''.$post_footer.'\', '
     .     '`comments_header`=\''.$comments_header.'\', '
     .     '`comments_loop`=\''.$comments_loop.'\', '
     .     '`comments_footer`=\''.$comments_footer.'\', '
     .     '`comments_page`=\''.$comments_page.'\', '
     .     '`commenting`=\'none\', '
     .     '`use_captcha`=1 ';
$database->query($sql);
