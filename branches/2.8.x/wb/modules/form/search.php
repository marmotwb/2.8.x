<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description     
 */
// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }

function form_search($func_vars) {
	extract($func_vars, EXTR_PREFIX_ALL, 'func');
	
	// how many lines of excerpt we want to have at most
	$max_excerpt_num = $func_default_max_excerpt;
	$divider = ".";
	$result = false;
	
	// fetch all form-fields on this page
	$table = TABLE_PREFIX."mod_form_fields";
	$query = $func_database->query("
		SELECT title, value
		FROM $table
		WHERE section_id='$func_section_id'
		ORDER BY position ASC
	");
	// now call print_excerpt() only once for all items
	if($query->numRows() > 0) {
		$text="";
		while($res = $query->fetchRow()) {
			$text .= $res['title'].$divider.$res['value'].$divider;
		}
		$mod_vars = array(
			'page_link' => $func_page_link,
			'page_link_target' => "#wb_section_$func_section_id",
			'page_title' => $func_page_title,
			'page_description' => $func_page_description,
			'page_modified_when' => $func_page_modified_when,
			'page_modified_by' => $func_page_modified_by,
			'text' => $text,
			'max_excerpt_num' => $max_excerpt_num
		);
		if(print_excerpt2($mod_vars, $func_vars)) {
			$result = true;
		}
	}
	return $result;
}

?>
