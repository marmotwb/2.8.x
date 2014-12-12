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
$language_code = 'CS';
$language_name = 'Čeština';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'WebStep, s.r.o.';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Přístup';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Rozšíření';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Získat zapomenuté přihlašovací údaje';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Skupiny';
$MENU['HELP'] = 'Nápověda';
$MENU['LANGUAGES'] = 'Jazyky';
$MENU['LOGIN'] = 'Přihlášení';
$MENU['LOGOUT'] = 'Odhlásit';
$MENU['MEDIA'] = 'Média';
$MENU['MODULES'] = 'Moduly';
$MENU['PAGES'] = 'Stránky';
$MENU['PREFERENCES'] = 'Možnosti';
$MENU['SETTINGS'] = 'Nastavení';
$MENU['START'] = 'Úvod';
$MENU['TEMPLATES'] = 'Šablony';
$MENU['USERS'] = 'Uživatelé';
$MENU['VIEW'] = 'Zobrazit';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Registrace účtu';
$TEXT['ACTIONS'] = 'Akce';
$TEXT['ACTIVE'] = 'Aktivní';
$TEXT['ADD'] = 'Přidat';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Přidat sekci';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administrace';
$TEXT['ADMINISTRATION_TOOL'] = 'Administrační nástroje';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Správci';
$TEXT['ADVANCED'] = 'Pokročilý';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Oprávnění k prohlížení';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Povolit vícenásobné výběry';
$TEXT['ALL_WORDS'] = 'Všechna slova';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Anonymní';
$TEXT['ANY_WORDS'] = 'Cokoliv';
$TEXT['APP_NAME'] = 'Název aplikace';
$TEXT['ARE_YOU_SURE'] = 'Jste si jisti?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Zpět';
$TEXT['BACKUP'] = 'Zálohování';
$TEXT['BACKUP_ALL_TABLES'] = 'Zálohovat všechny tabulky v databázi';
$TEXT['BACKUP_DATABASE'] = 'Zálohovat databázi';
$TEXT['BACKUP_MEDIA'] = 'Zazálohovat média';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Zálohovat pouze tabulky WebsiteBakeru';
$TEXT['BASIC'] = 'Základní';
$TEXT['BLOCK'] = 'Blok';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['CANCEL'] = 'Zrušit';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Kontrola obr. kódem';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['CHANGE'] = 'Změnit';
$TEXT['CHANGES'] = 'Změny';
$TEXT['CHANGE_SETTINGS'] = 'Změnit nastavení';
$TEXT['CHARSET'] = 'Kódová stránka';
$TEXT['CHECKBOX_GROUP'] = 'Skupina zatrhávacích polí';
$TEXT['CLOSE'] = 'Zavřít';
$TEXT['CODE'] = 'Kód jazyka';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Sbalit';
$TEXT['COMMENT'] = 'Komentář';
$TEXT['COMMENTING'] = 'Komentáře';
$TEXT['COMMENTS'] = 'Komentáře';
$TEXT['CREATE_FOLDER'] = 'Vytvořit adresář';
$TEXT['CURRENT'] = 'Současný';
$TEXT['CURRENT_FOLDER'] = 'Současný adresář';
$TEXT['CURRENT_PAGE'] = 'Stránka';
$TEXT['CURRENT_PASSWORD'] = 'Současné heslo';
$TEXT['CUSTOM'] = 'Vlastní nastavení';
$TEXT['DATABASE'] = 'Databáze';
$TEXT['DATE'] = 'Datum';
$TEXT['DATE_FORMAT'] = 'Formát data';
$TEXT['DEFAULT'] = 'Výchozí';
$TEXT['DEFAULT_CHARSET'] = 'Výchozí kódová stránka';
$TEXT['DEFAULT_TEXT'] = 'Výchozí text';
$TEXT['DELETE'] = 'Smazat';
$TEXT['DELETED'] = 'Smazáno';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Popis';
$TEXT['DESIGNED_FOR'] = 'Vyvinuto pro';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Adresáře';
$TEXT['DIRECTORY_MODE'] = 'Mód adresářů';
$TEXT['DISABLED'] = 'Vypnuto';
$TEXT['DISPLAY_NAME'] = 'Jméno';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['EMAIL_ADDRESS'] = 'E-mailová adresa';
$TEXT['EMPTY_TRASH'] = 'Vyprázdnit koš';
$TEXT['ENABLED'] = 'Zapnuto';
$TEXT['END'] = 'Konec';
$TEXT['ERROR'] = 'Chyba';
$TEXT['EXACT_MATCH'] = 'Přesná shoda';
$TEXT['EXECUTE'] = 'Spuštění';
$TEXT['EXPAND'] = 'Rozbalit';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Pole';
$TEXT['FILE'] = 'soubor';
$TEXT['FILES'] = 'soubory';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Práva souborového systému';
$TEXT['FILE_MODE'] = 'Mód souborů';
$TEXT['FINISH_PUBLISHING'] = 'Konec publikace';
$TEXT['FOLDER'] = 'adresář';
$TEXT['FOLDERS'] = 'adresáře';
$TEXT['FOOTER'] = 'Zápatí';
$TEXT['FORGOTTEN_DETAILS'] = 'Zapoměli jste svoje přihlašovací údaje?';
$TEXT['FORGOT_DETAILS'] = 'Zapomnenuté heslo?';
$TEXT['FROM'] = 'od';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['FULL_NAME'] = 'Celé jméno';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Skup.';
$TEXT['HEADER'] = 'Záhlaví';
$TEXT['HEADING'] = 'Záhlaví';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Výška';
$TEXT['HIDDEN'] = 'Skrytá';
$TEXT['HIDE'] = 'Skrýt';
$TEXT['HIDE_ADVANCED'] = 'Skrýt pokročilé volby';
$TEXT['HOME'] = 'Domů';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Přesměrování homepage';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Hostitel';
$TEXT['ICON'] = 'Ikona';
$TEXT['IMAGE'] = 'Obrázek';
$TEXT['INLINE'] = 'In-line';
$TEXT['INSTALL'] = 'Instalovat';
$TEXT['INSTALLATION'] = 'Instalace';
$TEXT['INSTALLATION_PATH'] = 'Cesta instalace';
$TEXT['INSTALLATION_URL'] = 'URL instalace';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Intro';
$TEXT['INTRO_PAGE'] = 'Úvodní (intro) stránka';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Klíčová slova';
$TEXT['LANGUAGE'] = 'Jazyk';
$TEXT['LAST_UPDATED_BY'] = 'Poslední změna:';
$TEXT['LENGTH'] = 'Délka';
$TEXT['LEVEL'] = 'Úroveň';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Odkaz';
$TEXT['LINUX_UNIX_BASED'] = 'Založen na Linux/Unix';
$TEXT['LIST_OPTIONS'] = 'Seznam voleb';
$TEXT['LOGGED_IN'] = 'přihlášen';
$TEXT['LOGIN'] = 'Přihlásit';
$TEXT['LONG'] = 'Dlouhý popis';
$TEXT['LONG_TEXT'] = 'Dlouhý text';
$TEXT['LOOP'] = 'Tělo';
$TEXT['MAIN'] = 'Hlavní';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Spravovat';
$TEXT['MANAGE_GROUPS'] = 'Spravovat skupiny';
$TEXT['MANAGE_USERS'] = 'Spravovat uživatele';
$TEXT['MATCH'] = 'Shoda';
$TEXT['MATCHING'] = 'Odpovídající';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. počet odeslání za hodinu';
$TEXT['MEDIA_DIRECTORY'] = 'Adresář médií';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Titulek menu';
$TEXT['MESSAGE'] = 'Zpráva';
$TEXT['MODIFY'] = 'Změnit';
$TEXT['MODIFY_CONTENT'] = 'Změnit obsah';
$TEXT['MODIFY_SETTINGS'] = 'Změnit nastavení';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Oprávnění k modulům';
$TEXT['MORE'] = 'Více';
$TEXT['MOVE_DOWN'] = 'Posunout dolů';
$TEXT['MOVE_UP'] = 'Posunout nahoru';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Vícenásobná menu';
$TEXT['MULTISELECT'] = 'Vícenásobné výběrové pole';
$TEXT['NAME'] = 'Název';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Chcete se přihlásit?';
$TEXT['NEW_PASSWORD'] = 'Nové heslo';
$TEXT['NEW_WINDOW'] = 'nového okna';
$TEXT['NEXT'] = 'Následující';
$TEXT['NEXT_PAGE'] = 'Následující stránka';
$TEXT['NO'] = 'Ne';
$TEXT['NONE'] = 'Není';
$TEXT['NONE_FOUND'] = 'Nic nenalezeno';
$TEXT['NOT_FOUND'] = 'Nenalezeno';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Žádný výsledek';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'Z';
$TEXT['ON'] = 'Na';
$TEXT['OPEN'] = 'Open';
$TEXT['OPTION'] = 'Volby';
$TEXT['OTHERS'] = 'Ostatní';
$TEXT['OUT_OF'] = 'Z';
$TEXT['OVERWRITE_EXISTING'] = 'Přepsat existující';
$TEXT['PAGE'] = 'Stránka';
$TEXT['PAGES_DIRECTORY'] = 'Adresář stránek';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Seitenerechtigungen';
$TEXT['PAGE_EXTENSION'] = 'Přípona stránek';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Jazykové verze stránek';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limit úrovní stránek';
$TEXT['PAGE_SPACER'] = 'Znak mezery';
$TEXT['PAGE_TITLE'] = 'Titulek stránky';
$TEXT['PAGE_TRASH'] = 'Koš stránek';
$TEXT['PARENT'] = 'Nadřazený';
$TEXT['PASSWORD'] = 'Heslo';
$TEXT['PATH'] = 'Cesta';
$TEXT['PHP_ERROR_LEVEL'] = 'Úroveň hlášení chyb PHP';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['PLEASE_SELECT'] = 'Vyberte prosím';
$TEXT['POST'] = 'příspěvek';
$TEXT['POSTS_PER_PAGE'] = 'Příspěvků na stránku';
$TEXT['POST_FOOTER'] = 'Zápatí příspěvku';
$TEXT['POST_HEADER'] = 'Záhlaví příspěvku';
$TEXT['PREVIOUS'] = 'Předchozí';
$TEXT['PREVIOUS_PAGE'] = 'Předchozí stránka';
$TEXT['PRIVATE'] = 'Soukromá';
$TEXT['PRIVATE_VIEWERS'] = 'Oprávnění k prohlížení';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Veřejná';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['RADIO_BUTTON_GROUP'] = 'Skupina radio-polí';
$TEXT['READ'] = 'Čtení';
$TEXT['READ_MORE'] = 'více...';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Pro registrované';
$TEXT['REGISTERED_VIEWERS'] = 'Oprávnění k prohlížení';
$TEXT['RELOAD'] = 'Obnovit';
$TEXT['REMEMBER_ME'] = 'Zapamatovat údaje';
$TEXT['RENAME'] = 'Přejm.';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Povinný';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Vyčistit';
$TEXT['RESIZE'] = 'Změna velikosti';
$TEXT['RESIZE_IMAGE_TO'] = 'Změnit velikost obrázku na';
$TEXT['RESTORE'] = 'Obnova ze zálohy';
$TEXT['RESTORE_DATABASE'] = 'Obnovit databázi ze zálohy';
$TEXT['RESTORE_MEDIA'] = 'Obnovit média ze zálohy';
$TEXT['RESULTS'] = 'Výsledky';
$TEXT['RESULTS_FOOTER'] = 'Zápatí výsledků';
$TEXT['RESULTS_FOR'] = 'Výsledky pro';
$TEXT['RESULTS_HEADER'] = 'Záhlaví výsledků';
$TEXT['RESULTS_LOOP'] = 'Položka výsledků';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Znovu nové heslo';
$TEXT['RETYPE_PASSWORD'] = 'Znovu heslo';
$TEXT['SAME_WINDOW'] = 'původního okna';
$TEXT['SAVE'] = 'Uložit';
$TEXT['SEARCH'] = 'Vyhledávání';
$TEXT['SEARCHING'] = 'Vyhledávání';
$TEXT['SECTION'] = 'Sekce';
$TEXT['SECTION_BLOCKS'] = 'Bloky sekcí';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Výběrové pole';
$TEXT['SEND_DETAILS'] = 'Zaslat přihlašovací údaje';
$TEXT['SEPARATE'] = 'Odděleně';
$TEXT['SEPERATOR'] = 'Oddělovač';
$TEXT['SERVER_EMAIL'] = 'Sytémový e-mail';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Operační systém serveru';
$TEXT['SESSION_IDENTIFIER'] = 'Identifikátor session';
$TEXT['SETTINGS'] = 'Nastavení';
$TEXT['SHORT'] = 'Krátký popis';
$TEXT['SHORT_TEXT'] = 'Krátký text';
$TEXT['SHOW'] = 'Zobrazit';
$TEXT['SHOW_ADVANCED'] = 'Zobrazit pokročilé volby';
$TEXT['SIGNUP'] = 'Registrace';
$TEXT['SIZE'] = 'Velikost';
$TEXT['SMART_LOGIN'] = 'Chytré přihlášení';
$TEXT['START'] = 'Začátek';
$TEXT['START_PUBLISHING'] = 'Začátek publikace';
$TEXT['SUBJECT'] = 'Předmět';
$TEXT['SUBMISSIONS'] = 'Odeslané formuláře';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Odeslané formuláře';
$TEXT['SUBMISSION_ID'] = 'ID formuláře';
$TEXT['SUBMITTED'] = 'Odesláno';
$TEXT['SUCCESS'] = 'Úspěšně provedeno';
$TEXT['SYSTEM_DEFAULT'] = 'Implicitní v systému';
$TEXT['SYSTEM_PERMISSIONS'] = 'Systémová oprávnění';
$TEXT['TABLE_PREFIX'] = 'Prefix tabulek';
$TEXT['TARGET'] = 'Směřuje do';
$TEXT['TARGET_FOLDER'] = 'Cílový adresář';
$TEXT['TEMPLATE'] = 'Šablona';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Práva k šabloně';
$TEXT['TEXT'] = 'Text';
$TEXT['TEXTAREA'] = 'Vstupní pole';
$TEXT['TEXTFIELD'] = 'Vstupní řádek';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Čas';
$TEXT['TIMEZONE'] = 'Časové pásmo';
$TEXT['TIME_FORMAT'] = 'Formát času';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['TITLE'] = 'Název';
$TEXT['TO'] = 'na';
$TEXT['TOP_FRAME'] = 'svrchního rámu';
$TEXT['TRASH_EMPTIED'] = 'Koš vyprázdněn';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Typ';
$TEXT['UNDER_CONSTRUCTION'] = 'Ve výstavbě';
$TEXT['UNINSTALL'] = 'Odinstalovat';
$TEXT['UNKNOWN'] = 'Neznámý';
$TEXT['UNLIMITED'] = 'Neomezený';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Nahoru';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Nahrát soubor(y)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Uživatel';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Verifikace';
$TEXT['VERSION'] = 'Verze';
$TEXT['VIEW'] = 'Zobrazit';
$TEXT['VIEW_DELETED_PAGES'] = 'Zobrazit smazané stránky';
$TEXT['VIEW_DETAILS'] = 'Zobrazit';
$TEXT['VISIBILITY'] = 'Viditelnost';
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
$TEXT['WEBSITE'] = 'WWW';
$TEXT['WEBSITE_DESCRIPTION'] = 'Popis webu';
$TEXT['WEBSITE_FOOTER'] = 'Zápatí webu';
$TEXT['WEBSITE_HEADER'] = 'Záhlaví webu';
$TEXT['WEBSITE_KEYWORDS'] = 'Klíčová slova';
$TEXT['WEBSITE_TITLE'] = 'Název webu';
$TEXT['WELCOME_BACK'] = 'Vítejte';
$TEXT['WIDTH'] = 'Šířka';
$TEXT['WINDOW'] = 'Okno';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Práva zápisu &quot;pro celý svět&quot;';
$TEXT['WRITE'] = 'Zápis';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG editor';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG styl';
$TEXT['YES'] = 'Ano';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Přidat skupinu';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Přidat záhlaví';
$HEADING['ADD_PAGE'] = 'Přidat stránku';
$HEADING['ADD_USER'] = 'Přidat uživatele';
$HEADING['ADMINISTRATION_TOOLS'] = 'Nástroje administrace';
$HEADING['BROWSE_MEDIA'] = 'Prohlížeč médií';
$HEADING['CREATE_FOLDER'] = 'Vytvořit adresář';
$HEADING['DEFAULT_SETTINGS'] = 'Implicitní nastavení';
$HEADING['DELETED_PAGES'] = 'Smazané stránky';
$HEADING['FILESYSTEM_SETTINGS'] = 'Nastavení systému souborů';
$HEADING['GENERAL_SETTINGS'] = 'Obecná nastavení';
$HEADING['INSTALL_LANGUAGE'] = 'Nainstalovat jazyk';
$HEADING['INSTALL_MODULE'] = 'Nainstalovat modul';
$HEADING['INSTALL_TEMPLATE'] = 'Nainstalovat šablonu';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Detaily jazyka';
$HEADING['MANAGE_SECTIONS'] = 'Spravovat sekce';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Změnit pokročilá nastavení stránky';
$HEADING['MODIFY_DELETE_GROUP'] = 'Změnit/Smazat skupinu';
$HEADING['MODIFY_DELETE_PAGE'] = 'Změnit/Smazat stránku';
$HEADING['MODIFY_DELETE_USER'] = 'Změnit/Smazat uživatele';
$HEADING['MODIFY_GROUP'] = 'Změnit skupinu';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Změnit úvodní (intro) stránku';
$HEADING['MODIFY_PAGE'] = 'Upravit stránku';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Změnit nastavení stránky';
$HEADING['MODIFY_USER'] = 'Změnit uživatele';
$HEADING['MODULE_DETAILS'] = 'Detaily modulu';
$HEADING['MY_EMAIL'] = 'Můj e-mail';
$HEADING['MY_PASSWORD'] = 'Moje heslo';
$HEADING['MY_SETTINGS'] = 'Moje nastavení';
$HEADING['SEARCH_SETTINGS'] = 'Nastavení vyhledávání';
$HEADING['SERVER_SETTINGS'] = 'Nastavení serveru';
$HEADING['TEMPLATE_DETAILS'] = 'Detaily šablony';
$HEADING['UNINSTALL_LANGUAGE'] = 'Odinstalovat jazyk';
$HEADING['UNINSTALL_MODULE'] = 'Odinstalovat modul';
$HEADING['UNINSTALL_TEMPLATE'] = 'Odinstalovat šablonu';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Nahrát soubor(y)';
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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Nedostatečná oprávnění';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Heslo nemůže být přenastaveno vícekrát během jedné hodiny';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Nelze odeslat heslo e-mailem, kontaktujte prosím správce systému';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Zadaná e-mailová adresa nebyla nalezena';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Zadejte svoji e-mailovou adresu:';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Nemáte oprávnění prohlížet tuto stránku';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Již dříve nainstalováno';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Nelze zapisovat do cílového adresáře';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nelze odinstalovat';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nelze odinstalovat: soubor je právě používán';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'this page;these pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default template!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Nelze rozbalit (rozzipovat) soubor';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Nelze nahrát soubor';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Došlo k chybě při otevírání souboru.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Nahrávaný soubory musí být následujícího formátu:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Nahrávaný soubor musí mít jeden z následujících formátů:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Prosím vraťte se zpět a vyplňte všechna pole';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Instalace proběhla úspěšně';
$MESSAGE['GENERIC_INVALID'] = 'Nahrávaný soubor je neplatný';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nenainstalováno';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Čekejte prosím, operace může chvíli trvat.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Zkuste to příště...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Odinstalace proběhla úspěšně';
$MESSAGE['GENERIC_UPGRADED'] = 'Aktualizace proběhla úspěšně';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Stránky jsou ve výstavbě';
$MESSAGE['GROUPS_ADDED'] = 'Skupina byla úspěšně přidána';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Jste si jisti, že chcete smazat tuto skupimu (a všechny její uživatele)?';
$MESSAGE['GROUPS_DELETED'] = 'Skupina byla úspěšně smazána';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Název skupiny je prázdný';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Tato skupina již existuje';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Nenalezena žádná skupina';
$MESSAGE['GROUPS_SAVED'] = 'Skupina byla úspěšně uložena';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Zadejte své heslo';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Zadané heslo je příliš dlouhé';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Zadané heslo je příliš krátké';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Nezadali jste příponu souboru';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Nezadali jste nový název';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nelze smazat vybraný adresář';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nelze smazat vybraný soubor';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Přejmenování se nezdařilo';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Jste si jisti, že chcete smazat následující soubory nebo adresáře?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Adresář byl úspěšně smazán';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Soubor byl úspěšně smazán';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Adresář neexistuje';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nelze použít ../ v názvu adresáře';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Adresář se stejným názvem již existuje';
$MESSAGE['MEDIA_DIR_MADE'] = 'Adresář byl úspěšně vytvořen';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Nelze vytvořit adresář';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Soubor se stejným názvem již existuje';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Soubor nenalezen';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nelze použít ../ v názvu';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nelze použít index.php jako název';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nenalezen žádný soubor';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Přejmenování proběhlo úspěšně';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' soubor byl úspěšně nahrán';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Nelze použít ../ v cílovém adresáři';
$MESSAGE['MEDIA_UPLOADED'] = ' soubory byly úspěšně nahrány';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Omlouváme se, ale tento formulář dosáhl limitu povolených odeslání pro tuto hodinu. Prosím zkuste to znovu v další hodině..';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Kontrolní kód (známý jako Captcha) neodpovídá. Pokud máte problémy s přečtením tohoto kódu, kontaktujte <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Musíte vyplnit následující pole';
$MESSAGE['PAGES_ADDED'] = 'Stránka byla úspěšně přidána';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Záhlaví stránky bylo úspěšně přidáno';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Zadejte název v menu';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Zadejte název stránky';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Došlo k chybě při vytváření přísupového souboru v adresáři stránek (nedostatečná oprávnění)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Došlo k chybě při mazání přísupového souboru v adresáři stránek (nedostatečná oprávnění)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Došlo k chybě při změně pořadí stránky';
$MESSAGE['PAGES_DELETED'] = 'Stránka byla úspěšně smazána';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Jste si jisti, že chcete smazat tuto stránku (a všechny podstránky)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nemáte oprávnění ke změně této stránky';
$MESSAGE['PAGES_INTRO_LINK'] = 'Změnit úvodní (intro) stránku';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nelze zapisovat do souboru /pages/intro.php (nedostatečná oprávnění)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Stránka byla úspěšně uložena';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Poslední změna:';
$MESSAGE['PAGES_NOT_FOUND'] = 'Stránka nenalezena';
$MESSAGE['PAGES_NOT_SAVED'] = 'Došlo k chybě při ukládání stránky';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Stránka se stejným nebo podobným názvem již existuje';
$MESSAGE['PAGES_REORDERED'] = 'Stránka byla úspěšně přesunuta';
$MESSAGE['PAGES_RESTORED'] = 'Stránka byla úspěšně obnovena';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Zpět na stránky';
$MESSAGE['PAGES_SAVED'] = 'Stránka byla úspěšně uložena';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Nastavení stránky bylo úspěšně uloženo';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Nastavení sekce bylo úspěšně uloženo';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Současné heslo neodpovídá';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detaily byly úspěšně uloženy';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail byl úspěšně uložen';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Heslo bylo úspěšně změněno';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Pozn.: stisknutím tohoto tlačítka dojde k zahození neuložených změn';
$MESSAGE['SETTINGS_SAVED'] = 'Nastavení bylo úspěšně uloženo';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Nelze otevřít soubor s konfigurací';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nelze zapisovat do souboru s konfigurací';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Pozn.: zapnutí této volby se doporučuje jen v testovacím prostředí';
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
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Musíte zadat e-mailovou adresu';
$MESSAGE['START_CURRENT_USER'] = 'Jste přihlášeni jako:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Pozor, stále existuje instalační adresář!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Vítejte v Administrační části';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Pozn.: změna šablony se provádí v sekci Nastavení';
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
$MESSAGE['USERS_ADDED'] = 'Uživatel byl úspěšně přidán';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Pozn.: vyplňte pouze hodnoty výše pokud si přejete změnit heslo';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Jste si jisti, že chcete smazat tohoto uživatele?';
$MESSAGE['USERS_DELETED'] = 'Uživatel byl úspěšně smazán';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Zadaná e-mailová adresa je již používána';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Zadaná e-mailová adresa je neplatná';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Nebyla vybrána skupina';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Zadaná hesla nejsou shodná';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Zadané heslo je příliš krátké';
$MESSAGE['USERS_SAVED'] = 'Uživatel byl úspěšně uložen';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';
$OVERVIEW['GROUPS'] = 'Spravovat skupiny uživatelů a jejich oprávnění...';
$OVERVIEW['HELP'] = 'Máte otázku? Hledejte odpověď...';
$OVERVIEW['LANGUAGES'] = 'Spravovat jazyky WebsiteBakeru...';
$OVERVIEW['MEDIA'] = 'Spravovat soubory v adresáři médií...';
$OVERVIEW['MODULES'] = 'Spravovat moduly WebsiteBakeru...';
$OVERVIEW['PAGES'] = 'Spravovat webové stránky...';
$OVERVIEW['PREFERENCES'] = 'Změna nastavení e-mailové adresy, hesla, atd... ';
$OVERVIEW['SETTINGS'] = 'Změna nastavení WebsiteBakeru...';
$OVERVIEW['START'] = 'Administrační přehled';
$OVERVIEW['TEMPLATES'] = 'Změnit vzhled a chování webu pomocí šablon...';
$OVERVIEW['USERS'] = 'Spravovat uživate WebsiteBakeru...';
$OVERVIEW['VIEW'] = 'Rychle prohlédhout stránky v novém okně...';
