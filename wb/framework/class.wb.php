<?php
/**
 *
 * @category        framework
 * @package         frontend
 * @copyright       WebsiteBaker Org. e.V.
 * @author          Ryan Djurovich (2004-2009)
 * @author          Dietmar Wöllbrink (luisehahne)
 * @author          M.v.d.Decken (DarkViper)
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(__FILE__).'/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */
// Include PHPLIB template class
if(!class_exists('Template', false)){ include(WB_PATH.'/include/phplib/template.inc'); }

class wb extends SecureForm
{
/** @var object instance of the database object */
	protected $_oDb      = null;
/** @var object instance holds several values from the application global scope */
	protected $_oReg     = null;
/** @var object instance holds all of the translations */
	protected $_oTrans   = null;

 	public $password_chars = 'a-zA-Z0-9\_\-\!\#\*\+\@\$\&\:';	// General initialization function

	// performed when frontend or backend is loaded.
	public function  __construct($mode = SecureForm::FRONTEND) {
		parent::__construct($mode);

		$this->_oDb    = WbDatabase::getInstance();
		$this->_oReg   = WbAdaptor::getInstance();
		$this->_oTrans = Translate::getInstance();
	}

/**
 *
 *
 * @return object instance of the database object of all visible languages with defined fields
 *
 */
	public function getAvailableLanguagesObjectInstance( ) {

			$sql = 'SELECT `directory`,`name` '
			     . 'FROM `'.$this->_oDb->TablePrefix.'addons` '
		         . 'WHERE `type` = \'language\' '
		         . 'ORDER BY `directory`';
        return ($this->_oDb->query($sql));
	}


/**
 *
 *
 * @return array of all visible languages with defined fields
 *
 */
	public function getAvailableLanguages( ) {
        $aRetval = array();
        if($oRes = $this->getAvailableLanguagesObjectInstance())
        {
            while($aRow = $oRes->fetchRow(MYSQL_ASSOC))
            {
                $aRetval[$aRow['directory']] = $aRow['name'];
            }
        }
        
        return ( $aRetval);
	}

/**
 *
 *
 * @return array of first visible language pages with defined fields
 *
 */
	public function getLanguagesDetailsInUsed ( ) {
//        global $database;
        $aRetval = array();
		$sql = 'SELECT DISTINCT `language`, `page_id`, `level`, `parent`, `root_parent`, '
			 .                 '`page_code`, `link`, `language`, `visibility`, '
			 .                 '`viewing_groups`,`viewing_users`,`position` '
			 . 'FROM `'.$this->_oDb->TablePrefix.'pages` '
			 . 'WHERE `level`= \'0\' '
			 .       'AND `root_parent`=`page_id` '
			 .       'AND `visibility`!=\'none\' '
			 .       'AND `visibility`!=\'hidden\' '
			 . 'GROUP BY `language` '
			 . 'ORDER BY `position`';
        if($oRes = $this->_oDb->query($sql))
        {
            while($aRow = $oRes->fetchRow(MYSQL_ASSOC))
            {
                if(!$this->page_is_visible($aRow)) {continue;}
                $aRetval[$aRow['language']] = $aRow;
            }
        }
        return $aRetval;
	}




/**
 *
 *
 * @return comma separate list of first visible languages
 *
 */
	public function getLanguagesInUsed ( ) {
        $aRetval = array_keys($this->getLanguagesDetailsInUsed()) ;
        if(sizeof($aRetval)==0) { return null; }
        return implode(',', $aRetval);
  	}


