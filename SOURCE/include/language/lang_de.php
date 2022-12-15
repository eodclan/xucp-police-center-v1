<?php
// ************************************************************************************//
// * xUCP Police Center Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1.1
// *
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /404.php' ) );
}
const DASHBOARD = "Dashboard";
const HOME_NOLOGGED = "Startseite";
const USERACCOUNT = "Account Tools";
const USERPROFILECHANGE = "User Profil bearbeiten";
const WELCOMETO = "Willkommen bei";
const SITE_LOGOUT = "Abmelden";
const NEWS = "Neuigkeiten: ";
const SECURE_SYSTEM = "Secure System";

// ************************************************************************************//
// * English Language Section - Main Site Settings 
// ************************************************************************************//
const SITECONFIG_HEADER = "Seiteneinstellungen";
const SITECONFIG_ONLINE = "Site Online Status";
const SITECONFIG_NAME = "Site Name";
const SITECONFIG_DONE = "<strong>Erfolgreich!</strong> Die Seiteneinstellungen wurden erfolgreich gespeichert!";
const SITECONFIG_ERROR = "<strong>Error!</strong> Die Seiteneinstellungen wurden nicht erfolgreich gespeichert!";
const SITECONFIG_THEMES = "Design";
const SITECONFIG_THEMES_INFO = "W&auml;hlen Sie das Design, das Sie verwenden m&ouml;chten.";
const SITECONFIG_THEMES_BLACK = "dark";
const SITECONFIG_THEMES_BLUE = "light";
const SITECONFIG_ONLINE_INFO = "W&auml;hlen Sie den Online Status, den Sie verwenden m&ouml;chten.";
const SITECONFIG_ONLINE_ONLINE = "Online";
const SITECONFIG_ONLINE_OFFLINE = "Offline";
const SITECONFIG_CLIENT_YES = "Ja";
const SITECONFIG_CLIENT_NO = "Nein";
const SITECONFIG_UPGRADE_NOTE = "Upgrade Hinweis";
const SITECONFIG_UPGRADE_NOTE_INFO = "W&auml;hlen Sie die Upgrade Anzeige, den Sie verwenden m&ouml;chten.";
const SITECONFIG_LANG = "UCP Sprache";

// ************************************************************************************//
// * German Language Section - Message System 
// ************************************************************************************//
const MSG_1 = "Sie sollten sich zuerst <a href='/usercp/login/index.php'>einloggen</a>!";
const MSG_2 = "Du bist kein Supporter!";
const MSG_8 = "<b>Du hast dein Account erfolgreich bearbeitet!</b>";
const MSG_9 = "<b>Deine Registrierung ist abgeschlossen!</b>";
const MSG_10 = "<b>Bitte f&uuml;llen Sie sowohl den Benutzernamen als auch das Passwortfeld aus!</b>";
const MSG_11 = "<b>Falsches Passwort!</b>";
const MSG_13 = "<b>Die E-Mail ist keine g&uuml;ltige!</b>";
const MSG_14 = "<b>Username nicht g&uuml;ltig</b>";
const MSG_15 = "<b>Das Passwort muss zwischen 5 und 20 Zeichen lang sein!</b>";
const MSG_16 = "<b>Account schon vorhanden</b>";
const MSG_17 = "<b>Dein Logout war erfolgreich!</b>";
const MSG_26 = "<b>Dein Rang ist f&uuml;r diese Seite nicht freigeschaltet!</b>";
const MSG_27 = "<b>Dein Login war Erfolgreich!</b>";

// ************************************************************************************//
// * German Language Section - My Profile Change
// ************************************************************************************//
const SIGNATUR = "Signatur";
const AVATAR = "Avatar URL";
const MYPROFILESAVE = "Speichern";
const LANGUAGE = "Webseiten Sprache";
const CHANGE_MYPROFILE_LANGUAGENOTE = "Bitte ausw&auml;hlen";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_EN = "Englisch";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_DE = "Deutsch";

