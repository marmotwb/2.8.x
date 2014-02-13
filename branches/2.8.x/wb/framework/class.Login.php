<?php
/**
 *
 * @category        framework
 * @package         backend login
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
if(!defined('WB_PATH')) {
	require_once(dirname(__FILE__).'/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */
define('LOGIN_CLASS_LOADED', true);

// Get WB version
require_once(ADMIN_PATH.'/interface/version.php');

class Login extends admin {
	public function __construct($config_array) {
		// Get language vars
		global $MESSAGE, $database;
		parent::__construct();
		// Get configuration values
		while(list($key, $value) = each($config_array)) {
			$this->{(strtolower($key))} = $value;
		}
		if(!isset($this->redirect_url)) { $this->redirect_url = ''; }
		// Get the supplied username and password
		if ($this->get_post('username_fieldname') != ''){
			$username_fieldname = $this->get_post('username_fieldname');
			$password_fieldname = $this->get_post('password_fieldname');
		} else {
			$username_fieldname = 'username';
			$password_fieldname = 'password';
		}

        if( is_array($this->get_post($username_fieldname) ) ) {
            $_POST[$username_fieldname]=implode(',',$this->get_post($username_fieldname));            
        }
		$this->username = htmlspecialchars (strtolower( $this->get_post($username_fieldname) ), ENT_QUOTES);

        if( is_array($this->get_post($password_fieldname) ) ) {
            $_POST[$password_fieldname]=implode(',',$this->get_post($password_fieldname));            
        }
		$this->password = $this->get_post($password_fieldname);

		// Figure out if the "remember me" option has been checked
		if($this->get_post('remember') == 'true') {
			$this->remember = $this->get_post('remember');
		} else {
			$this->remember = false;
		}
		// Get the length of the supplied username and password
		if($this->get_post($username_fieldname) != '') {
			$this->username_len = strlen($this->username);
			$this->password_len = strlen($this->password);
		}

		$aServerUrl = $this->mb_parse_url(WB_URL);

        $sServerUrl = $_SERVER['SERVER_NAME'];        
        $sServerScheme = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : isset($aServerUrl['scheme']) ? $aServerUrl['scheme'] : ' http';        
        $sServerPath = $_SERVER['SCRIPT_NAME'];        
		// If the url is blank, set it to the default url
		$this->url = $this->get_post('url');
        $aUrl = $this->mb_parse_url( $this->url );
        $this->url = isset($aRedirecthUrl['host']) &&($sServerUrl==$aUrl['host']) ? $this->url:ADMIN_URL.'/start/index.php';        
		if ($this->redirect_url!='') {
            $aRedirecthUrl = $this->mb_parse_url( $this->redirect_url );
            $this->redirect_url = isset($aRedirecthUrl['host']) &&($sServerUrl==$aRedirecthUrl['host']) ? $this->redirect_url:$sServerScheme.'://'.$sServerUrl;        
			$this->url = $this->redirect_url;
		}
		if(strlen($this->url) < 2) {
            $aDefaultUrl = $this->mb_parse_url( $this->default_url );
            $this->default_url = isset($aDefaultUrl['host']) &&($sServerUrl==$aDefaultUrl['host']) ? $this->default_url:$sServerScheme.'://'.$sServerUrl;        
			$this->url = $this->default_url;
		}

		if($this->is_authenticated() == true) {
			// User already logged-in, so redirect to default url
				$this->send_header($this->url);
		} elseif($this->is_remembered() == true) {
			// User has been "remembered"
			// Get the users password
			// $database = new database();
			$sql  = 'SELECT * FROM `'.$this->users_table.'` ';
			$sql .= 'WHERE `user_id`=\''.$this->get_safe_remember_key().'\'';
			$query_details = $database->query($sql);
			$fetch_details = $query_details->fetchRow(MYSQL_ASSOC);
			$this->username = $fetch_details['username'];
			$this->password = $fetch_details['password'];
			// Check if the user exists (authenticate them)
			if($this->authenticate()) {
				// Authentication successful
				$this->send_header($this->url);
			} else {
				$this->message = $MESSAGE['LOGIN_AUTHENTICATION_FAILED'];
				$this->increase_attemps();
			}
		} elseif($this->username == '' AND $this->password == '') {
			$this->message = $MESSAGE['LOGIN_BOTH_BLANK'];
			$this->display_login();
		} elseif($this->username == '') {
			$this->message = $MESSAGE['LOGIN_USERNAME_BLANK'];
			$this->increase_attemps();
		} elseif($this->password == '') {
			$this->message = $MESSAGE['LOGIN_PASSWORD_BLANK'];
			$this->increase_attemps();
		} elseif($this->username_len < $config_array['MIN_USERNAME_LEN']) {
			$this->message = $MESSAGE['LOGIN_USERNAME_TOO_SHORT'];
			$this->increase_attemps();
		} elseif($this->password_len < $config_array['MIN_PASSWORD_LEN']) {
			$this->message = $MESSAGE['LOGIN_PASSWORD_TOO_SHORT'];
			$this->increase_attemps();
		} elseif($this->username_len > $config_array['MAX_USERNAME_LEN']) {
			$this->message = $MESSAGE['LOGIN_USERNAME_TOO_LONG'];
			$this->increase_attemps();
		} elseif($this->password_len > $config_array['MAX_PASSWORD_LEN']) {
			$this->message = $MESSAGE['LOGIN_PASSWORD_TOO_LONG'];
			$this->increase_attemps();
		} else {
			// Check if the user exists (authenticate them)
			$this->password = md5($this->password);
			if($this->authenticate()) {
				// Authentication successful
				$this->send_header($this->url);
			} else {
				$this->message = $MESSAGE['LOGIN_AUTHENTICATION_FAILED'];
				$this->increase_attemps();
			}
		}
	}

