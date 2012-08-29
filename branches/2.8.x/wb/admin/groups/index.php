<?php
/**
 *
 * @category        admin
 * @package         groups
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description     action dispatcher of this module.
 *
 */
/* ************************************************************************** */

	function admin_groups_index()
	{
		$database = WbDatabase::getInstance();
		$mLang = ModLanguage::getInstance();
		$mLang->setLanguage(dirname(__FILE__).'/languages/', LANGUAGE, DEFAULT_LANGUAGE);

		$mod_path = dirname(str_replace('\\', '/', __FILE__));
		$mod_name = basename($mod_path);
		$output = '';

		if( isset($_POST['action_cancel']))
		{
			unset($_POST);
		}

		$submit_action = 'show'; // default action
		$submit_action = ( isset($_POST['action_cancel']) ? 'cancel' : $submit_action );
		$submit_action = ( isset($_POST['action_delete']) ? 'delete' : $submit_action );
		// $submit_action = ( isset($_POST['action_add'])    ? 'modify' : $submit_action );
		$submit_action = ( isset($_POST['action_modify']) ? 'modify' : $submit_action );
		$submit_action = ( isset($_POST['action_save'])   ? 'save'   : $submit_action );

		$group_id = ( isset($_POST['group_id']) ? intval($_POST['group_id']) :  '0' );

		switch($submit_action) :
			case 'delete': // delete the group
				$admin = new admin('Access', 'groups_delete');
				// $group_id = $admin->checkIDKEY($_POST['group_id']);
				msgQueue::clear();
				include($mod_path.'/delete.inc.php');
				delete_group($admin, $group_id);
				if( ($msg = msgQueue::getSuccess()) != '')
				{
					include($mod_path.'/groups_list.inc.php');
					$output = show_grouplist($admin);
				}
				if( ($msg = msgQueue::getError()) != '')
				{
					include($mod_path.'/groups_list.inc.php');
					$output = show_grouplist($admin);
				}
				break;
			case 'save': // insert/update group
				if( $group_id == 0 )
				{
					$admin = new admin('Access', 'groups_add',false);
				}else {
					$admin = new admin('Access', 'groups_modify',false);
				}
				msgQueue::clear();
				include($mod_path.'/save.inc.php');
				$group_id = save_group($admin, $group_id);
				if(!msgQueue::isEmpty())
				{
				}
				if( ($msg = msgQueue::getSuccess()) != '')
				{
					include($mod_path.'/groups_list.inc.php');
					$output = show_grouplist($admin);
				}
				if( ($msg = msgQueue::getError()) != '')
				{
					// $group_id = $admin->checkIDKEY($_POST['group_id']);
					include($mod_path.'/groups_mask.inc.php');
					$output = show_groupmask($admin, $group_id);
				}
				break;
			case 'modify': // insert/update group
				$admin = new admin('Access', 'groups');
				msgQueue::clear();
				if( ($group_id != 1 ) && ($admin->get_permission('groups')) )
				{
					// $group_id = $admin->checkIDKEY($_POST['group_id']);
					include($mod_path.'/groups_mask.inc.php');
					$output = show_groupmask($admin, $group_id);
				} else {
					include($mod_path.'/groups_list.inc.php');
					$output  = show_grouplist($admin, $group_id);
				}
				break;
			default: // show grouplist with empty modify mask
				$admin = new admin('Access', 'groups');
				$group_id = isset($_POST['group_id']) ? (int)$_POST['group_id'] : 0;
				msgQueue::clear();
				if($group_id > 1) // prevent 'admin' [ID 1] from modify
				{
					// $group_id = $admin->checkIDKEY($_POST['group_id']);
					include($mod_path.'/groups_mask.inc.php');
					$output .= show_groupmask($admin, $group_id);
				}else { // if invalid GroupID is called, fall back to 'show-mode'
					include($mod_path.'/groups_list.inc.php');
					$output  = show_grouplist($admin);
				}
		endswitch; // end of switch

		if(!msgQueue::isEmpty())
		{
		}
		if( ($msg = msgQueue::getSuccess()) != '')
		{
			$output = $admin->format_message($msg, 'ok').$output;
		}
		if( ($msg = msgQueue::getError()) != '')
		{
			$output = $admin->format_message($msg, 'error').$output;
		}
		print $output;
		$admin->print_footer();
	}
	// start dispatcher maintenance
	if(!defined('WB_PATH'))
	{
		require('../../config.php');
		require_once(WB_PATH.'/framework/class.admin.php');
	}
	admin_groups_index();
	exit;
// end of file
