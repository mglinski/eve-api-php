<?php

namespace Eve;

use Eve\Api\EveApi;

/**
 * Class EveApi
 *
 * @package EveApi
 */
class Api extends EveApi {

	/**
	 * Ensure that the API calls we make in this class are using the right scope.
	 */
	static protected function setupPheal() {
		parent::setupPheal();

		// api scope data calls
		self::setScopeType(self::EVE_API_DATA_SCOPE_API);
	}

	// ------------------------------------------

	/**
	 * Returns a list of the API Calls that contain private Character or
	 * Corporation information and which access bits are required.
	 *
	 * @link https://neweden-dev.com/API/CallList
	 * @return bool|object
	 */
	static public function CallList() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('CallList');

		// return data
		return $response;
	}
}