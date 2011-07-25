<?php
/**
 *
 * @category        modules
 * @package         SecureFormSwitcher
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.2
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description
 *
 */
/* ************************************************************************** */

if(defined('WB_PATH') == false)
{
	die(" <head><title>Access denied</title></head><body><h2 style=\"color:red;margin:3em auto;text-align:center;\">Cannot access this file directly.</h2></body>");
}

$mod_path = (dirname(__FILE__));
$dlg_lang_dir = $mod_path.'/languages/';
if(file_exists($dlg_lang_dir)){
	$dlg_lang = file_exists($dlg_lang_dir.LANGUAGE.'.php') ? LANGUAGE : 'EN';
	require_once($dlg_lang_dir.$dlg_lang.'.php');
}

//  iconv_set_encoding("output_encoding", "ISO-8859-1");
if(!function_exists('convert_charset'))
{
	function convert_charset(&$val, $key, $vars) {
		$val = iconv($vars['0'], $vars['1'].'//TRANSLIT', ($val));
	}
}
if( strtolower(DEFAULT_CHARSET) != 'utf-8') {
	$in_charset = 'utf-8';
	$out_charset = DEFAULT_CHARSET;
	array_walk_recursive($SFS_TEXT,'convert_charset',array($in_charset, $out_charset));
}

