<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false)
{
	die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
}
/* -------------------------------------------------------- */


// set template file and assign module and template block
	$oTpl = new Template(dirname(__FILE__).'/htt','keep');
	$oTpl->set_file('page', 'confirm.htt');
	$oTpl->debug = false; // false, true
	$oTpl->set_block('page', 'main_block', 'main');
	$oTpl->set_var(array(
		'FTAN' => $wb->getFTAN(),
		'ACTION_URL' => WB_URL.'/account/confirm.php',
		'WB_URL' => WB_URL,
		'THEME_URL' => THEME_URL,
		'HTTP_REFERER' => isset($_SESSION['HTTP_REFERER']) ? $_SESSION['HTTP_REFERER'] : WB_URL,
		'CONFIRM_CODE' => $sConfirmationId,
		'MESSAGE_VALUE' => '',
		'ERROR_VALUE' => '',
		'HEADING_SIGNUP' => $mLang->HEADING_SIGNUP2_CONFIMED_REGISTRATION,
		'TEXT_LANGUAGE' => $TEXT['LANGUAGE'],
		'HELP_CONFIRM_PASSWORD' => $mLang->HELP_CONFIRM_PASSWORD,
		'HEADING_MESSAGE_WELCOME' => $mLang->HEADING_MESSAGE_WELCOME,
		'TEXT_SIGNUP' => $mLang->TEXT_ACTIVATION,
		'TEXT_RESET' => $TEXT['RESET'],
		'TEXT_CANCEL' => $TEXT['CANCEL'],
		)
	);
//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.$sSubmitAction.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//print_r( $sConfirmationId ); print '</pre>';

	$sSelected = ' selected="selected"';
	$checked   = ' checked="checked"';
// show messages, default block off
	$oTpl->set_block('main_block', 'message_block', 'message');
	$oTpl->parse('message', '');
	if( ($msg = msgQueue::getError()) != '')
	{
		$output = $wb->format_message($msg, 'error');
		$oTpl->set_var('MESSAGE_VALUE',$output);
		$oTpl->parse('message', 'message_block', true);
	}
	$oTpl->set_var('MESSAGE','');

	$oTpl->set_block('main_block', 'asp_block', 'asp');
	if(ENABLED_ASP) {
		$oTpl->set_var('DISPLAY_ASP','nixhier');
		$oTpl->parse('asp', 'asp_block', true);
	} else {
		$oTpl->parse('asp', '', true);
	}

	$oTpl->set_var(array(
			'DISPLAY_USER' => '',
			'TEXT_USERNAME' => $mLang->TEXT_USERNAME,
			'TEXT_PASSWORD' => $mLang->TEXT_PASSWORD,
			)
		);

	// Parse template object
	$oTpl->parse('main', 'main_block', false);
	$output = $oTpl->finish($oTpl->parse('output', 'page'));
	unset($oTpl);
	print $output;
