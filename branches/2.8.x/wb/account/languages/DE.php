<?php
/**
  Module developed for the Open Source Content Management System Website Baker (http://websitebaker.org)
  Copyright (C) 2008, ISTeam, Werner von der Decken
  Contact me: wkl(at)isteam.de, http://isteam.de

  This module is free software. You can redistribute it and/or modify it
  under the terms of the GNU General Public License  - version 2 or later,
  as published by the Free Software Foundation: http://www.gnu.org/licenses/gpl.html.

  This module is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

 -----------------------------------------------------------------------------------------
  DEUTSCHE SPRACHDATEI FUER DAS PREFERENCES MODUL
 -----------------------------------------------------------------------------------------
	UPDATE HISTORY:
	Luisehahne; 11.06.2012
	 + release der Deutschen Sprachdatei
	Werner von der Decken; 17.05.2008
	 + erstes release der Deutschen Sprachdatei
 -----------------------------------------------------------------------------------------
**/

// Array fuer alle sprachabhaengigen Textausgaben im Front- und Backend
// Hinweis: Verwende nachfolgende Namenskonvention für die Sprachausgabe des Moduls: $MOD_MODULE_DIRECTORY
$MOD_PREFERENCE = array(
	'PLEASE_SELECT' => 'bitte w&auml;hlen',
	'DETAILS_SAVED'	=> 'allgemeine Einstellungen ge&auml;ndert',
	'SAVE_SETTINGS' => 'Einstellungen speichern',
	'SAVE_EMAIL' => 'Email speichern',
	'SAVE_PASSWORD' => 'Passwort speichern',
);

$HEADING['SIGNUP2_CONFIMED_REGISTRATION'] = 'Kontofreischaltung';
$HEADING['MESSAGE_WELCOME'] = 'Herzlich willkomen zur Freischaltung Ihres Konto';

$HELP['SIGNUP_REMEMBER_PASSWORD'] = '<i>Bitte merken Sie sich Ihr Kennwort! Sie ben&ouml;tigen das Kennwort um die Aktivierung abzuschliessen!</i>';
$HELP['CONFIRM_PASSWORD'] = '<i>Geben Sie bitte Ihr Kennwort ein um die Aktivierung abzuschliessen!</i>';

$MESSAGE['ACTIVATED_NEW_USER'] = '<b>Das Konto wurde freigeschaltet. Sie können sich einloggen</b>';
$MESSAGE['FAILED_NEW_USER'] = '<b>Aktiverung abgelaufen oder Kennwort verkehrt</b>';
$MESSAGE['SIGNUP2_ADMIN_INFO'] = '
Es wurde ein neuer User regisriert.

Loginname: {LOGIN_NAME}
UserId: {LOGIN_ID}
E-Mail: {LOGIN_EMAIL}
IP-Adresse: {LOGIN_IP}
Anmeldedatum: {SIGNUP_DATE}
----------------------------------------
Diese E-Mail wurde automatisch erstellt!

';
$MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT'] = '
Hallo {LOGIN_DISPLAY_NAME},

Sie erhalten diese E-Mail, weil sie ein neues Passwort angefordert haben.

Ihre neuen Logindaten für {LOGIN_WEBSITE_TITLE} lauten:

Loginname: {LOGIN_NAME}
Passwort: {LOGIN_PASSWORD}

Das bisherige Passwort wurde durch das neue Passwort oben ersetzt.

Aus Sicherheitsgründen sollten Sie dieses Kennwort sofort ändern.

Mit freundlichen Grüssen
----------------------------------------
Diese E-Mail wurde automatisch erstellt!
';
$MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] = '
Hallo {LOGIN_DISPLAY_NAME},

Herzlich willkommen bei \'{LOGIN_WEBSITE_TITLE}\'

Ihre Logindaten für \'{LOGIN_WEBSITE_TITLE}\' lauten:
Loginname: {LOGIN_NAME}
Kennwort: {LOGIN_PASSWORD}

Vielen Dank für Ihre Registrierung.
Aus Sicherheitsgründen sollten Sie dieses Kennwort sofort ändern.

';

