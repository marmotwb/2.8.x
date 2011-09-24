<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
 * This generator is based on the class PasswordHash (c)2011 ISTeasy
 * It generates very strong Passwords and calculates several hashes also.
 *
 */

	$minLoops = 8;
	$maxLoops = 16;
	$path2class = './framework/PasswordHash.php';
	include $path2class;
	$newpass = '';
	$pass    = '';
	$hash    = '';
// ** sanitize arguments
// length of password
	if(!isset($_POST['length']) ) { $_POST['length'] = PasswordHash::SECURITY_NORMAL; }
	$length = intval($_POST['length']);
// crypt type of hash
	if(!isset($_POST['crypt']) ) { $_POST['crypt'] = 2; }
	$crypt = intval($_POST['crypt']);
	if($crypt < 0 || $crypt > 2) { $crypt = 2; }
// number of encryption loops
	if(!isset($_POST['loops']) ) { $_POST['loops'] = 0; }
	$loops = intval($_POST['loops']);
	if($loops < $minLoops || $loops > $maxLoops) { $loops =  $minLoops + floor(($maxLoops - $minLoops) / 2); }
// requested action
	if(!isset($_POST['action']) ) { $_POST['action'] = 'pass'; }
// select actions
	if($_POST['action'] == 'hash') {
		if(isset($_POST['pass']) && trim($_POST['pass']) != '') {
			$pass = trim($_POST['pass']);
			$newpass = $pass;
			$ph = new PasswordHash($loops, ($crypt == 1));
			$hash = $ph->HashPassword($pass, ($crypt == 0) );
		}
	}else {
		$newpass = PasswordHash::NewPassword($length);
		$pass = $newpass;
	}
// preselect length of password
	$checkQuality0 = $length == PasswordHash::SECURITY_WEAK ? ' checked="checked"' : '';
	$checkQuality1 = $length == PasswordHash::SECURITY_MEDIUM ? ' checked="checked"' : '';
	$checkQuality2 = $length == PasswordHash::SECURITY_NORMAL ? ' checked="checked"' : '';
	$checkQuality3 = $length == PasswordHash::SECURITY_STRONG ? ' checked="checked"' : '';
	$checkQuality4 = $length == PasswordHash::SECURITY_STRONGER ? ' checked="checked"' : '';
	if($checkQuality0.$checkQuality1.$checkQuality2.$checkQuality3.$checkQuality4 == '') {
		$checkQuality2 = ' checked="checked"';
	}
// preselect hash type
	$checkCrypt0 = $crypt == 0 ? ' checked="checked"' : '';
	$checkCrypt1 = $crypt == 1 ? ' checked="checked"' : '';
	$checkCrypt2 = $crypt == 2 ? ' checked="checked"' : '';
	$bcryptActive = ( (method_exists('PasswordHash', '_GenSaltSha512') && CRYPT_SHA512 == 1) ||
	                  (method_exists('PasswordHash', '_GenSaltBlowfish') && CRYPT_BLOWFISH == 1) ||
	                  (method_exists('PasswordHash', '_GenSaltExtended') && CRYPT_EXT_DES == 1) );
	$bcryptActive = $bcryptActive ? '' : ' style="display: none;"';
// create encryption loops option-list
	$loopsOptions = '';
	for($x = $minLoops; $x <= $maxLoops; $x++) {
		$curr = ($x == $loops ? ' selected="selected"' : '');
		$loopsOptions .= '<option value="'.$x.'"'.$curr.'>2^'.$x.' ('.number_format(pow(2, $x), 0, ',', '.').')&nbsp;&nbsp;</option>'."\n";
	}

// autodetect language
	$lang = 'en';
	if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && strlen($_SERVER['HTTP_ACCEPT_LANGUAGE'])>2) {
		$lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
	}
