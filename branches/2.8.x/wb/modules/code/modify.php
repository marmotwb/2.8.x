<?php
/**
 *
 * @category        modules
 * @package         code
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
 *
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }
// Setup template object
$template = new Template(WB_PATH.'/modules/code');
$template->set_file('page', 'htt/modify.htt');
$template->set_block('page', 'main_block', 'main');

// Get page content
$query = "SELECT content FROM ".TABLE_PREFIX."mod_code WHERE section_id = '$section_id'";
$get_content = $database->query($query);
$content = $get_content->fetchRow();
$content = htmlspecialchars($content['content']);

// Insert vars
$template->set_var(
	array(
		'PAGE_ID'				=> $page_id,
		'SECTION_ID'			=> $section_id,
		'REGISTER_EDIT_AREA'	=> function_exists('registerEditArea') ? registerEditArea('content'.$section_id, 'php', false) : '',
		'WB_URL'				=> WB_URL,
		'CONTENT'				=> $content,
		'TEXT_SAVE'				=> $TEXT['SAVE'],
		'TEXT_CANCEL'			=> $TEXT['CANCEL'],
		'SECTION'				=> $section_id,
		'FTAN'					=> $admin->getFTAN()
	)
);

// Parse template object
$template->set_unknowns('keep');
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page', false);

?>