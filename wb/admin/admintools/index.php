<?php
/**
 *
 * @category        admin
 * @package         admintools
 * @author          WB-Project, Werner v.d. Decken
 * @copyright       2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}
if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }
$admin = new admin('admintools', 'admintools');

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('admintools.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'admintools.htt');
$template->set_block('page', 'main_block', 'main');
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\admintools');
$template->set_var($oTrans->getLangArray());
// Insert required template variables
$template->set_var('ADMIN_URL', ADMIN_URL);
$template->set_var('THEME_URL', THEME_URL);

// Insert tools into tool list
$template->set_block('main_block', 'tool_list_block', 'tool_list');
$template->set_var('TOOL_NAME', '');
$template->set_var('tool_list', '');
$template->set_var('TOOL_DIR', '');
$template->set_var('TOOL_DESCRIPTION', '');
$template->set_var('NO_CONTENT', '');
$results = $database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'module' AND function = 'tool' order by name");
$bHasToolRights = false;
if($results->numRows() > 0) {
	while( $tool = $results->fetchRow(MYSQL_ASSOC) ) {
        $bHasToolRights = false;
		if( $admin->get_permission($tool['directory'],'module' ) )
		{
            $bHasToolRights = true;
		$template->set_var('TOOL_NAME', $tool['name']);
			$template->set_var('TOOL_DIR', $tool['directory']);
	// check if a module description exists for the displayed backend language
			$tool_description = false;
			if(function_exists('file_get_contents') && file_exists(WB_PATH.'/modules/'.$tool['directory'].'/languages/'.LANGUAGE .'.php')) {
				// read contents of the module language file into string
				$data = @file_get_contents(WB_PATH .'/modules/' .$tool['directory'] .'/languages/' .LANGUAGE .'.php');
				$tool_description = get_variable_content('module_description', $data, true, false);
			}
			if(file_exists(WB_PATH .'/modules/' .$tool['directory'].'/tool_icon.png'))
			{
				$template->set_var('TOOL_ICON', WB_URL.'/modules/' .$tool['directory'].'/tool_icon.png');
			} else {
				$template->set_var('TOOL_ICON', THEME_URL.'/icons/admintools.png');
			}
			$template->set_var('TOOL_DESCRIPTION', ($tool_description === False)? $tool['description'] :$tool_description);
			$template->parse('tool_list', 'tool_list_block', true);
		}
	}

}

$template->set_var('TOOL_LIST', ($bHasToolRights==false) ? $oTrans->TEXT_NONE.' '.$oTrans->TEXT_MODULE_PERMISSIONS : '&nbsp;');

//template->set_var('TOOL_LIST', '<li>&nbsp;</li>');
// Parse template objects output
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

$admin->print_footer();
