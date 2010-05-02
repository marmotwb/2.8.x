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
$language_code = 'HR';
$language_name = 'Hrvatski';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Vedran Presecki';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Start';
$MENU['PAGES'] = 'Stranice';
$MENU['MEDIA'] = 'Media';
$MENU['ADDONS'] = 'Dodaci';
$MENU['MODULES'] = 'Moduli';
$MENU['TEMPLATES'] = 'Predlo&scaron;ci';
$MENU['LANGUAGES'] = 'Jezici';
$MENU['PREFERENCES'] = 'Pode&scaron;avanja';
$MENU['SETTINGS'] = 'Postavke';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['ACCESS'] = 'Pristup';
$MENU['USERS'] = 'Korisnici';
$MENU['GROUPS'] = 'Grupe';
$MENU['HELP'] = 'Pomo&aelig;';
$MENU['VIEW'] = 'Pogled';
$MENU['LOGOUT'] = 'Odlogiranje';
$MENU['LOGIN'] = 'Logiranje';
$MENU['FORGOT'] = 'Dobivanje detalja lozinke';

// Section overviews
$OVERVIEW['START'] = 'Pregled administracije';
$OVERVIEW['PAGES'] = 'Uredite va&scaron;e web stranice...';
$OVERVIEW['MEDIA'] = 'Uredite fileove pohranjene u direktoriju "Media"...';
$OVERVIEW['MODULES'] = 'Uredite WebsiteBaker module...';
$OVERVIEW['TEMPLATES'] = 'Promijenite izgled i do&#382;ivljaj va&scaron;eg weba s predlo&scaron;cima...';
$OVERVIEW['LANGUAGES'] = 'Uredite WebsiteBaker jezike...';
$OVERVIEW['PREFERENCES'] = 'Izmjenite postavke email adresa, lozinka i sl.... ';
$OVERVIEW['SETTINGS'] = 'Promjenite postavke za WebsiteBaker...';
$OVERVIEW['USERS'] = 'Upravljajte korisnicima koji se mogu logirati na WebsiteBaker...';
$OVERVIEW['GROUPS'] = 'Upravljajte grupama korisnika i njihovim sistemskim dopu&scaron;tenjima.';
$OVERVIEW['HELP'] = 'Imate pitanje? Prona&eth;ite odgovor...';
$OVERVIEW['VIEW'] = 'Brzo pogledajte i listajte Va&scaron; web u novom prozoru...';
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Izmenj/Obri&scaron;i stranicu';
$HEADING['DELETED_PAGES'] = 'Obrisane stranice';
$HEADING['ADD_PAGE'] = 'Dodaj stranicu';
$HEADING['ADD_HEADING'] = 'Dodaj zaglavlje';
$HEADING['MODIFY_PAGE'] = 'Izmjeni stranicu';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Mijenjaj postavke stranice';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Mijenjaj napredne postavke stranice';
$HEADING['MANAGE_SECTIONS'] = 'Upravljaj dijelovima';
$HEADING['MODIFY_INTRO_PAGE'] = 'Modificiraj intro stranicu';

$HEADING['BROWSE_MEDIA'] = 'Pogledaj Mediu';
$HEADING['CREATE_FOLDER'] = 'napravi direktorij';
$HEADING['UPLOAD_FILES'] = 'Nasnimi fileove';

$HEADING['INSTALL_MODULE'] = 'Instaliraj module';
$HEADING['UNINSTALL_MODULE'] = 'Deinstaliraj module';
$HEADING['MODULE_DETAILS'] = 'Detalji modula';

$HEADING['INSTALL_TEMPLATE'] = 'Instaliraj predlo&#382;ak';
$HEADING['UNINSTALL_TEMPLATE'] = 'Deinstaliraj predlo&#382;ak';
$HEADING['TEMPLATE_DETAILS'] = 'Detalji predlo&scaron;ka';

$HEADING['INSTALL_LANGUAGE'] = 'Instaliraj jezik';
$HEADING['UNINSTALL_LANGUAGE'] = 'Deinstaliraj jezik';
$HEADING['LANGUAGE_DETAILS'] = 'Detalji jezika';

