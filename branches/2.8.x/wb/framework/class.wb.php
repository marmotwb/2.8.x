<?php
/**
 *
 * @category        frontend
 * @package         framework
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @version         $Id$
 * @filesource		$HeadURL: http://svn29.websitebaker2.org/trunk/wb/framework/class.wb.php $
 * @lastmodified    $Date: 2010-11-23 00:55:43 +0100 (Di, 23. Nov 2010) $
 *
 */
/*
// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }
*/
// Include PHPLIB template class
require_once(WB_PATH."/include/phplib/template.inc");

require_once(WB_PATH.'/framework/class.database.php');

// Include new wbmailer class (subclass of PHPmailer)
require_once(WB_PATH."/framework/class.wbmailer.php");

require_once(WB_PATH."/framework/SecureForm.php");

class wb extends SecureForm
{

	private $password_chars = 'a-zA-Z0-9\_\-\!\#\*\+';
	// General initialization function
	// performed when frontend or backend is loaded.

	public function wb() {
		parent::__construct();
	}

	// Check whether a page is visible or not.
	// This will check page-visibility and user- and group-rights.
	/* page_is_visible() returns
		false: if page-visibility is 'none' or 'deleted', or page-vis. is 'registered' or 'private' and user isn't allowed to see the page.
		true: if page-visibility is 'public' or 'hidden', or page-vis. is 'registered' or 'private' and user _is_ allowed to see the page.
	*/
	public function page_is_visible($page)
    {
		// First check if visibility is 'none', 'deleted'
		$show_it = false; // shall we show the page?
		switch( $page['visibility'] )
		{
			case 'none':
			case 'deleted':
				$show_it = false;
				break;
			case 'hidden':
			case 'public':
				$show_it = true;
				break;
			case 'private':
			case 'registered':
				if($this->is_authenticated() == true)
				{
					$show_it = ( $this->is_group_match($this->get_groups_id(), $page['viewing_groups']) ||
								 $this->is_group_match($this->get_user_id(), $page['viewing_users']) );
				}
		}

		return($show_it);
	}

	function section_is_active($section_id)
	{
		global $database;
		$now = time();
		$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'sections` ';
		$sql .= 'WHERE ('.$now.' BETWEEN `publ_start` AND `publ_end`) OR ';
		$sql .=       '('.$now.' > `publ_start` AND `publ_end`=0) ';
		$sql .=       'AND `section_id`='.$section_id;
		return ($database->get_one($sql) != false);
	}
	// Check if there is at least one active section on this page
	function page_is_active($page)
    {
		global $database;
		$now = time();
		$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'sections` ';
		$sql .= 'WHERE ('.$now.' BETWEEN `publ_start` AND `publ_end`) OR ';
		$sql .=       '('.$now.' > `publ_start` AND `publ_end`=0) ';
		$sql .=       'AND `page_id`='.(int)$page['page_id'];
		return ($database->get_one($sql) != false);
	}

	// Check whether we should show a page or not (for front-end)
	function show_page($page)
    {
		if( !is_array($page) )
		{
			$sql  = 'SELECT `page_id`, `visibility`, `viewing_groups`, `viewing_users` ';
			$sql .= 'FROM `'.TABLE_PREFIX.'pages` WHERE `page_id`='.(int)$page;
			if( ($res_pages = $database->query($sql))!= null )
			{
				if( !($page = $res_pages->fetchRow()) ) { return false; }
			}
		}
		return ($this->page_is_visible($page) && $this->page_is_active($page));
	}

