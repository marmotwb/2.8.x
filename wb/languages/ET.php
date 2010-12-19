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
$language_code = 'ET';
$language_name = 'Eesti';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Heiko H&auml;ng';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Start';
$MENU['PAGES'] = 'Lehed';
$MENU['MEDIA'] = 'Meedia';
$MENU['ADDONS'] = 'Lisad';
$MENU['MODULES'] = 'Moodulid';
$MENU['TEMPLATES'] = 'Kujundused';
$MENU['LANGUAGES'] = 'Keeled';
$MENU['PREFERENCES'] = 'Valikud';
$MENU['SETTINGS'] = 'Seaded';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['ACCESS'] = 'Ligip&auml;&auml;s';
$MENU['USERS'] = 'Kasutajad';
$MENU['GROUPS'] = 'Grupid';
$MENU['HELP'] = 'Abi';
$MENU['VIEW'] = 'Vaata';
$MENU['LOGOUT'] = 'Logi V&auml;lja';
$MENU['LOGIN'] = 'Logi Sisse';
$MENU['FORGOT'] = 'Retrieve Login Details';

// Section overviews
$OVERVIEW['START'] = 'Administratsiooni &uuml;levaade';
$OVERVIEW['PAGES'] = 'Halda oma veebisaidi lehek&uuml;lgi...';
$OVERVIEW['MEDIA'] = 'Halda faile mis on media kaustas...';
$OVERVIEW['MODULES'] = 'Halda WebsiteBakeri mooduleid...';
$OVERVIEW['TEMPLATES'] = 'Change the look and feel of your website with templates...';
$OVERVIEW['LANGUAGES'] = 'Halda WebsiteBakeri keeli...';
$OVERVIEW['PREFERENCES'] = 'Muuda eelistusi nagu emaili aadress, parool, jne... ';
$OVERVIEW['SETTINGS'] = 'Muuda seadeid WebsiteBakeri jaoks...';
$OVERVIEW['USERS'] = 'Halda kasutajaid kes saavad logida WebsiteBakerisse...';
$OVERVIEW['GROUPS'] = 'Halda kasutajate gruppe ja nende &otilde;iguseid...';
$OVERVIEW['HELP'] = 'On k&uuml;simusi? Leia oma vastus...';
$OVERVIEW['VIEW'] = 'Kiirelt vaata ja lehitse oma veebisaiti uues aknas...';
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Muuda/Kustuta Leht';
$HEADING['DELETED_PAGES'] = 'Kustutatud Lehed';
$HEADING['ADD_PAGE'] = 'Lisa Leht';
$HEADING['ADD_HEADING'] = 'Add Heading';
$HEADING['MODIFY_PAGE'] = 'Muuda Lehte';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Muuda Lehe Seadeid';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Muuda Arenenud Lehe Seadeid';
$HEADING['MANAGE_SECTIONS'] = 'Muuda Sektsioone';
$HEADING['MODIFY_INTRO_PAGE'] = 'Muuda Intro Lehte';

$HEADING['BROWSE_MEDIA'] = 'Sirvi Meediat';
$HEADING['CREATE_FOLDER'] = 'Loo Kaust';
$HEADING['UPLOAD_FILES'] = 'Saada Fail(id)';

$HEADING['INSTALL_MODULE'] = 'Paigalda Moodul';
$HEADING['UNINSTALL_MODULE'] = 'Eemalda Moodul';
$HEADING['MODULE_DETAILS'] = 'Mooduli Detailid';

$HEADING['INSTALL_TEMPLATE'] = 'Paigalda Kujundus';
$HEADING['UNINSTALL_TEMPLATE'] = 'Eemalda Kujundus';
$HEADING['TEMPLATE_DETAILS'] = 'Kujunduse Detailid';

$HEADING['INSTALL_LANGUAGE'] = 'Paigalda Keel';
$HEADING['UNINSTALL_LANGUAGE'] = 'Eemalda Keel';
$HEADING['LANGUAGE_DETAILS'] = 'Keele Detailid';

$HEADING['MY_SETTINGS'] = 'Minu Seaded';
$HEADING['MY_EMAIL'] = 'Minu Email';
$HEADING['MY_PASSWORD'] = 'Minu Parool';

