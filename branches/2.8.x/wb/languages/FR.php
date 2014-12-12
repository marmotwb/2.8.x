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
$language_code = 'FR';
$language_name = 'Français';
$language_version = '2.8';
$language_platform = '2.8.x';
$language_author = 'Marin Susac';
$language_license = 'GNU General Public License';

/* MENU */
$MENU['ACCESS'] = 'Accès';
$MENU['ADDON'] = 'Add-on';
$MENU['ADDONS'] = 'Extensions';
$MENU['ADMINTOOLS'] = 'Outils d\'administration';
$MENU['BREADCRUMB'] = 'You are here: ';
$MENU['FORGOT'] = 'Retrouver vos identifiants de connexion';
$MENU['GROUP'] = 'Group';
$MENU['GROUPS'] = 'Groupes';
$MENU['HELP'] = 'Aide';
$MENU['LANGUAGES'] = 'Langues';
$MENU['LOGIN'] = 'Connexion';
$MENU['LOGOUT'] = 'Déconnexion';
$MENU['MEDIA'] = 'Media';
$MENU['MODULES'] = 'Modules';
$MENU['PAGES'] = 'Contenu';
$MENU['PREFERENCES'] = 'Préférences';
$MENU['SETTINGS'] = 'Réglages';
$MENU['START'] = 'Accueil';
$MENU['TEMPLATES'] = 'Thèmes';
$MENU['USERS'] = 'Utilisateurs';
$MENU['VIEW'] = 'Voir le site';

