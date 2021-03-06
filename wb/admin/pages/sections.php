<?php
/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */

// Include config file
if(!defined('WB_URL'))
{
    $config_file = realpath('../../config.php');
    if(file_exists($config_file) && !defined('WB_URL'))
    {
    	require($config_file);
    }
}

// Make sure people are allowed to access this page
if(MANAGE_SECTIONS != 'enabled')
{
	header('Location: '.ADMIN_URL.'/pages/index.php');
	exit(0);
}
/* */
$debug = true; // to show position
If(!defined('DEBUG')) { define('DEBUG',$debug);}
// Create new admin object
// if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }
$admin = new admin('Pages', 'pages_view', false);
// Include the WB functions file
if(!function_exists('directory_list')) { require(WB_PATH.'/framework/functions.php'); }
$mLang = Translate::getInstance();
$mLang->enableAddon('admin\pages');
$oDb = WbDatabase::getInstance();
$action = 'show';
// Get page id
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$page_id = intval((isset(${$requestMethod}['page_id'])) ? ${$requestMethod}['page_id'] : 0);
$action = ($page_id ? 'show' : $action);
// Get section id if there is one
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$section_id = ((isset(${$requestMethod}['section_id'])) ? ${$requestMethod}['section_id']  : 0);
$action = ($section_id ? 'delete' : $action);
// Get module if there is one
$requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
$module = ((isset(${$requestMethod}['module'])) ? ${$requestMethod}['module']  : 0);
$action = ($module != '' ? 'add' : $action);
$admin_header = true;
$backlink = ADMIN_URL.'/pages/sections.php?page_id='.(int)$page_id;

switch ($action):
	case 'delete' :
        if($admin->get_permission('pages_delete') == false)
        {
			$admin->print_header();
			$admin->print_error($module.' '.mb_strtolower($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS, 'UTF-8'), $backlink);
        }

		if( ( !($section_id = intval($admin->checkIDKEY('section_id', 0, $_SERVER['REQUEST_METHOD'])) )) )
		{
			if($admin_header) { $admin->print_header(); }
			$admin->print_error($mlang->MESSAGE_GENERIC_SECURITY_ACCESS,$backlink);
		}

		$action = 'show';
	    $sql = 'SELECT `module` FROM `'.$oDb->TablePrefix.'sections` '
	         . 'WHERE `section_id` ='.$section_id;
        if ((($modulname = $oDb->getOne($sql)) == $module) && ($section_id > 0 ) ) {
			// Include the modules delete file if it exists
			if(file_exists(WB_PATH.'/modules/'.$modulname.'/delete.php'))
		    {
				require(WB_PATH.'/modules/'.$modulname.'/delete.php');
			}
		    $sql = 'DELETE FROM `'.$oDb->TablePrefix.'sections` '
		         . 'WHERE `section_id` ='.(int)$section_id.' LIMIT 1';
			if (!$oDb->doQuery($sql)) {
				if($admin_header) { $admin->print_header(); }
				$admin->print_error($oDb->get_error(),$backlink);
			} else {
				require_once(WB_PATH.'/framework/class.order.php');
				$order = new order($oDb->TablePrefix.'sections', 'position', 'section_id', 'page_id');
				$order->clean($page_id);
				$format = $mLang->TEXT_SECTION.' %d  %s %s '.mb_strtolower($mLang->TEXT_DELETED, 'UTF-8');
				$message = sprintf ($format,$section_id, mb_strtoupper($modulname, 'UTF-8'),mb_strtolower($mLang->TEXT_SUCCESS, 'UTF-8'));
				if($admin_header) { $admin->print_header(); }
				$admin_header = false;
				unset($_POST);
				$admin->print_success($message, $backlink );
			}
        } else {
			if($admin_header) { $admin->print_header(); }
			$admin->print_error($module.' '.mb_strtolower($mLang->TEXT_NOT_FOUND, 'UTF-8'),$backlink);
        }

		break;
	case 'add' :
        if($admin->get_permission('pages_add') == false)
        {
			$admin->print_header();
			$admin->print_error($module.' '.mb_strtolower($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS, 'UTF-8'),$backlink);
        }
		if (!$admin->checkFTAN())
		{
			$admin->print_header();
			$admin->print_error($mLang->MESSAGE_GENERIC_SECURITY_ACCESS,$backlink);
		}
		$action = 'show';
		$module = preg_replace('/\W/', '', $module );  // fix secunia 2010-91-4
		require_once(WB_PATH.'/framework/class.order.php');
		// Get new order
		$order = new order($oDb->TablePrefix.'sections', 'position', 'section_id', 'page_id');
		$position = $order->get_new($page_id);
		// Insert module into DB
	    $sql  = 'INSERT INTO `'.$oDb->TablePrefix.'sections` '
              . 'SET `page_id` = '.(int)$page_id.', '
              .     '`module` = \''.$module.'\', '
	          .     '`position` = '.(int)$position.', '
	          .     '`block` = \'1\', '
              .     '`publ_start` = \'0\', '
              .     '`publ_end` = \'0\'';

        if($oDb->doQuery($sql)) {
			// Get the section id
			$section_id = $oDb->getOne('SELECT LAST_INSERT_ID()');
			// Include the selected modules add file if it exists
			if(file_exists(WB_PATH.'/modules/'.$module.'/add.php'))
		    {
				require(WB_PATH.'/modules/'.$module.'/add.php');
			}
        } elseif ($oDb->is_error())  {
			if($admin_header) { $admin->print_header(); }
			$admin->print_error($oDb->get_error());
		}
		break;
	default:
		break;
