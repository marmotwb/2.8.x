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

$table_name = TABLE_PREFIX .'mod_output_filter';
$field_name = 'sys_rel';
$description = 'VARCHAR(1) NOT NULL DEFAULT \'0\'';
$msg_flag = ($database->field_add($table_name,$field_name,$description ));
$sql = 'UPDATE ';
$sql .= '`'.$table.'` ';
$sql .= 'SET `'.$field_name.'` = \'1\' ';
if( !$database->query($sql.$sqlwhere) )
{
	$sql_info = mysql_info($database->db_handle);
}
