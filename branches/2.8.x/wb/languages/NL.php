<?php
/**
 *
 * @category        framework
 * @package         language
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// use languageedit-module to modify this file

// Define that this file is loaded
if(!defined('LANGUAGE_LOADED')) {
define('LANGUAGE_LOADED', true);
}

// Set the language information
$language_code = 'NL';
$language_name = 'Nederlands';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Bramus, CodeALot, Luckyluke, Argos';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Naar het hoofdmenu';
$MENU['PAGES'] = 'Pagina&rsquo;s';
$MENU['MEDIA'] = 'Media';
$MENU['ADDONS'] = 'Extra&rsquo;s';
$MENU['MODULES'] = 'Modules';
$MENU['TEMPLATES'] = 'Templates';
$MENU['LANGUAGES'] = 'Talen';
$MENU['PREFERENCES'] = 'Profiel';
$MENU['SETTINGS'] = 'Instellingen';
$MENU['ADMINTOOLS'] = 'Beheerfuncties';
$MENU['ACCESS'] = 'Toegang';
$MENU['USERS'] = 'Gebruikers';
$MENU['GROUPS'] = 'Groepen';
$MENU['HELP'] = 'Help';
$MENU['VIEW'] = 'Website';
$MENU['LOGOUT'] = 'Uitloggen';
$MENU['LOGIN'] = 'Inloggen';
$MENU['FORGOT'] = 'Inloggegevens opnieuw aanvragen';

// Section overviews
$OVERVIEW['START'] = 'Websitebeheer';
$OVERVIEW['PAGES'] = 'Aanmaken en beheren van de sitestructuur en pagina&rsquo;s.';
$OVERVIEW['MEDIA'] = 'Beheren van bestanden in de Media-map.';
$OVERVIEW['MODULES'] = 'Beheren van modules die extra functies toevoegen aan uw site.';
$OVERVIEW['TEMPLATES'] = 'Beheren van de templates die u kunt toepassen.';
$OVERVIEW['LANGUAGES'] = 'Beheren van de aanwezige taalbestanden.';
$OVERVIEW['PREFERENCES'] = 'Beheren van uw persoonlijk profiel.';
$OVERVIEW['SETTINGS'] = 'Beheren van de technische website-instellingen.';
$OVERVIEW['USERS'] = 'Beheren van de gebruikers van uw website.';
$OVERVIEW['GROUPS'] = 'Beheren van de gebruikersgroepen en hun rechten.';
$OVERVIEW['HELP'] = 'Uitgebreide hulp voor het gebruik van dit systeem.';
$OVERVIEW['VIEW'] = 'Bekijk uw website zoals deze voor bezoekers te zien is (in een afzonderlijk venster).';
$OVERVIEW['ADMINTOOLS'] = 'Diverse extra beheerinstellingen.';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Beheren bestaande pagina&rsquo;s';
$HEADING['DELETED_PAGES'] = 'Verwijderde pagina&rsquo;s';
$HEADING['ADD_PAGE'] = 'Toevoegen nieuwe pagina';
$HEADING['ADD_HEADING'] = 'Toevoegen titel';
$HEADING['MODIFY_PAGE'] = 'Aanpassen pagina';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Pagina-instellingen';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Geavanceerde pagina-instellingen';
$HEADING['MANAGE_SECTIONS'] = 'Sectiebeheer';
$HEADING['MODIFY_INTRO_PAGE'] = 'Wijzigen introductiepagina';

$HEADING['BROWSE_MEDIA'] = 'Bladeren door Media-map';
$HEADING['CREATE_FOLDER'] = 'Toevoegen nieuwe map';
$HEADING['UPLOAD_FILES'] = 'Uploaden bestanden';

$HEADING['INSTALL_MODULE'] = 'Toevoegen module';
$HEADING['UNINSTALL_MODULE'] = 'Verwijderen module';
$HEADING['MODULE_DETAILS'] = 'Modulegegevens';

$HEADING['INSTALL_TEMPLATE'] = 'Toevoegen template';
$HEADING['UNINSTALL_TEMPLATE'] = 'Verwijderen template';
$HEADING['TEMPLATE_DETAILS'] = 'Templategegevens';

$HEADING['INSTALL_LANGUAGE'] = 'Toevoegen taalbestand';
$HEADING['UNINSTALL_LANGUAGE'] = 'Verwijderen taalbestand';
$HEADING['LANGUAGE_DETAILS'] = 'Taalbestandgegevens';

$HEADING['MY_SETTINGS'] = 'Mijn gegevens';
$HEADING['MY_EMAIL'] = 'Mijn e-mailadres';
$HEADING['MY_PASSWORD'] = 'Mijn wachtwoord';

$HEADING['GENERAL_SETTINGS'] = 'Algemene instellingen';
$HEADING['DEFAULT_SETTINGS'] = 'Standaardinstellingen';
$HEADING['SEARCH_SETTINGS'] = 'Zoekinstellingen';
$HEADING['FILESYSTEM_SETTINGS'] = 'Bestandssysteeminstellingen';
$HEADING['SERVER_SETTINGS'] = 'Serverinstellingen';
$HEADING['WBMAILER_SETTINGS'] = 'Mailerinstellingen';
$HEADING['ADMINISTRATION_TOOLS'] = 'Beheerfuncties';

$HEADING['MODIFY_DELETE_USER'] = 'Beheren gebruikers';
$HEADING['ADD_USER'] = 'Toevoegen gebruiker';
$HEADING['MODIFY_USER'] = 'Gebruikersgegevens';

$HEADING['MODIFY_DELETE_GROUP'] = 'Beheren groep';
$HEADING['ADD_GROUP'] = 'Toevoegen groep';
$HEADING['MODIFY_GROUP'] = 'Groepsgegevens';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Module voldoet niet aan de eisen';
$HEADING['INVOKE_MODULE_FILES'] = 'Handmatige module-installatie';

// Other text
$TEXT['OPEN'] = 'Openen';
$TEXT['ADD'] = 'Toevoegen';
$TEXT['MODIFY'] = 'Wijzigen';
$TEXT['SETTINGS'] = 'Instellingen';
$TEXT['DELETE'] = 'Verwijderen';
$TEXT['SAVE'] = 'Opslaan';
$TEXT['RESET'] = 'Opnieuw';
$TEXT['LOGIN'] = 'Inloggen';
$TEXT['RELOAD'] = 'Vernieuwen';
$TEXT['CANCEL'] = 'Annuleren';
$TEXT['NAME'] = 'Naam';
$TEXT['PLEASE_SELECT'] = 'Selecteer';
$TEXT['TITLE'] = 'Titel';
$TEXT['PARENT'] = 'Ouder';
$TEXT['TYPE'] = 'Type';
$TEXT['VISIBILITY'] = 'Zichtbaarheid';
$TEXT['PRIVATE'] = 'Aangemeld';
$TEXT['PUBLIC'] = 'Iedereen';
$TEXT['NONE'] = 'Geen';
$TEXT['NONE_FOUND'] = 'Niet gevonden';
$TEXT['CURRENT'] = 'Huidig(e)';
$TEXT['CHANGE'] = 'Verander';
$TEXT['WINDOW'] = 'Scherm';
$TEXT['DESCRIPTION'] = 'Metatag "Description"';
$TEXT['KEYWORDS'] = 'Metatag "Keywords"';
$TEXT['ADMINISTRATORS'] = 'Beheerders';
$TEXT['PRIVATE_VIEWERS'] = 'Aangemelde bezoekers';
$TEXT['EXPAND'] = 'Uitklappen';
$TEXT['COLLAPSE'] = 'Inklappen';
$TEXT['MOVE_UP'] = 'Naar boven';
$TEXT['MOVE_DOWN'] = 'Naar beneden';
$TEXT['RENAME'] = 'Hernoemen';
$TEXT['MODIFY_SETTINGS'] = 'Wijzig instellingen';
$TEXT['MODIFY_CONTENT'] = 'Wijzig inhoud';
$TEXT['VIEW'] = 'Bekijken';
$TEXT['UP'] = 'Omhoog';
$TEXT['FORGOTTEN_DETAILS'] = 'Gegevens vergeten?';
$TEXT['NEED_TO_LOGIN'] = 'Inloggen?';
$TEXT['SEND_DETAILS'] = 'Stuur gegevens';
$TEXT['USERNAME'] = 'Gebruikersnaam';
$TEXT['PASSWORD'] = 'Wachtwoord';
$TEXT['HOME'] = 'Home';
$TEXT['TARGET_FOLDER'] = 'Doelmap';
$TEXT['OVERWRITE_EXISTING'] = 'Overschrijf bestaand(e)';
$TEXT['FILE'] = 'Bestand';
$TEXT['FILES'] = 'bestanden';
$TEXT['FOLDER'] = 'Map';
$TEXT['FOLDERS'] = 'Mappen';
$TEXT['CREATE_FOLDER'] = 'Cre&euml;er map';
$TEXT['UPLOAD_FILES'] = 'Upload bestand(en)';
$TEXT['CURRENT_FOLDER'] = 'Huidige map';
$TEXT['TO'] = 'Aan';
$TEXT['FROM'] = 'Van';
$TEXT['INSTALL'] = 'Installeren';
$TEXT['UNINSTALL'] = 'Verwijderen';
$TEXT['VIEW_DETAILS'] = 'Gegevens bekijken';
$TEXT['DISPLAY_NAME'] = 'Naamweergave';
$TEXT['AUTHOR'] = 'Auteur';
$TEXT['VERSION'] = 'Versie';
$TEXT['DESIGNED_FOR'] = 'Ontworpen voor';
$TEXT['DESCRIPTION'] = 'Metatag "Description"';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Taal';
$TEXT['TIMEZONE'] = 'Tijdzone';
$TEXT['CURRENT_PASSWORD'] = 'Huidig wachtwoord';
$TEXT['NEW_PASSWORD'] = 'Nieuw wachtwoord';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Herhaal nieuw wachtwoord';
$TEXT['ACTIVE'] = 'Actief';
$TEXT['DISABLED'] = 'Uit';
$TEXT['ENABLED'] = 'Aan';
$TEXT['RETYPE_PASSWORD'] = 'Herhaal wachtwoord';
$TEXT['GROUP'] = 'Groep';
$TEXT['SYSTEM_PERMISSIONS'] = 'Systeembevoegdheden';
$TEXT['MODULE_PERMISSIONS'] = 'Modulebevoegdheden';
$TEXT['SHOW_ADVANCED'] = 'Bekijk geavanceerde opties';
$TEXT['HIDE_ADVANCED'] = 'Verberg geavanceerde opties';
$TEXT['BASIC'] = 'Basis';
$TEXT['ADVANCED'] = 'Geavanceerd';
$TEXT['WEBSITE'] = 'Website';
$TEXT['DEFAULT'] = 'Standaard';
$TEXT['KEYWORDS'] = 'Metatag "Keywords"';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Header';
$TEXT['FOOTER'] = 'Footer';
$TEXT['TEMPLATE'] = 'Template';
$TEXT['THEME'] = 'Thema Website-beheer';
$TEXT['INSTALLATION'] = 'Installatie';
$TEXT['DATABASE'] = 'Database';
$TEXT['HOST'] = 'Host';
$TEXT['INTRO'] = 'Introductie';
$TEXT['PAGE'] = 'Pagina';
$TEXT['SIGNUP'] = 'Primaire aanmeldgroep';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP-foutmeldingsniveau';
$TEXT['ADMIN'] = 'Beheer';
$TEXT['PATH'] = 'Pad';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Website';
$TEXT['EXTENSION'] = 'Extensie';
$TEXT['TABLE_PREFIX'] = 'Tabelvoorvoegsel';
$TEXT['CHANGES'] = 'Veranderingen';
$TEXT['ADMINISTRATION'] = 'Beheer';
$TEXT['FORGOT_DETAILS'] = 'Gegevens vergeten?';
$TEXT['LOGGED_IN'] = 'Ingelogd';
$TEXT['WELCOME_BACK'] = 'Welkom terug';
$TEXT['FULL_NAME'] = 'Volledige naam';
$TEXT['ACCOUNT_SIGNUP'] = 'Aanmelden als gebruiker';
$TEXT['LINK'] = 'Link';
$TEXT['ANCHOR'] = 'Anker';
$TEXT['TARGET'] = 'Doel';
$TEXT['NEW_WINDOW'] = 'Nieuw scherm';
$TEXT['SAME_WINDOW'] = 'Zelfde scherm';
$TEXT['TOP_FRAME'] = 'Bovenste frame';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Paginaniveaulimiet';
$TEXT['SUCCESS'] = 'Succes';
$TEXT['ERROR'] = 'Fout';
$TEXT['ARE_YOU_SURE'] = 'Weet u het zeker?';
$TEXT['YES'] = 'Ja';
$TEXT['NO'] = 'Nee';
$TEXT['SYSTEM_DEFAULT'] = 'Standaardinstellingen';
$TEXT['PAGE_TITLE'] = 'Paginatitel';
$TEXT['MENU_TITLE'] = 'Menutitel';
$TEXT['ACTIONS'] = 'Acties';
$TEXT['UNKNOWN'] = 'Onbekend(e)';
$TEXT['BLOCK'] = 'Blok';
$TEXT['SEARCH'] = 'Zoeken';
$TEXT['SEARCHING'] = 'Zoekfunctie';
$TEXT['POST'] = 'Bericht';
$TEXT['COMMENT'] = 'Reageren';
$TEXT['COMMENTS'] = 'Reacties';
$TEXT['COMMENTING'] = 'Reactie-opties';
$TEXT['SHORT'] = 'Kort';
$TEXT['LONG'] = 'Lang';
$TEXT['LOOP'] = '"Loop"';
$TEXT['FIELD'] = 'Veld';
$TEXT['REQUIRED'] = 'Verplicht';
$TEXT['LENGTH'] = 'Lengte';
$TEXT['MESSAGE'] = 'Bericht';
$TEXT['SUBJECT'] = 'Onderwerp';
$TEXT['MATCH'] = 'Gelijk aan';
$TEXT['ALL_WORDS'] = 'Term of deel van term';
$TEXT['ANY_WORDS'] = 'E&eacute;n van de termen';
$TEXT['EXACT_MATCH'] = 'Exacte term';
$TEXT['SHOW'] = 'Tonen';
$TEXT['HIDE'] = 'Verbergen';
$TEXT['START_PUBLISHING'] = 'Aanvang publicatie';
$TEXT['FINISH_PUBLISHING'] = 'Einde publicatie';
$TEXT['DATE'] = 'Datum';
$TEXT['START'] = 'Aanvang';
$TEXT['END'] = 'Einde';
$TEXT['IMAGE'] = 'Afbeelding';
$TEXT['ICON'] = 'Icoon';
$TEXT['SECTION'] = 'Sectie';
$TEXT['DATE_FORMAT'] = 'Datumweergave';
$TEXT['TIME_FORMAT'] = 'Tijdweergave';
$TEXT['RESULTS'] = 'Resultaten';
$TEXT['RESIZE'] = 'Veranderen grootte';
$TEXT['MANAGE'] = 'Beheren';
$TEXT['CODE'] = 'Code';
$TEXT['WIDTH'] = 'Breedte';
$TEXT['HEIGHT'] = 'Hoogte';
$TEXT['MORE'] = 'Meer';
$TEXT['READ_MORE'] = 'Lees verder';
$TEXT['CHANGE_SETTINGS'] = 'Wijzig instellingen';
$TEXT['CURRENT_PAGE'] = 'Huidige pagina';
$TEXT['CLOSE'] = 'Sluiten';
$TEXT['INTRO_PAGE'] = 'Introductiepagina';
$TEXT['INSTALLATION_URL'] = 'Installatie-URL';
$TEXT['INSTALLATION_PATH'] = 'Installatiepad';
$TEXT['PAGE_EXTENSION'] = 'Pagina-extensie';
$TEXT['NO_RESULTS'] = 'Geen resultaten';
$TEXT['WEBSITE_TITLE'] = 'Metatag "Title"';
$TEXT['WEBSITE_DESCRIPTION'] = 'Metatag "Description"';
$TEXT['WEBSITE_KEYWORDS'] = 'Metatag "Keywords"';
$TEXT['WEBSITE_HEADER'] = 'Website-header';
$TEXT['WEBSITE_FOOTER'] = 'Website-footer';
$TEXT['RESULTS_HEADER'] = 'Resultaten-header';
$TEXT['RESULTS_LOOP'] = 'Zoekresultaten';
$TEXT['RESULTS_FOOTER'] = 'Zoekresultaten-footer';
$TEXT['LEVEL'] = 'Niveau';
$TEXT['NOT_FOUND'] = 'Niet gevonden';
$TEXT['PAGE_SPACER'] = 'Pagina-spacer';
$TEXT['MATCHING'] = 'Overeenkomend';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Templatebevoegdheden';
$TEXT['PAGES_DIRECTORY'] = 'Pagina&rsquo;s-map';
$TEXT['MEDIA_DIRECTORY'] = 'Media-map';
$TEXT['FILE_MODE'] = 'Bestandsmodus';
$TEXT['USER'] = 'Gebruiker';
$TEXT['OTHERS'] = 'Anderen';
$TEXT['READ'] = 'Lees';
$TEXT['WRITE'] = 'Schrijf';
$TEXT['EXECUTE'] = 'Uitvoeren';
$TEXT['SMART_LOGIN'] = 'Snel inloggen';
$TEXT['REMEMBER_ME'] = 'Onthoud mijn gegevens.';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Bestandssysteembevoegdheden';
$TEXT['DIRECTORIES'] = 'Mappen';
$TEXT['DIRECTORY_MODE'] = 'Directory-modus';
$TEXT['LIST_OPTIONS'] = 'Lijstopties';
$TEXT['OPTION'] = 'Optie';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Meerdere selecties toestaan';
$TEXT['TEXTFIELD'] = 'Tekstregel';
$TEXT['TEXTAREA'] = 'Tekstveld';
$TEXT['SELECT_BOX'] = 'Selectiemenu';
$TEXT['CHECKBOX_GROUP'] = 'Aankruisvakjes';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio buttons';
$TEXT['SIZE'] = 'Grootte';
$TEXT['DEFAULT_TEXT'] = 'Standaardtekst';
$TEXT['SEPERATOR'] = 'Scheidingsteken tussen opties (HTML toegestaan)';
$TEXT['BACK'] = 'Terug';
$TEXT['UNDER_CONSTRUCTION'] = 'In bewerking';
$TEXT['MULTISELECT'] = 'Meervoudige selectie';
$TEXT['SHORT_TEXT'] = 'Korte tekst';
$TEXT['LONG_TEXT'] = 'Lange tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Homepage-omleiding';
$TEXT['HEADING'] = 'Titel';
$TEXT['MULTIPLE_MENUS'] = 'Meerdere menu&rsquo;s';
$TEXT['REGISTERED'] = 'Geregistreerd';
$TEXT['SECTION_BLOCKS'] = 'Sectieblokken';
$TEXT['REGISTERED_VIEWERS'] = 'Geregistreerde bezoekers';
$TEXT['ALLOWED_VIEWERS'] = 'Toegestane kijkers';
$TEXT['SUBMISSION_ID'] = 'Ingezonden bericht';
$TEXT['SUBMISSIONS'] = 'Inzendingen';
$TEXT['SUBMITTED'] = 'Ingezonden';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maximaal aantal inzendingen per uur';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Maximaal aantal te bewaren inzendingen';
$TEXT['EMAIL_ADDRESS'] = 'E-mailadres';
$TEXT['CUSTOM'] = 'Handmatige invoer';
$TEXT['ANONYMOUS'] = 'Anoniem';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serverbesturingssysteem';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'CHMOD 777 alle bestanden';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Home-map';
$TEXT['HOME_FOLDERS'] = 'Home-mappen';
$TEXT['PAGE_TRASH'] = 'Paginaprullenbak';
$TEXT['INLINE'] = 'Inline';
$TEXT['SEPARATE'] = 'Gescheiden';
$TEXT['DELETED'] = 'Verwijderd';
$TEXT['VIEW_DELETED_PAGES'] = 'Bekijk verwijderde pagina&rsquo;s';
$TEXT['EMPTY_TRASH'] = 'Prullenbak legen';
$TEXT['TRASH_EMPTIED'] = 'Prullenbak geleegd';
$TEXT['ADD_SECTION'] = 'Toevoegen sectie';
$TEXT['POST_HEADER'] = 'Bericht-header';
$TEXT['POST_FOOTER'] = 'Bericht-footer';
$TEXT['POSTS_PER_PAGE'] = 'Berichten per pagina';
$TEXT['RESIZE_IMAGE_TO'] = 'Verander afbeeldingsgrootte naar';
$TEXT['UNLIMITED'] = 'Ongelimiteerd';
$TEXT['OF'] = 'van de';
$TEXT['OUT_OF'] = 'Buiten';
$TEXT['NEXT'] = 'Volgende';
$TEXT['PREVIOUS'] = 'Vorige';
$TEXT['NEXT_PAGE'] = 'Volgende pagina';
$TEXT['PREVIOUS_PAGE'] = 'Vorige pagina';
$TEXT['ON'] = 'Op';
$TEXT['LAST_UPDATED_BY'] = 'Laatste wijzigingen door';
$TEXT['RESULTS_FOR'] = 'Resultaten voor';
$TEXT['TIME'] = 'Tijd';
$TEXT['REDIRECT_AFTER'] = 'Omleiding na (sec.)';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG-stijl';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG-editor';
$TEXT['SERVER_EMAIL'] = 'Server e-mail';
$TEXT['MENU'] = 'Menu';
$TEXT['MANAGE_GROUPS'] = 'Groepenbeheer';
$TEXT['MANAGE_USERS'] = 'Gebruikersbeheer';
$TEXT['PAGE_LANGUAGES'] = 'Meerdere talen';
$TEXT['HIDDEN'] = 'Verborgen';
$TEXT['MAIN'] = 'Primair(e)';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Bestanden hernoemen bij uploaden';
$TEXT['APP_NAME'] = 'Applicatienaam';
$TEXT['SESSION_IDENTIFIER'] = 'Sessie-identificatie';
$TEXT['SEC_ANCHOR'] = 'Sessie-voorvoegsel';
$TEXT['BACKUP'] = 'Backup maken';
$TEXT['RESTORE'] = 'Backup terugzetten';
$TEXT['BACKUP_DATABASE'] = 'Backup van de database maken';
$TEXT['RESTORE_DATABASE'] = 'Backup van de database terugzetten';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup van alle tabellen in de database';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup van alleen WB-gerelateerde tabellen';
$TEXT['BACKUP_MEDIA'] = 'Backup van de Media-map maken';
$TEXT['RESTORE_MEDIA'] = 'Backup van de Media-map terugzetten';
$TEXT['ADMINISTRATION_TOOL'] = 'Beheeropties';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha-verificatie';
$TEXT['VERIFICATION'] = 'Verificatie';
$TEXT['DEFAULT_CHARSET'] = 'Standaard tekenset';
$TEXT['CHARSET'] = 'Tekenset';
$TEXT['MODULE_ORDER'] = 'Modules doorzoeken';
$TEXT['MAX_EXCERPT'] = 'Maximaal aantal gelijktijdige zoekacties';
$TEXT['TIME_LIMIT'] = 'Maximale zoektijd per module';
$TEXT['PUBL_START_DATE'] = 'Startdatum';
$TEXT['PUBL_END_DATE'] = 'Einddatum';
$TEXT['CALENDAR'] = 'Kalender';
$TEXT['DELETE_DATE'] = 'Wis datum';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Specificeer hieronder een standaard afzenderadres en afzendernaam. Het is aanbevolen om een afzenderadres als: <strong>admin@uwdomein.nl</strong> te gebruiken. Om verspreiding van spam tegen te gaan, kunnen sommige mailproviders (bijv. <em>mail.com</em>) mails verwerpen met een afzenderadres als <em>name@mail.com</em>, die verzonden worden vanaf een relay-server. Onderstaande standaardwaarden worden enkel gebruikt indien geen andere waarden gespecifieerd worden door WebsiteBaker. Indien uw server <acronym title="Simple mail transfer protocol">SMTP</acronym> ondersteunt kunt u deze optie gebruiken voor het versturen van uitgaande mails.';$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Standaard afzendermailadres';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Standaard afzendernaam';
$TEXT['WBMAILER_NOTICE'] = '<strong>Instellingen SMTP Mailer:</strong><br />Onderstaande instellingen zijn alleen van toepassing indien u mails wilt verzenden via <acronym title="Simple mail transfer protocol">SMTP</acronym>. Indien u de naam of instellingen van de SMTP-server niet kent, selecteer dan bij de standaard mailroutine: PHP MAIL.';
$TEXT['WBMAILER_FUNCTION'] = 'Mailafhandeling';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP-host';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP-authenticatie';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'Alleen wanneer men zich dient aan te melden bij de SMTP-host';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP-gebruikersnaam';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP-wachtwoord';
$TEXT['PLEASE_LOGIN'] = 'Inloggen aub';
$TEXT['CAP_EDIT_CSS'] = 'Wijzig CSS';
$TEXT['HEADING_CSS_FILE'] = 'Actuele modulebestand: ';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Wijzig de CSS-definities in het tekstveld hieronder.';
$TEXT['CODE_SNIPPET'] = "Code snippet";
$TEXT['REQUIREMENT'] = "Benodigd";
$TEXT['INSTALLED'] = "ge&iuml;nstalleerd";
$TEXT['NOT_INSTALLED'] = "niet ge&iuml;nstalleerd";
$TEXT['ADDON'] = "Add-On";
$TEXT['EXTENSION'] = "Extensie";
$TEXT['UNZIP_FILE'] = "Uploaden en uitpakken van ZIP-bestand";
$TEXT['DELETE_ZIP'] = "Verwijder ZIP van server na uitpakken";
$TEXT['NEED_CURRENT_PASSWORD'] ='bevestig met huidige wachtwoord';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';

// Success/error messages
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Sorry, u heeft geen bevoegdheden om deze pagina te bekijken';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, niets om af te beelden';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Onvoldoende rechten om hier te zijn';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Vul uw gebruikersnaam en wachtwoord in:';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Vul uw gebruikersnaam in';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Vul uw wachtwoord in';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Deze gebruikersnaam is te kort';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Dit wachtwoord is te kort';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Deze gebruikersnaam is te lang';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Dit wachtwoord is te lang';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Gebruikersnaam en/of wachtwoord incorrect';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'U moet een e-mailadres invullen';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Uw login-gegevens...';
$MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] = "
Hello {LOGIN_DISPLAY_NAME},

Welcome to our '{LOGIN_WEBSITE_TITLE}'.

Your '{LOGIN_WEBSITE_TITLE}' login details are:
Username: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Regards

Please:
if you have received this message by an error, please delete it immediately!
-------------------------------------
This message was automatic generated!
";

$MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT'] = "
Hello {LOGIN_DISPLAY_NAME},

This mail was sent because the 'forgot password' function has been applied to your account.

Your new '{LOGIN_WEBSITE_TITLE}' login details are:

Username: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Your password has been reset to the one above.
This means that your old password will no longer work anymore!
If you've got any questions or problems within the new login-data
you should contact the website-team or the admin of '{LOGIN_WEBSITE_TITLE}'.
Please remember to clean you browser-cache before using the new one to avoid unexpected fails.

Regards
------------------------------------
This message was automatic generated

";

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Vult u alstublieft uw e-mailadres hieronder in';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Het door u opgegeven e-mailadres is niet gevonden in onze database';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Het is niet mogelijk uw wachtwoord per e-mail te versturen. Neem contact op met de beheerder';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Uw gebruikersnaam en wachtwoord zijn verzonden naar het opgegeven e-mailadres';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Sorry, het wachtwoord kan maximaal eens per uur worden aangepast.';

$MESSAGE['START_WELCOME_MESSAGE'] = 'Welkom bij het websitebeheer';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Waarschuwing, de installatiemap bestaat nog steeds. U dient deze te verwijderen om veiligheidsrisico&rsquo;s te vermijden!';
$MESSAGE['START_CURRENT_USER'] = 'U bent ingelogd als';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Het configuratiebestand kan niet worden geopend';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Het configuratiebestand kan niet worden opgeslagen';
$MESSAGE['SETTINGS_SAVED'] = 'Instellingen opgeslagen';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Opgelet: sla eerst de wijzigingen op die u eventueel zojuist heeft aangebracht!';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Opgelet: dit is alleen bedoeld voor testdoeleinden!';

$MESSAGE['USERS_ADDED'] = 'Gebruiker toegevoegd';
$MESSAGE['USERS_SAVED'] = 'Gebruiker opgeslagen';
$MESSAGE['USERS_DELETED'] = 'Gebruiker verwijderd';
$MESSAGE['USERS_NO_GROUP'] = 'Geen groep geselecteerd';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'De ingevoerde  gebruikersnaam is te kort';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Het ingevoerde wachtwoord is te kort';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'De ingevoerde wachtwoorden komen niet overeen';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Het ingevoerde e-mailadres is niet correct';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Het ingevoerde e-mailadres is al in gebruik';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'De ingevoerde gebruikersnaam is al in gebruik';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Attentie: vul alleen de bovenstaande velden in wanneer u het wachtwoord van de gebruiker wilt veranderen';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Weet u zeker dat u de geselecteerde gebruiker wilt verwijderen?';

$MESSAGE['GROUPS_ADDED'] = 'Groep toegevoegd';
$MESSAGE['GROUPS_SAVED'] = 'Groep opgeslagen';
$MESSAGE['GROUPS_DELETED'] = 'Groep verwijderd';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Groepsnaam is niet ingevuld';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Weet u zeker dat u de geselecteerde groep wilt verwijderen (en alle daarbij behorende gebruikers)?';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Geen groep gevonden';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Groepnaam is reeds in gebruik';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Details opgeslagen';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail gewijzigd';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Het (huidige) ingevoerde wachtwoord is niet correct';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Wachtwoord gewijzigd';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Attentie: Om de template aan te passen moet u naar de instellingensectie';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Gebruik van ../ in de mapnaam is niet toegestaan';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Map bestaat niet';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Gebruik van ../ in de map is niet toegestaan';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Gebruik van ../ in de naam is niet toegestaan';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'index.php als naam is niet toegestaan';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Geen mediabestanden gevonden in de huidige map';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Bestand niet gevonden';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Bestand verwijderd';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Map verwijderd';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Weet u zeker dat u het volgende bestand of map wilt verwijderen?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Kan geselecteerde bestand niet verwijderen';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Kan geselecteerde map niet verwijderen';
$MESSAGE['MEDIA_BLANK_NAME'] = 'U heeft geen nieuwe naam opgegeven';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'U heeft geen bestandsextensie opgegeven';
$MESSAGE['MEDIA_RENAMED'] = 'Hernoemen geslaagd';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Hernoemen niet gelukt';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Opgegeven bestandsnaam bestaat al';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Opgegeven naam van de map bestaat al';
$MESSAGE['MEDIA_DIR_MADE'] = 'Map aangemaakt';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Aanmaken map mislukt';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' geupload';
$MESSAGE['MEDIA_UPLOADED'] = ' geupload';

$MESSAGE['PAGES_ADDED'] = 'Pagina toegevoegd';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Paginatitel opgeslagen';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Een pagina met dezelfde naam bestaat al';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Kan geen bestanden opslaan in de /pages-map (onvoldoende rechten)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Kan geen bestanden verwijderen uit de /pages-map (onvoldoende rechten)';
$MESSAGE['PAGES_NOT_FOUND'] = 'Pagina niet gevonden';
$MESSAGE['PAGES_SAVED'] = 'Pagina opgeslagen';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Pagina-instellingen opgeslagen';
$MESSAGE['PAGES_NOT_SAVED'] = 'Fout tijdens opslaan pagina';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Weet u zeker dat u deze pagina wilt verwijderen (en al zijn subpagina&rsquo;s)';
$MESSAGE['PAGES_DELETED'] = 'Pagina verwijderd';
$MESSAGE['PAGES_RESTORED'] = 'Pagina teruggehaald';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Vul a.u.b. een paginatitel in';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Vul a.u.b. een menutitel in';
$MESSAGE['PAGES_REORDERED'] = 'Pagina herordend';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Fout bij herordenen pagina';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'U heeft niet de rechten om deze pagina aan te passen';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Kan instellingen niet opslaan in het bestand /pages/intro.php (onvoldoende rechten)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Introductiepagina opgeslagen';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Als laatste aangepast door';
$MESSAGE['PAGES_INTRO_LINK'] = 'Klik hier om de introductiepagina aan te passen';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Sectie-instellingen opgeslagen';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Keer terug naar pagina&rsquo;s';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Niet alle velden zijn ingevuld. Probeert u het nog eens';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Let op: het bestand moet het volgende formaat hebben:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Let op: de bestanden moeten het volgende formaat hebben:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Kan niet uploaden';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Is al ge&iuml;nstalleerd';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Niet ge&iuml;nstalleerd';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Kan niet de&iuml;nstalleren';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kan het bestand niet uitpakken';
$MESSAGE['GENERIC_INSTALLED'] = 'Installatie voltooid';
$MESSAGE['GENERIC_UPGRADED'] = 'Upgrade voltooid';
$MESSAGE['GENERIC_UNINSTALLED'] = 'De&iuml;nstallatie voltooid';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kan niet schrijven naar doelmap';
$MESSAGE['GENERIC_INVALID'] = 'Ongeldig bestand';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Kan niet de&iuml;nstalleren: het geselecteerde bestand is in gebruik';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = "<br /><br />De {{type}} <b>{{type_name}}</b> kan niet verwijderd worden omdat het in gebruik is op {{pages}}:<br /><br />";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = "volgende pagina;volgende pagina's";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "De template <b>{{name}}</b> kan niet verwijderd worden omdat het de standaard-template is.";

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website in bewerking';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Probeert u het a.u.b. binnenkort nog eens.';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Even geduld aub, dit kan even duren.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Kan bestand niet openen.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] =    'Ongeldig WebsiteBaker installatiebestand. Controleer het *.zip bestand.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Ongeldig WebsiteBaker taalbestand. Controleer het tekstbestand.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'De volgende velden zijn verplicht';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Dit formulier is te vaak verstuurd binnen dit uur. Probeert u het over een uur nog eens.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Het verificatienummer (ook wel Captcha genoemd) dat u hebt ingevoerd is incorrect. Als u de Captcha niet goed kunt lezen, stuur dan een e-mail naar: '.SERVER_EMAIL.'';

$MESSAGE['ADDON_RELOAD'] = 'Aanpassen van de database met informatie van de modules (voorbeeld na een FTP-upload).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Fout tijdens de update van de module-informatie.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'De modules zijn herladen';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'De templates zijn herladen';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'De taalbestanden zijn herladen';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'De installatie van deze module is mislukt. Uw systeem voldoet niet aan de eisen voor een goede werking van deze module. Om deze module op uw systeem te laten werken, moeten onderstaande problemen opgelost worden.';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'Wanneer modules via FTP ge&uuml;pload  worden (niet aanbevolen), worden de module-installatiebestanden <tt>install.php </tt>, <tt> upgrade.php </tt> of <tt> uninstall.php </tt> niet automatisch uitgevoerd. Deze modules werken mogelijk niet correct of worden niet correct verwijderd.<br /><br />U kunt deze modulebestanden handmatig uitvoeren voor onderstaande modules die u via FTP ge&uuml;pload hebt.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Waarschuwing: bestaande instellingen in de database van de modules zullen verloren gaan. Gebruik deze optie alleen als u problemen ondervindt met modules ge&uuml;pload via FTP.';

 /* BEGIN allocation */

