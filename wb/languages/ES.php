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
$language_code = 'ES';
$language_name = 'Spanish';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Samuel Mateo, Jr. | samuelmateo.com';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Acceso';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Add-ons';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Recuperar los detalles de registro';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Grupos';
$MENU['HELP'] = 'Ayuda';
$MENU['LANGUAGES'] = 'Lenguajes';
$MENU['LOGIN'] = 'Entrar';
$MENU['LOGOUT'] = 'Salir';
$MENU['MEDIA'] = 'Media';
$MENU['MODULES'] = 'Módulos';
$MENU['PAGES'] = 'Páginas';
$MENU['PREFERENCES'] = 'Preferencias';
$MENU['SETTINGS'] = 'Configuración';
$MENU['START'] = 'Inicio';
$MENU['TEMPLATES'] = 'Plantillas';
$MENU['USERS'] = 'Usuarios';
$MENU['VIEW'] = 'Vista Preliminar';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Abrir Cuenta';
$TEXT['ACTIONS'] = 'Acciones';
$TEXT['ACTIVE'] = 'Activo';
$TEXT['ADD'] = 'Agregar';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Agregar Sección';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administración';
$TEXT['ADMINISTRATION_TOOL'] = 'Herramienta de Administración';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administradores';
$TEXT['ADVANCED'] = 'Avanzado';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Espectadores Permitidos';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Selecciones Múltiples';
$TEXT['ALL_WORDS'] = 'Todas las palabras';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Anónimo';
$TEXT['ANY_WORDS'] = 'Alguna de las palabras';
$TEXT['APP_NAME'] = 'Nombre de aplicación';
$TEXT['ARE_YOU_SURE'] = '¿Esta seguro?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Volver';
$TEXT['BACKUP'] = 'Copia de seguridad';
$TEXT['BACKUP_ALL_TABLES'] = 'Reserva todas las Tablas de la Base de Datos';
$TEXT['BACKUP_DATABASE'] = 'Base de datos de seguridad';
$TEXT['BACKUP_MEDIA'] = 'Copia de seguridad de los Medios';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Reserva solamente las tablas de WB';
$TEXT['BASIC'] = 'Basico';
$TEXT['BLOCK'] = 'Block';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['CANCEL'] = 'Cancelar';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Verificación de Captcha (clave)';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['CHANGE'] = 'Cambiar';
$TEXT['CHANGES'] = 'Cambios';
$TEXT['CHANGE_SETTINGS'] = 'Cambiar Configuración';
$TEXT['CHARSET'] = 'Conjunto de Caraceteres';
$TEXT['CHECKBOX_GROUP'] = 'Grupo de Checkbox ';
$TEXT['CLOSE'] = 'Cerrar';
$TEXT['CODE'] = 'Código';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Colapsar';
$TEXT['COMMENT'] = 'Comentario';
$TEXT['COMMENTING'] = 'Comentando';
$TEXT['COMMENTS'] = 'Comentarios';
$TEXT['CREATE_FOLDER'] = 'Crear Carpeta';
$TEXT['CURRENT'] = 'Corriente';
$TEXT['CURRENT_FOLDER'] = 'Carpeta Actual';
$TEXT['CURRENT_PAGE'] = 'Página Actual';
$TEXT['CURRENT_PASSWORD'] = 'Contraseña Actual';
$TEXT['CUSTOM'] = 'Personalizado';
$TEXT['DATABASE'] = 'Base de datos';
$TEXT['DATE'] = 'Fecha';
$TEXT['DATE_FORMAT'] = 'Formato de Fecha';
$TEXT['DEFAULT'] = 'Original';
$TEXT['DEFAULT_CHARSET'] = 'Conjunto de caracteres por defecto';
$TEXT['DEFAULT_TEXT'] = 'Texto Predeterminado';
$TEXT['DELETE'] = 'Eliminar';
$TEXT['DELETED'] = 'Eliminado';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Descripción';
$TEXT['DESIGNED_FOR'] = 'Diseñado para';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Directorios';
$TEXT['DIRECTORY_MODE'] = 'Modo de Directorios';
$TEXT['DISABLED'] = 'Deshabilitado';
$TEXT['DISPLAY_NAME'] = 'Mostrar Nombre';
$TEXT['EMAIL'] = 'Email';
$TEXT['EMAIL_ADDRESS'] = 'Dirección de Email';
$TEXT['EMPTY_TRASH'] = 'Vaciar Papelera';
$TEXT['ENABLED'] = 'Habilitado';
$TEXT['END'] = 'Fin';
$TEXT['ERROR'] = 'Error';
$TEXT['EXACT_MATCH'] = 'Frase exacta';
$TEXT['EXECUTE'] = 'Ejecución';
$TEXT['EXPAND'] = 'Expandir';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Campo';
$TEXT['FILE'] = 'Archivo';
$TEXT['FILES'] = 'Archivos';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Permisos del Sistema de Archivos';
$TEXT['FILE_MODE'] = 'Modo de Archivo';
$TEXT['FINISH_PUBLISHING'] = 'Terminar Publicación';
$TEXT['FOLDER'] = 'Carpeta';
$TEXT['FOLDERS'] = 'Carpetas';
$TEXT['FOOTER'] = 'Pie de página';
$TEXT['FORGOTTEN_DETAILS'] = '¿Lo ha olvidado?';
$TEXT['FORGOT_DETAILS'] = '¿Olvidó los detalles?';
$TEXT['FROM'] = 'De';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['FULL_NAME'] = 'Nombre Completo';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Grupo';
$TEXT['HEADER'] = 'Encabezado';
$TEXT['HEADING'] = 'Encabezado';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Altura';
$TEXT['HIDDEN'] = 'Oculto';
$TEXT['HIDE'] = 'Ocultar';
$TEXT['HIDE_ADVANCED'] = 'Ocultar Opciones Avanzadas';
$TEXT['HOME'] = 'Inicio';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirección a la página de Inicio';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Icono';
$TEXT['IMAGE'] = 'Imagen';
$TEXT['INLINE'] = 'En línea';
$TEXT['INSTALL'] = 'Instalar';
$TEXT['INSTALLATION'] = 'Instalación';
$TEXT['INSTALLATION_PATH'] = 'Ruta de Instalación';
$TEXT['INSTALLATION_URL'] = 'URL de Instalación';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Intro';
$TEXT['INTRO_PAGE'] = 'Página Intro';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Palabras Clave';
$TEXT['LANGUAGE'] = 'Lenguaje';
$TEXT['LAST_UPDATED_BY'] = 'Editado por';
$TEXT['LENGTH'] = 'Largo';
$TEXT['LEVEL'] = 'Nivel';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Enlace';
$TEXT['LINUX_UNIX_BASED'] = 'basado en Linux/Unix ';
$TEXT['LIST_OPTIONS'] = 'Opciones de Lista';
$TEXT['LOGGED_IN'] = 'Conectado';
$TEXT['LOGIN'] = 'Entrar';
$TEXT['LONG'] = 'Largo';
$TEXT['LONG_TEXT'] = 'Texto largo';
$TEXT['LOOP'] = 'Bucle';
$TEXT['MAIN'] = 'Principal';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Administrar';
$TEXT['MANAGE_GROUPS'] = 'Administrar Grupos';
$TEXT['MANAGE_USERS'] = 'Administrar Usuarios';
$TEXT['MATCH'] = 'Coincidencia';
$TEXT['MATCHING'] = 'Coincidencia';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Presentaciones por hora';
$TEXT['MEDIA_DIRECTORY'] = 'Directorio de Media';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Título del Menú';
$TEXT['MESSAGE'] = 'Mensaje';
$TEXT['MODIFY'] = 'Modificar';
$TEXT['MODIFY_CONTENT'] = 'Modificar Contenido';
$TEXT['MODIFY_SETTINGS'] = 'Cambiar Configuración';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Permisos de Modulo';
$TEXT['MORE'] = 'Más';
$TEXT['MOVE_DOWN'] = 'Bajar';
$TEXT['MOVE_UP'] = 'Subir';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Menús Múltiples';
$TEXT['MULTISELECT'] = 'Multi-selección';
$TEXT['NAME'] = 'nombre';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = '¿Necesita Entrar?';
$TEXT['NEW_PASSWORD'] = 'Nueva Contraseña';
$TEXT['NEW_WINDOW'] = 'Nueva Ventana';
$TEXT['NEXT'] = 'Siguiente';
$TEXT['NEXT_PAGE'] = 'Siguiente Página';
$TEXT['NO'] = 'No';
$TEXT['NONE'] = 'Ninguno';
$TEXT['NONE_FOUND'] = 'Ninguna';
$TEXT['NOT_FOUND'] = 'No Encontrado.';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Ningún Resultado';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'De';
$TEXT['ON'] = 'En';
$TEXT['OPEN'] = 'Open';
$TEXT['OPTION'] = 'Opción';
$TEXT['OTHERS'] = 'Otros';
$TEXT['OUT_OF'] = 'Fuera De';
$TEXT['OVERWRITE_EXISTING'] = 'Sobreescribir';
$TEXT['PAGE'] = 'Página';
$TEXT['PAGES_DIRECTORY'] = 'Directorio de Páginas';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Extensión de Página';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Lenguages de Página';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Niveles de Páginas';
$TEXT['PAGE_SPACER'] = 'Separador de Página';
$TEXT['PAGE_TITLE'] = 'Título de la Página';
$TEXT['PAGE_TRASH'] = 'Papelera en Página';
$TEXT['PARENT'] = 'Padre';
$TEXT['PASSWORD'] = 'Contraseña';
$TEXT['PATH'] = 'Ruta de acceso';
$TEXT['PHP_ERROR_LEVEL'] = 'Nivel de Reporte de Errores de PHP';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['PLEASE_SELECT'] = 'Elegir';
$TEXT['POST'] = 'Post';
$TEXT['POSTS_PER_PAGE'] = 'Posts Por Página';
$TEXT['POST_FOOTER'] = 'Post Pie';
$TEXT['POST_HEADER'] = 'Post Encabezado';
$TEXT['PREVIOUS'] = 'Anterior';
$TEXT['PREVIOUS_PAGE'] = 'Página Anterior';
$TEXT['PRIVATE'] = 'Privada';
$TEXT['PRIVATE_VIEWERS'] = 'Usuarios privados';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Pública';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['RADIO_BUTTON_GROUP'] = 'Gupo Botón de Radio';
$TEXT['READ'] = 'Lectura';
$TEXT['READ_MORE'] = 'Más Información';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Registrado';
$TEXT['REGISTERED_VIEWERS'] = 'Visitantes Registrados';
$TEXT['RELOAD'] = 'Recargar';
$TEXT['REMEMBER_ME'] = 'Recuérdame';
$TEXT['RENAME'] = 'Renombrar';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Obligatorio';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Reiniciar';
$TEXT['RESIZE'] = 'Tamaño';
$TEXT['RESIZE_IMAGE_TO'] = 'Redimensionar imagen a';
$TEXT['RESTORE'] = 'Restaurar';
$TEXT['RESTORE_DATABASE'] = 'Restaurar base de datos';
$TEXT['RESTORE_MEDIA'] = 'Restaurar Medios';
$TEXT['RESULTS'] = 'Resultados';
$TEXT['RESULTS_FOOTER'] = 'Pie de Página de Resultados';
$TEXT['RESULTS_FOR'] = 'Resultados para';
$TEXT['RESULTS_HEADER'] = 'Encabezado de Resultados';
$TEXT['RESULTS_LOOP'] = 'Bucle de Resultados';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Repetir Nueva Contraseña';
$TEXT['RETYPE_PASSWORD'] = 'Repetir Contraseña';
$TEXT['SAME_WINDOW'] = 'Misma Ventana';
$TEXT['SAVE'] = 'Guardar';
$TEXT['SEARCH'] = 'Buscar';
$TEXT['SEARCHING'] = 'Buscando';
$TEXT['SECTION'] = 'Sección';
$TEXT['SECTION_BLOCKS'] = 'Bloques de la Sección';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Caja de selección';
$TEXT['SEND_DETAILS'] = 'Enviar Detalles';
$TEXT['SEPARATE'] = 'Separado';
$TEXT['SEPERATOR'] = 'Separador';
$TEXT['SERVER_EMAIL'] = 'Servidor de Email';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Sistema Operativo del Servidor';
$TEXT['SESSION_IDENTIFIER'] = 'Identificador de Sesión';
$TEXT['SETTINGS'] = 'Configuración';
$TEXT['SHORT'] = 'Corto';
$TEXT['SHORT_TEXT'] = 'Texto Corto';
$TEXT['SHOW'] = 'Ver';
$TEXT['SHOW_ADVANCED'] = 'Ver Opciones Avanzadas';
$TEXT['SIGNUP'] = 'Firmar';
$TEXT['SIZE'] = 'Tamaño';
$TEXT['SMART_LOGIN'] = 'Entrada Inteligente';
$TEXT['START'] = 'Inicio';
$TEXT['START_PUBLISHING'] = 'Iniciar Publicación';
$TEXT['SUBJECT'] = 'Asunto';
$TEXT['SUBMISSIONS'] = 'Presentaciones';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Presenciaciones Guardadas en la base de datos';
$TEXT['SUBMISSION_ID'] = 'Presentación ID';
$TEXT['SUBMITTED'] = 'Presentado';
$TEXT['SUCCESS'] = 'Éxito';
$TEXT['SYSTEM_DEFAULT'] = 'Original del Sistema';
$TEXT['SYSTEM_PERMISSIONS'] = 'Permisos de Sistema';
$TEXT['TABLE_PREFIX'] = 'Prefijo de tablas';
$TEXT['TARGET'] = 'Objetivo';
$TEXT['TARGET_FOLDER'] = 'Carpeta';
$TEXT['TEMPLATE'] = 'Plantilla';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Permisos de plantilla';
$TEXT['TEXT'] = 'Texto';
$TEXT['TEXTAREA'] = 'Textarea';
$TEXT['TEXTFIELD'] = 'Campo de texto';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Hora';
$TEXT['TIMEZONE'] = 'Huso Horario';
$TEXT['TIME_FORMAT'] = 'Formato de Hora';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['TITLE'] = 'Título';
$TEXT['TO'] = 'Para';
$TEXT['TOP_FRAME'] = 'Marco Superior';
$TEXT['TRASH_EMPTIED'] = 'Papelera Vacía';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Tipo';
$TEXT['UNDER_CONSTRUCTION'] = 'En Construcción';
$TEXT['UNINSTALL'] = 'Desinstalar';
$TEXT['UNKNOWN'] = 'Desconocido';
$TEXT['UNLIMITED'] = 'Ilimitado';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Arriba';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Subir Archivo(s)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Ususario';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Verificación';
$TEXT['VERSION'] = 'Versión';
$TEXT['VIEW'] = 'Ver';
$TEXT['VIEW_DELETED_PAGES'] = 'Ver Páginas Eliminadas';
$TEXT['VIEW_DETAILS'] = 'Ver Detalles';
$TEXT['VISIBILITY'] = 'Visibilidad';
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
$TEXT['WEBSITE_DESCRIPTION'] = 'Descripción del Web';
$TEXT['WEBSITE_FOOTER'] = 'Pie de página del Web';
$TEXT['WEBSITE_HEADER'] = 'Encabezado del Web';
$TEXT['WEBSITE_KEYWORDS'] = 'Palabras Clave del Web';
$TEXT['WEBSITE_TITLE'] = 'Título del Web';
$TEXT['WELCOME_BACK'] = 'Bienvenido';
$TEXT['WIDTH'] = 'Ancho';
$TEXT['WINDOW'] = 'Ventana';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Permisos de escritura para todos';
$TEXT['WRITE'] = 'Escritura';
$TEXT['WYSIWYG_EDITOR'] = 'Editor WYSIWYG';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG';
$TEXT['YES'] = 'Si';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Agregar Grupo';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Agregar Encabezado';
$HEADING['ADD_PAGE'] = 'Agregar Página';
$HEADING['ADD_USER'] = 'Agregar Usuario';
$HEADING['ADMINISTRATION_TOOLS'] = 'Herramientas de administración';
$HEADING['BROWSE_MEDIA'] = 'Explorar Media';
$HEADING['CREATE_FOLDER'] = 'Crear Carpeta';
$HEADING['DEFAULT_SETTINGS'] = 'Configuración Original';
$HEADING['DELETED_PAGES'] = 'Páginas Eliminadas';
$HEADING['FILESYSTEM_SETTINGS'] = 'Configuración del sistema de Ficheros';
$HEADING['GENERAL_SETTINGS'] = 'Configuración General';
$HEADING['INSTALL_LANGUAGE'] = 'Instalar Lenguaje';
$HEADING['INSTALL_MODULE'] = 'Instalar Módulo';
$HEADING['INSTALL_TEMPLATE'] = 'Instalar Plantilla';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Detalles del Lenguaje';
$HEADING['MANAGE_SECTIONS'] = 'Administrar Secciones';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Modificar Configuración Avanzada de Página';
$HEADING['MODIFY_DELETE_GROUP'] = 'Modificar/Eliminar Grupo';
$HEADING['MODIFY_DELETE_PAGE'] = 'Modificar/Eliminar Página';
$HEADING['MODIFY_DELETE_USER'] = 'Modificar/Eliminar Usuario';
$HEADING['MODIFY_GROUP'] = 'Modificar Grupo';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Modificar Página Intro';
$HEADING['MODIFY_PAGE'] = 'Modificar Página';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Modificar Configuración de Página';
$HEADING['MODIFY_USER'] = 'Modificar Usuario';
$HEADING['MODULE_DETAILS'] = 'Detalles de Módulo';
$HEADING['MY_EMAIL'] = 'Mi Email';
$HEADING['MY_PASSWORD'] = 'Mi Contraseña';
$HEADING['MY_SETTINGS'] = 'Mi Configuración';
$HEADING['SEARCH_SETTINGS'] = 'Configuración del Search';
$HEADING['SERVER_SETTINGS'] = 'Configuración del Servidor';
$HEADING['TEMPLATE_DETAILS'] = 'Detalles de Plantilla';
$HEADING['UNINSTALL_LANGUAGE'] = 'Desinstalar Lenguaje';
$HEADING['UNINSTALL_MODULE'] = 'Desinstalar Módulo';
$HEADING['UNINSTALL_TEMPLATE'] = 'Desinstalar Plantilla';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Subir Archivo(s)';
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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Privilegios insuficientes para estar aquí';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'La contraseña no puede ser cambiada más de una vez por hora';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'No puedo enviarle la contraseña, contacte a su Administrador';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'Email no encontrado en base de datos';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Por favor ingrese su direccion de email';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Perdón, no tiene permiso para ver esta página';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Ya instalado';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'No se pudo escribir en el directorio';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'No se puede desinstalar';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Desinstalación erronea: el archivo seleccionado está en uso';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br />No se puede desinstalar el {{type}} <b>{{type_name}}</b>, dado que se está utilizando {{pages}}:<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'en la página siguiente;en las páginas siguientes';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'No se puede desinstalar el template {{name}} dado que se trata del template estándar.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'No se pudo descomprimir (zip)';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'No se pudos subir archivo';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Error abriendo fichero.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'El archivo a subir debe ser del siguiente formato:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'El archivo a subir debe ser de uno de los siguientes formatos:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Vuelva y complete todos los campos';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Instalación correcta';
$MESSAGE['GENERIC_INVALID'] = 'Archivo inválido';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'No instalado';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Por favor, sea paciente. Esto puede tardar un rato.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Vuelva pronto...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Desinstalación correcta';
$MESSAGE['GENERIC_UPGRADED'] = 'Actualización Completada';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website Under Construction';
$MESSAGE['GROUPS_ADDED'] = 'Nuevo grupo agregado';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = '¿Está seguro que desea eliminar el grupo selecciondo (y los usuarios que lo componen)?';
$MESSAGE['GROUPS_DELETED'] = 'Grupo eliminado';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'El nombre del grupo está vació';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Nombre de grupo ya existe';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'No hay ningñn grupo';
$MESSAGE['GROUPS_SAVED'] = 'Grupo guardado';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'ingrese su Contraseña';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Contraseña muy larga';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Contraseña muy corta';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'No ha ingresado una extensión de archivo';
$MESSAGE['MEDIA_BLANK_NAME'] = 'No ha ingresado un nombre nuevo';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'No se puede eliminar la carpeta seleccionada';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'No se puede eliminar el archivo seleccionado';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'El Nombre no ha sido cambiado';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = '¿Está seguro que desea eliminar la siguiente carpeta o archivo?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Carpeta eliminada';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Archivo eliminado';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'El directorio no existe';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'No puede incluir ../ en el nombre de carpeta';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Esa carpeta ya existe';
$MESSAGE['MEDIA_DIR_MADE'] = 'Carpeta creada';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'No se pudo crear carpeta';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Ese archivo ya existe';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Archivo no encontrado';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'No puede incluir ../ en el nombre';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'No se puede usar index.php como nombre';
$MESSAGE['MEDIA_NONE_FOUND'] = 'No hay medias en esta carpeta';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'El Nombre ha sido cambiado';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' archivo recibido correctamente';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'No puede tener ../ en el nombre de carpeta';
$MESSAGE['MEDIA_UPLOADED'] = ' archivos recibidos correctamente';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Disculpe este formulario ha sido enviado demasiadas veces seguidas. Vuelva a intentarlo en una hora.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'El número de verificación que ha introducido es incorrecto. Si estás teniendo problemas leyéndolo, por favor, envíe un e-mail a: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Debe completar los siguiente campos';
$MESSAGE['PAGES_ADDED'] = 'Página agregada';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Encabezado de Página agregado';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Inagrese un título de menú';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Ingrese un título de página';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Error creando archivo de acceso en el directorio /pages (privilegios insuficientes)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Error eliminando archivo de acceso en el directorio /pages (privilegios insuficientes)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Error reordenando la página';
$MESSAGE['PAGES_DELETED'] = 'Página eliminada';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Está seguro que desea eliminar esta página y todas sus sub-páginas';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Usted no tiene permiso para modificar esta página';
$MESSAGE['PAGES_INTRO_LINK'] = 'Pinche aquí para modificar Intro';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'No se pudo escribir en el archivo /pages/intro.php (privilegios insuficientes)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Intro guardada';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Última modificación hecha por';
$MESSAGE['PAGES_NOT_FOUND'] = 'No se ha encontrado la página';
$MESSAGE['PAGES_NOT_SAVED'] = 'Error guardando la página';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Ya existe una página con un título igual o similar';
$MESSAGE['PAGES_REORDERED'] = 'Orden de página cambiado';
$MESSAGE['PAGES_RESTORED'] = 'Página recuperada';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Volver a las páginas';
$MESSAGE['PAGES_SAVED'] = 'Página guardada correctamente';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Configuración de Página guardada';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Propiedades de la sección guardadas';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'El (actual) es incorrecto';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detalles guardados';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email guardado';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Contraseña cambiada';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Atención: Este botón eliminará los cambios que no hayan sido guardados.';
$MESSAGE['SETTINGS_SAVED'] = 'Configuración guardada';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'No se pudo abrir el archivo de configuración';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'No se pudo escribir en el archivo de configuración';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Atención: Sólo recomendado para entornos de prueba';
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
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Debe ingresar una direccion de email';
$MESSAGE['START_CURRENT_USER'] = 'Estás conectado como:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'El directorio de instalación todavía existe. Es buena idea eliminarlo!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Bienvenido a la consola de Administración';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Atención: para cambiar la plantilla ir a la sección de Configuración';
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
$MESSAGE['USERS_ADDED'] = 'Nuevo usuario agregado';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Atención: Solo debe escribir en estos campos si desea cambiar la contraseña de este usuario.';
$MESSAGE['USERS_CONFIRM_DELETE'] = '¿Esta seguro que desea eliminar el usuario?';
$MESSAGE['USERS_DELETED'] = 'Usuario eliminado';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'Email en uso';
$MESSAGE['USERS_INVALID_EMAIL'] = 'Email inválido';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Ningún grupo fue seleccionado';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Las contraseñas no coinciden';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Contraseña muy corta';
$MESSAGE['USERS_SAVED'] = 'Usuario guardado';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';
$OVERVIEW['GROUPS'] = 'Administrar groups de usuarios y sus permisos...';
$OVERVIEW['HELP'] = 'Respuestas a tus preguntas...';
$OVERVIEW['LANGUAGES'] = 'Administrar lenguajes...';
$OVERVIEW['MEDIA'] = 'Administrar archivos en la carpeta Media...';
$OVERVIEW['MODULES'] = 'Administrar módulos de WebsiteBaker...';
$OVERVIEW['PAGES'] = 'Administrar páginas del web...';
$OVERVIEW['PREFERENCES'] = 'Cambiar preferencias de email, contraseña, etc... ';
$OVERVIEW['SETTINGS'] = 'Configurar WebsiteBaker...';
$OVERVIEW['START'] = 'Administración General';
$OVERVIEW['TEMPLATES'] = 'Administrar plantillas de apariencia...';
$OVERVIEW['USERS'] = 'Administrar acceso de usuarios a WebsiteBaker...';
$OVERVIEW['VIEW'] = 'Ver y explorar tu sitio en una nueva ventana...';
