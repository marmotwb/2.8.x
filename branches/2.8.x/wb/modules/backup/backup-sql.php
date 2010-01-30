<?php
/**
 *
 * @category        modules
 * @package         backup
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
*/

// Filename to use
$filename = $_SERVER['HTTP_HOST'].'-backup-'.gmdate('Y-m-d', time()+TIMEZONE).'.sql';

// Check if user clicked on the backup button
if(!isset($_POST['backup'])){
	header('Location: ../');
	exit(0);
}

// Include config
require_once('../../config.php');

// Begin output var
$output = "".
"#\n".
"# Website Baker ".WB_VERSION." Database Backup\n".
"# ".WB_URL."\n".
"# ".gmdate(DATE_FORMAT, time()+TIMEZONE).", ".gmdate(TIME_FORMAT, time()+TIMEZONE)."\n".
"#".
"\n";

// Get table names
// Use this one for ALL tables in DB
$query  = "SHOW TABLES";

if ($_POST['tables']=='WB') {
	// Or use this to get ONLY wb tables
	$prefix=str_replace('_','\_',TABLE_PREFIX);
	$query = "SHOW TABLES LIKE '".$prefix."%'";
}

$result = $database->query($query);

// Loop through tables
while($row = $result->fetchRow()) {
	//show sql query to rebuild the query
	$sql = 'SHOW CREATE TABLE '.$row[0].''; 
	$query2 = $database->query($sql); 
	// Start creating sql-backup
	$sql_backup ="\r\n# Create table ".$row[0]."\r\n\r\n";
	$out = $query2->fetchRow();
	$sql_backup.=$out['Create Table'].";\r\n\r\n"; 
	$sql_backup.="# Dump data for ".$row[0]."\r\n\r\n";
	// Select everything
	$out = $database->query('SELECT * FROM '.$row[0]); 
	$sql_code = '';
	// Loop through all collumns
	while($code = $out->fetchRow()) { 
		$sql_code .= "INSERT INTO ".$row[0]." SET "; 
		$numeral = 0;
		foreach($code as $insert => $value) {
			// Loosing the numerals in array -> mysql_fetch_array($result, MYSQL_ASSOC) WB hasn't? 
			if($numeral==1) {
				$sql_code.=$insert ."='".addslashes($value)."',";
			}
			$numeral = 1 - $numeral;
		}
		$sql_code = substr($sql_code, 0, -1);
		$sql_code.= ";\r\n";
	}
	$output .= $sql_backup.$sql_code; 
}

// Output file
header('Content-Type: text/html');
header('Content-Disposition: attachment; filename='.$filename);
echo $output;

?>