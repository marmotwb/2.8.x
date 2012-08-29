<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description
 */

// Must include code to stop this file being access directly
/* -------------------------------------------------------- */
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2><');
}
/* -------------------------------------------------------- */

$msg = array();
$aTable = array('mod_form_fields','mod_form_settings','mod_form_submissions');
for($x=0; $x<sizeof($aTable);$x++) {
	if(($sOldType = $database->getTableEngine(TABLE_PREFIX.$aTable[$x]))) {
		if(('myisam' != strtolower($sOldType))) {
			if(!$database->query('ALTER TABLE `'.TABLE_PREFIX.$aTable[$x].'` Engine = \'MyISAM\' ')) {
				$msg[] = $database->get_error();
			}
		}
	} else {
		$msg[] = $database->get_error();
	}
}

// later in upgrade.php
$table_name = TABLE_PREFIX.'mod_form_settings';
$field_name = 'perpage_submissions';
$description = "INT NOT NULL DEFAULT '10' AFTER `max_submissions`";
if(!$database->field_exists($table_name,$field_name)) {
	$database->field_add($table_name, $field_name, $description);
}
// ------------------------------------
