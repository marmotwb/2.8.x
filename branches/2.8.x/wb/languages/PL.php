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
$language_code = 'PL';
$language_name = 'Polski';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Marek Stępień;';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Dostęp';
$MENU['ADDON'] = 'Dodatek';
$MENU['ADDONS'] = 'Dodatki';
$MENU['ADMINTOOLS'] = 'Narzędzia admina';
$MENU['BREADCRUMB'] = 'Jesteś tu: ';
$MENU['FORGOT'] = 'Odzyskaj dane logowania';
$MENU['GROUP'] = 'Groupa';
$MENU['GROUPS'] = 'Grupy';
$MENU['HELP'] = 'Pomoc';
$MENU['LANGUAGES'] = 'Języki';
$MENU['LOGIN'] = 'Zaloguj się';
$MENU['LOGOUT'] = 'Wyloguj';
$MENU['MEDIA'] = 'Media';
$MENU['MODULES'] = 'Moduły';
$MENU['PAGES'] = 'Strony';
$MENU['PREFERENCES'] = 'Preferencje';
$MENU['SETTINGS'] = 'Ustawienia';
$MENU['START'] = 'Początek';
$MENU['TEMPLATES'] = 'Szablony';
$MENU['USERS'] = 'Użytkownicy';
$MENU['VIEW'] = 'Podgląd';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Nowe konto';
$TEXT['ACTIONS'] = 'Czynności';
$TEXT['ACTIVE'] = 'Aktywne';
$TEXT['ADD'] = 'Dodaj';
$TEXT['ADDON'] = 'Dodatek';
$TEXT['ADD_SECTION'] = 'Dodaj sekcji;';
$TEXT['ADMIN'] = 'Administrator';
$TEXT['ADMINISTRATION'] = 'Administracja';
$TEXT['ADMINISTRATION_TOOL'] = 'Narzędzie administracyjne';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administratorzy';
$TEXT['ADVANCED'] = 'Zaawansowane';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Dozwolone pliki do uploadu';
$TEXT['ALLOWED_VIEWERS'] = 'Dozwoleni obserwatorzy';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Pozwól na wielokrotne wybory';
$TEXT['ALL_WORDS'] = 'Wszystkie słowa';
$TEXT['ANCHOR'] = 'Kotwica';
$TEXT['ANONYMOUS'] = 'Anonimowy';
$TEXT['ANY_WORDS'] = 'Dowolne ze słów';
$TEXT['APP_NAME'] = 'Nazwa aplikacji';
$TEXT['ARE_YOU_SURE'] = 'Czy aby na pewno?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Wstecz';
$TEXT['BACKUP'] = 'Kopia zapasowa';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database';
$TEXT['BACKUP_DATABASE'] = 'Kopia zapasowa bazy danych';
$TEXT['BACKUP_MEDIA'] = 'Kopia zapasowa mediów';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Kopia zapasowa tylko tabel WB_';
$TEXT['BASIC'] = 'Podstawowe';
$TEXT['BLOCK'] = 'Blokuj';
$TEXT['CALENDAR'] = 'Calentarz';
$TEXT['CANCEL'] = 'Anuluj';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Weryfikacja Captcha';
$TEXT['CAP_EDIT_CSS'] = 'Edytuj CSS';
$TEXT['CHANGE'] = 'Zmień;';
$TEXT['CHANGES'] = 'Zmiany';
$TEXT['CHANGE_SETTINGS'] = 'Zmień ustawienia';
$TEXT['CHARSET'] = 'Kodowanie znaków';
$TEXT['CHECKBOX_GROUP'] = 'Grupa pól zaznaczanych';
$TEXT['CLOSE'] = 'Zamknij';
$TEXT['CODE'] = 'Kod';
$TEXT['CODE_SNIPPET'] = 'Kod snippeta';
$TEXT['COLLAPSE'] = 'Zwiń;';
$TEXT['COMMENT'] = 'Komentarz';
$TEXT['COMMENTING'] = 'Komentowanie';
$TEXT['COMMENTS'] = 'Komentarze';
$TEXT['CREATE_FOLDER'] = 'Utwórz folder';
$TEXT['CURRENT'] = 'Bieżący';
$TEXT['CURRENT_FOLDER'] = 'Bieżący folder';
$TEXT['CURRENT_PAGE'] = 'Bieżąca strona';
$TEXT['CURRENT_PASSWORD'] = 'Bieżące hasło';
$TEXT['CUSTOM'] = 'Własny';
$TEXT['DATABASE'] = 'Baza danych';
$TEXT['DATE'] = 'Data';
$TEXT['DATE_FORMAT'] = 'Format daty';
$TEXT['DEFAULT'] = 'Domyślne';
$TEXT['DEFAULT_CHARSET'] = 'Domyślne kodowanie znaków';
$TEXT['DEFAULT_TEXT'] = 'Domyślny tekst';
$TEXT['DELETE'] = 'Usuń;';
$TEXT['DELETED'] = 'Usunięte';
$TEXT['DELETE_DATE'] = 'Usuń datę';
$TEXT['DELETE_ZIP'] = 'Usuń archiwum zip po rozpakowaniu';
$TEXT['DESCRIPTION'] = 'Opis';
$TEXT['DESIGNED_FOR'] = 'Zaprojektowane dla';
$TEXT['DIRECTORIES'] = 'Katalogi';
$TEXT['DIRECTORY_MODE'] = 'Tryb katalogów';
$TEXT['DISABLED'] = 'Wyłączone';
$TEXT['DISPLAY_NAME'] = 'Nazwa';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['EMAIL_ADDRESS'] = 'Adres e-mail';
$TEXT['EMPTY_TRASH'] = 'Opróżnij śmietnik';
$TEXT['ENABLED'] = 'Włączone';
$TEXT['END'] = 'Koniec';
$TEXT['ERROR'] = 'Błąd';
$TEXT['EXACT_MATCH'] = 'Dopasowanie dokładne';
$TEXT['EXECUTE'] = 'Wykonaj';
$TEXT['EXPAND'] = 'Rozwiń';
$TEXT['EXTENSION'] = 'Rozszerzenie';
$TEXT['FIELD'] = 'Pole';
$TEXT['FILE'] = 'plik';
$TEXT['FILES'] = 'pliki';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Uprawnienia systemu plików';
$TEXT['FILE_MODE'] = 'Tryb plikw';
$TEXT['FINISH_PUBLISHING'] = 'Zakoncz publikowanie';
$TEXT['FOLDER'] = 'folder';
$TEXT['FOLDERS'] = 'foldery';
$TEXT['FOOTER'] = 'Stopka';
$TEXT['FORGOTTEN_DETAILS'] = 'Zapomniałeś(-aś) hasła?';
$TEXT['FORGOT_DETAILS'] = 'Zapomniałeś(-aś) szczegółów?';
$TEXT['FROM'] = 'Od';
$TEXT['FRONTEND'] = 'Panel przedni';
$TEXT['FULL_NAME'] = 'Imię i nazwisko';
$TEXT['FUNCTION'] = 'Funkcja';
$TEXT['GROUP'] = 'Grupa';
$TEXT['HEADER'] = 'Nagłówek';
$TEXT['HEADING'] = 'Nagłówek';
$TEXT['HEADING_CSS_FILE'] = 'Aktualny plik modułu: ';
$TEXT['HEIGHT'] = 'Wysokość;';
$TEXT['HIDDEN'] = 'Ukryty';
$TEXT['HIDE'] = 'Schowaj';
$TEXT['HIDE_ADVANCED'] = 'Schowaj opcje zaawansowane';
$TEXT['HOME'] = 'Strona domowa';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Przekierowanie strony domowej';
$TEXT['HOME_FOLDER'] = 'Osobisty Folder';
$TEXT['HOME_FOLDERS'] = 'Osobiste Foldery';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Ikona';
$TEXT['IMAGE'] = 'Obrazek';
$TEXT['INLINE'] = 'Inline';
$TEXT['INSTALL'] = 'Zainstaluj';
$TEXT['INSTALLATION'] = 'Instalacja';
$TEXT['INSTALLATION_PATH'] = 'Ścieżka instalacji';
$TEXT['INSTALLATION_URL'] = 'URL instalacji';
$TEXT['INSTALLED'] = 'zainstalowano';
$TEXT['INTRO'] = 'Intro';
$TEXT['INTRO_PAGE'] = 'Strona wprowadzająca';
$TEXT['INVALID_SIGNS'] = 'musi zaczynać się od litery bądź niedozwolonych znaków';
$TEXT['KEYWORDS'] = 'słow kluczowe';
$TEXT['LANGUAGE'] = 'Język';
$TEXT['LAST_UPDATED_BY'] = 'Ostatnio zmienione przez';
$TEXT['LENGTH'] = 'Długość';
$TEXT['LEVEL'] = 'Poziom';
$TEXT['LINK'] = 'Odnośnik';
$TEXT['LINUX_UNIX_BASED'] = 'oparty na Linux/Unix';
$TEXT['LIST_OPTIONS'] = 'Listuj opcje';
$TEXT['LOGGED_IN'] = 'Zalogowany';
$TEXT['LOGIN'] = 'Zaloguj';
$TEXT['LONG'] = 'Długi';
$TEXT['LONG_TEXT'] = 'Długi tekst';
$TEXT['LOOP'] = 'Pętla';
$TEXT['MAIN'] = 'Główny';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Zarządzaj';
$TEXT['MANAGE_GROUPS'] = 'Zarządzaj grupami';
$TEXT['MANAGE_USERS'] = 'Zarządzaj użytkownikami';
$TEXT['MATCH'] = 'Dopasuj';
$TEXT['MATCHING'] = 'Pasujące';
$TEXT['MAX_EXCERPT'] = 'Maksymalny fragment linii';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maks. zgłoszeń na godzinę';
$TEXT['MEDIA_DIRECTORY'] = 'Katalog mediów';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Tytuł menu';
$TEXT['MESSAGE'] = 'Wiadomość';
$TEXT['MODIFY'] = 'Zmień';
$TEXT['MODIFY_CONTENT'] = 'Zmień zawartość';
$TEXT['MODIFY_SETTINGS'] = 'Zmień ustawienia';
$TEXT['MODULE_ORDER'] = 'Moduł- kolejność wyszukiwania';
$TEXT['MODULE_PERMISSIONS'] = 'Uprawnienia do modułów';
$TEXT['MORE'] = 'Więcej';
$TEXT['MOVE_DOWN'] = 'W dół';
$TEXT['MOVE_UP'] = 'Do góry';
$TEXT['MULTIPLE_MENUS'] = 'Wielokrotne menu';
$TEXT['MULTISELECT'] = 'Wybór wielokrotny';
$TEXT['NAME'] = 'Nazwa';
$TEXT['NEED_CURRENT_PASSWORD'] = 'potwierdź obecne hasło';
$TEXT['NEED_TO_LOGIN'] = 'Potrzebujesz się zalogować?';
$TEXT['NEW_PASSWORD'] = 'Nowe hasło';
$TEXT['NEW_WINDOW'] = 'Nowe okno';
$TEXT['NEXT'] = 'Następny';
$TEXT['NEXT_PAGE'] = 'Następna strona';
$TEXT['NO'] = 'Nie';
$TEXT['NONE'] = 'Brak';
$TEXT['NONE_FOUND'] = 'Nie odnaleziono';
$TEXT['NOT_FOUND'] = 'Nie odnaleziono';
$TEXT['NOT_INSTALLED'] = 'nie zainstalowano';
$TEXT['NO_IMAGE_SELECTED'] = 'nie wybrano obrazu';
$TEXT['NO_RESULTS'] = 'Brak wyników';
$TEXT['OF'] = 'z';
$TEXT['ON'] = 'dnia';
$TEXT['OPEN'] = 'Otwórz';
$TEXT['OPTION'] = 'Opcja';
$TEXT['OTHERS'] = 'Inni';
$TEXT['OUT_OF'] = 'z poza';
$TEXT['OVERWRITE_EXISTING'] = 'Nadpisz istniejący(-e)';
$TEXT['PAGE'] = 'Strona';
$TEXT['PAGES_DIRECTORY'] = 'Katalog stron';
$TEXT['PAGES_PERMISSION'] = 'Prawa do strony';
$TEXT['PAGES_PERMISSIONS'] = 'Prawa do stron';
$TEXT['PAGE_EXTENSION'] = 'Rozszerzenie strony';
$TEXT['PAGE_ICON'] = 'Obrazek strony';
$TEXT['PAGE_ICON_DIR'] = 'Ścieżka stron/obrazki menu';
$TEXT['PAGE_LANGUAGES'] = 'Języki stron';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limit poziomów stron';
$TEXT['PAGE_SPACER'] = 'Odstęp strony';
$TEXT['PAGE_TITLE'] = 'Tytuł strony';
$TEXT['PAGE_TRASH'] = 'Śmietnik stron';
$TEXT['PARENT'] = 'Nadrzędny';
$TEXT['PASSWORD'] = 'Hasło';
$TEXT['PATH'] = 'Ścieżka';
$TEXT['PHP_ERROR_LEVEL'] = 'Poziom raportowania błędów PHP';
$TEXT['PLEASE_LOGIN'] = 'Podaj login';
$TEXT['PLEASE_SELECT'] = 'Proszę wybrać';
$TEXT['POST'] = 'Wiadomość';
$TEXT['POSTS_PER_PAGE'] = 'Wiadomości na stronę';
$TEXT['POST_FOOTER'] = 'Stopka wiadomości';
$TEXT['POST_HEADER'] = 'Nagłówek wiadomości';
$TEXT['PREVIOUS'] = 'Poprzedni';
$TEXT['PREVIOUS_PAGE'] = 'Poprzednia strona';
$TEXT['PRIVATE'] = 'Prywatna';
$TEXT['PRIVATE_VIEWERS'] = 'Prywatni obserwatorzy';
$TEXT['PROFILES_EDIT'] = 'Zmień profil';
$TEXT['PUBLIC'] = 'Publiczna';
$TEXT['PUBL_END_DATE'] = 'Data zakończenia';
$TEXT['PUBL_START_DATE'] = 'Data rozpoczęcia';
$TEXT['RADIO_BUTTON_GROUP'] = 'Grupa pól przełączanych';
$TEXT['READ'] = 'Odczytaj';
$TEXT['READ_MORE'] = 'Czytaj dalej';
$TEXT['REDIRECT_AFTER'] = 'Przekierowanie po';
$TEXT['REGISTERED'] = 'Zarejestrowany';
$TEXT['REGISTERED_VIEWERS'] = 'Zarejestrowani obserwatorzy';
$TEXT['RELOAD'] = 'Przeładuj, odśwież';
$TEXT['REMEMBER_ME'] = 'Zapamiętaj mnie';
$TEXT['RENAME'] = 'Zmień nazwę';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Zmień nazwy plików przy załadowywaniu';
$TEXT['REQUIRED'] = 'Wymagany';
$TEXT['REQUIREMENT'] = 'Wymagania';
$TEXT['RESET'] = 'Resetuj';
$TEXT['RESIZE'] = 'Zmień rozmiar';
$TEXT['RESIZE_IMAGE_TO'] = 'Zmień rozmiar obrazków na';
$TEXT['RESTORE'] = 'Przywróć';
$TEXT['RESTORE_DATABASE'] = 'Przywróć bazę danych';
$TEXT['RESTORE_MEDIA'] = 'Przywróć media';
$TEXT['RESULTS'] = 'Wyniki';
$TEXT['RESULTS_FOOTER'] = 'Stopka wyników';
$TEXT['RESULTS_FOR'] = 'Wyniki dla';
$TEXT['RESULTS_HEADER'] = 'Nagłówek wyników';
$TEXT['RESULTS_LOOP'] = 'Pętla wyników';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Powtórz nowe hasło';
$TEXT['RETYPE_PASSWORD'] = 'Powtórz hasło';
$TEXT['SAME_WINDOW'] = 'To samo okno';
$TEXT['SAVE'] = 'Zapisz';
$TEXT['SEARCH'] = 'Szukaj';
$TEXT['SEARCHING'] = 'Wyszukiwanie';
$TEXT['SECTION'] = 'Sekcja';
$TEXT['SECTION_BLOCKS'] = 'Bloki sekcji';
$TEXT['SEC_ANCHOR'] = 'Przedrostek tabeli (prefix)';
$TEXT['SELECT_BOX'] = 'Pole wyboru';
$TEXT['SEND_DETAILS'] = 'Wyślij szczegóły';
$TEXT['SEPARATE'] = 'Osobno';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['SERVER_EMAIL'] = 'E-mail serwera';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'System operacyjny serwera';
$TEXT['SESSION_IDENTIFIER'] = 'Identyfikator sesji';
$TEXT['SETTINGS'] = 'Ustawienia';
$TEXT['SHORT'] = 'Krótki';
$TEXT['SHORT_TEXT'] = 'Krótki tekst';
$TEXT['SHOW'] = 'Wyświetl';
$TEXT['SHOW_ADVANCED'] = 'Wyświetl opcje zaawansowane';
$TEXT['SIGNUP'] = 'Zapisz się';
$TEXT['SIZE'] = 'Rozmiar';
$TEXT['SMART_LOGIN'] = 'Inteligentne logowanie';
$TEXT['START'] = 'Start';
$TEXT['START_PUBLISHING'] = 'Rozpocznij publikowanie';
$TEXT['SUBJECT'] = 'Temat';
$TEXT['SUBMISSIONS'] = 'Zgłoszenia';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Zgłoszenia przechowywane w bazie danych';
$TEXT['SUBMISSION_ID'] = 'ID zgłoszenia';
$TEXT['SUBMITTED'] = 'Zgłoszone';
$TEXT['SUCCESS'] = 'Sukces';
$TEXT['SYSTEM_DEFAULT'] = 'Domyślne ustawienia systemu';
$TEXT['SYSTEM_PERMISSIONS'] = 'Uprawnienia systemowe';
$TEXT['TABLE_PREFIX'] = 'Przedrostek tabeli';
$TEXT['TARGET'] = 'Cel';
$TEXT['TARGET_FOLDER'] = 'Folder docelowy';
$TEXT['TEMPLATE'] = 'Szablon';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Uprawnienia szablonów';
$TEXT['TEXT'] = 'Tekst';
$TEXT['TEXTAREA'] = 'Obszar tekstowy';
$TEXT['TEXTFIELD'] = 'Pole tekstowe';
$TEXT['THEME'] = 'Szablon panelu administracji';
$TEXT['TIME'] = 'Czas';
$TEXT['TIMEZONE'] = 'Strefa czasowa';
$TEXT['TIME_FORMAT'] = 'Format czasu';
$TEXT['TIME_LIMIT'] = 'Maksymalny czas potrzebny na fragment modułu';
$TEXT['TITLE'] = 'Tytuł';
$TEXT['TO'] = 'Do';
$TEXT['TOP_FRAME'] = 'Główna ramka';
$TEXT['TRASH_EMPTIED'] = 'Śmietnik opróniony';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edycja CSS w polu tekstowym poniżej.';
$TEXT['TYPE'] = 'Rodzaj';
$TEXT['UNDER_CONSTRUCTION'] = 'W trakcie tworzenia';
$TEXT['UNINSTALL'] = 'Odinstaluj';
$TEXT['UNKNOWN'] = 'Nieznany';
$TEXT['UNLIMITED'] = 'Nieograniczony';
$TEXT['UNZIP_FILE'] = 'Wrzuć i rozpakuj archiwum';
$TEXT['UP'] = 'Góra';
$TEXT['UPGRADE'] = 'Aktualizuj';
$TEXT['UPLOAD_FILES'] = 'Załaduj plik(i)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Użytkownik';
$TEXT['USERNAME'] = 'Nazwa użytkownika';
$TEXT['USERS_ACTIVE'] = 'Aktywni użytkownicy';
$TEXT['USERS_CAN_SELFDELETE'] = 'Użytkownik może usunąć się sam';
$TEXT['USERS_CHANGE_SETTINGS'] = 'Użytkownik może zmienić swoje ustawienia';
$TEXT['USERS_DELETED'] = 'Użytkownicy usunięci';
$TEXT['USERS_FLAGS'] = 'Flagi użytkowników';
$TEXT['USERS_PROFILE_ALLOWED'] = 'Użytkownik może tworzyć profil rozszerzony';
$TEXT['VERIFICATION'] = 'Weryfikacja';
$TEXT['VERSION'] = 'Wersja';
$TEXT['VIEW'] = 'Widok';
$TEXT['VIEW_DELETED_PAGES'] = 'Wyświetl usunięte strony';
$TEXT['VIEW_DETAILS'] = 'Pokaż szczegóły';
$TEXT['VISIBILITY'] = 'Widoczność';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Domyślny mail nadawcy';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Domyślna nazwa nadawcy';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Określ domyślny adres odbiorcy "FROM" i nadawcy "SENDER". Zaleca się stosowanie ODBIORCY tak jak na przykładzie: <strong>admin@yourdomain.com</strong>. Niektórzy dostawcy maili (np. <em>mail.com</em>) mogą odrzucic maile od ODBIORCY adresu takiego jak np <em>name@mail.com</em> ze względu na potraktowanie tego jako spam.<br /><br /> Wartości domyślne są używane tylko wtedy inne wartości są określone przez WebsiteBakera. Jeśli twój serwer obsługuje <acronym title="Prosty protokół przesyłania poczty">SMTP</acronym>, możesz skorzystać z tej funkcji.';
$TEXT['WBMAILER_FUNCTION'] = 'Funkcja maila';
$TEXT['WBMAILER_NOTICE'] = '<strong>Ustawienia poczty SMTP:</strong><br />The settings below are only required if you want to send mails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. If you do not know your SMTP host or you are not sure about the required settings, simply stay with the default mail routine: PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'mail PHP';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'Weryfikacja SMTP';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'Aktywuj tylko jeśli serwer wymaga uwierzytelnienia SMTP';
$TEXT['WBMAILER_SMTP_HOST'] = ' Host SMTP';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'Hasło poczty SMTP';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'Użytkownik poczty SMTP';
$TEXT['WEBSITE'] = 'Witryna';
$TEXT['WEBSITE_DESCRIPTION'] = 'Opis witryny';
$TEXT['WEBSITE_FOOTER'] = 'Stopka witryny';
$TEXT['WEBSITE_HEADER'] = 'Nagłówek witryny';
$TEXT['WEBSITE_KEYWORDS'] = 'Słowa kluczowe witryny';
$TEXT['WEBSITE_TITLE'] = 'Tytuł witryny';
$TEXT['WELCOME_BACK'] = 'Witamy ponownie';
$TEXT['WIDTH'] = 'Szerokość';
$TEXT['WINDOW'] = 'Okno';
$TEXT['WINDOWS'] = 'Okna';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Uprawnienia zapisywania plików przez wszystkich';
$TEXT['WRITE'] = 'Zapisz';
$TEXT['WYSIWYG_EDITOR'] = 'Edytor WYSIWYG';
$TEXT['WYSIWYG_STYLE'] = 'Styl WYSIWYG';
$TEXT['YES'] = 'Tak';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Wymagania dodatku nie zostały spełnione';
$HEADING['ADD_CHILD_PAGE'] = 'Dodaj stronę dziecko"';
$HEADING['ADD_GROUP'] = 'Dodaj grupę';
$HEADING['ADD_GROUPS'] = 'Dodak grupy';
$HEADING['ADD_HEADING'] = 'Dodaj nagłówek';
$HEADING['ADD_PAGE'] = 'Dodaj stronę';
$HEADING['ADD_USER'] = 'Dodaj użytkownika';
$HEADING['ADMINISTRATION_TOOLS'] = 'Narzędzia administracyjne';
$HEADING['BROWSE_MEDIA'] = 'Przeglądaj media';
$HEADING['CREATE_FOLDER'] = 'Utwórz folder';
$HEADING['DEFAULT_SETTINGS'] = 'Ustawienia domyślne';
$HEADING['DELETED_PAGES'] = 'Usunięte strony';
$HEADING['FILESYSTEM_SETTINGS'] = 'Ustawienia systemu plików';
$HEADING['GENERAL_SETTINGS'] = 'Ustawienia ogólne';
$HEADING['INSTALL_LANGUAGE'] = 'Zainstaluj język';
$HEADING['INSTALL_MODULE'] = 'Zainstaluj moduół';
$HEADING['INSTALL_TEMPLATE'] = 'Zainstaluj szablon';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Uaktywnij pliki językowe ręcznie';
$HEADING['INVOKE_MODULE_FILES'] = 'Uaktywnij pliki modułów ręcznie';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Uaktywnij pliki szablonów ręcznie';
$HEADING['LANGUAGE_DETAILS'] = 'Szczegóły języka';
$HEADING['MANAGE_SECTIONS'] = 'Zarządzaj sekcjami';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Zmień zaawansowane ustawienia strony';
$HEADING['MODIFY_DELETE_GROUP'] = 'Zmień/usuń grupę';
$HEADING['MODIFY_DELETE_PAGE'] = 'Zmień/Usuń stronę';
$HEADING['MODIFY_DELETE_USER'] = 'Zmień/usuń użytkownika';
$HEADING['MODIFY_GROUP'] = 'Zmień grupę';
$HEADING['MODIFY_GROUPS'] = 'Zmień grupy';
$HEADING['MODIFY_INTRO_PAGE'] = 'Zmień stronę początkową';
$HEADING['MODIFY_PAGE'] = 'Zmień stronę';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Zmień ustawienia strony';
$HEADING['MODIFY_USER'] = 'Zmień użytkownika';
$HEADING['MODULE_DETAILS'] = 'Szczegóły modułu';
$HEADING['MY_EMAIL'] = 'Mój e-mail';
$HEADING['MY_PASSWORD'] = 'Moje hasło';
$HEADING['MY_SETTINGS'] = 'Moje ustawienia';
$HEADING['SEARCH_SETTINGS'] = 'Ustawienia wyszukiwania';
$HEADING['SERVER_SETTINGS'] = 'Ustawienia serwera';
$HEADING['TEMPLATE_DETAILS'] = 'Szczegóły szablonu';
$HEADING['UNINSTALL_LANGUAGE'] = 'Odinstaluj język';
$HEADING['UNINSTALL_MODULE'] = 'Odinstaluj moduł';
$HEADING['UNINSTALL_TEMPLATE'] = 'Odinstaluj szablon';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Załaduj plik(i)';
$HEADING['WBMAILER_SETTINGS'] = 'Ustawienia rozsyłania maili';

