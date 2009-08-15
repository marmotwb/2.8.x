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
$language_author = 'Zsolt';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Kezd&otilde;lap';
$MENU['PAGES'] = 'Weblapok';
$MENU['MEDIA'] = 'M&eacute;dia';
$MENU['ADDONS'] = 'Add-on';
$MENU['MODULES'] = 'Modulok';
$MENU['TEMPLATES'] = 'Sablonok';
$MENU['LANGUAGES'] = 'Nyelvek';
$MENU['PREFERENCES'] = 'Saj&aacute;t adatok';
$MENU['SETTINGS'] = 'Param&eacute;terek';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['ACCESS'] = 'Jogosults&aacute;gok';
$MENU['USERS'] = 'Felhaszn&aacute;l&oacute;k';
$MENU['GROUPS'] = 'Csoportok';
$MENU['HELP'] = 'S&uacute;g&oacute;';
$MENU['VIEW'] = 'Port&aacute;l n&eacute;zet';
$MENU['LOGOUT'] = 'Kil&eacute;p&eacute;s';
$MENU['LOGIN'] = 'Bel&eacute;p&eacute;s';
$MENU['FORGOT'] = 'Elfelejtett jelsz&oacute;';

// Section overviews
$OVERVIEW['START'] = 'Admin &aacute;ttekint&eacute;s';
$OVERVIEW['PAGES'] = 'A Port&aacute;l Weblapjainak kezel&eacute;se...';
$OVERVIEW['MEDIA'] = 'A "media" k&ouml;nyvt&aacute;rban t&aacute;rolt fileok kezel&eacute;se...';
$OVERVIEW['MODULES'] = 'Website Baker modulok kezel&eacute;se...';
$OVERVIEW['TEMPLATES'] = 'A Honlap megjelen&eacute;s&eacute;nek v&aacute;ltoztat&aacute;sa Sablonokkal...';
$OVERVIEW['LANGUAGES'] = 'Website Baker nyelvi be&aacute;ll&iacute;t&aacute;sok...';
$OVERVIEW['PREFERENCES'] = 'Be&aacute;ll&iacute;t&aacute;sok megv&aacute;ltoztat&aacute;sa mint: email, jelsz&oacute;, stb... ';
$OVERVIEW['SETTINGS'] = 'A rendszer glob&aacute;lis be&aacute;ll&iacute;t&aacute;sa...';
$OVERVIEW['USERS'] = 'Felhaszn&aacute;l&oacute;k bejelentkez&eacute;si enged&eacute;lyei...';
$OVERVIEW['GROUPS'] = 'Csoportok &eacute;s azok rendszer jogainak kezel&eacute;se...';
$OVERVIEW['HELP'] = 'K&eacute;rd&eacute;sed van? itt tal&aacute;lsz v&aacute;laszt...  (Angol)';
$OVERVIEW['VIEW'] = 'A k&eacute;sz Port&aacute;l megtekint&eacute;se &uacute;j ablakban...';
$OVERVIEW['ADMINTOOLS'] = 'Access the Website Baker administration tools...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Lap m&oacute;dos&iacute;t&aacute;sa/T&ouml;rl&eacute;se';
$HEADING['DELETED_PAGES'] = 'T&ouml;r&ouml;lt Lapok';
$HEADING['ADD_PAGE'] = 'Lap hozz&aacute;ad&aacute;sa';
$HEADING['ADD_HEADING'] = 'Fejl&eacute;c hozz&aacute;ad&aacute;sa';
$HEADING['MODIFY_PAGE'] = 'Lap m&oacute;dos&iacute;t&aacute;sa';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Lap be&aacute;ll&iacute;t&aacute;sainak m&oacute;dos&iacute;t&aacute;sa';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Speci&aacute;lis be&aacute;ll&iacute;t&aacute;sok';
$HEADING['MANAGE_SECTIONS'] = 'Szakaszok kezel&eacute;se';
$HEADING['MODIFY_INTRO_PAGE'] = 'Bevezet&otilde; lap m&oacute;dos&iacute;t&aacute;sa';

$HEADING['BROWSE_MEDIA'] = 'M&eacute;dia b&ouml;ng&eacute;sz&eacute;se';
$HEADING['CREATE_FOLDER'] = '&uacute;j k&ouml;nyvt&aacute;r';
$HEADING['UPLOAD_FILES'] = 'Upload File(s)';

$HEADING['INSTALL_MODULE'] = 'Modul telep&iacute;t&eacute;s';
$HEADING['UNINSTALL_MODULE'] = 'Modul elt&aacute;vol&iacute;t&aacute;s';
$HEADING['MODULE_DETAILS'] = 'Modul inf&oacute;';

$HEADING['INSTALL_TEMPLATE'] = 'Sablon telep&iacute;t&eacute;s';
$HEADING['UNINSTALL_TEMPLATE'] = 'Sablon elt&aacute;vol&iacute;t&aacute;s';
$HEADING['TEMPLATE_DETAILS'] = 'Sablon inf&oacute;';

$HEADING['INSTALL_LANGUAGE'] = 'Nyelv telep&iacute;t&eacute;s';
$HEADING['UNINSTALL_LANGUAGE'] = 'Nyelv elt&aacute;vol&iacute;t&aacute;s';
$HEADING['LANGUAGE_DETAILS'] = 'Nyelv Inf&oacute;';

