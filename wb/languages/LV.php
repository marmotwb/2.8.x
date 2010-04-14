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
$language_code = 'LV';
$language_name = 'Latvie&scaron;u';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Kri&scaron;janis Rijnieks';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Sakums';
$MENU['PAGES'] = 'Lapas';
$MENU['MEDIA'] = 'Mediji';
$MENU['ADDONS'] = 'Papildinajumi';
$MENU['MODULES'] = 'Moduli';
$MENU['TEMPLATES'] = '&scaron;abloni';
$MENU['LANGUAGES'] = 'Valodas';
$MENU['PREFERENCES'] = 'Preferences';
$MENU['SETTINGS'] = 'Iestatijumi';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['ACCESS'] = 'Piekluve';
$MENU['USERS'] = 'Lietotaji';
$MENU['GROUPS'] = 'Grupas';
$MENU['HELP'] = 'Palidziba';
$MENU['VIEW'] = 'Apskatit';
$MENU['LOGOUT'] = 'Izlogoties';
$MENU['LOGIN'] = 'Ielogoties';
$MENU['FORGOT'] = 'Informacija par kontu';

// Section overviews
$OVERVIEW['START'] = 'Administracijas parskats';
$OVERVIEW['PAGES'] = 'Mened&#382;et lapas...';
$OVERVIEW['MEDIA'] = 'Mened&#382;et failus iek&scaron; media mapes...';
$OVERVIEW['MODULES'] = 'Mened&#382;et WebsiteBaker modulus...';
$OVERVIEW['TEMPLATES'] = 'Mened&#382;et &scaron;ablonus...';
$OVERVIEW['LANGUAGES'] = 'Mened&#382;et WebsiteBaker valodas...';
$OVERVIEW['PREFERENCES'] = 'Mainit preferences - e-pasta adresi, paroli, utt...';
$OVERVIEW['SETTINGS'] = 'Mainit WebsiteBaker iestatijumus...';
$OVERVIEW['USERS'] = 'Mened&#382;et lietotajus, kas var ielogties WebsiteBaker sistema...';
$OVERVIEW['GROUPS'] = 'Mened&#382;et lietotaju grupas un noteikt to atlaujas...';
$OVERVIEW['HELP'] = 'Jautajumi? Atrodi atbildi...';
$OVERVIEW['VIEW'] = 'Apskatit majas lapu jauna loga...';
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Mainit/Izdzest lapu';
$HEADING['DELETED_PAGES'] = 'Izdzestas lapas';
$HEADING['ADD_PAGE'] = 'Pievienot lapu';
$HEADING['ADD_HEADING'] = 'Pievienot virsrakstu';
$HEADING['MODIFY_PAGE'] = 'Mainit lapu';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Mainit lapas iestatijumus';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Mainit papla&scaron;inatos lapas iestatijumus';
$HEADING['MANAGE_SECTIONS'] = 'Mened&#382;et sadalas';
$HEADING['MODIFY_INTRO_PAGE'] = 'Mainit pirmo lapu';

$HEADING['BROWSE_MEDIA'] = 'Parlukot medijus';
$HEADING['CREATE_FOLDER'] = 'Izveidot mapi';
$HEADING['UPLOAD_FILES'] = 'Aug&scaron;upieladet datni(-es)';

$HEADING['INSTALL_MODULE'] = 'Instalet moduli';
$HEADING['UNINSTALL_MODULE'] = 'Atinstalet moduli';
$HEADING['MODULE_DETAILS'] = 'Informacija par moduli';

$HEADING['INSTALL_TEMPLATE'] = 'Instalet &scaron;ablonu';
$HEADING['UNINSTALL_TEMPLATE'] = 'Atinstalet &scaron;ablonu';
$HEADING['TEMPLATE_DETAILS'] = 'Informacija par &scaron;ablonu';

$HEADING['INSTALL_LANGUAGE'] = 'Instalet valodu';
$HEADING['UNINSTALL_LANGUAGE'] = 'Atinstalet valodu';
$HEADING['LANGUAGE_DETAILS'] = 'Informacija par valodu';

