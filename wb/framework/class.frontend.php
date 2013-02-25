<?php
/**
 *
 * @category        frontend
 * @package         framework
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
//require_once(WB_PATH.'/framework/class.wb.php');
//require_once(WB_PATH.'/framework/SecureForm.php');
if(!class_exists('wb', false)){ require(WB_PATH.'/framework/class.wb.php'); }
if(!class_exists('admin', false)){ require(WB_PATH.'/framework/class.admin.php'); }

class frontend extends wb {
	// defaults
	public $default_link,$default_page_id;
	// when multiple blocks are used, show home page blocks on
	// pages where no content is defined (search, login, ...)
	public $default_block_content=true;

	// page details
	// page database row
	public $page;
	public $page_id,$page_code,$page_title,$menu_title,$parent,$root_parent,$level,$position,$visibility;
	public $page_description,$page_keywords,$page_link, $page_icon, $menu_icon_0, $menu_icon_1, $tooltip;
	public $page_trail=array();

	public $page_access_denied;
	public $page_no_active_sections;

	// website settings
	public $website_title,$website_description,$website_keywords,$website_header,$website_footer;

	// ugly database stuff
	public $extra_where_sql, $sql_where_language;

// do not chnage if working in frontend account
    public $FrontendLanguage;

	public function __construct($value=true) {
		parent::__construct(SecureForm::FRONTEND);
        $this->FrontendLanguage = isset($value) ? $value : true;
	}

    public function ChangeFrontendLanguage( $value=true ) {
        $this->FrontendLanguage=$value;
    }

	public function page_select() {
		global $database, $page_id,$no_intro;
/*
		// set by user statusflag and maintance enabled select in options
		// if maintance flag is set registered user can see normal pages
		// otherwise show show maintance message

		if($maintance == true)
		{
			$this->print_under_construction();
			return false;
		}
*/