$HEADING['GENERAL_SETTINGS'] = '&Uuml;ldised Seaded';
$HEADING['DEFAULT_SETTINGS'] = 'Vaikimisi Seaded';
$HEADING['SEARCH_SETTINGS'] = 'Otsingu Seaded';
$HEADING['FILESYSTEM_SETTINGS'] = 'Failis&uuml;steemi Seaded';
$HEADING['SERVER_SETTINGS'] = 'Server Settings';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Tools';

$HEADING['MODIFY_DELETE_USER'] = 'Muuda/Kustuta Kasutaja';
$HEADING['ADD_USER'] = 'Lisa Kasutaja';
$HEADING['MODIFY_USER'] = 'Muuda Kasutajat';

$HEADING['MODIFY_DELETE_GROUP'] = 'Muuda/Kustuta Grupp';
$HEADING['ADD_GROUP'] = 'Lisa Grupp';
$HEADING['MODIFY_GROUP'] = 'Muuda Gruppi';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';

// Other text
$TEXT['OPEN'] = 'Open';
$TEXT['ADD'] = 'Lisa';
$TEXT['MODIFY'] = 'Muuda';
$TEXT['SETTINGS'] = 'Seaded';
$TEXT['DELETE'] = 'Kustuta';
$TEXT['SAVE'] = 'Salvesta';
$TEXT['RESET'] = 'Tagasta';
$TEXT['LOGIN'] = 'Logi Sisse';
$TEXT['RELOAD'] = 'Lae Uuesti';
$TEXT['CANCEL'] = 'Katkesta';
$TEXT['NAME'] = 'Nimi';
$TEXT['PLEASE_SELECT'] = 'Palun vali';
$TEXT['TITLE'] = 'Pealkiri';
$TEXT['PARENT'] = 'Vanem';
$TEXT['TYPE'] = 'T&uuml;&uuml;p';
$TEXT['VISIBILITY'] = 'N&auml;htavus';
$TEXT['PRIVATE'] = 'Privaatne';
$TEXT['PUBLIC'] = 'Avalik';
$TEXT['NONE'] = 'Mitte &Uuml;kski';
$TEXT['NONE_FOUND'] = 'Ei Leitud';
$TEXT['CURRENT'] = 'Praegune';
$TEXT['CHANGE'] = 'Muuda';
$TEXT['WINDOW'] = 'Aken';
$TEXT['DESCRIPTION'] = 'Kirjeldus';
$TEXT['KEYWORDS'] = 'M&auml;rks&otilde;nad';
$TEXT['ADMINISTRATORS'] = 'Administraatorid';
$TEXT['PRIVATE_VIEWERS'] = 'Privaatsed Vaatajad';
$TEXT['EXPAND'] = 'Laienda';
$TEXT['COLLAPSE'] = 'Kollaps';
$TEXT['MOVE_UP'] = 'Liigu &Uuml;lesse';
$TEXT['MOVE_DOWN'] = 'Liigu Alla';
$TEXT['RENAME'] = 'Nimeta &Uuml;mber';
$TEXT['MODIFY_SETTINGS'] = 'Muuda Seadeid';
$TEXT['MODIFY_CONTENT'] = 'Muuda Sisu';
$TEXT['VIEW'] = 'Vaata';
$TEXT['UP'] = '&Uuml;lesse';
$TEXT['FORGOTTEN_DETAILS'] = 'Unustasid oma detailid?';
$TEXT['NEED_TO_LOGIN'] = 'Vajad sisselogimist?';
$TEXT['SEND_DETAILS'] = 'Saada detailid';
$TEXT['USERNAME'] = 'Kasutajanimi';
$TEXT['PASSWORD'] = 'Parool';
$TEXT['HOME'] = 'Kodu';
$TEXT['TARGET_FOLDER'] = 'Siht kaust';
$TEXT['OVERWRITE_EXISTING'] = 'Kirjuta olemasolev &uuml;le';
$TEXT['FILE'] = 'Fail';
$TEXT['FILES'] = 'Failid';
$TEXT['FOLDER'] = 'Kaust';
$TEXT['FOLDERS'] = 'Kaustad';
$TEXT['CREATE_FOLDER'] = 'Loo Kaust';
$TEXT['UPLOAD_FILES'] = 'Saada Fail(id)';
$TEXT['CURRENT_FOLDER'] = 'Praegune Kaust';
$TEXT['TO'] = 'Kellele';
$TEXT['FROM'] = 'Kellelt';
$TEXT['INSTALL'] = 'Paigalda';
$TEXT['UNINSTALL'] = 'Eemalda';
$TEXT['VIEW_DETAILS'] = 'Vaata Detaile';
$TEXT['DISPLAY_NAME'] = 'Vaate Nimi';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['VERSION'] = 'Versioon';
$TEXT['DESIGNED_FOR'] = 'Kavandatud';
$TEXT['DESCRIPTION'] = 'Kirjeldus';
$TEXT['EMAIL'] = 'Email';
$TEXT['LANGUAGE'] = 'Keel';
$TEXT['TIMEZONE'] = 'Ajatsoon';
$TEXT['CURRENT_PASSWORD'] = 'Praegune Parool';
$TEXT['NEW_PASSWORD'] = 'Uus Parool';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Korda Uut Parooli';
$TEXT['ACTIVE'] = 'Aktiivne';
$TEXT['DISABLED'] = 'Blokeeritud';
$TEXT['ENABLED'] = 'Lubatud';
$TEXT['RETYPE_PASSWORD'] = 'Korda Parooli';
$TEXT['GROUP'] = 'Grupp';
$TEXT['SYSTEM_PERMISSIONS'] = 'S&uuml;steemi &Otilde;igused';
$TEXT['MODULE_PERMISSIONS'] = 'Mooduli &Otilde;igused';
$TEXT['SHOW_ADVANCED'] = 'N&auml;ita Arenenud Valikuid';
$TEXT['HIDE_ADVANCED'] = 'Peida Arenenud Valikud';
$TEXT['BASIC'] = 'Alus';
$TEXT['ADVANCED'] = 'Arenenud';
$TEXT['WEBSITE'] = 'Veebisait';
$TEXT['DEFAULT'] = 'Vaikimisi';
$TEXT['KEYWORDS'] = 'M&auml;rks&otilde;nad';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'P&auml;is';
$TEXT['FOOTER'] = 'Jalus';
$TEXT['TEMPLATE'] = 'Kujundus';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['INSTALLATION'] = 'Installatsioon';
$TEXT['DATABASE'] = 'Andmebaas';
$TEXT['HOST'] = 'Hostia';
$TEXT['INTRO'] = 'Intro';
$TEXT['PAGE'] = 'Lehek&uuml;lg';
$TEXT['SIGNUP'] = 'Registreeri';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Vea Esitamise Tase';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = 'Rada';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Frondi-l&otilde;pp';
$TEXT['EXTENSION'] = 'Ulatus';
$TEXT['TABLE_PREFIX'] = 'Tabelite Prefiks';
$TEXT['CHANGES'] = 'Muudatused';
$TEXT['ADMINISTRATION'] = 'Administratsioon';
$TEXT['FORGOT_DETAILS'] = 'Unustasid Andmed?';
$TEXT['LOGGED_IN'] = 'Sisse Logitud';
$TEXT['WELCOME_BACK'] = 'Teretulemast tagasi';
$TEXT['FULL_NAME'] = 'T&auml;isnimi';
$TEXT['ACCOUNT_SIGNUP'] = 'Registreerimine';
$TEXT['LINK'] = 'Link';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['TARGET'] = 'Sihtm&auml;rk';
$TEXT['NEW_WINDOW'] = 'Uus Aken';
$TEXT['SAME_WINDOW'] = 'Sama Aken';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lehek&uuml;lje Taseme Limiit';
$TEXT['SUCCESS'] = 'Edu';
$TEXT['ERROR'] = 'Viga';
$TEXT['ARE_YOU_SURE'] = 'Oled sa kindel?';
$TEXT['YES'] = 'Jah';
$TEXT['NO'] = 'Ei';
$TEXT['SYSTEM_DEFAULT'] = 'S&uuml;steemi Vaikimisi Valik';
$TEXT['PAGE_TITLE'] = 'Lehek&uuml;lje Pealkiri';
$TEXT['MENU_TITLE'] = 'Men&uuml;&uuml; Pealkiri';
$TEXT['ACTIONS'] = 'Actions';
$TEXT['UNKNOWN'] = 'Teadmata';
$TEXT['BLOCK'] = 'Blokeeri';
$TEXT['SEARCH'] = 'Otsi';
$TEXT['SEARCHING'] = 'Otsib';
$TEXT['POST'] = 'Post';
$TEXT['COMMENT'] = 'Kommentaar';
$TEXT['COMMENTS'] = 'Kommentaarid';
$TEXT['COMMENTING'] = 'Kommenteerimine';
$TEXT['SHORT'] = 'L&uuml;hike';
$TEXT['LONG'] = 'Pikk';
$TEXT['LOOP'] = 'Ts&uuml;kkel';
$TEXT['FIELD'] = 'V&auml;li';
$TEXT['REQUIRED'] = 'Required';
$TEXT['LENGTH'] = 'Pikkus';
$TEXT['MESSAGE'] = 'Teade';
$TEXT['SUBJECT'] = 'Pealkiri';
$TEXT['MATCH'] = 'Sobima';
$TEXT['ALL_WORDS'] = 'K&otilde;ik S&otilde;nad';
$TEXT['ANY_WORDS'] = 'Mistages S&otilde;nad';
$TEXT['EXACT_MATCH'] = 'T&auml;pne Sobivus';
$TEXT['SHOW'] = 'N&auml;ita';
$TEXT['HIDE'] = 'Peida';
$TEXT['START_PUBLISHING'] = 'Alusta Avaldamist';
$TEXT['FINISH_PUBLISHING'] = 'L&otilde;peta Avaldamine';
$TEXT['DATE'] = 'Kuup&auml;ev';
$TEXT['START'] = 'Alusta';
$TEXT['END'] = 'L&otilde;pp';
$TEXT['IMAGE'] = 'Pilt';
$TEXT['ICON'] = 'Ikoon';
$TEXT['SECTION'] = 'Sektsioon';
$TEXT['DATE_FORMAT'] = 'Kuup&auml;eva Formaat';
$TEXT['TIME_FORMAT'] = 'Aja Formaat';
$TEXT['RESULTS'] = 'Tulemused';
$TEXT['RESIZE'] = 'Re-size';
$TEXT['MANAGE'] = 'Halda';
$TEXT['CODE'] = 'Kood';
$TEXT['WIDTH'] = 'Laius';
$TEXT['HEIGHT'] = 'K&otilde;rgus';
$TEXT['MORE'] = 'Rohkem';
$TEXT['READ_MORE'] = 'Loe Rohkem';
$TEXT['CHANGE_SETTINGS'] = 'Muuda Seadeid';
$TEXT['CURRENT_PAGE'] = 'Praegune Lehek&uuml;lg';
$TEXT['CLOSE'] = 'Sulge';
$TEXT['INTRO_PAGE'] = 'Intro Lehek&uuml;lg';
$TEXT['INSTALLATION_URL'] = 'Installatsiooni URL';
$TEXT['INSTALLATION_PATH'] = 'Installatsiooni Rada';
$TEXT['PAGE_EXTENSION'] = 'Lehek&uuml;lje Ulatus';
$TEXT['NO_RESULTS'] = 'Tulemusi Ei Ole';
$TEXT['WEBSITE_TITLE'] = 'Veebisaidi Pealkiri';
$TEXT['WEBSITE_DESCRIPTION'] = 'Veebisaidi Kirjeldus';
$TEXT['WEBSITE_KEYWORDS'] = 'Veebisaidi M&auml;rks&otilde;nad';
$TEXT['WEBSITE_HEADER'] = 'Veebisaidi P&auml;is';
$TEXT['WEBSITE_FOOTER'] = 'Veebisaidi Jalus';
$TEXT['RESULTS_HEADER'] = 'Tulemuste P&auml;is';
$TEXT['RESULTS_LOOP'] = 'Tulemuste Ts&uuml;kkel';
$TEXT['RESULTS_FOOTER'] = 'Tulemuste Jalus';
$TEXT['LEVEL'] = 'Tase';
$TEXT['NOT_FOUND'] = 'Ei Leitud';
$TEXT['PAGE_SPACER'] = 'Lehek&uuml;lje Vahepuks';
$TEXT['MATCHING'] = 'Sobiv';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Kujunduse &Otilde;igused';
$TEXT['PAGES_DIRECTORY'] = 'Lehek&uuml;lgede Kataloog';
$TEXT['MEDIA_DIRECTORY'] = 'Meedia Kataloog';
$TEXT['FILE_MODE'] = 'Faili T&ouml;&ouml;reziim';
$TEXT['USER'] = 'Kasutaja';
$TEXT['OTHERS'] = 'Teise';
$TEXT['READ'] = 'Loe';
$TEXT['WRITE'] = 'Kirjuta';
$TEXT['EXECUTE'] = 'T&auml;ida';
$TEXT['SMART_LOGIN'] = 'Nutikas Sisselogimine';
$TEXT['REMEMBER_ME'] = 'Pea Mind Meeles';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Failis&uuml;steemi &Otilde;igused';
$TEXT['DIRECTORIES'] = 'Kataloogid';
$TEXT['DIRECTORY_MODE'] = 'Kataloogi T&ouml;&ouml;reziim';
$TEXT['LIST_OPTIONS'] = 'Nimekirja Valikud';
$TEXT['OPTION'] = 'Valikud';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Luba Arvukad Valikud';
$TEXT['TEXTFIELD'] = 'Tekstilahter';
$TEXT['TEXTAREA'] = 'Tekstikast';
$TEXT['SELECT_BOX'] = 'Selekteeri Kast';
$TEXT['CHECKBOX_GROUP'] = 'M&auml;rkeruut Grupp';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Nupu Grupp';
$TEXT['SIZE'] = 'Suurus';
$TEXT['DEFAULT_TEXT'] = 'Vaikimisi Tekst';
$TEXT['SEPERATOR'] = 'Seperator';
$TEXT['BACK'] = 'Tagasi';
$TEXT['UNDER_CONSTRUCTION'] = 'Ehitamisel';
$TEXT['MULTISELECT'] = 'Multi-valik';
$TEXT['SHORT_TEXT'] = 'L&uuml;hike Tekst';
$TEXT['LONG_TEXT'] = 'Pikk Tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Kodulehe &Uuml;mbersuunamine';
$TEXT['HEADING'] = 'P&auml;is';
$TEXT['MULTIPLE_MENUS'] = 'Arvukas Men&uuml;&uuml;\'s';
$TEXT['REGISTERED'] = 'Registreeritud';
$TEXT['SECTION_BLOCKS'] = 'Sektsiooni Blokid';
$TEXT['REGISTERED_VIEWERS'] = 'Registered Viewers';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers';
$TEXT['SUBMISSION_ID'] = 'Kaast&ouml;&ouml; ID';
$TEXT['SUBMISSIONS'] = 'Kaast&ouml;&ouml;d';
$TEXT['SUBMITTED'] = 'Saadetud';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Kaast&ouml;id Tunnis';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Kaast&ouml;&ouml;d Salvestatud Andmebaasi';
$TEXT['EMAIL_ADDRESS'] = 'Emaili Aadress';
$TEXT['CUSTOM'] = 'Tava';
$TEXT['ANONYMOUS'] = 'Anon&uuml;&uuml;mne';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serveri Operatsioonis&uuml;steem';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable file permissions';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix tuginev';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Kodu Kaust';
$TEXT['HOME_FOLDERS'] = 'Kodu Kaustad';
$TEXT['PAGE_TRASH'] = 'Lehek&uuml;lje Pr&uuml;gi';
$TEXT['INLINE'] = 'Rivis';
$TEXT['SEPARATE'] = 'Eralduma';
$TEXT['DELETED'] = 'Kustutatud';
$TEXT['VIEW_DELETED_PAGES'] = 'Vaata Kustutatud Lehek&uuml;lgi';
$TEXT['EMPTY_TRASH'] = 'T&uuml;hi Pr&uuml;gikast';
$TEXT['TRASH_EMPTIED'] = 'Pr&uuml;gikast T&uuml;hjendatud';
$TEXT['ADD_SECTION'] = 'Lisa Sektsioon';
$TEXT['POST_HEADER'] = 'Posti P&auml;is';
$TEXT['POST_FOOTER'] = 'Posti Jalus';
$TEXT['POSTS_PER_PAGE'] = 'Postitusi Lehele';
$TEXT['RESIZE_IMAGE_TO'] = 'Resize Image To';
$TEXT['UNLIMITED'] = 'Piiramatu';
$TEXT['OF'] = 'Of';
$TEXT['OUT_OF'] = 'Out Of';
$TEXT['NEXT'] = 'J&auml;rgmine';
$TEXT['PREVIOUS'] = 'Eelmine';
$TEXT['NEXT_PAGE'] = 'J&auml;rgmine Lehek&uuml;lg';
$TEXT['PREVIOUS_PAGE'] = 'Eelmine lehek&uuml;lg';
$TEXT['ON'] = 'Edasi';
$TEXT['LAST_UPDATED_BY'] = 'Viimati Uuendatud';
$TEXT['RESULTS_FOR'] = 'Tulemused';
$TEXT['TIME'] = 'Aeg';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stiil';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['SERVER_EMAIL'] = 'Serveri Email';
$TEXT['MENU'] = 'Men&uuml;&uuml;';
$TEXT['MANAGE_GROUPS'] = 'Halda Gruppe';
$TEXT['MANAGE_USERS'] = 'Halda Kasutajaid';
$TEXT['PAGE_LANGUAGES'] = 'Lehek&uuml;lje Keeled';
$TEXT['HIDDEN'] = 'Varjatud';
$TEXT['MAIN'] = 'Peamine';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Rename Files On Upload';
$TEXT['APP_NAME'] = 'Application Name';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['BACKUP'] = 'Backup';
$TEXT['RESTORE'] = 'Restore';
$TEXT['BACKUP_DATABASE'] = 'Backup Database';
$TEXT['RESTORE_DATABASE'] = 'Restore Database';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables';
$TEXT['BACKUP_MEDIA'] = 'Backup Media';
$TEXT['RESTORE_MEDIA'] = 'Restore Media';
$TEXT['ADMINISTRATION_TOOL'] = 'Administration tool';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Verification';
$TEXT['VERIFICATION'] = 'Verification';
$TEXT['DEFAULT_CHARSET'] = 'Default Charset';
$TEXT['CHARSET'] = 'Charset';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Please specify a default "FROM" address and "SENDER" name below. It is recommended to use a FROM address like: <strong>admin@yourdomain.com</strong>. Some mail provider (e.g. <em>mail.com</em>) may reject mails with a FROM: address like <em>name@mail.com</em> sent via a foreign relay to avoid spam.<br /><br />The default values are only used if no other values are specified by WebsiteBaker. If your server supports <acronym title="Simple mail transfer protocol">SMTP</acronym>, you may want use this option for outgoing mails.';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Default From Mail';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Default Sender Name';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Settings:</strong><br />The settings below are only required if you want to send mails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. If you do not know your SMTP host or you are not sure about the required settings, simply stay with the default mail routine: PHP MAIL.';
$TEXT['WBMAILER_FUNCTION'] = 'Mail Routine';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Authentification';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'only activate if your SMTP host requires authentification';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Username';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Password';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['CODE_SNIPPET'] = "Code-snippet";
$TEXT['REQUIREMENT'] = "Requirement";
$TEXT['INSTALLED'] = "installed";
$TEXT['NOT_INSTALLED'] = "not installed";
$TEXT['ADDON'] = "Add-On";
$TEXT['EXTENSION'] = "Extension";
$TEXT['UNZIP_FILE'] = "Upload and unpack a zip archive";
$TEXT['DELETE_ZIP'] = "Delete zip archive after unpacking";
$TEXT['NEED_CURRENT_PASSWORD'] ='confirm with current password';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';

