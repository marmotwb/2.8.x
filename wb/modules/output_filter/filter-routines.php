<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @author          Christian Sommer, WB-Project, Werner v.d. Decken
 * @copyright       2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.4
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */
/* --- this is a wrapper for backward compatibility only --- */
	$sModuleDir = str_replace('\\', '/', dirname(__FILE__)).'/';
	if (file_exists($sModuleDir.'index.php')) {
		require($sModuleDir.'index.php');
	}
