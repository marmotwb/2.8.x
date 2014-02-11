<?php
/**
 *
 * @category        admin
 * @package         templates
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Setup admin object
require('../../config.php');
$oDb = WbDatabase::getInstance();
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\addons');
// suppress to print the header, so no new FTAN will be set
$admin = new admin('Addons', 'templates_uninstall', false);
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS);
}
// After check print the header
$admin->print_header();
if(!isset($_POST['file']) OR $_POST['file'] == "") {
	$admin->print_error($oTrans->MESSAGE_GENERIC_FORGOT_OPTIONS);
} else {
	$file = preg_replace('/[^a-z0-9_-]/i', "", $_POST['file']);  // fix secunia 2010-92-2
}

// Check if the template exists
if(!is_dir(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($oTrans->MESSAGE_GENERIC_NOT_INSTALLED);
}

// Check if the template exists
if(!is_readable(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($oTrans->MESSAGE_ADMIN_INSUFFICIENT_PRIVELLIGES);
}

// Check if user selected template
/*
if(!isset($_POST['file']) OR $_POST['file'] == "") {
	header("Location: index.php");
	exit(0);
} else {
	$file = $_POST['file'];
}

// Extra protection
if(trim($file) == '') {
	header("Location: index.php");
	exit(0);
}
*/

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');
if (!function_exists("replace_all")) {
	function replace_all($aStr = "", array $aArray = null ) {
		foreach ($aArray as $k=>$v) {
            $aStr = str_replace("{{".$k."}}", $v, $aStr);
        }
		return $aStr;
	}
}

/**
*	Check if the template is the standard-template or still in use
*/
$sMsgTpl = (isset($oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE)
            ? $oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE
            : 'Can\'t uninstall this template <b>{{name}}</b> because it\'s the standardtemplate!');
// check whether the template is used as default wb theme
if($file == DEFAULT_THEME) {
	$temp = array ('name' => $file );
	$msg = replace_all( $sMsgTpl, $temp );
	$admin->print_error( $msg );
}

if ($file == DEFAULT_TEMPLATE) {
	$temp = array ('name' => $file );
	$msg = replace_all( $sMsgTpl, $temp );
	$admin->print_error( $msg );

} else {

	/**
	*	Check if the template is still in use by a page ...
	*/
	$sql = 'SELECT `page_id` `id`, `page_title` `title` FROM `'.$oDb->TablePrefix.'pages` '
         . 'WHERE `template`=\''.$file.'\' '
         . 'ORDER BY `page_title`';
	if (($info = $oDb->doQuery($sql))) {
        if (($iNumberOfRows = $info->numRows())) {
            /**
            *	Template is still in use, so we're collecting the page-titles
            *	The base-message template-string for the top of the message
            */
            if (!isset($oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL)) {
                $add = ($iNumberOfRows == 1 ? 'this page' : 'these pages');
                $msg_template_str  = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled because it is still in use by {{pages}}';
                $msg_template_str .= ':<br /><i>click for editing.</i><br /><br />';
            } else {
                $msg_template_str = $oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL;
                $temp = explode(";",$oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES);
                $add = $iNumberOfRows == 1 ? $temp[0] : $temp[1];
            }
            /**
            *	The template-string for displaying the Page-Titles ... in this case as a link
            */
            $page_template_str = "- <b><a href='../pages/settings.php?page_id={{id}}'>{{title}}</a></b><br />";
            $values = array ('type' => 'Template', 'type_name' => $file, 'pages' => $add);
            $msg = replace_all($msg_template_str, $values);
            $page_names = "";
            while ($page_info = $info->fetchRow(MYSQL_ASSOC) ) {
//                $page_info = array(
//                    'id'	=> $data['page_id'],
//                    'title' => $data['page_title']
//                );
                $page_names .= replace_all($page_template_str, $page_info);
            }
            /**
            *	Printing out the error-message and die().
            */
            $admin->print_error($oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL_IN_USE.$msg.$page_names);
        }
    }
}

// Check if we have permissions on the directory
if(!is_writable(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL.WB_PATH.'/templates/'.$file);
}

// Try to delete the template dir
if(!rm_full_dir(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($oTrans->MESSAGE_GENERIC_CANNOT_UNINSTALL);
} else {
	// Remove entry from DB
	$sql = 'DELETE FROM `'.$oDb->TablePrefix.'addons` '
         . 'WHERE `directory`=\''.$file.'\' AND `type`=\'template\'';
	$oDb->doQuery($sql);
}
// Update pages that use this template with default template
// $database = new database();
$sql = 'UPDATE `'.$oDb->TablePrefix.'pages` '
     . 'SET `template`=\''.DEFAULT_TEMPLATE.'\' '
     . 'WHERE `template`=\''.$file.'\'';
$oDb->doQuery($sql);

// Print success message
$admin->print_success($oTrans->MESSAGE_GENERIC_UNINSTALLED);

// Print admin footer
$admin->print_footer();
