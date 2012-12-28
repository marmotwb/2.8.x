<?php

/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
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

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */
function delete_user($admin, &$aActionRequest)
{
	global $TEXT, $MESSAGE;
	$database = WbDatabase::getInstance();
    $aUserID = array();
    $bRetVal = false;
    if(isset($aActionRequest['activation_user_id'])) {
		if(!is_array($aActionRequest['activation_user_id'])) {
	
	        $aUserID[] = $aActionRequest['activation_user_id'];
	    } else {
	        $aUserID = $aActionRequest['activation_user_id'];
	    }
    } else {
	    if(isset($aActionRequest['user_id'])) {
			if(!is_array($aActionRequest['user_id'])) {
		
		        $aUserID[] = $aActionRequest['user_id'];
		    } else {
		        $aUserID = $aActionRequest['user_id'];
		    }
	    } 
    } 

    foreach ( $aUserID AS $key => $value)
    {
        switch ($_SERVER['REQUEST_METHOD']) :
			case 'GET': // insert/update user
                $_GET['user_id'] =$aUserID[$key];
				break;
			default: // show userlist with empty modify mask
                $_POST['user_id'] =$aUserID[$key];
		endswitch; // end of switch
		$user_id = intval($admin->checkIDKEY('user_id', 0, $_SERVER['REQUEST_METHOD']));

		// Check if user id is a valid number and doesnt equal 1
		if($user_id == 0){
			msgQueue::add($MESSAGE['GENERIC_FORGOT_OPTIONS'] );
            return $bRetVal;
        }

		if( ($user_id < 2 ) )
		{
			// if($admin_header) { $admin->print_header(); }
			msgQueue::add($MESSAGE['GENERIC_SECURITY_ACCESS'] );
            return $bRetVal;
		}

		if( ($msg = msgQueue::getError()) == '')
		{
			$sql  = 'SELECT `active` FROM `'.TABLE_PREFIX.'users` '.
                    'WHERE `user_id` = '.$user_id;
            if( ($iDeleteUser = $database->get_one($sql)) != null ) {
                if($iDeleteUser) {
    				// Delete the user
        			$sql  = 'UPDATE `'.TABLE_PREFIX.'users` SET '.
                            '`active` = 0 '.
                            'WHERE `user_id` = '.$user_id;
                    if( $database->query($sql) ) {
                        msgQueue::add($TEXT['USERS_DELETED'], true);
                    }
                } else {
        			$sql  = 'DELETE FROM `'.TABLE_PREFIX.'users` '.
                            'WHERE `user_id` = '.$user_id;
                    if( $database->query($sql) ) {
                        msgQueue::add($MESSAGE['USERS_DELETED'], true);
                    }
                }
                $bRetVal = true;
            }
            if($database->is_error()) {
                msgQueue::add( implode('<br />',explode(';',$database->get_error())) );
                $bRetVal = false;
           }
		}
    }
    if(isset($aActionRequest['clearmsg'])) { msgQueue::clear();  }
    return $bRetVal;
}

if(!isset($aActionRequest)) {
    $requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
    $aActionRequest = (isset(${$requestMethod})) ? ${$requestMethod} : null;
    $aActionRequest['clearmsg'] = true;
}
