<?php
/**
 *
 * @category        admin
 * @package         start
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
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

if (!defined('WB_URL')) {
	require_once('../../config.php');
}
$oDb = WbDatabase::getInstance();
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\start');
//$template->set_var($oTrans->getLangArray());
$admin = new admin('Start','start');
// ---------------------------------------
//	$database = WbDatabase::getInstance();

require_once(WB_PATH.'/framework/functions.php');
if(defined('FINALIZE_SETUP')) {
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
	$sql = 'DELETE FROM `'.$oDb-TablePrefix.'settings` WHERE `name`=\'FINALIZE_SETUP\'';
	$oDb->doQuery($sql);
}
// ---------------------------------------
// check if it is neccessary to start the uograde-script

$msg  = '';
$msg .= (is_readable(WB_PATH.'/install/')) ?  $oTrans->MESSAGE_START_INSTALL_DIR_EXISTS.'<br />' : $msg;
$aReplace =array( 
      'file' => '<a style="font-weight:bold;" href="'.WB_URL.'/upgrade-script.php">upgrade-script.php</a>'
    );
$msg .= (is_readable(WB_PATH.'/upgrade-script.php') ?  replace_vars($oTrans->MESSAGE_START_UPGRADE_SCRIPT_EXISTS.'<br />',$aReplace) : '');

// ---------------------------------------
// check if it is neccessary to start the uograde-script
// ---------------------------------------
if(($admin->get_user_id()==1) && file_exists(WB_PATH.'/upgrade-script.php')) {
	// check if it is neccessary to start the uograde-script
	$sql = 'SELECT `value` FROM `'.$oDb->TablePrefix.'settings` WHERE `name`=\'wb_revision\'';
	$wb_revision = $oDb->getOne($sql);
	if (version_compare($wb_revision, REVISION ) < 0) {
echo "<p style=\"text-align:center;\"> If the <strong>upgrade script</strong> could not be start automatically.\n" .
     "Please click <a style=\"font-weight:bold;\" " .
     "href=\"".WB_URL."/upgrade-script.php\">on this link</a> to start the script!</p>\n";

echo "<script type=\"text/javascript\">
<!--
// Get the location object
var locationObj = document.location;
// Set the value of the location object
document.location = '".WB_URL."/upgrade-script.php';
-->
</script>";

//		if(!headers_sent()) {
//			header('Location: '.WB_URL.'/upgrade-script.php');
//		    exit;
//		} else {
//		    echo "<p style=\"text-align:center;\"> The <strong>upgrade script</strong> could not be start automatically.\n" .
//		         "Please click <a style=\"font-weight:bold;\" " .
//		         "href=\"".WB_URL."/upgrade-script.php\">on this link</a> to start the script!</p>\n";
//		    exit;
//		}
	}
}
// ---------------------------------------
// workout to upgrade the groups system_permissions
// ---------------------------------------
if( ($admin->get_user_id()==1) && file_exists(ADMIN_PATH.'/groups/upgradePermissions.php') && !defined('GROUPS_UPDATED') )
{
	// check if it is neccessary to start the uograde-script
	$sql = 'SELECT `value` FROM `'.$oDb-TablePrefix.'settings` WHERE `name`=\'wb_revision\'';
	$wb_revision = $database->get_one($sql);
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

/**
 * delete Outdated Confirmations
 */
$sql = 'DELETE FROM `'.$oDb->TablePrefix.'users` WHERE `confirm_timeout` BETWEEN 1 AND '.time();
$oDb->doQuery($sql);

/**
 * delete stored ip adresses default after 60 days
 */
$sql = 'UPDATE `'.$oDb->TablePrefix.'users` SET `login_ip` = \'\' WHERE `login_when` < '.(time()-(60*84600));
$oDb->doQuery($sql);

