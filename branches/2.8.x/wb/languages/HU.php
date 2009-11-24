<?php

// $Id$

/*

Website Baker Project <http://www.websitebaker.org/>
Copyright (C) 2004-2009, Ryan Djurovich

Website Baker is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

Website Baker is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Website Baker; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

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
$MENU['START'] = 'Kezd�lap';
$MENU['PAGES'] = 'Weblapok';
$MENU['MEDIA'] = 'Média';
$MENU['ADDONS'] = 'Kiegészít�k';
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
$OVERVIEW['MODULES'] = 'Website Baker modulok kezelése...';
$OVERVIEW['TEMPLATES'] = 'A Honlap megjelenésének változtatása Sablonokkal...';
$OVERVIEW['LANGUAGES'] = 'Website Baker nyelvi beállítások...';
$OVERVIEW['PREFERENCES'] = 'Beállítások megváltoztatása mint: email, jelszó, stb... ';
$OVERVIEW['SETTINGS'] = 'A rendszer globális beállítása...';
$OVERVIEW['USERS'] = 'Felhasználók bejelentkezési engedélyei...';
$OVERVIEW['GROUPS'] = 'Csoportok és azok rendszer jogainak kezelése...';
$OVERVIEW['HELP'] = 'Kérdésed van? itt találsz választ...  (Angol)';
$OVERVIEW['VIEW'] = 'A kész Portál megtekintése új ablakban...';
$OVERVIEW['ADMINTOOLS'] = 'Website Baker adminisztrációs eszközök...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Lap módosítása/Törlése';
$HEADING['DELETED_PAGES'] = 'Törölt Lapok';
$HEADING['ADD_PAGE'] = 'Lap hozzáadása';
$HEADING['ADD_HEADING'] = 'Fejléc hozzáadása';
$HEADING['MODIFY_PAGE'] = 'Lap módosítása';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Lap beállításainak módosítása';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Speciális beállítások';
$HEADING['MANAGE_SECTIONS'] = 'Szakaszok kezelése';
$HEADING['MODIFY_INTRO_PAGE'] = 'Bevezet� lap módosítása';

$HEADING['BROWSE_MEDIA'] = 'Média böngészése';
$HEADING['CREATE_FOLDER'] = '�j könyvtár';
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

$HEADING['GENERAL_SETTINGS'] = '�ltalános beállítások';
$HEADING['DEFAULT_SETTINGS'] = 'Alapértelmezett Beállítások';
$HEADING['SEARCH_SETTINGS'] = 'Keresési beállítások';
$HEADING['FILESYSTEM_SETTINGS'] = 'Fájl Rendszer';
$HEADING['SERVER_SETTINGS'] = 'Szerver beállítások';
$HEADING['WBMAILER_SETTINGS'] = 'Levelez� Beállítások';
$HEADING['ADMINISTRATION_TOOLS'] = 'Adminisztrációs eszközök';

$HEADING['MODIFY_DELETE_USER'] = 'Felhasználó módosítása/törlése';
$HEADING['ADD_USER'] = 'Felhasználó hozzáadása';
$HEADING['MODIFY_USER'] = 'Felhasználó módosítása';


$HEADING['MODIFY_DELETE_GROUP'] = 'Csoport módosítása/törlése';
$HEADING['ADD_GROUP'] = 'Csoport módosítása';
$HEADING['MODIFY_GROUP'] = 'Csoport módosítása';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Kiegészít� követelmények nem megfelel�ek';
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
$TEXT['RELOAD'] = '�jratöltés';
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
$TEXT['COLLAPSE'] = '�sszecsuk';
$TEXT['MOVE_UP'] = 'Mozgat Fel';
$TEXT['MOVE_DOWN'] = 'Mozgat Le';
$TEXT['RENAME'] = '�tnevez';
$TEXT['MODIFY_SETTINGS'] = 'Beállítások módosítása';
$TEXT['MODIFY_CONTENT'] = 'Tartalom módosítása';
$TEXT['VIEW'] = 'Nézet';
$TEXT['UP'] = 'Fel';
$TEXT['FORGOTTEN_DETAILS'] = 'Mi is a jelszó?';
$TEXT['NEED_TO_LOGIN'] = 'Vissza a belépéshez';
$TEXT['SEND_DETAILS'] = 'Jelszó elküldése';
$TEXT['USERNAME'] = 'Felhasználónév';
$TEXT['PASSWORD'] = 'Jelszó';
$TEXT['HOME'] = 'Kezd�lap';
$TEXT['TARGET_FOLDER'] = 'Cél könyvtár';
$TEXT['OVERWRITE_EXISTING'] = 'Meglév� felülírása';
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
$TEXT['DISPLAY_NAME'] = 'Megjelen� Név';
$TEXT['AUTHOR'] = 'Szerz�';
$TEXT['VERSION'] = 'Verzió';
$TEXT['DESIGNED_FOR'] = 'Tervezve';
$TEXT['DESCRIPTION'] = 'Leírás';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Nyelv';
$TEXT['TIMEZONE'] = 'Id�zóna';
$TEXT['CURRENT_PASSWORD'] = 'Aktuális Jelszó';
$TEXT['NEW_PASSWORD'] = '�j Jelszó';
$TEXT['RETYPE_NEW_PASSWORD'] = '�j Jelszó mégegyszer';
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
$TEXT['ADVANCED'] = 'B�vített';
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
$TEXT['INTRO'] = 'Bevezet�';
$TEXT['PAGE'] = 'Lap';
$TEXT['SIGNUP'] = 'Regisztrálás...';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP hibajelentési szint';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = '�tvonal';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Megjelen� felület';
$TEXT['EXTENSION'] = 'Kiterjesztés';
$TEXT['TABLE_PREFIX'] = 'Tábla el�tag';
$TEXT['CHANGES'] = 'Vátozások';
$TEXT['ADMINISTRATION'] = 'Adminisztrálás';
$TEXT['FORGOT_DETAILS'] = 'Elfelejtettem a jelszót.';
$TEXT['LOGGED_IN'] = 'Bejelentkezve';
$TEXT['WELCOME_BACK'] = '�dv';
$TEXT['FULL_NAME'] = 'Teljes név';
$TEXT['ACCOUNT_SIGNUP'] = 'Fiók Létrehozás';
$TEXT['LINK'] = 'Hivatkozás';
$TEXT['ANCHOR'] = 'Horgony';
$TEXT['TARGET'] = 'Cél';
$TEXT['NEW_WINDOW'] = '�j ablak';
$TEXT['SAME_WINDOW'] = 'Azonos Ablak';
$TEXT['TOP_FRAME'] = 'Fels� Keret';
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
$TEXT['LOOP'] = 'ismétl�d�</br> törzs szakasz';
$TEXT['FIELD'] = 'Mez�';
$TEXT['REQUIRED'] = 'Kötelez�';
$TEXT['LENGTH'] = 'Hossz';
$TEXT['MESSAGE'] = '�zenet';
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
$TEXT['TIME_FORMAT'] = 'Id� formátum';
$TEXT['RESULTS'] = 'Eredmények';
$TEXT['RESIZE'] = '�jra méretez';
$TEXT['MANAGE'] = 'Kezel';
$TEXT['CODE'] = 'Kód';
$TEXT['WIDTH'] = 'Szélesség';
$TEXT['HEIGHT'] = 'Magasság';
$TEXT['MORE'] = 'B�vebben';
$TEXT['READ_MORE'] = '</br>Tovább...</br>';
$TEXT['CHANGE_SETTINGS'] = 'Beállítások megváltoztatása';
$TEXT['CURRENT_PAGE'] = 'Aktuális Lap';
$TEXT['CLOSE'] = 'Bezár';
$TEXT['INTRO_PAGE'] = 'Bevezet� Lap';
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
$TEXT['WRITE'] = '�';
$TEXT['EXECUTE'] = 'Végrehajtás';
$TEXT['SMART_LOGIN'] = 'Okos bejelentkezés';
$TEXT['REMEMBER_ME'] = 'Emlékezzen';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'File rendszer jogosultságok';
$TEXT['DIRECTORIES'] = 'Könyvtárak';
$TEXT['DIRECTORY_MODE'] = 'Könyvtár mód';
$TEXT['LIST_OPTIONS'] = 'Lista opciók';
$TEXT['OPTION'] = 'Opciók';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Többet is kiválaszthat';
$TEXT['TEXTFIELD'] = 'Szövegmez�';
$TEXT['TEXTAREA'] = 'Szövegterület';
$TEXT['SELECT_BOX'] = 'Jelöl� négyzet';
$TEXT['CHECKBOX_GROUP'] = 'Jelöl� négyzet csoport';
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
$TEXT['CUSTOM'] = 'Egyéni'
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
$TEXT['DELETED'] = 'Törölve'
$TEXT['VIEW_DELETED_PAGES'] = 'Törölt Lapok megtekintése';
$TEXT['EMPTY_TRASH'] = 'Kuka ürítés';
$TEXT['TRASH_EMPTIED'] = 'Kuka kiürítve';
$TEXT['ADD_SECTION'] = 'Szakasz hozzáadása';
$TEXT['POST_HEADER'] = '�zenet fejbléc';
$TEXT['POST_FOOTER'] = '�zenet lábléc';
$TEXT['POSTS_PER_PAGE'] = '�zenetek laponként';
$TEXT['RESIZE_IMAGE_TO'] = 'Kép átméretezése';
$TEXT['UNLIMITED'] = 'Végtelen';
$TEXT['OF'] = 'összesen:';
$TEXT['OUT_OF'] = 'Túl'
$TEXT['NEXT'] = 'Követke�';
$TEXT['PREVIOUS'] = 'El�z�';
$TEXT['NEXT_PAGE'] = 'Követke� oldal';
$TEXT['PREVIOUS_PAGE'] = 'El�z� oldal';
$TEXT['ON'] = 'Be';
$TEXT['LAST_UPDATED_BY'] = 'Módosította';
$TEXT['RESULTS_FOR'] = 'Keresett';
$TEXT['TIME'] = 'Id�';
$TEXT['REDIRECT_AFTER'] = '�tirányítás';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stílus';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Szerkeszt�';
$TEXT['SERVER_EMAIL'] = 'Portál E-mail címe';
$TEXT['MENU'] = 'Menü';
$TEXT['MANAGE_GROUPS'] = 'Csoportok kezelése';
$TEXT['MANAGE_USERS'] = 'Felhasználók kezelése';
$TEXT['PAGE_LANGUAGES'] = 'Lap nyelv';
$TEXT['HIDDEN'] = 'Rejtett';
$TEXT['MAIN'] = 'F�';
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
$TEXT['TIME_LIMIT'] = 'Maximális id� a modulonkénti találatra';
$TEXT['PUBL_START_DATE'] = 'Kezd� dátum';
$TEXT['PUBL_END_DATE'] = 'Záró dátum';
$TEXT['CALENDAR'] = 'Naptár';
$TEXT['DELETE_DATE'] = 'Dátum törlése';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Kérlek add meg az alapértelmezett "Küld� email" címet és a "Küld� személy" mez�t. Ajánlott az alábbi fosználata: <strong>admin@tedomained.hu</strong>. Némely szolgáltató (e.g. <em>mail.com</em>) Visszautasíthatja a leveleket az olyan küld� címt�l mint <@mail.com</em> ez azért van hogy megakadályozzák a SPAM küldést.<br /><br />Az alapértelmezett értékek csak akkor érvényesek,ha nincs más megadva aker-ben. Ha a szervered támogatja <acronym title="Simple mail transfer protocol">SMTP</acronym>protokolt, akkor használhatod ezt az opciót levél küldé;hez.';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Küld� email';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Küld� személy';
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
$TEXT['ADDON'] = 'Kigészít�';
$TEXT['EXTENSION'] = 'B�vítmény';
$TEXT['UNZIP_FILE'] = 'ZIP archívum feltöltése és kicsomagolása';
$TEXT['DELETE_ZIP'] = 'ZIP archívum törlése kicsomagolás után&';

// Success/error messages
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Sajnáljuk, de a megjelenítéshez nincs jogosultsága!';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sajnos nincs megjeleníthet� tartalom';

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegend� jogosultságod!';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Kérem adja meg a Felhasználónevet és a jelszót';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Kérem adja meg a Felhasználónevet';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Kérem adja meg a jelszót';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Túl rövid Felhasználónév';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Túl rövid jelszó';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Túl hosszú Felhasználónév';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Túl hosszú jelszó';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Felhasználónév vagy a jelszó nem megfelel�!';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'E-mail címet meg kell adnia';
$MESSAGE['SIGNUP2']['SUBJECT_LOGIN_INFO'] = 'Bejelentkezési részletek...';
$MESSAGE['SIGNUP2']['BODY_LOGIN_INFO'] = <<< EOT
�dvözöllek {LOGIN_DISPLAY_NAME},

A te belépésed a(z) '{LOGIN_WEBSITE_TITLE}' oldalra az alábbiak:
Felhasználónév: {LOGIN_NAME}
Jelszó: {LOGIN_PASSWORD}

A jelszavadat elküldük az email címedre.
Ez azt jelenti, hogy a régi jelszavad már nem használható.

Ha nem te kérted a jelszó változtatást, akkor kérlek töröld ezt az emailt.
EOT;

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Kérem írja be az E-mail címét';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Az �n által megadott E-mail cím nem talalható adatbázisunkban';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Az E-mail küldés problémába ütközött, kérem vegye fel a kapcsolatot az adminisztrátorral';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'A Felhasználónevét és jelszavát elküldtük az �n E-mail címére';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Sajnáljuk, de a jelszót nem lehet egy órán belül többször újrakérni';

$MESSAGE['START']['WELCOME_MESSAGE'] = '�dv a Website Baker Admin felületén';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Figyelmeztetés! A telepítési könyvtár még nem lett törölve!';
$MESSAGE['START']['CURRENT_USER'] = 'Bejelentkezve mint:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'A konfigurációs file nem nyitható meg';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Nem lehetséges a konfigurációs file írása';
$MESSAGE['SETTINGS']['SAVED'] = 'Beállítások sikeresen elmentve';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Figyelmeztetés: A nem mentett változások elvesznek';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Figyelmeztetés: Ez csak tesztkörnyezetben javasolt';

$MESSAGE['USERS']['ADDED'] = 'Felhasználó sikeresen hozzáadva';
$MESSAGE['USERS']['SAVED'] = 'Felhasználó sikeresen mentve';
$MESSAGE['USERS']['DELETED'] = 'Felhasználó törölve';
$MESSAGE['USERS']['NO_GROUP'] = 'Csoport nincs kiválasztva';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'A beírt Felhasználónév túl rövid';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'A beírt jelszó túl rövid';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'A beírt jelszó nem eggyezik';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Az E-mail cím nem valós';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Sajnos a megadott E-mail címet már használatban van';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'Már foglalt Felhasználónév';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Figyelem: A jelszót itt csak annak megváltoztatásakor kell megadni';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Biztos, hogy törölni a kiválasztott felhasználót?';

$MESSAGE['GROUPS']['ADDED'] = 'Csoport sikeresen hozzáadva';
$MESSAGE['GROUPS']['SAVED'] = 'Csoport elmentve';
$MESSAGE['GROUPS']['DELETED'] = 'Csoport törölve';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = '�res a csoportnév';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Biztos, hogy törölni akarja a kijelölt csoportot? (Minden felhasználója törl�dik)';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Nincs csoport';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Csoport név már létezik';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Sikeres mentés';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'E-mail frissítve';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'A jelenlegi jelszó hibás';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'A jelszó sikeresen megváltozott';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Figyelem: A sablon megváltoztatását a beállításokban teheti meg';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Nem tartalmazhat ../ -t a könyvtár név';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Nem lehet ../ a cél mez�ben';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Nem lehet ../ in könyvtár névben';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Nem lehet ../ a névben';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'Nem lehet index.php a név';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Nem található semmilyen média file az aktuális könyvtárban';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'File nem található';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'File törölve';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Könyvtár törölve';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Biztos hogy törli a következ� file-t vagy könyvtárat?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Nem lehet törölni a kiválasztott file-t';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Nem lehet törölni a kiválasztott könyvtárat';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Nem adott meg új nevet';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Nem adott meg file kiterjesztést';
$MESSAGE['MEDIA']['RENAMED'] = '�tnevezés sikeres';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Nem sikerült átnevezni';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Ilyen nevű file már létezik';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Ilyen nevű könyvtár már létezik';
$MESSAGE['MEDIA']['DIR_MADE'] = 'A könyvtár sikeresen létrehozva';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'nem sikerült létrehozni a könyvtárat';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' file sikeresen feltöltve';
$MESSAGE['MEDIA']['UPLOADED'] = ' file sikeresen feltöltve';

$MESSAGE['PAGES']['ADDED'] = 'Lap sikeresen hozzáadva';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Lap címsor sikeresen hozzáadva';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Ilyen lap már létezik';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Nem lehet létrehozni az access filet a /pages könyvtárban (nem megfelel� jogosultságok)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Nem lehet törölni az access filet a /pages könyvtárban (nem megfelel� jogosultságok)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Lap nem található';
$MESSAGE['PAGES']['SAVED'] = 'Lap sikeresen elmentve';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Lap beállítások elmentve';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Hiba a lap mentése közben';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Biztos, hogy törölni akarja az adott lapot? (és az összes al lapját)';
$MESSAGE['PAGES']['DELETED'] = 'Lap törölve';
$MESSAGE['PAGES']['RESTORED'] = 'lap visszaállítva';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Kérem adjon meg Lap címet';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Kérem adjon meg menü nevet';
$MESSAGE['PAGES']['REORDERED'] = 'Lap sikeresen átrendezve';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Hiba a Lap átrendezés közben';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Nincs joga módosítani ezt a lapot';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Nem lehet létrehozni /pages/intro.php file-t (nincs megfelel� jogosultság)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Bevezet� lap sikeresen elmentve';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Utoljára módosította:';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Kattintson ide az Bevezet� Lap módosításához';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Szakasz tulajdonságok elmentve';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Visszatérés a lapokhoz';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Kérem térjen vissza és töltsön ki minden mez�t';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'A feltöltött file csak ilyen formátumú lehet:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'A feltöltött file-ok csak a következ� formátumuak lehetnek:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'File feltöltés nem lehetséges';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Már telepítve';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Nincs telpítve';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Nem lehet eltávolítani';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Kicsomagolás nem lehetséges';
$MESSAGE['GENERIC']['INSTALLED'] = 'Telepítés sikeres';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Eltávolítás sikeres';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'A cél könyvtár nem írható';
$MESSAGE['GENERIC']['INVALID'] = 'A feltöltött file nem megfelel�';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet eltávoltítani! A file használatban van.';

$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> nem lehet eltávolítani, mert még használatban van a köv� oldalon: {{pages}}.<br /><br />';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'ez az oldal;ezek az oldalak';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Nem lehet eltávolítani ezt a sablont: <b>{{name}}</b>, mert ez az alapértelmezett!';

$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION'] = 'A Weboldal Karbantartás Alatt';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Kérem térjen vissza kés�bb!';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Kérem várjon, ez eltarthat egy ideig.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Fájl megnyitás hiba.';
$MESSAGE['GENERIC']['INVALID_ADDON_FILE'] = '�rvénytelen Website Baker telepít� fájl. Kérlek ellen�rizd a *.zip formátumot.';
$MESSAGE['GENERIC']['INVALID_LANGUAGE_FILE'] = '�rvénytelen Website Baker nyelvi fájl. Kérlek ellen�rizd a szöveges fájlt.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'A következ� mez�ket kötelez� kitöltenie';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sajnáljuk, de ez az űrlap túl sokszor lett kitöltve egy óran belül! Kérem próbálja meg egy óra múlva$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'A megadott ellenörz� kód (vagy más néven Captcha) hibás. Ha problémád van elolvasni a Captcha kódot, kümailt ide: '.SERVER_EMAIL.';

$MESSAGE['ADDON']['RELOAD'] = 'Adatbázis frissítése Kiegészít� fájlok feltöltése után (pl. FTP-s feltöltés).';
$MESSAGE['ADDON']['ERROR_RELOAD'] = 'Hiba történt a Kiegészít�k információinak frissítése közben.';
$MESSAGE['ADDON']['MODULES_RELOADED'] = 'Modulok sikeresen újratöltve';
$MESSAGE['ADDON']['TEMPLATES_RELOADED'] = 'Sablonok sikeresen újratöltve';
$MESSAGE['ADDON']['LANGUAGES_RELOADED'] = 'Nyelvi fájlok sikeresen újratöltve';
$MESSAGE['ADDON']['PRECHECK_FAILED'] = 'Kiegészít� telepítése sikertelen. A rendszered nem felel meg a Kiegészít�ben megadott követelményeknek. A Kiehiányosságainak kijavításához tekintsd át az alábbi hibalistát.';
$MESSAGE['ADDON']['MANUAL_INSTALLATION'] = 'Amikor manuálisan töltesz fel egy modult FTP-n keresztül (nem ajánlott), akkor a modul telepít� fájlok <tt>l.php</tt>, <tt>upgrade.php</tt> vagy <tt>uninstall.php</tt> nem fognak automatikusan végrehajtódni. Ezek a modulok nem biztos hogy jól fognak működni, törl�dni.<br /><br />Végre tudod hajtani a modul telepítéseket manuálisan FTP feltöltés esetén alább.';
$MESSAGE['ADDON']['MANUAL_INSTALLATION_WARNING'] = 'Figyelmeztetés: Meglév� modul adatbázis bejegyzések törl�dnek. Csak akkor használd ezt az opciót hlisan töltöd fel a modult FTP-n keresztül.';

?>