<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages');
$admin->clearIDKEY();
// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');
// eggsurplus: add child pages for a specific page
/**/

echo '<script type="text/javascript" src="'.ADMIN_URL.'/pages/eggsurplus.js"></script>'.PHP_EOL;
// fixes A URI contains impermissible characters or quotes around the URI are not closed.
$MESSAGE['PAGES_DELETE_CONFIRM'] = url_encode(  $MESSAGE['PAGES_DELETE_CONFIRM'] );

function set_node ($parent,& $par)
{
    $retval = '';
	if ($par['num_subs']) {
		$retval .= "\n".'<ul id="p'.$parent.'"';
		if ($parent != 0) {
			$retval .= ' class="page_list"';
			if (isset ($_COOKIE['p'.$parent]) && $_COOKIE['p'.$parent] == '1') {
				 $retval .= ' style="display:block"';
			}
		}
		$retval .= ">\n";
 	}
	return $retval;
}

function make_list($parent = 0, $editable_pages = 0) {
	// Get objects and vars from outside this function
	global $admin, $template, $TEXT, $MESSAGE, $HEADING, $par;
	$database = WbDatabase::getInstance();
	static $row = 0;
//	static $iLevel = 0;
//	static $iOldLevel = 0;
//	static $aRowLevel = array();
	
    print set_node ($parent, $par);
	// Get page list from database
 $sql = 'SELECT `module`, MAX(s.`publ_start` + s.`publ_end`) published, p.* '
      . 'FROM `'.TABLE_PREFIX.'pages` p '
      .     'INNER JOIN `'.TABLE_PREFIX.'sections` s ON p.`page_id` = s.`page_id` '
      . 'WHERE `parent`='.$parent.((PAGE_TRASH != 'inline') ?  ' AND `visibility`!=\'deleted\' ' : ' ')
      . 'GROUP BY p.`page_id` '
      . 'ORDER BY p.`position` ASC';

    if($get_pages = $database->query($sql)) {
    	// Work out how many pages there are for this parent
    	$num_pages = $get_pages->numRows();
    	// Insert values into main page list
    	if($num_pages > 0)
    	{
    		while($page = $get_pages->fetchRow(MYSQL_ASSOC))
    		{
//echo implode('-',$page);
    			$sLineOut = '';
    			$row = $row++ % 2; // toggle row colors between 0<->1
    			// Get user permissions
    			$can_modify = false;
    			if( $admin->ami_group_member($page['admin_users']) ||
    			    $admin->is_group_match($admin->get_groups_id(), $page['admin_groups']))
    			{
    				if(($page['visibility'] == 'deleted' && PAGE_TRASH == 'inline') ||
    				   ($page['visibility'] != 'deleted'))
    				{
    					$can_modify = true;
    					$editable_pages++;
    				}
    			} else {
    				if($page['visibility'] == 'private') { continue; }
    			}
    			// check if the page has children
//                $sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'pages` ';
//    			$sql .= 'WHERE `parent`='.$page['page_id'];
//                $sql .= (PAGE_TRASH != 'inline') ? ' AND `visibility`!=\'deleted\'' : '';
                $sql = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'pages` '
    			     . 'WHERE `parent`='.$page['page_id'].((PAGE_TRASH != 'inline') ? ' AND `visibility`!=\'deleted\'' : '');
    			$par['num_subs'] = intval($database->get_one($sql));
    			$display_plus = (bool)$par['num_subs'];
    			$sLineOut .= '<li class="p'.$page['parent'].'">';
    // ---------------------------------------------------------------------------------------
    			$sLineOut .= '<table class="pages_view">';
    			$sLineOut .= "\t".'<tbody>';
    			$sLineOut .= "\t\t".'<tr class="row_'.$row.'">';
    // --- Tab 1 ---
    			$sLineOut .= "\t\t\t".'<td valign="middle" width="20" style="padding-left: '.
    				 (($page['level'] == 0) ? 0 : ($page['level']*25)-pow($page['level'],2)).'px;">';
    			if($display_plus == true) {
    				$sLineOut .= '<a href="javascript:toggle_visibility(\'p'.$page['page_id'].'\');" '.
    					 'title="'.$TEXT['EXPAND'].'/'.$TEXT['COLLAPSE'].'">';
    				$sLineOut .= '<span>';
    				$sLineOut .= '<img src="'.THEME_URL.'/images/'.
    					 ( ((isset($_COOKIE['p'.$page['page_id']]) && $_COOKIE['p'.$page['page_id']] == '1') ? 'minus' : 'plus').
    					 '_16.png" onclick="toggle_plus_minus(\''.$page['page_id'].'\');" '.
    					 'name="plus_minus_'.$page['page_id'] ).'" alt="+" />';
    				$sLineOut .= '</span>';
    				$sLineOut .= '</a>';
    			}
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 2 ---
    			$sLineOut .= "\t\t\t".'<td class="list_menu_title">';
                $sClassMenutitle = '';
    			if($admin->get_permission('pages_modify') && $can_modify) {
    				$sLineOut .= '<a href="'.ADMIN_URL.'/pages/modify.php?page_id='.$page['page_id'].'" title="'.$TEXT['MODIFY'].'">';
                    $sClassMenutitle = 'bold grey';
    			}
    			$sLineOut .= '<span>';
    			switch($page['visibility']):
    				case 'private':
    					$sIcon = 'private_16.png';
    					$sText = $TEXT['PRIVATE'];
    					break;
    				case 'registered':
    					$sIcon = 'keys_16.png';
    					$sText = $TEXT['REGISTERED'];
    					break;
    				case 'hidden':
    					$sIcon = 'hidden_16.png';
    					$sText = $TEXT['HIDDEN'];
    					break;
    				case 'none':
    					$sIcon = 'none_16.png';
    					$sText = $TEXT['NONE'];
    					break;
    				case 'deleted':
    					$sIcon = 'deleted_16.png';
    					$sText = $TEXT['DELETED'];
    					break;
    				default: // public
    					$sIcon = 'visible_16.png';
    					$sText = $TEXT['PUBLIC'];
    					break;
                     endswitch;
                     $sLineOut .= '<img src="'.THEME_URL.'/images/'.$sIcon.'" ';
                     $sLineOut .= 'alt="'.$TEXT['VISIBILITY'].': '.$sText.'" class="page_list_rights" />';
                     if($admin->get_permission('pages_modify') && $can_modify) {
                      $sLineOut .= '<span class="modify_link">'.$page['menu_title'].'</span></a>';
                     }else {
                      $sLineOut .=  '<span class="bold grey">'.$page['menu_title'].'</span>';
                     }
                     $sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 3 ---
    			$sLineOut .= "\t\t\t".'<td class="list_page_title">'.$page['page_title'].'</td>'.PHP_EOL;
    // --- Tab 4 ---
    			$sLineOut .= "\t\t\t".'<td class="list_page_id right">'.$page['page_id'].'</td>'.PHP_EOL;
    // --- Tab 5 ---
    			$sLineOut .= "\t\t\t".'<td class="list_actions">';
    			if($page['visibility'] != 'deleted' && $page['visibility'] != 'none') {
    				$sLineOut .= '<a href="'.$admin->page_link($page['link']).'" target="_blank" '.
    					 'title="'.$TEXT['VIEW'].'">';
    				$sLineOut .= '<img src="'.THEME_URL.'/images/view_16.png" alt="'.$TEXT['VIEW'].'" />';
    				$sLineOut .= '</a>';
    			}
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 6 ---		
    			$sLineOut .= "\t\t\t".'<td class="list_actions">';
    			if($page['visibility'] != 'deleted') { 
    				if($admin->get_permission('pages_settings') && $can_modify) {
    					$sLineOut .= '<a href="'.ADMIN_URL.'/pages/settings.php?page_id='.$page['page_id'].'" '.
    						 'title="'.$TEXT['SETTINGS'].'">';
    					$sLineOut .= '<img src="'.THEME_URL.'/images/modify_16.png" alt="'.$TEXT['SETTINGS'].'" />';
    					$sLineOut .= '</a>';
    				}
    			}else {
    				$sLineOut .= '<a href="'.ADMIN_URL.'/pages/restore.php?page_id='.$page['page_id'].'" '.
    					 'title="'.$TEXT['RESTORE'].'">';
    				$sLineOut .= '<img src="'.THEME_URL.'/images/restore_16.png" alt="'.$TEXT['RESTORE'].'" />';
    				$sLineOut .= '</a>';
    			}
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 7 --- MANAGE SECTIONS AND DATES BUTTONS ---
    			$sLineOut .= "\t\t\t".'<td class="list_actions">';
    			// Work-out if we should show the "manage dates" link
    			if( MANAGE_SECTIONS && $admin->get_permission('pages_add') && $can_modify ) {
    				$sLineOut .= '<a href="'.ADMIN_URL.'/pages/sections.php?page_id='.$page['page_id'].'"'.
    					 ' title="'.$HEADING['MANAGE_SECTIONS'].'">';
                     $file = $admin->page_is_active($page) ? "clock_16.png" : "clock_red_16.png";
                     $file = ($page['published'] && $page['module'] != 'menu_link') ? $file : 'noclock_16.png';
     				$sLineOut .= '<img src="'.THEME_URL.'/images/'.$file.'" alt="'.$HEADING['MANAGE_SECTIONS'].'" />';
    				$sLineOut .= '</a>';
    			}
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 8 ---
    			$sLineOut .= "\t\t\t".'<td class="list_actions">';
    			if($page['position'] != 1) {
    				if($page['visibility'] != 'deleted') {
    					if($admin->get_permission('pages_settings') && $can_modify) {
    						$sLineOut .= '<a href="'.ADMIN_URL.'/pages/move_up.php?page_id='.$page['page_id'].'" '.
    							 'title="'.$TEXT['MOVE_UP'].'"><img src="'.THEME_URL.
    							 '/images/up_16.png" alt="'.$TEXT['MOVE_UP'].'" /></a>';
    					}
    				}
    			}
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 9 ---
    			$sLineOut .= "\t\t\t".'<td class="list_actions">';
    			if($page['position'] != $num_pages) {
    				if($page['visibility'] != 'deleted') {
    					if($admin->get_permission('pages_settings') && $can_modify) {
    						$sLineOut .= '<a href="'.ADMIN_URL.'/pages/move_down.php?page_id='.$page['page_id'].'" '.
    							 'title="'.$TEXT['MOVE_DOWN'].'"><img src="'.THEME_URL.
    							 '/images/down_16.png" alt="'.$TEXT['MOVE_DOWN'].'" /></a>';
    					}
    				}
    			}else { $sLineOut .= '&nbsp;'; }
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 10 ---
    			$sLineOut .= "\t\t\t".'<td class="list_actions">';
    			if($admin->get_permission('pages_delete') && $can_modify) {
    				$sLineOut .= '<a href="javascript:confirm_link(\''.$MESSAGE['PAGES_DELETE_CONFIRM'].
    					 '?,'.ADMIN_URL.'/pages/delete.php?page_id='.$admin->getIDKEY($page['page_id']).'\');" '.
    					 'title="'.$TEXT['DELETE'].'">';
    				$sLineOut .= '<img src="'.THEME_URL.'/images/delete_16.png" alt="'.$TEXT['DELETE'].'" />';
    				$sLineOut .= '</a>';
    			}else { $sLineOut .= '&nbsp;'; }
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 11 --- Add action to add a page as a child ---
    			$sLineOut .= "\t\t\t".'<td class="list_actions">';
    			if($admin->get_permission('pages_add') && $can_modify && ($page['visibility'] != 'deleted')) {
    				$sLineOut .= '<a href="javascript:add_child_page(\''.$page['page_id'].'\');" '
    					.'title="'.$HEADING['ADD_CHILD_PAGE'].'">';
    				$sLineOut .= '<img src="'.THEME_URL.'/images/siteadd.png" name="addpage_'.$page['page_id'].'" '
    					.'alt="Add Child Page" />';
    				$sLineOut .= '</a>';
    			}else { $sLineOut .= '&nbsp;'; }
    			$sLineOut .= '</td>'.PHP_EOL;
    // --- Tab 12 ---
    			$sLineOut .= "\t\t\t".'<td class="list_page_id center">'.$page['language'].'</td>'.PHP_EOL;
    // --- End TR / TBODY / TABLE		
    			$sLineOut .= "\t\t".'</tr>'.PHP_EOL;
    			$sLineOut .= "\t".'</tbody>'.PHP_EOL;
    			$sLineOut .= '</table>'.PHP_EOL;
    // ---------------------------------------------------------------------------------------
           echo $sLineOut;
           if ( $page['parent'] == 0) {
            $page_tmp_id = $page['page_id'];
           }
           // Get subs
           $editable_pages = make_list($page['page_id'], $editable_pages);
                    echo '</li>'.PHP_EOL;
          } // end of WHILE
    	} // end of $num_pages > 0
    }  // end of $get_pages = $database->query($sql)

	$output = ($par['num_subs'] )? '</ul>'.PHP_EOL : '';
    $par['num_subs'] = (empty($output) ) ?  1 : $par['num_subs'];
    echo $output;
	return $editable_pages;
}
// Generate pages list
if($admin->get_permission('pages_view') == true) 
{
	$sListHeader = <<<LHEAD
	<div class="jsadmin hide"></div>
		<table>
			<tbody>
				<tr>
					<td><h2 class="left">{$HEADING['MODIFY_DELETE_PAGE']}</h2></td>
					<td align="right"></td>
				</tr>
			</tbody>
		</table>
		<div class="pages_list">
			<table>
				<tbody>
					<tr class="pages_list_header">
						<td class="header_list_menu_title">{$TEXT['VISIBILITY']} / {$TEXT['MENU_TITLE']}:</td>
						<td class="header_list_page_title">{$TEXT['PAGE_TITLE']}:</td>
						<td class="header_list_page_id">PID</td>
						<td class="header_list_actions">{$TEXT['ACTIONS']}:</td>
						<td class="list_page_id">&nbsp;</td>
					</tr>
				</tbody>
			</table>
LHEAD;
	echo $sListHeader;
	// Work-out if we should check for existing page_code
	$field_set = $database->field_exists(TABLE_PREFIX.'pages', 'page_code');
    $par = array();
	$par['num_subs'] = 1;
	$editable_pages = make_list(0, 0);
}else {
	$editable_pages = 0;
}
echo "\t\t".'</div>'.PHP_EOL;
if(!intval($editable_pages)) {
	echo "\t\t".'<div class="empty_list">'.$TEXT['NONE_FOUND'].'</div>'.PHP_EOL;
}
// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('pages.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'pages.htt');
$template->set_block('page', 'main_block', 'main');
// Insert values into the add page form
$template->set_var('FTAN', $admin->getFTAN());
// Group list 1
$query = "SELECT * FROM ".TABLE_PREFIX."groups";
$get_groups = $database->query($query);

