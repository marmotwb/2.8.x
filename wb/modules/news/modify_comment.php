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

require('../../config.php');

// Get id
if(!isset($_GET['comment_id']) OR !is_numeric($_GET['comment_id'])) {
	header("Location: ".ADMIN_URL."/pages/index.php");
	exit(0);
} else {
	$comment_id = $_GET['comment_id'];
}

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

// Get header and footer
$query_content = $database->query("SELECT post_id,title,comment FROM ".TABLE_PREFIX."mod_news_comments WHERE comment_id = '$comment_id'");
$fetch_content = $query_content->fetchRow();

?>

<h2><?php echo $TEXT['MODIFY'].' '.$TEXT['COMMENT']; ?></h2>

<form name="modify" action="<?php echo WB_URL; ?>/modules/news/save_comment.php" method="post" style="margin: 0;">

<input type="hidden" name="section_id" value="<?php echo $section_id; ?>" />
<input type="hidden" name="page_id" value="<?php echo $page_id; ?>" />
<input type="hidden" name="post_id" value="<?php echo $fetch_content['post_id']; ?>" />
<input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>" />

<table class="row_a" cellpadding="2" cellspacing="0" border="0" width="100%">
<tr>
	<td width="80"><?php echo $TEXT['TITLE']; ?>:</td>
	<td>
		<input type="text" name="title" value="<?php echo (htmlspecialchars($fetch_content['title'])); ?>" style="width: 98%;" maxlength="255" />
	</td>
</tr>
<tr>
	<td valign="top"><?php echo $TEXT['COMMENT']; ?>:</td>
	<td>
		<textarea name="comment" rows="10" cols="1" style="width: 98%; height: 150px;"><?php echo (htmlspecialchars($fetch_content['comment'])); ?></textarea>
	</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td align="left">
		<input name="save" type="submit" value="<?php echo $TEXT['SAVE']; ?>" style="width: 100px; margin-top: 5px;" />
	</td>
	<td align="right">
		<input type="button" value="<?php echo $TEXT['CANCEL']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/news/modify_post.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php echo $section_id; ?>&amp;post_id=<?php echo $fetch_content['post_id']; ?>';" style="width: 100px; margin-top: 5px;" />
	</td>
</tr>
</table>
</form>

<?php

// Print admin footer
$admin->print_footer();

?>