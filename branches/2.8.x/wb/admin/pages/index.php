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

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages');
// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');
// eggsurplus: add child pages for a specific page
?>
<script type="text/javascript" src="<?php print ADMIN_URL; ?>/pages/eggsurplus.js"></script>
<?php


function make_list($parent, $editable_pages) {
	// Get objects and vars from outside this function
	global $admin, $template, $database, $TEXT, $MESSAGE, $HEADING, $page_tmp_id;
	?>
	<ul id="p<?php echo $parent; ?>" <?php if($parent != 0) { echo 'class="page_list" '; if(isset($_COOKIE['p'.$parent]) && $_COOKIE['p'.$parent] == '1'){ echo 'style="display:block"'; }} ?>>
	<?php
	// Get page list from database
	$database = new database();
	if(PAGE_TRASH != 'inline') {
		$query = "SELECT * FROM ".TABLE_PREFIX."pages WHERE parent = '$parent' AND visibility != 'deleted' ORDER BY position ASC";
	} else {
		$query = "SELECT * FROM ".TABLE_PREFIX."pages WHERE parent = '$parent' ORDER BY position ASC";
	}
	$get_pages = $database->query($query);
	// Insert values into main page list
	if($get_pages->numRows() > 0) {
		while($page = $get_pages->fetchRow()) {
			// Get user perms
			$admin_groups = explode(',', str_replace('_', '', $page['admin_groups']));
			$admin_users = explode(',', str_replace('_', '', $page['admin_users']));
			$in_group = FALSE;
			foreach($admin->get_groups_id() as $cur_gid) {
				if (in_array($cur_gid, $admin_groups)) {
					$in_group = TRUE;
				}
			}
			if(($in_group) OR is_numeric(array_search($admin->get_user_id(), $admin_users))) {
				if($page['visibility'] == 'deleted') {
					if(PAGE_TRASH == 'inline') {
						$can_modify = true;
						$editable_pages = $editable_pages+1;
					} else {
						$can_modify = false;
					}
				} elseif($page['visibility'] != 'deleted') {
					$can_modify = true;
					$editable_pages = $editable_pages+1;
				}
			} else {
				if($page['visibility'] == 'private') {
					continue;
				}
				else {
					$can_modify = false;
				}
			}
			// Work out if we should show a plus or not
			if(PAGE_TRASH != 'inline') {
				$get_page_subs = $database->query("SELECT page_id,admin_groups,admin_users FROM ".TABLE_PREFIX."pages WHERE parent = '".$page['page_id']."' AND visibility!='deleted'");
			} else {
				$get_page_subs = $database->query("SELECT page_id,admin_groups,admin_users FROM ".TABLE_PREFIX."pages WHERE parent = '".$page['page_id']."'");
			}
			if($get_page_subs->numRows() > 0) {
				$display_plus = true;
			} else {
				$display_plus = false;
			}
			// Work out how many pages there are for this parent
			$num_pages = $get_pages->numRows();
			?>
			<li class="p<?php echo $page['parent']; ?>">
			<table class="pages_view" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="middle" width="20" style="padding-left: <?php if($page['level'] > 0){ echo $page['level']*20; } else { echo '7'; } ?>px;">
					<?php
					if($display_plus == true) {
					?>
					<a href="javascript: toggle_visibility('p<?php echo $page['page_id']; ?>');" title="<?php echo $TEXT['EXPAND'].'/'.$TEXT['COLLAPSE']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/<?php if(isset($_COOKIE['p'.$page['page_id']]) && $_COOKIE['p'.$page['page_id']] == '1'){ echo 'minus'; } else { echo 'plus'; } ?>_16.png" onclick="toggle_plus_minus('<?php echo $page['page_id']; ?>');" name="plus_minus_<?php echo $page['page_id']; ?>" border="0" alt="+" />
					</a>
					<?php
					}
					?>
				</td>
				<?php if($admin->get_permission('pages_modify') == true AND $can_modify == true) { ?>
				<td class="list_menu_title">
					<a href="<?php echo ADMIN_URL; ?>/pages/modify.php?page_id=<?php echo $page['page_id']; ?>" title="<?php echo $TEXT['MODIFY']; ?>">
						<?php if($page['visibility'] == 'public') { ?>
							<img src="<?php echo THEME_URL; ?>/images/visible_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['PUBLIC']; ?>" class="page_list_rights" />
						<?php } elseif($page['visibility'] == 'private') { ?>
							<img src="<?php echo THEME_URL; ?>/images/private_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['PRIVATE']; ?>" class="page_list_rights" />
						<?php } elseif($page['visibility'] == 'registered') { ?>
							<img src="<?php echo THEME_URL; ?>/images/keys_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['REGISTERED']; ?>" class="page_list_rights" />
						<?php } elseif($page['visibility'] == 'hidden') { ?>
							<img src="<?php echo THEME_URL; ?>/images/hidden_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['HIDDEN']; ?>" class="page_list_rights" />
						<?php } elseif($page['visibility'] == 'none') { ?>
							<img src="<?php echo THEME_URL; ?>/images/none_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['NONE']; ?>" class="page_list_rights" />
						<?php } elseif($page['visibility'] == 'deleted') { ?>
							<img src="<?php echo THEME_URL; ?>/images/deleted_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['DELETED']; ?>" class="page_list_rights" />
						<?php }
						echo '<span class="modify_link">'.($page['menu_title']).'</span>'; ?>
					</a>
				</td>
				<?php } else { ?>
				<td class="list_menu_title">
					<?php if($page['visibility'] == 'public') { ?>
						<img src="<?php echo THEME_URL; ?>/images/visible_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['PUBLIC']; ?>" class="page_list_rights" />
					<?php } elseif($page['visibility'] == 'private') { ?>
						<img src="<?php echo THEME_URL; ?>/images/private_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['PRIVATE']; ?>" class="page_list_rights" />
					<?php } elseif($page['visibility'] == 'registered') { ?>
						<img src="<?php echo THEME_URL; ?>/images/keys_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['REGISTERED']; ?>" class="page_list_rights" />
					<?php } elseif($page['visibility'] == 'hidden') { ?>
						<img src="<?php echo THEME_URL; ?>/images/hidden_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['HIDDEN']; ?>" class="page_list_rights" />
					<?php } elseif($page['visibility'] == 'none') { ?>
						<img src="<?php echo THEME_URL; ?>/images/none_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['NONE']; ?>" class="page_list_rights" />
					<?php } elseif($page['visibility'] == 'deleted') { ?>
						<img src="<?php echo THEME_URL; ?>/images/deleted_16.png" alt="<?php echo $TEXT['VISIBILITY']; ?>: <?php echo $TEXT['DELETED']; ?>" class="page_list_rights" />
					<?php } 
					echo ($page['menu_title']); ?>
				</td>
				<?php } ?>
				<td class="list_page_title">
					<?php echo ($page['page_title']); ?>
				</td>
				<td class="list_page_id">
					<?php echo $page['page_id']; ?>
				</td>
				<td class="list_actions">
					<?php if($page['visibility'] != 'deleted' AND $page['visibility'] != 'none') { ?>
					<a href="<?php echo $admin->page_link($page['link']); ?>" target="_blank" title="<?php echo $TEXT['VIEW']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/view_16.png" border="0" alt="<?php echo $TEXT['VIEW']; ?>" />
					</a>
					<?php } ?>
				</td>
				<td class="list_actions">
					<?php if($page['visibility'] != 'deleted') { ?>
						<?php if($admin->get_permission('pages_settings') == true AND $can_modify == true) { ?>
						<a href="<?php echo ADMIN_URL; ?>/pages/settings.php?page_id=<?php echo $page['page_id']; ?>" title="<?php echo $TEXT['SETTINGS']; ?>">
							<img src="<?php echo THEME_URL; ?>/images/modify_16.png" border="0" alt="<?php echo $TEXT['SETTINGS']; ?>" />
						</a>
						<?php } ?>
					<?php } else { ?>
						<a href="<?php echo ADMIN_URL; ?>/pages/restore.php?page_id=<?php echo $page['page_id']; ?>" title="<?php echo $TEXT['RESTORE']; ?>">
							<img src="<?php echo THEME_URL; ?>/images/restore_16.png" border="0" alt="<?php echo $TEXT['RESTORE']; ?>" />
						</a>
					<?php } ?>
				</td>
				<!-- MANAGE SECTIONS AND DATES BUTTONS -->
				<td class="list_actions">
				<?php
				// Work-out if we should show the "manage dates" link
				if(MANAGE_SECTIONS == 'enabled' && $admin->get_permission('pages_modify')==true && $can_modify==true) {
					$query_sections = $database->query("SELECT publ_start, publ_end FROM ".TABLE_PREFIX."sections WHERE page_id = '{$page['page_id']}' AND module != 'menu_link'");
					if($query_sections->numRows() > 0) {
						$mdate_display=false;
						while($mdate_res = $query_sections->fetchRow()) {
							if($mdate_res['publ_start']!='0' || $mdate_res['publ_end']!='0') {
								$mdate_display=true;
								break;
							}
						}
						if($mdate_display==1) {
							$file=$admin->page_is_active($page)?"clock_16.png":"clock_red_16.png";
							?>
							<a href="<?php echo ADMIN_URL; ?>/pages/sections.php?page_id=<?php echo $page['page_id']; ?>" title="<?php echo $HEADING['MANAGE_SECTIONS']; ?>">
							<img src="<?php echo THEME_URL."/images/$file"; ?>" border="0" alt="<?php echo $HEADING['MANAGE_SECTIONS']; ?>" />	
							</a>
						<?php } else { ?>
							<a href="<?php echo ADMIN_URL; ?>/pages/sections.php?page_id=<?php echo $page['page_id']; ?>" title="<?php echo $HEADING['MANAGE_SECTIONS']; ?>">
							<img src="<?php echo THEME_URL; ?>/images/noclock_16.png" border="0" alt="<?php echo $HEADING['MANAGE_SECTIONS']; ?>" /></a>	
						<?php } ?>
					<?php } ?>
				<?php } ?>
				</td>
				<td class="list_actions">
				<?php if($page['position'] != 1) { ?>
					<?php if($page['visibility'] != 'deleted') { ?>
						<?php if($admin->get_permission('pages_settings') == true AND $can_modify == true) { ?>
						<a href="<?php echo ADMIN_URL; ?>/pages/move_up.php?page_id=<?php echo $page['page_id']; ?>" title="<?php echo $TEXT['MOVE_UP']; ?>">
							<img src="<?php echo THEME_URL; ?>/images/up_16.png" border="0" alt="<?php echo $TEXT['MOVE_UP']; ?>" />
						</a>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				</td>
				<td class="list_actions">
				<?php if($page['position'] != $num_pages) { ?>
					<?php if($page['visibility'] != 'deleted') { ?>
						<?php if($admin->get_permission('pages_settings') == true AND $can_modify == true) { ?>
						<a href="<?php echo ADMIN_URL; ?>/pages/move_down.php?page_id=<?php echo $page['page_id']; ?>" title="<?php echo $TEXT['MOVE_DOWN']; ?>">
							<img src="<?php echo THEME_URL; ?>/images/down_16.png" border="0" alt="<?php echo $TEXT['MOVE_DOWN']; ?>" />
						</a>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				</td>
				<td class="list_actions">
					<?php if($admin->get_permission('pages_delete') == true AND $can_modify == true) { ?>
					<a href="javascript: confirm_link('<?php echo $MESSAGE['PAGES']['DELETE_CONFIRM']; ?>?', '<?php echo ADMIN_URL; ?>/pages/delete.php?page_id=<?php echo $page['page_id']; ?>');" title="<?php echo $TEXT['DELETE']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/delete_16.png" border="0" alt="<?php echo $TEXT['DELETE']; ?>" />
					</a>
					<?php } ?>
				</td>
				<?php
				// eggsurplus: Add action to add a page as a child
				?>
				<td class="list_actions">
					<?php if($admin->get_permission('pages_delete') == true AND $can_modify == true) { ?>
					<a href="javascript:add_child_page('<?php echo $page['page_id']; ?>');" title="<?php echo $TEXT['ADD']; ?>">
						<img src="<?php echo THEME_URL; ?>/images/plus_16.png" name="addpage_<?php echo $page['page_id']; ?>" border="0" alt="Add Child Page" />
					</a>
					<?php } ?>
				</td>
				<?php
				// end [IC] jeggers 2009/10/14: Add action to add a page as a child
				?>

			</tr>
			</table>
			</li>
			<?php
			if ( $page['parent'] = 0) {
				$page_tmp_id = $page['page_id'];
			}
			// Get subs
			$editable_pages=make_list($page['page_id'], $editable_pages);
		}
	}
	?>
	</ul>
	<?php
	return $editable_pages;
}

// Generate pages list
if($admin->get_permission('pages_view') == true) {
	?>
	<div class="jsadmin hide"></div>
	<table cellpadding="0" cellspacing="0" width="100%" border="0">
	<tr>
		<td>
			<h2><?php echo $HEADING['MODIFY_DELETE_PAGE']; ?></h2>
		</td>
		<td align="right">
			<?php
				// Check if there are any pages that are in trash, and if we should show a link to the trash page
				if(PAGE_TRASH == 'separate') {
					$query_trash = $database->query("SELECT page_id FROM ".TABLE_PREFIX."pages WHERE visibility = 'deleted'");
					if($query_trash->numRows() > 0) {
						?>
						<a href="<?php echo ADMIN_URL; ?>/pages/trash.php">
						<img src="<?php echo THEME_URL; ?>/images/delete_16.png" alt="<?php echo $TEXT['PAGE_TRASH']; ?>" border="0" />
						<?php echo $TEXT['VIEW_DELETED_PAGES']; ?></a>
						<?php
					}
				}
			?>
		</td>
	</tr>
	</table>
	<div class="pages_list">
	<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td class="header_list_menu_title">
			<?php echo $TEXT['VISIBILITY'] .' / ' .$TEXT['MENU_TITLE']; ?>:
		</td>
		<td class="header_list_page_title">
			<?php echo $TEXT['PAGE_TITLE']; ?>:
		</td>
		<td class="header_list_page_id">
			ID:
		</td>		
		<td class="header_list_actions">
			<?php echo $TEXT['ACTIONS']; ?>:
		</td>
	</tr>
	</table>
	<?php
	$page_tmp_id = 0;
	$editable_pages = make_list(0, 0);
	?>
	</div>
	<div class="empty_list">
		<?php echo $TEXT['NONE_FOUND']; ?>
	</div>
	<?php
} else {
	$editable_pages = 0;
}

// Setup template object
$template = new Template(THEME_PATH.'/templates');
$template->set_file('page', 'pages.htt');
$template->set_block('page', 'main_block', 'main');

// Figure out if the no pages found message should be shown or not
if($editable_pages == 0) {
	?>
	<style type="text/css">
	.pages_list {
		display: none;
	}
	</style>
	<?php
} else {
	?>
	<style type="text/css">
	.empty_list {
		display: none;
	}
	</style>
	<?php
}

// Insert values into the add page form

// Group list 1

	$query = "SELECT * FROM ".TABLE_PREFIX."groups";
	$get_groups = $database->query($query);
	$template->set_block('main_block', 'group_list_block', 'group_list');
	// Insert admin group and current group first
	$admin_group_name = $get_groups->fetchRow();
	$template->set_var(array(
									'ID' => 1,
									'TOGGLE' => '',
									'DISABLED' => ' disabled="disabled"',
									'LINK_COLOR' => '000000',
									'CURSOR' => 'default',
									'NAME' => $admin_group_name['name'],
									'CHECKED' => ' checked="checked"'
									)
							);
	$template->parse('group_list', 'group_list_block', true);

	while($group = $get_groups->fetchRow()) {
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

	$query = "SELECT * FROM ".TABLE_PREFIX."groups";

	$get_groups = $database->query($query);
	$template->set_block('main_block', 'group_list_block2', 'group_list2');
	// Insert admin group and current group first
	$admin_group_name = $get_groups->fetchRow();
	$template->set_var(array(
									'ID' => 1,
									'TOGGLE' => '',
									'DISABLED' => ' disabled="disabled"',
									'LINK_COLOR' => '000000',
									'CURSOR' => 'default',
									'NAME' => $admin_group_name['name'],
									'CHECKED' => ' checked="checked"'
									)
							);
	$template->parse('group_list2', 'group_list_block2', true);

	while($group = $get_groups->fetchRow()) {
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
$database = new database();
function parent_list($parent) {
	global $admin, $database, $template;
	$query = "SELECT * FROM ".TABLE_PREFIX."pages WHERE parent = '$parent' AND visibility!='deleted' ORDER BY position ASC";
	$get_pages = $database->query($query);
	while($page = $get_pages->fetchRow()) {
		if($admin->page_is_visible($page)==false)
			continue;
		// if parent = 0 set flag_icon
		$template->set_var('FLAG_ROOT_ICON',' none ');
		if( $page['parent'] == 0 ) {
			$template->set_var('FLAG_ROOT_ICON','url('.THEME_URL.'/images/flags/'.strtolower($page['language']).'.png)');
		}
		// Stop users from adding pages with a level of more than the set page level limit
		if($page['level']+1 < PAGE_LEVEL_LIMIT) {
			// Get user perms
			$admin_groups = explode(',', str_replace('_', '', $page['admin_groups']));
			$admin_users = explode(',', str_replace('_', '', $page['admin_users']));
			
			$in_group = FALSE;
			foreach($admin->get_groups_id() as $cur_gid) {
				if (in_array($cur_gid, $admin_groups)) {
					$in_group = TRUE;
				}
			}
			if(($in_group) OR is_numeric(array_search($admin->get_user_id(), $admin_users))) {
				$can_modify = true;
			} else {
				$can_modify = false;
			}
			// Title -'s prefix
			$title_prefix = '';
			for($i = 1; $i <= $page['level']; $i++) { $title_prefix .= ' - '; }
				$template->set_var(array(
												'ID' => $page['page_id'],
												'TITLE' => ($title_prefix.$page['page_title'])
												)
										);
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
	while ($module = $result->fetchRow()) {
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
								'WB_PATH' => WB_PATH,
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
								'INTRO_LINK' => $MESSAGE['PAGES']['INTRO_LINK'],
								)
						);

// Insert permissions values
if($admin->get_permission('pages_add') != true) {
	$template->set_var('DISPLAY_ADD', 'hide');
} elseif($admin->get_permission('pages_add_l0') != true AND $editable_pages == 0) {
	$template->set_var('DISPLAY_ADD', 'hide');
}
if($admin->get_permission('pages_intro') != true OR INTRO_PAGE != 'enabled') {
	$template->set_var('DISPLAY_INTRO', 'hide');
}


// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin 
$admin->print_footer();

?>