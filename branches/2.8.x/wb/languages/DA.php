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

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

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

/* MENU */
$MENU['ACCESS'] = 'Adgang';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Add-ons';
$MENU['ADMINTOOLS'] = 'Admin-v&aelig;rkt&oslash;jer';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Modtag login oplysninger';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Grupper';
$MENU['HELP'] = 'Hj&aelig;lp';
$MENU['LANGUAGES'] = 'Sprog';
$MENU['LOGIN'] = 'Log ind';
$MENU['LOGOUT'] = 'Log ud';
$MENU['MEDIA'] = 'Medie-filer';
$MENU['MODULES'] = 'Moduler';
$MENU['PAGES'] = 'Sider';
$MENU['PREFERENCES'] = 'Pr&aelig;ferencer';
$MENU['SETTINGS'] = 'Indstillinger';
$MENU['START'] = 'Hjem';
$MENU['TEMPLATES'] = 'Skabeloner';
$MENU['USERS'] = 'Brugere';
$MENU['VIEW'] = 'Vis';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Kontoregistrering';
$TEXT['ACTIONS'] = 'Handlinger';
$TEXT['ACTIVE'] = 'Aktiv';
$TEXT['ADD'] = 'Tilf&oslash;j';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Tilf&oslash;j sektion';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administr&eacute;r';
$TEXT['ADMINISTRATION_TOOL'] = 'Administrationsv&aelig;rkt&oslash;jer';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administratorer';
$TEXT['ADVANCED'] = 'Avanceret';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Tilladte brugere';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Tillad flere valg samtidig';
$TEXT['ALL_WORDS'] = 'Alle ordene';
$TEXT['ANCHOR'] = 'Bogm&aelig;rke';
$TEXT['ANONYMOUS'] = 'Anonym';
$TEXT['ANY_WORDS'] = 'Bare et af ordene';
$TEXT['APP_NAME'] = 'Applikationsnavn';
$TEXT['ARE_YOU_SURE'] = 'Er du sikker?';
$TEXT['AUTHOR'] = 'Udvikler/forfatter';
$TEXT['BACK'] = 'Tilbage';
$TEXT['BACKUP'] = 'Backup';
$TEXT['BACKUP_ALL_TABLES'] = 'Lav backup af alle tabeller i databasen';
$TEXT['BACKUP_DATABASE'] = 'Backup af database';
$TEXT['BACKUP_MEDIA'] = 'Lav backup af medie-filer';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Lav kun backup af WB-specifikke tabeller';
$TEXT['BASIC'] = 'Basisindstillinger';
$TEXT['BLOCK'] = 'Blok';
$TEXT['CALENDAR'] = 'Kalender';
$TEXT['CANCEL'] = 'Annull&eacute;r';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha verifikation';
$TEXT['CAP_EDIT_CSS'] = 'Rediger CSS';
$TEXT['CHANGE'] = 'Ret';
$TEXT['CHANGES'] = '&AElig;ndringer';
$TEXT['CHANGE_SETTINGS'] = 'Skift indstillinger';
$TEXT['CHARSET'] = 'Tegns&aelig;t';
$TEXT['CHECKBOX_GROUP'] = 'Afkrydsningsgruppe';
$TEXT['CLOSE'] = 'Luk';
$TEXT['CODE'] = 'Kode';
$TEXT['CODE_SNIPPET'] = 'Kodestump';
$TEXT['COLLAPSE'] = 'Fold sammen';
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['COMMENTING'] = 'Kommentere';
$TEXT['COMMENTS'] = 'Kommentarer';
$TEXT['CREATE_FOLDER'] = 'Opret mappe';
$TEXT['CURRENT'] = 'Nuv&aelig;rende';
$TEXT['CURRENT_FOLDER'] = 'Nuv&aelig;rende mappe';
$TEXT['CURRENT_PAGE'] = 'Nuv&aelig;rende side';
$TEXT['CURRENT_PASSWORD'] = 'Nuv&aelig;rende adgangskode';
$TEXT['CUSTOM'] = 'Brugerdefineret';
$TEXT['DATABASE'] = 'Database';
$TEXT['DATE'] = 'Dato';
$TEXT['DATE_FORMAT'] = 'Datoformat';
$TEXT['DEFAULT'] = 'Standard';
$TEXT['DEFAULT_CHARSET'] = 'Standard tegns&aelig;t';
$TEXT['DEFAULT_TEXT'] = 'Standardtekst';
$TEXT['DELETE'] = 'Slet';
$TEXT['DELETED'] = 'Slettet';
$TEXT['DELETE_DATE'] = 'Slet dato';
$TEXT['DELETE_ZIP'] = 'Slet zip-arkiv efter udpakning';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['DESIGNED_FOR'] = 'Designet til';
$TEXT['DIRECTORIES'] = 'Biblioteker (mapper)';
$TEXT['DIRECTORY_MODE'] = 'Bibliotekstilstand';
$TEXT['DISABLED'] = 'Deaktiveret';
$TEXT['DISPLAY_NAME'] = 'Vis navn';
$TEXT['EMAIL'] = 'Email-adresse';
$TEXT['EMAIL_ADDRESS'] = 'Email-adresse';
$TEXT['EMPTY_TRASH'] = 'T&oslash;m papirkurv';
$TEXT['ENABLED'] = 'Aktiveret';
$TEXT['END'] = 'Slut';
$TEXT['ERROR'] = 'Der opstod en fejl';
$TEXT['EXACT_MATCH'] = 'Eksakt s&oslash;gning';
$TEXT['EXECUTE'] = 'Udf&oslash;r';
$TEXT['EXPAND'] = 'Fold ud';
$TEXT['EXTENSION'] = 'Udvidelse';
$TEXT['FIELD'] = 'Felt';
$TEXT['FILE'] = 'Fil';
$TEXT['FILES'] = 'Filer';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Filesystem - Tilladelser';
$TEXT['FILE_MODE'] = 'Filtilstand';
$TEXT['FINISH_PUBLISHING'] = 'Afslut offentligg&oslash;relse';
$TEXT['FOLDER'] = 'Mappe';
$TEXT['FOLDERS'] = 'Mapper';
$TEXT['FOOTER'] = 'Fod (bund)';
$TEXT['FORGOTTEN_DETAILS'] = 'Har du glemt dine login-oplysninger?';
$TEXT['FORGOT_DETAILS'] = 'Glemt login-oplysninger?';
$TEXT['FROM'] = 'Fra';
$TEXT['FRONTEND'] = 'Websted (vis siden)';
$TEXT['FULL_NAME'] = 'Fulde navn';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Gruppe';
$TEXT['HEADER'] = 'Hoved (overligger)';
$TEXT['HEADING'] = 'Overskrift';
$TEXT['HEADING_CSS_FILE'] = 'Aktuel modulfil: ';
$TEXT['HEIGHT'] = 'H&oslash;jde';
$TEXT['HIDDEN'] = 'Skjult';
$TEXT['HIDE'] = 'Skjul';
$TEXT['HIDE_ADVANCED'] = 'Skjul avancerede indstillinger';
$TEXT['HOME'] = 'Hjem';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Viderestilling af hjemmeside';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'V&aelig;rt';
$TEXT['ICON'] = 'Ikon';
$TEXT['IMAGE'] = 'Billede';
$TEXT['INLINE'] = 'Indbygget';
$TEXT['INSTALL'] = 'Install&eacute;r';
$TEXT['INSTALLATION'] = 'Installation';
$TEXT['INSTALLATION_PATH'] = 'Installationssti';
$TEXT['INSTALLATION_URL'] = 'Installations URL';
$TEXT['INSTALLED'] = 'installeret';
$TEXT['INTRO'] = 'Introduktion';
$TEXT['INTRO_PAGE'] = 'Intro-side';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'N&oslash;gleord';
$TEXT['LANGUAGE'] = 'Sprog';
$TEXT['LAST_UPDATED_BY'] = 'Sidst opdateret af:';
$TEXT['LENGTH'] = 'L&aelig;ngde';
$TEXT['LEVEL'] = 'Niveau';
$TEXT['LINK'] = 'Link';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix baseret';
$TEXT['LIST_OPTIONS'] = 'Vis valgmuligheder';
$TEXT['LOGGED_IN'] = 'Logget ind';
$TEXT['LOGIN'] = 'Log ind';
$TEXT['LONG'] = 'Lang';
$TEXT['LONG_TEXT'] = 'Lang tekst';
$TEXT['LOOP'] = 'Liste';
$TEXT['MAIN'] = 'Hovedoversigt';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Administr&eacute;r';
$TEXT['MANAGE_GROUPS'] = 'Administr&eacute;r grupper';
$TEXT['MANAGE_USERS'] = 'Administr&eacute;r brugere';
$TEXT['MATCH'] = 'Match';
$TEXT['MATCHING'] = 'Matchende';
$TEXT['MAX_EXCERPT'] = 'Max linier i uddrag';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. indsendte bidrag pr. time';
$TEXT['MEDIA_DIRECTORY'] = 'Mediebibliotek (mappe)';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Menutitel';
$TEXT['MESSAGE'] = 'Indl&aelig;g';
$TEXT['MODIFY'] = 'Ret';
$TEXT['MODIFY_CONTENT'] = 'Ret indhold';
$TEXT['MODIFY_SETTINGS'] = 'Skift indstillinger';
$TEXT['MODULE_ORDER'] = 'Modul-r&aelig;kkef&oslash;lge ved s&oslash;gning';
$TEXT['MODULE_PERMISSIONS'] = 'Modulrettigheder';
$TEXT['MORE'] = 'Mere';
$TEXT['MOVE_DOWN'] = 'Flyt ned';
$TEXT['MOVE_UP'] = 'Flyt op';
$TEXT['MULTIPLE_MENUS'] = 'Flere menuer';
$TEXT['MULTISELECT'] = 'Multi-valg';
$TEXT['NAME'] = 'Navn';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Brug for at logge ind?';
$TEXT['NEW_PASSWORD'] = 'Ny adgangskode';
$TEXT['NEW_WINDOW'] = 'Nyt vindue';
$TEXT['NEXT'] = 'N&aelig;ste';
$TEXT['NEXT_PAGE'] = 'N&aelig;ste side';
$TEXT['NO'] = 'Nej';
$TEXT['NONE'] = 'Usynlig';
$TEXT['NONE_FOUND'] = 'Ingen fundet';
$TEXT['NOT_FOUND'] = 'Ikke fundet';
$TEXT['NOT_INSTALLED'] = 'ikke installeret';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Intet fundet';
$TEXT['OF'] = 'af';
$TEXT['ON'] = 'D.';
$TEXT['OPEN'] = '&Aring;ben';
$TEXT['OPTION'] = 'Mulighed';
$TEXT['OTHERS'] = 'Andre';
$TEXT['OUT_OF'] = 'ud af i alt';
$TEXT['OVERWRITE_EXISTING'] = 'Overskriv eksisterende';
$TEXT['PAGE'] = 'Side';
$TEXT['PAGES_DIRECTORY'] = 'Sidebibliotek (mappe)';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Side-udvidelse';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Sprog';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Max. sideantal';
$TEXT['PAGE_SPACER'] = 'Side pladsmark&oslash;r';
$TEXT['PAGE_TITLE'] = 'Titel p&aring; side';
$TEXT['PAGE_TRASH'] = 'Papirkurv til sider';
$TEXT['PARENT'] = 'Overliggende niveau';
$TEXT['PASSWORD'] = 'Adgangskode';
$TEXT['PATH'] = 'Sti';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP fejlrapporteringsniveau';
$TEXT['PLEASE_LOGIN'] = 'Log ind';
$TEXT['PLEASE_SELECT'] = 'V&aelig;lg venligst';
$TEXT['POST'] = 'Indl&aelig;g';
$TEXT['POSTS_PER_PAGE'] = 'Indl&aelig;g pr. side';
$TEXT['POST_FOOTER'] = 'Fod (bund) p&aring; indl&aelig;g';
$TEXT['POST_HEADER'] = 'Hoved p&aring; indl&aelig;g';
$TEXT['PREVIOUS'] = 'Forrige';
$TEXT['PREVIOUS_PAGE'] = 'Forrige side';
$TEXT['PRIVATE'] = 'Privat';
$TEXT['PRIVATE_VIEWERS'] = 'Private bes&oslash;gende';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Offentlig';
$TEXT['PUBL_END_DATE'] = 'Slutdato';
$TEXT['PUBL_START_DATE'] = 'Startdato';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radioknap-gruppe';
$TEXT['READ'] = 'L&aelig;s';
$TEXT['READ_MORE'] = 'L&aelig;s mere';
$TEXT['REDIRECT_AFTER'] = 'Videresend efter';
$TEXT['REGISTERED'] = 'Registrerede';
$TEXT['REGISTERED_VIEWERS'] = 'Registrerede brugere';
$TEXT['RELOAD'] = 'Opdat&eacute;r';
$TEXT['REMEMBER_ME'] = 'Husk mig';
$TEXT['RENAME'] = 'Omd&oslash;b';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Omd&oslash;b filer under opload';
$TEXT['REQUIRED'] = 'Kr&aelig;vet';
$TEXT['REQUIREMENT'] = 'Krav';
$TEXT['RESET'] = 'Nulstil';
$TEXT['RESIZE'] = 'Skift st&oslash;rrelse';
$TEXT['RESIZE_IMAGE_TO'] = 'Forst&oslash;r/formindsk billede til';
$TEXT['RESTORE'] = 'Gendannelse';
$TEXT['RESTORE_DATABASE'] = 'Gendan database';
$TEXT['RESTORE_MEDIA'] = 'Gendan medie-filer';
$TEXT['RESULTS'] = 'Resultater';
$TEXT['RESULTS_FOOTER'] = 'Resultatfod (bund)';
$TEXT['RESULTS_FOR'] = 'Resultater for';
$TEXT['RESULTS_HEADER'] = 'Resultathoved';
$TEXT['RESULTS_LOOP'] = 'Resultatliste';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Skriv ny adgangskode igen';
$TEXT['RETYPE_PASSWORD'] = 'Indtast adgangskode igen';
$TEXT['SAME_WINDOW'] = 'Samme vindue';
$TEXT['SAVE'] = 'Gem';
$TEXT['SEARCH'] = 'S&oslash;g';
$TEXT['SEARCHING'] = 'S&oslash;gefunktion';
$TEXT['SECTION'] = 'Sektion';
$TEXT['SECTION_BLOCKS'] = 'Sektionsblokke';
$TEXT['SEC_ANCHOR'] = 'Sektionsankertekst';
$TEXT['SELECT_BOX'] = 'Afkrydsningsboks';
$TEXT['SEND_DETAILS'] = 'Send oplysninger';
$TEXT['SEPARATE'] = 'Separat';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['SERVER_EMAIL'] = 'Server email';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server operativsystem';
$TEXT['SESSION_IDENTIFIER'] = 'Sessions-ID';
$TEXT['SETTINGS'] = 'Indstillinger';
$TEXT['SHORT'] = 'Kort';
$TEXT['SHORT_TEXT'] = 'Kort tekst';
$TEXT['SHOW'] = 'Vis';
$TEXT['SHOW_ADVANCED'] = 'Vis avancerede indstillnger';
$TEXT['SIGNUP'] = 'Registrering';
$TEXT['SIZE'] = 'St&oslash;rrelse';
$TEXT['SMART_LOGIN'] = 'Smart Log-ind';
$TEXT['START'] = 'Start';
$TEXT['START_PUBLISHING'] = 'Start offentligg&oslash;relse';
$TEXT['SUBJECT'] = 'Emne';
$TEXT['SUBMISSIONS'] = 'Indsendte bidrag';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Indsendte bidrag gemt i databasen';
$TEXT['SUBMISSION_ID'] = 'Tilmeldings-ID';
$TEXT['SUBMITTED'] = 'Indsendt';
$TEXT['SUCCESS'] = 'Oplysninger gemt';
$TEXT['SYSTEM_DEFAULT'] = 'Systemstandard';
$TEXT['SYSTEM_PERMISSIONS'] = 'Systemrettigheder';
$TEXT['TABLE_PREFIX'] = 'Tabelpr&aelig;fix';
$TEXT['TARGET'] = 'M&aring;l';
$TEXT['TARGET_FOLDER'] = 'Mappeplacering';
$TEXT['TEMPLATE'] = 'Skabelon';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Skabelon-tilladelser';
$TEXT['TEXT'] = 'Tekst';
$TEXT['TEXTAREA'] = 'Tekstomr&aring;de';
$TEXT['TEXTFIELD'] = 'Tekstfelt';
$TEXT['THEME'] = 'Backend-tema';
$TEXT['TIME'] = 'Tid';
$TEXT['TIMEZONE'] = 'Tidszone';
$TEXT['TIME_FORMAT'] = 'Tidsformat';
$TEXT['TIME_LIMIT'] = 'Max tid til uddrag per modul';
$TEXT['TITLE'] = 'Titel';
$TEXT['TO'] = 'Til';
$TEXT['TOP_FRAME'] = 'Top frame';
$TEXT['TRASH_EMPTIED'] = 'Papirkurv t&oslash;mt';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Rediger CSS definitioner i tekstfeltet nedenfor';
$TEXT['TYPE'] = 'Type';
$TEXT['UNDER_CONSTRUCTION'] = 'Under konstruktion';
$TEXT['UNINSTALL'] = 'Afinstall&eacute;r';
$TEXT['UNKNOWN'] = 'Ukendt';
$TEXT['UNLIMITED'] = 'Ubegr&aelig;nset';
$TEXT['UNZIP_FILE'] = 'Overf&oslash;r og udpak et zip-arkiv';
$TEXT['UP'] = 'Op';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Overf&oslash;r fil(er)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Bruger';
$TEXT['USERNAME'] = 'Brugernavn';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Indtast verifikationstal';
$TEXT['VERSION'] = 'Version';
$TEXT['VIEW'] = 'Se';
$TEXT['VIEW_DELETED_PAGES'] = 'Vis slettede sider';
$TEXT['VIEW_DETAILS'] = 'Se oplysninger';
$TEXT['VISIBILITY'] = 'Synlighed';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Standard fra-adresse';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Standard afsendernavn';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Angiv standard "FRA"-adresse og "AFSENDER"-navn nedenfor. Det anbefales at angive FRA-adresse som: <strong>admin@dit-dom&aelig;ne.dk</strong>. Nogle udbydere (f.eks. <em>mail.com</em>) kan afvise emails med en FRA-adresse som <em>navn@mail.com</em>, hvis de er sendt via en anden udbyder, for at undg&aring; spam.<br /><br />Standardv&aelig;rdierne benyttes kun, hvis ingen andre v&aelig;rdier angives i WebsiteBaker. Hvis din server underst&oslash;tter <acronym title="Simple mail transfer protocol">SMTP</acronym>, kan du v&aelig;lge at bruge denne til udg&aring;ende emails.';
$TEXT['WBMAILER_FUNCTION'] = 'Mailprogram';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP mail-program indstillinger:</strong><br />Indstillingerne nedenfor er kun n&oslash;dvendige, hvis du vil sende emails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. Hvis du ikke kender adressen p&aring; din SMTP-v&aelig;rt eller de kr&aelig;vede indstillinger, s&aring; hold dig til standardprogrammet, PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP brugeradgangskontrol';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = '- skal kun anvendes hvis din SMTP-v&aelig;rt bruger adgangskontrol';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP-v&aelig;rt';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP adgangskode';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP brugernavn';
$TEXT['WEBSITE'] = 'Websted';
$TEXT['WEBSITE_DESCRIPTION'] = 'Beskrivelse af dit websted';
$TEXT['WEBSITE_FOOTER'] = 'Webstedsfod (bund)';
$TEXT['WEBSITE_HEADER'] = 'Webstedshoved';
$TEXT['WEBSITE_KEYWORDS'] = 'Webstedsn&oslash;gleord';
$TEXT['WEBSITE_TITLE'] = 'Titel p&aring; dit websted';
$TEXT['WELCOME_BACK'] = 'Velkommen igen';
$TEXT['WIDTH'] = 'Bredde';
$TEXT['WINDOW'] = 'Vindue';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Globale skriverettigheder';
$TEXT['WRITE'] = 'Skriv';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG-editor';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG-stil';
$TEXT['YES'] = 'Ja';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On krav er ikke opfyldt';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Tilf&oslash;j gruppe';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Tilf&oslash;j overskrift';
$HEADING['ADD_PAGE'] = 'Tilf&oslash;j side';
$HEADING['ADD_USER'] = 'Tilf&oslash;j bruger';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administrationsv&aelig;rkt&oslash;jer';
$HEADING['BROWSE_MEDIA'] = 'Gennemse medie-mappe';
$HEADING['CREATE_FOLDER'] = 'Opret mappe';
$HEADING['DEFAULT_SETTINGS'] = 'Standard indstillinger';
$HEADING['DELETED_PAGES'] = 'Slettede sider';
$HEADING['FILESYSTEM_SETTINGS'] = 'Filsystem-indstillinger';
$HEADING['GENERAL_SETTINGS'] = 'Generelle indstillinger';
$HEADING['INSTALL_LANGUAGE'] = 'Install&eacute;r sprog';
$HEADING['INSTALL_MODULE'] = 'Install&eacute;r modul';
$HEADING['INSTALL_TEMPLATE'] = 'Install&eacute;r skabelon';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Eksekver modulfiler manuelt';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Info om sprog';
$HEADING['MANAGE_SECTIONS'] = 'Administr&eacute;r sektioner';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Rediger avancerede indstillinger for hjemmesiden';
$HEADING['MODIFY_DELETE_GROUP'] = 'Ret/slet gruppe';
$HEADING['MODIFY_DELETE_PAGE'] = 'Ret/slet side';
$HEADING['MODIFY_DELETE_USER'] = 'Ret/slet bruger';
$HEADING['MODIFY_GROUP'] = 'Ret gruppe';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Rediger intro-side';
$HEADING['MODIFY_PAGE'] = 'Rediger side';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Rediger side-indstillinger';
$HEADING['MODIFY_USER'] = 'Ret bruger';
$HEADING['MODULE_DETAILS'] = 'Info om modul';
$HEADING['MY_EMAIL'] = 'Min email-adresse';
$HEADING['MY_PASSWORD'] = 'Min adgangskode';
$HEADING['MY_SETTINGS'] = 'Mine indstillinger';
$HEADING['SEARCH_SETTINGS'] = 'S&oslash;ge-indstillinger';
$HEADING['SERVER_SETTINGS'] = 'Server-indstillinger';
$HEADING['TEMPLATE_DETAILS'] = 'Info om skabelon';
$HEADING['UNINSTALL_LANGUAGE'] = 'Afinstall&eacute;r sprog';
$HEADING['UNINSTALL_MODULE'] = 'Afinstall&eacute;r modul';
$HEADING['UNINSTALL_TEMPLATE'] = 'Afinstall&eacute;r skabelon';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Overf&oslash;r fil(er)';
$HEADING['WBMAILER_SETTINGS'] = 'E-mail-indstillinger';

