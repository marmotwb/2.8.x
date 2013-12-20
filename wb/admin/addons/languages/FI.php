<?php
/****************************************************************************************
 * extended language definition for WebsiteBaker                                        *
 * ACP-module  pages                                                                    *
 * Suomi  (FI)                                                                              *
 ****************************************************************************************/


$HEADING['CHANGE_TEMPLATE_NOTICE'] = 'Click <i>Advanced</i> to copy topical Backend-Theme!';
$HEADING['INSTALL_LANGUAGE'] = 'Asenna kieli';
$HEADING['INSTALL_MODULE'] = 'Asenna moduuli';
$HEADING['INSTALL_TEMPLATE'] = 'Asenna sivupohja';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Execute language files manually';
$HEADING['INVOKE_MODULE_FILES'] = 'Execute module files manually';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Execute template files manually';
$HEADING['LANGUAGE_DETAILS'] = 'Kielen tiedot';
$HEADING['MODULE_DETAILS'] = 'Moduulin tietoja';
$HEADING['TEMPLATE_DETAILS'] = 'Sivupohjan info';
$HEADING['UNINSTALL_LANGUAGE'] = 'Poista kieli';
$HEADING['UNINSTALL_MODULE'] = 'Poista moduuli';
$HEADING['UNINSTALL_TEMPLATE'] = 'Poista sivupohja';
$HEADING['UPGRADE_LANGUAGE'] = 'Language register/upgrading';
$HEADING['UPLOAD_FILES'] = 'Lataa palvelimelle';

$MENU['LANGUAGES'] = 'Kielet';
$MENU['MODULES'] = 'Moduulit';
$MENU['TEMPLATES'] = 'Sivupohjat';

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
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Oikeutesi eivät riitä...';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Asennettu, uudelleen asennus ei onnistu';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kohdekansioon ei voi kirjoittaa';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Ei voi poistaa';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Tiedosto käytössä, tiedostoa ei voi poistaa';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled, because it is still in use on {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'this page;these pages';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default template!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Can\'t uninstall the template <b>{{name}}</b>, because it is the default backend theme!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Zip-tiedostoa ei voi purkaa';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Lataus ei onnistu';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'You have selected no choice!';
$MESSAGE['GENERIC_INSTALLED'] = 'Asennettu';
$MESSAGE['GENERIC_INVALID'] = 'Ladatussa tiedostossa virhe';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Invalid WebsiteBaker installation file. Please check the *.zip format.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Invalid WebsiteBaker language file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Invalid WebsiteBaker module file. Please check the text file.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Invalid WebsiteBaker template file. Please check the text file.';
$MESSAGE['GENERIC_IN_USE'] = ' but used in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Missing Archiv file!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'The module is not installed properly!';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Ei ole asennettu';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Actualization not possibly';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Security offense!! Access denied!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Security offense!! data storing was refused!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Poistettu';
$MESSAGE['GENERIC_UPGRADED'] = 'Päivitetty';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Kansion poistamienen ei onnistu';

$TEXT['ADVANCED'] = 'Lisäasetukset';
$TEXT['ARE_YOU_SURE'] = 'Oletko varma?';
$TEXT['AUTHOR'] = 'Luonut';
$TEXT['BACK'] = 'Paluu';
$TEXT['CANCEL'] = 'Peruuta';
$TEXT['CODE'] = 'Koodi';
$TEXT['COMMENT'] = 'Kommentti';
$TEXT['CURRENT_FOLDER'] = 'Nykyinen kansio';
$TEXT['DESCRIPTION'] = 'Kuvaus';
$TEXT['DESIGNED_FOR'] = 'Suunniteltu';
$TEXT['EXECUTE'] = 'Suorita';
$TEXT['FILE'] = 'Tiedosto';
$TEXT['FUNCTION'] = 'Function';
$TEXT['INSTALL'] = 'Asenna';
$TEXT['LICENSE'] = 'License';
$TEXT['NAME'] = 'Nimi';
$TEXT['PLEASE_SELECT'] = 'Valitset';
$TEXT['RESET'] = 'Peruuta';
$TEXT['SAVE'] = 'Talleta';
$TEXT['TEMPLATE'] = 'Sivupohja';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['TYPE'] = 'Tyyppi';
$TEXT['UNINSTALL'] = 'Poista';
$TEXT['VIEW_DETAILS'] = 'Näytä tiedot';
$TEXT['VERSION'] = 'Versio';