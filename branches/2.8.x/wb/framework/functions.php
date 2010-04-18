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
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
*/

// Stop this file from being accessed directly
if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit;
}

// Define that this file has been loaded
define('FUNCTIONS_FILE_LOADED', true);

// Function to remove a non-empty directory
function rm_full_dir($directory)
{
    // If suplied dirname is a file then unlink it
    if (is_file($directory))
	{
        return unlink($directory);
    }
    // Empty the folder
	if (is_dir($directory))
    {
        $dir = dir($directory);
        while (false !== $entry = $dir->read())
        {
            // Skip pointers
            if ($entry == '.' || $entry == '..') { continue; }
            // Deep delete directories
            if (is_dir($directory.'/'.$entry))
			{
				rm_full_dir($directory.'/'.$entry);
            }
            else
            {
                unlink($directory.'/'.$entry);
            }
        }
        // Now delete the folder
        $dir->close();
        return rmdir($directory);
	}
}

// Function to open a directory and add to a dir list
function directory_list($directory, $show_hidden = false)
{
	$result_list = array();
	if (is_dir($directory))
    {
    	$dir = dir($directory); // Open the directory
    	while (false !== $entry = $dir->read()) // loop through the directory
		{
			if($entry == '.' || $entry == '..') { continue; } // Skip pointers
			if($entry[0] == '.' && $show_hidden == false) { continue; } // Skip hidden files
    		if (is_dir("$directory/$entry")) // Add dir and contents to list
			{
    			$result_list = array_merge($result_list, directory_list("$directory/$entry"));
    			$result_list[] = "$directory/$entry";
    		}
    	}
        $dir->close();
    }
	return $result_list; // Now return the list
}

// Function to open a directory and add to a dir list
function chmod_directory_contents($directory, $file_mode)
{
	if (is_dir($directory))
    {
    	// Set the umask to 0
    	$umask = umask(0);
    	// Open the directory then loop through its contents
    	$dir = dir($directory);
    	while (false !== $entry = $dir->read())
		{
    		// Skip pointers
    		if($entry[0] == '.') { continue; }
    		// Chmod the sub-dirs contents
    		if(is_dir("$directory/$entry"))
			{
    			chmod_directory_contents($directory.'/'.$entry, $file_mode);
    		}
    		change_mode($directory.'/'.$entry);
    	}
        $dir->close();
    	// Restore the umask
    	umask($umask);
    }
}

// Function to open a directory and add to a file list
function file_list($directory, $skip = array(), $show_hidden = false)
{
	$result_list = array();
	if (is_dir($directory))
    {
    	$dir = dir($directory); // Open the directory
		while (false !== ($entry = $dir->read())) // loop through the directory
		{
			if($entry == '.' || $entry == '..') { continue; } // Skip pointers
			if($entry[0] == '.' && $show_hidden == false) { continue; } // Skip hidden files
			if( sizeof($skip) > 0 && in_array($entry, $skip) ) { continue; } // Check if we to skip anything else
			if(is_file( $directory.'/'.$entry)) // Add files to list
			{
				$result_list[] = $directory.'/'.$entry;
			}
		}
		$dir->close(); // Now close the folder object
	}
	natsort($result_list); // make the list nice. Not all OS do this itself
	return $result_list;
}

// Function to get a list of home folders not to show
function get_home_folders()
{
	global $database, $admin;
	$home_folders = array();
	// Only return home folders is this feature is enabled
	// and user is not admin
//	if(HOME_FOLDERS AND ($_SESSION['GROUP_ID']!='1')) {
	if(HOME_FOLDERS AND (!in_array('1',explode(',', $_SESSION['GROUPS_ID']))))
	{
		$sql = 'SELECT `home_folder` FROM `'.TABLE_PREFIX.'users` WHERE `home_folder` != "'.$admin->get_home_folder().'"';
		$query_home_folders = $database->query($sql);
		if($query_home_folders->numRows() > 0)
		{
			while($folder = $query_home_folders->fetchRow())
			{
				$home_folders[$folder['home_folder']] = $folder['home_folder'];
			}
		}
		function remove_home_subs($directory = '/', $home_folders = '')
		{
			if($handle = opendir(WB_PATH.MEDIA_DIRECTORY.$directory))
			{
				// Loop through the dirs to check the home folders sub-dirs are not shown
				while(false !== ($file = readdir($handle)))
				{
					if($file[0] != '.' AND $file != 'index.php')
					{
						if(is_dir(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$file))
						{
							if($directory != '/')
							{
								$file = $directory.'/'.$file;
							}
							else
							{
								$file = '/'.$file;
							}
							foreach($home_folders AS $hf)
							{
								$hf_length = strlen($hf);
								if($hf_length > 0)
								{
									if(substr($file, 0, $hf_length+1) == $hf)
									{
										$home_folders[$file] = $file;
									}
								}
							}
							$home_folders = remove_home_subs($file, $home_folders);
						}
					}
				}
			}
			return $home_folders;
		}
		$home_folders = remove_home_subs('/', $home_folders);
	}
	return $home_folders;
}