/**
 * Store installed languages in SESSION
 */

        if( $this->get_session('session_started') ) {
            $_SESSION['USED_LANGUAGES'] = $this->GetLanguagesInUsed();
        }

		$maintance = ( defined('SYSTEM_LOCKED') && (SYSTEM_LOCKED==true) ? true : false );

		if( ($maintance==true) || $this->get_session('USER_ID')!= 1 )
		{
       	//  check for show maintenance screen and terminate if needed
    		$this->ShowMaintainScreen('locked');
        }
		// We have no page id and are supposed to show the intro page
		if((INTRO_PAGE && ($maintance != true) && !isset($no_intro)) && (!isset($page_id) || !is_numeric($page_id)))
		{
			// Since we have no page id check if we should go to intro page or default page
			// Get intro page content
			$sIntroFilename = PAGES_DIRECTORY.'/intro'.PAGE_EXTENSION;
			if(file_exists(WB_PATH.$sIntroFilename)) {
                // send intro.php as header to allow parsing of php statements
				header("Location: ".WB_URL.$sIntroFilename."");
				exit();
			}
		}

		// Check if we should add page language sql code
		if(PAGE_LANGUAGES) {
			$this->sql_where_language = ' AND `language`=\''.LANGUAGE.'\'';
		}
		// Get default page
		// Check for a page id
		$table_p = TABLE_PREFIX.'pages';
		$table_s = TABLE_PREFIX.'sections';
		$now = time();
		$sql  = 'SELECT `p`.`page_id`, `link` ';
		$sql .= 'FROM `'.$table_p.'` AS `p` INNER JOIN `'.$table_s.'` USING(`page_id`) ';
		$sql .= 'WHERE `parent`=0 AND `visibility`=\'public\' ';
		$sql .=     'AND (('.$now.'>=`publ_start` OR `publ_start`=0) ';
		$sql .=     'AND ('.$now.'<=`publ_end` OR `publ_end`=0)) ';
		if(trim($this->sql_where_language) != '') {
			$sql .= trim($this->sql_where_language).' ';
		}
		$sql .= 'ORDER BY `p`.`position` ASC';
		if($get_default = $database->query($sql)) {

    		$default_num_rows = $get_default->numRows();
    		if(!isset($page_id) OR !is_numeric($page_id)){
    			// Go to or show default page
    			if($default_num_rows > 0) {
    				$fetch_default = $get_default->fetchRow(MYSQL_ASSOC);
    				$this->default_link = $fetch_default['link'];
    				$this->default_page_id = $fetch_default['page_id'];
    				// Check if we should redirect or include page inline
    				if(HOMEPAGE_REDIRECTION) {
    					// Redirect to page
    //					header("Location: ".$this->page_link($this->default_link));
    //					exit();
    					$this->send_header($this->page_link($this->default_link));
    				} else {
    					// Include page inline
    					$this->page_id = $this->default_page_id;
    				}
    			} else {
    		   		// No pages have been added, so print under construction page
    //				if(trim($this->sql_where_language) == '') {
    //					$this->ShowMaintainScreen('new');
    //    				exit();
    //				}
    				$this->ShowMaintainScreen('new');
    //				$this->print_under_construction();
    				exit();
    			}
    		} else {
    			$this->page_id=$page_id;
    		}
    		// Get default page link
    		if(!isset($fetch_default)) {
    		  	$fetch_default = $get_default->fetchRow(MYSQL_ASSOC);
    	 		$this->default_link = $fetch_default['link'];
    			$this->default_page_id = $fetch_default['page_id'];
    		}
    		return true;

		} else {
			$this->ShowMaintainScreen('new');
			exit();
    	}

	}

	public function get_page_details() {
		global $database;

		$bCanRedirect = false;
// set defaults 
		$aLanguagesDetailsInUsed = $this->GetLanguagesDetailsInUsed();
		$_SESSION['HTTP_REFERER'] = WB_URL;
		$_SESSION['PAGE_ID'] = $this->page_id;
		if($this->page_id != 0) {
			// Query page details
			$sql = 'SELECT * FROM `'.TABLE_PREFIX.'pages` WHERE `page_id`='.(int)$this->page_id;
			$get_page = $database->query($sql);
			// Make sure page was found in database
			if($get_page->numRows() == 0) {
				// Print page not found message
				exit("Page not found");
			}
			// Fetch page details
			$this->page = $get_page->fetchRow(MYSQL_ASSOC);

		//  Check if the page language is also the selected language. If not, send headers again.
			if (($this->page['language'] != LANGUAGE) && $this->FrontendLanguage )
            {
            //  check if there is an query-string
				if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != '') {
					header('Location: '.$this->page_link($this->page['link']).'?'.$_SERVER['QUERY_STRING'].'&lang='.$this->page['language']);
				} else {
					header('Location: '.$this->page_link($this->page['link']).'?lang='.$this->page['language']);
				}
				exit();
			}

			// Begin code to set details as either variables of constants
			// Page ID
			if(!defined('PAGE_ID')) {define('PAGE_ID', $this->page['page_id']);}
			// Page Code
			if(!defined('PAGE_CODE')) {define('PAGE_CODE', $this->page['page_code']);}
			$this->page_code = PAGE_CODE;
			// Page Title
			if(!defined('PAGE_TITLE')) {define('PAGE_TITLE', $this->page['page_title']);}
			$this->page_title=PAGE_TITLE;
			// Menu Title
			$menu_title = $this->page['menu_title'];
			if($menu_title != '') {
				if(!defined('MENU_TITLE')) {define('MENU_TITLE', $menu_title);}
			} else {
				if(!defined('MENU_TITLE')) {define('MENU_TITLE', PAGE_TITLE);}
			}
			$this->menu_title = MENU_TITLE;
			$this->page_icon = $this->page['page_icon'];
			$this->menu_icon_0 = $this->page['menu_icon_0'];
			$this->menu_icon_1 = $this->page['menu_icon_1'];
			$this->tooltip = $this->page['tooltip'];
			// Page parent
			if(!defined('PARENT')) {define('PARENT', $this->page['parent']);}
			$this->parent=$this->page['parent'];
			// Page root parent
			if(!defined('ROOT_PARENT')) {define('ROOT_PARENT', $this->page['root_parent']);}
			$this->root_parent=$this->page['root_parent'];
			// Page level
			if(!defined('LEVEL')) {define('LEVEL', $this->page['level']);}
			$this->level=$this->page['level'];
			// Page position
			$this->level=$this->page['position'];
			// Page visibility
			if(!defined('VISIBILITY')) {define('VISIBILITY', $this->page['visibility']);}
			$this->visibility=$this->page['visibility'];
			// Page trail
			foreach(explode(',', $this->page['page_trail']) AS $pid) {
				$this->page_trail[$pid]=$pid;
			}
			// Page description
			$this->page_description=$this->page['description'];
			if($this->page_description != '') {
				define('PAGE_DESCRIPTION', $this->page_description);
			} else {
				define('PAGE_DESCRIPTION', WEBSITE_DESCRIPTION);
			}
			// Page keywords
			$this->page_keywords=$this->page['keywords'];
			// Page link

			$bCanRedirect = ($this->visibility == 'registered' || $this->visibility == 'privat');

			$this->link=$this->page_link($this->page['link']);

			$_SESSION['PAGE_ID'] = $this->page_id;
			$_SESSION['HTTP_REFERER'] = $bCanRedirect != true ? $this->link : WB_URL;
			$_SESSION['HTTP_REFERER'] = !$this->is_authenticated() ? $this->link : $_SESSION['HTTP_REFERER'];

		// End code to set details as either variables of constants
		}

		// Figure out what template to use
		if(!defined('TEMPLATE')) {
			if(isset($this->page['template']) AND $this->page['template'] != '') {
				if(file_exists(WB_PATH.'/templates/'.$this->page['template'].'/index.php')) {
					define('TEMPLATE', $this->page['template']);
				} else {
					define('TEMPLATE', DEFAULT_TEMPLATE);
				}
			} else {
				define('TEMPLATE', DEFAULT_TEMPLATE);
			}
		}
		// Set the template dir
		define('TEMPLATE_DIR', WB_URL.'/templates/'.TEMPLATE);

		// Check if user is allowed to view this page
		if($this->page && $this->page_is_visible($this->page) == false) {
			if(VISIBILITY == 'deleted' OR VISIBILITY == 'none') {
				// User isnt allowed on this page so tell them
				$this->page_access_denied=true;
			} elseif(VISIBILITY == 'private' OR VISIBILITY == 'registered') {
				// Check if the user is authenticated
				if($this->is_authenticated() == false) {
					// User needs to login first
					header("Location: ".WB_URL."/account/login.php?redirect=".$this->link);
					exit(0);
				} else {
					// User isnt allowed on this page so tell them
					$this->page_access_denied=true;
				}
			}
		}
		// check if there is at least one active section
		if($this->page && $this->page_is_active($this->page) == false) {
			$this->page_no_active_sections=true;
		}
	}

	public function get_website_settings()
    {
		global $database;

		// set visibility SQL code
		// never show no-vis, hidden or deleted pages
		$this->extra_where_sql = '`visibility`!=\'none\' AND `visibility`!=\'hidden\' AND `visibility`!=\'deleted\'';
		// Set extra private sql code
		if($this->is_authenticated()==false) {
			// if user is not authenticated, don't show private pages either
			$this->extra_where_sql .= ' AND `visibility`!=\'private\'';
			// and 'registered' without frontend login doesn't make much sense!
			if (FRONTEND_LOGIN==false) {
				$this->extra_where_sql .= ' AND `visibility`!=\'registered\'';
			}
		}
		$this->extra_where_sql .= $this->sql_where_language;

		// Work-out if any possible in-line search boxes should be shown
		if(SEARCH == 'public') {
			define('SHOW_SEARCH', true);
		} elseif(SEARCH == 'private' AND VISIBILITY == 'private') {
			define('SHOW_SEARCH', true);
		} elseif(SEARCH == 'private' AND $this->is_authenticated() == true) {
			define('SHOW_SEARCH', true);
		} elseif(SEARCH == 'registered' AND $this->is_authenticated() == true) {
			define('SHOW_SEARCH', true);
		} else {
			define('SHOW_SEARCH', false);
		}
		// Work-out if menu should be shown
		if(!defined('SHOW_MENU')) {
			define('SHOW_MENU', true);
		}
		// Work-out if login menu constants should be set
		if(FRONTEND_LOGIN) {
			// Set login menu constants
			define('LOGIN_URL', WB_URL.'/account/login.php');
			define('LOGOUT_URL', WB_URL.'/account/logout.php');
			define('FORGOT_URL', WB_URL.'/account/forgot.php');
			define('PREFERENCES_URL', WB_URL.'/account/preferences.php');
			define('SIGNUP_URL', WB_URL.'/account/signup.php');
		}
	}

