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
$language_code = 'PL';
$language_name = 'Polski';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Marek St&#281;pie&#324;';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Pocz&#261;tek';
$MENU['PAGES'] = 'Strony';
$MENU['MEDIA'] = 'Media';
$MENU['ADDONS'] = 'Dodatki';
$MENU['MODULES'] = 'Modu&#322;y';
$MENU['TEMPLATES'] = 'Szablony';
$MENU['LANGUAGES'] = 'J&#281;zyki';
$MENU['PREFERENCES'] = 'Preferencje';
$MENU['SETTINGS'] = 'Ustawienia';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['ACCESS'] = 'Dost&#281;p';
$MENU['USERS'] = 'U&#380;ytkownicy';
$MENU['GROUPS'] = 'Grupy';
$MENU['HELP'] = 'Pomoc';
$MENU['VIEW'] = 'Podgl&#261;d';
$MENU['LOGOUT'] = 'Wyloguj';
$MENU['LOGIN'] = 'Zaloguj si&#281;';
$MENU['FORGOT'] = 'Odzyskaj dane logowania';

// Section overviews
$OVERVIEW['START'] = 'Panel administracyjny';
$OVERVIEW['PAGES'] = 'Zarz&#261;dzaj stronami...';
$OVERVIEW['MEDIA'] = 'Zarz&#261;dzaj plikami przechowywanymi w folderze medi&oacute;w...';
$OVERVIEW['MODULES'] = 'Zarz&#261;dzaj modu&#322;ami WebsiteBakera...';
$OVERVIEW['TEMPLATES'] = 'Zmie&#324; wygl&#261;d swojej strony za pomoc&#261; szablon&oacute;w...';
$OVERVIEW['LANGUAGES'] = 'Zarz&#261;dzaj j&#281;zykami WebsiteBakera...';
$OVERVIEW['PREFERENCES'] = 'Zmie&#324; preferencje, takie jak adres e-mail, has&#322;o itp... ';
$OVERVIEW['SETTINGS'] = 'Zmie&#324; ustawienia WebsiteBakera...';
$OVERVIEW['USERS'] = 'Zarz&#261;dzaj u&#380;ytkownikami mog&#261;cymi logowa&#263; si&#281; do WebsiteBakera...';
$OVERVIEW['GROUPS'] = 'Zarz&#261;dzaj gropami u&#380;ytkownik&oacute;w i ich uprawnieniami systemowymi...';
$OVERVIEW['HELP'] = 'Masz pytania? Znajd&#378; odpowiedzi...';
$OVERVIEW['VIEW'] = 'Podgl&#261;d witryny w nowym oknie...';
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Zmie&#324;/Usu&#324; stron&#281;';
$HEADING['DELETED_PAGES'] = 'Usuni&#281;te strony';
$HEADING['ADD_PAGE'] = 'Dodaj stron&#281;';
$HEADING['ADD_HEADING'] = 'Dodaj nag&#322;&oacute;wek';
$HEADING['MODIFY_PAGE'] = 'Zmie&#324; stron&#281;';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Zmie&#324; ustawienia strony';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Zmie&#324; zaawansowane ustawienia strony';
$HEADING['MANAGE_SECTIONS'] = 'Zarz&#261;dzaj sekcjami';
$HEADING['MODIFY_INTRO_PAGE'] = 'Zmie&#324; stron&#281; pocz&#261;tkow&#261;';

$HEADING['BROWSE_MEDIA'] = 'Przegl&#261;daj media';
$HEADING['CREATE_FOLDER'] = 'Utw&oacute;rz folder';
$HEADING['UPLOAD_FILES'] = 'Za&#322;aduj plik(i)';

$HEADING['INSTALL_MODULE'] = 'Zainstaluj modu&#322;';
$HEADING['UNINSTALL_MODULE'] = 'Odinstaluj modu&#322;';
$HEADING['MODULE_DETAILS'] = 'Szczeg&oacute;&#322;y modu&#322;u';

$HEADING['INSTALL_TEMPLATE'] = 'Zainstaluj szablon';
$HEADING['UNINSTALL_TEMPLATE'] = 'Odinstaluj szablon';
$HEADING['TEMPLATE_DETAILS'] = 'Szczeg&oacute;&#322;y szablonu';

$HEADING['INSTALL_LANGUAGE'] = 'Zainstaluj j&#281;zyk';
$HEADING['UNINSTALL_LANGUAGE'] = 'Odinstaluj j&#281;zyk';
$HEADING['LANGUAGE_DETAILS'] = 'Szczeg&oacute;&#322;y j&#281;zyka';