/* TEXT */
$TEXT['ACCOUNT_SIGNUP'] = 'Créer un compte';
$TEXT['ACTIONS'] = 'Actions';
$TEXT['ACTIVE'] = 'Actif';
$TEXT['ADD'] = 'Ajouter';
$TEXT['ADDON'] = 'Extension';
$TEXT['ADD_SECTION'] = 'Ajouter une rubrique';
$TEXT['ADMIN'] = 'Admin';
$TEXT['ADMINISTRATION'] = 'Administration';
$TEXT['ADMINISTRATION_TOOL'] = 'Outils d\'administration';
$TEXT['ADMINISTRATOR'] = 'Administrator';
$TEXT['ADMINISTRATORS'] = 'Administrateurs';
$TEXT['ADVANCED'] = 'Avancé';
$TEXT['ALLOWED_FILETYPES_ON_UPLOAD'] = 'Allowed filetypes on upload';
$TEXT['ALLOWED_VIEWERS'] = 'Visiteurs autorisés';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Autoriser la sélection multiple';
$TEXT['ALL_WORDS'] = 'Tous les mots';
$TEXT['ANCHOR'] = 'Ancre';
$TEXT['ANONYMOUS'] = 'Anonyme';
$TEXT['ANY_WORDS'] = 'Chaque mot';
$TEXT['APP_NAME'] = 'Nom de l\'application';
$TEXT['ARE_YOU_SURE'] = 'Etes-vous sûr ?';
$TEXT['AUTHOR'] = 'Auteur';
$TEXT['BACK'] = 'Retour';
$TEXT['BACKUP'] = 'Sauvegarde';
$TEXT['BACKUP_ALL_TABLES'] = 'Sauvegarder toutes les tables de la base de données';
$TEXT['BACKUP_DATABASE'] = 'Sauvegarde de la base de données';
$TEXT['BACKUP_MEDIA'] = 'Sauvegarde des fichiers media';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Sauvegarder uniquement les tables liées à WebsiteBaker';
$TEXT['BASIC'] = 'Classique';
$TEXT['BLOCK'] = 'Bloc';
$TEXT['CALENDAR'] = 'Calendrier';
$TEXT['CANCEL'] = 'Annuler';
$TEXT['CAN_DELETE_HIMSELF'] = 'Ne peut pas se supprimer lui-même';
$TEXT['CAPTCHA_VERIFICATION'] = 'Vérification par captcha ';
$TEXT['CAP_EDIT_CSS'] = 'Editer la feuille CSS';
$TEXT['CHANGE'] = 'Changer';
$TEXT['CHANGES'] = 'Modifications';
$TEXT['CHANGE_SETTINGS'] = 'Modifier les réglages';
$TEXT['CHARSET'] = 'Encodage';
$TEXT['CHECKBOX_GROUP'] = 'Groupe de checkbox';
$TEXT['CLOSE'] = 'Fermer';
$TEXT['CODE'] = 'Code';
$TEXT['CODE_SNIPPET'] = 'Extrait de code';
$TEXT['COLLAPSE'] = 'Contracter';
$TEXT['COMMENT'] = 'Commentaire';
$TEXT['COMMENTING'] = 'Commentaire en cours';
$TEXT['COMMENTS'] = 'Commentaires';
$TEXT['CREATE_FOLDER'] = 'Créer un dossier';
$TEXT['CURRENT'] = 'Courant';
$TEXT['CURRENT_FOLDER'] = 'Dossier courant';
$TEXT['CURRENT_PAGE'] = 'Page courante';
$TEXT['CURRENT_PASSWORD'] = 'Mot de passe actuel';
$TEXT['CUSTOM'] = 'Adapter';
$TEXT['DATABASE'] = 'Base de données';
$TEXT['DATE'] = 'Date';
$TEXT['DATE_FORMAT'] = 'Format de la date';
$TEXT['DEFAULT'] = 'Défaut';
$TEXT['DEFAULT_CHARSET'] = 'Encodage par défaut';
$TEXT['DEFAULT_TEXT'] = 'Texte par défaut';
$TEXT['DELETE'] = 'Supprimer';
$TEXT['DELETED'] = 'Supprimé';
$TEXT['DELETE_DATE'] = 'Date de suppression';
$TEXT['DELETE_ZIP'] = 'Effacer l\'archive zip après décompression';
$TEXT['DESCRIPTION'] = 'Description';
$TEXT['DESIGNED_FOR'] = 'Créé par';
$TEXT['DEV_INFOS'] = 'Developer Informations';
$TEXT['DIRECTORIES'] = 'Répertoires';
$TEXT['DIRECTORY_MODE'] = 'Propriétés des répertoires';
$TEXT['DISABLED'] = 'Désactivé';
$TEXT['DISPLAY_NAME'] = 'Afficher le nom';
$TEXT['EMAIL'] = 'Email';
$TEXT['EMAIL_ADDRESS'] = 'Adresse email';
$TEXT['EMPTY_TRASH'] = 'Vider la corbeille';
$TEXT['ENABLED'] = 'Activé';
$TEXT['END'] = 'Fin';
$TEXT['ERROR'] = 'Erreur';
$TEXT['EXACT_MATCH'] = 'Terme exact';
$TEXT['EXECUTE'] = 'Executer';
$TEXT['EXPAND'] = 'Déployer';
$TEXT['EXTENSION'] = 'Extension';
$TEXT['FIELD'] = 'Champ';
$TEXT['FILE'] = 'Fichier';
$TEXT['FILES'] = 'Fichiers';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Permissions des fichiers système';
$TEXT['FILE_MODE'] = 'Propriétés des fichiers';
$TEXT['FINISH_PUBLISHING'] = 'Fin de publication';
$TEXT['FOLDER'] = 'Dossier';
$TEXT['FOLDERS'] = 'Dossiers';
$TEXT['FOOTER'] = 'Pied de page';
$TEXT['FORGOTTEN_DETAILS'] = 'Identifiants oubliés ?';
$TEXT['FORGOT_DETAILS'] = 'Identifiants oubliés ?';
$TEXT['FROM'] = 'de';
$TEXT['FRONTEND'] = 'Page d\'accueil';
$TEXT['FULL_NAME'] = 'Nom complet';
$TEXT['FUNCTION'] = 'Function';
$TEXT['GROUP'] = 'Groupe';
$TEXT['HEADER'] = 'Entête';
$TEXT['HEADING'] = 'Haut de page';
$TEXT['HEADING_CSS_FILE'] = 'Feuille css actuelle : ';
$TEXT['HEIGHT'] = 'Hauteur';
$TEXT['HIDDEN'] = 'Caché';
$TEXT['HIDE'] = 'Cacher';
$TEXT['HIDE_ADVANCED'] = 'Cacher les options avancées';
$TEXT['HOME'] = 'Accueil';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirection de la page d\'accueil';
$TEXT['HOME_FOLDER'] = 'Personal Folder';
$TEXT['HOME_FOLDERS'] = 'Personal Folders';
$TEXT['HOST'] = 'Hôte';
$TEXT['ICON'] = 'Icône';
$TEXT['IMAGE'] = 'Image';
$TEXT['INLINE'] = 'En ligne';
$TEXT['INSTALL'] = 'Installer';
$TEXT['INSTALLATION'] = 'Installation';
$TEXT['INSTALLATION_PATH'] = 'Chemin d\'installation';
$TEXT['INSTALLATION_URL'] = 'Adresse d\'installation (URL)';
$TEXT['INSTALLED'] = 'installé';
$TEXT['INTRO'] = 'Introduction';
$TEXT['INTRO_PAGE'] = 'Page d\'introduction';
$TEXT['INVALID_SIGNS'] = 'doit débuter par une lettre ou comporte des caractères invalides';
$TEXT['KEYWORDS'] = 'Mots clés';
$TEXT['LANGUAGE'] = 'Langue';
$TEXT['LAST_UPDATED_BY'] = 'Mis à jour par';
$TEXT['LENGTH'] = 'Longueur';
$TEXT['LEVEL'] = 'Niveau';
$TEXT['LICENSE'] = 'License';
$TEXT['LINK'] = 'Lien';
$TEXT['LINUX_UNIX_BASED'] = 'Basé sur linux/unix';
$TEXT['LIST_OPTIONS'] = 'Liste des options';
$TEXT['LOGGED_IN'] = 'Connecté';
$TEXT['LOGIN'] = 'Connexion';
$TEXT['LONG'] = 'Long';
$TEXT['LONG_TEXT'] = 'Texte long';
$TEXT['LOOP'] = 'Boucle';
$TEXT['MAIN'] = 'Principal';
$TEXT['MAINTENANCE_OFF'] = 'Maintenance off';
$TEXT['MAINTENANCE_ON'] = 'Maintenance on';
$TEXT['MANAGE'] = 'Gérer';
$TEXT['MANAGE_GROUPS'] = 'Gestion des groupes';
$TEXT['MANAGE_USERS'] = 'Gestion des utilisateurs';
$TEXT['MATCH'] = 'correspond';
$TEXT['MATCHING'] = 'Correspondance';
$TEXT['MAX_EXCERPT'] = 'Nombre maximum de ligne à retourner';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maximum de soumissions par heure';
$TEXT['MEDIA_DIRECTORY'] = 'Répertoire des fichiers media';
$TEXT['MENU'] = 'Menu';
$TEXT['MENU_ICON_0'] = 'Menu-Icon normal';
$TEXT['MENU_ICON_1'] = 'Menu-Icon hover';
$TEXT['MENU_TITLE'] = 'Titre du menu';
$TEXT['MESSAGE'] = 'Message';
$TEXT['MODIFY'] = 'Modifier';
$TEXT['MODIFY_CONTENT'] = 'Modifier le contenu';
$TEXT['MODIFY_SETTINGS'] = 'Modifier les réglages';
$TEXT['MODULE_ORDER'] = 'Ordre de recherche dans les modules';
$TEXT['MODULE_PERMISSIONS'] = 'Permissions sur les modules';
$TEXT['MORE'] = 'Plus';
$TEXT['MOVE_DOWN'] = 'Au dessous';
$TEXT['MOVE_UP'] = 'Au dessus';
$TEXT['MULTILINGUAL'] = 'MULTILINGUAL';
$TEXT['MULTIPLE_MENUS'] = 'Menus multiples';
$TEXT['MULTISELECT'] = 'Multi-sélection';
$TEXT['NAME'] = 'Nom';
$TEXT['NEED_CURRENT_PASSWORD'] = 'veuillez confirmer votre mot de passe';
$TEXT['NEED_TO_LOGIN'] = 'Identification obligatoire';
$TEXT['NEW_PASSWORD'] = 'Nouveau mot de passe';
$TEXT['NEW_WINDOW'] = 'Nouvelle fenêtre';
$TEXT['NEXT'] = 'Suivant';
$TEXT['NEXT_PAGE'] = 'Page suivante';
$TEXT['NO'] = 'Non';
$TEXT['NONE'] = 'Aucun';
$TEXT['NONE_FOUND'] = 'Aucune occurence trouvée';
$TEXT['NOT_FOUND'] = 'Non trouvé';
$TEXT['NOT_INSTALLED'] = 'non installé';
$TEXT['NO_IMAGE_SELECTED'] = 'no image selected';
$TEXT['NO_RESULTS'] = 'Aucun résultat';
$TEXT['NO_SELECTION'] = 'no selection';
$TEXT['OF'] = 'De';
$TEXT['ON'] = 'Sur';
$TEXT['OPEN'] = 'Ouvert';
$TEXT['OPTION'] = 'Option';
$TEXT['OTHERS'] = 'Autres';
$TEXT['OUT_OF'] = 'Hors de';
$TEXT['OVERWRITE_EXISTING'] = 'Ecraser les données (si déjà existantes)';
$TEXT['PAGE'] = 'Page';
$TEXT['PAGES_DIRECTORY'] = 'Répertoire des pages';
$TEXT['PAGES_PERMISSION'] = 'Pages Permission';
$TEXT['PAGES_PERMISSIONS'] = 'Pages Permissions';
$TEXT['PAGE_EXTENSION'] = 'Extension des pages';
$TEXT['PAGE_ICON'] = 'Page Image';
$TEXT['PAGE_ICON_DIR'] = 'Path pages/menu images';
$TEXT['PAGE_LANGUAGES'] = 'Langues des pages';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limite de niveau de page';
$TEXT['PAGE_SPACER'] = 'Espacement de page';
$TEXT['PAGE_TITLE'] = 'Titre de la page';
$TEXT['PAGE_TRASH'] = 'Corbeille pour les pages supprimées';
$TEXT['PARENT'] = 'Parent';
$TEXT['PASSWORD'] = 'Mot de passe';
$TEXT['PATH'] = 'Chemin';
$TEXT['PHP_ERROR_LEVEL'] = 'Niveau d\'erreur PHP';
$TEXT['PLEASE_LOGIN'] = 'Merci de vous identifier';
$TEXT['PLEASE_SELECT'] = 'Sélectionnez';
$TEXT['POST'] = 'Actualité';
$TEXT['POSTS_PER_PAGE'] = 'Nombre d\'actualité par page';
$TEXT['POST_FOOTER'] = 'Pied de page de l\'actualité';
$TEXT['POST_HEADER'] = 'Entête de l\'actualité';
$TEXT['PREVIOUS'] = 'Précédent';
$TEXT['PREVIOUS_PAGE'] = 'Page précédente';
$TEXT['PRIVATE'] = 'Privée';
$TEXT['PRIVATE_VIEWERS'] = 'Utilisateurs privés';
$TEXT['PROFILES_EDIT'] = 'Modifier le profil';
$TEXT['PUBLIC'] = 'Publique';
$TEXT['PUBL_END_DATE'] = 'Date de fin';
$TEXT['PUBL_START_DATE'] = 'Date de début';
$TEXT['RADIO_BUTTON_GROUP'] = 'Groupe de boutons radio';
$TEXT['READ'] = 'Lire';
$TEXT['READ_MORE'] = 'En savoir plus';
$TEXT['REDIRECT_AFTER'] = 'Redirection après coup';
$TEXT['REGISTERED'] = 'Enregistré';
$TEXT['REGISTERED_VIEWERS'] = 'Utilisateurs enregistrés';
$TEXT['RELOAD'] = 'Actualiser';
$TEXT['REMEMBER_ME'] = 'Se souvenir de moi';
$TEXT['RENAME'] = 'Renommer';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'No upload for this filetypes';
$TEXT['REQUIRED'] = 'Obligatoire';
$TEXT['REQUIREMENT'] = 'Paramètres requis';
$TEXT['RESET'] = 'Réinitialiser';
$TEXT['RESIZE'] = 'Redimensionner';
$TEXT['RESIZE_IMAGE_TO'] = 'Redimensionner l\'image';
$TEXT['RESTORE'] = 'Restaurer';
$TEXT['RESTORE_DATABASE'] = 'Restauration de la base de données';
$TEXT['RESTORE_MEDIA'] = 'Restauration des fichiers media';
$TEXT['RESULTS'] = 'Résultats';
$TEXT['RESULTS_FOOTER'] = 'Pied de page du modèle de recherche';
$TEXT['RESULTS_FOR'] = 'Résultats';
$TEXT['RESULTS_HEADER'] = 'Entête du modèle de recherche';
$TEXT['RESULTS_LOOP'] = 'Modèle d\'affichage de la boucle de recherche';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Saisissez à nouveau votre nouveau mot de passe';
$TEXT['RETYPE_PASSWORD'] = 'Saisissez à nouveau votre mot de passe';
$TEXT['SAME_WINDOW'] = 'Fenêtre actuelle (this frame)';
$TEXT['SAVE'] = 'Sauvegarder';
$TEXT['SEARCH'] = 'Rechercher';
$TEXT['SEARCHING'] = 'Rechercher';
$TEXT['SECTION'] = 'Rubrique';
$TEXT['SECTION_BLOCKS'] = 'Bloc de rubrique';
$TEXT['SEC_ANCHOR'] = 'Section d\'ancre';
$TEXT['SELECT_BOX'] = 'Sélection des boîtes';
$TEXT['SEND_DETAILS'] = 'Valider';
$TEXT['SEPARATE'] = 'Séparer';
$TEXT['SEPERATOR'] = 'Séparateur';
$TEXT['SERVER_EMAIL'] = 'Serveur de mail';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Système d\'exploitation du serveur';
$TEXT['SESSION_IDENTIFIER'] = 'Identifiant de session';
$TEXT['SETTINGS'] = 'Réglages';
$TEXT['SHORT'] = 'Court';
$TEXT['SHORT_TEXT'] = 'Texte court';
$TEXT['SHOW'] = 'Montrer';
$TEXT['SHOW_ADVANCED'] = 'Afficher les options avancées';
$TEXT['SIGNUP'] = 'Créer un compte';
$TEXT['SIZE'] = 'Taille';
$TEXT['SMART_LOGIN'] = 'Identification rapide';
$TEXT['START'] = 'Début';
$TEXT['START_PUBLISHING'] = 'Début de publication';
$TEXT['SUBJECT'] = 'Sujet';
$TEXT['SUBMISSIONS'] = 'Soumissions';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Enregistrement des soumissions dans la base de données';
$TEXT['SUBMISSION_ID'] = 'Identifiant';
$TEXT['SUBMITTED'] = 'Envoyé';
$TEXT['SUCCESS'] = 'Opération réussie';
$TEXT['SYSTEM_DEFAULT'] = 'Système par défaut';
$TEXT['SYSTEM_PERMISSIONS'] = 'Permissions système';
$TEXT['TABLE_PREFIX'] = 'Préfixe du nom des tables';
$TEXT['TARGET'] = 'Cible';
$TEXT['TARGET_FOLDER'] = 'Dossier de destination';
$TEXT['TEMPLATE'] = 'Thème';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Permissions sur les thèmes';
$TEXT['TEXT'] = 'Texte';
$TEXT['TEXTAREA'] = 'Zone de texte';
$TEXT['TEXTFIELD'] = 'Champ de texte';
$TEXT['THEME'] = 'Thème graphique de l\'interface d\'administration';
$TEXT['THEME_COPY_CURRENT'] = 'Copy backend theme.';
$TEXT['THEME_CURRENT'] = 'current active theme';
$TEXT['THEME_IMPORT_HTT'] = 'Import additional templates';
$TEXT['THEME_NEW_NAME'] = 'Name of the new Theme';
$TEXT['THEME_NOMORE_HTT'] = 'no more available';
$TEXT['THEME_SELECT_HTT'] = 'select templates';
$TEXT['THEME_START_COPY'] = 'copy';
$TEXT['THEME_START_IMPORT'] = 'import';
$TEXT['TIME'] = 'Heure';
$TEXT['TIMEZONE'] = 'Fuseau horaire';
$TEXT['TIME_FORMAT'] = 'Format de l\'heure';
$TEXT['TIME_LIMIT'] = 'Délai maximal de recherche par module';
$TEXT['TITLE'] = 'Titre';
$TEXT['TO'] = 'vers';
$TEXT['TOP_FRAME'] = 'Fenêtre actuelle complète (top frame)';
$TEXT['TRASH_EMPTIED'] = 'Corbeille vidée';
$TEXT['TXT_EDIT_CSS_FILE'] = 'Editer les styles CSS dans la zone de texte ci-dessous.';
$TEXT['TYPE'] = 'Type';
$TEXT['UNDER_CONSTRUCTION'] = 'En construction';
$TEXT['UNINSTALL'] = 'Désinstaller';
$TEXT['UNKNOWN'] = 'Inconnu';
$TEXT['UNLIMITED'] = 'Illimité';
$TEXT['UNZIP_FILE'] = 'Uploader et décompresser l\'archive zip';
$TEXT['UP'] = 'Haut';
$TEXT['UPGRADE'] = 'Upgrade';
$TEXT['UPLOAD_FILES'] = 'Uploader un/des fichier(s)';
$TEXT['URL'] = 'URL';
$TEXT['USER'] = 'Utilisateur';
$TEXT['USERNAME'] = 'Loginname';
$TEXT['USERS_ACTIVE'] = 'User is set active';
$TEXT['USERS_CAN_SELFDELETE'] = 'User can delete himself';
$TEXT['USERS_CHANGE_SETTINGS'] = 'User can change his own settings';
$TEXT['USERS_DELETED'] = 'User is marked as deleted';
$TEXT['USERS_FLAGS'] = 'User-Flags';
$TEXT['USERS_PROFILE_ALLOWED'] = 'User can create extended profile';
$TEXT['VERIFICATION'] = 'Vérification';
$TEXT['VERSION'] = 'Version';
$TEXT['VIEW'] = 'Aperçu';
$TEXT['VIEW_DELETED_PAGES'] = 'Voir les pages supprimées';
$TEXT['VIEW_DETAILS'] = 'Propriétés';
$TEXT['VISIBILITY'] = 'Visibilité';
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Adresse d\'expéditeur par défaut';
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Nom d\'expéditeur par défaut';
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Merci d\'indiquer un nom et une adresse d\'expéditeur par défaut. Il est recommandé d\'utiliser une adresse d\'expéditeur de la forme : <strong>admin@yourdomain.com</strong>. Certains opérateurs de mail (comme <em>mail.com</em>) peuvent rejeter les mails dont l\'adresse d\'expéditeur est de la forme <em>name@mail.com</em> envoyés via un relai, c\'est leur manière de lutter contre le spam.<br /><br />Les valeurs par défaut sont uniquement utilisées si aucune autre valeur n\'est spécifiée par WebsiteBaker. Si votre serveur supporte <acronym title="Simple mail transfer protocol">SMTP</acronym>, vous pouvez utiliser cette option pour l\'envoi d\'emails.';
$TEXT['WBMAILER_FUNCTION'] = 'Mécanisme d\'envoi de mail';
$TEXT['WBMAILER_NOTICE'] = '<strong>Paramètres du serveur SMTP :</strong><br />Les paramètres ci-dessous sont uniquement requis si vous souhaitez envoyer des mails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. Si vous ne connaissez pas votre serveur SMTP ou si vous n\'êtes pas sûr de la valeur des paramètres requis, conservez simplement le mécanisme par défaut : PHP MAIL.';
$TEXT['WBMAILER_PHP'] = 'PHP MAIL';
$TEXT['WBMAILER_SMTP'] = 'SMTP';
$TEXT['WBMAILER_SMTP_AUTH'] = 'Authentification SMTP';
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'n\'utilisez l\'authentification que si votre seveur SMTP ne l\'exige';
$TEXT['WBMAILER_SMTP_HOST'] = 'Hôte SMTP';
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'mot de passe SMTP';
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Loginname';
$TEXT['WEBSITE'] = 'Site internet';
$TEXT['WEBSITE_DESCRIPTION'] = 'Description du site';
$TEXT['WEBSITE_FOOTER'] = 'Pied de page du site';
$TEXT['WEBSITE_HEADER'] = 'Entête du site';
$TEXT['WEBSITE_KEYWORDS'] = 'Mots clés du site';
$TEXT['WEBSITE_TITLE'] = 'Titre du site';
$TEXT['WELCOME_BACK'] = 'Bienvenue';
$TEXT['WIDTH'] = 'Largeur';
$TEXT['WINDOW'] = 'Fenêtre';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Permissions d\'écriture sur fichier';
$TEXT['WRITE'] = 'Ecrire';
$TEXT['WYSIWYG_EDITOR'] = 'Editeur WYSIWYG';
$TEXT['WYSIWYG_STYLE'] = 'Style WYSIWYG';
$TEXT['YES'] = 'Oui';