// Function to create directories
function make_dir($dir_name, $dir_mode = OCTAL_DIR_MODE)
{
	if(!is_dir($dir_name))
    {
		$umask = umask(0);
		mkdir($dir_name, $dir_mode);
		umask($umask);
		return true;
	} else {
		return false;	
	}
}

// Function to chmod files and directories
function change_mode($name)
{
	if(OPERATING_SYSTEM != 'windows')
    {
		// Only chmod if os is not windows
		if(is_dir($name))
        {
			$mode = OCTAL_DIR_MODE;
		}
        else
        {
			$mode = OCTAL_FILE_MODE;
		}

		if(file_exists($name))
        {
			$umask = umask(0);
			chmod($name, $mode);
			umask($umask);
			return true;
		}
        else
        {
			return false;	
		}
	}
    else
    {
		return true;
	}
}

// Function to figure out if a parent exists
function is_parent($page_id)
{
	global $database;
	// Get parent
	$sql = 'SELECT `parent` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
	$parent = $database->get_one($sql);
	// If parent isnt 0 return its ID
	if(is_null($parent))
	{
		return false;
	}
	else
	{
		return $parent;
	}
}

// Function to work out level
function level_count($page_id)
{
	global $database;
	// Get page parent
	$sql = 'SELECT `parent` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
	$parent = $database->get_one($sql);
	if($parent > 0) 
	{	// Get the level of the parent
		$sql = 'SELECT `level` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$parent;
		$level = $database->get_one($sql);
		return $level+1;
	}
	else
	{
		return 0;
	}
}

// Function to work out root parent
function root_parent($page_id)
{
	global $database;
	// Get page details
	$sql = 'SELECT `parent`, `level` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
	$query_page = $database->query($sql);
	$fetch_page = $query_page->fetchRow();
	$parent = $fetch_page['parent'];
	$level = $fetch_page['level'];	
	if($level == 1)
	{
		return $parent;
	}
	elseif($parent == 0)
	{
		return $page_id;
	}
	else
	{	// Figure out what the root parents id is
		$parent_ids = array_reverse(get_parent_ids($page_id));
		return $parent_ids[0];
	}
}

// Function to get page title
function get_page_title($id)
{
	global $database;
	// Get title
	$sql = 'SELECT `page_title` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$id;
	$page_title = $database->get_one($sql);
	return $page_title;
}

// Function to get a pages menu title
function get_menu_title($id)
{
	global $database;
	// Get title
	$sql = 'SELECT `menu_title` FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$id;
	$menu_title = $database->get_one($sql);
	return $menu_title;
}

// Function to get all parent page titles
function get_parent_titles($parent_id)
{
	$titles[] = get_menu_title($parent_id);
	if(is_parent($parent_id) != false)
	{
		$parent_titles = get_parent_titles(is_parent($parent_id));
		$titles = array_merge($titles, $parent_titles);
	}
	return $titles;
}

// Function to get all parent page id's
function get_parent_ids($parent_id)
{
	$ids[] = $parent_id;
	if(is_parent($parent_id) != false)
	{
		$parent_ids = get_parent_ids(is_parent($parent_id));
		$ids = array_merge($ids, $parent_ids);
	}
	return $ids;
}

// Function to genereate page trail
function get_page_trail($page_id) {
	return implode(',', array_reverse(get_parent_ids($page_id)));
}

