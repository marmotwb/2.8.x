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
$MENU['MEDIA'] = 'M&eacute;dia';
$MENU['ADDONS'] = 'Kieg&eacute;sz&iacute;tī';
$MENU['MODULES'] = 'Modulok';
$MENU['TEMPLATES'] = 'Sablonok';
$MENU['LANGUAGES'] = 'Nyelvek';
$MENU['PREFERENCES'] = 'Saj&aacute;t adatok';
$MENU['SETTINGS'] = 'Param&eacute;terek';
$MENU['ADMINTOOLS'] = 'Admin-Eszk&ouml;z&ouml;k';
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
$OVERVIEW['MODULES'] = 'WebsiteBaker modulok kezel&eacute;se...';
$OVERVIEW['TEMPLATES'] = 'A Honlap megjelen&eacute;s&eacute;nek v&aacute;ltoztat&aacute;sa Sablonokkal...';
$OVERVIEW['LANGUAGES'] = 'WebsiteBaker nyelvi be&aacute;ll&iacute;t&aacute;sok...';
$OVERVIEW['PREFERENCES'] = 'Be&aacute;ll&iacute;t&aacute;sok megv&aacute;ltoztat&aacute;sa mint: email, jelsz&oacute;, stb... ';
$OVERVIEW['SETTINGS'] = 'A rendszer glob&aacute;lis be&aacute;ll&iacute;t&aacute;sa...';
$OVERVIEW['USERS'] = 'Felhaszn&aacute;l&oacute;k bejelentkez&eacute;si enged&eacute;lyei...';
$OVERVIEW['GROUPS'] = 'Csoportok &eacute;s azok rendszer jogainak kezel&eacute;se...';
$OVERVIEW['HELP'] = 'K&eacute;rd&eacute;sed van? itt tal&aacute;lsz v&aacute;laszt...  (Angol)';
$OVERVIEW['VIEW'] = 'A k&eacute;sz Port&aacute;l megtekint&eacute;se &uacute;j ablakban...';
$OVERVIEW['ADMINTOOLS'] = 'WebsiteBaker adminisztr&aacute;ci&oacute;s eszk&ouml;z&ouml;k...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Lap m&oacute;dos&iacute;t&aacute;sa/T&ouml;rl&eacute;se';
$HEADING['DELETED_PAGES'] = 'T&ouml;r&ouml;lt Lapok';
$HEADING['ADD_PAGE'] = 'Lap hozz&aacute;ad&aacute;sa';
$HEADING['ADD_HEADING'] = 'Fejl&eacute;c hozz&aacute;ad&aacute;sa';
$HEADING['MODIFY_PAGE'] = 'Lap m&oacute;dos&iacute;t&aacute;sa';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Lap be&aacute;ll&iacute;t&aacute;sainak m&oacute;dos&iacute;t&aacute;sa';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Speci&aacute;lis be&aacute;ll&iacute;t&aacute;sok';
$HEADING['MANAGE_SECTIONS'] = 'Szakaszok kezel&eacute;se';
$HEADING['MODIFY_INTRO_PAGE'] = 'Bevezet&agrave;lap m&oacute;dos&iacute;t&aacute;sa';

$HEADING['BROWSE_MEDIA'] = 'M&eacute;dia b&ouml;ng&eacute;sz&eacute;se';
$HEADING['CREATE_FOLDER'] = '&ordf; k&ouml;nyvt&aacute;r';
$HEADING['UPLOAD_FILES'] = 'F&aacute;jl(ok) felt&ouml;lt&eacute;se';

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

$HEADING['GENERAL_SETTINGS'] = '&not;tal&aacute;nos be&aacute;ll&iacute;t&aacute;sok';
$HEADING['DEFAULT_SETTINGS'] = 'Alap&eacute;rtelmezett Be&aacute;ll&iacute;t&aacute;sok';
$HEADING['SEARCH_SETTINGS'] = 'Keres&eacute;si be&aacute;ll&iacute;t&aacute;sok';
$HEADING['FILESYSTEM_SETTINGS'] = 'F&aacute;jl Rendszer';
$HEADING['SERVER_SETTINGS'] = 'Szerver be&aacute;ll&iacute;t&aacute;sok';
$HEADING['WBMAILER_SETTINGS'] = 'Levelez&agrave;Be&aacute;ll&iacute;t&aacute;sok';
$HEADING['ADMINISTRATION_TOOLS'] = 'Adminisztr&aacute;ci&oacute;s eszk&ouml;z&ouml;k';

$HEADING['MODIFY_DELETE_USER'] = 'Felhaszn&aacute;l&oacute; m&oacute;dos&iacute;t&aacute;sa/t&ouml;rl&eacute;se';
$HEADING['ADD_USER'] = 'Felhaszn&aacute;l&oacute; hozz&aacute;ad&aacute;sa';
$HEADING['MODIFY_USER'] = 'Felhaszn&aacute;l&oacute; m&oacute;dos&iacute;t&aacute;sa';


$HEADING['MODIFY_DELETE_GROUP'] = 'Csoport m&oacute;dos&iacute;t&aacute;sa/t&ouml;rl&eacute;se';
$HEADING['ADD_GROUP'] = 'Csoport m&oacute;dos&iacute;t&aacute;sa';
$HEADING['MODIFY_GROUP'] = 'Csoport m&oacute;dos&iacute;t&aacute;sa';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Kieg&eacute;sz&iacute;t&agrave;k&ouml;vetelm&eacute;nyek nem megfelelĥk';
$HEADING['INVOKE_MODULE_FILES'] = 'Modul f&aacute;jlok v&eacute;grehajt&aacute;sa manu&aacute;lisan';

