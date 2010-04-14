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
$language_code = 'HU';
$language_name = 'Magyar';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Zsolt + Robert';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'KezdĬap';
$MENU['PAGES'] = 'Weblapok';
$MENU['MEDIA'] = 'Média';
$MENU['ADDONS'] = 'Kiegészítī';
$MENU['MODULES'] = 'Modulok';
$MENU['TEMPLATES'] = 'Sablonok';
$MENU['LANGUAGES'] = 'Nyelvek';
$MENU['PREFERENCES'] = 'Saját adatok';
$MENU['SETTINGS'] = 'Paraméterek';
$MENU['ADMINTOOLS'] = 'Admin-Eszközök';
$MENU['ACCESS'] = 'Jogosultságok';
$MENU['USERS'] = 'Felhasználók';
$MENU['GROUPS'] = 'Csoportok';
$MENU['HELP'] = 'Súgó';
$MENU['VIEW'] = 'Portál nézet';
$MENU['LOGOUT'] = 'Kilépés';
$MENU['LOGIN'] = 'Belépés';
$MENU['FORGOT'] = 'Elfelejtett jelszó';


// Section overviews
$OVERVIEW['START'] = 'Admin áttekintés';
$OVERVIEW['PAGES'] = 'A Portál Weblapjainak kezelése...';
$OVERVIEW['MEDIA'] = 'A "media" könyvtárban tárolt fileok kezelése...';
$OVERVIEW['MODULES'] = 'WebsiteBaker modulok kezelése...';
$OVERVIEW['TEMPLATES'] = 'A Honlap megjelenésének változtatása Sablonokkal...';
$OVERVIEW['LANGUAGES'] = 'WebsiteBaker nyelvi beállítások...';
$OVERVIEW['PREFERENCES'] = 'Beállítások megváltoztatása mint: email, jelszó, stb... ';
$OVERVIEW['SETTINGS'] = 'A rendszer globális beállítása...';
$OVERVIEW['USERS'] = 'Felhasználók bejelentkezési engedélyei...';
$OVERVIEW['GROUPS'] = 'Csoportok és azok rendszer jogainak kezelése...';
$OVERVIEW['HELP'] = 'Kérdésed van? itt találsz választ...  (Angol)';
$OVERVIEW['VIEW'] = 'A kész Portál megtekintése új ablakban...';
$OVERVIEW['ADMINTOOLS'] = 'WebsiteBaker adminisztrációs eszközök...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Lap módosítása/Törlése';
$HEADING['DELETED_PAGES'] = 'Törölt Lapok';
$HEADING['ADD_PAGE'] = 'Lap hozzáadása';
$HEADING['ADD_HEADING'] = 'Fejléc hozzáadása';
$HEADING['MODIFY_PAGE'] = 'Lap módosítása';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Lap beállításainak módosítása';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Speciális beállítások';
$HEADING['MANAGE_SECTIONS'] = 'Szakaszok kezelése';
$HEADING['MODIFY_INTRO_PAGE'] = 'Bevezetàlap módosítása';

$HEADING['BROWSE_MEDIA'] = 'Média böngészése';
$HEADING['CREATE_FOLDER'] = 'ª könyvtár';
$HEADING['UPLOAD_FILES'] = 'Fájl(ok) feltöltése';

$HEADING['INSTALL_MODULE'] = 'Modul telepítés';
$HEADING['UNINSTALL_MODULE'] = 'Modul eltávolítás';
$HEADING['MODULE_DETAILS'] = 'Modul infó';

$HEADING['INSTALL_TEMPLATE'] = 'Sablon telepítés';
$HEADING['UNINSTALL_TEMPLATE'] = 'Sablon eltávolítás';
$HEADING['TEMPLATE_DETAILS'] = 'Sablon infó';

$HEADING['INSTALL_LANGUAGE'] = 'Nyelv telepítés';
$HEADING['UNINSTALL_LANGUAGE'] = 'Nyelv eltávolítás';
$HEADING['LANGUAGE_DETAILS'] = 'Nyelv Infó';

$HEADING['MY_SETTINGS'] = 'Beállítások';
$HEADING['MY_EMAIL'] = 'E-mail';
$HEADING['MY_PASSWORD'] = 'Jelszó';

