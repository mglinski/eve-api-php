<?php

namespace Eve;

use Eve\Api\ApiKey;

/**
 * Class Character
 *
 * @package Eve
 */
class Character extends BaseEve {

	/**
	 * Ensure that the API calls we make in this class are using the right scope.
	 */
	static protected function setupPheal() {
		parent::setupPheal();

		// character scope data calls
		self::setScopeType(self::EVE_API_DATA_SCOPE_CHARACTER);
	}

	// ------------------------------------------

	/**
	 * Returns the ISK balance of a character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/AccountBalance
	 * @return bool|object
	 */
	static public function AccountBalance($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		if ($characterID !== 0) {
			$data = array('characterID' => $characterID);
		}
		else {
			$data = array();
		}

		// make api call
		$response = self::_apiCall('AccountBalance', $data, $key);

		return $response;
	}

	/**
	 * Returns a list of assets owned by a character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/AssetList
	 * @return bool|object
	 */
	static public function AssetList($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		$data = array('characterID' => $characterID);

		$response = self::_apiCall('AssetList', $data, $key);
		return $response;
	}

	/**
	 * Returns the blueprints owned by the corporation. Cached for 24 hours.
	 *
	 * @param int $characterID
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function Blueprints($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		$data = array('characterID' => $characterID);

		$response = self::_apiCall('Blueprints', null, $key, 'AssetList');
		return $response;
	}

	/**
	 * Returns a list of all invited attendees for a given event.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param string $eventIDs - Comma separated string of event IDs
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/CalendarEventAttendees
	 * @return bool|object
	 */
	static public function CalendarEventAttendees($characterID, $eventIDs, ApiKey $key) {
		// setup classes
		self::setupPheal();

		$data = array('characterID' => $characterID, 'eventIDs' => $eventIDs);

		$response = self::_apiCall('CalendarEventAttendees', $data, $key);
		return $response;
	}

	/**
	 * Returns attributes relating to a specific character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/CharacterSheet
	 * @return bool|object
	 */
	static public function CharacterSheet($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		$data = array('characterID' => $characterID);

		$response = self::_apiCall('CharacterSheet', $data, $key);
		return $response;
	}

	/**
	 * Returns the character's contact and watch lists, including agents and respective standings set by the character.
	 * Also includes that character's corporation and/or alliance contacts.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/ContactList
	 * @return bool|object
	 */
	static public function ContactList($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('ContactList', $data, $key);
		return $response;
	}

	/**
	 * Lists the notifications received about having been added to someone's contact list.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/ContactNotifications
	 * @return bool|object
	 */
	static public function ContactNotifications($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('ContactNotifications', $data, $key);
		return $response;
	}

	/**
	 * Lists the personal contracts for a character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $contractID - Optional; contract ID to fetch a particular contract.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/Contracts
	 * @return bool|object
	 */
	static public function Contracts($characterID, $contractID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		if ($contractID !== 0) {
			$data['contractID'] = $contractID;
		}

		$response = self::_apiCall('Contracts', $data, $key);
		return $response;
	}

	/**
	 * Lists items that a specified contract contains.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $contractID - contract ID to fetch a particular contract.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/ContractItems
	 * @return bool|object
	 */
	static public function ContractItems($characterID, $contractID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID, 'contractID' => $contractID);

