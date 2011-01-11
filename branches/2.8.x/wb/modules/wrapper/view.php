<?php
/**
 *
 * @category        modules
 * @package         wrapper
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version      	$Id$
 * @filesource		$HeadURL: http://svn.websitebaker2.org/branches/2.8.x/wb/modules/wrapper/install.php $
 * @lastmodified    $Date: 2011-01-10 13:21:47 +0100 (Mo, 10 Jan 2011) $
 *
 */

// check if module language file exists for the language set by the user (e.g. DE, EN)
if(!file_exists(WB_PATH .'/modules/wrapper/languages/'.LANGUAGE .'.php')) {
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH .'/modules/wrapper/languages/EN.php');
} else {
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH .'/modules/wrapper/languages/'.LANGUAGE .'.php');
}

// get url
$get_settings = $database->query("SELECT url,height FROM ".TABLE_PREFIX."mod_wrapper WHERE section_id = '$section_id'");
$fetch_settings = $get_settings->fetchRow();
$url = ($fetch_settings['url']);

?>
<iframe src="<?php echo $url; ?>" width="100%" height="<?php echo $fetch_settings['height']; ?>" frameborder="0" scrolling="auto">
<?php echo $MOD_WRAPPER['NOTICE']; ?>
<a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a>
</iframe>