$HEADING['GENERAL_SETTINGS'] = '¬talános beállítások';
$HEADING['DEFAULT_SETTINGS'] = 'Alapértelmezett Beállítások';
$HEADING['SEARCH_SETTINGS'] = 'Keresési beállítások';
$HEADING['FILESYSTEM_SETTINGS'] = 'Fájl Rendszer';
$HEADING['SERVER_SETTINGS'] = 'Szerver beállítások';
$HEADING['WBMAILER_SETTINGS'] = 'LevelezàBeállítások';
$HEADING['ADMINISTRATION_TOOLS'] = 'Adminisztrációs eszközök';

$HEADING['MODIFY_DELETE_USER'] = 'Felhasználó módosítása/törlése';
$HEADING['ADD_USER'] = 'Felhasználó hozzáadása';
$HEADING['MODIFY_USER'] = 'Felhasználó módosítása';


$HEADING['MODIFY_DELETE_GROUP'] = 'Csoport módosítása/törlése';
$HEADING['ADD_GROUP'] = 'Csoport módosítása';
$HEADING['MODIFY_GROUP'] = 'Csoport módosítása';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Kiegészítàkövetelmények nem megfelelĥk';
$HEADING['INVOKE_MODULE_FILES'] = 'Modul fájlok végrehajtása manuálisan';

