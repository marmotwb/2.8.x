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
    $oReg = WbAdaptor::getInstance();
    $oDb  = WbDatabase::getInstance();
    $sNewsLinkSubdir = 'posts/';
//	require_once($oReg->AppPath."include/jscalendar/jscalendar-functions.php");
// Get post_id
    if (!isset($_POST['post_id']) || !($post_id = intval($_POST['post_id']))) {
		header("Location: ".$oReg->AcpUrl.'pages/index.php');
		exit( 0 );
    }
//	if(!isset($_POST['post_id']) OR !is_numeric($_POST['post_id'])) {
//		header("Location: ".$oReg->AcpUrl.'pages/index.php');
//		exit( 0 );
//	}else {
//		$post_id = intval($_POST['post_id']);
//	}
	$admin_header = false;
	// Tells script to update when this page was last updated
	$update_when_modified = true;
	// Include WB admin wrapper script
	require($oReg->AppPath.'modules/admin.php');
    $oReg->getWbConstants();
	if (!$admin->checkFTAN()) {
		$admin->print_header();
		$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'],
		                    $oReg->AcpUrl.'pages/modify.php?page_id='.$page_id );
	}
	$admin->print_header();

// Validate all fields
	if($admin->get_post('title') == '' AND $admin->get_post('url') == '') {
		$recallUrl = $oReg->AppUrl.'modules/news/modify_post.php?page_id='.$page_id.
		             '&section_id='.$section_id.'&post_id='.$admin->getIDKEY($post_id);
		$admin->print_error($MESSAGE['GENERIC_FILL_IN_ALL'], $recallUrl);
	} else {
		$short = $admin->ReplaceAbsoluteMediaUrl($admin->get_post('short'));
		$long  = $admin->ReplaceAbsoluteMediaUrl($admin->get_post('long'));
	}
	$title      = $admin->StripCodeFromText($admin->get_post('title'));
	$commenting = $admin->StripCodeFromText($admin->get_post('commenting'));
	$active     = intval($admin->get_post('active'));
	$group_id   = intval($admin->get_post('group'));
// Include WB functions file
	require($oReg->AppPath.'framework/functions.php');
// Work-out all needed path and filenames 
    $sAccessFileRootPath = $oReg->AppPath.$oReg->PagesDir.$sNewsLinkSubdir;
	$sOldLink     = preg_replace('/^\/?'.preg_quote($sNewsLinkSubdir, '/').'/', '', str_replace('\\', '/', $admin->StripCodeFromText($admin->get_post('link'))));
    $sOldFilename = $sAccessFileRootPath.$sOldLink.$oReg->PageExtension;
	$sNewLink     = page_filename($title).$oReg->PageSpacer.$post_id;
    $sNewFilename = $sAccessFileRootPath.$sNewLink.$oReg->PageExtension;
    $sBackUrl = $oReg->AcpUrl.'pages/modify.php?page_id='.$page_id;
// get publisedwhen and publisheduntil 
    $x = strtotime(preg_replace('/^(\d{1,2})\.(\d{1,2})\.(\d{2,4})(.*)$/s', '\2/\1/\3\4', $admin->get_post_escaped('publishdate')));
    $publishedwhen = $x ? $x : 0;
    $x = strtotime(preg_replace('/^(\d{1,2})\.(\d{1,2})\.(\d{2,4})(.*)$/s', '\2/\1/\3\4', $admin->get_post_escaped('enddate')), $publishedwhen);
    $publisheduntil = $x ? $x : 0;
// Update row in database
	$sql  = 'UPDATE `'.$oDb->TablePrefix.'mod_news_posts` '
          . 'SET `group_id`='.(int)$group_id.', '
          .     '`title`=\''.$oDb->escapeString($title).'\', '
          .     '`link`=\''.$oDb->escapeString('/'.$sNewsLinkSubdir.$sNewLink).'\', '
          .     '`content_short`=\''.$oDb->escapeString($short).'\', '
          .     '`content_long`=\''.$oDb->escapeString($long).'\', '
          .     '`commenting`=\''.$oDb->escapeString($commenting).'\', '
          .     '`active`='.(int)$active.', '
          .     '`published_when`='.(int)$publishedwhen.', '
          .     '`published_until`='.(int)$publisheduntil.', '
          .     '`posted_when`='.time().', '
          .     '`posted_by`='.(int)$admin->get_user_id().' '
          . 'WHERE `post_id`='.(int)$post_id;
	if ($oDb->query($sql)) {
    // create new accessfile
        $sDoWhat = (($sNewLink == $sOldLink) && (file_exists($sNewFilename)))
                   ? "nothing"
                   : ((file_exists($sOldFilename)) ? "update" : "create");
        switch($sDoWhat)
        {
            case "update":
                try {
//// prozedural rename accessfile if link has changed, has to be changed to accessfile class when fixed
//            		if(($sNewFilename != $sOldFilename) && (is_writable($sOldFilename))) {
//            			if(!rename($sOldFilename,$sNewFilename)) {
//            				$admin->print_error($MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'].' - '.$oldLink,$sBackUrl);
//            			}
//            		}
                    $oAF = new AccessFile($sAccessFileRootPath, $sOldLink, $page_id);
                    $oAF->rename($sNewLink);
                    unset($oAF);
                }catch(AccessFileException $e) {
                    $admin->print_error($e,$sBackUrl);
                }
            break;
            case "create":
                try {
                    $oAF = new AccessFile($sAccessFileRootPath, $sNewLink, $page_id);
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
	if($oDb->is_error()) {
		$recallUrl = $oReg->AppUrl.'modules/news/modify_post.php?page_id='.$page_id.
					 '&section_id='.$section_id.'&post_id='.$admin->getIDKEY($post_id);
		$admin->print_error($oDb->get_error(), $recallUrl);
	}else {
		$admin->print_success($TEXT['SUCCESS'], $oReg->AcpUrl.'pages/modify.php?page_id='.$page_id);
	}
// Print admin footer
	$admin->print_footer();
