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
//$string = "pages,pages_view,pages_add,pages_add_l0,pages_settings,pages_modify,pages_intro,pages_delete,media,media_view,media_upload,media_rename,media_delete,media_create,addons,modules,modules_view,modules_install,modules_uninstall,templates,templates_view,templates_install,templates_uninstall,languages,languages_view,languages_install,languages_uninstall,settings,settings_basic,settings_advanced,access,users,users_view,users_add,users_modify,users_delete,groups,groups_view,groups_add,groups_modify,groups_delete,admintools
//media,media_create,media_upload,media_view,preferences,preferences_view,pages,pages_modify,pages_view";
//$regex = "/(pages)+[a-z]*[_]([a-z_0-9]+)[^,]/im";
//preg_match_all ($regex, $string, $output);
//
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Start','start');
// ---------------------------------------
//	$database = WbDatabase::getInstance();

if(defined('FINALIZE_SETUP')) {
	require_once(WB_PATH.'/framework/functions.php');
	$dirs = array( 'modules'   => WB_PATH.'/modules/',
	               'templates' => WB_PATH.'/templates/',
	               'languages' => WB_PATH.'/languages/'
	             );
	foreach($dirs AS $type => $dir) {
		if( ($handle = opendir($dir)) ) {
			while(false !== ($file = readdir($handle))) {
				if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'admin.php' AND $file != 'index.php') {
					// Get addon type
					if($type == 'modules') {
						load_module($dir.'/'.$file, true);
						// Pretty ugly hack to let modules run $admin->set_error
						// See dummy class definition admin_dummy above
						if(isset($admin->error) && $admin->error != '') {
							$admin->print_error($admin->error);
						}
					} elseif($type == 'templates') {
						load_template($dir.'/'.$file);
					} elseif($type == 'languages') {
						load_language($dir.'/'.$file);
					}
				}
			}
		closedir($handle);
		}
	}
	$sql = 'DELETE FROM `'.TABLE_PREFIX.'settings` WHERE `name`=\'FINALIZE_SETUP\'';
	if($database->query($sql)) { }
}
// ---------------------------------------
// check if it is neccessary to start the uograde-script
$msg  = '';
$msg .= (is_readable(WB_PATH.'/install/')) ?  $MESSAGE['START_INSTALL_DIR_EXISTS'].'<br />' : $msg;
$msg .= (is_readable(WB_PATH.'/upgrade-script.php')) ?  $MESSAGE['START_UPGRADE_SCRIPT_EXISTS'].'<br />' : '';
//$msg .= ''.$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'].'<br />';

// ---------------------------------------
// check if it is neccessary to start the uograde-script
// ---------------------------------------
if(($admin->get_user_id()==1) && file_exists(WB_PATH.'/upgrade-script.php')) {
	// check if it is neccessary to start the uograde-script
	$sql = 'SELECT `value` FROM `'.TABLE_PREFIX.'settings` WHERE `name`=\'wb_revision\'';
	if($wb_revision=$database->get_one($sql)) {
	}
	if (version_compare($wb_revision, REVISION ) < 0) {
		if(!headers_sent()) {
			header('Location: '.WB_URL.'/upgrade-script.php');
		    exit;
		} else {
		    echo "<p style=\"text-align:center;\"> The <strong>upgrade script</strong> could not be start automatically.\n" .
		         "Please click <a style=\"font-weight:bold;\" " .
		         "href=\"".WB_URL."/upgrade-script.php\">on this link</a> to start the script!</p>\n";
		    exit;
		}
	}
}
// ---------------------------------------
// workout to upgrade the groups system_permissions
// ---------------------------------------
if( ($admin->get_user_id()==1) &&
	file_exists(ADMIN_PATH.'/groups/upgradePermissions.php') && !defined('GROUPS_UPDATED') )
{
	// check if it is neccessary to start the uograde-script
	$sql = 'SELECT `value` FROM `'.TABLE_PREFIX.'settings` WHERE `name`=\'wb_revision\'';
	if($wb_revision = $database->get_one($sql)) {

	}

	if ((version_compare($wb_revision, '1800' )  < 0)&& !defined('GROUPS_UPDATED')) {
		require_once (ADMIN_PATH.'/groups/upgradePermissions.php');
		// build new or changed $sTempPermissions
		if(upgrade_group_system_permissions()){
			$cfg = array(
				'groups_updated' => time()
			);
			if(db_update_key_value( 'settings', $cfg )) {
			    echo "<div class=\"note center rounded\"><h3>Hello Systemadministrator!</h3>".
				     "<p style=\"text-align:center;\">".
				     "The <strong>Administrator Groups Rights </strong> were updated automatically.\n" .
			         "Please click <a style=\"font-weight:bold;\" " .
			         "href=\"".ADMIN_URL."/logout/index.php\">on this link</a> to login again!</p>\n".
			         "<h3>Upgrading only start, if groups rights are not up to date!</h3></div>";
				// Print admin footer
				$admin->print_footer();
			    exit(0);

			}
		}
	}
}

