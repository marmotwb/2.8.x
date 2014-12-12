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
$language_code = 'ET';
$language_name = 'Eesti';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Heiko Häng';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Ligipääs';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Lisad';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Retrieve Login Details';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Grupid';
$MENU['HELP'] = 'Abi';
$MENU['LANGUAGES'] = 'Keeled';
$MENU['LOGIN'] = 'Logi Sisse';
$MENU['LOGOUT'] = 'Logi Välja';
$MENU['MEDIA'] = 'Meedia';
$MENU['MODULES'] = 'Moodulid';
$MENU['PAGES'] = 'Lehed';
$MENU['PREFERENCES'] = 'Valikud';
$MENU['SETTINGS'] = 'Seaded';
$MENU['START'] = 'Start';
$MENU['TEMPLATES'] = 'Kujundused';
$MENU['USERS'] = 'Kasutajad';
$MENU['VIEW'] = 'Vaata';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Registreerimine';
$TEXT['ACTIONS'] = 'Actions';
$TEXT['ACTIVE'] = 'Aktiivne';
$TEXT['ADD'] = 'Lisa';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Lisa Sektsioon';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administratsioon';
$TEXT['ADMINISTRATION_TOOL'] = 'Administration tool';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administraatorid';
$TEXT['ADVANCED'] = 'Arenenud';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Luba Arvukad Valikud';
$TEXT['ALL_WORDS'] = 'Kõik Sõnad';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Anonüümne';
$TEXT['ANY_WORDS'] = 'Mistages Sõnad';
$TEXT['APP_NAME'] = 'Application Name';
$TEXT['ARE_YOU_SURE'] = 'Oled sa kindel?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Tagasi';
$TEXT['BACKUP'] = 'Backup';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database';
$TEXT['BACKUP_DATABASE'] = 'Backup Database';
$TEXT['BACKUP_MEDIA'] = 'Backup Media';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables';
$TEXT['BASIC'] = 'Alus';
$TEXT['BLOCK'] = 'Blokeeri';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['CANCEL'] = 'Katkesta';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Verification';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['CHANGE'] = 'Muuda';
$TEXT['CHANGES'] = 'Muudatused';
$TEXT['CHANGE_SETTINGS'] = 'Muuda Seadeid';
$TEXT['CHARSET'] = 'Charset';
$TEXT['CHECKBOX_GROUP'] = 'Märkeruut Grupp';
$TEXT['CLOSE'] = 'Sulge';
$TEXT['CODE'] = 'Kood';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Kollaps';
$TEXT['COMMENT'] = 'Kommentaar';
$TEXT['COMMENTING'] = 'Kommenteerimine';
$TEXT['COMMENTS'] = 'Kommentaarid';
$TEXT['CREATE_FOLDER'] = 'Loo Kaust';
$TEXT['CURRENT'] = 'Praegune';
$TEXT['CURRENT_FOLDER'] = 'Praegune Kaust';
$TEXT['CURRENT_PAGE'] = 'Praegune Lehekülg';
$TEXT['CURRENT_PASSWORD'] = 'Praegune Parool';
$TEXT['CUSTOM'] = 'Tava';
$TEXT['DATABASE'] = 'Andmebaas';
$TEXT['DATE'] = 'Kuupäev';
$TEXT['DATE_FORMAT'] = 'Kuupäeva Formaat';
$TEXT['DEFAULT'] = 'Vaikimisi';
$TEXT['DEFAULT_CHARSET'] = 'Default Charset';
$TEXT['DEFAULT_TEXT'] = 'Vaikimisi Tekst';
$TEXT['DELETE'] = 'Kustuta';
$TEXT['DELETED'] = 'Kustutatud';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Kirjeldus';
$TEXT['DESIGNED_FOR'] = 'Kavandatud';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Kataloogid';
$TEXT['DIRECTORY_MODE'] = 'Kataloogi Tööreziim';
$TEXT['DISABLED'] = 'Blokeeritud';
$TEXT['DISPLAY_NAME'] = 'Vaate Nimi';
$TEXT['EMAIL'] = 'Email';
$TEXT['EMAIL_ADDRESS'] = 'Emaili Aadress';
$TEXT['EMPTY_TRASH'] = 'Tühi Prügikast';
$TEXT['ENABLED'] = 'Lubatud';
$TEXT['END'] = 'Lõpp';
$TEXT['ERROR'] = 'Viga';
$TEXT['EXACT_MATCH'] = 'Täpne Sobivus';
$TEXT['EXECUTE'] = 'Täida';
$TEXT['EXPAND'] = 'Laienda';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Väli';
$TEXT['FILE'] = 'Fail';
$TEXT['FILES'] = 'Failid';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Failisüsteemi Õigused';
$TEXT['FILE_MODE'] = 'Faili Tööreziim';
$TEXT['FINISH_PUBLISHING'] = 'Lõpeta Avaldamine';
$TEXT['FOLDER'] = 'Kaust';
$TEXT['FOLDERS'] = 'Kaustad';
$TEXT['FOOTER'] = 'Jalus';
$TEXT['FORGOTTEN_DETAILS'] = 'Unustasid oma detailid?';
$TEXT['FORGOT_DETAILS'] = 'Unustasid Andmed?';
$TEXT['FROM'] = 'Kellelt';
$TEXT['FRONTEND'] = 'Frondi-lõpp';
$TEXT['FULL_NAME'] = 'Täisnimi';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Grupp';
$TEXT['HEADER'] = 'Päis';
$TEXT['HEADING'] = 'Päis';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Kõrgus';
$TEXT['HIDDEN'] = 'Varjatud';
$TEXT['HIDE'] = 'Peida';
$TEXT['HIDE_ADVANCED'] = 'Peida Arenenud Valikud';
$TEXT['HOME'] = 'Kodu';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Kodulehe Ümbersuunamine';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Hostia';
$TEXT['ICON'] = 'Ikoon';
$TEXT['IMAGE'] = 'Pilt';
$TEXT['INLINE'] = 'Rivis';
$TEXT['INSTALL'] = 'Paigalda';
$TEXT['INSTALLATION'] = 'Installatsioon';
$TEXT['INSTALLATION_PATH'] = 'Installatsiooni Rada';
$TEXT['INSTALLATION_URL'] = 'Installatsiooni URL';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Intro';
$TEXT['INTRO_PAGE'] = 'Intro Lehekülg';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Märksõnad';
$TEXT['LANGUAGE'] = 'Keel';
$TEXT['LAST_UPDATED_BY'] = 'Viimati Uuendatud';
$TEXT['LENGTH'] = 'Pikkus';
$TEXT['LEVEL'] = 'Tase';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Link';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix tuginev';
$TEXT['LIST_OPTIONS'] = 'Nimekirja Valikud';
$TEXT['LOGGED_IN'] = 'Sisse Logitud';
$TEXT['LOGIN'] = 'Logi Sisse';
$TEXT['LONG'] = 'Pikk';
$TEXT['LONG_TEXT'] = 'Pikk Tekst';
$TEXT['LOOP'] = 'Tsükkel';
$TEXT['MAIN'] = 'Peamine';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Halda';
$TEXT['MANAGE_GROUPS'] = 'Halda Gruppe';
$TEXT['MANAGE_USERS'] = 'Halda Kasutajaid';
$TEXT['MATCH'] = 'Sobima';
$TEXT['MATCHING'] = 'Sobiv';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Kaastöid Tunnis';
$TEXT['MEDIA_DIRECTORY'] = 'Meedia Kataloog';
$TEXT['MENU'] = 'Menüü';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Menüü Pealkiri';
$TEXT['MESSAGE'] = 'Teade';
$TEXT['MODIFY'] = 'Muuda';
$TEXT['MODIFY_CONTENT'] = 'Muuda Sisu';
$TEXT['MODIFY_SETTINGS'] = 'Muuda Seadeid';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Mooduli Õigused';
$TEXT['MORE'] = 'Rohkem';
$TEXT['MOVE_DOWN'] = 'Liigu Alla';
$TEXT['MOVE_UP'] = 'Liigu Ülesse';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Arvukas Menüü\'s';
$TEXT['MULTISELECT'] = 'Multi-valik';
$TEXT['NAME'] = 'Nimi';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Vajad sisselogimist?';
$TEXT['NEW_PASSWORD'] = 'Uus Parool';
$TEXT['NEW_WINDOW'] = 'Uus Aken';
$TEXT['NEXT'] = 'Järgmine';
$TEXT['NEXT_PAGE'] = 'Järgmine Lehekülg';
$TEXT['NO'] = 'Ei';
$TEXT['NONE'] = 'Mitte Ükski';
$TEXT['NONE_FOUND'] = 'Ei Leitud';
$TEXT['NOT_FOUND'] = 'Ei Leitud';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Tulemusi Ei Ole';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'Of';
$TEXT['ON'] = 'Edasi';
$TEXT['OPEN'] = 'Open';
$TEXT['OPTION'] = 'Valikud';
$TEXT['OTHERS'] = 'Teise';
$TEXT['OUT_OF'] = 'Out Of';
$TEXT['OVERWRITE_EXISTING'] = 'Kirjuta olemasolev üle';
$TEXT['PAGE'] = 'Lehekülg';
$TEXT['PAGES_DIRECTORY'] = 'Lehekülgede Kataloog';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Lehekülje Ulatus';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Lehekülje Keeled';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lehekülje Taseme Limiit';
$TEXT['PAGE_SPACER'] = 'Lehekülje Vahepuks';
$TEXT['PAGE_TITLE'] = 'Lehekülje Pealkiri';
$TEXT['PAGE_TRASH'] = 'Lehekülje Prügi';
$TEXT['PARENT'] = 'Vanem';
$TEXT['PASSWORD'] = 'Parool';
$TEXT['PATH'] = 'Rada';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Vea Esitamise Tase';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['PLEASE_SELECT'] = 'Palun vali';
$TEXT['POST'] = 'Post';
$TEXT['POSTS_PER_PAGE'] = 'Postitusi Lehele';
$TEXT['POST_FOOTER'] = 'Posti Jalus';
$TEXT['POST_HEADER'] = 'Posti Päis';
$TEXT['PREVIOUS'] = 'Eelmine';
$TEXT['PREVIOUS_PAGE'] = 'Eelmine lehekülg';
$TEXT['PRIVATE'] = 'Privaatne';
$TEXT['PRIVATE_VIEWERS'] = 'Privaatsed Vaatajad';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Avalik';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Nupu Grupp';
$TEXT['READ'] = 'Loe';
$TEXT['READ_MORE'] = 'Loe Rohkem';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Registreeritud';
$TEXT['REGISTERED_VIEWERS'] = 'Registered Viewers';
$TEXT['RELOAD'] = 'Lae Uuesti';
$TEXT['REMEMBER_ME'] = 'Pea Mind Meeles';
$TEXT['RENAME'] = 'Nimeta Ümber';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Required';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Tagasta';
$TEXT['RESIZE'] = 'Re-size';
$TEXT['RESIZE_IMAGE_TO'] = 'Resize Image To';
$TEXT['RESTORE'] = 'Restore';
$TEXT['RESTORE_DATABASE'] = 'Restore Database';
$TEXT['RESTORE_MEDIA'] = 'Restore Media';
$TEXT['RESULTS'] = 'Tulemused';
$TEXT['RESULTS_FOOTER'] = 'Tulemuste Jalus';
$TEXT['RESULTS_FOR'] = 'Tulemused';
$TEXT['RESULTS_HEADER'] = 'Tulemuste Päis';
$TEXT['RESULTS_LOOP'] = 'Tulemuste Tsükkel';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Korda Uut Parooli';
$TEXT['RETYPE_PASSWORD'] = 'Korda Parooli';
$TEXT['SAME_WINDOW'] = 'Sama Aken';
$TEXT['SAVE'] = 'Salvesta';
$TEXT['SEARCH'] = 'Otsi';
$TEXT['SEARCHING'] = 'Otsib';
$TEXT['SECTION'] = 'Sektsioon';
$TEXT['SECTION_BLOCKS'] = 'Sektsiooni Blokid';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Selekteeri Kast';
$TEXT['SEND_DETAILS'] = 'Saada detailid';
$TEXT['SEPARATE'] = 'Eralduma';
$TEXT['SEPERATOR'] = 'Seperator';
$TEXT['SERVER_EMAIL'] = 'Serveri Email';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serveri Operatsioonisüsteem';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier';
$TEXT['SETTINGS'] = 'Seaded';
$TEXT['SHORT'] = 'Lühike';
$TEXT['SHORT_TEXT'] = 'Lühike Tekst';
$TEXT['SHOW'] = 'Näita';
$TEXT['SHOW_ADVANCED'] = 'Näita Arenenud Valikuid';
$TEXT['SIGNUP'] = 'Registreeri';
$TEXT['SIZE'] = 'Suurus';
$TEXT['SMART_LOGIN'] = 'Nutikas Sisselogimine';
$TEXT['START'] = 'Alusta';
$TEXT['START_PUBLISHING'] = 'Alusta Avaldamist';
$TEXT['SUBJECT'] = 'Pealkiri';
$TEXT['SUBMISSIONS'] = 'Kaastööd';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Kaastööd Salvestatud Andmebaasi';
$TEXT['SUBMISSION_ID'] = 'Kaastöö ID';
$TEXT['SUBMITTED'] = 'Saadetud';
$TEXT['SUCCESS'] = 'Edu';
$TEXT['SYSTEM_DEFAULT'] = 'Süsteemi Vaikimisi Valik';
$TEXT['SYSTEM_PERMISSIONS'] = 'Süsteemi Õigused';
$TEXT['TABLE_PREFIX'] = 'Tabelite Prefiks';
$TEXT['TARGET'] = 'Sihtmärk';
$TEXT['TARGET_FOLDER'] = 'Siht kaust';
$TEXT['TEMPLATE'] = 'Kujundus';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Kujunduse Õigused';
$TEXT['TEXT'] = 'Tekst';
$TEXT['TEXTAREA'] = 'Tekstikast';
$TEXT['TEXTFIELD'] = 'Tekstilahter';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Aeg';
$TEXT['TIMEZONE'] = 'Ajatsoon';
$TEXT['TIME_FORMAT'] = 'Aja Formaat';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['TITLE'] = 'Pealkiri';
$TEXT['TO'] = 'Kellele';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['TRASH_EMPTIED'] = 'Prügikast Tühjendatud';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Tüüp';
$TEXT['UNDER_CONSTRUCTION'] = 'Ehitamisel';
$TEXT['UNINSTALL'] = 'Eemalda';
$TEXT['UNKNOWN'] = 'Teadmata';
$TEXT['UNLIMITED'] = 'Piiramatu';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Ülesse';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Saada Fail(id)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Kasutaja';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Verification';
$TEXT['VERSION'] = 'Versioon';
$TEXT['VIEW'] = 'Vaata';
$TEXT['VIEW_DELETED_PAGES'] = 'Vaata Kustutatud Lehekülgi';
$TEXT['VIEW_DETAILS'] = 'Vaata Detaile';
$TEXT['VISIBILITY'] = 'Nähtavus';
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
$TEXT['WEBSITE'] = 'Veebisait';
$TEXT['WEBSITE_DESCRIPTION'] = 'Veebisaidi Kirjeldus';
$TEXT['WEBSITE_FOOTER'] = 'Veebisaidi Jalus';
$TEXT['WEBSITE_HEADER'] = 'Veebisaidi Päis';
$TEXT['WEBSITE_KEYWORDS'] = 'Veebisaidi Märksõnad';
$TEXT['WEBSITE_TITLE'] = 'Veebisaidi Pealkiri';
$TEXT['WELCOME_BACK'] = 'Teretulemast tagasi';
$TEXT['WIDTH'] = 'Laius';
$TEXT['WINDOW'] = 'Aken';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable file permissions';
$TEXT['WRITE'] = 'Kirjuta';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stiil';
$TEXT['YES'] = 'Jah';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Lisa Grupp';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Add Heading';
$HEADING['ADD_PAGE'] = 'Lisa Leht';
$HEADING['ADD_USER'] = 'Lisa Kasutaja';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Tools';
$HEADING['BROWSE_MEDIA'] = 'Sirvi Meediat';
$HEADING['CREATE_FOLDER'] = 'Loo Kaust';
$HEADING['DEFAULT_SETTINGS'] = 'Vaikimisi Seaded';
$HEADING['DELETED_PAGES'] = 'Kustutatud Lehed';
$HEADING['FILESYSTEM_SETTINGS'] = 'Failisüsteemi Seaded';
$HEADING['GENERAL_SETTINGS'] = 'Üldised Seaded';
$HEADING['INSTALL_LANGUAGE'] = 'Paigalda Keel';
$HEADING['INSTALL_MODULE'] = 'Paigalda Moodul';
$HEADING['INSTALL_TEMPLATE'] = 'Paigalda Kujundus';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Keele Detailid';
$HEADING['MANAGE_SECTIONS'] = 'Muuda Sektsioone';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Muuda Arenenud Lehe Seadeid';
$HEADING['MODIFY_DELETE_GROUP'] = 'Muuda/Kustuta Grupp';
$HEADING['MODIFY_DELETE_PAGE'] = 'Muuda/Kustuta Leht';
$HEADING['MODIFY_DELETE_USER'] = 'Muuda/Kustuta Kasutaja';
$HEADING['MODIFY_GROUP'] = 'Muuda Gruppi';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Muuda Intro Lehte';
$HEADING['MODIFY_PAGE'] = 'Muuda Lehte';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Muuda Lehe Seadeid';
$HEADING['MODIFY_USER'] = 'Muuda Kasutajat';
$HEADING['MODULE_DETAILS'] = 'Mooduli Detailid';
$HEADING['MY_EMAIL'] = 'Minu Email';
$HEADING['MY_PASSWORD'] = 'Minu Parool';
$HEADING['MY_SETTINGS'] = 'Minu Seaded';
$HEADING['SEARCH_SETTINGS'] = 'Otsingu Seaded';
$HEADING['SERVER_SETTINGS'] = 'Server Settings';
$HEADING['TEMPLATE_DETAILS'] = 'Kujunduse Detailid';
$HEADING['UNINSTALL_LANGUAGE'] = 'Eemalda Keel';
$HEADING['UNINSTALL_MODULE'] = 'Eemalda Moodul';
$HEADING['UNINSTALL_TEMPLATE'] = 'Eemalda Kujundus';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Saada Fail(id)';
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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Insufficient privelliges to be here';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Parooliei saa taastada rohkem kui üks kord tunnis, vabandame';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Võimetu emailima parooli, palun kontakteeru süsteemi administraatoriga';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Sisestatud emaili eileitud andmebaasist';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Palun sisesta oma emaili aadress allapoole';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Vabandame, sul ei ole õigusi selle lehe vaatamiseks';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Juba paigaldatud';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Võimetu kirjutama siht kataloogi';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Cannot uninstall';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Ei saa eemaldada: selekteeritud fail on kasutuses';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'this page;these pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default template!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Ei saa faili lahti pakkida';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Ei saa faili üles laadida';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Error opening file.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Pea meeles et üles laetav fail peab olema järgmistes formaatides:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Pea meeles et üles laetavad failid peavad olema järgmistes formaatides:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Palun mine tagasi ja täida kõik väljad';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Edukalt paigaldatud';
$MESSAGE['GENERIC_INVALID'] = 'Üles laetud fail on vigane';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Ei ole paigaldatud';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Külasta hiljem uuesti...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Edukalt eemaldatud';
$MESSAGE['GENERIC_UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website Under Construction';
$MESSAGE['GROUPS_ADDED'] = 'Grupp edukalt lisatud';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Oled sa kindel et tahad seda gruppi kustutada (ja kõik kasutajad mis kuuluvad selle alla)?';
$MESSAGE['GROUPS_DELETED'] = 'Grupp edukalt kustutatud';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Grupi nimi on tühi';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Group name already exists';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Gruppe ei leitud';
$MESSAGE['GROUPS_SAVED'] = 'Grupp edukalt salvestatud';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Palun sisesta parool';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Sisestatud parool on liiga pikk';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Sisestatud parool on liiga lühike';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Sa ei sisestanud faili ulatust';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Sa ei sisestanud uut nime';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Ei saa selekteeritud kausta kustutada';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Ei saa selekteeritud faili kustutada';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Ümbernimetamine ebaõnnestus';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Oled sa kindel et tahad kustutada järgnevat faili või kausta?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Kaust edukalt kustutatud';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Fail edukalt kustutatud';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Directory does not exist';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Ei saa sisaldada ../ kausta nimes';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Sisestatud kausta nimi eksisteerib';
$MESSAGE['MEDIA_DIR_MADE'] = 'Kaust edukalt loodud';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Võimetu looma kausta';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Sisestatud faili nimi eksisteerib';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Faili ei leitud';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Ei saa sisaldada ../ nimes';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Ei saa kasutada index.php nimena';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Meediat ei leitud praeguses kataloogis';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Edukalt ümber nimetatud';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' fail edukalt üles laetud';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target';
$MESSAGE['MEDIA_UPLOADED'] = ' failid edukalt üles laetud';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Vabandame, see vorm on juba liiga palju kordi selle tunni jooksul saadetud. Palun proovi järgmine tund uuesti.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Sa pead detailid sisestama järgnevatesse lahtritesse';
$MESSAGE['PAGES_ADDED'] = 'Lehekülg edukalt lisatud';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Lehekülje päis edukalt lisatud';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Sisesta menüü pealkiri';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Sisesta lehekülje pealkiri';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Viga faili tekitamisel kausta /pages kataloog';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Viga faili kustutamisel kaustast /pages kataloog';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Viga lehekülje taaskorrastamisel';
$MESSAGE['PAGES_DELETED'] = 'Lehekülg edukalt kustutatud';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Oled sa kindel et tahad seda lehekülge kustutada (ja kõiki selle alamlehti ka)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Sul pole selle lehekülje muutmiseks õigusi';
$MESSAGE['PAGES_INTRO_LINK'] = 'Vajuta siia et muta intro lehekülge';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Ei saa kirjutada faili /pages/intro.php';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Intro lehekülg edukalt salvestatud';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Vimane muudatus';
$MESSAGE['PAGES_NOT_FOUND'] = 'Lehekülge ei leitud';
$MESSAGE['PAGES_NOT_SAVED'] = 'Viga lehekülje salvestamisel';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Lehekülg sama või sarnase pealkirjaga eksisteerib';
$MESSAGE['PAGES_REORDERED'] = 'Lehekülje taaskorrastamine õnnestus';
$MESSAGE['PAGES_RESTORED'] = 'Lehekülg edukalt taastatud';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Naase lehekülgedele';
$MESSAGE['PAGES_SAVED'] = 'Lehekülg edukalt salvestatud';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Lehekülje seaded edukalt salvestatud';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Sektsiooni atribuudud edukalt salvestatud';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Pragune parool mida sa sisestasid on vigane';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detailid edukalt salvestatud';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email edukalt uuendatud';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Parool edukalt muudetud';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Märge: Selle nupu vajutamine algseadistab kõik salvestamata failid';
$MESSAGE['SETTINGS_SAVED'] = 'Seaded edukalt salvestatud';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Võimetu avama konfiguratsioonifaili';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Ei saa kirjutada konfiguratsioonifaili';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Märge: see on vajalik ainult ümbruse testimiseks';
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
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Sa pead sisestama emaili aadressi';
$MESSAGE['START_CURRENT_USER'] = 'Sa oled praegu sisse logitud:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Hoiatus, Installatsiooni kataloog eksisteerib!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Teretulemast WebsiteBaker Administratsiooni';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Märge: kujunduse muutmiseks sa pead minema Seadete sektsiooni';
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
$MESSAGE['USERS_ADDED'] = 'Kasutaja edukalt lisatud';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Märge: Sa pead ainult sisestama põhimõtted alumistesse lahtritesse kui sa tahad muuta selle kasutaja parooli';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Kas sa oled kindel et tahad seda kasutajat kustutada?';
$MESSAGE['USERS_DELETED'] = 'Kasutaja edukalt kustutatud';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Sisestatud e-mail on juba kasutusel';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Sisestatud emaili aadress on vigane';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Grupp selekteerimata';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Sisestatud paroolid ei kattu';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Sisestatud parool on liiga lühike';
$MESSAGE['USERS_SAVED'] = 'Kasutaja edukalt salvestatud';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';
$OVERVIEW['GROUPS'] = 'Halda kasutajate gruppe ja nende õiguseid...';
$OVERVIEW['HELP'] = 'On küsimusi? Leia oma vastus...';
$OVERVIEW['LANGUAGES'] = 'Halda WebsiteBakeri keeli...';
$OVERVIEW['MEDIA'] = 'Halda faile mis on media kaustas...';
$OVERVIEW['MODULES'] = 'Halda WebsiteBakeri mooduleid...';
$OVERVIEW['PAGES'] = 'Halda oma veebisaidi lehekülgi...';
$OVERVIEW['PREFERENCES'] = 'Muuda eelistusi nagu emaili aadress, parool, jne... ';
$OVERVIEW['SETTINGS'] = 'Muuda seadeid WebsiteBakeri jaoks...';
$OVERVIEW['START'] = 'Administratsiooni ülevaade';
$OVERVIEW['TEMPLATES'] = 'Change the look and feel of your website with templates...';
$OVERVIEW['USERS'] = 'Halda kasutajaid kes saavad logida WebsiteBakerisse...';
$OVERVIEW['VIEW'] = 'Kiirelt vaata ja lehitse oma veebisaiti uues aknas...';
