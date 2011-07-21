<?php
/**
 *
 * @category        modules
 * @package         output_filter
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

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }
global $i;
$table_name = TABLE_PREFIX .'mod_output_filter';
$field_name = 'sys_rel';
$i = (!isset($i) ? 1 : $i);
print "<div style=\"margin:1em auto;font-size:1.1em;\">";
print "<h4>Step $i: Updating Output Filter</h4>\n";
$i++;
$OK   = "<span class=\"ok\">OK</span>";
$FAIL = "<span class=\"error\">FAILED</span>";
if ( ($database->field_exists($table_name,$field_name) )) {
		print "<br /><strong>'Output Filter already updated'</strong> $OK<br />\n";
} else {
	$description = 'VARCHAR(1) NOT NULL DEFAULT \'0\'';
	if( ($database->field_add($table_name,$field_name,$description )) ) {
		print "<br /><strong>Updating Output Filter</strong> $OK<br />\n";
	} else {
			print "<br /><strong>Updating Output Filter</strong> $FAIL<br />\n";
	}
}
print "</div>";