// Function to get all sub pages id's
function get_subs($parent, $subs)
{
	// Connect to the database
	global $database;
	// Get id's
	$sql = 'SELECT `page_id` FROM `'.TABLE_PREFIX.'pages` WHERE `parent` = '.$parent;
	$query = $database->query($sql);
	if($query->numRows() > 0)
	{
		while($fetch = $query->fetchRow())
		{
			$subs[] = $fetch['page_id'];
			// Get subs of this sub
			$subs = get_subs($fetch['page_id'], $subs);
		}
	}
	// Return subs array
	return $subs;
}

// Function as replacement for php's htmlspecialchars()
// Will not mangle HTML-entities
function my_htmlspecialchars($string)
{
	$string = preg_replace('/&(?=[#a-z0-9]+;)/i', '__amp;_', $string);
	$string = strtr($string, array('<'=>'&lt;', '>'=>'&gt;', '&'=>'&amp;', '"'=>'&quot;', '\''=>'&#39;'));
	$string = preg_replace('/__amp;_(?=[#a-z0-9]+;)/i', '&', $string);
	return($string);
}

// Convert a string from mixed html-entities/umlauts to pure $charset_out-umlauts
// Will replace all numeric and named entities except &gt; &lt; &apos; &quot; &#039; &nbsp;
// In case of error the returned string is unchanged, and a message is emitted.
function entities_to_umlauts($string, $charset_out=DEFAULT_CHARSET)
{
	require_once(WB_PATH.'/framework/functions-utf8.php');
	return entities_to_umlauts2($string, $charset_out);
}

// Will convert a string in $charset_in encoding to a pure ASCII string with HTML-entities.
// In case of error the returned string is unchanged, and a message is emitted.
function umlauts_to_entities($string, $charset_in=DEFAULT_CHARSET)
{
	require_once(WB_PATH.'/framework/functions-utf8.php');
	return umlauts_to_entities2($string, $charset_in);
}

// Function to convert a page title to a page filename
function page_filename($string)
{
	require_once(WB_PATH.'/framework/functions-utf8.php');
	$string = entities_to_7bit($string);
	// Now remove all bad characters
	$bad = array(
	'\'', /* /  */ '"', /* " */	'<', /* < */	'>', /* > */
	'{', /* { */	'}', /* } */	'[', /* [ */	']', /* ] */	'`', /* ` */
	'!', /* ! */	'@', /* @ */	'#', /* # */	'$', /* $ */	'%', /* % */
	'^', /* ^ */	'&', /* & */	'*', /* * */	'(', /* ( */	')', /* ) */
	'=', /* = */	'+', /* + */	'|', /* | */	'/', /* / */	'\\', /* \ */
	';', /* ; */	':', /* : */	',', /* , */	'?' /* ? */
	);
	$string = str_replace($bad, '', $string);
	// replace multiple dots in filename to single dot and (multiple) dots at the end of the filename to nothing
	$string = preg_replace(array('/\.+/', '/\.+$/'), array('.', ''), $string);
	// Now replace spaces with page spcacer
	$string = trim($string);
	$string = preg_replace('/(\s)+/', PAGE_SPACER, $string);
	// Now convert to lower-case
	$string = strtolower($string);
	// If there are any weird language characters, this will protect us against possible problems they could cause
	$string = str_replace(array('%2F', '%'), array('/', ''), urlencode($string));
	// Finally, return the cleaned string
	return $string;
}

// Function to convert a desired media filename to a clean filename
function media_filename($string)
{
	require_once(WB_PATH.'/framework/functions-utf8.php');
	$string = entities_to_7bit($string);
	// Now remove all bad characters
	$bad = array(
	'\'', // '
	'"', // "
	'`', // `
	'!', // !
	'@', // @
	'#', // #
	'$', // $
	'%', // %
	'^', // ^
	'&', // &
	'*', // *
	'=', // =
	'+', // +
	'|', // |
	'/', // /
	'\\', // \
	';', // ;
	':', // :
	',', // ,
	'?' // ?
	);
	$string = str_replace($bad, '', $string);
	// replace multiple dots in filename to single dot and (multiple) dots at the end of the filename to nothing
	$string = preg_replace(array('/\.+/', '/\.+$/'), array('.', ''), $string);
	// Clean any page spacers at the end of string
	$string = trim($string);
	// Finally, return the cleaned string
	return $string;
}