$HEADING['MY_SETTINGS'] = 'Moje postavke';
$HEADING['MY_EMAIL'] = 'Moj Email';
$HEADING['MY_PASSWORD'] = 'Moja Lozinka';

$HEADING['GENERAL_SETTINGS'] = 'Glavne postavke';
$HEADING['DEFAULT_SETTINGS'] = 'Prija&scaron;nje postavke';
$HEADING['SEARCH_SETTINGS'] = 'Tra&#382;enje postavki';
$HEADING['FILESYSTEM_SETTINGS'] = 'Postavke sistema direktorija';
$HEADING['SERVER_SETTINGS'] = 'Postavke servera';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administracijski alati';

$HEADING['MODIFY_DELETE_USER'] = 'Izmjeni/Obri&scaron;i korisnika';
$HEADING['ADD_USER'] = 'Dodaj korisnika';
$HEADING['MODIFY_USER'] = 'Izmjeni korisnika';

$HEADING['MODIFY_DELETE_GROUP'] = 'Izmjeni/Obri&scaron;i Grupu';
$HEADING['ADD_GROUP'] = 'Dodaj grupu';
$HEADING['MODIFY_GROUP'] = 'Izmjeni grupu';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';

// Other text
$TEXT['OPEN'] = 'Open';
$TEXT['ADD'] = 'Dodaj';
$TEXT['MODIFY'] = 'Izmjeni';
$TEXT['SETTINGS'] = 'Postavke';
$TEXT['DELETE'] = 'Obri&scaron;i';
$TEXT['SAVE'] = 'Snimi';
$TEXT['RESET'] = 'Resetiraj';
$TEXT['LOGIN'] = 'Logiranje';
$TEXT['RELOAD'] = 'Ponovo u&egrave;itavanje';
$TEXT['CANCEL'] = 'Otka&#382;i';
$TEXT['NAME'] = 'Ime';
$TEXT['PLEASE_SELECT'] = 'Odaberite';
$TEXT['TITLE'] = 'Naslov';
$TEXT['PARENT'] = 'Vezan';
$TEXT['TYPE'] = 'Tip';
$TEXT['VISIBILITY'] = 'Vidljivost';
$TEXT['PRIVATE'] = 'Privatni';
$TEXT['PUBLIC'] = 'Javni';
$TEXT['NONE'] = 'Nijedan';
$TEXT['NONE_FOUND'] = 'Nijedan na&eth;en';
$TEXT['CURRENT'] = 'Postoje&aelig;i';
$TEXT['CHANGE'] = 'Izmjeni';
$TEXT['WINDOW'] = 'Prozor';
$TEXT['DESCRIPTION'] = 'Opis';
$TEXT['KEYWORDS'] = 'Klju&egrave;ne rije&egrave;i';
$TEXT['ADMINISTRATORS'] = 'Administratori';
$TEXT['PRIVATE_VIEWERS'] = 'Privatni pregledatelji';
$TEXT['EXPAND'] = 'Pro&scaron;iri';
$TEXT['COLLAPSE'] = 'Kolaps';
$TEXT['MOVE_UP'] = 'Podigni gore';
$TEXT['MOVE_DOWN'] = 'Spusti dolje';
$TEXT['RENAME'] = 'Preimenuj';
$TEXT['MODIFY_SETTINGS'] = 'Izmjeni postavke';
$TEXT['MODIFY_CONTENT'] = 'Izmjeni sadr&#382;aj';
$TEXT['VIEW'] = 'Pogled';
$TEXT['UP'] = 'Gore';
$TEXT['FORGOTTEN_DETAILS'] = 'Zaboravili ste va&scaron;e podatke?';
$TEXT['NEED_TO_LOGIN'] = 'Molimo logirajte se?';
$TEXT['SEND_DETAILS'] = '&Scaron;aljite podatke';
$TEXT['USERNAME'] = 'Korisni&egrave;ko ime';
$TEXT['PASSWORD'] = 'Lozinka';
$TEXT['HOME'] = 'Po&egrave;etak';
$TEXT['TARGET_FOLDER'] = 'Ciljani direktorij';
$TEXT['OVERWRITE_EXISTING'] = 'Napi&scaron;ite preko postoje&aelig;eg';
$TEXT['FILE'] = 'File';
$TEXT['FILES'] = 'Fileovi';
$TEXT['FOLDER'] = 'Direktorij';
$TEXT['FOLDERS'] = 'Direktoriji';
$TEXT['CREATE_FOLDER'] = 'napravi direktorij';
$TEXT['UPLOAD_FILES'] = 'Nasnimi fajlove)';
$TEXT['CURRENT_FOLDER'] = 'Postoje&aelig;i direktorij';
$TEXT['TO'] = 'Za';
$TEXT['FROM'] = 'Od';
$TEXT['INSTALL'] = 'Instaliraj';
$TEXT['UNINSTALL'] = 'Deinstaliraj';
$TEXT['VIEW_DETAILS'] = 'Vidi detalje';
$TEXT['DISPLAY_NAME'] = 'Prika&#382;i ime';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['VERSION'] = 'VVerzija';
$TEXT['DESIGNED_FOR'] = 'Dizajniran za';
$TEXT['DESCRIPTION'] = 'Opis';
$TEXT['EMAIL'] = 'Email';
$TEXT['LANGUAGE'] = 'Jezik';
$TEXT['TIMEZONE'] = 'Vremenska zona';
$TEXT['CURRENT_PASSWORD'] = 'Potoje&aelig;a lozinka';
$TEXT['NEW_PASSWORD'] = 'Nova lozinka';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Ponovo otipkaj novu lozinku';
$TEXT['ACTIVE'] = 'Aktivan';
$TEXT['DISABLED'] = 'Onesposobljen';
$TEXT['ENABLED'] = 'Omogu&aelig;en';
$TEXT['RETYPE_PASSWORD'] = 'Ponovo otipkaj novu lozinku';
$TEXT['GROUP'] = 'Grupa';
$TEXT['SYSTEM_PERMISSIONS'] = 'Sistemske dozvole';
$TEXT['MODULE_PERMISSIONS'] = 'Modulske dozvole';
$TEXT['SHOW_ADVANCED'] = 'Prika&#382;i napredne opcije';
$TEXT['HIDE_ADVANCED'] = 'Sakrij napredne opcije';
$TEXT['BASIC'] = 'Osnovno';
$TEXT['ADVANCED'] = 'Napredno';
$TEXT['WEBSITE'] = 'Web stranica';
$TEXT['DEFAULT'] = 'Postoje&aelig;i';
$TEXT['KEYWORDS'] = 'Klju&egrave;ne rije&egrave;i';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Zaglavlje';
$TEXT['FOOTER'] = 'Podno&#382;je';
$TEXT['TEMPLATE'] = 'Predlo&#382;ak';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['INSTALLATION'] = 'Instalacija';
$TEXT['DATABASE'] = 'Baza podataka';
$TEXT['HOST'] = 'Host';
$TEXT['INTRO'] = 'Intro';
$TEXT['PAGE'] = 'Strenica';
$TEXT['SIGNUP'] = 'Upi&scaron;i se';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Gre&scaron;ka Izvje&scaron;taj nivoa';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = 'Dio';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Po&egrave;etak-kraj';
$TEXT['EXTENSION'] = 'Ekstenzija';
$TEXT['TABLE_PREFIX'] = 'Prefix tablice';
$TEXT['CHANGES'] = 'Izmjene';
$TEXT['ADMINISTRATION'] = 'Administracija';
$TEXT['FORGOT_DETAILS'] = 'Zaboravili ste datelje?';
$TEXT['LOGGED_IN'] = 'Logiran';
$TEXT['WELCOME_BACK'] = 'Dobro do&scaron;li nazad';
$TEXT['FULL_NAME'] = 'Puno ime';
$TEXT['ACCOUNT_SIGNUP'] = 'Logiranje na Account';
$TEXT['LINK'] = 'Link';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['TARGET'] = 'Cilj';
$TEXT['NEW_WINDOW'] = 'Novi prozor';
$TEXT['SAME_WINDOW'] = 'Isti prozor';
$TEXT['TOP_FRAME'] = 'Gornji okvir';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Nivo limita stranice';
$TEXT['SUCCESS'] = 'Uspjeh';
$TEXT['ERROR'] = 'Gre&scaron;ka';
$TEXT['ARE_YOU_SURE'] = 'Jeste li sigurni?';
$TEXT['YES'] = 'Da';
$TEXT['NO'] = 'Ne';
$TEXT['SYSTEM_DEFAULT'] = 'Postoje&aelig;i sistem';
$TEXT['PAGE_TITLE'] = 'Naslov stranice';
$TEXT['MENU_TITLE'] = 'Naslov menia';
$TEXT['ACTIONS'] = 'Akcije';
$TEXT['UNKNOWN'] = 'Nepoznat';
$TEXT['BLOCK'] = 'Blokiraj';
$TEXT['SEARCH'] = 'Tra&#382;i';
$TEXT['SEARCHING'] = 'Pretra&#382;ivanje';
$TEXT['POST'] = 'Post';
$TEXT['COMMENT'] = 'Komentar';
$TEXT['COMMENTS'] = 'Komentari';
$TEXT['COMMENTING'] = 'Komentiranje';
$TEXT['SHORT'] = 'Kratko';
$TEXT['LONG'] = 'Dugo';
$TEXT['LOOP'] = 'Petlja';
$TEXT['FIELD'] = 'Polje';
$TEXT['REQUIRED'] = 'Tra&#382;eno';
$TEXT['LENGTH'] = 'Du&#382;ina';
$TEXT['MESSAGE'] = 'Poruka';
$TEXT['SUBJECT'] = 'Subjekt';
$TEXT['MATCH'] = 'Usporedi';
$TEXT['ALL_WORDS'] = 'Sve rije&egrave;i';
$TEXT['ANY_WORDS'] = 'Neke rije&egrave;i';
$TEXT['EXACT_MATCH'] = 'To&egrave;no odgovara';
$TEXT['SHOW'] = 'Prika&#382;i';
$TEXT['HIDE'] = 'Sakrij';
$TEXT['START_PUBLISHING'] = 'Zapo&egrave;ni objavljivanje';
$TEXT['FINISH_PUBLISHING'] = 'Zavr&scaron;i objavljivanje';
$TEXT['DATE'] = 'Datum';
$TEXT['START'] = 'Start';
$TEXT['END'] = 'Kraj';
$TEXT['IMAGE'] = 'Slika';
$TEXT['ICON'] = 'Ikona';
$TEXT['SECTION'] = 'Dio';
$TEXT['DATE_FORMAT'] = 'Format datuma';
$TEXT['TIME_FORMAT'] = 'Format vrmena';
$TEXT['RESULTS'] = 'Rezultati';
$TEXT['RESIZE'] = 'Izmjeni veli&egrave;inu';
$TEXT['MANAGE'] = 'Upravljaj';
$TEXT['CODE'] = 'Kod';
$TEXT['WIDTH'] = '&Scaron;irina';
$TEXT['HEIGHT'] = 'Visina';
$TEXT['MORE'] = 'Vi&scaron;e';
$TEXT['READ_MORE'] = '&Egrave;itaj vi&scaron;e';
$TEXT['CHANGE_SETTINGS'] = 'Promjeni postavke';
$TEXT['CURRENT_PAGE'] = 'Trenutna stranica';
$TEXT['CLOSE'] = 'Zatvori';
$TEXT['INTRO_PAGE'] = 'Intro Stranica';
$TEXT['INSTALLATION_URL'] = 'Instalacija URL';
$TEXT['INSTALLATION_PATH'] = 'Instalacijski dio';
$TEXT['PAGE_EXTENSION'] = 'EKstenzije stranice';
$TEXT['NO_RESULTS'] = 'Nema rezultata';
$TEXT['WEBSITE_TITLE'] = 'Ime web stranice';
$TEXT['WEBSITE_DESCRIPTION'] = 'Opis web stranice';
$TEXT['WEBSITE_KEYWORDS'] = 'Klju&egrave;ne rije&egrave;i web stranice';
$TEXT['WEBSITE_HEADER'] = 'Zaglavlje web stranice';
$TEXT['WEBSITE_FOOTER'] = 'Podno&#382;je web stranice';
$TEXT['RESULTS_HEADER'] = 'Rezultati zaglavlja';
$TEXT['RESULTS_LOOP'] = 'Rezultati petlje';
$TEXT['RESULTS_FOOTER'] = 'Rezultati podno&#382;ja';
$TEXT['LEVEL'] = 'Nivo';
$TEXT['NOT_FOUND'] = 'Neprona&eth;eno';
$TEXT['PAGE_SPACER'] = 'Razmaknica stranica';
$TEXT['MATCHING'] = 'Podudaranje';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Pristup predlo&scaron;cima';
$TEXT['PAGES_DIRECTORY'] = 'Direktorij stranica';
$TEXT['MEDIA_DIRECTORY'] = 'Direktorij medije';
$TEXT['FILE_MODE'] = 'File Mod';
$TEXT['USER'] = 'Korisnik';
$TEXT['OTHERS'] = 'Drugi';
$TEXT['READ'] = '&Egrave;itaj';
$TEXT['WRITE'] = 'Pi&scaron;i';
$TEXT['EXECUTE'] = 'Izvr&scaron;i';
$TEXT['SMART_LOGIN'] = 'Inteligentno logiranje';
$TEXT['REMEMBER_ME'] = 'Sjeti me';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Dopu&scaron;tanja sitema fileova';
$TEXT['DIRECTORIES'] = 'direktoriji';
$TEXT['DIRECTORY_MODE'] = 'Mod direktorija';
$TEXT['LIST_OPTIONS'] = 'Lista opcija';
$TEXT['OPTION'] = 'Opcija';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Dopusti vi&scaron;estruki odabir';
$TEXT['TEXTFIELD'] = 'Pole teksta';
$TEXT['TEXTAREA'] = 'Podru&egrave;je teksta';
$TEXT['SELECT_BOX'] = 'Ozna&egrave;i kvadrat';
$TEXT['CHECKBOX_GROUP'] = 'Ozna&egrave;i kvadrat grupe';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio gumb grupe';
$TEXT['SIZE'] = 'Veli&egrave;ina';
$TEXT['DEFAULT_TEXT'] = 'Postoje&aelig;i tekstt';
$TEXT['SEPERATOR'] = 'Odvajanje';
$TEXT['BACK'] = 'Nazad';
$TEXT['UNDER_CONSTRUCTION'] = 'U izradi';
$TEXT['MULTISELECT'] = 'Vi&scaron;estruki odabir';
$TEXT['SHORT_TEXT'] = 'Kratki tekst';
$TEXT['LONG_TEXT'] = 'Dugi tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirekcija po&egrave;etne stranice';
$TEXT['HEADING'] = 'Zaglavlje';
$TEXT['MULTIPLE_MENUS'] = 'Ve&scaron;estruki menii';
$TEXT['REGISTERED'] = 'Registriran';
$TEXT['SECTION_BLOCKS'] = 'Kvadrati sekcije';
$TEXT['REGISTERED_VIEWERS'] = 'Registrirani promatra&egrave;i';
$TEXT['ALLOWED_VIEWERS'] = 'Dopu&scaron;teni promatra&egrave;i';
$TEXT['SUBMISSION_ID'] = 'Podpristupni ID';
$TEXT['SUBMISSIONS'] = 'Podpristupe';
$TEXT['SUBMITTED'] = 'Pristupljen';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maximalan podpristup po satu';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Podpristupi pohranjeni u bazi podataka';
$TEXT['EMAIL_ADDRESS'] = 'Email adresa';
$TEXT['CUSTOM'] = 'Korisni&egrave;ki';
$TEXT['ANONYMOUS'] = 'anoniman';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serverski operacijski sutav';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-zapisuju&aelig;i prisup fileovima';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix baziran';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Po&egrave;etni direktoriji';
$TEXT['HOME_FOLDERS'] = 'Po&egrave;etni direktoriji';
$TEXT['PAGE_TRASH'] = 'Sme&aelig;e stranice';
$TEXT['INLINE'] = 'U liniji';
$TEXT['SEPARATE'] = 'Odvojen';
$TEXT['DELETED'] = 'Obrisan';
$TEXT['VIEW_DELETED_PAGES'] = 'Pogledaj obrisane stranice';
$TEXT['EMPTY_TRASH'] = 'Isprazni sme&aelig;e';
$TEXT['TRASH_EMPTIED'] = 'Sme&aelig;e ispra&#382;njeno';
$TEXT['ADD_SECTION'] = 'Dodaj sekciju';
$TEXT['POST_HEADER'] = 'Objavi zaglavlje';
$TEXT['POST_FOOTER'] = 'Objavi podno&#382;je';
$TEXT['POSTS_PER_PAGE'] = 'Broj objava po stranici';
$TEXT['RESIZE_IMAGE_TO'] = 'Izmjeni veli&egrave;inu slike na';
$TEXT['UNLIMITED'] = 'Neograni&egrave;en';
$TEXT['OF'] = 'Of';
$TEXT['OUT_OF'] = 'Izvan Of';
$TEXT['NEXT'] = 'Slijede&aelig;i';
$TEXT['PREVIOUS'] = 'Prethodni';
$TEXT['NEXT_PAGE'] = 'Nova stranica';
$TEXT['PREVIOUS_PAGE'] = 'Prethodna stranica';
$TEXT['ON'] = 'On';
$TEXT['LAST_UPDATED_BY'] = 'Zadnje izmjenjen od';
$TEXT['RESULTS_FOR'] = 'Rezultati za';
$TEXT['TIME'] = 'Vrijeme';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['SERVER_EMAIL'] = 'Server Email';
$TEXT['MENU'] = 'Meni';
$TEXT['MANAGE_GROUPS'] = 'Upravljanje grupama';
$TEXT['MANAGE_USERS'] = 'Upravljanje korisnicima';
$TEXT['PAGE_LANGUAGES'] = 'Jezici stranice';
$TEXT['HIDDEN'] = 'Skriven';
$TEXT['MAIN'] = 'Glevni';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Izmjeni fileove kod ponovnog upisa';
$TEXT['APP_NAME'] = 'Ime aplikacije';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['BACKUP'] = 'Backup';
$TEXT['RESTORE'] = 'Povrati';
$TEXT['BACKUP_DATABASE'] = 'Backup baze podataka';
$TEXT['RESTORE_DATABASE'] = 'Povrati bazu podataka';
$TEXT['BACKUP_ALL_TABLES'] = 'Backupiraj sve tablice u bazi podataka';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backupiraj samo WB-specificirane tablice';
$TEXT['BACKUP_MEDIA'] = 'Backup Media';
$TEXT['RESTORE_MEDIA'] = 'Povrati Media';
$TEXT['ADMINISTRATION_TOOL'] = 'Administracijski alati';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha verifikacija';
$TEXT['VERIFICATION'] = 'Verifikacija';
$TEXT['DEFAULT_CHARSET'] = 'Po&egrave;etna postavka znakova';
$TEXT['CHARSET'] = 'Postavka znakova';
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
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Nemate dopu&scaron;tenje za gledanje ove stranice';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Nedovoljne privilegije tu';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Molimo unesite svoje korisni&egrave;ko ime i lozinku ispod';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Molimo unesite svoje korisni&egrave;ko ime';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Molimo unesite svoju lozinku';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Korisni&egrave;ko ime je prekratko';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Lozinka je prekratka';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Korisni&egrave;ko ime je predugo';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Lozinka je preduga';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Krivo korisni&egrave;ko ime ili lozinka';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'Unesite email adresu';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Unesite svoju email adresu ispod';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Email adresu koju ste unjeli nemamo upisanu u bazi';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Ne mo&#382;emo vam emailom poslati lozinku, molimo kontakirajte sistemskog administratora';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Va&scaron;e korisni&egrave;ko ime i lozinka poslani su na va&scaron;u email adresu';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Na&#382;alost lozinka ne mo&#382;e biti resetirana/izmjenjena vi&scaron;e od jednom u jednom satu';