    /**
     * Created parse_url utf-8 compatible function
     * 
     * @param string $url The string to decode
     * @return array Associative array containing the different components
     * 
     */
		public function mb_parse_url($url) {
		$encodedUrl = preg_replace_callback('%[^:/?#&=\.]+%usD',
		              create_function('$aMatches', ';return urlencode($aMatches[0]);'),
/*		                           'urlencode(\'$0\')', */
		                           $url);
		$components = parse_url($encodedUrl);
		foreach ($components as &$component)
			$component = urldecode($component);
return $components;
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
	public function is_group_match( $groups_list1 = '', $groups_list2 = '', &$matches = null )
	{
		if( $groups_list1 == '' ) { return false; }
		if( $groups_list2 == '' ) { return false; }
		if( !is_array($groups_list1) ) {
			$groups_list1 = explode(',', $groups_list1);
		}
		if( !is_array($groups_list2) ) {
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
	public function ami_group_member( $groups_list = '' )
	{
		if( $this->get_user_id() == 1 ) { return true; }
		return $this->is_group_match( $groups_list, $this->get_groups_id() );
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

	// Check if there is at least one active section on this page
	public function page_is_active($page)
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
	public function show_page($page)
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
	public function is_authenticated() {
		$retval = ( isset($_SESSION['USER_ID']) AND
		            $_SESSION['USER_ID'] != "" AND
		            is_numeric($_SESSION['USER_ID']));
        return $retval;
	}

	// Modified addslashes function which takes into account magic_quotes
	function add_slashes($input) {
		if( get_magic_quotes_gpc() || (!is_string($input)) ) {
			return $input;
		}
		return addslashes($input);
	}

	// Ditto for stripslashes
	// Attn: this is _not_ the counterpart to $this->add_slashes() !
	// Use stripslashes() to undo a preliminarily done $this->add_slashes()
	// The purpose of $this->strip_slashes() is to undo the effects of magic_quotes_gpc==On
	function strip_slashes($input) {
		if ( !get_magic_quotes_gpc() || ( !is_string($input) ) ) {
			return $input;
		}
		return stripslashes($input);
	}

	// Escape backslashes for use with mySQL LIKE strings
	function escape_backslashes($input) {
		return str_replace("\\","\\\\",$input);
	}

	function page_link($link){
		// Check for :// in the link (used in URL's) as well as mailto:
		if(strstr($link, '://') == '' AND substr($link, 0, 7) != 'mailto:') {
			return WB_URL.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
		} else {
			return $link;
		}
	}

	// Get POST data
	function get_post($field) {
		return (isset($_POST[$field]) ? $_POST[$field] : null);
	}

	// Get POST data and escape it
	function get_post_escaped($field) {
		$result = $this->get_post($field);
		return (is_null($result)) ? null : $this->add_slashes($result);
	}

	// Get GET data
	function get_get($field) {
		return (isset($_GET[$field]) ? $_GET[$field] : null);
	}

	// Get SESSION data
	function get_session($field) {
		return (isset($_SESSION[$field]) ? $_SESSION[$field] : null);
	}

	// Get SERVER data
	function get_server($field) {
		return (isset($_SERVER[$field]) ? $_SERVER[$field] : null);
	}

	// Get the current users id
	function get_user_id() {
		return $this->get_session('USER_ID');
	}

	// Get the current users group id
	function get_group_id() {
		return $this->get_session('GROUP_ID');
	}

	// Get the current users group ids
	function get_groups_id() {
		return explode(",", $this->get_session('GROUPS_ID'));
	}

	// Get the current users group name
	function get_group_name() {
		return implode(",", $this->get_session('GROUP_NAME'));
	}

	// Get the current users group name
	function get_groups_name() {
		return $this->get_session('GROUP_NAME');
	}

	// Get the current users username
	function get_username() {
		return $this->get_session('USERNAME');
	}

	// Get the current users display name
	function get_display_name() {
		return $this->get_session('DISPLAY_NAME');
	}

	// Get the current users email address
	function get_email() {
		return $this->get_session('EMAIL');
	}

	// Get the current users home folder
	function get_home_folder() {
		return $this->get_session('HOME_FOLDER');
	}

	// Get the current users timezone
	function get_timezone() {
		
		return (isset($_SESSION['USE_DEFAULT_TIMEZONE']) ? '-72000' : $this->get_session('TIMEZONE'));
	}

	// Validate supplied email address
	function validate_email($email) {
		if(function_exists('idn_to_ascii')){ /* use pear if available */
			$email = idn_to_ascii($email);
		}else {
			require_once(WB_PATH.'/include/idna_convert/idna_convert.class.php');
			$IDN = new idna_convert();
			$email = $IDN->encode($email);
			unset($IDN);
		}
		// regex from NorHei 2011-01-11
		$retval = preg_match("/^((([!#$%&'*+\\-\/\=?^_`{|}~\w])|([!#$%&'*+\\-\/\=?^_`{|}~\w][!#$%&'*+\\-\/\=?^_`{|}~\.\w]{0,}[!#$%&'*+\\-\/\=?^_`{|}~\w]))[@]\w+(([-.]|\-\-)\w+)*\.\w+(([-.]|\-\-)\w+)*)$/", $email);
		return ($retval != false);
	}

	/**
     * replace header('Location:...  with new method
	 * if header send failed you get a manuell redirected link, so script don't break
	 *
	 * @param string $location, redirected url
	 * @return void
	 */
	public function send_header ($location) {
		if(!headers_sent()) {
			header('Location: '.$location);
		    exit(0);
		} else {
//			$aDebugBacktrace = debug_backtrace();
//			array_walk( $aDebugBacktrace, create_function( '$a,$b', 'print "<br /><b>". basename( $a[\'file\'] ). "</b> &nbsp; <font color=\"red\">{$a[\'line\']}</font> &nbsp; <font color=\"green\">{$a[\'function\']} ()</font> &nbsp; -- ". dirname( $a[\'file\'] ). "/";' ) );
		    $msg =  "<div style=\"text-align:center;\"><h2>An error has occurred</h2><p>The <strong>Redirect</strong> could not be start automatically.\n" .
		         "Please click <a style=\"font-weight:bold;\" " .
		         "href=\"".$location."\">on this link</a> to continue!</p></div>\n";

			throw new AppException($msg);
		}
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

	// Print a success message which then automatically redirects the user to another page
	function print_success( $message, $redirect = 'index.php' ) {
		$oTrans = Translate::getInstance();
		$oTrans->disableAddon();
        if(is_array($message)) {
           $message = implode ('<br />',$message);
        }
	    // fetch redirect timer for sucess messages from settings table
	    $redirect_timer = ((defined( 'REDIRECT_TIMER' )) && (REDIRECT_TIMER <= 10000)) ? REDIRECT_TIMER : 0;
	    // add template variables
		// Setup template object, parse vars to it, then parse it
		$tpl = new Template(dirname($this->correct_theme_source('success.htt')));
	    $tpl->set_file( 'page', 'success.htt' );
	    $tpl->set_block( 'page', 'main_block', 'main' );
	    $tpl->set_block( 'main_block', 'show_redirect_block', 'show_redirect' );
	    $tpl->set_var( 'MESSAGE', $message );
	    $tpl->set_var( 'REDIRECT', $redirect );
	    $tpl->set_var( 'REDIRECT_TIMER', $redirect_timer );
	    $tpl->set_var( 'NEXT', $oTrans->TEXT_NEXT);
	    $tpl->set_var( 'BACK', $oTrans->TEXT_BACK);
	    if ($redirect_timer == -1) {
	        $tpl->set_block( 'show_redirect', '' );
	    }
	    else {
	        $tpl->parse( 'show_redirect', 'show_redirect_block', true );
	    }
	    $tpl->parse( 'main', 'main_block', false );
	    $tpl->pparse( 'output', 'page' );
	}

	// Print an error message
	function print_error($message, $link = 'index.php', $auto_footer = true) {
		$oTrans = Translate::getInstance();
		$oTrans->disableAddon();
        if(is_array($message)) {
           $message = implode ('<br />',$message);
        }
		// Setup template object, parse vars to it, then parse it
		$success_template = new Template(dirname($this->correct_theme_source('error.htt')));
		$success_template->set_file('page', 'error.htt');
		$success_template->set_block('page', 'main_block', 'main');
		$success_template->set_var('MESSAGE', $message);
		$success_template->set_var('LINK', $link);
		$success_template->set_var('BACK', $oTrans->TEXT_BACK);
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
		$tpl = new Template(dirname($this->correct_theme_source('message.htt')));
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
		$LANGUAGE   = strtolower((isset($_SESSION['LANGUAGE']) ? $_SESSION['LANGUAGE'] : LANGUAGE ));
		$PAGE_TITLE = $MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'];
		$PAGE_ICON  = 'negative';
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
				$PAGE_ICON  = 'system';
				$show_screen = true;
			}
		} else {
			header($_SERVER['SERVER_PROTOCOL'].' 503 Service Unavailable');
			$show_screen = true;
		}
		if($show_screen)
		{
            $sMaintanceFile = $this->correct_theme_source('maintenance.htt');
    		if(file_exists($sMaintanceFile))
    		{
                $tpl = new Template(dirname( $sMaintanceFile ));
    		    $tpl->set_file( 'page', 'maintenance.htt' );
    		    $tpl->set_block( 'page', 'main_block', 'main' );

    			if(defined('DEFAULT_CHARSET'))
    			{
    				$charset=DEFAULT_CHARSET;
    			} else {
    				$charset='utf-8';
    			}
    		    $tpl->set_var( 'PAGE_TITLE', $PAGE_TITLE );
    	 	    $tpl->set_var( 'CHECK_BACK', $MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] );
    	 	    $tpl->set_var( 'CHARSET', $charset );
    	 	    $tpl->set_var( 'WB_URL', WB_URL );
    	 	    $tpl->set_var( 'BE_PATIENT', $MESSAGE['GENERIC_BE_PATIENT'] );
    	 	    $tpl->set_var( 'THEME_URL', THEME_URL );
    			$tpl->set_var( 'PAGE_ICON', $PAGE_ICON);
    			$tpl->set_var( 'LANGUAGE', $LANGUAGE);
    		    $tpl->parse( 'main', 'main_block', false );
    		    $tpl->pparse( 'output', 'page' );
                exit();
    		} else {
    		 require_once(WB_PATH.'/languages/'.DEFAULT_LANGUAGE.'.php');
    		echo '<!DOCTYPE html PUBLIC "-W3CDTD XHTML 1.0 TransitionalEN" "http:www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    		<head><title>'.$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'].'</title>
    		<style type="text/css"><!-- body{ font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px; background-image: url("'.WB_URL.'/templates/'.DEFAULT_THEME.'/images/background.png");background-repeat: repeat-x; background-color: #A8BCCB; text-align: center; }
    		h1 { margin: 0; padding: 0; font-size: 18px; color: #000; text-transform: uppercase;}--></style></head><body>
    		<br /><h1>'.$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'].'</h1><br />
    		'.$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'].'</body></html>';
    		}
    		flush();
            exit();
		}
	}

	// Validate send email
	function mail($fromaddress, $toaddress, $subject, $message, $fromname='', $replyTo='') {
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
		$replyTo = preg_replace('/[\r\n]/', '', $replyTo);
		// $message_alt = $message;
		// $message = preg_replace('/[\r\n]/', '<br \>', $message);

		// create PHPMailer object and define default settings
		$myMail = new WbMailer();
		// set user defined from address
		if ($fromaddress!='') {
			if($fromname!='') $myMail->FromName = $fromname;  // FROM-NAME
			$myMail->From = $fromaddress;                     // FROM:
//			$myMail->AddReplyTo($fromaddress);                // REPLY TO:
		}
		if($replyTo) {
			$myMail->AddReplyTo($replyTo);                // REPLY TO:
		}
		// define recepient and information to send out
		$myMail->AddAddress($toaddress);                      // TO:
		$myMail->Subject = $subject;                          // SUBJECT
		$myMail->Body = nl2br($message);                      // CONTENT (HTML)
		$myMail->AltBody = strip_tags($message);              // CONTENT (TEXT)
		// check if there are any send mail errors, otherwise say successful
		if (!$myMail->Send()) {
            if (DEBUG) { msgQueue::add('PHPMailer Error: '.$myMail->ErrorInfo); }
			return false;
		} else {
			return true;
		}
	}

/**
 * checks if there is an alternative Theme template
 *
 * @param string $sThemeFile set the template.htt
 * @return string the relative theme path
 *
 */
        function correct_theme_source($sThemeFile = 'start.htt') {
		$sRetval = $sThemeFile;
		if (file_exists(THEME_PATH.'/templates/'.$sThemeFile )) {
			$sRetval = THEME_PATH.'/templates/'.$sThemeFile;
		} else {
			if (file_exists(ADMIN_PATH.'/skel/themes/htt/'.$sThemeFile ) ) {
			$sRetval = ADMIN_PATH.'/skel/themes/htt/'.$sThemeFile;
			} else {
				throw new InvalidArgumentException('missing template file '.$sThemeFile);
			}
		}
		return $sRetval;
        }

/**
 * Check if a foldername doesn't have invalid characters
 *
 * @param String $str to check
 * @return Bool
 */
	function checkFolderName($str){
		return !( preg_match('#\^|\\\|\/|\.|\?|\*|"|\'|\<|\>|\:|\|#i', $str) ? TRUE : FALSE );
	}

/**
 * Check the given path to make sure current path is within given basedir
 * normally document root
 *
 * @param String $sCurrentPath
 * @param String $sBaseDir
 * @return $sCurrentPath or FALSE
 */
	function checkpath($sCurrentPath, $sBaseDir = WB_PATH){
		// Clean the cuurent path
        $sCurrentPath = rawurldecode($sCurrentPath);
        $sCurrentPath = realpath($sCurrentPath);
        $sBaseDir = realpath($sBaseDir);
		// $sBaseDir needs to exist in the $sCurrentPath
		$pos = stripos ($sCurrentPath, $sBaseDir );

		if ( $pos === FALSE ){
			return false;
		} elseif( $pos == 0 ) {
			return $sCurrentPath;
		} else {
			return false;
		}
	}

/**
 * remove <?php code ?>, [[text]], link, script, scriptblock and styleblock from a given string
 * and return the cleaned string
 *
 * @param string $sValue
 * @returns
 *    false: if @param is not a string
 *    string: cleaned string
 */
	public function StripCodeFromText($sValue, $bPHPCode=false){
        if(!is_string($sValue)) { return false; }
        $sValue = ( ($bPHPCode==true) ? preg_replace ('/\[\[.*?\]\]\s*?|<\?php\s+.*\?>\s*?/isU', '', $sValue ) : $sValue );
        $sPattern = '/\[\[.*?\]\]\s*?|<!--\s+.*?-->\s*?|<(script|link|style)[^>]*\/>\s*?|<(script|link|style)[^>]*?>.*?<\/\2>\s*?|\s*$/isU';
        return (preg_replace ($sPattern, '', $sValue));
	}

/**
 * ReplaceAbsoluteMediaUrl
 * @param string $sContent
 * @return string
 * @description Replace URLs witch are pointing into MEDIA_DIRECTORY with an URL 
 *              independend placeholder
 */
	public function ReplaceAbsoluteMediaUrl($sContent){
        $oReg = WbAdaptor::getInstance();
		if(ini_get('magic_quotes_gpc')==true){
			$sContent = $this->strip_slashes($sContent);
		}
		if(is_string($sContent)) {
			$aSearchfor = array('@(<[^>]*=\s*")('.preg_quote($oReg->AppUrl.$oReg->MediaDir).')([^">]*".*>)@siU',
			                    '@(<[^>]*=\s*")('.preg_quote($oReg->AppUrl).')([^">]*".*>)@siU');
			$aReplacements = array('$1{SYSVAR:AppUrl.MediaDir}$3',
			                       '$1{SYSVAR:AppUrl}$3');
			$sContent = preg_replace($aSearchfor, $aReplacements, $sContent );
		}
		return $sContent;
	}

	
	
}