// Function to work out a page link
if(!function_exists('page_link'))
{
	function page_link($link)
	{
		global $admin;
		return $admin->page_link($link);
	}
}

// Create a new file in the pages directory
function create_access_file($filename,$page_id,$level)
{
	global $admin, $MESSAGE;
	if(!is_writable(WB_PATH.PAGES_DIRECTORY.'/'))
	{
		$admin->print_error($MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE']);
	}
	else
	{
		// First make sure parent folder exists
		$parent_folders = explode('/',str_replace(WB_PATH.PAGES_DIRECTORY, '', dirname($filename)));
		$parents = '';
		foreach($parent_folders AS $parent_folder)
		{
			if($parent_folder != '/' AND $parent_folder != '')
			{
				$parents .= '/'.$parent_folder;
				if(!file_exists(WB_PATH.PAGES_DIRECTORY.$parents))
				{
					make_dir(WB_PATH.PAGES_DIRECTORY.$parents);
				}
			}	
		}
		// The depth of the page directory in the directory hierarchy
		// '/pages' is at depth 1
		$pages_dir_depth=count(explode('/',PAGES_DIRECTORY))-1;
		// Work-out how many ../'s we need to get to the index page
		$index_location = '';
		for($i = 0; $i < $level + $pages_dir_depth; $i++)
		{
			$index_location .= '../';
		}
		$content = ''.
'<?php
$page_id = '.$page_id.';
require("'.$index_location.'config.php");
require(WB_PATH."/index.php");
?>';
		$handle = fopen($filename, 'w');
		fwrite($handle, $content);
		fclose($handle);
		// Chmod the file
		change_mode($filename);
	}
}

// Function for working out a file mime type (if the in-built PHP one is not enabled)
if(!function_exists('mime_content_type'))
{
    function mime_content_type($filename) 
	{
	    $mime_types = array(
            'txt'	=> 'text/plain',
            'htm'	=> 'text/html',
            'html'	=> 'text/html',
            'php'	=> 'text/html',
            'css'	=> 'text/css',
            'js'	=> 'application/javascript',
            'json'	=> 'application/json',
            'xml'	=> 'application/xml',
            'swf'	=> 'application/x-shockwave-flash',
            'flv'	=> 'video/x-flv',

            // images
            'png'	=> 'image/png',
            'jpe'	=> 'image/jpeg',
            'jpeg'	=> 'image/jpeg',
            'jpg'	=> 'image/jpeg',
            'gif'	=> 'image/gif',
            'bmp'	=> 'image/bmp',
            'ico'	=> 'image/vnd.microsoft.icon',
            'tiff'	=> 'image/tiff',
            'tif'	=> 'image/tiff',
            'svg'	=> 'image/svg+xml',
            'svgz'	=> 'image/svg+xml',

            // archives
            'zip'	=> 'application/zip',
            'rar'	=> 'application/x-rar-compressed',
            'exe'	=> 'application/x-msdownload',
            'msi'	=> 'application/x-msdownload',
            'cab'	=> 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3'	=> 'audio/mpeg',
            'mp4'	=> 'audio/mpeg',
            'qt'	=> 'video/quicktime',
            'mov'	=> 'video/quicktime',

            // adobe
            'pdf'	=> 'application/pdf',
            'psd'	=> 'image/vnd.adobe.photoshop',
            'ai'	=> 'application/postscript',
            'eps'	=> 'application/postscript',
            'ps'	=> 'application/postscript',

            // ms office
            'doc'	=> 'application/msword',
            'rtf'	=> 'application/rtf',
            'xls'	=> 'application/vnd.ms-excel',
            'ppt'	=> 'application/vnd.ms-powerpoint',

            // open office
            'odt'	=> 'application/vnd.oasis.opendocument.text',
            'ods'	=> 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $temp = explode('.',$filename);
        $ext = strtolower(array_pop($temp));

        if (array_key_exists($ext, $mime_types))
		{
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open'))
		{
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        }
        else
		{
            return 'application/octet-stream';
        }
    }
}

// Generate a thumbnail from an image
function make_thumb($source, $destination, $size)
{
	// Check if GD is installed
	if(extension_loaded('gd') AND function_exists('imageCreateFromJpeg'))
	{
		// First figure out the size of the thumbnail
		list($original_x, $original_y) = getimagesize($source);
		if ($original_x > $original_y)
		{
			$thumb_w = $size;
			$thumb_h = $original_y*($size/$original_x);
		}
		if ($original_x < $original_y)
		{
			$thumb_w = $original_x*($size/$original_y);
			$thumb_h = $size;
		}
		if ($original_x == $original_y)
		{
			$thumb_w = $size;
			$thumb_h = $size;	
		}
		// Now make the thumbnail
		$source = imageCreateFromJpeg($source);
		$dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
		imagecopyresampled($dst_img,$source,0,0,0,0,$thumb_w,$thumb_h,$original_x,$original_y);
		imagejpeg($dst_img, $destination);
		// Clear memory
		imagedestroy($dst_img);
		imagedestroy($source);
	   // Return true
		return true;
	} else {
		return false;
	}
}

/*
 * Function to work-out a single part of an octal permission value
 *
 * @param mixed $octal_value: an octal value as string (i.e. '0777') or real octal integer (i.e. 0777 | 777)
 * @param string $who: char or string for whom the permission is asked( U[ser] / G[roup] / O[thers] )
 * @param string $action: char or string with the requested action( r[ead..] / w[rite..] / e|x[ecute..] )
 * @return boolean
 */
function extract_permission($octal_value, $who, $action)
{
	// Make sure that all arguments are set and $octal_value is a real octal-integer
	if( ($who == '') or ($action == '') or (preg_match( '/[^0-7]/', (string)$octal_value )) )
	{
		return false; // invalid argument, so return false
	}
	// convert $octal_value into a decimal-integer to be sure having a valid value
	$right_mask = octdec($octal_value);
	$action_mask = 0;
	// set the $action related bit in $action_mask
	switch($action[0]) // get action from first char of $action
	{
		case 'r':
		case 'R':
			$action_mask = 4; // set read-bit only (2^2)
			break;
		case 'w':
		case 'W':
			$action_mask = 2; // set write-bit only (2^1)
			break;
		case 'e':
		case 'E':
		case 'x':
		case 'X':
			$action_mask = 1; // set execute-bit only (2^0)
			break;
		default:
			return false; // undefined action name, so return false
	}
	// shift action-mask into the right position
	switch($who[0]) // get who from first char of $who
	{
		case 'u':
		case 'U':
			$action_mask <<= 3; // shift left 3 bits
		case 'g':
		case 'G':
			$action_mask <<= 3; // shift left 3 bits
		case 'o':
		case 'O':
			/* NOP */
			break;
		default:
			return false; // undefined who, so return false
	}
	return( ($right_mask & $action_mask) != 0 ); // return result of binary-AND
}

// Function to delete a page
function delete_page($page_id)
{
	global $admin, $database, $MESSAGE;
	// Find out more about the page
	$database = new database();
	$sql  = 'SELECT `page_id`, `menu_title`, `page_title`, `level`, `link`, `parent`, `modified_by`, `modified_when` ';
	$sql .= 'FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
	$results = $database->query($sql);
	if($database->is_error())    { $admin->print_error($database->get_error()); }
	if($results->numRows() == 0) { $admin->print_error($MESSAGE['PAGES']['NOT_FOUND']); }
	$results_array = $results->fetchRow();
	$parent     = $results_array['parent'];
	$level      = $results_array['level'];
	$link       = $results_array['link'];
	$page_title = $results_array['page_title'];
	$menu_title = $results_array['menu_title'];
	
	// Get the sections that belong to the page
	$sql = 'SELECT `section_id`, `module` FROM `'.TABLE_PREFIX.'sections` WHERE `page_id` = '.$page_id;
	$query_sections = $database->query($sql);
	if($query_sections->numRows() > 0)
	{
		while($section = $query_sections->fetchRow())
		{
			// Set section id
			$section_id = $section['section_id'];
			// Include the modules delete file if it exists
			if(file_exists(WB_PATH.'/modules/'.$section['module'].'/delete.php'))
			{
				include(WB_PATH.'/modules/'.$section['module'].'/delete.php');
			}
		}
	}
	// Update the pages table
	$sql = 'DELETE FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = '.$page_id;
	$database->query($sql);
	if($database->is_error())
	{
		$admin->print_error($database->get_error());
	}
	// Update the sections table
	$sql = 'DELETE FROM `'.TABLE_PREFIX.'sections` WHERE `page_id` = '.$page_id;
	$database->query($sql);
	if($database->is_error()) {
		$admin->print_error($database->get_error());
	}
	// Include the ordering class or clean-up ordering
	include_once(WB_PATH.'/framework/class.order.php');
	$order = new order(TABLE_PREFIX.'pages', 'position', 'page_id', 'parent');
	$order->clean($parent);
	// Unlink the page access file and directory
	$directory = WB_PATH.PAGES_DIRECTORY.$link;
	$filename = $directory.PAGE_EXTENSION;
	$directory .= '/';
	if(file_exists($filename))
	{
		if(!is_writable(WB_PATH.PAGES_DIRECTORY.'/'))
		{
			$admin->print_error($MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE']);
		}
		else
		{
			unlink($filename);
			if( file_exists($directory) &&
			   (rtrim($directory,'/') != WB_PATH.PAGES_DIRECTORY) &&
			   (substr($link, 0, 1) != '.'))
			{
				rm_full_dir($directory);
			}
		}
	}
}

// Load module into DB
function load_module($directory, $install = false)
{
	global $database,$admin,$MESSAGE;

	if(is_dir($directory) AND file_exists($directory.'/info.php'))
	{
		require($directory.'/info.php');
		if(isset($module_name))
		{
			if(!isset($module_license))                                  { $module_license = 'GNU General Public License'; }
			if(!isset($module_platform) AND isset($module_designed_for)) { $module_platform = $module_designed_for; }
			if(!isset($module_function) AND isset($module_type))         { $module_function = $module_type; }
			$module_function = strtolower($module_function);
			// Check that it doesn't already exist
			$sql  = 'SELECT `addon_id` FROM `'.TABLE_PREFIX.'addons` ';
			$sql .= 'WHERE `type` = "module" AND `directory` = "'.$module_directory.'" LIMIT 0,1';
			$result = $database->query($sql);
			if($result->numRows() == 0)
			{
				// Load into DB
				$sql  = 'INSERT INTO `'.TABLE_PREFIX.'addons` SET ';
				$sql .= '`directory` = "'.$module_directory.'", ';
				$sql .= '`name` = "'.$module_name.'", ';
				$sql .= '`description`= "'.addslashes($module_description).'", ';
				$sql .= '`type`= "module", ';
				$sql .= '`function` = "'.$module_function.'", ';
				$sql .= '`version` = "'.$module_version.'", ';
				$sql .= '`platform` = "'.$module_platform.'", ';
				$sql .= '`author` = "'.addslashes($module_author).'", ';
				$sql .= '`license` = "'.addslashes($module_license).'"';
				$database->query($sql);
				// Run installation script
				if($install == true)
				{
					if(file_exists($directory.'/install.php'))
					{
						require($directory.'/install.php');
					}
				}
			}
		}
	}
}

// Load template into DB
function load_template($directory)
{
	global $database, $admin;
	if(is_dir($directory) AND file_exists($directory.'/info.php'))
	{
		require($directory.'/info.php');
		if(isset($template_name))
		{
			if(!isset($template_license))
            {
              $template_license = 'GNU General Public License';
            }
			if(!isset($template_platform) AND isset($template_designed_for))
            {
              $template_platform = $template_designed_for;
            }
			if(!isset($template_function))
            {
              $template_function = 'template';
            }
			// Check that it doesn't already exist
			$sql  = 'SELECT `addon_id` FROM `'.TABLE_PREFIX.'addons` ';
			$sql .= 'WHERE `type` = "template" AND `directory` = "'.$template_directory.'" LIMIT 0,1';
			$result = $database->query($sql);
			if($result->numRows() == 0)
			{
				// Load into DB
				$sql  = 'INSERT INTO `'.TABLE_PREFIX.'addons` SET ';
				$sql .= '`directory` = "'.$template_directory.'", ';
				$sql .= '`name` = "'.$template_name.'", ';
				$sql .= '`description`= "'.addslashes($template_description).'", ';
				$sql .= '`type`= "template", ';
				$sql .= '`function` = "'.$template_function.'", ';
				$sql .= '`version` = "'.$template_version.'", ';
				$sql .= '`platform` = "'.$template_platform.'", ';
				$sql .= '`author` = "'.addslashes($template_author).'", ';
				$sql .= '`license` = "'.addslashes($template_license).'" ';
				$database->query($sql);
			}
		}
	}
}

// Load language into DB
function load_language($file)
{
	global $database,$admin;
	if (file_exists($file) && preg_match('#^([A-Z]{2}.php)#', basename($file)))
	{
		require($file);
		if(isset($language_name))
		{
			if(!isset($language_license))                                    { $language_license = 'GNU General Public License'; }
			if(!isset($language_platform) AND isset($language_designed_for)) { $language_platform = $language_designed_for; }
			// Check that it doesn't already exist
			$sql  = 'SELECT `addon_id` FROM `'.TABLE_PREFIX.'addons` ';
			$sql .= 'WHERE `type` = "language" AND `directory` = "'.$language_code.'" LIMIT 0,1';
			$result = $database->query($sql);
			if($result->numRows() == 0)
			{
				// Load into DB
				$sql  = 'INSERT INTO `'.TABLE_PREFIX.'addons` SET ';
				$sql .= '`directory` = "'.$language_code.'", ';
				$sql .= '`name` = "'.$language_name.'", ';
				$sql .= '`type`= "language", ';
				$sql .= '`version` = "'.$language_version.'", ';
				$sql .= '`platform` = "'.$language_platform.'", ';
				$sql .= '`author` = "'.addslashes($language_author).'", ';
				$sql .= '`license` = "'.addslashes($language_license).'"';
				$database->query($sql);
			}
		}
	}
}

// Upgrade module info in DB, optionally start upgrade script
function upgrade_module($directory, $upgrade = false)
{
	global $database, $admin, $MESSAGE;
	$directory = WB_PATH.'/modules/'.$directory;
	if(file_exists($directory.'/info.php'))
	{
		require($directory.'/info.php');
		if(isset($module_name))
		{
			if(!isset($module_license))                                  { $module_license = 'GNU General Public License'; }
			if(!isset($module_platform) AND isset($module_designed_for)) { $module_platform = $module_designed_for; }
			if(!isset($module_function) AND isset($module_type))         { $module_function = $module_type; }
			$module_function = strtolower($module_function);
			// Check that it does already exist
			$sql  = 'SELECT `addon_id` FROM `'.TABLE_PREFIX.'addons` ';
			$sql .= 'WHERE `directory` = "'.$module_directory.'" LIMIT 0,1';
			$result = $database->query($sql);
			if($result->numRows() > 0)
			{
				// Update in DB
				$sql  = 'UPDATE `'.TABLE_PREFIX.'addons` SET ';
				$sql .= '`version` = "'.$module_version.'", ';
				$sql .= '`description` = "'.addslashes($module_description).'", ';
				$sql .= '`platform` = "'.$module_platform.'", ';
				$sql .= '`author` = "'.addslashes($module_author).'", ';
				$sql .= '`license` = "'.addslashes($module_license).'" ';
				$sql .= 'WHERE `directory` = "'.$module_directory.'"';
				$database->query($sql);
				// Run upgrade script
				if($upgrade == true)
				{
					if(file_exists($directory.'/upgrade.php'))
					{
						require($directory.'/upgrade.php');
					}
				}
			}
		}
	}
}

// extracts the content of a string variable from a string (save alternative to including files)
if(!function_exists('get_variable_content'))
{
	function get_variable_content($search, $data, $striptags=true, $convert_to_entities=true)
	{
		$match = '';
		// search for $variable followed by 0-n whitespace then by = then by 0-n whitespace
		// then either " or ' then 0-n characters then either " or ' followed by 0-n whitespace and ;
		// the variable name is returned in $match[1], the content in $match[3]
		if (preg_match('/(\$' .$search .')\s*=\s*("|\')(.*)\2\s*;/', $data, $match))
		{
			if(strip_tags(trim($match[1])) == '$' .$search)
			{
				// variable name matches, return it's value
				$match[3] = ($striptags == true) ? strip_tags($match[3]) : $match[3];
				$match[3] = ($convert_to_entities == true) ? htmlentities($match[3]) : $match[3];
				return $match[3];
			}
		}
		return false;
	}
}

?>
