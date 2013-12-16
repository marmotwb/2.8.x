<?php
/**
 *
 * @category        module
 * @package         droplet
 * @author          Ruud Eisinga (Ruud) John (PCWacht),WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

require('../../config.php');

require_once(WB_PATH.'/framework/class.admin.php');
require_once(WB_PATH.'/framework/functions.php');

$admintool_link = ADMIN_URL .'/admintools/index.php';
$module_edit_link = ADMIN_URL .'/admintools/tool.php?tool=droplets';
$admin = new admin('admintools', 'admintools');

// Get id
$droplet_id = intval($admin->checkIDKEY('droplet_id', false, 'GET'));
if (!$droplet_id) {
	$admin->print_error('IDKEY::'.$MESSAGE['GENERIC_SECURITY_ACCESS'], $module_edit_link);
}
/*
// check if backend.css file needs to be included into the <body></body> of modify.php
if(!method_exists($admin, 'register_backend_modfiles') && file_exists(WB_PATH ."/modules/droplets/backend.css")) {
	echo '<style type="text/css">';
	include(WB_PATH .'/modules/droplets/backend.css');
	echo "n</style>n";
}
*/
// Load Language file
if(LANGUAGE_LOADED) {
	if(!file_exists(WB_PATH.'/modules/droplets/languages/'.LANGUAGE.'.php')) {
		require_once(WB_PATH.'/modules/droplets/languages/EN.php');
	} else {
		require_once(WB_PATH.'/modules/droplets/languages/'.LANGUAGE.'.php');
	}
}
require_once(WB_PATH . '/include/editarea/wb_wrapper_edit_area.php');

/**
 * toolbar: define the toolbar that will be displayed, each element being separated by a ",".
 * Type: String (combinaison of: "|", "*", "search", "go_to_line", "undo", "redo", "change_smooth_selection", "reset_highlight", "highlight", "word_wrap", "help", "save", "load", "new_document", "syntax_selection")
 * "|" or "separator" make appears a separator in the toolbar.
 * "*" or "return" make appears a line-break in the toolbar
 * Default: "search, go_to_line, fullscreen, |, undo, redo, |, select_font,|, change_smooth_selection, highlight, reset_highlight, word_wrap, |, help"

$aDefaultSettings = array (
		'id' => "src"	// should contain the id of the textarea that should be converted into an editor
		,'language' => "en"
		,'syntax' => ""
		,'start_highlight' => false	// if start with highlight
		,'is_multi_files' => false		// enable the multi file mode (the textarea content is ignored)
		,'min_width' => 400
		,'min_height' => 125
		,'allow_resize' => "y"	// possible values: "no", "both", "x", "y"
		,'allow_toggle' => true		// true or false
		,'plugins' => "" // comma separated plugin list
		,'browsers' => "all"	// all or known
		,'display' => "onload" 		// onload or later
		,'toolbar' => "search, go_to_line, fullscreen, |, undo, redo, |, select_font,|, change_smooth_selection, highlight, reset_highlight, word_wrap, |, help"
		,'begin_toolbar' => ""		//  "new_document, save, load, |"
		,'end_toolbar' => ""		// or end_toolbar
		,'font_size' => "10"		// not for IE
		,'font_family' => "monospace"	// can be "verdana,monospace". Allow non monospace font but Firefox get smaller tabulation with non monospace fonts. IE doesn't change the tabulation width and Opera doesn't take this option into account... 
		,'cursor_position' => "begin"
		,'gecko_spellcheck' => false	// enable/disable by default the gecko_spellcheck
		,'max_undo' => 30
		,'fullscreen' => false
		,'is_editable' => true
		,'word_wrap' => false		// define if the text is wrapped of not in the textarea
		,'replace_tab_by_spaces' => false
		,'debug' => false		// used to display some debug information into a newly created textarea. Can be usefull to display trace info in it if you want to modify the code
		,'show_line_colors' => false	// if the highlight is disabled for the line currently beeing edited (if enabled => heavy CPU use)
		,'syntax_selection_allow' => "basic,brainfuck,c,coldfusion,cpp,css,html,java,js,pas,perl,php,python,ruby,robotstxt,sql,tsql,vb,xml"
		,'smooth_selection' => true
		,'autocompletion' => false	// NOT IMPLEMENTED			
		,'load_callback' => ""		// click on load button (function name)
		,'save_callback' => ""		// click on save button (function name)
		,'change_callback' => ""	// textarea onchange trigger (function name)
		,'submit_callback' => ""	// form submited (function name)
		,'EA_init_callback' => ""	// EditArea initiliazed (function name)
		,'EA_delete_callback' => ""	// EditArea deleted (function name)
		,'EA_load_callback' => ""	// EditArea fully loaded and displayed (function name)
		,'EA_unload_callback' => ""	// EditArea delete while being displayed (function name)
		,'EA_toggle_on_callback' => ""	         // EditArea toggled on (function name)
		,'EA_toggle_off_callback' => ""	        // EditArea toggled off (function name)
		,'EA_file_switch_on_callback' => ""	    // a new tab is selected (called for the newly selected file)
		,'EA_file_switch_off_callback' => ""	// a new tab is selected (called for the previously selected file)
		,'EA_file_close_callback' => ""		    // close a tab
	);
 */

