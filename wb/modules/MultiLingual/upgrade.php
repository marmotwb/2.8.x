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
 * uprade.php
 *
 * @category     Modules
 * @package      Modules_MultiLingual
 * @author       Werner v.d.Decken <wkl@isteam.de>
 * @author       Dietmar Wöllbrink <dietmar.woellbrink@websiteBaker.org>
 * @copyright    Werner v.d.Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.6.8
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 09.01.2013
 * @description  provides a flexible posibility for changeing to a translated page
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

// Work-out if we should check for existing page_code
$sql = 'DESCRIBE `'.$database->TablePrefix.'pages` `page_code`';
$field_sql = $database->query($sql);
$field_set = $field_sql->numRows();
$format = $field_sql->fetchRow(MYSQL_ASSOC) ;
// upgrade only if old format
if($format['Type'] == 'varchar(255)' )
{
    $sql = 'SELECT `page_code`,`page_id` FROM `'.$database->TablePrefix.'pages` ORDER BY `page_id`';
    if($query_code = $database->query($sql))
    {
      // extract page_id from old format
      $pattern = '/(?<=_)([0-9]{1,11})/s';
      while( $page  = $query_code->fetchRow(MYSQL_ASSOC))
      {
          preg_match($pattern, $page['page_code'], $array);
          $page_code = $array[0];
          $page_id =  $page['page_id'];
          $sql  = 'UPDATE `'.$database->TablePrefix.'pages` SET ';
          $sql .= ((empty($array[0])) ? '`page_code` = 0 ' : '`page_code` = '.$page_code.' ');
          $sql .= 'WHERE `page_id` = '.$page_id;
          $database->query($sql);
      }
      $field_set = $database->field_modify('page_code', 'pages', 'INT(11) NOT NULL AFTER `modified_by`');
//      $sql = 'ALTER TABLE `'.$database->TablePrefix.'pages` MODIFY COLUMN `page_code` INT(11) NOT NULL';
//      $database->query($sql);
  }   
}
//
$directory = dirname(__FILE__).'/'.'info.php';
// update entry in table addons to new version
load_module($directory, $install = false);