/* HEADING */
$HEADING['ADDON_PRECHECK_FAILED'] = 'Les paramètres requis de l\'extension ne sont pas vérifiés';
$HEADING['ADD_CHILD_PAGE'] = 'Ajouter une sous-page';
$HEADING['ADD_GROUP'] = 'Ajouter un groupe';
$HEADING['ADD_GROUPS'] = 'Add Groups';
$HEADING['ADD_HEADING'] = 'Ajouter un entête';
$HEADING['ADD_PAGE'] = 'Ajouter une page';
$HEADING['ADD_USER'] = 'Ajouter un utilisateur';
$HEADING['ADMINISTRATION_TOOLS'] = 'Outils d\'administration';
$HEADING['BROWSE_MEDIA'] = 'Parcourir le dossier media';
$HEADING['CREATE_FOLDER'] = 'Créer un dossier';
$HEADING['DEFAULT_SETTINGS'] = 'Réglages par défaut';
$HEADING['DELETED_PAGES'] = 'Pages effacées';
$HEADING['FILESYSTEM_SETTINGS'] = 'Réglages des fichiers systèmes';
$HEADING['GENERAL_SETTINGS'] = 'Réglages';
$HEADING['INSTALL_LANGUAGE'] = 'Installer une langue';
$HEADING['INSTALL_MODULE'] = 'Installer un module';
$HEADING['INSTALL_TEMPLATE'] = 'Installer un thème';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Exécuter manuellement les fichiers module';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Propriétés de la langue';
$HEADING['MANAGE_SECTIONS'] = 'Gestion des rubriques';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Modifier les propriétés avancées de la page';
$HEADING['MODIFY_DELETE_GROUP'] = 'Modifier/Supprimer un groupe';
$HEADING['MODIFY_DELETE_PAGE'] = 'Modifier/Supprimer une page';
$HEADING['MODIFY_DELETE_USER'] = 'Modifier/Supprimer un utilisateur';
$HEADING['MODIFY_GROUP'] = 'Modifier un groupe';
$HEADING['MODIFY_GROUPS'] = 'Modify Groups';
$HEADING['MODIFY_INTRO_PAGE'] = 'Modifier la page d\'accueil';
$HEADING['MODIFY_PAGE'] = 'Modifier une page';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Modifier les propriétés de la page';
$HEADING['MODIFY_USER'] = 'Modifier un utilisateur';
$HEADING['MODULE_DETAILS'] = 'Propriétés du module';
$HEADING['MY_EMAIL'] = 'Mon email';
$HEADING['MY_PASSWORD'] = 'Mon mot de passe';
$HEADING['MY_SETTINGS'] = 'Mes préférences';
$HEADING['SEARCH_SETTINGS'] = 'Réglages de la recherche';
$HEADING['SERVER_SETTINGS'] = 'Réglages du serveur';
$HEADING['TEMPLATE_DETAILS'] = 'Propriétés du thème';
$HEADING['UNINSTALL_LANGUAGE'] = 'Désinstaller une langue';
$HEADING['UNINSTALL_MODULE'] = 'Désinstaller un module';
$HEADING['UNINSTALL_TEMPLATE'] = 'Désinstaller un thème';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Uploader des fichiers';
$HEADING['WBMAILER_SETTINGS'] = 'Réglages de l\'envoi de mail';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Droits insuffisants pour être ici';
$MESSAGE['FORGOT_PASS_ALREADY_RESET'] = 'Désolé, vous ne pouvez pas modifier votre mot de passe plus d\'une fois par heure';
$MESSAGE['FORGOT_PASS_CANNOT_EMAIL'] = 'Impossible de vous renvoyer vos identifiants, merci de contacter l\'administrateur du site';
$MESSAGE['FORGOT_PASS_EMAIL_NOT_FOUND'] = 'L\'adresse email que vous avez saisi est introuvable dans la base de données';
$MESSAGE['FORGOT_PASS_NO_DATA'] = 'Merci de saisir votre adresse email';
$MESSAGE['FORGOT_PASS_PASSWORD_RESET'] = 'Your loginname and password have been sent to your email address';
$MESSAGE['FRONTEND_SORRY_NO_ACTIVE_SECTIONS'] = 'Désolé, aucun contenu actif à afficher';
$MESSAGE['FRONTEND_SORRY_NO_VIEWING_PERMISSIONS'] = 'Désolé, vous n\'avez pas les droits pour visualiser cette page';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Déjà installé';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Impossible d\'écrire dans le répertoire cible';
$MESSAGE['GENERIC_BE_PATIENT'] = 'Please be patient.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Impossible de désinstaller';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Désinstallation impossible : fichier en cours d\'utilisation';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> ne peut pas être désinstallé car il est actuellement en cours d\'utilisation dans les pages {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'cette page;ces pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Impossible de désinstaller le modèle <b>{{name}}</b> parce que c\'est le modèle par défaut !';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Impossible de dézipper le fichier';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Impossible d\'uploader le fichier';
$MESSAGE['GENERIC_COMPARE'] = ' successfully';
$MESSAGE['GENERIC_ERROR_OPENING_FILE'] = 'Erreur lors de l\'ouverture du fichier';
$MESSAGE['GENERIC_FAILED_COMPARE'] = ' failed';
$MESSAGE['GENERIC_FILE_TYPE'] = 'Les fichiers chargés doivent avoir les extensions suivantes : ';
$MESSAGE['GENERIC_FILE_TYPES'] = 'Les fichiers chargés doivent être aux formats suivants : ';
$MESSAGE['GENERIC_FILL_IN_ALL'] = 'Merci de remplir tous les champs';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Installation réussie';
$MESSAGE['GENERIC_INVALID'] = 'Le fichier chargé est invalide';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Fichier d\'extension incorrect. Vérifiez le fichier zip .';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Fichier de langue incorrect. Vérifiez le fichier de langue.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_COMPARE'] = ' not possibly';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Non install&eacte;';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_PLEASE_BE_PATIENT'] = 'Merci de patienter';
$MESSAGE['GENERIC_PLEASE_CHECK_BACK_SOON'] = 'Merci de revenir plus tard';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Violation de sécurité!! l\'enregistrement des données a été refusé!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Désinstallation réussie';
$MESSAGE['GENERIC_UPGRADED'] = 'Mise à jour réussie';
$MESSAGE['GENERIC_VERSION_COMPARE'] = 'Version comparison';
$MESSAGE['GENERIC_VERSION_GT'] = 'Upgrade necessary!';
$MESSAGE['GENERIC_VERSION_LT'] = 'Downgrade';
$MESSAGE['GENERIC_WEBSITE_LOCKED'] = 'this site is temporarily down for maintenance';
$MESSAGE['GENERIC_WEBSITE_UNDER_CONSTRUCTION'] = 'Site en construction';
$MESSAGE['GROUPS_ADDED'] = 'Groupe ajouté avec succès';
$MESSAGE['GROUPS_CONFIRM_DELETE'] = 'Etes-vous sûr de vouloir supprimer ce groupe (ainsi que tous les utilisateurs de ce groupe) ?';
$MESSAGE['GROUPS_DELETED'] = 'Groupe supprimé avec succès';
$MESSAGE['GROUPS_GROUP_NAME_BLANK'] = 'Le nom du groupe est vide';
$MESSAGE['GROUPS_GROUP_NAME_EXISTS'] = 'Le nom du groupe est déja existant';
$MESSAGE['GROUPS_NO_GROUPS_FOUND'] = 'Groupe introuvable';
$MESSAGE['GROUPS_SAVED'] = 'Groupe sauvegardé avec succès';
$MESSAGE['LOGIN_AUTHENTICATION_FAILED'] = 'Loginname or password incorrect';
$MESSAGE['LOGIN_BOTH_BLANK'] = 'Please enter your loginname and password below';
$MESSAGE['LOGIN_PASSWORD_BLANK'] = 'Merci de saisir votre mot de passe';
$MESSAGE['LOGIN_PASSWORD_TOO_LONG'] = 'Votre mot de passe est trop long';
$MESSAGE['LOGIN_PASSWORD_TOO_SHORT'] = 'Votre mot de passe est trop court';
$MESSAGE['LOGIN_USERNAME_BLANK'] = 'Please enter a loginname';
$MESSAGE['LOGIN_USERNAME_TOO_LONG'] = 'Supplied loginname to long';
$MESSAGE['LOGIN_USERNAME_TOO_SHORT'] = 'Supplied loginname to short';
$MESSAGE['MEDIA_BLANK_EXTENSION'] = 'Vous n\'avez pas entré d\'extension';
$MESSAGE['MEDIA_BLANK_NAME'] = 'Vous n\'avezpas entré de nouveau nom';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Impossible de supprimer le dossier sélctionné';
$MESSAGE['MEDIA_CANNOT_DELETE_FILE'] = 'Impossible de supprimer le fichier sélectionné';
$MESSAGE['MEDIA_CANNOT_RENAME'] = 'Impossible de renommer';
$MESSAGE['MEDIA_CONFIRM_DELETE'] = 'Etes-vous sûr de vouloir supprimer ce fichier/dossier ?';
$MESSAGE['MEDIA_DELETED_DIR'] = 'Dossier supprimé avec succès';
$MESSAGE['MEDIA_DELETED_FILE'] = 'Fichier supprimé avec succès';
$MESSAGE['MEDIA_DIR_ACCESS_DENIED'] = 'Specified directory does not exist or is not allowed.';
$MESSAGE['MEDIA_DIR_DOES_NOT_EXIST'] = 'Le répertoire n\'existe pas';
$MESSAGE['MEDIA_DIR_DOT_DOT_SLASH'] = 'Impossible d\'inclure ../ dans le nom du dossier';
$MESSAGE['MEDIA_DIR_EXISTS'] = 'Un dossier portant ce nom est déjà existant';
$MESSAGE['MEDIA_DIR_MADE'] = 'Dossier créé avec succès';
$MESSAGE['MEDIA_DIR_NOT_MADE'] = 'Impossible de créer le dossier';
$MESSAGE['MEDIA_FILE_EXISTS'] = 'Un fichier portant ce nom est déjà existant';
$MESSAGE['MEDIA_FILE_NOT_FOUND'] = 'Fichier introuvable';
$MESSAGE['MEDIA_NAME_DOT_DOT_SLASH'] = 'Impossible d\'inclure ../ dans le nom';
$MESSAGE['MEDIA_NAME_INDEX_PHP'] = 'Vous ne pouvez pas utiliser index.php comme nom';
$MESSAGE['MEDIA_NONE_FOUND'] = 'Aucun media trouvé dans ce dossier';
$MESSAGE['MEDIA_NO_FILE_UPLOADED'] = 'No file was recieved';
$MESSAGE['MEDIA_RENAMED'] = 'Renommage réussi avec succès';
$MESSAGE['MEDIA_SINGLE_UPLOADED'] = 'Le fichier a été uploadé avec succès';
$MESSAGE['MEDIA_TARGET_DOT_DOT_SLASH'] = 'Impossible d\'avoir ../ dans le nom du dossier cible';
$MESSAGE['MEDIA_UPLOADED'] = 'Les fichiers ont été uploadés avec succès';
$MESSAGE['MOD_FORM_EXCESS_SUBMISSIONS'] = 'Désolé mais ce formulaire est utilisé trop fréquemment en ce moment. Afin de nous aider à lutter contre le spam, merci de réessayer plus tard';
$MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'] = 'Le numéro de vérification (Captcha) que vous avez entré est incorrect. Si vous rencontrez des problèmes quant à la lecture de ce numéro, merci d\'envoyer un email à : <a href="mailto:{{SERVER_EMAIL}}">{{SERVER_EMAIL}}</a>';
$MESSAGE['MOD_FORM_REQUIRED_FIELDS'] = 'Vous devez renseigner les champs suivants';
$MESSAGE['PAGES_ADDED'] = 'Page ajoutée avec succès';
$MESSAGE['PAGES_ADDED_HEADING'] = 'L\'entête de la page a été ajouté avec succès';
$MESSAGE['PAGES_BLANK_MENU_TITLE'] = 'Entrez un titre de menu';
$MESSAGE['PAGES_BLANK_PAGE_TITLE'] = 'Entrez un titre de page';
$MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'] = 'Erreur lors de la création d\'un fichier dans le répertoire des pages (privilèges insuffisants)';
$MESSAGE['PAGES_CANNOT_DELETE_ACCESS_FILE'] = 'Erreur lors de la suppression d\'un fichier dans le répertoire des pages (privilèges insuffisants)';
$MESSAGE['PAGES_CANNOT_REORDER'] = 'Erreur lors du réagencement des pages';
$MESSAGE['PAGES_DELETED'] = 'Page supprimée avec succès';
$MESSAGE['PAGES_DELETE_CONFIRM'] = 'Etes-vous sûr de vouloir supprimer la page sélectionnée (ainsi que ses sous-rubriques)';
$MESSAGE['PAGES_INSUFFICIENT_PERMISSIONS'] = 'Vous n\'avez pas les droits pour modifier cette pages';
$MESSAGE['PAGES_INTRO_LINK'] = 'Cliquez ici pour modifier la page d\'introduction';
$MESSAGE['PAGES_INTRO_NOT_WRITABLE'] = 'Impossible d\'écrire dans la page d\'introduction (privilèges insuffisants)';
$MESSAGE['PAGES_INTRO_SAVED'] = 'Page d\'introduction sauvegardée avec succès';
$MESSAGE['PAGES_LAST_MODIFIED'] = 'Mis à jour par';
$MESSAGE['PAGES_NOT_FOUND'] = 'Page introuvable';
$MESSAGE['PAGES_NOT_SAVED'] = 'Erreur lors de la sauvegarde de la page';
$MESSAGE['PAGES_PAGE_EXISTS'] = 'Une page avec le même nom existe déjà';
$MESSAGE['PAGES_REORDERED'] = 'Page réordonnée avec succès';
$MESSAGE['PAGES_RESTORED'] = 'Page restaurée avec succès';
$MESSAGE['PAGES_RETURN_TO_PAGES'] = 'Retour au contenu';
$MESSAGE['PAGES_SAVED'] = 'Page sauvegardée avec succès';
$MESSAGE['PAGES_SAVED_SETTINGS'] = 'Paramètres de la page sauvegardés avec succès';
$MESSAGE['PAGES_SECTIONS_PROPERTIES_SAVED'] = 'Les propriétés de la rubrique ont été sauvegardées avec succès';
$MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'] = 'Le mot de passe entré est incorrect';
$MESSAGE['PREFERENCES_DETAILS_SAVED'] = 'Données sauvegardées avec succès';
$MESSAGE['PREFERENCES_EMAIL_UPDATED'] = 'Adresse email sauvegardée avec succès';
$MESSAGE['PREFERENCES_INVALID_CHARS'] = 'Caractères invalides utilisés dans le mot de passe';
$MESSAGE['PREFERENCES_PASSWORD_CHANGED'] = 'Mot de passe modifié avec succès';
$MESSAGE['RECORD_MODIFIED_FAILED'] = 'La mise à jour de l\'enregistrement a échoué.';
$MESSAGE['RECORD_MODIFIED_SAVED'] = 'L\'enregistrement a été mis à jour avec succès.';
$MESSAGE['RECORD_NEW_FAILED'] = 'L\'ajout d\'un nouvel enregistrement a échoué.';
$MESSAGE['RECORD_NEW_SAVED'] = 'Nouvel enregistrement ajouté avec succès.';
$MESSAGE['SETTINGS_MODE_SWITCH_WARNING'] = 'Attention : en cliquant sur ce bouton, vous ne sauvegardez pas vos modifications';
$MESSAGE['SETTINGS_SAVED'] = 'Réglages sauvegardés avec succès';
$MESSAGE['SETTINGS_UNABLE_OPEN_CONFIG'] = 'Impossible de lire le fichier de configuration';
$MESSAGE['SETTINGS_UNABLE_WRITE_CONFIG'] = 'Impossible d\'écrire dans le fichier de configuration';
$MESSAGE['SETTINGS_WORLD_WRITEABLE_WARNING'] = 'Recommandé uniquement pour les environnement de test';
$MESSAGE['SIGNUP2_ADMIN_INFO'] = '
Enregistrement d\'un nouvel utilisateur.

