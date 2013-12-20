<?php
/****************************************************************************************
 * extended language definition for WebsiteBaker                                        *
 * ACP-module  pages                                                                    *
 * Magyar  (HU)                                                                              *
 ****************************************************************************************/


$HEADING['CHANGE_TEMPLATE_NOTICE'] = 'Click <i>Advanced</i> to copy topical Backend-Theme!';
$HEADING['INSTALL_LANGUAGE'] = 'Nyelv telepítés';
$HEADING['INSTALL_MODULE'] = 'Modul telepítés';
$HEADING['INSTALL_TEMPLATE'] = 'Sablon telepítés';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Modul fájlok végrehajtása manuálisan';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Nyelv Infó';
$HEADING['MODULE_DETAILS'] = 'Modul infó';
$HEADING['TEMPLATE_DETAILS'] = 'Sablon infó';
$HEADING['UNINSTALL_LANGUAGE'] = 'Nyelv eltávolítás';
$HEADING['UNINSTALL_MODULE'] = 'Modul eltávolítás';
$HEADING['UNINSTALL_TEMPLATE'] = 'Sablon eltávolítás';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Fájl(ok) feltöltése';

$MENU['LANGUAGES'] = 'Nyelvek';
$MENU['MODULES'] = 'Modulok';
$MENU['TEMPLATES'] = 'Sablonok';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegendàjogosultságod!';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Már telepítve';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'A cél könyvtár nem írható';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Nem lehet eltávolítani';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet eltávoltítani! A file használatban van.';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> nem lehet eltávolítani, mert még használatban van a kövàoldalon: {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'ez az oldal;ezek az oldalak';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Nem lehet eltávolítani ezt a sablont: <b>{{name}}</b>, mert ez az alapértelmezett';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kicsomagolás nem lehetséges';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'File feltöltés nem lehetséges';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Telepítés sikeres';
$MESSAGE['GENERIC_INVALID'] = 'A feltöltött file nem megfelelç';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = '²vénytelen WebsiteBaker telepítàfájl. Kérlek ellen-?-?izd a *.zip formátumot.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = '²vénytelen WebsiteBaker nyelvi fájl. Kérlek ellen-?-?izd a szöveges fájlt.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nincs telpítve';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Eltávolítás sikeres';
$MESSAGE['GENERIC_UPGRADED'] = 'Upgraded successfully';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Nem lehet törölni a kiválasztott könyvtárat';

$TEXT['ADVANCED'] = 'Terjedelmes';
$TEXT['ARE_YOU_SURE'] = 'Biztos hogy ezt akarja?';
$TEXT['AUTHOR'] = 'Szerzç';
$TEXT['BACK'] = 'Vissza';
$TEXT['CANCEL'] = 'Mégse';
$TEXT['CODE'] = 'Kód';
$TEXT['COMMENT'] = 'Megjegyzés';
$TEXT['CURRENT_FOLDER'] = 'Aktuális könyvtár';
$TEXT['DESCRIPTION'] = 'Leírás';
$TEXT['DESIGNED_FOR'] = 'Tervezve';
$TEXT['EXECUTE'] = 'Végrehajtás';
$TEXT['FILE'] = 'Fájl';
$TEXT['FUNCTION'] = 'Function';
$TEXT['INSTALL'] = 'Telepít';
$TEXT['LICENSE'] = 'License';
$TEXT['NAME'] = 'Név';
$TEXT['PLEASE_SELECT'] = 'Kérem válasszon';
$TEXT['RESET'] = 'Visszavon';
$TEXT['SAVE'] = 'Mentés';
$TEXT['TEMPLATE'] = 'Weboldal Sablon';
$TEXT['THEME'] = 'Admin Téma';
$TEXT['TYPE'] = 'Típus';
$TEXT['UNINSTALL'] = 'Eltávolít';
$TEXT['VIEW_DETAILS'] = 'Infót megnéz';
$TEXT['VERSION'] = 'Verzió';