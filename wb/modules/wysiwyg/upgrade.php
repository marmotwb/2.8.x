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
 * @version      	$Id$
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

if(!function_exists('mod_wysiwyg_upgrade'))
{
    function mod_wysiwyg_upgrade () {
        global $database,$bDebugModus;
        $callingScript = $_SERVER["SCRIPT_NAME"];
        // check if upgrade startet by upgrade-script to echo a message
        $tmp = 'upgrade-script.php';
        $globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;

        $msg = array();
        $aTable = array('mod_wysiwyg');
        for($x=0; $x<sizeof($aTable);$x++) {
        	if(($sOldType = $database->getTableEngine(TABLE_PREFIX.$aTable[$x]))) {
        		if(('myisam' != strtolower($sOldType))) {
        			if(!$database->query('ALTER TABLE `'.TABLE_PREFIX.$aTable[$x].'` Engine = \'MyISAM\' ')) {
        				$msg[] = $database->get_error();
        			} else{
                        $msg[] = 'TABLE `'.TABLE_PREFIX.$aTable[$x].'` changed to Engine = \'MyISAM\'';
        			}
        		} else {
                 $msg[] = 'TABLE `'.TABLE_PREFIX.$aTable[$x].'` has Engine = \'MyISAM\'';
        		}
        	} else {
        		$msg[] = $database->get_error();
        	}
        }

        $sTable = TABLE_PREFIX.'mod_wysiwyg';
        if($database->index_exists($sTable, 'PRIMARY')) {
            $sql = 'ALTER TABLE `'.DB_NAME.'`.`'.$sTable.'` DROP PRIMARY KEY';
            if(!$database->query($sql)) {
                $msg[] = ''.$database->get_error().'';
            }
        }

        if(!$database->index_add($sTable, '', 'section_id', 'PRIMARY')) {
        	$msg[] = ''.$database->get_error().'';
        } else {
            $msg[] = 'Create PRIMARY KEY ( `section_id` )';
        }

        // change internal absolute links into relative links
        $sTable = TABLE_PREFIX.'mod_wysiwyg';
        $sql  = 'UPDATE `'.$sTable.'` ';
        $sql .= 'SET `content` = REPLACE(`content`, \'"'.WB_URL.MEDIA_DIRECTORY.'\', \'"{SYSVAR:MEDIA_REL}\')';
        if (!$database->query($sql)) {
        	$msg[] = ''.$database->get_error().'';
        } else {
            $msg[] = 'Change internal absolute links into relative links';
        }
        // only for upgrade-script
        if($globalStarted) {
            if($bDebugModus) {
                foreach($msg as $title) {
                    echo '<strong>'.$title.'</strong><br />';
                }
            }
        }
        return $msg;
    }
}
// ------------------------------------

$msg = mod_wysiwyg_upgrade();
