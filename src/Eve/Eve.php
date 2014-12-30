<?php

namespace Eve;

use Eve\Api\ApiKey;

/**
 * Class Eve
 *
 * @package Eve
 */
class Eve extends BaseEve {

	/**
	 *
	 */
	static protected function setupPheal() {
		parent::setupPheal();

		// eve scope data calls
		self::setScopeType(self::EVE_API_DATA_SCOPE_EVE);
	}

	// ------------------------------------------

	/**
	 * Returns a list of all alliances in EVE Online.
	 *
	 * @link https://neweden-dev.com/EVE/AllianceList
	 * @return bool|object
	 */
	static public function AllianceList() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('AllianceList');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns a list of certificates in eve.
	 *
	 * @deprecated deprecated since Eve Online Rubicon v1.0
	 * @link https://neweden-dev.com/EVE/CertificateTree
	 * @return bool|object
	 */
	static public function CertificateTree() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('CertificateTree');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns the characterName, characterID, corporationName, corporationID,
	 * allianceName, allianceID, factionName, factionID for the given list of characterIDs.
	 *
	 * @param string|array $ids
	 * @link https://neweden-dev.com/EVE/CharacterAffiliation
	 * @return bool|object
	 */
	static public function CharacterAffiliation($ids) {
		// setup classes
		self::setupPheal();

		// allow passing in an array of ids, convert to proper format
		if (is_array($ids)) {
			$ids = implode(',', $ids);
		}

		$data = array('ids' => $ids);

		// make api call
		$response = self::_apiCall('CharacterAffiliation', $data);

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns the ownerID for a given character, faction, alliance or
	 * corporation name, or the typeID for other objects such as
	 * stations, solar systems, planets, etc.
	 *
	 * @param string|array $names
	 * @link https://neweden-dev.com/EVE/CharacterID
	 * @return bool|object
	 */
	static public function CharacterID($names) {
		// setup classes
		self::setupPheal();

		// allow passing in an array of names, convert to proper format
		if (is_array($names)) {
			$names = implode(',', $names);
		}

		$data = array('names' => $names);

		// make api call
		$response = self::_apiCall('CharacterID', $data);

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Return the same data as a show info call on the character would do in the client.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @link https://neweden-dev.com/EVE/CharacterInfo
	 * @return bool|object
	 */
	static public function CharacterInfoKeyless($characterID) {
		// setup classes
		self::setupPheal();

		// data array
		$data = array('characterID' => $characterID);

		// make api call
		$response = self::_apiCall('CharacterInfo', $data, null, 'CharacterInfoKeyless');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * With a limited API key it will return the same data as a show info call on the character would do
	 * in the client and add total skill points as well as the current ship you are in and its name.
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/EVE/CharacterInfo
	 * @return bool|object
	 */
	static public function CharacterInfoPublic($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// data array
		$data = array('characterID' => $characterID);

		// make api call
		$response = self::_apiCall('CharacterInfo', $data, $key, 'CharacterInfoPublic');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * With a limited API key it will return the same data as a show info call on the character would do
	 * in the client and add total skill points as well as the current ship you are in and its name and
	 * your account balance and your last known location (cached).
	 *
	 * @param int $characterID - The ID of the character for the requested data
	 * @param ApiKey $key - Api EveKey object used to auth with the Eve Online API
	 * @link https://neweden-dev.com/EVE/CharacterInfo
	 * @return bool|object
	 */
	static public function CharacterInfoPrivate($characterID, ApiKey $key) {
		// setup classes
		self::setupPheal();

		// data array
		$data = array('characterID' => $characterID);

		// make api call
		$response = self::_apiCall('CharacterInfo', $data, $key, 'CharacterInfoPrivate');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns the name associated with an ownerID.
	 *
	 * @param $ids string|array
	 * @link https://neweden-dev.com/EVE/CharacterName
	 * @return bool|object
	 */
	static public function CharacterName($ids) {
		// setup classes
		self::setupPheal();

		// allow passing in an array of ids, convert to proper format
		if (is_array($ids)) {
			$ids = implode(',', $ids);
		}

		$data = array('ids' => $ids);

		// make api call
		$response = self::_apiCall('CharacterName', $data);

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Get a list of all conquerable stations in Eve Online.
	 *
	 * @link https://neweden-dev.com/EVE/ConquerableStationList
	 * @return bool|object
	 */
	static public function ConquerableStationList() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('ConquerableStationList');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns a list of error codes that can be returned by the EVE API servers.
	 * Error types are broken into the following categories according to their first digit:
	 *   1xx - user input
	 *   2xx - authentication
	 *   5xx - server
	 *   9xx - miscellaneous
	 *
	 * @link https://neweden-dev.com/EVE/ErrorList
	 * @return bool|object
	 */
	static public function ErrorList() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('ErrorList');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns global stats on the factions in factional warfare including
	 * the number of pilots in each faction, the number of systems they control,
	 * and how many kills and victory points each and all factions obtained
	 * yesterday, in the last week, and total.
	 *
	 * @link https://neweden-dev.com/EVE/FacWarStats
	 * @return bool|object
	 */
	static public function FacWarStats() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('FacWarStats');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns Factional Warfare Top 100 Stats
	 *
	 * @link https://neweden-dev.com/EVE/FacWarTopStats
	 * @return bool|object
	 */
	static public function FacWarTopStats() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('FacWarTopStats');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns a list of transaction types used in the Character::WalletJournal()
	 *
	 * @link https://neweden-dev.com/EVE/RefTypes
	 * @return bool|object
	 */
	static public function RefTypes() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('RefTypes');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Dataset of currently in-game skills (including unpublished skills).
	 *
	 * @link https://neweden-dev.com/EVE/SkillTree
	 * @return bool|object
	 */
	static public function SkillTree() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('SkillTree');

		// return data
		return $response;
	}

	// ------------------------------------------

	/**
	 * Returns the name associated with a typeID.
	 *
	 * @param $ids string|array
	 * @link https://neweden-dev.com/EVE/TypeName
	 * @return bool|object
	 */
	static public function TypeName($ids) {
		// setup classes
		self::setupPheal();

		// allow passing in an array of ids, convert to proper format
		if (is_array($ids)) {
			$ids = implode(',', $ids);
		}

		$data = array('ids' => $ids);

		// make api call
		$response = self::_apiCall('TypeName', $data);

		// return data
		return $response;
	}
}