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
 * ModuleReorgAbstract.php
 *
 * @category     Core
 * @package      Core_ModuleInterface
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 19.10.2013
 * @description  This class provides the basics for modul depending reorganisation classes
 */
abstract class ModuleReorgAbstract {

/** registry object */
	protected $oReg = null;
/** database object */
	protected $oDb  = null;
/** collector of return values */
	protected $aReport = null;
/** set kind of return values */
	protected $bDetailedLog = false;

/** show minimal log entries */
	const LOG_SHORT    = 0;
/** show extended log entries */
	const LOG_EXTENDED = 1;

/**
 * execute reorganisation
 * @return boolean
 */
	abstract public function execute();

/**
 * constructor
 * @param int $bDetailedLog  can be LOG_EXTENDED or LOG_SHORT
 */
	public function __construct($bDetailedLog = self::LOG_SHORT) {
		$this->bDetailedLog = (bool)($bDetailedLog & self::LOG_EXTENDED);
		$this->oDb          = WbDatabase::getInstance();
		$this->oReg         = WbAdaptor::getInstance();
	}
/**
 * getReport
 * @return array
 * @description a report about the whoole reorganisation<br />
 */
	public function getReport()
	{
		return $this->aReport;
	}

} // end of class ModuleReorgAbstract