$MESSAGE['START_WELCOME_MESSAGE'] = 'Dobro do&scaron;li u WebsiteBaker administraciju';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Upozorenje, instalacijski direktoriji nije jo&scaron; obrisan!';
$MESSAGE['START_CURRENT_USER'] = 'Trenutno ste logirani kao:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Nemogu&aelig;e je otvoriti konfiguracijski file';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Ne mo&#382;e zapisivati u konfiguracijski file';
$MESSAGE['SETTINGS_SAVED'] = 'Postavke su uspje&scaron;no snimljene';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Obavijest: Pritisnite ovaj gumb za reset svih nesnimljenih izmjena';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Obavijest: ovo je preporu&egrave;ljivo samo za uvijete testiranja';

$MESSAGE['USERS_ADDED'] = 'Korisnik je dodan supje&scaron;no';
$MESSAGE['USERS_SAVED'] = 'Korisnik je snimljen uspje&scaron;no';
$MESSAGE['USERS_DELETED'] = 'Korisnik je uspje&scaron;no obrisan';
$MESSAGE['USERS_NO_GROUP'] = 'Niti jedna grupa nije odabrana';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Predlo&#382;eno korisni&egrave;ko ime je prekratko';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Predlo&#382;ena lozinka je prekratka';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Une&scaron;ena lozinka ne odgovara';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Une&scaron;ena email adresa je nepotpuna';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Une&scaron;en email je ve&aelig; u upotrebi';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Predlo&#382;eno korisni&egrave;ko ime ve&aelig; je netko odabrao prije vas';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Obavijest: Trebate samo unjeti vrijednosti u polja ispod ako &#382;elite izmjeniti korisni&egrave;ku lozinku';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Jeste li sigurni da &#382;elite obrisati odabranog korisnika?';