$HEADING['MY_SETTINGS'] = 'Mani iestatijumi';
$HEADING['MY_EMAIL'] = 'Mana e-pasta adrese';
$HEADING['MY_PASSWORD'] = 'Mana parole';

$HEADING['GENERAL_SETTINGS'] = 'Visparigie iestatijumi';
$HEADING['DEFAULT_SETTINGS'] = 'Noklusetie iestatijumi';
$HEADING['SEARCH_SETTINGS'] = 'Mekle&scaron;anas iestatijumi';
$HEADING['FILESYSTEM_SETTINGS'] = 'Datnu sistemas iestatijumi';
$HEADING['SERVER_SETTINGS'] = 'Servera iestatijumi';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administre&scaron;anas riki';

$HEADING['MODIFY_DELETE_USER'] = 'Mainit/dzest lietotaju';
$HEADING['ADD_USER'] = 'Pievienot lietotaju';
$HEADING['MODIFY_USER'] = 'Mainit lietotaju';

$HEADING['MODIFY_DELETE_GROUP'] = 'Mainit/dzest grupu';
$HEADING['ADD_GROUP'] = 'Pievienot grupu';
$HEADING['MODIFY_GROUP'] = 'Mainit grupu';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';

// Other text
$TEXT['OPEN'] = 'Open';
$TEXT['ADD'] = 'Pievienot';
$TEXT['MODIFY'] = 'Mainit';
$TEXT['SETTINGS'] = 'Iestatijumi';
$TEXT['DELETE'] = 'Dzest';
$TEXT['SAVE'] = 'Saglabat';
$TEXT['RESET'] = 'Parladet';
$TEXT['LOGIN'] = 'Ielogo&scaron;anas';
$TEXT['RELOAD'] = 'Parladet';
$TEXT['CANCEL'] = 'Atcelt';
$TEXT['NAME'] = 'Nosaukums';
$TEXT['PLEASE_SELECT'] = 'Izvelies, ludzu';
$TEXT['TITLE'] = 'Nosaukums';
$TEXT['PARENT'] = 'Vecaks';
$TEXT['TYPE'] = 'Tips';
$TEXT['VISIBILITY'] = 'Redzamiba';
$TEXT['PRIVATE'] = 'Privats';
$TEXT['PUBLIC'] = 'Publisks';
$TEXT['NONE'] = 'Tuk&scaron;s';
$TEXT['NONE_FOUND'] = 'Nekas netika atrasts';
$TEXT['CURRENT'] = 'Eso&scaron;ais';
$TEXT['CHANGE'] = 'Mainit';
$TEXT['WINDOW'] = 'Logs';
$TEXT['DESCRIPTION'] = 'Apraksts';
$TEXT['KEYWORDS'] = 'Atslegvardi';
$TEXT['ADMINISTRATORS'] = 'Administratori';
$TEXT['PRIVATE_VIEWERS'] = 'Iek&scaron;ejie verotaji';
$TEXT['EXPAND'] = 'Atvert';
$TEXT['COLLAPSE'] = 'Aizvert';
$TEXT['MOVE_UP'] = 'Bidit aug&scaron;up';
$TEXT['MOVE_DOWN'] = 'Bidit lejup';
$TEXT['RENAME'] = 'Parsaukt';
$TEXT['MODIFY_SETTINGS'] = 'Mainir iestatijumus';
$TEXT['MODIFY_CONTENT'] = 'Mainit saturu';
$TEXT['VIEW'] = 'Radit';
$TEXT['UP'] = 'Uz aug&scaron;u';
$TEXT['FORGOTTEN_DETAILS'] = 'Kaut ko nevari atcereties?';
$TEXT['NEED_TO_LOGIN'] = 'Gribi ielogoties?';
$TEXT['SEND_DETAILS'] = 'Sutit konta datus';
$TEXT['USERNAME'] = 'Lietotajvards';
$TEXT['PASSWORD'] = 'Parole';
$TEXT['HOME'] = 'Galvena lapa';
$TEXT['TARGET_FOLDER'] = 'Merkmape';
$TEXT['OVERWRITE_EXISTING'] = 'Parrakstit eso&scaron;as';
$TEXT['FILE'] = 'Datne';
$TEXT['FILES'] = 'Datnes';
$TEXT['FOLDER'] = 'Mape';
$TEXT['FOLDERS'] = 'Mapes';
$TEXT['CREATE_FOLDER'] = 'Izveidot mapi';
$TEXT['UPLOAD_FILES'] = 'Aug&scaron;upieladet failus';
$TEXT['CURRENT_FOLDER'] = 'Pa&scaron;reizeja mape';
$TEXT['TO'] = 'Uz';
$TEXT['FROM'] = 'No';
$TEXT['INSTALL'] = 'Instalet';
$TEXT['UNINSTALL'] = 'Atinstalet';
$TEXT['VIEW_DETAILS'] = 'Radit detalas';
$TEXT['DISPLAY_NAME'] = 'Vards';
$TEXT['AUTHOR'] = 'Autors';
$TEXT['VERSION'] = 'Versija';
$TEXT['DESIGNED_FOR'] = 'Dizainets priek&scaron;';
$TEXT['DESCRIPTION'] = 'Apraksts';
$TEXT['EMAIL'] = 'E-pasta adrese';
$TEXT['LANGUAGE'] = 'Valoda';
$TEXT['TIMEZONE'] = 'Laika zona';
$TEXT['CURRENT_PASSWORD'] = 'Eso&scaron;a parole';
$TEXT['NEW_PASSWORD'] = 'Jauna parole';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Parole velreiz';
$TEXT['ACTIVE'] = 'Aktivs';
$TEXT['DISABLED'] = 'Izslegts';
$TEXT['ENABLED'] = 'Ieslegts';
$TEXT['RETYPE_PASSWORD'] = 'Parole velreiz';
$TEXT['GROUP'] = 'Grupa';
$TEXT['SYSTEM_PERMISSIONS'] = 'Atlaujas attieciba uz sistemu';
$TEXT['MODULE_PERMISSIONS'] = 'Atlaujas attieciba uz moduliem';
$TEXT['SHOW_ADVANCED'] = 'Radit papla&scaron;inatas opcijas';
$TEXT['HIDE_ADVANCED'] = 'Slept papla&scaron;inatas opcijas';
$TEXT['BASIC'] = 'Pamata';
$TEXT['ADVANCED'] = 'Papla&scaron;inats';
$TEXT['WEBSITE'] = 'Timekla vietne';
$TEXT['DEFAULT'] = 'Noklusetais';
$TEXT['KEYWORDS'] = 'Atslegvardi';
$TEXT['TEXT'] = 'Teksts';
$TEXT['HEADER'] = 'Galvene';
$TEXT['FOOTER'] = 'Kajene';
$TEXT['TEMPLATE'] = '&scaron;ablons';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['INSTALLATION'] = 'Instalacija';
$TEXT['DATABASE'] = 'Datu baze';
$TEXT['HOST'] = 'Hosts';
$TEXT['INTRO'] = 'Ievads';
$TEXT['PAGE'] = 'Lapa';
$TEXT['SIGNUP'] = 'Registracija';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Kludu zino&scaron;anas limenis';
$TEXT['ADMIN'] = 'Admins';
$TEXT['PATH'] = 'Cel&scaron;';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['EXTENSION'] = 'Ekstensija';
$TEXT['TABLE_PREFIX'] = 'Tabulas prefikss';
$TEXT['CHANGES'] = 'Izmainas';
$TEXT['ADMINISTRATION'] = 'Administracija';
$TEXT['FORGOT_DETAILS'] = 'Aizmirsi detalas?';
$TEXT['LOGGED_IN'] = 'Ielogojies';
$TEXT['WELCOME_BACK'] = 'Ar atgrie&scaron;anos';
$TEXT['FULL_NAME'] = 'Vards';
$TEXT['ACCOUNT_SIGNUP'] = 'Registreties';
$TEXT['LINK'] = 'Links';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['TARGET'] = 'Merkis';
$TEXT['NEW_WINDOW'] = 'Jauns logs';
$TEXT['SAME_WINDOW'] = 'Tas pats logs';
$TEXT['TOP_FRAME'] = 'Freims vienu limeni augstak';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lapu apak&scaron;limenu limits';
$TEXT['SUCCESS'] = 'Kartibnieks';
$TEXT['ERROR'] = 'Keza';
$TEXT['ARE_YOU_SURE'] = 'Esi parliecinats?';
$TEXT['YES'] = 'Ja';
$TEXT['NO'] = 'Ne';
$TEXT['SYSTEM_DEFAULT'] = 'Sistemas noklusetais';
$TEXT['PAGE_TITLE'] = 'Lapas nosaukums';
$TEXT['MENU_TITLE'] = 'Izvelnes nosaukums';
$TEXT['ACTIONS'] = 'Darbibas';
$TEXT['UNKNOWN'] = 'Nezinams';
$TEXT['BLOCK'] = 'Bloks';
$TEXT['SEARCH'] = 'Meklet';
$TEXT['SEARCHING'] = 'Tiek meklets';
$TEXT['POST'] = 'Pievienot';
$TEXT['COMMENT'] = 'Komentars';
$TEXT['COMMENTS'] = 'Komentari';
$TEXT['COMMENTING'] = 'Tiek komentets';
$TEXT['SHORT'] = 'Iss';
$TEXT['LONG'] = 'Gar&scaron;s';
$TEXT['LOOP'] = 'Cikls';
$TEXT['FIELD'] = 'Lauks';
$TEXT['REQUIRED'] = 'Obligats';
$TEXT['LENGTH'] = 'Garums';
$TEXT['MESSAGE'] = 'Zina';
$TEXT['SUBJECT'] = 'Nosaukums';
$TEXT['MATCH'] = 'Sakritiba';
$TEXT['ALL_WORDS'] = 'Visi vardi';
$TEXT['ANY_WORDS'] = 'Jebkuri vardi';
$TEXT['EXACT_MATCH'] = 'Viens pret vienu';
$TEXT['SHOW'] = 'Radit';
$TEXT['HIDE'] = 'Slept';
$TEXT['START_PUBLISHING'] = 'Sakt publicet';
$TEXT['FINISH_PUBLISHING'] = 'Beigt publicet';
$TEXT['DATE'] = 'Datums';
$TEXT['START'] = 'Sakums';
$TEXT['END'] = 'Beigas';
$TEXT['IMAGE'] = 'Attels';
$TEXT['ICON'] = 'Ikona';
$TEXT['SECTION'] = 'Sadala';
$TEXT['DATE_FORMAT'] = 'Datuma formats';
$TEXT['TIME_FORMAT'] = 'Laika formats';
$TEXT['RESULTS'] = 'Rezultati';
$TEXT['RESIZE'] = 'Mainit izmeru';
$TEXT['MANAGE'] = 'Mened&#382;et';
$TEXT['CODE'] = 'Kods';
$TEXT['WIDTH'] = 'Platums';
$TEXT['HEIGHT'] = 'Augstums';
$TEXT['MORE'] = 'Vel';
$TEXT['READ_MORE'] = 'Lasit vel';
$TEXT['CHANGE_SETTINGS'] = 'Mainit iestatijumus';
$TEXT['CURRENT_PAGE'] = 'Pa&scaron;reizeja lapa';
$TEXT['CLOSE'] = 'Aizvert';
$TEXT['INTRO_PAGE'] = 'Ievada lapa';
$TEXT['INSTALLATION_URL'] = 'Instalacijas URL';
$TEXT['INSTALLATION_PATH'] = 'Cel&scaron; uz instalaciju';
$TEXT['PAGE_EXTENSION'] = 'Lapas papla&scaron;inajums';
$TEXT['NO_RESULTS'] = 'Rezultatu nav';
$TEXT['WEBSITE_TITLE'] = 'Tikla vietnes nosaukums';
$TEXT['WEBSITE_DESCRIPTION'] = 'Tikla vietnes apraksts';
$TEXT['WEBSITE_KEYWORDS'] = 'Tikla vietnes atslegvardi';
$TEXT['WEBSITE_HEADER'] = 'Tikla vietnes galvene';
$TEXT['WEBSITE_FOOTER'] = 'Tikla vietnes kajene';
$TEXT['RESULTS_HEADER'] = 'Rezultatu galvene';
$TEXT['RESULTS_LOOP'] = 'Rezultatu cikls';
$TEXT['RESULTS_FOOTER'] = 'Rezultatu kajene';
$TEXT['LEVEL'] = 'Limenis';
$TEXT['NOT_FOUND'] = 'Netika atrasts';
$TEXT['PAGE_SPACER'] = 'Lapas starplika';
$TEXT['MATCHING'] = 'Saskan';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Atlaujas attieciba uz &scaron;abloniem';
$TEXT['PAGES_DIRECTORY'] = 'Lapu mape';
$TEXT['MEDIA_DIRECTORY'] = 'Mediju mape';
$TEXT['FILE_MODE'] = 'Datnu re&#382;ims';
$TEXT['USER'] = 'Lietotajs';
$TEXT['OTHERS'] = 'Citi';
$TEXT['READ'] = 'Lasit';
$TEXT['WRITE'] = 'Rakstit';
$TEXT['EXECUTE'] = 'Izpildit';
$TEXT['SMART_LOGIN'] = 'Atjautiga ielogo&scaron;anas';
$TEXT['REMEMBER_ME'] = 'Atmineties mani';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Datnu sistemas atlaujas';
$TEXT['DIRECTORIES'] = 'Mapes';
$TEXT['DIRECTORY_MODE'] = 'Mapju re&#382;ims';
$TEXT['LIST_OPTIONS'] = 'Listes opcijas';
$TEXT['OPTION'] = 'Opcija';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Atlaut multiiezime&scaron;anu';
$TEXT['TEXTFIELD'] = 'Teksta laucin&scaron; (Textfield)';
$TEXT['TEXTAREA'] = 'Teksta lauks (Textarea)';
$TEXT['SELECT_BOX'] = 'Select kaste (Select Box)';
$TEXT['CHECKBOX_GROUP'] = 'Checkbox grupa';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio pogu grupa';
$TEXT['SIZE'] = 'Izmers';
$TEXT['DEFAULT_TEXT'] = 'Noklusetais teksts';
$TEXT['SEPERATOR'] = 'Atdalitajs';
$TEXT['BACK'] = 'Atpakal';
$TEXT['UNDER_CONSTRUCTION'] = 'Lapa vel nav gatava';
$TEXT['MULTISELECT'] = 'Multiiezime&scaron;ana';
$TEXT['SHORT_TEXT'] = 'Iss teksts';
$TEXT['LONG_TEXT'] = 'Gar&scaron; teksts';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirekcija';
$TEXT['HEADING'] = 'Virsraksts';
$TEXT['MULTIPLE_MENUS'] = 'Vairakas izvelnes';
$TEXT['REGISTERED'] = 'Registrets';
$TEXT['SECTION_BLOCKS'] = 'Sadalu bloki';
$TEXT['REGISTERED_VIEWERS'] = 'Registreti lukotaji';
$TEXT['ALLOWED_VIEWERS'] = 'Atlauti lukotaji';
$TEXT['SUBMISSION_ID'] = 'Pieteikuma ID';
$TEXT['SUBMISSIONS'] = 'Pieteikumi';
$TEXT['SUBMITTED'] = 'Pieteikts';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Pieteikumi stunda';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Pieteikumi tiek glabati datu baze';
$TEXT['EMAIL_ADDRESS'] = 'E-pasta adrese';
$TEXT['CUSTOM'] = 'Savs';
$TEXT['ANONYMOUS'] = 'Anonims';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Servera Operetajsistema';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Datnu permicijas iespejams mainit visiem, kam tas ienak prata';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Galvenas lapas mape';
$TEXT['HOME_FOLDERS'] = 'Galvenas lapas mapes';
$TEXT['PAGE_TRASH'] = 'Atkritumu tvertne lapam';
$TEXT['INLINE'] = 'Ieslegts';
$TEXT['SEPARATE'] = 'Atsevi&scaron;ki';
$TEXT['DELETED'] = 'Dzests';
$TEXT['VIEW_DELETED_PAGES'] = 'Radit izdzestas lapas';
$TEXT['EMPTY_TRASH'] = 'Iztuk&scaron;ot musaru';
$TEXT['TRASH_EMPTIED'] = 'Miskaste tira';
$TEXT['ADD_SECTION'] = 'Pievienot sadalu';
$TEXT['POST_HEADER'] = 'Puksta galvene';
$TEXT['POST_FOOTER'] = 'Puksta kajene';
$TEXT['POSTS_PER_PAGE'] = 'Puksti lapa';
$TEXT['RESIZE_IMAGE_TO'] = 'Mainit attela izmeru uz';
$TEXT['UNLIMITED'] = 'Neierobe&#382;ots';
$TEXT['OF'] = 'No';
$TEXT['OUT_OF'] = 'Ara no';
$TEXT['NEXT'] = 'Nakamais';
$TEXT['PREVIOUS'] = 'Iepriek&scaron;ejais';
$TEXT['NEXT_PAGE'] = 'Nakama lapa';
$TEXT['PREVIOUS_PAGE'] = 'Iepriek&scaron;eja lapa';
$TEXT['ON'] = 'ieslegts';
$TEXT['LAST_UPDATED_BY'] = 'Pedejo reizi mainits';
$TEXT['RESULTS_FOR'] = 'Rezultati';
$TEXT['TIME'] = 'Laiks';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG stils';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG redaktors';
$TEXT['SERVER_EMAIL'] = 'Servera e-pasta adrese';
$TEXT['MENU'] = 'Izvelne';
$TEXT['MANAGE_GROUPS'] = 'Mened&#382;et grupas';
$TEXT['MANAGE_USERS'] = 'Mened&#382;et lietotajus';
$TEXT['PAGE_LANGUAGES'] = 'Lapas valodas';
$TEXT['HIDDEN'] = 'Slepts';
$TEXT['MAIN'] = 'Galvenais';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Datnes, kuram aug&scaron;upieladejot jamaina nosaukumi';
$TEXT['APP_NAME'] = 'Programmas nosaukums';
$TEXT['SESSION_IDENTIFIER'] = 'Sesijas identifikators';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['BACKUP'] = 'Duble&scaron;ana';
$TEXT['RESTORE'] = 'Atjaunot';
$TEXT['BACKUP_DATABASE'] = 'Dublet datu bazi';
$TEXT['RESTORE_DATABASE'] = 'Atjaunot datu bazi';
$TEXT['BACKUP_ALL_TABLES'] = 'Atjaunot visas tabulas datu baze';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Atjaunot tikai WB raksturigas tabulas';
$TEXT['BACKUP_MEDIA'] = 'Dublet medijus';
$TEXT['RESTORE_MEDIA'] = 'Atjaunot medijus';
$TEXT['ADMINISTRATION_TOOL'] = 'Administracijas riks';
$TEXT['CAPTCHA_VERIFICATION'] = 'Parbaudes kods';
$TEXT['VERIFICATION'] = 'Parbaude';
$TEXT['DEFAULT_CHARSET'] = 'Nokluseta simbolu kopa';
$TEXT['CHARSET'] = 'Simbolu kopa';
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

