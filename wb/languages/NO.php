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
$language_code = 'NO';
$language_name = 'Norsk';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Odd Egil Hansen (oeh)';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Start';
$MENU['PAGES'] = 'Sider';
$MENU['MEDIA'] = 'Media';
$MENU['ADDONS'] = 'Tillegg';
$MENU['MODULES'] = 'Moduler';
$MENU['TEMPLATES'] = 'Maler';
$MENU['LANGUAGES'] = 'Spr&aring;k';
$MENU['PREFERENCES'] = 'Bruker innstillinger';
$MENU['SETTINGS'] = 'Innstillinger';
$MENU['ADMINTOOLS'] = 'Admin-verkt&oslash;y';
$MENU['ACCESS'] = 'Tilgang';
$MENU['USERS'] = 'Brukere';
$MENU['GROUPS'] = 'Grupper';
$MENU['HELP'] = 'Hjelp';
$MENU['VIEW'] = 'Forh&aring;ndsvis';
$MENU['LOGOUT'] = 'Logg ut';
$MENU['LOGIN'] = 'Logg inn';
$MENU['FORGOT'] = 'Hent innloggings informasjon';

// Section overviews
$OVERVIEW['START'] = 'Administrasjons oversikt';
$OVERVIEW['PAGES'] = 'Administrer dine internett sider...';
$OVERVIEW['MEDIA'] = 'Administrer filer lagret i media katalogen...';
$OVERVIEW['MODULES'] = 'Administrer WebsiteBaker moduler...';
$OVERVIEW['TEMPLATES'] = 'Forandre utseende p&aring; internett siden med maler...';
$OVERVIEW['LANGUAGES'] = 'Administrer WebsiteBaker spr&aring;k...';
$OVERVIEW['PREFERENCES'] = 'Forandre innstillinger som e-post adresse, passord, o.l....';
$OVERVIEW['SETTINGS'] = 'Forandre instillinger for WebsiteBaker...';
$OVERVIEW['USERS'] = 'Velg hvilke brukere som kan logge inn i WebsiteBaker...';
$OVERVIEW['GROUPS'] = 'Administrer grupper og deres system adgang...';
$OVERVIEW['HELP'] = 'Har du et sp&oslash;rsm&aring;l? Finn svaret...';
$OVERVIEW['VIEW'] = 'Forh&aring;ndsvis internett siden din i et nytt vindu...';
$OVERVIEW['ADMINTOOLS'] = 'G&aring; inn p&aring; WebsiteBaker sine administrasjonsverkt&oslash;y...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Endre/Slett side';
$HEADING['DELETED_PAGES'] = 'Slettede sider';
$HEADING['ADD_PAGE'] = 'Legg til side';
$HEADING['ADD_HEADING'] = 'Tilf&oslash;y overskrift';
$HEADING['MODIFY_PAGE'] = 'Endre side';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Endre sideinnstillinger';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Endre avansert sideinnstillinger';
$HEADING['MANAGE_SECTIONS'] = 'Administrer seksjoner';
$HEADING['MODIFY_INTRO_PAGE'] = 'Endre introduksjons side';

$HEADING['BROWSE_MEDIA'] = 'Utforsk Media';
$HEADING['CREATE_FOLDER'] = 'Opprett Katalog';
$HEADING['UPLOAD_FILES'] = 'Last opp fil(er)';

$HEADING['INSTALL_MODULE'] = 'Innstaller Modul';
$HEADING['UNINSTALL_MODULE'] = 'Avinstaller Modul';
$HEADING['MODULE_DETAILS'] = 'Modul Detaljer';

$HEADING['INSTALL_TEMPLATE'] = 'Installer Mal';
$HEADING['UNINSTALL_TEMPLATE'] = 'Avinstaller Mal';
$HEADING['TEMPLATE_DETAILS'] = 'Mal Detaljer';

$HEADING['INSTALL_LANGUAGE'] = 'Installer Spr&aring;k';
$HEADING['UNINSTALL_LANGUAGE'] = 'Avinstaller Spr&aring;k';
$HEADING['LANGUAGE_DETAILS'] = 'Spr&aring;k Detaljer';

$HEADING['MY_SETTINGS'] = 'Mine Innstillinger';
$HEADING['MY_EMAIL'] = 'Min E-post';
$HEADING['MY_PASSWORD'] = 'Mitt Passord';