endswitch;

switch ($action):
	default:

		if($admin_header) { $admin->print_header(); }
		// Get perms
		$sql  = 'SELECT `admin_groups`,`admin_users` FROM `'.$oDb->TablePrefix.'pages` '
		      . 'WHERE `page_id` = '.$page_id;
		$oPage = $oDb->doQuery($sql);
		$aPageRights = $oPage->fetchRow(MYSQL_ASSOC);
    // Get user permisions
        if (!$admin->ami_group_member($aPageRights['admin_groups']) && !$admin->is_group_match($admin->get_user_id(), $aPageRights['admin_users'])) {
			$admin->print_header();
			$admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
        }
//		$old_admin_groups = explode(',', $results_array['admin_groups']);
//		$old_admin_users = explode(',', $results_array['admin_users']);
//		$in_old_group = FALSE;
//		foreach($admin->get_groups_id() as $cur_gid)
//		{
//			if (in_array($cur_gid, $old_admin_groups))
//		    {
//				$in_old_group = TRUE;
//			}
//		}
//		if((!$in_old_group) && !is_numeric(array_search($admin->get_user_id(), $old_admin_users)))
//		{
//			$admin->print_header();
//			$admin->print_error($mLang->MESSAGE_PAGES_INSUFFICIENT_PERMISSIONS);
//		}
		// Get page details
		$sql  = 'SELECT * FROM `'.$oDb->TablePrefix.'pages` ';
		$sql .= 'WHERE `page_id` = '.$page_id;
		$results = $oDb->doQuery($sql);

		if($oDb->is_error())
		{
			// $admin->print_header();
			$admin->print_error($oDb->get_error());
		}
		if($results->numRows() == 0)
		{
			// $admin->print_header();
			$admin->print_error($mLang->MESSAGE_PAGES_NOT_FOUND);
		}
		$results_array = $results->fetchRow();

		// Get display name of person who last modified the page
			$user=$admin->get_user_details($results_array['modified_by']);
		// Convert the unix ts for modified_when to human a readable form
			if($results_array['modified_when'] != 0) {
				$modified_ts = gmdate(TIME_FORMAT.', '.DATE_FORMAT, $results_array['modified_when']+TIMEZONE);
			} else {
				$modified_ts = 'Unknown';
			}

		// Set module permissions
		$module_permissions = $_SESSION['MODULE_PERMISSIONS'];

		// Unset block var
		unset($block);
		// Include template info file (if it exists)
		if($results_array['template'] != '')
		{
			$template_location = WB_PATH.'/templates/'.$results_array['template'].'/info.php';
		} else {
			$template_location = WB_PATH.'/templates/'.DEFAULT_TEMPLATE.'/info.php';
		}
		if(file_exists($template_location))
		{
			require($template_location);
		}
    // check block settings from template/info.php
       if(isset($block) && is_array($block) && sizeof($block) > 0) {
           if(isset($block[0])) {
           throw new AppException('Invalid index 0 for $block[] in '.str_replace(WB_PATH,'',$template_location).'. '
                                . 'The list must start with $block[1]. Please correct it!');
           }
           foreach($block as $iIndex=>$sBlockTitle) {
               if(trim($sBlockTitle) == '' ) {
                $block[$iIndex] = $mLang->TEXT_BLOCK.'_'.$iIndex;
               }
           }
       }else {
           // Make our own menu list
           $block = array(1 => $mLang->TEXT_MAIN);
       }
		/*-- load css files with jquery --*/
		// include jscalendar-setup
		$jscal_use_time = true; // whether to use a clock, too
		require_once(WB_PATH."/include/jscalendar/wb-setup.php");

		// Setup template object, parse vars to it, then parse it
		// Create new template object
		$tpl = new Template(dirname($admin->correct_theme_source('pages_sections.htt')));
		// $template->debug = true;
		$tpl->set_file('page', 'pages_sections.htt');
		$tpl->set_block('page', 'main_block', 'main');
		$tpl->set_block('main_block', 'module_block', 'module_list');
		$tpl->set_block('main_block', 'section_block', 'section_list');
		$tpl->set_block('section_block', 'block_block', 'block_list');
		$tpl->set_block('main_block', 'calendar_block', 'calendar_list');
		$tpl->set_var('FTAN', $admin->getFTAN());

		// set first defaults and messages
		$tpl->set_var(array(
						'PAGE_ID' => $results_array['page_id'],
						// 'PAGE_IDKEY' => $admin->getIDKEY($results_array['page_id']),
						'PAGE_IDKEY' => $results_array['page_id'],
						'TEXT_PAGE' => $mLang->TEXT_PAGE,
						'PAGE_TITLE' => ($results_array['page_title']),
						'MENU_TITLE' => ($results_array['menu_title']),
						'TEXT_CURRENT_PAGE' => $mLang->TEXT_CURRENT_PAGE,
						'TEXT_LAST_MODIFIED' => $mLang->TEXT_LAST_UPDATED_BY,
						'HEADING_MANAGE_SECTIONS' => $mLang->HEADING_MANAGE_SECTIONS,
						'HEADING_MODIFY_PAGE' => $mLang->HEADING_MODIFY_PAGE,
						'TEXT_CHANGE_SETTINGS' => $mLang->TEXT_CHANGE_SETTINGS,
						'TEXT_ADD_SECTION' => $mLang->TEXT_ADD_SECTION,
						'TEXT_SECTION' => $mLang->TEXT_SECTION,
						'TEXT_ID' => 'ID',
						'TEXT_TYPE' => $mLang->TEXT_TYPE,
						'TEXT_BLOCK' => $mLang->TEXT_BLOCK,
						'TEXT_PUBL_START_DATE' => $mLang->TEXT_PUBL_START_DATE,
						'TEXT_PUBL_END_DATE' => $mLang->TEXT_PUBL_END_DATE,
						'TEXT_ACTIONS' => $mLang->TEXT_ACTIONS,
						'MODIFIED_BY'          => $user['display_name'],
						'MODIFIED_BY_USERNAME' => $user['username'],
						'MODIFIED_WHEN'        => $modified_ts,
						'ADMIN_URL' => ADMIN_URL,
						'WB_URL' => WB_URL,
						'THEME_URL' => THEME_URL
						)
					);
