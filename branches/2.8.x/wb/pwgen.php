<?php
/**
 * @category     Core
 * @package      Core_security
 * @author       Werner v.d.Decken
 * @copyright    ISTeasy-project(http://isteasy.de/)
 * @license      Creative Commons BY-SA 3.0 http://creativecommons.org/licenses/by-sa/3.0/
 * @version      $Id$
 * @filesource   $HeadURL:$
 * @since        Datei vorhanden seit Release 2.8.2
 * @lastmodified $Date:$
 *
 * this class works with salted md5-hashes with several rounds. 
 * For backward compatibility it can compare normal md5-hashes also.
 *
 */
 $path2class = './framework/PasswordHash.php';
	$newpass = '';
	$pass    = '';
	$hash    = '';

	include $path2class;
	if(!isset($_POST['action']) ) { $_POST['action'] = 'pass'; }
	if($_POST['action'] == 'hash') {
		if(isset($_POST['pass']) && trim($_POST['pass']) != '') {
			$pass = trim($_POST['pass']);
			$newpass = $pass;
			$ph = new PasswordHash(12);
			$hash = $ph->HashPassword($pass);
		}
	}else {
		if(!isset($_POST['length']) ) { $_POST['length'] = 8; }
		$length = intval($_POST['length']);
		$newpass = PasswordHash::NewPassword($length);
		$pass = $newpass;
	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>PWH-Generator v.0.1</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="Werner von der Decken" />
		<meta name="copyright" content="ISTeasy, W.v.d.Decken" />
		<meta name="generator" content="ISTeasy - PWH-Generator v.0.1" />
		<style type="text/css">
			html { /* Schrifteinstellung für das ganze Dokument */
				font-family: "Trebuchet MS",Verdana, Arial, Helvetica, sans-serif;
				font-size: 78%;
				font-weight: normal;
				color: #303030;
				min-height: 100.2%;
			}
			body {
				text-align: center;
				padding-top: 4em;
			}
			.body {
				width: 40em;
				margin: auto;
			}
			fieldset {
				padding: 1em 0;
			}
			legend {
				font-size: 1.3em;
			}
			input {
				width: 90%;
				margin: 0.5em 0;
				padding: 3px;
				font-size: 1.2em;
			}
			#hash { font-size: 1em; }
		</style>
		<script type="text/javascript">
			function clearHash() {
				document.genhash.hash.value = "";
			}

		</script>
	</head>
	<body>
		<div class="body">
			<h1>PWH-Generator v.0.1</h1>
			<fieldset>
				<legend>&nbsp;Password-Generator&nbsp;</legend>
				<form  method="post" name="genpass" action="">
					<input type="hidden" name="action" value="pass" />
					<label for="length">length of password </label>&nbsp;&nbsp;
					<input type="radio" name="length" value="6">06</input>&nbsp;
					<input type="radio" name="length" value="8" checked="checked">08</input>&nbsp;
					<input type="radio" name="length" value="10">10</input>&nbsp;
					<input type="radio" name="length" value="12">12</input>&nbsp;
					<input type="radio" name="length" value="14">14</input>&nbsp;
					<input type="radio" name="length" value="16">16</input>&nbsp;
					<input type="radio" name="length" value="18">18</input>&nbsp;
					<input type="radio" name="length" value="20">20</input>&nbsp;<br /><br />
					<label for="pass">Our password suggestion</label><br />
					<input type="text" id="pass" name="pass" value="<?php echo $newpass; ?>" readonly="readonly" /><br /><br />
					<input name="submit" id="submit1" type="submit" value="suggest password" />
				</form>
			</fieldset><br /><br />
			<fieldset>
				<legend>&nbsp;Hash-Generator&nbsp;</legend>
				<form  method="post" name="genhash" action="">
					<input type="hidden" name="action" value="hash" />
					<label for="pass">Enter Text to hash</label><br />
					<input type="text" id="pass" name="pass" value="<?php echo $pass; ?>" onkeypress="clearHash();" /><br />
					<label for="hash">Hash to copy</label><br />
					<input type="text" id="hash" name="hash" value="<?php echo $hash; ?>" readonly="readonly" /><br /><br />
					<input name="submit" id="submit0" type="submit" value="calculate hash" />
				</form>
			</fieldset>
		</div>
	</body>
</html>

