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
 * WbDatabase.php
 *
 * @category     Core
 * @package      Core_database
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @author       Dietmar W. <dietmar.woellbrink@websitebaker.org>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.9
 * @revision     $Revision$
 * @lastmodified $Date$
 * @deprecated   from WB version number 2.9
 * @description  Mysql database wrapper for use with websitebaker up to version 2.8.4
 */

/* -------------------------------------------------------- */
@define('DATABASE_CLASS_LOADED', true);

class WbDatabase {

	private static $_oInstances = array();

	private $_db_handle  = null; // readonly from outside
	private $_db_name    = '';
	protected $sTablePrefix = '';
	protected $sCharset     = '';
	protected $connected    = false;
	protected $error        = '';
	protected $error_type   = '';
	protected $iQueryCount  = 0;

/* prevent from public instancing */
	protected function  __construct() {}
/* prevent from cloning */
	private function __clone() {}
/**
 * get a valid instance of this class
 * @param string $sIdentifier selector for several different instances
 * @return object
 */
	public static function getInstance($sIdentifier = 'core') {
		if( !isset(self::$_oInstances[$sIdentifier])) {
            $c = __CLASS__;
            self::$_oInstances[$sIdentifier] = new $c;
		}
		return self::$_oInstances[$sIdentifier];
	}
/**
 * disconnect and kills an existing instance
 * @param string $sIdentifier
 */
	public static function killInstance($sIdentifier) {
		if($sIdentifier != 'core') {
			if( isset(self::$_oInstances[$sIdentifier])) {
				self::$_oInstances[$sIdentifier]->disconnect();
				unset(self::$_oInstances[$sIdentifier]);
			}
		}
	}
/**
 * Connect to the database
 * @param string $url
 * @return bool
 *
 * Example for SQL-Url:  'mysql://user:password@demo.de[:3306]/datenbank'
 */
	public function doConnect($url = '') {
		$this->connected = false;
		if($url != '') {
			$aIni = parse_url($url);
			
			$scheme   = isset($aIni['scheme']) ? $aIni['scheme'] : 'mysql';
			$hostname = isset($aIni['host']) ? $aIni['host'] : '';
			$username = isset($aIni['user']) ? $aIni['user'] : '';
			$password = isset($aIni['pass']) ? $aIni['pass'] : '';
			$hostport = isset($aIni['port']) ? $aIni['port'] : '3306';
			$hostport = $hostport == '3306' ? '' : ':'.$hostport;
			$db_name  = ltrim(isset($aIni['path']) ? $aIni['path'] : '', '/\\');
			$sTmp = isset($aIni['query']) ? $aIni['query'] : '';
			$aQuery = explode('&', $sTmp);
			foreach($aQuery as $sArgument) {
				$aArg = explode('=', $sArgument);
				switch(strtolower($aArg[0])) {
					case 'charset':
						$this->sCharset = strtolower(preg_replace('/[^a-z0-9]/i', '', $aArg[1]));
						break;
					case 'tableprefix':
						$this->sTablePrefix = $aArg[1];
						break;
					default:
						break;
				}
			}
			$this->_db_name = $db_name;
		}else {
			throw new WbDatabaseException('Missing parameter: unable to connect database');
		}
		$this->_db_handle = @mysql_connect($hostname.$hostport,
		                                   $username,
		                                   $password,
		                                   true);
		if(!$this->_db_handle) {
			throw new WbDatabaseException('unable to connect \''.$scheme.'://'.
			                           $hostname.$hostport.'\'');
		} else {
			if(!@mysql_select_db($db_name, $this->_db_handle)) {
				throw new WbDatabaseException('unable to select database \''.$db_name.
				                           '\' on \''.$scheme.'://'.
				                           $hostname.$hostport.'\'');
			} else {
				if($this->sCharset) {
					@mysql_query('SET NAMES \''.$this->sCharset.'\'', $this->_db_handle);
				}
				$this->connected = true;
			}
		}
		return $this->connected;
	}

	// Disconnect from the database
	public function disconnect() {
		if($this->connected==true) {
			mysql_close($this->_db_handle);
			return true;
		} else {
			return false;
		}
	}

