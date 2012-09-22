<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

if(!function_exists('mod_form_upgrade'))
{
    function mod_form_upgrade() {
        $msg = array();
        global $database,$bDebugModus;
        $callingScript = $_SERVER["SCRIPT_NAME"];
        // check if upgrade startet by upgrade-script to echo a message
        $tmp = 'upgrade-script.php';
        $globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;
        $aTable = array('mod_form_fields','mod_form_settings','mod_form_submissions');
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

        $table_name = TABLE_PREFIX.'mod_form_settings';
        $field_name = 'perpage_submissions';
        $description = "INT NOT NULL DEFAULT '10' AFTER `max_submissions`";
        if(!$database->field_exists($table_name,$field_name)) {
        	$database->field_add($table_name, $field_name, $description);
            $msg[] = 'Add field `perpage_submissions` AFTER `max_submissions`';
        } else {
            $msg[] = 'Field `perpage_submissions` already exists';
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

$msg = mod_form_upgrade();
