<?php
/**
 *
 * @category        admin
 * @package         admintools
 * @author          WB-Project, Werner v.d. Decken
 * @copyright       2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.2
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require_once($config_file);
}

if(!class_exists('admin', false)){
    include(WB_PATH.'/framework/class.admin.php');
    $admin = new admin('Admintools','admintools',false);
}
$oDb = WbDatabase::getInstance();
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\admintools');

require_once(WB_PATH.'/framework/functions.php');

$toolDir = (isset($_POST['tool']) && (trim($_POST['tool']) != '') ? trim($_POST['tool']) : '');
$toolDir = (isset($_GET['tool']) && (trim($_GET['tool']) != '') ? trim($_GET['tool']) : $toolDir);
$doSave  = (isset($_POST['save_settings']) || (isset($_POST['action']) && strtolower($_POST['action']) == 'save'));

// test for valid tool name
	if(preg_match('/^[a-z][a-z_\-0-9]{2,}$/i', $toolDir)) {
	// Check if tool is installed
		$sql = 'SELECT `name` FROM `'.$oDb->TablePrefix.'addons` '.
		       'WHERE `type`=\'module\' AND `function`=\'tool\' '.
		              'AND `directory`=\''.$toolDir.'\'';
		if(($toolName = $oDb->getOne($sql))) {
		// create admin-object and print header if FTAN is NOT supported AND function 'save' is requested
			$admin_header = !(is_file(WB_PATH.'/modules/'.$toolDir.'/FTAN_SUPPORTED') && $doSave);
			$admin = new admin('admintools', 'admintools', $admin_header );
			if(!$doSave) {
			// show title if not function 'save' is requested
				print '<h4><a href="'.ADMIN_URL.'/admintools/index.php" '.
				      'title="'.$oTrans->HEADING_ADMINISTRATION_TOOLS.'">'.
				      $oTrans->HEADING_ADMINISTRATION_TOOLS.'</a>'.
					  '&nbsp;&raquo;&nbsp;'.$toolName.'</h4>'."\n";
			}
			// include modules tool.php
			require(WB_PATH.'/modules/'.$toolDir.'/tool.php');
			$admin->print_footer();
		} else {
		// no installed module found, jump to index.php of admintools
//			header('location: '.ADMIN_URL.'/admintools/index.php');
//			exit(0);
			$admin->send_header(ADMIN_URL.'/admintools/index.php');
		}
	}else {
	// invalid module name requested, jump to index.php of admintools
//		header('location: '.ADMIN_URL.'/admintools/index.php');
//		exit(0);
		$admin->send_header(ADMIN_URL.'/admintools/index.php');
	}
