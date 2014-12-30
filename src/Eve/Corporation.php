<?php

namespace Eve;

use Eve\Api\ApiKey;

/**
 * Class Corporation
 *
 * @package Eve
 */
class Corporation extends BaseEve {

	/**
	 *
	 */
	static function setupPheal() {
		parent::setupPheal();

		// corporation scope data calls
		self::setScopeType(self::EVE_API_DATA_SCOPE_CORPORATION);
	}

	// ------------------------------------------

	/**
	 * Returns the ISK balance of a corporation's wallets.
	 *
	 * @param ApiKey $key
	 * @link     https://neweden-dev.com/Corp/AccountBalance
	 * @return bool|object
	 */
	static public function AccountBalance(ApiKey $key) {
		// setup classes
		self::setupPheal();

		$response = self::_apiCall('AccountBalance', [], $key);
		return $response;
	}

	/**
	 * Returns a list of assets owned by a corporation.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/AssetList
	 * @return bool|object
	 */
	static public function AssetList(ApiKey $key) {
		// setup classes
		self::setupPheal();

		$response = self::_apiCall('AssetList', [], $key);
		return $response;
	}

	/**
	 * Returns the blueprints owned by the corporation. Cached for 24 hours.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function Blueprints(ApiKey $key) {
		// setup classes
		self::setupPheal();

		$response = self::_apiCall('CorporationSheet', null, $key);
		return $response;
	}

	/**
	 * Returns the corporation and the alliance contact lists. This is accessible
	 * by any character in any corporation. This call gives standings that the corp
	 * has set towards other characters and entities. For standings that others
	 * have set towards the corp, see the Standings API.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function ContactList(ApiKey $key) {
		// setup classes
		self::setupPheal();

		$response = self::_apiCall('ContactList', null, $key);
		return $response;
	}

	/**
	 * Shows corp container audit log.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function ContainerLog(ApiKey $key) {
		// setup classes
		self::setupPheal();

		$response = self::_apiCall('ContainerLog', null, $key);
		return $response;
	}

	/**
	 * Lists contracts issued within the last month as well as
	 * all contracts marked as outstanding or in-progress.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function Contracts(ApiKey $key) {
		// setup classes
		self::setupPheal();

		$response = self::_apiCall('Contracts', null, $key);
		return $response;
	}

	/**
	 * Lists items that a specified contract contains, use the contractID parameter to specify the contract.
	 *
	 * @param        $contractID
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function ContractItems($contractID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		$data = ['contractID' => $contractID];

		$response = self::_apiCall('ContractItems', $data, $key);
		return $response;
	}

	/**
	 * Lists the latest bids that have been made to any recent auctions.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function ContractBids(ApiKey $key) {
		// setup classes
		self::setupPheal();

		$data = [];

		$response = self::_apiCall('ContractBids', $data, $key);
		return $response;
	}

	/**
	 * Returns attributes relating to a specific corporation.
	 *
	 * @param int $corporationID
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function CorporationSheetPublic($corporationID) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = ['corporationID' => $corporationID];

		$response = self::_apiCall('CorporationSheet', $data, null, 'CorporationSheet');
		return $response;
	}

	/**
	 * Returns a list of market transactions for a corporation.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function CorporationSheetPrivate(ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = [];

		$response = self::_apiCall('CorporationSheet', $data, $key, 'CorporationSheet');
		return $response;
	}

	/**
	 * Returns a list of Facilities for a corporation.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function Facilities(ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = [];

		$response = self::_apiCall('Facilities', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of Facilities for a corporation.
	 *
	 * @param        $characterID
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletTransactions
	 * @return bool|object
	 */
	static public function FacWarStats($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = [];

		// implement wallet divisions
		if ($characterID != 0) {
			$data['characterID'] = $characterID;
		}

		$response = self::_apiCall('FacWarStats', $data, $key);
		return $response;
	}

	/**
	 * Returns the corporation jobs (started from a corporation hangar) for a
	 * corporation that have not finished yet. Cached for 15 minutes.
	 *
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/FacWarStats
	 * @return bool|object
	 */
	static public function IndustryJobs(ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = [];

		$response = self::_apiCall('IndustryJobs', $data, $key);
		return $response;
	}

	/**
	 * Returns the corporation jobs (started from personal hangar) for a character
	 * that have not finished yet. Cached for 15 minutes.
	 *
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/FacWarStats
	 * @return bool|object
	 */
	static public function IndustryJobsHistory(ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = [];

		$response = self::_apiCall('IndustryJobsHistory', $data, $key, 'IndustryJobs');
		return $response;
	}