$HEADING['MY_SETTINGS'] = 'Moje ustawienia';
$HEADING['MY_EMAIL'] = 'M&oacute;j e-mail';
$HEADING['MY_PASSWORD'] = 'Moje has&#322;o';

$HEADING['GENERAL_SETTINGS'] = 'Ustawienia og&oacute;lne';
$HEADING['DEFAULT_SETTINGS'] = 'Ustawienia domy&#347;lne';
$HEADING['SEARCH_SETTINGS'] = 'Ustawienia wyszukiwania';
$HEADING['FILESYSTEM_SETTINGS'] = 'Ustawienia systemy plik&oacute;w';
$HEADING['SERVER_SETTINGS'] = 'Ustawienia serwera';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';
$HEADING['ADMINISTRATION_TOOLS'] = 'Narz&#281;dzia administracyjne';

$HEADING['MODIFY_DELETE_USER'] = 'Zmie&#324;/usu&#324; u&#380;ytkownika';
$HEADING['ADD_USER'] = 'Dodaj u&#380;ytkownika';
$HEADING['MODIFY_USER'] = 'Zmie&#324; u&#380;ytkownika';

$HEADING['MODIFY_DELETE_GROUP'] = 'Zmie&#324;/usu&#324; grup&#281;';
$HEADING['ADD_GROUP'] = 'Dodaj grup&#281;';
$HEADING['MODIFY_GROUP'] = 'Zmie&#324; grup&#281;';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';