	// Run a query
	public function query($statement) {
		$this->iQueryCount++;
		$mysql = new mysql();
		$mysql->query($statement, $this->_db_handle);
		$this->set_error($mysql->error($this->_db_handle));
		if($mysql->error($this->_db_handle)) {
			return null;
		} else {
			return $mysql;
		}
	}

	// Gets the first column of the first row
	public function get_one( $statement )
	{
		$this->iQueryCount++;
		$fetch_row = mysql_fetch_array(mysql_query($statement, $this->_db_handle));
		$result = $fetch_row[0];
		$this->set_error(mysql_error($this->_db_handle));
		if(mysql_error($this->_db_handle)) {
			return null;
		} else {
			return $result;
		}
	}

	// Set the DB error
	public function set_error($message = null) {
		global $TABLE_DOES_NOT_EXIST, $TABLE_UNKNOWN;
		$this->error = $message;
		if(strpos($message, 'no such table')) {
			$this->error_type = $TABLE_DOES_NOT_EXIST;
		} else {
			$this->error_type = $TABLE_UNKNOWN;
		}
	}

	// Return true if there was an error
	public function is_error() {
		return (!empty($this->error)) ? true : false;
	}

	// Return the error
	public function get_error() {
		return $this->error;
	}
/**
 * Protect class from property injections
 * @param string name of property
 * @param mixed value
 * @throws WbDatabaseException
 */	
	public function __set($name, $value) {
		throw new WbDatabaseException('tried to set a readonly or nonexisting property ['.$name.']!! ');
	}
/**
 * default Getter for some properties
 * @param string name of the Property
 * @return mixed NULL on error or missing property
 */
	public function __get($sPropertyName)
	{
		switch ($sPropertyName):
			case 'db_handle':
			case 'DbHandle':
			case 'getDbHandle':
				$retval = $this->_db_handle;
				break;
			case 'LastInsertId':
			case 'getLastInsertId':
				$retval = mysql_insert_id($this->_db_handle);
				break;
			case 'db_name':
			case 'DbName':
			case 'getDbName':
				$retval = $this->_db_name;
				break;
			case 'TablePrefix':
			case 'getTablePrefix':
				$retval = $this->sTablePrefix;			
				break;
			case 'getQueryCount':
				$retval = $this->iQueryCount;
				break;
			default:
				$retval = null;
				break;
		endswitch;
		return $retval;
	} // __get()
/**
 * Escapes special characters in a string for use in an SQL statement
 * @param string $unescaped_string
 * @return string
 */
	public function escapeString($unescaped_string)
	{
		return mysql_real_escape_string($unescaped_string, $this->_db_handle);
	}
/**
 * Last inserted Id
 * @return bool|int false on error, 0 if no record inserted
 */	
	public function getLastInsertId()
	{
		return mysql_insert_id($this->_db_handle);
	}
/*
 * @param string full name of the table (incl. TABLE_PREFIX)
 * @param string name of the field to seek for
 * @return bool true if field exists
 */
	public function field_exists($table_name, $field_name)
	{
		$sql = 'DESCRIBE `'.$table_name.'` `'.$field_name.'` ';
		$query = $this->query($sql, $this->_db_handle);
		return ($query->numRows() != 0);
	}
/*
 * @param string full name of the table (incl. TABLE_PREFIX)
 * @param string name of the index to seek for
 * @return bool true if field exists
 */
	public function index_exists($table_name, $index_name, $number_fields = 0)
	{
		$number_fields = intval($number_fields);
		$keys = 0;
		$sql = 'SHOW INDEX FROM `'.$table_name.'`';
		if( ($res_keys = $this->query($sql, $this->_db_handle)) )
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
 * @param string full name of the table (incl. TABLE_PREFIX)
 * @param string name of the field to add
 * @param string describes the new field like ( INT NOT NULL DEFAULT '0')
 * @return bool true if successful, otherwise false and error will be set
 */
	public function field_add($table_name, $field_name, $description)
	{
		if( !$this->field_exists($table_name, $field_name) )
		{ // add new field into a table
			$sql = 'ALTER TABLE `'.$table_name.'` ADD '.$field_name.' '.$description.' ';
			$query = $this->query($sql, $this->_db_handle);
			$this->set_error(mysql_error($this->_db_handle));
			if( !$this->is_error() )
			{
				return ( $this->field_exists($table_name, $field_name) ) ? true : false;
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
		if( $this->field_exists($table_name, $field_name) )
		{ // modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` MODIFY `'.$field_name.'` '.$description;
			$retval = ( $this->query($sql, $this->_db_handle) ? true : false);
			$this->set_error(mysql_error());
		}
		return $retval;
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to remove
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function field_remove($table_name, $field_name)
	{
		$retval = false;
		if( $this->field_exists($table_name, $field_name) )
		{ // modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` DROP `'.$field_name.'`';
			$retval = ( $this->query($sql, $this->_db_handle) ? true : false );
		}
		return $retval;
	}

/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $index_name: name of the new index (empty string for PRIMARY)
 * @param string $field_list: comma seperated list of fields for this index
 * @param string $index_type: kind of index (PRIMARY, UNIQUE, KEY, FULLTEXT)
 * @return bool: true if successful, otherwise false and error will be set
 */
     public function index_add($table_name, $index_name, $field_list, $index_type = 'KEY')
     {
        $retval = false;
        $field_list = explode(',', (str_replace(' ', '', $field_list)));
        $number_fields = sizeof($field_list);
        $field_list = '`'.implode('`,`', $field_list).'`';
        $index_name = $index_type == 'PRIMARY' ? $index_type : $index_name;
        if( $this->index_exists($table_name, $index_name, $number_fields) ||
            $this->index_exists($table_name, $index_name))
        {
            $sql  = 'ALTER TABLE `'.$table_name.'` ';
            $sql .= 'DROP INDEX `'.$index_name.'`';
            if( !$this->query($sql, $this->_db_handle)) { return false; }
        }
        $sql  = 'ALTER TABLE `'.$table_name.'` ';
        $sql .= 'ADD '.$index_type.' ';
        $sql .= $index_type == 'PRIMARY' ? 'KEY ' : '`'.$index_name.'` ';
        $sql .= '( '.$field_list.' ); ';
        if( $this->query($sql, $this->_db_handle)) { $retval = true; }
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
			$retval = ( $this->query($sql, $this->_db_handle) ? true : false );
		}
		return $retval;
	}

/**
 * Import a standard *.sql dump file
 * @param string $sSqlDump link to the sql-dumpfile
 * @param string $sTablePrefix
 * @param bool     $bPreserve   set to true will ignore all DROP TABLE statements
 * @param string   $sEngine     can be 'MyISAM' or 'InnoDB'
 * @param string   $sCollation  one of the list of available collations
 * @return boolean true if import successful
 */
	public function SqlImport($sSqlDump,
	                          $sTablePrefix = '',
	                          $bPreserve    = true,
	                          $sEngine      = 'MyISAM',
	                          $sCollation   = 'utf8_unicode_ci')
	{
		$sCollation = ($sCollation != '' ? $sCollation : 'utf8_unicode_ci');
		$aCharset = preg_split('/_/', $sCollation, null, PREG_SPLIT_NO_EMPTY);
		$sEngine = 'ENGINE='.$sEngine.' DEFAULT CHARSET='.$aCharset[0].' COLLATE='.$sCollation;
		$sCollation = ' collate '.$sCollation;
		$retval = true;
		$this->error = '';
		$aSearch  = array('{TABLE_PREFIX}','{TABLE_ENGINE}', '{TABLE_COLLATION}');
		$aReplace = array($this->sTablePrefix, $sEngine, $sCollation);
		$sql = '';
		$aSql = file($sSqlDump);
//		$aSql[0] = preg_replace('/^\xEF\xBB\xBF/', '', $aSql[0]);
		$aSql[0] = preg_replace('/^[\xAA-\xFF]{3}/', '', $aSql[0]);
		while ( sizeof($aSql) > 0 ) {
			$sSqlLine = trim(array_shift($aSql));
			if (!preg_match('/^[-\/]+.*/', $sSqlLine)) {
				$sql = $sql.' '.$sSqlLine;
				if ((substr($sql,-1,1) == ';')) {
					$sql = trim(str_replace( $aSearch, $aReplace, $sql));
					if (!($bPreserve && preg_match('/^\s*DROP TABLE IF EXISTS/siU', $sql))) {
						if(!mysql_query($sql, $this->_db_handle)) {
							$retval = false;
							$this->error = mysql_error($this->_db_handle);
							unset($aSql);
							break;
						}
					}
					$sql = '';
				}
			}
		}
		return $retval;
	}

/**
 * retuns the type of the engine used for requested table
 * @param string $table name of the table, including prefix
 * @return boolean/string false on error, or name of the engine (myIsam/InnoDb)
 */
	public function getTableEngine($table)
	{
		$retVal = false;
		$mysqlVersion = mysql_get_server_info($this->_db_handle);
		$engineValue = (version_compare($mysqlVersion, '5.0') < 0) ? 'Type' : 'Engine';
		$sql = 'SHOW TABLE STATUS FROM `' . $this->_db_name . '` LIKE \'' . $table . '\'';
		if(($result = $this->query($sql, $this->_db_handle))) {
			if(($row = $result->fetchRow(MYSQL_ASSOC))) {
				$retVal = $row[$engineValue];
			}
		}
		return $retVal;
	}


} /// end of class database
// //////////////////////////////////////////////////////////////////////////////////// //
/**
 * WbDatabaseException
 *
 * @category     Core
 * @package      Core_database
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      2.9.0
 * @revision     $Revision$
 * @lastmodified $Date$
 * @description  Exceptionhandler for the WbDatabase and depending classes
 */
class WbDatabaseException extends AppException {}

define('MYSQL_SEEK_FIRST', 0);
define('MYSQL_SEEK_LAST', -1);

class mysql {

	private $result = null;
	private $_db_handle = null;
	// Run a query
	function query($statement, $dbHandle) {
		$this->_db_handle = $dbHandle;
		$this->result = @mysql_query($statement, $this->_db_handle);
		if($this->result === false) {
			if(DEBUG) {
				throw new WbDatabaseException(mysql_error($this->_db_handle));
			}else{
				throw new WbDatabaseException('Error in SQL-Statement');
			}
		}
		$this->error = mysql_error($this->_db_handle);
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

	function rewind()
	{
		return $this->seekRow();
	}

	function seekRow( $position = MYSQL_SEEK_FIRST )
	{
		$pmax = $this->numRows() - 1;
		$p = (($position < 0 || $position > $pmax) ? $pmax : $position);
		return mysql_data_seek($this->result, $p);
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
// //////////////////////////////////////////////////////////////////////////////////// //
/* this function is placed inside this file temporarely until a better place is found */
/*  function to update a var/value-pair(s) in table ****************************
 *  nonexisting keys are inserted
 *  @param string $table: name of table to use (without prefix)
 *  @param mixed $key:    a array of key->value pairs to update
 *                        or a string with name of the key to update
 *  @param string $value: a sting with needed value, if $key is a string too
 *  @return bool:  true if any keys are updated, otherwise false
 */
	function db_update_key_value($table, $key, $value = '')
	{
		global $database;
		if( !is_array($key))
		{
			if( trim($key) != '' )
			{
				$key = array( trim($key) => trim($value) );
			} else {
				$key = array();
			}
		}
		$retval = true;
		foreach( $key as $index=>$val)
		{
			$index = strtolower($index);
			$sql = 'SELECT COUNT(`setting_id`) '
			     . 'FROM `'.TABLE_PREFIX.$table.'` '
			     . 'WHERE `name` = \''.$index.'\' ';
			if($database->get_one($sql))
			{
				$sql = 'UPDATE ';
				$sql_where = 'WHERE `name` = \''.$index.'\'';
			}else {
				$sql = 'INSERT INTO ';
				$sql_where = '';
			}
			$sql .= '`'.TABLE_PREFIX.$table.'` ';
			$sql .= 'SET `name` = \''.$index.'\', ';
			$sql .= '`value` = \''.$val.'\' '.$sql_where;
			if( !$database->query($sql) )
			{
				$retval = false;
			}
		}
		return $retval;
	}
