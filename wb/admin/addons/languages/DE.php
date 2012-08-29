<?php
/****************************************************************************************
 * extended language definition for WebsiteBaker                                        *
 * ACP-module  pages                                                                    *
 * deutsch                                                                              *
 ****************************************************************************************/


$HEADING['CHANGE_TEMPLATE_NOTICE'] = 'Klicken Sie auf <i>Erweitert</i> um das aktuelle Backend-Theme zu kopieren!';
$HEADING['INSTALL_LANGUAGE'] = 'Sprache hinzufügen';
$HEADING['INSTALL_MODULE'] = 'Modul installieren';
$HEADING['INSTALL_TEMPLATE'] = 'Designvorlage installieren';
$HEADING['INVOKE_LANGUAGE_FILES'] = 'Sprachdateien manuell ausführen';
$HEADING['INVOKE_MODULE_FILES'] = 'Moduldateien manuell ausführen';
$HEADING['INVOKE_TEMPLATE_FILES'] = 'Templatedateien manuell ausführen';
$HEADING['LANGUAGE_DETAILS'] = 'Details zur Sprache';
$HEADING['MODULE_DETAILS'] = 'Details zum Modul';
$HEADING['TEMPLATE_DETAILS'] = 'Details zur Designvorlage';
$HEADING['UNINSTALL_LANGUAGE'] = 'Sprache löschen';
$HEADING['UNINSTALL_MODULE'] = 'Modul deinstallieren';
$HEADING['UNINSTALL_TEMPLATE'] = 'Designvorlage deinstallieren';
$HEADING['UPGRADE_LANGUAGE'] = 'Sprache registrieren/aktualisieren (Upgrade)';
$HEADING['UPLOAD_FILES'] = 'Datei(en) übertragen';

$MENU['LANGUAGES'] = 'Sprachen';
$MENU['MODULES'] = 'Module';
$MENU['TEMPLATES'] = 'Designvorlagen';