$MESSAGE['GROUPS_ADDED'] = 'Grupa je uspje&scaron;no dodana';
$MESSAGE['GROUPS_SAVED'] = 'Grupa je uspje&scaron;no snimljena';
$MESSAGE['GROUPS_DELETED'] = 'Grupa je uspje&scaron;no obrisana';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Ime grupe je prazno';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Jeste li sigurni da &#382;elite obrisati odabranu gurupu i sve korisnike koji joj pripadaju?';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Grupa nije na&eth;ena';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Ime grupe ve&aelig; postoji';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detalji su uspje&scaron;no snimljeni';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email je snimljen uspje&scaron;no';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Une&scaron;ena lozinka nije to&egrave;na';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Lozinka je uspje&scaron;no izmjenjena';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Obavijest: Za promjenu predlo&scaron;ka idite na dio s Postavkama';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Ne mo&#382;e uklju&egrave;iti ../ u ime direktorija';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Direktorij ne postoji';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Ne mo&#382;e ../ u cilj direktorija';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Ne mo&#382;e uklju&egrave;iti ../ u ime';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Ne mo&#382;e koristiti index.php kao ime';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Ni jedna medija nije na&eth;ena u postoje&aelig;em direktoriju';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'File nije prona&eth;en';
$MESSAGE['MEDIA_DELETED_FILE'] = 'File je uspje&scaron;no obrisan';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Folder je uspje&scaron;no obrisan';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Jeste li sigurni da &#382;elite obrisati file ili direktorij?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Ne mo&#382;e obrisati odabrani file';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Ne mo&#382;e obrisati odabrani direktorij';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Niste unjeli novo ime';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Niste unjeli ekstenziju file-a';
$MESSAGE['MEDIA_RENAMED'] = 'Preimenovanje je uspje&scaron;no';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Preimenovanje je neuspje&scaron;no';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'File se podudara s imenom koje ste unjeli, a koje ve&aelig; postoji';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Direktorij se podudara s imenom koje ste unjeli, a koje ve&aelig; postoji';
$MESSAGE['MEDIA_DIR_MADE'] = 'Direktorij je uspje&scaron;no stvoren';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Ne mo&#382;e napraviti direktorij';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' file je uspje&scaron;no nasnimljen';
$MESSAGE['MEDIA_UPLOADED'] = ' fileovi su supje&scaron;no nasnimljeni';

