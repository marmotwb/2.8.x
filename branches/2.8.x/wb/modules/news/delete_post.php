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

    require('../../config.php');

    $admin_header = false;
    $update_when_modified = true; // Tells script to update when this page was last updated
    $oReg   = WbAdaptor::getInstance();
    $oDb    = WbDatabase::getInstance();
    $oTrans = Translate::getInstance();
    $oTrans->enableAddon('modules\news');
    require($oReg->AppPath.'/modules/admin.php'); // Include WB admin wrapper script
    $sErrMsg = '';
    $sRedirectLink = $oReg->AcpUrl.'pages/modify.php?page_id='.$page_id;
    if (($post_id = ($admin->checkIDKEY('post_id', false, 'GET')))) {
    // Get post details
        $sql = 'SELECT `link` FROM `'.$oDb->TablePrefix.'mod_news_posts` '
             . 'WHERE `post_id`='.$post_id;
        if (($sPostLink = $oDb->getOne($sql))) {
            try {
                $sAccesFilesRootDir = $oReg->AppPath.$oReg->PagesDir.'posts/';
                $sAccesFileName = str_replace('posts/', '', trim($sPostLink, '/')).$oReg->PageExtension;
            // Unlink post access file
                $oAF = new AccessFile($sAccesFilesRootDir, $sAccesFileName);
                $oAF->delete();
                unset($oAF);
            // first delete all depending records
                $sql = 'DELETE FROM `'.$oDb->TablePrefix.'mod_news_comments` '
                     . 'WHERE `post_id`='.$post_id;
                $oDb->doQuery($sql);
            // now delete master record
                $sql = 'DELETE FROM `'.$oDb->TablePrefix.'mod_news_posts` '
                     . 'WHERE `post_id`='.$post_id;
                $oDb->doQuery($sql);
            // reorder positions
                $oOrder = new order($oDb->TablePrefix.'mod_news_posts', 'position', 'post_id', 'section_id');
                $oOrder->clean($section_id);
            } catch(AccessFileException $e) {
                $sErrMsg = (string)$e;
            } catch(WbDatabaseException $e) {
                $sErrMsg = (string)$e;
                $sRedirectLink = $oReg->AppUrl.'modules/news/modify_post.php?page_id='.$page_id.'&post_id='.$post_id;
            }
        } else {
            $sErrMsg = $oTrans->TEXT_NOT_FOUND;
        }
    } else {
        $sErrMsg = $oTrans->MESSAGE_GENERIC_SECURITY_ACCESS;
    }
    // print result
    $admin->print_header();
    if($sErrMsg) {
        $admin->print_error($sErrMsg, $sRedirectLink);
    } else {
        $admin->print_success($oTrans->TEXT_SUCCESS, $sRedirectLink);
    }
    $oTrans->disableAddon();
    $admin->print_footer();