		$response = self::_apiCall('ContractItems', $data, $key);
		return $response;
	}

	/**
	 * Lists the latest bids that have been made to any recent auctions.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/ContractBids
	 * @return bool|object
	 */
	static public function ContractBids($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('ContractBids', $data, $key);
		return $response;
	}

	/**
	 * If the character is enlisted in Factional Warfare,
	 * this will return the faction the character is enlisted in,
	 * the current rank and the highest rank the character ever had attained,
	 * and how many kills and victory points the character obtained yesterday,
	 * in the last week, and total. Otherwise returns an error code.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/FacWarStats
	 * @return bool|object
	 */
	static public function FacWarStats($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('FacWarStats', $data, $key);
		return $response;
	}

	/**
	 * Returns the personal jobs (started from personal hangar) for a character
	 * that have not finished yet. Cached for 15 minutes.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/FacWarStats
	 * @return bool|object
	 */
	static public function IndustryJobs($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('IndustryJobs', $data, $key);
		return $response;
	}

	/**
	 * Returns the personal jobs (started from personal hangar) for a character
	 * that have not finished yet. Cached for 15 minutes.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/FacWarStats
	 * @return bool|object
	 */
	static public function IndustryJobsHistory($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('IndustryJobsHistory', $data, $key, 'IndustryJobs');
		return $response;
	}

	/**
	 * Returns a list of kills where this character received the final blow and losses of this character.
	 * For characters, returns the most recent 25.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $fromID - Optional; Used for walking the dataset backwards to get more entries
	 * @param int $rowCount - Optional; Used for specifying the amount of rows to return. Default is 50. Maximum is 2560
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/IndustryJobs
	 * @return bool|object
	 */
	static public function KillMails($characterID, $fromID, $rowCount, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = array('rowCount' => $rowCount, 'characterID' => $characterID);

		// implement Walking
		if ($fromID != 0) {
			$data['fromID'] = $fromID;
		}

		$response = self::_apiCall('KillMails', $data, $key);
		return $response;
	}

	/**
	 * Call will return the items name (or its type name if no user defined name exists) as well as their x,y,z coordinates.
	 * Coordinates should all be 0 for valid locations located inside of stations.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param string $ids - Comma separated list of itemIDs
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function Locations($characterID, $ids, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID, 'ids' => $ids);

		$response = self::_apiCall('Locations', $data, $key);
		return $response;
	}

	/**
	 * Returns the message bodies for mail.
	 * Returns the bodies of headers that have already been fetched
	 * with the Character/Mail_Messages_(Headers) call. It will also
	 * return a list of missing IDs that could not be accessed.
	 * Bodies cannot be accessed if you have not called for their
	 * headers recently.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param string $ids - comma separated list of messageIDs from self::MailMessages()
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/MailBodies
	 * @return bool|object
	 */
	static public function MailBodies($characterID, $ids, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID, 'ids' => $ids);

		$response = self::_apiCall('MailBodies', $data, $key);
		return $response;
	}

	/**
	 * Returns an XML document listing all mailing lists the character is currently a member of.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/MailingLists
	 * @return bool|object
	 */
	static public function MailingLists($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('MailingLists', $data, $key);
		return $response;
	}

	/**
	 * Returns the message headers for mail.
	 * The first request returns the latest 50 mails/200 notifications sent or
	 * received by the character within the last 10 days. Older items are skipped.
	 * Subsequent requests return only the new items received since the last request.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/MarketOrders
	 * @return bool|object
	 */
	static public function MailMessages($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('MailMessages', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of market orders for your character.
	 * The first request returns the latest 50 mails/200 notifications sent or
	 * received by the character within the last 10 days. Older items are skipped.
	 * Subsequent requests return only the new items received since the last request.
	 *
	 * @param int $characterID - ID of character whose orders you want to access.
	 * @param int $orderID - Optional; market order ID to fetch an order that is no longer open.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/MailMessages
	 * @return bool|object
	 */
	static public function MarketOrders($characterID, $orderID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		// implement optional argument
		if ($orderID != 0) {
			$data['orderID'] = $orderID;
		}

		$response = self::_apiCall('MarketOrders', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of medals the character has.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/Medals
	 * @return bool|object
	 */
	static public function Medals($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('Medals', $data, $key);
		return $response;
	}

	/**
	 * Returns the message bodies for notifications. Headers need to be requested via self::Notifications() first.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $ids - comma separated list of notificationIDs obtained via the self::Notifications() API call.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/Notifications
	 * @return bool|object
	 */
	static public function NotificationTexts($characterID, $ids, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID, 'ids' => $ids);

		$response = self::_apiCall('NotificationTexts', $data, $key);
		return $response;
	}

	/**
	 * Returns the message headers for notifications.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/NotificationTexts
	 * @return bool|object
	 */
	static public function Notifications($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('Notifications', $data, $key);
		return $response;
	}

	/**
	 * Returns the list of Planetary Colonies.
	 *  ** This method's data only updates on ingame view. **
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/PlanetaryColonies
	 * @return bool|object
	 */
	static public function PlanetaryColonies($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('PlanetaryColonies', $data, $key);
		return $response;
	}

	/**
	 * Returns the list of Planetary Pins from one Colony.
	 *  ** This method's data only updates on ingame view. **
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $planetID - The ID of the planet being queried
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/PlanetaryPins
	 * @return bool|object
	 */
	static public function PlanetaryPins($characterID, $planetID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID, 'planetID' => $planetID);

		$response = self::_apiCall('PlanetaryPins', $data, $key);
		return $response;
	}

	/**
	 * Returns the list of Planetary Routes from one Colony.
	 *  ** This method's data only updates on ingame view. **
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $planetID - The ID of the planet being queried
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/PlanetaryRoutes
	 * @return bool|object
	 */
	static public function PlanetaryRoutes($characterID, $planetID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID, 'planetID' => $planetID);

		$response = self::_apiCall('PlanetaryRoutes', $data, $key);
		return $response;
	}

	/**
	 * Returns the list of Planetary Links from one Colony.
	 *  ** This method's data only updates on ingame view. **
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $planetID - The ID of the planet being queried
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/PlanetaryLinks
	 * @return bool|object
	 */
	static public function PlanetaryLinks($characterID, $planetID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID, 'planetID' => $planetID);

		$response = self::_apiCall('PlanetaryLinks', $data, $key);
		return $response;
	}

	/**
	 * Returns information about agents character is doing research with.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/Research
	 * @return bool|object
	 */
	static public function Research($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('Research', $data, $key);
		return $response;
	}

	/**
	 * Returns the skills the character is currently training.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/SkillInTraining
	 * @return bool|object
	 */
	static public function SkillInTraining($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('SkillInTraining', $data, $key);
		return $response;
	}

	/**
	 * Returns the skill queue of the character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/SkillQueue
	 * @return bool|object
	 */
	static public function SkillQueue($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('SkillQueue', $data, $key);
		return $response;
	}

	/**
	 * Returns the standings towards a character from agents, NPC corporations and factions.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/Standings
	 * @return bool|object
	 */
	static public function Standings($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('Standings', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of all upcoming calendar events for a given character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/UpcomingCalendarEvents
	 * @return bool|object
	 */
	static public function UpcomingCalendarEvents($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = array('characterID' => $characterID);

		$response = self::_apiCall('UpcomingCalendarEvents', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of journal transactions for character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $fromID - Optional; Used for walking the dataset backwards to get more entries
	 * @param int $rowCount - Optional; Used for specifying the amount of rows to return. Default is 50. Maximum is 2560
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/WalletJournal
	 * @return bool|object
	 */
	static public function WalletJournal($characterID, $fromID, $rowCount, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = array('rowCount' => $rowCount, 'characterID' => $characterID);

		// implement Walking
		if ($fromID != 0) {
			$data['fromID'] = $fromID;
		}

		$response = self::_apiCall('WalletJournal', $data, $key);
		return $response;
	}

	/**
	 * Returns market transactions for a character.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param int $fromID - Optional; Used for walking the dataset backwards to get more entries
	 * @param int $rowCount - Optional; Used for specifying the amount of rows to return. Default is 50. Maximum is 2560
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/WalletTransactions
	 * @return bool|object
	 */
	static public function WalletTransactions($characterID, $fromID, $rowCount, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = array('rowCount' => $rowCount, 'characterID' => $characterID);

		// implement Walking
		if ($fromID != 0) {
			$data['fromID'] = $fromID;
		}

		$response = self::_apiCall('WalletTransactions', $data, $key);
		return $response;
	}
}