$HEADING['GENERAL_SETTINGS'] = 'Generelle Instillinger';
$HEADING['DEFAULT_SETTINGS'] = 'Standard Innstillinger';
$HEADING['SEARCH_SETTINGS'] = 'S&oslash;ke Innstillinger';
$HEADING['FILESYSTEM_SETTINGS'] = 'Filsystem Innstillinger';
$HEADING['SERVER_SETTINGS'] = 'Server Innstillinger';
$HEADING['WBMAILER_SETTINGS'] = 'Innstillinger for e-post senderen';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administrasjonsverkt&oslash;y';

$HEADING['MODIFY_DELETE_USER'] = 'Endre/Slette Bruker';
$HEADING['ADD_USER'] = 'Legg til Bruker';
$HEADING['MODIFY_USER'] = 'Endre Bruker';

$HEADING['MODIFY_DELETE_GROUP'] = 'Endre/Slette Gruppe';
$HEADING['ADD_GROUP'] = 'Legg til Gruppe';
$HEADING['MODIFY_GROUP'] = 'Endre Gruppe';

$HEADING['ADDON_PRECHECK_FAILED'] = 'Kravene for installering av denne modulen er ikke oppfylt';
$HEADING['INVOKE_MODULE_FILES'] = 'Start modul filene mauelt';

