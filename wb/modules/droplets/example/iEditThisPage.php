//:Puts Edit-Buttons on every page you have rights for. 1=modify page, 2=modify pagesettings, 4=modify sections, or add values to combine buttons.
//:Use: [[iEditThisPage?show=7]]. You can format the appearance using CSS-class 'div.iEditThisPage' in your basic-css file
// @author: Werner von der Decken

	global $wb, $database, $HEADING;
	$returnvalue = '';
	if($wb->is_authenticated() )
	{
		$is_admin = false;
		$page_id = PAGE_ID == 0 ? $wb->default_page_id : PAGE_ID;
		$user_id = $wb->get_user_id();
		$sql = 'SELECT `admin_users`, `admin_groups` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
		if(($rset = $database->query($sql)) != null)
		{
			if(($rec = $rset->fetchRow()) != null)
			{
				$is_admin = ($wb->ami_group_member($rec['admin_groups']) ||
				            ($this->is_group_match($user_id, $rec['admin_users'])) );
			}
		}
		if($is_admin)
		{
			$tpl  = '<a href="'.ADMIN_URL.'/pages/%1$s.php?page_id='.$page_id.'" target="_blank" title="%2$s">';
			$tpl .= '<img src="'.THEME_URL.'/images/%3$s_16.png" alt="%2$s" /></a>';
			$show = ((!isset($show) || $show == '') ? 1 : (int)$show);
			$show = ($show > 7 ? 7 : (int)$show);
			$show = ($show < 2 ? 1 : (int)$show );
			if($show & 1)
			{
				$returnvalue .= sprintf($tpl, 'modify', $HEADING['MODIFY_PAGE'], 'edit');
			}
			$sys_perm = $wb->get_session('SYSTEM_PERMISSIONS');
			if(@is_array($sys_perm))
			{
				if(($show & 2) && (array_search('pages_settings', $sys_perm)!==false))
				{
					$returnvalue .= sprintf($tpl, 'settings', $HEADING['MODIFY_PAGE_SETTINGS'], 'modify');
				}
				if(($show & 4) && (array_search('pages_modify', $sys_perm)!==false))
				{
					$returnvalue .= sprintf($tpl, 'sections', $HEADING['MANAGE_SECTIONS'], 'sections');
				}
			}
			if($returnvalue != '')
			{
				$returnvalue  = '<div class="iEditThisPage">'.$returnvalue.'</div>';
			}
		}
	}
	return($returnvalue == '' ? true : $returnvalue);
