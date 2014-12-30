<?php

namespace Eve\Api;

abstract class EveBitMask extends EveCallMask
{
	protected $access_mask;
	protected $scope;

	public static $masks_Character = array(
		'AccountBalance' => self::Character_AccountBalance,
		'AssetList' => self::Character_AssetList,
		'CalendarEventAttendees' => self::Character_CalendarEventAttendees,
		'CharacterSheet' => self::Character_CharacterSheet,
		'ContactList' => self::Character_ContactList,
		'ContactNotifications' => self::Character_ContactNotifications,
		'FacWarStats' => self::Character_FacWarStats,
		'IndustryJobs' => self::Character_IndustryJobs,
		'KillLog' => self::Character_KillLog,
		'MailBodies' => self::Character_MailBodies,
		'MailingLists' => self::Character_MailingLists,
		'MailMessages' => self::Character_MailMessages,
		'MarketOrders' => self::Character_MarketOrders,
		'Medals' => self::Character_Medals,
		'Notifications' => self::Character_Notifications,
		'NotificationTexts' => self::Character_NotificationTexts,
		'Research' => self::Character_Research,
		'SkillInTraining' => self::Character_SkillInTraining,
		'SkillQueue' => self::Character_SkillQueue,
		'Standings' => self::Character_Standings,
		'UpcomingCalendarEvents' => self::Character_UpcomingCalendarEvents,
		'WalletJournal' => self::Character_WalletJournal,
		'WalletTransactions' => self::Character_WalletTransactions,
		'CharacterInfoPublic' => self::Character_CharacterInfoPublic,
		'CharacterInfoPrivate' => self::Character_CharacterInfoPrivate,
		'AccountStatus' => self::Character_AccountStatus,
		'Contracts' => self::Character_Contracts,
		'ContractItems' => self::Character_Contracts,
		'ContractBids' => self::Character_Contracts,
		'Locations' => self::Character_Locations,

		// New in kronos
		'PlanetaryColonies' => self::Character_AssetList,
		'PlanetaryPins' => self::Character_AssetList,
		'PlanetaryRoutes' => self::Character_AssetList,
		'PlanetaryLinks' => self::Character_AssetList,

		// New in cirus
		'IndustryJobsHistory' => self::Character_IndustryJobs,

		// Aliases
		'CharacterInfo' => -1,
	);

	public static $masks_Corporation = array(
		'AccountBalance' => self::Corporation_AccountBalance,
		'AssetList' => self::Corporation_AssetList,
		'CorporationSheet' => self::Corporation_CorporationSheet,
		'ContactList' => self::Corporation_ContactList,
		'ContainerLog' => self::Corporation_ContainerLog,
		'FacWarStats' => self::Corporation_FacWarStats,
		'IndustryJobs' => self::Corporation_IndustryJobs,
		'KillLog' => self::Corporation_KillLog,
		'MemberSecurity' => self::Corporation_MemberSecurity,
		'MemberSecurityLog' => self::Corporation_MemberSecurityLog,
		'MemberTrackingLimited' => self::Corporation_MemberTrackingLimited,
		'MarketOrders' => self::Corporation_MarketOrders,
		'Medals' => self::Corporation_Medals,
		'MemberMedals' => self::Corporation_MemberMedals,
		'OutpostList' => self::Corporation_OutpostList,
		'OutpostServiceDetail' => self::Corporation_OutpostServiceDetail,
		'Shareholders' => self::Corporation_Shareholders,
		'StarbaseDetail' => self::Corporation_StarbaseDetail,
		'Standings' => self::Corporation_Standings,
		'StarbaseList' => self::Corporation_StarbaseList,
		'WalletJournal' => self::Corporation_WalletJournal,
		'WalletTransactions' => self::Corporation_WalletTransactions,
		'Titles' => self::Corporation_Titles,
		'Contracts' => self::Corporation_Contracts,
		'ContractItems' => self::Corporation_Contracts,
		'ContractBids' => self::Corporation_Contracts,
		'Locations' => self::Corporation_Locations,
		'MemberTrackingExtended' => self::Corporation_MemberTrackingExtended
	);

	public static $masks_Eve = array(
		'CharacterInfoKeyless' => null,
		'CharacterInfoPrivate' => self::Character_CharacterInfoPrivate,
		'CharacterInfoPublic' => self::Character_CharacterInfoPublic,
	);

	/*
	   * Note: these functions are protected to prevent outside code
	   * from falsely setting BITS.
	   */
	protected function setScope($scope) {
		$this->scope = $scope;
	}

	/*
	   * Note: these functions are protected to prevent outside code
	   * from falsely setting BITS.
	   */
	protected function getScope() {
		return $this->scope;
	}

	/*
	   * Note: these functions are protected to prevent outside code
	   * from falsely setting BITS.
	   */
	protected function isFlagSet($flag) {
		return (($this->access_mask & $flag) == $flag);
	}

	/*
	   * Note: these functions are protected to prevent outside code
	   * from falsely setting BITS.
	   */
	protected function areFlagsSet() {
		$numargs = func_num_args();
		$arg_list = func_get_args();

		for ($i = 0; $i < $numargs; $i++) {
			$perm = $arg_list[$i];
			if (is_array($perm)) {
				$perm = $perm[0];
			}
			if ($this->isFlagSet($perm)) {
				continue;
			}
			else {
				return false;
			}
		}

		return true;
	}

}