// ---------------------------------------
// Setup template object, parse vars to it, then parse it
// Create new template object
$oTpl = new Template(dirname($admin->correct_theme_source('start.htt')),'keep');
$oTpl->set_file('page', 'start.htt');
$oTpl->set_block('page', 'main_block', 'main');
$oTpl->set_var($oTrans->getLangArray());
// Insert values into the template object
$oTpl->set_var(array(
					'WELCOME_MESSAGE' => $oTrans->MESSAGE_START_WELCOME_MESSAGE,
					'CURRENT_USER'    => $oTrans->MESSAGE_START_CURRENT_USER,
					'DISPLAY_NAME'    => $admin->get_display_name(),
                    'DISPLAY_WARNING' => '',
                    'WARNING'         => '',
					'ADMIN_URL'       => ADMIN_URL,
					'WB_URL'          => WB_URL,
					'THEME_URL'       => THEME_URL,
					'WB_VERSION'      => WB_VERSION,
					'NO_CONTENT'      => ''
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
$addons_overview = $oTrans->TEXT_MANAGE.' ';
$addons_count = 0;
if($admin->get_permission('modules') == true)
{
	$addons_overview .= '<a href="'.ADMIN_URL.'/modules/index.php">'.$oTrans->MENU_MODULES.'</a>';
	$addons_count = 1;
}
if($admin->get_permission('templates') == true)
{
	if($addons_count == 1) { $addons_overview .= ', '; }
	$addons_overview .= '<a href="'.ADMIN_URL.'/templates/index.php">'.$oTrans->MENU_TEMPLATES.'</a>';
	$addons_count = 1;
}
if($admin->get_permission('languages') == true)
{
	if($addons_count == 1) { $addons_overview .= ', '; }
	$addons_overview .= '<a href="'.ADMIN_URL.'/languages/index.php">'.$oTrans->MENU_LANGUAGES.'</a>';
}

// Insert "Access" section overview (pretty complex compared to normal)
$access_overview = $oTrans->TEXT_MANAGE.' ';
$access_count = 0;
if($admin->get_permission('users') == true) {
	$access_overview .= '<a href="'.ADMIN_URL.'/users/index.php">'.$oTrans->MENU_USERS.'</a>';
	$access_count = 1;
}
if($admin->get_permission('groups') == true) {
	if($access_count == 1) { $access_overview .= ', '; }
	$access_overview .= '<a href="'.ADMIN_URL.'/groups/index.php">'.$oTrans->MENU_GROUPS.'</a>';
	$access_count = 1;
}

// Insert section names and descriptions
$oTpl->set_var(array(
					'PAGES'                => $oTrans->MENU_PAGES,
					'MEDIA'                => $oTrans->MENU_MEDIA,
					'ADDONS'               => $oTrans->MENU_ADDONS,
					'ACCESS'               => $oTrans->MENU_ACCESS,
					'PREFERENCES'          => $oTrans->MENU_PREFERENCES,
					'SETTINGS'             => $oTrans->MENU_SETTINGS,
					'ADMINTOOLS'           => $oTrans->MENU_ADMINTOOLS,
					'HOME_OVERVIEW'        => $oTrans->OVERVIEW_START,
					'PAGES_OVERVIEW'       => $oTrans->OVERVIEW_PAGES,
					'MEDIA_OVERVIEW'       => $oTrans->OVERVIEW_MEDIA,
					'ADDONS_OVERVIEW'      => $addons_overview,
					'ACCESS_OVERVIEW'      => $access_overview,
					'PREFERENCES_OVERVIEW' => $oTrans->OVERVIEW_PREFERENCES,
					'SETTINGS_OVERVIEW'    => $oTrans->OVERVIEW_SETTINGS,
					'ADMINTOOLS_OVERVIEW'  => $oTrans->OVERVIEW_ADMINTOOLS
				)
			);

// Parse template object
$oTpl->parse('main', 'main_block', false);
$oTpl->pparse('output', 'page');

// Print admin footer
$admin->print_footer();