// define language translation tables
	$TXT = array(
		'en' => array(
			'pw_title'      => 'Password-Generator',
			'pw_quality'    => 'Quality of password',
			'pw_quality_0'  => 'bad',
			'pw_quality_1'  => 'weak',
			'pw_quality_2'  => 'good',
			'pw_quality_3'  => 'strong',
			'pw_quality_4'  => 'excellent',
			'pw_suggestion' => 'Our password suggestion',
			'pw_action'     => 'suggest password',
			'hg_title'      => 'Hash-Generator',
			'hg_text'       => 'Enter Text to hash',
			'hg_type'       => 'Kind of crypt',
			'hg_type_0'     => 'simple MD5 (very insecure)',
			'hg_type_1'     => 'MD5 + salt + rounds (relatively safe)',
			'hg_type_2'     => 'Ext-DES/Blowfish/SHA512 + rounds (high security)',
			'hg_loops'      => 'Number of rounds',
			'hg_copy'       => 'Hash to copy',
			'hg_action'     => 'calculate'
		),
		'de' => array(
			'pw_title'      => 'Passwort-Generator',
			'pw_quality'    => 'Qualität des Passwortes',
			'pw_quality_0'  => 'schlecht',
			'pw_quality_1'  => 'schwach',
			'pw_quality_2'  => 'gut',
			'pw_quality_3'  => 'stark',
			'pw_quality_4'  => 'exzellent',
			'pw_suggestion' => 'Unser Passwortvorschlag',
			'pw_action'     => 'Passwort vorschlagen',
			'hg_title'      => 'Hash-Generator',
			'hg_text'       => 'zu hashenden Text eingeben',
			'hg_type'       => 'Verschlüsselungsart',
			'hg_type_0'     => 'einfaches MD5 (sehr unsicher)',
			'hg_type_1'     => 'MD5 + Salz + mehrere Runden (relativ sicher)',
			'hg_type_2'     => 'Ext-DES/Blowfish/SHA512 + mehrere Runden (sehr sicher)',
			'hg_loops'      => 'Anzahl der Runden',
			'hg_copy'       => 'erzeugten Hash kopieren',
			'hg_action'     => 'berechnen'
		)
	);