// Success/error messages
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Vabandame, sul ei ole &otilde;igusi selle lehe vaatamiseks';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Insufficient privelliges to be here';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Palun sisesta oma kasutajanimi ja parool allapoole';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Palun sisesta kasutajanimi';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Palun sisesta parool';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Sisestatud kasutajanimi on liiga l&uuml;hike';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Sisestatud parool on liiga l&uuml;hike';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Sisestatud kasutajanimi on liiga pikk';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Sisestatud parool on liiga pikk';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Kasutajanimi v&otilde;i parool on vigane';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'Sa pead sisestama emaili aadressi';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Your login details...';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Palun sisesta oma emaili aadress allapoole';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Sisestatud emaili eileitud andmebaasist';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'V&otilde;imetu emailima parooli, palun kontakteeru s&uuml;steemi administraatoriga';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Sinukasutajanimi ja parool on saadetud su emaili aadressile';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Parooliei saa taastada rohkem kui &uuml;ks kord tunnis, vabandame';

$MESSAGE['START_WELCOME_MESSAGE'] = 'Teretulemast WebsiteBaker Administratsiooni';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Hoiatus, Installatsiooni kataloog eksisteerib!';
$MESSAGE['START_CURRENT_USER'] = 'Sa oled praegu sisse logitud:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'V&otilde;imetu avama konfiguratsioonifaili';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Ei saa kirjutada konfiguratsioonifaili';
$MESSAGE['SETTINGS_SAVED'] = 'Seaded edukalt salvestatud';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'M&auml;rge: Selle nupu vajutamine algseadistab k&otilde;ik salvestamata failid';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'M&auml;rge: see on vajalik ainult &uuml;mbruse testimiseks';

