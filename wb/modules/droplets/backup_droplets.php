<?php
/**
 *
 * @category        module
 * @package         droplet
 * @author          Ruud Eisinga (Ruud) John (PCWacht), WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */



// tool_edit.php
require_once('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
if(!function_exists('insertDropletFile')) { require('droplets.functions.php'); }

require_once(WB_PATH.'/framework/functions.php');
// create admin object depending on platform (admin tools were moved out of settings with WB 2.7)
$admin = new admin('admintools', 'admintools');
$admintool_link = ADMIN_URL .'/admintools/index.php';
$module_edit_link = ADMIN_URL .'/admintools/tool.php?tool=droplets';
$sOverviewDroplets = $TEXT['LIST_OPTIONS'];

// protect from CSRF
$id = intval($admin->checkIDKEY('id', false, 'GET'));
if (!$id or $id != 999) {
 $admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], $module_edit_link);
}

?>
<div class="droplets" style="margin-top: 6px;">
<h4 style="margin: 0; border-bottom: 1px solid #DDD; padding-bottom: 5px;">
	<a href="<?php echo $admintool_link;?>" title="<?php echo $HEADING['ADMINISTRATION_TOOLS']; ?>"><?php echo $HEADING['ADMINISTRATION_TOOLS']; ?></a>
	<span> &raquo; </span>
	<a href="<?php echo $module_edit_link;?>" title="<?php echo $sOverviewDroplets ?>" alt="<?php echo $sOverviewDroplets ?>">Droplet Overview</a>
</h4>
<?php

$OK  = ' <span style="color:#006400; font-weight:bold;">OK</span> ';
$FAIL = ' <span style="color:#ff0000; font-weight:bold;">FAILED</span> ';
$sBackupName = strftime('%Y%m%d_%H%M%S', time()+ TIMEZONE ).'_droplets.zip';
$tempDir = '/temp/droplets/';
$tempFile = $tempDir.$sBackupName;
// delete old backup
if(is_writeable(dirname(WB_PATH.$tempDir))) {
	rm_full_dir ( WB_PATH.$tempDir );
}

$msg = createFolderProtectFile(rtrim( WB_PATH.$tempDir,'/') );
if(sizeof($msg)) {
	print '<h4 class="warning">';
	echo implode('<br />',$msg).'<br />'.$MESSAGE['MEDIA_DIR_NOT_MADE'].'<br />';
	print '</h4>';
}
$sFilesToZip = backupDropletFromDatabase(WB_PATH.$tempDir);
// remove last comma
$sFilesToZip = rtrim($sFilesToZip,',');

echo '<br />Create archive: <strong>'.$sBackupName.'</strong><br />';

if( !class_exists('PclZip',false) ) { require(WB_PATH.'/include/pclzip/pclzip.lib.php'); }
$archive = new PclZip(WB_PATH.$tempFile);

$archiveList = $archive->create($sFilesToZip , PCLZIP_OPT_REMOVE_ALL_PATH );

if ($archiveList == 0){
	echo "Packaging error: '.$archive->errorInfo(true).'";
	die("Error : ".$archive->errorInfo(true));
}
elseif(is_readable(WB_PATH.$tempFile)) {
	echo '<br /><ol>';
	foreach($archiveList AS $key=>$aDroplet ) {
		echo '<li>Backup <strong> '.$aDroplet['stored_filename'].'</strong></li>';
	}
	echo '</ol><br /><br />Backup created - <a href="'.WB_URL.$tempFile.'">Download</a>';
}
else {
	echo '<br /><br />Backup not created - <a href="'.$module_edit_link.'">'.$TEXT['BACK'].'</a>';
}
echo '</div>';
$admin->print_footer();
