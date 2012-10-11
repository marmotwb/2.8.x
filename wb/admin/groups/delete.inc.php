<?php
/**
 * @category        admin
 * @package         groups
 * @author          Independend-Software-Team
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description     all basic actions of this module, called by dispatcher only.
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

/* *****************************************************************************
 * Delete an existing group and remove existing group in user
 * @access public
 * @param object $admin: admin-object
 * @param int $group_id: ID from group to delete
 * @return bool: true or false
 */
	function delete_group($admin, $group_id = 0)
	{
		global $MESSAGE;
		$database = WbDatabase::getInstance();
	// first check form-tan
		if($admin->checkFTAN())
		{
			if($group_id > 1) // prevent admin [ID 1] from being deleted
			{
				$sql = 'SELECT `name` FROM `'.TABLE_PREFIX.'groups` WHERE `group_id` = '.$group_id;
				$groupname = ($database->get_one($sql));
				// $sql  = 'SELECT * FROM `'.TABLE_PREFIX.'groups` ';
				$sql  = 'DELETE FROM `'.TABLE_PREFIX.'groups` ';
				$sql .= 'WHERE `group_id` = '.$group_id;
				if($database->query($sql) != false)
				{
	// remove group from users groups_id
					msgQueue :: add($MESSAGE['GROUPS_DELETED'],true);
					$sql = 'SELECT `user_id`, `groups_id`, `home_folder` FROM `'.TABLE_PREFIX.'users` WHERE user_id != 1';
					if(($res_users = $database->query($sql)) && ($res_users->numRows() > 0) )
					{
						while($rec_users = $res_users->fetchRow(MYSQL_ASSOC))
						{
							$user_id = $rec_users['user_id'];
                            $groups_id = explode(',',$rec_users['groups_id']);

							if( is_numeric($x = array_search($group_id, $groups_id)) )
							{
	                            unset($groups_id[$x]);
	                            $groups_id = (sizeof($groups_id) == 0) ? FRONTEND_SIGNUP : implode(',',$groups_id);
                                $groups_id = ( ($groups_id == 1) && (trim($rec_users['home_folder']) != '') ) ? FRONTEND_SIGNUP : $groups_id;
								$sql  = 'UPDATE `'.TABLE_PREFIX.'users` SET ';
								$sql .= '`groups_id` = \''.$groups_id.'\' ';
								$sql .= 'WHERE `user_id` = '.$user_id;
								if( $database->query($sql) )
								{
				                    $sql_info = mysql_info($database->db_handle);
									if(preg_match('/matched: *([1-9][0-9]*)/i', $sql_info) != 1)
									{
										msgQueue :: add($MESSAGE['RECORD_MODIFIED_FAILED']);
									}
								} else {

									msgQueue :: add($database->get_error());
								}
							}
                        }
                    }
					// $admin->print_success($msg);
				} else {
					msgQueue :: add($MESSAGE['RECORD_MODIFIED_FAILED']);
				}
			}
		} else {
			msgQueue :: add($MESSAGE['GENERIC_SECURITY_OFFENSE']);
		}
		$admin->print_header();
		return ;
    }