Loginname: {LOGIN_NAME}
Code utilisateur: {LOGIN_ID}
Adresse email: {LOGIN_EMAIL}
Adresse IP: {LOGIN_IP}
Date d\'enregistrement: {SIGNUP_DATE}
----------------------------------------
Ce message à été généré automatiquement!

';
$MESSAGE['SIGNUP2_BODY_LOGIN_FORGOT'] = '
Bonjour {LOGIN_DISPLAY_NAME},

Vous avez reçu ce message car vous avez utilisé la fonction \'Retrouver vos identifiants de connexion\' depuis votre compte.

Voici vos nouveaux paramètres de connexion pour \'{LOGIN_WEBSITE_TITLE}\':

Loginname: {LOGIN_NAME}
Mot de Passe: {LOGIN_PASSWORD}

Nous vous avons attribué le mot de passe ci-dessus.
Cela signifie que vous ne pouvez plus vous servir de votre ancien mot de passe!
Si vous avez des problèmes ou des questions concernant vos nouveaux paramètres de connexion
veuillez contacter l\'administrateur du site ou l\'équipe de \'{LOGIN_WEBSITE_TITLE}\'.
Pensez à vider le cache de votre navigateur avant de vous reconnecter pour éviter toute problème éventuel.

Bien cordialement
-------------------------------------
Ce message à été généré automatiquement!

