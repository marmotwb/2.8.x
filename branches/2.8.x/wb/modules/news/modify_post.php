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

$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require($config_file);
}

// $admin_header = true;
// Tells script to update when this page was last updated
$update_when_modified = false;
// show the info banner
$print_info_banner = true;
// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

$backlink = ADMIN_URL.'/pages/modify.php?page_id='.(int)$page_id;

// Make news post access files dir
if(!function_exists('make_dir')) {require(WB_PATH.'/framework/functions.php');}

if(!make_dir(WB_PATH.PAGES_DIRECTORY.'/posts')) {
	$admin->print_error($MESSAGE['GENERIC_BAD_PERMISSIONS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id );
} else {
    
    $post_id = intval($admin->checkIDKEY('post_id', false, 'GET'));
    if (!$post_id) {
    	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], $backlink);
    }
    $aPostRec = 
        array(
            'post_id'         => 0,
            'section_id'      => 0,
            'page_id'         => 0,
            'group_id'        => 0,
            'active'          => 0,
            'position'        => 0,
            'title'           => '',
            'link'            => '',
            'content_short'   => '',
            'content_long'    => '',
            'commenting'      => '',
            'created_when'    => 0,
            'created_by'      => 0,
            'published_when'  => 0,
            'published_until' => 0,
            'posted_when'     => 0,
            'posted_by'       => 0
    );
    $sMediaUrl = WB_URL.MEDIA_DIRECTORY;
    // Get header and footer
    $sql = 'SELECT * FROM `'.TABLE_PREFIX.'mod_news_posts` WHERE `post_id`='.(int)$post_id;
    if (($oPostRes = $database->query($sql))) {
    	$aPostRec = $oPostRes->fetchRow(MYSQL_ASSOC);
        $sFilterApi = WB_PATH.'/modules/output_filter/OutputFilterApi.php';
        if (is_readable($sFilterApi)) {
            require_once($sFilterApi);
            $aPostRec['content_short'] = OutputFilterApi('ReplaceSysvar', $aPostRec['content_short']);
            $aPostRec['content_long'] = OutputFilterApi('ReplaceSysvar', $aPostRec['content_long']);
        }
    }
    //$query_content = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_news_posts WHERE post_id = '$post_id'");
    
    //print '<pre style="text-align:left;color:#000;padding:1em;"><strong>function '.__FUNCTION__.'( '.$post_id.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />'; 
    //print_r( $fetch_content['content_short'] ); print '</pre>'; // flush ();sleep(10); die();
    if(!isset($wysiwyg_editor_loaded)) {
        $wysiwyg_editor_loaded=true;
    	if (!defined('WYSIWYG_EDITOR') OR WYSIWYG_EDITOR=="none" OR !file_exists(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php')) {
    		function show_wysiwyg_editor($name,$id,$content,$width,$height) {
    			echo '<textarea name="'.$name.'" id="'.$id.'" rows="10" cols="1" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
    		}
    	} else {
    		$id_list=array("short","long");
    		require(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php');
    	}
    }
    
    // include jscalendar-setup
    $jscal_use_time = true; // whether to use a clock, too
    require_once(WB_PATH."/include/jscalendar/wb-setup.php");
    ?>
    <h2><?php echo $TEXT['ADD'].'/'.$TEXT['MODIFY'].' '.$TEXT['POST']; ?></h2>
    <div class="jsadmin jcalendar hide"></div> 
    <form name="modify" action="<?php echo WB_URL; ?>/modules/news/save_post.php" method="post" style="margin: 0;">
    
    <input type="hidden" name="section_id" value="<?php echo $section_id; ?>" />
    <input type="hidden" name="page_id" value="<?php echo $page_id; ?>" />
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
    <input type="hidden" name="link" value="<?php echo $aPostRec['link']; ?>" />
    <?php echo $admin->getFTAN(); ?>
    
    <table class="row_a" cellpadding="2" cellspacing="0" width="100%">
    <tr>
    	<td><?php echo $TEXT['TITLE']; ?>:</td>
    	<td width="80%">
    		<input type="text" name="title" value="<?php echo (htmlspecialchars($aPostRec['title'])); ?>" style="width: 98%;" maxlength="255" />
    	</td>
    </tr>
    <tr>
    	<td><?php echo $TEXT['GROUP']; ?>:</td>
    	<td>
    		<select name="group" style="width: 100%;">
    			<option value="0"><?php echo $TEXT['NONE']; ?></option>
    			<?php
    			$query = $database->query("SELECT group_id,title FROM ".TABLE_PREFIX."mod_news_groups WHERE section_id = '$section_id' ORDER BY position ASC");
    			if($query->numRows() > 0) {
    				// Loop through groups
    				while($group = $query->fetchRow(MYSQL_ASSOC)) {
    					?>
    					<option value="<?php echo $group['group_id']; ?>"<?php if($aPostRec['group_id'] == $group['group_id']) { echo ' selected="selected"'; } ?>><?php echo $group['title']; ?></option>
    					<?php
    				}
    			}
    			?>
    		</select>
    	</td>
    </tr>
    <tr>
    	<td><?php echo $TEXT['COMMENTING']; ?>:</td>
    	<td>
    		<select name="commenting" style="width: 100%;">
    			<option value="none"><?php echo $TEXT['DISABLED']; ?></option>
    			<option value="public" <?php if($aPostRec['commenting'] == 'public') { echo ' selected="selected"'; } ?>><?php echo $TEXT['PUBLIC']; ?></option>
    			<option value="private" <?php if($aPostRec['commenting'] == 'private') { echo ' selected="selected"'; } ?>><?php echo $TEXT['PRIVATE']; ?></option>
    		</select>
    	</td>
    </tr>
    <tr>
    	<td><?php echo $TEXT['ACTIVE']; ?>:</td>
    	<td>
    		<input type="radio" name="active" id="active_true" value="1" <?php if($aPostRec['active'] == 1) { echo ' checked="checked"'; } ?> />
    		<a href="#" onclick="javascript: document.getElementById('active_true').checked = true;">
    		<?php echo $TEXT['YES']; ?>
    		</a>
    		&nbsp;
    		<input type="radio" name="active" id="active_false" value="0" <?php if($aPostRec['active'] == 0) { echo ' checked="checked"'; } ?> />
    		<a href="#" onclick="javascript: document.getElementById('active_false').checked = true;">
    		<?php echo $TEXT['NO']; ?>
    		</a>
    	</td>
    </tr>
    <tr>
    	<td><?php echo $TEXT['PUBL_START_DATE']; ?>:</td>
    	<td>
    	<input type="text" id="publishdate" name="publishdate" value="<?php if($aPostRec['published_when']==0) print date($jscal_format, strtotime((date('Y-m-d H:i')))); else print date($jscal_format, $aPostRec['published_when']);?>" style="width: 120px;" />
    	<img src="<?php echo THEME_URL ?>/images/clock_16.png" id="publishdate_trigger" style="cursor: pointer;" title="<?php echo $TEXT['CALENDAR']; ?>" alt="<?php echo $TEXT['CALENDAR']; ?>" onmouseover="this.style.background='lightgrey';" onmouseout="this.style.background=''" />
    	<img src="<?php echo THEME_URL ?>/images/clock_del_16.png" style="cursor: pointer;" title="<?php echo $TEXT['DELETE_DATE']; ?>" alt="<?php echo $TEXT['DELETE_DATE']; ?>" onmouseover="this.style.background='lightgrey';" onmouseout="this.style.background=''" onclick="document.modify.publishdate.value=''" />
    	</td>
    </tr>
    <tr>
    	<td><?php echo $TEXT['PUBL_END_DATE']; ?>:</td>
    	<td>
    	<input type="text" id="enddate" name="enddate" value="<?php if($aPostRec['published_until']==0) print ""; else print date($jscal_format, $aPostRec['published_until'])?>" style="width: 120px;" />
    	<img src="<?php echo THEME_URL ?>/images/clock_16.png" id="enddate_trigger" style="cursor: pointer;" title="<?php echo $TEXT['CALENDAR']; ?>" alt="<?php echo $TEXT['CALENDAR']; ?>" onmouseover="this.style.background='lightgrey';" onmouseout="this.style.background=''" />
    	<img src="<?php echo THEME_URL ?>/images/clock_del_16.png" style="cursor: pointer;" title="<?php echo $TEXT['DELETE_DATE']; ?>" alt="<?php echo $TEXT['DELETE_DATE']; ?>" onmouseover="this.style.background='lightgrey';" onmouseout="this.style.background=''" onclick="document.modify.enddate.value=''" />
    	</td>
    </tr>
    </table>
    
    <table class="row_a" cellpadding="2" cellspacing="0" border="0" width="100%">
    <tr>
    	<td valign="top"><?php echo $TEXT['SHORT']; ?>:</td>
    </tr>
    <tr>
    	<td>
    	<?php
    	show_wysiwyg_editor("short","short",htmlspecialchars($aPostRec['content_short']),"100%","200px");
    	?>
    	</td>
    </tr>
    <tr>
    	<td valign="top"><?php echo $TEXT['LONG']; ?>:</td>
    </tr>
    <tr>
    	<td>
    	<?php
    	show_wysiwyg_editor("long","long",htmlspecialchars($aPostRec['content_long']),"100%","650px");
    	?>
    	</td>
    </tr>
    </table>
    
    <table cellpadding="2" cellspacing="0" border="0" width="100%">
    <tr>
    	<td align="left">
    		<input name="save" type="submit" value="<?php echo $TEXT['SAVE']; ?>" style="width: 100px; margin-top: 5px;" />
    	</td>
    	<td align="right">
    		<input type="button" value="<?php echo $TEXT['CANCEL']; ?>" onclick="javascript: window.location = '<?php echo ADMIN_URL; ?>/pages/modify.php?page_id=<?php echo $page_id; ?>';" style="width: 100px; margin-top: 5px;" />
    	</td>
    </tr>
    </table>
    </form>
    
    <script type="text/javascript">
    	Calendar.setup(
    		{
    			inputField  : "publishdate",
    			ifFormat    : "<?php echo $jscal_ifformat ?>",
    			button      : "publishdate_trigger",
    			firstDay    : <?php echo $jscal_firstday ?>,
    			<?php if(isset($jscal_use_time) && $jscal_use_time==TRUE)
                { ?>
    				showsTime   : "true",
    				timeFormat  : "24",
    			<?php
                } ?>
    			date        : "<?php echo $jscal_today ?>",
    			range       : [1970, 2037],
    			step        : 1
    		}
    	);
    	Calendar.setup(
    		{
    			inputField  : "enddate",
    			ifFormat    : "<?php echo $jscal_ifformat ?>",
    			button      : "enddate_trigger",
    			firstDay    : <?php echo $jscal_firstday ?>,
    			<?php if(isset($jscal_use_time) && $jscal_use_time==TRUE)
                { ?>
    				showsTime   : "true",
    				timeFormat  : "24",
    			<?php
                } ?>
    			date        : "<?php echo $jscal_today ?>",
    			range       : [1970, 2037],
    			step        : 1
    		}
    	);
    </script>
    
    <br />
    
    <h2><?php echo $TEXT['MODIFY'].'/'.$TEXT['DELETE'].' '.$TEXT['COMMENT']; ?></h2>
    
    <?php
    
    // Loop through existing posts
    $query_comments = $database->query("SELECT * FROM `".TABLE_PREFIX."mod_news_comments` WHERE section_id = '$section_id' AND post_id = '$post_id' ORDER BY commented_when DESC");
    if($query_comments->numRows() > 0) {
    	$row = 'a';
    	$pid = $admin->getIDKEY($post_id);
    	?>
    	<table cellpadding="2" cellspacing="0" border="0" width="100%">
    	<?php
    	while($comment = $query_comments->fetchRow(MYSQL_ASSOC)) {
    		$cid = $admin->getIDKEY($comment['comment_id']);
    		?>
    		<tr class="row_<?php echo $row; ?>" >
    			<td width="20" style="padding-left: 5px;">
    				<a href="<?php echo WB_URL; ?>/modules/news/modify_comment.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php
    					echo $section_id; ?>&amp;comment_id=<?php echo $cid; ?>" title="<?php echo $TEXT['MODIFY']; ?>">
    					<img src="<?php echo THEME_URL; ?>/images/modify_16.png" border="0" alt="^" />
    				</a>
    			</td>	
    			<td>
    				<a href="<?php echo WB_URL; ?>/modules/news/modify_comment.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php
    					echo $section_id; ?>&amp;comment_id=<?php echo $cid; ?>">
    					<?php echo $comment['title']; ?>
    				</a>
    			</td>
    			<td width="20">
    				<a href="javascript: confirm_link('<?php echo $TEXT['ARE_YOU_SURE']; ?>', '<?php
    					echo WB_URL; ?>/modules/news/delete_comment.php?page_id=<?php echo $page_id; ?>&amp;section_id=<?php
    					echo $section_id; ?>&amp;post_id=<?php echo $pid; ?>&amp;comment_id=<?php echo $cid; ?>');" title="<?php
    					echo $TEXT['DELETE']; ?>">
    					<img src="<?php echo THEME_URL; ?>/images/delete_16.png" border="0" alt="X" />
    				</a>
    			</td>
    		</tr>
    		<?php
    		// Alternate row color
    		if($row == 'a') {
    			$row = 'b';
    		} else {
    			$row = 'a';
    		}
    	}
    	?>
    	</table>
    	<?php
    } else {
    	echo $TEXT['NONE_FOUND'];
    }
}
// Print admin footer
$admin->print_footer();