// Success/error messages
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Piedod, bet Tev nav tiesibu aplukot &scaron;o lapu';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Nepietiekams atlauju limenis';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Ludzu ievadi lietotajvardu un paroli zemak redzamajos laukos';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Ludzu ievadi lietotajvardu';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Ludzu ievadi paroli';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Ievaditais lietotajvards par isu';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Ievadita parole par isu';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Ievaditais lietotajvards par garu';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Ievadita parole par garu';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Nepareizs lietotajvards vai parole';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'Jaievada e-pasta adrese';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Ludzu ievadi savu e-pasta adresi zemak redzamaja lauka';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Ievadito e-pasta adresi nebija iespejams atrast datu baze';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Lietotajvardu un paroli pa e-pastu nebija iespejams nosutit, ludzu sakontakte sistemas administratoru';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Lietotajvards un parole tika nosutiti uz Tavu e-pasta adresi';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Paroli nav iespejams atkalatjaunot bie&#382;ak ka reizi stunda';

$MESSAGE['START_WELCOME_MESSAGE'] = 'Esi sveicinats WebsiteBaker administracija';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Bridinajums, instalacijas mape vel arvien eksiste!';
$MESSAGE['START_CURRENT_USER'] = 'Tu &scaron;obrid esi ielogojies ka:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Nebija iespejams atvert konfiguracijas datni';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nebija iespejams ierakstit konfiguracijas datne';
$MESSAGE['SETTINGS_SAVED'] = 'Iestatijumi tika veiksmigi noglabati';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Ludzu iegaume: spie&#382;ot &scaron;o pogu, visas nesaglabatas izmainas tiks neatgriezeniski dzestas';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Ludzu iegaume: &scaron;is te ir ieteicams vienigi teste&scaron;anas re&#382;ima';

