<?php
/**
 *
 * @category        admin
 * @package         admintools
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

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
require_once(WB_PATH.'/framework/functions.php');

if(!isset($_GET['tool'])) {
	header("Location: index.php");
	exit(0);
} else {
	$array = array();
	preg_match("/[a-z,_,a-z]+/i",$_GET['tool'],$array);
	$tool = $array[0];
}

$ModulesUsingFTAN = '';
$admin_header =  true;
if(isset($_POST['save_settings'])) {
	$ModulesUsingFTAN = WB_PATH.'/modules/'.$tool.'/FTAN_SUPPORTED';
}

$admin_header = (file_exists($ModulesUsingFTAN) && is_file($ModulesUsingFTAN)) == false;
$admin = new admin('admintools', 'admintools', $admin_header );

// Check if tool is installed
$result = $database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'module' AND function = 'tool' AND directory = '".preg_replace("/\W/", "", $tool)."'");
if($result->numRows() == 0) {
	header("Location: index.php");
	exit(0);
}
$tools = $result->fetchRow();
if(!isset($_POST['save_settings'])) {

?>
<h4>
	<a href="<?php echo ADMIN_URL; ?>/admintools/index.php"><?php echo $HEADING['ADMINISTRATION_TOOLS']; ?></a>
	&raquo;
	<?php echo $tools['name']; ?>
</h4>
<?php
}
require(WB_PATH.'/modules/'.$tools['directory'].'/tool.php');

$admin->print_footer();