// Other text
$TEXT['OPEN'] = '&Aring;pne';
$TEXT['ADD'] = 'Tilf&oslash;y';
$TEXT['MODIFY'] = 'Endre';
$TEXT['SETTINGS'] = 'Innstillinger';
$TEXT['DELETE'] = 'Slett';
$TEXT['SAVE'] = 'Lagre';
$TEXT['RESET'] = 'Tilbakestill';
$TEXT['LOGIN'] = 'Logg inn';
$TEXT['RELOAD'] = 'Oppdater';
$TEXT['CANCEL'] = 'Avbryt';
$TEXT['NAME'] = 'Navn';
$TEXT['PLEASE_SELECT'] = 'Vennligst velg';
$TEXT['TITLE'] = 'Tittel';
$TEXT['PARENT'] = 'Hovedkategori';
$TEXT['TYPE'] = 'Type';
$TEXT['VISIBILITY'] = 'Synlighet';
$TEXT['PRIVATE'] = 'Privat';
$TEXT['PUBLIC'] = 'Offentlig';
$TEXT['NONE'] = 'Ingen';
$TEXT['NONE_FOUND'] = 'Ingen funnet';
$TEXT['CURRENT'] = 'Aktuell';
$TEXT['CHANGE'] = 'Forandre';
$TEXT['WINDOW'] = 'Vindu';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['KEYWORDS'] = 'N&oslash;kkelord';
$TEXT['ADMINISTRATORS'] = 'Administratorer';
$TEXT['PRIVATE_VIEWERS'] = 'Private Seere';
$TEXT['EXPAND'] = 'Utvid';
$TEXT['COLLAPSE'] = 'Fall sammen';
$TEXT['MOVE_UP'] = 'Flytt opp';
$TEXT['MOVE_DOWN'] = 'Flytt ned';
$TEXT['RENAME'] = 'Endre navn';
$TEXT['MODIFY_SETTINGS'] = 'Endre innstillinger';
$TEXT['MODIFY_CONTENT'] = 'Endre innhold';
$TEXT['VIEW'] = 'Se';
$TEXT['UP'] = 'Opp';
$TEXT['FORGOTTEN_DETAILS'] = 'Glemt dine detaljer?';
$TEXT['NEED_TO_LOGIN'] = 'Trenger du &aring; logge inn?';
$TEXT['SEND_DETAILS'] = 'Send detaljer';
$TEXT['USERNAME'] = 'Brukernavn';
$TEXT['PASSWORD'] = 'Passord';
$TEXT['HOME'] = 'Hjem';
$TEXT['TARGET_FOLDER'] = 'Gjelende katalog';
$TEXT['OVERWRITE_EXISTING'] = 'Overskriv eksisterende';
$TEXT['FILE'] = 'Fil';
$TEXT['FILES'] = 'Filer';
$TEXT['FOLDER'] = 'Katalog';
$TEXT['FOLDERS'] = 'Kataloger';
$TEXT['CREATE_FOLDER'] = 'Opprett Katalog';
$TEXT['UPLOAD_FILES'] = 'Last opp fil(er)';
$TEXT['CURRENT_FOLDER'] = 'Gjelende Katalog';
$TEXT['TO'] = 'Til';
$TEXT['FROM'] = 'Fra';
$TEXT['INSTALL'] = 'Innstaller';
$TEXT['UNINSTALL'] = 'Avinstaller';
$TEXT['VIEW_DETAILS'] = 'Se Detaljer';
$TEXT['DISPLAY_NAME'] = 'Vis Navn';
$TEXT['AUTHOR'] = 'Skribent';
$TEXT['VERSION'] = 'Versjon';
$TEXT['DESIGNED_FOR'] = 'Laget For';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['EMAIL'] = 'E-post';
$TEXT['LANGUAGE'] = 'Spr&aring;k';
$TEXT['TIMEZONE'] = 'Tidssone';
$TEXT['CURRENT_PASSWORD'] = 'Gjeldende Passord';
$TEXT['NEW_PASSWORD'] = 'Nytt Passord';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Skriv Passordet P&aring; Nytt';
$TEXT['ACTIVE'] = 'Aktivt';
$TEXT['DISABLED'] = 'Deaktivert';
$TEXT['ENABLED'] = 'Aktivert';
$TEXT['RETYPE_PASSWORD'] = 'Skriv Passord P&aring; Nytt';
$TEXT['GROUP'] = 'Gruppe';
$TEXT['SYSTEM_PERMISSIONS'] = 'System Adgang';
$TEXT['MODULE_PERMISSIONS'] = 'Modul Adgang';
$TEXT['SHOW_ADVANCED'] = 'Vis Avanserte Valg';
$TEXT['HIDE_ADVANCED'] = 'Skjul Avanserte Valg';
$TEXT['BASIC'] = 'Grunnleggende';
$TEXT['ADVANCED'] = 'Avansert';
$TEXT['WEBSITE'] = 'Internett Side';
$TEXT['DEFAULT'] = 'Standard';
$TEXT['KEYWORDS'] = 'N&oslash;kkelord';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Topptekst';
$TEXT['FOOTER'] = 'Bunntekst ';
$TEXT['TEMPLATE'] = 'Mal';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['INSTALLATION'] = 'Installsjon';
$TEXT['DATABASE'] = 'Database';
$TEXT['HOST'] = 'Vert';
$TEXT['INTRO'] = 'Introduksjon';
$TEXT['PAGE'] = 'Side';
$TEXT['SIGNUP'] = 'Registrer';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Feil rapporteringsniv&aring;';
$TEXT['ADMIN'] = 'Admin';
$TEXT['PATH'] = 'Bane';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Forside';
$TEXT['EXTENSION'] = 'Ekspansjon';
$TEXT['TABLE_PREFIX'] = 'Tabell Prefiks';
$TEXT['CHANGES'] = 'Endringer';
$TEXT['ADMINISTRATION'] = 'Administrasjon';
$TEXT['FORGOT_DETAILS'] = 'Glemt detaljer?';
$TEXT['LOGGED_IN'] = 'Innlogget';
$TEXT['WELCOME_BACK'] = 'Velkommen tilbake';
$TEXT['FULL_NAME'] = 'Fult Navn';
$TEXT['ACCOUNT_SIGNUP'] = 'Konto Registrering';
$TEXT['LINK'] = 'Lenke';
$TEXT['ANCHOR'] = 'Anker';
$TEXT['TARGET'] = 'M&aring;l';
$TEXT['NEW_WINDOW'] = 'Nytt Vindu';
$TEXT['SAME_WINDOW'] = 'Samme Vindu';
$TEXT['TOP_FRAME'] = 'Topp ramme';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Side Niv&aring; Begrensning';
$TEXT['SUCCESS'] = 'Suksess';
$TEXT['ERROR'] = 'Feil';
$TEXT['ARE_YOU_SURE'] = 'Er du sikker?';
$TEXT['YES'] = 'Ja';
$TEXT['NO'] = 'Nei';
$TEXT['SYSTEM_DEFAULT'] = 'System Standard';
$TEXT['PAGE_TITLE'] = 'Side Tittel';
$TEXT['MENU_TITLE'] = 'Meny Tittel';
$TEXT['ACTIONS'] = 'Valg';
$TEXT['UNKNOWN'] = 'Ukjent';
$TEXT['BLOCK'] = 'Blokker';
$TEXT['SEARCH'] = 'S&oslash;k';
$TEXT['SEARCHING'] = 'S&oslash;ker';
$TEXT['POST'] = 'Innlegg';
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['COMMENTS'] = 'Kommentarer';
$TEXT['COMMENTING'] = 'Kommenterer';
$TEXT['SHORT'] = 'Kort';
$TEXT['LONG'] = 'Langt';
$TEXT['LOOP'] = 'L&oslash;kke';
$TEXT['FIELD'] = 'Felt';
$TEXT['REQUIRED'] = 'P&aring;budt';
$TEXT['LENGTH'] = 'Lengde';
$TEXT['MESSAGE'] = 'Melding';
$TEXT['SUBJECT'] = 'Emne';
$TEXT['MATCH'] = 'Treff';
$TEXT['ALL_WORDS'] = 'Alle Ord';
$TEXT['ANY_WORDS'] = 'Samme Hvilke Ord';
$TEXT['EXACT_MATCH'] = 'Eksakt Treff';
$TEXT['SHOW'] = 'Vis';
$TEXT['HIDE'] = 'Skjul';
$TEXT['START_PUBLISHING'] = 'Start Publisering';
$TEXT['FINISH_PUBLISHING'] = 'Avslutt Publisering';
$TEXT['DATE'] = 'Dato';
$TEXT['START'] = 'Start';
$TEXT['END'] = 'Slutt';
$TEXT['IMAGE'] = 'Bilde';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Seksjon';
$TEXT['DATE_FORMAT'] = 'Dato format';
$TEXT['TIME_FORMAT'] = 'Tids format';
$TEXT['RESULTS'] = 'Resultat';
$TEXT['RESIZE'] = 'Endre St&oslash;rrelse';
$TEXT['MANAGE'] = 'Administrer';
$TEXT['CODE'] = 'Kode';
$TEXT['WIDTH'] = 'Bredde';
$TEXT['HEIGHT'] = 'H&oslash;yde';
$TEXT['MORE'] = 'Mer';
$TEXT['READ_MORE'] = 'Les Mer';
$TEXT['CHANGE_SETTINGS'] = 'Endre Innstillinger';
$TEXT['CURRENT_PAGE'] = 'Aktuell Side';
$TEXT['CLOSE'] = 'Lukk';
$TEXT['INTRO_PAGE'] = 'Intro Side';
$TEXT['INSTALLATION_URL'] = 'Installasjons URL';
$TEXT['INSTALLATION_PATH'] = 'Innstallasjons Bane';
$TEXT['PAGE_EXTENSION'] = 'Side Tillegg';
$TEXT['NO_RESULTS'] = 'Ingen Resultater';
$TEXT['WEBSITE_TITLE'] = 'Nettstedets Tittel';
$TEXT['WEBSITE_DESCRIPTION'] = 'Nettstedets Beskrivelse';
$TEXT['WEBSITE_KEYWORDS'] = 'Nettsted N&oslash;kkelord';
$TEXT['WEBSITE_HEADER'] = 'Nettsted Header';
$TEXT['WEBSITE_FOOTER'] = 'Nettsted Footer';
$TEXT['RESULTS_HEADER'] = 'Resultat Header';
$TEXT['RESULTS_LOOP'] = 'Resultat L&oslash;kke';
$TEXT['RESULTS_FOOTER'] = 'Resultat Footer';
$TEXT['LEVEL'] = 'Niv&aring;';
$TEXT['NOT_FOUND'] = 'Ikke Funnet';
$TEXT['PAGE_SPACER'] = 'Side Mellomrom';
$TEXT['MATCHING'] = 'Finner Motstykke';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Mal Tillgang';
$TEXT['PAGES_DIRECTORY'] = 'Side Katalog';
$TEXT['MEDIA_DIRECTORY'] = 'Media Katalog';
$TEXT['FILE_MODE'] = 'Fil Modus';
$TEXT['USER'] = 'Bruker';
$TEXT['OTHERS'] = 'Andre';
$TEXT['READ'] = 'Les';
$TEXT['WRITE'] = 'Skriv';
$TEXT['EXECUTE'] = 'Utf&oslash;re';
$TEXT['SMART_LOGIN'] = 'Smart Innlogging';
$TEXT['REMEMBER_ME'] = 'Husk Meg';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Filsystem Tillgang';
$TEXT['DIRECTORIES'] = 'Kataloger';
$TEXT['DIRECTORY_MODE'] = 'Katalog Modus';
$TEXT['LIST_OPTIONS'] = 'Vis Valg';
$TEXT['OPTION'] = 'Valg';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Tillat Flere Valg';
$TEXT['TEXTFIELD'] = 'Tekstfelt';
$TEXT['TEXTAREA'] = 'Tekstomr&aring;de';
$TEXT['SELECT_BOX'] = 'Velg Boks';
$TEXT['CHECKBOX_GROUP'] = 'Valgboks Gruppe';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radioknapp Gruppe';
$TEXT['SIZE'] = 'St&oslash;rrelse';
$TEXT['DEFAULT_TEXT'] = 'Standard Tekst';
$TEXT['SEPERATOR'] = 'Mellomrom';
$TEXT['BACK'] = 'Tilbake';
$TEXT['UNDER_CONSTRUCTION'] = 'Under Konstruksjon';
$TEXT['MULTISELECT'] = 'Flere Valg';
$TEXT['SHORT_TEXT'] = 'Kort tekst';
$TEXT['LONG_TEXT'] = 'Lang Tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Hjemmeside Omadressering';
$TEXT['HEADING'] = 'Overskrift';
$TEXT['MULTIPLE_MENUS'] = 'Mangfoldige Menyer';
$TEXT['REGISTERED'] = 'Registrert';
$TEXT['SECTION_BLOCKS'] = 'Sekjsons Blokker';
$TEXT['REGISTERED_VIEWERS'] = 'Registrerte Seere';
$TEXT['ALLOWED_VIEWERS'] = 'Tillatte lesere';
$TEXT['SUBMISSION_ID'] = 'Avgitt ID';
$TEXT['SUBMISSIONS'] = 'Avgivelser';
$TEXT['SUBMITTED'] = 'Avgitt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Avgivelser Per Time';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Avgivelser Lagret i Database';
$TEXT['EMAIL_ADDRESS'] = 'E-post Adresse';
$TEXT['CUSTOM'] = 'Egendefinert';
$TEXT['ANONYMOUS'] = 'Anonym';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serveren Operativ System';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Global skrivetilgang til filer';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix bassert';
$TEXT['WINDOWS'] = 'WINDOWS';
$TEXT['HOME_FOLDER'] = 'Hjemmekatalog';
$TEXT['HOME_FOLDERS'] = 'Hjemmekataloger';
$TEXT['PAGE_TRASH'] = 'Sides&oslash;ppel';
$TEXT['INLINE'] = 'In-line';
$TEXT['SEPARATE'] = 'Separat';
$TEXT['DELETED'] = 'Slettet';
$TEXT['VIEW_DELETED_PAGES'] = 'Vis Slettete Sider';
$TEXT['EMPTY_TRASH'] = 'T&oslash;m S&oslash;ppel';
$TEXT['TRASH_EMPTIED'] = 'S&oslash;ppelet er T&oslash;mt';
$TEXT['ADD_SECTION'] = 'Legg Til Seksjon';
$TEXT['POST_HEADER'] = 'Legg Til Header';
$TEXT['POST_FOOTER'] = 'Legg Til Footer';
$TEXT['POSTS_PER_PAGE'] = 'Innlegg Per Side';
$TEXT['RESIZE_IMAGE_TO'] = 'Endre Bilde St&oslash;rrelse Til';
$TEXT['UNLIMITED'] = 'Ubegrenset';
$TEXT['OF'] = 'Av';
$TEXT['OUT_OF'] = 'Av antall';
$TEXT['NEXT'] = 'Neste';
$TEXT['PREVIOUS'] = 'Forrige';
$TEXT['NEXT_PAGE'] = 'Neste Side';
$TEXT['PREVIOUS_PAGE'] = 'Forrige Side';
$TEXT['ON'] = 'P&aring;';
$TEXT['LAST_UPDATED_BY'] = 'Sist Endret Av';
$TEXT['RESULTS_FOR'] = 'Resultat For';
$TEXT['TIME'] = 'Tid';
$TEXT['REDIRECT_AFTER'] = 'Videresend etter';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stil';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['SERVER_EMAIL'] = 'Server E-post';
$TEXT['MENU'] = 'Meny';
$TEXT['MANAGE_GROUPS'] = 'Administrer Grupper';
$TEXT['MANAGE_USERS'] = 'Administrer Brukere';
$TEXT['PAGE_LANGUAGES'] = 'Side Spr&aring;k';
$TEXT['HIDDEN'] = 'Skjult';
$TEXT['MAIN'] = 'Hoved';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Gi filer nytt navn etter opplastningen';
$TEXT['APP_NAME'] = 'Applikasjonsnavn';
$TEXT['SESSION_IDENTIFIER'] = 'Sesjons id-navn';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['BACKUP'] = 'Sikkerhetskopiere';
$TEXT['RESTORE'] = 'Gjenopprett';
$TEXT['BACKUP_DATABASE'] = 'Sikkerhetskopiere database';
$TEXT['RESTORE_DATABASE'] = 'Gjenopprett Database';
$TEXT['BACKUP_ALL_TABLES'] = 'Sikkerhetskopiere alle tabeller i databasen';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Sikkerhetskopiere bare WB- spesifikke tabeller';
$TEXT['BACKUP_MEDIA'] = 'Sikkerhetskopi Medie';
$TEXT['RESTORE_MEDIA'] = 'Gjenopprett Media';
$TEXT['ADMINISTRATION_TOOL'] = 'Administrasjonsverkt&oslash;y';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha bekreftelse';
$TEXT['VERIFICATION'] = 'Bekreftelse';
$TEXT['DEFAULT_CHARSET'] = 'Standard Charset';
$TEXT['CHARSET'] = 'Tegnsett';
$TEXT['MODULE_ORDER'] = 'Modul-rekkef&oslash;lge for s&oslash;king';
$TEXT['MAX_EXCERPT'] = 'Maksimalt antall linjer for utdrag';
$TEXT['TIME_LIMIT'] = 'Maksimal tid for &aring; samle utrag per modul';
$TEXT['PUBL_START_DATE'] = 'Start dato';
$TEXT['PUBL_END_DATE'] = 'Slutt dato';
$TEXT['CALENDAR'] = 'Kalender';
$TEXT['DELETE_DATE'] = 'Slette dato';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Spesifiser en standard "FRA" addresse og "AVSENDER" navn under. Det er annbefalt &aring; bruke en FRA adresse som: <strong>admin@yourdomain.com</strong>. Noen e-post leverand&oslash;rer(f.eks. <em>mail.com</em>) kan muligens avvise e-poster med en FRA: addresse som <em>name@mail.com</em> sendt igjennom en frmmed sent via en fremmed "relay" for &aring; unng&aring; spam.<br /><br />Standard verdiene brukes kun hvis det ikke er spessifisert andre verdier av WebsiteBaker. Hvis serveren din st&oslash;tter <acronym title="Simple mail transfer protocol">SMTP</acronym>, b&oslash;r du muligens benytte denne muligheten for utg&aring;ende e-post.';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Standard Fra e-post';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Standard Avsender Navn';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP e-post innstillinger:</strong><br />Innstillingene under er kun p&aring;krevet hvis du vil sende e-post via <acronym title="Simple mail transfer protocol">SMTP</acronym>. Hvis du ikke vet hvem som er din "SMTP" leverand&oslash;r, eller du ikke er sikker p&aring; innstillingene som kreves, b&oslash;r du bruke standard e-post rutinen: PHP MAIL.';
$TEXT['WBMAILER_FUNCTION'] = 'e-post rutine';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP V&aelig;rt';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Autentifisering';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'aktiveres kun hvis din SMTP v&aelig;rt krever autentifisering';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Brukernavn';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Passord';
$TEXT['PLEASE_LOGIN'] = 'Venligst log p&aring;';
$TEXT['CAP_EDIT_CSS'] = 'Rediger CSS koden';
$TEXT['HEADING_CSS_FILE'] = 'Faktisk modul fil: ';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Rediger  CSS koden i tekst viduet nedenfor.';
$TEXT['CODE_SNIPPET'] = "Code-snippet";
$TEXT['REQUIREMENT'] = "Krav";
$TEXT['INSTALLED'] = "installert";
$TEXT['NOT_INSTALLED'] = "ikke installert";
$TEXT['ADDON'] = "Tillegg";
$TEXT['EXTENSION'] = "Utvidelse";
$TEXT['UNZIP_FILE'] = "Upload and unpack a zip archive";
$TEXT['DELETE_ZIP'] = "Delete zip archive after unpacking";
$TEXT['NEED_CURRENT_PASSWORD'] ='confirm with current password';

