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
 * WbLinkAbstract.php
 *
 * @category     Core
 * @package      Core_Interfaces
 * @subpackage   WbLink outputfilter
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 03.11.2013
 * @description  Interface definition for all addon/ * /WbLink.php
 */
abstract class WbLinkAbstract {

	protected $oDb  = null;
	protected $oReg = null;

	final public function __construct()
	{
		$this->oDb  = WbDatabase::getInstance();
		$this->oReg = WbAdaptor::getInstance();
	}

	abstract public function makeLinkFromTag(array $aReplacement);
//	abstract public function generateLinkList(Template $oTpl);


} // end of class WbLinkAbstract