// ************************************************************************************//
// * German Language Section - Discord Web-Hook Message System
// ************************************************************************************//
const DCWEBHOOK_INFO_LOGIN_1 = "Es hat sich gerade";
const DCWEBHOOK_INFO_LOGIN_2 = "bei den xUCP eingeloggt!";
const DCWEBHOOK_INFO_REGISTER_1 = "Es hat sich gerade";
const DCWEBHOOK_INFO_REGISTER_2 = "im xUCP registriert!";

// ************************************************************************************//
// * German Language Section - Wanted
// ************************************************************************************//
const WANTED_HEADER = "Fahndungen";
const WANTED_FILE_NUMBER = "Aktenzeichen";
const WANTED_JOB = "Job";
const WANTED_MSG = "Nachricht";
const WANTED_PERSON = "Person";
const WANTED_PHONENUMBER = "Telefonnummer";
const WANTED_IS_WANTED = "Ist Gesucht";
const WANTED_ENTRY_NOT_WORK = "Dein Eintrag war nicht Erfolgreich!";
const WANTED_ENTRY_WORKING = "Dein Eintrag war Erfolgreich!";
const WANTED_DATE = "Datum";
const WANTED_FROM_CREATED = "erstellt von";
const WANTED_DISCORD_NOTES = "Es wurde eine neue Fahndung ausgeschrieben!";
const WANTED_ADD = "Fahndung hinzufügen";
const WANTED_EDIT = "Bearbeiten";
const WANTED_VIEW = "Anschauen";
const WANTED_PRINT = "Fahndung Drucken";

// ************************************************************************************//
// * German Language Section - Dashboard
// ************************************************************************************//
const DASHBOARDCHARS = "Bürger";
const DASHBOARDWANTED = "Gesuchte Personen";
const DASHBOARDCRIMINALRECORDS = "Strafregister";

// ************************************************************************************//
// * German Language Section - Faction Logbook
// ************************************************************************************//
const FACTION_LOGBOOK_HEADER = "Fraktionslogbuch";
const FACTION_LOGBOOK_LBOOK = "Logbuch";
const FACTION_LOGBOOK_DESC = "Beschreibung";

// ************************************************************************************//
// * German Language Section - Resident Database
// ************************************************************************************//
const RESIDENT_DATABASE_HEADER = "Einwohnerdatenbank";
const RESIDENT_DATABASE_NAME = "Name";
const RESIDENT_DATABASE_JOB = "Job";
const RESIDENT_DATABASE_BIRTHDATE = "Geburtsdatum";
const RESIDENT_DATABASE_BIRTHPLACE = "Geburtsort";

// ************************************************************************************//
// * German Language Section - Resident Database
// ************************************************************************************//
const ROAD_TRAFFIC_OFFICE_HEADER = "Straßenverkehrsamt";
const ROAD_TRAFFIC_OFFICE_VEH_NAME = "Name";
const ROAD_TRAFFIC_OFFICE_VEH_PLATE = "Kennzeichen";
const ROAD_TRAFFIC_OFFICE_PRINT = "Drucken";

// ************************************************************************************//
// * German Language Section - Teamlist System
// ************************************************************************************//
const TLIST_HEADER = "Los Santos Police Department";
const TLIST_LEFT_NAVI_HEADER = "Fraktionsmitgliedern";
const TLIST_POLICE_RANK_1 = "Rekrut";
const TLIST_POLICE_RANK_2 = "Officer I";
const TLIST_POLICE_RANK_3 = "Officer II";
const TLIST_POLICE_RANK_4 = "Senior Officer";
const TLIST_POLICE_RANK_5 = "Sergeant I";
const TLIST_POLICE_RANK_6 = "Sergeant II";
const TLIST_POLICE_RANK_7 = "Lieutenant";
const TLIST_POLICE_RANK_8 = "Captain";
const TLIST_POLICE_RANK_9 = "Commander";
const TLIST_POLICE_RANK_10 = "Deputy Chief";
const TLIST_POLICE_RANK_11 = "Assistant Chief";
const TLIST_POLICE_RANK_12 = "Chief of Police";
const TLIST_SUPPORT_LEADER = "Support Leader";
const TLIST_SUPPORTER = "Supporter";

