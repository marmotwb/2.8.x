<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

	require_once(dirname(__FILE__).'/AccountSignup.php');

    	// load module language file
    	$mLang = Translate::getInstance();
		$mLang->enableAddon('account');
        $sIncludeHeadLinkCss = '';
        if( is_readable(WB_PATH .'/account/frontend.css')) {
        	$sIncludeHeadLinkCss .= '<link href="'.WB_URL.'/account/frontend.css"';
        	$sIncludeHeadLinkCss .= ' rel="stylesheet" type="text/css" media="screen" />'."\n";
            print $sIncludeHeadLinkCss;
        }

		$sConfirmationId = ( isset($_GET['id']) ? $_GET['id'] : ( isset($_POST['confirm_code']) ? $_POST['confirm_code'] : '' ) );
		$sSubmitAction = 'show'; // default action
		$sSubmitAction = ( isset($_POST['action']) ? $_POST['action'] : $sSubmitAction );
		if( isset($_POST['action_cancel']))
		{
			unset($_POST);
			$sSubmitAction = 'cancel'; // default action
		}

		$output = '';
		msgQueue::clear();
		switch($sSubmitAction) :
			case 'save_confirm':
				include(dirname(__FILE__).'/save_confirm.php');
        		if($sSubmitAction=='finished') {
        			include(dirname(__FILE__).'/confirm_mails.php');
     				break;
           		}
				if(!msgQueue::isEmpty()) {
					include(dirname(__FILE__).'/confirm_form_mask.php');
				}
				break;
			default:
				include(dirname(__FILE__).'/confirm_form_mask.php');
		endswitch; // end of switch