/* MESSAGE */
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Błąd podczas aktualizacji dodatku.';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Pomyślnie zainstalowano ponownie pliki językowe';
$MESSAGE['ADDON_MANUAL_FTP_LANGUAGE'] = '<strong>UWAGA!</strong> Ze względów bezpieczeństwa przesłanie plików językowych do folderu /languages/ powinno odbyć się tylko przez FTP.';
$MESSAGE['ADDON_MANUAL_FTP_WARNING'] = 'Uwaga istniejące wpisy modułu mogą zostać utracone w bazie danych.';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'Jeśli moduły są przesyłane za pomocą protokołu FTP (nie polecane), to funkcje takie jak <tt>instalacja</tt>, <tt>aktualizacja</tt> lub <tt>odinstalowanie</tt> mogą nie działać prawidłowo. <br /><br />';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Uwaga istniejące wpisy modułu mogą zostać utracone w bazie danych. Użyj tej opcji tylko wtedy gdy masz problemy z przesłaniem przez FTP.';
$MESSAGE['ADDON_MANUAL_RELOAD_WARNING'] = 'Uwaga istniejące wpisy modułu mogą zostać utracone w bazie danych.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Pomyślnie zainstalowano ponownie moduły';
$MESSAGE['ADDON_OVERWRITE_NEWER_FILES'] = 'Zastąp nowsze pliki';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Instalacja dodatku. Twój system nie spełnia wymogów niniejszego dodatku. Aby system pracował z tym dodatkiem należy rozwiązać kwestie przedstawione poniżej.';
$MESSAGE['ADDON_RELOAD'] = 'Aktualizacja bazy danych z informacjami dodatków (np. po FTP).';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Szablony zostały pomyślnie załadowane ponownie';
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Niewystarczające uprawnienia do oglądania tej strony.';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Hasło można resetować tylko raz na godzinę';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Nie udało się wysłać hasła, proszę się skontaktować z administratorem';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Wprowadzonego adresu e-mail nie ma w bazie danych';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Proszę wprowadzić poniżej swój adres e-mail';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Twoja nazwa użytkownika i hasło zostały wysłane na Twój adres e-mail';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Niestety, nie ma aktywnej zawartości do wyświetlenia';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Niestety, nie masz uprawnień do oglądania tej strony.';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Już zainstalowany';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Nie moża zapisać do katalogu docelowego';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Prosimy o cierpliwość';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nie można odinstalować';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nie można odinstalować: wybrany plik jest obecnie używany';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> nie może być odinstalowany, ponieważ jest używany przez {{pages}}:<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'następującą stronę;następujące strony';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Szablon <b>{{name}}</b> nie może być odinstalowany, ponieważ jest ustawiony jako szablon domyślny!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Nie można odinstalować szablonu <b>{{name}}</b>, ponieważ jest ustawiony jako domyślny!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Nie można rozpakować pliku';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Nie można załadować pliku';
$MESSAGE['GENERIC_COMPARE'] = ' pomyślnie';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Błąd podczas otwierania pliku.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' niepomyślnie';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Proszę zwrócić uwagę, że ładowany plik musi być w formacie:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Proszę zwrócić uwagę, że ładowany plik musi być w jednym z formatów:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Proszę się cofnąć i wypełnić wszystkie pola';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'Nie dokonano żadnego wyboru!';
$MESSAGE['GENERIC_INSTALLED'] = 'Zainstalowano pomyślnie';
$MESSAGE['GENERIC_INVALID'] = 'Załadowany plik jest nieprawidłowy';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Nieprawidłowy plik instalacyjny Websidebakera. Sprawdź format *.zip.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Nieprawidłowy plik językowy Websidebakera. Proszę sprawdzić w pliku tekstowym.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Nieprawidłowy plik modułu Websidebakera. Proszę sprawdzić w pliku tekstowym.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Nieprawidłowy plik szablonu Websidebakera. Proszę sprawdzić w pliku tekstowym.';
$MESSAGE['GENERIC_IN_USE'] = ' może być użyte w ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Brak archiwum pliku!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'Moduł nie jest poprawnie zainstalowany! Błędna wersja!';
$MESSAGE['GENERIC_NOT_COMPARE'] = 'nie jest możliwe';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Niezainstalowano';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Aktualizacja nie może nastąpić';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Prosimy o cierpliwość, to może trochę potrwać.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Zapraszamy wkrótce...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Naruszenie bezpieczeństwa!! Odmowa dostępu!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Naruszenia bezpieczeństwa! Przechowywanie danych zostało odrzucone!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Odinstalowano pomyślnie';
$MESSAGE['GENERIC_UPGRADED'] = 'Zaktualizowano pomyślnie';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Porównyanie wersji';
$MESSAGE['GENERIC_VERSION_GT'] = 'Wymagana aktualizacja!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Aktualizacja do niższej wersji';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'Ta strona jest chwilowo niedostępna';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Witryna w trakcie tworzenia';
$MESSAGE['GROUPS_ADDED'] = 'Grupa została dodana';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Czy aby na pewno usunąć wybraną grupę (i wszystkich użytkowników, którzy do niej należą)?';
$MESSAGE['GROUPS_DELETED'] = 'Grupa została usunięta';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Nazwa grupy jest pusta';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Grupa o takiej nazwie już istnieje';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Nie odnaleziono żadnych grup';
$MESSAGE['GROUPS_SAVED'] = 'Grupa została zapisana';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Nieprawidłowa nazwa użytkownika lub hasło';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Proszę wprowadzić poniżej swoją nazwę użytkownika i hasło';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Proszę wprowadzić hasło';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Wprowadzone hasło jest zbyt krótkie';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Wprowadzone hasło jest zbyt krótkie';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Proszę wprowadzić nazwę użytkownika';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Wprowadzona nazwa użytkownika jest zbyt długa';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Wprowadzona nawa użytkownika jest zbyt krótka';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Nie wprowadzono rozszerzenia pliku';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Nie wprowadzono nazwy użytkownika';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nie można usunąć wybranego folderu';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nie można usunąć wybranego pliku';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Nie udało się zmienić nazwy';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Czy aby na pewno usunąć następujące pliki lub foldery?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Folder został usunięty';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Plik został usunięty';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Określony katalog nie istnieje lub nie jest dozwolony.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Katalog nie istnieje';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nazwa folderu nie może zawierać ../';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Folder pasujący do wprowadzonej nazwy już istnieje';
$MESSAGE['MEDIA_DIR_MADE'] = 'Folder został utworzony';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Nie udało się utworzyć folderu';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Plik pasujący do wprowadzonej nazwy już istnieje';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Plik nieodnaleziony';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nazwa nie może zawierać ../';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nie można użyć index.php jako nazwy';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nie odnaleziono żadnych mediów w bieżącym folderze';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'Nie przyjęto pliku';
$MESSAGE['MEDIA_RENAMED'] = 'Nazwa została zmieniona';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' plik został pomyślnie załadowany';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Folder docelowy nie może zawierać ../';
$MESSAGE['MEDIA_UPLOADED'] = ' pliki zostały pomyślnie załadowane';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Niestety, ten formularz został wysłany zbyt wiele razy w ciągu tej godziny. Prosimy spróbować ponownie za godzinę.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Wprowadzony numer weryfikacyjny (tzw. Captcha) jest nieprawidłowy. Jeśli masz problemy z odczytaniem Captcha, napisz do: SERVER_EMAIL';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Należy wprowadzić szczegóły dla następujących pól';
$MESSAGE['PAGES_ADDED'] = 'Strona została dodana';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Nagłówek strony został dodany';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Proszę wprowadzić tytuł menu';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Proszę wprowadzić tytuł strony';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Błąd podczas tworzenia pliku dostępowego w katalogu /pages (niewystarczające uprawnienia)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Błąd podczas usuwania pliku dostępowego w katalogu /pages (niewystarczające uprawnienia)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Błąd podczas zmieniania kolejności stron';
$MESSAGE['PAGES_DELETED'] = 'Strona została usunięta';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Czy aby na pewno usunąć wybraną stronę (i wszystkie jej podstrony)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nie masz uprawnień do modyfikowania tej strony';
$MESSAGE['PAGES_INTRO_LINK'] = 'Kliknij TUTAJ by zmienić stronę wprowadzającą';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nie można zapisać pliku /pages/intro.php (niewystarczające uprawnienia)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Strona wprowadzająca zostałą zapisana';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Ostatnio zmodyfikowane przez';
$MESSAGE['PAGES_NOT_FOUND'] = 'Strona nie znaleziona';
$MESSAGE['PAGES_NOT_SAVED'] = 'Błąd podczas zapisywania strony';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Strona o tym lub podobnym tytule już istnieje';
$MESSAGE['PAGES_REORDERED'] = 'Zmieniono kolejność stron';
$MESSAGE['PAGES_RESTORED'] = 'Strona została przywrócona';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Powrót do stron';
$MESSAGE['PAGES_SAVED'] = 'Strona została zapisana';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Ustawienia strony zostały zapisane';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Właściwości sekcji zostały zapisane';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = '(Bieżące) hasło jest nieprawidłowe';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Szczegóły zostały zapisane';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail został zaktualizowany';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Błąd. Hasło zawiera nieprawidłowe znaki';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Hasło zostało zmienione';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'Zmiana tego rekordu nie powiodła się';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'Zmiana rekordu została zaktualizowana pomyślnie.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Dodanie nowego rekordu się nie powiodło.';
$MESSAGE['RECORD_NEW_SAVED'] = 'Nowy rekord został dodany pomyślnie.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Uwaga: naciśnięcie tego przycisku resetuje wszystkie niezapisane zmiany';
$MESSAGE['SETTINGS_SAVED'] = 'Ustawienia zostały zapisane';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Nie można otworzyć pliku konfiguracyjnego';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nie można zapisać pliku konfiguracyjnego';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Uwaga: zalecane wyłącznie w środowiskach testowych';
$MESSAGE['SIGNUP2_ADMIN_INFO'] = '
Nowe konto użytkownika zostało utworzone.

