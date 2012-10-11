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
	require_once(WB_PATH.'/framework/class.admin.php');
}
$admin = new admin('Start', 'settings', false, false);

if($admin->get_user_id() == 1)
{
	$val = (((int)(defined('SYSTEM_LOCKED') ? SYSTEM_LOCKED : 0)) + 1) % 2;
	$sql = 'SELECT COUNT(`setting_id`) FROM `'.TABLE_PREFIX.'settings` WHERE `name` = \'system_locked\'';
	if($database->get_one($sql))
	{
		$sql = 'UPDATE ';
		$sql_where = 'WHERE `name` = \'system_locked\'';
	} else {
		$sql = 'INSERT INTO ';
		$sql_where = '';
	}
	$sql .= '`'.TABLE_PREFIX.'settings` ';
	$sql .= 'SET `name` = \'system_locked\', ';
	$sql .= '`value` = \''.$val.'\' '.$sql_where;
	$database->query($sql);
}
// redirect to backend
header('Location: ' . ADMIN_URL . '/index.php');
exit();