$MESSAGE['USERS_ADDED'] = 'Kasutaja edukalt lisatud';
$MESSAGE['USERS_SAVED'] = 'Kasutaja edukalt salvestatud';
$MESSAGE['USERS_DELETED'] = 'Kasutaja edukalt kustutatud';
$MESSAGE['USERS_NO_GROUP'] = 'Grupp selekteerimata';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Sisestatud kasutajanimi on liiga l&uuml;hike';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Sisestatud parool on liiga l&uuml;hike';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Sisestatud paroolid ei kattu';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Sisestatud emaili aadress on vigane';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Sisestatud e-mail on juba kasutusel';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Sisestatud kasutajanimi on jubakasutusel';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'M&auml;rge: Sa pead ainult sisestama p&otilde;him&otilde;tted alumistesse lahtritesse kui sa tahad muuta selle kasutaja parooli';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Kas sa oled kindel et tahad seda kasutajat kustutada?';

$MESSAGE['GROUPS_ADDED'] = 'Grupp edukalt lisatud';
$MESSAGE['GROUPS_SAVED'] = 'Grupp edukalt salvestatud';
$MESSAGE['GROUPS_DELETED'] = 'Grupp edukalt kustutatud';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Grupi nimi on t&uuml;hi';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Oled sa kindel et tahad seda gruppi kustutada (ja k&otilde;ik kasutajad mis kuuluvad selle alla)?';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Gruppe ei leitud';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Group name already exists';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detailid edukalt salvestatud';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email edukalt uuendatud';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Pragune parool mida sa sisestasid on vigane';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Parool edukalt muudetud';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'M&auml;rge: kujunduse muutmiseks sa pead minema Seadete sektsiooni';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Ei saa sisaldada ../ kausta nimes';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Directory does not exist';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Ei saa sisaldada ../ nimes';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Ei saa kasutada index.php nimena';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Meediat ei leitud praeguses kataloogis';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Faili ei leitud';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Fail edukalt kustutatud';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Kaust edukalt kustutatud';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Oled sa kindel et tahad kustutada j&auml;rgnevat faili v&otilde;i kausta?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Ei saa selekteeritud faili kustutada';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Ei saa selekteeritud kausta kustutada';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Sa ei sisestanud uut nime';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Sa ei sisestanud faili ulatust';
$MESSAGE['MEDIA_RENAMED'] = 'Edukalt &uuml;mber nimetatud';
$MESSAGE['MEDIA_CANNOT_RENAME'] = '&Uuml;mbernimetamine eba&otilde;nnestus';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Sisestatud faili nimi eksisteerib';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Sisestatud kausta nimi eksisteerib';
$MESSAGE['MEDIA_DIR_MADE'] = 'Kaust edukalt loodud';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'V&otilde;imetu looma kausta';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' fail edukalt &uuml;les laetud';
$MESSAGE['MEDIA_UPLOADED'] = ' failid edukalt &uuml;les laetud';

