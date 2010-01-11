<?php
/****************************************************************************
* SVN Version information:
*
* $Id: version.php 1235 2010-01-10 14:11:00Z Luisehahne $
*
*
*
*****************************************************************************
*                          WebsiteBaker
*
* WebsiteBaker Project <http://www.websitebaker2.org/>
* Copyright (C) 2009, Website Baker Org. e.V.
*         http://start.websitebaker2.org/impressum-datenschutz.php
* Copyright (C) 2004-2009, Ryan Djurovich
*
*                        About WebsiteBaker
*
* Website Baker is a PHP-based Content Management System (CMS)
* designed with one goal in mind: to enable its users to produce websites
* with ease.
*
*****************************************************************************
*
*****************************************************************************
*                        LICENSE INFORMATION
*
* WebsiteBaker is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* WebsiteBaker is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
* See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
****************************************************************************
*
*                   WebsiteBaker Extra Information
*
* Version file
*
* This file is where the WB release version is stored.
*
*
*
*****************************************************************************/
/**
 *
 * @category     admin
 * @package      version
 * @author       Ryan Djurovich
 * @copyright    2004-2009, Ryan Djurovich
 * @copyright    2009-2010, Website Baker Org. e.V.
 * @version      $Id: version.php 1235 2010-01-10 14:11:00Z Luisehahne $
 * @platform     WebsiteBaker 2.8.x
 * @requirements >= PHP 4.3.4
 * @license      http://www.gnu.org/licenses/gpl.html
 *
 */

if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

// check if defined to avoid errors during installation (redirect to admin panel fails if PHP error/warnings are enabled)
if(!defined('VERSION')) define('VERSION', '2.8.1');
if(!defined('REVISION')) define('REVISION', '1236');

?>