/*
 * replace all "[wblink{page_id}]" with real links
 * @param string &$content : reference to global $content
 * @return void
 * @history 100216 17:00:00 optimise errorhandling, speed, SQL-strict
 */
     public function preprocess(&$content)
     {
    //   do nothing
     }

	public function menu() {
		global $wb;
	   if (!isset($wb->menu_number)) {
	   	$wb->menu_number = 1;
	   }
	   if (!isset($wb->menu_start_level)) {
	   	$wb->menu_start_level = 0;
	   }
	   if (!isset($wb->menu_recurse)) {
	   	$wb->menu_recurse = -1;
	   }
	   if (!isset($wb->menu_collapse)) {
	   	$wb->menu_collapse = true;
	   }
	   if (!isset($wb->menu_item_template)) {
	   	$wb->menu_item_template = '<li><span[class]>[a] [menu_title] [/a]</span>';
	   }
	   if (!isset($wb->menu_item_footer)) {
	   	$wb->menu_item_footer = '</li>';
	   }
	   if (!isset($wb->menu_header)) {
	   	$wb->menu_header = '<ul>';
	   }
	   if (!isset($wb->menu_footer)) {
	   	$wb->menu_footer = '</ul>';
	   }
	   if (!isset($wb->menu_default_class)) {
	   	$wb->menu_default_class = ' class="menu_default"';
	   }
	   if (!isset($wb->menu_current_class)) {
	   	$wb->menu_current_class = ' class="menu_current"';
	   }
	   if (!isset($wb->menu_parent)) {
	   	$wb->menu_parent = 0;
	   }
	   $wb->show_menu();
	}

	public function show_menu() {
		global $database;
		if ($this->menu_start_level>0) {
			$key_array=array_keys($this->page_trail);
			if (isset($key_array[$this->menu_start_level-1])) {
				$real_start=$key_array[$this->menu_start_level-1];
				$this->menu_parent=$real_start;
				$this->menu_start_level=0;
			} else {
				return;
			}
		}
		if ($this->menu_recurse==0)
	       return;
		// Check if we should add menu number check to query
		if($this->menu_parent == 0) {
			$menu_number = '`menu`='.intval($this->menu_number);
		} else {
			$menu_number = '1';
		}
		// Query pages
		$sql  = 'SELECT `page_id`,`menu_title`,`page_title`,`link`,`target`,`level`,';
		$sql .=        '`visibility`,viewing_groups,viewing_users ';
		$sql .= 'FROM `'.TABLE_PREFIX.'pages` ';
		$sql .= 'WHERE `parent`='.(int)$this->menu_parent.' AND '.$menu_number.' AND '.$this->extra_where_sql.' ';
		$sql .= 'ORDER BY `position` ASC';
		$query_menu = $database->query($sql);
		// Check if there are any pages to show
		if($query_menu->numRows() > 0) {
			// Print menu header
			echo "\n".$this->menu_header;
			// Loop through pages
			while($page = $query_menu->fetchRow()) {
				// check whether to show this menu-link
				if($this->page_is_active($page)==false && $page['link']!=$this->default_link && !INTRO_PAGE) {
					continue; // no active sections
				}
				if($this->page_is_visible($page)==false) {
					if($page['visibility'] != 'registered') // special case: page_to_visible() check wheter to show the page contents, but the menu should be visible allways
						continue;
				}
				// Create vars
				$vars = array('[class]','[a]', '[/a]', '[menu_title]', '[page_title]');
				// Work-out class
				if($page['page_id'] == PAGE_ID) {
					$class = $this->menu_current_class;
				} else {
					$class = $this->menu_default_class;
				}
				// Check if link is same as first page link, and if so change to WB URL
				if($page['link'] == $this->default_link AND !INTRO_PAGE) {
					$link = WB_URL;
				} else {
					$link = $this->page_link($page['link']);
				}
				// Create values
				$values = array($class,'<a href="'.$link.'" target="'.$page['target'].'" '.$class.'>', '</a>', $page['menu_title'], $page['page_title']);
				// Replace vars with value and print
				echo "\n".str_replace($vars, $values, $this->menu_item_template);
				// Generate sub-menu
				if($this->menu_collapse==false OR ($this->menu_collapse==true AND isset($this->page_trail[$page['page_id']]))) {
					$this->menu_recurse--;
					$this->menu_parent=$page['page_id'];
					$this->show_menu();
				}
				echo "\n".$this->menu_item_footer;
			}
			// Print menu footer
			echo "\n".$this->menu_footer;
		}
	}


	// Function to show the "Under Construction" page
	public function print_under_construction() {
		$this->ShowMaintainScreen('new');
		exit();
	}
}