$template->set_block('main_block', 'group_list_block', 'group_list');
// Insert admin group and current group first
$admin_group_name = $get_groups->fetchRow(MYSQL_ASSOC);
$template->set_var(array(
						'ID' => 1,
						'TOGGLE' => '1',
						'DISABLED' => ' disabled="disabled"',
						'LINK_COLOR' => '000000',
						'CURSOR' => 'default',
						'NAME' => $admin_group_name['name'],
						'CHECKED' => ' checked="checked"'
						)
					);
$template->parse('group_list', 'group_list_block', true);
while($group = $get_groups->fetchRow(MYSQL_ASSOC)) {
	// check if the user is a member of this group
	$flag_disabled = '';
	$flag_checked =  '';
	$flag_cursor =   'pointer';
	$flag_color =    '';
	if (in_array($group["group_id"], $admin->get_groups_id())) {
		$flag_disabled = ''; //' disabled';
		$flag_checked =  ' checked="checked"';
		$flag_cursor =   'default';
		$flag_color =    '000000';
	}
	// Check if the group is allowed to edit pages
	$system_permissions = explode(',', $group['system_permissions']);
	if(is_numeric(array_search('pages_modify', $system_permissions))) {
		$template->set_var(array(
								'ID' => $group['group_id'],
								'TOGGLE' => $group['group_id'],
								'CHECKED' => $flag_checked,
								'DISABLED' => $flag_disabled,
								'LINK_COLOR' => $flag_color,
								'CURSOR' => $flag_checked,
								'NAME' => $group['name'],
								)
							);
		$template->parse('group_list', 'group_list_block', true);
	}
}
// Group list 2
$sql = 'SELECT * FROM `'.TABLE_PREFIX.'groups`';
$get_groups = $database->query($sql);
$template->set_block('main_block', 'group_list_block2', 'group_list2');
// Insert admin group and current group first
$admin_group_name = $get_groups->fetchRow(MYSQL_ASSOC);
$template->set_var(array(
						'ID' => 1,
						'TOGGLE' => '1',
						'DISABLED' => ' disabled="disabled"',
						'LINK_COLOR' => '000000',
						'CURSOR' => 'default',
						'NAME' => $admin_group_name['name'],
						'CHECKED' => ' checked="checked"'
						)
					);