// Other text
$TEXT['OPEN'] = 'Open';
$TEXT['ADD'] = 'Dodaj';
$TEXT['MODIFY'] = 'Zmie&#324;';
$TEXT['SETTINGS'] = 'Ustawienia';
$TEXT['DELETE'] = 'Usu&#324;';
$TEXT['SAVE'] = 'Zapisz';
$TEXT['RESET'] = 'Resetuj';
$TEXT['LOGIN'] = 'Zaloguj';
$TEXT['RELOAD'] = 'Reload';
$TEXT['CANCEL'] = 'Anuluj';
$TEXT['NAME'] = 'Nazwa';
$TEXT['PLEASE_SELECT'] = 'Prosz&#281; wybra&#263;';
$TEXT['TITLE'] = 'Tytu&#322;';
$TEXT['PARENT'] = 'Nadrz&#281;dny';
$TEXT['TYPE'] = 'Rodzaj';
$TEXT['VISIBILITY'] = 'Widoczno&#347;&#263;';
$TEXT['PRIVATE'] = 'Prywatna';
$TEXT['PUBLIC'] = 'Publiczna';
$TEXT['NONE'] = 'Brak';
$TEXT['NONE_FOUND'] = 'Nie odnaleziono';
$TEXT['CURRENT'] = 'Bie&#380;&#261;cy';
$TEXT['CHANGE'] = 'Zmie&#324;';
$TEXT['WINDOW'] = 'Okno';
$TEXT['DESCRIPTION'] = 'Opis';
$TEXT['KEYWORDS'] = 'S&#322;owa kluczowe';
$TEXT['ADMINISTRATORS'] = 'Administratorzy';
$TEXT['PRIVATE_VIEWERS'] = 'Prywatni obserwatorzy';
$TEXT['EXPAND'] = 'Rozwi&#324;';
$TEXT['COLLAPSE'] = 'Zwi&#324;';
$TEXT['MOVE_UP'] = 'Do g&oacute;ry';
$TEXT['MOVE_DOWN'] = 'W d&oacute;&#322;';
$TEXT['RENAME'] = 'Zmie&#324; nazw&#281;';
$TEXT['MODIFY_SETTINGS'] = 'Zmie&#324; ustawienia';
$TEXT['MODIFY_CONTENT'] = 'Zmie&#324; zawarto&#347;&#263;';
$TEXT['VIEW'] = 'Widok';
$TEXT['UP'] = 'G&oacute;ra';
$TEXT['FORGOTTEN_DETAILS'] = 'Zapomnia&#322;e&#347;(-a&#347;) has&#322;a?';
$TEXT['NEED_TO_LOGIN'] = 'Potrzebujesz si&#281; zalogowa&#263;?';
$TEXT['SEND_DETAILS'] = 'Wy&#347;lij szczeg&oacute;&#322;y';
$TEXT['USERNAME'] = 'Nazwa u&#380;ytkownika';
$TEXT['PASSWORD'] = 'Has&#322;o';
$TEXT['HOME'] = 'Strona domowa';
$TEXT['TARGET_FOLDER'] = 'Folder docelowy';
$TEXT['OVERWRITE_EXISTING'] = 'Nadpisz istniej&#261;cy(-e)';
$TEXT['FILE'] = 'plik';
$TEXT['FILES'] = 'pliki';
$TEXT['FOLDER'] = 'folder';
$TEXT['FOLDERS'] = 'foldery';
$TEXT['CREATE_FOLDER'] = 'Utw&oacute;rz folder';
$TEXT['UPLOAD_FILES'] = 'Za&#322;aduj plik(i)';
$TEXT['CURRENT_FOLDER'] = 'Bie&#380;&#261;cy folder';
$TEXT['TO'] = 'Do';
$TEXT['FROM'] = 'Od';
$TEXT['INSTALL'] = 'Zainstaluj';
$TEXT['UNINSTALL'] = 'Odinstaluj';
$TEXT['VIEW_DETAILS'] = 'Poka&#380; szczeg&oacute;&#322;y';
$TEXT['DISPLAY_NAME'] = 'Nazwa';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['VERSION'] = 'Wersja';
$TEXT['DESIGNED_FOR'] = 'Zaprojektowane dla';
$TEXT['DESCRIPTION'] = 'Opis';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'J&#281;zyk';
$TEXT['TIMEZONE'] = 'Strefa czasowa';
$TEXT['CURRENT_PASSWORD'] = 'Bie&#380;&#261;ce has&#322;o';
$TEXT['NEW_PASSWORD'] = 'Nowe has&#322;o';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Powt&oacute;rz nowe has&#322;o';
$TEXT['ACTIVE'] = 'Aktywne';
$TEXT['DISABLED'] = 'Wy&#322;&#261;czone';
$TEXT['ENABLED'] = 'W&#322;&#261;czone';
$TEXT['RETYPE_PASSWORD'] = 'Powt&oacute;rz has&#322;o';
$TEXT['GROUP'] = 'Grupa';
$TEXT['SYSTEM_PERMISSIONS'] = 'Uprawnienia systemowe';
$TEXT['MODULE_PERMISSIONS'] = 'Uprawnienia do modu&#322;&oacute;w';
$TEXT['SHOW_ADVANCED'] = 'Wy&#347;wietl opcje zaawansowane';
$TEXT['HIDE_ADVANCED'] = 'Schowaj opcje zaawansowane';
$TEXT['BASIC'] = 'Podstawowe';
$TEXT['ADVANCED'] = 'Zaawansowane';
$TEXT['WEBSITE'] = 'Witryna';
$TEXT['DEFAULT'] = 'Domy&#347;lne';
$TEXT['KEYWORDS'] = 'S&#322;owa kluczowe';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Nag&#322;&oacute;wek';
$TEXT['FOOTER'] = 'Stopka';
$TEXT['TEMPLATE'] = 'Szablon';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['INSTALLATION'] = 'Instalacja';
$TEXT['DATABASE'] = 'Baza danych';
$TEXT['HOST'] = 'Host';
$TEXT['INTRO'] = 'Intro';
$TEXT['PAGE'] = 'Strona';
$TEXT['SIGNUP'] = 'Zapisz si&#281;';
$TEXT['PHP_ERROR_LEVEL'] = 'Poziom raportowania b&#322;&#281;d&oacute;w PHP';
$TEXT['ADMIN'] = 'Administrator';
$TEXT['PATH'] = '&#346;cie&#380;ka';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Panel przedni';
$TEXT['EXTENSION'] = 'Rozszerzenie';
$TEXT['TABLE_PREFIX'] = 'Przedrostek tabeli';
$TEXT['CHANGES'] = 'Zmiany';
$TEXT['ADMINISTRATION'] = 'Administracja';
$TEXT['FORGOT_DETAILS'] = 'Zapomnia&#322;e&#347;(-a&#347;) szczeg&oacute;&#322;&oacute;w?';
$TEXT['LOGGED_IN'] = 'Zalogowany';
$TEXT['WELCOME_BACK'] = 'Witamy ponownie';
$TEXT['FULL_NAME'] = 'Imi&#281; i nazwisko';
$TEXT['ACCOUNT_SIGNUP'] = 'Nowe konto';
$TEXT['LINK'] = 'Odno&#347;nik';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['TARGET'] = 'Cel';
$TEXT['NEW_WINDOW'] = 'Nowe okno';
$TEXT['SAME_WINDOW'] = 'To samo okno';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limit poziom&oacute;w stron';
$TEXT['SUCCESS'] = 'Sukces';
$TEXT['ERROR'] = 'B&#322;&#261;d';
$TEXT['ARE_YOU_SURE'] = 'Czy aby na pewno?';
$TEXT['YES'] = 'Tak';
$TEXT['NO'] = 'Nie';
$TEXT['SYSTEM_DEFAULT'] = 'Domy&#347;lne ustawienia systemu';
$TEXT['PAGE_TITLE'] = 'Tytu&#322; strony';
$TEXT['MENU_TITLE'] = 'Tytu&#322; menu';
$TEXT['ACTIONS'] = 'Czynno&#347;ci';
$TEXT['UNKNOWN'] = 'Nieznany';
$TEXT['BLOCK'] = 'Blokuj';
$TEXT['SEARCH'] = 'Szukaj';
$TEXT['SEARCHING'] = 'Wyszukiwanie';
$TEXT['POST'] = 'Wiadomo&#347;&#263;';
$TEXT['COMMENT'] = 'Komentarz';
$TEXT['COMMENTS'] = 'Komentarze';
$TEXT['COMMENTING'] = 'Komentowanie';
$TEXT['SHORT'] = 'Kr&oacute;tki';
$TEXT['LONG'] = 'D&#322;ugi';
$TEXT['LOOP'] = 'P&#281;tla';
$TEXT['FIELD'] = 'Pole';
$TEXT['REQUIRED'] = 'Wymagany';
$TEXT['LENGTH'] = 'D&#322;ugo&#347;&#263;';
$TEXT['MESSAGE'] = 'Wiadomo&#347;&#263;';
$TEXT['SUBJECT'] = 'Temat';
$TEXT['MATCH'] = 'Dopasuj';
$TEXT['ALL_WORDS'] = 'Wszystkie s&#322;owa';
$TEXT['ANY_WORDS'] = 'Dowolne ze s&#322;&oacute;w';
$TEXT['EXACT_MATCH'] = 'Dopasowanie dok&#322;adne';
$TEXT['SHOW'] = 'Wy&#347;wietl';
$TEXT['HIDE'] = 'Schowaj';
$TEXT['START_PUBLISHING'] = 'Rozpocznij publikowanie';
$TEXT['FINISH_PUBLISHING'] = 'Zako&#324;cz publikowanie';
$TEXT['DATE'] = 'Data';
$TEXT['START'] = 'Start';
$TEXT['END'] = 'Koniec';
$TEXT['IMAGE'] = 'Obrazek';
$TEXT['ICON'] = 'Ikona';
$TEXT['SECTION'] = 'Sekcja';
$TEXT['DATE_FORMAT'] = 'Format daty';
$TEXT['TIME_FORMAT'] = 'Format czasu';
$TEXT['RESULTS'] = 'Wyniki';
$TEXT['RESIZE'] = 'Zmie&#324; rozmiar';
$TEXT['MANAGE'] = 'Zarz&#261;dzaj';
$TEXT['CODE'] = 'Kod';
$TEXT['WIDTH'] = 'Szeroko&#347;&#263;';
$TEXT['HEIGHT'] = 'Wysoko&#347;&#263;';
$TEXT['MORE'] = 'Wi&#281;cej';
$TEXT['READ_MORE'] = 'Czytaj dalej';
$TEXT['CHANGE_SETTINGS'] = 'Zmie&#324; ustawienia';
$TEXT['CURRENT_PAGE'] = 'Bie&#380;&#261;ca strona';
$TEXT['CLOSE'] = 'Zamknij';
$TEXT['INTRO_PAGE'] = 'Strona wprowadzaj&#261;ca';
$TEXT['INSTALLATION_URL'] = 'URL instalacji';
$TEXT['INSTALLATION_PATH'] = '&#346;cie&#380;ka instalacju';
$TEXT['PAGE_EXTENSION'] = 'Rozszerzenie strony';
$TEXT['NO_RESULTS'] = 'Brak wynik&oacute;w';
$TEXT['WEBSITE_TITLE'] = 'Tytu&#322; witryny';
$TEXT['WEBSITE_DESCRIPTION'] = 'Opis witryny';
$TEXT['WEBSITE_KEYWORDS'] = 'S&#322;owa kluczowe witryny';
$TEXT['WEBSITE_HEADER'] = 'Nag&#322;&oacute;wek witryny';
$TEXT['WEBSITE_FOOTER'] = 'Stopka witryny';
$TEXT['RESULTS_HEADER'] = 'Nag&#322;&oacute;wek wynik&oacute;w';
$TEXT['RESULTS_LOOP'] = 'P&#281;tla wynik&oacute;w';
$TEXT['RESULTS_FOOTER'] = 'Stopka wynik&oacute;w';
$TEXT['LEVEL'] = 'Poziom';
$TEXT['NOT_FOUND'] = 'Nie odnaleziono';
$TEXT['PAGE_SPACER'] = 'Spacer strony';
$TEXT['MATCHING'] = 'Pasuj&#261;ce';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Uprawnienia szablon&oacute;w';
$TEXT['PAGES_DIRECTORY'] = 'Katalog stron';
$TEXT['MEDIA_DIRECTORY'] = 'Katalog medi&oacute;w';
$TEXT['FILE_MODE'] = 'Tryb plikw';
$TEXT['USER'] = 'U&#380;ytkownik';
$TEXT['OTHERS'] = 'Inni';
$TEXT['READ'] = 'Odczytaj';
$TEXT['WRITE'] = 'Zapisz';
$TEXT['EXECUTE'] = 'Wykonaj';
$TEXT['SMART_LOGIN'] = 'Inteligentne logowanie';
$TEXT['REMEMBER_ME'] = 'Zapami&#281;taj mnie';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Uprawnienia systemu plik&oacute;w';
$TEXT['DIRECTORIES'] = 'Katalogi';
$TEXT['DIRECTORY_MODE'] = 'Tryb katalog&oacute;w';
$TEXT['LIST_OPTIONS'] = 'Listuj opcje';
$TEXT['OPTION'] = 'Opcja';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Pozw&oacute;l na wielokrotne wybory';
$TEXT['TEXTFIELD'] = 'Pole tekstowe';
$TEXT['TEXTAREA'] = 'Obszar tekstowy';
$TEXT['SELECT_BOX'] = 'Pole wyboru';
$TEXT['CHECKBOX_GROUP'] = 'Grupa p&oacute;l zaznaczanych';
$TEXT['RADIO_BUTTON_GROUP'] = 'Grupa p&oacute;l prze&#322;&#261;czanych';
$TEXT['SIZE'] = 'Rozmiar';
$TEXT['DEFAULT_TEXT'] = 'Domy&#347;lny tekst';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['BACK'] = 'Wstecz';
$TEXT['UNDER_CONSTRUCTION'] = 'W trakcie tworzenia';
$TEXT['MULTISELECT'] = 'Wyb&oacute;r wielokrotny';
$TEXT['SHORT_TEXT'] = 'Kr&oacute;tki tekst';
$TEXT['LONG_TEXT'] = 'D&#322;ugi tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Przekierowanie strony domowej';
$TEXT['HEADING'] = 'Nag&#322;&oacute;wek';
$TEXT['MULTIPLE_MENUS'] = 'Wielokrotne menu';
$TEXT['REGISTERED'] = 'Zarejestrowany';
$TEXT['SECTION_BLOCKS'] = 'Bloki sekcji';
$TEXT['REGISTERED_VIEWERS'] = 'Zarejestrowani obserwatorzy';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers';
$TEXT['SUBMISSION_ID'] = 'ID zg&#322;oszenia';
$TEXT['SUBMISSIONS'] = 'Zg&#322;oszenia';
$TEXT['SUBMITTED'] = 'Zg&#322;oszone';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maks. zg&#322;osze&#324; na godzin&#281;';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Zg&#322;oszenia przechowywane w bazie danych';
$TEXT['EMAIL_ADDRESS'] = 'Adres e-mail';
$TEXT['CUSTOM'] = 'W&#322;asny';
$TEXT['ANONYMOUS'] = 'Anonimowy';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'System operacyjny serwera';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Uprawnienia zapisywania plik&oacute;w przez wszystkich';
$TEXT['LINUX_UNIX_BASED'] = 'oparty na Linux/Unix';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Folder domowy';
$TEXT['HOME_FOLDERS'] = 'Foldery domowe';
$TEXT['PAGE_TRASH'] = '&#346;mietnik stron';
$TEXT['INLINE'] = 'Inline';
$TEXT['SEPARATE'] = 'Osobno';
$TEXT['DELETED'] = 'Usuni&#281;te';
$TEXT['VIEW_DELETED_PAGES'] = 'Wy&#347;wietl usuni&#281;te strony';
$TEXT['EMPTY_TRASH'] = 'Opr&oacute;&#380;nij &#347;mietnik';
$TEXT['TRASH_EMPTIED'] = '&#346;mietnik opr&oacute;&#380;niony';
$TEXT['ADD_SECTION'] = 'Dodaj sekcj&#281;';
$TEXT['POST_HEADER'] = 'Nag&#322;&oacute;wek wiadomo&#347;ci';
$TEXT['POST_FOOTER'] = 'Stopka wiadomo&#347;ci';
$TEXT['POSTS_PER_PAGE'] = 'Wiadomo&#347;ci na stron&#281;';
$TEXT['RESIZE_IMAGE_TO'] = 'Zmie&#324; rozmiar obrazk&oacute;w na';
$TEXT['UNLIMITED'] = 'Nieograniczony';
$TEXT['OF'] = 'z';
$TEXT['OUT_OF'] = 'spoza';
$TEXT['NEXT'] = 'Nast&#281;pny';
$TEXT['PREVIOUS'] = 'Poprzedni';
$TEXT['NEXT_PAGE'] = 'Nast&#281;pna strona';
$TEXT['PREVIOUS_PAGE'] = 'Poprzednia strona';
$TEXT['ON'] = 'dnia';
$TEXT['LAST_UPDATED_BY'] = 'Ostatnio zmienione przez';
$TEXT['RESULTS_FOR'] = 'Wyniki dla';
$TEXT['TIME'] = 'Czas';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['WYSIWYG_STYLE'] = 'Styl WYSIWYG';
$TEXT['WYSIWYG_EDITOR'] = 'Edytor WYSIWYG';
$TEXT['SERVER_EMAIL'] = 'E-mail serwera';
$TEXT['MENU'] = 'Menu';
$TEXT['MANAGE_GROUPS'] = 'Zarz&#261;dzaj grupami';
$TEXT['MANAGE_USERS'] = 'Zarz&#261;dzaj u&#380;ytkownikami';
$TEXT['PAGE_LANGUAGES'] = 'J&#281;zyki stron';
$TEXT['HIDDEN'] = 'Ukryty';
$TEXT['MAIN'] = 'G&#322;&oacute;wny';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Zmie&#324; nazwy plik&oacute;w przy za&#322;adowywaniu';
$TEXT['APP_NAME'] = 'Nazwa aplikacju';
$TEXT['SESSION_IDENTIFIER'] = 'Identyfikator sesji';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['BACKUP'] = 'Kopia zapasowa';
$TEXT['RESTORE'] = 'Przywr&oacute;&#263;';
$TEXT['BACKUP_DATABASE'] = 'Kopia zapasowa bazy danych';
$TEXT['RESTORE_DATABASE'] = 'Przywr&oacute;&#263; baz&#281; danych';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables';
$TEXT['BACKUP_MEDIA'] = 'Kopia zapasowa medi&oacute;w';
$TEXT['RESTORE_MEDIA'] = 'Przywr&oacute;&#263; media';
$TEXT['ADMINISTRATION_TOOL'] = 'Narz&#281;dzie administracyjne';
$TEXT['CAPTCHA_VERIFICATION'] = 'Weryfikacja Captcha';
$TEXT['VERIFICATION'] = 'Weryfikacja';
$TEXT['DEFAULT_CHARSET'] = 'Domy&#347;lne kodowanie znak&oacute;w';
$TEXT['CHARSET'] = 'Kodowanie znak&oacute;w';
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
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Niestety, nie masz uprawnie&#324; do ogl&#261;dania tej strony.';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Niewystarczaj&#261;ce uprawnienia do ogl&#261;dania tej strony.';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Prosz&#281; wprowadzi&#263; poni&#380;ej swoj&#261; nazw&#281; u&#380;ytkownika i has&#322;o';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Prosz&#281; wprowadzi&#263; nazw&#281; u&#380;ytkownika';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Prosz&#281; wprowadzi&#263; has&#322;o';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Wprowadzona nawa u&#380;ytkownika zbyt kr&oacute;tka';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Wprowadzone has&#322;o zbyt kr&oacute;tkie';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Wprowadzona nazwa u&#380;ytkownika zbyt d&#322;uga';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Wprowadzone has&#322;o zbyt kr&oacute;tkie';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Nieprawid&#322;owa nazwa u&#380;ytkownika lub has&#322;o';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'Nale&#380;y wprowadzi&#263; adres e-mail';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Prosz&#281; wprowadzi&#263; poni&#380;ej sw&oacute;j adres e-mail';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Wprowadzonego adresu e-mail nie ma w bazie danych';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Nie uda&#322;o si&#281; wys&#322;a&#263; has&#322;a, prosz&#281; si&#281; skontaktowa&#263; z administratorem';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Twoja nazwa u&#380;ytkownika i has&#322;o zosta&#322;y wys&#322;ane na Tw&oacute;j adres e-mail';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Has&#322;o mo&#380;na resetowa&#263; tylko raz na godzin&#281;';

