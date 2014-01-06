<?php
/**
 *
 * @category        admin
 * @package         users
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

    /**
     * checks if a given string is part of a line in a defined file
     * @param string $sString
     * @param string $sListFile
     * @return bool TRUE if at least one match is found, otherwise FALSE
     */
    function findStringInFileList( $sString, $sListFile)
    {
     $aMatch = array();
     if(is_readable($sListFile)) {
      $aList = file($sListFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $aMatch = preg_grep('/'.preg_quote($sString, '/').'/i',$aList);
     }
     return (sizeof($aMatch)>0);
    }

	function admin_users_index($aActionRequest)
	{
		$database = WbDatabase::getInstance();
		$mLang = Translate::getinstance();
		$mLang->enableAddon('admin\users');

        $sAdminPath = dirname(str_replace('\\', '/', __FILE__));
        $sAdminName = basename($sAdminPath);
        $output = '';
        $aActionRequest['requestMethod'] = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
        $action = 'show';
        // Set parameter 'action' as alternative to javascript mechanism
        $action = (isset($aActionRequest['add'])    ? 'add'    : $action );
        $action = (isset($aActionRequest['save'])   ? 'save'   : $action );
        $action = (isset($aActionRequest['save_back']) ? 'save'   : $action );
        $action = (isset($aActionRequest['modify']) ? 'modify' : $action );
        $action = (isset($aActionRequest['delete']) ? 'delete' : $action );
        $action = (isset($aActionRequest['delete_outdated']) ? 'delete_outdated' : $action );
        $action = (isset($aActionRequest['enable_outdated']) ? 'enable_outdated' : $action );

		switch($action) :
			case 'delete': // delete the user
			case 'delete_outdated': // delete Users awaiting activation
			case 'enable_outdated': // enable Users awaiting activation
    			$admin = new admin('Access', 'users_delete',false);
				include($sAdminPath.'/delete.php');
    			delete_user($admin,$aActionRequest);
                $aActionRequest['cancel_url'] = ADMIN_URL.'/access/index.php';
				$admin = new admin('Access', 'users');
				include($sAdminPath.'/user_list.php');
				$output .= show_userlist($admin, $aActionRequest);
				break;
			case 'add': // insert/update user
                $admin = new admin('Access', 'users_add',false);
				include($sAdminPath.'/add.php');
    			add_user($admin,$aActionRequest);
                $aActionRequest['cancel_url'] = ADMIN_URL.'/access/index.php';
				$admin = new admin('Access', 'users');
				include($sAdminPath.'/user_list.php');
				$output .= show_userlist($admin, $aActionRequest);
				break;
			case 'save': // insert/update user
    			$admin = new admin('Access', 'users_modify',false);
// hold the cancel_url if request comes outside from users
                if(isset($aActionRequest['BackLink'])) {
                    $sBackLink = $aActionRequest['BackLink'];
                    $aActionRequest['cancel_url'] = $sBackLink;
                    $aActionRequest['BackLink'] = $sBackLink;
                }
     			include($sAdminPath.'/save.php');
                $user_id = save_user($admin, $aActionRequest);
    			$admin = new admin('Access', 'users_modify');
     			include($sAdminPath.'/user_form.php');
                $aActionRequest['user_id'] = $user_id;
    			$output = show_usermask($admin,$aActionRequest);
				break;
			case 'modify': // insert/update user
// first check acess to auth users can change his own preferences
    			$admin = new admin('Preferences', 'preferences_view',false);
    			$user_id = intval($admin->checkIDKEY('user_id', 0, $_SERVER['REQUEST_METHOD']));
// Check if user id is a valid number and doesnt equal 1
                $aActionRequest['user_id'] = $user_id;
    			if($user_id == 0){
    				$admin = new admin('Access', 'users');
    				msgQueue::clear();
        			msgQueue::add($mLang->MESSAGE_GENERIC_FORGOT_OPTIONS );
                    $aActionRequest['user_id'] = $user_id;
                    $aActionRequest['cancel_url'] = ADMIN_URL.'/access/index.php';
					include($sAdminPath.'/user_list.php');
					$output  = show_userlist($admin, $aActionRequest);
    				break;
                }

    			if( ($user_id == $admin->get_user_id() ) )
    			{
                    $sQueryString = (isset($_SERVER['QUERY_STRING'])&& ($_SERVER['QUERY_STRING']!='')) ? $_SERVER['QUERY_STRING'] :  'tool=uaerat';
                    $admin->send_header(ADMIN_URL.'/preferences/index.php?'.$sQueryString);
    			}

    			$admin = new admin('Access', 'users_modify');

    			if( ($user_id < 2 ) )
    			{
    				// if($admin_header) { $admin->print_header(); }
    				msgQueue::add($mLang->MESSAGE_GENERIC_SECURITY_ACCESS );
    			}
                $admin_header = false;
                if(isset($aActionRequest['BackLink'])) {
                    $sBackLink = $aActionRequest['BackLink'];
                    $aActionRequest['cancel_url'] = $sBackLink;
                    $aActionRequest['BackLink']   = $sBackLink;
                } else {
                    $sBackLink = (isset($_SERVER['QUERY_STRING'])&& ($_SERVER['QUERY_STRING']!='')) ? $_SERVER['HTTP_REFERER'].'?'.$_SERVER['QUERY_STRING'] :  $_SERVER['HTTP_REFERER'];
                    $aActionRequest['cancel_url'] = $sBackLink;
                    $aActionRequest['BackLink']   = $sBackLink;
                }
     			include($sAdminPath.'/user_form.php');
    			$output = show_usermask($admin,$aActionRequest);
				break;
			default: // show userlist with empty modify mask
				$admin = new admin('Access', 'users');
				msgQueue::clear();
    			$user_id = intval($admin->checkIDKEY('user_id', 0, $_SERVER['REQUEST_METHOD']));
    			// Check if user id is a valid number and doesnt equal 1
                $aActionRequest['user_id'] = $user_id;
                $aActionRequest['cancel_url'] = ADMIN_URL.'/access/index.php';
				if($user_id > 1) // prevent 'admin' [ID 1] from modify
				{
					include($sAdminPath.'/user_form.php');
					$output .= show_usermask($admin, $aActionRequest);
				} elseif($user_id == 0) { // if invalid UserID is called, fall back to 'show-mode'
					include($sAdminPath.'/user_list.php');
					$output  = show_userlist($admin, $aActionRequest);
				}
		endswitch; // end of switch

		if( ($msg = msgQueue::getSuccess()) != '')
		{
			$output = $admin->format_message($msg, 'ok').$output;
		}
		if( ($msg = msgQueue::getError()) != '')
		{
			$output = $admin->format_message($msg, 'error').$output;
		}

		print $output;
        if( isset($aActionRequest['BackLink']) && isset($aActionRequest['save_back']) ) {
            $sBackLink = $aActionRequest['BackLink'];
echo "<script type=\"text/javascript\">
<!--
// Get the location object
var locationObj = document.location;
// Set the value of the location object
document.location = '$sBackLink';
-->
</script>";
        }
		$admin->print_footer();

    }

	if(!defined('WB_URL'))
	{
        $config_file = realpath('../../config.php');
        if(file_exists($config_file) && !defined('WB_URL'))
        {
        	require($config_file);
        }
    }
    if(!class_exists('admin', false)){ include(WB_PATH.'/framework/class.admin.php'); }

    $requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
    $aActionRequest = (isset(${$requestMethod})) ? ${$requestMethod} : null;

	admin_users_index($aActionRequest);
	exit;
// end of file