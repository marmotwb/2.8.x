<?php
/**
 *
 * @category        framework
 * @package         language
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.website baker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

// Define that this file is loaded
if(!defined('LANGUAGE_LOADED'))
{
	define('LANGUAGE_LOADED', true);
}

// Set the language information
$language_code = 'DE';
$language_name = 'Deutsch';
$language_version = '3.0';
$language_platform = '2.9';
$language_author = 'Stefan Braunewell, Matthias Gallas';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Benutzerverwaltung';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Erweiterungen';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'Sie sind hier: ';
$MENU['FORGOT'] = 'Anmelde-Details anfordern';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Gruppen';
$MENU['HELP'] = 'Hilfe';
$MENU['LANGUAGES'] = 'Sprachen';
$MENU['LOGIN'] = 'Anmeldung';
$MENU['LOGOUT'] = 'Abmelden';
$MENU['MEDIA'] = 'Medien';
$MENU['MODULES'] = 'Module';
$MENU['PAGES'] = 'Seiten';
$MENU['PREFERENCES'] = 'Einstellungen';
$MENU['SETTINGS'] = 'Optionen';
$MENU['START'] = 'Start';
$MENU['TEMPLATES'] = 'Designvorlagen';
$MENU['USERS'] = 'Benutzer';
$MENU['VIEW'] = 'Ansicht';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Registrierung';
$TEXT['ACTIONS'] = 'Aktionen';
$TEXT['ACTIVE'] = 'Aktiv';
$TEXT['ADD'] = 'Hinzufügen';
$TEXT['ADDON'] = 'Addon';
$TEXT['ADD_SECTION'] = 'Abschnitt hinzufügen';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Verwaltung';
$TEXT['ADMINISTRATION_TOOL'] = 'Verwaltungsprogramme';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administratoren';
$TEXT['ADVANCED'] = 'Erweitert';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Erlaubte Dateitypen für Hochladen';
$TEXT['ALLOWED_VIEWERS'] = 'genehmigter Besucher';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Mehrfachauswahl';
$TEXT['ALL_WORDS'] = 'Alle Wörter';
$TEXT['ANCHOR'] = 'Anker';
$TEXT['ANONYMOUS'] = 'Anonym';
$TEXT['ANY_WORDS'] = 'Einzelne Wörter';
$TEXT['APP_NAME'] = 'Verwaltungswerkzeuge';
$TEXT['ARE_YOU_SURE'] = 'Sind Sie sicher?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Zurück';
$TEXT['BACKUP'] = 'Sichern';
$TEXT['BACKUP_ALL_TABLES'] = 'komplette Datenbank sichern';
$TEXT['BACKUP_DATABASE'] = 'Datenbank sichern';
$TEXT['BACKUP_MEDIA'] = 'Dateien sichern';
$TEXT['BACKUP_WB_SPECIFIC'] = 'nur WB Tabellen sichern';
$TEXT['BASIC'] = 'Einfach';
$TEXT['BLOCK'] = 'Block';
$TEXT['CALENDAR'] = 'Kalender';
$TEXT['CANCEL'] = 'Abbrechen';
$TEXT['CAN_DELETE_HIMSELF'] = 'Kann sich selber löschen';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Prüfziffer';
$TEXT['CAP_EDIT_CSS'] = 'Bearbeite CSS';
$TEXT['CHANGE'] = 'Ändern';
$TEXT['CHANGES'] = 'Änderungen';
$TEXT['CHANGE_SETTINGS'] = 'Einstellungen ändern';
$TEXT['CHARSET'] = 'Zeichensatz';
$TEXT['CHECKBOX_GROUP'] = 'Kontrollkästchen';
$TEXT['CLOSE'] = 'Schließen';
$TEXT['CODE'] = 'Code';
$TEXT['CODE_SNIPPET'] = 'Funktionserweiterung';
$TEXT['COLLAPSE'] = 'Reduzieren';
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['COMMENTING'] = 'kommentieren';
$TEXT['COMMENTS'] = 'Kommentare';
$TEXT['CREATE_FOLDER'] = 'Ordner anlegen';
$TEXT['CURRENT'] = 'Aktuell';
$TEXT['CURRENT_FOLDER'] = 'Aktueller Ordner';
$TEXT['CURRENT_PAGE'] = 'Aktuelle Seite';
$TEXT['CURRENT_PASSWORD'] = 'Bisheriges Passwort';
$TEXT['CUSTOM'] = 'Benutzerdefiniert';
$TEXT['DATABASE'] = 'Datenbank';
$TEXT['DATE'] = 'Datum';
$TEXT['DATE_FORMAT'] = 'Datumsformat';
$TEXT['DEFAULT'] = 'Standard';
$TEXT['DEFAULT_CHARSET'] = 'Standard Zeichensatz';
$TEXT['DEFAULT_TEXT'] = 'Standardtext';
$TEXT['DELETE'] = 'Entfernen';
$TEXT['DELETED'] = 'Gelöscht';
$TEXT['DELETE_DATE'] = 'Datum löschen';
$TEXT['DELETE_ZIP'] = 'Zip-Archiv nach dem entpacken löschen';
$TEXT['DESCRIPTION'] = 'Beschreibung';
$TEXT['DESIGNED_FOR'] = 'Entworfen für';
$TEXT['DEV_INFOS'] = 'Entwickler Informationen';
$TEXT['DIRECTORIES'] = 'Verzeichnisse';
$TEXT['DIRECTORY_MODE'] = 'Verzeichnismodus';
$TEXT['DISABLED'] = 'Ausgeschaltet';
$TEXT['DISPLAY_NAME'] = 'Angezeigter Name';
$TEXT['EMAIL'] = 'E-Mail';
$TEXT['EMAIL_ADDRESS'] = 'E-Mail Adresse';
$TEXT['EMPTY_TRASH'] = 'Mülleimer leeren';
$TEXT['ENABLED'] = 'Eingeschaltet';
$TEXT['END'] = 'Ende';
$TEXT['ERROR'] = 'Fehler';
$TEXT['EXACT_MATCH'] = 'Genaue Wortfolge';
$TEXT['EXECUTE'] = 'Ausführen';
$TEXT['EXPAND'] = 'Erweitern';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Feld';
$TEXT['FILE'] = 'Datei';
$TEXT['FILES'] = 'Dateien';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Zugriffsrechte';
$TEXT['FILE_MODE'] = 'Dateimodus';
$TEXT['FINISH_PUBLISHING'] = 'Ende der Veröffentlichung';
$TEXT['FOLDER'] = 'Ordner';
$TEXT['FOLDERS'] = 'Ordner';
$TEXT['FOOTER'] = 'Fußzeile';
$TEXT['FORGOTTEN_DETAILS'] = 'Haben Sie Ihre persönlichen Daten vergessen?';
$TEXT['FORGOT_DETAILS'] = 'Haben Sie Ihre persönlichen Daten vergessen?';
$TEXT['FROM'] = 'von';
$TEXT['FRONTEND'] = 'Frontend';
$TEXT['FULL_NAME'] = 'Voller Name';
$TEXT['FUNCTION'] = 'Funktion';
$TEXT['GROUP'] = 'Gruppe';
$TEXT['HEADER'] = 'Kopfzeile';
$TEXT['HEADING'] = 'Überschrift';
$TEXT['HEADING_CSS_FILE'] = 'Aktuelle Moduldatei: ';
$TEXT['HEIGHT'] = 'Höhe';
$TEXT['HIDDEN'] = 'Versteckt';
$TEXT['HIDE'] = 'verstecken';
$TEXT['HIDE_ADVANCED'] = 'Erweiterte Optionen verdecken';
$TEXT['HOME'] = 'Home';
$TEXT['HOMEPAGE_REDIRECTION'] = 'URL Umleitung zur Homepage';
$TEXT['HOME_FOLDER'] = 'Persönlicher Ordner';
$TEXT['HOME_FOLDERS'] = 'Persönliche Ordner';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Symbol';
$TEXT['IMAGE'] = 'Bild';
$TEXT['INLINE'] = 'Integriert';
$TEXT['INSTALL'] = 'Installieren';
$TEXT['INSTALLATION'] = 'Installation';
$TEXT['INSTALLATION_PATH'] = 'Installationspfad';
$TEXT['INSTALLATION_URL'] = 'Installationsadresse(URL)';
$TEXT['INSTALLED'] = 'installiert';
$TEXT['INTRO'] = 'Eingangs';
$TEXT['INTRO_PAGE'] = 'Eingangsseite';
$TEXT['INVALID_SIGNS'] = 'muss mit einem Buchstaben beginnen oder hat ungültige Zeichen';
$TEXT['KEYWORDS'] = 'Schlüsselwörter';
$TEXT['LANGUAGE'] = 'Sprache';
$TEXT['LAST_UPDATED_BY'] = 'zuletzt geändert von';
$TEXT['LENGTH'] = 'Länge';
$TEXT['LEVEL'] = 'Ebene';
$TEXT['LICENSE'] = 'Lizenz';
$TEXT['LINK'] = 'Link';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix basierend';
$TEXT['LIST_OPTIONS'] = 'Auswahlliste';
$TEXT['LOGGED_IN'] = 'Angemeldet';
$TEXT['LOGIN'] = 'Anmeldung';
$TEXT['LONG'] = 'Lang';
$TEXT['LONG_TEXT'] = 'Langtext';
$TEXT['LOOP'] = 'Schleife';
$TEXT['MAIN'] = 'Hauptblock';
$TEXT['MAINTENANCE_OFF'] = 'Wartung aus';
$TEXT['MAINTENANCE_ON'] = 'Wartung an';
$TEXT['MANAGE'] = 'Manage';
$TEXT['MANAGE_GROUPS'] = 'Gruppen verwalten';
$TEXT['MANAGE_USERS'] = 'Benutzer verwalten';
$TEXT['MATCH'] = 'Übereinstimmung';
$TEXT['MATCHING'] = 'passende';
$TEXT['MAX_EXCERPT'] = 'Max Anzahl Zitate pro Seite';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Eintragungen pro Stunde';
$TEXT['MEDIA_DIRECTORY'] = 'Medienverzeichnis';
$TEXT['MENU'] = 'Menü';
$TEXT['MENU_ICON_0'] = 'Menü-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menü-Icon hover';
$TEXT['MENU_TITLE'] = 'Menütitel';
$TEXT['MESSAGE'] = 'Nachricht';
$TEXT['MODIFY'] = 'Ändern';
$TEXT['MODIFY_CONTENT'] = 'Inhalt ändern';
$TEXT['MODIFY_SETTINGS'] = 'Optionen ändern';
$TEXT['MODULE_ORDER'] = 'Modulreihenfolge für die Suche';
$TEXT['MODULE_PERMISSIONS'] = 'Modulberechtigungen';
$TEXT['MORE'] = 'Mehr';
$TEXT['MOVE_DOWN'] = 'Abwärts verschieben';
$TEXT['MOVE_UP'] = 'Aufwärts verschieben';
$TEXT['MULTILINGUAL'] = 'Mehrsprachigkeit';
$TEXT['MULTIPLE_MENUS'] = 'Mehrere Menüs';
$TEXT['MULTISELECT'] = 'Mehrfachauswahl';
$TEXT['NAME'] = 'Name';
$TEXT['NEED_CURRENT_PASSWORD'] = 'mit aktuellem Passwort bestätigen';
$TEXT['NEED_TO_LOGIN'] = 'Müssen Sie sich einloggen?';
$TEXT['NEW_PASSWORD'] = 'Neues Passwort';
$TEXT['NEW_WINDOW'] = 'Neues Fenster';
$TEXT['NEXT'] = 'nächste';
$TEXT['NEXT_PAGE'] = 'nächste Seite';
$TEXT['NO'] = 'Nein';
$TEXT['NONE'] = 'Keine';
$TEXT['NONE_FOUND'] = 'Keine gefunden';
$TEXT['NOT_FOUND'] = 'Nicht gefunden';
$TEXT['NOT_INSTALLED'] = 'nicht installiert';
$TEXT['NO_IMAGE_SELECTED'] = 'Kein Bild ausgewählt';
$TEXT['NO_RESULTS'] = 'Keine Ergebnisse';
$TEXT['NO_SELECTION'] = 'keine Auswahl';
$TEXT['OF'] = 'von';
$TEXT['ON'] = 'Am';
$TEXT['OPEN'] = 'Öffnen';
$TEXT['OPTION'] = 'Option';
$TEXT['OTHERS'] = 'Alle';
$TEXT['OUT_OF'] = 'von';
$TEXT['OVERWRITE_EXISTING'] = 'Überschreibe bestehende';
$TEXT['PAGE'] = 'Seite';
$TEXT['PAGES_DIRECTORY'] = 'Seitenverzeichnis';
$TEXT['PAGES_PERMISSION'] = 'Seitenberechtigung';
$TEXT['PAGES_PERMISSIONS'] = 'Seitenerechtigungen';
$TEXT['PAGE_EXTENSION'] = 'Dateiendungen';
$TEXT['PAGE_ICON'] = 'Seitenbild';
$TEXT['PAGE_ICON_DIR'] = 'Verzeichnis für Seiten-/Menuebilder';
$TEXT['PAGE_LANGUAGES'] = 'Seitensprache';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limit der Seitenebenen';
$TEXT['PAGE_SPACER'] = 'Leerzeichen';
$TEXT['PAGE_TITLE'] = 'Seitentitel';
$TEXT['PAGE_TRASH'] = 'Seiten Mülleimer';
$TEXT['PARENT'] = 'Übergeordnete Datei';
$TEXT['PASSWORD'] = 'Passwort';
$TEXT['PATH'] = 'Pfad';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Fehlerberichte';
$TEXT['PLEASE_LOGIN'] = 'Bitte anmelden';
$TEXT['PLEASE_SELECT'] = 'Bitte auswählen';
$TEXT['POST'] = 'Beitrag';
$TEXT['POSTS_PER_PAGE'] = 'Nachrichten pro Seite';
$TEXT['POST_FOOTER'] = 'Nachricht Fußzeile';
$TEXT['POST_HEADER'] = 'Nachricht Kopfzeile';
$TEXT['PREVIOUS'] = 'vorherige';
$TEXT['PREVIOUS_PAGE'] = 'vorherige Seite';
$TEXT['PRIVATE'] = 'Privat';
$TEXT['PRIVATE_VIEWERS'] = 'Private Nutzer';
$TEXT['PROFILES_EDIT'] = 'Profil ändern';
$TEXT['PUBLIC'] = 'Öffentlich';
$TEXT['PUBL_END_DATE'] = 'End Datum';
$TEXT['PUBL_START_DATE'] = 'Start Datum';
$TEXT['RADIO_BUTTON_GROUP'] = 'Optionsfeld';
$TEXT['READ'] = 'Lesen';
$TEXT['READ_MORE'] = 'Weiterlesen';
$TEXT['REDIRECT_AFTER'] = 'Weiterleitung nach';
$TEXT['REGISTERED'] = 'registriert';
$TEXT['REGISTERED_VIEWERS'] = 'registrierter Besucher';
$TEXT['RELOAD'] = 'Neu laden';
$TEXT['REMEMBER_ME'] = 'Passwort speichern';
$TEXT['RENAME'] = 'Umbenennen';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Diese Dateitypen nicht hochladen';
$TEXT['REQUIRED'] = 'Erforderlich';
$TEXT['REQUIREMENT'] = 'Voraussetzung';
$TEXT['RESET'] = 'Zurücksetzen';
$TEXT['RESIZE'] = 'Größe ändern';
$TEXT['RESIZE_IMAGE_TO'] = 'Bildgröße verändern auf';
$TEXT['RESTORE'] = 'Wiederherstellen';
$TEXT['RESTORE_DATABASE'] = 'Datenbank wiederherstellen';
$TEXT['RESTORE_MEDIA'] = 'Dateien wiederherstellen';
$TEXT['RESULTS'] = 'Resultate';
$TEXT['RESULTS_FOOTER'] = 'Ergebnisse Fußzeile';
$TEXT['RESULTS_FOR'] = 'Ergebnisse für';
$TEXT['RESULTS_HEADER'] = 'Ergebnisse Überschrift';
$TEXT['RESULTS_LOOP'] = 'Ergebnisse Schleife';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Neues Passwort wiederholen';
$TEXT['RETYPE_PASSWORD'] = 'Passwort wiederholen';
$TEXT['SAME_WINDOW'] = 'Gleiches Fenster';
$TEXT['SAVE'] = 'Speichern';
$TEXT['SEARCH'] = 'Suche';
$TEXT['SEARCHING'] = 'suchen';
$TEXT['SECTION'] = 'Abschnitt';
$TEXT['SECTION_BLOCKS'] = 'Blöcke';
$TEXT['SEC_ANCHOR'] = 'Abschnitts-Anker Text';
$TEXT['SELECT_BOX'] = 'Auswahlliste';
$TEXT['SEND_DETAILS'] = 'Anmeldedaten senden';
$TEXT['SEPARATE'] = 'Separat';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['SERVER_EMAIL'] = 'Server E-Mail';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server Betriebssystem';
$TEXT['SESSION_IDENTIFIER'] = 'Sitzungs ID';
$TEXT['SETTINGS'] = 'Optionen';
$TEXT['SHORT'] = 'Kurz';
$TEXT['SHORT_TEXT'] = 'Kurztext';
$TEXT['SHOW'] = 'zeigen';
$TEXT['SHOW_ADVANCED'] = 'Erweiterte Optionen anzeigen';
$TEXT['SIGNUP'] = 'Registrierung';
$TEXT['SIZE'] = 'Größe';
$TEXT['SMART_LOGIN'] = 'Intelligente Anmeldung';
$TEXT['START'] = 'Start';
$TEXT['START_PUBLISHING'] = 'Beginn der Veröffentlichung';
$TEXT['SUBJECT'] = 'Betreff';
$TEXT['SUBMISSIONS'] = 'Eintragungen';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Max. gespeicherte Eintragungen';
$TEXT['SUBMISSION_ID'] = 'Eintragungs-ID';
$TEXT['SUBMITTED'] = 'eingetragen';
$TEXT['SUCCESS'] = 'Erfolgreich';
$TEXT['SYSTEM_DEFAULT'] = 'Standardeinstellung';
$TEXT['SYSTEM_PERMISSIONS'] = 'Zugangsberechtigungen';
$TEXT['TABLE_PREFIX'] = 'TabellenPräfix';
$TEXT['TARGET'] = 'Ziel';
$TEXT['TARGET_FOLDER'] = 'Zielordner';
$TEXT['TEMPLATE'] = 'Template';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Zugriffsrechte für Vorlagen';
$TEXT['TEXT'] = 'Text';
$TEXT['TEXTAREA'] = 'Langtext';
$TEXT['TEXTFIELD'] = 'Kurztext';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['THEME_COPY_CURRENT'] = 'Backend-Theme kopieren.';
$TEXT['THEME_CURRENT'] = 'aktuelles Theme';
$TEXT['THEME_IMPORT_HTT'] = 'Templatefiles importieren';
$TEXT['THEME_NEW_NAME'] = 'Name des neuen Themes';
$TEXT['THEME_NOMORE_HTT'] = 'keine weiteren vorhanden';
$TEXT['THEME_SELECT_HTT'] = 'Templatefiles auswählen';
$TEXT['THEME_START_COPY'] = 'kopieren';
$TEXT['THEME_START_IMPORT'] = 'importieren';
$TEXT['TIME'] = 'Zeit';
$TEXT['TIMEZONE'] = 'Zeitzone';
$TEXT['TIME_FORMAT'] = 'Zeitformat';
$TEXT['TIME_LIMIT'] = 'Zeitlimit zur Erstellung der Zitate pro Modul';
$TEXT['TITLE'] = 'Titel';
$TEXT['TO'] = 'an';
$TEXT['TOP_FRAME'] = 'Frameset sprengen';
$TEXT['TRASH_EMPTIED'] = 'Mülleimer geleert';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Bearbeite die CSS Definitionen im nachfolgenden Textfeld.';
$TEXT['TYPE'] = 'Art';
$TEXT['UNDER_CONSTRUCTION'] = 'In Bearbeitung';
$TEXT['UNINSTALL'] = 'Deinstallieren';
$TEXT['UNKNOWN'] = 'Unbekannt';
$TEXT['UNLIMITED'] = 'Unbegrenzt';
$TEXT['UNZIP_FILE'] = 'Zip-Archiv hochladen und entpacken';
$TEXT['UP'] = 'Aufwärts';
$TEXT['UPGRADE'] = 'Aktualisieren';
$TEXT['UPLOAD_FILES'] = 'Datei(en) übertragen';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Benutzer';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'Benutzer ist aktiv';
$TEXT['USERS_CAN_SELFDELETE'] = 'Selbstlöschung möglich';
$TEXT['USERS_CHANGE_SETTINGS'] = 'Benutzer kann eigene Einstellungen ändern';
$TEXT['USERS_DELETED'] = 'Benutzer ist als gelöscht markiert';
$TEXT['USERS_FLAGS'] = 'Benutzerflags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'Benutzer kann erweitertes Profil anlegen';
$TEXT['VERIFICATION'] = 'Prüfziffer';
$TEXT['VERSION'] = 'Version';
$TEXT['VIEW'] = 'Ansicht';
$TEXT['VIEW_DELETED_PAGES'] = 'gelöschte Seiten anschauen';
$TEXT['VIEW_DETAILS'] = 'Details';
$TEXT['VISIBILITY'] = 'Sichtbarkeit';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Standard "VON" Adresse';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Standard Absender Name';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Bitte geben Sie eine Standard "VON" Adresse und einen Sendernamen an. Als Absender Adresse empfiehlt sich ein Format wie: <strong>admin@IhreWebseite.de</strong>. Manche E-Mail Provider (z.B. <em>mail.de</em>) stellen keine E-Mails zu, die nicht über den Provider selbst verschickt wurden, in der Absender Adresse aber den Namen des E-Mail Providers <em>name@mail.de</em> enthalten. Die Standard Werte werden nur verwendet, wenn keine anderen Werte von WebsiteBaker gesetzt wurden. Wenn Ihr Service Provider <acronym title="Simple Mail Transfer Protocol">SMTP</acronym> anbietet, sollten Sie diese Option für ausgehende E-Mails verwenden.';
$TEXT['WBMAILER_FUNCTION'] = 'E-Mail Routine';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Maileinstellungen:</strong><br />Die nachfolgenden Einstellungen müssen nur angepasst werden, wenn Sie E-Mail über <acronym title="Simple Mail Transfer Protocol">SMTP</acronym> verschicken wollen. Wenn Sie Ihren SMTP Server nicht kennen, oder Sie sich unsicher bei den Einstellungen sind, verwenden Sie einfach die Standard E-Mail Routine: PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Authentifikation';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'nur aktivieren, wenn SMTP Authentifikation benötigt wird';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Passwort';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Loginname';
$TEXT['WEBSITE'] = 'Webseite';
$TEXT['WEBSITE_DESCRIPTION'] = 'Metatag Beschreibung';
$TEXT['WEBSITE_FOOTER'] = 'Fußzeile';
$TEXT['WEBSITE_HEADER'] = 'Kopfzeile';
$TEXT['WEBSITE_KEYWORDS'] = 'Metatag Schlüsselwörter';
$TEXT['WEBSITE_TITLE'] = 'Metatag Titel';
$TEXT['WELCOME_BACK'] = 'Willkommen zurück';
$TEXT['WIDTH'] = 'Breite';
$TEXT['WINDOW'] = 'Fenster';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Einstellungen für Schreibrechte';
$TEXT['WRITE'] = 'Schreiben';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stil';
$TEXT['YES'] = 'Ja';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On Voraussetzungen nicht erfüllt';
$HEADING['ADD_CHILD_PAGE'] = 'Unterseite hinzufügen';
$HEADING['ADD_GROUP'] = 'Gruppe hinzufügen';
$HEADING['ADD_GROUPS'] = 'Gruppen hinzufügen';
$HEADING['ADD_HEADING'] = 'Kopf hinzufügen';
$HEADING['ADD_PAGE'] = 'Seite hinzufügen';
$HEADING['ADD_USER'] = 'Benutzer hinzufügen';
$HEADING['ADMINISTRATION_TOOLS'] = 'Verwaltungsprogramme';
$HEADING['BROWSE_MEDIA'] = 'Medien durchsuchen';
$HEADING['CREATE_FOLDER'] = 'Ordner erstellen';
$HEADING['DEFAULT_SETTINGS'] = 'Standardeinstellungen';
$HEADING['DELETED_PAGES'] = 'gelöschte Seiten';
$HEADING['FILESYSTEM_SETTINGS'] = 'Dateisystemoptionen';
$HEADING['GENERAL_SETTINGS'] = 'Allgemeine Optionen';
$HEADING['INSTALL_LANGUAGE'] = 'Sprache hinzufügen';
$HEADING['INSTALL_MODULE'] = 'Modul installieren';
$HEADING['INSTALL_TEMPLATE'] = 'Designvorlage installieren';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Sprachdateien manuell ausführen';
$HEADING['INVOKE_MODULE_FILES'] = 'Moduldateien manuell ausführen';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Templatedateien manuell ausführen';
$HEADING['LANGUAGE_DETAILS'] = 'Details zur Sprache';
$HEADING['MANAGE_SECTIONS'] = 'Abschnitte verwalten';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Erweiterte Seitenoptionen ändern';
$HEADING['MODIFY_DELETE_GROUP'] = 'Ändern/Löschen von Gruppen';
$HEADING['MODIFY_DELETE_PAGE'] = 'Seite ändern/Seite löschen';
$HEADING['MODIFY_DELETE_USER'] = 'Ändern/Löschen von Benutzern';
$HEADING['MODIFY_GROUP'] = 'Gruppe ändern';
$HEADING['MODIFY_GROUPS'] = 'Gruppen ändern';
$HEADING['MODIFY_INTRO_PAGE'] = 'Eingangsseite ändern';
$HEADING['MODIFY_PAGE'] = 'Seite ändern';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Seitenoptionen ändern';
$HEADING['MODIFY_USER'] = 'Benutzer ändern';
$HEADING['MODULE_DETAILS'] = 'Details zum Modul';
$HEADING['MY_EMAIL'] = 'E-Mail Adresse';
$HEADING['MY_PASSWORD'] = 'Passwort';
$HEADING['MY_SETTINGS'] = 'Einstellungen';
$HEADING['SEARCH_SETTINGS'] = 'Suchoptionen';
$HEADING['SERVER_SETTINGS'] = 'Servereinstellungen';
$HEADING['TEMPLATE_DETAILS'] = 'Details zur Designvorlage';
$HEADING['UNINSTALL_LANGUAGE'] = 'Sprache löschen';
$HEADING['UNINSTALL_MODULE'] = 'Modul deinstallieren';
$HEADING['UNINSTALL_TEMPLATE'] = 'Designvorlage deinstallieren';
$HEADING['UPGRADE_LANGUAGE'] = 'Sprache registrieren/aktualisieren (Upgrade)';
$HEADING['UPLOAD_FILES'] = 'Datei(en) übertragen';
$HEADING['WBMAILER_SETTINGS'] = 'Maileinstellungen';

/* MESSAGE */
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Fehler beim Abgleich der Addon Informationen.';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Sprachen erfolgreich geladen';
$MESSAGE['ADDON_MANUAL_FTP_LANGUAGE'] = '<strong>ACHTUNG!</strong> Überspielen Sie Sprachdateien aus Sicherheitsgründen nur über FTP in den Ordner /languages/ und benutzen die Upgrade Funktion zum Registrieren oder Aktualisieren.';
$MESSAGE['ADDON_MANUAL_FTP_WARNING'] = 'Warnung: Eventuell vorhandene Datenbankeinträge eines Moduls gehen verloren. ';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'Beim Hochladen oder Löschen von Modulen per FTP (nicht empfohlen), werden eventuell vorhandene Modulfunktionen <tt>install</tt>, <tt>upgrade</tt> oder <tt>uninstall</tt> nicht automatisch ausgeführt. Solche Module funktionieren daher meist nicht richtig, oder hinterlassen Datenbankeinträge beim Löschen per FTP.<br /><br /> Nachfolgend können die Modulfunktionen von per FTP hochgeladenen Modulen manuell ausgeführt werden.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Warnung: Eventuell vorhandene Datenbankeinträge eines Moduls gehen verloren. Bitte nur bei Problemen mit per FTP hochgeladenen Modulen verwenden. ';
$MESSAGE['ADDON_MANUAL_RELOAD_WARNING'] = 'Warnung: Eventuell vorhandene Datenbankeinträge eines Moduls gehen verloren. ';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Module erfolgreich geladen';
$MESSAGE['ADDON_OVERWRITE_NEWER_FILES'] = 'Überschreibe neuere Dateien';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Installation fehlgeschlagen. Ihr System erfüllt nicht alle Voraussetzungen die für diese Erweiterung benötigt werden. Um diese Erweiterung nutzen zu können, müssen nachfolgende Updates durchgeführt werden.';
$MESSAGE['ADDON_RELOAD'] = 'Abgleich der Datenbank mit den Informationen aus den Addon-Dateien (z.B. nach FTP Upload).';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Designvorlagen erfolgreich geladen';
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Ungenügende Zugangsberechtigungen';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Das Passwort kann nur einmal pro Stunde zurückgesetzt werden';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Das Passwort konnte nicht versendet werden, bitte kontaktieren Sie den Systemadministrator';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Die angegebene E-Mail Adresse wurde nicht in der Datenbank gefunden';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Bitte geben Sie nachfolgend Ihre E-Mail Adresse an';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Ihr Loginname und Ihr Passwort wurden an Ihre E-Mail Adresse gesendet';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Kein aktiver Inhalt auf dieser Seite vorhanden';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Sie sind nicht berechtigt, diese Seite zu sehen';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Bereits installiert';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kann im Zielverzeichnis nicht schreiben';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Bitte haben Sie etwas Geduld.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Deinstallation fehlgeschlagen';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Deinstallation nicht möglich: Datei wird benutzt';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = 'Das {{type}} <strong>{{type_name}}</strong> kann nicht deinstalliert werden, weil es auf {{pages}} benutzt wird:';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'folgender Seite;folgenden Seiten';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Das Template <strong>{{name}}</strong> kann nicht deinstalliert werden, weil es das Standardtemplate ist!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Das Template <strong>{{name}}</strong> kann nicht deinstalliert werden, weil es das Standardbackendtheme ist!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Fehler beim Entpacken';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Die Datei kann nicht übertragen werden';
$MESSAGE['GENERIC_COMPARE'] = ' erfolgreich';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Fehler beim Öffnen der Datei.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' fehlgeschlagen';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Bitte beachten Sie, dass Sie nur den folgenden Dateityp auswählen können:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Bitte beachten Sie, dass Sie nur folgende Dateitypen auswählen können:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Bitte alle Felder ausfüllen';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'Sie haben keine Auswahl getroffen!';
$MESSAGE['GENERIC_INSTALLED'] = 'Erfolgreich installiert';
$MESSAGE['GENERIC_INVALID'] = 'Die übertragene Datei ist ungültig';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Ungültige WebsiteBaker Installationsdatei. Bitte *.zip Format prüfen.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Ungültige WebsiteBaker Sprachdatei. Bitte Textdatei prüfen.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Ungültige WebsiteBaker Moduledatei. Bitte Textdatei prüfen.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Ungültige WebsiteBaker Templatedatei. Bitte Textdatei prüfen.';
$MESSAGE['GENERIC_IN_USE'] = ' aber benutzt in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Fehlende Archivdatei!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'Das Modul ist nicht ordnungsgemäss installiert!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' nicht möglich';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nicht installiert';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Aktualisierung nicht möglich';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Die Datenbanksicherung kann je nach Größe der Datenbank einige Zeit dauern.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Bitte versuchen Sie es später noch einmal ...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Sicherheitsverletzung!! Zugriff wurde verweigert!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Sicherheitsverletzung!! Das Speichern der Daten wurde verweigert!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Erfolgreich deinstalliert';
$MESSAGE['GENERIC_UPGRADED'] = 'Erfolgreich aktualisiert';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Versionsabgleich';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade erforderlich!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'Diese Seite ist für Wartungsarbeiten vorübergehend geschlossen';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Momentan in Bearbeitung';
$MESSAGE['GROUPS_ADDED'] = 'Die Gruppe wurde erfolgreich hinzugefügt';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Sind Sie sicher, dass Sie die ausgewählte Gruppe löschen möchten (und alle Benutzer, die dazugehören)?';
$MESSAGE['GROUPS_DELETED'] = 'Die Gruppe wurde erfolgreich gelöscht';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Der Gruppenname wurde nicht angegeben';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Der Gruppenname existiert bereits';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Keine Gruppen gefunden';
$MESSAGE['GROUPS_SAVED'] = 'Die Gruppe wurde erfolgreich gespeichert';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Der Loginname oder das Passwort ist nicht korrekt';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Bitte geben Sie Ihren Loginnamen und Passwort ein';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Bitte geben Sie Ihr Passwort ein';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Das angegebene Passwort ist zu lang';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Das angegebene Passwort ist zu kurz';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Bitte geben Sie Ihren Loginnamen ein';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Der angegebene Loginname ist zu lang';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Der angegebene Loginname ist zu kurz';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Sie haben keine Dateiendung angegeben';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Sie haben keinen neuen Namen angegeben';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Das ausgewählte Verzeichnis konnte nicht gelöscht werden';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Die ausgewählte Datei konnte nicht gelöscht werden';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Das Umbenennen war nicht erfolgreich';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Sind Sie sicher, dass Sie die folgende Datei oder Verzeichnis löschen möchten?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Das Verzeichnis wurde gelöscht';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Die Datei wurde gelöscht';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Verzeichnis existiert nicht oder Zugriff verweigert.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Verzeichnis existiert nicht';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Der Verzeichnisname darf nicht ../ enthalten';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Ein Verzeichnis mit dem angegebenen Namen existiert bereits';
$MESSAGE['MEDIA_DIR_MADE'] = 'Das Verzeichnis wurde erfolgreich angelegt';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Das Verzeichnis konnte nicht angelegt werden';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Eine Datei mit dem angegebenen Namen existiert bereits';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Die Datei konnte nicht gefunden werden';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Der Name darf nicht ../ enthalten';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Der Dateiname index.php kann nicht verwendet werden';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Im aktuellen Verzeichnis konnten keine Dateien (z.B. Bilder) gefunden werden';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'Es wurde keine Datei empfangen';
$MESSAGE['MEDIA_RENAMED'] = 'Das Umbenennen war erfolgreich';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = 'Datei wurde erfolgreich übertragen';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Der Name des Zielverzeichnisses darf nicht ../ enthalten';
$MESSAGE['MEDIA_UPLOADED'] = 'Dateien wurden erfolgreich übertragen';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Dieses Formular wurde zu oft aufgerufen. Bitte versuchen Sie es in einer Stunde noch einmal.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Die eingegebene Prüfziffer stimmt nicht überein. Wenn Sie Probleme mit dem Lesen der Prüfziffer haben, bitte schreiben Sie eine E-Mail an uns: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Bitte folgende Angaben ergänzen';
$MESSAGE['PAGES_ADDED'] = 'Die Seite wurde erfolgreich hinzugefügt';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Seitenkopf erfolgreich hinzugefügt';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Bitte geben Sie einen Menütitel ein';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Bitte geben Sie einen Titel für die Seite ein';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Beim Anlegen der Zugangsdatei im Verzeichnis /pages ist ein Fehler aufgetreten (Ungenügende Zugangsrechte)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Beim Löschen der Zugangsdatei im Verzeichnis /pages ist ein Fehler aufgetreten (Ungenügende Zugangsrechte)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Bei der Zusammenstellung der Seite ist ein Fehler aufgetreten';
$MESSAGE['PAGES_DELETED'] = 'Die Seite wurde erfolgreich gelöscht';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Sind Sie sicher, dass Sie die ausgewählte Seite und deren Unterseiten löschen möchten?';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Sie haben keine Berechtigung, diese Seite zu ändern';
$MESSAGE['PAGES_INTRO_LINK'] = 'Bitte klicken Sie HIER um die Eingangsseite zu ändern';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Es konnte nicht in die Datei /pages/intro.php geschrieben werden (ungenügende Zugangsrechte)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Eingangsseite wurde erfolgreich gespeichert';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Die letzte Änderung wurde durchgeführt von';
$MESSAGE['PAGES_NOT_FOUND'] = 'Die Seite konnte nicht gefunden werden';
$MESSAGE['PAGES_NOT_SAVED'] = 'Beim Speichern der Seite ist ein Fehler aufgetreten';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Eine Seite mit einem ähnlichen oder demselben Titel existiert bereits';
$MESSAGE['PAGES_REORDERED'] = 'Die Seite wurde erfolgreich neu zusammengestellt';
$MESSAGE['PAGES_RESTORED'] = 'Die Seite wurde erfolgreich wiederhergestellt';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Zurück zum Seitenmenü';
$MESSAGE['PAGES_SAVED'] = 'Die Seite wurde erfolgreich gespeichert';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Die Seiteneinstellungen wurden erfolgreich gespeichert';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Einstellungen für diesen Abschnitt erfolgreich gespeichert';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Das Passwort, das Sie angegeben haben, ist ungültig';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Persönliche Daten wurden erfolgreich gespeichert';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-Mail Einstellung geändert';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Es wurden ungültige Zeichen für des Passwort verwendet';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Das Passwort wurde erfolgreich geändert';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'Änderung des Datensatzes ist fehlgeschlagen.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'Geänderter Datensatz wurde erfolgreich aktualisiert.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Hinzufügen eines neuen Datensatzes ist fehlgeschlagen.';
$MESSAGE['RECORD_NEW_SAVED'] = 'Neuer Datensatz wurde erfolgreich hinzugefügt.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Bitte beachten Sie: Wenn Sie dieses Feld anklicken, werden alle ungespeicherten Änderungen zurückgesetzt';
$MESSAGE['SETTINGS_SAVED'] = 'Die Optionen wurden erfolgreich gespeichert';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Konfigurationsdatei konnte nicht geöffnet werden';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Die Konfigurationsdatei konnte nicht geschrieben werden';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Bitte beachten Sie: Dies wird nur zu Testzwecken empfohlen';
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