Użytkownik: {LOGIN_NAME}
ID użytkownika: {LOGIN_ID}
E-Mail: {LOGIN_EMAIL}
Adres IP: {LOGIN_IP}
Data rejestracji: {SIGNUP_DATE}
----------------------------------------
Ta wiadomość została wygenerowana automatycznie.

';
$MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT'] = '
Witaj {LOGIN_DISPLAY_NAME},

Ten mail został wysłany ponieważ\'zapomiano hasła\' funkcja odzyskania twojego konta została uruchomiona.

Szczegóły twojego nowego konta \'{LOGIN_WEBSITE_TITLE}\' poniżej:

Użytkownik: {LOGIN_NAME}
Hasło: {LOGIN_PASSWORD}

Powyżej zostało podane twoje hasło.
Oznacza to, że stare hasło nie będzie już działać!
Jeśli masz pytania bądź problemy z nowym loginem lub hasłem skontaktuj się z administratorem \'{LOGIN_WEBSITE_TITLE}\'.
Aby uniknąć nieoczekiwanych awarii proszę pamiętać o czyszczeniu pamięci podręcznej cache przeglądarki

Pozdrawiamy
------------------------------------
Ta wiadomość została wygenerowana automatycznie.

';
$MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] = '
Hello {LOGIN_DISPLAY_NAME},

