//:Droplet to display the link bar from module MultiLingual
//:Use: [[iMultiLingual?ext=svg]]  show flags as 'png' or 'svg' or 'auto'-depended from browser(default)
/**
 * iMultiLingual.php
 *
 * @category     Addons
 * @package      Addons_Droplets
 * @copyright    M.v.d.Decken <manuela@isteam.de>
 * @author       M.v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        File available since 31.07.2013
 * @description  this Droplet displays the output from module MultiLingual<br />
 *               The image extensions are selectable.
 *
 * @param string $ext: name of the file extension for flags [ png | svn | auto(default) ]
 * @return: a valid image-URL or empty string
 */

$sExt = !isset($ext) ? 'auto' : strtolower($ext);
$sRetval = '';
if(function_exists('language_menu')){
	switch($sExt)
	{
		case 'png':
		case 'svg':
			break;
		default:
			$sExt = 'auto';
	}
	$sRetval = language_menu($sExt);
}
return $sRetval;



