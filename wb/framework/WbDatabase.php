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
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @author       Dietmar W. <dietmar.woellbrink@websitebaker.org>
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
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

	protected $oDbHandle    = null; // readonly from outside
	protected $sDbName      = '';
	protected $sInstanceIdentifier = '';
	protected $sTablePrefix = '';
	protected $sCharset     = '';
	protected $connected    = false;
	protected $error        = '';
	protected $error_type   = '';
	protected $iQueryCount  = 0;

/**
 * __constructor
 *  prevent from public instancing
 */
	protected function  __construct() {}
/**
 * prevent from cloning
 */
	private function __clone() {}
/**
 * get a valid instance of this class
 * @param string $sIdentifier selector for several different instances
 * @return WbDatabase object
 */
	public static function getInstance($sIdentifier = 'core')
	{
		if( !isset(self::$_oInstances[$sIdentifier])) {
            $c = __CLASS__;
			$oInstance = new $c;
			$oInstance->sInstanceIdentifier = $sIdentifier;
            self::$_oInstances[$sIdentifier] = $oInstance;
		}
		return self::$_oInstances[$sIdentifier];
	}
/**
 * disconnect and kills an existing instance
 * @param string $sIdentifier selector for instance to kill
 */
	public static function killInstance($sIdentifier)
	{
		if($sIdentifier != 'core') {
			if( isset(self::$_oInstances[$sIdentifier])) {
				self::$_oInstances[$sIdentifier]->disconnect();
				unset(self::$_oInstances[$sIdentifier]);
			}
		}
	}
