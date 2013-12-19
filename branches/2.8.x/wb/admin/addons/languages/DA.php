<?php
/****************************************************************************************
 * extended language definition for WebsiteBaker                                        *
 * ACP-module  pages                                                                    *
 * Dansk   (DA)                                                                           *
 ****************************************************************************************/


$HEADING['CHANGE_TEMPLATE_NOTICE'] = 'Click <i>Advanced</i> to copy topical Backend-Theme!';
$HEADING['INSTALL_LANGUAGE'] = 'Installér sprog';
$HEADING['INSTALL_MODULE'] = 'Installér modul';
$HEADING['INSTALL_TEMPLATE'] = 'Installér skabelon';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Håndter sprogfiler manuelt';
$HEADING['INVOKE_MODULE_FILES'] = 'Håndter modulfiler manuelt';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Håndter skabelonfiler manuelt';
$HEADING['LANGUAGE_DETAILS'] = 'Info om sprog';
$HEADING['MODULE_DETAILS'] = 'Info om modul';
$HEADING['TEMPLATE_DETAILS'] = 'Info om skabelon';
$HEADING['UNINSTALL_LANGUAGE'] = 'Afinstallér sprog';
$HEADING['UNINSTALL_MODULE'] = 'Afinstallér modul';
$HEADING['UNINSTALL_TEMPLATE'] = 'Afinstallér skabelon';
$HEADING['UPGRADE_LANGUAGE'] = 'Sprogopgradering';
$HEADING['UPLOAD_FILES'] = 'Overfør fil(er)';

$MENU['LANGUAGES'] = 'Sprog';
$MENU['MODULES'] = 'Moduler';
$MENU['TEMPLATES'] = 'Skabeloner';

$MESSAGE['ADDON_ERROR_RELOAD'] = 'Fejl under opdatering af tilføjelse.';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Sprog indlæst';
$MESSAGE['ADDON_MANUAL_FTP_LANGUAGE'] = '<strong>PAS På!</strong> Af sikkerhedsgrunde bør sprogfiler kun indlæses i folderen /languages/ med FTP, og opgraderingsfunktionen bør bruges til registrering/opdatering.';
$MESSAGE['ADDON_MANUAL_FTP_WARNING'] = 'Advarsel: Eksisterende moduler i databasen vil gå tabt. ';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'Når moduler overføres med FTP (anbefales ikke), udføres installatonsfunktionerne <tt>installer</tt>, <tt>opgrader</tt> eller <tt>afinstaller</tt> ikke automatisk. Modulerne vil måske ikke fungere korrekt eller bliver rigtigt afinstallerett.<br /><br />Du kan nedenfor udføre modulfunktionerne manuelt for moduler, der er overført via FTP.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Advarsel: Eksisterende moduler i databasen vil gå tabt. Brug kun denne funktion, hvis du oplever problemer med moduler, der er overført med FTP.';
$MESSAGE['ADDON_MANUAL_RELOAD_WARNING'] = 'Advarsel: Eksisterende moduler i databasen vil gå tabt. ';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Moduler er genindlæst';
$MESSAGE['ADDON_OVERWRITE_NEWER_FILES'] = 'Overskriv nyere filer';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Installation af tilf&oring;jelsen mislykkedes. Dit system opfylder ikke kravene til denne tilf&oring;jelse. For at få denne tilføjelse til at virke i dit system, skal du rette de forhold, der opregnes nedenfor.';
$MESSAGE['ADDON_RELOAD'] = 'Opdater databasen med information fra tilføjelsesfiler (f.eks. efter FTP-overførsel).';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Skabeloner genindlæst';
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Du har ikke den nødvendige adgang til dette område';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Er allerede installeret';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kan ikke skrive i det valgte modtagebibliotek (mappe)';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Kan ikke afinstallere';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Kan ikke afinstallere: Den valgte fil er i brug';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = '<br /><br />{{type}} <b>{{type_name}}</b> kan ikke afinstalleres, da den stadig bruges på {{pages}}.<br /><br />';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'denne side/disse sider';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Kan ikke afinstallere skabelonen <b>{{name}}</b>, da den er standardskabelonen!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'kan ikek afinstallere skabelonen <b>{{name}}</b>, da den er standard administrator-skabelon!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Kan ikke udpakke fil';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Kunne ikke overføre filen';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'Du har intet valgt!';
$MESSAGE['GENERIC_INSTALLED'] = 'Installeret';
$MESSAGE['GENERIC_INVALID'] = 'Filen du overførte er fejlbehæftet';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'WebsiteBaker installationsfil ikke i korrekt format. Kontroller *.zip formatet.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'WebsiteBaker sprogfil ikke i korrekt format. Kontroller tekstfilen.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'WebsiteBaker modulfil ikke gyldig. Kontroller tekstfilen.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'WebsiteBaker skabelon ikke gyldig. Kontroller tekstfilen.';
$MESSAGE['GENERIC_IN_USE'] = ' men bruges i ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Arkivfil mangler!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'Modulet er ikke korrekt installeret!';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Ikke installeret';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Opdatering ikke mulig';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Sikerhedsbrud! Adgang afslået!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Sikerhedsbrud! Lagring nægtet!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Afinstalleret';
$MESSAGE['GENERIC_UPGRADED'] = 'Opgraderet';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Kan ikke slette den valgte fil';

$TEXT['ADVANCED'] = 'Avanceret';
$TEXT['ARE_YOU_SURE'] = 'Er du sikker?';
$TEXT['AUTHOR'] = 'Udvikler/forfatter';
$TEXT['BACK'] = 'Tilbage';
$TEXT['CANCEL'] = 'Annullér';
$TEXT['CODE'] = 'Kode';
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['CURRENT_FOLDER'] = 'Nuværende mappe';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['DESIGNED_FOR'] = 'Designet til';
$TEXT['EXECUTE'] = 'Udfør';
$TEXT['FILE'] = 'Fil';
$TEXT['FUNCTION'] = 'Funktion';
$TEXT['INSTALL'] = 'Installér';
$TEXT['LICENSE'] = 'License';
$TEXT['NAME'] = 'Navn';
$TEXT['PLEASE_SELECT'] = 'Vælg venligst';
$TEXT['RESET'] = 'Nulstil';
$TEXT['SAVE'] = 'Gem';
$TEXT['TEMPLATE'] = 'Skabelon';
$TEXT['THEME'] = 'Backend-tema';
$TEXT['TYPE'] = 'Type';
$TEXT['UNINSTALL'] = 'Ukendt';
$TEXT['VIEW_DETAILS'] = 'Se oplysninger';
$TEXT['VERSION'] = 'Version';