$MESSAGE['PAGES_ADDED'] = 'Lehek&uuml;lg edukalt lisatud';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Lehek&uuml;lje p&auml;is edukalt lisatud';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Lehek&uuml;lg sama v&otilde;i sarnase pealkirjaga eksisteerib';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Viga faili tekitamisel kausta /pages kataloog';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Viga faili kustutamisel kaustast /pages kataloog';
$MESSAGE['PAGES_NOT_FOUND'] = 'Lehek&uuml;lge ei leitud';
$MESSAGE['PAGES_SAVED'] = 'Lehek&uuml;lg edukalt salvestatud';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Lehek&uuml;lje seaded edukalt salvestatud';
$MESSAGE['PAGES_NOT_SAVED'] = 'Viga lehek&uuml;lje salvestamisel';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Oled sa kindel et tahad seda lehek&uuml;lge kustutada (ja k&otilde;iki selle alamlehti ka)';
$MESSAGE['PAGES_DELETED'] = 'Lehek&uuml;lg edukalt kustutatud';
$MESSAGE['PAGES_RESTORED'] = 'Lehek&uuml;lg edukalt taastatud';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Sisesta lehek&uuml;lje pealkiri';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Sisesta men&uuml;&uuml; pealkiri';
$MESSAGE['PAGES_REORDERED'] = 'Lehek&uuml;lje taaskorrastamine &otilde;nnestus';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Viga lehek&uuml;lje taaskorrastamisel';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Sul pole selle lehek&uuml;lje muutmiseks &otilde;igusi';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Ei saa kirjutada faili /pages/intro.php';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Intro lehek&uuml;lg edukalt salvestatud';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Vimane muudatus';
$MESSAGE['PAGES_INTRO_LINK'] = 'Vajuta siia et muta intro lehek&uuml;lge';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Sektsiooni atribuudud edukalt salvestatud';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Naase lehek&uuml;lgedele';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Palun mine tagasi ja t&auml;ida k&otilde;ik v&auml;ljad';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Pea meeles et &uuml;les laetav fail peab olema j&auml;rgmistes formaatides:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Pea meeles et &uuml;les laetavad failid peavad olema j&auml;rgmistes formaatides:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Ei saa faili &uuml;les laadida';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Juba paigaldatud';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Ei ole paigaldatud';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Cannot uninstall';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Ei saa faili lahti pakkida';
$MESSAGE['GENERIC_INSTALLED'] = 'Edukalt paigaldatud';
$MESSAGE['GENERIC_UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Edukalt eemaldatud';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'V&otilde;imetu kirjutama siht kataloogi';
$MESSAGE['GENERIC_INVALID'] = '&Uuml;les laetud fail on vigane';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Ei saa eemaldada: selekteeritud fail on kasutuses';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = "<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = "this page;these pages";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "Can't uninstall the template <b>{{name}}</b>, because it is the default template!";

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website Under Construction';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'K&uuml;lasta hiljem uuesti...';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Error opening file.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Sa pead detailid sisestama j&auml;rgnevatesse lahtritesse';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Vabandame, see vorm on juba liiga palju kordi selle tunni jooksul saadetud. Palun proovi j&auml;rgmine tund uuesti.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL.'';

$MESSAGE['ADDON_RELOAD'] = 'Update database with information from Add-on files (e.g. after FTP upload).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Error while updating the Add-On information.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Modules reloaded successfully';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Templates reloaded successfully';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Languages reloaded successfully';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Add-on installation failed. Your system does not fulfill the requirements of this Add-on. To make this Add-on working on your system, please fix the issues summarized below.';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'When modules are uploaded via FTP (not recommended), the module installation files <tt>install.php</tt>, <tt>upgrade.php</tt> or <tt>uninstall.php</tt> will not be executed automatically. Those modules may not work correct or do not uninstall properly.<br /><br />You can execute the module files manually for modules uploaded via FTP below.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Warning: Existing module database entries will get lost. Only use this option if you experience problems with modules uploaded via FTP.';

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