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
    error_reporting(E_ALL);
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
	$title      = $admin->StripCodeFromText($admin->get_post('title'));
	$commenting = $admin->StripCodeFromText($admin->get_post('commenting'));
	$active     = intval($admin->get_post('active'));
	$old_link   = $admin->StripCodeFromText($admin->get_post('link'));
	$group_id   = intval($admin->get_post('group'));

	if($admin->get_post('title') == '' AND $admin->get_post('url') == '') {
		$recallUrl = WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.
		             '&section_id='.$section_id.'&post_id='.$admin->getIDKEY($post_id);
		$admin->print_error($MESSAGE['GENERIC_FILL_IN_ALL'], $recallUrl);
	} else {
		$short      = $admin->get_post('short');
		$long       = $admin->get_post('long');
		$short = $admin->ReplaceAbsoluteMediaUrl($short);
		$long = $admin->ReplaceAbsoluteMediaUrl($long);
	}

// Include WB functions file
	require(WB_PATH.'/framework/functions.php');
// Work-out what the link should be
	$sNewFile = page_filename($title).PAGE_SPACER.$post_id;
    $newLink = '/posts/'.$sNewFile;
    $sPagesPath = WB_PATH.PAGES_DIRECTORY;
    $sBackUrl = ADMIN_URL.'/pages/modify.php?page_id='.$page_id;
    $sNewFilename = $sPagesPath.$newLink.PAGE_EXTENSION;
    $sOldFilename = $sPagesPath.$old_link.PAGE_EXTENSION;

// get publisedwhen and publisheduntil
	$publishedwhen = jscalendar_to_timestamp($admin->get_post_escaped('publishdate'));
	if($publishedwhen == '' || $publishedwhen < 1) { $publishedwhen=0; }
	$publisheduntil = jscalendar_to_timestamp($admin->get_post_escaped('enddate'), $publishedwhen);
	if($publisheduntil == '' || $publisheduntil < 1) { $publisheduntil=0; }
// Update row
	$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` '
          . 'SET `group_id`='.(int)$group_id.', '
          .     '`title`=\''.$database->escapeString($title).'\', '
          .     '`link`=\''.$database->escapeString($newLink).'\', '
          .     '`content_short`=\''.$database->escapeString($short).'\', '
          .     '`content_long`=\''.$database->escapeString($long).'\', '
          .     '`commenting`=\''.$database->escapeString($commenting).'\', '
          .     '`active`='.(int)$active.', '
          .     '`published_when`='.(int)$publishedwhen.', '
          .     '`published_until`='.(int)$publisheduntil.', '
          .     '`posted_when`='.time().', '
          .     '`posted_by`='.(int)$admin->get_user_id().' '
          . 'WHERE `post_id`='.(int)$post_id;
	if( $database->query($sql) ) {
		// create new accessfile
        $sDoWhat = (($newLink == $old_link) && (file_exists($sNewFilename))) ? "nothing" : "action";
        if($sDoWhat == "action") {
            $sDoWhat = (($sDoWhat == "action") && file_exists($sOldFilename)) ? "update" : "create";
        }

        switch($sDoWhat)
        {
            case "update":
                try {
// prozedural rename accessfile if link has changed, has to be changed to accessfile class when fixed
            		if(($sNewFilename != $sOldFilename) && (is_writable($sOldFilename))) {
            			if(!rename($sOldFilename,$sNewFilename)) {
            				$admin->print_error($MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'].' - '.$oldLink,$sBackUrl);
            			}
            		}
//                    $oAF = new AccessFile($sOldFilename, $page_id);
//                    $oAF->rename($sNewFile);
//                    unset($oAF);
                }catch(AccessFileException $e) {
                    $admin->print_error($e,$sBackUrl);
                }
            break;
            case "create":
                try {
                    $oAF = new AccessFile($sNewFilename, $page_id);
                    $oAF->addVar('section_id', $section_id, AccessFile::VAR_INT);
                    $oAF->addVar('post_id', $post_id, AccessFile::VAR_INT);
                    $oAF->addVar('post_section', $section_id, AccessFile::VAR_INT);
                    $oAF->write();
                    unset($oAF);
                }catch(AccessFileException $e) {
                    $admin->print_error($e,$sBackUrl);
                }
            break;
        }
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