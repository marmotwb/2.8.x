<?php
/**
 *
 * @category        modules
 * @package         wysiwyg
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

if(!defined('WB_PATH')) exit('Direct access to this file is not allowed');

// Get page content
$query = "SELECT content FROM ".TABLE_PREFIX."mod_wysiwyg WHERE section_id = '$section_id'";
$get_content = $database->query($query);
$content = $get_content->fetchRow();
$content = (htmlspecialchars($content['content']));

if(!isset($wysiwyg_editor_loaded)) {
	$wysiwyg_editor_loaded=true;

	if (!defined('WYSIWYG_EDITOR') OR WYSIWYG_EDITOR=="none" OR !file_exists(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php')) {
		function show_wysiwyg_editor($name,$id,$content,$width,$height) {
			echo '<textarea name="'.$name.'" id="'.$id.'" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
		}
	} else {
		$id_list=array();
		$query_wysiwyg = $database->query("SELECT section_id FROM ".TABLE_PREFIX."sections WHERE page_id = '$page_id' AND module = 'wysiwyg'");
		if($query_wysiwyg->numRows() > 0) {
			while($wysiwyg_section = $query_wysiwyg->fetchRow()) {
				$entry='content'.$wysiwyg_section['section_id'];
				array_push($id_list,$entry);
			}
			require(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php');
		}
	}
}

?>

<script language="javascript" type="text/javascript">
//<![CDATA[
  // Added to confirm leaving the page without saving changes first (even if there aren't any)
  var needToConfirm = <?php echo WARN_PAGE_LEAVE; ?>;
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    if (needToConfirm)
      return "<?php print(html_entity_decode($MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'], ENT_NOQUOTES, 'UTF-8')); ?>";
  }
//]]>
</script>

<form name="wysiwyg<?php echo $section_id; ?>" action="<?php echo WB_URL; ?>/modules/wysiwyg/save.php" method="post" onclick="needToConfirm=false;">

<input type="hidden" name="page_id" value="<?php echo $page_id; ?>" />
<input type="hidden" name="section_id" value="<?php echo $section_id; ?>" />

<?php
echo $admin->getFTAN()."\n"; 
show_wysiwyg_editor('content'.$section_id,'content'.$section_id,$content,'100%','350');
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-bottom: 10px;">
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