$MESSAGE['START_WELCOME_MESSAGE'] = 'Witamy w panelu administracyjnym WebsiteBakera';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Uwaga: katalog instalacyjny wci&#261;&#380; istnieje!';
$MESSAGE['START_CURRENT_USER'] = 'Jeste&#347; obecnie zalogowany(-a) jako:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Nie mo&#380;na otworzy&#263; pliku konfiguracyjnego';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nie mo&#380;na zapisa&#263; pliku konfiguracyjnego';
$MESSAGE['SETTINGS_SAVED'] = 'Ustawienia zosta&#322;y zapisane';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Uwaga: naci&#347;ni&#281;cie tego przycisku resetuje wszystkie niezapisane zmiany';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Uwaga: to jest zalecane wy&#322;&#261;cznie w &#347;rodowiskach testowych';

$MESSAGE['USERS_ADDED'] = 'U&#380;ytkownik zosta&#322; dodany';
$MESSAGE['USERS_SAVED'] = 'U&#380;ytkownik zosta&#322; zapisany';
$MESSAGE['USERS_DELETED'] = 'U&#380;ytkownik zosta&#322; usuni&#281;ty';
$MESSAGE['USERS_NO_GROUP'] = 'Nie wybrano grupy';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Wprowadzona nazwa u&#380;ytkownika by&#322;a za kr&oacute;tka';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Wprowadzone has&#322;o by&#322;o za kr&oacute;tkie';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Wprowadzone has&#322;a nie pasuj&#261;';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Wprowadzony adres e-mail jest nieprawid&#322;owy';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Wprowadzony adres e-mail jest ju&#380; u&#380;ywany';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Wprowadzona nazwa u&#380;ytkownika jest ju&#380; zaj&#281;ta';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Uwaga: Powy&#380;sze pola nale&#380;y wype&#322;ni&#263; tylko, je&#347;li chce si&#281; zmieni&#263; has&#322;o tego u&#380;ytkownika';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Czy aby na pewno usun&#261;&#263; wybranego u&#380;ytkownika?';

