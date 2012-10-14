<?php
/**
 *
 * @category        admin
 * @package         start
 * @author          Ryan Djurovich, WebsiteBaker Project
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
	// Stop this file being access directly
		die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}
/* -------------------------------------------------------- */


/**
 *
 *
 * @access public getSystemDefaultPermissions()
 * @param none
 * @return array System Default Permissions
 *
 */
function getSystemDefaultPermissions ()
{
	$retVal = array(
		'access' => 0,
		'addons' => 0,
		'admintools' => 0,
		'admintools_view' => 0,
		'groups' => 0,
		'groups_add' => 0,
		'groups_delete' => 0,
		'groups_modify' => 0,
		'groups_view' => 0,
		'languages' => 0,
		'languages_install' => 0,
		'languages_uninstall' => 0,
		'languages_view' => 0,
		'media' => 0,
		'media_create' => 0,
		'media_delete' => 0,
		'media_rename' => 0,
		'media_upload' => 0,
		'media_view' => 0,
		'modules' => 0,
		'modules_install' => 0,
		'modules_uninstall' => 0,
		'modules_view' => 0,
		'pages' => 0,
		'pages_add' => 0,
		'pages_add_l0' => 0,
		'pages_delete' => 0,
		'pages_intro' => 0,
		'pages_modify' => 0,
		'pages_settings' => 0,
		'pages_view' => 0,
		'preferences' => 1,
		'preferences_view' => 1,
		'settings' => 0,
		'settings_basic' => 0,
		'settings_advanced' => 0,
		'settings_view' => 0,
		'templates' => 0,
		'templates_install' => 0,
		'templates_uninstall' => 0,
		'templates_view' => 0,
		'users' => 0,
		'users_add' => 0,
		'users_delete' => 0,
		'users_modify' => 0,
		'users_view' => 0
	);
	return $retVal;
}

/* *****************************************************************************
 * Prepare $module_permissions for workout
 * @access public
 * @param object $admin: admin-object
 * @return array:
 */
	function set_module_permissions ($admin)
	{
		// Get template permissions
		$modules = array('');
		$dirs = scan_current_dir(WB_PATH.'/modules');

		if(is_array($admin->get_post('module_permissions')))
		{
			$modules = $admin->get_post('module_permissions');
		}
// foldername validation
 		array_walk($dirs['path'],'check_dir' );
// delete empty items
		foreach($dirs['path'] AS $key=>$val) {
			if(empty($dirs['path'][$key])) { unset($dirs['path'][$key]); }
		}
// list of unckecked modules directories
		$modules = array_diff ( $dirs['path'], $modules );
// reindex
		$modules = array_merge($modules);
		return $modules;
	}

/* *****************************************************************************
 * Prepare $template_permissions for workout
 * @access public
 * @param object $admin: admin-object
 * @return array:
 */
	function set_template_permissions ($admin)
	{
		// Get template permissions
		$templates = array();
		$dirs = scan_current_dir(WB_PATH.'/templates');
		if(is_array($admin->get_post('template_permissions')))
		{
			foreach($admin->get_post('template_permissions') AS $selected_name)
			{
				if( file_exists( WB_PATH.'/templates/'.$selected_name.'/info.php') && in_array ($selected_name, $dirs['path']) )
				{
					$templates[] = $selected_name;
				}
			}
		}
		$templates = (sizeof($templates) > 0) ? array_diff($dirs['path'], $templates) : $dirs['path'];
		// return $template_permissions = implode(',', $templates);
		return $templates;
	}

/* *****************************************************************************
 * Prepare $system_permissions for save
 * @access public
 * @param
 * @return string: parsed HTML-content
 */
	function set_system_permissions ($system_permissions = array())
	{
		// Implode system permissions
		$imploded_system_permissions = '';
		$system_permissions = !is_array($system_permissions) ? array() : $system_permissions;
		foreach($system_permissions AS $key => $value)
		{
			if($value == true)
			{
				if($imploded_system_permissions == '')
				{
					$imploded_system_permissions = $key;
				} else {
					$imploded_system_permissions .= ','.$key;
				}
			}
		}
		return $imploded_system_permissions;
	}