$MESSAGE['SUCCESS_EMAIL_TEXT_GENERATED'] = "\n"
."***********************************************************************\n"
."Dies ist eine automatisch generierte E-Mail. Die Absenderadresse dieser\n"
."E-Mail ist nur zum Versand, und nicht zum Empfang von Nachrichten\n"
."eingerichtet! Falls Sie diese E-Mail versehentlich erhalten haben,\n"
."löschen diese Nachricht bitte von Ihrem Computer.\n"
."***********************************************************************\n";

$MESSAGE['INCORRECT_CAPTCHA'] = 'Die eingegebene Pr&uuml;fziffer stimmt nicht &uuml;berein. Wenn Sie Probleme mit dem Lesen der Pr&uuml;fziffer haben, bitte schreiben Sie eine E-Mail an den <a href="mailto:{{webmaster_email}}">Webmaster</a>';

$MESSAGE['CONFIRMED']  = 'Ihr Kennwort finden Sie weiter unten. Verwenden Sie sie, um Ihre Softwareeinstellungen und -Funktionen zu verwalten. Ändern Sie aus Sicherheitsgründen umgehend Ihr Kennwort.';
$MESSAGE['CONFIRMED'] .= 'Kennwort: ';
$MESSAGE['CONFIRMED'] .= 'Vielen Dank!';
$MESSAGE['CHANGE_PASSWORD'] = 'Aus Sicherheitsgründen sollten Sie dieses Kennwort sofort ändern. Besuchen Sie dazu folgende Website:';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Bitte geben Sie Ihren Loginnamen und Passwort ein';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Bitte geben Sie Ihr Passwort ein';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Das angegebene Passwort ist zu lang';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Das angegebene Passwort ist zu kurz';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Bitte geben Sie Ihren Loginnamen ein';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Der angegebene Loginname ist zu lang';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Der angegebene Loginname ist zu kurz';
$MESSAGE['MAIL_GENERATED'] = 'Diese Nachricht wurde automatisch erstellt und kann nicht beantwortet werden. Wenn Sie Fragen haben oder Hilfe benötigen, wenden Sie sich bitte an <a href="mailto:{{webmaster_email}}">Webmaster</a>';

$MESSAGE['SEND_CONFIRMED_REGISTRATION'] = "

Hallo {LOGIN_DISPLAY_NAME},

Herzlich willkommen bei {LOGIN_WEBSITE_TITLE}!

Bitte aktivieren Sie Ihren kostenlosen Account und klicken Sie auf folgenden Link um die Aktivierung abzuschließen:

{LINK}
Sollte der Link nicht anklickbar sein, so kopieren Sie ihn bitte in die Adresszeile Ihres Browsers!

Der Aktivierungslink ist gültig bis {CONFIRMED_REGISTRATION_ENDTIME}

Mit freundlichen Grüßen,
Ihr Support Team

";
$MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] = 'Vielen Dank f&uuml;r Ihre Registrierung!';
$MESSAGE['SIGNUP2_NEW_USER'] = 'Es wurde ein neuer User regisriert';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Deine WB Logindaten ...';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Bitte geben Sie Ihre E-Mail Adresse an';

$MESSAGE['SIGNUP_CONFIRMED_REGISTRATION'] = "Um Ihr Konto zu nutzen zu k&ouml;nnen, erhalten Sie eine E-Mail mit einem Link, um Ihr Konto zu aktivieren.
<br /><b>Aktivierung muss innerhalb 24 Stunden erfolgen, da ansonsten das Konto wieder gel&ouml;scht wird.</b>
";
$MESSAGE['SIGNUP_REGISTRATION'] = 'Sie erhalten Ihre Zugangsdaten per E-Mail!!';
$MESSAGE['SIGNUP_NEW_USER'] = '<b>Das Konto wurde angelegt.</b>';
$MESSAGE['SIGNUP_ACTIVATION'] = 'Kontoaktivierung';

$TEXT['NEED_CURRENT_PASSWORD'] = 'mit aktuellem Passwort best&auml;tigen';
$TEXT['NEED_TO_LOGIN'] = 'M&uuml;ssen Sie sich einloggen?';
$TEXT['NEW_PASSWORD'] = 'Neues Passwort';
$TEXT['PASSWORD'] = 'Kennwort';
$TEXT['ACTIVATION'] = 'Freischalten';
$TEXT['SEND'] = 'Anfordern';