// Success/error messages
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Beklager, du har ikke tillgang til &aring; se denne siden';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Beklager, ikke noe aktivt innhold &aring; vise.';

$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Mangelfull tillgangs rettigheter';

$MESSAGE['LOGIN_BOTH_BLANK'] = 'Vennligst skriv brukernavn og passord nedenfor';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Vennligst skriv et brukernavn';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Vennligst skriv et passord';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Det angitte brukernavnet er for kort';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Det angitte passordet er for kort';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Det angitte brukernavnet er for langt';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Det angitte passordet er for langt';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Brukernavnet eller passordet er feil';

$MESSAGE['SIGNUP_NO_EMAIL'] = 'Du m&aring; skrive inn en e-post adresse';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Dine p&aring;-loggings detaljer...';
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

$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Vennligst skriv e-post adressen nedenfor';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'E-post adressen ble ikke funnet i databasen';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Kunne ikke sende passord. Kontakt system administrator';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Brukernavn og passord er sendt i e-post';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Beklager, men passord kan ikke tilbakestilles mer enn en gang i timen.';

$MESSAGE['START_WELCOME_MESSAGE'] = 'Velkommen til WebsiteBaker Administrasjon';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Advarsel, installasjonskatalogen eksisterer forsatt!';
$MESSAGE['START_CURRENT_USER'] = 'Du er logget inn som:';