	// Authenticate the user (check if they exist in the database)
	function authenticate() {
		global $database;
		// Get user information
		// $database = new database();
		// $query = 'SELECT * FROM `'.$this->users_table.'` WHERE MD5(`username`) = "'.md5($this->username).'" AND `password` = "'.$this->password.'" AND `active` = 1';
 		$loginname = ( preg_match('/[\;\=\&\|\<\> ]/',$this->username) ? '' : $this->username );
		$sql  = 'SELECT * FROM `'.$this->users_table.'` ';
		$sql .= 'WHERE `username`=\''.$loginname.'\' AND `password`=\''.$this->password.'\' AND `active`=1';
		$results = $database->query($sql);
		$results_array = $results->fetchRow(MYSQL_ASSOC);
		$num_rows = $results->numRows();
		if($num_rows == 1) {
			$user_id = $results_array['user_id'];
			$this->user_id = $user_id;
			$_SESSION['USER_ID'] = $user_id;
			$_SESSION['GROUP_ID'] = $results_array['group_id'];
			$_SESSION['GROUPS_ID'] = $results_array['groups_id'];
			$_SESSION['USERNAME'] = $results_array['username'];
			$_SESSION['DISPLAY_NAME'] = $results_array['display_name'];
			$_SESSION['EMAIL'] = $results_array['email'];
			$_SESSION['HOME_FOLDER'] = $results_array['home_folder'];
			// Run remember function if needed
			if($this->remember == true) {
				$this->remember($this->user_id);
			}
			// Set language
			if($results_array['language'] != '') {
				$_SESSION['LANGUAGE'] = $results_array['language'];
			}
			// Set timezone
			if($results_array['timezone'] != '-72000') {
				$_SESSION['TIMEZONE'] = $results_array['timezone'];
			} else {
				// Set a session var so apps can tell user is using default tz
				$_SESSION['USE_DEFAULT_TIMEZONE'] = true;
			}
			// Set date format
			if($results_array['date_format'] != '') {
				$_SESSION['DATE_FORMAT'] = $results_array['date_format'];
			} else {
				// Set a session var so apps can tell user is using default date format
				$_SESSION['USE_DEFAULT_DATE_FORMAT'] = true;
			}
			// Set time format
			if($results_array['time_format'] != '') {
				$_SESSION['TIME_FORMAT'] = $results_array['time_format'];
			} else {
				// Set a session var so apps can tell user is using default time format
				$_SESSION['USE_DEFAULT_TIME_FORMAT'] = true;
			}

			// Get group information
			$_SESSION['SYSTEM_PERMISSIONS'] = array();
			$_SESSION['MODULE_PERMISSIONS'] = array();
			$_SESSION['TEMPLATE_PERMISSIONS'] = array();
			$_SESSION['GROUP_NAME'] = array();

            $aGroupsIds = ((explode(',', $this->get_session('GROUPS_ID'))));
            $bOnlyAdminGroup = $this->ami_group_member('1') && (sizeof($aGroupsIds) == 1);
			$first_group = true;

			foreach ( $aGroupsIds  as $cur_group_id)
            {
				$sql = 'SELECT * FROM `'.$this->groups_table.'` WHERE `group_id`=\''.$cur_group_id.'\'';
				if($results = $database->query($sql)) {
    				$results_array = $results->fetchRow(MYSQL_ASSOC);
    				$_SESSION['GROUP_NAME'][$cur_group_id] = $results_array['name'];
				}

				// Set system permissions
				if( ($results_array['system_permissions'] != '') ) {
                    switch ($cur_group_id) :
                        case 1:
                            if( $this->user_id == 1) {
               					$_SESSION['SYSTEM_PERMISSIONS'] = array_merge($_SESSION['SYSTEM_PERMISSIONS'], explode(',', $results_array['system_permissions']));
                            } else {
                                $_SESSION['SYSTEM_PERMISSIONS'] = explode(',', $results_array['system_permissions']);
                            }

                            break;
                        default:
        					$_SESSION['SYSTEM_PERMISSIONS'] = array_merge($_SESSION['SYSTEM_PERMISSIONS'], explode(',', $results_array['system_permissions']));
                    endswitch;
				}

				// Set module permissions
				if( $results_array['module_permissions'] != '' ) {
					if ($first_group) {
                  	$_SESSION['MODULE_PERMISSIONS'] = explode(',', $results_array['module_permissions']);
                  } else {
                  	$_SESSION['MODULE_PERMISSIONS'] = array_intersect($_SESSION['MODULE_PERMISSIONS'], explode(',', $results_array['module_permissions']));
					}
				}
				// Set template permissions
				if($results_array['template_permissions'] != '') {
					if ($first_group) {
                      	$_SESSION['TEMPLATE_PERMISSIONS'] = explode(',', $results_array['template_permissions']);
                      } else {
                      	$_SESSION['TEMPLATE_PERMISSIONS'] = array_intersect($_SESSION['TEMPLATE_PERMISSIONS'], explode(',', $results_array['template_permissions']));
					}
				}
				$first_group = false;
			}

//            if( $$bOnlyAdminGroup ) {
//    			$_SESSION['MODULE_PERMISSIONS'] = array();
//    			$_SESSION['TEMPLATE_PERMISSIONS'] = array();
//            }

			// Update the users table with current ip and timestamp
			$get_ts = time();
			$get_ip = $_SERVER['REMOTE_ADDR'];
			$sql  = 'UPDATE `'.$this->users_table.'` ';
			$sql .= 'SET `login_when`=\''.$get_ts.'\', `login_ip`=\''.$get_ip.'\' ';
			$sql .= 'WHERE `user_id`=\''.$user_id.'\'';
			$database->query($sql);
		}else {
		  $num_rows = 0;
		}
		// Return if the user exists or not
		return $num_rows;
	}