// ************************************************************************************//
// * German Language Section - Wanted
// ************************************************************************************//
const ACT_HEADER = "Aktensystem";
const ACT_FILE_NUMBER = "Aktenzeichen";
const ACT_JOB = "Job";
const ACT_MSG = "Nachricht";
const ACT_PERSON_NAME = "Name";
const ACT_PERSON_PHONENUMBER = "Telefonnummer";
const ACT_PERSON_GENDER = "Geschlecht";
const ACT_PERSON_BIRTHDAY = "Geburtstag";
const ACT_PERSON_SIZE = "Größe";
const ACT_PERSON_EYE_COLOR = "Augen Farbe";
const ACT_PERSON_HAIR_COLOR = "Haar Farbe";
const ACT_PERSON_MOTORCYCLE_LICENSE = "Motorradschein";
const ACT_PERSON_CAR_LICENSE = "PKW Führerschein";
const ACT_PERSON_TRUCK_LICENSE = "LKW Führerschein";
const ACT_PERSON_GUN_LICENSE = "Waffenschein";
const ACT_PERSON_OTHERS = "Sonstiges";
const ACT_VEH_PLATE = "Fahrzeug Kennzeichen";
const ACT_VEH_NAME = "Fahrzeug Name";
const ACT_VEH_ALL_VEHICLES = "Alle Fahrzeuge";
const ACT_TESTIFY = "Zeuge";
const ACT_ENTRY_NOT_WORK = "Dein Eintrag war nicht Erfolgreich!";
const ACT_ENTRY_WORKING = "Dein Eintrag war Erfolgreich!";
const ACT_IS_FINISHED = "Akte geschlossen?";
const ACT_DATE = "Datum";
const ACT_FROM_CREATED = "erstellt von";
const ACT_DISCORD_NOTES = "Eine neue Akte wurde erstellt.";
const ACT_ADD = "Neue Akte anlegen";
const ACT_EDIT = "Bearbeiten";
const ACT_VIEW = "Akte anschauen";
const ACT_PRINT = "Akte drucken";

// ************************************************************************************//
// * German Language Section - Database Sync
// ************************************************************************************//
const DBSYNC_HEADER = "Database Sync";
const DBSYNC_HOSTNAME = "Hostname";
const DBSYNC_PORT = "Port";
const DBSYNC_USERNAME = "Username";
const DBSYNC_PASSWORD = "Password";
const DBSYNC_DBNAME = "Database Name";
const DBSYNC_ENTRY_NOT_WORK = "Ihr gewünschter Eintrag war nicht erfolgreich!";
const DBSYNC_ENTRY_WORKING = "Ihr gewünschter Eintrag war erfolgreich!";
const DBSYNC_START_SYNC = "Start Sync";

// ************************************************************************************//
// * German Language Section - Paragraph Manager & Paragraph Viewer
// ************************************************************************************//
const PARAGRAPH_MANAGER_HEADER = "Bürgerliches Gesetzbuch Manager";
const PARAGRAPH_MANAGER_CATEGORY = "Kategorie";
const PARAGRAPH_MANAGER_TITLE = "Titel";
const PARAGRAPH_MANAGER_DESC = "Beschreibung";
const PARAGRAPH_MANAGER_SEND = "Senden";
const PARAGRAPH_MANAGER_EDIT = "Bearbeiten";
const PARAGRAPH_MANAGER_ADD = "Paragraph hinzufügen";
const PARAGRAPH_MANAGER_ERROR = "Ihr Paragraph Eintrag war nicht erfolgreich!";
const PARAGRAPH_MANAGER_DONE = "Ihr Paragraph Eintrag war erfolgreich!";
const PARAGRAPH_MANAGER_DISCORD = "Ihr Paragraph Eintrag war erfolgreich!";
const PARAGRAPH_HEADER = "Bürgerliches Gesetzbuch";
const PARAGRAPH_TITLE = "Paragraph";
const PARAGRAPH_DESC = "Beschreibung";
const PARAGRAPH_PRINT = "Drucken";

