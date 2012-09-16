<?php
/**
 *
 * @category        backend
 * @package         installation
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

require_once('config.php');

require_once(WB_PATH.'/framework/functions.php');
require_once(WB_PATH.'/framework/class.admin.php');
// require_once(WB_PATH.'/framework/Database.php');
$admin = new admin('Addons', 'modules', false, false);

$oldVersion  = 'Version '.WB_VERSION;
$oldVersion .= (defined('WB_SP') ? WB_SP : '');
$oldRevision = (defined('WB_REVISION') ? ' Revision ['.WB_REVISION.'] ' : '') ;
$newVersion  = 'Version '.VERSION;
$newVersion .= (defined('SP') ? SP : '');
$newRevision = (defined('REVISION') ? ' Revision ['.REVISION.'] ' : '');

// set addition settings if not exists, otherwise upgrade will be breaks
if(!defined('WB_SP')) { define('WB_SP',''); }
if(!defined('WB_REVISION')) { define('WB_REVISION',''); }

// database tables including in WB package
$aTable = array (
    'settings','groups','addons','pages','sections','search','users',
    'mod_captcha_control','mod_code','mod_droplets','mod_form_fields',
    'mod_form_settings','mod_form_submissions','mod_jsadmin','mod_menu_link',
    'mod_news_comments','mod_news_groups','mod_news_posts','mod_news_settings',
    'mod_output_filter','mod_wrapper','mod_wysiwyg'
);

$OK            = ' <span class="ok">OK</span> ';
$FAIL          = ' <span class="error">FAILED</span> ';
$DEFAULT_THEME = 'wb_theme';

$stepID = 0;
$dirRemove = array(
/*
			'[TEMPLATE]/allcss/',
			'[TEMPLATE]/blank/',
			'[TEMPLATE]/round/',
			'[TEMPLATE]/simple/',
*/
			'[ADMIN]/themes/',
		 );

$filesRemove['0'] = array(

			'[ADMIN]/preferences/details.php',
			'[ADMIN]/preferences/email.php',
			'[ADMIN]/preferences/password.php',
			'[ADMIN]/pages/settings2.php',

			'[FRAMEWORK]/class.msg_queue.php',
			'[FRAMEWORK]/class.logfile.php',
//			'[FRAMEWORK]/class.database.php',

		 );