	/**
	 * Returns a list of kills where this character received the final blow and losses of this character.
	 * For characters, returns the most recent 25.
	 *
	 * @param int $fromID - Optional; Used for walking the dataset backwards to get more entries
	 * @param int $rowCount - Optional; Used for specifying the amount of rows to return. Default is 50. Maximum is 2560
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/IndustryJobs
	 * @return bool|object
	 */
	static public function KillMails($fromID, $rowCount, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = ['rowCount' => $rowCount];

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
	 * @param string $ids - Comma separated list of itemIDs
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function Locations($ids, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['ids' => $ids];

		$response = self::_apiCall('Locations', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of market orders that are either not expired or have expired in the past week (at most).
	 *
	 * @param        $orderID - Market order ID to fetch an order that is no longer open.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function MarketOrders($orderID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = [];

		if ($orderID != 0) {
			$data['orderID'] = $orderID;
		}

		$response = self::_apiCall('MarketOrders', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of medals created by this corporation.
	 *
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function Medals(ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = [];

		$response = self::_apiCall('Medals', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of medals issued to members.
	 *
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function MemberMedals(ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = [];

		$response = self::_apiCall('MemberMedals', $data, $key);
		return $response;
	}

	/**
	 * Returns the security roles of members in a corporation.
	 *
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function MemberSecurity(ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = [];

		$response = self::_apiCall('MemberSecurity', $data, $key);
		return $response;
	}

	/**
	 * Returns info about corporation role changes for members and who did it
	 *
	 * @param        $characterID
	 * @param ApiKey $key - Api ApiKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function MemberSecurityLog($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['characterID' => $characterID,];

		$response = self::_apiCall('MemberSecurityLog', $data, $key);
		return $response;
	}

	/**
	 * For player corps this returns the member list
	 *
	 * @param        $extended
	 * @param ApiKey $key - Api ApiKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function MemberTracking($extended, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['extended' => (int)$extended,];

		$response = self::_apiCall('MemberSecurityLog', $data, $key);
		return $response;
	}

	/**
	 * For player corps this returns the member list
	 *
	 * @param        $characterID - Character ID of a char with director or higher access in the corp the outposts belong to.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function OutpostList($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['characterID' => (int)$characterID,];

		$response = self::_apiCall('OutpostList', $data, $key);
		return $response;
	}

	/**
	 * This new Outpost API will allow you to pull information about the corporation’s outposts, which will require a
	 * full API key from the a director(or CEO) of the corporation which the outpost belongs to.
	 *
	 * @param        $characterID - Character ID of a char with director or higher access in the corp the outposts belong to.
	 * @param        $itemID - Item ID of the outpost listed in OutpostList API call.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function OutpostServiceDetail($characterID, $itemID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['characterID' => (int)$characterID, 'itemID' => (int)$itemID,];

		$response = self::_apiCall('OutpostServiceDetail', $data, $key);
		return $response;
	}

	/**
	 * Returns the character and corporation share holders of a corporation.
	 *
	 * @param        $characterID - Character ID of a char with director? or higher access in the corp you want the
	 *                              share holders for.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function Shareholders($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['characterID' => (int)$characterID,];

		$response = self::_apiCall('Shareholders', $data, $key);
		return $response;
	}

	/**
	 * Returns the standings from NPC corporations and factions as well as agents.
	 *
	 * @param        $characterID - Character ID of a char with director? or higher access in
	 *                              the corp you want the standings for.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function Standings($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['characterID' => (int)$characterID,];

		$response = self::_apiCall('Standings', $data, $key);
		return $response;
	}

	/**
	 * Shows the settings and fuel status of a POS.
	 *
	 * @param        $itemID - ItemID of the POS as given in the starbase list
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function StarbaseDetail($itemID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['itemID' => (int)$itemID,];

		$response = self::_apiCall('StarbaseDetail', $data, $key);
		return $response;
	}

	/**
	 * Shows the list and states of POS'es.
	 *
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function StarbaseList(ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = [];

		$response = self::_apiCall('StarbaseList', $data, $key);
		return $response;
	}

	/**
	 * Shows the list and states of POS'es.
	 *
	 * @param        $characterID - Character ID of a char with director? or higher access in the corp you want the titles for.
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link     https://neweden-dev.com/Char/Locations
	 * @return bool|object
	 */
	static public function Titles($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		//
		$data = ['characterID' => $characterID,];

		$response = self::_apiCall('Titles', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of journal transactions for corporation.
	 *
	 * @param int $fromID
	 * @param int $rowCount
	 * @param int $accountKey
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletJournal
	 * @return bool|object
	 */
	static public function WalletJournal($fromID, $rowCount, $accountKey, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = ['rowCount' => $rowCount];

		// implement wallet divisions
		if ($accountKey != 0) {
			$data['accountKey'] = $accountKey;
		}

		// implement Walking
		if ($fromID != 0) {
			$data['fromID'] = $fromID;
		}

		$response = self::_apiCall('WalletJournal', $data, $key);
		return $response;
	}

	/**
	 * Returns a list of journal transactions for corporation.
	 *
	 * @param int $fromID
	 * @param int $rowCount
	 * @param int $accountKey
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Corp/WalletJournal
	 * @return bool|object
	 */
	static public function WalletTransactions($fromID, $rowCount, $accountKey, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// paginate
		$data = ['rowCount' => $rowCount];

		// implement wallet divisions
		if ($accountKey != 0) {
			$data['accountKey'] = $accountKey;
		}

		// implement Walking
		if ($fromID != 0) {
			$data['fromID'] = $fromID;
		}

		$response = self::_apiCall('WalletTransactions', $data, $key);
		return $response;
	}
}