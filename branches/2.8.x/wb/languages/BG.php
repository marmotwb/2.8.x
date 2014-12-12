<?php
/**
 *
 * @category        framework
 * @package         language
 * @author          Website Baker Project
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
$language_code = 'BG';
$language_name = 'Bulgarian';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Hristo Benev(Христо Бенев)';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Достъп';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Добавки';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Забравих данните за вход';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Групи';
$MENU['HELP'] = 'Помощ';
$MENU['LANGUAGES'] = 'Езици';
$MENU['LOGIN'] = 'Вход';
$MENU['LOGOUT'] = 'Изход';
$MENU['MEDIA'] = 'Медиа';
$MENU['MODULES'] = 'Модули';
$MENU['PAGES'] = 'Страници';
$MENU['PREFERENCES'] = 'Предпочитания';
$MENU['SETTINGS'] = 'Настройки';
$MENU['START'] = 'Начало';
$MENU['TEMPLATES'] = 'Шаблони';
$MENU['USERS'] = 'Потребители';
$MENU['VIEW'] = 'Виж';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Регистрация';
$TEXT['ACTIONS'] = 'Действия';
$TEXT['ACTIVE'] = 'Активиран';
$TEXT['ADD'] = 'Добави';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Добави секция';
$TEXT['ADMIN'] = 'Администратор';
$TEXT['ADMINISTRATION'] = 'Администрация';
$TEXT['ADMINISTRATION_TOOL'] = 'Инструмент за администриране';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Администратори';
$TEXT['ADVANCED'] = 'Разширена';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Позволени зрители';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Позволи множествен избор';
$TEXT['ALL_WORDS'] = 'Всички думи';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Анонимен';
$TEXT['ANY_WORDS'] = 'Която и да е дума';
$TEXT['APP_NAME'] = 'Име на приложението';
$TEXT['ARE_YOU_SURE'] = 'Сигурни ли сте?';
$TEXT['AUTHOR'] = 'Автор';
$TEXT['BACK'] = 'Назад';
$TEXT['BACKUP'] = 'Резервно копие';
$TEXT['BACKUP_ALL_TABLES'] = 'Резервно копие на таблиците в базата данни';
$TEXT['BACKUP_DATABASE'] = 'Резервно копие на базата данни';
$TEXT['BACKUP_MEDIA'] = 'Резервно копие - медия';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Резервно копие само на WB-специфични таблици';
$TEXT['BASIC'] = 'Основна';
$TEXT['BLOCK'] = 'Блокирай';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['CANCEL'] = 'Отказ';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha проверка';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['CHANGE'] = 'Смени';
$TEXT['CHANGES'] = 'Промени';
$TEXT['CHANGE_SETTINGS'] = 'Промени настройките';
$TEXT['CHARSET'] = 'Кодова таблица';
$TEXT['CHECKBOX_GROUP'] = 'Checkbox група';
$TEXT['CLOSE'] = 'Затвори';
$TEXT['CODE'] = 'Код';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Свий';
$TEXT['COMMENT'] = 'Коментар';
$TEXT['COMMENTING'] = 'Коментиране';
$TEXT['COMMENTS'] = 'Коментари';
$TEXT['CREATE_FOLDER'] = 'Създай папка/и/';
$TEXT['CURRENT'] = 'Текуща';
$TEXT['CURRENT_FOLDER'] = 'Текуща папка';
$TEXT['CURRENT_PAGE'] = 'Текуща страница';
$TEXT['CURRENT_PASSWORD'] = 'Текуща парола';
$TEXT['CUSTOM'] = 'По мярка';
$TEXT['DATABASE'] = 'База данни';
$TEXT['DATE'] = 'Дата';
$TEXT['DATE_FORMAT'] = 'Формат дата';
$TEXT['DEFAULT'] = 'По подразбиране';
$TEXT['DEFAULT_CHARSET'] = 'Кодова таблица по подразбиране';
$TEXT['DEFAULT_TEXT'] = 'Текст по подразбиране';
$TEXT['DELETE'] = 'Изтрий';
$TEXT['DELETED'] = 'Изтрита';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Описание';
$TEXT['DESIGNED_FOR'] = 'Направен за';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Папки';
$TEXT['DIRECTORY_MODE'] = 'Режим папки';
$TEXT['DISABLED'] = 'Деактивиран';
$TEXT['DISPLAY_NAME'] = 'Покажи име';
$TEXT['EMAIL'] = 'Email';
$TEXT['EMAIL_ADDRESS'] = 'Email адрес';
$TEXT['EMPTY_TRASH'] = 'Изпразни кошчето';
$TEXT['ENABLED'] = 'Позволен';
$TEXT['END'] = 'Край';
$TEXT['ERROR'] = 'Грешка';
$TEXT['EXACT_MATCH'] = 'Точно съвпадение';
$TEXT['EXECUTE'] = 'Изпълнение';
$TEXT['EXPAND'] = 'Разшири';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Поле';
$TEXT['FILE'] = 'Файл';
$TEXT['FILES'] = 'Файлове';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Позволения - файлова система';
$TEXT['FILE_MODE'] = 'Файлов режим';
$TEXT['FINISH_PUBLISHING'] = 'Край на публикуване';
$TEXT['FOLDER'] = 'Папка';
$TEXT['FOLDERS'] = 'Папки';
$TEXT['FOOTER'] = 'Footer';
$TEXT['FORGOTTEN_DETAILS'] = 'Забравени детайли?';
$TEXT['FORGOT_DETAILS'] = 'Забравени детайли?';
$TEXT['FROM'] = 'От';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['FULL_NAME'] = 'Пълно име';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Група';
$TEXT['HEADER'] = 'Header';
$TEXT['HEADING'] = 'Heading';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Височина';
$TEXT['HIDDEN'] = 'Скрит';
$TEXT['HIDE'] = 'Скрий';
$TEXT['HIDE_ADVANCED'] = 'Скрий разширените опции';
$TEXT['HOME'] = 'Начало';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Homepage Redirection';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Икона';
$TEXT['IMAGE'] = 'Картинка';
$TEXT['INLINE'] = 'In-line';
$TEXT['INSTALL'] = 'Инсталирай';
$TEXT['INSTALLATION'] = 'Инсталация';
$TEXT['INSTALLATION_PATH'] = 'Път - инсталация';
$TEXT['INSTALLATION_URL'] = 'URL - инсталация';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Въведение';
$TEXT['INTRO_PAGE'] = 'Въвеждаща страница';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Ключови думи';
$TEXT['LANGUAGE'] = 'Език';
$TEXT['LAST_UPDATED_BY'] = 'Последно обновен от';
$TEXT['LENGTH'] = 'Дължина';
$TEXT['LEVEL'] = 'Ниво';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Връзка';
$TEXT['LINUX_UNIX_BASED'] = 'Линукс/Юникс базирана';
$TEXT['LIST_OPTIONS'] = 'Списък - опции';
$TEXT['LOGGED_IN'] = 'Logged-In';
$TEXT['LOGIN'] = 'Вход';
$TEXT['LONG'] = 'Дълъг';
$TEXT['LONG_TEXT'] = 'Дълъг текст';
$TEXT['LOOP'] = 'Loop';
$TEXT['MAIN'] = 'Основен';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Управление';
$TEXT['MANAGE_GROUPS'] = 'Управление групи';
$TEXT['MANAGE_USERS'] = 'Управление потребители';
$TEXT['MATCH'] = 'Подобен';
$TEXT['MATCHING'] = 'Съвпада';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Макс. Подавания за час';
$TEXT['MEDIA_DIRECTORY'] = 'Папка медия';
$TEXT['MENU'] = 'Меню';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Заглавие на менюто';
$TEXT['MESSAGE'] = 'Съобщение';
$TEXT['MODIFY'] = 'Промени';
$TEXT['MODIFY_CONTENT'] = 'Промени съдържанието';
$TEXT['MODIFY_SETTINGS'] = 'Промени настройките';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Права модули';
$TEXT['MORE'] = 'Повече';
$TEXT['MOVE_DOWN'] = 'Надолу';
$TEXT['MOVE_UP'] = 'Нагоре';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Множество менюта';
$TEXT['MULTISELECT'] = 'Multi-select';
$TEXT['NAME'] = 'Име';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Искате да влезете?';
$TEXT['NEW_PASSWORD'] = 'Нова парола';
$TEXT['NEW_WINDOW'] = 'Нов прозорец';
$TEXT['NEXT'] = 'Следващ';
$TEXT['NEXT_PAGE'] = 'Слдваща страница';
$TEXT['NO'] = 'Не';
$TEXT['NONE'] = 'Нищо';
$TEXT['NONE_FOUND'] = 'Нищо не е намерено';
$TEXT['NOT_FOUND'] = 'Не е намерен';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Няма резултати';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'От';
$TEXT['ON'] = 'On';
$TEXT['OPEN'] = 'Open';
$TEXT['OPTION'] = 'Опция';
$TEXT['OTHERS'] = 'Други';
$TEXT['OUT_OF'] = 'от';
$TEXT['OVERWRITE_EXISTING'] = 'Презапиши съществуващ';
$TEXT['PAGE'] = 'Страница';
$TEXT['PAGES_DIRECTORY'] = 'Папка страници';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Разширена страница';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Страница езици';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Page Level Limit';
$TEXT['PAGE_SPACER'] = 'Page Spacer';
$TEXT['PAGE_TITLE'] = 'Заглавие на страницата';
$TEXT['PAGE_TRASH'] = 'Page Trash';
$TEXT['PARENT'] = 'Родител';
$TEXT['PASSWORD'] = 'Парола';
$TEXT['PATH'] = 'Път';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Error Reporting Level';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['PLEASE_SELECT'] = 'Моля изберете';
$TEXT['POST'] = 'Остави';
$TEXT['POSTS_PER_PAGE'] = 'Posts Per Page';
$TEXT['POST_FOOTER'] = 'Post Footer';
$TEXT['POST_HEADER'] = 'Post Header';
$TEXT['PREVIOUS'] = 'Предишен';
$TEXT['PREVIOUS_PAGE'] = 'Предишна страница';
$TEXT['PRIVATE'] = 'Закрит достъп';
$TEXT['PRIVATE_VIEWERS'] = 'Закрит достъп';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Публична';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Button група';
$TEXT['READ'] = 'Четене';
$TEXT['READ_MORE'] = 'Прочети повече';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Регистриран';
$TEXT['REGISTERED_VIEWERS'] = 'Регистрирани зрители';
$TEXT['RELOAD'] = 'Обнови';
$TEXT['REMEMBER_ME'] = 'Запомни ме';
$TEXT['RENAME'] = 'Преименувай';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Задължително';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Нулирай';
$TEXT['RESIZE'] = 'Промени размера';
$TEXT['RESIZE_IMAGE_TO'] = 'Resize Image To';
$TEXT['RESTORE'] = 'Възстанови';
$TEXT['RESTORE_DATABASE'] = 'Възстанови базата данни';
$TEXT['RESTORE_MEDIA'] = 'Възстанови медия';
$TEXT['RESULTS'] = 'Резултати';
$TEXT['RESULTS_FOOTER'] = 'Results Footer';
$TEXT['RESULTS_FOR'] = 'Резултати за';
$TEXT['RESULTS_HEADER'] = 'Results Header';
$TEXT['RESULTS_LOOP'] = 'Results Loop';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Още веднъж новата парола';
$TEXT['RETYPE_PASSWORD'] = 'Още веднъж паролата';
$TEXT['SAME_WINDOW'] = 'Същия прозорец';
$TEXT['SAVE'] = 'Запази';
$TEXT['SEARCH'] = 'Търси';
$TEXT['SEARCHING'] = 'Търся';
$TEXT['SECTION'] = 'Секция';
$TEXT['SECTION_BLOCKS'] = 'Section Blocks';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Кутия избор';
$TEXT['SEND_DETAILS'] = 'Изпрати детайлите';
$TEXT['SEPARATE'] = 'Separate';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['SERVER_EMAIL'] = 'Email на сървъра';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Операционна ситема на сървъра';
$TEXT['SESSION_IDENTIFIER'] = 'Идентификатор сесия';
$TEXT['SETTINGS'] = 'Настройки';
$TEXT['SHORT'] = 'Къс';
$TEXT['SHORT_TEXT'] = 'Кратък текст';
$TEXT['SHOW'] = 'Покажи';
$TEXT['SHOW_ADVANCED'] = 'Покажи разширени опции';
$TEXT['SIGNUP'] = 'Запищи се';
$TEXT['SIZE'] = 'Големина';
$TEXT['SMART_LOGIN'] = 'Smart Login';
$TEXT['START'] = 'Начало';
$TEXT['START_PUBLISHING'] = 'Започни публикуване';
$TEXT['SUBJECT'] = 'Сюжет';
$TEXT['SUBMISSIONS'] = 'Подадени';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Подаванията запазени в базата данни';
$TEXT['SUBMISSION_ID'] = 'Подаден ID';
$TEXT['SUBMITTED'] = 'Подаден';
$TEXT['SUCCESS'] = 'Успех';
$TEXT['SYSTEM_DEFAULT'] = 'По подразбиране на системата';
$TEXT['SYSTEM_PERMISSIONS'] = 'Системни права';
$TEXT['TABLE_PREFIX'] = 'Префикс на таблица';
$TEXT['TARGET'] = 'Цел';
$TEXT['TARGET_FOLDER'] = 'Към папка';
$TEXT['TEMPLATE'] = 'Шаблон';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Позволения шаблон';
$TEXT['TEXT'] = 'Текст';
$TEXT['TEXTAREA'] = 'Текстово пространство';
$TEXT['TEXTFIELD'] = 'Текстово поле';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Час';
$TEXT['TIMEZONE'] = 'Времева зона';
$TEXT['TIME_FORMAT'] = 'Формат време';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['TITLE'] = 'Титла';
$TEXT['TO'] = 'До';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['TRASH_EMPTIED'] = 'Кошчето изпразнено';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Тип';
$TEXT['UNDER_CONSTRUCTION'] = 'В процес на създаване';
$TEXT['UNINSTALL'] = 'Деинсталирай';
$TEXT['UNKNOWN'] = 'Неизвестно';
$TEXT['UNLIMITED'] = 'Без лимит';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Нагоре';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Качи файлове';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Потребител';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Проверка';
$TEXT['VERSION'] = 'Версия';
$TEXT['VIEW'] = 'Преглед';
$TEXT['VIEW_DELETED_PAGES'] = 'Виз изтритите страници';
$TEXT['VIEW_DETAILS'] = 'Виж детайлите';
$TEXT['VISIBILITY'] = 'Видимост';
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
$TEXT['WEBSITE'] = 'Сайт';
$TEXT['WEBSITE_DESCRIPTION'] = 'Описание на сайта';
$TEXT['WEBSITE_FOOTER'] = 'Website Footer';
$TEXT['WEBSITE_HEADER'] = 'Website Header';
$TEXT['WEBSITE_KEYWORDS'] = 'Ключови дума на сайта';
$TEXT['WEBSITE_TITLE'] = 'Заглавие на сайта';
$TEXT['WELCOME_BACK'] = 'Добре дошли';
$TEXT['WIDTH'] = 'Ширина';
$TEXT['WINDOW'] = 'Прозорец';
$TEXT['WINDOWS'] = 'Уиндоус';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable file permissions';
$TEXT['WRITE'] = 'Запис';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG редактор';
$TEXT['WYSIWYG_STYLE'] = 'Стил WYSIWYG';
$TEXT['YES'] = 'Да';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Add Group';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Добави заглавие';
$HEADING['ADD_PAGE'] = 'Добави страница';
$HEADING['ADD_USER'] = 'Добави потребител';
$HEADING['ADMINISTRATION_TOOLS'] = 'Административни инструменти';
$HEADING['BROWSE_MEDIA'] = 'Преглед на Медия';
$HEADING['CREATE_FOLDER'] = 'Създай папка';
$HEADING['DEFAULT_SETTINGS'] = 'Настройки по подразбиране';
$HEADING['DELETED_PAGES'] = 'Изтрити страници';
$HEADING['FILESYSTEM_SETTINGS'] = 'Настрйки файлова система';
$HEADING['GENERAL_SETTINGS'] = 'Общи настройки';
$HEADING['INSTALL_LANGUAGE'] = 'Инсталирай език';
$HEADING['INSTALL_MODULE'] = 'Инсталирай модул';
$HEADING['INSTALL_TEMPLATE'] = 'Инсталирай шаблон';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Детайли за език';
$HEADING['MANAGE_SECTIONS'] = 'Управление на секциите';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Промени разширените настройки на страница';
$HEADING['MODIFY_DELETE_GROUP'] = 'Промени/Изтрий група';
$HEADING['MODIFY_DELETE_PAGE'] = 'Промени/Изтрий страница';
$HEADING['MODIFY_DELETE_USER'] = 'Промени/Изтрий потребител';
$HEADING['MODIFY_GROUP'] = 'Промени група';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Промени въвеждащата страница';
$HEADING['MODIFY_PAGE'] = 'Промени страница';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Промени настройките на страница';
$HEADING['MODIFY_USER'] = 'Промени потребител';
$HEADING['MODULE_DETAILS'] = 'Детайли за модул';
$HEADING['MY_EMAIL'] = 'Моят e-mail';
$HEADING['MY_PASSWORD'] = 'Моята парола';
$HEADING['MY_SETTINGS'] = 'Моите настройки';
$HEADING['SEARCH_SETTINGS'] = 'Настройки търсене';
$HEADING['SERVER_SETTINGS'] = 'Настройки сървър';
$HEADING['TEMPLATE_DETAILS'] = 'Детайли за шаблон';
$HEADING['UNINSTALL_LANGUAGE'] = 'Деинсталирай език';
$HEADING['UNINSTALL_MODULE'] = 'Деинсталирай модул';
$HEADING['UNINSTALL_TEMPLATE'] = 'Деинсталирай шаблон';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Качване на файлове';
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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Недостатъчни привилегии за да сте тук';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Съжаляваме, паролата не може да се нулира по-често от един път на час';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Проблем с изпращането на паролата по email - контактувайте със системния администратор';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Въведения email не е в базата данни';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Въведете email адрес';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Съжаляваме ,но нямате разрешение да видите тази страница';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Вече е инсталиран';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Не може да се записва в целевата директория';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Не може да се деинсталира';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Не може да се деинсталира: изпрания файл се използва в момента';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'this page;these pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default template!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'unzip на файла невъзможен';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Файла не беше качен';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Грешка при отваряне на файл.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Файла, който качвате трябва да бъде в следния формат:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Файла, който качвате трябва да бъде в следните формати:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Върнете се и почилнете всички полета';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Инсталиран успешно';
$MESSAGE['GENERIC_INVALID'] = 'Невалиден файл';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Не е инсталиран';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Бъдете търпеливи, може да отнеме време.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Проверете пак...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Деинсталиран успешно';
$MESSAGE['GENERIC_UPGRADED'] = 'Обновен успешно';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Сайта е в процес на създаване';
$MESSAGE['GROUPS_ADDED'] = 'Групата е добавена успешно';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Искате ли да изтриете избраната група (и всички потребители в нея)?';
$MESSAGE['GROUPS_DELETED'] = 'Групата бе изтрита успешно';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Няма име на групата';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Група с това име вече съществува';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Няма групи';
$MESSAGE['GROUPS_SAVED'] = 'Групата е записана успешно';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Въведете парола';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Въведената парола е много дълга';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Въведената парола е много къса';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Не въведохте разширение';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Не въведохте ново име';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Избраната папка не може да бъде изтрита';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Избрания файл не може да бъде изтрит';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Преименуването неуспешно';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Съгурни ли сте че искате да изтриете?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Папката изтрита успяшно';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Файла изтрит успешно';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Папката не съществува';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Не може да включите ../ в име на папка';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Вече има папка с такова име';
$MESSAGE['MEDIA_DIR_MADE'] = 'Папката успешно създадена';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Папкате не може да бъде създадена';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Вече има файл с такова име';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Няма такъв файл';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Не може да включите ../ в името';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Не може да използвате index.php като име';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Няма медия в текущата папка';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Преименуването успешно';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' файла успешно качен';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Не може да включите ../ като цел на папка';
$MESSAGE['MEDIA_UPLOADED'] = ' файловете бяха успешно качени';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Съжаляваме, този форуляр е подаден повече пъти от позволеното през този час. Опитайте отнове по време на следващи час.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Контролния номер (позант като Captcha) е грешен. Ако имате проблем с четенето на Captcha, изпратете e-mail на: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Трябва да попълните следните полета';
$MESSAGE['PAGES_ADDED'] = 'Страницата успешно добавена';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Page heading успешно добавен';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Въведете име на менюто';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Въведете име на страницата';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Грешка при създаване на access файл е папка /pages (недостатъчни привилегии)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Грешка при изтриване на access файл е папка /pages (недостатъчни привилегии)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Грешка при преподреждането на страницата';
$MESSAGE['PAGES_DELETED'] = 'Страницата изтрита успяшно';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Сигурни ли сте че искате да изтриете избраната страница (и всички подстраници)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Нямате привилегии за модифициране на тази страница';
$MESSAGE['PAGES_INTRO_LINK'] = 'Натиснете тук за да модифицирате Въвеждащата страница';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Не може да се записва в файла /pages/intro.php (недостатъчни привилегии)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Въвеждащата страница запазен успешно';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Последно модифицирана от';
$MESSAGE['PAGES_NOT_FOUND'] = 'Страницата не е намерена';
$MESSAGE['PAGES_NOT_SAVED'] = 'Грешка при запазване на страницата';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Страница с такова име вече съществува';
$MESSAGE['PAGES_REORDERED'] = 'Страницата е преподредена успешно';
$MESSAGE['PAGES_RESTORED'] = 'Страницата възстановен успешно';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Върни се към страници';
$MESSAGE['PAGES_SAVED'] = 'Страницата успешно запазена';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Настройките на страницата запазени успешно';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Настройките на секцията запазени успешно';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Въведената текуща парола не е коректна';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Детайлите запазени успешно';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email-а обновен успешно';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Паролата сменена успешно';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Внимание: Ако натиснете този бутон губите всички незаписани промени';
$MESSAGE['SETTINGS_SAVED'] = 'Настройките са успешно запазени';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Конфигурационния файл не може да бъде отворен';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Не може да се записва в конфигурационния файл';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Внимание: това се препоръчва само в тестово обкръжение';
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
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Трябва да въведете e-mail адрес';
$MESSAGE['START_CURRENT_USER'] = 'Вие влязохте като:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Внимание, Инсталационната директория все още съществува!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Добре дошли в Аминистративната страница на WebsiteBaker';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Внимание: за да смените шаблона отидете в настройки';
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
$MESSAGE['USERS_ADDED'] = 'Потребителя е добавен успешно';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Внимание: Въведете данни в полетата ако искате да смените паролите на тези потребители';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Искате ли да изтриете избрания потребител?';
$MESSAGE['USERS_DELETED'] = 'Потребителя е изтрит успешно';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Въведения email вече се използва';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Невалиден email адрес';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Не беше избрана група';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Въведените пароли не съвпадат';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Въведената парола е твърде къса';
$MESSAGE['USERS_SAVED'] = 'Потребителя е записан успешно';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';
$OVERVIEW['GROUPS'] = 'Управление на потребителските групи и тяхните права...';
$OVERVIEW['HELP'] = 'Имате въпроси? Намерете отговор...';
$OVERVIEW['LANGUAGES'] = 'Управление на езиците на WebsiteBaker...';
$OVERVIEW['MEDIA'] = 'Управление на файловете в папка медия...';
$OVERVIEW['MODULES'] = 'Управление на модулите на WebsiteBaker...';
$OVERVIEW['PAGES'] = 'Управление на страниците...';
$OVERVIEW['PREFERENCES'] = 'Смени предпочитанията относно email адрес, парола и др. ';
$OVERVIEW['SETTINGS'] = 'Смени настройките на WebsiteBaker...';
$OVERVIEW['START'] = 'Преглед на администриране';
$OVERVIEW['TEMPLATES'] = 'Промени изгледа на сайта чрез шаблони...';
$OVERVIEW['USERS'] = 'Управление на потребителите можещи да влязат в WebsiteBaker...';
$OVERVIEW['VIEW'] = 'Виж своя сайт в нов прозорец...';
