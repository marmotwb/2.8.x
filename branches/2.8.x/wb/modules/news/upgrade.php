<?php

// $Id: upgrade.php 1162 2009-10-11 18:49:11Z Luisehahne $

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

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
    if( !function_exists('scandir') ) {
        function scandir($directory, $sorting_order = 0) {
            $dh  = opendir($directory);
            while( false !== ($filename = readdir($dh)) ) {
                $files[] = $filename;
            }
            if( $sorting_order == 0 ) {
                sort($files);
            } else {
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
            if( file_exists($target_dir.$file) && $file != '.' && $file != '..' && $file != 'index.php')
            {
                clearstatcache();
                $timestamp = filectime ( $target_dir.$file );
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