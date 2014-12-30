<?php

namespace Eve\Api;


abstract class EveCallMask {

	const Character_Locations = 134217728;
	const Character_Contracts = 67108864;
	const Character_AccountStatus = 33554432;
	const Character_CharacterInfoPrivate = 16777216;
	const Character_CharacterInfoPublic = 8388608;
	const Character_WalletTransactions = 4194304;
	const Character_WalletJournal = 2097152;
	const Character_UpcomingCalendarEvents = 1048576;
	const Character_Standings = 524288;
	const Character_SkillQueue = 262144;
	const Character_SkillInTraining = 131072;
	const Character_Research = 65536;
	const Character_NotificationTexts = 32768;
	const Character_Notifications = 16384;
	const Character_Medals = 8192;
	const Character_MarketOrders = 4096;
	const Character_MailMessages = 2048;
	const Character_MailingLists = 1024;
	const Character_MailBodies = 512;
	const Character_KillLog = 256;
	const Character_IndustryJobs = 128;
	const Character_FacWarStats = 64;
	const Character_ContactNotifications = 32;
	const Character_ContactList = 16;
	const Character_CharacterSheet = 8;
	const Character_CalendarEventAttendees = 4;
	const Character_AssetList = 2;
	const Character_AccountBalance = 1;

	const Corporation_MemberTrackingExtended = 33554432;
	const Corporation_Locations = 16777216;
	const Corporation_Contracts = 8388608;
	const Corporation_Titles = 4194304;
	const Corporation_WalletTransactions = 2097152;
	const Corporation_WalletJournal = 1048576;
	const Corporation_StarbaseList = 524288;
	const Corporation_Standings = 262144;
	const Corporation_StarbaseDetail = 131072;
	const Corporation_Shareholders = 65536;
	const Corporation_OutpostServiceDetail = 32768;
	const Corporation_OutpostList = 16384;
	const Corporation_Medals = 8192;
	const Corporation_MarketOrders = 4096;
	const Corporation_MemberTrackingLimited = 2048;
	const Corporation_MemberSecurityLog = 1024;
	const Corporation_MemberSecurity = 512;
	const Corporation_KillLog = 256;
	const Corporation_IndustryJobs = 128;
	const Corporation_FacWarStats = 64;
	const Corporation_ContainerLog = 32;
	const Corporation_ContactList = 16;
	const Corporation_CorporationSheet = 8;
	const Corporation_MemberMedals = 4;
	const Corporation_AssetList = 2;
	const Corporation_AccountBalance = 1;
} 