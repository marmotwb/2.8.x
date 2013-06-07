<?php
/**
 *
 * @category        module
 * @package         Form
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL: svn://isteam.dynxs.de/wb_svn/wb280/branches/2.8.x/wb/modules/form/view.php $
 * @lastmodified    $Date: 2011-12-31 16:03:03 +0100 (Sa, 31. Dez 2011) $
 * @description
 */

// Must include code to stop this file being access directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

//Modulbeschreibung
$module_description = 'Mit diesem Modul k&ouml;nnen sie ein beliebiges Formular f&uuml;r ihre Seite erzeugen';

//Variablen fuer backend Texte
$MOD_FORM['SETTINGS'] = 'Formular Einstellungen';
$MOD_FORM['CONFIRM'] = 'Best&auml;tigung';
$MOD_FORM['SUBMIT_FORM'] = 'Absenden';
$MOD_FORM['EMAIL_SUBJECT'] = 'Sie haben eine Nachricht über {{WEBSITE_TITLE}} erhalten';
$MOD_FORM['SUCCESS_EMAIL_SUBJECT'] = 'Sie haben ein Forumlar über {{WEBSITE_TITLE}} gesendet';

$MOD_FORM['SUCCESS_EMAIL_TEXT']  = 'Vielen Dank f&uuml;r die &Uuml;bermittlung Ihrer Nachricht an {{WEBSITE_TITLE}}.';
$MOD_FORM['SUCCESS_EMAIL_TEXT'] .= 'Wir setzen uns schnellstens mit Ihnen in Verbindung.';

$MOD_FORM['SUCCESS_EMAIL_TEXT_GENERATED'] = "\n\n\n"
."**************************************************************\n"
."Dies ist eine automatisch generierte E-Mail. Die Absenderadresse dieser E-Mail\n"
."ist nur zum Versand, und nicht zum Empfang von Nachrichten eingerichtet!\n"
."Falls Sie diese E-Mail versehentlich erhalten haben, setzen Sie sich bitte\n"
."mit uns in Verbindung und löschen diese Nachricht von Ihrem Computer.\n"
."**************************************************************\n";

$MOD_FORM['REPLYTO'] = 'E-Mail beantworten';
$MOD_FORM['FROM'] = 'Absender';
$MOD_FORM['TO'] = 'Empf&auml;nger';

$MOD_FORM['EXCESS_SUBMISSIONS'] = 'Dieses Formular wurde zu oft aufgerufen. Bitte versuchen Sie es in einer Stunde noch einmal.';
$MOD_FORM['INCORRECT_CAPTCHA'] = 'Die eingegebene Pr&uuml;fziffer stimmt nicht &uuml;berein. Wenn Sie Probleme mit dem Lesen der Pr&uuml;fziffer haben, bitte schreiben Sie eine E-Mail an den <a href="mailto:{{webmaster_email}}">Webmaster</a>';

$MOD_FORM['PRINT']  = 'E-Mail Best&auml;tigung erfolgt nur an die g&uuml;ltige E-Mail Adresse eines jeweils angemeldeten Benutzers! Versand an ungepr&uuml;fte Adressen ist nicht m&ouml;glich! ';
$MOD_FORM['PRINT'] .= 'Drucken Sie bitte diese Nachricht aus!';

$MOD_FORM['REQUIRED_FIELDS'] = 'Bitte folgende Angaben erg&auml;nzen';
$MOD_FORM['RECIPIENT'] = 'E-Mail Best&auml;tigung erfolgt nur an die g&uuml;ltige E-Mail Adresse des jeweils angemeldeten Benutzers! Versand an ungepr&uuml;fte Adressen ist nicht m&ouml;glich!';
$MOD_FORM['ERROR'] = 'E-Mail konnte nicht gesendet werden!!';
$MOD_FORM['SPAM'] = 'ACHTUNG! Beantworten einer ungeprüften E-Mail kann als Spam abgemahnt werden! ';

$TEXT['GUEST'] = 'Gast';
$TEXT['UNKNOWN'] = 'unbekannt';
$TEXT['PRINT_PAGE'] = 'Seite drucken';
$TEXT['REQUIRED_JS'] = 'Javascript erforderlich';
$TEXT['SUBMISSIONS_PERPAGE'] = 'Anzeige gespeicherte Einträge pro Seite';
