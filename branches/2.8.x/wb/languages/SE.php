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
$language_code = 'SE';
$language_name = 'Svenska';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Markus Eriksson, Peppe Bergqvist';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Rättigheter';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Tillägg';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Skicka inloggningsuppgifter';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Grupper';
$MENU['HELP'] = 'Hjälp';
$MENU['LANGUAGES'] = 'Språk';
$MENU['LOGIN'] = 'Logga in';
$MENU['LOGOUT'] = 'Logga ut';
$MENU['MEDIA'] = 'Mediabibliotek';
$MENU['MODULES'] = 'Moduler';
$MENU['PAGES'] = 'Sidor';
$MENU['PREFERENCES'] = 'Mina uppgifter';
$MENU['SETTINGS'] = 'Inställningar';
$MENU['START'] = 'Hem';
$MENU['TEMPLATES'] = 'Mallar';
$MENU['USERS'] = 'Användare';
$MENU['VIEW'] = 'Visa sida';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Kontoregistrering';
$TEXT['ACTIONS'] = 'Åtgärder';
$TEXT['ACTIVE'] = 'Aktiv';
$TEXT['ADD'] = 'Lägg till';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Lägg till sektion';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administration';
$TEXT['ADMINISTRATION_TOOL'] = 'Administrationsverktyg';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administratorer';
$TEXT['ADVANCED'] = 'Avancerat';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Tillåtna att se';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Tillåt flera val';
$TEXT['ALL_WORDS'] = 'Alla ord';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Anonym';
$TEXT['ANY_WORDS'] = 'Något ord';
$TEXT['APP_NAME'] = 'Namn på applikation';
$TEXT['ARE_YOU_SURE'] = 'Är du säker?';
$TEXT['AUTHOR'] = 'Författare';
$TEXT['BACK'] = 'Tillbaka';
$TEXT['BACKUP'] = 'Backup';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup av samtliga tabeller i databasen';
$TEXT['BACKUP_DATABASE'] = 'Backup av databas';
$TEXT['BACKUP_MEDIA'] = 'Backup av media';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup av endast tabeller för WB';
$TEXT['BASIC'] = 'Standard';
$TEXT['BLOCK'] = 'Block';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['CANCEL'] = 'Avbryt';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captchaverifiering (även kallat verifierings nummer) ';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['CHANGE'] = 'Ändra';
$TEXT['CHANGES'] = 'Ändringar';
$TEXT['CHANGE_SETTINGS'] = 'Ändra inställningar';
$TEXT['CHARSET'] = 'Typsnitt';
$TEXT['CHECKBOX_GROUP'] = 'Valruta flera';
$TEXT['CLOSE'] = 'Stäng';
$TEXT['CODE'] = 'Kod';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Stäng';
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['COMMENTING'] = 'Kommenterar';
$TEXT['COMMENTS'] = 'Kommentarer';
$TEXT['CREATE_FOLDER'] = 'Skapa mapp';
$TEXT['CURRENT'] = 'Nuvarande';
$TEXT['CURRENT_FOLDER'] = 'Nuvarande mapp';
$TEXT['CURRENT_PAGE'] = 'Nuvarande sida';
$TEXT['CURRENT_PASSWORD'] = 'Nuvarande lösenord';
$TEXT['CUSTOM'] = 'Sedvanlig';
$TEXT['DATABASE'] = 'Databas';
$TEXT['DATE'] = 'Datum';
$TEXT['DATE_FORMAT'] = 'Datumformat';
$TEXT['DEFAULT'] = 'Standard';
$TEXT['DEFAULT_CHARSET'] = 'Standardtypsnitt';
$TEXT['DEFAULT_TEXT'] = 'Standardtext';
$TEXT['DELETE'] = 'Radera';
$TEXT['DELETED'] = 'Raderat';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Beskrivning';
$TEXT['DESIGNED_FOR'] = 'Skapad för';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Mappar';
$TEXT['DIRECTORY_MODE'] = 'Mappar sätt';
$TEXT['DISABLED'] = 'Inaktiverad';
$TEXT['DISPLAY_NAME'] = 'Visa namn';
$TEXT['EMAIL'] = 'E-post';
$TEXT['EMAIL_ADDRESS'] = 'E-postadress';
$TEXT['EMPTY_TRASH'] = 'Töm papperskorgen';
$TEXT['ENABLED'] = 'Aktiverad';
$TEXT['END'] = 'Stopp';
$TEXT['ERROR'] = 'FEL';
$TEXT['EXACT_MATCH'] = 'Exakt matchning';
$TEXT['EXECUTE'] = 'Köra script';
$TEXT['EXPAND'] = 'Öppna';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Fält';
$TEXT['FILE'] = 'Fil';
$TEXT['FILES'] = 'Filer';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Rättigheter filsystem';
$TEXT['FILE_MODE'] = 'Fil sätt';
$TEXT['FINISH_PUBLISHING'] = 'Avsluta publicering';
$TEXT['FOLDER'] = 'Mapp';
$TEXT['FOLDERS'] = 'Mappar';
$TEXT['FOOTER'] = 'Fot';
$TEXT['FORGOTTEN_DETAILS'] = 'Glömt dina uppgifter?';
$TEXT['FORGOT_DETAILS'] = 'Glömt dina uppgifter?';
$TEXT['FROM'] = 'Från';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['FULL_NAME'] = 'Ditt hela namn';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Grupp';
$TEXT['HEADER'] = 'Huvud';
$TEXT['HEADING'] = 'Rubrik';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Höjd';
$TEXT['HIDDEN'] = 'Gömd';
$TEXT['HIDE'] = 'Göm';
$TEXT['HIDE_ADVANCED'] = 'Göm avancerade val';
$TEXT['HOME'] = 'Hem';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Omstyrning hemsida';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Icon';
$TEXT['IMAGE'] = 'Bild';
$TEXT['INLINE'] = 'Aktiverad';
$TEXT['INSTALL'] = 'Installera';
$TEXT['INSTALLATION'] = 'Installation';
$TEXT['INSTALLATION_PATH'] = 'Installation sökväg';
$TEXT['INSTALLATION_URL'] = 'Installation URL';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Inledning';
$TEXT['INTRO_PAGE'] = 'Förstasida';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Nyckelord';
$TEXT['LANGUAGE'] = 'Språk';
$TEXT['LAST_UPDATED_BY'] = 'Senast uppdaterad av';
$TEXT['LENGTH'] = 'Längd';
$TEXT['LEVEL'] = 'Nivå';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Link';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['LIST_OPTIONS'] = 'Visa val';
$TEXT['LOGGED_IN'] = 'Inloggad';
$TEXT['LOGIN'] = 'Logga In';
$TEXT['LONG'] = 'Brödtext';
$TEXT['LONG_TEXT'] = 'Lång text';
$TEXT['LOOP'] = 'Loop';
$TEXT['MAIN'] = 'Huvudmenyn';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Behandla';
$TEXT['MANAGE_GROUPS'] = 'Behandla grupper';
$TEXT['MANAGE_USERS'] = 'Behandla användare';
$TEXT['MATCH'] = 'Matcha';
$TEXT['MATCHING'] = 'Matching';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max poster per timme';
$TEXT['MEDIA_DIRECTORY'] = 'Media mapp';
$TEXT['MENU'] = 'Meny';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Menyns titel';
$TEXT['MESSAGE'] = 'Meddelande';
$TEXT['MODIFY'] = 'Ändra';
$TEXT['MODIFY_CONTENT'] = 'Redigera innehåll';
$TEXT['MODIFY_SETTINGS'] = 'Redigera inställningar';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Modultillåtelse';
$TEXT['MORE'] = 'Mer';
$TEXT['MOVE_DOWN'] = 'Flytta Ner';
$TEXT['MOVE_UP'] = 'Flytta Upp';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Flera menyer';
$TEXT['MULTISELECT'] = 'Flerval';
$TEXT['NAME'] = 'Namn';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Logga in?';
$TEXT['NEW_PASSWORD'] = 'Nytt lösenord';
$TEXT['NEW_WINDOW'] = 'Nytt fönster';
$TEXT['NEXT'] = 'Nästa';
$TEXT['NEXT_PAGE'] = 'Nästa sida';
$TEXT['NO'] = 'Nej';
$TEXT['NONE'] = 'Ingen';
$TEXT['NONE_FOUND'] = 'Inget hittades';
$TEXT['NOT_FOUND'] = 'Hittades inte';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Inget resultat';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'Av';
$TEXT['ON'] = 'Den';
$TEXT['OPEN'] = 'Open';
$TEXT['OPTION'] = 'Val';
$TEXT['OTHERS'] = 'Andra';
$TEXT['OUT_OF'] = 'Utav';
$TEXT['OVERWRITE_EXISTING'] = 'Skriv över nuvarande';
$TEXT['PAGE'] = 'Sida';
$TEXT['PAGES_DIRECTORY'] = 'Sidors mapp';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Sidors filändelse';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Sidors språk';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Sidnivå gräns';
$TEXT['PAGE_SPACER'] = 'Mellanrum sida';
$TEXT['PAGE_TITLE'] = 'Sidans titel';
$TEXT['PAGE_TRASH'] = 'Papperskorg';
$TEXT['PARENT'] = 'Underliggande till';
$TEXT['PASSWORD'] = 'Lösenord';
$TEXT['PATH'] = 'Sökväg';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP felrapport nivå';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['PLEASE_SELECT'] = 'Vänligen välj';
$TEXT['POST'] = 'Nyhet';
$TEXT['POSTS_PER_PAGE'] = 'Inlägg per sida';
$TEXT['POST_FOOTER'] = 'Nyhet fot';
$TEXT['POST_HEADER'] = 'Nyhet huvud';
$TEXT['PREVIOUS'] = 'Föregående';
$TEXT['PREVIOUS_PAGE'] = 'Föregående sida';
$TEXT['PRIVATE'] = 'Privat';
$TEXT['PRIVATE_VIEWERS'] = 'Privata användare';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Offentligt';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radioknapp flera';
$TEXT['READ'] = 'Läs';
$TEXT['READ_MORE'] = 'Läs mer';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Registrerad';
$TEXT['REGISTERED_VIEWERS'] = 'Registrerade användare';
$TEXT['RELOAD'] = 'Ladda Om';
$TEXT['REMEMBER_ME'] = 'Kom ihåg mig';
$TEXT['RENAME'] = 'Döp om';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Obligatoriskt';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Ångra';
$TEXT['RESIZE'] = 'Storleksändra';
$TEXT['RESIZE_IMAGE_TO'] = 'Storleksändra bilden till';
$TEXT['RESTORE'] = 'Återställ';
$TEXT['RESTORE_DATABASE'] = 'Återställ databas';
$TEXT['RESTORE_MEDIA'] = 'Återställ media';
$TEXT['RESULTS'] = 'Resultat';
$TEXT['RESULTS_FOOTER'] = 'Resultat fot';
$TEXT['RESULTS_FOR'] = 'Resultat för';
$TEXT['RESULTS_HEADER'] = 'Resultat huvud';
$TEXT['RESULTS_LOOP'] = 'Resultat loop';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Nytt lösenord igen';
$TEXT['RETYPE_PASSWORD'] = 'Skriv lösenordet igen';
$TEXT['SAME_WINDOW'] = 'Samma fönster';
$TEXT['SAVE'] = 'Spara';
$TEXT['SEARCH'] = 'Sök';
$TEXT['SEARCHING'] = 'Söker';
$TEXT['SECTION'] = 'Sektion';
$TEXT['SECTION_BLOCKS'] = 'Sektioner block';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Valruta';
$TEXT['SEND_DETAILS'] = 'Skicka uppgifter';
$TEXT['SEPARATE'] = 'Separerat';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['SERVER_EMAIL'] = 'Server e-post';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serveroperativsystem';
$TEXT['SESSION_IDENTIFIER'] = 'Sessionsidentifierare';
$TEXT['SETTINGS'] = 'Inställningar';
$TEXT['SHORT'] = 'Ingress';
$TEXT['SHORT_TEXT'] = 'Kort text';
$TEXT['SHOW'] = 'Visa';
$TEXT['SHOW_ADVANCED'] = 'Visa avancerade val';
$TEXT['SIGNUP'] = 'Registrera';
$TEXT['SIZE'] = 'Storlek';
$TEXT['SMART_LOGIN'] = 'Smart inloggning';
$TEXT['START'] = 'Starta';
$TEXT['START_PUBLISHING'] = 'Starta publicering';
$TEXT['SUBJECT'] = 'Ämne';
$TEXT['SUBMISSIONS'] = 'Inskickningar';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Poster som sparas i databasen';
$TEXT['SUBMISSION_ID'] = 'Inskickning ID';
$TEXT['SUBMITTED'] = 'Inskickat';
$TEXT['SUCCESS'] = 'Lyckades';
$TEXT['SYSTEM_DEFAULT'] = 'Systemets standard';
$TEXT['SYSTEM_PERMISSIONS'] = 'Systemtillåtelse';
$TEXT['TABLE_PREFIX'] = 'Tabell prefix';
$TEXT['TARGET'] = 'Målfönster';
$TEXT['TARGET_FOLDER'] = 'Målmapp';
$TEXT['TEMPLATE'] = 'Mall';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Tillåtelse mallar';
$TEXT['TEXT'] = 'Text';
$TEXT['TEXTAREA'] = 'Textruta';
$TEXT['TEXTFIELD'] = 'Textrad';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Tid';
$TEXT['TIMEZONE'] = 'Tidzon';
$TEXT['TIME_FORMAT'] = 'Tidsformat';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['TITLE'] = 'Titel';
$TEXT['TO'] = 'Till';
$TEXT['TOP_FRAME'] = 'Top frame';
$TEXT['TRASH_EMPTIED'] = 'Papperskorgen tömd';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Typ';
$TEXT['UNDER_CONSTRUCTION'] = 'Under uppbygnad.... Kommer snart';
$TEXT['UNINSTALL'] = 'Avinstallera';
$TEXT['UNKNOWN'] = 'Okänd';
$TEXT['UNLIMITED'] = 'Obegränsat';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Upp';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Ladda upp filer';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Användare';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Verifikation';
$TEXT['VERSION'] = 'Version';
$TEXT['VIEW'] = 'Visa';
$TEXT['VIEW_DELETED_PAGES'] = 'Visa raderade sidor';
$TEXT['VIEW_DETAILS'] = 'Visa detaljer';
$TEXT['VISIBILITY'] = 'Synlighetsgrad';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Default From Mail';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Default Sender Name';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Please specify a default "FROM" address and "SENDER" name below. It is recommended to use a FROM address like: <strong>admin@yourdomain.com</strong>. Some mail provider (e.g. <em>mail.com</em>) may reject mails with a FROM: address like <em>name@mail.com</em> sent via a foreign relay to avoid spam.<br /><br />The default values are only used if no other values are specified by WebsiteBaker. If your server supports <acronym title="Simple mail transfer protocol">SMTP</acronym>, you may want use this option for outgoing mails.';
$TEXT['WBMAILER_FUNCTION'] = 'Mail Routine';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Settings:</strong><br />The settings below are only required if you want to send mails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. If you do not know your SMTP host or you are not sure about the required settings, simply stay with the default mail routine: PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Authentification';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'only activate if your SMTP host requires authentification';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Password';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Loginname';
$TEXT['WEBSITE'] = 'Websida';
$TEXT['WEBSITE_DESCRIPTION'] = 'Websitens beskrivning';
$TEXT['WEBSITE_FOOTER'] = 'Websitens fot';
$TEXT['WEBSITE_HEADER'] = 'Websitens huvud';
$TEXT['WEBSITE_KEYWORDS'] = 'Websitens nyckelord';
$TEXT['WEBSITE_TITLE'] = 'Websitens titel';
$TEXT['WELCOME_BACK'] = 'Välkommen tillbaka';
$TEXT['WIDTH'] = 'Bredd';
$TEXT['WINDOW'] = 'Fönster';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Skrivrättigheter filer';
$TEXT['WRITE'] = 'Skriv';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG redigerare';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG stil';
$TEXT['YES'] = 'Ja';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Skapa ny grupp';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Rubrik';
$HEADING['ADD_PAGE'] = 'Skapa ny sida';
$HEADING['ADD_USER'] = 'Skapa ny användare';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administrationsverktyg';
$HEADING['BROWSE_MEDIA'] = 'Mediabibliotek';
$HEADING['CREATE_FOLDER'] = 'Skapa ny mapp';
$HEADING['DEFAULT_SETTINGS'] = 'Standardinställningar';
$HEADING['DELETED_PAGES'] = 'Raderade sidor';
$HEADING['FILESYSTEM_SETTINGS'] = 'Inställningar för Filsystem';
$HEADING['GENERAL_SETTINGS'] = 'Generella inställningar';
$HEADING['INSTALL_LANGUAGE'] = 'Installera språk';
$HEADING['INSTALL_MODULE'] = 'Installera modul';
$HEADING['INSTALL_TEMPLATE'] = 'Installera mall';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Språkdetaljer';
$HEADING['MANAGE_SECTIONS'] = 'Redigera sektioner';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Ändra avancerade inställningar för sidan';
$HEADING['MODIFY_DELETE_GROUP'] = 'Ändra/radera grupp';
$HEADING['MODIFY_DELETE_PAGE'] = 'Ändra/radera sida';
$HEADING['MODIFY_DELETE_USER'] = 'Ändra/radera användare';
$HEADING['MODIFY_GROUP'] = 'Ändra grupp';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Ändra Förstasidan';
$HEADING['MODIFY_PAGE'] = 'Ändra sida';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Ändra sidans inställningar';
$HEADING['MODIFY_USER'] = 'Ändra användare';
$HEADING['MODULE_DETAILS'] = 'Moduldetaljer';
$HEADING['MY_EMAIL'] = 'Min e-post';
$HEADING['MY_PASSWORD'] = 'Mitt lösenord';
$HEADING['MY_SETTINGS'] = 'Mina uppgifter';
$HEADING['SEARCH_SETTINGS'] = 'Sökinställningar';
$HEADING['SERVER_SETTINGS'] = 'Server Inställningar';
$HEADING['TEMPLATE_DETAILS'] = 'Malldetaljer';
$HEADING['UNINSTALL_LANGUAGE'] = 'Avinstallera språk';
$HEADING['UNINSTALL_MODULE'] = 'Avinstallera modul';
$HEADING['UNINSTALL_TEMPLATE'] = 'Avinstallera mall';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Ladda Upp fil(er)';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Du har inte tillåtelse att vara här';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Lösenordet kan bara ändras max en gång per timme';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Kunde inte skicka lösenordet, vänligen kontakta administratatören';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'E-postadressen som du skrev in kan inte hittas i vår databas';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Skriv din e-postadress';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Tyvärr, du har inte tillåtelse att titta på denna sida';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Redan installerat';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kan inte skriva i målmappen';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Kan inte avinstallera';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Kan inte avinstallera: filen används just nu';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'this page;these pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default template!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kan inte packa upp filen';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Kan inte ladda upp fil';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Fel vid öppnande av fil.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Observera att filen du laddar upp måste vara i formatet:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Observera att filen du laddar upp måste vara i ett av följande format:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Gå tillbaka och fyll i alla fält';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Installerat';
$MESSAGE['GENERIC_INVALID'] = 'Filen du laddade upp är ogilltig';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Inte installerat';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Vänligen ha tålamod, det här kan ta en stund.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Vänligen kom tillbaka snart...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Avinstallerat';
$MESSAGE['GENERIC_UPGRADED'] = 'Uppgradering genomförd';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website Under Construction';
$MESSAGE['GROUPS_ADDED'] = 'Gruppen lades till';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Vill du verkligen radera gruppen med alla dess användare?';
$MESSAGE['GROUPS_DELETED'] = 'Gruppen raderades';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Gruppen måste ha ett namn';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Gruppnamnet finns redan';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Ingen grupp hittades';
$MESSAGE['GROUPS_SAVED'] = 'Gruppen sparades';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Skriv ditt lösenord';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Lösenordet är för långt';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Lösenordet är för kort';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Du skrev ingen filändelse';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Du skrev inget nytt namn';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Kan inte radera mappen';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Kan inte radera filen';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Namnändring utfördes INTE';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Vill du verkligen radera fäljande fil/mapp?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Mappen raderades';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Filen raderades';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Mappen finns inte';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Kan inte inkludera ../ i mappens namn';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Det finns redan en mapp med samma namn';
$MESSAGE['MEDIA_DIR_MADE'] = 'Mappen skapades';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Kunde inte skapa mapp';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Det finns redan en fil med samma namn';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Filen hittades inte';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Kan inte inkludera ../ i namnet';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Kan inte använda index.php som Namn';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Ingen media hittades i mappen';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Namnändring utfördes';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' filen laddades upp';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Kan inte ha ../ i mappens mål';
$MESSAGE['MEDIA_UPLOADED'] = ' filerna laddades upp';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Tyvärr, detta formulär har skickats för många gånger inom denna timme. Försök igen om ett tag.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Verifieringsnumret (också känt som Captcha) som du angav är felaktigt. Om du har problem med att läsa ut Captcha, vänligen sänd email till: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Du måste fylla i följande fält';
$MESSAGE['PAGES_ADDED'] = 'Sidan lades till';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Sidans huvud lades till';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Skriv en titel på menyn';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Skriv en titel på sidan';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Fel vid skapande av fil (otillräcklig tillåtelse)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Fel vid radering av fil (otillräcklig tillåtelse)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Fel vid omordning av sidorna';
$MESSAGE['PAGES_DELETED'] = 'Sidan raderades';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Vill du verkligen radera sidan med alla dess undersidor?';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Du har inte tilåtelse att redigera denna sida';
$MESSAGE['PAGES_INTRO_LINK'] = 'Klicka här för att redigera Förstasidan';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Kan inte skriva till filen /pages/intro.php (otillräklig tillåtelse)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Förstasidan sparades';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Senast redigerad av';
$MESSAGE['PAGES_NOT_FOUND'] = 'Sidan hittades inte';
$MESSAGE['PAGES_NOT_SAVED'] = 'Fel när sidan sparades';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'En sida med samma eller liknande titel finns redan';
$MESSAGE['PAGES_REORDERED'] = 'Sidorna omordnades';
$MESSAGE['PAGES_RESTORED'] = 'Sidan återskapades';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Tillbaka till Sidor';
$MESSAGE['PAGES_SAVED'] = 'Sidan sparades';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Sidans inställningar sparades';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Sektionens inställningar sparades';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Det (nuvarande) lösenordet du skrev är inte rätt';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Uppgifterna sparades';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-postadressen uppdaterades';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Lösenordet ändrades';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Observera: Om du klickar på denna knapp så försvinner all ny information som inte sparats';
$MESSAGE['SETTINGS_SAVED'] = 'Inställningarna sparades';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Kunde inte öppna konfigurationsfilen';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Kan inte skriva till konfigurationsfilen';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Observera: detta rekomenderas endast för tillfällig prövning av sidorna';
$MESSAGE['SIGNUP2_ADMIN_INFO'] = '
A new user was registered.