$HEADING['MY_SETTINGS'] = 'Be&aacute;ll&iacute;t&aacute;sok';
$HEADING['MY_EMAIL'] = 'E-mail';
$HEADING['MY_PASSWORD'] = 'Jelsz&oacute;';

$HEADING['GENERAL_SETTINGS'] = '&Aacute;ltal&aacute;nos be&aacute;ll&iacute;t&aacute;sok';
$HEADING['DEFAULT_SETTINGS'] = 'Alap&eacute;rtelmezett Be&aacute;ll&iacute;t&aacute;sok';
$HEADING['SEARCH_SETTINGS'] = 'Keres&eacute;si be&aacute;ll&iacute;t&aacute;sok';
$HEADING['FILESYSTEM_SETTINGS'] = 'Filerendszer';
$HEADING['SERVER_SETTINGS'] = 'Server Settings';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Tools';

$HEADING['MODIFY_DELETE_USER'] = 'Felhaszn&aacute;l&oacute; m&oacute;dos&iacute;t&aacute;sa/t&ouml;rl&eacute;se';
$HEADING['ADD_USER'] = 'Felhaszn&aacute;l&oacute; hozz&aacute;ad&aacute;sa';
$HEADING['MODIFY_USER'] = 'Felhaszn&aacute;l&oacute; m&oacute;dos&iacute;t&aacute;sa';

$HEADING['MODIFY_DELETE_GROUP'] = 'Csoport m&oacute;dos&iacute;t&aacute;sa/t&ouml;rl&eacute;se';
$HEADING['ADD_GROUP'] = 'Csoport m&oacute;dos&iacute;t&aacute;sa';
$HEADING['MODIFY_GROUP'] = 'csoport m&oacute;dos&iacute;t&aacute;sa';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';