$MESSAGE['GROUPS_ADDED'] = 'Grupa zosta&#322;a dodana';
$MESSAGE['GROUPS_SAVED'] = 'Grupa zosta&#322;a zapisana';
$MESSAGE['GROUPS_DELETED'] = 'Grupa zosta&#322;a usuni&#281;ta';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Nazwa grupy jest pusta';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Czy aby na pewno usun&#261;&#263; wybran&#261; grup&#281; (i wszystkich u&#380;ytkownik&oacute;w, kt&oacute;rzy do niej nale&#380;&#261;)?';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Nie odnaleziono &#380;adnych grup';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Grupa o takiej nazwie ju&#380; istnieje';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Szczeg&oacute;&#322;y zosta&#322;y zapisane';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail zosta&#322; zaktualizowany';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = '(Bie&#380;&#261;ce) has&#322;o jest nieprawid&#322;owe';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Has&#322;o zosta&#322;o zmienione';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Uwaga: aby zmieni&#263; szablon, nale&#380;y przej&#347;&#263; do sekcji Ustawienia';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nazwa folderu nie mo&#380;e zawiera&#263; ../';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Katalog nie istnieje';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Folder docelowy nie mo&#380;e zawiera&#263; ../';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nazwa nie mo&#380;e zawiera&#263; ../';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nie mo&#380;na u&#380;y&#263; index.php jako nazwy';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nie odnaleziono &#380;adnych medi&oacute;w w bie&#380;&#261;cym folderze';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Plik nieodnaleziony';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Plik zosta&#322; usuni&#281;ty';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Folder zosta&#322; usuni&#281;ty';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Czy aby na pewno usun&#261;&#263; nast&#281;puj&#261;ce pliki lub foldery?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nie mo&#380;na usun&#261;&#263; wybranego pliku';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nie mo&#380;na usun&#261;&#263; wybranego folderu';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Nie wprowadzono nazwy u&#380;ytkownika';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Nie wprowadzono rozszerzenia pliku';
$MESSAGE['MEDIA_RENAMED'] = 'Nazwa zosta&#322;a zmieniona';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Nie uda&#322;o si&#281; zmieni&#263; nazwy';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Plik pasuj&#261;cy do wprowadzonej nazwy ju&#380; istnieje';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Folder pasuj&#261;cy do wprowadzonej nazwy ju&#380; istnieje';
$MESSAGE['MEDIA_DIR_MADE'] = 'Folder zosta&#322; utworzony';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Nie uda&#322;o si&#281; utworzy&#263; folderu';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' plik zosta&#322; pomy&#347;lnie za&#322;adowany';
$MESSAGE['MEDIA_UPLOADED'] = ' pliki zosta&#322;y pomy&#347;lnie za&#322;adowane';