	// Check if the user is already authenticated or not
	function is_authenticated() {
		if(isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] != "" && is_numeric($_SESSION['USER_ID']))
        {
			return true;
		} else {
			return false;
		}
	}

	// Modified addslashes function which takes into account magic_quotes
	function add_slashes($input) {
		if ( get_magic_quotes_gpc() || ( !is_string($input) ) ) {
			return $input;
		}
		$output = addslashes($input);
		return $output;
	}

	// Ditto for stripslashes
	// Attn: this is _not_ the counterpart to $this->add_slashes() !
	// Use stripslashes() to undo a preliminarily done $this->add_slashes()
	// The purpose of $this->strip_slashes() is to undo the effects of magic_quotes_gpc==On
	function strip_slashes($input) {
		if ( !get_magic_quotes_gpc() || ( !is_string($input) ) ) {
			return $input;
		}
		$output = stripslashes($input);
		return $output;
	}

	// Escape backslashes for use with mySQL LIKE strings
	function escape_backslashes($input) {
		return str_replace("\\","\\\\",$input);
	}

	function page_link($link){
		// Check for :// in the link (used in URL's) as well as mailto:
		if(strstr($link, '://') == '' && substr($link, 0, 7) != 'mailto:') {
			return WB_URL.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
		} else {
			return $link;
		}
	}
	
	// Get POST data
	function get_post($field) {
        return isset($_POST[$field]) ? $_POST[$field] : null;
	}

	// Get POST data and escape it
	function get_post_escaped($field) {
		$result = $this->get_post($field);
		return (is_null($result)) ? null : $this->add_slashes($result);
	}
	
	// Get GET data
	function get_get($field) {
        return isset($_GET[$field]) ? $_GET[$field] : null;
	}

	// Get SESSION data
	function get_session($field) {
        return isset($_SESSION[$field]) ? $_SESSION[$field] : null;
	}

	// Get SERVER data
	function get_server($field) {
        return isset($_SERVER[$field]) ? $_SERVER[$field] : null;
	}

	// Get the current users id
	function get_user_id() {
		return $_SESSION['USER_ID'];
	}

	// Get the current users group id (deprecated)
	function get_group_id() {
		return $_SESSION['GROUP_ID'];
	}

	// Get the current users group ids
	function get_groups_id() {
	    return explode(",", isset($_SESSION['GROUPS_ID']) ? $_SESSION['GROUPS_ID'] : '');
	}

	// Get the current users group name
	function get_group_name() {
		return implode(",", $_SESSION['GROUP_NAME']);
	}

	// Get the current users group name
	function get_groups_name() {
		return $_SESSION['GROUP_NAME'];
	}

	// Get the current users username
	function get_username() {
		return $_SESSION['USERNAME'];
	}

	// Get the current users display name
	function get_display_name() {
		return $_SESSION['DISPLAY_NAME'];
	}

	// Get the current users email address
	function get_email() {
		return $_SESSION['EMAIL'];
	}

	// Get the current users home folder
	function get_home_folder() {
		return $_SESSION['HOME_FOLDER'];
	}

	// Get the current users timezone
	function get_timezone() {
        return  !isset($_SESSION['USE_DEFAULT_TIMEZONE']) ? $_SESSION['TIMEZONE'] : '-72000';
	}

/* ****************
 * check if one or more group_ids are in both group_lists
 *
 * @access public
 * @param mixed $groups_list1: an array or a coma seperated list of group-ids
 * @param mixed $groups_list2: an array or a coma seperated list of group-ids
 * @param array &$matches: an array-var whitch will return possible matches
 * @return bool: true there is a match, otherwise false
 */
	function is_group_match( $groups_list1 = '', $groups_list2 = '', &$matches = null )
	{
		if( $groups_list1 == '' ) { return false; }
		if( $groups_list2 == '' ) { return false; }
		if( !is_array($groups_list1) )
		{
			$groups_list1 = explode(',', $groups_list1);
		}
		if( !is_array($groups_list2) )
		{
			$groups_list2 = explode(',', $groups_list2);
		}
		$matches = array_intersect( $groups_list1, $groups_list2);
		return ( sizeof($matches) != 0 );
	}

/* ****************
 * check if current user is member of at least one of given groups
 * ADMIN (uid=1) always is treated like a member of any groups
 *
 * @access public
 * @param mixed $groups_list: an array or a coma seperated list of group-ids
 * @return bool: true if current user is member of one of this groups, otherwise false
 */
	function ami_group_member( $groups_list = '' )
	{
		if( $this->get_user_id() == 1 ) { return true; }
		return $this->is_group_match( $groups_list, $this->get_groups_id() );
	}

/* ****************
 * check if current user has permissions of at least one of given permissions
 * ADMIN (uid=1) always is treated like a member of any groups
 *
 * @access public
 * @param string $name: a string with the name
 * @param string $type: a string to define system, module or template, default is module
 * @return bool: true if current user has permission of one of this permission, otherwise false
 */
	function has_permission( $name, $type = 'system' )
	{
		if(is_array($name) && is_array($type))
		{
			return sizeof(array_intersect($name, $type));

		} elseif(is_string($name) && is_string($type))
		{
			$type_permissions = $this->get_session(strtoupper($type).'_PERMISSIONS');
			if( ($type == 'system') )
			{
				return is_numeric(array_search($name, $type_permissions));
			} else {
			// Set permissions var
				return !is_numeric(array_search($name, $type_permissions));
			}
		}
		return false;
	}

/* ****************
 * set one or more bit in a integer value
 *
 * @access public
 * @param int $value: reference to the integer, containing the value
 * @param int $bits2set: the bitmask witch shall be added to value
 * @return void
 */
	function bit_set( &$value, $bits2set )
	{
		$value |= $bits2set;
	}