// Other text
$TEXT['OPEN'] = 'Open';
$TEXT['ADD'] = 'Hozz&aacute;ad';
$TEXT['MODIFY'] = 'M&oacute;dos&iacute;t&aacute;s';
$TEXT['SETTINGS'] = 'Be&aacute;ll&iacute;t&aacute;s';
$TEXT['DELETE'] = 'T&ouml;rl&eacute;s';
$TEXT['SAVE'] = 'Ment&eacute;s';
$TEXT['RESET'] = 'Visszavon';
$TEXT['LOGIN'] = 'Bel&eacute;p&eacute;s';
$TEXT['RELOAD'] = '&uacute;jrat&ouml;lt&eacute;s';
$TEXT['CANCEL'] = 'M&eacute;gse';
$TEXT['NAME'] = 'N&eacute;v';
$TEXT['PLEASE_SELECT'] = 'K&eacute;rem v&aacute;lasszon';
$TEXT['TITLE'] = 'C&iacute;m';
$TEXT['PARENT'] = 'Almen&uuml;je ennek';
$TEXT['TYPE'] = 'T&iacute;pus';
$TEXT['VISIBILITY'] = 'Megjelen&eacute;s';
$TEXT['PRIVATE'] = 'Priv&aacute;t';
$TEXT['PUBLIC'] = 'Publikus';
$TEXT['NONE'] = 'egyik sem';
$TEXT['NONE_FOUND'] = 'Nem tal&aacute;lhat&oacute;';
$TEXT['CURRENT'] = 'Aktu&aacute;lis';
$TEXT['CHANGE'] = 'M&oacute;dos&iacute;t';
$TEXT['WINDOW'] = 'ablak';
$TEXT['DESCRIPTION'] = 'Le&iacute;r&aacute;s';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['ADMINISTRATORS'] = 'Adminisztr&aacute;torok';
$TEXT['PRIVATE_VIEWERS'] = 'Priv&aacute;t jogosultak';
$TEXT['EXPAND'] = 'Kibont';
$TEXT['COLLAPSE'] = '&Ouml;sszecsuk';
$TEXT['MOVE_UP'] = 'Mozgat Fel';
$TEXT['MOVE_DOWN'] = 'Mozgat Le';
$TEXT['RENAME'] = '&Aacute;tnevez';
$TEXT['MODIFY_SETTINGS'] = 'Be&aacute;ll&iacute;t&aacute;sok m&oacute;dos&iacute;t&aacute;sa';
$TEXT['MODIFY_CONTENT'] = 'Tartalom m&oacute;dos&iacute;t&aacute;sa';
$TEXT['VIEW'] = 'N&eacute;zet';
$TEXT['UP'] = 'Fel';
$TEXT['FORGOTTEN_DETAILS'] = 'Mi is a jelsz&oacute;?';
$TEXT['NEED_TO_LOGIN'] = 'Vissza a bel&eacute;p&eacute;shez';
$TEXT['SEND_DETAILS'] = 'Jelsz&oacute; elk&uuml;ld&eacute;se';
$TEXT['USERNAME'] = 'Felhaszn&aacute;l&oacute;n&eacute;v';
$TEXT['PASSWORD'] = 'Jelsz&oacute;';
$TEXT['HOME'] = 'Kezd&otilde;lap';
$TEXT['TARGET_FOLDER'] = 'C&eacute;l k&ouml;nyvt&aacute;r';
$TEXT['OVERWRITE_EXISTING'] = 'Megl&eacute;v&otilde; fel&uuml;l&iacute;r&aacute;sa';
$TEXT['FILE'] = 'File';
$TEXT['FILES'] = 'File-ok';
$TEXT['FOLDER'] = 'Folder';
$TEXT['FOLDERS'] = 'K&ouml;nyvt&aacute;rak';
$TEXT['CREATE_FOLDER'] = 'K&ouml;nyvt&aacute;r l&eacute;trehoz&aacute;sa';
$TEXT['UPLOAD_FILES'] = 'File felt&ouml;lt&eacute;s';
$TEXT['CURRENT_FOLDER'] = 'aktu&aacute;lis k&ouml;nyvt&aacute;r';
$TEXT['TO'] = 'C&iacute;mzett';
$TEXT['FROM'] = 'Felad&oacute;';
$TEXT['INSTALL'] = 'Telep&iacute;t';
$TEXT['UNINSTALL'] = 'Elt&aacute;vol&iacute;t';
$TEXT['VIEW_DETAILS'] = 'inf&oacute;t megz&eacute;z';
$TEXT['DISPLAY_NAME'] = 'Megjelen&otilde; N&eacute;v';
$TEXT['AUTHOR'] = 'Szerz&otilde;';
$TEXT['VERSION'] = 'Verzi&oacute;';
$TEXT['DESIGNED_FOR'] = 'tervezve';
$TEXT['DESCRIPTION'] = 'Le&iacute;r&aacute;s';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Nyelv';
$TEXT['TIMEZONE'] = 'Id&otilde;z&oacute;na';
$TEXT['CURRENT_PASSWORD'] = 'Aktu&aacute;lis Jelsz&oacute;';
$TEXT['NEW_PASSWORD'] = '&Uacute;j Jelsz&oacute;';
$TEXT['RETYPE_NEW_PASSWORD'] = '&uacute;j Jelsz&oacute; m&eacute;gegyszer';
$TEXT['ACTIVE'] = 'Akt&iacute;v';
$TEXT['DISABLED'] = 'Letiltva';
$TEXT['ENABLED'] = 'Enged&eacute;lyezve';
$TEXT['RETYPE_PASSWORD'] = 'Jelsz&oacute; m&eacute;gegyszer';
$TEXT['GROUP'] = 'Csoport';
$TEXT['SYSTEM_PERMISSIONS'] = 'Rendzser enged&eacute;lyek';
$TEXT['MODULE_PERMISSIONS'] = 'Modul enged&eacute;lyek';
$TEXT['SHOW_ADVANCED'] = 'Speci&aacute;lis be&aacute;ll&iacute;t&aacute;sok mutat&aacute;sa';
$TEXT['HIDE_ADVANCED'] = 'Speci&aacute;lis be&aacute;ll&iacute;t&aacute;sok elrejt&eacute;se';
$TEXT['BASIC'] = 'Alap';
$TEXT['ADVANCED'] = 'B&otilde;v&iacute;tett';
$TEXT['WEBSITE'] = 'Weblap';
$TEXT['DEFAULT'] = 'Alap&eacute;rtelmezett';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['TEXT'] = 'Sz&ouml;veg';
$TEXT['HEADER'] = 'Fejl&eacute;c';
$TEXT['FOOTER'] = 'L&aacute;bl&eacute;c';
$TEXT['TEMPLATE'] = 'Sablon';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['INSTALLATION'] = 'Telep&iacute;t&eacute;s';
$TEXT['DATABASE'] = 'Adatb&aacute;zis';
$TEXT['HOST'] = 'Host';
$TEXT['INTRO'] = 'Bevezet&otilde;';
$TEXT['PAGE'] = 'Lap';
$TEXT['SIGNUP'] = 'Regisztr&aacute;l&aacute;s...';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP hibajelent&eacute;si szint';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = 'Path';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Megjelen&otilde; fel&uuml;let';
$TEXT['EXTENSION'] = 'kiterjeszt&eacute;s';
$TEXT['TABLE_PREFIX'] = 'T&aacute;bla el&otilde;tag';
$TEXT['CHANGES'] = 'V&aacute;toz&aacute;sok';
$TEXT['ADMINISTRATION'] = 'Adminisztr&aacute;l&aacute;s';
$TEXT['FORGOT_DETAILS'] = 'Elfelejtettem a jelsz&oacute;t.';
$TEXT['LOGGED_IN'] = 'Bejelentkezve';
$TEXT['WELCOME_BACK'] = '&Uuml;dv';
$TEXT['FULL_NAME'] = 'Teljes n&eacute;v';
$TEXT['ACCOUNT_SIGNUP'] = 'Account Sign-Up';
$TEXT['LINK'] = 'Link';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['TARGET'] = 'c&eacute;l';
$TEXT['NEW_WINDOW'] = '&Uacute;j ablak';
$TEXT['SAME_WINDOW'] = 'Azonos Ablak';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lap szint limit';
$TEXT['SUCCESS'] = 'Sikeres';
$TEXT['ERROR'] = 'Hiba';
$TEXT['ARE_YOU_SURE'] = 'Biztos?';
$TEXT['YES'] = 'Igen';
$TEXT['NO'] = 'Nem';
$TEXT['SYSTEM_DEFAULT'] = 'Rendszer alap&eacute;rtelmezett';
$TEXT['PAGE_TITLE'] = 'Lap c&iacute;m';
$TEXT['MENU_TITLE'] = 'Menu C&iacute;m';
$TEXT['ACTIONS'] = 'Tev&eacute;kenys&eacute;gek';
$TEXT['UNKNOWN'] = 'Ismeretlen';
$TEXT['BLOCK'] = 'Blokk';
$TEXT['SEARCH'] = 'Keres&eacute;s';
$TEXT['SEARCHING'] = 'Keres&eacute;s...';
$TEXT['POST'] = 'Cikk';
$TEXT['COMMENT'] = 'Megjegyz&eacute;s';
$TEXT['COMMENTS'] = 'Megjegyz&eacute;sek';
$TEXT['COMMENTING'] = 'Komment&aacute;l&aacute;s';
$TEXT['SHORT'] = 'R&ouml;vid';
$TEXT['LONG'] = 'Hossz&ucirc;';
$TEXT['LOOP'] = 'ism&eacute;tl&otilde;d&otilde;</br> t&ouml;rzs szakasz';
$TEXT['FIELD'] = 'Mez&otilde;';
$TEXT['REQUIRED'] = 'K&ouml;telez&otilde;';
$TEXT['LENGTH'] = 'hossz';
$TEXT['MESSAGE'] = '&Uuml;zenet';
$TEXT['SUBJECT'] = 'T&aacute;rgy';
$TEXT['MATCH'] = 'egyezik';
$TEXT['ALL_WORDS'] = 'Minden sz&oacute;';
$TEXT['ANY_WORDS'] = 'B&aacute;rmely sz&oacute;';
$TEXT['EXACT_MATCH'] = 'Pontos egyez&eacute;s';
$TEXT['SHOW'] = 'Mutat';
$TEXT['HIDE'] = 'Elrejt';
$TEXT['START_PUBLISHING'] = 'Publik&aacute;l&aacute;s kezdete';
$TEXT['FINISH_PUBLISHING'] = 'Publik&aacute;l&aacute;s v&eacute;ge';
$TEXT['DATE'] = 'D&aacute;tum';
$TEXT['START'] = 'Start';
$TEXT['END'] = 'v&eacute;ge';
$TEXT['IMAGE'] = 'K&eacute;p';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Szakasz';
$TEXT['DATE_FORMAT'] = 'D&aacute;tum form&aacute;tum';
$TEXT['TIME_FORMAT'] = 'Id&otilde; form&aacute;tum';
$TEXT['RESULTS'] = 'Eredm&eacute;nyek';
$TEXT['RESIZE'] = '&uacute;jra m&eacute;retez';
$TEXT['MANAGE'] = 'Kezel';
$TEXT['CODE'] = 'K&oacute;d';
$TEXT['WIDTH'] = 'Sz&eacute;less&eacute;g';
$TEXT['HEIGHT'] = 'Magass&aacute;g';
$TEXT['MORE'] = 'B&otilde;vebben';
$TEXT['READ_MORE'] = '</br>Tov&aacute;bb...</br>';
$TEXT['CHANGE_SETTINGS'] = 'Be&aacute;ll&iacute;t&aacute;sok megv&aacute;ltoztat&aacute;sa';
$TEXT['CURRENT_PAGE'] = 'Aktu&aacute;lis Lap';
$TEXT['CLOSE'] = 'Bez&aacute;r';
$TEXT['INTRO_PAGE'] = 'Bevezet&otilde; Lap';
$TEXT['INSTALLATION_URL'] = 'Telep&iacute;t&eacute;si URL';
$TEXT['INSTALLATION_PATH'] = 'Telep&iacute;t&eacute;si &uacute;tvonal';
$TEXT['PAGE_EXTENSION'] = 'Lap kiterjeszt&eacute;s';
$TEXT['NO_RESULTS'] = 'Nincs eredm&eacute;ny';
$TEXT['WEBSITE_TITLE'] = 'Weblap C&iacute;m';
$TEXT['WEBSITE_DESCRIPTION'] = 'Weblap le&iacute;r&aacute;s';
$TEXT['WEBSITE_KEYWORDS'] = 'Weblap kulcsszavak';
$TEXT['WEBSITE_HEADER'] = 'Weblap fejl&eacute;c';
$TEXT['WEBSITE_FOOTER'] = 'Weblap l&aacute;bl&eacute;c';
$TEXT['RESULTS_HEADER'] = 'Eredm&eacute;nyek fejl&eacute;c';
$TEXT['RESULTS_LOOP'] = 'Eredm&eacute;nyek ciklus';
$TEXT['RESULTS_FOOTER'] = 'Eredm&eacute;nyek l&aacute;bl&eacute;c';
$TEXT['LEVEL'] = 'Szint';
$TEXT['NOT_FOUND'] = 'Nem tal&aacute;lhat&oacute;';
$TEXT['PAGE_SPACER'] = 'Lap filen&eacute;v elv&aacute;laszt&oacute;';
$TEXT['MATCHING'] = 'Egyez&eacute;s';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Sablon jogosults&aacute;gok';
$TEXT['PAGES_DIRECTORY'] = 'Lap k&ouml;nyvt&aacute;r';
$TEXT['MEDIA_DIRECTORY'] = 'M&eacute;dia k&ouml;nyvt&aacute;r';
$TEXT['FILE_MODE'] = 'File M&oacute;d';
$TEXT['USER'] = 'Felhaszn&aacute;l&oacute;';
$TEXT['OTHERS'] = 'Egyebek';
$TEXT['READ'] = 'Olvas&aacute;s';
$TEXT['WRITE'] = '&Iacute;r&aacute;s';
$TEXT['EXECUTE'] = 'V&eacute;grehajt&aacute;s';
$TEXT['SMART_LOGIN'] = 'Okos bejelentkez&eacute;s';
$TEXT['REMEMBER_ME'] = 'Eml&eacute;kezzen';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'File rendszer jogosults&aacute;gok';
$TEXT['DIRECTORIES'] = 'K&ouml;nyvt&aacute;rak';
$TEXT['DIRECTORY_MODE'] = 'K&ouml;nyvt&aacute;r m&oacute;d';
$TEXT['LIST_OPTIONS'] = 'Lista opci&oacute;k';
$TEXT['OPTION'] = 'Opci&oacute;k';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'T&ouml;bbet is kiv&aacute;laszthat';
$TEXT['TEXTFIELD'] = 'Sz&ouml;vegmez&otilde;';
$TEXT['TEXTAREA'] = 'Sz&ouml;vegter&uuml;let';
$TEXT['SELECT_BOX'] = 'Jel&ouml;l&otilde; n&eacute;gyzet';
$TEXT['CHECKBOX_GROUP'] = 'Jel&ouml;l&otilde; n&eacute;gyzet csoport';
$TEXT['RADIO_BUTTON_GROUP'] = 'V&aacute;laszt&oacute; gomb csoport';
$TEXT['SIZE'] = 'm&eacute;ret';
$TEXT['DEFAULT_TEXT'] = 'Alap&eacute;rtelmezett sz&ouml;veg';
$TEXT['SEPERATOR'] = 'Elv&aacute;laszt&oacute;';
$TEXT['BACK'] = 'Vissza';
$TEXT['UNDER_CONSTRUCTION'] = 'Fejleszt&eacute;s alatt';
$TEXT['MULTISELECT'] = 'T&ouml;bb v&aacute;laszt&aacute;sos';
$TEXT['SHORT_TEXT'] = 'R&ouml;vid sz&ouml;veg';
$TEXT['LONG_TEXT'] = 'Hossz&uacute; sz&ouml;veg';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Honlap &aacute;tir&aacute;ny&iacute;t&aacute;s';
$TEXT['HEADING'] = 'C&iacute;msor';
$TEXT['MULTIPLE_MENUS'] = 'T&ouml;bbszint&ucirc; men&uuml;';
$TEXT['REGISTERED'] = 'Regisztr&aacute;lva';
$TEXT['SECTION_BLOCKS'] = 'Szakaszok';
$TEXT['REGISTERED_VIEWERS'] = 'Regisztr&aacute;lt l&aacute;togat&oacute;k';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers';
$TEXT['SUBMISSION_ID'] = 'Bek&uuml;ld&eacute;s azonos&iacute;t&oacute;';
$TEXT['SUBMISSIONS'] = 'Bek&uuml;ld&eacute;sek';
$TEXT['SUBMITTED'] = 'Elk&uuml;ldve';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. bek&uuml;ld&eacute;s &oacute;r&aacute;nk&eacute;nt';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'T&aacute;rolva az adatb&aacute;zisban';
$TEXT['EMAIL_ADDRESS'] = 'E-mail C&iacute;m';
$TEXT['CUSTOM'] = 'Egy&eacute;ni';
$TEXT['ANONYMOUS'] = 'Anonymous';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Szerver Oper&aacute;ci&oacute;s Rendszer';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Mindenki &aacute;ltal &iacute;rhat&oacute; file jogok';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Home K&ouml;nyvt&aacute;r';
$TEXT['HOME_FOLDERS'] = 'Home K&ouml;nyvt&aacute;rak';
$TEXT['PAGE_TRASH'] = 'Lap kuka';
$TEXT['INLINE'] = 'sorban';
$TEXT['SEPARATE'] = 'k&uuml;l&ouml;n&aacute;ll&oacute;';
$TEXT['DELETED'] = 'T&ouml;r&ouml;lve';
$TEXT['VIEW_DELETED_PAGES'] = 'T&ouml;r&ouml;lt Lapok megtekint&eacute;se';
$TEXT['EMPTY_TRASH'] = 'Kuka &uuml;r&iacute;t&eacute;se';
$TEXT['TRASH_EMPTIED'] = 'Kuka ki&uuml;r&iacute;tve';
$TEXT['ADD_SECTION'] = 'Szakasz hozz&aacute;ad&aacute;sa';
$TEXT['POST_HEADER'] = '&Uuml;zenet fejl&eacute;c';
$TEXT['POST_FOOTER'] = '&Uuml;zenet l&aacute;bl&eacute;c';
$TEXT['POSTS_PER_PAGE'] = '&Uuml;zenetek laponk&eacute;nt';
$TEXT['RESIZE_IMAGE_TO'] = 'K&eacute;p &aacute;tm&eacute;retez&eacute;se';
$TEXT['UNLIMITED'] = 'V&eacute;gtelen';
$TEXT['OF'] = '&ouml;sszesen:';
$TEXT['OUT_OF'] = 'T&uacute;l';
$TEXT['NEXT'] = 'K&ouml;vetkez&otilde;';
$TEXT['PREVIOUS'] = 'El&otilde;z&otilde;';
$TEXT['NEXT_PAGE'] = 'K&ouml;vetkez&otilde; oldal';
$TEXT['PREVIOUS_PAGE'] = 'El&otilde;z&otilde; oldal';
$TEXT['ON'] = 'Be';
$TEXT['LAST_UPDATED_BY'] = 'M&oacute;dos&iacute;totta';
$TEXT['RESULTS_FOR'] = 'Keresett';
$TEXT['TIME'] = 'Id&otilde;';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['SERVER_EMAIL'] = 'Port&aacute;l E-mail c&iacute;me';
$TEXT['MENU'] = 'Men&uuml;';
$TEXT['MANAGE_GROUPS'] = 'Csoportok kezel&eacute;se';
$TEXT['MANAGE_USERS'] = 'Felhaszn&aacute;l&oacute;k kezel&eacute;se';
$TEXT['PAGE_LANGUAGES'] = 'Lap nyelv';
$TEXT['HIDDEN'] = 'Rejtett';
$TEXT['MAIN'] = 'F&otilde;';
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
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Please specify a default "FROM" address and "SENDER" name below. It is recommended to use a FROM address like: <strong>admin@yourdomain.com</strong>. Some mail provider (e.g. <em>mail.com</em>) may reject mails with a FROM: address like <em>name@mail.com</em> sent via a foreign relay to avoid spam.<br /><br />The default values are only used if no other values are specified by Website Baker. If your server supports <acronym title="Simple mail transfer protocol">SMTP</acronym>, you may want use this option for outgoing mails.';
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

