<?php
/**
 *
 * @category        module
 * @package         droplet
 * @author          Ruud Eisinga (Ruud) John (PCWacht)
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, Website Baker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {

	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

$module_directory = 'droplets';
$module_name = 'Droplets';
$module_function = 'tool';
$module_version = '1.3.0';
$module_platform = '2.8.x';
$module_author = 'Ruud and pcwacht';
$module_license = 'GNU General Public License';
$module_description = 'This tool allows you to manage your local Droplets.';