$template->parse('group_list2', 'group_list_block2', true);
while($group = $get_groups->fetchRow(MYSQL_ASSOC)) {
	// check if the user is a member of this group
	$flag_disabled = '';
	$flag_checked =  '';
	$flag_cursor =   'pointer';
	$flag_color =    '';
	if (in_array($group["group_id"], $admin->get_groups_id())) {
		$flag_disabled = ''; //' disabled';
		$flag_checked =  ' checked="checked"';
		$flag_cursor =   'default';
		$flag_color =    '000000';
	}
	$template->set_var(array(
							'ID' => $group['group_id'],
							'TOGGLE' => $group['group_id'],
							'CHECKED' => $flag_checked,
							'DISABLED' => $flag_disabled,
							'LINK_COLOR' => $flag_color,
							'CURSOR' => $flag_cursor,
							'NAME' => $group['name'],
							)
						);
	$template->parse('group_list2', 'group_list_block2', true);
}
// Parent page list
// $database = new database();
function parent_list($parent)
{
	global $admin, $template, $field_set;
	$database = WbDatabase::getInstance();
	$sql = 'SELECT * FROM `'.TABLE_PREFIX.'pages` '.
	       'WHERE `parent`='.$parent.' AND `visibility`!=\'deleted\' '.
	       'ORDER BY `position` ASC';
	$get_pages = $database->query($sql);

	while($page = $get_pages->fetchRow(MYSQL_ASSOC)) {
		if(!$admin->page_is_visible($page)) { continue; }
		// if parent = 0 set flag_icon
		$template->set_var('FLAG_ROOT_ICON', ' none ');
		if( $page['parent'] == 0 && $field_set) {
			$template->set_var('FLAG_ROOT_ICON','url('.THEME_URL.'/images/flags/'.strtolower($page['language']).'.png)');
		}
		// Stop users from adding pages with a level of more than the set page level limit
		if($page['level']+1 < PAGE_LEVEL_LIMIT) {
			// Get user permissions
			$can_modify = ($admin->ami_group_member($page['admin_groups']) ||
					       $admin->is_group_match($admin->get_groups_id(), $page['admin_users']));
			// Title -'s prefix
			$title_prefix = '';
			for($i = 1; $i <= $page['level']; $i++) { $title_prefix .= ' - - &nbsp;'; }
				$template->set_var(array(
										'ID' => $page['page_id'],
										'TITLE' => ($title_prefix.$page['menu_title']),
										'MENU-TITLE' => ($title_prefix.$page['menu_title']),
										'PAGE-TITLE' => ($title_prefix.$page['page_title'])
										));
				if($can_modify == true) {
					$template->set_var('DISABLED', '');
				} else {
					$template->set_var('DISABLED', ' disabled="disabled" class="disabled"');
				}
				$template->parse('page_list2', 'page_list_block2', true);
		}
		parent_list($page['page_id']);
	}
}
$template->set_block('main_block', 'page_list_block2', 'page_list2');
if($admin->get_permission('pages_add_l0') == true) {
	$template->set_var(array(
						'ID' => '0',
						'TITLE' => $TEXT['NONE'],
						'SELECTED' => ' selected="selected"',
						'DISABLED' => ''
					)
				);
	$template->parse('page_list2', 'page_list_block2', true);
}
parent_list(0);
// Explode module permissions
$module_permissions = $_SESSION['MODULE_PERMISSIONS'];
// Modules list
$template->set_block('main_block', 'module_list_block', 'module_list');
$result = $database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'module' AND function = 'page' order by name");
if($result->numRows() > 0) {
	while ($module = $result->fetchRow(MYSQL_ASSOC)) {
		// Check if user is allowed to use this module
		if(!is_numeric(array_search($module['directory'], $module_permissions))) {
			$template->set_var('VALUE', $module['directory']);
			$template->set_var('NAME', $module['name']);
			if($module['directory'] == 'wysiwyg') {
				$template->set_var('SELECTED', ' selected="selected"');
			} else {
				$template->set_var('SELECTED', '');
			}
			$template->parse('module_list', 'module_list_block', true);
		}
	}
}
// Insert urls
$template->set_var(array(
								'THEME_URL' => THEME_URL,
								'WB_URL' => WB_URL,
								'ADMIN_URL' => ADMIN_URL,
								)
						);