// ---------------------------------------
// Setup template object, parse vars to it, then parse it
// Create new template object
$oTpl = new Template(dirname($admin->correct_theme_source('start.htt')),'keep');
$oTpl->set_file('page', 'start.htt');
$oTpl->set_block('page', 'main_block', 'main');

// Insert values into the template object
$oTpl->set_var(array(
					'WELCOME_MESSAGE' => $MESSAGE['START_WELCOME_MESSAGE'],
					'CURRENT_USER' => $MESSAGE['START_CURRENT_USER'],
					'DISPLAY_NAME' => $admin->get_display_name(),
                    'DISPLAY_WARNING' => '',
                    'WARNING' => '',
					'ADMIN_URL' => ADMIN_URL,
					'WB_URL' => WB_URL,
					'THEME_URL' => THEME_URL,
					'WB_VERSION' => WB_VERSION,
					'NO_CONTENT' => ''
				)
			);

// Insert permission values into the template object
$oTpl->set_block('main_block', 'show_pages_block', 'show_pages');
if($admin->get_permission('pages') != true)
{
	$oTpl->set_block('show_pages', '');
} else {
	$oTpl->parse('show_pages', 'show_pages_block', true);
}

$oTpl->set_block('main_block', 'show_addons_block', 'show_addons');
if($admin->get_permission('addons') != true)
{
	$oTpl->set_block('show_addons', '');
} else {
	$oTpl->parse('show_addons', 'show_addons_block', true);
}

$oTpl->set_block('main_block', 'show_settings_block', 'show_settings');
if($admin->get_permission('settings') != true)
{
	$oTpl->set_block('show_settings', '');
} else {
	$oTpl->parse('show_settings', 'show_settings_block', true);
}

$oTpl->set_block('main_block', 'show_access_block', 'show_access');
if($admin->get_permission('access') != true)
{
	$oTpl->set_block('show_access', '');
} else {
	$oTpl->parse('show_access', 'show_access_block', true);
}

$oTpl->set_block('main_block', 'show_media_block', 'show_media');
if($admin->get_permission('media') != true)
{
	$oTpl->set_block('show_media', '');
} else {
	$oTpl->parse('show_media', 'show_media_block', true);
}

$oTpl->set_block('main_block', 'show_admintools_block', 'show_admintools');
if($admin->get_permission('admintools') != true)
{
	$oTpl->set_block('show_admintools', '');
} else {
	$oTpl->parse('show_admintools', 'show_admintools_block', true);
}

$oTpl->set_block('main_block', 'show_preferences_block', 'show_preferences');
if($admin->get_permission('preferences') != true)
{
	$oTpl->set_block('show_preferences', '');
} else {
	$oTpl->parse('show_preferences', 'show_preferences_block', true);
}


