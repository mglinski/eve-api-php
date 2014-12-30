<?php

namespace Eve;

use Eve\Api\EveKey;

/**
 * Class Account
 * @package Eve
 */
class Account extends BaseEve
{
	static protected function setupPheal()
	{
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
	 * @param EveKey $key
	 *
	 * @link
	 * @return bool|object
	 */
	static public function AccountStatus(EveKey $key)
	{
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
	 * @param EveKey $key
	 *
	 * @link
	 * @return bool|object
	 */
	static public function APIKeyInfo(EveKey $key)
	{
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
	 * @param EveKey $key
	 *
	 * @link
	 * @return bool|object
	 */
	static public function Characters(EveKey $key)
	{
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('Characters', array(), $key);

		// return data
		return $response;
	}
}