$MESSAGE['USERS_ADDED'] = 'Lietotajs veiksmigi pievienots';
$MESSAGE['USERS_SAVED'] = 'Lietotajs veiksmigi saglabats';
$MESSAGE['USERS_DELETED'] = 'Lietotajs veiksmigi izdzests';
$MESSAGE['USERS_NO_GROUP'] = 'Netika iezimeta neviena grupa';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Ievaditais lietotajvards bija par isu';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Ievadita parole bija par isu';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Ievaditas paroles nesakrit';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Ievadita e-pasta adrese nav pareiza';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'ievadita e-pasta adrese jau tiek &scaron;eit lietota';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Izveletais lietotajvards ir jau aiznemts';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Ludzu iegaume: Vertibas jaievada augstak redzamajos laukos, ja gribas nomainit &scaron;i lietotaja paroli';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Vai patie&scaron;am gribi izdzest iezimeto lietotaju?';

$MESSAGE['GROUPS_ADDED'] = 'Grupa veiksmigi pievienota';
$MESSAGE['GROUPS_SAVED'] = 'Grupa veiksmigi saglabata';
$MESSAGE['GROUPS_DELETED'] = 'Grupa veiksmigi izdzesta';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Grupas nosaukums ir tuk&scaron;s';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Vai patie&scaron;am gribi izdzest iezimeto grupu (un visus lietotajus taja)?';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Netika atrasta neviena grupa';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = '&scaron;ads grupas nosaukums jau ir';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detalas tika veiksmigi noglabatas';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-pasta adrese tika veiksmigi atjauninata';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Ievadita (eso&scaron;a) parole nav pareiza';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Parole veiksmigi nomainita';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Ludzu iegaume: lai mainitu &scaron;ablonu, jadotas uz iestatijumu sadalu';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nevar ieklaut ../ mapes nosaukuma';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Mape neeksiste';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Nav iespejams ieklaut ../ mapes merki (target)';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nav iespejams ieklaut ../ nosaukuma';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nedrikst lietot index.php ka nosaukumu';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Mape netika atrasts neviena mediju datne';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Datne netika atrasta';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Datne veiksmigi izdzesta';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Mape izdzesta veikmigi';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Vai esi parliecinats, ka gribi izdzest &scaron;o datni vai mapi?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nav iespejams izdzest iezimeto datni';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nav iespejams izdzest iezimeto mapi';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Netika ievadits jauns nosaukums';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Netika ievadits datnes papla&scaron;inajums';
$MESSAGE['MEDIA_RENAMED'] = 'Parsauk&scaron;ana veiksmiga';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Parsauk&scaron;ana neveiksmiga';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Datne ar &scaron;adu nosaukumu jau eksiste';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Mape ar &scaron;adu naosaukumu jau eksiste';
$MESSAGE['MEDIA_DIR_MADE'] = 'Mape veiksmigi izveidota';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Nav iespejams izveidot mapi';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' datne veiksmigi aug&scaron;upieladeta';
$MESSAGE['MEDIA_UPLOADED'] = ' datnes tika veiksmigi aug&scaron;upieladetas';