/*
if($admin->get_permission('pages') != true)
{
	$oTpl->set_var('DISPLAY_PAGES', 'display:none;');
}
if($admin->get_permission('media') != true)
{
	$oTpl->set_var('DISPLAY_MEDIA', 'display:none;');
}
if($admin->get_permission('addons') != true)
{
	$oTpl->set_var('DISPLAY_ADDONS', 'display:none;');
}
if($admin->get_permission('access') != true)
{
	$oTpl->set_var('DISPLAY_ACCESS', 'display:none;');
}
if($admin->get_permission('settings') != true)
{
	$oTpl->set_var('DISPLAY_SETTINGS', 'display:none;');
}
if($admin->get_permission('admintools') != true)
{
	$oTpl->set_var('DISPLAY_ADMINTOOLS', 'display:none;');
}
*/


$oTpl->set_block('main_block', 'show_install_block', 'show_install');
if($admin->get_user_id() != 1)
{
	$oTpl->parse('show_install', '');
} else {

    // Check if installation directory still exists
    if(file_exists(WB_PATH.'/install/') || file_exists(WB_PATH.'/upgrade-script.php') ) {
    	// Check if user is part of Adminstrators group
    	if($admin->get_user_id()==1)
        {
    		$oTpl->set_var('WARNING', $msg );
    	} else {
    		$oTpl->set_var('DISPLAY_WARNING', 'display:none;');
    	}
    } else {
    	$oTpl->set_var('DISPLAY_WARNING', 'display:none;');
    }

	$oTpl->parse('show_install', 'show_install_block', true);
}

// Insert "Add-ons" section overview (pretty complex compared to normal)
$addons_overview = $TEXT['MANAGE'].' ';
$addons_count = 0;
if($admin->get_permission('modules') == true)
{
	$addons_overview .= '<a href="'.ADMIN_URL.'/modules/index.php">'.$MENU['MODULES'].'</a>';
	$addons_count = 1;
}
if($admin->get_permission('templates') == true)
{
	if($addons_count == 1) { $addons_overview .= ', '; }
	$addons_overview .= '<a href="'.ADMIN_URL.'/templates/index.php">'.$MENU['TEMPLATES'].'</a>';
	$addons_count = 1;
}
if($admin->get_permission('languages') == true)
{
	if($addons_count == 1) { $addons_overview .= ', '; }
	$addons_overview .= '<a href="'.ADMIN_URL.'/languages/index.php">'.$MENU['LANGUAGES'].'</a>';
}

// Insert "Access" section overview (pretty complex compared to normal)
$access_overview = $TEXT['MANAGE'].' ';
$access_count = 0;
if($admin->get_permission('users') == true) {
	$access_overview .= '<a href="'.ADMIN_URL.'/users/index.php">'.$MENU['USERS'].'</a>';
	$access_count = 1;
}
if($admin->get_permission('groups') == true) {
	if($access_count == 1) { $access_overview .= ', '; }
	$access_overview .= '<a href="'.ADMIN_URL.'/groups/index.php">'.$MENU['GROUPS'].'</a>';
	$access_count = 1;
}

// Insert section names and descriptions
$oTpl->set_var(array(
					'PAGES' => $MENU['PAGES'],
					'MEDIA' => $MENU['MEDIA'],
					'ADDONS' => $MENU['ADDONS'],
					'ACCESS' => $MENU['ACCESS'],
					'PREFERENCES' => $MENU['PREFERENCES'],
					'SETTINGS' => $MENU['SETTINGS'],
					'ADMINTOOLS' => $MENU['ADMINTOOLS'],
					'HOME_OVERVIEW' => $OVERVIEW['START'],
					'PAGES_OVERVIEW' => $OVERVIEW['PAGES'],
					'MEDIA_OVERVIEW' => $OVERVIEW['MEDIA'],
					'ADDONS_OVERVIEW' => $addons_overview,
					'ACCESS_OVERVIEW' => $access_overview,
					'PREFERENCES_OVERVIEW' => $OVERVIEW['PREFERENCES'],
					'SETTINGS_OVERVIEW' => $OVERVIEW['SETTINGS'],
					'ADMINTOOLS_OVERVIEW' => $OVERVIEW['ADMINTOOLS']
				)
			);

// Parse template object
$oTpl->parse('main', 'main_block', false);
$oTpl->pparse('output', 'page');

// Print admin footer
$admin->print_footer();