// Success/error messages
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Sajn&aacute;ljuk, de a megjelen&iacute;t&eacute;shez nincs jogosults&aacute;ga!';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegend&otilde; jogosults&aacute;god!';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'K&eacute;rem adja meg a Felhaszn&aacute;l&oacute;nevet &eacute;s a jelsz&oacute;t';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'K&eacute;rem adja meg a Felhaszn&aacute;l&oacute;nevet';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'K&eacute;rem adja meg a jelsz&oacute;t';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'T&uacute;l r&ouml;vid Felhaszn&aacute;l&oacute;n&eacute;v';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'T&uacute;l r&ouml;vid jelsz&oacute;';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'T&uacute;l hossz&uacute; Felhaszn&aacute;l&oacute;n&eacute;v';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'T&uacute;l hossz&uacute; jelsz&oacute;';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Felhaszn&aacute;l&oacute;n&eacute;v vagy a jelsz&oacute; nem megfelel&otilde;!';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'E-mail c&iacute;met meg kell adnia';
$MESSAGE['SIGNUP2']['SUBJECT_LOGIN_INFO'] = 'Your login details...';
$MESSAGE['SIGNUP2']['BODY_LOGIN_INFO'] = <<< EOT
Hello {LOGIN_DISPLAY_NAME},

Your '{LOGIN_WEBSITE_TITLE}' login details are:
Username: {LOGIN_NAME}
Password: {LOGIN_PASSWORD}