Witamy \'{LOGIN_WEBSITE_TITLE}\'.

Szczegóły konta \'{LOGIN_WEBSITE_TITLE}\' poniżej:
Użytkownik: {LOGIN_NAME}
Hasło: {LOGIN_PASSWORD}

Pozdrawiamy

Prośba:
Jeśli otrzymałeś tę wiadomość przez pomyłkę, usuń ją niezwłocznie!
-------------------------------------
Ta wiadomość została wygenerowana automatycznie!
';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Twoje dane logowania...';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Należy wprowadzić adres e-mail';
$MESSAGE['START_CURRENT_USER'] = 'Jesteś obecnie zalogowany(-a) jako:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Uwaga: katalog instalacyjny wciąż istnieje!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file "upgrade-script.php" from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Witamy w panelu administracyjnym WebsiteBakera';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Uwaga: aby zmienić szablon, należy przejść do sekcji Ustawienia';
$MESSAGE['USERS_ADDED'] = 'Użytkownik został dodany';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Zadanie odrzucone, Nie możesz usunąć sam siebie!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Uwaga: Powyższe pola należy wypełnić tylko, jeśli chce się zmienić hasło tego użytkownika';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Czy aby na pewno usunąć wybranego użytkownika?';
$MESSAGE['USERS_DELETED'] = 'Użytkownik został usunięty';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Wprowadzony adres e-mail jest już używany';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Wprowadzony adres e-mail jest nieprawidłowy';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'W nazwie użytkownika są błędne znaki';
$MESSAGE['USERS_NO_GROUP'] = 'Nie wybrano grupy';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Wprowadzone hasła nie pasują';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Wprowadzone hasło było za krótkie';
$MESSAGE['USERS_SAVED'] = 'Użytkownik został zapisany';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Wprowadzona nazwa użytkownika jest już zajęta';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Wprowadzona nazwa użytkownika była za krótka';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Narzędzia administracji WebsiteBakera...';
$OVERVIEW['GROUPS'] = 'Zarządzaj grupami użytkowników i ich uprawnieniami systemowymi...';
$OVERVIEW['HELP'] = 'Masz pytania? Znajdź odpowiedzi...';
$OVERVIEW['LANGUAGES'] = 'Zarządzaj językami WebsiteBakera...';
$OVERVIEW['MEDIA'] = 'Zarządzaj plikami przechowywanymi w folderze mediów...';
$OVERVIEW['MODULES'] = 'Zarządzaj modułami WebsiteBakera...';
$OVERVIEW['PAGES'] = 'Zarządzaj stronami...';
$OVERVIEW['PREFERENCES'] = 'Zmień preferencje, takie jak adres e-mail, hasło itp... ';
$OVERVIEW['SETTINGS'] = 'Zmień ustawienia WebsiteBakera...';
$OVERVIEW['START'] = 'Panel administracyjny';
$OVERVIEW['TEMPLATES'] = 'Zmień wygląd swojej strony za pomocą szablonów...';
$OVERVIEW['USERS'] = 'Zarządzaj użytkownikami mogącymi logować się do WebsiteBakera...';
$OVERVIEW['VIEW'] = 'Podgląd witryny w nowym oknie...';

/* include old languages format */
if(file_exists(WB_PATH.'/languages/old.format.inc.php'))
{
	include(WB_PATH.'/languages/old.format.inc.php');
}