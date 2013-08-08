<?php
/**
 *
 * @category        module
 * @package         droplet
 * @author          Ruud Eisinga (Ruud) John (PCWacht)
 * @author          WebsiteBaker Project
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id: upgrade.php 1717 2012-08-29 14:09:09Z Luisehahne $
 * @filesource      $HeadURL: svn://isteam.dynxs.de/wb_svn/wb280/branches/2.8.x/wb/modules/droplets/upgrade.php $
 * @lastmodified    $Date: 2012-08-29 16:09:09 +0200 (Mi, 29. Aug 2012) $
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {

	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}

/* -------------------------------------------------------- */

function prepareDropletToFile($aDroplet) {
	$retVal = '';
	$sDescription = '//:'.($aDroplet['description']!='') ? $aDroplet['description']: 'Desription';
	$sComments = '';
	$aComments = explode("\n",$aDroplet['comments']);
	$sCode = '';
	$aCode = explode("\n",$aDroplet['code']);
	if( (sizeof($aComments)) ){
		foreach($aComments AS $isComment) {
			$sComments .= '//:'.$isComment;
		}
	} else {
		$sComments .= '//:use [['.$aDroplet['name'].']]';
	}
	if( (sizeof($aCode)) ){
		foreach($aCode AS $isCode) {
			$sCode .= $isCode;
		}
	}
 
	$retVal = $sDescription."\n".$sComments."\n".$sCode;
	return $retVal;
}
// 
function backupDropletFromDatabase($sTmpDir) {
	$retVal = '';
	$database=WbDatabase::getInstance();
	$sql = 'SELECT `name`,`description`,`comments`,`code`  FROM `'.$database->TablePrefix.'mod_droplets` '
	     . 'ORDER BY `modified_when` DESC';
	if( $oRes = $database->query($sql) ) {
		while($aDroplet = $oRes->fetchRow(MYSQL_ASSOC)) {
			$sData = prepareDropletToFile($aDroplet);
			$sFileName = $sTmpDir.$aDroplet['name'].'.php';
			if(file_put_contents($sFileName,$sData)) {
				$retVal .= $sFileName.',';
			}
		}
		
	}
	return $retVal;
}


function insertDropletFile($aDropletFiles,&$msg,$bOverwriteDroplets,$admin)
{
	$OK  = ' <span style="color:#006400; font-weight:bold;">OK</span> ';
	$FAIL = ' <span style="color:#ff0000; font-weight:bold;">FAILED</span> ';
	$oDb = WbDatabase::getInstance();
	foreach ($aDropletFiles as $sDropletFile) {
		$msgSql = '';
		$extraSql = '';
		$sDropletName = pathinfo ($sDropletFile, PATHINFO_FILENAME);
		$sql = 'SELECT `name` FROM `'.$oDb->TablePrefix.'mod_droplets` '
		     . 'WHERE `name` LIKE \''.addcslashes($oDb->escapeString($sDropletName), '%_').'\' ';
		if( !( $sTmpName = $oDb->get_one($sql)) )
		{
			$sql = 'INSERT INTO `'.$oDb->TablePrefix.'mod_droplets`';
			$msgSql = 'INSERT Droplet `'.$oDb->escapeString($sDropletName).'` INTO`'.$oDb->TablePrefix.'mod_droplets`'." $OK";
		} elseif ($bOverwriteDroplets) 
		{
			$sDropletName = $sTmpName;
			$sql = 'UPDATE `'.$oDb->TablePrefix.'mod_droplets` ';
			$extraSql = 'WHERE `name` = \''.addcslashes($oDb->escapeString($sDropletName), '%_').'\' ';
			$msgSql = 'UPDATE Droplet `'.$sDropletName.'` INTO`'.$oDb->TablePrefix.'mod_droplets`'." $OK";
		}
// get description, comments and oode
		$sDropletFile = preg_replace('/^\xEF\xBB\xBF/', '', $sDropletFile);
		if( ($msgSql!='') && ($aFileData = file($sDropletFile)) ) {
				$bDescription = false;
				$bComments = false;
				$bCode = false;
				$sDescription = '';
				$sComments = '';
				$sCode = '';
				$sPattern = "#//:#im";
				while ( sizeof($aFileData) > 0 ) {
					$sSqlLine = trim(array_shift($aFileData));
					$isNotCode = (bool)preg_match($sPattern, $sSqlLine);
					if( $isNotCode==true ) {
// first step line is description
						if($bDescription==false) {
							$sDescription .= str_replace('//:','',$sSqlLine);
							$bDescription = true;
						} else {
// second step fill comments
							$sComments .= str_replace('//:','',$sSqlLine).PHP_EOL;
						}
					} else {
// third step fill code
						$sCode .= str_replace('//:','',$sSqlLine).PHP_EOL;
					}
				}
			$iModifiedWhen = time();
			$iModifiedBy = (method_exists($admin, 'get_user_id') && ($admin->get_user_id()!=null) ? $admin->get_user_id() : 1);
			$sql .= 'SET  `name` =\''.$oDb->escapeString($sDropletName).'\','
				 .       '`description` =\''.$oDb->escapeString($sDescription).'\','
				 .       '`comments` =\''.$oDb->escapeString($sComments).'\','
				 .       '`code` =\''.$oDb->escapeString($sCode).'\','
				 .       '`modified_when` = '.$iModifiedWhen.','
				 .       '`modified_by` = '.$iModifiedBy.','
				 .       '`active` = 1'
				 .       $extraSql;
		}
		if( $oDb->query($sql) ) {
			if( $msgSql!='' ) { $msg[] = $msgSql; }
		} else {
			$msg[] = $oDb->get_error();
		}
	}
	return;
}
/* -------------------------------------------------------- */

function isDropletFile($sFileName)
{
	$bRetval = false;
	$matches = array();
	if(($sFileData = file_get_contents($sFileName)) !== false)
	{
//		$sPattern = "#(?://:)+[\w]*\w?#is";
//		$sPattern = "#//:[\w].+#imS";
		$sPattern = "#//:#im";
		$bRetval = (bool)preg_match_all($sPattern, $sFileData, $matches, PREG_SET_ORDER);
	}
	return $bRetval;
}

/* -------------------------------------------------------- */
	function getDropletFromFiles($sBaseDir)
	{
		$aRetval = array();
		$oIterator = new DirectoryIterator($sBaseDir);
		foreach ($oIterator as $fileInfo) {
		// iterate the directory
			if($fileInfo->isDot()) continue;
			$sFileName = rtrim(str_replace('\\', '/', $fileInfo->getPathname()), '/');
			if($fileInfo->isFile()) {
			// only droplets are interesting
				if((file_exists($sFileName) && isDropletFile($sFileName))) {
				// if dir has no corresponding accessfile remember it
					$aRetval[] = $sFileName;
				}
			}
		}
		return $aRetval;
	}
