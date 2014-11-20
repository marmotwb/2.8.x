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
 * index.php
 * 
 * @category     Core
 * @package      Core_Environment
 * @subpackage   Installer
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websitebaker.org>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.2
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 2012-04-01
 * @description  xyz
 */
// PHP less then 5.4.0 is prohibited ---
if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    $sMsg = '<p style="color: #ff0000;">WebsiteBaker 2.8.4 and above is not able to run with PHP-Version less then 5.4.0!!<br />'
          . 'Please change your PHP-Version to any kind from 5.4.0 and up!<br />'
          . 'If you have problems to solve that, ask your hosting provider for it.<br  />'
          . 'The very best solution is the use of PHP-5.4 and up</p>';
    die($sMsg);
}
include(__DIR__.'/InstallHelper.php');
// Start a session
if(!defined('SESSION_STARTED')) {
	session_name('wb_session_id');
	session_start();
	define('SESSION_STARTED', true);
}

$doc_root = str_replace('\\','/',rtrim(realpath($_SERVER['DOCUMENT_ROOT']),'/').'/');
$wb_path = str_replace('\\','/',rtrim(dirname(dirname(realpath( __FILE__))),'/')).'/';
$wb_root = str_replace(($doc_root),'',$wb_path);

// Function to highlight input fields which contain wrong/missing data
function field_error($field_name='') {
	if(!defined('SESSION_STARTED') || $field_name == '') return;
	if(isset($_SESSION['ERROR_FIELD']) && $_SESSION['ERROR_FIELD'] == $field_name) {
		return ' class="wrong"';
	}
}