$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS']  = $MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] ;
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS']  = $MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] ;
$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES']  = $MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] ;
$MESSAGE['LOGIN']['BOTH_BLANK']  = $MESSAGE['LOGIN_BOTH_BLANK'] ;
$MESSAGE['LOGIN']['USERNAME_BLANK']  = $MESSAGE['LOGIN_USERNAME_BLANK'] ;
$MESSAGE['LOGIN']['PASSWORD_BLANK']  = $MESSAGE['LOGIN_PASSWORD_BLANK'] ;
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT']  = $MESSAGE['LOGIN_USERNAME_TOO_SHORT'] ;
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT']  = $MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] ;
$MESSAGE['LOGIN']['USERNAME_TOO_LONG']  = $MESSAGE['LOGIN_USERNAME_TOO_LONG'] ;
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG']  = $MESSAGE['LOGIN_PASSWORD_TOO_LONG'] ;
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED']  = $MESSAGE['LOGIN_AUTHENTICATION_FAILED'] ;
$MESSAGE['SIGNUP']['NO_EMAIL']  = $MESSAGE['SIGNUP_NO_EMAIL'] ;
$MESSAGE['SIGNUP2']['SUBJECT_LOGIN_INFO']  = $MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] ;
$MESSAGE['SIGNUP2']['BODY_LOGIN_INFO']  = $MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] ;
$MESSAGE['SIGNUP2']['BODY_LOGIN_FORGOT']  = $MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT'] ;
$MESSAGE['FORGOT_PASS']['NO_DATA']  = $MESSAGE['FORGOT_PASS_NO_DATA'] ;
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND']  = $MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] ;
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL']  = $MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] ;
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET']  = $MESSAGE['FORGOT_PASS_PASSWORD_RESET'] ;
$MESSAGE['FORGOT_PASS']['ALREADY_RESET']  = $MESSAGE['FORGOT_PASS_ALREADY_RESET'] ;
$MESSAGE['START']['WELCOME_MESSAGE']  = $MESSAGE['START_WELCOME_MESSAGE'] ;
$MESSAGE['START']['INSTALL_DIR_EXISTS']  = $MESSAGE['START_INSTALL_DIR_EXISTS'] ;
$MESSAGE['START']['CURRENT_USER']  = $MESSAGE['START_CURRENT_USER'] ;
$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG']  = $MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] ;
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG']  = $MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] ;
$MESSAGE['SETTINGS']['SAVED']  = $MESSAGE['SETTINGS_SAVED'] ;
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING']  = $MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] ;
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING']  = $MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] ;
$MESSAGE['USERS']['ADDED']  = $MESSAGE['USERS_ADDED'] ;
$MESSAGE['USERS']['SAVED']  = $MESSAGE['USERS_SAVED'] ;
$MESSAGE['USERS']['DELETED']  = $MESSAGE['USERS_DELETED'] ;
$MESSAGE['USERS']['NO_GROUP']  = $MESSAGE['USERS_NO_GROUP'] ;
$MESSAGE['USERS']['USERNAME_TOO_SHORT']  = $MESSAGE['USERS_USERNAME_TOO_SHORT'] ;
$MESSAGE['USERS']['PASSWORD_TOO_SHORT']  = $MESSAGE['USERS_PASSWORD_TOO_SHORT'] ;
$MESSAGE['USERS']['PASSWORD_MISMATCH']  = $MESSAGE['USERS_PASSWORD_MISMATCH'] ;
$MESSAGE['USERS']['INVALID_EMAIL']  = $MESSAGE['USERS_INVALID_EMAIL'] ;
$MESSAGE['USERS']['EMAIL_TAKEN']  = $MESSAGE['USERS_EMAIL_TAKEN'] ;
$MESSAGE['USERS']['USERNAME_TAKEN']  = $MESSAGE['USERS_USERNAME_TAKEN'] ;
$MESSAGE['USERS']['CHANGING_PASSWORD']  = $MESSAGE['USERS_CHANGING_PASSWORD'] ;
$MESSAGE['USERS']['CONFIRM_DELETE']  = $MESSAGE['USERS_CONFIRM_DELETE'] ;
$MESSAGE['GROUPS']['ADDED']  = $MESSAGE['GROUPS_ADDED'] ;
$MESSAGE['GROUPS']['SAVED']  = $MESSAGE['GROUPS_SAVED'] ;
$MESSAGE['GROUPS']['DELETED']  = $MESSAGE['GROUPS_DELETED'] ;
$MESSAGE['GROUPS']['GROUP_NAME_BLANK']  = $MESSAGE['GROUPS_GROUP_NAME_BLANK'] ;
$MESSAGE['GROUPS']['CONFIRM_DELETE']  = $MESSAGE['GROUPS_CONFIRM_DELETE'] ;
$MESSAGE['GROUPS']['NO_GROUPS_FOUND']  = $MESSAGE['GROUPS_NO_GROUPS_FOUND'] ;
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS']  = $MESSAGE['GROUPS_GROUP_NAME_EXISTS'] ;
$MESSAGE['PREFERENCES']['DETAILS_SAVED']  = $MESSAGE['PREFERENCES_DETAILS_SAVED'] ;
$MESSAGE['PREFERENCES']['EMAIL_UPDATED']  = $MESSAGE['PREFERENCES_EMAIL_UPDATED'] ;
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT']  = $MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] ;
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED']  = $MESSAGE['PREFERENCES_PASSWORD_CHANGED'] ;
$MESSAGE['PREFERENCES']['INVALID_CHARS']  = $MESSAGE['PREFERENCES_INVALID_CHARS'] ;
$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE']  = $MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] ;
$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH']  = $MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] ;
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST']  = $MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] ;
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH']  = $MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] ;
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH']  = $MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] ;
$MESSAGE['MEDIA']['NAME_INDEX_PHP']  = $MESSAGE['MEDIA_NAME_INDEX_PHP'] ;
$MESSAGE['MEDIA']['NONE_FOUND']  = $MESSAGE['MEDIA_NONE_FOUND'] ;
$MESSAGE['MEDIA']['FILE_NOT_FOUND']  = $MESSAGE['MEDIA_FILE_NOT_FOUND'] ;
$MESSAGE['MEDIA']['DELETED_FILE']  = $MESSAGE['MEDIA_DELETED_FILE'] ;
$MESSAGE['MEDIA']['DELETED_DIR']  = $MESSAGE['MEDIA_DELETED_DIR'] ;
$MESSAGE['MEDIA']['CONFIRM_DELETE']  = $MESSAGE['MEDIA_CONFIRM_DELETE'] ;
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE']  = $MESSAGE['MEDIA_CANNOT_DELETE_FILE'] ;
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR']  = $MESSAGE['MEDIA_CANNOT_DELETE_DIR'] ;
$MESSAGE['MEDIA']['BLANK_NAME']  = $MESSAGE['MEDIA_BLANK_NAME'] ;
$MESSAGE['MEDIA']['BLANK_EXTENSION']  = $MESSAGE['MEDIA_BLANK_EXTENSION'] ;
$MESSAGE['MEDIA']['RENAMED']  = $MESSAGE['MEDIA_RENAMED'] ;
$MESSAGE['MEDIA']['CANNOT_RENAME']  = $MESSAGE['MEDIA_CANNOT_RENAME'] ;
$MESSAGE['MEDIA']['FILE_EXISTS']  = $MESSAGE['MEDIA_FILE_EXISTS'] ;
$MESSAGE['MEDIA']['DIR_EXISTS']  = $MESSAGE['MEDIA_DIR_EXISTS'] ;
$MESSAGE['MEDIA']['DIR_MADE']  = $MESSAGE['MEDIA_DIR_MADE'] ;
$MESSAGE['MEDIA']['DIR_NOT_MADE']  = $MESSAGE['MEDIA_DIR_NOT_MADE'] ;
$MESSAGE['MEDIA']['SINGLE_UPLOADED']  = $MESSAGE['MEDIA_SINGLE_UPLOADED'] ;
$MESSAGE['MEDIA']['UPLOADED']  = $MESSAGE['MEDIA_UPLOADED'] ;
$MESSAGE['PAGES']['ADDED']  = $MESSAGE['PAGES_ADDED'] ;
$MESSAGE['PAGES']['ADDED_HEADING']  = $MESSAGE['PAGES_ADDED_HEADING'] ;
$MESSAGE['PAGES']['PAGE_EXISTS']  = $MESSAGE['PAGES_PAGE_EXISTS'] ;
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE']  = $MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] ;
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE']  = $MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] ;
$MESSAGE['PAGES']['NOT_FOUND']  = $MESSAGE['PAGES_NOT_FOUND'] ;
$MESSAGE['PAGES']['SAVED']  = $MESSAGE['PAGES_SAVED'] ;
$MESSAGE['PAGES']['SAVED_SETTINGS']  = $MESSAGE['PAGES_SAVED_SETTINGS'] ;
$MESSAGE['PAGES']['NOT_SAVED']  = $MESSAGE['PAGES_NOT_SAVED'] ;
$MESSAGE['PAGES']['DELETE_CONFIRM']  = $MESSAGE['PAGES_DELETE_CONFIRM'] ;
$MESSAGE['PAGES']['DELETED']  = $MESSAGE['PAGES_DELETED'] ;
$MESSAGE['PAGES']['RESTORED']  = $MESSAGE['PAGES_RESTORED'] ;
$MESSAGE['PAGES']['BLANK_PAGE_TITLE']  = $MESSAGE['PAGES_BLANK_PAGE_TITLE'] ;
$MESSAGE['PAGES']['BLANK_MENU_TITLE']  = $MESSAGE['PAGES_BLANK_MENU_TITLE'] ;
$MESSAGE['PAGES']['REORDERED']  = $MESSAGE['PAGES_REORDERED'] ;
$MESSAGE['PAGES']['CANNOT_REORDER']  = $MESSAGE['PAGES_CANNOT_REORDER'] ;
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS']  = $MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] ;
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE']  = $MESSAGE['PAGES_INTRO_NOT_WRITABLE'] ;
$MESSAGE['PAGES']['INTRO_SAVED']  = $MESSAGE['PAGES_INTRO_SAVED'] ;
$MESSAGE['PAGES']['LAST_MODIFIED']  = $MESSAGE['PAGES_LAST_MODIFIED'] ;
$MESSAGE['PAGES']['INTRO_LINK']  = $MESSAGE['PAGES_INTRO_LINK'] ;
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED']  = $MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] ;
$MESSAGE['PAGES']['RETURN_TO_PAGES']  = $MESSAGE['PAGES_RETURN_TO_PAGES'] ;
$MESSAGE['GENERIC']['FILL_IN_ALL']  = $MESSAGE['GENERIC_FILL_IN_ALL'] ;
$MESSAGE['GENERIC']['FILE_TYPE']  = $MESSAGE['GENERIC_FILE_TYPE'] ;
$MESSAGE['GENERIC']['FILE_TYPES']  = $MESSAGE['GENERIC_FILE_TYPES'] ;
$MESSAGE['GENERIC']['CANNOT_UPLOAD']  = $MESSAGE['GENERIC_CANNOT_UPLOAD'] ;
$MESSAGE['GENERIC']['ALREADY_INSTALLED']  = $MESSAGE['GENERIC_ALREADY_INSTALLED'] ;
$MESSAGE['GENERIC']['NOT_INSTALLED']  = $MESSAGE['GENERIC_NOT_INSTALLED'] ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL'] ;
$MESSAGE['GENERIC']['CANNOT_UNZIP']  = $MESSAGE['GENERIC_CANNOT_UNZIP'] ;
$MESSAGE['GENERIC']['INSTALLED']  = $MESSAGE['GENERIC_INSTALLED'] ;
$MESSAGE['GENERIC']['UPGRADED']  = $MESSAGE['GENERIC_UPGRADED'] ;
$MESSAGE['GENERIC']['UNINSTALLED']  = $MESSAGE['GENERIC_UNINSTALLED'] ;
$MESSAGE['GENERIC']['BAD_PERMISSIONS']  = $MESSAGE['GENERIC_BAD_PERMISSIONS'] ;
$MESSAGE['GENERIC']['INVALID']  = $MESSAGE['GENERIC_INVALID'] ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] ;
$MESSAGE['GENERIC']['SECURITY_OFFENSE']  = $MESSAGE['GENERIC_SECURITY_OFFENSE'] ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL_PAGES']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] ;
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION']  = $MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] ;
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON']  = $MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] ;
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT']  = $MESSAGE['GENERIC_PLEASE_BE_PATIENT'] ;
$MESSAGE['GENERIC']['ERROR_OPENING_FILE']  = $MESSAGE['GENERIC_ERROR_OPENING_FILE'] ;
$MESSAGE['GENERIC']['INVALID_ADDON_FILE']  = $MESSAGE['GENERIC_INVALID_ADDON_FILE'] ;
$MESSAGE['GENERIC']['INVALID_LANGUAGE_FILE']  = $MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] ;
$MESSAGE['MOD_FORM']['REQUIRED_FIELDS']  = $MESSAGE['MOD_FORM_REQUIRED_FIELDS'] ;
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS']  = $MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] ;
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA']  = $MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] ;
$MESSAGE['ADDON']['RELOAD']  = $MESSAGE['ADDON_RELOAD'] ;
$MESSAGE['ADDON']['ERROR_RELOAD']  = $MESSAGE['ADDON_ERROR_RELOAD'] ;
$MESSAGE['ADDON']['MODULES_RELOADED']  = $MESSAGE['ADDON_MODULES_RELOADED'] ;
$MESSAGE['ADDON']['TEMPLATES_RELOADED']  = $MESSAGE['ADDON_TEMPLATES_RELOADED'] ;
$MESSAGE['ADDON']['LANGUAGES_RELOADED']  = $MESSAGE['ADDON_LANGUAGES_RELOADED'] ;
$MESSAGE['ADDON']['PRECHECK_FAILED']  = $MESSAGE['ADDON_PRECHECK_FAILED'] ;
$MESSAGE['ADDON']['MANUAL_INSTALLATION']  = $MESSAGE['ADDON_MANUAL_INSTALLATION'] ;
$MESSAGE['ADDON']['MANUAL_INSTALLATION_WARNING']  = $MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] ;

/* END allocation */
?>