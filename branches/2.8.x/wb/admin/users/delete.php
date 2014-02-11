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
function delete_user($admin, $aActionRequest)
{
	$oDb = WbDatabase::getInstance();
	$oTrans = Translate::getInstance();
    $aUserID = array();
    $bRetVal = false;

    $action = 'default';
    $action = (isset($aActionRequest['delete']) ? 'delete' : $action );
    $action = (isset($aActionRequest['delete_outdated']) ? 'delete_outdated'   : $action );
    $action = (isset($aActionRequest['enable_outdated']) ? 'enable_outdated' : $action );

	switch($action) :
		case 'delete': // delete the user
    	    if(isset($aActionRequest['user_id'])) {
    			if(!is_array($aActionRequest['user_id'])) {
    		        $aUserID[] = $aActionRequest['user_id'];
    		    } else {
    		        $aUserID = $aActionRequest['user_id'];
    		    }
    	    }
    		break;
		case 'delete_outdated': // delete Users awaiting activation
            if(isset($aActionRequest['activation_user_id'])) {
        		if(!is_array($aActionRequest['activation_user_id'])) {
        	        $aUserID[] = $aActionRequest['activation_user_id'];
        	    } else {
        	        $aUserID = $aActionRequest['activation_user_id'];
        	    }
            }
    		break;
		case 'enable_outdated': // enable Users awaiting activation
            if(isset($aActionRequest['activation_user_id'])) {
        		if(!is_array($aActionRequest['activation_user_id'])) {
        	        $aUserID[] = $aActionRequest['activation_user_id'];
        	    } else {
        	        $aUserID = $aActionRequest['activation_user_id'];
        	    }
            }
    		break;
		default: // show userlist with empty modify mask
	endswitch; // end of switch

//    if(isset($aActionRequest['activation_user_id'])) {
//		if(!is_array($aActionRequest['activation_user_id'])) {
//
//	        $aUserID[] = $aActionRequest['activation_user_id'];
//	    } else {
//	        $aUserID = $aActionRequest['activation_user_id'];
//	    }
//    } else {
//	    if(isset($aActionRequest['user_id'])) {
//			if(!is_array($aActionRequest['user_id'])) {
//
//		        $aUserID[] = $aActionRequest['user_id'];
//		    } else {
//		        $aUserID = $aActionRequest['user_id'];
//		    }
//	    }
//    }


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
			msgQueue::add($oTrans->MESSAGE_GENERIC_FORGOT_OPTIONS );
            return $bRetVal;
        }

		if( ($user_id < 2 ) )
		{
			// if($admin_header) { $admin->print_header(); }
			msgQueue::add($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS );
            return $bRetVal;
		}

		if( ($msg = msgQueue::getError()) == '')
		{

    	switch($action) :
    		case 'enable_outdated': // enable Users awaiting activation
    			$sql  = 'SELECT `display_name` FROM `'.$oDb->TablePrefix.'users` '.
                        'WHERE `user_id` = '.$user_id;
                if( ($sDisplayUser = $oDb->getOne($sql)) != null ) {
            		$sql = 'UPDATE `'.$oDb->TablePrefix.'users` '
            		     . 'SET `active`=1, '
            		     .     '`confirm_code`=\'\', '
            		     .     '`confirm_timeout`=0 '
            		     . 'WHERE `user_id`='.$user_id;
            		if($oDb->doQuery($sql)) {
                        msgQueue::add($oTrans->MESSAGE_USERS_ADDED.' ('.$sDisplayUser.')', true);
                        $bRetVal = true;
                    } else {
                        msgQueue::add($oTrans->TEXT_ENABLE.$oTrans->MESSAGE_GENERIC_NOT_COMPARE.' ('.$sDisplayUser.')');
                    }
                }
        		break;
    		default: // show userlist with empty modify mask
    			$sql  = 'SELECT `active` FROM `'.$oDb->TablePrefix.'users` '.
                        'WHERE `user_id` = '.$user_id;
                if( ($iDeleteUser = $oDb->getOne($sql)) != null ) {
                    if($iDeleteUser) {
        				// Deactivate the user
            			$sql  = 'UPDATE `'.$oDb->TablePrefix.'users` SET '.
                                '`active` = 0 '.
                                'WHERE `user_id` = '.$user_id;
                        if( $oDb->doQuery($sql) ) {
                            msgQueue::add($oTrans->TEXT_USERS_MARKED_DELETED, true);
                        }
                    } else {


            			$sql  = 'DELETE FROM `'.$oDb->TablePrefix.'users` '.
                                'WHERE `user_id` = '.$user_id;
                        if( $oDb->doQuery($sql) ) {
                            msgQueue::add($oTrans->MESSAGE_USERS_DELETED, true);
                        }
                    }
                    $bRetVal = true;
                }
                if($oDb->isError()) {
                    msgQueue::add( implode('<br />',explode(';',$oDb->getError())) );
                    $bRetVal = false;
               }
    	endswitch; // end of switch
		} // getError
    } // foreach users
    if(isset($aActionRequest['clearmsg'])) { msgQueue::clear();  }
    return $bRetVal;
}

if(!isset($aActionRequest)) {
    $requestMethod = '_'.strtoupper($_SERVER['REQUEST_METHOD']);
    $aActionRequest = (isset(${$requestMethod})) ? ${$requestMethod} : null;
    $aActionRequest['clearmsg'] = true;
}