/* MESSAGE */
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Error while updating the Add-On information.';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Languages reloaded successfully';
$MESSAGE['ADDON_MANUAL_FTP_LANGUAGE'] = '<strong>ATTENTION!</strong> For safety reasons uploading languages files in the folder/languages/ only by FTP and use the Upgrade function for registering or updating.';
$MESSAGE['ADDON_MANUAL_FTP_WARNING'] = 'Warning: Existing module database entries will get lost. ';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'When modules are uploaded via FTP (not recommended), the module installation functions <tt>install</tt>, <tt>upgrade</tt> or <tt>uninstall</tt> will not be executed automatically. Those modules may not work correct or do not uninstall properly.<br /><br />You can execute the module functions manually for modules uploaded via FTP below.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Warning: Existing module database entries will get lost. Only use this option if you experience problems with modules uploaded via FTP.';
$MESSAGE['ADDON_MANUAL_RELOAD_WARNING'] = 'Warning: Existing module database entries will get lost. ';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Modules reloaded successfully';
$MESSAGE['ADDON_OVERWRITE_NEWER_FILES'] = 'Overwrite newer Files';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Add-on installation failed. Your system does not fulfill the requirements of this Add-on. To make this Add-on working on your system, please fix the issues summarized below.';
$MESSAGE['ADDON_RELOAD'] = 'Update database with information from Add-on files (e.g. after FTP upload).';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Templates reloaded successfully';
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Du har ikke den forn&oslash;dne adgang til dette omr&aring;de';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Adgangskode kan kun nulstilles 1 gang i timen - beklager!';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Kunne ikke sende din adgangskode til din email-adresse - Kontakt en systemadministrator';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Den email-adresse du indtastede findes ikke i vores database';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Indtast din email-adresse nedenfor';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Dit brugernavn og din adgangskode er nu afsendt til din email-adresse';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Beklager - intet aktivit indhold at vise';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Beklager - du har ikke adgang til at se denne side';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Er allerede installeret';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kan ikke skrive i det valgte modtagebibliotek (mappe)';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Kan ikke afinstallere';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Kan ikke afinstallere: Den valgte fil er i brug';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> kan ikke afinstalleres, da den stadig bruges p&aring; {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'denne side;disse sider';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Kan ikke afinstallere skabelonen <b>{{name}}</b>, da den er standardskabelonen!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kan ikke udpakke fil';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Kunne ikke over&oslash;re filen';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Fejl ved &aring;bning af filen.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'OBS: V&aelig;r opm&aelig;rksom p&aring; at den fil du vil over&oslash;re skal v&aelig;re i flg. format:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'OBS: V&aelig;r opm&aelig;rksom p&aring; at den fil du vil over&oslash;re skal v&aelig;re i et af flg. formater:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'G&aring; venligst tilbage og udfyld alle felter';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Installeret';
$MESSAGE['GENERIC_INVALID'] = 'Filen du over&oslash;rte er fejlbeh&aelig;ftet';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'WebsiteBaker installationsfil ikke i korrekt format. Kontroller *.zip formatet.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'WebsiteBaker sprogfil ikke i korrekt format. Kontroller tekstfilen.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Ikke installeret';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'V&aelig;r t&aring;lmodig, dette kan godt vare et stykke tid.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Kom venligst igen senere...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Afinstalleret';
$MESSAGE['GENERIC_UPGRADED'] = 'Opgraderet';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website under konstruktion';
$MESSAGE['GROUPS_ADDED'] = 'Gruppen er tilf&oslash;jet';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Er du helt sikker p&aring; du vil slette denne gruppe (og alle brugere som tilh&oslash;rer den)?';
$MESSAGE['GROUPS_DELETED'] = 'Gruppen er slettet';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Gruppenavn er ikke udfyldt';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Gruppens navn findes allerede';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Der blev ikke fundet nogen grupper';
$MESSAGE['GROUPS_SAVED'] = 'Gruppen er gemt';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Brugernavn og/eller adgangskode er forkert';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Indtast venligst dit brugernavn og din adgangskode nedenfor';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Angiv en adgangskode ';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Den indtastede adgangskode er for LANG';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Den indtastede adgangskode er for KORT';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Angiv et brugernavn';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Det indtastede brugernavn er for LANGT';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Det indtastede brugernavn er for KORT';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Du har ikke angivet en filtype';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Du indtastede ikke et nyt navn';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Kan ikke slette valgte bibliotek (mappe)';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Kan ikke slette den valgte fil';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Omd&oslash;bning kunne ikke udf&oslash;res';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Er du sikker p&aring; du &oslash;nsker at slette flg. fil/bibliotek (mappe)?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Bibliotek (mappe) slettet';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Filen er slettet';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Mappen eksisterer ikke';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Kan ikke inkludere ../ i mappenavnet';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Der findes allerede et bibliotek (en mappe) med det navn du indtastede!';
$MESSAGE['MEDIA_DIR_MADE'] = 'Bibliotek (mappe) blev oprettet';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Kunne ikke oprette biblioteket (mappen)';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Der findes allerede en fil med det navn du indtastede';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Filen ikke fundet';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Kan ikke inkludere ../ i navnet';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Kan ikke anvende index.php som navn';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Der blev ikke fundet medie-filer i det p&aring;g&aelig;ldende bibliotek (mappe)';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Omd&oslash;bning udf&oslash;rt';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = 'fil blev overf&oslash;rt';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Kan ikke have ../ i placeringen af biblioteket (mappen)';
$MESSAGE['MEDIA_UPLOADED'] = 'filer blev overf&oslash;rt';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Beklager! Denne formular er blevet afsendt for mange gange indenfor den sidste time, og du vil derfor blive afvist - Pr&oslash;v igen om en times tid!';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Verifikations tallene (ogs&aring; kendt som Captcha) som du tastede er ikke korrekte. Hvis du har problemer med at l&aelig;se Captha tallene, s&aring; kontakt venligst sidens Administrator p&aring; denne mailadresse: SERVER_EMAIL';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Du skal udfylde f&oslash;lgende felter:';
$MESSAGE['PAGES_ADDED'] = 'Siden er tilf&oslash;jet';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Overskrift til side tilf&oslash;jet';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Indtast venligst en overskrift til menuen';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Indtast venligst en overskrift til siden';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Fejl under oprettelse af adgangsfil i /pages biblioteket (mappen) (utilstr&aelig;kkelige rettigheder)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Fejl under sletning af adgangsfil i /pages biblioteket  (utilstr&aelig;kkelige rettigheder)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Fejl ved fors&oslash;g p&aring; at omorganisere siden';
$MESSAGE['PAGES_DELETED'] = 'Siden er slettet';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Er du sikker p&aring; du &oslash;nsker at slette den valgte side (og alle dens undersider)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Du har ikke rettigheder til at &aelig;ndre denne side';
$MESSAGE['PAGES_INTRO_LINK'] = 'Klik HER for at &aelig;ndre din intro-side!';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Kan ikke skrive til filen /pages/intro.php (utilstr&aelig;kkelige rettigheder)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Introside gemt';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Sidste &aelig;ndring blev foretaget af:';
$MESSAGE['PAGES_NOT_FOUND'] = 'Siden blev ikke fundet';
$MESSAGE['PAGES_NOT_SAVED'] = 'Der opstod en fejl under fors&oslash;get p&aring; at gemme siden';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Der findes allerede en side med dette eller lign. navn';
$MESSAGE['PAGES_REORDERED'] = 'Siden er omorganiseret';
$MESSAGE['PAGES_RESTORED'] = 'Siden er gendannet';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Tilbage til sider';
$MESSAGE['PAGES_SAVED'] = 'Siden er gemt';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Side-indstillinger er gemt';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Egenskaber for sektion er &aelig;ndret';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Den (nuv&aelig;rende) adgangskode som du indtastede er ikke korrekt';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Oplysningerne er gemt';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email-adresse opdateret';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Adgangskode &aelig;ndret';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = '<br>OBS: Ved at klikke p&aring; denne knap tabes alle &aelig;ndringer, der ikke er gemt!';
$MESSAGE['SETTINGS_SAVED'] = 'Indstillingerne er gemt';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Er ikke i stand til at &aring;bne konfigurationsfilen';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Kan ikke skrive til konfigurationsfilen (check rettigheder for filen)';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'OBS! Dette anbefales kun i testmilj&oslash;er ';
$MESSAGE['SIGNUP2_ADMIN_INFO'] = '
A new user was registered.

Username: {LOGIN_NAME}
UserId: {LOGIN_ID}
E-Mail: {LOGIN_EMAIL}
IP-Adress: {LOGIN_IP}
Registration date: {SIGNUP_DATE}
----------------------------------------
This message was automatic generated!

';
$MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT'] = '
Hello {LOGIN_DISPLAY_NAME},

This mail was sent because the \'forgot password\' function has been applied to your account.

Your new \'{LOGIN_WEBSITE_TITLE}\' login details are:

Username: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Your password has been reset to the one above.
This means that your old password will no longer work anymore!
If you\'ve got any questions or problems within the new login-data
you should contact the website-team or the admin of \'{LOGIN_WEBSITE_TITLE}\'.
Please remember to clean you browser-cache before using the new one to avoid unexpected fails.

Regards
------------------------------------
This message was automatic generated

';
$MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] = '
Hello {LOGIN_DISPLAY_NAME},