/* ****************
 * reset one or more bit from a integer value
 *
 * @access public
 * @param int $value: reference to the integer, containing the value
 * @param int $bits2reset: the bitmask witch shall be removed from value
 * @return void
 */
	function bit_reset( &$value, $bits2reset)
	{
		$value &= ~$bits2reset;
	}

/* ****************
 * check if one or more bit in a integer value are set
 *
 * @access public
 * @param int $value: reference to the integer, containing the value
 * @param int $bits2set: the bitmask witch shall be added to value
 * @return void
 */
	function bit_isset( $value, $bits2test )
	{
		return (($value & $bits2test) == $bits2test);
	}


	// Validate supplied email address
	function validate_email($email) {
		if(preg_match('/^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$/', $email)) {
		return true;
		} else {
			return false;
		}
	}

	// Print a success message which then automatically redirects the user to another page
	function print_success( $message, $redirect = 'index.php', $auto_footer = true ) {
	    global $TEXT;
	    // add template variables
	    $tpl = new Template( THEME_PATH.'/templates' );
	    $tpl->set_file( 'page', 'success.htt' );
	    $tpl->set_block( 'page', 'main_block', 'main' );
	    $tpl->set_var( 'NEXT', $TEXT['NEXT'] );
	    $tpl->set_var( 'BACK', $TEXT['BACK'] );
 	    $tpl->set_var( 'MESSAGE', $message );
 	    $tpl->set_var( 'THEME_URL', THEME_URL );

	    $tpl->set_block( 'main_block', 'show_redirect_block', 'show_redirect' );
	    $tpl->set_var( 'REDIRECT', $redirect );

	    if (REDIRECT_TIMER == -1)
		{
	        $tpl->set_block( 'show_redirect', '' );
	    } else {
		    $tpl->set_var( 'REDIRECT_TIMER', REDIRECT_TIMER );
	        $tpl->parse( 'show_redirect', 'show_redirect_block', true );
	    }
	    $tpl->parse( 'main', 'main_block', false );
	    $tpl->pparse( 'output', 'page' );
		if ( $auto_footer == true )
		{
			if ( method_exists($this, "print_footer") )
			{
				$this->print_footer();
			}
		}
		exit();
	}

	// Print an error message
	function print_error($message, $link = 'index.php', $auto_footer = true )
	{
		global $TEXT;
		$success_template = new Template(THEME_PATH.'/templates');
		$success_template->set_file('page', 'error.htt');
		$success_template->set_block('page', 'main_block', 'main');
		$success_template->set_var('MESSAGE', $message);
		$success_template->set_var('LINK', $link);
		$success_template->set_var('BACK', $TEXT['BACK']);
 	    $success_template->set_var( 'THEME_URL', THEME_URL );
		$success_template->parse('main', 'main_block', false);
		$success_template->pparse('output', 'page');
		if ( $auto_footer == true ) {
			if ( method_exists($this, "print_footer") ) {
				$this->print_footer();
			}
		}
		exit();
	}
/*
 * @param string $message: the message to format
 * @param string $status:  ('ok' / 'error' / '') status defines the apereance of the box
 * @return string: the html-formatted message (using template 'message.htt')
 */
	public function format_message($message, $status = 'ok')
	{
		$id = uniqid('x');
		$tpl = new Template(THEME_PATH.'/templates');
		$tpl->set_file('page', 'message.htt');
		$tpl->set_block('page', 'main_block', 'main');
		$tpl->set_var('MESSAGE', $message);
 	    $tpl->set_var( 'THEME_URL', THEME_URL );
		$tpl->set_var( 'ID', $id );
		if($status == 'ok' || $status == 'error' || $status = 'warning')
		{
			$tpl->set_var('BOX_STATUS', ' box-'.$status);
		}else
		{
			$tpl->set_var('BOX_STATUS', '');
		}
		$tpl->set_var('STATUS', $status);
		if(!defined('REDIRECT_TIMER') ) { define('REDIRECT_TIMER', -1); }
		$retval = '';
		if( $status != 'error' )
		{
			switch(REDIRECT_TIMER):
				case 0: // do not show message
					unset($tpl);
					break;
				case -1: // show message permanently
					$tpl->parse('main', 'main_block', false);
					$retval = $tpl->finish($tpl->parse('output', 'page', false));
					unset($tpl);
					break;
				default: // hide message after REDIRECTOR_TIMER milliseconds
					$retval = '<script type="text/javascript">/* <![CDATA[ */ function '.$id.'_hide() {'.
							  'document.getElementById(\''.$id.'\').style.display = \'none\';}'.
							  'window.setTimeout(\''.$id.'_hide()\', '.REDIRECT_TIMER.');/* ]]> */ </script>';
					$tpl->parse('main', 'main_block', false);
					$retval = $tpl->finish($tpl->parse('output', 'page', false)).$retval;
					unset($tpl);
			endswitch;
		}else
		{
			$tpl->parse('main', 'main_block', false);
			$retval = $tpl->finish($tpl->parse('output', 'page', false)).$retval;
			unset($tpl);
		}
		return $retval;
	}