// start screen output
?>
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
				padding-top: 2em;
			}
			.body {
				width: 40em;
				margin: auto;
			}
			fieldset {
				padding: 1em;
				text-align: left;
			}
			legend {
				font-size: 1.3em;
			}
			input {
				margin: 0.5em 0;
				padding: 3px;
				font-size: 1.2em;
				width: 97%;
				background-color: transparent;
			}
			input[type = "radio"] {
				display: inline;
			}
			#hash { font-size: 1em; }
		</style>
	</head>
	<body>
		<div class="body">
			<h1>PWH-Generator v.0.1</h1>
			<fieldset>
				<legend>&nbsp;<?php echo $TXT[$lang]['pw_title']; ?>&nbsp;</legend>
				<form  method="post" name="genpass" action="">
					<input type="hidden" name="action" value="pass" />
					<input type="hidden" name="crypt" value="<?php echo $crypt; ?>" />
					<input type="hidden" name="loops" value="<?php echo $loops; ?>" />
					<label for="length"><strong><?php echo $TXT[$lang]['pw_quality']; ?></strong></label><br />
					<input type="radio" id="length0" name="length" value="<?php echo PasswordHash::SECURITY_WEAK.'"'.$checkQuality0; ?>>
						&nbsp;<label for="length0"><?php echo $TXT[$lang]['pw_quality_0']; ?></label></input>&nbsp;&nbsp;
					<input type="radio" id="length1" name="length" value="<?php echo PasswordHash::SECURITY_MEDIUM.'"'.$checkQuality1; ?>>
						&nbsp;<label for="length1"><?php echo $TXT[$lang]['pw_quality_1']; ?></label></input>&nbsp;&nbsp;
					<input type="radio" id="length2" name="length" value="<?php echo PasswordHash::SECURITY_NORMAL.'"'.$checkQuality2; ?>>
						&nbsp;<label for="length2"><?php echo $TXT[$lang]['pw_quality_2']; ?></label></input>&nbsp;&nbsp;
					<input type="radio" id="length3" name="length" value="<?php echo PasswordHash::SECURITY_STRONG.'"'.$checkQuality3; ?>>
						&nbsp;<label for="length3"><?php echo $TXT[$lang]['pw_quality_3']; ?></label></input>&nbsp;&nbsp;
					<input type="radio" id="length4" name="length" value="<?php echo PasswordHash::SECURITY_STRONGER.'"'.$checkQuality4; ?>>
						&nbsp;<label for="length4"><?php echo $TXT[$lang]['pw_quality_4']; ?></label></input>&nbsp;<br /><br />
					<label for="pass"><strong><?php echo $TXT[$lang]['pw_suggestion']; ?></strong></label><br />
					<input type="text" id="pass" name="pass" value="<?php echo $newpass; ?>" readonly="readonly" /><br /><br />
					<input name="submit" id="submit1" type="submit" value="<?php echo $TXT[$lang]['pw_action']; ?>" />
				</form>
			</fieldset><br /><br />
			<fieldset id="setHash" style="position: relative; background: url('warten.gif') -1000px no-repeat;">
				<legend>&nbsp;<?php echo $TXT[$lang]['hg_title']; ?>&nbsp;</legend>
				<form  method="post" name="genhash" action="">
					<input type="hidden" name="action" value="hash" />
					<input type="hidden" name="length" value="<?php echo $length; ?>" />
					<label for="pass"><strong><?php echo $TXT[$lang]['hg_text']; ?></strong></label><br />
					<input type="text" id="hgpass" name="pass" value="<?php echo $pass; ?>" /><br />
					<strong><?php echo $TXT[$lang]['hg_type']; ?></strong><br />
					<input type="radio" id="crypt0" name="crypt" value="0"<?php echo $checkCrypt0; ?>>&nbsp;
						<label for="crypt0"><?php echo $TXT[$lang]['hg_type_0']; ?></label></input><br />
					<input type="radio" id="crypt1" name="crypt" value="1"<?php echo $checkCrypt1; ?>>&nbsp;
						<label for="crypt1"><?php echo $TXT[$lang]['hg_type_1']; ?></label></input><br />
					<span<?php echo $bcryptActive; ?>>
						<input type="radio" id="crypt2" name="crypt" value="2"<?php echo $checkCrypt2; ?>>&nbsp;
							<label for="crypt2"><?php echo $TXT[$lang]['hg_type_2']; ?></label></input>
					</span>
					<br />
					<div id="loopsbox">
						<select name="loops">
							<?php echo $loopsOptions; ?>
						</select>&nbsp;&nbsp;<?php echo $TXT[$lang]['hg_loops']?><br /><br />
					</div>
					<br />
					<label for="hash"><strong><?php echo $TXT[$lang]['hg_copy']; ?></strong></label>
					<div>
						<input type="text" id="hash" name="hash" value="<?php echo $hash; ?>" readonly="readonly" />
					</div>
					<br />
					<input name="submit" id="submit0" type="submit" value="<?php echo $TXT[$lang]['hg_action']; ?>" />
				</form>
			</fieldset>
			<span style="font-size: 0.7em">
				&copy;2011&nbsp;<a href="http://isteasy.de/" title="ISTeasy-project"><span style="font-style: italic; fontweight: bold;">
					<span style="color: #aa0000;">IST</span>easy</span>-project</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="http://creativecommons.org/licenses/by-sa/3.0/" title="Creative Commons BY-SA 3.0">
					Creative Commons BY-SA 3.0</a>
			</span>
		</div>

<script type="text/javascript">
/* <![CDATA[ */
	function showWait() {
		document.getElementById('setHash').style.backgroundPosition = 'center';
	}

	function clearHash() {
		document.getElementById('hash').value = "";
	}

	function showLoops() {
		if (document.getElementById("crypt0").checked == true) {
			document.getElementById("loopsbox").style.display = 'none';
		}else {
			document.getElementById("loopsbox").style.display = 'block';
		}
	}
	showLoops();
	document.getElementById('crypt0').addEventListener("click", showLoops, false);
	document.getElementById('crypt1').addEventListener("click", showLoops, false);
	document.getElementById('crypt2').addEventListener("click", showLoops, false);
	document.getElementById('hgpass').addEventListener("keypress", clearHash, false);
	document.getElementById('submit0').addEventListener("click", showWait, false);
/* ]]> */
</script>

	</body>
</html>