// Other text
$TEXT['OPEN'] = 'Megnyit&aacute;s';
$TEXT['ADD'] = 'Hozz&aacute;ad';
$TEXT['MODIFY'] = 'M&oacute;dos&iacute;t&aacute;s';
$TEXT['SETTINGS'] = 'Be&aacute;ll&iacute;t&aacute;s';
$TEXT['DELETE'] = 'T&ouml;rl&eacute;s';
$TEXT['SAVE'] = 'Ment&eacute;s';
$TEXT['RESET'] = 'Visszavon';
$TEXT['LOGIN'] = 'Bel&eacute;p&eacute;s';
$TEXT['RELOAD'] = '&ordf;rat&ouml;lt&eacute;s';
$TEXT['CANCEL'] = 'M&eacute;gse';
$TEXT['NAME'] = 'N&eacute;v';
$TEXT['PLEASE_SELECT'] = 'K&eacute;rem v&aacute;lasszon';
$TEXT['TITLE'] = 'C&iacute;m';
$TEXT['PARENT'] = 'Almen&uuml;je ennek';
$TEXT['TYPE'] = 'T&iacute;pus';
$TEXT['VISIBILITY'] = 'Megjelen&eacute;s';
$TEXT['PRIVATE'] = 'Priv&aacute;t';
$TEXT['PUBLIC'] = 'Publikus';
$TEXT['NONE'] = 'Egyik sem';
$TEXT['NONE_FOUND'] = 'Nem tal&aacute;lhat&oacute;';
$TEXT['CURRENT'] = 'Aktu&aacute;lis';
$TEXT['CHANGE'] = 'M&oacute;dos&iacute;t';
$TEXT['WINDOW'] = 'Ablak';
$TEXT['DESCRIPTION'] = 'Le&iacute;r&aacute;s';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['ADMINISTRATORS'] = 'Adminisztr&aacute;torok';
$TEXT['PRIVATE_VIEWERS'] = 'Priv&aacute;t jogosultak';
$TEXT['EXPAND'] = 'Kibont';
$TEXT['COLLAPSE'] = '&sup3;szecsuk';
$TEXT['MOVE_UP'] = 'Mozgat Fel';
$TEXT['MOVE_DOWN'] = 'Mozgat Le';
$TEXT['RENAME'] = '&acute;nevez';
$TEXT['MODIFY_SETTINGS'] = 'Be&aacute;ll&iacute;t&aacute;sok m&oacute;dos&iacute;t&aacute;sa';
$TEXT['MODIFY_CONTENT'] = 'Tartalom m&oacute;dos&iacute;t&aacute;sa';
$TEXT['VIEW'] = 'N&eacute;zet';
$TEXT['UP'] = 'Fel';
$TEXT['FORGOTTEN_DETAILS'] = 'Mi is a jelsz&oacute;?';
$TEXT['NEED_TO_LOGIN'] = 'Vissza a bel&eacute;p&eacute;shez';
$TEXT['SEND_DETAILS'] = 'Jelsz&oacute; elk&uuml;ld&eacute;se';
$TEXT['USERNAME'] = 'Felhaszn&aacute;l&oacute;n&eacute;v';
$TEXT['PASSWORD'] = 'Jelsz&oacute;';
$TEXT['HOME'] = 'KezdĬap';
$TEXT['TARGET_FOLDER'] = 'C&eacute;l k&ouml;nyvt&aacute;r';
$TEXT['OVERWRITE_EXISTING'] = 'Megl&eacute;v&agrave;fel&uuml;l&iacute;r&aacute;sa';
$TEXT['FILE'] = 'F&aacute;jl';
$TEXT['FILES'] = 'F&aacute;jlok';
$TEXT['FOLDER'] = 'K&ouml;nyvt&aacute;r';
$TEXT['FOLDERS'] = 'K&ouml;nyvt&aacute;rak';
$TEXT['CREATE_FOLDER'] = 'K&ouml;nyvt&aacute;r l&eacute;trehoz&aacute;sa';
$TEXT['UPLOAD_FILES'] = 'F&aacute;jl felt&ouml;lt&eacute;s';
$TEXT['CURRENT_FOLDER'] = 'Aktu&aacute;lis k&ouml;nyvt&aacute;r';
$TEXT['TO'] = 'C&iacute;mzett';
$TEXT['FROM'] = 'Felad&oacute;';
$TEXT['INSTALL'] = 'Telep&iacute;t';
$TEXT['UNINSTALL'] = 'Elt&aacute;vol&iacute;t';
$TEXT['VIEW_DETAILS'] = 'Inf&oacute;t megn&eacute;z';
$TEXT['DISPLAY_NAME'] = 'Megjelen&agrave;N&eacute;v';
$TEXT['AUTHOR'] = 'Szerz&ccedil;';
$TEXT['VERSION'] = 'Verzi&oacute;';
$TEXT['DESIGNED_FOR'] = 'Tervezve';
$TEXT['DESCRIPTION'] = 'Le&iacute;r&aacute;s';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Nyelv';
$TEXT['TIMEZONE'] = 'Idĺ&oacute;na';
$TEXT['CURRENT_PASSWORD'] = 'Aktu&aacute;lis Jelsz&oacute;';
$TEXT['NEW_PASSWORD'] = '&ordf; Jelsz&oacute;';
$TEXT['RETYPE_NEW_PASSWORD'] = '&ordf; Jelsz&oacute; m&eacute;gegyszer';
$TEXT['ACTIVE'] = 'Akt&iacute;v';
$TEXT['DISABLED'] = 'Letiltva';
$TEXT['ENABLED'] = 'Enged&eacute;lyezve';
$TEXT['RETYPE_PASSWORD'] = 'Jelsz&oacute; m&eacute;gegyszer';
$TEXT['GROUP'] = 'Csoport';
$TEXT['SYSTEM_PERMISSIONS'] = 'Rendszer enged&eacute;lyek';
$TEXT['MODULE_PERMISSIONS'] = 'Modul enged&eacute;lyek';
$TEXT['SHOW_ADVANCED'] = 'Speci&aacute;lis be&aacute;ll&iacute;t&aacute;sok mutat&aacute;sa';
$TEXT['HIDE_ADVANCED'] = 'Speci&aacute;lis be&aacute;ll&iacute;t&aacute;sok elrejt&eacute;se';
$TEXT['BASIC'] = 'Alap';
$TEXT['ADVANCED'] = 'BĶ&iacute;tett';
$TEXT['WEBSITE'] = 'Weblap';
$TEXT['DEFAULT'] = 'Alap&eacute;rtelmezett';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['TEXT'] = 'Sz&ouml;veg';
$TEXT['HEADER'] = 'Fejl&eacute;c';
$TEXT['FOOTER'] = 'L&aacute;bl&eacute;c';
$TEXT['TEMPLATE'] = 'Weboldal Sablon';
$TEXT['THEME'] = 'Admin T&eacute;ma';
$TEXT['INSTALLATION'] = 'Telep&iacute;t&eacute;s';
$TEXT['DATABASE'] = 'Adatb&aacute;zis';
$TEXT['HOST'] = 'Host';
$TEXT['INTRO'] = 'Bevezet&ccedil;';
$TEXT['PAGE'] = 'Lap';
$TEXT['SIGNUP'] = 'Regisztr&aacute;l&aacute;s...';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP hibajelent&eacute;si szint';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = '&acute;vonal';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Megjelen&agrave;fel&uuml;let';
$TEXT['EXTENSION'] = 'Kiterjeszt&eacute;s';
$TEXT['TABLE_PREFIX'] = 'T&aacute;bla elĴag';
$TEXT['CHANGES'] = 'V&aacute;toz&aacute;sok';
$TEXT['ADMINISTRATION'] = 'Adminisztr&aacute;l&aacute;s';
$TEXT['FORGOT_DETAILS'] = 'Elfelejtettem a jelsz&oacute;t.';
$TEXT['LOGGED_IN'] = 'Bejelentkezve';
$TEXT['WELCOME_BACK'] = '&curren;v';
$TEXT['FULL_NAME'] = 'Teljes n&eacute;v';
$TEXT['ACCOUNT_SIGNUP'] = 'Fi&oacute;k L&eacute;trehoz&aacute;s';
$TEXT['LINK'] = 'Hivatkoz&aacute;s';
$TEXT['ANCHOR'] = 'Horgony';
$TEXT['TARGET'] = 'C&eacute;l';
$TEXT['NEW_WINDOW'] = '&ordf; ablak';
$TEXT['SAME_WINDOW'] = 'Azonos Ablak';
$TEXT['TOP_FRAME'] = 'Fels&agrave;Keret';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lap szint limit';
$TEXT['SUCCESS'] = 'Sikeres';
$TEXT['ERROR'] = 'Hiba';
$TEXT['ARE_YOU_SURE'] = 'Biztos hogy ezt akarja?';
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
$TEXT['LONG'] = 'Hosszű';
$TEXT['LOOP'] = 'ism&eacute;tlĤ&uuml;/br&gt; t&ouml;rzs szakasz';
$TEXT['FIELD'] = 'Mez&ccedil;';
$TEXT['REQUIRED'] = 'K&ouml;telez&ccedil;';
$TEXT['LENGTH'] = 'Hossz';
$TEXT['MESSAGE'] = '&ordm;enet';
$TEXT['SUBJECT'] = 'T&aacute;rgy';
$TEXT['MATCH'] = 'Egyezik';
$TEXT['ALL_WORDS'] = 'Minden sz&oacute;';
$TEXT['ANY_WORDS'] = 'B&aacute;rmely sz&oacute;';
$TEXT['EXACT_MATCH'] = 'Pontos egyez&eacute;s';
$TEXT['SHOW'] = 'Mutat';
$TEXT['HIDE'] = 'Elrejt';
$TEXT['START_PUBLISHING'] = 'Publik&aacute;l&aacute;s kezdete';
$TEXT['FINISH_PUBLISHING'] = 'Publik&aacute;l&aacute;s v&eacute;ge';
$TEXT['DATE'] = 'D&aacute;tum';
$TEXT['START'] = 'Kezd&eacute;s';
$TEXT['END'] = 'V&eacute;ge';
$TEXT['IMAGE'] = 'K&eacute;p';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Szakasz';
$TEXT['DATE_FORMAT'] = 'D&aacute;tum form&aacute;tum';
$TEXT['TIME_FORMAT'] = 'Id&agrave;form&aacute;tum';
$TEXT['RESULTS'] = 'Eredm&eacute;nyek';
$TEXT['RESIZE'] = '&ordf;ra m&eacute;retez';
$TEXT['MANAGE'] = 'Kezel';
$TEXT['CODE'] = 'K&oacute;d';
$TEXT['WIDTH'] = 'Sz&eacute;less&eacute;g';
$TEXT['HEIGHT'] = 'Magass&aacute;g';
$TEXT['MORE'] = 'BĶebben';
$TEXT['READ_MORE'] = '&lt;/br&gt;Tov&aacute;bb...&lt;/br&gt;';
$TEXT['CHANGE_SETTINGS'] = 'Be&aacute;ll&iacute;t&aacute;sok megv&aacute;ltoztat&aacute;sa';
$TEXT['CURRENT_PAGE'] = 'Aktu&aacute;lis Lap';
$TEXT['CLOSE'] = 'Bez&aacute;r';
$TEXT['INTRO_PAGE'] = 'Bevezet&agrave;Lap';
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
$TEXT['READ'] = 'Olr&aacute;s';
$TEXT['WRITE'] = 'g';
$TEXT['EXECUTE'] = 'V&eacute;grehajt&aacute;s';
$TEXT['SMART_LOGIN'] = 'Okos bejelentkez&eacute;s';
$TEXT['REMEMBER_ME'] = 'Eml&eacute;kezzen';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'File rendszer jogosults&aacute;gok';
$TEXT['DIRECTORIES'] = 'K&ouml;nyvt&aacute;rak';
$TEXT['DIRECTORY_MODE'] = 'K&ouml;nyvt&aacute;r m&oacute;d';
$TEXT['LIST_OPTIONS'] = 'Lista opci&oacute;k';
$TEXT['OPTION'] = 'Opci&oacute;k';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'T&ouml;bbet is kiv&aacute;laszthat';
$TEXT['TEXTFIELD'] = 'Sz&ouml;vegmez&ccedil;';
$TEXT['TEXTAREA'] = 'Sz&ouml;vegter&uuml;let';
$TEXT['SELECT_BOX'] = 'Jel&ouml;l&agrave;n&eacute;gyzet';
$TEXT['CHECKBOX_GROUP'] = 'Jel&ouml;l&agrave;n&eacute;gyzet csoport';
$TEXT['RADIO_BUTTON_GROUP'] = 'V&aacute;laszt&oacute; gomb csoport';
$TEXT['SIZE'] = 'M&eacute;ret';
$TEXT['DEFAULT_TEXT'] = 'Alap&eacute;rtelmezett sz&ouml;veg';
$TEXT['SEPERATOR'] = 'Elv&aacute;laszt&oacute;';
$TEXT['BACK'] = 'Vissza';
$TEXT['UNDER_CONSTRUCTION'] = 'Fejleszt&eacute;s alatt';
$TEXT['MULTISELECT'] = 'T&ouml;bb v&aacute;laszt&aacute;sos';
$TEXT['SHORT_TEXT'] = 'R&ouml;vid sz&ouml;veg';
$TEXT['LONG_TEXT'] = 'Hossz&uacute; sz&ouml;veg';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Honlap &aacute;tir&aacute;ny&iacute;t&aacute;s';
$TEXT['HEADING'] = 'C&iacute;msor';
$TEXT['MULTIPLE_MENUS'] = 'T&ouml;bbszintű men&uuml;';
$TEXT['REGISTERED'] = 'Regisztr&aacute;lva';
$TEXT['SECTION_BLOCKS'] = 'Szakaszok';
$TEXT['REGISTERED_VIEWERS'] = 'Regisztr&aacute;lt l&aacute;togat&oacute;k';
$TEXT['ALLOWED_VIEWERS'] = 'Enged&eacute;lyezett l&aacute;togat&oacute;k';
$TEXT['SUBMISSION_ID'] = 'Bek&uuml;ld&eacute;s azonos&iacute;t&oacute;';
$TEXT['SUBMISSIONS'] = 'Bek&uuml;ld&eacute;sek';
$TEXT['SUBMITTED'] = 'Elk&uuml;ldve';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. bek&uuml;ld&eacute;s &oacute;r&aacute;nk&eacute;nt';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'T&aacute;rolva az adatb&aacute;zisban';
$TEXT['EMAIL_ADDRESS'] = 'E-mail C&iacute;m';
$TEXT['CUSTOM'] = 'Egy&eacute;ni';
$TEXT['ANONYMOUS'] = 'N&eacute;vtelen';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Szerver Oper&aacute;ci&oacute;s Rendszer';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Mindenki &aacute;ltal &iacute;rhat&oacute; file jogok';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Home K&ouml;nyvt&aacute;r';
$TEXT['HOME_FOLDERS'] = 'Home K&ouml;nyvt&aacute;rak';
$TEXT['PAGE_TRASH'] = 'Lap kuka';
$TEXT['INLINE'] = 'Sorban';
$TEXT['SEPARATE'] = 'K&uuml;l&ouml;n&aacute;ll&oacute;';
$TEXT['DELETED'] = 'T&ouml;r&ouml;lve';
$TEXT['VIEW_DELETED_PAGES'] = 'T&ouml;r&ouml;lt Lapok megtekint&eacute;se';
$TEXT['EMPTY_TRASH'] = 'Kuka &uuml;r&iacute;t&eacute;s';
$TEXT['TRASH_EMPTIED'] = 'Kuka ki&uuml;r&iacute;tve';
$TEXT['ADD_SECTION'] = 'Szakasz hozz&aacute;ad&aacute;sa';
$TEXT['POST_HEADER'] = '&ordm;enet fejbl&eacute;c';
$TEXT['POST_FOOTER'] = '&ordm;enet l&aacute;bl&eacute;c';
$TEXT['POSTS_PER_PAGE'] = '&ordm;enetek laponk&eacute;nt';
$TEXT['RESIZE_IMAGE_TO'] = 'K&eacute;p &aacute;tm&eacute;retez&eacute;se';
$TEXT['UNLIMITED'] = 'V&eacute;gtelen';
$TEXT['OF'] = '&ouml;sszesen:';
$TEXT['OUT_OF'] = 'T&uacute;l';
$TEXT['NEXT'] = 'K&ouml;vetke&ccedil;';
$TEXT['PREVIOUS'] = 'Elĺ&ccedil;';
$TEXT['NEXT_PAGE'] = 'K&ouml;vetke&agrave;oldal';
$TEXT['PREVIOUS_PAGE'] = 'Elĺ&agrave;oldal';
$TEXT['ON'] = 'Be';
$TEXT['LAST_UPDATED_BY'] = 'M&oacute;dos&iacute;totta';
$TEXT['RESULTS_FOR'] = 'Keresett';
$TEXT['TIME'] = 'Id&ccedil;';
$TEXT['REDIRECT_AFTER'] = '&acute;ir&aacute;ny&iacute;t&aacute;s';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG St&iacute;lus';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Szerkeszt&ccedil;';
$TEXT['SERVER_EMAIL'] = 'Port&aacute;l E-mail c&iacute;me';
$TEXT['MENU'] = 'Men&uuml;';
$TEXT['MANAGE_GROUPS'] = 'Csoportok kezel&eacute;se';
$TEXT['MANAGE_USERS'] = 'Felhaszn&aacute;l&oacute;k kezel&eacute;se';
$TEXT['PAGE_LANGUAGES'] = 'Lap nyelv';
$TEXT['HIDDEN'] = 'Rejtett';
$TEXT['MAIN'] = 'F&ccedil;';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'F&aacute;jlok &aacute;tnevez&eacute;se felt&ouml;lt&eacute;sn&eacute;l';
$TEXT['APP_NAME'] = 'Alkalmaz&aacute;s Neve';
$TEXT['SESSION_IDENTIFIER'] = 'Session Azonos&iacute;t&oacute;';
$TEXT['SEC_ANCHOR'] = 'Szekci&oacute;-Horgony sz&ouml;veg';
$TEXT['BACKUP'] = 'Biztons&aacute;gi Ment&eacute;s';
$TEXT['RESTORE'] = 'Vissza&aacute;ll&iacute;t&aacute;s';
$TEXT['BACKUP_DATABASE'] = 'Adatb&aacute;zis Ment&eacute;se';
$TEXT['RESTORE_DATABASE'] = 'Adatb&aacute;zis Vissza&aacute;ll&iacute;t&aacute;sa';
$TEXT['BACKUP_ALL_TABLES'] = 'Minden adatb&aacute;zis t&aacute;bla ment&eacute;se';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Csak WB specifikus adatb&aacute;zis t&aacute;bla ment&eacute;se';
$TEXT['BACKUP_MEDIA'] = 'Biztons&aacute;gi ment&eacute;s M&eacute;dia';
$TEXT['RESTORE_MEDIA'] = 'Vissza&aacute;ll&iacute;t&aacute;si M&eacute;dia';
$TEXT['ADMINISTRATION_TOOL'] = 'Adminisztr&aacute;ci&oacute;s Eszk&ouml;z';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Ellen&ouml;rz&eacute;s';
$TEXT['VERIFICATION'] = 'Ellen&ouml;rz&eacute;s';
$TEXT['DEFAULT_CHARSET'] = 'Alap&eacute;rtelmezett Karakterrk&eacute;szlet';
$TEXT['CHARSET'] = 'Karakterk&eacute;szlet';
$TEXT['MODULE_ORDER'] = 'Modul sorrend keres&eacute;sn&eacute;l';
$TEXT['MAX_EXCERPT'] = 'Maximum tal&aacute;lat';
$TEXT['TIME_LIMIT'] = 'Maxim&aacute;lis id&agrave;a modulonk&eacute;nti tal&aacute;latra';
$TEXT['PUBL_START_DATE'] = 'Kezd&agrave;d&aacute;tum';
$TEXT['PUBL_END_DATE'] = 'Z&aacute;r&oacute; d&aacute;tum';
$TEXT['CALENDAR'] = 'Napt&aacute;r';
$TEXT['DELETE_DATE'] = 'D&aacute;tum t&ouml;rl&eacute;se';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'K&eacute;rlek add meg az alap&eacute;rtelmezett "K&uuml;ld&agrave;email" c&iacute;met &eacute;s a "K&uuml;ld&agrave;szem&eacute;ly" mezĴ. Aj&aacute;nlott az al&aacute;bbi foszn&aacute;lata: &lt;strong&gt;admin@tedomained.hu&lt;/strong&gt;. N&eacute;mely szolg&aacute;ltat&oacute; (e.g. &lt;em&gt;mail.com&lt;/em&gt;) Visszautas&iacute;thatja a leveleket az olyan k&uuml;ld&agrave;c&iacute;mtĬ mint &lt;@mail.com&lt;/em&gt; ez az&eacute;rt van hogy megakad&aacute;lyozz&aacute;k a SPAM k&uuml;ld&eacute;st.&lt;br /&gt;&lt;br /&gt;Az alap&eacute;rtelmezett &eacute;rt&eacute;kek csak akkor &eacute;rv&eacute;nyesek,ha nincs m&aacute;s megadva aker-ben. Ha a szervered t&aacute;mogatja &lt;acronym title="Simple mail transfer protocol"&gt;SMTP&lt;/acronym&gt;protokolt, akkor haszn&aacute;lhatod ezt az opci&oacute;t lev&eacute;l k&uuml;ld&eacute;;hez.';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'K&uuml;ld&agrave;email';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'K&uuml;ld&agrave;szem&eacute;ly';
$TEXT['WBMAILER_NOTICE'] = '&lt;strong&gt;SMTP Mailer Be&aacute;ll&iacute;t&aacute;sok:&lt;/strong&gt;&lt;br /&gt;Ezek a be&aacute;ll&iacute;t&aacute;sok csak akkor sz&uuml;ks&eacute;gesek, ha emailt akarsz k&uuml;ldeni &lt;acro="Simple mail transfer protocol"&gt;SMTP&lt;/acronym&gt; protokollon kereszt&uuml;l. Ha nem tudod az SMTP kiszolg&aacute;l&oacute;dat, vagy nem vagy biztos a k&ouml;vetlem&eacute;nyekben, akkoszerűen maradj az alap be&aacute;ll&iacute;t&aacute;sn&aacute;l: PHP MAIL.';
$TEXT['WBMAILER_FUNCTION'] = 'Mail Rutin';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Azonos&iacute;t&aacute;s';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'csak akkor aktiv&aacute;ld ha az SMTP host azonos&iacute;t&aacute;st k&eacute;r';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Felhaszn&aacute;l&oacute;n&eacute;v';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Jelsz&oacute;';
$TEXT['PLEASE_LOGIN'] = 'K&eacute;rem l&eacute;pjen be';
$TEXT['CAP_EDIT_CSS'] = 'CSS Szerkeszt&eacute;se';
$TEXT['HEADING_CSS_FILE'] = 'Aktu&aacute;lis Modul F&aacute;jl: ';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Itt szerkesztheted a CSS defin&iacute;ci&oacute;kat.';
$TEXT['CODE_SNIPPET'] = 'Code-r&eacute;szlet';
$TEXT['REQUIREMENT'] = 'K&ouml;vetelem&eacute;ny';
$TEXT['INSTALLED'] = 'telep&iacute;tve';
$TEXT['NOT_INSTALLED'] = 'nincs telep&iacute;tve';
$TEXT['ADDON'] = 'Kig&eacute;sz&iacute;t&ccedil;';
$TEXT['EXTENSION'] = 'BĶ&iacute;tm&eacute;ny';
$TEXT['UNZIP_FILE'] = 'ZIP arch&iacute;vum felt&ouml;lt&eacute;se &eacute;s kicsomagol&aacute;sa';
$TEXT['DELETE_ZIP'] = 'ZIP arch&iacute;vum t&ouml;rl&eacute;se kicsomagol&aacute;s ut&aacute;n&amp;';
$TEXT['NEED_CURRENT_PASSWORD'] ='confirm with current password';