$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Kunne ikke &aring;pne konfigurasjons filen';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Kunne ikke skrive til konfigurasjons filen';
$MESSAGE['SETTINGS_SAVED'] = 'Lykkes &aring; lagre endringer';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Merk: Ved &aring; klikke denne knappen lagres ikke endringer';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Merk: Dette er kun ment for teste milj&oslash;er';

$MESSAGE['USERS_ADDED'] = 'Lykkes &aring; opprette ny bruker';
$MESSAGE['USERS_SAVED'] = 'Lykkes &aring; lagre bruker';
$MESSAGE['USERS_DELETED'] = 'Lykkes &aring; slette bruker';
$MESSAGE['USERS_NO_GROUP'] = 'Ingen gruppe ble valgt';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'Angitt brukernavn for kort';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Angitt passord for kort';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Passordene er ikke like';
$MESSAGE['USERS_INVALID_EMAIL'] = 'E-post adresse ikke gyldig';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'E-post adresse allerede i bruk';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'Brukernavn er allerede brukt, du m&aring; anngi et annet brukernavn';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Merk: Skriv kun inn verdier i feltene ovenfor hvis du vil endre passordet til denne brukeren';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Vil du virkelig slette den valgte brukeren?';

$MESSAGE['GROUPS_ADDED'] = 'Lykkes &aring; legge til gruppe';
$MESSAGE['GROUPS_SAVED'] = 'Lykkes &aring; lagre gruppe';
$MESSAGE['GROUPS_DELETED'] = 'Lykkes &aring; slette gruppe';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Gruppe navn ikke angitt';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Slette valgte gruppe (og dermed ogs&aring; alle tilh&oslash;rende brukere)?';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Ingen gruppe funnet';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Gruppenavn finnes allerede';