$MESSAGE['PAGES_ADDED'] = 'Lapa veiksmigi pievienota';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Lapas virsraksts pievienots veiksmigi';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Lapa ar tadu pa&scaron;u vai lidzigu virsrakstu jau eksiste';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Keza radot piekluves datni /pages mape (nepietiekamas privilegijas)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Keza dze&scaron;ot piekluves datni /pages mape';
$MESSAGE['PAGES_NOT_FOUND'] = 'Lapa netika atrasta';
$MESSAGE['PAGES_SAVED'] = 'Lapa saglabata veiksmigi';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Lapas iestatijumi saglabati veiksmigi';
$MESSAGE['PAGES_NOT_SAVED'] = 'Keza saglabajot lapue';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Vai esi parliecinats, ka velies izdzest iezimeto lapu (un visas tas apak&scaron;lapas)?';
$MESSAGE['PAGES_DELETED'] = 'Lapa veiksmigi izdzesta';
$MESSAGE['PAGES_RESTORED'] = 'Lapa atjaunota veiksmigi';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Ludzu ievadiet lapas nosaukumu';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Ludzu ievadiet izvelnes nosaukumu';
$MESSAGE['PAGES_REORDERED'] = 'Lapa veiksmigi parkartota';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Keza parkartojot lapu';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Tev nav atlaujas &scaron;o lapu mainit';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nav iespejams ierakstit datne /pages/intro.php (nepietiekamas privilegijas)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Ievada lapa saglabata veiksmigi';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Pedejas izmainas veicis';
$MESSAGE['PAGES_INTRO_LINK'] = 'Klik&scaron;kini &scaron;eit, lai veiktu izmainas ievada lapa';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Sadalas parametri veiksmigi saglabati';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Atgriezties pie lapam';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Ludzu atgriezies un aizpildi visus laukus';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Ludzu iegaume, ka datnei, ko gribi aug&scaron;upieladet jabut &scaron;aja formata:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Ludzu iegaume, ka failam, ko gribi aug&scaron;upieladet jabu viena no &scaron;iem formatiem:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Nebija iespejams aug&scaron;upieladet datni';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Jau uzinstalets';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nav instalets';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nav iespejams atinstalet';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Datni nav iespejams atzipot';
$MESSAGE['GENERIC_INSTALLED'] = 'Uzinstalets veiksmigi';
$MESSAGE['GENERIC_UPGRADED'] = 'Apgreidots veiksmigi';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Atinstalets veiksmigi';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Nav iespejams ierakstit noraditaja mape';
$MESSAGE['GENERIC_INVALID'] = 'Datne, ko nupat aug&scaron;upieladeji, ir invalids';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nav iespejams atinstalet: iezimetais fails tiek lietots';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = "<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = "this page;these pages";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "Can't uninstall the template <b>{{name}}</b>, because it is the default template!";

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Lapa tiek veidota';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Nac driz atkal!';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Esi paceitigs, tas var kadu bridi ievilkties.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Keza atverot datni';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Ievadi detalas sekojo&scaron;ajos laukos';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Atvaino, &scaron;i forma ir tikusi aizpildita parak daudz rei&#382;u &scaron;is stundas laika. Ludzu pamegini velreiz pec stundas.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Ievaditais parbaudes numurs ir nepareizs. Ja radu&scaron;as problemas ar parbaudes koda nolasi&scaron;anu, suti zinu uz: '.SERVER_EMAIL.'';

$MESSAGE['ADDON_RELOAD'] = 'Update database with information from Add-on files (e.g. after FTP upload).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Error while updating the Add-On information.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Moduli veiksmigi parladeti';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = '&scaron;abloni veiksmigi parladeti';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Valodas veiksmigi parladetas';
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