// check modify page permission
	if( $admin->get_permission('pages_modify') )
	{
		$tpl->set_var(array(
				'MODIFY_LINK_BEFORE' => '<a href="'.ADMIN_URL.'/pages/modify.php?page_id='.$results_array['page_id'].'">',
				'MODIFY_LINK_AFTER' => '</a>',
				'DISPLAY_MANAGE_MODIFY' => 'link',
				));
	} else {
		$tpl->set_var(array(
				'MODIFY_LINK_BEFORE' => '<span class="bold grey">',
				'MODIFY_LINK_AFTER' => '</span>',
				'DISPLAY_MANAGE_MODIFY' => 'link',
				));
	}

// check settings page permission
	if( $admin->get_permission('pages_settings') )
	{
		$tpl->set_var(array(
				'SETTINGS_LINK_BEFORE' => '<a href="'.ADMIN_URL.'/pages/settings.php?page_id='.$results_array['page_id'].'">',
				'SETTINGS_LINK_AFTER' => '</a>',
				'DISPLAY_MANAGE_SETTINGS' => 'link',
				));
	} else {
		$tpl->set_var(array(
				'SETTINGS_LINK_BEFORE' => '<span class="bold grey">',
				'SETTINGS_LINK_AFTER' => '</span>',
				'DISPLAY_MANAGE_SECTIONS' => 'link',
				));
	}

		// Insert variables
		$tpl->set_var(array(
						'PAGE_ID' => $results_array['page_id'],
						// 'PAGE_IDKEY' => $admin->getIDKEY($results_array['page_id']),
						'PAGE_IDKEY' => $results_array['page_id'],
						'VAR_PAGE_TITLE' => $results_array['page_title'],
						'SETTINGS_LINK' => ADMIN_URL.'/pages/settings.php?page_id='.$results_array['page_id'],
						'MODIFY_LINK' => ADMIN_URL.'/pages/modify.php?page_id='.$results_array['page_id']
						)
					);
