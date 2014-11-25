<?php
/**
 *
 * @category        admin
 * @package         login
 * @author          Ryan Djurovich (2004-2009)), WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.9
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
*/
if(!defined('WB_PATH'))
{
	require('../../config.php');
}
$oDb = WbDatabase::getInstance();
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\settings');

$admin = new admin('Start', 'settings', false, false);

if ($admin->get_user_id() == 1) {
	$val = (((int)(defined('SYSTEM_LOCKED') ? SYSTEM_LOCKED : 0)) + 1) % 2;
    db_update_key_value($oDb->TablePrefix.'settings', 'system_locked', $val);
}
// redirect to backend
header('Location: ' . ADMIN_URL . '/index.php');
exit();
