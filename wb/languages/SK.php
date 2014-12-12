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
$language_code = 'SK';
$language_name = 'Slovensky';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Michal Kurtulik - YONIX.SK';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Prístup';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Rozšírenie';
$MENU['ADMINTOOLS'] = 'Nástroje';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Získať zabudnuté prihlasovacie údaje';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Skupiny';
$MENU['HELP'] = 'Nápoveda';
$MENU['LANGUAGES'] = 'Jazyky';
$MENU['LOGIN'] = 'Prihlásenie';
$MENU['LOGOUT'] = 'Odhlásiť';
$MENU['MEDIA'] = 'Média';
$MENU['MODULES'] = 'Moduly';
$MENU['PAGES'] = 'Stránky';
$MENU['PREFERENCES'] = 'Možnosti';
$MENU['SETTINGS'] = 'Nastavenia';
$MENU['START'] = 'Úvod';
$MENU['TEMPLATES'] = 'Šablony';
$MENU['USERS'] = 'Užívatelia';
$MENU['VIEW'] = 'Zobraziť';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Registrácia účtu';
$TEXT['ACTIONS'] = 'Akcia';
$TEXT['ACTIVE'] = 'Aktívny';
$TEXT['ADD'] = 'Pridať';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Pridať sekciu';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administratíva';
$TEXT['ADMINISTRATION_TOOL'] = 'Administratívne nástroje';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Správcovia';
$TEXT['ADVANCED'] = 'Pokročilý';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Oprávnenie k prezeraniu';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Povolit viacnásobné výbery';
$TEXT['ALL_WORDS'] = 'Všetky slová';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Anonymné';
$TEXT['ANY_WORDS'] = 'Čokoľvek';
$TEXT['APP_NAME'] = 'Názov aplikácie';
$TEXT['ARE_YOU_SURE'] = 'Ste si istí?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Späť';
$TEXT['BACKUP'] = 'Zálohovanie';
$TEXT['BACKUP_ALL_TABLES'] = 'Zálohovať všetky tabuľky v databáze';
$TEXT['BACKUP_DATABASE'] = 'Zálohovať databázu';
$TEXT['BACKUP_MEDIA'] = 'Zazálohovať  média';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Zálohovať iba tabuľky CMS Systému';
$TEXT['BASIC'] = 'Základný';
$TEXT['BLOCK'] = 'Blok';
$TEXT['CALENDAR'] = 'Kalendár';
$TEXT['CANCEL'] = 'Zrušiť';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Kontrola obr. kódom';
$TEXT['CAP_EDIT_CSS'] = 'Uprav CSS';
$TEXT['CHANGE'] = 'Zmeniť';
$TEXT['CHANGES'] = 'Zmeny';
$TEXT['CHANGE_SETTINGS'] = 'Zmeniť nastavenie';
$TEXT['CHARSET'] = 'Kódová stránka';
$TEXT['CHECKBOX_GROUP'] = 'Skupina zaškrtávacích polí';
$TEXT['CLOSE'] = 'Zavrieť';
$TEXT['CODE'] = 'Kód jazyka';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Zbaliť';
$TEXT['COMMENT'] = 'Komentár';
$TEXT['COMMENTING'] = 'Komentáre';
$TEXT['COMMENTS'] = 'Komentáre';
$TEXT['CREATE_FOLDER'] = 'Vytvorit adresár';
$TEXT['CURRENT'] = 'Súčasný';
$TEXT['CURRENT_FOLDER'] = 'Súčasný adresár';
$TEXT['CURRENT_PAGE'] = 'Stránka';
$TEXT['CURRENT_PASSWORD'] = 'Súčasné heslo';
$TEXT['CUSTOM'] = 'Vlastné nastavenie';
$TEXT['DATABASE'] = 'Databáza';
$TEXT['DATE'] = 'Dátum';
$TEXT['DATE_FORMAT'] = 'Formát dátumu';
$TEXT['DEFAULT'] = 'Východzí';
$TEXT['DEFAULT_CHARSET'] = 'Východzia kódová stránka';
$TEXT['DEFAULT_TEXT'] = 'Prednastavený text';
$TEXT['DELETE'] = 'Vymazať';
$TEXT['DELETED'] = 'Vymazané';
$TEXT['DELETE_DATE'] = 'Zmazať dátum';
$TEXT['DELETE_ZIP'] = 'Zmazať zip súbor po rozbalení';
$TEXT['DESCRIPTION'] = 'Popis';
$TEXT['DESIGNED_FOR'] = 'Vyvinuté pre';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Adresáre';
$TEXT['DIRECTORY_MODE'] = 'Mód adresárov';
$TEXT['DISABLED'] = 'Vypnuté';
$TEXT['DISPLAY_NAME'] = 'Meno';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['EMAIL_ADDRESS'] = 'E-mailová adresa';
$TEXT['EMPTY_TRASH'] = 'Vyprázdniť kôš';
$TEXT['ENABLED'] = 'Zapnuté';
$TEXT['END'] = 'Koniec';
$TEXT['ERROR'] = 'Chyba';
$TEXT['EXACT_MATCH'] = 'Presná zhoda';
$TEXT['EXECUTE'] = 'Spustenie';
$TEXT['EXPAND'] = 'Rozbaliť';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Pole';
$TEXT['FILE'] = 'súbor';
$TEXT['FILES'] = 'súbory';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Práva súborového systému';
$TEXT['FILE_MODE'] = 'Mód súborov';
$TEXT['FINISH_PUBLISHING'] = 'Koniec publikácie';
$TEXT['FOLDER'] = 'adresár';
$TEXT['FOLDERS'] = 'adresáre';
$TEXT['FOOTER'] = 'Zápätie';
$TEXT['FORGOTTEN_DETAILS'] = 'Zabudli ste svoje prihlasovanie údaje ?';
$TEXT['FORGOT_DETAILS'] = 'Zabudnuté heslo?';
$TEXT['FROM'] = 'od';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['FULL_NAME'] = 'Celé meno';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Skupina';
$TEXT['HEADER'] = 'Záhlavie';
$TEXT['HEADING'] = 'Záhlavie';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Výška';
$TEXT['HIDDEN'] = 'Skrytá';
$TEXT['HIDE'] = 'Skryť';
$TEXT['HIDE_ADVANCED'] = 'Skryť pokročilé voľby';
$TEXT['HOME'] = 'Domov';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Presmerovanie hlavnej stránky';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Hostiteľ';
$TEXT['ICON'] = 'Ikona';
$TEXT['IMAGE'] = 'Obrázok';
$TEXT['INLINE'] = 'In-line';
$TEXT['INSTALL'] = 'Inštalovat';
$TEXT['INSTALLATION'] = 'Inštalácia';
$TEXT['INSTALLATION_PATH'] = 'Cesta inštalácie';
$TEXT['INSTALLATION_URL'] = 'URL inštalácia';
$TEXT['INSTALLED'] = 'Nainštalované';
$TEXT['INTRO'] = 'Intro';
$TEXT['INTRO_PAGE'] = 'Úvodná (intro) stránka';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Kľúčové slová';
$TEXT['LANGUAGE'] = 'Jazyk';
$TEXT['LAST_UPDATED_BY'] = 'Posledná  zmena:';
$TEXT['LENGTH'] = 'Dĺžka';
$TEXT['LEVEL'] = 'Úroveň';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Odkaz';
$TEXT['LINUX_UNIX_BASED'] = 'Založený na Linux/Unix';
$TEXT['LIST_OPTIONS'] = 'Zoznam volieb';
$TEXT['LOGGED_IN'] = 'prihlásenie';
$TEXT['LOGIN'] = 'Prihlásiť';
$TEXT['LONG'] = 'Dlhý popis';
$TEXT['LONG_TEXT'] = 'Dlhý text';
$TEXT['LOOP'] = 'Telo';
$TEXT['MAIN'] = 'Hlavný';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Spravovať';
$TEXT['MANAGE_GROUPS'] = 'Spravovať skupiny';
$TEXT['MANAGE_USERS'] = 'Spravovať uživateľov';
$TEXT['MATCH'] = 'Zhoda';
$TEXT['MATCHING'] = 'Zodpovedajúci';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. počet odoslaných za hodinu';
$TEXT['MEDIA_DIRECTORY'] = 'Adresár médií';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Titulok menu';
$TEXT['MESSAGE'] = 'Správa';
$TEXT['MODIFY'] = 'Zmeniť';
$TEXT['MODIFY_CONTENT'] = 'Zmeniť obsah';
$TEXT['MODIFY_SETTINGS'] = 'Zmeniť nastavenie';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Oprávnenie k modulom';
$TEXT['MORE'] = 'Viacej';
$TEXT['MOVE_DOWN'] = 'Posunúť dole';
$TEXT['MOVE_UP'] = 'Posunúť nahor';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Viacnásobné menu';
$TEXT['MULTISELECT'] = 'Viacnásobné výberové pole';
$TEXT['NAME'] = 'Názov';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Chcete sa prihlásiť?';
$TEXT['NEW_PASSWORD'] = 'Nové heslo';
$TEXT['NEW_WINDOW'] = 'nového okna';
$TEXT['NEXT'] = 'Nasledujúci';
$TEXT['NEXT_PAGE'] = 'Nasledujúca stránka';
$TEXT['NO'] = 'Nie';
$TEXT['NONE'] = 'Nie je';
$TEXT['NONE_FOUND'] = 'Nič sa nenašlo';
$TEXT['NOT_FOUND'] = 'Nenájdene';
$TEXT['NOT_INSTALLED'] = 'Nenainštalované';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Žiadny výsledok';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'Z';
$TEXT['ON'] = 'Na';
$TEXT['OPEN'] = 'Otvoriť';
$TEXT['OPTION'] = 'Voľby';
$TEXT['OTHERS'] = 'Ostatný';
$TEXT['OUT_OF'] = 'Z';
$TEXT['OVERWRITE_EXISTING'] = 'Prepísať existujúci';
$TEXT['PAGE'] = 'Stránka';
$TEXT['PAGES_DIRECTORY'] = 'Adresár stránok';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Prípona stránok';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Jazykové verzie stránok';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limit úrovne stránok';
$TEXT['PAGE_SPACER'] = 'Znak medzery';
$TEXT['PAGE_TITLE'] = 'Titulok stránky';
$TEXT['PAGE_TRASH'] = 'Kôš stránok';
$TEXT['PARENT'] = 'Nadradený';
$TEXT['PASSWORD'] = 'Heslo';
$TEXT['PATH'] = 'Cesta';
$TEXT['PHP_ERROR_LEVEL'] = 'Úroveň hlásenia chýb PHP';
$TEXT['PLEASE_LOGIN'] = 'Prosím prihláste sa';
$TEXT['PLEASE_SELECT'] = 'Vyberte prosím';
$TEXT['POST'] = 'príspevok';
$TEXT['POSTS_PER_PAGE'] = 'Príspevky na stránku';
$TEXT['POST_FOOTER'] = 'Zápätie príspevku';
$TEXT['POST_HEADER'] = 'Záhlavie príspevku';
$TEXT['PREVIOUS'] = 'Predchádzajúci';
$TEXT['PREVIOUS_PAGE'] = 'Predchádzajúca stránka';
$TEXT['PRIVATE'] = 'Súkromná';
$TEXT['PRIVATE_VIEWERS'] = 'Oprávnenie k prezeraniu';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Verejná';
$TEXT['PUBL_END_DATE'] = 'Konečný dátum';
$TEXT['PUBL_START_DATE'] = 'Počiatočný dátum';
$TEXT['RADIO_BUTTON_GROUP'] = 'Skupina radio-polí';
$TEXT['READ'] = 'Čítanie';
$TEXT['READ_MORE'] = 'čítaj viac...';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Pre registrovaných';
$TEXT['REGISTERED_VIEWERS'] = 'Oprávnenie k prezeraniu';
$TEXT['RELOAD'] = 'Obnoviť';
$TEXT['REMEMBER_ME'] = 'Zapamätať údaje';
$TEXT['RENAME'] = 'Premenovať.';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Povinný';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Vyčistiť';
$TEXT['RESIZE'] = 'Zmena veľkosti';
$TEXT['RESIZE_IMAGE_TO'] = 'Zmeniť veľkosť obrázku na';
$TEXT['RESTORE'] = 'Obnova zo zálohy';
$TEXT['RESTORE_DATABASE'] = 'Obnoviť databázu zo zálohy';
$TEXT['RESTORE_MEDIA'] = 'Obnoviť média zo zálohy';
$TEXT['RESULTS'] = 'Výsledky';
$TEXT['RESULTS_FOOTER'] = 'Zápätie výsledkov';
$TEXT['RESULTS_FOR'] = 'Výsledky pre';
$TEXT['RESULTS_HEADER'] = 'Záhlavie výsledkov';
$TEXT['RESULTS_LOOP'] = 'Položka výsledkov';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Znovu nové heslo';
$TEXT['RETYPE_PASSWORD'] = 'Znovu heslo';
$TEXT['SAME_WINDOW'] = 'pôvodného okna';
$TEXT['SAVE'] = 'Uložiť';
$TEXT['SEARCH'] = 'Vyhľadávanie';
$TEXT['SEARCHING'] = 'Vyhľadávanie';
$TEXT['SECTION'] = 'Sekcia';
$TEXT['SECTION_BLOCKS'] = 'Bloky sekcií';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Výberové pole';
$TEXT['SEND_DETAILS'] = 'Zaslať prihlasovanie údaje';
$TEXT['SEPARATE'] = 'Oddelene';
$TEXT['SEPERATOR'] = 'Oddeľovač';
$TEXT['SERVER_EMAIL'] = 'Sytémový e-mail';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Operačný systém serveru';
$TEXT['SESSION_IDENTIFIER'] = 'Identifikátor session';
$TEXT['SETTINGS'] = 'Nastavenie';
$TEXT['SHORT'] = 'Krátky popis';
$TEXT['SHORT_TEXT'] = 'Krátký text';
$TEXT['SHOW'] = 'Zobraziť';
$TEXT['SHOW_ADVANCED'] = 'Zobraziť pokročilé voľby';
$TEXT['SIGNUP'] = 'Registrácia';
$TEXT['SIZE'] = 'Veľkosť';
$TEXT['SMART_LOGIN'] = 'Múdre prihlásenie';
$TEXT['START'] = 'Štart';
$TEXT['START_PUBLISHING'] = 'Začiatok publikácie';
$TEXT['SUBJECT'] = 'Predmet';
$TEXT['SUBMISSIONS'] = 'Odoslané formuláre';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Odoslané formuláre';
$TEXT['SUBMISSION_ID'] = 'ID formuláre';
$TEXT['SUBMITTED'] = 'Odoslané';
$TEXT['SUCCESS'] = 'Úspešne prevedené';
$TEXT['SYSTEM_DEFAULT'] = 'Implicitné v systéme';
$TEXT['SYSTEM_PERMISSIONS'] = 'Systémové oprávnenie';
$TEXT['TABLE_PREFIX'] = 'Prefix tabuliek';
$TEXT['TARGET'] = 'Smeruje do';
$TEXT['TARGET_FOLDER'] = 'Cieľový adresár';
$TEXT['TEMPLATE'] = 'Šablona';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Práva k šablone';
$TEXT['TEXT'] = 'Text';
$TEXT['TEXTAREA'] = 'Vstupné pole';
$TEXT['TEXTFIELD'] = 'Vstupný riadok';
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
$TEXT['TITLE'] = 'Názov';
$TEXT['TO'] = 'na';
$TEXT['TOP_FRAME'] = 'vrchného rámu';
$TEXT['TRASH_EMPTIED'] = 'Kôš vyprázdnený';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Typ';
$TEXT['UNDER_CONSTRUCTION'] = 'Vo výstavbe';
$TEXT['UNINSTALL'] = 'Odinštalovat';
$TEXT['UNKNOWN'] = 'Neznámý';
$TEXT['UNLIMITED'] = 'Neobmedzený';
$TEXT['UNZIP_FILE'] = 'Nahraj a rozbaľ zip súbor';
$TEXT['UP'] = 'Nahor';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Nahrať súbor(y)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Užívateľ';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Verifikácia';
$TEXT['VERSION'] = 'Verzia';
$TEXT['VIEW'] = 'Zobraziť';
$TEXT['VIEW_DELETED_PAGES'] = 'Zobraziť vymazané stránky';
$TEXT['VIEW_DETAILS'] = 'Zobraziť';
$TEXT['VISIBILITY'] = 'Viditeľnosť';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Prednastavený E-Mail odosielatela';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Prednastavené meno odosielatela';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Please specify a default FROM address and SENDER name below. It is recommended to use a FROM address like: <strong>admin@yourdomain.com</strong>. Some mail provider (e.g. <em>mail.com</em>) may reject mails with a FROM: address like <em>name@mail.com</em> sent via a foreign relay to avoid spam.<br /><br />The default values are only used if no other values are specified by WebsiteBaker. If your server supports <acronym title="Simple mail transfer protocol">SMTP</acronym>, you may want use this option for outgoing mails.';
$TEXT['WBMAILER_FUNCTION'] = 'Spôsob odoslania e-mailu';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Settings:</strong><br />The settings below are only required if you want to send mails via <acronym title=Simple mail transfer protocol>SMTP</acronym>. If you do not know your SMTP host or you are not sure about the required settings, simply stay with the default mail routine: PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'PHP skript';
$TEXT['WBMAILER_SMTP'] = 'SMTP server';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Overenie';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'only activate if your SMTP host requires authentification';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP server';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP heslo';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Loginname';
$TEXT['WEBSITE'] = 'WWW';
$TEXT['WEBSITE_DESCRIPTION'] = 'Popis webu';
$TEXT['WEBSITE_FOOTER'] = 'Zápätie webu';
$TEXT['WEBSITE_HEADER'] = 'Záhlavie webu';
$TEXT['WEBSITE_KEYWORDS'] = 'Kľúčové slová';
$TEXT['WEBSITE_TITLE'] = 'Názov webu';
$TEXT['WELCOME_BACK'] = 'Vitajte';
$TEXT['WIDTH'] = 'Šírka';
$TEXT['WINDOW'] = 'Okno';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Práva zápisu "pre celý svet"';
$TEXT['WRITE'] = 'Zápis';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG editor';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG styl';
$TEXT['YES'] = 'Ano';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Nie sú splnené požiadavky pre rozšírenie';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Pridať skupinu';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Pridať záhlavie';
$HEADING['ADD_PAGE'] = 'Pridať stránku';
$HEADING['ADD_USER'] = 'Pridať užívateľov';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administračné nástroje';
$HEADING['BROWSE_MEDIA'] = 'Prehliadač médií';
$HEADING['CREATE_FOLDER'] = 'Vytvoriť adresár';
$HEADING['DEFAULT_SETTINGS'] = 'Implicitné nastavenie';
$HEADING['DELETED_PAGES'] = 'Vymazané stránky';
$HEADING['FILESYSTEM_SETTINGS'] = 'Nastavenie systému súborov';
$HEADING['GENERAL_SETTINGS'] = 'Obecné nastavenie';
$HEADING['INSTALL_LANGUAGE'] = 'Nainštalovat jazyk';
$HEADING['INSTALL_MODULE'] = 'Nainštalovat modul';
$HEADING['INSTALL_TEMPLATE'] = 'Nainštalovat šablonu';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Spustite  inštaláciu modulu ručne';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Detaily jazyka';
$HEADING['MANAGE_SECTIONS'] = 'Spravovať sekcie';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Zmeniť pokročilé nastavenie stránky';
$HEADING['MODIFY_DELETE_GROUP'] = 'Zmeniť/Vymazať skupinu';
$HEADING['MODIFY_DELETE_PAGE'] = 'Zmenit/Vymazať stránku';
$HEADING['MODIFY_DELETE_USER'] = 'Zmeniť/Vymazať užívatelov';
$HEADING['MODIFY_GROUP'] = 'Zmeniť skupinu';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Zmeniť úvodnú (intro) stránku';
$HEADING['MODIFY_PAGE'] = 'Upraviť stránku';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Zmeniť nastavenie stránky';
$HEADING['MODIFY_USER'] = 'Zmeniť užívatelov';
$HEADING['MODULE_DETAILS'] = 'Detaily modulu';
$HEADING['MY_EMAIL'] = 'Môj e-mail';
$HEADING['MY_PASSWORD'] = 'Moje heslo';
$HEADING['MY_SETTINGS'] = 'Moje nastavenie';
$HEADING['SEARCH_SETTINGS'] = 'Nastavenie vyhľadávania';
$HEADING['SERVER_SETTINGS'] = 'Nastavenie serveru';
$HEADING['TEMPLATE_DETAILS'] = 'Detaily šablony';
$HEADING['UNINSTALL_LANGUAGE'] = 'Odinštalovat jazyk';
$HEADING['UNINSTALL_MODULE'] = 'Odinštalovat modul';
$HEADING['UNINSTALL_TEMPLATE'] = 'Odištalovat šablonu';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Nahrať súbor(y)';
$HEADING['WBMAILER_SETTINGS'] = 'Nastavenia E-Mailu';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Nedostatočné oprávnenie';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Heslo nemôže byť prenastavené viackrát  behom jednej hodiny';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Nejde odoslať  heslo e-mailom, kontaktujte prosím správcu systému';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Zadaná e-mailová adresa alebola nájdená';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Zadajte svoju e-mailovou adresu:';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Nemáte oprávnenie prezerať túto stránku';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Už nainštalované';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Nedá sa zapisovat do cielového adresára';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nedá sa odinštalovať';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nedá sa odinštalovať: súbor je práve používaný';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> nedá sa odinštalovať, pretože sa používa na {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'táto stránka; tieto stránky';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Nemôžeťe odinštalovať šablónu <b>{{name}}</b>, pretože je nastavená ako predvolená šablóna!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Nedá sa rozbaliť (rozzipovať) súbor';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Nedá sa nahrať súbor';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Došlo k chybe pri otvaraní súboru.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Nahrávané súbory musia byť následujúceho formátu:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Nahrávaný soubor musí mať jeden z následujúcích formátov:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Prosím vraťte se späť a vyplňte všetky polia';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Inštalácia prebehla úspešne';
$MESSAGE['GENERIC_INVALID'] = 'Nahrávaný súbor je neplatný';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nenainštalované';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Čekejte prosím, operacia môže chvíľu trvať.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Prosím, navštívte nás neskôr...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Odinštalácia prebehla úspešne';
$MESSAGE['GENERIC_UPGRADED'] = 'Aktualizácia prebehla úspešne';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Stránky sa momentálne pripravujú';
$MESSAGE['GROUPS_ADDED'] = 'Skupina bola úspešne pridaná';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Ste si isti, že chcete zmazať túto skupimu (a všetkých jej uživatelov)?';
$MESSAGE['GROUPS_DELETED'] = 'Skupina bola úspešne zmazaná';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Názov skupiny je prázdny';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Tato skupina už existuje';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Nenájdená žiadná skupina';
$MESSAGE['GROUPS_SAVED'] = 'Skupina bola úspešne uložená';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Zadejte svoje heslo';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Zadané heslo je príliš dlhé';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Zadané heslo je príliš krátke';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Nezadali ste príponu súboru';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Nezadali ste nový názov';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nedá sa zmazať vybraný adresár';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nedá sa zmazať vybraný soubor';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Premenovanie sa nepodarilo';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Ste si istí, že chcete zmazať následujúce súbory alebo adresáre?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Adresár bol úspešne zmazaný';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Súbor bol úspešne zmazaný';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Adresár neexistuje';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nejde použiť ../ v názve adresára';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Adresár z rovnakým názvem už existuje';
$MESSAGE['MEDIA_DIR_MADE'] = 'Adresár bol úspešne vytvorený';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Nedá sa vytvoriť adresár';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Súbor z rovnakým názvom už existuje';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Súbor nenájdený';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nejde použiť ../ v názvu';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nejde použiť index.php ako názov';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nenájdený žiadný súbor';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Premenovanie prebehlo úspešne';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' súbor bol úspešne nahraný';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Nejde použiť ../ v cielovom adresáry';
$MESSAGE['MEDIA_UPLOADED'] = ' súbory boly úspešne nahráné';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Ospravedlňujeme sa, ale tento formulár dosiahol limitu povolených odeslaní pre túto hodinu. Prosím skúste to znovu v dalšiej hodine..';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Kontrolný kód (známý ako Captcha) nezodpovedá. Pokiaľ máte problémy s prečítaním tohoto kódu, kontaktujte <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Musíte vyplniť následujúce pole';
$MESSAGE['PAGES_ADDED'] = 'Stránka bola úspešne pridaná';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Záhlavie stránky bolo úspešne pridané';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Zadajte názov v menu';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Zadajte názov stránky';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Došlo k chybe pri vytváraní prístupového súboru v adresári stránok (nedostatočné oprávnenie)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Došlo k chybe pri mazání prísupového súboru v adresári stránek (nedostatočné oprávnenie)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Došlo k chybe pri zmene poradia stránky';
$MESSAGE['PAGES_DELETED'] = 'Stránka bola úspešne zmazaná';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Ste si istí, že chcete zmazať tuto stránku (a všetky podstránky)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nemáte oprávnenie k zmene tejto stránky';
$MESSAGE['PAGES_INTRO_LINK'] = 'Zmeniť úvodnú (intro) stránku';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nedá sa zapisovať do súboru /pages/intro.php (nedostatočné oprávnenia)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Stránka bola úspešne uložená';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Posledná zmena:';
$MESSAGE['PAGES_NOT_FOUND'] = 'Stránka nenájdená';
$MESSAGE['PAGES_NOT_SAVED'] = 'Došlo k chybe pri ukládání stránky';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Stránka z rovnakým alebo podobným názvom už existuje';
$MESSAGE['PAGES_REORDERED'] = 'Stránka bola úspešne presunutá';
$MESSAGE['PAGES_RESTORED'] = 'Stránka bola úspešne obnovená';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Späť na stránky';
$MESSAGE['PAGES_SAVED'] = 'Stránka bola úspešne uložena';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Nastavenie stránky bolo úspešne uložené';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Nastavenia sekcie boli úspešne uložené';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Súčasné heslo nezodpovedá';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detaily boly úspešne uložené';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail bol úspešne uložený';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Heslo bolo úspešne zmenené';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Pozn.: stlačením tohto tlačítka dôjde k zahodeniu neuložených zmien';
$MESSAGE['SETTINGS_SAVED'] = 'Nastavenie bolo úšspene uložené';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Nejde otvori súbor s konfigurciou';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nejde zapisovať do súboru s konfiguráciou';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Pozn.: zapnutie tejto voľby sa doporučuje  len v testovacom prostredí';
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
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Vase prihlasovacie udaje...';
$MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] = 'Many thanks for your registration';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Musíte zadať e-mailovou adresu';
$MESSAGE['START_CURRENT_USER'] = 'Ste prihlásený ako:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Pozor, stále existuje inštalačný adresár!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Vitajte v administratívnej časti';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Pozn.: zmena šablony sa provádza v sekcii Nastavenia';
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
$MESSAGE['USERS_ADDED'] = 'Užívateľ bol úspešne pridaný';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Pozn.: vyplňte iba hodnoty hore pokiaľ si prajete zmeniť heslo';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Ste si istý, že chcete vymazať tohoto užívateľa?';
$MESSAGE['USERS_DELETED'] = 'Užívateľ bol úspešne zmazaný';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Zadaná e-mailová adresa je už používaná';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Zadaná e-mailová adresa je neplatná';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'alebola vybraná skupina';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Zadané heslá nie sú zhodné';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Zadané heslo je príliš krátké';
$MESSAGE['USERS_SAVED'] = 'Užívateľ bol úspešne uložený';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Administračné nástroje...';
$OVERVIEW['GROUPS'] = 'Spravovať skupiny uživatelov a ich oprávnení...';
$OVERVIEW['HELP'] = 'Máte otázku? Hľadajte odpoveď...';
$OVERVIEW['LANGUAGES'] = 'Spravovať jazyky...';
$OVERVIEW['MEDIA'] = 'Spravovať súbory v adresári médií...';
$OVERVIEW['MODULES'] = 'Spravovať moduly...';
$OVERVIEW['PAGES'] = 'Spravovať webové stránky...';
$OVERVIEW['PREFERENCES'] = 'Zmena nastavenia e-mailovej adresy, hesla, atd... ';
$OVERVIEW['SETTINGS'] = 'Zmena nastavenia...';
$OVERVIEW['START'] = 'Administratívny prehlad';
$OVERVIEW['TEMPLATES'] = 'Zmeniť vzhľad a chovanie webu pomocou šablon...';
$OVERVIEW['USERS'] = 'Spravovať uživatelov...';
$OVERVIEW['VIEW'] = 'Rýchlo prezrieť stránky v novom okne...';
