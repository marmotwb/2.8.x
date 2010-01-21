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

if(defined('WB_URL')) {

    function create_new_post($filename, $filetime=NULL, $content )
    {
    global $page_id, $section_id, $post_id;
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
	$content .='
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

    // read files from /pages/posts/
    if( !function_exists('scandir') )
    {
        function scandir($directory, $sorting_order = 0)
        {
            $dh  = opendir($directory);
            while( false !== ($filename = readdir($dh)) )
            {
                $files[] = $filename;
            }
            if( $sorting_order == 0 )
            {
                sort($files);
            } else
            {
                rsort($files);
            }
            return($files);
        }
    }

    $target_dir = WB_PATH . PAGES_DIRECTORY.'/posts/';
	$files = scandir($target_dir);
	natcasesort($files);

		// All files in /pages/posts/
		foreach( $files as $file )
        {
            if( file_exists($target_dir.$file)
                AND ($file != '.')
                    AND ($file != '..')
                        AND ($file != 'index.php') )
            {
                clearstatcache();
                $timestamp = filemtime ( $target_dir.$file );
                $lines = file($target_dir.$file);
                $content = '';
                // read lines until first define
                foreach ($lines as $line_num => $line) {
                    if(strstr($line,'define'))
                    {
                      break;
                    }
                    $content .= $line;
                }

                create_new_post($target_dir.$file, $timestamp, $content);
            }

        }
// Print admin footer
$admin->print_footer();
}
?>