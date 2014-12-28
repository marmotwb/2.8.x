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
 * SqlImport.php
 *
 * @category     Core
 * @package      Core_Database
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: 2070 $
 * @lastmodified $Date: 2014-01-03 02:21:42 +0100 (Fr, 03 Jan 2014) $
 * @since        File available since 30.11.2014
 * @description  can handle different actions with SQL-Import files
 */
class SqlImport {

/** WbDatabase object */
    protected $oDb          = null;
/** valide structure file to use for import */
    protected $sStructFile  = '';
/** valide TablePrefix to use for import */
    protected $sTablePrefix = '';
/** default Collation to use for import of chars/text */
    protected $sCollation   = 'utf8_unicode_ci';
/** default engine for tables */
    protected $sEngine      = 'MyISAM';
/** collected error messages */
    protected $aErrMsg      = array();
/** possible actions for doImport() */
    protected $aActions     = array(
        'uninstall',
        'install',
        'upgrade'
    );
/** collected additional replacements pairs */
    protected $aReplacements = array('key'=>array(), 'value'=>array());
/** possible engines to use */
    protected $aEngineTypesAvail = array(
        'memory'     => 'MEMORY',
        'myisam'     => 'MyISAM',
        'innodb'     => 'InnoDB',
        'archive'    => 'ARCHIVE'
    );
/** SQL objects witch can be handled */
    protected $aAvailSqlObjects = array(
        'TABLE',
        'VIEW',
        'INDEX',
        'PROCEDURE',
        'FUNCTION',
        'TRIGGER',
        'EVENT'
    );
/**
 * Constructor
 * @param WbDatabase $oDb
 * @param string $sStructFile
 */
    public function __construct(WbDatabase $oDb, $sStructFile)
    {
        $this->oDb = $oDb;
        $this->sTablePrefix = $oDb->TablePrefix;
        if (file_exists($sStructFile)) {
            $this->sStructFile = str_replace('\\', '/', $sStructFile);
        } else {
            $this->sStructFile = '';
            $this->aErrMsg[] = 'file with structure not available! ['.$sStructFile.']';
        }
    }
/**
 * Add Key-Value pairs for additional placeholders
 * @param string $sKey
 * @param mixed $sValue
 */
    public function addReplacement($sKey, $sValue = '')
    {
        $sKey = strtoupper(preg_replace('/([a-z0-9])([A-Z])/', '\1_\2', ltrim($sKey, 'a..z')));
        $this->aReplacements['key'][]  = '/\{'.$sKey.'\}/';
        $this->aReplacements['value'][] = $sValue;
    }
/**
 * define another collation then default utf8_unicode_ci
 * @param string $sCollation
 * @return boolean
 */
    public function setDefaultCollation($sCollation = 'utf8_unicode_ci')
    {
        $bRetval = false;
        // test if selected collation is available on current server.
        $sql = 'SHOW COLLATION LIKE \''.$this->oDb->escapeString($sCollation).'\'';
        if (($oAvailCollations = $this->oDb->doQuery($sql))) {
            if (($oAvailCollations->numRows())) {
                //use new collation
                $this->sCollation = $sCollation;
                $bRetval = true;
            }
        }
        return $bRetval;
    }
/**
 * define another prefix then 'MyISAM'
 * @param string $sEngine
 * @return boolean
 */
    public function setDefaultEngine($sEngine ='MyISAM')
    {
        $bRetval = false;
        if (isset($this->aEngineTypesAvail[strtolower($sEngine)])) {
            // use new engine
            $this->sEngine = $this->aEngineTypesAvail[strtolower($sEngine)];
            $bRetval = true;
        }
        return $bRetval;
    }
/**
 * define another prefix then default in Wbdatabase
 * @param string $sTablePrefix
 * @return boolean
 */
    public function setTablePrefix($sTablePrefix = '')
    {
        $bRetval = false;
        if (
        // Prefix must be empty or matching allowed table names
            $sTablePrefix == '' ||
            preg_match('/^[a-z][a-z0-9_]*$/i', $sTablePrefix)
        ) {
            // use new TablePrefix
            $this->sTablePrefix = $sTablePrefix;
            $bRetval = true;
        }
        return $bRetval;
    }
/**
 * Start and execute the import
 * @param string $sAction
 * @return boolean
 */
    public function doImport($sAction)
    {
        if (! $this->sStructFile) {
        // no file found so ignore import method
            return true;
        }
        if (! is_readable($this->sStructFile)) {
        // file fond but it's not readable
            $this->aErrMsg[] = 'unable to read file ['.$this->sStructFile.']';
            return false;
        }
        $sAction = strtolower(
            preg_replace(
                '/^.*?('.implode('|', $this->aActions).')(\.php)?$/i',
                '$1',
                $sAction
            )
        );
        $sAction = ($sAction == '' ? 'install' : $sAction);
        if ($this->importSql($sAction)) {
            return true;
        } else {
            $this->aErrMsg[] = $this->oDb->getError();
            return false;
        }
    }
/**
 * return errorstrings, concatet by LF
 * @return string
 */
    public function getError()
    {
        return implode(PHP_EOL, $this->aErrMsg);
    }
/**
 * Import an SQl-Dumpfile witch can include unlimited additional placeholders for values
 * @param string $sAction 'install' || 'uninstall' || 'upgrade'
 * @return bool  false on error
 */
    protected function importSql($sAction = 'install')
    {
        $retval = true;
        $this->error = '';
        // sanitize arguments
        $aTmp = preg_split('/_/', $this->sCollation, null, PREG_SPLIT_NO_EMPTY);
        $sCharset = $aTmp[0];
        // get from addReplacements
        $aSearch  = $this->aReplacements['key'];
        /* ***  ATTENTION:: Do Not Change The Order Of Search-Replace Statements !! *** */
        // define basic array of searches
        $aSearch[] = '/\{TABLE_PREFIX\}/';                                        /* step 0 */
        $aSearch[] = '/\{FIELD_CHARSET\}/';                                       /* step 1 */
        $aSearch[] = '/\{FIELD_COLLATION\}/';                                     /* step 2 */
        $aSearch[] = '/\{TABLE_ENGINE\}/';                                        /* step 3 */
        $aSearch[] = '/\{TABLE_ENGINE=([a-zA-Z_0-9]*)\}/';                        /* step 4 */
        $aSearch[] = '/\{CHARSET\}/';                                             /* step 5 */
        $aSearch[] = '/\{COLLATION\}/';                                           /* step 6 */
        // get from addReplacements
        $aReplace = $this->aReplacements['value'];
        // define basic array of replacements
        $aReplace[] = $this->sTablePrefix;                                        /* step 0 */
        $aReplace[] = ' CHARACTER SET {CHARSET}';                                 /* step 1 */
        $aReplace[] = ' COLLATE {COLLATION}';                                     /* step 2 */
        $aReplace[] = ' {TABLE_ENGINE='.$this->sEngine.'}';                       /* step 3 */
        $aReplace[] = ' ENGINE=$1 DEFAULT CHARSET={CHARSET} COLLATE={COLLATION}'; /* step 4 */
        $aReplace[] = $sCharset;                                                  /* step 5 */
        $aReplace[] = $this->sCollation;                                          /* step 6 */

        $sql = ''; // buffer for statements
        $aSql = file($this->sStructFile, FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
        //  remove possible ByteOrderMark
        $aSql[0] = preg_replace('/^[\xAA-\xFF]{3}/', '', $aSql[0]);
    // iterate file line by line
        while (sizeof($aSql) > 0) {
            // remove trailing and leading whitespaces
            $sSqlLine = trim(array_shift($aSql));
            // skip line if it's a comment
            if (preg_match('/^--/', $sSqlLine)) { continue; }
            // attach line to buffer
            $sql = $sql.' '.$sSqlLine;
            // detect end of statement
            if ((substr($sql,-1,1) == ';')) {
                // replace placeholders in statement
                $sql = trim(preg_replace($aSearch, $aReplace, $sql));
                $sAvailSqlObjects = implode('|', $this->aAvailSqlObjects);
                switch ($sAction) {
                    case 'uninstall': // execute DROP - skip CREATE
                        if (preg_match('/^\s*CREATE ('.$sAvailSqlObjects.') /si', $sql)) {
                            $sql = ''; // clear buffer
                            continue 2; // read next statement
                        }
                        break;
                    case 'upgrade': // skip DROP; execute CREATE
                        if (preg_match('/^\s*DROP ('.$sAvailSqlObjects.') /si', $sql)) {
                            $sql = ''; // clear buffer
                            continue 2; // read next statement
                        }
                        break;
                    default: // install:  execute DROP; execute CREATE
                        break;
                }
                if (!$this->oDb->doQuery($sql)) {
                    $retval = false;
                    $this->aErrMsg[] = $this->oDb->getError();
                    unset($aSql);
                    break;
                }
                $sql = ''; // clear buffer
            }
        }
        return $retval;
    } // end of function importSql()

}