$MESSAGE['PAGES_ADDED'] = 'Strona zosta&#322;a dodana';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Nag&#322;&oacute;wek strony zosta&#322; dodany';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Strona o tym lub podobnym tytule ju&#380; istnieje';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'B&#322;&#261;d podczas tworzenia pliku dost&#281;powego w katalogu /pages (niewystarczaj&#261;ce uprawnienia)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'B&#322;&#261;d podczas usuwania pliku dost&#281;powego w katalogu /pages (niewystarczaj&#261;ce uprawnienia)';
$MESSAGE['PAGES_NOT_FOUND'] = 'Strona nie znaleziona';
$MESSAGE['PAGES_SAVED'] = 'Strona zosta&#322;a zapisana';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Ustawienia strony zosta&#322;y zapisane';
$MESSAGE['PAGES_NOT_SAVED'] = 'B&#322;&#261;d podczas zapisywania strony';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Czy aby na pewno usun&#261;&#263; wybran&#261; stron&#281; (i wszystkie jej podstrony)';
$MESSAGE['PAGES_DELETED'] = 'Strona zosta&#322;a usuni&#281;ta';
$MESSAGE['PAGES_RESTORED'] = 'Strona zosta&#322;a przywr&oacute;cona';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Prosz&#281; wprowadzi&#263; tytu&#322; strony';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Prosz&#281; wprowadzi&#263; tytu&#322; menu';
$MESSAGE['PAGES_REORDERED'] = 'Zmieniono kolejno&#347;&#263; stron';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'B&#322;&#261;d podczas zmieniania kolejno&#347;ci stron';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nie masz uprawnie&#324; do modyfikowania tej strony';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nie mo&#380;na zapisa&#263; pliku /pages/intro.php (niewystarczaj&#261;ce uprawnienia)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Strona wprowadzaj&#261;ca zosta&#322;&#261; zapisana';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Ostatnio zmodyfikowane przez';
$MESSAGE['PAGES_INTRO_LINK'] = 'Kliknij TUTAJ by zmieni&#263; stron&#281; wprowadzaj&#261;c&#261;';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'W&#322;a&#347;ciwo&#347;ci sekcji zosta&#322;y zapisane';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Powr&oacute;t do stron';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Prosz&#281; si&#281; cofn&#261;&#263; i wype&#322;ni&#263; wszystkie pola';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Prosz&#281; zwr&oacute;ci&#263; uwag&#281;, &#380;e &#322;adowany plik musi by&#263; w formacie:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Prosz&#281; zwr&oacute;ci&#263; uwag&#281;, &#380;e &#322;adowany plik musi by&#263; w jednym z format&oacute;w:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Nie mo&#380;na za&#322;adowa&#263; pliku';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Ju&#380; zainstalowany';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Niezainstalowany';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nie mo&#380;na odinstalowa&#263;';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Nie mo&#380;na rozpakowa&#263; pliku';
$MESSAGE['GENERIC_INSTALLED'] = 'Zainstalowano pomy&#347;lnie';
$MESSAGE['GENERIC_UPGRADED'] = 'Zaktualizowano pomy&#347;lnie';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Odinstalowano pomy&#347;lnie';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Nie mo&#380;a zapisa&#263; do katalogu docelowego';
$MESSAGE['GENERIC_INVALID'] = 'Za&#322;adowany plik jest nieprawid&#322;owy';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nie mo&#380;na odinstalowa&#263;: wybrany plik jest obecnie u&#380;ywany';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = "<br /><br />{{type}} <b>{{type_name}}</b> nie mo&#380;e by&#263; odinstalowany, poniewa&#380; jest u&#380;ywany przez {{pages}}:<br /><br />";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = "nast&#281;puj&#261;c&#261; stron&#281;;nast&#281;puj&#261;ce strony";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "Szablon <b>{{name}}</b> nie mo&#380;e by&#263; odinstalowany, poniewa&#380; jest ustawiony jako szablon domy&#347;lny!";

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Witryna w trakcie tworzenia';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Zapraszamy wkr&oacute;tce...';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Prosimy o cierpliwo&#347;&#263;, to mo&#380;e troch&#281; potrwa&#263;.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'B&#322;&#261;d podczas otwierania pliku.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Nale&#380;y wprowadzi&#263; szczeg&oacute;&#322;y dla nast&#281;puj&#261;cych p&oacute;l';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Niestety, ten formularz zosta&#322; wys&#322;any zbyt wiele razy w ci&#261;gu tej godziny. Prosimy spr&oacute;bowa&#263; ponownie za godzin&#281;.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Wprowadzony numer weryfikacyjny (tzw. Captcha) jest nieprawid&#322;owy. Je&#347;li masz problemy z odczytaniem Captcha, napisz do: '.SERVER_EMAIL.'';

$MESSAGE['ADDON_RELOAD'] = 'Update database with information from Add-on files (e.g. after FTP upload).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Error while updating the Add-On information.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Modu&#322;y zosta&#322;y za&#322;adowane ponownie';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Szablony zosta&#322;y za&#322;adowane ponownie';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'J&#281;zyki zosta&#322;y za&#322;adowane ponownie';
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