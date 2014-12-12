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
$language_code = 'TR';
$language_name = 'Türk';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Atakan KOÇ';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Giriþ';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Eklentiler';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Giriþ Bilgilerini Gerial';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Gruplar';
$MENU['HELP'] = 'Yardým';
$MENU['LANGUAGES'] = 'Diller';
$MENU['LOGIN'] = 'Giriþ';
$MENU['LOGOUT'] = 'Çýkýþ';
$MENU['MEDIA'] = 'Resimler';
$MENU['MODULES'] = 'Modüller';
$MENU['PAGES'] = 'Sayfalar';
$MENU['PREFERENCES'] = 'Tercihler';
$MENU['SETTINGS'] = 'Ayarlar';
$MENU['START'] = 'Baþlat';
$MENU['TEMPLATES'] = 'Kalýplar';
$MENU['USERS'] = 'Kullanýcýlar';
$MENU['VIEW'] = 'Görüntüle';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Kullýcý Kayýt Ol';
$TEXT['ACTIONS'] = 'Hareketler';
$TEXT['ACTIVE'] = 'Aktif';
$TEXT['ADD'] = 'Ekle';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Kýsým Ekle';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Yönetici';
$TEXT['ADMINISTRATION_TOOL'] = 'Administration tool';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Yönerici';
$TEXT['ADVANCED'] = 'Ýleri';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Çoklu seçimlere izin ver';
$TEXT['ALL_WORDS'] = 'Bütün Kelimeler';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Bilinmeyen';
$TEXT['ANY_WORDS'] = 'Herhangi bir sözcük';
$TEXT['APP_NAME'] = 'Application Adý';
$TEXT['ARE_YOU_SURE'] = 'eminmisin?';
$TEXT['AUTHOR'] = 'Yazar';
$TEXT['BACK'] = 'Geri';
$TEXT['BACKUP'] = 'Yedek Al';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database';
$TEXT['BACKUP_DATABASE'] = 'Database Yedekle';
$TEXT['BACKUP_MEDIA'] = 'Media Yedekle';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables';
$TEXT['BASIC'] = 'Baþlangýç';
$TEXT['BLOCK'] = 'Blok';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['CANCEL'] = 'Ýptal';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Verification';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['CHANGE'] = 'Deðiþtir';
$TEXT['CHANGES'] = 'Deðiþiklikler';
$TEXT['CHANGE_SETTINGS'] = 'Ayarlarý Deðiþtir';
$TEXT['CHARSET'] = 'Charset';
$TEXT['CHECKBOX_GROUP'] = 'Týklamalý Seçim';
$TEXT['CLOSE'] = 'Kapat';
$TEXT['CODE'] = 'Kod';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Daralt';
$TEXT['COMMENT'] = 'Yorum';
$TEXT['COMMENTING'] = 'Yorum yapan';
$TEXT['COMMENTS'] = 'Yorumlar';
$TEXT['CREATE_FOLDER'] = 'Dizin Yarat';
$TEXT['CURRENT'] = 'Kullanýlan';
$TEXT['CURRENT_FOLDER'] = 'Kullanýlan Dizin';
$TEXT['CURRENT_PAGE'] = 'Kullanýlan Sayfa';
$TEXT['CURRENT_PASSWORD'] = 'Kullanýlan Þifre';
$TEXT['CUSTOM'] = 'Custom';
$TEXT['DATABASE'] = 'Database';
$TEXT['DATE'] = 'Tarih';
$TEXT['DATE_FORMAT'] = 'Tarih Formatý';
$TEXT['DEFAULT'] = 'Varsayýlan';
$TEXT['DEFAULT_CHARSET'] = 'Default Charset';
$TEXT['DEFAULT_TEXT'] = 'Varsayýlan Yazý';
$TEXT['DELETE'] = 'Sil';
$TEXT['DELETED'] = 'Silindi';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Açýklama';
$TEXT['DESIGNED_FOR'] = 'Düzenleyen';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Dizinler';
$TEXT['DIRECTORY_MODE'] = 'Dizin Modu';
$TEXT['DISABLED'] = 'Ýptal';
$TEXT['DISPLAY_NAME'] = 'Görünüm Adý';
$TEXT['EMAIL'] = 'Email';
$TEXT['EMAIL_ADDRESS'] = 'Email Adresi';
$TEXT['EMPTY_TRASH'] = 'Çöp kutusu boþ';
$TEXT['ENABLED'] = 'Ýzin Ver';
$TEXT['END'] = 'Son';
$TEXT['ERROR'] = 'Hata';
$TEXT['EXACT_MATCH'] = 'Tam Bul';
$TEXT['EXECUTE'] = 'Çalýþtýr';
$TEXT['EXPAND'] = 'Geniþlet';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Alan';
$TEXT['FILE'] = 'Dosya';
$TEXT['FILES'] = 'Dosyalar';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Dosya Sistemi Ýzinleri';
$TEXT['FILE_MODE'] = 'Dosya Ýzini';
$TEXT['FINISH_PUBLISHING'] = 'Yayýný Bitir';
$TEXT['FOLDER'] = 'Dizin';
$TEXT['FOLDERS'] = 'Dizinler';
$TEXT['FOOTER'] = 'Alt Kýsým';
$TEXT['FORGOTTEN_DETAILS'] = 'Sizin Ayrýntýlý Detaylarýnýz?';
$TEXT['FORGOT_DETAILS'] = 'Detay Hatýrlat?';
$TEXT['FROM'] = 'From';
$TEXT['FRONTEND'] = 'Son Kullanýcý';
$TEXT['FULL_NAME'] = 'Tam Adýnýz';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Grup';
$TEXT['HEADER'] = 'Üst Kýsým';
$TEXT['HEADING'] = 'Baþlýk';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Yükseklik';
$TEXT['HIDDEN'] = 'Gizli';
$TEXT['HIDE'] = 'Gizle';
$TEXT['HIDE_ADVANCED'] = 'Ýleri Seçenekleri Gizle';
$TEXT['HOME'] = 'Ana Sayfa';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Ana sayfa yönlendir';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Ikon';
$TEXT['IMAGE'] = 'Resim';
$TEXT['INLINE'] = 'In-line';
$TEXT['INSTALL'] = 'Yükle';
$TEXT['INSTALLATION'] = 'Yükle';
$TEXT['INSTALLATION_PATH'] = 'Yükleme Yolu';
$TEXT['INSTALLATION_URL'] = 'Yükeleme URL';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Demo';
$TEXT['INTRO_PAGE'] = 'Demo Sayfasý';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Keywords';
$TEXT['LANGUAGE'] = 'Dil';
$TEXT['LAST_UPDATED_BY'] = 'Son Güncelleyen';
$TEXT['LENGTH'] = 'Uzunluk';
$TEXT['LEVEL'] = 'Limit';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Link';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix tabanlý';
$TEXT['LIST_OPTIONS'] = 'Liste seçenekleri';
$TEXT['LOGGED_IN'] = 'Giriþ Kaydet';
$TEXT['LOGIN'] = 'Giriþ';
$TEXT['LONG'] = 'Uzun';
$TEXT['LONG_TEXT'] = 'Uzun Yazý';
$TEXT['LOOP'] = 'Sürekli';
$TEXT['MAIN'] = 'Ana';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Yönet';
$TEXT['MANAGE_GROUPS'] = 'Grup Yönetimi';
$TEXT['MANAGE_USERS'] = 'Kullanýcý Yönetimi';
$TEXT['MATCH'] = 'Bul';
$TEXT['MATCHING'] = 'Bulunanlar';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maksimum Saat Baþý Sunum';
$TEXT['MEDIA_DIRECTORY'] = 'Resim Dizini';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Menu Baþlýðý';
$TEXT['MESSAGE'] = 'Mesaj';
$TEXT['MODIFY'] = 'Düzenle';
$TEXT['MODIFY_CONTENT'] = 'Düzeni Deðiþtir';
$TEXT['MODIFY_SETTINGS'] = 'Ayarlarý Deðiþtir';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Modül Ýzinleri';
$TEXT['MORE'] = 'Daha Çok';
$TEXT['MOVE_DOWN'] = 'Aþaðý Taþý';
$TEXT['MOVE_UP'] = 'Yukarý Taþý';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Çoklu menüler';
$TEXT['MULTISELECT'] = 'Çoklu Seçim';
$TEXT['NAME'] = 'Ýsim';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Need to log-in?';
$TEXT['NEW_PASSWORD'] = 'Yeni Þifre';
$TEXT['NEW_WINDOW'] = 'Yeni Pencere';
$TEXT['NEXT'] = 'Sonraki';
$TEXT['NEXT_PAGE'] = 'Sonraki Sayfa';
$TEXT['NO'] = 'Hayýr';
$TEXT['NONE'] = 'Yok';
$TEXT['NONE_FOUND'] = 'Hiçbiri bulmadý';
$TEXT['NOT_FOUND'] = 'Bulunamadý';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Bulunamadý';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'Of';
$TEXT['ON'] = 'On';
$TEXT['OPEN'] = 'Open';
$TEXT['OPTION'] = 'Seçenekler';
$TEXT['OTHERS'] = 'Diðerleri';
$TEXT['OUT_OF'] = 'Dýþarý';
$TEXT['OVERWRITE_EXISTING'] = 'Üstüne Yaz';
$TEXT['PAGE'] = 'Sayfa';
$TEXT['PAGES_DIRECTORY'] = 'Sayfa Dizini';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Sayfa Uzantýsý';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Sayfa Dili';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Sayfa Alt Limiti';
$TEXT['PAGE_SPACER'] = 'Sayfa Boþluðu';
$TEXT['PAGE_TITLE'] = 'Sayfa Baþlýðý';
$TEXT['PAGE_TRASH'] = 'Sayfayý Sil';
$TEXT['PARENT'] = 'Ana Grup';
$TEXT['PASSWORD'] = 'Þifre';
$TEXT['PATH'] = 'Yol';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Hata Rapor Düzeyi';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['PLEASE_SELECT'] = 'Lütfen Seçin';
$TEXT['POST'] = 'Mesaj';
$TEXT['POSTS_PER_PAGE'] = 'Sayfa baþýna mesajlar';
$TEXT['POST_FOOTER'] = 'Alt Mesaj';
$TEXT['POST_HEADER'] = 'Üst Mesajý';
$TEXT['PREVIOUS'] = 'Önceki';
$TEXT['PREVIOUS_PAGE'] = 'Önceki Sayfa';
$TEXT['PRIVATE'] = 'Özel';
$TEXT['PRIVATE_VIEWERS'] = 'Özel izleyiciler';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Herkez';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radyo Düðmeleri';
$TEXT['READ'] = 'Oku';
$TEXT['READ_MORE'] = 'Oku';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Kayýtlý Kullanýcý';
$TEXT['REGISTERED_VIEWERS'] = 'Ýzleyiciler kaydetti';
$TEXT['RELOAD'] = 'Tekrarla';
$TEXT['REMEMBER_ME'] = 'Hazýrla';
$TEXT['RENAME'] = 'Yeni isim ver';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Gerekli';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Sýfýrla';
$TEXT['RESIZE'] = 'Tekrar Boyutlandýr';
$TEXT['RESIZE_IMAGE_TO'] = 'Boyutlandýr resimi';
$TEXT['RESTORE'] = 'Yedeði yükle';
$TEXT['RESTORE_DATABASE'] = 'Database Geri Yükle';
$TEXT['RESTORE_MEDIA'] = 'Media Geri Yükle';
$TEXT['RESULTS'] = 'Sonuçlar';
$TEXT['RESULTS_FOOTER'] = 'Bulunduðunda Alt Kýsým';
$TEXT['RESULTS_FOR'] = 'Sonuçlar';
$TEXT['RESULTS_HEADER'] = 'Bulunduðunda Üst Kýsým';
$TEXT['RESULTS_LOOP'] = 'Bulunduðunda Döngü';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Tekrarla Yeni Þifre';
$TEXT['RETYPE_PASSWORD'] = 'Þifreyi Tekrarla';
$TEXT['SAME_WINDOW'] = 'Ayný Pencere';
$TEXT['SAVE'] = 'Kayýt et';
$TEXT['SEARCH'] = 'Ara';
$TEXT['SEARCHING'] = 'Arama';
$TEXT['SECTION'] = 'Kýsým';
$TEXT['SECTION_BLOCKS'] = 'Kýsým bloklarý';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Seçmeli Menü';
$TEXT['SEND_DETAILS'] = 'Detaylarý Gönder';
$TEXT['SEPARATE'] = 'Ayýrýcý';
$TEXT['SEPERATOR'] = 'Bölücü';
$TEXT['SERVER_EMAIL'] = 'Server Email';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server Ýþletim Sistemi';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier';
$TEXT['SETTINGS'] = 'Ayarlar';
$TEXT['SHORT'] = 'Kýsa';
$TEXT['SHORT_TEXT'] = 'Kýsa Yazý';
$TEXT['SHOW'] = 'Göster';
$TEXT['SHOW_ADVANCED'] = 'Ýleri Seçenekleri Göster';
$TEXT['SIGNUP'] = 'Kayýt Ol';
$TEXT['SIZE'] = 'Boyut';
$TEXT['SMART_LOGIN'] = 'Güvenli Giriþ';
$TEXT['START'] = 'Baþlat';
$TEXT['START_PUBLISHING'] = 'Yayýna Baþla';
$TEXT['SUBJECT'] = 'Konu';
$TEXT['SUBMISSIONS'] = 'Sunuþlar';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Sunuþlar, veritabanýnda depoladý';
$TEXT['SUBMISSION_ID'] = 'Sunuþlar ID';
$TEXT['SUBMITTED'] = 'Gönderildi';
$TEXT['SUCCESS'] = 'Ýþlem Baþarýldý';
$TEXT['SYSTEM_DEFAULT'] = 'Sistem Varsayýlaný';
$TEXT['SYSTEM_PERMISSIONS'] = 'Sistem Ýzinleri';
$TEXT['TABLE_PREFIX'] = 'Table Düzen Adý';
$TEXT['TARGET'] = 'Hedef';
$TEXT['TARGET_FOLDER'] = 'Hedef Dizin';
$TEXT['TEMPLATE'] = 'Kalýp';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Kalýp Ýzinleri';
$TEXT['TEXT'] = 'Yazý';
$TEXT['TEXTAREA'] = 'Textarea';
$TEXT['TEXTFIELD'] = 'Textfield';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Saat';
$TEXT['TIMEZONE'] = 'Zaman Dilimi';
$TEXT['TIME_FORMAT'] = 'Saat Formatý';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['TITLE'] = 'Baþlýk';
$TEXT['TO'] = 'To';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['TRASH_EMPTIED'] = 'Çöp kutusu boþaltýldý';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Tip';
$TEXT['UNDER_CONSTRUCTION'] = 'Yapým Aþamasýnda';
$TEXT['UNINSTALL'] = 'Kaldýr';
$TEXT['UNKNOWN'] = 'Bilinmeyen';
$TEXT['UNLIMITED'] = 'Sýnýrsýz';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Yukarý';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Dosya Yükle';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Kullanýcý';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Verification';
$TEXT['VERSION'] = 'Versiyon';
$TEXT['VIEW'] = 'Görünüþ';
$TEXT['VIEW_DELETED_PAGES'] = 'Silinen Sayfayý Göster';
$TEXT['VIEW_DETAILS'] = 'Detaylar';
$TEXT['VISIBILITY'] = 'Görünürlük';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Default From Mail';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Default Sender Name';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Please specify a default "FROM" address and "SENDER" name below. It is recommended to use a FROM address like: <strong>admin@yourdomain.com</strong>. Some mail provider (e.g. <em>mail.com</em>) may reject mails with a FROM: address like <em>name@mail.com</em> sent via a foreign relay to avoid spam.<br /><br />The default values are only used if no other values are specified by WebsiteBaker. If your server supports <acronym title="Simple mail transfer protocol">SMTP</acronym>, you may want use this option for outgoing mails.';
$TEXT['WBMAILER_FUNCTION'] = 'Mail Routine';
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Settings:</strong><br />The settings below are only required if you want to send mails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. If you do not know your SMTP host or you are not sure about the required settings, simply stay with the default mail routine: PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Authentification';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'only activate if your SMTP host requires authentification';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Password';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Loginname';
$TEXT['WEBSITE'] = 'Website';
$TEXT['WEBSITE_DESCRIPTION'] = 'Website Açýklamasý';
$TEXT['WEBSITE_FOOTER'] = 'Website Alt Kýsým';
$TEXT['WEBSITE_HEADER'] = 'Website Üst Kýsým';
$TEXT['WEBSITE_KEYWORDS'] = 'Website Keywords';
$TEXT['WEBSITE_TITLE'] = 'Website Baþlýðý';
$TEXT['WELCOME_BACK'] = 'Hoþgeldiniz';
$TEXT['WIDTH'] = 'Geniþlik';
$TEXT['WINDOW'] = 'Pencere';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Yazýlabilir dosya izinleri';
$TEXT['WRITE'] = 'Yaz';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style';
$TEXT['YES'] = 'Evet';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Grup Ekle';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Baþlýk Ekle';
$HEADING['ADD_PAGE'] = 'Sayfa Ekle';
$HEADING['ADD_USER'] = 'Kullanýcý Ekle';
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Araçlarý';
$HEADING['BROWSE_MEDIA'] = 'Resimleri Yönetme';
$HEADING['CREATE_FOLDER'] = 'Dizin Yarat';
$HEADING['DEFAULT_SETTINGS'] = 'Varsayýlan Ayarlar';
$HEADING['DELETED_PAGES'] = 'Sayfayý Sil';
$HEADING['FILESYSTEM_SETTINGS'] = 'Dosya Sistemi Ayarlarý';
$HEADING['GENERAL_SETTINGS'] = 'Genel Ayarlar';
$HEADING['INSTALL_LANGUAGE'] = 'Dil Yükle';
$HEADING['INSTALL_MODULE'] = 'Modül Yükle';
$HEADING['INSTALL_TEMPLATE'] = 'Kalýp Yükle';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Dil Açýklamasý';
$HEADING['MANAGE_SECTIONS'] = 'Kýsýmlarý Yönet';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Geliþtirilmiþ Sayfa Ayarlarýný Deðiþtir';
$HEADING['MODIFY_DELETE_GROUP'] = 'Deðiþtir/Sil Grup';
$HEADING['MODIFY_DELETE_PAGE'] = 'Deðiþtir/Sil Sayfa';
$HEADING['MODIFY_DELETE_USER'] = 'Deðiþtir/Sil kullanýcý';
$HEADING['MODIFY_GROUP'] = 'Grup Düzenle';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Baþlangýç Sayfasýný Düzenle';
$HEADING['MODIFY_PAGE'] = 'Sayfayý Deðiþtir';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Sayfa Ayarlarýný Deðiþtir';
$HEADING['MODIFY_USER'] = 'Kullanýcý Düzenle';
$HEADING['MODULE_DETAILS'] = 'Modül Açýklamasý';
$HEADING['MY_EMAIL'] = 'Emailim';
$HEADING['MY_PASSWORD'] = 'Þifrem';
$HEADING['MY_SETTINGS'] = 'Ayarlarým';
$HEADING['SEARCH_SETTINGS'] = 'Arama Ayarlarý';
$HEADING['SERVER_SETTINGS'] = 'Server Ayarlarý';
$HEADING['TEMPLATE_DETAILS'] = 'Kalýp Açýklamasý';
$HEADING['UNINSTALL_LANGUAGE'] = 'Dil Kaldýr';
$HEADING['UNINSTALL_MODULE'] = 'Modül Kaldýr';
$HEADING['UNINSTALL_TEMPLATE'] = 'Kalýp Kaldýr';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Dosya Yükle';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Insufficient privelliges to be here';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Paralonuzu 1 saat aralýklarla deðiþtirebilirsiniz.';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Uygunsuz email þifresi, Lütfen Yönetici ile Kontak kurun';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Bu email adresi veritabanýnda bulunamadý';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Lütfen email adresini girin';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Üzgünüm, bu sayfayý görüntülemeye yetkiniz yok';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Daha önce yüklenmiþti';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Uygunsuz, hedef dizin yazýlamýyor';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Kaldýrýlamýyor';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Kaldýrama: Seçilen dosya, kullanýmdadýr';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'this page;these pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default template!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Dosya unzip edilemiyor';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Dosya Yüklenemiyor';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Dosya açarken hata.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Yüklediðin dosyanýn izin verilen dosya olmasýna dikkat edin:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Yüklediðin dosyalarýn izin verilen dosya olmasýna dikkat edin:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Lütfen geri dönüp bütün alanlarý doldurunuz';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Baþarýlý bir þekilde yerleþtirildi';
$MESSAGE['GENERIC_INVALID'] = 'Senin yüklediðin dosya, geçersizdir';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Yüklenemiyor';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Ol hasta memnun et, bu, bir anda alabilirdi.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Lütfen daha sonra kontrol edin...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Baþarýlý bir þekilde kaldýrýldý';
$MESSAGE['GENERIC_UPGRADED'] = 'Güncelleme baþarýlý birþekilde yapýldý';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website Under Construction';
$MESSAGE['GROUPS_ADDED'] = 'Grup, baþarýlý bir þekilde ekledi';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Seçtiðiniz grubu silmek istediðinizden eminmisiniz? (ve bu gruba ekli kullanýcýlarý)?';
$MESSAGE['GROUPS_DELETED'] = 'Grup, baþarýlý bir þekilde silindi';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Grup adý boþ';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Bu grup adý zaten var';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Hiçbir grup bulmadý';
$MESSAGE['GROUPS_SAVED'] = 'Grup, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Lütfen þifre girin';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Þifreniz çok uzun';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Þifreniz çok kýsa';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Mutlaka bir uzantý girmelisinz';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Mutlaka bir isim girmelisiniz';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Seçtiðiniz dizin silinemiyor';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Seçtiðiniz dosya silinemiyor';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Yeni isim ver baþarýsýz';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Dosya ve dizinleri silmek istediðinizden eminmisiniz?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Dizin, baþarýlý bir þekilde silindi';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Dosya, baþarýlý bir þekilde silindi';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Directory does not exist';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Giremezsiniz ../ içindeki dizin adý';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Girmiþ olduðunuz dizin zaten var';
$MESSAGE['MEDIA_DIR_MADE'] = 'Dizin, baþarýlý bir þekilde yarattý';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Dizin yaratma baþarýsýz';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Girmiþ olduðunuz dosya zaten var';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Dosya Bulunamadý';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Giremezsiniz ../ ismine';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'index.php isimini kullanamazsýnýz';
$MESSAGE['MEDIA_NONE_FOUND'] = 'No media found in the current folder';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Yeni isim ver baþarýlý.';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' Dosya baþarýlý bir þekilde yüklendi';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target';
$MESSAGE['MEDIA_UPLOADED'] = ' Dosyalar baþarýlý bir þekilde yüklendi';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Sorry, this form has been submitted too many times so far this hour. Please retry in the next hour.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'You must enter details for the following fields';
$MESSAGE['PAGES_ADDED'] = 'Sayfa, baþarýlý bir þekilde ekledi';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Üst sayfa, baþarýlý bir þekilde ekledi';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Lütfen menü baþlýðýný girin';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Lütfen sayfa baþlýðýný girin';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Yaratýrken hatalý giriþ /pages dizini için (Yetersiz yetki)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Silinirken hatalý giriþ /pages dizini için (Yetersiz yetki)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Yenilenen sayfada hata var';
$MESSAGE['PAGES_DELETED'] = 'Sayfa, baþarýlý bir þekilde silindi';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Seçtiðiniz sayfayý silmek istediðinizden eminmisiniz (Bütün alt sayfalar silinecektir)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Sizin bu sayfayý deðiþtirme izininiz yok';
$MESSAGE['PAGES_INTRO_LINK'] = 'Buraya týklayarak Giriþ Sayfasýný Düzenleye Bilirsiniz.';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Dosyaya yazýlamýyor /pages/intro.php (Yetersiz yetki)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Giriþ sayfasý baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Son deðiþiklik yapan';
$MESSAGE['PAGES_NOT_FOUND'] = 'Sayfa bulunamadý';
$MESSAGE['PAGES_NOT_SAVED'] = 'Kayýt edilen sayfa hatalý';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Bu sayfa veya dosya zaten var.';
$MESSAGE['PAGES_REORDERED'] = 'Baþarýlý biçimde yenilendi';
$MESSAGE['PAGES_RESTORED'] = 'Sayfa, baþarýlý bir þekilde kurtarýldý';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Sayfaya Git';
$MESSAGE['PAGES_SAVED'] = 'Sayfa, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Sayfa ayarlarý baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Section properties saved successfully';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Girdiðiniz þifre yanlýþ';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Ayrýntýlar, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email, baþarýlý bir þekilde güncelleþtirdi';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Parola, baþarýlý bir þekilde deðiþtirdi';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Not Edin: Bu buton bütün deðiþiklikleri ilk haline geri getirir';
$MESSAGE['SETTINGS_SAVED'] = 'Ayarlar baþarýlý bir þekilde kayýt edildi';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Unable to open the configuration file';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Cannot write to configuration file';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Please note: this is only recommended for testing environments';
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
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Your login details...';
$MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] = 'Many thanks for your registration';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Bir email adresi girmelisiniz.';
$MESSAGE['START_CURRENT_USER'] = 'Sizin kullandýðýnýz giriþ ismi:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Uyarý! Yükleme dizini halen duruyor!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Hoþgeldiniz WebsiteBaker Yönetimine';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Please note: to change the template you must go to the Settings section';
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
$MESSAGE['USERS_ADDED'] = 'Kullanýcý, baþarýlý bir þekilde ekledi';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Not Edin: Sen sadece yukarýdaki alanlara deðerleri gir. Eðer bu kullanýcýlarý dile deðiþtirseydin.';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Seçtiðiniz kullanýcýlarý silmek istediðinizden eminmisiniz?';
$MESSAGE['USERS_DELETED'] = 'Kullanýcý, baþarýlý bir þekilde silindi';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Girdiðiniz email baþkasý tarafýndan kullanýlýyor';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Girdiðiniz email adresi geçersiz';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Hiçbir grup seçilmedi';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Girdiðiniz þifre bulunamadý';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Girdiðiniz þifre kýsa';
$MESSAGE['USERS_SAVED'] = 'Kullanýcý, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';
$OVERVIEW['GROUPS'] = 'Kullanýcý Gruplarýnýn Ýzinlerini Düzenleme...';
$OVERVIEW['HELP'] = 'Sorularýnýz? Cevaplarý...';
$OVERVIEW['LANGUAGES'] = 'WebsiteBaker Dilleri Düzenleme...';
$OVERVIEW['MEDIA'] = 'Resim Deposundaki Dosyalarý Yönetme...';
$OVERVIEW['MODULES'] = 'WebsiteBaker Modüllerini Yönetme...';
$OVERVIEW['PAGES'] = 'Website Sayfalarýný Yönetme...';
$OVERVIEW['PREFERENCES'] = 'Email, Þifre gibi ayarlarý düzenleme... ';
$OVERVIEW['SETTINGS'] = 'WebsiteBaker için ayarlarý düzenleme...';
$OVERVIEW['START'] = 'Yönetici Görünümü';
$OVERVIEW['TEMPLATES'] = 'Websitenizdeki Kalýplarý Deðiþtirme Ve Düzenleme...';
$OVERVIEW['USERS'] = 'WebsiteBaker kullanýcýlarýný düzenleme...';
$OVERVIEW['VIEW'] = 'Yeni bir pencerede sitenizin öngörünümü...';
