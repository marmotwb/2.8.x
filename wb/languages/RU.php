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
$language_code = 'RU';
$language_name = 'Russian';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Kirill Karakulko (kirill@nadosoft.com)';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Доступ';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Дополнительные функции';
$MENU['ADMINTOOLS'] = 'Админ-панель';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Забыли пароль?';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Группы';
$MENU['HELP'] = 'Помощь';
$MENU['LANGUAGES'] = 'Языки';
$MENU['LOGIN'] = 'Вход';
$MENU['LOGOUT'] = 'Выход';
$MENU['MEDIA'] = 'Файлы';
$MENU['MODULES'] = 'Модули';
$MENU['PAGES'] = 'Страницы';
$MENU['PREFERENCES'] = 'Свойства';
$MENU['SETTINGS'] = 'Установки';
$MENU['START'] = 'Старт';
$MENU['TEMPLATES'] = 'Шаблоны';
$MENU['USERS'] = 'Пользователи';
$MENU['VIEW'] = 'Просмотреть';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Account Sign-Up';
$TEXT['ACTIONS'] = 'Действия';
$TEXT['ACTIVE'] = 'Активная';
$TEXT['ADD'] = 'Добавить';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Добавить секцию';
$TEXT['ADMIN'] = 'Администратор';
$TEXT['ADMINISTRATION'] = 'Администрирование';
$TEXT['ADMINISTRATION_TOOL'] = 'Средства администрирования';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Администраторы';
$TEXT['ADVANCED'] = 'Расширенные';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Разрешенные пользователи';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Разрешить мульти-выбор';
$TEXT['ALL_WORDS'] = 'Все слова';
$TEXT['ANCHOR'] = 'Якорь';
$TEXT['ANONYMOUS'] = 'Anonymous';
$TEXT['ANY_WORDS'] = 'Любое слово';
$TEXT['APP_NAME'] = 'Имя приложения';
$TEXT['ARE_YOU_SURE'] = 'Вы уверены?';
$TEXT['AUTHOR'] = 'Автор';
$TEXT['BACK'] = 'Назад';
$TEXT['BACKUP'] = 'Резервное копирование';
$TEXT['BACKUP_ALL_TABLES'] = 'Резервное копирование всех таблиц базы';
$TEXT['BACKUP_DATABASE'] = 'Резервное копирование базы данных';
$TEXT['BACKUP_MEDIA'] = 'Резервное копирование Media';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Резервное копирование только таблиц CMS';
$TEXT['BASIC'] = 'Основные';
$TEXT['BLOCK'] = 'Блокировать';
$TEXT['CALENDAR'] = 'Календарь';
$TEXT['CANCEL'] = 'Отменить';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Графическая верификиция';
$TEXT['CAP_EDIT_CSS'] = 'Редактировать CSS';
$TEXT['CHANGE'] = 'Изменить';
$TEXT['CHANGES'] = 'Изменения';
$TEXT['CHANGE_SETTINGS'] = 'Изменение свойств';
$TEXT['CHARSET'] = 'Кодировка';
$TEXT['CHECKBOX_GROUP'] = 'Checkbox группа';
$TEXT['CLOSE'] = 'Закрыть';
$TEXT['CODE'] = 'Код';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Свернуть';
$TEXT['COMMENT'] = 'Комментировать';
$TEXT['COMMENTING'] = 'Комментирую';
$TEXT['COMMENTS'] = 'Комментарии';
$TEXT['CREATE_FOLDER'] = 'Создать папку';
$TEXT['CURRENT'] = 'Текущая';
$TEXT['CURRENT_FOLDER'] = 'Текущая папка';
$TEXT['CURRENT_PAGE'] = 'Текущая страница';
$TEXT['CURRENT_PASSWORD'] = 'Текущий пароль';
$TEXT['CUSTOM'] = 'Задать e-mail';
$TEXT['DATABASE'] = 'База данных';
$TEXT['DATE'] = 'Дата';
$TEXT['DATE_FORMAT'] = 'Формат даты';
$TEXT['DEFAULT'] = 'По умолчанию';
$TEXT['DEFAULT_CHARSET'] = 'Кодировка по умолчанию';
$TEXT['DEFAULT_TEXT'] = 'Текст по умолчанию';
$TEXT['DELETE'] = 'Удалить';
$TEXT['DELETED'] = 'Удаленная';
$TEXT['DELETE_DATE'] = 'Удалить дату';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Описание';
$TEXT['DESIGNED_FOR'] = 'Создано для';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Папки';
$TEXT['DIRECTORY_MODE'] = 'Directory Mode';
$TEXT['DISABLED'] = 'Отсутствует';
$TEXT['DISPLAY_NAME'] = 'Вывести Название';
$TEXT['EMAIL'] = 'Email';
$TEXT['EMAIL_ADDRESS'] = 'Email адрес';
$TEXT['EMPTY_TRASH'] = 'Очистить корзину';
$TEXT['ENABLED'] = 'Присутствует';
$TEXT['END'] = 'Закончить';
$TEXT['ERROR'] = 'Ошибка';
$TEXT['EXACT_MATCH'] = 'Точное совпадение';
$TEXT['EXECUTE'] = 'Запуск';
$TEXT['EXPAND'] = 'Раскрыть';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Поле';
$TEXT['FILE'] = 'Файл';
$TEXT['FILES'] = 'Файлы';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Права на файловой системе';
$TEXT['FILE_MODE'] = 'File Mode';
$TEXT['FINISH_PUBLISHING'] = 'Закончить публикацию';
$TEXT['FOLDER'] = 'Папка';
$TEXT['FOLDERS'] = 'Папки';
$TEXT['FOOTER'] = 'Нижняя часть';
$TEXT['FORGOTTEN_DETAILS'] = 'Забыли ваши данные?';
$TEXT['FORGOT_DETAILS'] = 'Забыли данные?';
$TEXT['FROM'] = 'из';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['FULL_NAME'] = 'Полное имя';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Группа';
$TEXT['HEADER'] = 'Заголовок';
$TEXT['HEADING'] = 'Заголовок';
$TEXT['HEADING_CSS_FILE'] = 'Имя файла: ';
$TEXT['HEIGHT'] = 'Высота';
$TEXT['HIDDEN'] = 'Скрытый(ая)';
$TEXT['HIDE'] = 'Спрятать';
$TEXT['HIDE_ADVANCED'] = 'Спрятять расширенные опции';
$TEXT['HOME'] = 'Главная';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Перенаправление домашней страницы';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Иконка';
$TEXT['IMAGE'] = 'Картинку';
$TEXT['INLINE'] = 'Встроенная';
$TEXT['INSTALL'] = 'Добавить';
$TEXT['INSTALLATION'] = 'Установка';
$TEXT['INSTALLATION_PATH'] = 'Путь установки';
$TEXT['INSTALLATION_URL'] = 'URL установки';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Заставка';
$TEXT['INTRO_PAGE'] = 'Страница-заставка';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Ключевые слова';
$TEXT['LANGUAGE'] = 'Язык';
$TEXT['LAST_UPDATED_BY'] = 'Последнее обновление: ';
$TEXT['LENGTH'] = 'Длина';
$TEXT['LEVEL'] = 'Уровень';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Ссылка';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['LIST_OPTIONS'] = 'Свойства списка';
$TEXT['LOGGED_IN'] = 'Вход осуществлен';
$TEXT['LOGIN'] = 'Вход';
$TEXT['LONG'] = 'Полностью';
$TEXT['LONG_TEXT'] = 'Текст полностью';
$TEXT['LOOP'] = 'основная часть';
$TEXT['MAIN'] = 'Главная';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Управление:';
$TEXT['MANAGE_GROUPS'] = 'Управление группами';
$TEXT['MANAGE_USERS'] = 'Управление пользователями';
$TEXT['MATCH'] = 'Совпадения';
$TEXT['MATCHING'] = 'Совпадения';
$TEXT['MAX_EXCERPT'] = 'Max строк с результатами';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. сообщений в час';
$TEXT['MEDIA_DIRECTORY'] = 'Директория файлов';
$TEXT['MENU'] = 'Меню';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Заголовок меню';
$TEXT['MESSAGE'] = 'Сообщение';
$TEXT['MODIFY'] = 'Изменить';
$TEXT['MODIFY_CONTENT'] = 'Изменить содержание';
$TEXT['MODIFY_SETTINGS'] = 'Изменить настройки';
$TEXT['MODULE_ORDER'] = 'Порядок модулей при поиске';
$TEXT['MODULE_PERMISSIONS'] = 'Права в модуле';
$TEXT['MORE'] = 'Больше';
$TEXT['MOVE_DOWN'] = 'Передвинуть вниз';
$TEXT['MOVE_UP'] = 'Передвинуть вверх';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Мульти-меню';
$TEXT['MULTISELECT'] = 'Мульти-выбор';
$TEXT['NAME'] = 'Имя';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Необходимо войти?';
$TEXT['NEW_PASSWORD'] = 'Новый пароль';
$TEXT['NEW_WINDOW'] = 'Новое окно';
$TEXT['NEXT'] = 'далее';
$TEXT['NEXT_PAGE'] = 'Следующая страница';
$TEXT['NO'] = 'Нет';
$TEXT['NONE'] = 'Нет';
$TEXT['NONE_FOUND'] = 'Ничего Не Найдено';
$TEXT['NOT_FOUND'] = 'Не найдено';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Нет результатов';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'из';
$TEXT['ON'] = 'на';
$TEXT['OPEN'] = 'Открыть';
$TEXT['OPTION'] = 'Свойство';
$TEXT['OTHERS'] = 'Остальные';
$TEXT['OUT_OF'] = 'свыше';
$TEXT['OVERWRITE_EXISTING'] = 'Перезаписать существующий(ую)';
$TEXT['PAGE'] = 'Страница';
$TEXT['PAGES_DIRECTORY'] = 'Директория страниц';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Расширение страницы';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Язык страницы';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Уровень вложенности страниц';
$TEXT['PAGE_SPACER'] = 'Разделитель';
$TEXT['PAGE_TITLE'] = 'Заголовок страницы';
$TEXT['PAGE_TRASH'] = 'Корзина';
$TEXT['PARENT'] = 'Родитель';
$TEXT['PASSWORD'] = 'Пароль';
$TEXT['PATH'] = 'Путь';
$TEXT['PHP_ERROR_LEVEL'] = 'Уровень вывода ошибок PHP';
$TEXT['PLEASE_LOGIN'] = 'Пожалуйста выполните вход';
$TEXT['PLEASE_SELECT'] = 'Выберите';
$TEXT['POST'] = 'Отправить';
$TEXT['POSTS_PER_PAGE'] = 'Сообщений на страницу';
$TEXT['POST_FOOTER'] = 'Нижняя часть сообщения';
$TEXT['POST_HEADER'] = 'Заголовок сообщения';
$TEXT['PREVIOUS'] = 'назад';
$TEXT['PREVIOUS_PAGE'] = 'Предыдущая страница';
$TEXT['PRIVATE'] = 'Закрытая';
$TEXT['PRIVATE_VIEWERS'] = 'Private Viewers';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Для Общего Доступа';
$TEXT['PUBL_END_DATE'] = 'Дата окончания';
$TEXT['PUBL_START_DATE'] = 'Дата старта';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Button группа';
$TEXT['READ'] = 'Чтение';
$TEXT['READ_MORE'] = 'Читать дальше';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Зарегистрированые';
$TEXT['REGISTERED_VIEWERS'] = 'Зарегистрированные пользователи';
$TEXT['RELOAD'] = 'Перегрузить';
$TEXT['REMEMBER_ME'] = 'Запомнить меня';
$TEXT['RENAME'] = 'Переименовать';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Необходимые';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Сбросить';
$TEXT['RESIZE'] = 'Изменить размер';
$TEXT['RESIZE_IMAGE_TO'] = 'Изменять размер картинки на';
$TEXT['RESTORE'] = 'Востановление';
$TEXT['RESTORE_DATABASE'] = 'Востановить базу данных';
$TEXT['RESTORE_MEDIA'] = 'Востановить Media';
$TEXT['RESULTS'] = 'Результаты';
$TEXT['RESULTS_FOOTER'] = 'Нижняя часть результатов';
$TEXT['RESULTS_FOR'] = 'Результаты для';
$TEXT['RESULTS_HEADER'] = 'Заголовок результатов';
$TEXT['RESULTS_LOOP'] = 'Основной блок';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Повторить новый пароль';
$TEXT['RETYPE_PASSWORD'] = 'Повторить пароль';
$TEXT['SAME_WINDOW'] = 'Текущее окно';
$TEXT['SAVE'] = 'Сохранить';
$TEXT['SEARCH'] = 'Поиск';
$TEXT['SEARCHING'] = 'Идет поиск';
$TEXT['SECTION'] = 'Секция';
$TEXT['SECTION_BLOCKS'] = 'Блоки секций';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Select Box';
$TEXT['SEND_DETAILS'] = 'Послать данные';
$TEXT['SEPARATE'] = 'Разделенный';
$TEXT['SEPERATOR'] = 'Разделитель';
$TEXT['SERVER_EMAIL'] = 'Email сервера';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'OS сервера';
$TEXT['SESSION_IDENTIFIER'] = 'Идентификатор сессии';
$TEXT['SETTINGS'] = 'Установки';
$TEXT['SHORT'] = 'В кратце';
$TEXT['SHORT_TEXT'] = 'Краткий текст';
$TEXT['SHOW'] = 'Показать';
$TEXT['SHOW_ADVANCED'] = 'Показать расширенные опции';
$TEXT['SIGNUP'] = 'Регистрация';
$TEXT['SIZE'] = 'Размер';
$TEXT['SMART_LOGIN'] = 'Умный Login';
$TEXT['START'] = 'Старт';
$TEXT['START_PUBLISHING'] = 'Начать публикацию';
$TEXT['SUBJECT'] = 'Тема';
$TEXT['SUBMISSIONS'] = 'Подписки';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Сообщений, сохраняемых в базе';
$TEXT['SUBMISSION_ID'] = 'ID подписки';
$TEXT['SUBMITTED'] = 'Отправлено';
$TEXT['SUCCESS'] = 'Успешно';
$TEXT['SYSTEM_DEFAULT'] = 'По умолчанию';
$TEXT['SYSTEM_PERMISSIONS'] = 'Системные права';
$TEXT['TABLE_PREFIX'] = 'Префикс таблиц';
$TEXT['TARGET'] = 'Открывать в';
$TEXT['TARGET_FOLDER'] = 'Текущая папка';
$TEXT['TEMPLATE'] = 'Шаблон';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Права в шаблонах';
$TEXT['TEXT'] = 'Текст';
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
$TEXT['TIME'] = 'Время';
$TEXT['TIMEZONE'] = 'Временная зона';
$TEXT['TIME_FORMAT'] = 'Формат времени';
$TEXT['TIME_LIMIT'] = 'Max время поиска в модуле';
$TEXT['TITLE'] = 'Заголовок';
$TEXT['TO'] = 'в';
$TEXT['TOP_FRAME'] = 'Главный фрейм';
$TEXT['TRASH_EMPTIED'] = 'Корзина очищена';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Измените CSS файл, если необходимо:';
$TEXT['TYPE'] = 'Тип';
$TEXT['UNDER_CONSTRUCTION'] = 'В стадии разработки';
$TEXT['UNINSTALL'] = 'Удалить';
$TEXT['UNKNOWN'] = 'Неизвестно';
$TEXT['UNLIMITED'] = 'Неограниченно';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Вверх';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Закачать файл(ы)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Владелец';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Изображение на картинке';
$TEXT['VERSION'] = 'Версия';
$TEXT['VIEW'] = 'Просмотреть';
$TEXT['VIEW_DELETED_PAGES'] = 'Посмотреть удаленные страницы';
$TEXT['VIEW_DETAILS'] = 'Просмотреть детали';
$TEXT['VISIBILITY'] = 'Видимость';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Письмо от';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Имя отправителя';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Пожалуйста задайте содержимое поля "Письмо от" и "Имя отправителя". Для поля "Письмо от" рекомендуется использовать адреса вида: <strong>admin@yourdomain.com</strong>. Некоторые почтовые провайдеры (например <em>mail.com</em>) могут игнорировать адреса вида <em>name@mail.com</em>, отправленные с чужого сервера, для борьбы со спамом.<br /><br />Данные настройки будут использоваться только если в CMS не заданы другие параметры. Если Ваш сервер поддерживает <acronym title="Simple mail transfer protocol">SMTP</acronym>, вы можете использовать эти настройки для исходящей почты.';
$TEXT['WBMAILER_FUNCTION'] = 'Почтовая служба';
$TEXT['WBMAILER_NOTICE'] = '<strong>Настройки SMTP:</strong><br />Данные настройки необходимы только если Вы планируете отправлять письма, используя <acronym title="Simple mail transfer protocol">SMTP</acronym>. Если вы не знаете параметры Вашего SMTP сервера или не уверены в выборе, используйте PHP MAIL в качестве почтовой службы.';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP авторизация';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'отметьте, если Ваш SMTP сервер требует авторизацию';
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP сервер';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP пароль';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Loginname';
$TEXT['WEBSITE'] = 'Вебсайт';
$TEXT['WEBSITE_DESCRIPTION'] = 'Описание сайта';
$TEXT['WEBSITE_FOOTER'] = 'Нижняя часть страниц сайта';
$TEXT['WEBSITE_HEADER'] = 'Заголовок сайта';
$TEXT['WEBSITE_KEYWORDS'] = 'Ключевые слова сайта';
$TEXT['WEBSITE_TITLE'] = 'Заголовок страниц сайта';
$TEXT['WELCOME_BACK'] = 'Добро пожаловать';
$TEXT['WIDTH'] = 'Ширина';
$TEXT['WINDOW'] = 'Окно';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Запись разрешена всем';
$TEXT['WRITE'] = 'Запись';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG редактор';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG стиль';
$TEXT['YES'] = 'Да';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Добавить группу';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Добавить заголовок';
$HEADING['ADD_PAGE'] = 'Добавить страницу';
$HEADING['ADD_USER'] = 'Добавить пользователя';
$HEADING['ADMINISTRATION_TOOLS'] = 'Средства администрирования';
$HEADING['BROWSE_MEDIA'] = 'Просмотреть файлы';
$HEADING['CREATE_FOLDER'] = 'Создать папку';
$HEADING['DEFAULT_SETTINGS'] = 'Настройки по умолчанию';
$HEADING['DELETED_PAGES'] = 'Удалить страницы';
$HEADING['FILESYSTEM_SETTINGS'] = 'Настройки файловой системы';
$HEADING['GENERAL_SETTINGS'] = 'Общие установки';
$HEADING['INSTALL_LANGUAGE'] = 'Установить язык';
$HEADING['INSTALL_MODULE'] = 'Установить модуль';
$HEADING['INSTALL_TEMPLATE'] = 'Установить шаблон';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Свойства языка';
$HEADING['MANAGE_SECTIONS'] = 'Управление секциями';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Изменить расширенные настройки страницы';
$HEADING['MODIFY_DELETE_GROUP'] = 'Изменить/Удалить группу';
$HEADING['MODIFY_DELETE_PAGE'] = 'Изменить/Удалить страницу';
$HEADING['MODIFY_DELETE_USER'] = 'Изменить/Удалить пользователя';
$HEADING['MODIFY_GROUP'] = 'Изменить группу';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Изменить главную страницу';
$HEADING['MODIFY_PAGE'] = 'Изменить страницу';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Изменить настройки страницы';
$HEADING['MODIFY_USER'] = 'Изменить установки пользователя';
$HEADING['MODULE_DETAILS'] = 'Свойства модуля';
$HEADING['MY_EMAIL'] = 'Мой адрес e-mail';
$HEADING['MY_PASSWORD'] = 'Мой пароль';
$HEADING['MY_SETTINGS'] = 'Мои установки';
$HEADING['SEARCH_SETTINGS'] = 'Настройки поиска';
$HEADING['SERVER_SETTINGS'] = 'Настройки сревера';
$HEADING['TEMPLATE_DETAILS'] = 'Свойства шаблона';
$HEADING['UNINSTALL_LANGUAGE'] = 'Удалить язык';
$HEADING['UNINSTALL_MODULE'] = 'Удалить модуль';
$HEADING['UNINSTALL_TEMPLATE'] = 'Удалить шаблон';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Закачать файл(ы)';
$HEADING['WBMAILER_SETTINGS'] = 'Настройки почтовой программы';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Недостаточно прав для нахождения в этой секции';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Извините, но вы можете менять пароль не чаще 1 раза в час';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Невозможно выслать пароль, обратитесь к вашему администратору';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Email, который вы ввели, не найден в базе';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Пожалуйста введите ваш email';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Извините, нет активных секций';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Извините, у вас нет прав для просмотра этой страницы';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Уже установлено';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Невозможно записать в выбранную директорию';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Невозможно удалить';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Невозможно удалить: файл используется';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'this page;these pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default template!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Невозможно разархивировать файл';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Невозможно загрузить файл';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Ошибка открытия файла.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Загружаемый файл должен иметь следующий формат:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Загружаемый файл должен иметь тип:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Пожалуйста вернитесь и заполните все поля';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Установка прошла успешна';
$MESSAGE['GENERIC_INVALID'] = 'Загруженный файл поврежден';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Неустановлено';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Пожалуйста подождите, это может занять некоторое время.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Зайдите попозже...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Удалено успешно';
$MESSAGE['GENERIC_UPGRADED'] = 'Обновление прошло успешно';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Вебсайт в разработке';
$MESSAGE['GROUPS_ADDED'] = 'Группа добавлена успешно';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Вы уверены, что вы хотите удалить выбранную группу (и пользователей в ней)?';
$MESSAGE['GROUPS_DELETED'] = 'Группа успешно удалена';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Имя группы пустое';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Группа с таким именем уже существует';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Групп не найдено';
$MESSAGE['GROUPS_SAVED'] = 'Группа сохранена успешно';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Пожалуйста введите пароль';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Указанный пароль слишком длинный';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Указанный пароль слишком короткий';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Вы не ввели расширение файла';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Вы не ввели новое имя';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Невозможно удалить выбраную папку';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Невозможно удалить выбранный файл';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Невозможно переименовать';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Вы уверены, что хотите удалить данный файл или папку?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Папка успешно удалена';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Файл успешно удален';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Директория не существует';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Нельзя использовать ../ в имени папки';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Папка с таким именем уже существует';
$MESSAGE['MEDIA_DIR_MADE'] = 'Папка успешно создана';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Невозможно создать папку';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Файл с таким именем уже существует';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Файл не найден';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Нельзя использовать ../ в имени';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Нельзя использовать index.php в качестве имени';
$MESSAGE['MEDIA_NONE_FOUND'] = 'В данной папке нет файлов';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Успешно переименовано';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' файл успешно закачан';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Нельзя использовать ../ в имени';
$MESSAGE['MEDIA_UPLOADED'] = ' файлы успешно закачаны';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Извините, слишком много сообщений за последний час. Пожалуйста попробуйте повторить отправку через некоторое время.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Код подтверждения введен неверно. Если вы не можете прочесть код, пожалуйста сообщите разработчикам: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'ВНИМАНИЕ! Вы должны заполнить поле';
$MESSAGE['PAGES_ADDED'] = 'Страница успешно добавлена';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Заголовок страницы успешно добавлен';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Введите заголовок меню';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Введите заголовок страницы';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Ошибка создания файла в папке /pages  (недостаточно прав)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Ошибка удаления файла в папке /pages  (недостаточно прав)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Ошибка изменения порядка страниц';
$MESSAGE['PAGES_DELETED'] = 'Страница успешно удалена';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Вы уверены, что хотите удалить выбраную страницу (и все её подразделы)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'У вас нет прав для изменения этой страницы';
$MESSAGE['PAGES_INTRO_LINK'] = 'Нажмите ЗДЕСЬ для изменения страницы-заставки';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Невозможно записать в /pages/intro.php (недостаточно прав)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Страница-заставка успешно сохранена';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Последнее изменение:';
$MESSAGE['PAGES_NOT_FOUND'] = 'Страница не найдена';
$MESSAGE['PAGES_NOT_SAVED'] = 'Ошибка сохранения страницы';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Страница с таким или схожим именем уже существует';
$MESSAGE['PAGES_REORDERED'] = 'Порядок страниц изменен';
$MESSAGE['PAGES_RESTORED'] = 'Страница успешно востановлена';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'К списку страниц';
$MESSAGE['PAGES_SAVED'] = 'Страница успешно сохранена';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Свойства страницы успешно сохранены';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Свойства секции успешно сохранены';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Текущий пароль, который вы ввели, неправильный';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Данные сохранены успешно';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email обновлен успешно';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Пароль изменен успешно';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Имейте ввиду, что при нажатии на эту кнопку произойдет сброс несохраненных данных';
$MESSAGE['SETTINGS_SAVED'] = 'Установки сохранены успешно';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Невозможно открыть конфигурационный файл';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Невозможна запись в конфигурационный файл';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Имейте ввиду, что это рекомендовано только для тестирования';
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
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Вы должны ввести email адрес';
$MESSAGE['START_CURRENT_USER'] = 'Вы вошли как:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Внимание, инсталяционная директория все еще не удалена!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Добро пожаловать в Меню Администрирования Сайта';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Внимание! Чтобы чтобы сменить шаблон перейдите в раздел "Установки"';
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
$MESSAGE['USERS_ADDED'] = 'Пользователь добавлен успешно';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Имейте ввиду, что вам следует ввести значения только в верхних полях если вы хотите изменить пароль';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Вы уверены, что хотите удалить выбранного пользователя?';
$MESSAGE['USERS_DELETED'] = 'Пользователь был успешно удален';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Email, который вы ввели, уже есть в базе';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Вы ввели неправильный email';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Не одной группы не было выбрано';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Пароли, которые вы ввели, не совпадают';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Пароль, который был введен, слишком короток';
$MESSAGE['USERS_SAVED'] = 'Данные о пользователе сохранены успешно';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Доступ к средствам администрирования';
$OVERVIEW['GROUPS'] = 'Управление группами пользователей и права доступа';
$OVERVIEW['HELP'] = 'Ответы на вопросы';
$OVERVIEW['LANGUAGES'] = 'Управление языковыми пакетами';
$OVERVIEW['MEDIA'] = 'Управление файлами';
$OVERVIEW['MODULES'] = 'Управлениями модулями';
$OVERVIEW['PAGES'] = 'Управление страницами сайта';
$OVERVIEW['PREFERENCES'] = 'Изменить настройки, такие как адрес e-mail, пароль...';
$OVERVIEW['SETTINGS'] = 'Управление настройкам';
$OVERVIEW['START'] = 'Администрирование';
$OVERVIEW['TEMPLATES'] = 'Управление шаблонами';
$OVERVIEW['USERS'] = 'Управление пользователями';
$OVERVIEW['VIEW'] = 'Просмотреть изменения на сайте в новом окне';
