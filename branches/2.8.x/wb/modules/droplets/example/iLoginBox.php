//:Puts a Login / Logout box on your page.
//:Use: [[iLoginBox?redirect=url]]
//:Absolute or relative url possible
//:Remember to enable frontend login in your website settings.

	$mLang = Translate::getinstance();
	if( !(isset($wb) && is_object($wb)) ) { $wb = new frontend(); }
	if( !(isset($admin) && is_object($admin)) ) { $admin= new admin('##skip##'); }

	$return_value = '<div class="login-box">'."\n";
	$return_admin = ' ';
// Get redirect
	$redirect_url = ((isset($_SESSION['HTTP_REFERER']) && $_SESSION['HTTP_REFERER'] != '') ? $_SESSION['HTTP_REFERER'] : WB_URL );
	$redirect_url = (isset($redirect) && ($redirect!='') ? $redirect : $redirect_url);

	if ( ( FRONTEND_LOGIN == 'enabled') &&
		    ( VISIBILITY != 'private') &&
		        ( $wb->get_session('USER_ID') == '')  )
	{
		$return_value .= '<form action="'.LOGIN_URL.'" method="post">'."\n";
		$return_value .= '<input type="hidden" name="redirect" value="'.$redirect_url.'" />'."\n";

		$return_value .= '<fieldset>'."\n";
		$return_value .= '<h1>'.$mLang->TEXT_LOGIN.'</h1>'."\n";
		$return_value .= '<label for="username">'.$mLang->TEXT_USERNAME.':</label>'."\n";
		$return_value .= '<p><input type="text" name="username" id="username"  /></p>'."\n";
		$return_value .= '<label for="password">'.$mLang->TEXT_PASSWORD.':</label>'."\n";
		$return_value .= '<p><input type="password" name="password" id="password"/></p>'."\n";
		$return_value .= '<p><input type="submit" id="submit" value="'.$mLang->TEXT_LOGIN.'" class="dbutton" /></p>'."\n";
		$return_value .= '<ul class="login-advance">'."\n";
		$return_value .= '<li class="forgot"><a href="'.FORGOT_URL.'"><span>'.$mLang->TEXT_FORGOT_DETAILS.'</span></a></li>'."\n";

		if (intval(FRONTEND_SIGNUP) > 0)
		{
			$return_value .= '<li class="sign"><a href="'.SIGNUP_URL.'">'.$mLang->TEXT_SIGNUP.'</a></li>'."\n";
		}
		$return_value .= '</ul>'."\n";
		$return_value .= '</fieldset>'."\n";
		$return_value .= '</form>'."\n";

	} elseif( (FRONTEND_LOGIN == true) &&
				(is_numeric($wb->get_session('USER_ID'))) )
	{
		$return_value .= '<form action="'.LOGOUT_URL.'" method="post" class="login-table">'."\n";
		$return_value .= '<fieldset>'."\n";
		$return_value .= '<h1>'.$mLang->TEXT_LOGGED_IN.'</h1>'."\n";
		$return_value .= '<label>'.$mLang->TEXT_WELCOME_BACK.', '.$wb->get_display_name().'</label>'."\n";
		$return_value .= '<p><input type="submit" name="submit" value="'.$mLang->MENU_LOGOUT.'" class="dbutton" /></p>'."\n";
		$return_value .= '<ul class="logout-advance">'."\n";
		if ($wb->ami_group_member('1')||$admin->get_permission('preferences'))
		{
			$return_value .= '<li class="preference"><a href="'.PREFERENCES_URL.'" title="'.$mLang->MENU_PREFERENCES.'">'.$mLang->MENU_PREFERENCES.'</a></li>'."\n";
		}

		//change ot the group that should get special links
		if ($wb->ami_group_member('1')||$admin->get_permission('admintools'))
		{
			$return_admin .= '<li class="admin"><a target="_blank" href="'.ADMIN_URL.'/index.php" title="'.$mLang->TEXT_ADMINISTRATION.'" class="blank_target">'.$mLang->TEXT_ADMINISTRATION.'</a></li>'."\n";
			//you can add more links for your users like userpage, lastchangedpages or something
			//$return_value .= $return_admin;
		}
		//change ot the group that should get special links
		if( $admin->get_permission('pages_modify') && $admin->get_page_permission( PAGE_ID ) )
		{
			$return_value .= '<li class="modify"><a target="_blank" href="'.ADMIN_URL.'/pages/modify.php?page_id='.$wb->page_id.'" title="'.$mLang->HEADING_MODIFY_PAGE.'" class="blank_target">'.$mLang->HEADING_MODIFY_PAGE.'</a></li>'."\n";
		}
		$return_value .= '<li>&nbsp;'.'</li>'."\n";
		$return_value .= '</ul>'."\n";
		$return_value .= '</fieldset>'."\n";
		$return_value .= '</form>'."\n";
	}
	$return_value .= '</div>'."\n";
	return $return_value;
