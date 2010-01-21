<?php
/*
*
*                       About WebsiteBaker
*
* Website Baker is a PHP-based Content Management System (CMS)
* designed with one goal in mind: to enable its users to produce websites
* with ease.
*
*                       LICENSE INFORMATION
*
* WebsiteBaker is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* WebsiteBaker is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
* See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*
*                   WebsiteBaker Extra Information
*
*
*/
/**
 *
 * @category        frontend
 * @package         account
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @filesource		$HeadURL$
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 *
 * @author          WebsiteBaker Project
 * @link			http://www.websitebaker2.org/
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://start.websitebaker2.org/impressum-datenschutz.php
 * @license         http://www.gnu.org/licenses/gpl.html
 * @version         $Id$
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @lastmodified    $Date$
 *
 */

if(!defined('WB_URL')) die(header('Location: ../../index.php'));

$username_fieldname = 'username';
$password_fieldname = 'password';
	
if(defined('SMART_LOGIN') AND SMART_LOGIN == 'enabled') {
	// Generate username field name
	$username_fieldname = 'username_';
	$password_fieldname = 'password_';

	$temp = array_merge(range('a','z'), range(0,9));
	shuffle($temp);
	for($i=0;$i<=7;$i++) {
		$username_fieldname .= $temp[$i];
		$password_fieldname .= $temp[$i];
	}
}
?>
<h1>&nbsp;Login</h1>
&nbsp;<?php echo $thisApp->message; ?>
<br />
<br />

<form action="<?php echo WB_URL.'/account/login.php'; ?>" method="post">
<p style="display:none;"><input type="hidden" name="username_fieldname" value="<?php echo $username_fieldname; ?>" /></p>
<p style="display:none;"><input type="hidden" name="password_fieldname" value="<?php echo $password_fieldname; ?>" /></p>
<p style="display:none;"><input type="hidden" name="redirect" value="<?php echo $thisApp->redirect_url;?>" /></p>

<table cellpadding="5" cellspacing="0" border="0" width="90%">
<tr>
	<td style="width:100px"><?php echo $TEXT['USERNAME']; ?>:</td>
	<td class="value_input">
		<input type="text" name="<?php echo $username_fieldname; ?>" maxlength="30" style="width:220px;"/>
    	<script type="text/javascript">
    	// document.login.<?php echo $username_fieldname; ?>.focus();
    	var ref= document.getElementById("<?php echo $username_fieldname; ?>");
    	if (ref) ref.focus();
    	</script>
	</td>
</tr>
<tr>
	<td style="width:100px"><?php echo $TEXT['PASSWORD']; ?>:</td>
	<td class="value_input">
		<input type="password" name="<?php echo $password_fieldname; ?>" maxlength="30" style="width:220px;"/>
	</td>
</tr>
<?php if($username_fieldname != 'username') { ?>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="checkbox" name="remember" id="remember" value="true"/>
		<label for="remember"><?php echo $TEXT['REMEMBER_ME']; ?></label>
	</td>
</tr>
<?php } ?>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" name="submit" value="<?php echo $TEXT['LOGIN']; ?>"  />
		<input type="reset" name="reset" value="<?php echo $TEXT['RESET']; ?>"  />
	</td>
</tr>
</table>

</form>

<br />

<a href="<?php echo WB_URL; ?>/account/forgot.php"><?php echo $TEXT['FORGOTTEN_DETAILS']; ?></a>