Your password has been set to the one above.
This means that your old password will no longer work.

If you have received this message in error, please delete it immediately.
EOT;

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'K&eacute;rem &iacute;rja be az E-mail c&iacute;m&eacute;t';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Az &Ouml;n &aacute;ltal megadott E-mail c&iacute;m nem talalhat&oacute; adatb&aacute;zisunkban';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Az E-mail k&uuml;ld&eacute;s probl&eacute;m&aacute;ba &uuml;tk&ouml;z&ouml;tt, k&eacute;rem vegye fel a kapcsolatot az adminisztr&aacute;torral';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'A Felhaszn&aacute;l&oacute;nev&eacute;t &eacute;s jelszav&aacute;t elk&uuml;ldt&uuml;k az &Ouml;n E-mail c&iacute;m&eacute;re';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Sajn&aacute;ljuk, de a jelsz&oacute;t nem lehet egy &oacute;r&aacute;n bel&uuml;l t&ouml;bbsz&ouml;r &uacute;jrak&eacute;rni';

$MESSAGE['START']['WELCOME_MESSAGE'] = '&Uuml;dv a Website Baker Admin fel&uuml;let&eacute;n';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Figyelmeztet&eacute;s! A telep&iacute;t&eacute;si k&ouml;nyvt&aacute;r m&eacute;g nem lett t&ouml;r&ouml;lve!';
$MESSAGE['START']['CURRENT_USER'] = 'Bejelentkezve mint:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'A konfigur&aacute;ci&oacute;s file nem nyithat&oacute; meg';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Nem lehets&eacute;ges a konfigur&aacute;ci&oacute;s file &iacute;r&aacute;sa';
$MESSAGE['SETTINGS']['SAVED'] = 'Be&aacute;ll&iacute;t&aacute;sok sikeresen elmentve';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Figyelmeztet&eacute;s: A nem mentett v&aacute;ltoz&aacute;sok elvesznek';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Figyelmeztet&eacute;s: Ez csak tesztk&ouml;rnyezetben javasolt';

