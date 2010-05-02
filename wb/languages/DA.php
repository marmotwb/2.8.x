<?php
/**
 *
 * @category        framework
 * @package         language
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.3.4 and higher
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
$language_code = 'DA';
$language_name = 'Dansk';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Achrist';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Hjem';
$MENU['PAGES'] = 'Sider';
$MENU['MEDIA'] = 'Medie-filer';
$MENU['ADDONS'] = 'Add-ons';
$MENU['MODULES'] = 'Moduler';
$MENU['TEMPLATES'] = 'Skabeloner';
$MENU['LANGUAGES'] = 'Sprog';
$MENU['PREFERENCES'] = 'Pr&aelig;ferencer';
$MENU['SETTINGS'] = 'Indstillinger';
$MENU['ADMINTOOLS'] = 'Admin-v&aelig;rkt&oslash;jer';
$MENU['ACCESS'] = 'Adgang';
$MENU['USERS'] = 'Brugere';
$MENU['GROUPS'] = 'Grupper';
$MENU['HELP'] = 'Hj&aelig;lp';
$MENU['VIEW'] = 'Vis';
$MENU['LOGOUT'] = 'Log ud';
$MENU['LOGIN'] = 'Log ind';
$MENU['FORGOT'] = 'Modtag login oplysninger';

// Section overviews
$OVERVIEW['START'] = 'Administrationsoversigt';
$OVERVIEW['PAGES'] = 'Administr&eacute;r dine websider...';
$OVERVIEW['MEDIA'] = 'Administr&eacute;r filer i mappen medier...';
$OVERVIEW['MODULES'] = 'Administr&eacute;r WebsiteBaker moduler...';
$OVERVIEW['TEMPLATES'] = 'Skift udseende og layout/design p&aring; din webside v.h.a. skabeloner....';
$OVERVIEW['LANGUAGES'] = 'Administration af sprog i WebsiteBaker...';
$OVERVIEW['PREFERENCES'] = 'Tilpas pr&aelig;ferencer s&aring;som email-adresse, adgangskode, etc... ';
$OVERVIEW['SETTINGS'] = 'Tilpas indstillinger for WebsiteBaker...';
$OVERVIEW['USERS'] = 'Administr&eacute;r brugere som kan logge ind p&aring; WebsiteBaker systemet...';
$OVERVIEW['GROUPS'] = 'Administr&eacute;r brugergrupper og deres systemrettigheder...';
$OVERVIEW['HELP'] = 'Sp&oslash;rgsm&aring;l? Find dine svar her...';
$OVERVIEW['VIEW'] = 'Hurtig visning og gennemsyn af dit Websted i et nyt vindue..';
$OVERVIEW['ADMINTOOLS'] = 'WebsiteBaker administrationsv&aelig;rkt&oslash;jer...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Ret/slet side';
$HEADING['DELETED_PAGES'] = 'Slettede sider';
$HEADING['ADD_PAGE'] = 'Tilf&oslash;j side';
$HEADING['ADD_HEADING'] = 'Tilf&oslash;j overskrift';
$HEADING['MODIFY_PAGE'] = 'Rediger side';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Rediger side-indstillinger';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Rediger avancerede indstillinger for hjemmesiden';
$HEADING['MANAGE_SECTIONS'] = 'Administr&eacute;r sektioner';
$HEADING['MODIFY_INTRO_PAGE'] = 'Rediger intro-side';

$HEADING['BROWSE_MEDIA'] = 'Gennemse medie-mappe';
$HEADING['CREATE_FOLDER'] = 'Opret mappe';
$HEADING['UPLOAD_FILES'] = 'Overf&oslash;r fil(er)';

$HEADING['INSTALL_MODULE'] = 'Install&eacute;r modul';
$HEADING['UNINSTALL_MODULE'] = 'Afinstall&eacute;r modul';
$HEADING['MODULE_DETAILS'] = 'Info om modul';

$HEADING['INSTALL_TEMPLATE'] = 'Install&eacute;r skabelon';
$HEADING['UNINSTALL_TEMPLATE'] = 'Afinstall&eacute;r skabelon';
$HEADING['TEMPLATE_DETAILS'] = 'Info om skabelon';

$HEADING['INSTALL_LANGUAGE'] = 'Install&eacute;r sprog';
$HEADING['UNINSTALL_LANGUAGE'] = 'Afinstall&eacute;r sprog';
$HEADING['LANGUAGE_DETAILS'] = 'Info om sprog';

$HEADING['MY_SETTINGS'] = 'Mine indstillinger';
$HEADING['MY_EMAIL'] = 'Min email-adresse';
$HEADING['MY_PASSWORD'] = 'Min adgangskode';

$HEADING['GENERAL_SETTINGS'] = 'Generelle indstillinger';
$HEADING['DEFAULT_SETTINGS'] = 'Standard indstillinger';
$HEADING['SEARCH_SETTINGS'] = 'S&oslash;ge-indstillinger';
$HEADING['FILESYSTEM_SETTINGS'] = 'Filsystem-indstillinger';
$HEADING['SERVER_SETTINGS'] = 'Server-indstillinger';
$HEADING['WBMAILER_SETTINGS'] = 'E-mail-indstillinger';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administrationsv&aelig;rkt&oslash;jer';

$HEADING['MODIFY_DELETE_USER'] = 'Ret/slet bruger';
$HEADING['ADD_USER'] = 'Tilf&oslash;j bruger';
$HEADING['MODIFY_USER'] = 'Ret bruger';

$HEADING['MODIFY_DELETE_GROUP'] = 'Ret/slet gruppe';
$HEADING['ADD_GROUP'] = 'Tilf&oslash;j gruppe';
$HEADING['MODIFY_GROUP'] = 'Ret gruppe';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On krav er ikke opfyldt';
$HEADING['INVOKE_MODULE_FILES'] = 'Eksekver modulfiler manuelt';

// Other text
$TEXT['OPEN'] = '&Aring;ben';
$TEXT['ADD'] = 'Tilf&oslash;j';
$TEXT['MODIFY'] = 'Ret';
$TEXT['SETTINGS'] = 'Indstillinger';
$TEXT['DELETE'] = 'Slet';
$TEXT['SAVE'] = 'Gem';
$TEXT['RESET'] = 'Nulstil';
$TEXT['LOGIN'] = 'Log ind';
$TEXT['RELOAD'] = 'Opdat&eacute;r';
$TEXT['CANCEL'] = 'Annull&eacute;r';
$TEXT['NAME'] = 'Navn';
$TEXT['PLEASE_SELECT'] = 'V&aelig;lg venligst';
$TEXT['TITLE'] = 'Titel';
$TEXT['PARENT'] = 'Overliggende niveau';
$TEXT['TYPE'] = 'Type';
$TEXT['VISIBILITY'] = 'Synlighed';
$TEXT['PRIVATE'] = 'Privat';
$TEXT['PUBLIC'] = 'Offentlig';
$TEXT['NONE'] = 'Usynlig';
$TEXT['NONE_FOUND'] = 'Ingen fundet';
$TEXT['CURRENT'] = 'Nuv&aelig;rende';
$TEXT['CHANGE'] = 'Ret';
$TEXT['WINDOW'] = 'Vindue';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['KEYWORDS'] = 'N&oslash;gleord';
$TEXT['ADMINISTRATORS'] = 'Administratorer';
$TEXT['PRIVATE_VIEWERS'] = 'Private bes&oslash;gende';
$TEXT['EXPAND'] = 'Fold ud';
$TEXT['COLLAPSE'] = 'Fold sammen';
$TEXT['MOVE_UP'] = 'Flyt op';
$TEXT['MOVE_DOWN'] = 'Flyt ned';
$TEXT['RENAME'] = 'Omd&oslash;b';
$TEXT['MODIFY_SETTINGS'] = 'Skift indstillinger';
$TEXT['MODIFY_CONTENT'] = 'Ret indhold';
$TEXT['VIEW'] = 'Se';
$TEXT['UP'] = 'Op';
$TEXT['FORGOTTEN_DETAILS'] = 'Har du glemt dine login-oplysninger?';
$TEXT['NEED_TO_LOGIN'] = 'Brug for at logge ind?';
$TEXT['SEND_DETAILS'] = 'Send oplysninger';
$TEXT['USERNAME'] = 'Brugernavn';
$TEXT['PASSWORD'] = 'Adgangskode';
$TEXT['HOME'] = 'Hjem';
$TEXT['TARGET_FOLDER'] = 'Mappeplacering';
$TEXT['OVERWRITE_EXISTING'] = 'Overskriv eksisterende';
$TEXT['FILE'] = 'Fil';
$TEXT['FILES'] = 'Filer';
$TEXT['FOLDER'] = 'Mappe';
$TEXT['FOLDERS'] = 'Mapper';
$TEXT['CREATE_FOLDER'] = 'Opret mappe';
$TEXT['UPLOAD_FILES'] = 'Overf&oslash;r fil(er)';
$TEXT['CURRENT_FOLDER'] = 'Nuv&aelig;rende mappe';
$TEXT['TO'] = 'Til';
$TEXT['FROM'] = 'Fra';
$TEXT['INSTALL'] = 'Install&eacute;r';
$TEXT['UNINSTALL'] = 'Afinstall&eacute;r';
$TEXT['VIEW_DETAILS'] = 'Se oplysninger';
$TEXT['DISPLAY_NAME'] = 'Vis navn';
$TEXT['AUTHOR'] = 'Udvikler/forfatter';
$TEXT['VERSION'] = 'Version';
$TEXT['DESIGNED_FOR'] = 'Designet til';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['EMAIL'] = 'Email-adresse';
$TEXT['LANGUAGE'] = 'Sprog';
$TEXT['TIMEZONE'] = 'Tidszone';
$TEXT['CURRENT_PASSWORD'] = 'Nuv&aelig;rende adgangskode';
$TEXT['NEW_PASSWORD'] = 'Ny adgangskode';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Skriv ny adgangskode igen';
$TEXT['ACTIVE'] = 'Aktiv';
$TEXT['DISABLED'] = 'Deaktiveret';
$TEXT['ENABLED'] = 'Aktiveret';
$TEXT['RETYPE_PASSWORD'] = 'Indtast adgangskode igen';
$TEXT['GROUP'] = 'Gruppe';
$TEXT['SYSTEM_PERMISSIONS'] = 'Systemrettigheder';
$TEXT['MODULE_PERMISSIONS'] = 'Modulrettigheder';
$TEXT['SHOW_ADVANCED'] = 'Vis avancerede indstillnger';
$TEXT['HIDE_ADVANCED'] = 'Skjul avancerede indstillinger';
$TEXT['BASIC'] = 'Basisindstillinger';
$TEXT['ADVANCED'] = 'Avanceret';
$TEXT['WEBSITE'] = 'Websted';
$TEXT['DEFAULT'] = 'Standard';
$TEXT['KEYWORDS'] = 'N&oslash;gleord';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Hoved (overligger)';
$TEXT['FOOTER'] = 'Fod (bund)';
$TEXT['TEMPLATE'] = 'Skabelon';
$TEXT['THEME'] = 'Backend-tema';
$TEXT['INSTALLATION'] = 'Installation';
$TEXT['DATABASE'] = 'Database';
$TEXT['HOST'] = 'V&aelig;rt';
$TEXT['INTRO'] = 'Introduktion';
$TEXT['PAGE'] = 'Side';
$TEXT['SIGNUP'] = 'Registrering';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP fejlrapporteringsniveau';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = 'Sti';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Websted (vis siden)';
$TEXT['EXTENSION'] = 'Udvidelse';
$TEXT['TABLE_PREFIX'] = 'Tabelpr&aelig;fix';
$TEXT['CHANGES'] = '&AElig;ndringer';
$TEXT['ADMINISTRATION'] = 'Administr&eacute;r';
$TEXT['FORGOT_DETAILS'] = 'Glemt login-oplysninger?';
$TEXT['LOGGED_IN'] = 'Logget ind';
$TEXT['WELCOME_BACK'] = 'Velkommen igen';
$TEXT['FULL_NAME'] = 'Fulde navn';
$TEXT['ACCOUNT_SIGNUP'] = 'Kontoregistrering';
$TEXT['LINK'] = 'Link';
$TEXT['ANCHOR'] = 'Bogm&aelig;rke';
$TEXT['TARGET'] = 'M&aring;l';
$TEXT['NEW_WINDOW'] = 'Nyt vindue';
$TEXT['SAME_WINDOW'] = 'Samme vindue';
$TEXT['TOP_FRAME'] = 'Top frame';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Max. sideantal';
$TEXT['SUCCESS'] = 'Oplysninger gemt';
$TEXT['ERROR'] = 'Der opstod en fejl';
$TEXT['ARE_YOU_SURE'] = 'Er du sikker?';
$TEXT['YES'] = 'Ja';
$TEXT['NO'] = 'Nej';
$TEXT['SYSTEM_DEFAULT'] = 'Systemstandard';
$TEXT['PAGE_TITLE'] = 'Titel p&aring; side';
$TEXT['MENU_TITLE'] = 'Menutitel';
$TEXT['ACTIONS'] = 'Handlinger';
$TEXT['UNKNOWN'] = 'Ukendt';
$TEXT['BLOCK'] = 'Blok';
$TEXT['SEARCH'] = 'S&oslash;g';
$TEXT['SEARCHING'] = 'S&oslash;gefunktion';
$TEXT['POST'] = 'Indl&aelig;g';
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['COMMENTS'] = 'Kommentarer';
$TEXT['COMMENTING'] = 'Kommentere';
$TEXT['SHORT'] = 'Kort';
$TEXT['LONG'] = 'Lang';
$TEXT['LOOP'] = 'Liste';
$TEXT['FIELD'] = 'Felt';
$TEXT['REQUIRED'] = 'Kr&aelig;vet';
$TEXT['LENGTH'] = 'L&aelig;ngde';
$TEXT['MESSAGE'] = 'Indl&aelig;g';
$TEXT['SUBJECT'] = 'Emne';
$TEXT['MATCH'] = 'Match';
$TEXT['ALL_WORDS'] = 'Alle ordene';
$TEXT['ANY_WORDS'] = 'Bare et af ordene';
$TEXT['EXACT_MATCH'] = 'Eksakt s&oslash;gning';
$TEXT['SHOW'] = 'Vis';
$TEXT['HIDE'] = 'Skjul';
$TEXT['START_PUBLISHING'] = 'Start offentligg&oslash;relse';
$TEXT['FINISH_PUBLISHING'] = 'Afslut offentligg&oslash;relse';
$TEXT['DATE'] = 'Dato';
$TEXT['START'] = 'Start';
$TEXT['END'] = 'Slut';
$TEXT['IMAGE'] = 'Billede';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Sektion';
$TEXT['DATE_FORMAT'] = 'Datoformat';
$TEXT['TIME_FORMAT'] = 'Tidsformat';
$TEXT['RESULTS'] = 'Resultater';
$TEXT['RESIZE'] = 'Skift st&oslash;rrelse';
$TEXT['MANAGE'] = 'Administr&eacute;r';
$TEXT['CODE'] = 'Kode';
$TEXT['WIDTH'] = 'Bredde';
$TEXT['HEIGHT'] = 'H&oslash;jde';
$TEXT['MORE'] = 'Mere';
$TEXT['READ_MORE'] = 'L&aelig;s mere';
$TEXT['CHANGE_SETTINGS'] = 'Skift indstillinger';
$TEXT['CURRENT_PAGE'] = 'Nuv&aelig;rende side';
$TEXT['CLOSE'] = 'Luk';
$TEXT['INTRO_PAGE'] = 'Intro-side';
$TEXT['INSTALLATION_URL'] = 'Installations URL';
$TEXT['INSTALLATION_PATH'] = 'Installationssti';
$TEXT['PAGE_EXTENSION'] = 'Side-udvidelse';
$TEXT['NO_RESULTS'] = 'Intet fundet';
$TEXT['WEBSITE_TITLE'] = 'Titel p&aring; dit websted';
$TEXT['WEBSITE_DESCRIPTION'] = 'Beskrivelse af dit websted';
$TEXT['WEBSITE_KEYWORDS'] = 'Webstedsn&oslash;gleord';
$TEXT['WEBSITE_HEADER'] = 'Webstedshoved';
$TEXT['WEBSITE_FOOTER'] = 'Webstedsfod (bund)';
$TEXT['RESULTS_HEADER'] = 'Resultathoved';
$TEXT['RESULTS_LOOP'] = 'Resultatliste';
$TEXT['RESULTS_FOOTER'] = 'Resultatfod (bund)';
$TEXT['LEVEL'] = 'Niveau';
$TEXT['NOT_FOUND'] = 'Ikke fundet';
$TEXT['PAGE_SPACER'] = 'Side pladsmark&oslash;r';
$TEXT['MATCHING'] = 'Matchende';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Skabelon-tilladelser';
$TEXT['PAGES_DIRECTORY'] = 'Sidebibliotek (mappe)';
$TEXT['MEDIA_DIRECTORY'] = 'Mediebibliotek (mappe)';
$TEXT['FILE_MODE'] = 'Filtilstand';
$TEXT['USER'] = 'Bruger';
$TEXT['OTHERS'] = 'Andre';
$TEXT['READ'] = 'L&aelig;s';
$TEXT['WRITE'] = 'Skriv';
$TEXT['EXECUTE'] = 'Udf&oslash;r';
$TEXT['SMART_LOGIN'] = 'Smart Log-ind';
$TEXT['REMEMBER_ME'] = 'Husk mig';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Filesystem - Tilladelser';
$TEXT['DIRECTORIES'] = 'Biblioteker (mapper)';
$TEXT['DIRECTORY_MODE'] = 'Bibliotekstilstand';
$TEXT['LIST_OPTIONS'] = 'Vis valgmuligheder';
$TEXT['OPTION'] = 'Mulighed';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Tillad flere valg samtidig';
$TEXT['TEXTFIELD'] = 'Tekstfelt';
$TEXT['TEXTAREA'] = 'Tekstomr&aring;de';
$TEXT['SELECT_BOX'] = 'Afkrydsningsboks';
$TEXT['CHECKBOX_GROUP'] = 'Afkrydsningsgruppe';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radioknap-gruppe';
$TEXT['SIZE'] = 'St&oslash;rrelse';
$TEXT['DEFAULT_TEXT'] = 'Standardtekst';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['BACK'] = 'Tilbage';
$TEXT['UNDER_CONSTRUCTION'] = 'Under konstruktion';
$TEXT['MULTISELECT'] = 'Multi-valg';
$TEXT['SHORT_TEXT'] = 'Kort tekst';
$TEXT['LONG_TEXT'] = 'Lang tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Viderestilling af hjemmeside';
$TEXT['HEADING'] = 'Overskrift';
$TEXT['MULTIPLE_MENUS'] = 'Flere menuer';
$TEXT['REGISTERED'] = 'Registrerede';
$TEXT['SECTION_BLOCKS'] = 'Sektionsblokke';
$TEXT['REGISTERED_VIEWERS'] = 'Registrerede brugere';
$TEXT['ALLOWED_VIEWERS'] = 'Tilladte brugere';
$TEXT['SUBMISSION_ID'] = 'Tilmeldings-ID';
$TEXT['SUBMISSIONS'] = 'Indsendte bidrag';
$TEXT['SUBMITTED'] = 'Indsendt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. indsendte bidrag pr. time';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Indsendte bidrag gemt i databasen';
$TEXT['EMAIL_ADDRESS'] = 'Email-adresse';
$TEXT['CUSTOM'] = 'Brugerdefineret';
$TEXT['ANONYMOUS'] = 'Anonym';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server operativsystem';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Globale skriverettigheder';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix baseret';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Hjemmebibliotek (mappe)';
$TEXT['HOME_FOLDERS'] = 'Hjemmebiblioteker (mapper)';
$TEXT['PAGE_TRASH'] = 'Papirkurv til sider';
$TEXT['INLINE'] = 'Indbygget';
$TEXT['SEPARATE'] = 'Separat';
$TEXT['DELETED'] = 'Slettet';
$TEXT['VIEW_DELETED_PAGES'] = 'Vis slettede sider';
$TEXT['EMPTY_TRASH'] = 'T&oslash;m papirkurv';
$TEXT['TRASH_EMPTIED'] = 'Papirkurv t&oslash;mt';
$TEXT['ADD_SECTION'] = 'Tilf&oslash;j sektion';
$TEXT['POST_HEADER'] = 'Hoved p&aring; indl&aelig;g';
$TEXT['POST_FOOTER'] = 'Fod (bund) p&aring; indl&aelig;g';
$TEXT['POSTS_PER_PAGE'] = 'Indl&aelig;g pr. side';
$TEXT['RESIZE_IMAGE_TO'] = 'Forst&oslash;r/formindsk billede til';
$TEXT['UNLIMITED'] = 'Ubegr&aelig;nset';
$TEXT['OF'] = 'af';
$TEXT['OUT_OF'] = 'ud af i alt';
$TEXT['NEXT'] = 'N&aelig;ste';
$TEXT['PREVIOUS'] = 'Forrige';
$TEXT['NEXT_PAGE'] = 'N&aelig;ste side';
$TEXT['PREVIOUS_PAGE'] = 'Forrige side';
$TEXT['ON'] = 'D.';
$TEXT['LAST_UPDATED_BY'] = 'Sidst opdateret af:';
$TEXT['RESULTS_FOR'] = 'Resultater for';
$TEXT['TIME'] = 'Tid';
$TEXT['REDIRECT_AFTER'] = 'Videresend efter';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG-stil';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG-editor';
$TEXT['SERVER_EMAIL'] = 'Server email';
$TEXT['MENU'] = 'Menu';
$TEXT['MANAGE_GROUPS'] = 'Administr&eacute;r grupper';
$TEXT['MANAGE_USERS'] = 'Administr&eacute;r brugere';
$TEXT['PAGE_LANGUAGES'] = 'Sprog';
$TEXT['HIDDEN'] = 'Skjult';
$TEXT['MAIN'] = 'Hovedoversigt';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Omd&oslash;b filer under opload';
$TEXT['APP_NAME'] = 'Applikationsnavn';
$TEXT['SESSION_IDENTIFIER'] = 'Sessions-ID';
$TEXT['SEC_ANCHOR'] = 'Sektionsankertekst';
$TEXT['BACKUP'] = 'Backup';
$TEXT['RESTORE'] = 'Gendannelse';
$TEXT['BACKUP_DATABASE'] = 'Backup af database';
$TEXT['RESTORE_DATABASE'] = 'Gendan database';
$TEXT['BACKUP_ALL_TABLES'] = 'Lav backup af alle tabeller i databasen';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Lav kun backup af WB-specifikke tabeller';
$TEXT['BACKUP_MEDIA'] = 'Lav backup af medie-filer';
$TEXT['RESTORE_MEDIA'] = 'Gendan medie-filer';
$TEXT['ADMINISTRATION_TOOL'] = 'Administrationsv&aelig;rkt&oslash;jer';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha verifikation';
$TEXT['VERIFICATION'] = 'Indtast verifikationstal';
$TEXT['DEFAULT_CHARSET'] = 'Standard tegns&aelig;t';
$TEXT['CHARSET'] = 'Tegns&aelig;t';
$TEXT['MODULE_ORDER'] = 'Modul-r&aelig;kkef&oslash;lge ved s&oslash;gning';
$TEXT['MAX_EXCERPT'] = 'Max linier i uddrag';
$TEXT['TIME_LIMIT'] = 'Max tid til uddrag per modul';
$TEXT['PUBL_START_DATE'] = 'Startdato';
$TEXT['PUBL_END_DATE'] = 'Slutdato';
$TEXT['CALENDAR'] = 'Kalender';
$TEXT['DELETE_DATE'] = 'Slet dato';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Angiv standard "FRA"-adresse og "AFSENDER"-navn nedenfor. Det anbefales at angive FRA-adresse som: <strong>admin@dit-dom&aelig;ne.dk</strong>. Nogle udbydere (f.eks. <em>mail.com</em>) kan afvise emails med en FRA-adresse som <em>navn@mail.com</em>, hvis de er sendt via en anden udbyder, for at undg&aring; spam.<br /><br />Standardv&aelig;rdierne benyttes kun, hvis ingen andre v&aelig;rdier angives i WebsiteBaker. Hvis din server underst&oslash;tter <acronym title="Simple mail transfer protocol">SMTP</acronym>, kan du v&aelig;lge at bruge denne til udg&aring;ende emails.';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Standard fra-adresse';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Standard afsendernavn';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP mail-program indstillinger:</strong><br />Indstillingerne nedenfor er kun n&oslash;dvendige, hvis du vil sende emails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. Hvis du ikke kender adressen p&aring; din SMTP-v&aelig;rt eller de kr&aelig;vede indstillinger, s&aring; hold dig til standardprogrammet, PHP MAIL.';
$TEXT['WBMAILER_FUNCTION'] = 'Mailprogram';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP-v&aelig;rt';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP brugeradgangskontrol';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = '- skal kun anvendes hvis din SMTP-v&aelig;rt bruger adgangskontrol';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP brugernavn';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP adgangskode';
$TEXT['PLEASE_LOGIN'] = 'Log ind';
$TEXT['CAP_EDIT_CSS'] = 'Rediger CSS';
$TEXT['HEADING_CSS_FILE'] = 'Aktuel modulfil: ';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Rediger CSS definitioner i tekstfeltet nedenfor';
$TEXT['CODE_SNIPPET'] = 'Kodestump';
$TEXT['REQUIREMENT'] = 'Krav';
$TEXT['INSTALLED'] = 'installeret';
$TEXT['NOT_INSTALLED'] = 'ikke installeret';
$TEXT['ADDON'] = 'Add-On';
$TEXT['EXTENSION'] = 'Udvidelse';
$TEXT['UNZIP_FILE'] = 'Overf&oslash;r og udpak et zip-arkiv';
$TEXT['DELETE_ZIP'] = 'Slet zip-arkiv efter udpakning';
$TEXT['NEED_CURRENT_PASSWORD'] ='confirm with current password';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';

// Success/error messages
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Beklager - du har ikke adgang til at se denne side';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Beklager - intet aktivit indhold at vise';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Du har ikke den forn&oslash;dne adgang til dette omr&aring;de';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Indtast venligst dit brugernavn og din adgangskode nedenfor';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Angiv et brugernavn';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Angiv en adgangskode ';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Det indtastede brugernavn er for KORT';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Den indtastede adgangskode er for KORT';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Det indtastede brugernavn er for LANGT';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Den indtastede adgangskode er for LANG';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Brugernavn og/eller adgangskode er forkert';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'Du skal indtaste en gyldig email-adresse';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Dine login-oplysninger...';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Indtast din email-adresse nedenfor';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Den email-adresse du indtastede findes ikke i vores database';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Kunne ikke sende din adgangskode til din email-adresse - Kontakt en systemadministrator';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Dit brugernavn og din adgangskode er nu afsendt til din email-adresse';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Adgangskode kan kun nulstilles 1 gang i timen - beklager!';

$MESSAGE['START_WELCOME_MESSAGE'] = 'Velkommen til administration af din WebsiteBaker';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'ADVARSEL! Installationsbiblioteket (mappen) findes stadig p&aring; serveren. Du b&oslash;r slette den straks af hensyn til sikkerheden!';
$MESSAGE['START_CURRENT_USER'] = 'Du er lige nu logget ind som:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Er ikke i stand til at &aring;bne konfigurationsfilen';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Kan ikke skrive til konfigurationsfilen (check rettigheder for filen)';
$MESSAGE['SETTINGS_SAVED'] = 'Indstillingerne er gemt';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = '<br>OBS: Ved at klikke p&aring; denne knap tabes alle &aelig;ndringer, der ikke er gemt!';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'OBS! Dette anbefales kun i testmilj&oslash;er ';

$MESSAGE['USERS_ADDED'] = 'Brugeren er oprettet';
$MESSAGE['USERS_SAVED'] = 'Brugeren er gemt';
$MESSAGE['USERS_DELETED'] = 'Brugeren er slettet';
$MESSAGE['USERS_NO_GROUP'] = 'Ingen gruppe er valgt';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Det angivne brugernavn er for kort';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Den angivne adgangskode er for kort';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'De to adgangskoder du indtastede  er ikke ens';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Email-adressen du indtastede er ugyldig';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Den email-adresse du indtastede findes i forvejen';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Brugernavnet du indtastede er allerede optaget af en anden bruger';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'OBS! Du skal kun indtaste v&aelig;rdier i felterne ovenfor, s&aring;fremt du &oslash;nsker at &aelig;ndre denne brugers adgangskode';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Er du sikker p&aring; at du vil slette den valgte bruger?';

$MESSAGE['GROUPS_ADDED'] = 'Gruppen er tilf&oslash;jet';
$MESSAGE['GROUPS_SAVED'] = 'Gruppen er gemt';
$MESSAGE['GROUPS_DELETED'] = 'Gruppen er slettet';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Gruppenavn er ikke udfyldt';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Er du helt sikker p&aring; du vil slette denne gruppe (og alle brugere som tilh&oslash;rer den)?';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Der blev ikke fundet nogen grupper';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Gruppens navn findes allerede';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Oplysningerne er gemt';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email-adresse opdateret';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Den (nuv&aelig;rende) adgangskode som du indtastede er ikke korrekt';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Adgangskode &aelig;ndret';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'OBS: For at &aelig;ndre skabelonen skal du g&aring; til punktet indstillinger';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Kan ikke inkludere ../ i mappenavnet';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Mappen eksisterer ikke';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Kan ikke have ../ i placeringen af biblioteket (mappen)';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Kan ikke inkludere ../ i navnet';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Kan ikke anvende index.php som navn';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Der blev ikke fundet medie-filer i det p&aring;g&aelig;ldende bibliotek (mappe)';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Filen ikke fundet';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Filen er slettet';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Bibliotek (mappe) slettet';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Er du sikker p&aring; du &oslash;nsker at slette flg. fil/bibliotek (mappe)?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Kan ikke slette den valgte fil';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Kan ikke slette valgte bibliotek (mappe)';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Du indtastede ikke et nyt navn';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Du har ikke angivet en filtype';
$MESSAGE['MEDIA_RENAMED'] = 'Omd&oslash;bning udf&oslash;rt';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Omd&oslash;bning kunne ikke udf&oslash;res';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Der findes allerede en fil med det navn du indtastede';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Der findes allerede et bibliotek (en mappe) med det navn du indtastede!';
$MESSAGE['MEDIA_DIR_MADE'] = 'Bibliotek (mappe) blev oprettet';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Kunne ikke oprette biblioteket (mappen)';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = 'fil blev overf&oslash;rt';
$MESSAGE['MEDIA_UPLOADED'] = 'filer blev overf&oslash;rt';

$MESSAGE['PAGES_ADDED'] = 'Siden er tilf&oslash;jet';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Overskrift til side tilf&oslash;jet';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Der findes allerede en side med dette eller lign. navn';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Fejl under oprettelse af adgangsfil i /pages biblioteket (mappen) (utilstr&aelig;kkelige rettigheder)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Fejl under sletning af adgangsfil i /pages biblioteket  (utilstr&aelig;kkelige rettigheder)';
$MESSAGE['PAGES_NOT_FOUND'] = 'Siden blev ikke fundet';
$MESSAGE['PAGES_SAVED'] = 'Siden er gemt';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Side-indstillinger er gemt';
$MESSAGE['PAGES_NOT_SAVED'] = 'Der opstod en fejl under fors&oslash;get p&aring; at gemme siden';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Er du sikker p&aring; du &oslash;nsker at slette den valgte side (og alle dens undersider)';
$MESSAGE['PAGES_DELETED'] = 'Siden er slettet';
$MESSAGE['PAGES_RESTORED'] = 'Siden er gendannet';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Indtast venligst en overskrift til siden';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Indtast venligst en overskrift til menuen';
$MESSAGE['PAGES_REORDERED'] = 'Siden er omorganiseret';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Fejl ved fors&oslash;g p&aring; at omorganisere siden';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Du har ikke rettigheder til at &aelig;ndre denne side';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Kan ikke skrive til filen /pages/intro.php (utilstr&aelig;kkelige rettigheder)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Introside gemt';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Sidste &aelig;ndring blev foretaget af:';
$MESSAGE['PAGES_INTRO_LINK'] = 'Klik HER for at &aelig;ndre din intro-side!';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Egenskaber for sektion er &aelig;ndret';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Tilbage til sider';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'G&aring; venligst tilbage og udfyld alle felter';
$MESSAGE['GENERIC_FILE_TYPE'] = 'OBS: V&aelig;r opm&aelig;rksom p&aring; at den fil du vil over&oslash;re skal v&aelig;re i flg. format:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'OBS: V&aelig;r opm&aelig;rksom p&aring; at den fil du vil over&oslash;re skal v&aelig;re i et af flg. formater:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Kunne ikke over&oslash;re filen';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Er allerede installeret';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Ikke installeret';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Kan ikke afinstallere';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kan ikke udpakke fil';
$MESSAGE['GENERIC_INSTALLED'] = 'Installeret';
$MESSAGE['GENERIC_UPGRADED'] = 'Opgraderet';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Afinstalleret';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kan ikke skrive i det valgte modtagebibliotek (mappe)';
$MESSAGE['GENERIC_INVALID'] = 'Filen du over&oslash;rte er fejlbeh&aelig;ftet';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Kan ikke afinstallere: Den valgte fil er i brug';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> kan ikke afinstalleres, da den stadig bruges p&aring; {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'denne side;disse sider';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Kan ikke afinstallere skabelonen <b>{{name}}</b>, da den er standardskabelonen!';

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website under konstruktion';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Kom venligst igen senere...';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'V&aelig;r t&aring;lmodig, dette kan godt vare et stykke tid.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Fejl ved &aring;bning af filen.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'WebsiteBaker installationsfil ikke i korrekt format. Kontroller *.zip formatet.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'WebsiteBaker sprogfil ikke i korrekt format. Kontroller tekstfilen.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Du skal udfylde f&oslash;lgende felter:';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Beklager! Denne formular er blevet afsendt for mange gange indenfor den sidste time, og du vil derfor blive afvist - Pr&oslash;v igen om en times tid!';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Verifikations tallene (ogs&aring; kendt som Captcha) som du tastede er ikke korrekte. Hvis du har problemer med at l&aelig;se Captha tallene, s&aring; kontakt venligst sidens Administrator p&aring; denne mailadresse: '.SERVER_EMAIL.'';

$MESSAGE['ADDON_RELOAD'] = 'Opdater databasen med information fra  Add-on-filer (f.eks. efter en FPT-overf&oslash;rsel).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Fejl under opdatering af Add-On information.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Moduler opdateret fejlfrit';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Skabelinger opdateret fejlfrit';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Sprog opdateret fejlfrit';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Add-on-installation mislykkedes. Dit system lever ikke op til de krav, denne Add-on stiller. For at f&aring; denne Add-on til at fungere p&aring; dit system, m&aring; du bringe f&oslash;lgende forhold i orden.';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'N&aring;r moduler overf&oslash;res via FTP (anbefales ikke), vil modul-installationsfilerne <tt>install.php</tt>, <tt>upgrade.php</tt> og <tt>uninstall.php</tt> ikke bliver udf&oslash;rt automatisk. Disse moduler vil eventuelt ikke fungere korrekt eller kan ikke afinstalleres rigtigt.<br /><br />Du kan eksekvere modulfiler manuelt for module, der er overf&oslash;rt via FTP, nedenfor.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Advarsel: Eksisterende databaseregistreringer om modulerne vil g&aring; tabt. Anvend kun denne mulighed, hvis du oplever problemer med at overf&oslash;re via FTP.';

 
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