$MESSAGE['ADDON_ERROR_RELOAD'] = 'Fehler beim Abgleich der Addon Informationen.';
$MESSAGE['ADDON_LANGUAGES_RELOADED'] = 'Sprachen erfolgreich geladen';
$MESSAGE['ADDON_MANUAL_FTP_LANGUAGE'] = '<strong>ACHTUNG!</strong> Überspielen Sie Sprachdateien aus Sicherheitsgründen nur über FTP in den Ordner /languages/ und benutzen die Upgrade Funktion zum Registrieren oder Aktualisieren.';
$MESSAGE['ADDON_MANUAL_FTP_WARNING'] = 'Warnung: Eventuell vorhandene Datenbankeinträge eines Moduls gehen verloren. ';
$MESSAGE['ADDON_MANUAL_INSTALLATION'] = 'Beim Hochladen oder Löschen von Modulen per FTP (nicht empfohlen), werden eventuell vorhandene Modulfunktionen <i>install</i>, <i>upgrade</i> oder <i>uninstall</i> nicht automatisch ausgeführt. Solche Module funktionieren daher meist nicht richtig, oder hinterlassen Datenbankeinträge beim Löschen per FTP.<br /><br /> Nachfolgend können die Modulfunktionen von per FTP hochgeladenen Modulen manuell ausgeführt werden.';
$MESSAGE['ADDON_MANUAL_INSTALLATION_WARNING'] = 'Warnung: Eventuell vorhandene Datenbankeinträge eines Moduls gehen verloren. Bitte nur bei Problemen mit per FTP hochgeladenen Modulen verwenden. ';
$MESSAGE['ADDON_MANUAL_RELOAD_WARNING'] = 'Warnung: Eventuell vorhandene Datenbankeinträge eines Moduls gehen verloren. ';
$MESSAGE['ADDON_MODULES_RELOADED'] = 'Module erfolgreich geladen';
$MESSAGE['ADDON_OVERWRITE_NEWER_FILES'] = 'Überschreibe neuere Dateien';
$MESSAGE['ADDON_PRECHECK_FAILED'] = 'Installation fehlgeschlagen. Ihr System erfüllt nicht alle Voraussetzungen die für diese Erweiterung ben&ouml;tigt werden. Um diese Erweiterung nutzen zu k&ouml;nnen, müssen nachfolgende Updates durchgeführt werden.';
$MESSAGE['ADDON_RELOAD'] = 'Abgleich der Datenbank mit den Informationen aus den Addon-Dateien (z.B. nach FTP Upload).';
$MESSAGE['ADDON_TEMPLATES_RELOADED'] = 'Designvorlagen erfolgreich geladen';
$MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'] = 'Ungenügende Zugangsberechtigungen';
$MESSAGE['GENERIC_ALREADY_INSTALLED'] = 'Bereits installiert';
$MESSAGE['GENERIC_BAD_PERMISSIONS'] = 'Kann im Zielverzeichnis nicht schreiben';
$MESSAGE['GENERIC_CANNOT_UNINSTALL'] = 'Deinstallation fehlgeschlagen';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE'] = 'Deinstallation nicht m&ouml;glich: Datei wird benutzt';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL'] = 'Das {{type}} <strong>{{type_name}}</strong> kann nicht deinstalliert werden, weil es auf {{pages}} benutzt wird:';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES'] = 'folgender Seite;folgenden Seiten';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = 'Das Template <strong>{{name}}</strong> kann nicht deinstalliert werden, weil es das Standardtemplate ist!';
$MESSAGE['GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_THEME'] = 'Das Template <strong>{{name}}</strong> kann nicht deinstalliert werden, weil es das Standardbackendtheme ist!';
$MESSAGE['GENERIC_CANNOT_UNZIP'] = 'Fehler beim Entpacken';
$MESSAGE['GENERIC_CANNOT_UPLOAD'] = 'Die Datei kann nicht übertragen werden';
$MESSAGE['GENERIC_FORGOT_OPTIONS'] = 'Sie haben keine Auswahl getroffen!';
$MESSAGE['GENERIC_INSTALLED'] = 'Erfolgreich installiert';
$MESSAGE['GENERIC_INVALID'] = 'Die übertragene Datei ist ungültig';
$MESSAGE['GENERIC_INVALID_ADDON_FILE'] = 'Ungültige WebsiteBaker Installationsdatei. Bitte *.zip Format prüfen.';
$MESSAGE['GENERIC_INVALID_LANGUAGE_FILE'] = 'Ungültige WebsiteBaker Sprachdatei. Bitte Textdatei prüfen.';
$MESSAGE['GENERIC_INVALID_MODULE_FILE'] = 'Ungültige WebsiteBaker Moduledatei. Bitte Textdatei prüfen.';
$MESSAGE['GENERIC_INVALID_TEMPLATE_FILE'] = 'Ungültige WebsiteBaker Templatedatei. Bitte Textdatei prüfen.';
$MESSAGE['GENERIC_IN_USE'] = ' aber benutzt in ';
$MESSAGE['GENERIC_MISSING_ARCHIVE_FILE'] = 'Fehlende Archivdatei!';
$MESSAGE['GENERIC_MODULE_VERSION_ERROR'] = 'Das Modul ist nicht ordnungsgemäss installiert!';
$MESSAGE['GENERIC_NOT_INSTALLED'] = 'Nicht installiert';
$MESSAGE['GENERIC_NOT_UPGRADED'] = 'Aktualisierung nicht m&ouml;glich';
$MESSAGE['GENERIC_SECURITY_ACCESS'] = 'Sicherheitsverletzung!! Zugriff wurde verweigert!';
$MESSAGE['GENERIC_SECURITY_OFFENSE'] = 'Sicherheitsverletzung!! Das Speichern der Daten wurde verweigert!!';
$MESSAGE['GENERIC_UNINSTALLED'] = 'Erfolgreich deinstalliert';
$MESSAGE['GENERIC_UPGRADED'] = 'Erfolgreich aktualisiert';
$MESSAGE['MEDIA_CANNOT_DELETE_DIR'] = 'Das ausgewählte Verzeichnis konnte nicht gelöscht werden';

$TEXT['ADVANCED'] = 'Erweitert';
$TEXT['ARE_YOU_SURE'] = 'Sind Sie sicher?';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['BACK'] = 'Zurück';
$TEXT['CANCEL'] = 'Abbrechen';
$TEXT['CODE'] = 'Code';
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['CURRENT_FOLDER'] = 'Aktueller Ordner';
$TEXT['DESCRIPTION'] = 'Beschreibung';
$TEXT['DESIGNED_FOR'] = 'Entworfen für';
$TEXT['EXECUTE'] = 'Ausführen';
$TEXT['FILE'] = 'Datei';
$TEXT['FUNCTION'] = 'Funktion';
$TEXT['INSTALL'] = 'Installieren';
$TEXT['LICENSE'] = 'Lizenz';
$TEXT['NAME'] = 'Name';
$TEXT['PLEASE_SELECT'] = 'Bitte auswählen';
$TEXT['RESET'] = 'Zurücksetzen';
$TEXT['SAVE'] = 'Speichern';
$TEXT['THEME'] = 'Backend-Theme';
$TEXT['TYPE'] = 'Art';
$TEXT['UNINSTALL'] = 'Deinstallieren';
$TEXT['VIEW_DETAILS'] = 'Details';
$TEXT['VERSION'] = 'Version';
