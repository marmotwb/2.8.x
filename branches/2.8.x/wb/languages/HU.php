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
$language_code = 'HU';
$language_name = 'Magyar';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Zsolt + Robert';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Jogosultságok';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Kiegészít-?-?';
$MENU['ADMINTOOLS'] = 'Admin-Eszközök';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Elfelejtett jelszó';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Csoportok';
$MENU['HELP'] = 'Súgó';
$MENU['LANGUAGES'] = 'Nyelvek';
$MENU['LOGIN'] = 'Belépés';
$MENU['LOGOUT'] = 'Kilépés';
$MENU['MEDIA'] = 'Média';
$MENU['MODULES'] = 'Modulok';
$MENU['PAGES'] = 'Weblapok';
$MENU['PREFERENCES'] = 'Saját adatok';
$MENU['SETTINGS'] = 'Paraméterek';
$MENU['START'] = 'Kezd-?-?ap';
$MENU['TEMPLATES'] = 'Sablonok';
$MENU['USERS'] = 'Felhasználók';
$MENU['VIEW'] = 'Portál nézet';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Fiók Létrehozás';
$TEXT['ACTIONS'] = 'Tevékenységek';
$TEXT['ACTIVE'] = 'Aktív';
$TEXT['ADD'] = 'Hozzáad';
$TEXT['ADDON'] = 'Kigészítç';
$TEXT['ADD_SECTION'] = 'Szakasz hozzáadása';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Adminisztrálás';
$TEXT['ADMINISTRATION_TOOL'] = 'Adminisztrációs Eszköz';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Adminisztrátorok';
$TEXT['ADVANCED'] = 'B-?-ÃÂ¦ített';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Engedélyezett látogatók';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Többet is kiválaszthat';
$TEXT['ALL_WORDS'] = 'Minden szó';
$TEXT['ANCHOR'] = 'Horgony';
$TEXT['ANONYMOUS'] = 'Névtelen';
$TEXT['ANY_WORDS'] = 'Bármely szó';
$TEXT['APP_NAME'] = 'Alkalmazás Neve';
$TEXT['ARE_YOU_SURE'] = 'Biztos hogy ezt akarja?';
$TEXT['AUTHOR'] = 'Szerzç';
$TEXT['BACK'] = 'Vissza';
$TEXT['BACKUP'] = 'Biztonsági Mentés';
$TEXT['BACKUP_ALL_TABLES'] = 'Minden adatbázis tábla mentése';
$TEXT['BACKUP_DATABASE'] = 'Adatbázis Mentése';
$TEXT['BACKUP_MEDIA'] = 'Biztonsági mentés Média';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Csak WB specifikus adatbázis tábla mentése';
$TEXT['BASIC'] = 'Alap';
$TEXT['BLOCK'] = 'Blokk';
$TEXT['CALENDAR'] = 'Naptár';
$TEXT['CANCEL'] = 'Mégse';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Ellenörzés';
$TEXT['CAP_EDIT_CSS'] = 'CSS Szerkesztése';
$TEXT['CHANGE'] = 'Módosít';
$TEXT['CHANGES'] = 'Vátozások';
$TEXT['CHANGE_SETTINGS'] = 'Beállítások megváltoztatása';
$TEXT['CHARSET'] = 'Karakterkészlet';
$TEXT['CHECKBOX_GROUP'] = 'Jelölànégyzet csoport';
$TEXT['CLOSE'] = 'Bezár';
$TEXT['CODE'] = 'Kód';
$TEXT['CODE_SNIPPET'] = 'Code-részlet';
$TEXT['COLLAPSE'] = '³szecsuk';
$TEXT['COMMENT'] = 'Megjegyzés';
$TEXT['COMMENTING'] = 'Kommentálás';
$TEXT['COMMENTS'] = 'Megjegyzések';
$TEXT['CREATE_FOLDER'] = 'Könyvtár létrehozása';
$TEXT['CURRENT'] = 'Aktuális';
$TEXT['CURRENT_FOLDER'] = 'Aktuális könyvtár';
$TEXT['CURRENT_PAGE'] = 'Aktuális Lap';
$TEXT['CURRENT_PASSWORD'] = 'Aktuális Jelszó';
$TEXT['CUSTOM'] = 'Egyéni';
$TEXT['DATABASE'] = 'Adatbázis';
$TEXT['DATE'] = 'Dátum';
$TEXT['DATE_FORMAT'] = 'Dátum formátum';
$TEXT['DEFAULT'] = 'Alapértelmezett';
$TEXT['DEFAULT_CHARSET'] = 'Alapértelmezett Karakterrkészlet';
$TEXT['DEFAULT_TEXT'] = 'Alapértelmezett szöveg';
$TEXT['DELETE'] = 'Törlés';
$TEXT['DELETED'] = 'Törölve';
$TEXT['DELETE_DATE'] = 'Dátum törlése';
$TEXT['DELETE_ZIP'] = 'ZIP archívum törlése kicsomagolás után&';
$TEXT['DESCRIPTION'] = 'Leírás';
$TEXT['DESIGNED_FOR'] = 'Tervezve';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Könyvtárak';
$TEXT['DIRECTORY_MODE'] = 'Könyvtár mód';
$TEXT['DISABLED'] = 'Letiltva';
$TEXT['DISPLAY_NAME'] = 'MegjelenàNév';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['EMAIL_ADDRESS'] = 'E-mail Cím';
$TEXT['EMPTY_TRASH'] = 'Kuka ürítés';
$TEXT['ENABLED'] = 'Engedélyezve';
$TEXT['END'] = 'Vége';
$TEXT['ERROR'] = 'Hiba';
$TEXT['EXACT_MATCH'] = 'Pontos egyezés';
$TEXT['EXECUTE'] = 'Végrehajtás';
$TEXT['EXPAND'] = 'Kibont';
$TEXT['EXTENSION'] = 'B-?-ÃÂ¦ítmény';
$TEXT['FIELD'] = 'Mezç';
$TEXT['FILE'] = 'Fájl';
$TEXT['FILES'] = 'Fájlok';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'File rendszer jogosultságok';
$TEXT['FILE_MODE'] = 'File Mód';
$TEXT['FINISH_PUBLISHING'] = 'Publikálás vége';
$TEXT['FOLDER'] = 'Könyvtár';
$TEXT['FOLDERS'] = 'Könyvtárak';
$TEXT['FOOTER'] = 'Lábléc';
$TEXT['FORGOTTEN_DETAILS'] = 'Mi is a jelszó?';
$TEXT['FORGOT_DETAILS'] = 'Elfelejtettem a jelszót.';
$TEXT['FROM'] = 'Feladó';
$TEXT['FRONTEND'] = 'Megjelenàfelület';
$TEXT['FULL_NAME'] = 'Teljes név';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Csoport';
$TEXT['HEADER'] = 'Fejléc';
$TEXT['HEADING'] = 'Címsor';
$TEXT['HEADING_CSS_FILE'] = 'Aktuális Modul Fájl: ';
$TEXT['HEIGHT'] = 'Magasság';
$TEXT['HIDDEN'] = 'Rejtett';
$TEXT['HIDE'] = 'Elrejt';
$TEXT['HIDE_ADVANCED'] = 'Speciális beállítások elrejtése';
$TEXT['HOME'] = 'Kezd-?-?ap';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Honlap átirányítás';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Ikon';
$TEXT['IMAGE'] = 'Kép';
$TEXT['INLINE'] = 'Sorban';
$TEXT['INSTALL'] = 'Telepít';
$TEXT['INSTALLATION'] = 'Telepítés';
$TEXT['INSTALLATION_PATH'] = 'Telepítési útvonal';
$TEXT['INSTALLATION_URL'] = 'Telepítési URL';
$TEXT['INSTALLED'] = 'telepítve';
$TEXT['INTRO'] = 'Bevezetç';
$TEXT['INTRO_PAGE'] = 'BevezetàLap';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['LANGUAGE'] = 'Nyelv';
$TEXT['LAST_UPDATED_BY'] = 'Módosította';
$TEXT['LENGTH'] = 'Hossz';
$TEXT['LEVEL'] = 'Szint';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Hivatkozás';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['LIST_OPTIONS'] = 'Lista opciók';
$TEXT['LOGGED_IN'] = 'Bejelentkezve';
$TEXT['LOGIN'] = 'Belépés';
$TEXT['LONG'] = 'Hossz-?-ÃÂ¦';
$TEXT['LONG_TEXT'] = 'Hosszú szöveg';
$TEXT['LOOP'] = 'ismétl-?-?ü/br> törzs szakasz';
$TEXT['MAIN'] = 'Fç';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Kezel';
$TEXT['MANAGE_GROUPS'] = 'Csoportok kezelése';
$TEXT['MANAGE_USERS'] = 'Felhasználók kezelése';
$TEXT['MATCH'] = 'Egyezik';
$TEXT['MATCHING'] = 'Egyezés';
$TEXT['MAX_EXCERPT'] = 'Maximum találat';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. beküldés óránként';
$TEXT['MEDIA_DIRECTORY'] = 'Média könyvtár';
$TEXT['MENU'] = 'Menü';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Menu Cím';
$TEXT['MESSAGE'] = 'ºenet';
$TEXT['MODIFY'] = 'Módosítás';
$TEXT['MODIFY_CONTENT'] = 'Tartalom módosítása';
$TEXT['MODIFY_SETTINGS'] = 'Beállítások módosítása';
$TEXT['MODULE_ORDER'] = 'Modul sorrend keresésnél';
$TEXT['MODULE_PERMISSIONS'] = 'Modul engedélyek';
$TEXT['MORE'] = 'B-?-ÃÂ¦ebben';
$TEXT['MOVE_DOWN'] = 'Mozgat Le';
$TEXT['MOVE_UP'] = 'Mozgat Fel';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Többszint-?-ÃÂ¦ menü';
$TEXT['MULTISELECT'] = 'Több választásos';
$TEXT['NAME'] = 'Név';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Vissza a belépéshez';
$TEXT['NEW_PASSWORD'] = 'ª Jelszó';
$TEXT['NEW_WINDOW'] = 'ª ablak';
$TEXT['NEXT'] = 'Követkeç';
$TEXT['NEXT_PAGE'] = 'Követkeàoldal';
$TEXT['NO'] = 'Nem';
$TEXT['NONE'] = 'Egyik sem';
$TEXT['NONE_FOUND'] = 'Nem található';
$TEXT['NOT_FOUND'] = 'Nem található';
$TEXT['NOT_INSTALLED'] = 'nincs telepítve';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Nincs eredmény';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'összesen:';
$TEXT['ON'] = 'Be';
$TEXT['OPEN'] = 'Megnyitás';
$TEXT['OPTION'] = 'Opciók';
$TEXT['OTHERS'] = 'Egyebek';
$TEXT['OUT_OF'] = 'Túl';
$TEXT['OVERWRITE_EXISTING'] = 'Meglévàfelülírása';
$TEXT['PAGE'] = 'Lap';
$TEXT['PAGES_DIRECTORY'] = 'Lap könyvtár';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Lap kiterjesztés';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Lap nyelv';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lap szint limit';
$TEXT['PAGE_SPACER'] = 'Lap filenév elválasztó';
$TEXT['PAGE_TITLE'] = 'Lap cím';
$TEXT['PAGE_TRASH'] = 'Lap kuka';
$TEXT['PARENT'] = 'Almenüje ennek';
$TEXT['PASSWORD'] = 'Jelszó';
$TEXT['PATH'] = '´vonal';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP hibajelentési szint';
$TEXT['PLEASE_LOGIN'] = 'Kérem lépjen be';
$TEXT['PLEASE_SELECT'] = 'Kérem válasszon';
$TEXT['POST'] = 'Cikk';
$TEXT['POSTS_PER_PAGE'] = 'ºenetek laponként';
$TEXT['POST_FOOTER'] = 'ºenet lábléc';
$TEXT['POST_HEADER'] = 'ºenet fejbléc';
$TEXT['PREVIOUS'] = 'El-?-?ç';
$TEXT['PREVIOUS_PAGE'] = 'El-?-?àoldal';
$TEXT['PRIVATE'] = 'Privát';
$TEXT['PRIVATE_VIEWERS'] = 'Privát jogosultak';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Publikus';
$TEXT['PUBL_END_DATE'] = 'Záró dátum';
$TEXT['PUBL_START_DATE'] = 'Kezdàdátum';
$TEXT['RADIO_BUTTON_GROUP'] = 'Választó gomb csoport';
$TEXT['READ'] = 'Olrás';
$TEXT['READ_MORE'] = '</br>Tovább...</br>';
$TEXT['REDIRECT_AFTER'] = '´irányítás';
$TEXT['REGISTERED'] = 'Regisztrálva';
$TEXT['REGISTERED_VIEWERS'] = 'Regisztrált látogatók';
$TEXT['RELOAD'] = 'ªratöltés';
$TEXT['REMEMBER_ME'] = 'Emlékezzen';
$TEXT['RENAME'] = '´nevez';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Kötelezç';
$TEXT['REQUIREMENT'] = 'Követelemény';
$TEXT['RESET'] = 'Visszavon';
$TEXT['RESIZE'] = 'ªra méretez';
$TEXT['RESIZE_IMAGE_TO'] = 'Kép átméretezése';
$TEXT['RESTORE'] = 'Visszaállítás';
$TEXT['RESTORE_DATABASE'] = 'Adatbázis Visszaállítása';
$TEXT['RESTORE_MEDIA'] = 'Visszaállítási Média';
$TEXT['RESULTS'] = 'Eredmények';
$TEXT['RESULTS_FOOTER'] = 'Eredmények lábléc';
$TEXT['RESULTS_FOR'] = 'Keresett';
$TEXT['RESULTS_HEADER'] = 'Eredmények fejléc';
$TEXT['RESULTS_LOOP'] = 'Eredmények ciklus';
$TEXT['RETYPE_NEW_PASSWORD'] = 'ª Jelszó mégegyszer';
$TEXT['RETYPE_PASSWORD'] = 'Jelszó mégegyszer';
$TEXT['SAME_WINDOW'] = 'Azonos Ablak';
$TEXT['SAVE'] = 'Mentés';
$TEXT['SEARCH'] = 'Keresés';
$TEXT['SEARCHING'] = 'Keresés...';
$TEXT['SECTION'] = 'Szakasz';
$TEXT['SECTION_BLOCKS'] = 'Szakaszok';
$TEXT['SEC_ANCHOR'] = 'Szekció-Horgony szöveg';
$TEXT['SELECT_BOX'] = 'Jelölànégyzet';
$TEXT['SEND_DETAILS'] = 'Jelszó elküldése';
$TEXT['SEPARATE'] = 'Különálló';
$TEXT['SEPERATOR'] = 'Elválasztó';
$TEXT['SERVER_EMAIL'] = 'Portál E-mail címe';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Szerver Operációs Rendszer';
$TEXT['SESSION_IDENTIFIER'] = 'Session Azonosító';
$TEXT['SETTINGS'] = 'Beállítás';
$TEXT['SHORT'] = 'Rövid';
$TEXT['SHORT_TEXT'] = 'Rövid szöveg';
$TEXT['SHOW'] = 'Mutat';
$TEXT['SHOW_ADVANCED'] = 'Speciális beállítások mutatása';
$TEXT['SIGNUP'] = 'Regisztrálás...';
$TEXT['SIZE'] = 'Méret';
$TEXT['SMART_LOGIN'] = 'Okos bejelentkezés';
$TEXT['START'] = 'Kezdés';
$TEXT['START_PUBLISHING'] = 'Publikálás kezdete';
$TEXT['SUBJECT'] = 'Tárgy';
$TEXT['SUBMISSIONS'] = 'Beküldések';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Tárolva az adatbázisban';
$TEXT['SUBMISSION_ID'] = 'Beküldés azonosító';
$TEXT['SUBMITTED'] = 'Elküldve';
$TEXT['SUCCESS'] = 'Sikeres';
$TEXT['SYSTEM_DEFAULT'] = 'Rendszer alapértelmezett';
$TEXT['SYSTEM_PERMISSIONS'] = 'Rendszer engedélyek';
$TEXT['TABLE_PREFIX'] = 'Tábla el-?-?ag';
$TEXT['TARGET'] = 'Cél';
$TEXT['TARGET_FOLDER'] = 'Cél könyvtár';
$TEXT['TEMPLATE'] = 'Weboldal Sablon';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Sablon jogosultságok';
$TEXT['TEXT'] = 'Szöveg';
$TEXT['TEXTAREA'] = 'Szövegterület';
$TEXT['TEXTFIELD'] = 'Szövegmezç';
$TEXT['THEME'] = 'Admin Téma';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Idç';
$TEXT['TIMEZONE'] = 'Id-?-?óna';
$TEXT['TIME_FORMAT'] = 'Idàformátum';
$TEXT['TIME_LIMIT'] = 'Maximális idàa modulonkénti találatra';
$TEXT['TITLE'] = 'Cím';
$TEXT['TO'] = 'Címzett';
$TEXT['TOP_FRAME'] = 'FelsàKeret';
$TEXT['TRASH_EMPTIED'] = 'Kuka kiürítve';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Itt szerkesztheted a CSS definíciókat.';
$TEXT['TYPE'] = 'Típus';
$TEXT['UNDER_CONSTRUCTION'] = 'Fejlesztés alatt';
$TEXT['UNINSTALL'] = 'Eltávolít';
$TEXT['UNKNOWN'] = 'Ismeretlen';
$TEXT['UNLIMITED'] = 'Végtelen';
$TEXT['UNZIP_FILE'] = 'ZIP archívum feltöltése és kicsomagolása';
$TEXT['UP'] = 'Fel';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Fájl feltöltés';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Felhasználó';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Ellenörzés';
$TEXT['VERSION'] = 'Verzió';
$TEXT['VIEW'] = 'Nézet';
$TEXT['VIEW_DELETED_PAGES'] = 'Törölt Lapok megtekintése';
$TEXT['VIEW_DETAILS'] = 'Infót megnéz';
$TEXT['VISIBILITY'] = 'Megjelenés';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Küldàemail';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Küldàszemély';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Kérlek add meg az alapértelmezett "Küldàemail" címet és a "Küldàszemély" mez-?-?. Ajánlott az alábbi fosználata: <strong>admin@tedomained.hu</strong>. Némely szolgáltató (e.g. <em>mail.com</em>) Visszautasíthatja a leveleket az olyan küldàcímt-?-? mint <@mail.com</em> ez azért van hogy megakadályozzák a SPAM küldést.<br /><br />Az alapértelmezett értékek csak akkor érvényesek,ha nincs más megadva aker-ben. Ha a szervered támogatja <acronym title="Simple mail transfer protocol">SMTP</acronym>protokolt, akkor használhatod ezt az opciót levél küldéhez.';
$TEXT['WBMAILER_FUNCTION'] = 'Mail Rutin';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Beállítások:</strong><br />Ezek a beállítások csak akkor szükségesek, ha emailt akarsz küldeni <acro="Simple mail transfer protocol">SMTP</acronym> protokollon keresztül. Ha nem tudod az SMTP kiszolgálódat, vagy nem vagy biztos a követleményekben, akkoszer-?-ÃÂ¦en maradj az alap beállításnál: PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Azonosítás';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'csak akkor aktiváld ha az SMTP host azonosítást kér';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Jelszó';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Loginname';
$TEXT['WEBSITE'] = 'Weblap';
$TEXT['WEBSITE_DESCRIPTION'] = 'Weblap leírás';
$TEXT['WEBSITE_FOOTER'] = 'Weblap lábléc';
$TEXT['WEBSITE_HEADER'] = 'Weblap fejléc';
$TEXT['WEBSITE_KEYWORDS'] = 'Weblap kulcsszavak';
$TEXT['WEBSITE_TITLE'] = 'Weblap Cím';
$TEXT['WELCOME_BACK'] = '¤v';
$TEXT['WIDTH'] = 'Szélesség';
$TEXT['WINDOW'] = 'Ablak';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Mindenki által írható file jogok';
$TEXT['WRITE'] = 'g';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Szerkesztç';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stílus';
$TEXT['YES'] = 'Igen';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Kiegészítàkövetelmények nem megfelel-?-?k';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Csoport módosítása';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Fejléc hozzáadása';
$HEADING['ADD_PAGE'] = 'Lap hozzáadása';
$HEADING['ADD_USER'] = 'Felhasználó hozzáadása';
$HEADING['ADMINISTRATION_TOOLS'] = 'Adminisztrációs eszközök';
$HEADING['BROWSE_MEDIA'] = 'Média böngészése';
$HEADING['CREATE_FOLDER'] = 'ª könyvtár';
$HEADING['DEFAULT_SETTINGS'] = 'Alapértelmezett Beállítások';
$HEADING['DELETED_PAGES'] = 'Törölt Lapok';
$HEADING['FILESYSTEM_SETTINGS'] = 'Fájl Rendszer';
$HEADING['GENERAL_SETTINGS'] = '¬talános beállítások';
$HEADING['INSTALL_LANGUAGE'] = 'Nyelv telepítés';
$HEADING['INSTALL_MODULE'] = 'Modul telepítés';
$HEADING['INSTALL_TEMPLATE'] = 'Sablon telepítés';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Modul fájlok végrehajtása manuálisan';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Nyelv Infó';
$HEADING['MANAGE_SECTIONS'] = 'Szakaszok kezelése';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Speciális beállítások';
$HEADING['MODIFY_DELETE_GROUP'] = 'Csoport módosítása/törlése';
$HEADING['MODIFY_DELETE_PAGE'] = 'Lap módosítása/Törlése';
$HEADING['MODIFY_DELETE_USER'] = 'Felhasználó módosítása/törlése';
$HEADING['MODIFY_GROUP'] = 'Csoport módosítása';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Bevezetàlap módosítása';
$HEADING['MODIFY_PAGE'] = 'Lap módosítása';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Lap beállításainak módosítása';
$HEADING['MODIFY_USER'] = 'Felhasználó módosítása';
$HEADING['MODULE_DETAILS'] = 'Modul infó';
$HEADING['MY_EMAIL'] = 'E-mail';
$HEADING['MY_PASSWORD'] = 'Jelszó';
$HEADING['MY_SETTINGS'] = 'Beállítások';
$HEADING['SEARCH_SETTINGS'] = 'Keresési beállítások';
$HEADING['SERVER_SETTINGS'] = 'Szerver beállítások';
$HEADING['TEMPLATE_DETAILS'] = 'Sablon infó';
$HEADING['UNINSTALL_LANGUAGE'] = 'Nyelv eltávolítás';
$HEADING['UNINSTALL_MODULE'] = 'Modul eltávolítás';
$HEADING['UNINSTALL_TEMPLATE'] = 'Sablon eltávolítás';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Fájl(ok) feltöltése';
$HEADING['WBMAILER_SETTINGS'] = 'LevelezàBeállítások';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegendàjogosultságod!';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Sajnáljuk, de a jelszót nem lehet egy órán belül többször újrakérni';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Az E-mail küldés problémába ütközött, kérem vegye fel a kapcsolatot az adminisztrátorral';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Az ® által megadott E-mail cím nem talalható adatbázisunkban';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Kérem írja be az E-mail címét';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sajnos nincs megjeleníthetàtartalom';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Sajnáljuk, de a megjelenítéshez nincs jogosultsága!';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Már telepítve';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'A cél könyvtár nem írható';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nem lehet eltávolítani';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet eltávoltítani! A file használatban van.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> nem lehet eltávolítani, mert még használatban van a kövàoldalon: {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'ez az oldal;ezek az oldalak';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Nem lehet eltávolítani ezt a sablont: <b>{{name}}</b>, mert ez az alapértelmezett!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kicsomagolás nem lehetséges';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'File feltöltés nem lehetséges';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Fájl megnyitás hiba.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'A feltöltött file csak ilyen formátumú lehet:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'A feltöltött file-ok csak a következàformátumuak lehetnek:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Kérem térjen vissza és töltsön ki minden mez-?-?';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Telepítés sikeres';
$MESSAGE['GENERIC_INVALID'] = 'A feltöltött file nem megfelelç';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = '²vénytelen WebsiteBaker telepítàfájl. Kérlek ellen-?-?izd a *.zip formátumot.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = '²vénytelen WebsiteBaker nyelvi fájl. Kérlek ellen-?-?izd a szöveges fájlt.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nincs telpítve';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Kérem várjon, ez eltarthat egy ideig.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Kérem térjen vissza kés-?-?b!';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Eltávolítás sikeres';
$MESSAGE['GENERIC_UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'A Weboldal Karbantartás Alatt';
$MESSAGE['GROUPS_ADDED'] = 'Csoport sikeresen hozzáadva';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Biztos, hogy törölni akarja a kijelölt csoportot? (Minden felhasználója törl-?-?ik)';
$MESSAGE['GROUPS_DELETED'] = 'Csoport törölve';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = '²es a csoportnév';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Csoport név már létezik';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Nincs csoport';
$MESSAGE['GROUPS_SAVED'] = 'Csoport elmentve';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Please enter a password';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Túl hosszú jelszó';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Túl rövid jelszó';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Nem adott meg file kiterjesztést';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Nem adott meg új nevet';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nem lehet törölni a kiválasztott könyvtárat';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nem lehet törölni a kiválasztott file-t';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Nem sikerült átnevezni';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Biztos hogy törli a következàfile-t vagy könyvtárat?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Könyvtár törölve';
$MESSAGE['MEDIA_DELETED_FILE'] = 'File törölve';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Nem lehet ../ a cél mez-?-?en';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nem tartalmazhat ../ -t a könyvtár név';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Ilyen nev-?-ÃÂ¦ könyvtár már létezik';
$MESSAGE['MEDIA_DIR_MADE'] = 'A könyvtár sikeresen létrehozva';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'nem sikerült létrehozni a könyvtárat';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Ilyen nev-?-ÃÂ¦ file már létezik';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'File nem található';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nem lehet ../ a névben';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nem lehet index.php a név';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nem található semmilyen média file az aktuális könyvtárban';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = '´nevezés sikeres';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' file sikeresen feltöltve';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Nem lehet ../ in könyvtár névben';
$MESSAGE['MEDIA_UPLOADED'] = ' file sikeresen feltöltve';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Sajnáljuk, de ez az -?-ÃÂ¦rlap túl sokszor lett kitöltve egy óran belül! Kérem próbálja meg egy óra múlva';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'A megadott ellenörzàkód (vagy más néven Captcha) hibás. Ha problémád van elolvasni a Captcha kódot, kümailt ide: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'A következàmez-?-?et kötelezàkitöltenie';
$MESSAGE['PAGES_ADDED'] = 'Lap sikeresen hozzáadva';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Lap címsor sikeresen hozzáadva';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Kérem adjon meg menü nevet';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Kérem adjon meg Lap címet';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Nem lehet létrehozni az access filet a /pages könyvtárban (nem megfelelàjogosultságok)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Nem lehet törölni az access filet a /pages könyvtárban (nem megfelelàjogosultságok)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Hiba a Lap átrendezés közben';
$MESSAGE['PAGES_DELETED'] = 'Lap törölve';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Biztos, hogy törölni akarja az adott lapot? (és az összes al lapját)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nincs joga módosítani ezt a lapot';
$MESSAGE['PAGES_INTRO_LINK'] = 'Kattintson ide az BevezetàLap módosításához';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nem lehet létrehozni /pages/intro.php file-t (nincs megfelelàjogosultság)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Bevezetàlap sikeresen elmentve';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Utoljára módosította:';
$MESSAGE['PAGES_NOT_FOUND'] = 'Lap nem található';
$MESSAGE['PAGES_NOT_SAVED'] = 'Hiba a lap mentése közben';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Ilyen lap már létezik';
$MESSAGE['PAGES_REORDERED'] = 'Lap sikeresen átrendezve';
$MESSAGE['PAGES_RESTORED'] = 'lap visszaállítva';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Visszatérés a lapokhoz';
$MESSAGE['PAGES_SAVED'] = 'Lap sikeresen elmentve';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Lap beállítások elmentve';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Szakasz tulajdonságok elmentve';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'A jelenlegi jelszó hibás';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Sikeres mentés';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail frissítve';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'A jelszó sikeresen megváltozott';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Figyelmeztetés: A nem mentett változások elvesznek';
$MESSAGE['SETTINGS_SAVED'] = 'Beállítások sikeresen elmentve';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'A konfigurációs file nem nyitható meg';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nem lehetséges a konfigurációs file írása';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Figyelmeztetés: Ez csak tesztkörnyezetben javasolt';
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
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Bejelentkezési részletek...';
$MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] = 'Many thanks for your registration';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'E-mail címet meg kell adnia';
$MESSAGE['START_CURRENT_USER'] = 'Bejelentkezve mint:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Figyelmeztetés! A telepítési könyvtár még nem lett törölve!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = '¤v a WebsiteBaker Admin felületén';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Figyelem: A sablon megváltoztatását a beállításokban teheti meg';
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
$MESSAGE['USERS_ADDED'] = 'Felhasználó sikeresen hozzáadva';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Figyelem: A jelszót itt csak annak megváltoztatásakor kell megadni';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Biztos, hogy törölni a kiválasztott felhasználót?';
$MESSAGE['USERS_DELETED'] = 'Felhasználó törölve';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Sajnos a megadott E-mail címet már használatban van';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Az E-mail cím nem valós';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Csoport nincs kiválasztva';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'A beírt jelszó nem eggyezik';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'A beírt jelszó túl rövid';
$MESSAGE['USERS_SAVED'] = 'Felhasználó sikeresen mentve';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'WebsiteBaker adminisztrációs eszközök...';
$OVERVIEW['GROUPS'] = 'Csoportok és azok rendszer jogainak kezelése...';
$OVERVIEW['HELP'] = 'Kérdésed van? itt találsz választ...  (Angol)';
$OVERVIEW['LANGUAGES'] = 'WebsiteBaker nyelvi beállítások...';
$OVERVIEW['MEDIA'] = 'A "media" könyvtárban tárolt fileok kezelése...';
$OVERVIEW['MODULES'] = 'WebsiteBaker modulok kezelése...';
$OVERVIEW['PAGES'] = 'A Portál Weblapjainak kezelése...';
$OVERVIEW['PREFERENCES'] = 'Beállítások megváltoztatása mint: email, jelszó, stb... ';
$OVERVIEW['SETTINGS'] = 'A rendszer globális beállítása...';
$OVERVIEW['START'] = 'Admin áttekintés';
$OVERVIEW['TEMPLATES'] = 'A Honlap megjelenésének változtatása Sablonokkal...';
$OVERVIEW['USERS'] = 'Felhasználók bejelentkezési engedélyei...';
$OVERVIEW['VIEW'] = 'A kész Portál megtekintése új ablakban...';
