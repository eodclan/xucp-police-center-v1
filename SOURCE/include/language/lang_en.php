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
const HOME_NOLOGGED = "Home";
const RULES = "Rules";
const USERACCOUNT = "Account Tools";
const USERPROFILECHANGE = "User Profile Change";
const WELCOMETO = "Welcome to";
const SITE_LOGOUT = "Logout";
const NEWS = "News: ";
const SECURE_SYSTEM = "Secure System";

// ************************************************************************************//
// * English Language Section - Wanted
// ************************************************************************************//
const WANTED_HEADER = "Wantends";
const WANTED_FILE_NUMBER = "Plate";
const WANTED_JOB = "Job";
const WANTED_MSG = "Message";
const WANTED_PERSON = "Person";
const WANTED_PHONENUMBER = "Phonenumber";
const WANTED_IS_WANTED = "is wanted";
const WANTED_ENTRY_NOT_WORK = "Your entry was unsuccessful!";
const WANTED_ENTRY_WORKING = "Your entry was successful!";
const WANTED_DATE = "Date";
const WANTED_FROM_CREATED = "created by";
const WANTED_DISCORD_NOTES = "A new wanted has been launched!";
const WANTED_ADD = "Add wanted";
const WANTED_EDIT = "Change";
const WANTED_VIEW = "View";
const WANTED_PRINT = "Print wanted";

// ************************************************************************************//
// * English Language Section - Dashboard
// ************************************************************************************//
const DASHBOARDCHARS = "Citizens";
const DASHBOARDWANTED = "Wanted";
const DASHBOARDCRIMINALRECORDS = "Criminal Records";

// ************************************************************************************//
// * English Language Section - Faction Logbook
// ************************************************************************************//
const FACTION_LOGBOOK_HEADER = "Faction Logbook";
const FACTION_LOGBOOK_LBOOK = "Logbook";
const FACTION_LOGBOOK_DESC = "Description";

// ************************************************************************************//
// * English Language Section - Resident Database
// ************************************************************************************//
const RESIDENT_DATABASE_HEADER = "Resident Database";
const RESIDENT_DATABASE_NAME = "Name";
const RESIDENT_DATABASE_JOB = "Job";
const RESIDENT_DATABASE_BIRTHDATE = "Birthdate";
const RESIDENT_DATABASE_BIRTHPLACE = "Birthplace";

// ************************************************************************************//
// * English Language Section - Resident Database
// ************************************************************************************//
const ROAD_TRAFFIC_OFFICE_HEADER = "Road Traffic Office";
const ROAD_TRAFFIC_OFFICE_VEH_NAME = "Name";
const ROAD_TRAFFIC_OFFICE_VEH_PLATE = "Plate";
const ROAD_TRAFFIC_OFFICE_PRINT = "Print";

// ************************************************************************************//
// * English Language Section - Discord Web-Hook Message System
// ************************************************************************************//
const DCWEBHOOK_INFO_LOGIN_1 = "It has just";
const DCWEBHOOK_INFO_LOGIN_2 = "logged into the xUCP!";
const DCWEBHOOK_INFO_REGISTER_1 = "It has just turned";
const DCWEBHOOK_INFO_REGISTER_2 = "registered in xUCP!";

// ************************************************************************************//
// * English Language Section - Teamlist System
// ************************************************************************************//
const TLIST_HEADER = "Los Santos Police Department";
const TLIST_LEFT_NAVI_HEADER = "Faction Members";
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
// * English Language Section - Wanted
// ************************************************************************************//
const ACT_HEADER = "filing system";
const ACT_FILE_NUMBER = "File number";
const ACT_JOB = "Job";
const ACT_MSG = "Message";
const ACT_PERSON_NAME = "Name";
const ACT_PERSON_PHONENUMBER = "phone number";
const ACT_PERSON_GENDER = "gender";
const ACT_PERSON_BIRTHDAY = "birthday";
const ACT_PERSON_SIZE = "size";
const ACT_PERSON_EYE_COLOR = "eyes color";
const ACT_PERSON_HAIR_COLOR = "Hair color";
const ACT_PERSON_MOTORCYCLE_LICENSE = "motorcycle license";
const ACT_PERSON_CAR_LICENSE = "car driver's license";
const ACT_PERSON_TRUCK_LICENSE = "truck license";
const ACT_PERSON_GUN_LICENSE = "gun license";
const ACT_PERSON_OTHERS = "Miscellaneous";
const ACT_VEH_PLATE = "vehicle license plate";
const ACT_VEH_NAME = "vehicle name";
const ACT_VEH_ALL_VEHICLES = "All vehicles";
const ACT_TESTIFY = "witness";
const ACT_ENTRY_NOT_WORK = "Your entry was unsuccessful!";
const ACT_ENTRY_WORKING = "Your entry was successful!";
const ACT_IS_FINISHED = "file closed?";
const ACT_DATE = "Date";
const ACT_FROM_CREATED = "created by";
const ACT_DISCORD_NOTES = "A new file has been created.";
const ACT_ADD = "Create a new file";
const ACT_EDIT = "change";
const ACT_VIEW = "look at the file";
const ACT_PRINT = "print file";