/**
 * 
 */
$aInitEditArea = getEditareaDefaultSettings();
$aInitEditArea['id'] = 'contentedit';
$aInitEditArea['syntax'] = 'php';
$aInitEditArea['allow_resize'] = 'y';
$aInitEditArea['allow_toggle'] = true;
$aInitEditArea['start_highlight'] = true;
$aInitEditArea['min_width'] = 200;
$aInitEditArea['min_height'] = 250;
$aInitEditArea['toolbar'] = 'default';
$aInitEditArea['syntax_selection_allow'] = 'basic,php,css,html';
echo registerEditArea($aInitEditArea);

/**
 * 
echo registerEditArea ('contentedit'
                      ,'php'
                      ,'basic,php,css,html'
                      ,'y'
                      ,true
                      ,true
                      ,200
                      ,250
                      ,'default'
//                      ,'search, fullscreen, |, undo, redo, |, select_font,|, highlight, word_wrap, |, help'
);
 */

$modified_when = time();
$modified_by = ($admin->ami_group_member('1') ? 1 : $admin->get_user_id());
$sOverviewDroplets = $TEXT['LIST_OPTIONS'].' '.$DR_TEXT['DROPLETS'];

// Get header and footer
$sql = 'SELECT * FROM `'.TABLE_PREFIX.'mod_droplets` ';
$sql .= 'WHERE id = '.$droplet_id;
$sql .= '';

$query_content = $database->query($sql);

$fetch_content = $query_content->fetchRow();
$content = (htmlspecialchars($fetch_content['code']));
?>
<div class="droplets" style="margin-top: 6px;">
<h4 style="margin: 0; border-bottom: 1px solid #DDD; padding-bottom: 5px;">
	<a href="<?php echo $admintool_link;?>" title="<?php echo $HEADING['ADMINISTRATION_TOOLS']; ?>"><?php echo $HEADING['ADMINISTRATION_TOOLS']; ?></a>
	<span> &raquo; </span>
	<a href="<?php echo $module_edit_link;?>" title="<?php echo $sOverviewDroplets ?>" alt="<?php echo $sOverviewDroplets ?>">Droplet Overview</a>
</h4>
<br />
<form name="modify" action="<?php echo WB_URL; ?>/modules/droplets/save_droplet.php" method="post" style="margin: 0;">
<input type="hidden" name="data_codepress" value="" />
<input type="hidden" name="droplet_id" value="<?php echo $admin->getIDKEY($droplet_id); ?>" />
<input type="hidden" name="show_wysiwyg" value="<?php echo $fetch_content['show_wysiwyg']; ?>" />
<?php echo $admin->getFTAN(); ?>