';
$MESSAGE['SIGNUP2_BODY_LOGIN_INFO'] = '
Bonjour {LOGIN_DISPLAY_NAME},

Bienvenue chez \'{LOGIN_WEBSITE_TITLE}\'.

Voici vos paramètres de connexion pour \'{LOGIN_WEBSITE_TITLE}\':
Loginname: {LOGIN_NAME}
Mot de Passe: {LOGIN_PASSWORD}

Bien cordialement

Remarque:
Si vous pensez avoir reçu ce message par erreur, veuillez l\'effacer et ne pas en tenir compte!
-------------------------------------
Ce message à été généré automatiquement!
';
$MESSAGE['SIGNUP2_NEW_USER'] = 'A new user would be registered';
$MESSAGE['SIGNUP2_SUBJECT_LOGIN_INFO'] = 'Paramètres de votre connexion ...';
$MESSAGE['SIGNUP2_SUBJECT_NEW_USER'] = 'Many thanks for your registration';
$MESSAGE['SIGNUP_NO_EMAIL'] = 'L\'adresse email est obligatoire';
$MESSAGE['START_CURRENT_USER'] = 'Vous êtes connecté en tant que : ';
$MESSAGE['START_INSTALL_DIR_EXISTS'] = 'Attention : le répertoire d\'installation existe toujours';
$MESSAGE['START_UPGRADE_SCRIPT_EXISTS'] = 'Please delete the file {{file}} from your webspace.';
$MESSAGE['START_WELCOME_MESSAGE'] = 'Bienvenue dans la zone d\'administration';
$MESSAGE['TEMPLATES_CHANGE_TEMPLATE_NOTICE'] = 'Pour modifier le thème du site, vous devez vous rendre dans la rubrique Réglages';
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
$MESSAGE['USERS_ADDED'] = 'Utilisateur ajouté avec succès';
$MESSAGE['USERS_CANT_SELFDELETE'] = 'Action refusée, Vous ne pouvez pas vous supprimer vous-même!';
$MESSAGE['USERS_CHANGING_PASSWORD'] = 'Vous ne devez modifier les valeurs ci-dessus uniquement lors d\'une modification de mot de passe';
$MESSAGE['USERS_CONFIRM_DELETE'] = 'Etes-vous sûr de vouloir supprimer cet utilisateur ?';
$MESSAGE['USERS_DELETED'] = 'Utilisateur supprimé avec succès';
$MESSAGE['USERS_EMAIL_TAKEN'] = 'L\'adresse email est déja utilisée';
$MESSAGE['USERS_INVALID_EMAIL'] = 'L\'adresse email n\'est pas valide';
$MESSAGE['USERS_NAME_INVALID_CHARS'] = 'Invalid chars for Loginname found';
$MESSAGE['USERS_NO_GROUP'] = 'Aucun groupe n\'a été sélectionné';
$MESSAGE['USERS_PASSWORD_MISMATCH'] = 'Le mot de passe est introuvable';
$MESSAGE['USERS_PASSWORD_TOO_SHORT'] = 'Le mot de passe est trop court';
$MESSAGE['USERS_SAVED'] = 'Utilisateur sauvegardé avec succès';
$MESSAGE['USERS_USERNAME_TAKEN'] = 'The loginname you entered is already taken';
$MESSAGE['USERS_USERNAME_TOO_SHORT'] = 'The loginname you entered was too short';

/* OVERVIEW */
$OVERVIEW['ADMINTOOLS'] = 'Accès aux outils d\'administration de WebsiteBaker...';
$OVERVIEW['GROUPS'] = 'Gestions des groupes d\'utilisateurs et des permissions';
$OVERVIEW['HELP'] = 'Aide et FAQ sur l\'utilisation du site';
$OVERVIEW['LANGUAGES'] = 'Gestion des langues du site';
$OVERVIEW['MEDIA'] = 'Gestion des fichiers media (images, téléchargements...)';
$OVERVIEW['MODULES'] = 'Gestion des modules du site';
$OVERVIEW['PAGES'] = 'Gestion du contenu du site';
$OVERVIEW['PREFERENCES'] = 'Gestion de vos préférences (email, mot de passe...) ';
$OVERVIEW['SETTINGS'] = 'Configuration du site';
$OVERVIEW['START'] = 'Présentation de l\'administration';
$OVERVIEW['TEMPLATES'] = 'Gestion des thèmes et modification de l\'apparence du site';
$OVERVIEW['USERS'] = 'Gestion des accès au site';
$OVERVIEW['VIEW'] = 'Aperçu du site dans une nouvelle fenêtre';