Welcome to our \'{LOGIN_WEBSITE_TITLE}\'.

Your \'{LOGIN_WEBSITE_TITLE}\' login details are:
Username: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Regards

Please:
if you have received this message by an error, please delete it immediately!
-------------------------------------
This message was automatic generated!
';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Dine login-oplysninger...';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Du skal indtaste en gyldig email-adresse';
$MESSAGE['START_CURRENT_USER'] = 'Du er lige nu logget ind som:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'ADVARSEL! Installationsbiblioteket (mappen) findes stadig p&aring; serveren. Du b&oslash;r slette den straks af hensyn til sikkerheden!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file "upgrade-script.php" from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Velkommen til administration af din WebsiteBaker';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'OBS: For at &aelig;ndre skabelonen skal du g&aring; til punktet indstillinger';
$MESSAGE['USERS_ADDED'] = 'Brugeren er oprettet';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'OBS! Du skal kun indtaste v&aelig;rdier i felterne ovenfor, s&aring;fremt du &oslash;nsker at &aelig;ndre denne brugers adgangskode';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Er du sikker p&aring; at du vil slette den valgte bruger?';
$MESSAGE['USERS_DELETED'] = 'Brugeren er slettet';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Den email-adresse du indtastede findes i forvejen';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Email-adressen du indtastede er ugyldig';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for username found';
$MESSAGE['USERS_NO_GROUP'] = 'Ingen gruppe er valgt';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'De to adgangskoder du indtastede  er ikke ens';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Den angivne adgangskode er for kort';
$MESSAGE['USERS_SAVED'] = 'Brugeren er gemt';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Brugernavnet du indtastede er allerede optaget af en anden bruger';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Det angivne brugernavn er for kort';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'WebsiteBaker administrationsv&aelig;rkt&oslash;jer...';
$OVERVIEW['GROUPS'] = 'Administr&eacute;r brugergrupper og deres systemrettigheder...';
$OVERVIEW['HELP'] = 'Sp&oslash;rgsm&aring;l? Find dine svar her...';
$OVERVIEW['LANGUAGES'] = 'Administration af sprog i WebsiteBaker...';
$OVERVIEW['MEDIA'] = 'Administr&eacute;r filer i mappen medier...';
$OVERVIEW['MODULES'] = 'Administr&eacute;r WebsiteBaker moduler...';
$OVERVIEW['PAGES'] = 'Administr&eacute;r dine websider...';
$OVERVIEW['PREFERENCES'] = 'Tilpas pr&aelig;ferencer s&aring;som email-adresse, adgangskode, etc... ';
$OVERVIEW['SETTINGS'] = 'Tilpas indstillinger for WebsiteBaker...';
$OVERVIEW['START'] = 'Administrationsoversigt';
$OVERVIEW['TEMPLATES'] = 'Skift udseende og layout/design p&aring; din webside v.h.a. skabeloner....';
$OVERVIEW['USERS'] = 'Administr&eacute;r brugere som kan logge ind p&aring; WebsiteBaker systemet...';
$OVERVIEW['VIEW'] = 'Hurtig visning og gennemsyn af dit Websted i et nyt vindue..';

/* include old languages format */
if(file_exists(WB_PATH.'/languages/old.format.inc.php'))
{
	include(WB_PATH.'/languages/old.format.inc.php');
}

