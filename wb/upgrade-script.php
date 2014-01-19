<?php
/**
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS HEADER.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * 
 * 
 * @category     Core
 * @package      Core_service
 * @subpackage   upgrade-script
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websitebaker.org>
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 17.01.2013
 * @deprecated   
 * @description  xyz
 */
include_once(dirname(__FILE__).'/framework/UpgradeHelper.php');
// PHP less then 5.3.2 is prohibited ---
if (version_compare(PHP_VERSION, '5.3.2', '<')) {
    $sMsg = '<p style="color: #ff0000;">WebsiteBaker 2.8.4 and above is not able to run with PHP-Version less then 5.3.2!!<br />'
          . 'Please change your PHP-Version to any kind from 5.3.2 and up!<br />'
          . 'If you have problems to solve that, ask your hosting provider for it.<br  />'
          . 'The very best solution is the use of PHP-5.4 and up</p>';
    die($sMsg);
}
// --- delete fatal disturbing files before upgrade starts -------------------------------
$aPreDeleteFiles = array(
// list of files
	dirname(__FILE__).'/framework/PasswordHash.php'
);
if(sizeof($aPreDeleteFiles > 0))
{
// if there are files defined
	$sMsg = '';
	foreach($aPreDeleteFiles as $sFileToDelete)
	{
	// iterate the list
		if(file_exists($sFileToDelete))
		{
			if(!is_writeable($sFileToDelete) || !@unlink($sFileToDelete))
			{
			// notice if deleting fails
				$sMsg .= '<span style="color:red;">FAILED</span> deleting: '
				       . $sFileToDelete.'<br />'.PHP_EOL;
			}
		}
	}
	if($sMsg) {
	// stop script if there's an error occured
		$sMsg = $sMsg.'<br />'.PHP_EOL.'Please delete all of the files above manually!';
		UpgradeHelper::dieWithMessage($sMsg);
	}
}
unset($aPreDeleteFiles);
$sMsg = '';
// ---------------------------------------------------------------------------------------
// Include config file
$config_file = dirname(__FILE__).'/config.php';
if (is_readable($config_file) && !defined('WB_URL')) {
	require_once($config_file);
}
$oReg = WbAdaptor::getInstance();
UpgradeHelper::checkSetupFiles(dirname(__FILE__).'/');

if (!class_exists('admin', false)) {
	include(WB_PATH.'/framework/class.admin.php');
}
$admin = new admin('Addons', 'modules', false, false);
// solved wrong pages_directory value before creating access files
$sql  = 'SELECT `value` FROM `'.TABLE_PREFIX.'settings` '
      . 'WHERE `name`=\'pages_directory\'';
$sPagesDirectory = WbDatabase::getInstance()->get_one($sql);
$sTmp = trim($sPagesDirectory, '/');
$sTmpDir = ($sTmp == '' ? '' : '/'.$sTmp);
if($sTmp != $sPagesDirectory) {
	$sql = 'UPDATE `'.TABLE_PREFIX.'settings` '
		 . 'SET `value` = \''.$sTmpDir.'\' '
		 . 'WHERE `name`=\'pages_directory\' ';
	WbDatabase::getInstance()->query($sql);
}
require_once(WB_PATH.'/framework/functions.php');
// require_once(WB_PATH.'/framework/Database.php');

$oldVersion  = 'Version '.WB_VERSION;
$oldVersion .= (defined('WB_SP') ? WB_SP : '');
$oldRevision = (defined('WB_REVISION') ? ' Revision ['.WB_REVISION.'] ' : '') ;
$newVersion  = 'Version '.VERSION;
$newVersion .= (defined('SP') ? SP : '');
$newRevision = (defined('REVISION') ? ' Revision ['.REVISION.'] ' : '');

$bDebugModus = false;

// set addition settings if not exists, otherwise upgrade will be breaks
if(!defined('WB_SP')) { define('WB_SP',''); }
if(!defined('WB_REVISION')) { define('WB_REVISION',''); }
// database tables including in WB package
$aPackage = array (
    'settings','groups','addons','pages','sections','search','users',
    'mod_captcha_control','mod_jsadmin','mod_menu_link','mod_output_filter','mod_wrapper','mod_wysiwyg'
);

$OK            = ' <span class="ok">OK</span> ';
$FAIL          = ' <span class="error">FAILED</span> ';
$DEFAULT_THEME = 'WbTheme';

$stepID = 1;
$dirRemove = array(
//			'[TEMPLATE]allcss/',
//			'[TEMPLATE]blank/',
//			'[TEMPLATE]round/',
//			'[TEMPLATE]simple/',
            '[TEMPLATE]wb_theme/',
			'[ADMIN]themes/'
		 );