// Success/error messages
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Sajn&aacute;ljuk, de a megjelen&iacute;t&eacute;shez nincs jogosults&aacute;ga!';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sajnos nincs megjelen&iacute;thet&agrave;tartalom';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegend&agrave;jogosults&aacute;god!';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'K&eacute;rem adja meg a Felhaszn&aacute;l&oacute;nevet &eacute;s a jelsz&oacute;t';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'K&eacute;rem adja meg a Felhaszn&aacute;l&oacute;nevet';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'K&eacute;rem adja meg a jelsz&oacute;t';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'T&uacute;l r&ouml;vid Felhaszn&aacute;l&oacute;n&eacute;v';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'T&uacute;l r&ouml;vid jelsz&oacute;';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'T&uacute;l hossz&uacute; Felhaszn&aacute;l&oacute;n&eacute;v';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'T&uacute;l hossz&uacute; jelsz&oacute;';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Felhaszn&aacute;l&oacute;n&eacute;v vagy a jelsz&oacute; nem megfelel&aacute;';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'E-mail c&iacute;met meg kell adnia';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Bejelentkez&eacute;si r&eacute;szletek...';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'K&eacute;rem &iacute;rja be az E-mail c&iacute;m&eacute;t';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Az &reg; &aacute;ltal megadott E-mail c&iacute;m nem talalhat&oacute; adatb&aacute;zisunkban';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Az E-mail k&uuml;ld&eacute;s probl&eacute;m&aacute;ba &uuml;tk&ouml;z&ouml;tt, k&eacute;rem vegye fel a kapcsolatot az adminisztr&aacute;torral';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'A Felhaszn&aacute;l&oacute;nev&eacute;t &eacute;s jelszav&aacute;t elk&uuml;ldt&uuml;k az &reg; E-mail c&iacute;m&eacute;re';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Sajn&aacute;ljuk, de a jelsz&oacute;t nem lehet egy &oacute;r&aacute;n bel&uuml;l t&ouml;bbsz&ouml;r &uacute;jrak&eacute;rni';