// Other text
$TEXT['OPEN'] = 'Megnyitás';
$TEXT['ADD'] = 'Hozzáad';
$TEXT['MODIFY'] = 'Módosítás';
$TEXT['SETTINGS'] = 'Beállítás';
$TEXT['DELETE'] = 'Törlés';
$TEXT['SAVE'] = 'Mentés';
$TEXT['RESET'] = 'Visszavon';
$TEXT['LOGIN'] = 'Belépés';
$TEXT['RELOAD'] = 'ªratöltés';
$TEXT['CANCEL'] = 'Mégse';
$TEXT['NAME'] = 'Név';
$TEXT['PLEASE_SELECT'] = 'Kérem válasszon';
$TEXT['TITLE'] = 'Cím';
$TEXT['PARENT'] = 'Almenüje ennek';
$TEXT['TYPE'] = 'Típus';
$TEXT['VISIBILITY'] = 'Megjelenés';
$TEXT['PRIVATE'] = 'Privát';
$TEXT['PUBLIC'] = 'Publikus';
$TEXT['NONE'] = 'Egyik sem';
$TEXT['NONE_FOUND'] = 'Nem található';
$TEXT['CURRENT'] = 'Aktuális';
$TEXT['CHANGE'] = 'Módosít';
$TEXT['WINDOW'] = 'Ablak';
$TEXT['DESCRIPTION'] = 'Leírás';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['ADMINISTRATORS'] = 'Adminisztrátorok';
$TEXT['PRIVATE_VIEWERS'] = 'Privát jogosultak';
$TEXT['EXPAND'] = 'Kibont';
$TEXT['COLLAPSE'] = '³szecsuk';
$TEXT['MOVE_UP'] = 'Mozgat Fel';
$TEXT['MOVE_DOWN'] = 'Mozgat Le';
$TEXT['RENAME'] = '´nevez';
$TEXT['MODIFY_SETTINGS'] = 'Beállítások módosítása';
$TEXT['MODIFY_CONTENT'] = 'Tartalom módosítása';
$TEXT['VIEW'] = 'Nézet';
$TEXT['UP'] = 'Fel';
$TEXT['FORGOTTEN_DETAILS'] = 'Mi is a jelszó?';
$TEXT['NEED_TO_LOGIN'] = 'Vissza a belépéshez';
$TEXT['SEND_DETAILS'] = 'Jelszó elküldése';
$TEXT['USERNAME'] = 'Felhasználónév';
$TEXT['PASSWORD'] = 'Jelszó';
$TEXT['HOME'] = 'KezdĬap';
$TEXT['TARGET_FOLDER'] = 'Cél könyvtár';
$TEXT['OVERWRITE_EXISTING'] = 'Meglévàfelülírása';
$TEXT['FILE'] = 'Fájl';
$TEXT['FILES'] = 'Fájlok';
$TEXT['FOLDER'] = 'Könyvtár';
$TEXT['FOLDERS'] = 'Könyvtárak';
$TEXT['CREATE_FOLDER'] = 'Könyvtár létrehozása';
$TEXT['UPLOAD_FILES'] = 'Fájl feltöltés';
$TEXT['CURRENT_FOLDER'] = 'Aktuális könyvtár';
$TEXT['TO'] = 'Címzett';
$TEXT['FROM'] = 'Feladó';
$TEXT['INSTALL'] = 'Telepít';
$TEXT['UNINSTALL'] = 'Eltávolít';
$TEXT['VIEW_DETAILS'] = 'Infót megnéz';
$TEXT['DISPLAY_NAME'] = 'MegjelenàNév';
$TEXT['AUTHOR'] = 'Szerzç';
$TEXT['VERSION'] = 'Verzió';
$TEXT['DESIGNED_FOR'] = 'Tervezve';
$TEXT['DESCRIPTION'] = 'Leírás';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Nyelv';
$TEXT['TIMEZONE'] = 'Idĺóna';
$TEXT['CURRENT_PASSWORD'] = 'Aktuális Jelszó';
$TEXT['NEW_PASSWORD'] = 'ª Jelszó';
$TEXT['RETYPE_NEW_PASSWORD'] = 'ª Jelszó mégegyszer';
$TEXT['ACTIVE'] = 'Aktív';
$TEXT['DISABLED'] = 'Letiltva';
$TEXT['ENABLED'] = 'Engedélyezve';
$TEXT['RETYPE_PASSWORD'] = 'Jelszó mégegyszer';
$TEXT['GROUP'] = 'Csoport';
$TEXT['SYSTEM_PERMISSIONS'] = 'Rendszer engedélyek';
$TEXT['MODULE_PERMISSIONS'] = 'Modul engedélyek';
$TEXT['SHOW_ADVANCED'] = 'Speciális beállítások mutatása';
$TEXT['HIDE_ADVANCED'] = 'Speciális beállítások elrejtése';
$TEXT['BASIC'] = 'Alap';
$TEXT['ADVANCED'] = 'BĶített';
$TEXT['WEBSITE'] = 'Weblap';
$TEXT['DEFAULT'] = 'Alapértelmezett';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['TEXT'] = 'Szöveg';
$TEXT['HEADER'] = 'Fejléc';
$TEXT['FOOTER'] = 'Lábléc';
$TEXT['TEMPLATE'] = 'Weboldal Sablon';
$TEXT['THEME'] = 'Admin Téma';
$TEXT['INSTALLATION'] = 'Telepítés';
$TEXT['DATABASE'] = 'Adatbázis';
$TEXT['HOST'] = 'Host';
$TEXT['INTRO'] = 'Bevezetç';
$TEXT['PAGE'] = 'Lap';
$TEXT['SIGNUP'] = 'Regisztrálás...';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP hibajelentési szint';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = '´vonal';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Megjelenàfelület';
$TEXT['EXTENSION'] = 'Kiterjesztés';
$TEXT['TABLE_PREFIX'] = 'Tábla elĴag';
$TEXT['CHANGES'] = 'Vátozások';
$TEXT['ADMINISTRATION'] = 'Adminisztrálás';
$TEXT['FORGOT_DETAILS'] = 'Elfelejtettem a jelszót.';
$TEXT['LOGGED_IN'] = 'Bejelentkezve';
$TEXT['WELCOME_BACK'] = '¤v';
$TEXT['FULL_NAME'] = 'Teljes név';
$TEXT['ACCOUNT_SIGNUP'] = 'Fiók Létrehozás';
$TEXT['LINK'] = 'Hivatkozás';
$TEXT['ANCHOR'] = 'Horgony';
$TEXT['TARGET'] = 'Cél';
$TEXT['NEW_WINDOW'] = 'ª ablak';
$TEXT['SAME_WINDOW'] = 'Azonos Ablak';
$TEXT['TOP_FRAME'] = 'FelsàKeret';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lap szint limit';
$TEXT['SUCCESS'] = 'Sikeres';
$TEXT['ERROR'] = 'Hiba';
$TEXT['ARE_YOU_SURE'] = 'Biztos hogy ezt akarja?';
$TEXT['YES'] = 'Igen';
$TEXT['NO'] = 'Nem';
$TEXT['SYSTEM_DEFAULT'] = 'Rendszer alapértelmezett';
$TEXT['PAGE_TITLE'] = 'Lap cím';
$TEXT['MENU_TITLE'] = 'Menu Cím';
$TEXT['ACTIONS'] = 'Tevékenységek';
$TEXT['UNKNOWN'] = 'Ismeretlen';
$TEXT['BLOCK'] = 'Blokk';
$TEXT['SEARCH'] = 'Keresés';
$TEXT['SEARCHING'] = 'Keresés...';
$TEXT['POST'] = 'Cikk';
$TEXT['COMMENT'] = 'Megjegyzés';
$TEXT['COMMENTS'] = 'Megjegyzések';
$TEXT['COMMENTING'] = 'Kommentálás';
$TEXT['SHORT'] = 'Rövid';
$TEXT['LONG'] = 'Hosszű';
$TEXT['LOOP'] = 'ismétlĤü/br> törzs szakasz';
$TEXT['FIELD'] = 'Mezç';
$TEXT['REQUIRED'] = 'Kötelezç';
$TEXT['LENGTH'] = 'Hossz';
$TEXT['MESSAGE'] = 'ºenet';
$TEXT['SUBJECT'] = 'Tárgy';
$TEXT['MATCH'] = 'Egyezik';
$TEXT['ALL_WORDS'] = 'Minden szó';
$TEXT['ANY_WORDS'] = 'Bármely szó';
$TEXT['EXACT_MATCH'] = 'Pontos egyezés';
$TEXT['SHOW'] = 'Mutat';
$TEXT['HIDE'] = 'Elrejt';
$TEXT['START_PUBLISHING'] = 'Publikálás kezdete';
$TEXT['FINISH_PUBLISHING'] = 'Publikálás vége';
$TEXT['DATE'] = 'Dátum';
$TEXT['START'] = 'Kezdés';
$TEXT['END'] = 'Vége';
$TEXT['IMAGE'] = 'Kép';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Szakasz';
$TEXT['DATE_FORMAT'] = 'Dátum formátum';
$TEXT['TIME_FORMAT'] = 'Idàformátum';
$TEXT['RESULTS'] = 'Eredmények';
$TEXT['RESIZE'] = 'ªra méretez';
$TEXT['MANAGE'] = 'Kezel';
$TEXT['CODE'] = 'Kód';
$TEXT['WIDTH'] = 'Szélesség';
$TEXT['HEIGHT'] = 'Magasság';
$TEXT['MORE'] = 'BĶebben';
$TEXT['READ_MORE'] = '</br>Tovább...</br>';
$TEXT['CHANGE_SETTINGS'] = 'Beállítások megváltoztatása';
$TEXT['CURRENT_PAGE'] = 'Aktuális Lap';
$TEXT['CLOSE'] = 'Bezár';
$TEXT['INTRO_PAGE'] = 'BevezetàLap';
$TEXT['INSTALLATION_URL'] = 'Telepítési URL';
$TEXT['INSTALLATION_PATH'] = 'Telepítési útvonal';
$TEXT['PAGE_EXTENSION'] = 'Lap kiterjesztés';
$TEXT['NO_RESULTS'] = 'Nincs eredmény';
$TEXT['WEBSITE_TITLE'] = 'Weblap Cím';
$TEXT['WEBSITE_DESCRIPTION'] = 'Weblap leírás';
$TEXT['WEBSITE_KEYWORDS'] = 'Weblap kulcsszavak';
$TEXT['WEBSITE_HEADER'] = 'Weblap fejléc';
$TEXT['WEBSITE_FOOTER'] = 'Weblap lábléc';
$TEXT['RESULTS_HEADER'] = 'Eredmények fejléc';
$TEXT['RESULTS_LOOP'] = 'Eredmények ciklus';
$TEXT['RESULTS_FOOTER'] = 'Eredmények lábléc';
$TEXT['LEVEL'] = 'Szint';
$TEXT['NOT_FOUND'] = 'Nem található';
$TEXT['PAGE_SPACER'] = 'Lap filenév elválasztó';
$TEXT['MATCHING'] = 'Egyezés';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Sablon jogosultságok';
$TEXT['PAGES_DIRECTORY'] = 'Lap könyvtár';
$TEXT['MEDIA_DIRECTORY'] = 'Média könyvtár';
$TEXT['FILE_MODE'] = 'File Mód';
$TEXT['USER'] = 'Felhasználó';
$TEXT['OTHERS'] = 'Egyebek';
$TEXT['READ'] = 'Olrás';
$TEXT['WRITE'] = 'g';
$TEXT['EXECUTE'] = 'Végrehajtás';
$TEXT['SMART_LOGIN'] = 'Okos bejelentkezés';
$TEXT['REMEMBER_ME'] = 'Emlékezzen';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'File rendszer jogosultságok';
$TEXT['DIRECTORIES'] = 'Könyvtárak';
$TEXT['DIRECTORY_MODE'] = 'Könyvtár mód';
$TEXT['LIST_OPTIONS'] = 'Lista opciók';
$TEXT['OPTION'] = 'Opciók';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Többet is kiválaszthat';
$TEXT['TEXTFIELD'] = 'Szövegmezç';
$TEXT['TEXTAREA'] = 'Szövegterület';
$TEXT['SELECT_BOX'] = 'Jelölànégyzet';
$TEXT['CHECKBOX_GROUP'] = 'Jelölànégyzet csoport';
$TEXT['RADIO_BUTTON_GROUP'] = 'Választó gomb csoport';
$TEXT['SIZE'] = 'Méret';
$TEXT['DEFAULT_TEXT'] = 'Alapértelmezett szöveg';
$TEXT['SEPERATOR'] = 'Elválasztó';
$TEXT['BACK'] = 'Vissza';
$TEXT['UNDER_CONSTRUCTION'] = 'Fejlesztés alatt';
$TEXT['MULTISELECT'] = 'Több választásos';
$TEXT['SHORT_TEXT'] = 'Rövid szöveg';
$TEXT['LONG_TEXT'] = 'Hosszú szöveg';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Honlap átirányítás';
$TEXT['HEADING'] = 'Címsor';
$TEXT['MULTIPLE_MENUS'] = 'Többszintű menü';
$TEXT['REGISTERED'] = 'Regisztrálva';
$TEXT['SECTION_BLOCKS'] = 'Szakaszok';
$TEXT['REGISTERED_VIEWERS'] = 'Regisztrált látogatók';
$TEXT['ALLOWED_VIEWERS'] = 'Engedélyezett látogatók';
$TEXT['SUBMISSION_ID'] = 'Beküldés azonosító';
$TEXT['SUBMISSIONS'] = 'Beküldések';
$TEXT['SUBMITTED'] = 'Elküldve';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. beküldés óránként';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Tárolva az adatbázisban';
$TEXT['EMAIL_ADDRESS'] = 'E-mail Cím';
$TEXT['CUSTOM'] = 'Egyéni';
$TEXT['ANONYMOUS'] = 'Névtelen';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Szerver Operációs Rendszer';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Mindenki által írható file jogok';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Home Könyvtár';
$TEXT['HOME_FOLDERS'] = 'Home Könyvtárak';
$TEXT['PAGE_TRASH'] = 'Lap kuka';
$TEXT['INLINE'] = 'Sorban';
$TEXT['SEPARATE'] = 'Különálló';
$TEXT['DELETED'] = 'Törölve';
$TEXT['VIEW_DELETED_PAGES'] = 'Törölt Lapok megtekintése';
$TEXT['EMPTY_TRASH'] = 'Kuka ürítés';
$TEXT['TRASH_EMPTIED'] = 'Kuka kiürítve';
$TEXT['ADD_SECTION'] = 'Szakasz hozzáadása';
$TEXT['POST_HEADER'] = 'ºenet fejbléc';
$TEXT['POST_FOOTER'] = 'ºenet lábléc';
$TEXT['POSTS_PER_PAGE'] = 'ºenetek laponként';
$TEXT['RESIZE_IMAGE_TO'] = 'Kép átméretezése';
$TEXT['UNLIMITED'] = 'Végtelen';
$TEXT['OF'] = 'összesen:';
$TEXT['OUT_OF'] = 'Túl';
$TEXT['NEXT'] = 'Követkeç';
$TEXT['PREVIOUS'] = 'Elĺç';
$TEXT['NEXT_PAGE'] = 'Követkeàoldal';
$TEXT['PREVIOUS_PAGE'] = 'Elĺàoldal';
$TEXT['ON'] = 'Be';
$TEXT['LAST_UPDATED_BY'] = 'Módosította';
$TEXT['RESULTS_FOR'] = 'Keresett';
$TEXT['TIME'] = 'Idç';
$TEXT['REDIRECT_AFTER'] = '´irányítás';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stílus';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Szerkesztç';
$TEXT['SERVER_EMAIL'] = 'Portál E-mail címe';
$TEXT['MENU'] = 'Menü';
$TEXT['MANAGE_GROUPS'] = 'Csoportok kezelése';
$TEXT['MANAGE_USERS'] = 'Felhasználók kezelése';
$TEXT['PAGE_LANGUAGES'] = 'Lap nyelv';
$TEXT['HIDDEN'] = 'Rejtett';
$TEXT['MAIN'] = 'Fç';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Fájlok átnevezése feltöltésnél';
$TEXT['APP_NAME'] = 'Alkalmazás Neve';
$TEXT['SESSION_IDENTIFIER'] = 'Session Azonosító';
$TEXT['SEC_ANCHOR'] = 'Szekció-Horgony szöveg';
$TEXT['BACKUP'] = 'Biztonsági Mentés';
$TEXT['RESTORE'] = 'Visszaállítás';
$TEXT['BACKUP_DATABASE'] = 'Adatbázis Mentése';
$TEXT['RESTORE_DATABASE'] = 'Adatbázis Visszaállítása';
$TEXT['BACKUP_ALL_TABLES'] = 'Minden adatbázis tábla mentése';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Csak WB specifikus adatbázis tábla mentése';
$TEXT['BACKUP_MEDIA'] = 'Biztonsági mentés Média';
$TEXT['RESTORE_MEDIA'] = 'Visszaállítási Média';
$TEXT['ADMINISTRATION_TOOL'] = 'Adminisztrációs Eszköz';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Ellenörzés';
$TEXT['VERIFICATION'] = 'Ellenörzés';
$TEXT['DEFAULT_CHARSET'] = 'Alapértelmezett Karakterrkészlet';
$TEXT['CHARSET'] = 'Karakterkészlet';
$TEXT['MODULE_ORDER'] = 'Modul sorrend keresésnél';
$TEXT['MAX_EXCERPT'] = 'Maximum találat';
$TEXT['TIME_LIMIT'] = 'Maximális idàa modulonkénti találatra';
$TEXT['PUBL_START_DATE'] = 'Kezdàdátum';
$TEXT['PUBL_END_DATE'] = 'Záró dátum';
$TEXT['CALENDAR'] = 'Naptár';
$TEXT['DELETE_DATE'] = 'Dátum törlése';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Kérlek add meg az alapértelmezett "Küldàemail" címet és a "Küldàszemély" mezĴ. Ajánlott az alábbi fosználata: <strong>admin@tedomained.hu</strong>. Némely szolgáltató (e.g. <em>mail.com</em>) Visszautasíthatja a leveleket az olyan küldàcímtĬ mint <@mail.com</em> ez azért van hogy megakadályozzák a SPAM küldést.<br /><br />Az alapértelmezett értékek csak akkor érvényesek,ha nincs más megadva aker-ben. Ha a szervered támogatja <acronym title="Simple mail transfer protocol">SMTP</acronym>protokolt, akkor használhatod ezt az opciót levél küldé;hez.';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Küldàemail';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Küldàszemély';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Beállítások:</strong><br />Ezek a beállítások csak akkor szükségesek, ha emailt akarsz küldeni <acro="Simple mail transfer protocol">SMTP</acronym> protokollon keresztül. Ha nem tudod az SMTP kiszolgálódat, vagy nem vagy biztos a követleményekben, akkoszerűen maradj az alap beállításnál: PHP MAIL.';
$TEXT['WBMAILER_FUNCTION'] = 'Mail Rutin';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Azonosítás';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'csak akkor aktiváld ha az SMTP host azonosítást kér';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Felhasználónév';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Jelszó';
$TEXT['PLEASE_LOGIN'] = 'Kérem lépjen be';
$TEXT['CAP_EDIT_CSS'] = 'CSS Szerkesztése';
$TEXT['HEADING_CSS_FILE'] = 'Aktuális Modul Fájl: ';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Itt szerkesztheted a CSS definíciókat.';
$TEXT['CODE_SNIPPET'] = 'Code-részlet';
$TEXT['REQUIREMENT'] = 'Követelemény';
$TEXT['INSTALLED'] = 'telepítve';
$TEXT['NOT_INSTALLED'] = 'nincs telepítve';
$TEXT['ADDON'] = 'Kigészítç';
$TEXT['EXTENSION'] = 'BĶítmény';
$TEXT['UNZIP_FILE'] = 'ZIP archívum feltöltése és kicsomagolása';
$TEXT['DELETE_ZIP'] = 'ZIP archívum törlése kicsomagolás után&';
$TEXT['NEED_CURRENT_PASSWORD'] ='confirm with current password';