<table class="row_a">
		<tr>
		<td width="10%" class="setting_name">
			<?php echo $TEXT['NAME']; ?>:
		</td>
		<td width="90%">
			<input type="text" name="title" value="<?php echo stripslashes($fetch_content['name']); ?>" style="width: 38%;" maxlength="32" />
		</td>
	</tr>
	<tr>
		<td valign="top" class="setting_name" width="60px"><?php echo $TEXT['DESCRIPTION']; ?>:</td>
		<td>
			<input type="text" name="description" value="<?php echo stripslashes($fetch_content['description']); ?>" style="width: 98%;" />
		</td>
	</tr>
	<tr>
		<td class="setting_name" width="60px">
			<?php echo $TEXT['ACTIVE']; ?>:
		</td>
		<td>
			<input type="radio" name="active" id="active_true" value="1" <?php if($fetch_content['active'] == 1) { echo ' checked="checked"'; } ?> />
			<a href="#" onclick="javascript: document.getElementById('active_true').checked = true;">
			<label><?php echo $TEXT['YES']; ?></label>
			</a>
			<input type="radio" name="active" id="active_false" value="0" <?php if($fetch_content['active'] == 0) { echo ' checked="checked"'; } ?> />
			<a href="#" onclick="javascript: document.getElementById('active_false').checked = true;">
			<label><?php echo $TEXT['NO']; ?></label>
			</a>
		</td>
	</tr>
<?php
// Next show only if admin is logged in, user_id = 1
if ($modified_by == 1) {
	?>
	<tr>
		<td class="setting_name" width="60px">
			<?php echo $TEXT['ADMIN']; ?>:
		</td>
		<td>
			<?php echo $DR_TEXT['ADMIN_EDIT']; ?>&nbsp;
			<input type="radio" name="admin_edit" id="admin_edit_true" value="1" <?php if($fetch_content['admin_edit'] == 1) { echo ' checked="checked"'; } ?> />
			<a href="#" onclick="javascript: document.getElementById('admin_edit_true').checked = true;">
			<label><?php echo $TEXT['YES']; ?></label>
			</a>
			<input type="radio" name="admin_edit" id="admin_edit_false" value="0" <?php if($fetch_content['admin_edit'] == 0) { echo ' checked="checked"'; } ?> />
			<a href="#" onclick="javascript: document.getElementById('admin_edit_false').checked = true;">
			<label><?php echo $TEXT['NO']; ?></label>
			</a>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<?php echo $DR_TEXT['ADMIN_VIEW']; ?>:
			<input type="radio" name="admin_view" id="admin_view_true" value="1" <?php if($fetch_content['admin_view'] == 1) { echo ' checked="checked"'; } ?> />
			<a href="#" onclick="javascript: document.getElementById('admin_view_true').checked = true;">
			<label><?php echo $TEXT['YES']; ?></label>
			</a>
			<input type="radio" name="admin_view" id="admin_view_false" value="0" <?php if($fetch_content['admin_view'] == 0) { echo ' checked="checked"'; } ?> />
			<a href="#" onclick="javascript: document.getElementById('admin_view_false').checked = true;">
			<label><?php echo $TEXT['NO']; ?></label>
			</a>
		</td>
	</tr>
	<?php
}
?>
	<tr>
		<td valign="top" class="setting_name" width="60px"><?php echo $TEXT['CODE']; ?>:</td>
		<td ><textarea name="savecontent" id ="contentedit" style="width: 98%; height: 450px;" rows="10" cols="12"><?php echo $content; ?></textarea>&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan="2">
		</td>
	</tr>
	<tr>
		<td valign="top" class="setting_name" width="60px"><?php echo $TEXT['COMMENTS']; ?>:</td>
		<td>
			<textarea name="comments" style="width: 98%; height: 100px;" rows="50" cols="120"><?php echo stripslashes($fetch_content['comments']); ?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;
		</td>
	</tr>
</table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="left">
<?php
// Show only save button if allowed....
if ($modified_by == 1 OR $fetch_content['admin_edit'] == 0 ) {
	?>
			<button  class="save" name="save" type="submit"><?php echo $TEXT['SAVE']; ?></button>
	<?php
}
?>
		</td>
		<td align="right">
			<button class="cancel" type="button" onclick="javascript: window.location = '<?php echo $module_edit_link; ?>';"><?php echo $TEXT['CANCEL']; ?></button>
		</td>
	</tr>
</table>
</form>
</div>
<?php

// Print admin footer
$admin->print_footer();