$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Lykkes &aring; lagre detaljer';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Lykkes &aring; oppdatere e-post';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Passordet du skrev inn er ikke korrekt';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Lykkes &aring; endre passord';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';

$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Merk: For &aring; endre malen m&aring; man gj&oslash;re dette i Instillinger seksjonen';

$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Kan ikke benytte ../ i katalog navnet';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Katalogen finnes ikke';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Kan ikke ha ../ i katalog m&aring;let';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Kan ikke benytte ../ i navnet';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Kan ikke benytte index.php som navnet';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Det ble ikke funnet noen media i den angitte katalogen';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Fant ingen fil';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Lykkes &aring; slette fil';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Lykkes &aring; slette katalog';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Vil du virkelig slette filen eller katalogen?';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Kan ikke slette valgte fil';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Kan ikke slette valgte katalog';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Du anga ikke inn et nytt navn';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Du tastet ikke inn en fil utvidelse';
$MESSAGE['MEDIA_RENAMED'] = 'Lykkes &aring; endre navn';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Mislykkes &aring; endre navn';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'En fil med samme navn eksisterer allerede';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'En katalog med samme navn eksisterer allerede';
$MESSAGE['MEDIA_DIR_MADE'] = 'Lykkes &aring; opprette katalogen';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Mislykkes &aring; opprette katalogen';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' Lykkes &aring; laste opp filen';
$MESSAGE['MEDIA_UPLOADED'] = ' Lykkes &aring; laste opp filene';