$MESSAGE['START_WELCOME_MESSAGE'] = '&curren;v a WebsiteBaker Admin fel&uuml;let&eacute;n';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Figyelmeztet&eacute;s! A telep&iacute;t&eacute;si k&ouml;nyvt&aacute;r m&eacute;g nem lett t&ouml;r&ouml;lve!';
$MESSAGE['START_CURRENT_USER'] = 'Bejelentkezve mint:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'A konfigur&aacute;ci&oacute;s file nem nyithat&oacute; meg';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Nem lehets&eacute;ges a konfigur&aacute;ci&oacute;s file &iacute;r&aacute;sa';
$MESSAGE['SETTINGS_SAVED'] = 'Be&aacute;ll&iacute;t&aacute;sok sikeresen elmentve';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Figyelmeztet&eacute;s: A nem mentett v&aacute;ltoz&aacute;sok elvesznek';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Figyelmeztet&eacute;s: Ez csak tesztk&ouml;rnyezetben javasolt';

$MESSAGE['USERS_ADDED'] = 'Felhaszn&aacute;l&oacute; sikeresen hozz&aacute;adva';
$MESSAGE['USERS_SAVED'] = 'Felhaszn&aacute;l&oacute; sikeresen mentve';
$MESSAGE['USERS_DELETED'] = 'Felhaszn&aacute;l&oacute; t&ouml;r&ouml;lve';
$MESSAGE['USERS_NO_GROUP'] = 'Csoport nincs kiv&aacute;lasztva';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'A be&iacute;rt Felhaszn&aacute;l&oacute;n&eacute;v t&uacute;l r&ouml;vid';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'A be&iacute;rt jelsz&oacute; t&uacute;l r&ouml;vid';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'A be&iacute;rt jelsz&oacute; nem eggyezik';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Az E-mail c&iacute;m nem val&oacute;s';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Sajnos a megadott E-mail c&iacute;met m&aacute;r haszn&aacute;latban van';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'M&aacute;r foglalt Felhaszn&aacute;l&oacute;n&eacute;v';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Figyelem: A jelsz&oacute;t itt csak annak megv&aacute;ltoztat&aacute;sakor kell megadni';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Biztos, hogy t&ouml;r&ouml;lni a kiv&aacute;lasztott felhaszn&aacute;l&oacute;t?';

$MESSAGE['GROUPS_ADDED'] = 'Csoport sikeresen hozz&aacute;adva';
$MESSAGE['GROUPS_SAVED'] = 'Csoport elmentve';
$MESSAGE['GROUPS_DELETED'] = 'Csoport t&ouml;r&ouml;lve';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = '&sup2;es a csoportn&eacute;v';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Biztos, hogy t&ouml;r&ouml;lni akarja a kijel&ouml;lt csoportot? (Minden felhaszn&aacute;l&oacute;ja t&ouml;rlĤik)';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Nincs csoport';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Csoport n&eacute;v m&aacute;r l&eacute;tezik';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Sikeres ment&eacute;s';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'E-mail friss&iacute;tve';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'A jelenlegi jelsz&oacute; hib&aacute;s';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'A jelsz&oacute; sikeresen megv&aacute;ltozott';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Figyelem: A sablon megv&aacute;ltoztat&aacute;s&aacute;t a be&aacute;ll&iacute;t&aacute;sokban teheti meg';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Nem tartalmazhat ../ -t a k&ouml;nyvt&aacute;r n&eacute;v';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Nem lehet ../ a c&eacute;l mezĢen';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Nem lehet ../ in k&ouml;nyvt&aacute;r n&eacute;vben';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Nem lehet ../ a n&eacute;vben';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Nem lehet index.php a n&eacute;v';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nem tal&aacute;lhat&oacute; semmilyen m&eacute;dia file az aktu&aacute;lis k&ouml;nyvt&aacute;rban';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'File nem tal&aacute;lhat&oacute;';
$MESSAGE['MEDIA_DELETED_FILE'] = 'File t&ouml;r&ouml;lve';
$MESSAGE['MEDIA_DELETED_DIR'] = 'K&ouml;nyvt&aacute;r t&ouml;r&ouml;lve';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Biztos hogy t&ouml;rli a k&ouml;vetkez&agrave;file-t vagy k&ouml;nyvt&aacute;rat?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Nem lehet t&ouml;r&ouml;lni a kiv&aacute;lasztott file-t';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nem lehet t&ouml;r&ouml;lni a kiv&aacute;lasztott k&ouml;nyvt&aacute;rat';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Nem adott meg &uacute;j nevet';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Nem adott meg file kiterjeszt&eacute;st';
$MESSAGE['MEDIA_RENAMED'] = '&acute;nevez&eacute;s sikeres';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Nem siker&uuml;lt &aacute;tnevezni';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Ilyen nevű file m&aacute;r l&eacute;tezik';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Ilyen nevű k&ouml;nyvt&aacute;r m&aacute;r l&eacute;tezik';
$MESSAGE['MEDIA_DIR_MADE'] = 'A k&ouml;nyvt&aacute;r sikeresen l&eacute;trehozva';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'nem siker&uuml;lt l&eacute;trehozni a k&ouml;nyvt&aacute;rat';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' file sikeresen felt&ouml;ltve';
$MESSAGE['MEDIA_UPLOADED'] = ' file sikeresen felt&ouml;ltve';

