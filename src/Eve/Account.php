<?php

namespace Eve;

use Eve\Api\ApiKey;
use Eve\Api\EveApi;

/**
 * Class Account
 *
 * @package EveApi
 */
class Account extends EveApi {

	/**
	 * Ensure that the API calls we make in this class are using the right scope.
	 */
	static protected function setupPheal() {
		parent::setupPheal();

		// account scope data calls
		self::setScopeType(self::EVE_API_DATA_SCOPE_ACCOUNT);
	}

	// ------------------------------------------

	/**
	 * Returns basic account information including when the subscription lapses,
	 * total play time in minutes, total times logged on and date of account creation.
	 * In the case of game time code accounts it will also look for available offers of time codes.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Account/AccountStatus
	 * @return bool|object
	 */
	static public function AccountStatus(ApiKey $key) {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('AccountStatus', array(), $key);

		// return data
		return $response;
	}

	/**
	 * Returns information about the API key and a list of the characters exposed by it.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Account/APIKeyInfo
	 * @return bool|object
	 */
	static public function APIKeyInfo(ApiKey $key) {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('APIKeyInfo', array(), $key);

		// return data
		return $response;
	}

	/**
	 * Returns a list of all characters on an account.
	 *
	 * @param ApiKey $key
	 * @link https://neweden-dev.com/Account/Characters
	 * @return bool|object
	 */
	static public function Characters(ApiKey $key) {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('Characters', array(), $key);

		// return data
		return $response;
	}
}