$MESSAGE['PAGES_ADDED'] = 'Lykkes &aring; legge til siden';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Lykkes &aring; legge til side overskrift';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'En side med lik eller tilsvarende tittel eksisterer';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Feilet &aring; opprette adgang fil i /pages katalog (manglende rettigheter)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Feilet &aring; slette adgang fil i /pages katalog (manglende rettigheter)';
$MESSAGE['PAGES_NOT_FOUND'] = 'Fant ikke side';
$MESSAGE['PAGES_SAVED'] = 'Lykkes &aring; lagre side';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Lykkes &aring; lagre side innstillinger';
$MESSAGE['PAGES_NOT_SAVED'] = 'Kunne ikke lagre side';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Er du sikker p&aring; at du vil slette valgte side (og dermed alle under-sider)?';
$MESSAGE['PAGES_DELETED'] = 'Lykkes &aring; slette side';
$MESSAGE['PAGES_RESTORED'] = 'Lykkes &aring; gjenopprette side';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Vennligst skriv inn side tittel';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Vennligst skriv inn meny tittel';
$MESSAGE['PAGES_REORDERED'] = 'Lykkes &aring; endre side rekkef&oslash;lge';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Feilet &aring; endre rekkef&oslash;lge';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Du har ikke rettigheter til &aring; endre denne siden';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Kunne ikke skrive til fil /pages/intro.php (manglende rettigheter)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Lykkes &aring; lagre intro side';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Sist modifisert av';
$MESSAGE['PAGES_INTRO_LINK'] = 'Klikk HER for &aring; endre intro siden';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Lykkes &aring; lagre seksjons innstillinger';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Tilbake til sider';