// ************************************************************************************//
// * English Language Section - Database Sync
// ************************************************************************************//
const DBSYNC_HEADER = "Database Sync";
const DBSYNC_HOSTNAME = "Hostname";
const DBSYNC_PORT = "Port";
const DBSYNC_USERNAME = "Username";
const DBSYNC_PASSWORD = "Password";
const DBSYNC_DBNAME = "Database Name";
const DBSYNC_ENTRY_NOT_WORK = "Your wanted entry was unsuccessful!";
const DBSYNC_ENTRY_WORKING = "Your wanted entry was successful!";
const DBSYNC_START_SYNC = "Start Sync";

// ************************************************************************************//
// * English Language Section - Paragraph Manager & Paragraph Viewer
// ************************************************************************************//
const PARAGRAPH_MANAGER_HEADER = "Paragraph Manager";
const PARAGRAPH_MANAGER_CATEGORY = "Category";
const PARAGRAPH_MANAGER_TITLE = "Title";
const PARAGRAPH_MANAGER_DESC = "Description";
const PARAGRAPH_MANAGER_SEND = "Send";
const PARAGRAPH_MANAGER_EDIT = "Change";
const PARAGRAPH_MANAGER_ADD = "Add a paragraph";
const PARAGRAPH_MANAGER_ERROR = "Your paragraph entry was not successful!";
const PARAGRAPH_MANAGER_DONE = "Your paragraph entry was successful!";
const PARAGRAPH_MANAGER_DISCORD = "Your paragraph entry was successful!";
const PARAGRAPH_HEADER = "Paragraph Book";
const PARAGRAPH_TITLE = "Paragraph";
const PARAGRAPH_DESC = "Description";
const PARAGRAPH_PRINT = "Print";

// ************************************************************************************//
// * German Language Section - Faction Members Change
// ************************************************************************************//
const CHIEF_USERCAHNEGED = "Edit Citizen";
const CHIEF_USERCONTROL = "Citizen list";
const CHIEF_USERCONTROLUSERNAME = "Citizen username";
const CHIEF_USERCONTROLQUIT = "Relieve citizens";
const CHIEF_USERCONTROLQUIT_INFO = "Has the citizen been fired?";
const CHIEF_USERCONTROLQUIT_NOTE = "Fired citizens from the LSPD?";
const CHIEF_USERCONTROLQUIT_YES = "Yes, I would like to fired the citizen from the LSPD!";
const CHIEF_USERCONTROLQUIT_DONE = "You fired the citizen from the LSPD!";
const CHIEF_USERCONTROLQUIT_ERROR = "Unfortunately, you couldn't cancel the citizen!";
const CHIEF_USERCONTROL_RANK = "Faction Rank";
const CHIEF_USERCONTROLOPTION = "Options";
const CHIEF_USERCONTROLSAVE = "Save";
const CHIEF_USERCONTROL_RANK_STATUS = "Select the rank.";
const CHIEF_CHANGE_USER = "Change";