Loginname: {LOGIN_NAME}
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

Loginname: {LOGIN_NAME}
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
Loginname: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Regards

Please:
if you have received this message by an error, please delete it immediately!
-------------------------------------
This message was automatic generated!
';
$MESSAGE['SIGNUP2_NEW_USER'] = 'A new user would be registered';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Your login details...';
$MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] = 'Many thanks for your registration';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Du måste skriva en e-postadress';
$MESSAGE['START_CURRENT_USER'] = 'Du är inloggad som:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'VARNING, installationsmappen finns fortfarande kvar!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Välkommen till administrationen av WebsiteBaker';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Observera: för att ändra Mall, måste du gå till Sektionen Inställningar';
$MESSAGE['THEME_ALREADY_EXISTS'] = 'This new theme descriptor already exists.';
$MESSAGE['THEME_COPY_CURRENT'] = 'Copy the current active theme and save it with a new name.';
$MESSAGE['THEME_DESTINATION_READONLY'] = 'No rights to create new theme directory!';
$MESSAGE['THEME_IMPORT_HTT'] = 'Import additional templates into the current active theme.<br />Use these templates to overwrite the corresponding default template.';
$MESSAGE['THEME_INVALID_SOURCE_DESTINATION'] = 'Invalid descriptor for the new theme given!';
$MESSAGE['UNKNOW_UPLOAD_ERROR'] = 'Unknown upload error';
$MESSAGE['UPLOAD_ERR_CANT_WRITE'] = 'Failed to write file to disk';
$MESSAGE['UPLOAD_ERR_EXTENSION'] = 'File upload stopped by extension';
$MESSAGE['UPLOAD_ERR_FORM_SIZE'] = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
$MESSAGE['UPLOAD_ERR_INI_SIZE'] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
$MESSAGE['UPLOAD_ERR_NO_FILE'] = 'No file was uploaded';
$MESSAGE['UPLOAD_ERR_NO_TMP_DIR'] = 'Missing a temporary folder';
$MESSAGE['UPLOAD_ERR_OK'] = 'File were successful uploaded';
$MESSAGE['UPLOAD_ERR_PARTIAL'] = 'The uploaded file was only partially uploaded';
$MESSAGE['USERS_ADDED'] = 'Användaren lades till';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Observera: Dessa fält ska du bara skriva i om du vill ÄNDRA Lösenordet';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Vill du verkligen radera användaren?';
$MESSAGE['USERS_DELETED'] = 'Användaren Raderades';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'E-post adressen du skrev finns redan i vår Databas';
$MESSAGE['USERS_INVALID_EMAIL'] = 'E-post adressen är felaktig';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Ingen grupp valdes';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Lösenorden du skrev var inte lika';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Lösenordet är for kort';
$MESSAGE['USERS_SAVED'] = 'Användaren sparades';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';
$OVERVIEW['GROUPS'] = 'Behandla användargrupper och deras systemåtkomst...';
$OVERVIEW['HELP'] = 'Hitta svar på dina frågor (på engelska)...';
$OVERVIEW['LANGUAGES'] = 'Behandla WebsiteBaker språk...';
$OVERVIEW['MEDIA'] = 'Redigera innehåll i mediabiblioteket...';
$OVERVIEW['MODULES'] = 'Behandla WebsiteBaker moduler...';
$OVERVIEW['PAGES'] = 'Redigera dina sidor...';
$OVERVIEW['PREFERENCES'] = 'Ändra inställningar som e-postadress, lösenord, etc... ';
$OVERVIEW['SETTINGS'] = 'Ändra inställningar för WebsiteBaker...';
$OVERVIEW['START'] = 'Administration översyn';
$OVERVIEW['TEMPLATES'] = 'Ändra utseendet med mallar...';
$OVERVIEW['USERS'] = 'Behandla användare som kan logga in till WebsiteBaker...';
$OVERVIEW['VIEW'] = 'Titta på dina sidor i ett nytt fönster...';