$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Vennligst g&aring; tilbake og fyll inn alle felter';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Vennligst merk at filen du vil laste opp m&aring; v&aelig;re av f&oslash;lgende format:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Vennligst merk at filen du vil laste opp m&aring; v&aelig;re en av f&oslash;lgende formater:';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Kan ikke laste opp fil';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Allerede installert';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Ikke installert';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Kan ikke avinstallere';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kan ikke pakke ut fil';
$MESSAGE['GENERIC_INSTALLED'] = 'Lykkes &aring; installere';
$MESSAGE['GENERIC_UPGRADED'] = 'Lykkes &aring; oppdatere';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Lykkes &aring; avinstallere';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kunne ikke skrive til m&aring;l katalogen';
$MESSAGE['GENERIC_INVALID'] = 'Filen du lastet opp er ikke gyldig';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Kan ikke avinstallere: Valgte fil er i bruk';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';

$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = "<br /><br />{{type}} <b>{{type_name}}</b> kunne ikke avinstalleres, da den fortsatt benyttes p&aring; siden {{pages}}.<br /><br />";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = "denne siden;disse sidene";
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "Kan ikke avinstallere designmalen <b>{{name}}</b>, da den benyttes som standard designmal!";

$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Nettstedet er under konstruksjon';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Vennligst kom tilbake p&aring; et annet tidspunkt...';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Vennligst v&aelig;r t&aring;lmodig, dette kan ta en stund.';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Feil ved &aring;pningen av filen.';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Feil i WebsiteBaker installasjons filen. Vennligst sjekk formatet p� *.zip filen.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Feil i WebsiteBaker spr&aring;k filen. Vennligst sjekk tekst filen.';

$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Du m&aring; skrive inn detaljer for f&oslash;lgende felt';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Beklager, dette skjemaet har blitt sendt for mange ganger denne timen. Vennligst pr&oslash;v igjen om en time.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Bekreftelsesnummeret (ogs&aring; kjent som Captcha) som du skrev inn er feil. Hvis du har problemer med &aring; lese Captcha, vennligst kontakt: '.SERVER_EMAIL.'';

$MESSAGE['ADDON_RELOAD'] = 'Oppdater databasen med innformasjon fra Tilleggs filen (for eksempel etter � ha lastet opp via FTP).';
$MESSAGE['ADDON_ERROR_RELOAD'] = 'En feil oppstod under oppdateringen av Tilleggs innformasjonen.';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Lykkes i &aring; oppdatere moduler';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Lykkes i &aring; oppdatere maler';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Lykkes i &aring; oppdatere spr&aring;k';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'En fei oppstod under installasjonen av Tillegget. Dit system oppfyller ikke kravene for denne Tilleggs modulen. For &aring; f&aring; denne Tilleggs modulen til &aring; fungere p&aring; systemet ditt, m&aring; du fikse de feilene som er inngitt under.';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'N&aring;r Tillegg lastes opp via FTP (ikke &aring; annbefale), vill ikke modulens installasjons filer <tt>install.php</tt>, <tt>upgrade.php</tt> eller <tt>uninstall.php</tt> bli kj&oslash;rt automatisk. Moduler, lastet opp p&aring; denne m&aring;ten, vil muligens ikke fungere p&aring; korrekt m&aring;te eller ikke la seg av-installere.<br /><br />Du kan, for moduler lastet om via FTP, kj&oslash;re disse modul filene manuelt nedenfor.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'OBS: Den eksisterende databasen for modulen vil g&aring; tapt. Benytt denne muligheten hvis du har problemer med Moduler som er lastet opp via FTP.';

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