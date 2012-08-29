<?php
/**
 *
 * @category        modules
 * @package         SecureFormSwitcher
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.2
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

//Module description
$module_description = 'This module switch between the <strong>SingleTab SecureForm</strong> and <strong>MultiTab SecureForm</strong>.';

// Backend variables
$SFS_TEXT['TEXT_SWITCH'] = 'Change';
$SFS_TEXT['TXT_FTAN_SWITCH'] = 'Change to ';
$SFS_TEXT['SECURE_FORM'] = 'SingleTab SecureForm';
$SFS_TEXT['SECURE_FORMMTAB'] = 'Multitab SecureForm';
$SFS_TEXT['FILE_FORMTAB_NOT_FOUND'] = '<strong>Multitab not possible!<br />Needed file \'/framework/SecureForm.mtab.php\' not found!</strong><br />
<span>You have to upload the file manually via FTP</span>';
$SFS_TEXT['SUBMIT_FORM'] = 'Single Tab (recommended)';
$SFS_TEXT['SUBMIT_FORMTAB'] = 'Multi Tab';
$SFS_TEXT['SUBMIT'] = 'Accept';
$SFS_TEXT['INFO'] = 'Please select if you want to use the default security settings or the settings for working with several WebsiteBaker instances in parallel browser tabs.';
$SFS_TEXT['RESET_SETTINGS'] = 'Default setting';
$SFS_TEXT['ON'] = 'ON';
$SFS_TEXT['OFF'] = 'OFF';

$CAPTION['WB_SECFORM_USEIP'] = 'IP-Blocks <i>(1-4, 0=no check)</i>';
$CAPTION['WB_SECFORM_TOKENNAME'] = 'Tokenname';
$CAPTION['WB_SECFORM_SECRET'] = 'Secret <i>(whatever you like)</i>';
$CAPTION['WB_SECFORM_SECRETTIME'] = 'Secrettime';
$CAPTION['WB_SECFORM_TIMEOUT'] = 'Timeout';
$CAPTION['WB_SECFORM_USEFP'] = 'Fingerprinting';

// Variablen fuer AdminTool Optionen
$HELP['WB_SECFORM_USEIP'] = '<span>These number of segments of an IP address can be used for the fingerprint. ';
$HELP['WB_SECFORM_USEIP'] = '<b>4</b> means the whole IP address (this makes sense e.g. for servers with a stable IP address). ';
$HELP['WB_SECFORM_USEIP'] = '<b>2</b> is a good compromise, because at home there\'s often the 24-hour reset and therefore only the first two segments keep constant. ';
$HELP['WB_SECFORM_USEIP'] = '<ul><li>4= xxx.xxx.xxx.xxx</li><li>3= xxx.xxx.xxx</li><li>2= xxx.xxx</li><li>1= xxx</li><li>0= no usage of the IP</li></ul></span>';
$HELP['WB_SECFORM_TOKENNAME'] = '<span>The name of the token. Coll. a token is often called TAN.</span>';
$HELP['WB_SECFORM_SECRET'] = '<span>A random key, that is being used for creating a TAN. Recommend are at least 20 digits.</span>';
$HELP['WB_SECFORM_SECRETTIME'] = '<span>Time (in seconds), until the secret-key will be renewed.</span>';
$HELP['WB_SECFORM_TIMEOUT'] = '<span>Time (in seconds), until the form-token is void.</span>';
$HELP['WB_SECFORM_USEFP'] = '<span>Require OS and browser for every TAN-validation additionally to the IP-address.</span>';
