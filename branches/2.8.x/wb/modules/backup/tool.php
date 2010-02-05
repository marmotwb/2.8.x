<?php
/**
 *
 * @category        modules
 * @package         backup
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

// Direct access prevention
defined('WB_PATH') OR die(header('Location: ../index.php'));

// check if module language file exists for the language set by the user (e.g. DE, EN)
if(!file_exists(WB_PATH .'/modules/backup/languages/'.LANGUAGE .'.php')) {
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH .'/modules/backup/languages/EN.php');
} else {
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH .'/modules/backup/languages/'.LANGUAGE .'.php');
}

// Show form
?>
<br />
<form name="prompt" method="post" action="<?php echo WB_URL; ?>/modules/backup/backup-sql.php">
		<input type="radio" checked="checked" name="tables" value="ALL"><?php echo $MOD_BACKUP['BACKUP_ALL_TABLES']; ?><br>
		<input type="radio" name="tables" value="WB"><?php echo $MOD_BACKUP['BACKUP_WB_SPECIFIC']; ?><br><br> 
	<input type="submit" name="backup" value="<?php echo $TEXT['BACKUP_DATABASE']; ?>" onClick="javascript: if(!confirm('<?php echo $MESSAGE['GENERIC']['PLEASE_BE_PATIENT']; ?>')) { return false; }" />
</form>