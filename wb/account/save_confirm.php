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
if(defined('WB_PATH') == false)
{
	die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}
/* -------------------------------------------------------- */

require_once(dirname(__FILE__).'/AccountSignup.php');
AccountSignup::deleteOutdatedConfirmations();
$sPassword = isset($_POST['new_password_1'])     ? mysql_escape_string($_POST['new_password_1']) : '';
$sLoginName = isset($_POST['new_loginname'])     ? mysql_escape_string($_POST['new_loginname']) : '';
$sConfirmationId = isset($_POST['confirm_code']) ? mysql_escape_string($_POST['confirm_code'])   : '';

$bSendRegistrationMailtoUser = false;
$bSendRegistrationMailtoAdmin = false;
$aUser = array();
if( ($sPassword=='') || ($sLoginName=='') ) {
	msgQueue::add( $mLang->MESSAGE_LOGIN_BOTH_BLANK);
} else {
	if( $iUserId = AccountSignup::checkPassWordConfirmCode( $sPassword, $sConfirmationId )) {
		msgQueue::add( $mLang->MESSAGE_ACTIVATED_NEW_USER, true );
		AccountSignup::saveNewConfirmation($sConfirmationId);
        $email_to = AccountSignup::emailUser($iUserId);
        $bSaveRegistration = $iUserId > 0;
		$sSubmitAction = 'finished'; // default action
		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'users` ';
		$sql .= 'WHERE `user_id` ='.$iUserId.' ';
		if($oRes = $database->query($sql)) {
            $aUser = $oRes->fetchRow(MYSQL_ASSOC);
            $bSaveRegistration = true;
            $sDisplayName = $aUser['display_name'];
            $email_to = $aUser['email'];
            $sLoginIp = $aUser['login_ip'];
            $sLoginName = $aUser['username'];
		}

	} else {
		msgQueue::add( $mLang->MESSAGE_FAILED_NEW_USER );
	}
}

