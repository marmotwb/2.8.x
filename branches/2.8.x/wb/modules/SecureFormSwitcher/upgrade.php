<?php
/**
 *
 * @category        modules
 * @package         SecureFormSwitcher
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.2
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }
global $i;
// load module language file
$mod_path = (dirname(__FILE__));
require_once( $mod_path.'/language_load.php' );
$i = (!isset($i) ? 1 : $i);
print "<div style=\"margin:1em auto;font-size:1.1em;\">";
print "<h4>Step $i: Updating SecureForm Switcher</h4>\n";
$i++;
$OK   = "<span class=\"ok\">OK</span>";
$FAIL = "<span class=\"error\">FAILED</span>";
$target = $mod_path.'/files/SecureForm.mtab.php';
$dest = WB_PATH.'/framework/SecureForm.mtab.php';

if(is_writeable(WB_PATH.'/framework')) {
	if((copy($target,$dest) && change_mode($dest)) || file_exists($target)) {
		print "<br /><strong>Updating secure_form_module</strong> $OK<br />\n";
	} else {
		print "<br /><strong>Updating secure_form_module</strong> $FAIL<br />\n";
	}
}
print "</div>";
