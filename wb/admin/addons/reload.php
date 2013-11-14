<?php
/**
 *
 * @category        WBCore
 * @package         WBCore_addons
 * @author          Werner v.d.Decken
 * @copyright       Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @revision        $Revision$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 */

/**
 * loop through all resource directories of one type and reload the resources
 * @param string $sType type of resource ( module / template / language )
 * @return bool
 */
	function ReloadAddonLoop($sType)
	{
		global $database;
		$sql = 'DELETE FROM `'.TABLE_PREFIX.'addons` WHERE `type`=\''.$sType.'\'';
		try{
			if(!$database->query($sql)) {
				throw new Exception('database error');
			}
			$oIterator = new DirectoryIterator(WB_PATH.'/'.$sType.'s');
			$_Function = 'load_'.$sType;
			foreach ($oIterator as $oFileinfo) {
				if( ( $oFileinfo->isFile() &&
					   $sType == 'language' &&
					   preg_match('/^([A-Z]{2}.php)/', $oFileinfo->getBasename())
					) ||
				    ($oFileinfo->isDir() && $sType != 'language')
				  )
				{
					if(substr($oFileinfo->getBasename(), 0,1) != '.') {
						$_Function($oFileinfo->getPathname());
					}
				}
			}
		}catch(Exception $e) {
			return false;
		}
        $sTransCachePath = WB_PATH.'/temp/TranslationTable/cache/';
        if(is_writeable($sTransCachePath) && ($sType = 'language') ) {
        	rm_full_dir ( $sTransCachePath,true );
        }
		return true;
	}
/**
 * check if user has permissions to access this file
 */
// include all needed core files and check permission
	require_once('../../config.php');
	require_once('../../framework/class.admin.php');
	$aMsg = array();
	$aErrors = array();
// check user permissions for admintools (redirect users with wrong permissions)
	$admin = new admin('Admintools', 'admintools', false, false);
	if ($admin->get_permission('admintools'))
	{
		require_once(WB_PATH . '/framework/functions.php');
		require_once(WB_PATH . '/languages/' . LANGUAGE .'.php');
	// recreate Admin object without admin header
		$admin = new admin('Addons', '', false, false);
		$js_back = ADMIN_URL . '/addons/index.php?advanced';
	// check transaction
		if ($admin->checkFTAN())
		{
		// start the selected action
			if(isset($_POST['cmdCopyTheme']))
			{
				$sNewTheme = (isset($_POST['ThNewTheme']) ? $_POST['ThNewTheme'] : '');
				require(dirname(__FILE__).'/CopyTheme.php');
				$ct = new CopyTheme();
				$ct->execute(THEME_PATH, $sNewTheme);
				if($ct->isError()) {
					$aErrors[] = $ct->getError();
				}else {
					$aMsg[] = $TEXT['THEME_COPY_CURRENT'].' :: '.$MESSAGE['GENERIC_COMPARE'];
				}
				unset($ct);
		// ---------------------------
			}elseif(isset($_POST['cmdCopyTemplate']))
			{
				$aFileList = (isset($_POST['ThTemplate']) ? $_POST['ThTemplate'] : array());
				require(dirname(__FILE__).'/CopyThemeHtt.php');
				$x = CopyThemeHtt::doImport($aFileList);
				if(is_null($x)) {
					$aMsg[] = $TEXT['THEME_IMPORT_HTT'].' :: '.$MESSAGE['GENERIC_COMPARE'];
				}else {
					$aErrors = array_merge($aErrors, $x);
				}
		// ---------------------------
			}elseif(isset($_POST['cmdReload']))
			{
				$aReloadType = (isset($_POST['reload']) && is_array($_POST['reload'])) ? $_POST['reload'] : array();
				foreach($aReloadType as $sType) {
					$sType = rtrim($sType, 's');
					switch($sType) {
						case 'module':
						case 'template':
						case 'language':
						// reload all addons from given type
							if(ReloadAddonLoop($sType)) {
								$aMsg[] = $MESSAGE['ADDON_'.strtoupper($sType).'S_RELOADED'];
							}else {
								$aErrors[] = $MESSAGE['ADDON_ERROR_RELOAD'];
							}
							break;
						default:
							$aErrors[] = $MESSAGE['GENERIC_NOT_COMPARE'].' ['.$sType.']';
							break;
					}
				}
			}else {
		// ---------------------------
				$aErrors[] = $MESSAGE['ADDON_ERROR_RELOAD'];
			}
		}else { // invalid FTAN
			$aErrors[] = $MESSAGE['GENERIC_SECURITY_ACCESS'];
		}
	}else { // no permission
		$aErrors[] = $MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'];
	}
	if(sizeof($aErrors) > 0)  {
// output error message
		$admin->print_header();
		$admin->print_error(implode('<br />', $aErrors), $js_back);
	}else {
// output success message
		$admin->print_header();
		$admin->print_success(implode('<br />', $aMsg), $js_back);
		$admin->print_footer();
	}