$aRemoveSingleFiles = array(
			'[ADMIN]preferences/details.php',
			'[ADMIN]preferences/email.php',
			'[ADMIN]preferences/password.php',
			'[ADMIN]pages/settings2.php',
			'[ADMIN]users/users.php',
			'[ADMIN]groups/add.php',
			'[ADMIN]groups/groups.php',
			'[ADMIN]groups/save.php',
			'[ADMIN]skel/themes/htt/groups.htt',

			'[FRAMEWORK]class.msg_queue.php',
			'[FRAMEWORK]class.logfile.php',
			'[FRAMEWORK]PasswordHash.php',
			'[MODULES]droplets/js/mdcr.js'
);
// deleting files below only from less 2.8.4 stable
if(version_compare(WB_VERSION, '2.8.4', '<'))
{
	$aRemoveOldTemplates = array(
			'[TEMPLATE]argos_theme/templates/access.htt',
			'[TEMPLATE]argos_theme/templates/addons.htt',
			'[TEMPLATE]argos_theme/templates/admintools.htt',
			'[TEMPLATE]argos_theme/templates/error.htt',
			'[TEMPLATE]argos_theme/templates/groups.htt',
			'[TEMPLATE]argos_theme/templates/groups_form.htt',
			'[TEMPLATE]argos_theme/templates/languages.htt',
			'[TEMPLATE]argos_theme/templates/languages_details.htt',
			'[TEMPLATE]argos_theme/templates/login.htt',
			'[TEMPLATE]argos_theme/templates/login_forgot.htt',
			'[TEMPLATE]argos_theme/templates/media.htt',
			'[TEMPLATE]argos_theme/templates/media_browse.htt',
			'[TEMPLATE]argos_theme/templates/media_rename.htt',
			'[TEMPLATE]argos_theme/templates/modules.htt',
			'[TEMPLATE]argos_theme/templates/modules_details.htt',
			'[TEMPLATE]argos_theme/templates/pages.htt',
			'[TEMPLATE]argos_theme/templates/pages_modify.htt',
			'[TEMPLATE]argos_theme/templates/pages_sections.htt',
			'[TEMPLATE]argos_theme/templates/pages_settings.htt',
			'[TEMPLATE]argos_theme/templates/preferences.htt',
			'[TEMPLATE]argos_theme/templates/setparameter.htt',
			'[TEMPLATE]argos_theme/templates/settings.htt',
			'[TEMPLATE]argos_theme/templates/start.htt',
			'[TEMPLATE]argos_theme/templates/success.htt',
			'[TEMPLATE]argos_theme/templates/templates.htt',
			'[TEMPLATE]argos_theme/templates/templates_details.htt',
			'[TEMPLATE]argos_theme/templates/users.htt',
			'[TEMPLATE]argos_theme/templates/users_form.htt'
	);
}else {
	$aRemoveOldTemplates = array();
}
$aFilesToRemove = array_merge($aRemoveSingleFiles, $aRemoveOldTemplates);
unset($aRemoveSingleFiles);
unset($aRemoveOldTemplates);
/* display a status message on the screen **************************************
 * @param string $message: the message to show
 * @param string $class:   kind of message as a css-class
 * @param string $element: witch HTML-tag use to cover the message
 * @return void
 */
function status_msg($message, $class='check', $element='div')
{
	// returns a status message
	$msg  = '<'.$element.' class="'.$class.'">';
	$msg .= '<strong>'.strtoupper(strtok($class, ' ')).'</strong>';
	$msg .= $message.'</'.$element.'>';
	echo $msg;
}

/**
 * add_modify_field_in_database()
 *
 * @param mixed $sTable
 * @param mixed $sField
 * @param mixed $sDescription
 * @return
 */
function add_modify_field_in_database($sTable,$sField,$sDescription){
	global $OK,$FAIL,$bDebugModus;
	$database=WbDatabase::getInstance();
	$aDebugMessage = array();
	if(!$database->field_exists($sTable,$sField)) {
		$aDebugMessage[] = "<span>Adding field $sField to $sTable table</span>";
		$aDebugMessage[] = ($database->field_add($sTable, $sField, $sDescription) ? " $OK<br />" : " $FAIL!<br />");
	} else {
		$aDebugMessage[] = "<span>Modify field $sField to $sTable table</span>";
		$aDebugMessage[] = ($database->field_modify($sTable, $sField, $sDescription) ? " $OK<br />" : " $FAIL!<br />");
	}
	if($bDebugModus) {
		echo implode(PHP_EOL,$aDebugMessage);
	}
return;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Upgrade script</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
html { overflow-y: scroll; /* Force firefox to always show room for a vertical scrollbar */ }

body {
	margin:0;
	padding:0;
	border:0;
	background: #EBF7FC;
	color:#000;
	font-family: 'Trebuchet MS', Verdana, Arial, Helvetica, Sans-Serif;
	font-size: small;
	height:101%;
}

#container {
	min-width:48em;
    width: 70%;
	background: #A8BCCB url(<?php echo WB_URL; ?>/templates/<?php echo $DEFAULT_THEME; ?>/images/background.png) repeat-x;
	border:1px solid #000;
	color:#000;
	margin:2em auto;
	padding:0 20px;
	min-height: 500px;
	text-align:left;
}
.page {
	width:100%;
    overflow: hidden;
}
.content {
    padding: 10px;
}
p { line-height:1.5em; }

form {
	display: inline-block;
	line-height: 20px;
	vertical-align: baseline;
}
input[type="submit"].restart {
	background-color: #FFDBDB;
	font-weight: bold;
}

h1,h2,h3,h4,h5,h6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #26527D;
	margin-top: 1.0em;
	margin-bottom: 0.1em;
}