$MESSAGE['USERS']['ADDED'] = 'Felhaszn&aacute;l&oacute; sikeresen hozz&aacute;adva';
$MESSAGE['USERS']['SAVED'] = 'Felhaszn&aacute;l&oacute; sikeresen mentve';
$MESSAGE['USERS']['DELETED'] = 'Felhaszn&aacute;l&oacute; t&ouml;r&ouml;lve';
$MESSAGE['USERS']['NO_GROUP'] = 'Csoport nincs kiv&aacute;lasztva';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'A be&iacute;rt Felhaszn&aacute;l&oacute;n&eacute;v t&uacute;l r&ouml;vid';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'A be&iacute;rt jelsz&oacute; t&uacute;l r&ouml;vid';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'A be&iacute;rt jelsz&oacute; nem eggyezik';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Az E-mail c&iacute;m nem val&oacute;s';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Sajnos a megadott E-mail c&iacute;met m&aacute;r haszn&aacute;latban van';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'M&aacute;r foglalt Felhaszn&aacute;l&oacute;n&eacute;v';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Figyelem: A jelsz&oacute;t itt csak annak megv&aacute;ltoztat&aacute;sakor kell megadni';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Biztos, hogy t&ouml;r&ouml;lni a kiv&aacute;lasztott felhaszn&aacute;l&oacute;t?';