/*
 * @param string $type: 'locked'(default)  or 'new'
 * @return void: terminates application
 * @description: 'locked' >> Show maintenance screen and terminate, if system is locked
 *               'new' >> Show 'new site under construction'(former print_under_construction)
 */
	public function ShowMaintainScreen($type = 'locked')
	{
		global $database, $MESSAGE;
		$CHECK_BACK = $MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'];
		$BE_PATIENT = '';
		$LANGUAGE   = strtolower((isset($_SESSION['LANGUAGE']) ? $_SESSION['LANGUAGE'] : LANGUAGE ));

		$show_screen = false;
		if($type == 'locked')
		{
			$curr_user = (intval(isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : 0) ) ;
			if( (defined('SYSTEM_LOCKED') && (int)SYSTEM_LOCKED == 1) && ($curr_user != 1))
			{
				header($_SERVER['SERVER_PROTOCOL'].' 503 Service Unavailable');
	// first kick logged users out of the system
		// delete all remember keys from table 'user' except user_id=1
				$sql  = 'UPDATE `'.TABLE_PREFIX.'users` SET `remember_key`=\'\' ';
				$sql .= 'WHERE `user_id`<>1';
				$database->query($sql);
		// delete remember key-cookie if set
				if (isset($_COOKIE['REMEMBER_KEY'])) {
					setcookie('REMEMBER_KEY', '', time() - 3600, '/');
				}
		// overwrite session array
				$_SESSION = array();
		// delete session cookie if set
				if (ini_get("session.use_cookies")) {
					$params = session_get_cookie_params();
					setcookie(session_name(), '', time() - 42000, $params["path"],
						$params["domain"], $params["secure"], $params["httponly"]
					);
				}
		// delete the session itself
				session_destroy();
				$PAGE_TITLE = $MESSAGE['GENERIC_WEBSITE_LOCKED'];
				$BE_PATIENT = $MESSAGE['GENERIC_BE_PATIENT'];
				$PAGE_ICON  = WB_REL.'/negative';
				$show_screen = true;
			}
		}else
		{
			header($_SERVER['SERVER_PROTOCOL'].' 503 Service Unavailable');
			$PAGE_TITLE = $MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'];
			$PAGE_ICON  = WB_REL.'/positive';
			$show_screen = true;
		}
		if($show_screen)
		{
			if(file_exists(WB_PATH.'/maintenance.php'))
			{
				include(WB_PATH.'/maintenance.php');
			}else
			{
				echo $PAGE_TITLE.'<br />'.$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'];
			}
			flush();
			exit;
		}
	}
	// Validate send email
	function mail($fromaddress, $toaddress, $subject, $message, $fromname='') {
		/*
			INTEGRATED OPEN SOURCE PHPMAILER CLASS FOR SMTP SUPPORT AND MORE
			SOME SERVICE PROVIDERS DO NOT SUPPORT SENDING MAIL VIA PHP AS IT DOES NOT PROVIDE SMTP AUTHENTICATION
			NEW WBMAILER CLASS IS ABLE TO SEND OUT MESSAGES USING SMTP WHICH RESOLVE THESE ISSUE (C. Sommer)

			NOTE:
			To use SMTP for sending out mails, you have to specify the SMTP host of your domain
			via the Settings panel in the backend of Website Baker
		*/ 

		$fromaddress = preg_replace('/[\r\n]/', '', $fromaddress);
		$toaddress = preg_replace('/[\r\n]/', '', $toaddress);
		$subject = preg_replace('/[\r\n]/', '', $subject);
		$message_alt = $message;
		$message = nl2br( str_replace('\r', '', $message) );
		// create PHPMailer object and define default settings
		$myMail = new wbmailer();

		// set user defined from address
		if ($fromaddress!='') {
			if($fromname!='') $myMail->FromName = $fromname;         // FROM-NAME
			$myMail->From = $fromaddress;                            // FROM:
			$myMail->AddReplyTo($fromaddress);                       // REPLY TO:
		}
		
		// define recepient and information to send out
		$myMail->AddAddress($toaddress);                            // TO:
		$myMail->Subject = $subject;                                // SUBJECT
		$myMail->Body = $message;                                   // CONTENT (HTML)
		$myMail->AltBody = strip_tags($message_alt);				// CONTENT (TEXT)
		
		// check if there are any send mail errors, otherwise say successful
		if (!$myMail->Send()) {
			return false;
		} else {
			return true;
		}
	}

}
