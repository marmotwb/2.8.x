<?php
/**
 *
 * @category        backend
 * @package         install
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version      	$Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Start a session
if(!defined('SESSION_STARTED')) {
	session_name('wb_session_id');
	session_start();
	define('SESSION_STARTED', true);
}
	$mod_path = dirname(str_replace('\\', '/', __FILE__));
    $doc_root = rtrim(str_replace('\\', '/',$_SERVER['DOCUMENT_ROOT']),'/');
	$mod_name = basename($mod_path);
	$wb_path = dirname(dirname(str_replace('\\', '/', __FILE__)));
    $wb_root = str_replace($doc_root,'',$wb_path);

// Function to highlight input fields which contain wrong/missing data
function field_error($field_name='') {
	if(!defined('SESSION_STARTED') || $field_name == '') return;
	if(isset($_SESSION['ERROR_FIELD']) && $_SESSION['ERROR_FIELD'] == $field_name) {
		return ' class="wrong"';
	}
}

// Check if the page has been reloaded
if(!isset($_GET['sessions_checked']) OR $_GET['sessions_checked'] != 'true') {
	// Set session variable
	$_SESSION['session_support'] = '<font class="good">Enabled</font>';
	// Reload page
	header('Location: index.php?sessions_checked=true');
	exit(0);
} else {
	// Check if session variable has been saved after reload
	if(isset($_SESSION['session_support'])) {
		$session_support = $_SESSION['session_support'];
	} else {   
		$session_support = '<font class="bad">Disabled</font>';
	}
}

// Check if AddDefaultCharset is set
$e_adc=false;
$sapi=php_sapi_name();
if(strpos($sapi, 'apache')!==FALSE || strpos($sapi, 'nsapi')!==FALSE) {
	flush();
	$apache_rheaders=apache_response_headers();
	foreach($apache_rheaders AS $h) {
		if(strpos($h, 'html; charset')!==FALSE) {
			preg_match('/charset\s*=\s*([a-zA-Z0-9- _]+)/', $h, $match);
			$apache_charset=$match[1];
			$e_adc=$apache_charset;
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Website Baker Installation Wizard</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">

function confirm_link(message, url) {
	if(confirm(message)) location.href = url;
}
function change_os(type) {
	if(type == 'linux') {
		document.getElementById('operating_system_linux').checked = true;
		document.getElementById('operating_system_windows').checked = false;
		document.getElementById('file_perms_box').style.display = 'block';
	} else if(type == 'windows') {
		document.getElementById('operating_system_linux').checked = false;
		document.getElementById('operating_system_windows').checked = true;
		document.getElementById('file_perms_box').style.display = 'none';
	}
}

</script>
</head>
<body>

<table cellpadding="0" cellspacing="0" border="0" width="850" align="center">
<tr>
	<td width="60" valign="top">
		<img src="../templates/wb_theme/images/logo.png" alt="Logo" />
	</td>
	<td width="5">&nbsp;</td>
	<td style="font-size: 20px;">
		<font style="color: #FFF;">Installation Wizard</font>
	</td>
</tr>
</table>

<form name="website_baker_installation_wizard" action="save.php" method="post">
<input type="hidden" name="url" value="" />
<input type="hidden" name="username_fieldname" value="admin_username" />
<input type="hidden" name="password_fieldname" value="admin_password" />
<input type="hidden" name="remember" id="remember" value="true" />

<table cellpadding="0" cellspacing="0" border="0" width="850" align="center" style="margin-top: 10px;">
<tr>
	<td class="content">
	
		<center style="padding: 5px;">
			Welcome to the Website Baker Installation Wizard.
		</center>
		
		<?php
		if(isset($_SESSION['message']) AND $_SESSION['message'] != '') {
			?><div style="width: 700px; padding: 10px; margin-bottom: 5px; border: 1px solid #FF0000; background-color: #FFDBDB;"><b>Error:</b> <?php echo $_SESSION['message']; ?></div><?php
		}
		?>
		<table cellpadding="3" cellspacing="0" width="100%" align="center">
		<tr>
			<td colspan="6"><h1>Step 1</h1>Please check the following requirements are met before continuing...</td>
		</tr>
		<?php if($session_support != '<font class="good">Enabled</font>') { ?>
		<tr>
			<td colspan="6" style="font-size: 10px;" class="bad">Please note: PHP Session Support may appear disabled if your browser does not support cookies.</td>
		</tr>
		<?php } ?>
		<tr>
			<td width="160" style="color: #666666;">PHP Version > 5.2.1</td>
			<td width="60">
				<?php
			   if (version_compare(PHP_VERSION, '5.2.1', '>='))
			   {
					?><font class="good">Yes</font><?php
				} else {
					?><font class="bad">No</font><?php
				}
				?>
			</td>
			<td width="140" style="color: #666666;">PHP Session Support</td>
			<td width="105"><?php echo $session_support; ?></td>
			<td width="115" style="color: #666666;">PHP Safe Mode</td>
			<td>
				<?php
				if(ini_get('safe_mode')=='' || strpos(strtolower(ini_get('safe_mode')), 'off')!==FALSE || ini_get('safe_mode')==0) {
					?><font class="good">Disabled</font><?php
				} else {
					?><font class="bad">Enabled</font><?php
				}
				?>
			</td>
		</tr>
		<tr>
			<td width="160" style="color: #666666;">AddDefaultCharset unset</td>
			<td width="60">
				<?php
					if($e_adc) {
						?><font class="bad">No</font><?php
					} else {
						?><font class="good">Yes</font><?php
					}
				?>
			</td>
			<td colspan="4">&nbsp;</td>
		</tr>
		<?php if($e_adc) { ?>
		<tr>
			<td colspan="6" style="font-size: 10px;" class="bad">Please note: AddDefaultCharset is set to <?php echo $e_adc;?> in apache.conf.<br />If you have to use umlauts (e.g. &auml; &aacute;) please change this to Off. - Or use <?php echo $e_adc;?> inside website baker, too.</td>
		</tr>
		<?php } ?>
		</table>
		<table cellpadding="3" cellspacing="0" width="100%" align="center">
		<tr>
			<td colspan="8"><h1>Step 2</h1>Please check the following files/folders are writeable before continuing...</td>
		</tr>
		<tr>
			<td style="color: #666666;"><?php print $wb_root ?>/config.php</td>
			<td><?php if(is_writable('../config.php')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../config.php')) { echo '<font class="bad">File Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td style="color: #666666;"><?php print $wb_root ?>/pages/</td>
			<td><?php if(is_writable('../pages/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../pages/')) { echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td style="color: #666666;"><?php print $wb_root ?>/media/</td>
			<td><?php if(is_writable('../media/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../media/')) { echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td style="color: #666666;"><?php print $wb_root ?>/templates/</td>
			<td><?php if(is_writable('../templates/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../templates/')) { echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
		</tr>
		<tr>
			<td style="color: #666666;"><?php print $wb_root ?>/modules/</td>
			<td><?php if(is_writable('../modules/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../modules/')) { echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td style="color: #666666;"><?php print $wb_root ?>/languages/</td>
			<td><?php if(is_writable('../languages/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../languages/')) { echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td style="color: #666666;"><?php print $wb_root ?>/temp/</td>
			<td><?php if(is_writable('../temp/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../temp/')) { echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
		<table cellpadding="3" cellspacing="0" width="100%" align="center">
		<tr>
			<td colspan="2"><h1>Step 3</h1>Please check your path settings, and select a default timezone and a default backend language...</td>
		</tr>
		<tr>
			<td width="125" style="color: #666666;">
				Absolute URL:
			</td>
			<td>
				<?php
				// Try to guess installation URL
				$guessed_url = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
				$guessed_url = rtrim(dirname($guessed_url), 'install');
				?>
				<input <?php echo field_error('wb_url');?> type="text" tabindex="1" name="wb_url" style="width: 99%;" value="<?php if(isset($_SESSION['wb_url'])) { echo $_SESSION['wb_url']; } else { echo $guessed_url; } ?>" />
			</td>
		</tr>
		<tr>
			<td style="color: #666666;">
				Default Timezone:
			</td>
			<td>
				<select <?php echo field_error('default_timezone');?> tabindex="3" name="default_timezone" style="width: 100%;">
					<?php
					$TIMEZONES['-12'] = 'GMT - 12 Hours';
					$TIMEZONES['-11'] = 'GMT -11 Hours';
					$TIMEZONES['-10'] = 'GMT -10 Hours';
					$TIMEZONES['-9'] = 'GMT -9 Hours';
					$TIMEZONES['-8'] = 'GMT -8 Hours';
					$TIMEZONES['-7'] = 'GMT -7 Hours';
					$TIMEZONES['-6'] = 'GMT -6 Hours';
					$TIMEZONES['-5'] = 'GMT -5 Hours';
					$TIMEZONES['-4'] = 'GMT -4 Hours';
					$TIMEZONES['-3.5'] = 'GMT -3.5 Hours';
					$TIMEZONES['-3'] = 'GMT -3 Hours';
					$TIMEZONES['-2'] = 'GMT -2 Hours';
					$TIMEZONES['-1'] = 'GMT -1 Hour';
					$TIMEZONES['0'] = 'GMT';
					$TIMEZONES['1'] = 'GMT +1 Hour';
					$TIMEZONES['2'] = 'GMT +2 Hours';
					$TIMEZONES['3'] = 'GMT +3 Hours';
					$TIMEZONES['3.5'] = 'GMT +3.5 Hours';
					$TIMEZONES['4'] = 'GMT +4 Hours';
					$TIMEZONES['4.5'] = 'GMT +4.5 Hours';
					$TIMEZONES['5'] = 'GMT +5 Hours';
					$TIMEZONES['5.5'] = 'GMT +5.5 Hours';
					$TIMEZONES['6'] = 'GMT +6 Hours';
					$TIMEZONES['6.5'] = 'GMT +6.5 Hours';
					$TIMEZONES['7'] = 'GMT +7 Hours';
					$TIMEZONES['8'] = 'GMT +8 Hours';
					$TIMEZONES['9'] = 'GMT +9 Hours';
					$TIMEZONES['9.5'] = 'GMT +9.5 Hours';
					$TIMEZONES['10'] = 'GMT +10 Hours';
					$TIMEZONES['11'] = 'GMT +11 Hours';
					$TIMEZONES['12'] = 'GMT +12 Hours';
					$TIMEZONES['13'] = 'GMT +13 Hours';
					foreach($TIMEZONES AS $hour_offset => $title) {
						?>
							<option value="<?php echo $hour_offset; ?>"<?php if(isset($_SESSION['default_timezone']) AND $_SESSION['default_timezone'] == $hour_offset) { echo ' selected="selected"'; } elseif(!isset($_SESSION['default_timezone']) AND $hour_offset == 0) { echo ' selected="selected"'; } ?>><?php echo $title; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="color: #666666;">
				Default Language:
			</td>
			<td>
				<select <?php echo field_error('default_language');?> tabindex="3" name="default_language" style="width: 100%;">
					<?php
					$DEFAULT_LANGUAGE = array(
						'BG'=>'Bulgarian', 'CA'=>'Catalan', 'CS'=>'&#268;e&scaron;tina', 'DA'=>'Danish', 'DE'=>'Deutsch', 'EN'=>'English',
						'ES'=>'Spanish', 'ET'=>'Eesti', 'FI'=>'Suomi', 'FR'=>'Fran&ccedil;ais',
						'HR'=>'Hrvatski', 'HU'=>'Magyar','IT'=>'Italiano', 'LV'=>'Latviesu',
						'NL'=>'Nederlands', 'NO'=>'Norsk', 'PL'=>'Polski', 'PT'=>'Portuguese (Brazil)', 'RU'=>'Russian', 'SE'=>'Svenska','SK'=>'Slovensky','TR'=>'Turkish'
					);
					foreach($DEFAULT_LANGUAGE as $lang_id => $lang_title) {
						?>
							<option value="<?php echo $lang_id; ?>"<?php if(isset($_SESSION['default_language']) AND $_SESSION['default_language'] == $lang_id) { echo ' selected="selected"'; } elseif(!isset($_SESSION['default_language']) AND $lang_id == 'EN') { echo ' selected="selected"'; } ?>><?php echo $lang_title; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		</table>
		<table cellpadding="5" cellspacing="0" width="100%" align="center">
		<tr>
			<td colspan="3"><h1>Step 4</h1>Please specify your operating system information below...</td>
		</tr>
		<tr>
			<td width="170">
				Server Operating System:
			</td>
			<td width="180">
				<input type="radio" tabindex="4" name="operating_system" id="operating_system_linux" onclick="document.getElementById('file_perms_box').style.display = 'block';" value="linux"<?php if(!isset($_SESSION['operating_system']) OR $_SESSION['operating_system'] == 'linux') { echo ' checked="checked"'; } ?> />
				<span style="cursor: pointer;" onclick="javascript: change_os('linux');">Linux/Unix based</span>
				<br />
				<input type="radio" tabindex="5" name="operating_system" id="operating_system_windows" onclick="document.getElementById('file_perms_box').style.display = 'none';" value="windows"<?php if(isset($_SESSION['operating_system']) AND $_SESSION['operating_system'] == 'windows') { echo ' checked="checked"'; } ?> />
				<span style="cursor: pointer;" onclick="javascript: change_os('windows');">Windows</span>
			</td>
			<td>
				<div id="file_perms_box" style="margin: 0; padding: 0; display: <?php if(isset($_SESSION['operating_system']) AND $_SESSION['operating_system'] == 'windows') { echo 'none'; } else { echo 'block'; } ?>;">
					<input type="checkbox" tabindex="6" name="world_writeable" id="world_writeable" value="true"<?php if(isset($_SESSION['world_writeable']) AND $_SESSION['world_writeable'] == true) { echo 'checked'; } ?> />
					<label for="world_writeable">
						World-writeable file permissions (777)
					</label>
					<br />
					<font class="note">(Please note: only recommended for testing environments)</font>
				</div>
			</td>
		</tr>
		</table>
		<table cellpadding="5" cellspacing="0" width="100%" align="center">
    		<tr>
    			<td colspan="5">Please enter your MySQL database server details below...</td>
    		</tr>
    		<tr>
    			<td width="120" style="color: #666666;">Host Name:</td>
    			<td width="230">
    				<input <?php echo field_error('database_host');?> type="text" tabindex="7" name="database_host" style="width: 98%;" value="<?php if(isset($_SESSION['database_host'])) { echo $_SESSION['database_host']; } else { echo 'localhost'; } ?>" />
    			</td>
    			<td width="7">&nbsp;</td>
    			<td width="70" style="color: #666666;">Username:</td>
    			<td>
    				<input <?php echo field_error('database_username');?> type="text" tabindex="9" name="database_username" style="width: 98%;" value="<?php if(isset($_SESSION['database_username'])) { echo $_SESSION['database_username']; } else { echo 'root'; } ?>" />
    			</td>
    		</tr>
    		<tr>
    			<td style="color: #666666;">Database Name:<br />[a-zA-Z0-9_-]</td>
    			<td>
    				<input <?php echo field_error('database_name');?> type="text" tabindex="8" name="database_name" style="width: 98%;" value="<?php if(isset($_SESSION['database_name'])) { echo $_SESSION['database_name']; } else { echo 'wb'; } ?>" />
    			</td>
    			<td>&nbsp;</td>
    			<td style="color: #666666;">Password:</td>
    			<td>
    				<input type="password" tabindex="10" name="database_password" style="width: 98%;"<?php if(isset($_SESSION['database_password'])) { echo ' value = "'.$_SESSION['database_password'].'"'; } ?> />
    			</td>
    		</tr>
		<tr>
			<td style="color: #666666;">Table Prefix:<br />[a-zA-Z0-9_]</td>
			<td>
				<input <?php echo field_error('table_prefix');?> type="text" tabindex="11" name="table_prefix" style="width: 250px;"<?php if(isset($_SESSION['table_prefix'])) { echo ' value = "'.$_SESSION['table_prefix'].'"'; } ?> />
			</td>
			<td>&nbsp;</td>
			<td colspan="2">
				<input type="checkbox" tabindex="12" name="install_tables" id="install_tables" value="true"<?php if(!isset($_SESSION['install_tables'])) { echo ' checked="checked"'; } elseif($_SESSION['install_tables'] == 'true') { echo ' checked="checked"'; } ?> />
				<label for="install_tables" style="color: #666666;">Install Tables</label>
				<br />
				<span style="font-size: 10px; color: #666666;">(Please note: May remove existing tables and data)</span>
			</td>
		</tr>
		<tr>
			<td colspan="5"><h1>Step 5</h1>Please enter your website title below...</td>
		</tr>
		<tr>
			<td style="color: #666666;" colspan="1">Website Title:</td>
			<td colspan="4">
				<input <?php echo field_error('website_title');?> type="text" tabindex="13" name="website_title" style="width: 99%;" value="<?php if(isset($_SESSION['website_title'])) { echo $_SESSION['website_title']; } ?>" />
			</td>
		</tr>
		<tr>
			<td colspan="5"><h1>Step 6</h1>Please enter your Administrator account details below...</td>
		</tr>
		<tr>
			<td style="color: #666666;">Username:</td>
			<td>
				<input <?php echo field_error('admin_username');?> type="text" tabindex="14" name="admin_username" style="width: 98%;" value="<?php if(isset($_SESSION['admin_username'])) { echo $_SESSION['admin_username']; } else { echo 'admin'; } ?>" />
			</td>
			<td>&nbsp;</td>
			<td style="color: #666666;">Password:</td>
			<td>
				<input <?php echo field_error('admin_password');?> type="password" tabindex="16" name="admin_password" style="width: 98%;"<?php if(isset($_SESSION['admin_password'])) { echo ' value = "'.$_SESSION['admin_password'].'"'; } ?> />
			</td>
		</tr>
		<tr>
			<td style="color: #666666;">Email:</td>
			<td>
				<input <?php echo field_error('admin_email');?> type="text" tabindex="15" name="admin_email" style="width: 98%;"<?php if(isset($_SESSION['admin_email'])) { echo ' value = "'.$_SESSION['admin_email'].'"'; } ?> />
			</td>
			<td>&nbsp;</td>
			<td style="color: #666666;">Re-Password:</td>
			<td>
				<input <?php echo field_error('admin_repassword');?> type="password" tabindex="17" name="admin_repassword" style="width: 98%;"<?php if(isset($_SESSION['admin_repassword'])) { echo ' value = "'.$_SESSION['admin_repassword'].'"'; } ?> />
			</td>
		</tr>
		<tr>
			<td colspan="5" style="padding: 10px; padding-bottom: 0;"><h1 style="font-size: 0px;">&nbsp;</h1></td>
		</tr>
		<tr>
			<td colspan="4">
				<table cellpadding="0" cellspacing="0" width="100%" border="0">
				<tr valign="top">
					<td>Please note: &nbsp;</td>
					<td>
						Website Baker is released under the 
						<a href="http://www.gnu.org/licenses/gpl.html" target="_blank" tabindex="19">GNU General Public License</a>
						<br />
						By clicking install, you are accepting the license.
					</td>
				</tr>
				</table>
			</td>
			<td colspan="1" align="right">
				<input type="submit" tabindex="20" name="submit" value="Install Website Baker" class="submit" />
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>

</form>

<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding: 10px 0px 10px 0px;">
<tr>
	<td align="center" style="font-size: 10px;">
		<!-- Please note: the below reference to the GNU GPL should not be removed, as it provides a link for users to read about warranty, etc. -->
		<a href="http://www.websitebaker.org/" style="color: #000000;" target="_blank">Website Baker</a>
		is	released under the
		<a href="http://www.gnu.org/licenses/gpl.html" style="color: #000000;" target="_blank">GNU General Public License</a>
		<!-- Please note: the above reference to the GNU GPL should not be removed, as it provides a link for users to read about warranty, etc. -->
	</td>
</tr>
</table>

</body>
</html>