/**
 * Establish connection
 * @param string $url
 * @return bool
 * @throws WbDatabaseException
 * @description opens a connection using connect URL<br />
 *              Example for SQL-Url:  'mysql://user:password@example.com[:3306]/database?charset=utf8&tableprefix=xx_'
 */
	public function doConnect($url = '')
	{
		if ($this->connected) { return $this->connected; } // prevent from reconnecting
		$this->connected = false;
		if ($url != '') {
		// parse URL and extract connection data
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
			foreach ($aQuery as $sArgument) {
				$aArg = explode('=', $sArgument);
				switch (strtolower($aArg[0])) {
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
			$this->sDbName = $db_name;
		} else {
			throw new WbDatabaseException('Missing parameter: unable to connect database');
		}
		$this->oDbHandle = @mysql_connect($hostname.$hostport, $username, $password, true);
		if (!$this->oDbHandle) {
			throw new WbDatabaseException('unable to connect \''.$scheme.'://'.$hostname.$hostport.'\'');
		} else {
			if (!@mysql_select_db($db_name, $this->oDbHandle)) {
				throw new WbDatabaseException('unable to select database \''.$db_name.
				                              '\' on \''.$scheme.'://'.
				                              $hostname.$hostport.'\''
				                             );
			} else {
				if ($this->sCharset) {
					@mysql_query('SET NAMES \''.$this->sCharset.'\'', $this->oDbHandle);
				}
				$this->connected = true;
			}
		}
		return $this->connected;
	}
/**
 * disconnect database
 * @return bool
 * @description Disconnect current object from the database<br />
 *              the 'core' connection can NOT be disconnected!
 */
	public function disconnect()
	{
		if ($this->connected == true && $oInstance->sInstanceIdentifier != 'core') {
			mysql_close($this->oDbHandle);
			$this->connected = false;
			return true;
		}
		return false;
	}
/**
 * Alias for doQuery()
 */
	public function query($statement)
	{
		return $this->doQuery($statement);
	}
/**
 * execute query
 * @param string $statement the SQL-statement to execute
 * @return null|\mysql
 */
	public function doQuery($statement) {
		$this->iQueryCount++;
		$mysql = new mysql();
		$mysql->query($statement, $this->oDbHandle);
		$this->set_error($mysql->error($this->oDbHandle));
		if ($mysql->error($this->oDbHandle)) {
			return null;
		} else {
			return $mysql;
		}
	}
/**
 * Alias for getOne()
 */
	public function get_one( $statement )
	{
		return $this->getOne($statement);
	}
	// Gets the first column of the first row
/**
 * Gets the first column of the first row
 * @param string $statement  SQL-statement
 * @return null|mixed
 */
	public function getOne( $statement )
	{
		$this->iQueryCount++;
		$fetch_row = mysql_fetch_array(mysql_query($statement, $this->oDbHandle));
		$result = $fetch_row[0];
		$this->set_error(mysql_error($this->oDbHandle));
		if (mysql_error($this->oDbHandle)) {
			return null;
		} else {
			return $result;
		}
	}
/**
 * Alias for setError()
 */
	public function set_error($message = null)
	{
		$this->setError($message = null);
	}
	// Set the DB error
/**
 * setError
 * @param string $message
 */
	public function setError($message = null)
	{
		$this->error = $message;
	}
/**
 * Alias for isError
 */
	public function is_error()
	{
		return $this->isError();
	}
/**
 * isError
 * @return bool
 */
	public function isError()
	{
		return (!empty($this->error)) ? true : false;
	}
/**
 * Alias for getError
 */
	public function get_error()
	{
		return $this->getError();
	}
/**
 * get last Error
 * @return string
 */
	public function getError()
	{
		return $this->error;
	}
/**
 * Protect class from property injections
 * @param string name of property
 * @param mixed value
 * @throws WbDatabaseException
 */	
	public function __set($name, $value)
	{
		throw new WbDatabaseException('tried to set a readonly or nonexisting property ['.$name.']!! ');
	}
/**
 * default Getter for some properties
 * @param string name of the Property
 * @return NULL on error | valid property
 */
	public function __get($sPropertyName)
	{
		switch ($sPropertyName) {
			case 'DbHandle':
			case 'getDbHandle': // << set deprecated
			case 'db_handle': // << set deprecated
				$retval = $this->oDbHandle;
				break;
			case 'LastInsertId':
			case 'getLastInsertId': // << set deprecated
				$retval = mysql_insert_id($this->oDbHandle);
				break;
			case 'DbName':
			case 'getDbName': // << set deprecated
			case 'db_name': // << set deprecated
				$retval = $this->sDbName;
				break;
			case 'TablePrefix':
			case 'getTablePrefix': // << set deprecated
				$retval = $this->sTablePrefix;			
				break;
			case 'QueryCount':
			case 'getQueryCount': // << set deprecated
				$retval = $this->iQueryCount;
				break;
			default:
				$retval = null;
				break;
		}
		return $retval;
	} // __get()
/**
 * Escapes special characters in a string for use in an SQL statement
 * @param string $unescaped_string
 * @return string
 */
	public function escapeString($unescaped_string)
	{
		return mysql_real_escape_string($unescaped_string, $this->oDbHandle);
	}
/**
 * Last inserted Id
 * @return bool|int false on error, 0 if no record inserted
 */	
	public function getLastInsertId()
	{
		return mysql_insert_id($this->oDbHandle);
	}
/**
 * Alias for isField()
 */
	public function field_exists($table_name, $field_name)
	{
		return $this->isField($table_name, $field_name);
	}
/*
 * @param string full name of the table (incl. TABLE_PREFIX)
 * @param string name of the field to seek for
 * @return bool true if field exists
 */
	public function isField($table_name, $field_name)
	{
		$sql = 'DESCRIBE `'.$table_name.'` `'.$field_name.'` ';
		$query = $this->query($sql, $this->oDbHandle);
		return ($query->numRows() != 0);
	}
/**
 * Alias for isIndex()
 */
	public function index_exists($table_name, $index_name, $number_fields = 0)
	{
		return $this->isIndex($table_name, $index_name, $number_fields = 0);
	}
/*
 * isIndex
 * @param string full name of the table (incl. TABLE_PREFIX)
 * @param string name of the index to seek for
 * @return bool true if field exists
 */
	public function isIndex($table_name, $index_name, $number_fields = 0)
	{
		$number_fields = intval($number_fields);
		$keys = 0;
		$sql = 'SHOW INDEX FROM `'.$table_name.'`';
		if (($res_keys = $this->doQuery($sql, $this->oDbHandle))) {
			while (($rec_key = $res_keys->fetchRow(MYSQL_ASSOC))) {
				if ( $rec_key['Key_name'] == $index_name ) {
					$keys++;
				}
			}

		}
		if ( $number_fields == 0 ) {
			return ($keys != $number_fields);
		} else {
			return ($keys == $number_fields);
		}
	}
/**
 * Alias for addField()
 */
	public function field_add($table_name, $field_name, $description)
	{
		return $this->addField($table_name, $field_name, $description);
	}
/*
 * @param string full name of the table (incl. TABLE_PREFIX)
 * @param string name of the field to add
 * @param string describes the new field like ( INT NOT NULL DEFAULT '0')
 * @return bool true if successful, otherwise false and error will be set
 */
	public function addField($table_name, $field_name, $description)
	{
		if (!$this->isField($table_name, $field_name)) {
		// add new field into a table
			$sql = 'ALTER TABLE `'.$table_name.'` ADD '.$field_name.' '.$description.' ';
			$query = $this->doQuery($sql, $this->oDbHandle);
			$this->set_error(mysql_error($this->oDbHandle));
			if (!$this->isError()) {
				return ( $this->isField($table_name, $field_name) ) ? true : false;
			}
		} else {
			$this->set_error('field \''.$field_name.'\' already exists');
		}
		return false;
	}
/**
 * Alias for modifyField()
 */
	public function field_modify($table_name, $field_name, $description)
	{
		return $this->modifyField($table_name, $field_name, $description);
	}
/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to add
 * @param string $description: describes the new field like ( INT NOT NULL DEFAULT '0')
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function modifyField($table_name, $field_name, $description)
	{
		$retval = false;
		if ($this->isField($table_name, $field_name)) {
		// modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` MODIFY `'.$field_name.'` '.$description;
			$retval = ( $this->doQuery($sql, $this->oDbHandle) ? true : false);
			$this->setError(mysql_error());
		}
		return $retval;
	}
/**
 * Alias for removeField()
 */
	public function field_remove($table_name, $field_name)
	{
		return $this->removeField($table_name, $field_name);
	}
/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to remove
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function removeField($table_name, $field_name)
	{
		$retval = false;
		if ($this->isField($table_name, $field_name)) {
		// modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` DROP `'.$field_name.'`';
			$retval = ( $this->doQuery($sql, $this->oDbHandle) ? true : false );
		}
		return $retval;
	}
/**
 * Alias for addIndex()
 */
    public function index_add($table_name, $index_name, $field_list, $index_type = 'KEY')
	{
		return $this->addIndex($table_name, $index_name, $field_list, $index_type);
	}
/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $index_name: name of the new index (empty string for PRIMARY)
 * @param string $field_list: comma seperated list of fields for this index
 * @param string $index_type: kind of index (PRIMARY, UNIQUE, KEY, FULLTEXT)
 * @return bool: true if successful, otherwise false and error will be set
 */
     public function addIndex($table_name, $index_name, $field_list, $index_type = 'KEY')
     {
        $retval = false;
        $field_list = explode(',', (str_replace(' ', '', $field_list)));
        $number_fields = sizeof($field_list);
        $field_list = '`'.implode('`,`', $field_list).'`';
        $index_name = $index_type == 'PRIMARY' ? $index_type : $index_name;
        if ( $this->isIndex($table_name, $index_name, $number_fields) ||
             $this->isIndex($table_name, $index_name))
        {
            $sql  = 'ALTER TABLE `'.$table_name.'` ';
            $sql .= 'DROP INDEX `'.$index_name.'`';
            if (!$this->doQuery($sql, $this->oDbHandle)) { return false; }
        }
        $sql  = 'ALTER TABLE `'.$table_name.'` ';
        $sql .= 'ADD '.$index_type.' ';
        $sql .= $index_type == 'PRIMARY' ? 'KEY ' : '`'.$index_name.'` ';
        $sql .= '( '.$field_list.' ); ';
        if ($this->doQuery($sql, $this->oDbHandle)) { $retval = true; }
        return $retval;
    }
/**
 * Alias for removeIndex()
 */
	public function index_remove($table_name, $index_name)
	{
		return $this->removeIndex($table_name, $index_name);
	}
/*
 * @param string $table_name: full name of the table (incl. TABLE_PREFIX)
 * @param string $field_name: name of the field to remove
 * @return bool: true if successful, otherwise false and error will be set
 */
	public function removeIndex($table_name, $index_name)
	{
		$retval = false;
		if ($this->isIndex($table_name, $index_name)) {
		// modify a existing field in a table
			$sql  = 'ALTER TABLE `'.$table_name.'` DROP INDEX `'.$index_name.'`';
			$retval = ( $this->doQuery($sql, $this->oDbHandle) ? true : false );
		}
		return $retval;
	}
/**
 * Alias for importSql()
 */
	public function SqlImport($sSqlDump,
	                          $sTablePrefix = '',
	                          $bPreserve    = true,
	                          $sEngine      = 'MyISAM',
	                          $sCollation   = 'utf8_unicode_ci')
	{
		return $this->importSql($sSqlDump, $sTablePrefix, $bPreserve, $sEngine, $sCollation);
	}
/**
 * Import a standard *.sql dump file
 * @param string $sSqlDump link to the sql-dumpfile
 * @param string $sTablePrefix
 * @param bool     $bPreserve   set to true will ignore all DROP TABLE statements
 * @param string   $sEngine     can be 'MyISAM' or 'InnoDB'
 * @param string   $sCollation  one of the list of available collations
 * @return boolean true if import successful
 * @description Import a standard *.sql dump file<br />
 *              The file can include placeholders TABLE_PREFIX, TABLE_COLLATION and TABLE_ENGINE
 */
	public function importSql($sSqlDump,
	                          $sTablePrefix = '', /* unused argument, for backward compatibility only! */
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
		while (sizeof($aSql) > 0) {
			$sSqlLine = trim(array_shift($aSql));
			if (!preg_match('/^[-\/]+.*/', $sSqlLine)) {
				$sql = $sql.' '.$sSqlLine;
				if ((substr($sql,-1,1) == ';')) {
					$sql = trim(str_replace( $aSearch, $aReplace, $sql));
					if (!($bPreserve && preg_match('/^\s*DROP TABLE IF EXISTS/siU', $sql))) {
						if (!mysql_query($sql, $this->oDbHandle)) {
							$retval = false;
							$this->error = mysql_error($this->oDbHandle);
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
		$mysqlVersion = mysql_get_server_info($this->oDbHandle);
		$engineValue = (version_compare($mysqlVersion, '5.0') < 0) ? 'Type' : 'Engine';
		$sql = 'SHOW TABLE STATUS FROM `' . $this->sDbName . '` LIKE \'' . $table . '\'';
		if (($result = $this->doQuery($sql, $this->oDbHandle))) {
			if (($row = $result->fetchRow(MYSQL_ASSOC))) {
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
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      2.9.0
 * @revision     $Revision$
 * @lastmodified $Date$
 * @description  Exceptionhandler for the WbDatabase and depending classes
 */
class WbDatabaseException extends AppException {}

/* extend global constants of mysql */
if(!defined('MYSQL_SEEK_FIRST')) { define('MYSQL_SEEK_FIRST', 0); }
if(!defined('MYSQL_SEEK_LAST')) { define('MYSQL_SEEK_LAST', -1); }

/**
 * mysql
 *
 * @category     Core
 * @package      Core_database
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      2.9.0
 * @revision     $Revision$
 * @lastmodified $Date$
 * @description  MYSQL result object for requests
 *
 */
class mysql {

	private $result = null;
	private $oDbHandle = null;

/**
 * query sql statement
 * @param  string $statement
 * @param  object $dbHandle
 * @return object
 * @throws WbDatabaseException
 */
	function query($statement, $dbHandle)
	{
		$this->oDbHandle = $dbHandle;
		$this->result = @mysql_query($statement, $this->oDbHandle);
		if ($this->result === false) {
			if (DEBUG) {
				throw new WbDatabaseException(mysql_error($this->oDbHandle));
			} else {
				throw new WbDatabaseException('Error in SQL-Statement');
			}
		}
		$this->error = mysql_error($this->oDbHandle);
		return $this->result;
	}
/**
 * numRows
 * @return integer
 * @description number of returned records
 */
	function numRows()
	{
		return mysql_num_rows($this->result);
	}
/**
 * fetchRow
 * @param  int $typ MYSQL_BOTH(default) | MYSQL_ASSOC | MYSQL_NUM
 * @return array
 * @description get current record and increment pointer
 */
	function fetchRow($typ = MYSQL_BOTH)
	{
		return mysql_fetch_array($this->result, $typ);
	}
/**
 * fetchObject
 * @param  string $sClassname Name of the class to use. Is no given use stdClass
 * @param  string $aParams    optional array of arguments for the constructor
 * @return object
 * @description get current record as an object and increment pointer
 */
	function fetchObject($sClassName = null, array $aParams = null)
	{
		if ($sClassName === null || class_exists($sClassName)) {
			return mysql_fetch_object($this->result, $sClassName, $aParams);
		} else {
			throw new WbDatabaseException('Class <'.$sClassName.'> not available on request of mysql_fetch_object()');
		}
	}
/**
 * rewind
 * @return bool
 * @description set the recordpointer to the first record || false on error
 */
	function rewind()
	{
		return $this->seekRow(MYSQL_SEEK_FIRST);
	}
/**
 * seekRow
 * @param int $position
 * @return bool
 * @description set the pointer to the given record || false on error
 */
	function seekRow( $position = MYSQL_SEEK_FIRST )
	{
		$pmax = $this->numRows() - 1;
		$p = (($position < 0 || $position > $pmax) ? $pmax : $position);
		return mysql_data_seek($this->result, $p);
	}
/**
 * freeResult
 * @return bool
 * @description remove retult object from memeory
 */
	function freeResult()
	{
		return mysql_free_result($this->result);
	}
/** 
 * Get error
 * @return string || null if no error
 */
	function error()
	{
		if (isset($this->error)) {
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
		$oDb = WbDatabase::getInstance();
		if (!is_array($key)) {
			if (trim($key) != '') {
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
			     . 'FROM `'.$oDb->TablePrefix.$table.'` '
			     . 'WHERE `name` = \''.$index.'\' ';
			if ($oDb->getOne($sql)) {
				$sql = 'UPDATE ';
				$sql_where = 'WHERE `name` = \''.$index.'\'';
			} else {
				$sql = 'INSERT INTO ';
				$sql_where = '';
			}
			$sql .= '`'.$oDb->TablePrefix.$table.'` ';
			$sql .= 'SET `name` = \''.$index.'\', ';
			$sql .= '`value` = \''.$val.'\' '.$sql_where;
			if (!$oDb->doQuery($sql)) {
				$retval = false;
			}
		}
		return $retval;
	}
