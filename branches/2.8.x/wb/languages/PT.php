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
$language_code = 'PT';
$language_name = 'Portuguese (Brazil)';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Daniel Neto';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Acessos';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Add-ons';
$MENU['ADMINTOOLS'] = 'Admin-Tools';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Receber Detalhes do Login';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Grupos';
$MENU['HELP'] = 'Ajuda';
$MENU['LANGUAGES'] = 'Idiomas';
$MENU['LOGIN'] = 'Login';
$MENU['LOGOUT'] = 'Log-out';
$MENU['MEDIA'] = 'Mídia';
$MENU['MODULES'] = 'Módulos';
$MENU['PAGES'] = 'Páginas';
$MENU['PREFERENCES'] = 'Preferências';
$MENU['SETTINGS'] = 'Configura&ccdil;ões';
$MENU['START'] = 'Início';
$MENU['TEMPLATES'] = 'Temas (Templates)';
$MENU['USERS'] = 'Usuários';
$MENU['VIEW'] = 'Visualizar';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Assinatura de Conta';
$TEXT['ACTIONS'] = 'A&ccdil;ões';
$TEXT['ACTIVE'] = 'Ativo';
$TEXT['ADD'] = 'Adicionar';
$TEXT['ADDON'] = 'Add-On';
$TEXT['ADD_SECTION'] = 'Adicionar Sessão';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administra&ccdil;ão';
$TEXT['ADMINISTRATION_TOOL'] = 'Ferramenta de Administra&ccdil;ão';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administrators';
$TEXT['ADVANCED'] = 'Avan&ccdil;ado';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Permitir Multipla Sele&ccdil;ão';
$TEXT['ALL_WORDS'] = 'Todas as Palavras';
$TEXT['ANCHOR'] = 'Anchor';
$TEXT['ANONYMOUS'] = 'Anônimo';
$TEXT['ANY_WORDS'] = 'Qualquer Palavra';
$TEXT['APP_NAME'] = 'Nome da Aplica&ccdil;ão';
$TEXT['ARE_YOU_SURE'] = 'Você tem certeza?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Volta';
$TEXT['BACKUP'] = 'Backup';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup de Todas as Tabelas no Banco de Dados';
$TEXT['BACKUP_DATABASE'] = 'Backup do Banco de Dados';
$TEXT['BACKUP_MEDIA'] = 'Backup Mídia';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup somente tabelas específicas';
$TEXT['BASIC'] = 'Básico';
$TEXT['BLOCK'] = 'Block';
$TEXT['CALENDAR'] = 'Calender';
$TEXT['CANCEL'] = 'Cancelar';
$TEXT['CAN_DELETE_HIMSELF'] = 'Can delete himself';
$TEXT['CAPTCHA_VERIFICATION'] = 'Verifica&ccdil;ão Captcha';
$TEXT['CAP_EDIT_CSS'] = 'Edit CSS';
$TEXT['CHANGE'] = 'Alterar';
$TEXT['CHANGES'] = 'Altera&ccdil;ões';
$TEXT['CHANGE_SETTINGS'] = 'Alterar Configura&ccdil;ões';
$TEXT['CHARSET'] = 'Charset';
$TEXT['CHECKBOX_GROUP'] = 'Checkbox Group';
$TEXT['CLOSE'] = 'Fechar';
$TEXT['CODE'] = 'Código';
$TEXT['CODE_SNIPPET'] = 'Code-snippet';
$TEXT['COLLAPSE'] = 'Collapse';
$TEXT['COMMENT'] = 'Comentário';
$TEXT['COMMENTING'] = 'Comentários';
$TEXT['COMMENTS'] = 'Comentários';
$TEXT['CREATE_FOLDER'] = 'Criar Pasta';
$TEXT['CURRENT'] = 'Atual';
$TEXT['CURRENT_FOLDER'] = 'Pasta Atual';
$TEXT['CURRENT_PAGE'] = 'Página Atual';
$TEXT['CURRENT_PASSWORD'] = 'Senha Atual';
$TEXT['CUSTOM'] = 'Próprio';
$TEXT['DATABASE'] = 'Banco de Dados';
$TEXT['DATE'] = 'Data';
$TEXT['DATE_FORMAT'] = 'Formato de Data';
$TEXT['DEFAULT'] = 'Padrão';
$TEXT['DEFAULT_CHARSET'] = 'Codifica&ccdil;ão Padrão';
$TEXT['DEFAULT_TEXT'] = 'Testo Padrão';
$TEXT['DELETE'] = 'Apagar';
$TEXT['DELETED'] = 'Apagado';
$TEXT['DELETE_DATE'] = 'Delete date';
$TEXT['DELETE_ZIP'] = 'Delete zip archive after unpacking';
$TEXT['DESCRIPTION'] = 'Descri&ccdil;ão';
$TEXT['DESIGNED_FOR'] = 'Designado para';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Diretórios';
$TEXT['DIRECTORY_MODE'] = 'Modo de Diretório';
$TEXT['DISABLED'] = 'Desabilitado';
$TEXT['DISPLAY_NAME'] = 'Nome de Exibi&ccdil;ão';
$TEXT['EMAIL'] = 'Email';
$TEXT['EMAIL_ADDRESS'] = 'Endre&ccdil;or de Email';
$TEXT['EMPTY_TRASH'] = 'Esvaziar Lixeira';
$TEXT['ENABLED'] = 'Habilitado';
$TEXT['END'] = 'Fim';
$TEXT['ERROR'] = 'Erro';
$TEXT['EXACT_MATCH'] = 'Expressão Exata';
$TEXT['EXECUTE'] = 'Executar';
$TEXT['EXPAND'] = 'Expand';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Campo';
$TEXT['FILE'] = 'Arquivo';
$TEXT['FILES'] = 'Arquivos';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Permissões de Sistema de Arquivos';
$TEXT['FILE_MODE'] = 'Modo de Arquivo';
$TEXT['FINISH_PUBLISHING'] = 'Finish Publishing';
$TEXT['FOLDER'] = 'Pasta';
$TEXT['FOLDERS'] = 'Pastas';
$TEXT['FOOTER'] = 'Rodapé';
$TEXT['FORGOTTEN_DETAILS'] = 'Esqueceu suas credenciais?';
$TEXT['FORGOT_DETAILS'] = 'Esqueceu as credenciais?';
$TEXT['FROM'] = 'De';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['FULL_NAME'] = 'Nome Completo';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Grupo';
$TEXT['HEADER'] = 'Cabe&ccdil;alho';
$TEXT['HEADING'] = 'Cabe&ccdil;alho';
$TEXT['HEADING_CSS_FILE'] = 'Actual module file: ';
$TEXT['HEIGHT'] = 'Largura';
$TEXT['HIDDEN'] = 'Oculto';
$TEXT['HIDE'] = 'Ocultar';
$TEXT['HIDE_ADVANCED'] = 'Ocultar Op&ccdil;ões Avan&ccdil;adas';
$TEXT['HOME'] = 'Home';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirecionamento de Página';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Host';
$TEXT['ICON'] = 'Ícone';
$TEXT['IMAGE'] = 'Imagem';
$TEXT['INLINE'] = 'In-line';
$TEXT['INSTALL'] = 'Instalar';
$TEXT['INSTALLATION'] = 'Instala&ccdil;ão';
$TEXT['INSTALLATION_PATH'] = 'Caminho de Instala&ccdil;ão';
$TEXT['INSTALLATION_URL'] = 'URL de Instala&ccdil;ão';
$TEXT['INSTALLED'] = 'installed';
$TEXT['INTRO'] = 'Introdu&ccdil;ão';
$TEXT['INTRO_PAGE'] = 'Página de Introdu&ccdil;ão';
$TEXT['INVALID_SIGNS'] = 'must begin with a letter or has invalid signs';
$TEXT['KEYWORDS'] = 'Keywords';
$TEXT['LANGUAGE'] = 'Idioma';
$TEXT['LAST_UPDATED_BY'] = 'Última atualiza&ccdil;ão por';
$TEXT['LENGTH'] = 'Tamanho';
$TEXT['LEVEL'] = 'Nível';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Link';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix based';
$TEXT['LIST_OPTIONS'] = 'Op&ccdil;ões de Lista';
$TEXT['LOGGED_IN'] = 'Logado';
$TEXT['LOGIN'] = 'Login';
$TEXT['LONG'] = 'Longo';
$TEXT['LONG_TEXT'] = 'Texto Longo';
$TEXT['LOOP'] = 'La&ccdil;o de Repeti&ccdil;ão';
$TEXT['MAIN'] = 'Principal';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Gerenciar';
$TEXT['MANAGE_GROUPS'] = 'Gerenciar Grupos';
$TEXT['MANAGE_USERS'] = 'Gerenciar Usuários';
$TEXT['MATCH'] = 'Possua';
$TEXT['MATCHING'] = 'Matching';
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Submissões por Hora';
$TEXT['MEDIA_DIRECTORY'] = 'Diretório de Mídia';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Título do Menu';
$TEXT['MESSAGE'] = 'Mensagem';
$TEXT['MODIFY'] = 'Modificar';
$TEXT['MODIFY_CONTENT'] = 'Modificar Conteúdo';
$TEXT['MODIFY_SETTINGS'] = 'Modificar Configura&ccdil;ões';
$TEXT['MODULE_ORDER'] = 'Module-order for searching';
$TEXT['MODULE_PERMISSIONS'] = 'Permissões de Módulo';
$TEXT['MORE'] = 'Mais';
$TEXT['MOVE_DOWN'] = 'Mover para Baixo';
$TEXT['MOVE_UP'] = 'Mover para Cima';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Múltiplos Menus';
$TEXT['MULTISELECT'] = 'Multipla-Sele&ccdil;ão';
$TEXT['NAME'] = 'Nome';
$TEXT['NEED_CURRENT_PASSWORD'] = 'confirm with current password';
$TEXT['NEED_TO_LOGIN'] = 'Precisar fazer log-in?';
$TEXT['NEW_PASSWORD'] = 'Nova Senha';
$TEXT['NEW_WINDOW'] = 'New Window';
$TEXT['NEXT'] = 'Próximo';
$TEXT['NEXT_PAGE'] = 'Próxima Página';
$TEXT['NO'] = 'Não';
$TEXT['NONE'] = 'Nenhum';
$TEXT['NONE_FOUND'] = 'Nada Encontrado';
$TEXT['NOT_FOUND'] = 'Não Encotnrado';
$TEXT['NOT_INSTALLED'] = 'not installed';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Sem Resultados';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'de';
$TEXT['ON'] = 'On';
$TEXT['OPEN'] = 'Open';
$TEXT['OPTION'] = 'Op&ccdil;ão';
$TEXT['OTHERS'] = 'Outros';
$TEXT['OUT_OF'] = 'Out Of';
$TEXT['OVERWRITE_EXISTING'] = 'Substituir Existente';
$TEXT['PAGE'] = 'Página';
$TEXT['PAGES_DIRECTORY'] = 'Diretório de Páginas';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Extensão da Página';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Idioma da Página';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limite de Níveis de Página';
$TEXT['PAGE_SPACER'] = 'Espa&ccdil;ador de Página';
$TEXT['PAGE_TITLE'] = 'Título da Página';
$TEXT['PAGE_TRASH'] = 'Page Trash';
$TEXT['PARENT'] = 'Parent';
$TEXT['PASSWORD'] = 'Senha';
$TEXT['PATH'] = 'Caminho';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Error Reporting Level';
$TEXT['PLEASE_LOGIN'] = 'Please login';
$TEXT['PLEASE_SELECT'] = 'Por Favor escolha';
$TEXT['POST'] = 'Post';
$TEXT['POSTS_PER_PAGE'] = 'Posts por Página';
$TEXT['POST_FOOTER'] = 'Rodapé do Post';
$TEXT['POST_HEADER'] = 'Cabe&ccdil;alho do Post';
$TEXT['PREVIOUS'] = 'Anterior';
$TEXT['PREVIOUS_PAGE'] = 'Página Anterior';
$TEXT['PRIVATE'] = 'Privado';
$TEXT['PRIVATE_VIEWERS'] = 'Private Viewers';
$TEXT['PROFILES_EDIT'] = 'Change the profile';
$TEXT['PUBLIC'] = 'Público';
$TEXT['PUBL_END_DATE'] = 'End date';
$TEXT['PUBL_START_DATE'] = 'Start date';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Button Group';
$TEXT['READ'] = 'Ler';
$TEXT['READ_MORE'] = 'Leia Mais';
$TEXT['REDIRECT_AFTER'] = 'Redirect after';
$TEXT['REGISTERED'] = 'Registrado';
$TEXT['REGISTERED_VIEWERS'] = 'Registered Viewers';
$TEXT['RELOAD'] = 'Recarregar';
$TEXT['REMEMBER_ME'] = 'Lembrar-me';
$TEXT['RENAME'] = 'Renomear';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Requerido';
$TEXT['REQUIREMENT'] = 'Requirement';
$TEXT['RESET'] = 'Redefinir';
$TEXT['RESIZE'] = 'Redimentsionar';
$TEXT['RESIZE_IMAGE_TO'] = 'Redimensionar Imagem Para';
$TEXT['RESTORE'] = 'Restaurar';
$TEXT['RESTORE_DATABASE'] = 'Restaurar Banco de Dados';
$TEXT['RESTORE_MEDIA'] = 'Restaurar Mídia';
$TEXT['RESULTS'] = 'Resultados';
$TEXT['RESULTS_FOOTER'] = 'Rodapé dos Resultados';
$TEXT['RESULTS_FOR'] = 'Resultados para';
$TEXT['RESULTS_HEADER'] = 'Cabe&ccdil;alho dos Resultados';
$TEXT['RESULTS_LOOP'] = 'La&ccdil;o de Repeti&ccdil;ão dos Resultados';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Confirme a Nova Senha';
$TEXT['RETYPE_PASSWORD'] = 'Confirme a Senha';
$TEXT['SAME_WINDOW'] = 'Same Window';
$TEXT['SAVE'] = 'Salvar';
$TEXT['SEARCH'] = 'Busca';
$TEXT['SEARCHING'] = 'Buscando';
$TEXT['SECTION'] = 'Sessão';
$TEXT['SECTION_BLOCKS'] = 'Section Blocks';
$TEXT['SEC_ANCHOR'] = 'Section-Anchor text';
$TEXT['SELECT_BOX'] = 'Select Box';
$TEXT['SEND_DETAILS'] = 'Enviar credenciais';
$TEXT['SEPARATE'] = 'Separado';
$TEXT['SEPERATOR'] = 'Separador';
$TEXT['SERVER_EMAIL'] = 'Servidor de Email';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Sistema Operacional do Servidor';
$TEXT['SESSION_IDENTIFIER'] = 'Identificador de Sessão';
$TEXT['SETTINGS'] = 'Configura&ccdil;ões';
$TEXT['SHORT'] = 'Curto';
$TEXT['SHORT_TEXT'] = 'Texto Curto';
$TEXT['SHOW'] = 'Exibir';
$TEXT['SHOW_ADVANCED'] = 'Exibir Op&ccdil;ões Avan&ccdil;adas';
$TEXT['SIGNUP'] = 'Inscrever';
$TEXT['SIZE'] = 'Tamanho';
$TEXT['SMART_LOGIN'] = 'Login Inteligente';
$TEXT['START'] = 'Início';
$TEXT['START_PUBLISHING'] = 'Start Publishing';
$TEXT['SUBJECT'] = 'Assunto';
$TEXT['SUBMISSIONS'] = 'Submissões';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Submissões armazenadas no banco de dados';
$TEXT['SUBMISSION_ID'] = 'Submission ID';
$TEXT['SUBMITTED'] = 'Submetido';
$TEXT['SUCCESS'] = 'Sucesso';
$TEXT['SYSTEM_DEFAULT'] = 'Padrão do Sistema';
$TEXT['SYSTEM_PERMISSIONS'] = 'Permissões de Sistema';
$TEXT['TABLE_PREFIX'] = 'Prefixo da Tabela';
$TEXT['TARGET'] = 'Target';
$TEXT['TARGET_FOLDER'] = 'Pasta Alvo';
$TEXT['TEMPLATE'] = 'Tema (Template)';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Permissões do Tema (Template)';
$TEXT['TEXT'] = 'Texto';
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
$TEXT['TIME'] = 'Hora';
$TEXT['TIMEZONE'] = 'Fuso Horário';
$TEXT['TIME_FORMAT'] = 'Formato de Hora';
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module';
$TEXT['TITLE'] = 'Título';
$TEXT['TO'] = 'Para';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['TRASH_EMPTIED'] = 'Lixiera Vazia';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Edit the CSS definitions in the textarea below.';
$TEXT['TYPE'] = 'Tipo';
$TEXT['UNDER_CONSTRUCTION'] = 'Em Constru&ccdil;ão';
$TEXT['UNINSTALL'] = 'Desinstalar';
$TEXT['UNKNOWN'] = 'Desconhecido';
$TEXT['UNLIMITED'] = 'Ilimitado';
$TEXT['UNZIP_FILE'] = 'Upload and unpack a zip archive';
$TEXT['UP'] = 'Cima';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Enviar Arquivo(s)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Usuário';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Verifica&ccdil;ão';
$TEXT['VERSION'] = 'Versão';
$TEXT['VIEW'] = 'Ver';
$TEXT['VIEW_DELETED_PAGES'] = 'Exibir Páginas Excluídas';
$TEXT['VIEW_DETAILS'] = 'Ver Detalhes';
$TEXT['VISIBILITY'] = 'Visibilidade';
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
$TEXT['WEBSITE_DESCRIPTION'] = 'Descri&ccdil;ão do Website';
$TEXT['WEBSITE_FOOTER'] = 'Rodapé do Website';
$TEXT['WEBSITE_HEADER'] = 'Cabe&ccdil;alho do Website';
$TEXT['WEBSITE_KEYWORDS'] = 'Website Keywords';
$TEXT['WEBSITE_TITLE'] = 'Título do Website';
$TEXT['WELCOME_BACK'] = 'Bem-Vindo';
$TEXT['WIDTH'] = 'Altura';
$TEXT['WINDOW'] = 'Window';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable file permissions';
$TEXT['WRITE'] = 'Escrever';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style';
$TEXT['YES'] = 'Sim';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Add-On requirements not met';
$HEADING['ADD_CHILD_PAGE'] = 'Add child page';
$HEADING['ADD_GROUP'] = 'Adicionar Grupo';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Adicionar Cabe&ccdil;alho';
$HEADING['ADD_PAGE'] = 'Adicionar Página';
$HEADING['ADD_USER'] = 'Adicionar Usuário';
$HEADING['ADMINISTRATION_TOOLS'] = 'Ferramentas de Administra&ccdil;ão';
$HEADING['BROWSE_MEDIA'] = 'Navegar pela Mídia';
$HEADING['CREATE_FOLDER'] = 'Criar Pasta';
$HEADING['DEFAULT_SETTINGS'] = 'Configura&ccdil;ões Padrão';
$HEADING['DELETED_PAGES'] = 'Páginas apagadas';
$HEADING['FILESYSTEM_SETTINGS'] = 'Configura&ccdil;ões de Sistema de Arquivos';
$HEADING['GENERAL_SETTINGS'] = 'Configura&ccdil;ões Gerais';
$HEADING['INSTALL_LANGUAGE'] = 'Instalar Idioma';
$HEADING['INSTALL_MODULE'] = 'Instalar Módulo';
$HEADING['INSTALL_TEMPLATE'] = 'Instalar Tema (Template)';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Detalhes do Idioma';
$HEADING['MANAGE_SECTIONS'] = 'Gerenciar Sessões';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Modificar Configura&ccdil;ões Avan&ccdil;adas da Página';
$HEADING['MODIFY_DELETE_GROUP'] = 'Modificar/Apagar Grupo';
$HEADING['MODIFY_DELETE_PAGE'] = 'Modificar/Apagar Página';
$HEADING['MODIFY_DELETE_USER'] = 'Modificar/Apagar Usuário';
$HEADING['MODIFY_GROUP'] = 'Modificar Grupo';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Modificar Página de Introdu&ccdil;ão';
$HEADING['MODIFY_PAGE'] = 'Modificar Página';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Modificar Configura&ccdil;ões da Página';
$HEADING['MODIFY_USER'] = 'Modificar Usuário';
$HEADING['MODULE_DETAILS'] = 'Detalhes do Módulo';
$HEADING['MY_EMAIL'] = 'Meu Email';
$HEADING['MY_PASSWORD'] = 'Minha Senha';
$HEADING['MY_SETTINGS'] = 'Minhas Configura&ccdil;ões';
$HEADING['SEARCH_SETTINGS'] = 'Configura&ccdil;ões de Busca';
$HEADING['SERVER_SETTINGS'] = 'Configura&ccdil;ões do Servidor';
$HEADING['TEMPLATE_DETAILS'] = 'Detalhes do Tema (Template)';
$HEADING['UNINSTALL_LANGUAGE'] = 'Desinstalar Idioma';
$HEADING['UNINSTALL_MODULE'] = 'Desinstalar Módulo';
$HEADING['UNINSTALL_TEMPLATE'] = 'Desinstalar Tema (Template)';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Enviar Arquivo(s)';
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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Privilégios Insuficientes para estar aqui';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'A senha não pode ser redefinida mais de uma vez por hora, desculpe';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Não foi possível enviar a senha, favor contatar o administrador do sistema';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'O email informado não pode ser encontrado no banco de dados';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Favor inserir seu email abaixo';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Desculpe, você não tem permissão para ver essa página';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Já está instalado';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Não foi possível gravar no diretório de destino';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Não foi possível desinstalar';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Não foi possível desinstalar: O arquivo selecionado está em uso';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />O módulo não <b>{{type_name}}</b> pode ser desinstalado porque está a ser utilizado {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'na seguinte página;nas seguintes páginas';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'O Template não pode ser desinstalado porque é o Template padrão';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Não foi possível descompactar';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Não foi possível enviar o arquivo';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Erro ao abrir o arquivo.';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'O arquivo a ser enviado precisa ser do seguinte formato:';
$MESSAGE['GENERIC_FILE_TYPES'] = 'O arquivo a ser enviado precisa ser de algum dos seguintes formatos:';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Favor retornar e preencher todos os campos';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Instalado com Sucesso';
$MESSAGE['GENERIC_INVALID'] = 'O arquivo enviado é inválido';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Não Instalado';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Aguarde, isso pode levar algum tempo.';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Favor retornar em breve...';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Desinstalado com Sucesso';
$MESSAGE['GENERIC_UPGRADED'] = 'Atualizado com Sucesso';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Website Em Constru&ccdil;ão';
$MESSAGE['GROUPS_ADDED'] = 'Grupo adicionado com sucesso';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Você tem certeza que deseja apagar o grupo selecionado (e usuários pertencentes ao grupo)?';
$MESSAGE['GROUPS_DELETED'] = 'Grupo apagado com sucesso';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'O nome do grupo está em branco';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Nome do Grupo já existe';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Não foram encotrados grupos';
$MESSAGE['GROUPS_SAVED'] = 'Grupo armazenado com sucesso';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Favor Inserir a senha';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'A senha fornecida é longa demais';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'A senha fornecida é curta demais';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Você não inseriou uma extensão de arquivo';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Você não inseriu um nome novo';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Não foi possível apagar a pasta selecionada';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Não foi possível apagar o arquivo selecionado';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Erro ao Renomear';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Tem certeza que deseja apagar o seguinte arquivo ou pasta?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Pasta apagada com sucesso';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Arquivo apagado com sucesso';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Diretório não existe';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Não foi possível incluir ../ no nome da pasta';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Uma pasta com esse nome já existe';
$MESSAGE['MEDIA_DIR_MADE'] = 'Pasta criada com sucesso';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Não foi possível criar a pasta';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Um arquivo com esse nome já existe';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Arquivo não encontrado';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Não foi possivel incluir ../ no nome';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Não é possivel usar index.php como nome';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Nenhuma arquivo de mídia encontrado na pasta atual';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Renomeado com sucesso';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = ' arquivo enviado com sucesso';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Não pode possuir ../ na pasta alvo';
$MESSAGE['MEDIA_UPLOADED'] = ' arquivos enviados com sucesso';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Desculpe, este formulário foi submetido várias vezes nessa hora. Favor tentar novamente dentro de uma hora.';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'O Número de Verifica&ccdil;ão (conhecido como Captcha) que você entrou, é inválido. Se estiver tendo problemas usando o Captcha, envie uma mensagem para: <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Você precisa preencher os seguintes campos';
$MESSAGE['PAGES_ADDED'] = 'Página adicionada com sucesso';
$MESSAGE['PAGES_ADDED_HEADING'] = 'Cabe&ccdil;alho da Página adicionado com sucesso.';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Favor Inserir Título do Menu';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Favor Inserir Título da Página';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Erro ao criar o arquivo no diretório /pages (Privilégios Insuficientes)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Erro ao apagar o arquivo no diretório /pages (Privilégios Insuficientes)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Erro na re-ordena&ccdil;ão da página';
$MESSAGE['PAGES_DELETED'] = 'Página apagada com sucesso';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Tem certeza que deseja apagar a página selecionada(e todas as suas sub-páginas)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Você não tem permissão para Modificar essa página';
$MESSAGE['PAGES_INTRO_LINK'] = 'Clique AQUI para modificar a Página de Introdu&ccdil;ão';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Não foi possível gravar o arquivo /pages/intro.php (Privilégios Insuficientes)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Página de Introdu&ccdil;ão armazenada com sucesso';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Última modifica&ccdil;ão por';
$MESSAGE['PAGES_NOT_FOUND'] = 'Página não encontrada';
$MESSAGE['PAGES_NOT_SAVED'] = 'Erro ao armazenar a página';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Uma página com o mesmo nome ou similar já existe';
$MESSAGE['PAGES_REORDERED'] = 'Re-ordena&ccdil;ão feita com sucesso';
$MESSAGE['PAGES_RESTORED'] = 'Pagina Restaurada com sucesso';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Retornar à Páginas';
$MESSAGE['PAGES_SAVED'] = 'Página armazenada com sucesso';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Configura&ccdil;ões de Página armazenadas com sucesso';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Propriedades da Sessão foram armazenadas com sucesso';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'A senha(atual) informada não está correta';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Detalhes armazenados  com sucesso';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Email atualizado com sucesso';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Invalid password chars used';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Senha alterada com sucesso';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'The change of the record has missed.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'The changed record was updated successfully.';
$MESSAGE['RECORD_NEW_FAILED'] = 'Adding a new record has missed.';
$MESSAGE['RECORD_NEW_SAVED'] = 'New record was added successfully.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Aten&ccdil;ão: Pressionando esse botão, todas as altera&ccdil;ões não salvas, serão perdidas';
$MESSAGE['SETTINGS_SAVED'] = 'Altera&ccdil;ões armazenadas com sucesso';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Não foi possivel abrir o arquivo de configura&ccdil;ão';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Não foi possivel gravar no aquivo de configura&ccdil;ão';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Aten&ccdil;ão: Somente recomendado para ambientes de teste';
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
$MESSAGE['SIGNUP_NO_EMAIL'] = 'Você precisa informar um endere&ccdil;o de email';
$MESSAGE['START_CURRENT_USER'] = 'Você está logado como:';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Aviso, O diretório "INSTALL" ainda existe!';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Bem-Vindo à Administra&ccdil;ão do WebsiteBaker';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Aten&ccdil;ão: para alterar o tema (template) você precisa ir até a sessão Configura&ccdil;ões';
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
$MESSAGE['USERS_ADDED'] = 'Usuário adicionado com sucesso';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Function rejected, You can not delete yourself!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Aten&ccdil;ão: Você deve preencher os campos abaixo se deseja alterar a senha';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Você tem certeza que deseja apagar o usuário selecionado?';
$MESSAGE['USERS_DELETED'] = 'Usuário apagado com sucesso';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'O endere&ccdil;o de email informado já está sendo utilizado';
$MESSAGE['USERS_INVALID_EMAIL'] = 'O email fornecido é inválido';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Nenhum grupo selecionado';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'As senhas fornecidas não conferem';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'A senha fornecida é curta demais';
$MESSAGE['USERS_SAVED'] = 'Usuário armazenado com sucesso';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Access the WebsiteBaker administration tools...';
$OVERVIEW['GROUPS'] = 'Gerencie os grupos de usuários e suas permissões de sistema...';
$OVERVIEW['HELP'] = 'Dúvidas? Encontre respostas...';
$OVERVIEW['LANGUAGES'] = 'Gerencie os idiomas do seu website...';
$OVERVIEW['MEDIA'] = 'Gerencie os arquivos armazenados na pasta Media...';
$OVERVIEW['MODULES'] = 'Gerencie os Módulos do WebsiteBaker...';
$OVERVIEW['PAGES'] = 'Gerencie as Páginas do seu site...';
$OVERVIEW['PREFERENCES'] = 'Altere suas preferências como email, senha, etc... ';
$OVERVIEW['SETTINGS'] = 'Altere as configura&ccdil;ões do WebsiteBaker...';
$OVERVIEW['START'] = 'Visão Geral da Administra&ccdil;ão';
$OVERVIEW['TEMPLATES'] = 'Altere a aparência do seu site com temas(templates)...';
$OVERVIEW['USERS'] = 'Gerencie os usuários que podem logar no WebsiteBaker...';
$OVERVIEW['VIEW'] = 'Visualize e navegue em seu website através de uma nova janela...';
