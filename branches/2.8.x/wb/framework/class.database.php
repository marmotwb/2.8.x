<?php
/**
 *
 * @category        framework
 * @package         database
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL:  $
 * @lastmodified    $Date:  $
 *
 */

/*

Database class

This class will be used to interface between the database
and the Website Baker code

*/

// Stop this file from being accessed directly
if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

if(!defined('DB_URL')) {
	//define('DB_URL', DB_TYPE.'://'.DB_USERNAME.':'.DB_PASSWORD.'@'.DB_HOST.'/'.DB_NAME);
}

define('DATABASE_CLASS_LOADED', true);

class database {

	private $db_handle  = null; // readonly from outside

	private $connected  = false;

	private $error      = '';
	private $error_type = '';
	private $message    = array();


	// Set DB_URL
	function database($url = '') {
		// Connect to database
		$this->connect();
		// Check for database connection error
		if($this->is_error()) {
			die($this->get_error());
		}
	}
	
	// Connect to the database
	function connect() {
		$status = $this->db_handle = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		if(mysql_error()) {
			$this->connected = false;
			$this->error = mysql_error();
		} else {
			if(!mysql_select_db(DB_NAME)) {
				$this->connected = false;
				$this->error = mysql_error();
			} else {
				$this->connected = true;
			}
		}
		return $this->connected;
	}
	
	// Disconnect from the database
	function disconnect() {
		if($this->connected==true) {
			mysql_close();
			return true;
		} else {
			return false;
		}
	}
	
	// Run a query
	function query($statement) {
		$mysql = new mysql();
		$mysql->query($statement);
		$this->set_error($mysql->error());
		if($mysql->error()) {
			return null;
		} else {
			return $mysql;
		}
	}

	// Gets the first column of the first row
	function get_one( $statement )
	{
		$fetch_row = mysql_fetch_array(mysql_query($statement) );
		$result = $fetch_row[0];
		$this->set_error(mysql_error());
		if(mysql_error()) {
			return null;
		} else {
			return $result;
		}
	}
	
	// Set the DB error
	function set_error($message = null) {
		global $TABLE_DOES_NOT_EXIST, $TABLE_UNKNOWN;
		$this->error = $message;
		if(strpos($message, 'no such table')) {
			$this->error_type = $TABLE_DOES_NOT_EXIST;
		} else {
			$this->error_type = $TABLE_UNKNOWN;
		}
	}
	
	// Return true if there was an error
	function is_error() {
		return (!empty($this->error)) ? true : false;
	}
	
	// Return the error
	function get_error() {
		return $this->error;
	}

/*
 * default Getter
 */
	public function __get($var_name)
	{
		if($var_name == 'db_handle')
		{
			return $this->db_handle;
		}
		return null;
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to seek for
 * @return bool: true if field exists
 */
	public function field_exists($table_name, $field_name)
	{
		$sql = 'DESCRIBE `'.$table_name.'` `'.$field_name.'` ';
		$query = $this->query($sql);
		return ($query->numRows() != 0);
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $index_name: name of the index to seek for
 * @return bool: true if field exists
 */
	public function index_exists($table_name, $index_name, $number_fields = 0)
	{
		$number_fields = intval($number_fields);
		$keys = 0;
		$sql = 'SHOW INDEX FROM `'.$table_name.'`';
		if( ($res_keys = $this->query($sql)) )
		{
			while(($rec_key = $res_keys->fetchRow()))
			{
				if( $rec_key['Key_name'] == $index_name )
				{
					$keys++;
				}
			}

		}
		if( $number_fields == 0 )
		{
			return ($keys != $number_fields);
		}else
		{
			return ($keys == $number_fields);
		}
	}
/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to add
 * @param string $description: describes the new field like ( INT NOT NULL DEFAULT '0')
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function field_add($table_name, $field_name, $description)
	{
		if( !$this->field_exists($field_name, $table_name) )
		{ // add new field into a table
			$sql = 'ALTER TABLE `'.$table_name.'` ADD '.$field_name.' '.$description.' ';
			$query = $this->query($sql);
			$this->set_error(mysql_error());
			if( !$this->is_error() )
			{
				return ( $this->field_exists($field_name, $table_name) ) ? true : false;
			}
		}else
		{
			$this->set_error('field \''.$field_name.'\' already exists');
		}
		return false;
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to add
 * @param string $description: describes the new field like ( INT NOT NULL DEFAULT '0')
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function field_modify($table_name, $field_name, $description)
	{
		$retval = false;
		if( $this->field_exists($field_name, $table_name) )
		{ // modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` DROP `'.$field_name.'`';
		}
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to remove
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function field_remove($table_name, $field_name)
	{
		$retval = false;
		if( $this->field_exists($field_name, $table_name) )
		{ // modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` DROP `'.$field_name.'`';
			$retval = ( $this->query($sql) ? true : false );
		}
		return $retval;
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $index_name: name of the new index
 * @param string $field_list: comma seperated list of fields for this index
 * @param string $index_type: kind of index (UNIQUE, PRIMARY, '')
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function index_add($table_name, $index_name, $field_list, $index_type = '')
	{
		$retval = false;
		$field_list = str_replace(' ', '', $field_list);
		$field_list = explode(',', $field_list);
		$number_fields = sizeof($field_list);
		$field_list = '`'.implode('`,`', $field_list).'`';
		if( $this->index_exists($table_name, $index_name, $number_fields) ||
		    $this->index_exists($table_name, $index_name))
		{
			$sql  = 'ALTER TABLE `'.$table_name.'` ';
			$sql .= 'DROP INDEX `'.$index_name.'`';
			if( $this->query($sql))
			{
				$sql  = 'ALTER TABLE `'.$table_name.'` ';
				$sql .= 'ADD '.$index_type.' `'.$index_name.'` ( '.$field_list.' ); ';
				if( $this->query($sql)) { $retval = true; }
			}
		}
		return $retval;
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to remove
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function index_remove($table_name, $index_name)
	{
		$retval = false;
		if( $this->index_exists($table_name, $index_name) )
		{ // modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` DROP INDEX `'.$index_name.'`';
			$retval = ( $this->query($sql) ? true : false );
		}
		return $retval;
	}

} /// end of class database

class mysql {

	// Run a query
	function query($statement) {
		$this->result = mysql_query($statement);
		$this->error = mysql_error();
		return $this->result;
	}
	
	// Fetch num rows
	function numRows() {
		return mysql_num_rows($this->result);
	}

	// Fetch row  $typ = MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
	function fetchRow($typ = MYSQL_BOTH) {
		return mysql_fetch_array($this->result, $typ);
	}

	// Get error
	function error() {
		if(isset($this->error)) {
			return $this->error;
		} else {
			return null;
		}
	}

}

?>