// ************************************************************************************//
// * German Language Section - Faction Members Change
// ************************************************************************************//
const CHIEF_USERCAHNEGED = "Bürger bearbeiten";
const CHIEF_USERCONTROL = "Bürgerliste";
const CHIEF_USERCONTROLUSERNAME = "Bürger username";
const CHIEF_USERCONTROLQUIT = "Bürger kündigen";
const CHIEF_USERCONTROLQUIT_INFO = "Ist der Bürger gekündigt?";
const CHIEF_USERCONTROLQUIT_NOTE = "Bürger aus den LSPD kündigen?";
const CHIEF_USERCONTROLQUIT_YES = "Ja, ich möchte den Bürger aus den LSPD kündigen!";
const CHIEF_USERCONTROLQUIT_DONE = "Du hast den Bürger aus den LSPD entlassen!";
const CHIEF_USERCONTROLQUIT_ERROR = "Du konntest leider den Bürger nicht kündigen!";
const CHIEF_USERCONTROL_RANK = "Fraktion Rang";
const CHIEF_USERCONTROLOPTION = "Options";
const CHIEF_USERCONTROLSAVE = "Speichern";
const CHIEF_USERCONTROL_RANK_STATUS = "Rang auswählen";
const CHIEF_CHANGE_USER = "Bearbeiten";

// ************************************************************************************//
// * German Language Section - News System
// ************************************************************************************//
const NEWS_HEADER = "News System";
const NEWS_INFO = "Du musst alle Felder ausf&uuml;hlen!";
const NEWS_TITLE_EN = "Titel Englisch";
const NEWS_TITLE_EN_TEXT = "Der Englische Titel";
const NEWS_TITLE_DE = "Titel Deutsch";
const NEWS_TITLE_DE_TEXT = "Der Deutsche Titel";
const NEWS_CONTENT_EN = "Kontent Englisch";
const NEWS_CONTENT_EN_TEXT = "Der Englische Content";
const NEWS_CONTENT_DE = "Kontent Deutsch";
const NEWS_CONTENT_DE_TEXT = "Der Deutsche Kontent";
const NEWS_DONE = "Du hast ein neuen News Beitrag erstellt!";
const NEWS_SAVE = "Speichern";

// ************************************************************************************//
// * German Language Section - No Logged & Logged Section
// ************************************************************************************//
const REGISTER = "Registrieren";
const LOGIN = "Einloggen";
const LOGOUT = "Ausloggen";
const USERNAME = "Benutzername";
const CHARNAME = "Charakter Name";
const EMAIL = "E-Mail";
const PASSWORD = "Passwort";
const FACTION_RANK = "Fraktion Rang";
const FACTION_RANK_SELECT = "Fraktion Rang auswählen";
const RULES = "Regeln";
const NOTE = "<b>Hinweis:</b> Felder mit <span class='pflichtfeld'>*</span> m&uuml;ssen ausgef&uuml;llt werden.";
const NOTE3 = "<b>Hinweis:</b> Sie haben kein Account?";
const NOTE4 = "<b>Hinweis:</b> Sie haben ein Account ?";
const INFO1 = "Benutzername eingeben";
const INFO2 = "Passwort eingeben";
const INFO3 = "Fraktion Rang eingeben";
const INFO4 = "E-Mail Adresse eingeben";
const INFO5 = "Charakter Name eingeben";
const PROFILE_SETTINGS = "Settings";
const PROFILE_ABOUT = "About";
const PROFILE_PORTFOLIO = "Portfolio";
const PROFILE_PORTFOLIO_WEBSITE = "Website";
const PROFILE_PORTFOLIO_DISCORDTAG = "Mein Discordtag";

// ************************************************************************************//
// * German Language Section - Staff Member 
// ************************************************************************************//
const STAFF_USERCONTROLSAVE = "Speichern";

// ************************************************************************************//
// * German Language Section - BB-Code-Editor System
// ************************************************************************************//
const BBCODE_EDITOR = "Zitat";
const BBCODE_EDITOR_INFO = "1 schrieb:";

