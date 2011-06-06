<?php
/**
 *
 * @category        backend
 * @package         installation
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

@require_once('config.php');

// this function checks the basic configurations of an existing WB intallation
function status_msg($message, $class='check', $element='span') {
	// returns a status message
	echo '<'.$element .' class="' .$class .'">' .$message .'</' .$element.'>';
}

// database tables including in WB package
$table_list = array (
    'settings','groups','addons','pages','sections','search','users',
    'mod_captcha_control','mod_code','mod_droplets','mod_form_fields',
    'mod_form_settings','mod_form_submissions','mod_jsadmin','mod_menu_link',
    'mod_news_comments','mod_news_groups','mod_news_posts','mod_news_settings',
    'mod_output_filter','mod_wrapper','mod_wysiwyg'
);

// analyze/check database tables
function mysqlCheckTables( $dbName )
{
    global $table_list;
    $table_prefix = TABLE_PREFIX;
    $sql = "SHOW TABLES FROM " . $dbName;
    $result = @mysql_query( $sql );
    $data = array();
    $x = 0;

    while( ( $row = @mysql_fetch_array( $result, MYSQL_NUM ) ) == true )
    {
        $tmp = str_replace($table_prefix, '', $row[0]);

        if( stristr( $row[0], $table_prefix )&& in_array($tmp,$table_list) )
        {
            $sql = "CHECK TABLE " . $dbName . '.' . $row[0];
            $analyze = @mysql_query( $sql );
            $rowFetch = @mysql_fetch_array( $analyze, MYSQL_ASSOC );
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
    global $database,$table_list;

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
                if(in_array($tmp,$table_list))
                {
                    $all_tables[] = $tmp;
                }
            }
        }
     return $all_tables;
}

// check existing tables
$all_tables = check_wb_tables();

// only for array tests
function show_array($array=array())
{
    print '<pre>';
    print_r ($array);
    print '</pre>';
}

require_once(WB_PATH.'/framework/functions.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'modules', false, false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Upgrade script</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
html { overflow: -moz-scrollbars-vertical; /* Force firefox to always show room for a vertical scrollbar */ }

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

h1,h2,h3,h4,h5,h6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #369;
	margin-top: 1.0em;
	margin-bottom: 0.1em;
}