$MESSAGE['PAGES_ADDED'] = 'Lap sikeresen hozz&aacute;adva';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Lap c&iacute;msor sikeresen hozz&aacute;adva';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Ilyen lap m&aacute;r l&eacute;tezik';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Nem lehet l&eacute;trehozni az access filet a /pages k&ouml;nyvt&aacute;rban (nem megfelel&agrave;jogosults&aacute;gok)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Nem lehet t&ouml;r&ouml;lni az access filet a /pages k&ouml;nyvt&aacute;rban (nem megfelel&agrave;jogosults&aacute;gok)';
$MESSAGE['PAGES_NOT_FOUND'] = 'Lap nem tal&aacute;lhat&oacute;';
$MESSAGE['PAGES_SAVED'] = 'Lap sikeresen elmentve';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Lap be&aacute;ll&iacute;t&aacute;sok elmentve';
$MESSAGE['PAGES_NOT_SAVED'] = 'Hiba a lap ment&eacute;se k&ouml;zben';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Biztos, hogy t&ouml;r&ouml;lni akarja az adott lapot? (&eacute;s az &ouml;sszes al lapj&aacute;t)';
$MESSAGE['PAGES_DELETED'] = 'Lap t&ouml;r&ouml;lve';
$MESSAGE['PAGES_RESTORED'] = 'lap vissza&aacute;ll&iacute;tva';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'K&eacute;rem adjon meg Lap c&iacute;met';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'K&eacute;rem adjon meg men&uuml; nevet';
$MESSAGE['PAGES_REORDERED'] = 'Lap sikeresen &aacute;trendezve';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Hiba a Lap &aacute;trendez&eacute;s k&ouml;zben';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nincs joga m&oacute;dos&iacute;tani ezt a lapot';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Nem lehet l&eacute;trehozni /pages/intro.php file-t (nincs megfelel&agrave;jogosults&aacute;g)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Bevezet&agrave;lap sikeresen elmentve';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Utolj&aacute;ra m&oacute;dos&iacute;totta:';
$MESSAGE['PAGES_INTRO_LINK'] = 'Kattintson ide az Bevezet&agrave;Lap m&oacute;dos&iacute;t&aacute;s&aacute;hoz';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Szakasz tulajdons&aacute;gok elmentve';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Visszat&eacute;r&eacute;s a lapokhoz';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'K&eacute;rem t&eacute;rjen vissza &eacute;s t&ouml;lts&ouml;n ki minden mezĴ';
$MESSAGE['GENERIC_FILE_TYPE'] = 'A felt&ouml;lt&ouml;tt file csak ilyen form&aacute;tum&uacute; lehet:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'A felt&ouml;lt&ouml;tt file-ok csak a k&ouml;vetkez&agrave;form&aacute;tumuak lehetnek:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'File felt&ouml;lt&eacute;s nem lehets&eacute;ges';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'M&aacute;r telep&iacute;tve';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nincs telp&iacute;tve';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nem lehet elt&aacute;vol&iacute;tani';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kicsomagol&aacute;s nem lehets&eacute;ges';
$MESSAGE['GENERIC_INSTALLED'] = 'Telep&iacute;t&eacute;s sikeres';
$MESSAGE['GENERIC_UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Elt&aacute;vol&iacute;t&aacute;s sikeres';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'A c&eacute;l k&ouml;nyvt&aacute;r nem &iacute;rhat&oacute;';
$MESSAGE['GENERIC_INVALID'] = 'A felt&ouml;lt&ouml;tt file nem megfelel&ccedil;';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet elt&aacute;volt&iacute;tani! A file haszn&aacute;latban van.';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '&lt;br /&gt;&lt;br /&gt;{{type}} &lt;b&gt;{{type_name}}&lt;/b&gt; nem lehet elt&aacute;vol&iacute;tani, mert m&eacute;g haszn&aacute;latban van a k&ouml;v&agrave;oldalon: {{pages}}.&lt;br /&gt;&lt;br /&gt;';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'ez az oldal;ezek az oldalak';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Nem lehet elt&aacute;vol&iacute;tani ezt a sablont: &lt;b&gt;{{name}}&lt;/b&gt;, mert ez az alap&eacute;rtelmezett!';

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'A Weboldal Karbantart&aacute;s Alatt';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'K&eacute;rem t&eacute;rjen vissza k&eacute;sĢb!';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'K&eacute;rem v&aacute;rjon, ez eltarthat egy ideig.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'F&aacute;jl megnyit&aacute;s hiba.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = '&sup2;v&eacute;nytelen WebsiteBaker telep&iacute;t&agrave;f&aacute;jl. K&eacute;rlek ellenĲizd a *.zip form&aacute;tumot.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = '&sup2;v&eacute;nytelen WebsiteBaker nyelvi f&aacute;jl. K&eacute;rlek ellenĲizd a sz&ouml;veges f&aacute;jlt.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'A k&ouml;vetkez&agrave;mezīet k&ouml;telez&agrave;kit&ouml;ltenie';

$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Sajn&aacute;ljuk, de ez az űrlap t&uacute;l sokszor lett kit&ouml;ltve egy &oacute;ran bel&uuml;l! K&eacute;rem pr&oacute;b&aacute;lja meg egy &oacute;ra m&uacute;lva';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'A megadott ellen&ouml;rz&agrave;k&oacute;d (vagy m&aacute;s n&eacute;ven Captcha) hib&aacute;s. Ha probl&eacute;m&aacute;d van elolvasni a Captcha k&oacute;dot, k&uuml;mailt ide: '.SERVER_EMAIL;

$MESSAGE['ADDON_RELOAD'] = 'Adatb&aacute;zis friss&iacute;t&eacute;se Kieg&eacute;sz&iacute;t&agrave;f&aacute;jlok felt&ouml;lt&eacute;se ut&aacute;n (pl. FTP-s felt&ouml;lt&eacute;s).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Hiba t&ouml;rt&eacute;nt a Kieg&eacute;sz&iacute;tī inform&aacute;ci&oacute;inak friss&iacute;t&eacute;se k&ouml;zben.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Modulok sikeresen &uacute;jrat&ouml;ltve';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Sablonok sikeresen &uacute;jrat&ouml;ltve';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Nyelvi f&aacute;jlok sikeresen &uacute;jrat&ouml;ltve';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Kieg&eacute;sz&iacute;t&agrave;telep&iacute;t&eacute;se sikertelen. A rendszered nem felel meg a Kieg&eacute;sz&iacute;tĢen megadott k&ouml;vetelm&eacute;nyeknek. A Kiehi&aacute;nyoss&aacute;gainak kijav&iacute;t&aacute;s&aacute;hoz tekintsd &aacute;t az al&aacute;bbi hibalist&aacute;t.';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'Amikor manu&aacute;lisan t&ouml;ltesz fel egy modult FTP-n kereszt&uuml;l (nem aj&aacute;nlott), akkor a modul telep&iacute;t&agrave;f&aacute;jlok &lt;tt&gt;l.php&lt;/tt&gt;, &lt;tt&gt;upgrade.php&lt;/tt&gt; vagy &lt;tt&gt;uninstall.php&lt;/tt&gt; nem fognak automatikusan v&eacute;grehajt&oacute;dni. Ezek a modulok nem biztos hogy j&oacute;l fognak műk&ouml;dni, t&ouml;rlĤni.&lt;br /&gt;&lt;br /&gt;V&eacute;gre tudod hajtani a modul telep&iacute;t&eacute;seket manu&aacute;lisan FTP felt&ouml;lt&eacute;s eset&eacute;n al&aacute;bb.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Figyelmeztet&eacute;s: Megl&eacute;v&agrave;modul adatb&aacute;zis bejegyz&eacute;sek t&ouml;rlĤnek. Csak akkor haszn&aacute;ld ezt az opci&oacute;t hlisan t&ouml;lt&ouml;d fel a modult FTP-n kereszt&uuml;l.';

 /* BEGIN allocation */

$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS']  = $MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] ;
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS']  = $MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] ;
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES']  = $MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] ;
$MESSAGE['LOGIN_BOTH_BLANK']  = $MESSAGE['LOGIN_BOTH_BLANK'] ;
$MESSAGE['LOGIN_USERNAME_BLANK']  = $MESSAGE['LOGIN_USERNAME_BLANK'] ;
$MESSAGE['LOGIN_PASSWORD_BLANK']  = $MESSAGE['LOGIN_PASSWORD_BLANK'] ;
$MESSAGE['LOGIN_USERNAME_TOO_SHORT']  = $MESSAGE['LOGIN_USERNAME_TOO_SHORT'] ;
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT']  = $MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] ;
$MESSAGE['LOGIN_USERNAME_TOO_LONG']  = $MESSAGE['LOGIN_USERNAME_TOO_LONG'] ;
$MESSAGE['LOGIN_PASSWORD_TOO_LONG']  = $MESSAGE['LOGIN_PASSWORD_TOO_LONG'] ;
$MESSAGE['LOGIN_AUTHENTICATION_FAILED']  = $MESSAGE['LOGIN_AUTHENTICATION_FAILED'] ;
$MESSAGE['SIGNUP_NO_EMAIL']  = $MESSAGE['SIGNUP_NO_EMAIL'] ;
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO']  = $MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] ;
$MESSAGE['SIGNUP2_BODY_LOGIN_INFO']  = $MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] ;
$MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT']  = $MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT'] ;
$MESSAGE['FORGOT_PASS_NO_DATA']  = $MESSAGE['FORGOT_PASS_NO_DATA'] ;
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND']  = $MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] ;
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL']  = $MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] ;
$MESSAGE['FORGOT_PASS_PASSWORD_RESET']  = $MESSAGE['FORGOT_PASS_PASSWORD_RESET'] ;
$MESSAGE['FORGOT_PASS_ALREADY_RESET']  = $MESSAGE['FORGOT_PASS_ALREADY_RESET'] ;
$MESSAGE['START_WELCOME_MESSAGE']  = $MESSAGE['START_WELCOME_MESSAGE'] ;
$MESSAGE['START_INSTALL_DIR_EXISTS']  = $MESSAGE['START_INSTALL_DIR_EXISTS'] ;
$MESSAGE['START_CURRENT_USER']  = $MESSAGE['START_CURRENT_USER'] ;
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG']  = $MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] ;
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG']  = $MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] ;
$MESSAGE['SETTINGS_SAVED']  = $MESSAGE['SETTINGS_SAVED'] ;
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING']  = $MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] ;
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING']  = $MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] ;
$MESSAGE['USERS_ADDED']  = $MESSAGE['USERS_ADDED'] ;
$MESSAGE['USERS_SAVED']  = $MESSAGE['USERS_SAVED'] ;
$MESSAGE['USERS_DELETED']  = $MESSAGE['USERS_DELETED'] ;
$MESSAGE['USERS_NO_GROUP']  = $MESSAGE['USERS_NO_GROUP'] ;
$MESSAGE['USERS_USERNAME_TOO_SHORT']  = $MESSAGE['USERS_USERNAME_TOO_SHORT'] ;
$MESSAGE['USERS_PASSWORD_TOO_SHORT']  = $MESSAGE['USERS_PASSWORD_TOO_SHORT'] ;
$MESSAGE['USERS_PASSWORD_MISMATCH']  = $MESSAGE['USERS_PASSWORD_MISMATCH'] ;
$MESSAGE['USERS_INVALID_EMAIL']  = $MESSAGE['USERS_INVALID_EMAIL'] ;
$MESSAGE['USERS_EMAIL_TAKEN']  = $MESSAGE['USERS_EMAIL_TAKEN'] ;
$MESSAGE['USERS_USERNAME_TAKEN']  = $MESSAGE['USERS_USERNAME_TAKEN'] ;
$MESSAGE['USERS_CHANGING_PASSWORD']  = $MESSAGE['USERS_CHANGING_PASSWORD'] ;
$MESSAGE['USERS_CONFIRM_DELETE']  = $MESSAGE['USERS_CONFIRM_DELETE'] ;
$MESSAGE['GROUPS_ADDED']  = $MESSAGE['GROUPS_ADDED'] ;
$MESSAGE['GROUPS_SAVED']  = $MESSAGE['GROUPS_SAVED'] ;
$MESSAGE['GROUPS_DELETED']  = $MESSAGE['GROUPS_DELETED'] ;
$MESSAGE['GROUPS_GROUP_NAME_BLANK']  = $MESSAGE['GROUPS_GROUP_NAME_BLANK'] ;
$MESSAGE['GROUPS_CONFIRM_DELETE']  = $MESSAGE['GROUPS_CONFIRM_DELETE'] ;
$MESSAGE['GROUPS_NO_GROUPS_FOUND']  = $MESSAGE['GROUPS_NO_GROUPS_FOUND'] ;
$MESSAGE['GROUPS_GROUP_NAME_EXISTS']  = $MESSAGE['GROUPS_GROUP_NAME_EXISTS'] ;
$MESSAGE['PREFERENCES_DETAILS_SAVED']  = $MESSAGE['PREFERENCES_DETAILS_SAVED'] ;
$MESSAGE['PREFERENCES_EMAIL_UPDATED']  = $MESSAGE['PREFERENCES_EMAIL_UPDATED'] ;
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT']  = $MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] ;
$MESSAGE['PREFERENCES_PASSWORD_CHANGED']  = $MESSAGE['PREFERENCES_PASSWORD_CHANGED'] ;
$MESSAGE['PREFERENCES_INVALID_CHARS']  = $MESSAGE['PREFERENCES_INVALID_CHARS'] ;
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE']  = $MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] ;
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH']  = $MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] ;
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST']  = $MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] ;
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH']  = $MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] ;
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH']  = $MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] ;
$MESSAGE['MEDIA_NAME_INDEX_PHP']  = $MESSAGE['MEDIA_NAME_INDEX_PHP'] ;
$MESSAGE['MEDIA_NONE_FOUND']  = $MESSAGE['MEDIA_NONE_FOUND'] ;
$MESSAGE['MEDIA_FILE_NOT_FOUND']  = $MESSAGE['MEDIA_FILE_NOT_FOUND'] ;
$MESSAGE['MEDIA_DELETED_FILE']  = $MESSAGE['MEDIA_DELETED_FILE'] ;
$MESSAGE['MEDIA_DELETED_DIR']  = $MESSAGE['MEDIA_DELETED_DIR'] ;
$MESSAGE['MEDIA_CONFIRM_DELETE']  = $MESSAGE['MEDIA_CONFIRM_DELETE'] ;
$MESSAGE['MEDIA_CANNOT_DELETE_FILE']  = $MESSAGE['MEDIA_CANNOT_DELETE_FILE'] ;
$MESSAGE['MEDIA_CANNOT_DELETE_DIR']  = $MESSAGE['MEDIA_CANNOT_DELETE_DIR'] ;
$MESSAGE['MEDIA_BLANK_NAME']  = $MESSAGE['MEDIA_BLANK_NAME'] ;
$MESSAGE['MEDIA_BLANK_EXTENSION']  = $MESSAGE['MEDIA_BLANK_EXTENSION'] ;
$MESSAGE['MEDIA_RENAMED']  = $MESSAGE['MEDIA_RENAMED'] ;
$MESSAGE['MEDIA_CANNOT_RENAME']  = $MESSAGE['MEDIA_CANNOT_RENAME'] ;
$MESSAGE['MEDIA_FILE_EXISTS']  = $MESSAGE['MEDIA_FILE_EXISTS'] ;
$MESSAGE['MEDIA_DIR_EXISTS']  = $MESSAGE['MEDIA_DIR_EXISTS'] ;
$MESSAGE['MEDIA_DIR_MADE']  = $MESSAGE['MEDIA_DIR_MADE'] ;
$MESSAGE['MEDIA_DIR_NOT_MADE']  = $MESSAGE['MEDIA_DIR_NOT_MADE'] ;
$MESSAGE['MEDIA_SINGLE_UPLOADED']  = $MESSAGE['MEDIA_SINGLE_UPLOADED'] ;
$MESSAGE['MEDIA_UPLOADED']  = $MESSAGE['MEDIA_UPLOADED'] ;
$MESSAGE['PAGES_ADDED']  = $MESSAGE['PAGES_ADDED'] ;
$MESSAGE['PAGES_ADDED_HEADING']  = $MESSAGE['PAGES_ADDED_HEADING'] ;
$MESSAGE['PAGES_PAGE_EXISTS']  = $MESSAGE['PAGES_PAGE_EXISTS'] ;
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE']  = $MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] ;
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE']  = $MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] ;
$MESSAGE['PAGES_NOT_FOUND']  = $MESSAGE['PAGES_NOT_FOUND'] ;
$MESSAGE['PAGES_SAVED']  = $MESSAGE['PAGES_SAVED'] ;
$MESSAGE['PAGES_SAVED_SETTINGS']  = $MESSAGE['PAGES_SAVED_SETTINGS'] ;
$MESSAGE['PAGES_NOT_SAVED']  = $MESSAGE['PAGES_NOT_SAVED'] ;
$MESSAGE['PAGES_DELETE_CONFIRM']  = $MESSAGE['PAGES_DELETE_CONFIRM'] ;
$MESSAGE['PAGES_DELETED']  = $MESSAGE['PAGES_DELETED'] ;
$MESSAGE['PAGES_RESTORED']  = $MESSAGE['PAGES_RESTORED'] ;
$MESSAGE['PAGES_BLANK_PAGE_TITLE']  = $MESSAGE['PAGES_BLANK_PAGE_TITLE'] ;
$MESSAGE['PAGES_BLANK_MENU_TITLE']  = $MESSAGE['PAGES_BLANK_MENU_TITLE'] ;
$MESSAGE['PAGES_REORDERED']  = $MESSAGE['PAGES_REORDERED'] ;
$MESSAGE['PAGES_CANNOT_REORDER']  = $MESSAGE['PAGES_CANNOT_REORDER'] ;
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS']  = $MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] ;
$MESSAGE['PAGES_INTRO_NOT_WRITABLE']  = $MESSAGE['PAGES_INTRO_NOT_WRITABLE'] ;
$MESSAGE['PAGES_INTRO_SAVED']  = $MESSAGE['PAGES_INTRO_SAVED'] ;
$MESSAGE['PAGES_LAST_MODIFIED']  = $MESSAGE['PAGES_LAST_MODIFIED'] ;
$MESSAGE['PAGES_INTRO_LINK']  = $MESSAGE['PAGES_INTRO_LINK'] ;
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED']  = $MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] ;
$MESSAGE['PAGES_RETURN_TO_PAGES']  = $MESSAGE['PAGES_RETURN_TO_PAGES'] ;
$MESSAGE['GENERIC_FILL_IN_ALL']  = $MESSAGE['GENERIC_FILL_IN_ALL'] ;
$MESSAGE['GENERIC_FILE_TYPE']  = $MESSAGE['GENERIC_FILE_TYPE'] ;
$MESSAGE['GENERIC_FILE_TYPES']  = $MESSAGE['GENERIC_FILE_TYPES'] ;
$MESSAGE['GENERIC_CANNOT_UPLOAD']  = $MESSAGE['GENERIC_CANNOT_UPLOAD'] ;
$MESSAGE['GENERIC_ALREADY_INSTALLED']  = $MESSAGE['GENERIC_ALREADY_INSTALLED'] ;
$MESSAGE['GENERIC_NOT_INSTALLED']  = $MESSAGE['GENERIC_NOT_INSTALLED'] ;
$MESSAGE['GENERIC_CANNOT_UNINSTALL']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL'] ;
$MESSAGE['GENERIC_CANNOT_UNZIP']  = $MESSAGE['GENERIC_CANNOT_UNZIP'] ;
$MESSAGE['GENERIC_INSTALLED']  = $MESSAGE['GENERIC_INSTALLED'] ;
$MESSAGE['GENERIC_UPGRADED']  = $MESSAGE['GENERIC_UPGRADED'] ;
$MESSAGE['GENERIC_UNINSTALLED']  = $MESSAGE['GENERIC_UNINSTALLED'] ;
$MESSAGE['GENERIC_BAD_PERMISSIONS']  = $MESSAGE['GENERIC_BAD_PERMISSIONS'] ;
$MESSAGE['GENERIC_INVALID']  = $MESSAGE['GENERIC_INVALID'] ;
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] ;
$MESSAGE['GENERIC_SECURITY_OFFENSE']  = $MESSAGE['GENERIC_SECURITY_OFFENSE'] ;
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] ;
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] ;
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE']  = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] ;
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION']  = $MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] ;
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON']  = $MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] ;
$MESSAGE['GENERIC_PLEASE_BE_PATIENT']  = $MESSAGE['GENERIC_PLEASE_BE_PATIENT'] ;
$MESSAGE['GENERIC_ERROR_OPENING_FILE']  = $MESSAGE['GENERIC_ERROR_OPENING_FILE'] ;
$MESSAGE['GENERIC_INVALID_ADDON_FILE']  = $MESSAGE['GENERIC_INVALID_ADDON_FILE'] ;
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE']  = $MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] ;
$MESSAGE['MOD_FORM_REQUIRED_FIELDS']  = $MESSAGE['MOD_FORM_REQUIRED_FIELDS'] ;
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS']  = $MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] ;
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA']  = $MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] ;
$MESSAGE['ADDON_RELOAD']  = $MESSAGE['ADDON_RELOAD'] ;
$MESSAGE['ADDON_ERROR_RELOAD']  = $MESSAGE['ADDON_ERROR_RELOAD'] ;
$MESSAGE['ADDON_MODULES_RELOADED']  = $MESSAGE['ADDON_MODULES_RELOADED'] ;
$MESSAGE['ADDON_TEMPLATES_RELOADED']  = $MESSAGE['ADDON_TEMPLATES_RELOADED'] ;
$MESSAGE['ADDON_LANGUAGES_RELOADED']  = $MESSAGE['ADDON_LANGUAGES_RELOADED'] ;
$MESSAGE['ADDON_PRECHECK_FAILED']  = $MESSAGE['ADDON_PRECHECK_FAILED'] ;
$MESSAGE['ADDON_MANUAL_INSTALLATION']  = $MESSAGE['ADDON_MANUAL_INSTALLATION'] ;
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING']  = $MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] ;