// setting trash only if more than one section exists
		$tpl->set_block('section_block', 'delete_block', 'delete');
        $sql = 'SELECT COUNT(*) FROM `'.$oDb->TablePrefix.'sections` '
             . 'WHERE `page_id`='.$page_id;
		$bSectionCanDelete = ($oDb->getOne($sql) > 1);
		$sql = 'SELECT `section_id`,`module`,`position`,`block`,`publ_start`,`publ_end` '
		     . 'FROM `'.$oDb->TablePrefix.'sections` '
		     . 'WHERE `page_id` = '.$page_id.' '
		     . 'ORDER BY `position` ASC';
		$query_sections = $oDb->doQuery($sql);
        $num_sections = $query_sections->numRows();
        while ($section = $query_sections->fetchRow(MYSQL_ASSOC)) {
            if (!is_numeric(array_search($section['module'], $module_permissions))) {
                // Get the modules real name
                $sql = 'SELECT `name` FROM `'.$oDb->TablePrefix.'addons` '
                     . 'WHERE `directory` = "'.$section['module'].'"';
                if (!$oDb->getOne($sql) || !file_exists(WB_PATH.'/modules/'.$section['module'])) {
                    $edit_page = '<span class="module_disabled">'.$section['module'].'</span>';
                } else {
                    $edit_page = '';
                }
                $sSectionIdPrefix = ( defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? SEC_ANCHOR : 'Sec');
                $edit_page_0 = '<a id="sid'.$section['section_id'].'" href="'.ADMIN_URL.'/pages/modify.php?page_id='.$results_array['page_id'];
                $edit_page_1  = ($sSectionIdPrefix!='') ? '#'.$sSectionIdPrefix.$section['section_id'].'">' : '">';
                $edit_page_1 .= $section['module'].'</a>';
                if (SECTION_BLOCKS) {
                    if ($edit_page == '') {
                        if (defined('EDIT_ONE_SECTION') && EDIT_ONE_SECTION) {
                            $edit_page = $edit_page_0.'&amp;wysiwyg='.$section['section_id'].$edit_page_1;
                        } else {
                            $edit_page = $edit_page_0.$edit_page_1;
                        }
                    }
                    $input_attribute = 'input_normal';
                    $tpl->set_var(array(
                            'STYLE_DISPLAY_SECTION_BLOCK' => ' style="visibility:visible;"',
                            'NAME_SIZE' => 300,
                            'INPUT_ATTRIBUTE' => $input_attribute,
                            'VAR_SECTION_ID' => $section['section_id'],
                            'VAR_SECTION_IDKEY' => $admin->getIDKEY($section['section_id']),
                            // 'VAR_SECTION_IDKEY' => $section['section_id'],
                            'VAR_POSITION' => $section['position'],
                            'LINK_MODIFY_URL_VAR_MODUL_NAME' => $edit_page,
                            'SELECT' => '',
                            'SET_NONE_DISPLAY_OPTION' => ''
                            )
                        );
                    // Add block options to the section_list
                    $tpl->clear_var('block_list');
                    foreach ($block AS $number => $name) {
                        $tpl->set_var('NAME', htmlentities(strip_tags($name)));
                        $tpl->set_var('VALUE', $number);
                        $tpl->set_var('SIZE', 1);
                        if ($section['block'] == $number) {
                            $tpl->set_var('SELECTED', ' selected="selected"');
                        } else {
                            $tpl->set_var('SELECTED', '');
                        }
                        $tpl->parse('block_list', 'block_block', true);
                    }
                } else {
                    if ($edit_page == '') {
                        $edit_page = $edit_page_0.'#wb_'.$edit_page_1;
                    }
                    $input_attribute = 'input_normal';
                    reset($block);
                    $tpl->set_var(array(
                            'STYLE_DISPLAY_SECTION_BLOCK' => ' style="visibility:hidden;"',
                            'NAME_SIZE' => 300,
                            'INPUT_ATTRIBUTE' => $input_attribute,
                            'VAR_SECTION_ID' => $section['section_id'],
                            'VAR_SECTION_IDKEY' => $admin->getIDKEY($section['section_id']),
                            // 'VAR_SECTION_IDKEY' => $section['section_id'],
                            'VAR_POSITION' => $section['position'],
                            'LINK_MODIFY_URL_VAR_MODUL_NAME' => $edit_page,
                            'NAME' => htmlentities(strip_tags(key($block))),
                            'VALUE' => 1,
                            'SET_NONE_DISPLAY_OPTION' => '<option>&nbsp;</option>'
                            )
                        );
                }
                // Insert icon and images
                $tpl->set_var(array(
                            'CLOCK_16_PNG' => 'clock_16.png',
                            'CLOCK_DEL_16_PNG' => 'clock_del_16.png',
                            'DELETE_16_PNG' => 'delete_16.png'
                            )
                        );
                // set calendar start values
                if ($section['publ_start']==0) {
                    $tpl->set_var('VALUE_PUBL_START', '');
                } else {
                    $tpl->set_var('VALUE_PUBL_START', date($jscal_format, $section['publ_start']+TIMEZONE));
                }
                // set calendar start values
                if ($section['publ_end']==0) {
                    $tpl->set_var('VALUE_PUBL_END', '');
                } else {
                    $tpl->set_var('VALUE_PUBL_END', date($jscal_format, $section['publ_end']+TIMEZONE));
                }
                // Insert icons up and down
                if ($section['position'] != 1 ) {
                    $tpl->set_var(
                                'VAR_MOVE_UP_URL',
                                '<a href="'.ADMIN_URL.'/pages/move_up.php?page_id='.$page_id.'&amp;section_id='.$section['section_id'].'">
                                <img src="'.THEME_URL.'/images/up_16.png" alt="{TEXT_MOVE_UP}" />
                                </a>' );
                } else {
                    $tpl->set_var(array(
                                'VAR_MOVE_UP_URL' => ''
                                )
                            );
                }
                if ($section['position'] != $num_sections ) {
                    $tpl->set_var(
                                'VAR_MOVE_DOWN_URL',
                                '<a href="'.ADMIN_URL.'/pages/move_down.php?page_id='.$page_id.'&amp;section_id='.$section['section_id'].'">
                                <img src="'.THEME_URL.'/images/down_16.png" alt="{TEXT_MOVE_DOWN}" />
                                </a>' );
                } else {
                    $tpl->set_var(array(
                                'VAR_MOVE_DOWN_URL' => ''
                                )
                            );
                }
            } else { continue; }
            $tpl->set_var(array(
                            'DISPLAY_DEBUG' => ' style="visibility:visible;"',
                            'TEXT_SID' => 'SID',
                            'DEBUG_COLSPAN_SIZE' => 9
                            )
                        );
            if ($debug) {
                $tpl->set_var(array(
                                'DISPLAY_DEBUG' => ' style="visibility:visible;"',
                                'TEXT_PID' => 'PID',
                                'TEXT_SID' => 'SID',
                                'POSITION' => $section['position']
                                )
                            );
            } else {
                $tpl->set_var(array(
                                'DISPLAY_DEBUG' => ' style="display:none;"',
                                'TEXT_PID' => '',
                                'POSITION' => ''
                                )
                            );
            }
            if ($bSectionCanDelete) {
                $tpl->parse('delete', 'delete_block', false);
            } else {
                $tpl->parse('delete', '', false);
            }
            $tpl->parse('section_list', 'section_block', true);
		}

		// now add the calendars -- remember to to set the range to [1970, 2037] if the date is used as timestamp!
		// the loop is simply a copy from above.
		$sql = 'SELECT `section_id`,`module` FROM `'.$oDb->TablePrefix.'sections` '
		     . 'WHERE page_id = '.$page_id.' '
		     . 'ORDER BY `position` ASC';
		$query_sections = $oDb->doQuery($sql);

		if ($query_sections->numRows() > 0) {
			$num_sections = $query_sections->numRows();
			while ($section = $query_sections->fetchRow()) {
				// Get the modules real name
		        $sql = 'SELECT `name` FROM `'.$oDb->TablePrefix.'addons` '
		             . 'WHERE `directory` = "'.$section['module'].'"';
		        $module_name = $oDb->getOne($sql);
				if (!is_numeric(array_search($section['module'], $module_permissions))) {
					$tpl->set_var(array(
								'jscal_ifformat' => $jscal_ifformat,
								'jscal_firstday' => $jscal_firstday,
								'jscal_today' => $jscal_today,
								'start_date' => 'start_date'.$section['section_id'],
								'end_date' => 'end_date'.$section['section_id'],
								'trigger_start' => 'trigger_start'.$section['section_id'],
								'trigger_end' => 'trigger_stop'.$section['section_id']
								)
							);
					if (isset($jscal_use_time) && $jscal_use_time==TRUE) {
						$tpl->set_var(array(
								'showsTime' => "true",
								'timeFormat' => "24"
								)
							);
					} else {
						$tpl->set_var(array(
								'showsTime' => "false",
								'timeFormat' => "24"
								)
							);
					}
				}
				$tpl->parse('calendar_list', 'calendar_block', true);
			}
		}

		// Work-out if we should show the "Add Section" form
		$sql = 'SELECT `section_id` FROM `'.$oDb->TablePrefix.'sections` '
		     . 'WHERE `page_id` = '.$page_id.' AND `module` = "menu_link"';
		$query_sections = $oDb->doQuery($sql);
		$tpl->set_var('TEXT_PLEASE_SELECT', $mLang->TEXT_NONE);
		if ($query_sections->numRows() == 0) {
			$tpl->set_var('TEXT_PLEASE_SELECT', $mLang->TEXT_PLEASE_SELECT);
			// Modules list
		    $sql = 'SELECT `name`,`directory`,`type` FROM `'.$oDb->TablePrefix.'addons` '
		         . 'WHERE `type` = "module" AND `function` = "page" AND `directory` != "menu_link" '
		         . 'ORDER BY `name`';
		    $result = $oDb->doQuery($sql);
		// if(DEBUG && $oDb->is_error()) { $admin->print_error($oDb->get_error()); }
			if ($result->numRows() > 0) {
				while ($module = $result->fetchRow()) {
					// Check if user is allowed to use this module   echo  $module['directory'],'<br />';
					if (!is_numeric(array_search($module['directory'], $module_permissions))) {
						$tpl->set_var('VALUE', $module['directory']);
						$tpl->set_var('NAME', $module['name']);
						if ($module['directory'] == 'wysiwyg') {
							$tpl->set_var('SELECTED', ' selected="selected"');
						} else {
							$tpl->set_var('SELECTED', '');
						}
						$tpl->parse('module_list', 'module_block', true);
					} else {
					  continue;
					}
				}
			}
		}
		// Insert language text and messages
		$tpl->set_var(array(
							'TEXT_MANAGE_SECTIONS' => $mLang->HEADING_MANAGE_SECTIONS,
							'TEXT_ARE_YOU_SURE' => $mLang->TEXT_ARE_YOU_SURE,
							'TEXT_TYPE' => $mLang->TEXT_TYPE,
							'TEXT_ADD' => $mLang->TEXT_ADD,
							'TEXT_SAVE' =>  $mLang->TEXT_SAVE,
							'TEXTLINK_MODIFY_PAGE' => $mLang->HEADING_MODIFY_PAGE,
							'TEXT_CALENDAR' => $mLang->TEXT_CALENDAR,
							'TEXT_DELETE_DATE' => $mLang->TEXT_DELETE_DATE,
							'TEXT_ADD_SECTION' => $mLang->TEXT_ADD_SECTION,
							'TEXT_MOVE_UP' => $mLang->TEXT_MOVE_UP,
							'TEXT_MOVE_DOWN' => $mLang->TEXT_MOVE_DOWN
							)
						);
		$tpl->parse('main', 'main_block', false);
		$tpl->pparse('output', 'page');
		// include the required file for Javascript admin
		if(file_exists(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php')) {
			include(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php');
		}
		break;
endswitch;
// Print admin footer
$admin->print_footer();