/* *****************************************************************************
 * array_walk callback functions
 */

	if(!function_exists('check_dir'))
	{
		function check_dir(&$val, $key ) {
			$RetVal = null;
			$aArray[$key] = $val;
			$RetVal = array_slice ($aArray,!preg_match('/^[a-z]{1}[a-z][a-z_\-0-9]{2,}$/i', $val ));
			$RetVal = each ($RetVal);
			$val = $RetVal['value'];
		}
	}


	if(!function_exists('remove_underline')){
		function remove_underline(& $val, $key, $vars = array())
		{
			$val = rtrim($val, ',');
			$vars = explode ( '_', $val);
			$val = $vars[0];
		}
	}

	if(!function_exists('addons')){
		function addons(& $val, $key, $vars = '')
		{
			$val = rtrim($val, '_');
            $val = ($val == 'modules_view') || ($val == 'templates_view') || ($val == 'languages_view') ? 'addons' : $val;
		}
	}

	if(!function_exists('settings')){
		function settings(& $val, $key, $vars = '')
		{
            $val = ($val == 'settings_view') ? 'settings_basic' : $val;
//            $val  = ($val == 'settings_basic') || ($val == 'settings_advanced') ? 'settings_view' : $val1;
		}
	}

	if(!function_exists('access')){
		function access(& $val, $key, $vars = '')
		{
            $val = ($val == 'groups_view') || ($val == 'users_view') ? 'access' : $val;
		}
	}
	function convertArrayToString ($val=null)
	{
		$settings = '';
		if(is_array($val))
		{
			foreach( $val as $key => $value )
			{
				$settings .= trim($value.',','\'');
			}
		} else {
			$settings = $val;
		}
		return trim($settings,',');
	}

	function convertKeyArrayToString ($val=null)
	{
		$settings = '';
		if(is_array($val))
		{
			foreach( $val as $key => $value )
			{
				$settings .= trim($key.',','\'');
			}
		} else {
			$settings = $val;
		}
		return trim($settings,',');
	}

// ---------------------------------------
	function convertStringToArray ($val=null)
	{
		$array = array();
		$settings = '';
		if(!is_array($val)){
			$settings = explode(',', $val);
			foreach( $settings as $value )
			{
				$array[] = $value;
			}
			} else {
				$array = $val;
			}
		return $array;
	}
// ---------------------------------------
	function convertStringToKeyArray ($val=null)
	{
		$array = array();
		if(!is_array($val)){
			$settings = explode(',', $val);
			foreach( $settings as $value )
			{
				$array[$value] = 1;
			}
			} else {
				$array = $val;
			}
		return $array;
	}

// ---------------------------------------
// workout to upgrade the groups system_permissions
/**
 * get_system_permissions()
 *
 * @return
 */
 function get_system_permissions ($admin, $SystemPermissions = null )
{
	$retVal = null;
	$aValidAll = array();
	$aValidView = array();
	$aValidBlock = array();
	$aValidAddons = array();
	$aValidAccess = array();
	$aValidSettings = array();
	$aPermissions = array();
	$sValueType = '';
	$sTempPermissions = '';
	if($SystemPermissions==null) { return false; }

// be sure is the right string for working inside
	if(is_string($SystemPermissions)) {
		$SystemPermissions = convertStringToKeyArray($SystemPermissions);
	}
	if(is_array($SystemPermissions)&& sizeof($SystemPermissions)>0) {
		$aPermissions = convertStringToKeyArray($SystemPermissions);
		$sTempPermissions = convertKeyArrayToString($aPermissions).',';
	}
// workout setting preferences
	if($admin->is_group_match('preferences_view',$sTempPermissions))
	{
		$aPermissions[]    = 'preferences';
		$sTempPermissions .= 'preferences,';
	}
// workout setting admintools
	if($admin->is_group_match('admintools_view',$sTempPermissions))
	{
		$aPermissions[]    = 'admintools';
		$sTempPermissions .= 'admintools,';
	}
// search all data with *_view, if not found delete the permission block
	$patternView = '/[a-z]+_view/i';
	if(preg_match_all($patternView, $sTempPermissions, $array ))
	{
// build new Permissions kist, remove invaild entries, needed to disable checknoxes
		array_walk($array[0], 'remove_underline');
		$sValueType = array_unique($array[0]);
		foreach($sValueType as $key => $view )
		{
//build new permission string
		$regex = "/(($view)[a-z_0-9]*)\,/i";
		preg_match_all ($regex, $sTempPermissions, $aMatch);
		$aValidBlock = $aMatch[1];
		$aValidAll = array_merge($aValidAll,$aValidBlock);
		}
// set all missing/needed entries
		$aValidAddons = $aValidAll;
		$aValidAccess = $aValidAll;
		$aValidSettings = $aValidAll;
		array_walk($aValidAddons,   'addons');
		array_walk($aValidAccess,   'access');
		array_walk($aValidSettings, 'settings');
// merge all arays and set to POST ready for save and change to advanced modus
		$aSystem = array_merge_recursive( $sValueType, $aValidAll, $aValidBlock, $aValidSettings, $aValidAddons, $aValidAccess);
		$retVal = array_unique($aSystem);
		natsort($retVal);
// set correct index key
		$retVal = array_merge($retVal);
// convert to right format
		$retVal = array_fill_keys($retVal, 1);
	}

	$_POST['system_permissions'] = $retVal;
	return $retVal;
}
// ---------------------------------------
//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.''.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//print_r( $_POST ); print '</pre>';

/**
 * setSystemCheckboxes()
 *
 * @param mixed $tpl
 * @param mixed $permissions
 * @return
 */