// ************************************************************************************//
// * English Language Section - Main Site Settings 
// ************************************************************************************//
const SITECONFIG_HEADER = "Site Settings";
const SITECONFIG_ONLINE = "Site Online Status";
const SITECONFIG_NAME = "Site Name";
const SITECONFIG_DONE = "<strong>Success!</strong> The site settings have been saved successfully!";
const SITECONFIG_ERROR = "<strong>Error!</strong> The site settings were not saved successfully!";
const SITECONFIG_THEMES = "Themes";
const SITECONFIG_THEMES_INFO = "Choose the theme you want to use.";
const SITECONFIG_THEMES_BLACK = "dark";
const SITECONFIG_THEMES_BLUE = "light";
const SITECONFIG_ONLINE_INFO = "Choose the online status you want to use.";
const SITECONFIG_ONLINE_ONLINE = "Online";
const SITECONFIG_ONLINE_OFFLINE = "Offline";
const SITECONFIG_CLIENT_YES = "Yes";
const SITECONFIG_CLIENT_NO = "No";
const SITECONFIG_UPGRADE_NOTE = "Upgrade notice";
const SITECONFIG_UPGRADE_NOTE_INFO = "Choose the upgrade display you want to use.";
const SITECONFIG_LANG = "UCP Language";

// ************************************************************************************//
// * English Language Section - Message System 
// ************************************************************************************//
const MSG_1 = "You should look first <a href='/usercp/login/index.php'>login</a>!";
const MSG_2 = "You are not a supporter!";
const MSG_8 = "<b>You have successfully edited your account!</b>";
const MSG_9 = "<b>Your registration is complete!</b>";
const MSG_10 = "<b>Please fill in both the username and the password field!</b>";
const MSG_11 = "<b>Wrong password!</b>";
const MSG_13 = "<b>E-Mail is not valid!</b>";
const MSG_14 = "<b>Username is not valid!</b>";
const MSG_15 = "<b>Password must be between 5 and 20 characters long!</b>";
const MSG_16 = "<b>Account already exists</b>";
const MSG_17 = "<b>Your logout was successful!</b>";
const MSG_26 = "<b>Your rank is not unlocked for this page!</b>";
const MSG_27 = "<b>Your login was successful!</b>";

// ************************************************************************************//
// * English Language Section - My Profile Change
// ************************************************************************************//
const SIGNATUR = "Signature";
const AVATAR = "Avatar url";
const MYPROFILESAVE = "Save";
const LANGUAGE = "Website language";
const CHANGE_MYPROFILE_LANGUAGENOTE = "Please select";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_EN = "English";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_DE = "German";

// ************************************************************************************//
// * English Language Section - News System
// ************************************************************************************//
const NEWS_HEADER = "News System";
const NEWS_INFO = "You have to fill in all fields!";
const NEWS_TITLE_EN = "Title English";
const NEWS_TITLE_EN_TEXT = "The English Title";
const NEWS_TITLE_DE = "Title German";
const NEWS_TITLE_DE_TEXT = "The German Title";
const NEWS_CONTENT_EN = "Content Englisch";
const NEWS_CONTENT_EN_TEXT = "The English Content";
const NEWS_CONTENT_DE = "Content German";
const NEWS_CONTENT_DE_TEXT = "The German Content";
const NEWS_DONE = "The German Content";
const NEWS_SAVE = "Save";

// ************************************************************************************//
// * English Language Section - No Logged & Logged Section
// ************************************************************************************//
const REGISTER = "Register";
const LOGIN = "Login";
const LOGOUT = "Logout";
const USERNAME = "Username";
const CHARNAME = "Character Name";
const EMAIL = "Email";
const PASSWORD = "Password";
const FACTION_RANK = "Faction Rank";
const FACTION_RANK_SELECT = "Select faction rank";
const NOTE = "<b>Note:</b> Fields with <span class='pflichtfeld'>*</span> have to be filled out.";
const NOTE3 = "<b>Note:</b> Don't have an account ?";
const NOTE4 = "<b>Note:</b> You have an account ?";
const INFO1 = "Enter Username";
const INFO2 = "Enter Password";
const INFO3 = "Enter Faction Rank";
const INFO4 = "Enter E-Mail Address";
const INFO5 = "Enter Character Name";
const PROFILE_SETTINGS = "Settings";
const PROFILE_ABOUT = "About";
const PROFILE_PORTFOLIO = "Portfolio";
const PROFILE_PORTFOLIO_WEBSITE = "Website";
const PROFILE_PORTFOLIO_DISCORDTAG = "My Discordtag";

// ************************************************************************************//
// * English Language Section - Staff Member 
// ************************************************************************************//
const STAFF_USERCONTROLSAVE = "Save";

// ************************************************************************************//
// * English Language Section - BB-Code-Editor System
// ************************************************************************************//
const BBCODE_EDITOR = "Quote";
const BBCODE_EDITOR_INFO = "1 wrote:";