$installFlag = true;
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
		$installFlag = false;
		$session_support = '<font class="bad">Disabled</font>';
	}
}
$getMagicQuotesGpc = '<font class="good">Disabled</font>';
if ( function_exists('get_magic_quotes_gpc')  && filter_var(strtolower(get_magic_quotes_gpc()), FILTER_VALIDATE_BOOLEAN ) ) {
    $getMagicQuotesGpc = '<font class="bad">Enabled</font>';
    $installFlag = false;
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

//$sapi_type = php_sapi_name();
if(!isset($_SESSION['operating_system'])) {
	$operating_system = ((strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'windows' : 'linux');
} else {
	$operating_system = $_SESSION['operating_system'];
}

function checkConfigFile ($sWbPath,$sType ) {
	$config = '';
	$sConfigContent	= "<?php\n";
	$sConfigFile = $sWbPath.$sType.'.php';

// config.php or config.php.new
		if ((file_exists($sConfigFile)==true)) {
// next operation only if file is writeable
			if (is_writeable($sConfigFile)) {
// already installed? it's not empty
				if (filesize($sConfigFile) > 100) {
					$config = '<font class="bad">Already installed? Check!</font>';
// try to open and to write
				} elseif (!$handle = fopen($sConfigFile, 'w')) {
					$config = '<font class="bad">Not Writeable</font>';
				} else {
					if (fwrite($handle, $sConfigContent) === FALSE) {
						$config = '<font class="bad">Not Writeable</font>';
					} else {
						$config = '';
						$_SESSION[$sType.'_rename'] = true;
					}
					// Close file
					fclose($handle);
				}
			} else {
				$config = '<font class="bad">Not Writeable</font>';
			}
// it's config.php.new
		} elseif ((file_exists($sConfigFile.'.new')==true)) {
			$config = '<font class="bad">Please rename to '.$sType.'.php</font>';
		} else {
			$config = '<font class="bad">Missing!!?</font>';
		}
	return $config;
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>WebsiteBaker Installation Wizard</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function confirm_link(message, url) {
	if(confirm(message)) location.href = url;
}
function change_os(type) {
	if(type == 'linux') {
		document.getElementById('operating_system_linux').checked = true;
		document.getElementById('operating_system_windows').checked = false;
		document.getElementById('file_perms_box').style.display = 'none';
	} else if(type == 'windows') {
		document.getElementById('operating_system_linux').checked = false;
		document.getElementById('operating_system_windows').checked = true;
		document.getElementById('file_perms_box').style.display = 'none';
	}
}
</script>
</head>
<body>
<div class="body">
<table summary="" cellpadding="0" cellspacing="0">
<tr style="background: #a9c9ea;">
	<td valign="top">
		<img src="../templates/WbTheme/images/logo.png" alt="Logo" />
	</td>
	<td>
		<h1 style="border:none; margin-top:1em;font-size:150%;">Installation Wizard</h1>
	</td>
</tr>
</table>

<form name="website_baker_installation_wizard" action="save.php" method="post" accept-charset="UTF-8">
<input type="hidden" name="url" value="" />
<input type="hidden" name="username_fieldname" value="admin_username" />
<input type="hidden" name="password_fieldname" value="admin_password" />
<input type="hidden" name="remember" id="remember" value="true" />

		<div style="padding: 5px; text-align: center; font-weight: bold;">
			Welcome to the WebsiteBaker Installation Wizard.
		</div>
		<?php
		if(isset($_SESSION['message']) AND $_SESSION['message'] != '') {
			?><div  style="width: 700px; padding: 10px; margin-bottom: 5px; border: 1px solid #FF0000; background-color: #FFDBDB;"><b>Error:</b> <?php echo $_SESSION['message']; ?></div><?php
		}
		?>
		<table summary="" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td colspan="6" class="step-row"><h1 class="step-row">Step 1</h1>&nbsp;Please check the following requirements are met before continuing...</td>
		</tr>
		<?php if($session_support != '<font class="good">Enabled</font>') { ?>
		<tr>
			<td colspan="6" class="error">Please note: PHP Session Support may appear disabled if your browser does not support cookies.</td>
		</tr>
		<?php } ?>
		<tr>
			<td style="color: #666666;">PHP Session Support</td>
			<td>
				<?php echo $session_support; ?>
                ?>
			</td>
			<td style="color: #666666;">
                &nbsp;
            </td>
			<td>
                $nbsp;
            </td>
		</tr>
	<tr>
		<td style="color: #666666;">PHP Interface</td>
			<td>
				<?php
						?><font class="good">
						<?php echo $sapi ?>
						</font>
			</td>
		<td style="color: #666666;">Server DefaultCharset</td>
			<td >
				<?php
					$chrval = (($e_adc != '') && (strtolower($e_adc) != 'utf-8') ? true : false);
					if($chrval == false) {
						?><font class="good">
						<?php echo (($e_adc=='') ? 'OK' : $e_adc) ?>
						</font>
						<?php
					} else {
						?><font class="bad"><?php echo $e_adc ?></font><?php
					}
				?>
			</td>
		</tr>
		<?php if($chrval == true) {
		?>
		<tr>
			<td colspan="6" style="font-size: 10px;" class="bad">
<p class="warning">
<b>Please note:</b> Yor webserver is configured to deliver <b><?php echo $e_adc;?></b> charset only.<br />
To display national special characters (e.g.: &auml; &aacute;) in clear manner, switch off this preset please(or let it do by your hosting provider).<br />
In any case you can choose <b><?php echo $e_adc;?></b> in the settings of WebsiteBaker.<br />
But this solution does not guarranty a correct displaying of the content from all modules!
</p>
</td>
</tr>
<?php } ?>
<tr>
	<td style="line-height: 0.4em;" colspan="4">&nbsp;</td>
</tr>
</table>
<table summary="" cellpadding="3" cellspacing="0">
<tr>
	<td colspan="6" class="step-row"><h1 class="step-row">Step 2</h1>&nbsp;Please check the following files/folders are writeable before continuing...</td>
</tr>
<?php
	$sTmp = '';
	$config = '';
	$sConfigFile = 'config.php.new';
	if( ($sTmp = checkConfigFile($wb_path,'config')) === '' ) {
		$config = '<font class="good">Writeable</font>';
	} else {
		$config = $sTmp;
	}
	$sConfigFile = preg_match('/(?:rename)/i',$config) ? $sConfigFile : 'config.php';
	$installFlag = $installFlag && ($sTmp == '');
?>
		<tr>
			<td colspan="2" style="color: #666666;"><?php print $wb_root.$sConfigFile ?></td>
			<td colspan="2"><?php echo $config ?></td>
		</tr>
<?php
	$sTmp = '';
	$config = '';
	$sSetupIniFile = 'setup.ini.php.new';
	if( ($sTmp = checkConfigFile($wb_path,'setup.ini')) === '' ) {
		$config = '<font class="good">Writeable</font>';
	} else {
		$config = $sTmp;
	}
	$sSetupIniFile = preg_match('/(?:rename)/i',$config) ? $sSetupIniFile : 'setup.ini.php';
	$installFlag = $installFlag && ($sTmp == '');
?>
		<tr>
			<td colspan="2" style="color: #666666;"><?php print $wb_root.$sSetupIniFile ?></td>
			<td colspan="2"><?php echo $config ?></td>
		</tr>
		<tr>
			<td colspan="2" style="color: #666666;"><?php print $wb_root ?>pages/</td>
			<td><?php if(is_writable('../pages/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../pages/')) {$installFlag = false; echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td colspan="2" style="color: #666666;"><?php print $wb_root ?>media/</td>
			<td><?php if(is_writable('../media/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../media/')) {$installFlag = false; echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
		</tr>
		<tr>
			<td colspan="2" style="color: #666666;"><?php print $wb_root ?>templates/</td>
			<td><?php if(is_writable('../templates/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../templates/')) {$installFlag = false; echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td colspan="2" style="color: #666666;"><?php print $wb_root ?>modules/</td>
			<td><?php if(is_writable('../modules/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../modules/')) {$installFlag = false; echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
		</tr>
		<tr>
			<td colspan="2" style="color: #666666;"><?php print $wb_root ?>languages/</td>
			<td><?php if(is_writable('../languages/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../languages/')) {$installFlag = false; echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
			<td colspan="2" style="color: #666666;"><?php print $wb_root ?>temp/</td>
			<td><?php if(is_writable('../temp/')) { echo '<font class="good">Writeable</font>'; } elseif(!file_exists('../temp/')) {$installFlag = false; echo '<font class="bad">Directory Not Found</font>'; } else { echo '<font class="bad">Unwriteable</font>'; } ?></td>
		</tr>
		<tr>
			<td style="line-height: 0.4em;" colspan="4">&nbsp;</td>
		</tr>
		</table>
<?php if($installFlag==true) { ?>
	
		<table summary="" cellpadding="3" cellspacing="0" >
		<tr>
			<td colspan="2" class="step-row"><h1 class="step-row">Step 3</h1>&nbsp;Please check URL settings, and select a default timezone and a default backend language...</td>
		</tr>
		<tr>
			<td class="name">
				Absolute URL:
			</td>
			<td class="value">
				<?php
				// Try to guess installation URL
				$guessed_url = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
				$guessed_url = rtrim(dirname($guessed_url), 'install');
				?>
				<input <?php echo field_error('wb_url');?> type="text" tabindex="1" name="wb_url" style="width: 99%;" value="<?php if(isset($_SESSION['wb_url'])) { echo $_SESSION['wb_url']; } else { echo $guessed_url; } ?>" />
			</td>
		</tr>
		<tr>
			<td class="name">
				Default Timezone:
			</td>
			<td>
				<select <?php echo field_error('default_timezone');?> tabindex="3" name="default_timezone" style="width: 100%;">
<?php
/*
 build list of TimeZone options
*/
    $aZones = array(-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,6,6.5,7,8,9,9.5,10,11,12,13);
    $sOutput = PHP_EOL;
    foreach($aZones as $fOffset) {
        $sItemTitle = 'GMT '.(($fOffset>0)?'+':'').(($fOffset==0)?'':(string)$fOffset.' Hours');
        $sOutput .= '<option value="'.(string)$fOffset.'"';
        if (
            (isset($_SESSION['default_timezone']) AND $_SESSION['default_timezone'] == (string)$fOffset) ||
            (!isset($_SESSION['default_timezone']) AND $fOffset == 0)
        ) {
            $sOutput .= ' selected="selected"';
        }
        $sOutput .= '>'.$sItemTitle.'</option>'.PHP_EOL;
    }
// output Timezone options
    echo $sOutput;
?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="name">
				Default Language:
			</td>
			<td>
				<select <?php echo field_error('default_language');?> tabindex="3" name="default_language" style="width: 100%;">
<?php
/*
 Find all available languages in /language/ folder and build option list from
*/
    $sLangDir = str_replace('\\', '/', dirname(__DIR__).'/languages/');
    $aAvailableLanguages = InstallHelper::getAvailableLanguages($sLangDir);
    $sOutput = PHP_EOL;
    foreach ($aAvailableLanguages as $sLangCode => $sLangName) {
        $sOutput .= '<option value="'.$sLangCode.'"';
        if (
            (isset($_SESSION['default_language']) AND $_SESSION['default_language'] == $sLangCode) ||
            (!isset($_SESSION['default_language']) AND $sLangCode == 'EN')
        ) {
            $sOutput .= ' selected="selected"';
        }
        $sOutput .= '>'.$sLangName.'</option>'.PHP_EOL;
    }
// output Language options
    echo $sOutput;
?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="line-height: 0.4em;" colspan="2">&nbsp;</td>
		</tr>
		</table>
		<table border="0" summary="" cellpadding="0" cellspacing="0">
		<tr>
			<td class="step-row" colspan="3"><h1 class="step-row">Step 4</h1>&nbsp;Please specify your operating system information below...</td>
		</tr>
		<tr>
			<td class="name">&nbsp;
				Server Operating System:
			</td>
			<td style="<?php echo $operating_system ?>">
				<input type="radio" tabindex="4" name="operating_system" id="operating_system_linux" onclick="document.getElementById('file_perms_box').style.display = 'none';" value="linux"<?php if($operating_system == 'linux') { echo ' checked="checked"'; } ?> />
				<span style="cursor: pointer;" onclick="javascript:change_os('linux');">Linux/Unix based</span>
				<br />
				<input type="radio" tabindex="5" name="operating_system" id="operating_system_windows" onclick="document.getElementById('file_perms_box').style.display = 'none';" value="windows"<?php if($operating_system == 'windows') { echo ' checked="checked"'; } ?> />
				<span style="cursor: pointer;" onclick="javascript:change_os('windows');">Windows</span>
			</td>
		</tr>
		<tr>
			<td class="name">&nbsp;</td>
			<td class="value">
				<div id="file_perms_box" style="line-height:2em; position: relative; width: 100%;float:left; margin: 0; padding: 0; display: <?php if(isset($_SESSION['operating_system']) AND $_SESSION['operating_system'] == 'windows') { echo 'none'; } else { echo 'none'; } ?>;">
					<input type="checkbox" tabindex="6" name="world_writeable" id="world_writeable" value="true"<?php if(isset($_SESSION['world_writeable']) AND $_SESSION['world_writeable'] == true) { echo ' checked="checked'; } ?> />
 					<label style=" margin: 0;  " for="world_writeable">
						World-writeable file permissions (777)
					</label>
				<br />
					<p class="warning">(Please note: only recommended for testing environments)</p>
				</div>
			</td>
		</tr>
		<tr>
			<td style="line-height: 0.4em;" colspan="2">&nbsp;</td>
		</tr>
		</table>
		<table summary="" cellpadding="0" cellspacing="0">
    		<tr>
    			<td colspan="2" class="step-row"><h1 class="step-row">Step 5</h1>&nbsp;Please enter your MySQL database server details below...</td>
    		</tr>
    		<tr>
    			<td class="name">Host Name</td>
    			<td class="value">
    				<input <?php echo field_error('database_host');?> type="text" tabindex="7" name="database_host" value="<?php if(isset($_SESSION['database_host'])) { echo $_SESSION['database_host']; } else { echo 'localhost'; } ?>" />
    			</td>
    		</tr>
    		<tr>
    			<td class="name">Database Name&nbsp;([a-zA-Z0-9_-])</td>
    			<td class="value">
    				<input <?php echo field_error('database_name')?> type="text" tabindex="8" name="database_name" value="<?php if(isset($_SESSION['database_name'])) { echo $_SESSION['database_name']; } else { echo 'DatabaseName'; } ?>" />
    			</td>
    		</tr>
		<tr>
			<td class="name">Table Prefix&nbsp;([a-zA-Z0-9_])</td>
			<td class="value">
				<input <?php echo field_error('table_prefix')?> type="text" tabindex="9" name="table_prefix" value="<?php if(isset($_SESSION['table_prefix'])) { echo $_SESSION['table_prefix']; } else { echo 'wb_'; } ?>" />
			</td>
		</tr>
		<tr>
    			<td class="name">Username:</td>
    			<td class="value">
    				<input <?php echo field_error('database_username');?> type="text" tabindex="10" name="database_username" value="<?php if(isset($_SESSION['database_username'])) { echo $_SESSION['database_username']; } else { echo 'root'; } ?>" />
    			</td>
		</tr>
		<tr>
    			<td class="name">Password:</td>
    			<td class="value">
    				<input type="password" tabindex="11" name="database_password" value="<?php if(isset($_SESSION['database_password'])) { echo $_SESSION['database_password']; } ?>" />
    			</td>
		</tr>
		<tr>
			<td class="name hide" colspan="2">
				<input type="checkbox" tabindex="12" name="install_tables" id="install_tables" value="true"<?php if(!isset($_SESSION['install_tables'])) { echo ' checked="checked"'; } elseif($_SESSION['install_tables'] == 'true') { echo ' checked="checked"'; } ?> />
				<label for="install_tables" style="color: #666666;">Install Tables</label>
				<br />
				<span style="font-size: 1px; color: #666666;">(Please note: May remove existing tables and data)</span>
			</td>
		</tr>
		<tr>
			<td style="line-height: 0.4em;" colspan="2">&nbsp;</td>
		</tr>
		</table>
		<table summary="" cellpadding="0" cellspacing="0" >
		<tbody>
		<tr>
			<td colspan="2" class="step-row"><h1 class="step-row">Step 6</h1>&nbsp;Please enter your website title below...</td>
		</tr>
		<tr>
			<td class="name">Website Title:</td>
			<td class="value">
				<input <?php echo field_error('website_title');?> type="text" tabindex="13" name="website_title" value="<?php if(isset($_SESSION['website_title'])) { echo $_SESSION['website_title']; } else { echo 'Enter your website title'; } ?>" />
			</td>
		</tr>
		<tr>
			<td style="line-height: 0.4em;" colspan="2">&nbsp;</td>
		</tr>
		</tbody>
		</table>
		<table summary="" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td colspan="2" class="step-row"><h1 class="step-row">Step 7</h1> Please enter your Administrator account details below...</td>
		</tr>
		<tr>
			<td class="name">Loginname:</td>
			<td class="value">
				<input <?php echo field_error('admin_username');?> type="text" tabindex="14" name="admin_username" value="<?php if(isset($_SESSION['admin_username'])) { echo $_SESSION['admin_username']; } else { echo 'admin'; } ?>" />
			</td>
		</tr>
		<tr>
			<td class="name">Email:</td>
			<td class="value">
				<input <?php echo field_error('admin_email');?> type="text" tabindex="15" name="admin_email" value="<?php if(isset($_SESSION['admin_email'])) { echo $_SESSION['admin_email']; } ?>" />
			</td>
		</tr>
		<tr>
			<td class="name">Password:</td>
			<td class="value">
				<input <?php echo field_error('admin_password');?> type="password" maxlength="30" tabindex="16" name="admin_password" value="" />
			</td>
		</tr>
		<tr>
			<td class="name">Re-Password:</td>
			<td class="value">
				<input <?php echo field_error('admin_repassword');?> type="password" maxlength="30" tabindex="17" name="admin_repassword" value=""  />
			</td>
		</tr>
		<tr>
			<td style="line-height: 0.4em;" colspan="2">&nbsp;</td>
		</tr>
		</table>
<?php } ?>

		<table summary="" cellpadding="0" cellspacing="0">
				<tr valign="top">
					<td><strong>Please note: &nbsp;</strong></td>
				</tr>
				<tr valign="top">
					<td>
						<p class="warning">
						WebsiteBaker is released under the
						<a href="http://www.gnu.org/licenses/gpl.html" target="_blank" tabindex="19">GNU General Public License</a>
						<br />
						By clicking install, you are accepting the license.
						</p>
					</td>
				</tr>
				<tr valign="top">
			<td>
			<p class="center">
				<?php if($installFlag == true) { ?>
				<input type="submit" tabindex="20" name="install" value="Install WebsiteBaker" />
				<?php } else { ?>
				<input type="button" tabindex="20" name="restart" value="Check your Settings in Step1 or Step2" class="submit" onclick="javascript: window.location = '<?php print $_SERVER['SCRIPT_NAME'] ?>';" />
				<?php } ?>
			</p>
			</td>
		</tr>
		</table>

</form>

	<div style="padding: 10px 0px 10px 0px; text-align:center;">
		<!-- Please note: the below reference to the GNU GPL should not be removed, as it provides a link for users to read about warranty, etc. -->
		<a href="http://www.websitebaker.org/" style="color: #000000;" target="_blank">WebsiteBaker</a>
		is	released under the
		<a href="http://www.gnu.org/licenses/gpl.html" style="color: #000000;" target="_blank">GNU General Public License</a>
		<!-- Please note: the above reference to the GNU GPL should not be removed, as it provides a link for users to read about warranty, etc. -->
	</div >
</div>

</body>
</html>