if(version_compare(WB_REVISION, '1681', '<'))
{
	$filesRemove['1'] = array(

			'[TEMPLATE]/argos_theme/templates/access.htt',
			'[TEMPLATE]/argos_theme/templates/addons.htt',
			'[TEMPLATE]/argos_theme/templates/admintools.htt',
			'[TEMPLATE]/argos_theme/templates/error.htt',
			'[TEMPLATE]/argos_theme/templates/groups.htt',
			'[TEMPLATE]/argos_theme/templates/groups_form.htt',
			'[TEMPLATE]/argos_theme/templates/languages.htt',
			'[TEMPLATE]/argos_theme/templates/languages_details.htt',
	/*
			'[TEMPLATE]/argos_theme/templates/login.htt',
			'[TEMPLATE]/argos_theme/templates/login_forgot.htt',
	*/
			'[TEMPLATE]/argos_theme/templates/media.htt',
			'[TEMPLATE]/argos_theme/templates/media_browse.htt',
			'[TEMPLATE]/argos_theme/templates/media_rename.htt',
			'[TEMPLATE]/argos_theme/templates/modules.htt',
			'[TEMPLATE]/argos_theme/templates/modules_details.htt',
			'[TEMPLATE]/argos_theme/templates/pages.htt',
			'[TEMPLATE]/argos_theme/templates/pages_modify.htt',
			'[TEMPLATE]/argos_theme/templates/pages_sections.htt',
			'[TEMPLATE]/argos_theme/templates/pages_settings.htt',
			'[TEMPLATE]/argos_theme/templates/preferences.htt',
			'[TEMPLATE]/argos_theme/templates/setparameter.htt',
			'[TEMPLATE]/argos_theme/templates/settings.htt',
			'[TEMPLATE]/argos_theme/templates/start.htt',
			'[TEMPLATE]/argos_theme/templates/success.htt',
			'[TEMPLATE]/argos_theme/templates/templates.htt',
			'[TEMPLATE]/argos_theme/templates/templates_details.htt',
			'[TEMPLATE]/argos_theme/templates/users.htt',
			'[TEMPLATE]/argos_theme/templates/users_form.htt',

			'[TEMPLATE]/wb_theme/templates/access.htt',
			'[TEMPLATE]/wb_theme/templates/addons.htt',
			'[TEMPLATE]/wb_theme/templates/admintools.htt',
			'[TEMPLATE]/wb_theme/templates/error.htt',
			'[TEMPLATE]/wb_theme/templates/groups.htt',
			'[TEMPLATE]/wb_theme/templates/groups_form.htt',
			'[TEMPLATE]/wb_theme/templates/languages.htt',
			'[TEMPLATE]/wb_theme/templates/languages_details.htt',

	/*
			'[TEMPLATE]/wb_theme/templates/login.htt',
			'[TEMPLATE]/wb_theme/templates/login_forgot.htt',
	*/

			'[TEMPLATE]/wb_theme/templates/media.htt',
			'[TEMPLATE]/wb_theme/templates/media_browse.htt',
			'[TEMPLATE]/wb_theme/templates/media_rename.htt',
			'[TEMPLATE]/wb_theme/templates/modules.htt',
			'[TEMPLATE]/wb_theme/templates/modules_details.htt',
			'[TEMPLATE]/wb_theme/templates/pages.htt',
			'[TEMPLATE]/wb_theme/templates/pages_modify.htt',
			'[TEMPLATE]/wb_theme/templates/pages_sections.htt',
			'[TEMPLATE]/wb_theme/templates/pages_settings.htt',
			'[TEMPLATE]/wb_theme/templates/preferences.htt',
			'[TEMPLATE]/wb_theme/templates/setparameter.htt',
			'[TEMPLATE]/wb_theme/templates/settings.htt',
			'[TEMPLATE]/wb_theme/templates/start.htt',
			'[TEMPLATE]/wb_theme/templates/success.htt',
			'[TEMPLATE]/wb_theme/templates/templates.htt',
			'[TEMPLATE]/wb_theme/templates/templates_details.htt',
			'[TEMPLATE]/wb_theme/templates/users.htt',
			'[TEMPLATE]/wb_theme/templates/users_form.htt',
		 );
}

/* display a status message on the screen **************************************
 * @param string $message: the message to show
 * @param string $class:   kind of message as a css-class
 * @param string $element: witch HTML-tag use to cover the message
 * @return void
 */
function status_msg($message, $class='check', $element='span')
{
	// returns a status message
	$msg  = '<'.$element.' class="'.$class.'">';
	$msg .= '<strong>'.strtoupper(strtok($class, ' ')).'</strong>';
	$msg .= $message.'</'.$element.'>';
	echo $msg;
}

// analyze/check database tables
function mysqlCheckTables( $dbName )
{
    global $aTable;
    $table_prefix = TABLE_PREFIX;
    $sql = "SHOW TABLES FROM " . $dbName;
    $result = @mysql_query( $sql );
    $data = array();
    $x = 0;

    while( ( $row = mysql_fetch_array( $result, MYSQL_NUM ) ) == true )
    {
        $tmp = str_replace($table_prefix, '', $row[0]);

        if( stristr( $row[0], $table_prefix )&& in_array($tmp,$aTable) )
        {
            $sql = "CHECK TABLE " . $dbName . '.' . $row[0];
            $analyze = mysql_query( $sql );
            $rowFetch = mysql_fetch_array( $analyze, MYSQL_ASSOC );
            $data[$x]['Op'] = $rowFetch["Op"];
            $data[$x]['Msg_type'] = $rowFetch["Msg_type"];
            $msgColor = '<span class="error">';
            $data[$x]['Table'] = $row[0];
           // print  " ";
            $msgColor = ($rowFetch["Msg_text"] == 'OK') ? '<span class="ok">' : '<span class="error">';
            $data[$x]['Msg_text'] = $msgColor.$rowFetch["Msg_text"].'</span>';
           // print  "<br />";
            $x++;
        }
    }
    return $data;
}