$MESSAGE['PAGES_ADDED'] = 'Stranica je uspje&scaron;no dodana';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Zaglavlje stranice uspje&scaron;no je dodano';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Stranica s sli&egrave;nim ili istim imenom ve&aelig; postoji';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Gre&scaron;ka pri stvaranju pristupnog filea u stranicama direktorija(nedovoljne privilegije)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Gre&scaron;ka pri brisanju pristupnog filea u stranicama direktorija(nedovoljne privilegije)';
$MESSAGE['PAGES_NOT_FOUND'] = 'Stranica nije na&eth;ena';
$MESSAGE['PAGES_SAVED'] = 'Stranica je uspje&scaron;no snimljena';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Postavke stranice uspje&scaron;no su snimljene';
$MESSAGE['PAGES_NOT_SAVED'] = 'Gre&scaron;ka pri snimanju stranice';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Jeste li sigurni da &#382;elite obrisati odabranu stranicu i sve njene podstranice';
$MESSAGE['PAGES_DELETED'] = 'Stranice su supje&scaron;no obrisane';
$MESSAGE['PAGES_RESTORED'] = 'Stranice su supje&scaron;no obnovljene';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Unesite naslov stranice';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Unesite naziv menia';
$MESSAGE['PAGES_REORDERED'] = 'Stranice re-ordered uspje&scaron;no';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Gre&scaron;ka pri re-ordering stranice';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Nemate dopu&scaron;tenje za izmjenu stranice';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Ne mo&#382;e pisati file /pages/intro.php (nedovoljne privilegije)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Intro stranica je uspje&scaron;no snimljena';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Zadnje izmjene';
$MESSAGE['PAGES_INTRO_LINK'] = 'Kliknite OVDJE za izmjenu intro stranice';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Sekcijske postavke snimljene uspje&scaron;no';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Povratak na stranice';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Molimo, vratite se nazad i popunite sva polja';
$MESSAGE['GENERIC_FILE_TYPE'] = 'File koji nasnimavate mora biti slijede&aelig;eg formata:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'File koji nasnimavate mora biti u jednom od slijede&aelig;ih formata:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Ne mo&#382;e nasnimiti file';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Ve&aelig; instalirano';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nije instalirano';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Ne mo&#382;e deinstalirati';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Ne mo&#382;e unzipirati file';
$MESSAGE['GENERIC_INSTALLED'] = 'Instaliran uspje&scaron;no';
$MESSAGE['GENERIC_UPGRADED'] = 'Nadogra&eth;en uspje&scaron;no';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Deinstaliran uspje&scaron;no';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Ne mo&#382;e zapisati u ciljani direktorij';
$MESSAGE['GENERIC_INVALID'] = 'Instaliran file je nevaljal';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Ne mo&#382;e deinstalirati: odabrani file je trenutno u upotrebi';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = "<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = "this page;these pages";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "Can't uninstall the template <b>{{name}}</b>, because it is the default template!";

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Webstranica u izradi';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Molimo poku&scaron;ajte ponovo za&egrave;as...';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Budite strpljivo, ovo mo&#382;e potrajati.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Gre&scaron;ka pri otvaranju filea.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Morate unjeti detaljen podatke u nadoilaze&aelig;a polja';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Ova forma je pregledavana previ&scaron;e puta u jednom satu. Molimo poku&scaron;ajte slijede&aelig;i sat.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Broj provjere (poznat kao Captcha) neto&egrave;no je une&scaron;en. Ako imate problema s &egrave;itanjem Captcha, molimo po&scaron;aljite email: '.SERVER_EMAIL.'';

$MESSAGE['ADDON_RELOAD'] = 'Update database with information from Add-on files (e.g. after FTP upload).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'Error while updating the Add-On information.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Uspje&scaron;no nasnimljeni moduli';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Uspje&scaron;no nasnimljeni predlo&scaron;ci';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Uspje&scaron;no nasnimljeni jezici';
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