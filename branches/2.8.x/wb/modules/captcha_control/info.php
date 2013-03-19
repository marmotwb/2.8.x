<?php
/**
 *
 * @category        modules
 * @package         captcha_control
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// prevent this file from being accessed directly
/* -------------------------------------------------------- */
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}
/* -------------------------------------------------------- */
$module_directory 	= 'captcha_control';
$module_name        = 'CAPTCHA SPAM-Protection Control';
$module_function    = 'tool';
$module_version     = '1.2.1';
$module_platform    = '2.8.4';
$module_author      = 'Thomas Hornik (thorn)';
$module_license     = 'GNU General Public License';
$module_description = 'Admin-Tool to control CAPTCHA and ASP';