	// Increase the count for login attemps
	function increase_attemps() {
		if(!isset($_SESSION['ATTEMPS'])) {
			$_SESSION['ATTEMPS'] = 0;
		} else {
			$_SESSION['ATTEMPS'] = $this->get_session('ATTEMPS')+1;
		}
		$this->display_login();
	}

	// Function to set a "remembering" cookie for the user - removed
	function remember($user_id) {
		return true;
	}

	// Function to check if a user has been remembered - removed
	function is_remembered()
	{
		return false;
	}

	// Display the login screen
	function display_login() {
		// Get language vars
		global $MESSAGE, $MENU, $TEXT;
		// If attemps more than allowed, warn the user
		if($this->get_session('ATTEMPS') > $this->max_attemps) {
			$this->warn();
		}
		// Show the login form
		if($this->frontend != true) {
			//require_once(WB_PATH.'/include/phplib/template.inc');
			// $template = new Template($this->template_dir);
			// Setup template object, parse vars to it, then parse it
			$template = new Template(dirname($this->correct_theme_source($this->template_file)));
			$template->set_file('page', $this->template_file);
			$template->set_block('page', 'mainBlock', 'main');
			if($this->remember_me_option != true) {
				$template->set_var('DISPLAY_REMEMBER_ME', 'display: none;');
			} else {
				$template->set_var('DISPLAY_REMEMBER_ME', '');
			}
			$template->set_var(array(
				'ACTION_URL' => $this->login_url,
				'URL' => $this->default_url,
				'ATTEMPS' => $this->get_session('ATTEMPS'),
				'USERNAME' => $this->username,
				'USERNAME_FIELDNAME' => $this->username_fieldname,
				'PASSWORD_FIELDNAME' => $this->password_fieldname,
				'MESSAGE' => $this->message,
				'WEBSITE_TITLE' => WEBSITE_TITLE,
				'TEXT_ADMINISTRATION' => $TEXT['ADMINISTRATION'],
				'INTERFACE_DIR_URL' =>  ADMIN_URL.'/interface',
				'MAX_USERNAME_LEN' => $this->max_username_len,
				'MAX_PASSWORD_LEN' => $this->max_password_len,
				'ADMIN_URL' => ADMIN_URL,
				'WB_URL' => WB_URL,
				'URL_VIEW' => WB_URL,
				'THEME_URL' => THEME_URL,
				'VERSION' => VERSION,
				'SP' => (defined('SP') ? SP : ''),
				'REVISION' => REVISION,
				'LANGUAGE' => strtolower(LANGUAGE),
				'FORGOTTEN_DETAILS_APP' => $this->forgotten_details_app,
				'TEXT_FORGOTTEN_DETAILS' => $TEXT['FORGOTTEN_DETAILS'],
				'TEXT_USERNAME' => $TEXT['USERNAME'],
				'TEXT_PASSWORD' => $TEXT['PASSWORD'],
				'TEXT_REMEMBER_ME' => $TEXT['REMEMBER_ME'],
				'TEXT_LOGIN' => $TEXT['LOGIN'],
				'TITLE_LOGOUT' => $MENU['LOGIN'],
				'TEXT_RESET' => $TEXT['RESET'],
				'TEXT_HOME' => $TEXT['HOME'],
				'TITLE_VIEW' => $TEXT['WEBSITE'],
				'PAGES_DIRECTORY' => PAGES_DIRECTORY,
				'SECTION_NAME' => $MENU['LOGIN'],
				'SECTION_LOGIN' => $MENU['LOGIN'],
				'LOGIN_DISPLAY_HIDDEN' => !$this->is_authenticated() ? 'hidden' : '',
				'LOGIN_DISPLAY_NONE' => !$this->is_authenticated() ? 'none' : '',
				'LOGIN_LINK' => $_SERVER['SCRIPT_NAME'],
				'LOGIN_ICON' => 'login',
				'START_ICON' => 'blank',
				'URL_HELP' => 'http://www.websitebaker.org/',
				)
			);
			if(defined('DEFAULT_CHARSET')) {
				$charset=DEFAULT_CHARSET;
			} else {
				$charset='utf-8';
			}

			$template->set_var('CHARSET', $charset);

			$template->parse('main', 'mainBlock', false);
			$template->pparse('output', 'page');
		}
	}

	// sanities the REMEMBER_KEY cookie to avoid SQL injection
	function get_safe_remember_key() {
		if (!((strlen($_COOKIE['REMEMBER_KEY']) == 23) && (substr($_COOKIE['REMEMBER_KEY'], 11, 1) == '_'))) return '';
		// create a clean cookie (XXXXXXXXXXX_YYYYYYYYYYY) where X:= numeric, Y:= hash
		$clean_cookie = sprintf('%011d', (int) substr($_COOKIE['REMEMBER_KEY'], 0, 11)) . substr($_COOKIE['REMEMBER_KEY'], 11);
		return ($clean_cookie == $_COOKIE['REMEMBER_KEY']) ? $this->add_slashes($clean_cookie) : '';
	}

	// Warn user that they have had to many login attemps
	function warn() {
//		header('Location: '.$this->warning_url);
		$this->send_header($this->warning_url);
		exit(0);
	}

}