// Success/error messages
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Sajnáljuk, de a megjelenítéshez nincs jogosultsága!';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sajnos nincs megjeleníthetàtartalom';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegendàjogosultságod!';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Kérem adja meg a Felhasználónevet és a jelszót';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Kérem adja meg a Felhasználónevet';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Kérem adja meg a jelszót';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Túl rövid Felhasználónév';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Túl rövid jelszó';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Túl hosszú Felhasználónév';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Túl hosszú jelszó';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Felhasználónév vagy a jelszó nem megfelelá';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'E-mail címet meg kell adnia';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Bejelentkezési részletek...';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Kérem írja be az E-mail címét';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Az ® által megadott E-mail cím nem talalható adatbázisunkban';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Az E-mail küldés problémába ütközött, kérem vegye fel a kapcsolatot az adminisztrátorral';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'A Felhasználónevét és jelszavát elküldtük az ® E-mail címére';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Sajnáljuk, de a jelszót nem lehet egy órán belül többször újrakérni';

$MESSAGE['START_WELCOME_MESSAGE'] = '¤v a WebsiteBaker Admin felületén';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Figyelmeztetés! A telepítési könyvtár még nem lett törölve!';
$MESSAGE['START_CURRENT_USER'] = 'Bejelentkezve mint:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'A konfigurációs file nem nyitható meg';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nem lehetséges a konfigurációs file írása';
$MESSAGE['SETTINGS_SAVED'] = 'Beállítások sikeresen elmentve';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Figyelmeztetés: A nem mentett változások elvesznek';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Figyelmeztetés: Ez csak tesztkörnyezetben javasolt';

