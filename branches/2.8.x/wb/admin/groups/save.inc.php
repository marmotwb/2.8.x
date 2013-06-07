<?php
/**
 * @category        admin
 * @package         groups
 * @author          WebsiteBaker Project, Independend-Software-Team
 * @copyright       2009-2013, Website Baker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description     all basic actions of this module, called by dispatcher only.
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}
/* -------------------------------------------------------- */

/* *****************************************************************************
 * Modify existing groups or insert a new group
 * @access public
 * @param object &$admin: reference to admin-object
 * @param object &$database: reference to database object
 * @param int $group_id: ID from group to modify or 0 for a new group
 * @return string: parsed HTML-content
 */
	function save_group($admin, $group_id = 0)
	{
//		global $TEXT, $MESSAGE, $HEADING, $MENU;
		include_once('upgradePermissions.php');
		include_once(WB_PATH.'/framework/functions.php');
		$database = WbDatabase::getInstance();
		$mLang = Translate::getInstance();
	// check for valid group_id
		$sql = '';

//		$system_settings = getSystemDefaultPermissions();
		$system_settings = isset($_POST['system_permissions']) ? $_POST['system_permissions'] : array();

	// check FTAN and prevent 'admin'[id=1] from become changed
		if( $admin->checkFTAN() && $group_id != 1 )
		{
			$system_permissions   = get_system_permissions ($admin,$system_settings);
			$system_permissions   = set_system_permissions($system_permissions);

			$module_permissions   = set_module_permissions($admin);
			$module_permissions   = implode (',', $module_permissions);

			$template_permissions = set_template_permissions($admin);
			$template_permissions = implode (',', $template_permissions);

			// prepare empty record to add new group
			$group_name = $database->escapeString(strip_tags(trim($admin->get_post('name'))));
//	print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//	print_r( $_POST ); print '</pre>';

			$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'groups` ';
			$sql .= 'WHERE `group_id` <> '.$group_id.' AND `name` LIKE BINARY \''.$group_name.'\'';

			if($group_name == '')
			{
				msgQueue::add($mLang->MESSAGE_GROUPS_GROUP_NAME_BLANK );
			} elseif($group_name != '') {
		// check request vars and assign values to record
				if( $database->get_one($sql) != false )
				{
					msgQueue::add($mLang->MESSAGE_GROUPS_GROUP_NAME_EXISTS );
				} else {
					if( $group_id == 0 )
					{
						$sql  = 'INSERT INTO `'.TABLE_PREFIX.'groups` ';
						$where = '';
					} else {
						$sql  = 'UPDATE `'.TABLE_PREFIX.'groups` ';
						$where = 'WHERE `group_id` = '.$group_id;
					}
                 }
			}

		// save new/changed values if no error given before
            if( msgQueue::isEmpty() )
			{
				$sql .= 'SET `name` = \''.$group_name.'\', ';
				$sql .= '`system_permissions` = \''.$system_permissions.'\', ';
				$sql .= '`module_permissions` = \''.$module_permissions.'\', ';
				$sql .= '`template_permissions` = \''.$template_permissions.'\' ';
				$sql .= $where;
				if( $database->query($sql) )
				{
	                msgQueue::add($mLang->MESSAGE_GROUPS_SAVED ,true);
				} else {
					msgQueue::add($mLang->MESSAGE_RECORD_MODIFIED_FAILED );
				}
			}
		} else {
			msgQueue::add('FTAN-check failed or tried to change admin');
		}
		$admin->print_header();
		return $group_id;
	}
