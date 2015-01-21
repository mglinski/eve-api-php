<?php

namespace Eve;

use Eve\Api\EveApi;

/**
 * Class Server
 *
 * @package EveApi
 */
class Server extends EveApi {

	static protected function setupPheal() {
		parent::setupPheal();

		// server scope data calls
		self::setScopeType(self::EVE_API_DATA_SCOPE_SERVER);
	}

	// ------------------------------------------

	/**
	 * Returns current Tranquility status and number of players online.
	 *
	 * @link https://neweden-dev.com/Server/ServerStatus
	 * @return bool|object
	 */
	static public function ServerStatus() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('ServerStatus');

		// return data
		return $response;
	}
}