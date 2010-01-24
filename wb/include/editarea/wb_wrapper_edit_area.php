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
*  Website Baker wrapper functions for the Javascript code editor: "EditArea"
*
*/
/**
 *
 * @category        framework
 * @package         include
 * @author		    Christophe Dolivet (EditArea), Christian Sommer (WB wrapper)
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

function loader_help()
{
?>
   <script type="text/javascript">
      var head= document.getElementsByTagName('head')[0];
      var script= document.createElement('script');
      script.type= 'text/javascript';
      script.src= '<?php print WB_URL; ?>/include/editarea/edit_area_full.js';
      head.appendChild(script);
   </script>
<?php

}

if (!function_exists('registerEditArea')) {
	function registerEditArea(
                $id = 'code_area',
                $syntax = 'php',
                $syntax_selection = true,
                $allow_resize = 'both',
                $allow_toggle = true,
                $start_highlight = true,
                $min_width = 600,
                $min_height = 300,
                $toolbar = 'default'
            )
	{

		// set default toolbar if no user defined was specified
		if ($toolbar == 'default') {
			$toolbar = 'search, fullscreen, |, undo, redo, |, select_font, syntax_selection, |, highlight, reset_highlight, |, help';
			$toolbar = (!$syntax_selection) ? str_replace('syntax_selection,', '', $toolbar) : $toolbar;
		}

		// check if used Website Baker backend language is supported by EditArea
		$language = 'en';
		if (defined('LANGUAGE') && file_exists(dirname(__FILE__) . '/langs/' . strtolower(LANGUAGE) . '.js'))
        {
			$language = strtolower(LANGUAGE);
		}

		// check if highlight syntax is supported by edit_area
		$syntax = in_array($syntax, array('css', 'html', 'js', 'php', 'xml')) ? $syntax : 'php';

		// check if resize option is supported by edit_area
		$allow_resize = in_array($allow_resize, array('no', 'both', 'x', 'y')) ? $allow_resize : 'no';

		// return the Javascript code
		$result = <<< EOT
		<script type="text/javascript">
			editAreaLoader.init({
				id: 				'$id',
				start_highlight:	$start_highlight,
				syntax:			    '$syntax',
				min_width:			$min_width,
				min_height:		    $min_height,
				allow_resize: 		'$allow_resize',
				allow_toggle: 		$allow_toggle,
				toolbar: 			'$toolbar',
				language:			'$language'
			});
		</script>
EOT;
		return $result;	
	}
}

if (!function_exists('getEditAreaSyntax')) {
	function getEditAreaSyntax($file) 
	{
		// returns the highlight scheme for edit_area
		$syntax = 'php';
		if (is_readable($file)) {
			// extract file extension
			$file_info = pathinfo($file);
		
			switch ($file_info['extension']) {
				case 'htm': case 'html': case 'htt':
					$syntax = 'html';
	  				break;

	 			case 'css':
					$syntax = 'css';
	  				break;

				case 'js':
					$syntax = 'js';
					break;

				case 'xml':
					$syntax = 'xml';
					break;

	 			case 'php': case 'php3': case 'php4': case 'php5':
					$syntax = 'php';
	  				break;

				default:
					$syntax = 'php';
					break;
			}
		}
		return $syntax ;
	}
}

?>