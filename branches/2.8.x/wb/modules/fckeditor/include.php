<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

function reverse_htmlentities($mixed) {
	$mixed = str_replace(array('&gt;','&lt;','&quot;','&amp;'), array('>','<','"','&'), $mixed);
	return $mixed;
}

function get_template_name() {
	// returns the template name of the current displayed page

	// Loading config.php is not needed here, it is loaded before. It breaks the module when the editor is called form another dir as WB_PATH/modules/mymodule
	// require_once('../../config.php');
	require_once(WB_PATH. '/framework/class.database.php');

	// work out default editor.css file for FCKEditor
	if(file_exists(WB_PATH .'/templates/' .DEFAULT_TEMPLATE .'/editor.css')) {
		$fck_template_dir = DEFAULT_TEMPLATE;
	} else {
		$fck_template_dir = "none";
	}

	// check if a editor.css file exists in the specified template directory of current page
	if (isset($_GET["page_id"]) && (int) $_GET["page_id"] > 0) {
		$pageid = (int) $_GET["page_id"];

		// obtain template folder of current page from the database
		if(!isset($admin)) { 
			$database = new database(); 
		}
		$query_page = "SELECT template FROM " .TABLE_PREFIX ."pages WHERE page_id =$pageid"; 
		$pagetpl = $database->get_one($query_page);   // if empty, default template is used

		// check if a specific template is defined for current page
		if(isset($pagetpl) && $pagetpl != '') {
			// check if a specify editor.css file is contained in that folder
			if(file_exists(WB_PATH.'/templates/'.$pagetpl.'/editor.css')) {
				$fck_template_dir = $pagetpl;
			}
		}
	}
	return $fck_template_dir;
}

function show_wysiwyg_editor($name, $id, $content, $width, $height) {
	// create new FCKEditor instance
	require_once(WB_PATH.'/modules/fckeditor/fckeditor/fckeditor.php');
	$oFCKeditor = new FCKeditor($name);

	// set defaults (Note: custom settings defined in: "/my_config/my_fckconfig.js" instead of "/editor/fckconfig.js")
	$oFCKeditor->BasePath = WB_URL.'/modules/fckeditor/fckeditor/';
	$oFCKeditor->Config['CustomConfigurationsPath'] = WB_URL .'/modules/fckeditor/wb_config/wb_fckconfig.js';
	$oFCKeditor->ToolbarSet = 'WBToolbar';        // toolbar defined in my_fckconfig.js

	// obtain template name of current page (if empty, no editor.css files exists)
	$template_name = get_template_name();

	// work out default CSS file to be used for FCK textarea
	if($template_name == "none") {
		// no editor.css file exists in default template folder, or template folder of current page
		$css_file = WB_URL .'/modules/fckeditor/wb_config/wb_fckeditorarea.css';
	} else {
		// editor.css file exists in default template folder or template folder of current page
		$css_file = WB_URL .'/templates/' .$template_name .'/editor.css';
	}
	// set CSS file depending on $css_file
	$oFCKeditor->Config['EditorAreaCSS'] = $css_file;

	// work out settings for the FCK "Style" toolbar
	if ($template_name == "none") {
		// no custom editor.css exists, use default XML definitions
		$oFCKeditor->Config['StylesXmlPath'] = WB_URL.'/modules/fckeditor/wb_config/wb_fckstyles.xml';
	} else {
		// file editor.css exists in template folder, parse it and create XML definitions
		$oFCKeditor->Config['StylesXmlPath'] = WB_URL.'/modules/fckeditor/css_to_xml.php?template_name=' .$template_name;
	}

	// custom templates can be defined via /wb_config/wb_fcktemplates.xml
	if(file_exists(WB_PATH .'/modules/fckeditor/wb_config/wb_fcktemplates.xml')) {
		$oFCKeditor->Config['TemplatesXmlPath'] = WB_URL.'/modules/fckeditor/wb_config/wb_fcktemplates.xml';
	}

  // set required file connectors (overwrite settings which may be made in fckconfig.js or my_fckconfig.js)
	$connectorPath = $oFCKeditor->BasePath.'editor/filemanager/connectors/php/connector.php';
  $oFCKeditor->Config['LinkBrowserURL'] = $oFCKeditor->BasePath.'editor/filemanager/browser/default/browser.html?Connector='
		.$connectorPath;
  $oFCKeditor->Config['ImageBrowserURL'] = $oFCKeditor->BasePath.'editor/filemanager/browser/default/browser.html?Connector='
		.$connectorPath;
  $oFCKeditor->Config['FlashBrowserURL'] = $oFCKeditor->BasePath.'editor/filemanager/browser/default/browser.html?Connector='
		.$connectorPath;

	$oFCKeditor->Value = reverse_htmlentities($content);
	$oFCKeditor->Height = $height;
	$oFCKeditor->Create();
}

?>