function setSystemCheckboxes( &$tpl, $admin, $permissions = null )
{
	$array = array();
	if(!is_array($permissions))
	{
		$array = convertStringToKeyArray($permissions);
	} else {
		$array = $permissions;
	}

	if ( true == (isset( $_POST['advanced_action']) && (( $_POST['advanced_action'] == 'no') || strpos( $_POST['advanced_action'], ">>") > 0 ) ) )
	{
	// set adbanced modus
		$tpl->parse('hidden_advanced_permission_list', '', true);
		$array = !is_array($array) ? array() : $array;
		$aPermissions = isset($_POST['system_permissions']) ? $_POST['system_permissions'] : array();
 		foreach($array AS $key => $value)
		{
	//		if(strpos($key,'_view')) { continue; }
			if(array_key_exists($key, $aPermissions)) { continue; }
			$tpl->set_var('SYS_NAME', "system_permissions[$key]" );
			$tpl->set_var('SYS_VALUE', 1 );
			$tpl->parse('hidden_advanced_permission_list', 'show_cmd_hidden_advanced_permission_list_block', true);
			$checked = '';
		}

	} else {
	// set baisc modus
		$tpl->set_var('SYS_NAME', "none" );
		$tpl->set_var('SYS_VALUE', '' );
		$tpl->parse('hidden_permission_list', 'show_cmd_hidden_permission_list_block', true);
		$array = !is_array($array) ? array() : $array;
		foreach($array AS $key => $value)
		{
			if(strpos($key,'_view')) { continue; }
			$tpl->set_var('SYS_NAME', "system_permissions[$key]" );
			$tpl->set_var('SYS_VALUE', 1 );
			$tpl->parse('hidden_permission_list', 'show_cmd_hidden_permission_list_block', true);
			$checked = '';
		}
	}
	reset($array);
	// set checked
	foreach($array AS $key => $value)
	{
		$checked='';
        if( $key != '' )
		{
            $checked = ' checked="checked"';
		}
		$tpl->set_var('VALUE', 1);
		$tpl->set_var($key.'_checked', $checked);
	}

	return $array;
}

/**
 * upgrade_group_system_permissions()
 *
 * @return void
 */
function upgrade_group_system_permissions ( )
{
	global $admin;
	$database = WbDatabase::getInstance();
	$aGroups = array();
	$sTempPermissions = '';
	$aTempPermissions = array();
	$aAllowedPermissions = array(
	'admintools','groups','languages','media','modules','pages','preferences','settings','templates','users'
	);
	$aPermissions = $aMatches = array();
	$sql  = 'SELECT `group_id`,`name`,`system_permissions` FROM `'.TABLE_PREFIX.'groups` ';
//	$sql .= 'WHERE `group_id` != 1 ';
	$sql .= 'ORDER BY `group_id` ';
	if($oRes = $database->query($sql) )
	{
		while( $aPage = $oRes->fetchRow(MYSQL_ASSOC) )
		{
			$sTempPermissions = convertKeyArrayToString (getSystemDefaultPermissions()).',';
			$sPermissions = $aPage['group_id']!= 1 ? $aPage['system_permissions'].',' : $sTempPermissions;
// check if old groups system_permissions format, there was no prferences
			if( !preg_match_all( '/(preferences[a-z_0-9]*)\,/iU', $sPermissions, $aMatches) )
			{
// fetch all known permission entries to set the permission_view
				foreach($aAllowedPermissions as $PermissionFound)
				{
					$aMatches = array();
					if( preg_match_all( "/(($PermissionFound)[a-z_0-9]*)\,/i", $sPermissions, $aMatches) )
					{
						$val1 = $admin->is_group_match("$PermissionFound".'_view',$sPermissions);
						$val2 = $admin->is_group_match("$PermissionFound",$sPermissions);
						if(!$val1 && $val2)
						{
							$sPermissions .= $PermissionFound.'_view,';
						}
					}
					$aTempPermissions = explode(',',$sPermissions);
					if(!$admin->is_group_match('preferences_view',$sPermissions))
					{
						$sPermissions .= 'preferences,preferences_view,';
					}
				}
			}
// upgrade all groups system permission
			$aTempPermissions = convertStringToArray(trim($sPermissions,','));
			natsort($aTempPermissions);
// reindex
			$aTempPermissions = array_merge(($aTempPermissions));
			$retVal = array_fill_keys($aTempPermissions, 1);
			$aPermissions[$aPage['name']] = get_system_permissions($admin, $retVal);
			$aGroups[$aPage['name']] = convertKeyArrayToString($aPermissions[$aPage['name']]);
// and update DB
			$sql  = 'UPDATE `'.TABLE_PREFIX.'groups` SET ';
			$sql .= '`system_permissions` =\''.$aGroups[$aPage['name']].'\' ';
			$sql .= 'WHERE `name` = \''.$aPage['name'].'\' ';
			if(!$database->query($sql) )
			{
			}
		}
	}
	return !$database->is_error();
}
