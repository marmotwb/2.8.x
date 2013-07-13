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
 * PasswordHashInterface.php
 *
 * @category     Core
 * @package      Core_Security
 * @copyright    M.v.d.Decken <manuela@isteam.de>
 * @author       M.v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision: $
 * @link         $HeadURL: $
 * @lastmodified $Date: $
 * @since        File available since 10.07.2013
 * @deprecated   This interface is deprecated since the ...
 * @description  xyz
 */
interface PasswordHashInterface {
	public function __construct($iteration_count_log2, $portable_hashes);
	public function HashPassword($password);
	public function CheckPassword($password, $stored_hash);
	public function setParams($iIterations, $bHashType);
}

// end of class PasswordHashInterface