$MESSAGE['USERS_ADDED'] = 'Felhasználó sikeresen hozzáadva';
$MESSAGE['USERS_SAVED'] = 'Felhasználó sikeresen mentve';
$MESSAGE['USERS_DELETED'] = 'Felhasználó törölve';
$MESSAGE['USERS_NO_GROUP'] = 'Csoport nincs kiválasztva';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'A beírt Felhasználónév túl rövid';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'A beírt jelszó túl rövid';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'A beírt jelszó nem eggyezik';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Az E-mail cím nem valós';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Sajnos a megadott E-mail címet már használatban van';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Már foglalt Felhasználónév';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Figyelem: A jelszót itt csak annak megváltoztatásakor kell megadni';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Biztos, hogy törölni a kiválasztott felhasználót?';

$MESSAGE['GROUPS_ADDED'] = 'Csoport sikeresen hozzáadva';
$MESSAGE['GROUPS_SAVED'] = 'Csoport elmentve';
$MESSAGE['GROUPS_DELETED'] = 'Csoport törölve';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = '²es a csoportnév';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Biztos, hogy törölni akarja a kijelölt csoportot? (Minden felhasználója törlĤik)';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Nincs csoport';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Csoport név már létezik';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Sikeres mentés';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail frissítve';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'A jelenlegi jelszó hibás';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'A jelszó sikeresen megváltozott';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Figyelem: A sablon megváltoztatását a beállításokban teheti meg';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nem tartalmazhat ../ -t a könyvtár név';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Nem lehet ../ a cél mezĢen';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Nem lehet ../ in könyvtár névben';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nem lehet ../ a névben';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nem lehet index.php a név';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nem található semmilyen média file az aktuális könyvtárban';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'File nem található';
$MESSAGE['MEDIA_DELETED_FILE'] = 'File törölve';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Könyvtár törölve';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Biztos hogy törli a következàfile-t vagy könyvtárat?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nem lehet törölni a kiválasztott file-t';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nem lehet törölni a kiválasztott könyvtárat';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Nem adott meg új nevet';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Nem adott meg file kiterjesztést';
$MESSAGE['MEDIA_RENAMED'] = '´nevezés sikeres';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Nem sikerült átnevezni';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Ilyen nevű file már létezik';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Ilyen nevű könyvtár már létezik';
$MESSAGE['MEDIA_DIR_MADE'] = 'A könyvtár sikeresen létrehozva';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'nem sikerült létrehozni a könyvtárat';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' file sikeresen feltöltve';
$MESSAGE['MEDIA_UPLOADED'] = ' file sikeresen feltöltve';