$MESSAGE['GROUPS']['ADDED'] = 'Csoport sikeresen hozz&aacute;adva';
$MESSAGE['GROUPS']['SAVED'] = 'Csoport elmentve';
$MESSAGE['GROUPS']['DELETED'] = 'Csoport t&ouml;r&ouml;lve';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = '&Uuml;res a csoportn&eacute;v';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Biztos, hogy t&ouml;r&ouml;lni akarja a kijel&ouml;lt csoportot? (Minden felhaszn&aacute;l&oacute;ja t&ouml;rl&otilde;dik)';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Nincs csoport';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Group name already exists';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Sikeres ment&eacute;s';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'E-mail friss&iacute;tve';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'A jelenlegi jelsz&oacute; hib&aacute;s';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'A jelsz&oacute; sikeresen megv&aacute;ltozott';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Figyelem: A sablon megv&aacute;ltoztat&aacute;s&aacute;t a be&aacute;ll&iacute;t&aacute;sokban teheti meg';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Nem tartalmazhat ../ -t a k&ouml;nyvt&aacute;r n&eacute;v';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Nem lehet ../ a c&eacute;l mez&otilde;ben';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Nem lehet ../ a n&eacute;vben';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'Nem lehet index.php a n&eacute;v';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Nem tal&aacute;lhat&oacute; semmilyen m&eacute;dia file az aktu&aacute;lis k&ouml;nyvt&aacute;rban';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'File nem tal&aacute;lhat&oacute;';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'File t&ouml;r&ouml;lve';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'K&ouml;nyvt&aacute;r t&ouml;r&ouml;lve';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Biztos hogy t&ouml;rli a k&ouml;vetkez&otilde; file-t vagy k&ouml;nyvt&aacute;rat?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Nem lehet t&ouml;r&ouml;lni a kiv&aacute;lasztott file-t';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Nem lehet t&ouml;r&ouml;lni a kiv&aacute;lasztott k&ouml;nyvt&aacute;rat';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Nem adott meg &uacute;j nevet';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Nem adott meg file kiterjeszt&eacute;st';
$MESSAGE['MEDIA']['RENAMED'] = '&Aacute;tnevez&eacute;s sikeres';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Nem siker&uuml;lt &aacute;tnevezni';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Ilyen nev&ucirc; file m&aacute;r l&eacute;tezik';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Ilyen nev&ucirc; k&ouml;nyvt&aacute;r m&aacute;r l&eacute;tezik';
$MESSAGE['MEDIA']['DIR_MADE'] = 'A k&ouml;nyvt&aacute;r sikeresen l&eacute;trehozva';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'nem siker&uuml;lt l&eacute;trehozni a k&ouml;nyvt&aacute;rat';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' file sikeresen felt&ouml;ltve';
$MESSAGE['MEDIA']['UPLOADED'] = ' file sikeresen felt&ouml;ltve';

