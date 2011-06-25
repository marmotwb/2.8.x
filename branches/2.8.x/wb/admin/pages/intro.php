<?php
/**
 *
 * @category        admin
 * @package         pages
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

// Create new admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_intro');

// Get page content
$filename = WB_PATH.PAGES_DIRECTORY.'/intro'.PAGE_EXTENSION;
if(file_exists($filename)) {
	$handle = fopen($filename, "r");
	$content = fread($handle, filesize($filename));
	fclose($handle);
} else {
	$content = '';
}

if(!isset($_GET['wysiwyg']) OR $_GET['wysiwyg'] != 'no') {
	if (!defined('WYSIWYG_EDITOR') OR WYSIWYG_EDITOR=="none" OR !file_exists(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php')) {
		function show_wysiwyg_editor($name,$id,$content,$width,$height) {
			echo '<textarea name="'.$name.'" id="'.$id.'" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
		}
	} else {
		$id_list=array('content');
		require(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php');
	}
}
?>


<form action="intro2.php" method="post">

<input type="hidden" name="page_id" value="{PAGE_ID}" />

<?php
show_wysiwyg_editor('content','content',$content,'100%','500px');
?>

<table cellpadding="0" cellspacing="0" border="0" class="form_submit">
<tr>
	<td class="left">
		<input type="submit" value="<?php echo $TEXT['SAVE'];?>" class="submit" />
	</td>
	<td class="right">
		<input type="button" value="<?php echo $TEXT['CANCEL'];?>" onclick="javascript: window.location = 'index.php';" class="submit" />
	</td>
</tr>
</table>

</form>
<?php
// Print admin footer
$admin->print_footer();

?>