Sollten Sie kein neues Kennwort angefordert haben, löschen Sie bitte diese E-Mail.

Mit freundlichen Grüssen
----------------------------------------
Diese E-Mail wurde automatisch erstellt!
';
$MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] = '
Hallo {LOGIN_DISPLAY_NAME},

Herzlich willkommen bei \'{LOGIN_WEBSITE_TITLE}\'

Ihre Logindaten für \'{LOGIN_WEBSITE_TITLE}\' lauten:
Loginname: {LOGIN_NAME}
Passwort: {LOGIN_PASSWORD}

Vielen Dank für Ihre Registrierung

Wenn Sie dieses E-Mail versehentlich erhalten haben, löschen Sie bitte diese E-Mail.
----------------------------------------
Diese E-Mail wurde automatisch erstellt!
';
$MESSAGE['SIGNUP2_NEW_USER'] = 'Es wurde ein neuer User regisriert';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Deine WB Logindaten ...';
$MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] = 'Vielen Dank für Ihre Registrierung';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Bitte geben Sie Ihre E-Mail Adresse an';
$MESSAGE['START_CURRENT_USER'] = 'Sie sind momentan angemeldet als:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Das Installations-Verzeichnis "/install" existiert noch! Dies stellt ein Sicherheitsrisiko dar. Bitte löschen.';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Bitte die Datei {{file}} vom Webserver löschen.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Willkommen in der WebsiteBaker Verwaltung';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Bitte beachten Sie: Um eine andere Designvorlage auszuwählen, benutzen Sie den Bereich "Optionen"';
$MESSAGE['THEME_ALREADY_EXISTS'] = 'Neuer Theme-Name existiert bereits.';
$MESSAGE['THEME_COPY_CURRENT'] = 'Das aktuell aktive Backend-Theme kopieren und unter einem neuem Namen abspeichern.';
$MESSAGE['THEME_DESTINATION_READONLY'] = 'Ungenügende Rechte um das Zielverzeichnis zu erstellen!';
$MESSAGE['THEME_IMPORT_HTT'] = 'Zusätzliche Templatefile(s) in das aktuelle Theme importieren.<br />Mit diesen Templates können die Default-Templates überschrieben werden.';
$MESSAGE['THEME_INVALID_SOURCE_DESTINATION'] = 'Ungültigen Theme-Name angegeben!';
$MESSAGE['UNKNOW_UPLOAD_ERROR'] = 'Unbekannter Upload Fehler';
$MESSAGE['UPLOAD_ERR_CANT_WRITE'] = 'Konnte Datei nicht schreiben. Fehlende Schreibrechte.';
$MESSAGE['UPLOAD_ERR_EXTENSION'] = 'Erweiterungsfehler';
$MESSAGE['UPLOAD_ERR_FORM_SIZE'] = 'Die hochgeladene Datei &uum;berschreitet die in dem HTML Formular mittels der Anweisung MAX_FILE_SIZE angegebene maximale Dateigr&oum;sse. ';
$MESSAGE['UPLOAD_ERR_INI_SIZE'] = 'Die hochgeladene Datei &uum;berschreitet die in der Anweisung upload_max_filesize in php.ini festgelegte Gr&oum;sse';
$MESSAGE['UPLOAD_ERR_NO_FILE'] = 'Es wurde keine Datei hochgeladen';
$MESSAGE['UPLOAD_ERR_NO_TMP_DIR'] = 'Fehlender temporärer Ordner';
$MESSAGE['UPLOAD_ERR_OK'] = 'Die Datei wurde erfolgreich hochgeladen';
$MESSAGE['UPLOAD_ERR_PARTIAL'] = 'Die Datei wurde nur teilweise hochgeladen';
$MESSAGE['USERS_ADDED'] = 'Der Benutzer wurde erfolgreich hinzugefügt';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Funktion abgelehnt, Sie können sich nicht selbst löschen!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Bitte beachten Sie: Sie sollten in die obigen Felder nur Werte eingeben, wenn Sie das Passwort dieses Benutzers ändern möchten';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Sind Sie sicher, dass Sie den ausgewählten Benutzer löschen möchten?';
$MESSAGE['USERS_DELETED'] = 'Der Benutzer wurde erfolgreich gelöscht';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Die angegebene E-Mail Adresse wird bereits verwendet';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Die angegebene E-Mail Adresse ist ungültig';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Es wurden ungültige Zeichen für den Loginnamen verwendet';
$MESSAGE['USERS_NO_GROUP'] = 'Es wurde keine Gruppe ausgewählt';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Das angegebene Passwort ist ungültig';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Das eingegebene Passwort war zu kurz';
$MESSAGE['USERS_SAVED'] = 'Der Benutzer wurde erfolgreich gespeichert';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Der angegebene Loginname wird bereits verwendet';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Der eingegebene Loginname war zu kurz';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Zugriff auf die WebsiteBaker Verwaltungsprogramme...';
$OVERVIEW['GROUPS'] = 'Verwaltung von Gruppen und Ihrer Zugangsberechtigungen...';
$OVERVIEW['HELP'] = 'Noch Fragen? Hier finden Sie Antworten';
$OVERVIEW['LANGUAGES'] = 'Sprachen verwalten...';
$OVERVIEW['MEDIA'] = 'Verwaltung der im Medienordner gespeicherten Dateien...';
$OVERVIEW['MODULES'] = 'Verwaltung der WebsiteBaker Module...';
$OVERVIEW['PAGES'] = 'Verwaltung Ihrer Webseiten...';
$OVERVIEW['PREFERENCES'] = 'Ändern persönlicher Einstellungen wie E-Mail Adresse, Passwort, usw.... ';
$OVERVIEW['SETTINGS'] = 'Ändern der Optionen für WebsiteBaker...';
$OVERVIEW['START'] = 'Überblick über die Verwaltung';
$OVERVIEW['TEMPLATES'] = 'Ändern des Designs Ihrer Webseite mit Vorlagen...';
$OVERVIEW['USERS'] = 'Verwaltung von Benutzern, die sich in WebsiteBaker einloggen dürfen...';
$OVERVIEW['VIEW'] = 'Ansicht Ihrer Webseite in einem neuen Fenster...';