$MESSAGE['PAGES']['ADDED'] = 'Lap sikeresen hozz&aacute;adva';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Lap c&iacute;msor sikeresen hozz&aacute;adva';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Ilyen lap m&aacute;r l&eacute;tezik';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Nem lehet l&eacute;trehozni az access filet a /pages k&ouml;nyvt&aacute;rban (nem megfelel&otilde; jogosults&aacute;gok)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Nem lehet t&ouml;r&ouml;lni az access filet a /pages k&ouml;nyvt&aacute;rban (nem megfelel&otilde; jogosults&aacute;gok)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Lap nem tal&aacute;lhat&oacute;';
$MESSAGE['PAGES']['SAVED'] = 'Lap sikeresen elmentve';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Lap be&aacute;ll&iacute;t&aacute;sok elmentve';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Hiba a lap ment&eacute;se k&ouml;zben';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Biztos, hogy t&ouml;r&ouml;lni akarja az adott lapot? (&eacute;s az &ouml;sszes al lapj&aacute;t)';
$MESSAGE['PAGES']['DELETED'] = 'Lap t&ouml;r&ouml;lve';
$MESSAGE['PAGES']['RESTORED'] = 'lap vissza&aacute;ll&iacute;tva';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'K&eacute;rem adjon meg Lap c&iacute;met';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'K&eacute;rem adjon meg men&uuml; nevet';
$MESSAGE['PAGES']['REORDERED'] = 'Lap sikeresen &aacute;trendezve';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Hiba a Lap &aacute;trendez&eacute;s k&ouml;zben';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Nincs joga m&oacute;dos&iacute;tani ezt a lapot';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Nem lehet l&eacute;trehozni /pages/intro.php file-t (nincs megfelel&otilde; jogosults&aacute;g)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Bevezet&otilde; lap sikeresen elmentve';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Utolj&aacute;ra m&oacute;dos&iacute;totta:';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Kattintson ide az Bevezet&otilde; Lap m&oacute;dos&iacute;t&aacute;s&aacute;hoz';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Szakasz tulajdons&aacute;gok elmentve';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Visszat&eacute;r&eacute;s a lapokhoz';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'K&eacute;rem t&eacute;rjen vissza &eacute;s t&ouml;lts&ouml;n ki minden mez&otilde;t';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'A felt&ouml;lt&ouml;tt file csak ilyen form&aacute;tum&uacute; lehet:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'A felt&ouml;lt&ouml;tt file-ok csak a k&ouml;vetkez&otilde; form&aacute;tumuak lehetnek:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'File felt&ouml;lt&eacute;s nem lehets&eacute;ges';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'M&aacute;r telep&iacute;tve';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Nincs telp&iacute;tve';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Nem lehet elt&aacute;vol&iacute;tani';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Kicsomagol&aacute;s nem lehets&eacute;ges';
$MESSAGE['GENERIC']['INSTALLED'] = 'Telep&iacute;t&eacute;s sikeres';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Elt&aacute;vol&iacute;t&aacute;s sikeres';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'A c&eacute;l k&ouml;nyvt&aacute;r nem &iacute;rhat&oacute;';
$MESSAGE['GENERIC']['INVALID'] = 'A felt&ouml;lt&ouml;tt file nem megfelel&otilde;';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet elt&aacute;volt&iacute;tani! A file haszn&aacute;latban van.';

$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL'] = "<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />";
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = "this page;these pages";
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "Can't uninstall the template <b>{{name}}</b>, because it is the default template!";

$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION'] = 'Website Under Construction';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'K&eacute;rem t&eacute;rjen vissza k&eacute;s&otilde;bb!';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Error opening file.';
$MESSAGE['GENERIC']['INVALID_ADDON_FILE'] = 'Invalid Website Baker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC']['INVALID_LANGUAGE_FILE'] = 'Invalid Website Baker language file. Please check the text file.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'A k&ouml;vetkez&otilde; mez&otilde;ket k&ouml;telez&otilde; kit&ouml;ltenie';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sajn&aacute;ljuk, de ez az &ucirc;rlap t&uacute;l sokszor lett kit&ouml;ltve egy &oacute;ran bel&uuml;l! K&eacute;rem pr&oacute;b&aacute;lja meg egy &oacute;ra m&uacute;lva.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL.'';

$MESSAGE['ADDON']['RELOAD'] = 'Update database with information from Add-on files (e.g. after FTP upload).';
$MESSAGE['ADDON']['ERROR_RELOAD'] = 'Error while updating the Add-On information.';
$MESSAGE['ADDON']['MODULES_RELOADED'] = 'Modules reloaded successfully';
$MESSAGE['ADDON']['TEMPLATES_RELOADED'] = 'Templates reloaded successfully';
$MESSAGE['ADDON']['LANGUAGES_RELOADED'] = 'Languages reloaded successfully';
$MESSAGE['ADDON']['PRECHECK_FAILED'] = 'Add-on installation failed. Your system does not fulfill the requirements of this Add-on. To make this Add-on working on your system, please fix the issues summarized below.';
$MESSAGE['ADDON']['MANUAL_INSTALLATION'] = 'When modules are uploaded via FTP (not recommended), the module installation files <tt>install.php</tt>, <tt>upgrade.php</tt> or <tt>uninstall.php</tt> will not be executed automatically. Those modules may not work correct or do not uninstall properly.<br /><br />You can execute the module files manually for modules uploaded via FTP below.';
$MESSAGE['ADDON']['MANUAL_INSTALLATION_WARNING'] = 'Warning: Existing module database entries will get lost. Only use this option if you experience problems with modules uploaded via FTP.';

?>