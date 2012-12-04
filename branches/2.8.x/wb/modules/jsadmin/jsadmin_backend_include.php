<?php
/**
 *
 * @category        modules
 * @package         JsAdmin
 * @package         JsAdmin
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
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

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

// obtain the admin folder (e.g. /admin)
$admin_folder = str_replace(WB_PATH, '', ADMIN_PATH);

$JSADMIN_PATH = WB_URL.'/modules/jsadmin';
$YUI_PATH = WB_URL.'/include/yui';
$script = $_SERVER['SCRIPT_NAME'];

if(strstr($script, $admin_folder."/pages/index.php")) 
	$page_type = 'pages';
elseif(strstr($script, $admin_folder."/pages/sections.php"))
	$page_type = 'sections';
elseif(strstr($script, $admin_folder."/settings/tool.php")
	&& isset($_REQUEST["tool"]) && $_REQUEST["tool"] == 'jsadmin')
	$page_type = 'config';
elseif(strstr($script, $admin_folder."/pages/modify.php"))
	$page_type = 'modules';
else
	$page_type = '';

if($page_type) {

	require_once(WB_PATH.'/modules/jsadmin/jsadmin.php');

	// Default scripts
	$js_buttonCell = 5;
	$js_pagesCell = 7;
	$js_scripts = Array();
	$js_scripts[] = 'jsadmin.js';

	if($page_type == 'modules') {
		if(!get_setting('mod_jsadmin_persist_order', '1')) {   //Maybe Bug settings to negativ for persist , by Swen Uth
			$js_scripts[] = 'restore_pages.js';
  		}
		if(get_setting('mod_jsadmin_ajax_order_pages', '1')) {
			$js_scripts[] = 'dragdrop.js';
			$js_buttonCell= $js_pagesCell; // This ist the Cell where the Button "Up" is , by Swen Uth
		}
	} elseif($page_type == 'pages') {
		if(!get_setting('mod_jsadmin_persist_order', '1')) {   //Maybe Bug settings to negativ for persist , by Swen Uth
			$js_scripts[] = 'restore_pages.js';
  		}
		if(get_setting('mod_jsadmin_ajax_order_pages', '1')) {
			$js_scripts[] = 'dragdrop.js';
			$js_buttonCell= $js_pagesCell; // This ist the Cell where the Button "Up" is , by Swen Uth
		}
	} elseif($page_type == 'sections') {
		if(get_setting('mod_jsadmin_ajax_order_sections', '1')) {
			$js_scripts[] = 'dragdrop.js';
			if(SECTION_BLOCKS) {
			$js_buttonCell= 5; }
      else{ $js_buttonCell= 5; } // This ist the Cell where the Button "Up" is , by Swen Uth
		}
	} elseif($page_type == 'config') {
		$js_scripts[] = 'tool.js';
	} else {
		$admin->print_error('PageTtype '.$TEXT['ERROR'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	}

?>
<script  type="text/javascript">
<!--
var JsAdmin = { WB_URL : '<?php echo WB_URL ?>', ADMIN_URL : '<?php echo ADMIN_URL ?>' };
var JsAdminTheme = { THEME_URL : '<?php echo THEME_URL ?>' };
//-->
</script>
<?php
	// For variable cell structure in the tables of admin content
	echo "<script type='text/javascript'>buttonCell=".$js_buttonCell.";</script>\n";   // , by Swen  Uth
	// Check and Load the needed YUI functions  //, all by Swen Uth
	$YUI_ERROR=false; // ist there an Error
	$YUI_PUT ='';   // String with javascipt includes
	$YUI_PUT_MISSING_Files=''; // String with missing files
	reset($js_yui_scripts);
	foreach($js_yui_scripts as $script) {
		if(file_exists($WB_MAIN_RELATIVE_PATH.$script)){
			$YUI_PUT=$YUI_PUT."<script src='".$WB_MAIN_RELATIVE_PATH.$script."' type='text/javascript'></script>\n"; // go and include
		} else {
			$YUI_ERROR=true;
			$YUI_PUT_MISSING_Files=$YUI_PUT_MISSING_Files."- ".WB_URL.$script."\\n";   // catch all missing files
		}
	}
/*  */
	if(!$YUI_ERROR)
	{
		echo $YUI_PUT;  // no Error so go and include
		// Load the needed functions
		foreach($js_scripts as $script) {
			echo "<script src='".$JSADMIN_PATH."/js/".$script."' type='text/javascript'></script>\n";
		}
	} else {
	    echo "<script type='text/javascript'>alert('YUI ERROR!! File not Found!! > \\n".$YUI_PUT_MISSING_Files." so look in the include folder or switch Javascript Admin off!');</script>\n"; //, by Swen Uth
	}

} 
