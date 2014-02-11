<?php
/**
 * @category        admin
 * @package         groups
 * @author          Independend-Software-Team
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description     all basic actions of this module, called by dispatcher only.
 */

/* *****************************************************************************
 * Delete an existing group and remove existing group in user
 * @access public
 * @param object $admin: admin-object
 * @param int $group_id: ID from group to delete
 * @return bool: true or false
 */
	function delete_group($admin, $iGroupId = 0)
	{
		$oDb = WbDatabase::getInstance();
		$oLang = Translate::getInstance();
  		$oLang->enableAddon('admin\\groups');

	// first check form-tan
		if (!$admin->checkFTAN() || $iGroupId <= 1) {
			msgQueue::add($oLang->MESSAGE_GENERIC_SECURITY_OFFENSE );
		} else {
		// if FTAN is successful checked and not Administrator group is seleced
			$sql = 'SELECT GROUP_CONCAT(`username` ORDER BY `username` SEPARATOR \', \') '
			     . 'FROM `'.$oDb->TablePrefix.'users` '
				 . 'WHERE `groups_id`=\''.(string)$iGroupId.'\'';
			if (($sUsers = $oDb->getOne($sql))) {
			// sorry, this group has users which having this group as the only one group
				msgQueue::add($oLang->MESSAGE_UNABLE_DELETE_GROUP . '<br />' . $sUsers);
			} else {
				$sql = 'UPDATE `'.$oDb->TablePrefix.'users` '
					 . 'SET `groups_id`=TRIM(BOTH \',\' FROM REPLACE(CONCAT(\',\',`groups_id`,\',\'),\','.$iGroupId.',\',\',\')) '
					 . 'WHERE FIND_IN_SET('.$iGroupId.', `groups_id`) AND `user_id`!=1';
			//  remove Group from Users
				$oDb->doQuery($sql);
				$sql = 'SELECT COUNT(*) '
					 . 'FROM `'.$oDb->TablePrefix.'users` '
					 . 'WHERE FIND_IN_SET('.$iGroupId.', `groups_id`) AND `user_id`!=1';
				if ($oDb->getOne($sql)) {
				// the group already has assigned users.
					msgQueue::add($oLang->MESSAGE_RECORD_MODIFIED_FAILED );
				} else {
					$sql = 'DELETE FROM `'.$oDb->TablePrefix.'groups` '
						 . 'WHERE `group_id`='.$iGroupId;
				//  delete the group itself
					$oDb->doQuery($sql);
					msgQueue::add($oLang->MESSAGE_GROUPS_DELETED,true);
				}
			}
		}
		$admin->print_header();
		return ;
    }
