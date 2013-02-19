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

	function createNewsAccessFile($newLink, $oldLink, $page_id, $section_id, $post_id)
	{
		global $admin, $MESSAGE;
		$sError = '';
		$sPagesPath = WB_PATH.PAGES_DIRECTORY;
		$sPostsPath = $sPagesPath.'/posts';
		$sBackUrl = ADMIN_URL.'/pages/modify.php?page_id='.$page_id;
	// delete old accessfile if link has changed
		if(($newLink != $oldLink) && (is_writable($sPostsPath.$oldLink.PAGE_EXTENSION))) {
			if(!unlink($sPostsPath.$oldLink.PAGE_EXTENSION)) {
				$admin->print_error($MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'].' - '.$oldLink,$sBackUrl);
			}
		}
	// all ok, now create new accessfile
		$newFile = $sPagesPath.$newLink.PAGE_EXTENSION;
		// $backSteps = preg_replace('/^'.preg_quote(WB_PATH).'/', '', $sPostsPath);
				$aOptionalCommands = array(
				         '$section_id   = '.$section_id,
				         '$post_id      = '.$post_id ,
				         '$post_section = '.$section_id
				);
		if(	($sError = create_access_file($newFile, $page_id, 0, $aOptionalCommands))!==true ) 
		{
			$admin->print_error($sError,$sBackUrl );
		}
	} // end of function createNewsAccessFile
/* ************************************************************************** */
	require('../../config.php');
	require_once(WB_PATH."/include/jscalendar/jscalendar-functions.php");
// Get post_id
	if(!isset($_POST['post_id']) OR !is_numeric($_POST['post_id'])) {
		header("Location: ".ADMIN_URL."/pages/index.php");
		exit( 0 );
	}else {
		$post_id = intval($_POST['post_id']);
	}

	$admin_header = false;
	// Tells script to update when this page was last updated
	$update_when_modified = true;
	// Include WB admin wrapper script
	require(WB_PATH.'/modules/admin.php');

	if (!$admin->checkFTAN()) {
		$admin->print_header();
		$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],
		                    ADMIN_URL.'/pages/modify.php?page_id='.$page_id );
	}
	$admin->print_header();

// Validate all fields
	if($admin->get_post('title') == '' AND $admin->get_post('url') == '') {
        $recallUrl = WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.
		             '&section_id='.$section_id.'&post_id='.$admin->getIDKEY($post_id);
		$admin->print_error($MESSAGE['GENERIC_FILL_IN_ALL'], $recallUrl);
	}else {
		$title      = $admin->get_post_escaped('title');
		$short      = $admin->get_post_escaped('short');
		$long       = $admin->get_post_escaped('long');
		$commenting = $admin->get_post_escaped('commenting');
		$active     = $admin->get_post_escaped('active');
		$old_link   = $admin->get_post_escaped('link');
		$group_id   = $admin->get_post_escaped('group');
	}
// Get page link URL
	$sql = 'SELECT `link` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id`='.(int)$page_id;
	$oldLink = $database->get_one($sql);
// Include WB functions file
	require(WB_PATH.'/framework/functions.php');
// Work-out what the link should be
	$newLink = '/posts/'.page_filename($title).PAGE_SPACER.$post_id;
// get publisedwhen and publisheduntil
	$publishedwhen = jscalendar_to_timestamp($admin->get_post_escaped('publishdate'));
	if($publishedwhen == '' || $publishedwhen < 1) { $publishedwhen=0; }
	$publisheduntil = jscalendar_to_timestamp($admin->get_post_escaped('enddate'), $publishedwhen);
	if($publisheduntil == '' || $publisheduntil < 1) { $publisheduntil=0; }
// Update row
	$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
	$sql .= 'SET `group_id`='.(int)$group_id.', ';
	$sql .=     '`title`=\''.$title.'\', ';
	$sql .=     '`link`=\''.$newLink.'\', ';
	$sql .=     '`content_short`=\''.$short.'\', ';
	$sql .=     '`content_long`=\''.$long.'\', ';
	$sql .=     '`commenting`=\''.$commenting.'\', ';
	$sql .=     '`active`='.(int)$active.', ';
	$sql .=     '`published_when`='.(int)$publishedwhen.', ';
	$sql .=     '`published_until`='.(int)$publisheduntil.', ';
	$sql .=     '`posted_when`='.time().', ';
	$sql .=     '`posted_by`='.(int)$admin->get_user_id().' ';
	$sql .= 'WHERE `post_id`='.(int)$post_id;
	if( $database->query($sql) ) { 
		// create new accessfile
		createNewsAccessFile($newLink, $oldLink, $page_id, $section_id, $post_id);
	}
// Check if there is a db error, otherwise say successful
	if($database->is_error()) {
		$recallUrl = WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.
					 '&section_id='.$section_id.'&post_id='.$admin->getIDKEY($post_id);
		$admin->print_error($database->get_error(), $recallUrl);
	}else {
		$admin->print_success($TEXT['SUCCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	}
// Print admin footer
	$admin->print_footer();