/* END allocation */
 /* BEGIN allocation */

$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS']   = $MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS']  ;
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS']   = $MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS']  ;
$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES']   = $MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES']  ;
$MESSAGE['LOGIN']['BOTH_BLANK']   = $MESSAGE['LOGIN_BOTH_BLANK']  ;
$MESSAGE['LOGIN']['USERNAME_BLANK']   = $MESSAGE['LOGIN_USERNAME_BLANK']  ;
$MESSAGE['LOGIN']['PASSWORD_BLANK']   = $MESSAGE['LOGIN_PASSWORD_BLANK']  ;
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT']   = $MESSAGE['LOGIN_USERNAME_TOO_SHORT']  ;
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT']   = $MESSAGE['LOGIN_PASSWORD_TOO_SHORT']  ;
$MESSAGE['LOGIN']['USERNAME_TOO_LONG']   = $MESSAGE['LOGIN_USERNAME_TOO_LONG']  ;
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG']   = $MESSAGE['LOGIN_PASSWORD_TOO_LONG']  ;
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED']   = $MESSAGE['LOGIN_AUTHENTICATION_FAILED']  ;
$MESSAGE['SIGNUP']['NO_EMAIL']   = $MESSAGE['SIGNUP_NO_EMAIL']  ;
$MESSAGE['SIGNUP2']['SUBJECT_LOGIN_INFO']   = $MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO']  ;
$MESSAGE['SIGNUP2']['BODY_LOGIN_INFO']   = $MESSAGE['SIGNUP2_BODY_LOGIN_INFO']  ;
$MESSAGE['SIGNUP2']['BODY_LOGIN_FORGOT']   = $MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT']  ;
$MESSAGE['FORGOT_PASS']['NO_DATA']   = $MESSAGE['FORGOT_PASS_NO_DATA']  ;
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND']   = $MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND']  ;
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL']   = $MESSAGE['FORGOT_PASS_CANNOT_EMAIL']  ;
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET']   = $MESSAGE['FORGOT_PASS_PASSWORD_RESET']  ;
$MESSAGE['FORGOT_PASS']['ALREADY_RESET']   = $MESSAGE['FORGOT_PASS_ALREADY_RESET']  ;
$MESSAGE['START']['WELCOME_MESSAGE']   = $MESSAGE['START_WELCOME_MESSAGE']  ;
$MESSAGE['START']['INSTALL_DIR_EXISTS']   = $MESSAGE['START_INSTALL_DIR_EXISTS']  ;
$MESSAGE['START']['CURRENT_USER']   = $MESSAGE['START_CURRENT_USER']  ;
$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG']   = $MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG']  ;
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG']   = $MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG']  ;
$MESSAGE['SETTINGS']['SAVED']   = $MESSAGE['SETTINGS_SAVED']  ;
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING']   = $MESSAGE['SETTINGS_MODE_SWITCH_WARNING']  ;
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING']   = $MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING']  ;
$MESSAGE['USERS']['ADDED']   = $MESSAGE['USERS_ADDED']  ;
$MESSAGE['USERS']['SAVED']   = $MESSAGE['USERS_SAVED']  ;
$MESSAGE['USERS']['DELETED']   = $MESSAGE['USERS_DELETED']  ;
$MESSAGE['USERS']['NO_GROUP']   = $MESSAGE['USERS_NO_GROUP']  ;
$MESSAGE['USERS']['USERNAME_TOO_SHORT']   = $MESSAGE['USERS_USERNAME_TOO_SHORT']  ;
$MESSAGE['USERS']['PASSWORD_TOO_SHORT']   = $MESSAGE['USERS_PASSWORD_TOO_SHORT']  ;
$MESSAGE['USERS']['PASSWORD_MISMATCH']   = $MESSAGE['USERS_PASSWORD_MISMATCH']  ;
$MESSAGE['USERS']['INVALID_EMAIL']   = $MESSAGE['USERS_INVALID_EMAIL']  ;
$MESSAGE['USERS']['EMAIL_TAKEN']   = $MESSAGE['USERS_EMAIL_TAKEN']  ;
$MESSAGE['USERS']['USERNAME_TAKEN']   = $MESSAGE['USERS_USERNAME_TAKEN']  ;
$MESSAGE['USERS']['CHANGING_PASSWORD']   = $MESSAGE['USERS_CHANGING_PASSWORD']  ;
$MESSAGE['USERS']['CONFIRM_DELETE']   = $MESSAGE['USERS_CONFIRM_DELETE']  ;
$MESSAGE['GROUPS']['ADDED']   = $MESSAGE['GROUPS_ADDED']  ;
$MESSAGE['GROUPS']['SAVED']   = $MESSAGE['GROUPS_SAVED']  ;
$MESSAGE['GROUPS']['DELETED']   = $MESSAGE['GROUPS_DELETED']  ;
$MESSAGE['GROUPS']['GROUP_NAME_BLANK']   = $MESSAGE['GROUPS_GROUP_NAME_BLANK']  ;
$MESSAGE['GROUPS']['CONFIRM_DELETE']   = $MESSAGE['GROUPS_CONFIRM_DELETE']  ;
$MESSAGE['GROUPS']['NO_GROUPS_FOUND']   = $MESSAGE['GROUPS_NO_GROUPS_FOUND']  ;
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS']   = $MESSAGE['GROUPS_GROUP_NAME_EXISTS']  ;
$MESSAGE['PREFERENCES']['DETAILS_SAVED']   = $MESSAGE['PREFERENCES_DETAILS_SAVED']  ;
$MESSAGE['PREFERENCES']['EMAIL_UPDATED']   = $MESSAGE['PREFERENCES_EMAIL_UPDATED']  ;
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT']   = $MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT']  ;
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED']   = $MESSAGE['PREFERENCES_PASSWORD_CHANGED']  ;
$MESSAGE['PREFERENCES']['INVALID_CHARS']   = $MESSAGE['PREFERENCES_INVALID_CHARS']  ;
$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE']   = $MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE']  ;
$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH']   = $MESSAGE['MEDIA_DIR_DOT_DOT_SLASH']  ;
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST']   = $MESSAGE['MEDIA_DIR_DOES_NOT_EXIST']  ;
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH']   = $MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH']  ;
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH']   = $MESSAGE['MEDIA_NAME_DOT_DOT_SLASH']  ;
$MESSAGE['MEDIA']['NAME_INDEX_PHP']   = $MESSAGE['MEDIA_NAME_INDEX_PHP']  ;
$MESSAGE['MEDIA']['NONE_FOUND']   = $MESSAGE['MEDIA_NONE_FOUND']  ;
$MESSAGE['MEDIA']['FILE_NOT_FOUND']   = $MESSAGE['MEDIA_FILE_NOT_FOUND']  ;
$MESSAGE['MEDIA']['DELETED_FILE']   = $MESSAGE['MEDIA_DELETED_FILE']  ;
$MESSAGE['MEDIA']['DELETED_DIR']   = $MESSAGE['MEDIA_DELETED_DIR']  ;
$MESSAGE['MEDIA']['CONFIRM_DELETE']   = $MESSAGE['MEDIA_CONFIRM_DELETE']  ;
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE']   = $MESSAGE['MEDIA_CANNOT_DELETE_FILE']  ;
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR']   = $MESSAGE['MEDIA_CANNOT_DELETE_DIR']  ;
$MESSAGE['MEDIA']['BLANK_NAME']   = $MESSAGE['MEDIA_BLANK_NAME']  ;
$MESSAGE['MEDIA']['BLANK_EXTENSION']   = $MESSAGE['MEDIA_BLANK_EXTENSION']  ;
$MESSAGE['MEDIA']['RENAMED']   = $MESSAGE['MEDIA_RENAMED']  ;
$MESSAGE['MEDIA']['CANNOT_RENAME']   = $MESSAGE['MEDIA_CANNOT_RENAME']  ;
$MESSAGE['MEDIA']['FILE_EXISTS']   = $MESSAGE['MEDIA_FILE_EXISTS']  ;
$MESSAGE['MEDIA']['DIR_EXISTS']   = $MESSAGE['MEDIA_DIR_EXISTS']  ;
$MESSAGE['MEDIA']['DIR_MADE']   = $MESSAGE['MEDIA_DIR_MADE']  ;
$MESSAGE['MEDIA']['DIR_NOT_MADE']   = $MESSAGE['MEDIA_DIR_NOT_MADE']  ;
$MESSAGE['MEDIA']['SINGLE_UPLOADED']   = $MESSAGE['MEDIA_SINGLE_UPLOADED']  ;
$MESSAGE['MEDIA']['UPLOADED']   = $MESSAGE['MEDIA_UPLOADED']  ;
$MESSAGE['PAGES']['ADDED']   = $MESSAGE['PAGES_ADDED']  ;
$MESSAGE['PAGES']['ADDED_HEADING']   = $MESSAGE['PAGES_ADDED_HEADING']  ;
$MESSAGE['PAGES']['PAGE_EXISTS']   = $MESSAGE['PAGES_PAGE_EXISTS']  ;
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE']   = $MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE']  ;
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE']   = $MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE']  ;
$MESSAGE['PAGES']['NOT_FOUND']   = $MESSAGE['PAGES_NOT_FOUND']  ;
$MESSAGE['PAGES']['SAVED']   = $MESSAGE['PAGES_SAVED']  ;
$MESSAGE['PAGES']['SAVED_SETTINGS']   = $MESSAGE['PAGES_SAVED_SETTINGS']  ;
$MESSAGE['PAGES']['NOT_SAVED']   = $MESSAGE['PAGES_NOT_SAVED']  ;
$MESSAGE['PAGES']['DELETE_CONFIRM']   = $MESSAGE['PAGES_DELETE_CONFIRM']  ;
$MESSAGE['PAGES']['DELETED']   = $MESSAGE['PAGES_DELETED']  ;
$MESSAGE['PAGES']['RESTORED']   = $MESSAGE['PAGES_RESTORED']  ;
$MESSAGE['PAGES']['BLANK_PAGE_TITLE']   = $MESSAGE['PAGES_BLANK_PAGE_TITLE']  ;
$MESSAGE['PAGES']['BLANK_MENU_TITLE']   = $MESSAGE['PAGES_BLANK_MENU_TITLE']  ;
$MESSAGE['PAGES']['REORDERED']   = $MESSAGE['PAGES_REORDERED']  ;
$MESSAGE['PAGES']['CANNOT_REORDER']   = $MESSAGE['PAGES_CANNOT_REORDER']  ;
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS']   = $MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS']  ;
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE']   = $MESSAGE['PAGES_INTRO_NOT_WRITABLE']  ;
$MESSAGE['PAGES']['INTRO_SAVED']   = $MESSAGE['PAGES_INTRO_SAVED']  ;
$MESSAGE['PAGES']['LAST_MODIFIED']   = $MESSAGE['PAGES_LAST_MODIFIED']  ;
$MESSAGE['PAGES']['INTRO_LINK']   = $MESSAGE['PAGES_INTRO_LINK']  ;
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED']   = $MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED']  ;
$MESSAGE['PAGES']['RETURN_TO_PAGES']   = $MESSAGE['PAGES_RETURN_TO_PAGES']  ;
$MESSAGE['GENERIC']['FILL_IN_ALL']   = $MESSAGE['GENERIC_FILL_IN_ALL']  ;
$MESSAGE['GENERIC']['FILE_TYPE']   = $MESSAGE['GENERIC_FILE_TYPE']  ;
$MESSAGE['GENERIC']['FILE_TYPES']   = $MESSAGE['GENERIC_FILE_TYPES']  ;
$MESSAGE['GENERIC']['CANNOT_UPLOAD']   = $MESSAGE['GENERIC_CANNOT_UPLOAD']  ;
$MESSAGE['GENERIC']['ALREADY_INSTALLED']   = $MESSAGE['GENERIC_ALREADY_INSTALLED']  ;
$MESSAGE['GENERIC']['NOT_INSTALLED']   = $MESSAGE['GENERIC_NOT_INSTALLED']  ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL']   = $MESSAGE['GENERIC_CANNOT_UNINSTALL']  ;
$MESSAGE['GENERIC']['CANNOT_UNZIP']   = $MESSAGE['GENERIC_CANNOT_UNZIP']  ;
$MESSAGE['GENERIC']['INSTALLED']   = $MESSAGE['GENERIC_INSTALLED']  ;
$MESSAGE['GENERIC']['UPGRADED']   = $MESSAGE['GENERIC_UPGRADED']  ;
$MESSAGE['GENERIC']['UNINSTALLED']   = $MESSAGE['GENERIC_UNINSTALLED']  ;
$MESSAGE['GENERIC']['BAD_PERMISSIONS']   = $MESSAGE['GENERIC_BAD_PERMISSIONS']  ;
$MESSAGE['GENERIC']['INVALID']   = $MESSAGE['GENERIC_INVALID']  ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE']   = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE']  ;
$MESSAGE['GENERIC']['SECURITY_OFFENSE']   = $MESSAGE['GENERIC_SECURITY_OFFENSE']  ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL']   = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL']  ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL_PAGES']   = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES']  ;
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE']   = $MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE']  ;
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION']   = $MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION']  ;
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON']   = $MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON']  ;
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT']   = $MESSAGE['GENERIC_PLEASE_BE_PATIENT']  ;
$MESSAGE['GENERIC']['ERROR_OPENING_FILE']   = $MESSAGE['GENERIC_ERROR_OPENING_FILE']  ;
$MESSAGE['GENERIC']['INVALID_ADDON_FILE']   = $MESSAGE['GENERIC_INVALID_ADDON_FILE']  ;
$MESSAGE['GENERIC']['INVALID_LANGUAGE_FILE']   = $MESSAGE['GENERIC_INVALID_LANGUAGE_FILE']  ;
$MESSAGE['MOD_FORM']['REQUIRED_FIELDS']   = $MESSAGE['MOD_FORM_REQUIRED_FIELDS']  ;
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS']   = $MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS']  ;
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA']   = $MESSAGE['MOD_FORM_INCORRECT_CAPTCHA']  ;
$MESSAGE['ADDON']['RELOAD']   = $MESSAGE['ADDON_RELOAD']  ;
$MESSAGE['ADDON']['ERROR_RELOAD']   = $MESSAGE['ADDON_ERROR_RELOAD']  ;
$MESSAGE['ADDON']['MODULES_RELOADED']   = $MESSAGE['ADDON_MODULES_RELOADED']  ;
$MESSAGE['ADDON']['TEMPLATES_RELOADED']   = $MESSAGE['ADDON_TEMPLATES_RELOADED']  ;
$MESSAGE['ADDON']['LANGUAGES_RELOADED']   = $MESSAGE['ADDON_LANGUAGES_RELOADED']  ;
$MESSAGE['ADDON']['PRECHECK_FAILED']   = $MESSAGE['ADDON_PRECHECK_FAILED']  ;
$MESSAGE['ADDON']['MANUAL_INSTALLATION']   = $MESSAGE['ADDON_MANUAL_INSTALLATION']  ;
$MESSAGE['ADDON']['MANUAL_INSTALLATION_WARNING']   = $MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING']  ;

/* END allocation */
?>