// Insert language headings
$template->set_var(array(
								'HEADING_ADD_PAGE' => $HEADING['ADD_PAGE'],
								'HEADING_MODIFY_INTRO_PAGE' => $HEADING['MODIFY_INTRO_PAGE']
								)
						);
// Insert language text and messages
$template->set_var(array(
								'TEXT_TITLE' => $TEXT['TITLE'],
								'TEXT_TYPE' => $TEXT['TYPE'],
								'TEXT_PARENT' => $TEXT['PARENT'],
								'TEXT_VISIBILITY' => $TEXT['VISIBILITY'],
								'TEXT_PUBLIC' => $TEXT['PUBLIC'],
								'TEXT_PRIVATE' => $TEXT['PRIVATE'],
								'TEXT_REGISTERED' => $TEXT['REGISTERED'],
								'TEXT_HIDDEN' => $TEXT['HIDDEN'],
								'TEXT_NONE' => $TEXT['NONE'],
								'TEXT_NONE_FOUND' => $TEXT['NONE_FOUND'],
								'TEXT_ADD' => $TEXT['ADD'],
								'TEXT_RESET' => $TEXT['RESET'],
								'TEXT_ADMINISTRATORS' => $TEXT['ADMINISTRATORS'],
								'TEXT_PRIVATE_VIEWERS' => $TEXT['PRIVATE_VIEWERS'],
								'TEXT_REGISTERED_VIEWERS' => $TEXT['REGISTERED_VIEWERS'],
								'INTRO_LINK' => $MESSAGE['PAGES_INTRO_LINK'],
								)
						);
// Insert permissions values
if($admin->get_permission('pages_add') != true) {
	$template->set_var('DISPLAY_ADD', 'hide');
} elseif($admin->get_permission('pages_add_l0') != true && $editable_pages == 0) {
	$template->set_var('DISPLAY_ADD', 'hide');
}
if($admin->get_permission('pages_intro') != true || INTRO_PAGE != 'enabled') {
	$template->set_var('DISPLAY_INTRO', 'hide');
}
// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');
// include the required file for Javascript admin
if(file_exists(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php')) {
	include(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php');
}
// Print admin
$admin->print_footer();
