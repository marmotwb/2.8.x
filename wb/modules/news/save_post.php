<?php
/*
*
*                       About WebsiteBaker
*
* Website Baker is a PHP-based Content Management System (CMS)
* designed with one goal in mind: to enable its users to produce websites
* with ease.
*
*                       LICENSE INFORMATION
*
* WebsiteBaker is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* WebsiteBaker is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
* See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*
*                   WebsiteBaker Extra Information
*
*
*/
/**
 *
 * @category        modules
 * @package         news
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @filesource		$HeadURL$
 * @author          Ryan Djurovich
 * @copyright       2004-2009, Ryan Djurovich
 *
 * @author          WebsiteBaker Project
 * @link			http://www.websitebaker2.org/
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://start.websitebaker2.org/impressum-datenschutz.php
 * @license         http://www.gnu.org/licenses/gpl.html
 * @version         $Id$
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
 * @lastmodified    $Date$
 *
 */

require('../../config.php');

require_once(WB_PATH."/include/jscalendar/jscalendar-functions.php");

// Get id
if(!isset($_POST['post_id']) OR !is_numeric($_POST['post_id']))
{
	header("Location: ".ADMIN_URL."/pages/index.php");
	exit( 0 );
}
else
{
	$id = $_POST['post_id'];
	$post_id = $id;
}

function create_file($filename, $filetime=NULL )
{
global $page_id, $section_id, $post_id;

	// We need to create a new file
	// First, delete old file if it exists
	if(file_exists(WB_PATH.PAGES_DIRECTORY.$filename.PAGE_EXTENSION))
    {
        $filetime = isset($filetime) ? $filetime :  filemtime($filename);
		unlink(WB_PATH.PAGES_DIRECTORY.$filename.PAGE_EXTENSION);
	}
    else {
        $filetime = isset($filetime) ? $filetime : time();
    }
	// The depth of the page directory in the directory hierarchy
	// '/pages' is at depth 1
	$pages_dir_depth = count(explode('/',PAGES_DIRECTORY))-1;
	// Work-out how many ../'s we need to get to the index page
	$index_location = '../';
	for($i = 0; $i < $pages_dir_depth; $i++)
    {
		$index_location .= '../';
	}

	// Write to the filename
	$content = ''.
'<?php
$page_id = '.$page_id.';
$section_id = '.$section_id.';
$post_id = '.$post_id.';
define("POST_SECTION", $section_id);
define("POST_ID", $post_id);
require("'.$index_location.'config.php");
require(WB_PATH."/index.php");
?>';
	if($handle = fopen($filename, 'w+'))
    {
    	fwrite($handle, $content);
    	fclose($handle);
        if($filetime)
        {
        touch($filename, $filetime);
        }
    	change_mode($filename);
    }

}

// Include WB admin wrapper script
$update_when_modified = true; // Tells script to update when this page was last updated
require(WB_PATH.'/modules/admin.php');

// Validate all fields
if($admin->get_post('title') == '' AND $admin->get_post('url') == '')
{
	$admin->print_error($MESSAGE['GENERIC']['FILL_IN_ALL'], WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.'&section_id='.$section_id.'&post_id='.$id);
}
else
{
	$title = $admin->get_post_escaped('title');
	$short = $admin->get_post_escaped('short');
	$long = $admin->get_post_escaped('long');
	$commenting = $admin->get_post_escaped('commenting');
	$active = $admin->get_post_escaped('active');
	$old_link = $admin->get_post_escaped('link');
	$group_id = $admin->get_post_escaped('group');
}

// Get page link URL
$query_page = $database->query("SELECT level,link FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id'");
$page = $query_page->fetchRow();
$page_level = $page['level'];
$page_link = $page['link'];

// Include WB functions file
require(WB_PATH.'/framework/functions.php');

// Work-out what the link should be
$post_link = '/posts/'.page_filename($title).PAGE_SPACER.$post_id;

// Make sure the post link is set and exists
// Make news post access files dir
make_dir(WB_PATH.PAGES_DIRECTORY.'/posts/');
$file_create_time = '';
if(!is_writable(WB_PATH.PAGES_DIRECTORY.'/posts/'))
{
	$admin->print_error($MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE']);
}
elseif(($old_link != $post_link) OR !file_exists(WB_PATH.PAGES_DIRECTORY.$post_link.PAGE_EXTENSION))
{
	// We need to create a new file
	// First, delete old file if it exists
	if(file_exists(WB_PATH.PAGES_DIRECTORY.$old_link.PAGE_EXTENSION))
    {
        $file_create_time = filemtime($old_link.PAGE_EXTENSION);
		unlink(WB_PATH.PAGES_DIRECTORY.$old_link.PAGE_EXTENSION);
	}

    // Specify the filename
    $filename = WB_PATH.PAGES_DIRECTORY.'/'.$post_link.PAGE_EXTENSION;
    create_file($filename, $file_create_time);
}


// get publisedwhen and publisheduntil
$publishedwhen = jscalendar_to_timestamp($admin->get_post_escaped('publishdate'));
if($publishedwhen == '' || $publishedwhen < 1)
	$publishedwhen=0;
$publisheduntil = jscalendar_to_timestamp($admin->get_post_escaped('enddate'), $publishedwhen);
if($publisheduntil == '' || $publisheduntil < 1)
	$publisheduntil=0;

// Update row
$database->query("UPDATE ".TABLE_PREFIX."mod_news_posts SET group_id = '$group_id', title = '$title', link = '$post_link', content_short = '$short', content_long = '$long', commenting = '$commenting', active = '$active', published_when = '$publishedwhen', published_until = '$publisheduntil', posted_when = '".time()."', posted_by = '".$admin->get_user_id()."' WHERE post_id = '$post_id'");

// Check if there is a db error, otherwise say successful
if($database->is_error())
{
	$admin->print_error($database->get_error(), WB_URL.'/modules/news/modify_post.php?page_id='.$page_id.'&section_id='.$section_id.'&post_id='.$id);
}
else
{
	$admin->print_success($TEXT['SUCCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// Print admin footer
$admin->print_footer();

?>