$MESSAGE['PAGES_ADDED'] = 'Lap sikeresen hozzáadva';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Lap címsor sikeresen hozzáadva';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Ilyen lap már létezik';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Nem lehet létrehozni az access filet a /pages könyvtárban (nem megfelelàjogosultságok)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Nem lehet törölni az access filet a /pages könyvtárban (nem megfelelàjogosultságok)';
$MESSAGE['PAGES_NOT_FOUND'] = 'Lap nem található';
$MESSAGE['PAGES_SAVED'] = 'Lap sikeresen elmentve';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Lap beállítások elmentve';
$MESSAGE['PAGES_NOT_SAVED'] = 'Hiba a lap mentése közben';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Biztos, hogy törölni akarja az adott lapot? (és az összes al lapját)';
$MESSAGE['PAGES_DELETED'] = 'Lap törölve';
$MESSAGE['PAGES_RESTORED'] = 'lap visszaállítva';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Kérem adjon meg Lap címet';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Kérem adjon meg menü nevet';
$MESSAGE['PAGES_REORDERED'] = 'Lap sikeresen átrendezve';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Hiba a Lap átrendezés közben';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nincs joga módosítani ezt a lapot';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nem lehet létrehozni /pages/intro.php file-t (nincs megfelelàjogosultság)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Bevezetàlap sikeresen elmentve';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Utoljára módosította:';
$MESSAGE['PAGES_INTRO_LINK'] = 'Kattintson ide az BevezetàLap módosításához';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Szakasz tulajdonságok elmentve';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Visszatérés a lapokhoz';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Kérem térjen vissza és töltsön ki minden mezĴ';
$MESSAGE['GENERIC_FILE_TYPE'] = 'A feltöltött file csak ilyen formátumú lehet:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'A feltöltött file-ok csak a következàformátumuak lehetnek:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'File feltöltés nem lehetséges';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Már telepítve';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nincs telpítve';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nem lehet eltávolítani';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kicsomagolás nem lehetséges';
$MESSAGE['GENERIC_INSTALLED'] = 'Telepítés sikeres';
$MESSAGE['GENERIC_UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Eltávolítás sikeres';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'A cél könyvtár nem írható';
$MESSAGE['GENERIC_INVALID'] = 'A feltöltött file nem megfelelç';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet eltávoltítani! A file használatban van.';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> nem lehet eltávolítani, mert még használatban van a kövàoldalon: {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'ez az oldal;ezek az oldalak';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Nem lehet eltávolítani ezt a sablont: <b>{{name}}</b>, mert ez az alapértelmezett!';

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'A Weboldal Karbantartás Alatt';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Kérem térjen vissza késĢb!';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Kérem várjon, ez eltarthat egy ideig.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Fájl megnyitás hiba.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = '²vénytelen WebsiteBaker telepítàfájl. Kérlek ellenĲizd a *.zip formátumot.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = '²vénytelen WebsiteBaker nyelvi fájl. Kérlek ellenĲizd a szöveges fájlt.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'A következàmezīet kötelezàkitöltenie';

$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Sajnáljuk, de ez az űrlap túl sokszor lett kitöltve egy óran belül! Kérem próbálja meg egy óra múlva';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'A megadott ellenörzàkód (vagy más néven Captcha) hibás. Ha problémád van elolvasni a Captcha kódot, kümailt ide: '.SERVER_EMAIL;

$MESSAGE['ADDON_RELOAD'] = 'Adatbázis frissítése Kiegészítàfájlok feltöltése után (pl. FTP-s feltöltés).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Hiba történt a Kiegészítī információinak frissítése közben.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Modulok sikeresen újratöltve';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Sablonok sikeresen újratöltve';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Nyelvi fájlok sikeresen újratöltve';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Kiegészítàtelepítése sikertelen. A rendszered nem felel meg a KiegészítĢen megadott követelményeknek. A Kiehiányosságainak kijavításához tekintsd át az alábbi hibalistát.';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'Amikor manuálisan töltesz fel egy modult FTP-n keresztül (nem ajánlott), akkor a modul telepítàfájlok <tt>l.php</tt>, <tt>upgrade.php</tt> vagy <tt>uninstall.php</tt> nem fognak automatikusan végrehajtódni. Ezek a modulok nem biztos hogy jól fognak működni, törlĤni.<br /><br />Végre tudod hajtani a modul telepítéseket manuálisan FTP feltöltés esetén alább.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Figyelmeztetés: Meglévàmodul adatbázis bejegyzések törlĤnek. Csak akkor használd ezt az opciót hlisan töltöd fel a modult FTP-n keresztül.';

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