h1 { font-size:150%; }
h2 { font-size: 130%; border-bottom: 1px #CCC solid; }
h3 { font-size: 120%; }

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
	if( version_compare( WB_VERSION, '2.7.0', '<' )) {
		status_msg('<strong>Warning:</strong><br />It is not possible to upgrade from WebsiteBaker Versions bevor 2.7.0.<br />For upgrading to version '.VERSION.' you must upgrade first to v.2.7.0 at least!!!', 'warning', 'div');
		echo '<br /><br />';
		echo "</div>
		</body>
		</html>
		";
		exit();
	}
?>
<p>This script upgrades an existing WebsiteBaker <strong>Version <?php echo WB_VERSION; ?></strong> installation to the <strong>Version <?php echo VERSION ?></strong>. The upgrade script alters the existing WB database to reflect the changes introduced with WB 2.8.x</p>

<?php
/**
 * Check if disclaimer was accepted
 */
if (!(isset($_POST['backup_confirmed']) && $_POST['backup_confirmed'] == 'confirmed')) { ?>
<h2>Step 1: Backup your files</h2>
<p>It is highly recommended to <strong>create a manual backup</strong> of the entire <strong>/pages folder</strong> and the <strong>MySQL database</strong> before proceeding.<br /><strong class="error">Note: </strong>The upgrade script alters some settings of your existing database!!! You need to confirm the disclaimer before proceeding.</p>

<form name="send" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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
echo '<h2>Step 2: Updating database entries</h2>';
$OK   = '<span class="ok">OK</span>';
$FAIL = '<span class="error">FAILED</span>';

// function to add a var/value-pair into settings-table
function db_add_key_value($key, $value) {
	global $database; global $OK; global $FAIL;
	$table = TABLE_PREFIX.'settings';
	$query = $database->query("SELECT value FROM $table WHERE name = '$key' LIMIT 1");
	if($query->numRows() > 0) {
		echo "$key: already exists. $OK.<br />";
		return true;
	} else {
		$database->query("INSERT INTO $table (name,value) VALUES ('$key', '$value')");
		echo (mysql_error()?mysql_error().'<br />':'');
		$query = $database->query("SELECT value FROM $table WHERE name = '$key' LIMIT 1");
		if($query->numRows() > 0) {
			echo "$key: $OK.<br />";
			return true;
		} else {
			echo "$key: $FAIL!<br />";
			return false;
		}
	}
}

// function to add a new field into a table
function db_add_field($field, $table, $desc) {
	global $database; global $OK; global $FAIL;
	$table = TABLE_PREFIX.$table;
	$query = $database->query("DESCRIBE $table '$field'");
	if($query->numRows() == 0) { // add field
		$query = $database->query("ALTER TABLE $table ADD $field $desc");
		echo (mysql_error()?mysql_error().'<br />':'');
		$query = $database->query("DESCRIBE $table '$field'");
		echo (mysql_error()?mysql_error().'<br />':'');
		if($query->numRows() > 0) {
			echo "'$field' added. $OK.<br />";
		} else {
			echo "adding '$field' $FAIL!<br />";
		}
	} else {
		echo "'$field' already exists. $OK.<br />";
	}
}

/**********************************************************
 *  - Adding field default_theme to settings table
 */
echo "<br />Adding default_theme to settings table<br />";
$cfg = array(
	'default_theme' => 'wb_theme'
);

foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}

/**********************************************************
 *  - install droplets
 */
    $drops = (!in_array ( "mod_droplets", $all_tables)) ? "<br />Install droplets<br />" : "<br />Upgrade droplets<br />";
    echo $drops;

     $file_name = (!in_array ( "mod_droplets", $all_tables)) ? "install.php" : "upgrade.php";
     require_once (WB_PATH."/modules/droplets/".$file_name);

// check again all tables, to get a new array
 if(sizeof($all_tables) < 22) { $all_tables = check_wb_tables(); }
/**********************************************************
 *  - check tables comin with WebsiteBaker
 */
    $check_text = 'total ';
    // $check_tables = mysqlCheckTables( DB_NAME ) ;

    if(sizeof($all_tables) == 22)
    {
        echo '<h4>NOTICE: Your database '.DB_NAME.' has '.sizeof($all_tables).' '.$check_text.' tables from '.sizeof($table_list).' included in package '.$OK.'</h4>';
    }
    else
    {
        status_msg('<strong>WARNING:</strong><br />can\'t run Upgrade, missing tables', 'warning', 'div');
    	echo '<h4>Missing required tables. You can install them in backend->addons->modules->advanced. Then again run upgrade-script.php</h4>';
        $result = array_diff ( $table_list, $all_tables );
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

/**********************************************************
 *  - Adding field sec_anchor to settings table
 */

echo "<br />Adding sec_anchor to settings table<br />";
$cfg = array(
	'sec_anchor' => 'wb_'
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}

/**********************************************************
 *  - Adding redirect timer to settings table
 */
echo "<br />Adding redirect timer to settings table<br />";
$cfg = array(
	'redirect_timer' => '1500'
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}

/**********************************************************
 *  - Adding mediasettings to settings table
 */
echo "<br />Adding mediasettings to settings table<br />";
$cfg = array(
	'mediasettings' => ''
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}

/**********************************************************
 *  - Adding fingerprint_with_ip_octets to settings table
 */
echo "<br />Adding fingerprint_with_ip_octets to settings table<br />";
$cfg = array(
	'fingerprint_with_ip_octets' => '3'
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}

/**********************************************************
 *  - Add field "redirect_type" to table "mod_menu_link"
 */
echo "<br />Adding field redirect_type to mod_menu_link table<br />";
db_add_field('redirect_type', 'mod_menu_link', "INT NOT NULL DEFAULT '302' AFTER `target_page_id`");



if (version_compare(WB_VERSION, '2.8.0') < 0)
{
    /**********************************************************
     *  - Update search no results database filed to create
     *  valid XHTML if search is empty
     */
    echo "<br />Updating database field `no_results` of search table: ";
    $search_no_results = addslashes('<tr><td><p>[TEXT_NO_RESULTS]</p></td></tr>');
    $sql = "UPDATE `" . TABLE_PREFIX . "search` SET `value` = '$search_no_results' WHERE `name`= 'no_results'";
    $database->query($sql);
    echo ($database->query($sql)) ? " $OK<br />" : " $FAIL<br />";
    /**********************************************************
     *  - Update settings of News Modul
     */

    // These are the default setting
    $header = '<table cellpadding=\"0\" cellspacing=\"0\" class=\"loop-header\">'."\n";
    $post_loop = '<tr class=\"post_top\">
<td class=\"post_title\"><a href=\"[LINK]\">[TITLE]</a></td>
<td class=\"post_date\">[PUBLISHED_TIME], [PUBLISHED_DATE]</td>
</tr>
<tr>
<td class=\"post_short\" colspan=\"2\">
[SHORT]
<span style=\"visibility:[SHOW_READ_MORE];\"><a href=\"[LINK]\">[TEXT_READ_MORE]</a></span>
</td>
</tr>';
    $footer = '</table>
<table cellpadding="0" cellspacing="0" class="page-header" style="display: [DISPLAY_PREVIOUS_NEXT_LINKS]">
<tr>
<td class="page-left">[PREVIOUS_PAGE_LINK]</td>
<td class="page-center">[OF]</td>
<td class="page-right">[NEXT_PAGE_LINK]</td>
</tr>
</table>';
    $post_header = addslashes('<table cellpadding="0" cellspacing="0" class="post-header">
<tr>
<td><h1>[TITLE]</h1></td>
<td rowspan="3" style="display: [DISPLAY_IMAGE]">[GROUP_IMAGE]</td>
</tr>
<tr>
<td class="public-info"><b>[TEXT_POSTED_BY] [DISPLAY_NAME] ([USERNAME]) [TEXT_ON] [PUBLISHED_DATE]</b></td>
</tr>
<tr style="display: [DISPLAY_GROUP]">
<td class="group-page"><a href="[BACK]">[PAGE_TITLE]</a> &gt;&gt; <a href="[BACK]?g=[GROUP_ID]">[GROUP_TITLE]</a></td>
</tr>
</table>');
    $post_footer = '<p>[TEXT_LAST_CHANGED]: [MODI_DATE] [TEXT_AT] [MODI_TIME]</p>
<a href=\"[BACK]\">[TEXT_BACK]</a>';
    $comments_header = addslashes('<br /><br />
<h2>[TEXT_COMMENTS]</h2>
<table cellpadding="2" cellspacing="0" class="comment-header">');
    $comments_loop = addslashes('<tr>
<td class="comment_title">[TITLE]</td>
<td class="comment_info">[TEXT_BY] [DISPLAY_NAME] [TEXT_ON] [DATE] [TEXT_AT] [TIME]</td>
</tr>
<tr>
<td colspan="2" class="comment_text">[COMMENT]</td>
</tr>');
    $comments_footer = '</table>
<br /><a href=\"[ADD_COMMENT_URL]\">[TEXT_ADD_COMMENT]</a>';
    $comments_page = '<h1>[TEXT_COMMENT]</h1>
<h2>[POST_TITLE]</h2>
<br />';

if(in_array('mod_news_settings', $all_tables))
{
   // Insert default settings into database
   $query_dates = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_news_settings where section_id != 0 and page_id != 0");
   if($query_dates->numRows() > 1)
   {
        while($result = $query_dates->fetchRow())
        {

        	echo "<br /><u>Add default settings to database for news section_id= ".$result['section_id']."</u><br />";
        	$section_id = $result['section_id'];

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `header` = '$header' WHERE `section_id` = $section_id")) {
        		echo 'Database data header added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `post_loop` = '$post_loop' WHERE `section_id` = $section_id")) {
        		echo 'Database data post_loop added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `footer` = '$footer' WHERE `section_id` = $section_id")) {
        		echo 'Database data footer added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `post_header` = '$post_header' WHERE `section_id` = $section_id")) {
        		echo 'Database data post_header added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `post_footer` = '$post_footer' WHERE `section_id` = $section_id")) {
        		echo 'Database data post_footer added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `comments_header` = '$comments_header' WHERE `section_id` = $section_id")) {
        		echo 'Database data comments_header added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `comments_loop` = '$comments_loop' WHERE `section_id` = $section_id")) {
        		echo 'Database data comments_loop added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `comments_footer` = '$comments_footer' WHERE `section_id` = $section_id")) {
        		echo 'Database data comments_footer added successfully';
        	}
        	echo mysql_error().'<br />';

        	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `comments_page` = '$comments_page' WHERE `section_id` = $section_id")) {
        		echo 'Database data comments_page added successfully';
        	}
        	echo mysql_error().'<br />';

        }
     }
   }
}
/**********************************************************
 * upgrade news if newer version is available
 */
	if(file_exists(WB_PATH.'/modules/news/upgrade.php'))
	{
		$currNewsVersion = get_modul_version ('news', false);
		$newNewsVersion =  get_modul_version ('news', true);
		if((version_compare($currNewsVersion, $newNewsVersion) <= 0)) {
			echo '<h4>Upgrade existings basically news module</h4><br />';
			// change old postfiles to new postfiles
			require_once(WB_PATH."/modules/news/upgrade.php");
		}
	}
/**********************************************************
 *  - Set Version to new Version
 */
echo '<br />Update database version number to '.VERSION.' : ';
echo ($database->query("UPDATE `".TABLE_PREFIX."settings` SET `value`='".VERSION."' WHERE `name` = 'wb_version'")) ? " $OK<br />" : " $FAIL<br />";

/**********************************************************
 *  - Reload all addons
 */

////delete modules
//$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'module'");
// Load all modules
if( ($handle = opendir(WB_PATH.'/modules/')) ) {
	while(false !== ($file = readdir($handle))) {
		if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'admin.php' AND $file != 'index.php') {
			load_module(WB_PATH.'/modules/'.$file);
		}
	}
	closedir($handle);
}
echo '<br />Modules reloaded<br />';

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
echo '<br />Templates reloaded<br />';

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
echo '<br />Languages reloaded<br />';


/**********************************************************
 *  - End of upgrade script
 */

// require(WB_PATH.'/framework/initialize.php');

if(!defined('DEFAULT_THEME')) { define('DEFAULT_THEME', 'wb_theme'); }
if(!defined('THEME_PATH')) { define('THEME_PATH', WB_PATH.'/templates/'.DEFAULT_THEME);}

echo '<p style="font-size:120%;"><strong>Congratulations: The upgrade script is finished ...</strong></p>';
status_msg('<strong>Warning:</strong><br />Please delete the file <strong>upgrade-script.php</strong> via FTP before proceeding.', 'warning', 'div');
// show buttons to go to the backend or frontend
echo '<br />';
if(defined('WB_URL')) {
	echo '<form action="'.WB_URL.'">';
	echo '<input type="submit" value="kick me to the Frontend" style="float:left;" />';
	echo '</form>';
}
if(defined('ADMIN_URL')) {
	echo '<form action="'.ADMIN_URL.'">';
	echo '&nbsp;<input type="submit" value="kick me to the Backend" />';
	echo '</form>';
}
echo '<p>&nbsp;</p>';

?>
</div>
</body>
</html>