h1 { font-size:150%; }
h2 { font-size: 130%; border-bottom: 1px #CCC solid; }
h3 { font-size: 110%; font-weight: bold; }

textarea {
	width:100%;
	border: 2px groove #0F1D44;
	padding: 2px;
	color: #000;
	font-weight: normal;
}
.ok, .error { font-weight:bold; }
.ok { color:green; }
.error { color:red; }
.check { color:#555; }

span.ok,
span.error {
    margin-left: 0em;
}

.warning {
	background:#FFDBDB;
	padding:1em;
	margin-top:0.5em;
	border: 1px solid #DB0909;
}
.info {
	background:#C7F4C7;
	padding:1em;
	margin-top:0.5em;
	border: 1px solid #277A29;
}

</style>
</head>
<body>
<div id="container">
<div class="page">
<img src="<?php echo WB_URL; ?>/templates/<?php echo $DEFAULT_THEME; ?>/images/logo.png" alt="WebsiteBaker Project" />
<div class="content">
<h1>WebsiteBaker Upgrade</h1>
<?php
	if( version_compare( WB_VERSION, '2.7', '<' )) {
		status_msg('<br />It is not possible to upgrade from WebsiteBaker Versions before 2.7.<br />For upgrading to version '.VERSION.' you must upgrade first to v.2.7 at least!!!', 'warning', 'div');
		echo "</div>
		</div>
		</div>
		</body>
		</html>
		";
		exit();
	}
if($admin->get_user_id()!=1){
	status_msg('<br /><h3>WebsiteBaker upgrading is not possible!<br />Before upgrading '
	          .'to Revision '.REVISION.' you have to login as System-Administrator!</h3>',
	           'warning', 'div');
	echo '<br /><br />';
// delete remember key of current user from database
	//if (isset($_SESSION['USER_ID']) && isset($database)) {
	//	$table = TABLE_PREFIX . 'users';
	//	$sql = "UPDATE `$table` SET `remember_key` = '' WHERE `user_id` = '" . (int) $_SESSION['USER_ID'] . "'";
	//	$database->query($sql);
	//}
// delete remember key cookie if set
	if (isset($_COOKIE['REMEMBER_KEY']) && !headers_sent() ) {
		setcookie('REMEMBER_KEY', '', time() - 3600, '/');
	}
	// delete most critical session variables manually
	$_SESSION['USER_ID'] = null;
	$_SESSION['GROUP_ID'] = null;
	$_SESSION['GROUPS_ID'] = null;
	$_SESSION['USERNAME'] = null;
	$_SESSION['PAGE_PERMISSIONS'] = null;
	$_SESSION['SYSTEM_PERMISSIONS'] = null;
	// overwrite session array
	$_SESSION = array();
	// delete session cookie if set
	if (isset($_COOKIE[session_name()]) && !headers_sent()) {
		setcookie(session_name(), '', time() - 42000, '/');
	}
	// delete the session itself
	session_destroy();
	status_msg('<br /><h3>You have to login as System-Adminstrator start '
	          .'upgrade-script.php again!</h3>',
	           'info', 'div');
	echo '<br /><br />';
	if(defined('ADMIN_URL')) {
		echo '<form action="'.ADMIN_URL.'/index.php" method="post">'
		    .'&nbsp;<input name="backend_send" type="submit" value="Kick me to the Login" />'
		    .'</form>';
	}
	echo '<br /><br /></div>'
	    .'</div>'
	    .'</div>'
	    .'</body>'
	    .'</html>';
	exit();
}

?>
<p class="info">This script upgrades an existing WebsiteBaker <strong> <?php echo $oldRevision; ?></strong> installation to the <strong> <?php echo $newRevision ?> </strong>.<br />The upgrade script alters the existing WB database to reflect the changes introduced with WB 2.8.x</p>

<?php

/**
 * Check if disclaimer was accepted
 */
$bDebugModus = false;
$bDebugModus = ( (isset($_POST['debug_confirmed']) && $_POST['debug_confirmed'] == 'debug') ? true : false);
if (!(isset($_POST['backup_confirmed']) && $_POST['backup_confirmed'] == 'confirmed')) { ?>
<h2>Step 1: Backup your files</h2>
<h5 class="warning">It is highly recommended to <strong>create a manual backup</strong> of the entire <strong class="error"><?php echo  PAGES_DIRECTORY ?>/</strong> folder and the <strong>MySQL database</strong> before proceeding.</h5>
<p><strong class="error">Note: </strong>The upgrade script alters some settings of your existing database!!! You need to confirm the disclaimer before proceeding.</p>

<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
<textarea cols="92" rows="5">DISCLAIMER: The WebsiteBaker upgrade script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. One needs to confirm that a manual backup of the <?php echo  PAGES_DIRECTORY ?>/ folder (including all files and subfolders contained in it) and backup of the entire WebsiteBaker MySQL database was created before you can proceed.</textarea>
<br /><br /><input name="backup_confirmed" type="checkbox" value="confirmed" />&nbsp;<strong>I confirm that a manual backup of the <?php echo  PAGES_DIRECTORY ?>/ folder and the MySQL database was created.</strong>
<br /><br /><input name="debug_confirmed" type="checkbox" value="debug" />&nbsp;<strong>Here you can get more details during running upgrade.</strong>
<br /><br /><input name="send" type="submit" value="Start upgrade script" />
</form>
<br />

<?php
	status_msg('<strong> Notice:</strong><br />You need to confirm that you have created '
			  .'a manual backup of the '.PAGES_DIRECTORY.'/ directory and the MySQL '
	          .'database before you can proceed.',
	           'warning', 'div');
	echo '<br /><br /></div>'
	    .'</div>'
	    .'</div>'
	    .'</body>'
	    .'</html>';
	exit();
}

/**********************************************************
 *  - check tables coming with WebsiteBaker
 */
	$aMissingTables = UpgradeHelper::getMissingTables($aPackage);
	if( sizeof($aMissingTables) == 0){
        echo '<h4 style="margin-left:0;">NOTICE: '.sizeof($aPackage).' total tables '
		    .'included in package are successfully installed into your database `'
		    .$database->DbName.'` '.$OK.'</h4>';
    } else {
        status_msg('<strong>:</strong><br />can\'t run Upgrade, missing tables', 'warning', 'div');
        echo '<h4>Missing required tables. You can install them in backend->addons->modules.<br />'
            .'Or if you uploaded per FTP install possible by backend->addons->modules->advanced.<br />'
            .'First rename or delete the upgrade-script.php, so the script can\'t start automatically by backend<br />'
            .'After installing missing tables upload and run again upgrade-script.php<br /><br /></h4>'
            .'<h4 class="warning">'
            .'Missing required tables.<br /><br />'
            .'TABLE `'.implode('` missing! '.$FAIL.'<br />TABLE `',$aMissingTables).'` missing! '.$FAIL
            .'<br /><br /></h4>'
            .'<br /><br />';
        if(isset($_SERVER['SCRIPT_NAME'])) {
        	echo '<form action="'.$_SERVER['SCRIPT_NAME'].'/">'
        	    .'&nbsp;<input type="submit" value="Start upgrade again" />'
        	    .'</form>';
        }
        if(defined('ADMIN_URL')) {
        	echo '<form action="'.ADMIN_URL.'/index.php" method="post">'
        	    .'&nbsp;<input name="backend_send" type="submit" value="kick me to the Backend" />'
        	    .'</form>';
        }
        echo '<br /><br /></div>'
            .'</div>'
            .'</div>'
            .'</body>'
            .'</html>';
		exit();
	}

	echo '<h3>Step '.(++$stepID).': Setting default_theme</h3>';
	$aDebugMessage = array();
	/**********************************************************
	 *  - Adding field default_theme to settings table
	 */
	$aDebugMessage[] = '<div style="margin-left:2em;">';
	$aDebugMessage[] = "<span><strong>Adding default_theme to table settings</strong></span>";
	// db_update_key_value('settings', 'default_theme', $DEFAULT_THEME);
	$cfg = array(
		'default_theme' => $DEFAULT_THEME
	);
	$aDebugMessage[] = (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");
	$aDebugMessage[] = '</div>';

	echo implode(PHP_EOL,$aDebugMessage);

	$aDebugMessage = array();
	echo'<h3>Step '.(++$stepID).': Updating core table included in package</h3>';
	/**********************************************************
	 *  - Adding field sec_anchor to settings table
	 */
	echo '<div style="margin-left:2em;">';
	echo "<h4>Adding/updating entries on table settings</h4>";
	$aDebugMessage[] = "<span>Adding/updating sec_anchor to settings table</span>";
	$cfg = array(
		'sec_anchor' => defined( 'SEC_ANCHOR' )&& (SEC_ANCHOR!='') ? SEC_ANCHOR : 'Sec'
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding redirect timer to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating redirect timer to settings table</span>";
	$cfg = array(
		'redirect_timer' => defined('REDIRECT_TIMER')&& (REDIRECT_TIMER!='') ? REDIRECT_TIMER : '1500'
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding default_time_formatr to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating default_time_format to settings table</span>";
	$cfg = array(
		'default_time_format' => defined('DEFAULT_TIME_FORMAT')&& (DEFAULT_TIME_FORMAT!='') ? DEFAULT_TIME_FORMAT : 'h:i A'
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding rename_files_on_upload to settings table
	 */
	$aDebugMessage[] = "<span>Adding/Updating rename_files_on_upload to settings table</span>";
	$cfg = array(
	    'rename_files_on_upload' => (defined('RENAME_FILES_ON_UPLOAD')&& (RENAME_FILES_ON_UPLOAD!='') ? RENAME_FILES_ON_UPLOAD : 'ph.*?,cgi,pl,pm,exe,com,bat,pif,cmd,src,asp,aspx,js')
	);
	if( version_compare( WB_VERSION, '2.8.2', '<' )) {
		$cfg = array(
		    'rename_files_on_upload' => 'ph.*?,cgi,pl,pm,exe,com,bat,pif,cmd,src,asp,aspx,js'
		);
	}
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding mediasettings to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating mediasettings to settings table</span>";
	$cfg = array(
		'mediasettings' => (defined('MEDIASETTINGS')&& (MEDIASETTINGS!='') ? MEDIASETTINGS : ''),
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding fingerprint_with_ip_octets to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating fingerprint_with_ip_octets to settings table</span>";
	$cfg = array(
		'fingerprint_with_ip_octets' => (defined('FINGERPRINT_WITH_IP_OCTETS') ? FINGERPRINT_WITH_IP_OCTETS : '2'),
		'secure_form_module' => (defined('SECURE_FORM_MODULE') ? SECURE_FORM_MODULE : '')
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding page_icon_dir to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating page_icon_dir to settings table</span>";
	$cfg = array(
		'page_icon_dir' => (defined('PAGE_ICON_DIR')&& (PAGE_ICON_DIR!='') ? PAGE_ICON_DIR : '/templates/*/title_images'),
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");
	/**********************************************************
	 *  - Adding page_extended to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating page_extendet to settings table</span>";
	$cfg = array(
		'page_extendet' => (defined('PAGE_EXTENDET') ? PAGE_EXTENDET : 'true'),
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding wbmail_signature to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating wbmail_signature to settings table</span>";
	$cfg = array(
		'wbmail_signature' => (defined('WBMAIL_SIGNATURE')&& (WBMAIL_SIGNATURE!='') ? WBMAIL_SIGNATURE : '')
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding confirmed_registration to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating confirmed_registration to settings table</span>";
	$cfg = array(
		'confirmed_registration' => (defined('CONFIRMED_REGISTRATION') ? CONFIRMED_REGISTRATION : '0')
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding dev_infos to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating dev_infos to settings table</span>";
	$cfg = array(
		'dev_infos' => (defined('DEV_INFOS') ? DEV_INFOS : 'false')
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding server_timezone to settings table
	 */
	$aDebugMessage[] = "<span>Adding/updating server_timezone to settings table</span>";
	$cfg = array(
		'server_timezone' => (defined('SERVER_TIMEZONE') ? SERVER_TIMEZONE : 'UTC')
	);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Adding password settings to table settings
	 */
	$aDebugMessage[] = "<span>Adding/updating password settings to settings table</span>";
	$cfg = array();
	$cfg['password_crypt_loops'] = (defined('PASSWORD_CRYPT_LOOPS') ? PASSWORD_CRYPT_LOOPS : '12');
	$cfg['password_hash_type'] = (defined('PASSWORD_HASH_TYPES') ? PASSWORD_HASH_TYPES : 'false');
	$cfg['password_length'] = (defined('PASSWORD_LENGTH') ? PASSWORD_LENGTH : '10');
	$cfg['password_use_types'] = (defined('PASSWORD_USE_TYPES') ? PASSWORD_USE_TYPES : (int)0xFFFF);
	$bLogStatus = (db_update_key_value( 'settings', $cfg ) ? true : false );
	$aDebugMessage[] = ( ($bLogStatus==true ) ? " $OK<br />" : " $FAIL!<br />");

if($bDebugModus) {
    echo implode(PHP_EOL,$aDebugMessage);
} else {
        echo '<strong>Successfully upgraded</strong>'." $OK<br />";	   
	}
echo '</div>';

$aDebugMessage = array();
if(version_compare(WB_REVISION, REVISION, '<='))
{
	echo '<div style="margin-left:2em;">';
	/**********************************************************
	 *  - Update search no results database filed to create
	 *  valid XHTML if search is empty
	 */
	if (version_compare(WB_VERSION, '2.8', '<'))
	{
		echo "<h4>Adding/updating fields on table search</h4>";
		echo "Updating database field `no_results` on search table: ";
		$search_no_results = addslashes('<tr><td><p>[TEXT_NO_RESULTS]</p></td></tr>');
		$sql  = 'UPDATE `'.TABLE_PREFIX.'search` ';
		$sql .= 'SET `value`=\''.$search_no_results.'\' ';
		$sql .= 'WHERE `name`=\'no_results\'';
		echo ($database->query($sql)) ? " $OK<br />" : " $FAIL!<br />";
	}

	$aDebugMessage = array();
	echo "<h4>Adding/updating field on table pages</h4>";
	/**********************************************************
	 *  - Add field "page_trail" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'page_trail';
	$description = "VARCHAR( 255 ) NOT NULL DEFAULT ''";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "page_icon" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'page_icon';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `page_title`";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "menu_icon_0" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'menu_icon_0';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `menu_title`";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "menu_icon_1" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'menu_icon_1';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `menu_icon_0`";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "tooltip" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'tooltip';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `menu_icon_1`";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "admin_groups" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'admin_groups';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '1'";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "admin_users" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'admin_users';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT ''";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "viewing_groups" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'viewing_groups';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '1'";
	 add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "viewing_users" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'viewing_users';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT ''";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "custom01" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'custom01';
	$description = "VARCHAR( 255 ) NOT NULL DEFAULT '' ";
	add_modify_field_in_database($table_name,$field_name,$description);

	/**********************************************************
	 *  - Add field "custom02" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'custom02';
	$description = "VARCHAR( 255 ) NOT NULL DEFAULT '' ";
	add_modify_field_in_database($table_name,$field_name,$description);

	if($bDebugModus) {
		echo implode(PHP_EOL,$aDebugMessage);
	} else {
        echo '<strong>Successfully upgraded</strong>'." $OK<br />";	   
	}

	$aDebugMessage = array();
	/**********************************************************
	 * modify wrong strucre on table sections
	 * wrong structure let crash wb
	 */
	echo "<h4>Change field structure on table sections</h4>";
	$table_name = TABLE_PREFIX.'sections';
	$description = "VARCHAR( 255 ) NOT NULL DEFAULT ''";
	$aDebugMessage[] = "<span>Modify field module on sections table</span>";
	$aDebugMessage[] = ($database->field_modify($table_name, 'module', $description) ? " $OK<br />" : " $FAIL!<br />");
	$aDebugMessage[] = "<span>Modify field block on sections table</span>";
	$description = "int(11) NOT NULL DEFAULT '1'";
	$aDebugMessage[] = ($database->field_modify($table_name, 'block', $description) ? " $OK<br />" : " $FAIL!<br />");
	$description = "int(11) NOT NULL DEFAULT '0'";
	$aDebugMessage[] = "<span>Modify field publ_start on sections table</span>";
	$aDebugMessage[] = ($database->field_modify($table_name, 'publ_start', $description) ? " $OK<br />" : " $FAIL!<br />");
	$aDebugMessage[] = "<span>Modify field publ_end on sections table</span>";
	$aDebugMessage[] = ($database->field_modify($table_name, 'publ_end', $description) ? " $OK<br />" : " $FAIL!<br />");

	if($bDebugModus) {
		echo implode(PHP_EOL,$aDebugMessage);
	} else {
        echo '<strong>Successfully upgraded</strong>'." $OK<br />";	   
	}
	echo '</div>';
}
if(version_compare(WB_REVISION, REVISION, '<='))
{
	$aDebugMessage = array();
	echo '<h3>Step '.(++$stepID).': Updating structure in table users/groups</h3>';
	/**********************************************************
	 * Modify Administrator on groups table
	 */
	echo '<div style="margin-left:2em;">';
	echo "<h4>Updating Administrator group permissions on table groups</h4>";
	$aDebugMessage[] = "<span>Modify Administrator on groups table</span>";
	$sModulePermissions = '';
	$sTemplatePermissions = '';
	$sSystemPermissions  = 'access,addons,admintools,admintools_view,groups,groups_add,groups_delete,groups_modify,groups_view,';
	$sSystemPermissions .= 'languages,languages_install,languages_uninstall,languages_view,media,media_create,media_delete,media_rename,media_upload,media_view,';
	$sSystemPermissions .= 'modules,modules_advanced,modules_install,modules_uninstall,modules_view,pages,pages_add,pages_add_l0,pages_delete,pages_intro,pages_modify,pages_settings,pages_view,';
	$sSystemPermissions .= 'preferences,preferences_view,settings,settings_advanced,settings_basic,settings_view,templates,templates_install,templates_uninstall,templates_view,users,users_add,users_delete,users_modify,users_view';

	$sql  = 'UPDATE `'.TABLE_PREFIX.'groups` ';
	$sql .= 'SET `name` = \'Administrators\', ';
	$sql .= '`system_permissions` = \''.$sSystemPermissions.'\', ';
	$sql .= '`module_permissions` = \''.$sModulePermissions.'\', ';
	$sql .= '`template_permissions` = \''.$sTemplatePermissions.'\' ';
	$sql .= 'WHERE `group_id` = \'1\' ';
	$aDebugMessage[] = ($database->query($sql)) ? " $OK<br />" : " $FAIL!<br />";
	if( ($admin->is_authenticated() == true) && ($admin->ami_group_member('1') ) ) {
	    $_SESSION['SYSTEM_PERMISSIONS'] = array_merge($_SESSION['SYSTEM_PERMISSIONS'], explode(',', $sSystemPermissions));
	}

	if($bDebugModus) {
		echo implode(PHP_EOL,$aDebugMessage);
	} else {
        echo '<strong>Successfully upgraded</strong>'." $OK<br />";	   
	}
	echo '</div>';
	$aDebugMessage = array();
	/**********************************************************
	 *   `confirm_code` VARCHAR(32) NOT NULL DEFAULT '',
	 *   `confirm_timeout` INT(11) NOT NULL DEFAULT '0',
	 */
	echo '<div style="margin-left:2em;">';
	echo "<h4>Change field structure on table users</h4>";
	$table_name = TABLE_PREFIX.'users';
	$field_name = 'confirm_code';
	$description = "VARCHAR( 32 ) NOT NULL DEFAULT '' AFTER `password` ";
	add_modify_field_in_database($table_name,$field_name,$description);

	$table_name = TABLE_PREFIX.'users';
	$field_name = 'confirm_timeout';
	$description = "INT(11) NOT NULL DEFAULT '0' AFTER `confirm_code` ";
	add_modify_field_in_database($table_name,$field_name,$description);

	if($bDebugModus) {
	    echo implode(PHP_EOL,$aDebugMessage);
	} else {
        echo '<strong>Successfully upgraded</strong>'." $OK<br />";	   
	}
	echo '</div>';

	$aDebugMessage = array();
	/**********************************************************
	* Updating group_id in table users
	*/
	echo '<div style="margin-left:2em;">';
	echo "<h4>Updating users groups permissions on table groups</h4>";
	    $aUsers = array();
		// Get existing values
        $sql  = 'SELECT * FROM `'.TABLE_PREFIX.'users` ' ;
        $sql .= 'WHERE `user_id` != 1 ';
        if($oUser = $database->query($sql)){
            $iTotalUsers = $oUser->numRows();
            while($Users = $oUser->fetchRow(MYSQL_ASSOC)) {
                $aUsers[$Users['user_id']]['groups_id'] = $Users['groups_id'];
                $aUsers[$Users['user_id']]['display_name'] = $Users['display_name'];
            }
        } else {
            $aDebugMessage[] = $database->is_error()==false ? " $OK<br />" : " $FAIL!<br />";
        }
        foreach($aUsers AS $user_id => $value){
                // choose group_id from groups_id - workaround for still remaining calls to group_id (to be cleaned-up)
                $aGroups_id = explode(',', $aUsers[$user_id]['groups_id']);
                $groups_id = $aUsers[$user_id]['groups_id'];
                $group_id = 0;
                //if user is in administrator-group, get this group else just get the first one
                if($admin->is_group_match($aGroups_id,'1')) { $group_id = 1; $groups_id = '1'; } else { $group_id = intval($aGroups_id[0]); }
                $sMessage = "<span>Updating group_id ".$TEXT['DISPLAY_NAME']." " .$aUsers[$user_id]['display_name']."</span>";
                $sql  = 'UPDATE `'.TABLE_PREFIX.'users` ';
                $sql .= 'SET `group_id`  = '.$group_id.', ';
                $sql .=     '`groups_id` = \''.$groups_id.'\' ';
                $sql .= 'WHERE `user_id` = '.intval($user_id);
                if($oRes = $database->query($sql)){  }
                $aDebugMessage[] = $database->is_error()==false ? $sMessage." $OK<br />" : $sMessage." $FAIL!<br />";
        }
        unset($aUsers);
	$aDebugMessage[] = '</div>';

	if($bDebugModus) {
	// $aDebugMessage[] =
	    echo implode(PHP_EOL,$aDebugMessage);
	}else {
	    echo '<span><strong>'.$iTotalUsers.' users updating the groups</strong></span>'." $OK<br />";
	    echo '</div>';
	}
}

$aDebugMessage = array();
echo '<h3>Step '.(++$stepID).': Updating access files in folders</h3>';

echo '<div style="margin-left:2em;">';
	/**********************************************************
	* upgrade media directory index protect files
	*/
//	echo '<h4>Upgrade media directory '.MEDIA_DIRECTORY.'/ index.php protect files</h4>';
//	$aDebugMessage = rebuildFolderProtectFile();
//	if( sizeof( $aDebugMessage ) ){
//		echo '<span><strong>Upgrade '.sizeof( $aDebugMessage ).' directory '.MEDIA_DIRECTORY.'/ protect files</strong></span>'." $OK<br />";
//	} else {
//		echo '<span><strong>Upgrade directory '.MEDIA_DIRECTORY.'/ protect files</strong></span>'." $FAIL!<br />";
//		echo implode ('<br />',$aDebugMessage);
//	}
//
//    $aDebugMessage = array();
    /**********************************************************
     * upgrade pages directory index access files
     */
	echo '<h4>Upgrade pages directory '.PAGES_DIRECTORY.'/  access files</h4>';

	/**********************************************************
	 * Repair inconsistent PageTree
	 */
	$iCount = UpgradeHelper::sanitizePagesTreeLinkStructure();
	if (false === $iCount) {
		echo '<span><strong>Repair PageTree links </strong></span> '.$FAIL.'<br />';
	} else {
		echo '<span><strong>'.$iCount.' PageTree links repaired.</strong></span> '.$OK.'<br />';
	}
    /**********************************************************
     *  - Reformat/rebuild all existing access files
     */
    $msg = rebuild_all_accessfiles($bDebugModus);
	echo '<strong>'.implode ('<br />',$msg).'</strong>';
    echo '</div>';

	/* *****************************************************************************
	 * - check for deprecated / never needed files
	 */
	$iLoaded = sizeof($aFilesToRemove);
	if($iLoaded) {
		echo '<h3>Step '.(++$stepID).': Remove deprecated and outdated files</h3>';
		$iFailed = 0;
		$iFound = 0;
		$searches = array(
			'[ADMIN]',
			'[MEDIA]',
			'[PAGES]',
			'[FRAMEWORK]',
			'[MODULES]',
			'[TEMPLATE]'
		);
		$replacements = array(
            $oReg->AcpDir,
            $oReg->MediaDir,
            $oReg->PagesDir,
			'framework/',
			'modules/',
			'templates/'
		);

		$msg = '';
		echo '<div style="margin-left:2em;">';
		echo '<h4>Search '.$iLoaded.' deprecated and outdated files</h4>';
		foreach( $aFilesToRemove as $file )
		{
			$file = str_replace($searches, $replacements, $file);
			if( is_writable($oReg->AppDir.$file) ) {
				$iFound++;
				// try to unlink file
				if(!unlink($oReg->AppDir.$file)) {
					$iFailed++;
				}
			}
			if( is_readable($oReg->AppDir.$file) ) {
				// save in err-list, if failed
				$msg .= $file.'<br />';
			}
		}
		$iRemove = $iFound-$iFailed;
		echo '<strong>Remove '.$iRemove.' from '.$iFound.' founded</strong> ';
		echo ($iFailed == 0) ? $OK : $FAIL;
		echo '</div>';

		if($msg != '')
		{
			$msg = '<br /><br />Following files are deprecated, outdated or a security risk and
				    can not be removed automatically.<br /><br />Please delete them
					using FTP and restart upgrade-script!<br /><br />'.$msg.'<br />';
			status_msg($msg, 'error warning', 'div');
			echo '<p style="font-size:120%;"><strong>WARNING: The upgrade script failed ...</strong></p>';

			echo '<form action="'.$_SERVER['SCRIPT_NAME'].'">';
			echo '&nbsp;<input name="send" type="submit" value="Restart upgrade script" />';
			echo '</form>';
			echo "<br /><br /></div>
			</div>
			</div>
			</body>
			</html>";
			exit;
		}
	}


	/**********************************************************
	 * - check for deprecated / never needed folders
	 */
	$iLoaded = sizeof($dirRemove);
	if($iLoaded) {
		echo '<h3>Step  '.(++$stepID).': Remove deprecated and outdated folders</h3>';
		$iFailed = 0;
		$iFound = 0;
		$searches = array(
			'[ADMIN]',
			'[MEDIA]',
			'[PAGES]',
			'[FRAMEWORK]',
			'[MODULES]',
			'[TEMPLATE]'
		);
		$replacements = array(
            $oReg->AcpDir,
            $oReg->MediaDir,
            $oReg->PagesDir,
			'framework/',
			'modules/',
			'templates/'
		);
		$msg = '';
		echo '<div style="margin-left:2em;">';
		echo '<h4>Search '.$iLoaded.' deprecated and outdated folders</h4>';
		foreach( $dirRemove as $sRootDir ) {
			$sRootDir = str_replace($searches, $replacements, $sRootDir);
            if (file_exists($oReg->AppPath.$sRootDir)) {
                if (!UpgradeHelper::delTree($oReg->AppPath.$sRootDir, UpgradeHelper::DEL_ROOT_DELETE)) {
                    $iFailed = sizeof(($msg = UpgradeHelper::getDelTreeLog()));
                    $msg = implode('<br />', $msg);
                }
            }
        }
		echo ($iFailed == 0) ? $OK : $FAIL;
		echo '</div>';
		if($msg != '') {
			$msg = '<br /><br />Following directories are deprecated, outdated or a security risk and
					can not be removed automatically.<br /><br />Please delete them
					using FTP and restart upgrade-script!<br /><br />'.$msg.'<br />';
			status_msg($msg, 'error warning', 'div');
			echo '<p style="font-size:120%;"><strong>WARNING: The upgrade script failed ...</strong></p>';
			echo '<form action="'.$_SERVER['SCRIPT_NAME'].'">';
			echo '&nbsp;<input name="send" type="submit" value="Restart upgrade script" />';
			echo '</form>';
			echo "<br /><br /></div>
			</div>
			</div>
			</body>
			</html>";
			exit;
		}
	}

	/**********************************************************
	 * upgrade modules if newer version is available
	 * $aModuleList list of proofed modules
	 */
	$aProofedModuleList = array(
	              'captcha_control','code','droplets','form','jsadmin',
	              'menu_link','news','output_filter','wrapper','wysiwyg','MultiLingual');
	if(sizeof($aProofedModuleList)) 
	{
		echo '<h3>Step '.(++$stepID).': Upgrade proofed modules</h3>';
		foreach($aProofedModuleList as $sModul) {
			if(file_exists(WB_PATH.'/modules/'.$sModul.'/upgrade.php')) {
				$currModulVersion = get_modul_version ($sModul, false);
				$newModulVersion =  get_modul_version ($sModul, true);
				if((version_compare($currModulVersion, $newModulVersion) <= 0)) {
					echo '<div style="margin-left:2em;">';
					echo '<h4>'.'Upgrade module \''.$sModul.'\' version '.$newModulVersion.'</h4>';
					require(WB_PATH.'/modules/'.$sModul.'/upgrade.php');
					echo '</div>';
				}
			}
		}
	}

	/**********************************************************
	 * Reformat/rebuild all existing moules access files
	 * $aModuleList list of modules
	 */
	$aModuleList = array('bakery','topics','news');
	if(sizeof($aModuleList)) 
	{
		echo '<h3>Step '.(++$stepID).': Create/Reorg Accessfiles from modules</h3>';
		foreach($aModuleList as $sModul) {
			$aReturnMsg = array();
			$sModulReorg = 'm_'.$sModul.'_Reorg';
			if(class_exists($sModulReorg)) {
				$sModulVersion =  get_modul_version ($sModul, true);
				echo '<div style="margin-left:2em;">';
				echo '<h4>'.'Create/Reorg Accessfiles for module \''.$sModul.'\' version '.$sModulVersion.'</h4>';
				$oReorg = new $sModulReorg(ModuleReorgAbstract::LOG_EXTENDED);
				$aReturnMsg = $oReorg->execute(); // show details
                $aReport = $oReorg->getReport();
                unset($oReorg);
                if($bDebugModus) {
                    foreach($aReport['Failed'] as $sValue) {
                        echo $sValue.'<br />';
                    }
                    foreach($aReport['Success'] as $sValue) {
                        echo $sValue.'<br />';
                    }
    			}
//				echo '<strong>'.$aReport['FilesDeleted'].' Files successful deleted</strong><br />';
				echo '<strong>Number of new formated access files: '.$aReport['FilesCreated'].'</strong><br />';

				echo '</div>';
			}
		}
	}
/**********************************************************
 *  - Reload all addons
 */

	echo '<h3>Step '.(++$stepID).' : Reload all addons database entry (no upgrade)</h3><br />';
	echo '<div style="margin-left:2em;">';
	$iFound = 0;
	$iLoaded = 0;
	////delete modules
	//$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'module'");
	// Load all modules
	if( ($handle = opendir(WB_PATH.'/modules/')) ) {
		while(false !== ($file = readdir($handle))) {
			if($file != '' && substr($file, 0, 1) != '.' && is_dir(WB_PATH.'/modules/'.$file) ) {
				$iFound++;
				$iLoaded = load_module(WB_PATH.'/modules/'.$file ) ? $iLoaded+1 : $iLoaded;
// 	upgrade_module($file, true);
			}
		}
		closedir($handle);
	}
	echo '<strong><span>'.$iLoaded.' Modules reloaded,</span> found '.$iFound.' directories in folder /modules/</strong><br />';

	$iFound = 0;
	$iLoaded = 0;
	////delete templates
	//$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'template'");
	// Load all templates
	if( ($handle = opendir(WB_PATH.'/templates/')) ) {
		while(false !== ($file = readdir($handle))) {
			if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {

				$iFound++;
				$iLoaded = (load_template(WB_PATH.'/templates/'.$file)==true) ? $iLoaded+1 : $iLoaded;

			}
		}
		closedir($handle);
	}
	echo '<strong><span>'.$iLoaded.' Templates reloaded,</span> found '.$iFound.' directories in folder /templates/</strong><br />';
	$iFound = 0;
	$iLoaded = 0;
	////delete languages
	//$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'language'");
	// Load all languages
	if( ($handle = opendir(WB_PATH.'/languages/')) ) {
		while(false !== ($file = readdir($handle))) {
			if($file != '' AND (preg_match('#^([A-Z]{2}.php)#', basename($file)))) {
				$iFound++;
				$iLoaded = load_language(WB_PATH.'/languages/'.$file) ? $iLoaded+1 : $iLoaded;
			}
		}
		closedir($handle);
	}
	echo '<strong><span>'.$iLoaded.' Languages reloaded,</span> found '.$iFound.' files in folder /languages/</strong><br />';
	$sTransCachePath = WB_PATH.'/temp/TranslationTable/cache/';
	if (is_writeable($sTransCachePath)) {
		if (rm_full_dir($sTransCachePath, true)) {
			echo '<strong><span>Translation Cache cleaned</span></strong> '.$OK.'<br />';
		} else {
			echo '<strong><span>Clean Translation Cache</span></strong> '.$FAIL.'<br />';
		}
	}
	echo '</div>';

/**********************************************************
 *  - install new droplets
	$drops = (!in_array ( "mod_droplets", $all_tables)) ? "<br />Install droplets<br />" : "<br />Upgrade droplets<br />";
	echo $drops;
	$file_name = (!in_array ( "mod_droplets", $all_tables) ? "install.php" : "upgrade.php");
	require_once (WB_PATH."/modules/droplets/".$file_name);
********************************************************** */

/**********************************************************
 *  - End of upgrade script
 */
	if(!defined('DEFAULT_THEME')) { define('DEFAULT_THEME', $DEFAULT_THEME); }
	if(!defined('THEME_PATH')) { define('THEME_PATH', WB_PATH.'/templates/'.DEFAULT_THEME);}
/**********************************************************
 *  - Set Version to new Version
 */
echo '<h3>Step '.(++$stepID).': Update database version number </h3>';
echo '<div style="margin-left:2em;">';

$cfg = array(
	'wb_version' => VERSION,
	'wb_revision' => REVISION,
	'wb_sp' => SP
);
echo '<br /><span><strong>Set WebsiteBaker version number to '.VERSION.' '.SP.' '.' Revision ['.REVISION.'] : </strong></span>';
echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");
echo '</div>';

echo '<p style="font-size:140%;"><strong>Congratulations: The upgrade script is finished ...</strong></p>';
status_msg('<strong>:</strong><br />Please delete the file <strong>upgrade-script.php</strong> via FTP before proceeding.', 'warning', 'div');
// show buttons to go to the backend or frontend
echo '<br />';

if(defined('WB_URL')) {
	echo '<form action="'.WB_URL.'/">';
	echo '&nbsp;<input type="submit" value="kick me to the Frontend" />';
	echo '</form>';
}
if(defined('ADMIN_URL')) {
	echo '<form action="'.ADMIN_URL.'/">';
	echo '&nbsp;<input type="submit" value="kick me to the Backend" />';
	echo '</form>';
}

echo "<br /><br /></div>
</div>
</div>
</body>
</html>
";
exit();