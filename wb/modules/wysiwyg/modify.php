<?php
/**
 *
 * @category        modules
 * @package         wysiwyg
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.3
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

$sMediaUrl = WB_URL.MEDIA_DIRECTORY;
// Get page content
$sql = 'SELECT `content` FROM `'.TABLE_PREFIX.'mod_wysiwyg` WHERE `section_id`='.(int)$section_id;
if ( ($content = $database->get_one($sql)) !== null  ) {
 $content = htmlspecialchars(str_replace('{SYSVAR:MEDIA_REL}', $sMediaUrl, $content));
} else {
 $content = 'There is an relation error in the database.';
 $sql = 'INSERT INTO `'.TABLE_PREFIX.'mod_wysiwyg` SET '
      .     '`section_id`='.$section_id.', '
      .     '`page_id`='.$page_id.', '
      .     '`content`=\''.$content.'\', '
      .     '`text`=\''.$content.'\'';
 if($database->query($sql)) {
  $content .= ' WebsiteBaker has solved this problem successful.';
 }else {
  throw new AppException('Database: missing entry in table \''.TABLE_PREFIX.'mod_wysiwyg\' for section_id='.$section_id);
 }
}
if(!isset($wysiwyg_editor_loaded)) {
	$wysiwyg_editor_loaded=true;
	if(!function_exists('show_wysiwyg_editor'))
	{
		if (!defined('WYSIWYG_EDITOR') OR WYSIWYG_EDITOR=="none" OR !file_exists(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php'))
		{
			function show_wysiwyg_editor($name,$id,$content,$width,$height)
			{
				echo '<textarea name="'.$name.'" id="'.$id.'" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
			}
		} else {
			require(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php');
		}
	}
}

?>
<form name="wysiwyg<?php echo $section_id; ?>" action="<?php echo WB_URL; ?>/modules/wysiwyg/save.php" method="post">
	<input type="hidden" name="page_id" value="<?php echo $page_id; ?>" />
	<input type="hidden" name="section_id" value="<?php echo $section_id; ?>" />
<?php
echo $admin->getFTAN()."\n";
echo show_wysiwyg_editor('content'.$section_id,'content'.$section_id,$content,'100%','350');
?>
	<table summary="" cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-bottom: 10px;">
		<tr>
			<td align="left">
				<input type="submit" value="<?php echo $TEXT['SAVE']; ?>" style="width: 100px; margin-top: 5px;" />
			</td>
			<td align="right">
				<input type="button" value="<?php echo $TEXT['CANCEL']; ?>" onclick="javascript: window.location = 'index.php';" style="width: 100px; margin-top: 5px;" />
			</td>
		</tr>
	</table>
</form>
<br />