// check existings tables for upgrade or install
function check_wb_tables()
{
    global $database,$aTable;

 // if prefix inludes '_' or '%'
 $search_for = addcslashes ( TABLE_PREFIX, '%_' );
 $get_result = $database->query( 'SHOW TABLES LIKE "'.$search_for.'%"');

        // $get_result = $database->query( "SHOW TABLES FROM ".DB_NAME);
        $all_tables = array();
        if($get_result->numRows() > 0)
        {
            while ($data = $get_result->fetchRow())
            {
                $tmp = str_replace(TABLE_PREFIX, '', $data[0]);
                if(in_array($tmp,$aTable))
                {
                    $all_tables[] = $tmp;
                }
            }
        }
     return $all_tables;
}

// check existing tables
$all_tables = check_wb_tables();

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
	width:85%;
	background: #A8BCCB url(templates/wb_theme/images/background.png) repeat-x;
	border:1px solid #000;
	color:#000;
	margin:2em auto;
	padding:0 15px;
	min-height: 500px;
	text-align:left;
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
	color: #369;
	margin-top: 1.0em;
	margin-bottom: 0.1em;
}

h1 { font-size:150%; }
h2 { font-size: 130%; border-bottom: 1px #CCC solid; }
h3 { font-size: 110%; font-weight: bold;; }

.ok, .error { font-weight:bold; }
.ok { color:green; }
.error { color:red; }
.check { color:#555; }

.warning {
	width: 98%;
	background:#FFDBDB;
	padding:0.2em;
	margin-top:0.5em;
	border: 1px solid black;
}
.info {
	width: 98%;
	background:#99CC99;
	padding:0.2em;
	margin-top:0.5em;
	border: 1px solid black;
}

</style>
</head>
<body>
<div id="container">
<img src="templates/wb_theme/images/logo.png" alt="WebsiteBaker Project" />
<h1>WebsiteBaker Upgrade</h1>
<?php
	if( version_compare( WB_VERSION, '2.7', '<' )) {
		status_msg('<strong>Warning:</strong><br />It is not possible to upgrade from WebsiteBaker Versions before 2.7.<br />For upgrading to version '.VERSION.' you must upgrade first to v.2.7 at least!!!', 'warning', 'div');
		echo '<br /><br />';
		echo "</div>
		</body>
		</html>
		";
		exit();
	}

?>
<p>This script upgrades an existing WebsiteBaker <strong> <?php echo $oldRevision; ?></strong> installation to the <strong> <?php echo $newRevision ?> </strong>.<br />The upgrade script alters the existing WB database to reflect the changes introduced with WB 2.8.x</p>

<?php
/**
 * Check if disclaimer was accepted
 */
if (!(isset($_POST['backup_confirmed']) && $_POST['backup_confirmed'] == 'confirmed')) { ?>
<h2>Step 1: Backup your files</h2>
<p>It is highly recommended to <strong>create a manual backup</strong> of the entire <strong>/pages folder</strong> and the <strong>MySQL database</strong> before proceeding.<br /><strong class="error">Note: </strong>The upgrade script alters some settings of your existing database!!! You need to confirm the disclaimer before proceeding.</p>

<form name="send" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
<textarea cols="80" rows="5">DISCLAIMER: The WebsiteBaker upgrade script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. One needs to confirm that a manual backup of the /pages folder (including all files and subfolders contained in it) and backup of the entire WebsiteBaker MySQL database was created before you can proceed.</textarea>
<br /><br /><input name="backup_confirmed" type="checkbox" value="confirmed" />&nbsp;I confirm that a manual backup of the /pages folder and the MySQL database was created.
<br /><br /><input name="send" type="submit" value="Start upgrade script" />
</form>
<br />

<?php
	status_msg('<strong>Notice:</strong><br />You need to confirm that you have created a manual backup of the /pages directory and the MySQL database before you can proceed.', 'warning', 'div');
	echo '<br /><br />';
    echo "</div>
    </body>
    </html>
    ";
	exit();
}

echo '<h3>Step '.(++$stepID).': Setting default_theme</h3>';

/**********************************************************
 *  - Adding field default_theme to settings table
 */
echo "<br />Adding default_theme to settings table";
// db_update_key_value('settings', 'default_theme', $DEFAULT_THEME);
echo (db_update_key_value( 'settings', 'default_theme', $DEFAULT_THEME ) ? " $OK<br />" : " $FAIL!<br />");

// check again all tables, to get a new array
 if(sizeof($all_tables) < 22) { $all_tables = check_wb_tables(); }
/**********************************************************
 *  - check tables comin with WebsiteBaker
 */
    $check_text = 'total ';
    // $check_tables = mysqlCheckTables( DB_NAME ) ;

    if(sizeof($all_tables) == 22)
    {
        echo '<h4>NOTICE: Your database '.DB_NAME.' has '.sizeof($all_tables).' '.$check_text.' tables from '.sizeof($aTable).' included in package '.$OK.'</h4>';
    }
    else
    {
        status_msg('<strong>WARNING:</strong><br />can\'t run Upgrade, missing tables', 'warning', 'div');
    	echo '<h4>Missing required tables. You can install them in backend->addons->modules->advanced. Then again run upgrade-script.php</h4>';
        $result = array_diff ( $aTable, $all_tables );
        echo '<h4 class="warning"><br />';
        while ( list ( $key, $val ) = each ( $result ) )
        {
            echo TABLE_PREFIX.$val.' '.$FAIL.'<br>';
        }
        echo '<br /></h4>';
    	echo '<br /><form action="'. $_SERVER['PHP_SELF'] .'">';
    	echo '<input type="submit" value="kick me back" style="float:left;" />';
    	echo '</form>';
        if(defined('ADMIN_URL'))
        {
        	echo '<form action="'.ADMIN_URL.'" target="_self">';
        	echo '&nbsp;<input type="submit" value="kick me to the Backend" />';
        	echo '</form>';
        }
        echo "<br /><br /></div>
        </body>
        </html>
        ";
        exit();
    }


echo '<h3>Step '.(++$stepID).': Updating settings</h3>';
/**********************************************************
 *  - Adding field sec_anchor to settings table
 */
echo "<br />Adding/updating sec_anchor to settings table";
$cfg = array(
	'sec_anchor' => defined('SEC_ANCHOR') ? SEC_ANCHOR : 'wb_'
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");


/**********************************************************
 *  - Adding redirect timer to settings table
 */
echo "Adding/updating redirect timer to settings table";
$cfg = array(
	'redirect_timer' => defined('REDIRECT_TIMER') ? REDIRECT_TIMER : '1500'
);
echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");

/**********************************************************
 *  - Adding rename_files_on_upload to settings table
 */
echo "Adding/Updating rename_files_on_upload to settings table";
$cfg = array(
	'rename_files_on_upload' => (defined('RENAME_FILES_ON_UPLOAD') ? RENAME_FILES_ON_UPLOAD : 'ph.*?,cgi,pl,pm,exe,com,bat,pif,cmd,src,asp,aspx,js')
);
echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");

/**********************************************************
 *  - Adding mediasettings to settings table
 */
echo "Adding/updating mediasettings to settings table";
$cfg = array(
	'mediasettings' => (defined('MEDIASETTINGS') ? MEDIASETTINGS : ''),
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");

/**********************************************************
 *  - Adding fingerprint_with_ip_octets to settings table
 */
echo "Adding/updating fingerprint_with_ip_octets to settings table";
$cfg = array(
	'fingerprint_with_ip_octets' => (defined('FINGERPRINT_WITH_IP_OCTETS') ? FINGERPRINT_WITH_IP_OCTETS : '2'),
	'secure_form_module' => (defined('SECURE_FORM_MODULE') ? SECURE_FORM_MODULE : '')
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");

/**********************************************************
 *  - Adding page_icon_dir to settings table
 */
echo "Adding/updating page_icon_dir to settings table";
$cfg = array(
	'page_extended' => (defined('PAGE_ICON_DIR') ? PAGE_ICON_DIR : '/templates/*/title_images'),
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");
/**********************************************************
 *  - Adding page_extended to settings table
 */
echo "Adding/updating page_extended to settings table";
$cfg = array(
	'page_extended' => (defined('PAGE_EXTENDED') ? PAGE_EXTENDED : 'true'),
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");

/**********************************************************
 *  - Adding sec_anchor to settings table
 */
echo "Adding/updating sec_anchor to settings table";
$cfg = array(
	'sec_anchor' => (defined('SEC_ANCHOR') && (SEC_ANCHOR=='') ? 'section_' : SEC_ANCHOR)
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");
/**********************************************************
 *  - Adding dev_infos to settings table
 */
echo "Adding/updating dev_infos to settings table";
$cfg = array(
	'dev_infos' => (defined('DEV_INFOS') ? DEV_INFOS : 'false')
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");

if(version_compare(WB_REVISION, REVISION, '<'))
{
	echo '<h3>Step '.(++$stepID).': Updating core tables</h3>';

	/**********************************************************
	 *  - Update search no results database filed to create
	 *  valid XHTML if search is empty
	 */
	if (version_compare(WB_VERSION, '2.8', '<'))
	{
	    echo "<br />Updating database field `no_results` of search table: ";
	    $search_no_results = addslashes('<tr><td><p>[TEXT_NO_RESULTS]</p></td></tr>');
	    $sql  = 'UPDATE `'.TABLE_PREFIX.'search` ';
		$sql .= 'SET `value`=\''.$search_no_results.'\' ';
		$sql .= 'WHERE `name`=\'no_results\'';
	    echo ($database->query($sql)) ? ' $OK<br />' : ' $FAIL<br />';
	}
	/**********************************************************
 *  - Add field "redirect_type" to table "mod_menu_link"
 *  has to be moved later to upgrade.php in modul menu_link, because modul can be removed
 */
	$table_name = TABLE_PREFIX.'mod_menu_link';
	$field_name = 'redirect_type';
	$description = "INT NOT NULL DEFAULT '301' AFTER `target_page_id`";
	if(!$database->field_exists($table_name,$field_name)) {
		echo "<br />Adding field redirect_type to mod_menu_link table";
		echo ($database->field_add($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	} else {
		echo "<br />Modify field redirect_type to mod_menu_link table";
		echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	}

	/**********************************************************
	 *  - Add field "page_trail" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'page_trail';
	$description = "VARCHAR( 255 ) NOT NULL DEFAULT ''";
	echo "Modify field page_trail to pages table";
	echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
 *  - Add field "page_icon" to table "pages"
 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'page_icon';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `page_title`";
	if(!$database->field_exists($table_name,$field_name)) {
		echo "Adding field page_icon to pages table";
		echo ($database->field_add($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	} else {
		echo "Modify field page_icon to pages table";
		echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	}

	/**********************************************************
	 *  - Add field "tooltip" to table "pages"
 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'tooltip';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `page_icon`";
	if(!$database->field_exists($table_name,$field_name)) {
		echo "Adding field tooltip to pages table";
		echo ($database->field_add($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	} else {
	echo "Modify field tooltip to pages table";
	echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	}

	/**********************************************************
	 *  - Add field "page_code" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'page_code';
	$description = "INT NOT NULL DEFAULT '0' AFTER `language`";
	if(!$database->field_exists($table_name,$field_name)) {
		echo "Adding field page_code to pages table";
		echo ($database->field_add($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	} else {
		echo "Modify field page_code to pages table";
		echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	}

	/**********************************************************
 *  - Add field "menu_icon_0" to table "pages"
 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'menu_icon_0';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `menu_title`";
	if(!$database->field_exists($table_name,$field_name)) {
		echo "Adding field menu_icon_0 to pages table";
		echo ($database->field_add($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	} else {
		echo "Modify field menu_icon_0 to pages table";
		echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	}

	/**********************************************************
	 *  - Add field "menu_icon_1" to table "pages"
 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'menu_icon_1';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `menu_icon_0`";
	if(!$database->field_exists($table_name,$field_name)) {
		echo "Adding field menu_icon_1 to pages table";
		echo ($database->field_add($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	} else {
		echo "Modify field menu_icon_1 to pages table";
		echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	}

	/**********************************************************
	 *  - Add field "tooltip" to table "pages"
 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'tooltip';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '' AFTER `menu_icon_1`";
	if(!$database->field_exists($table_name,$field_name)) {
		echo "Adding field tooltip to pages table";
		echo ($database->field_add($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	} else {
		echo "Modify field tooltip to pages table";
		echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");
	}

	/**********************************************************
	 *  - Add field "admin_groups" to table "pages"
 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'admin_groups';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '1'";
	echo "Modify field admin_groups to pages table";
	echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Add field "admin_users" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'admin_users';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT ''";
	echo "Modify field admin_users to pages table";
	echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Add field "viewing_groups" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'viewing_groups';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT '1'";
	echo "Modify field viewing_groups to pages table";
	echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Add field "viewing_users" to table "pages"
	 */
	$table_name = TABLE_PREFIX.'pages';
	$field_name = 'viewing_users';
	$description = "VARCHAR( 512 ) NOT NULL DEFAULT ''";
	echo "Modify field viewing_users to pages table";
	echo ($database->field_modify($table_name, $field_name, $description) ? " $OK<br />" : " $FAIL!<br />");

	/**********************************************************
	 *  - Remove/add PRIMARY KEY from/to "section_id" from table "mod_wysiwygs"
	 */
	$sTable = TABLE_PREFIX.'mod_wysiwyg';
	$field_name = 'wysiwyg_id';
	if(!$database->field_exists($sTable,$field_name)) {
    	echo "Remove PRIMARY KEY from table mod_wysiwygs";
        $sql = 'ALTER TABLE `'.DB_NAME.'`.`'.$sTable.'` DROP PRIMARY KEY';
        echo ($database->query($sql) ? " $OK<br />" : " $FAIL!<br />");

    	echo "add new PRIMARY KEY to table mod_wysiwygs";
        $sql = 'ALTER TABLE `'.$sTable.'`  ADD `wysiwyg_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
        echo ($database->query($sql) ? " $OK<br />" : " $FAIL!<br />");
    }
}

/**********************************************************
 * upgrade media folder index protect files
 ALTER TABLE `wb_pages` CHANGE `page_icon` `page_icon` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
 */
	$dir = (WB_PATH.MEDIA_DIRECTORY);
	echo '<h4>Upgrade '.MEDIA_DIRECTORY.'/ index.php protect files</h4>';
	$array = rebuildFolderProtectFile($dir);
	if( sizeof( $array ) ){
		print '<strong>Upgrade '.sizeof( $array ).' '.MEDIA_DIRECTORY.'/ protect files</strong>'." $OK<br />";
	} else {
		print '<<strong>Upgrade '.MEDIA_DIRECTORY.'/ protect files</strong>'." $FAIL!<br />";
		print implode ('<br />',$array);
	}

/**********************************************************
 * upgrade pages folder index access files
 */
	echo '<h4>Upgrade /pages/ index.php access files</h4>';

    ///**********************************************************
    // *  - try to remove access files
    // */
	$sTempDir = (defined('PAGES_DIRECTORY') && (PAGES_DIRECTORY != '') ? PAGES_DIRECTORY : '');
	if(($sTempDir!='') && is_readable(WB_PATH.$sTempDir)==true) {
	 	if(rm_full_dir (WB_PATH.$sTempDir, true )==false) {
			$msg[] = '<strong>Could not delete existing access files</strong>';
	 	} else {
			$msg[] = createFolderProtectFile(rtrim( WB_PATH.$sTempDir,'/') );
        }
	}

    ///**********************************************************
    // *  - Reformat/rebuild all existing access files
    // */
    $msg[] = "All existing access files anew format";
    $sql = 'SELECT `page_id`,`root_parent`,`link`, `level` FROM `'.TABLE_PREFIX.'pages` ORDER BY `link`';
    if (($oPage = $database->query($sql)))
    {
        $x = 0;
        while (($page = $oPage->fetchRow(MYSQL_ASSOC)))
        {
            $sql = 'UPDATE `'.TABLE_PREFIX.'pages` '
                 . 'SET `root_parent`='.$page['page_id'].' WHERE page_id = '.$page['page_id'];
            if(!$database->query($sql)) {}
            $filename = WB_PATH.PAGES_DIRECTORY.$page['link'].PAGE_EXTENSION;
            $msg = create_access_file($filename, $page['page_id'], $page['level']);
            $x++;
        }
        $msg[] = '<strong>Number of new formatted access files: '.$x.'</strong>';
    }

	print implode ('<br />',$msg);

/*
	if( sizeof( $msg ) ){

		print '<br /><strong>Upgrade '.sizeof( $msg ).' /pages/ access files</strong>'." $OK<br />";
	} else {
		print '<br /><strong>Upgrade /pages/ access files</strong>'." $FAIL!<br />";
		print implode ('<br />',$msg);
	}
*/
/**********************************************************
 * upgrade posts folder index protect files
 */
	$sPostsPath = WB_PATH.PAGES_DIRECTORY.'/posts';
	echo '<h4>Upgrade /posts/ index.php protect files</h4>';
	$array = rebuildFolderProtectFile($sPostsPath);
	if( sizeof( $array ) ){
		print '<strong>Upgrade '.sizeof( $array ).' /posts/ protect files</strong>'." $OK<br />";
	} else {
		print '<strong>Upgrade /posts/ protect files</strong>'." $FAIL!<br />";
		print implode ('<br />',$array);
	}

/* *****************************************************************************
 * - check for deprecated / never needed files
 */
	if(sizeof($filesRemove)) {
		echo '<h3>Step '.(++$stepID).': Remove deprecated and old files</h3>';
	}
	$searches = array(
		'[ADMIN]',
		'[MEDIA]',
		'[PAGES]',
		'[FRAMEWORK]',
		'[MODULES]',
		'[TEMPLATE]'
	);
	$replacements = array(
		substr(ADMIN_PATH, strlen(WB_PATH)+1),
		MEDIA_DIRECTORY,
		PAGES_DIRECTORY,
		'/framework',
		'/modules',
		'/templates'
	);

	foreach( $filesRemove as $filesId )
	{
		$msg = '';
		foreach( $filesId as $file )
		{
			$file = str_replace($searches, $replacements, $file);
			$file = WB_PATH.'/'.$file;
			if( file_exists($file) ) {
				// try to unlink file
				if(!is_writable( $file ) || !unlink($file)) {
					// save in err-list, if failed
					$msg .= $file.'<br />';
				}
			}
		}

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
			echo '<br /><br /></div></body></html>';
			exit;
		}
	}


/**********************************************************
 * - check for deprecated / never needed files
 */
	if(sizeof($dirRemove)) {
		echo '<h3>Step  '.(++$stepID).': Remove deprecated and old folders</h3>';
		$searches = array(
			'[ADMIN]',
			'[MEDIA]',
			'[PAGES]',
			'[TEMPLATE]'
		);
		$replacements = array(
			substr(ADMIN_PATH, strlen(WB_PATH)+1),
			MEDIA_DIRECTORY,
			PAGES_DIRECTORY,
			'/templates',
		);
		$msg = '';
		foreach( $dirRemove as $dir ) {
			$dir = str_replace($searches, $replacements, $dir);
			$dir = WB_PATH.'/'.$dir;
			if( is_dir( $dir )) {
			// try to delete dir
				if(!is_writable( $dir ) || !rm_full_dir($dir)) {
				// save in err-list, if failed
					$msg .= str_replace(WB_PATH,'',$dir).'<br />';
				}
			}
		}
		if($msg != '') {
			$msg = '<br /><br />Following directories are deprecated, outdated or a security risk and
					can not be removed automatically.<br /><br />Please delete them
					using FTP and restart upgrade-script!<br /><br />'.$msg.'<br />';
			status_msg($msg, 'error warning', 'div');
			echo '<p style="font-size:120%;"><strong>WARNING: The upgrade script failed ...</strong></p>';
			echo '<form action="'.$_SERVER['SCRIPT_NAME'].'">';
			echo '&nbsp;<input name="send" type="submit" value="Restart upgrade script" />';
			echo '</form>';
			echo '<br /><br /></div></body></html>';
			exit;
		}
	}

/**********************************************************
 * upgrade modules if newer version is available
 */
	$aModuleList = array('news');
	foreach($aModuleList as $sModul) {
		if(file_exists(WB_PATH.'/modules/'.$sModul.'/upgrade.php')) {
			$currModulVersion = get_modul_version ($sModul, false);
			$newModulVersion =  get_modul_version ($sModul, true);
			if((version_compare($currModulVersion, $newModulVersion) <= 0)) {
				echo '<h3>Step '.(++$stepID).' : Upgrade module \''.$sModul.'\' to version '.$newModulVersion.'</h3>';
				require_once(WB_PATH.'/modules/'.$sModul.'/upgrade.php');
			}
		}
	}
/**********************************************************
 *  - Reload all addons
 */

	echo '<h3>Step '.(++$stepID).' : Reload all addons database entry (no upgrade)</h3>';
	////delete modules
	//$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'module'");
	// Load all modules
	if( ($handle = opendir(WB_PATH.'/modules/')) ) {
		while(false !== ($file = readdir($handle))) {
			if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'admin.php' AND $file != 'index.php') {
				load_module(WB_PATH.'/modules/'.$file );
			   // 	upgrade_module($file, true);
			}
		}
		closedir($handle);
	}
	echo '<strong><br />Modules reloaded<br /></strong>';

	////delete templates
	//$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'template'");
	// Load all templates
	if( ($handle = opendir(WB_PATH.'/templates/')) ) {
		while(false !== ($file = readdir($handle))) {
			if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {
				load_template(WB_PATH.'/templates/'.$file);
			}
		}
		closedir($handle);
	}
	echo '<strong><br />Templates reloaded<br /></strong>';

	////delete languages
	//$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'language'");
	// Load all languages
	if( ($handle = opendir(WB_PATH.'/languages/')) ) {
		while(false !== ($file = readdir($handle))) {
			if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {
				load_language(WB_PATH.'/languages/'.$file);
			}
		}
		closedir($handle);
	}
	echo '<strong><br />Languages reloaded<br /></strong>';

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
echo '<br />Update database version number to '.VERSION.' '.SP.' '.' Revision ['.REVISION.'] : ';

$cfg = array(
	'wb_version' => VERSION,
	'wb_revision' => REVISION,
	'wb_sp' => SP
);

echo (db_update_key_value( 'settings', $cfg ) ? " $OK<br />" : " $FAIL!<br />");

	echo '<p style="font-size:120%;"><strong>Congratulations: The upgrade script is finished ...</strong></p>';
	status_msg('<strong>Warning:</strong><br />Please delete the file <strong>upgrade-script.php</strong> via FTP before proceeding.', 'warning', 'div');
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

	echo '<br /><br /></div></body></html>';