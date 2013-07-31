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

		$aSystemPermissionsPages = (isset($_POST["sp_pages"])) ? $_POST["sp_pages"] : array();
		$aSystemPermissionsMedia = (isset($_POST["sp_media"])) ? $_POST["sp_media"] : array();
		$aSystemPermissionsModules = (isset($_POST["sp_modules"])) ? $_POST["sp_modules"] : array();
		$aSystemPermissionsTemplates = (isset($_POST["sp_templates"])) ? $_POST["sp_templates"] : array();
		$aSystemPermissionsLanguages = (isset($_POST["sp_languages"])) ? $_POST["sp_languages"] : array();
		$aSystemPermissionsSettings = (isset($_POST["sp_settings"])) ? $_POST["sp_settings"] : array();
		$aSystemPermissionsAdmintools = (isset($_POST["sp_admintools"])) ? $_POST["sp_admintools"] : array();
		$aSystemPermissionsUsers = (isset($_POST["sp_users"])) ? $_POST["sp_users"] : array();
		$aSystemPermissionsGroups = (isset($_POST["sp_groups"])) ? $_POST["sp_groups"] : array();
		$aSystemPermissionsPreferences = (isset($_POST["sp_preferences"])) ? $_POST["sp_preferences"] : array();
		$aSystemPermissions = array_merge($aSystemPermissionsPages, $aSystemPermissionsMedia, $aSystemPermissionsModules,
										$aSystemPermissionsTemplates, $aSystemPermissionsLanguages, $aSystemPermissionsSettings,
										$aSystemPermissionsAdmintools, $aSystemPermissionsUsers, $aSystemPermissionsGroups,
										$aSystemPermissionsPreferences);

		//addons,modules,modules_advanced,modules_install,modules_view,preferences,preferences_view
	// check FTAN and prevent 'admin'[id=1] from become changed
		if( $admin->checkFTAN() && $group_id != 1 )
		{
			$aSystemPermissions   = get_system_permissions ($admin,$aSystemPermissions);
			$sSystemPermissions   = set_system_permissions($aSystemPermissions);

			$module_permissions   = set_module_permissions($admin);
			$module_permissions   = implode (',', $module_permissions);

			$template_permissions = set_template_permissions($admin);
			$template_permissions = implode (',', $template_permissions);

			// prepare empty record to add new group
			$group_name = $database->escapeString(strip_tags(trim($admin->get_post('name'))));

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
				$sql .= '`system_permissions` = \''.$sSystemPermissions.'\', ';
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