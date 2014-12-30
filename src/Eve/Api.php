<?php

namespace Eve;

/**
 * Class Api
 * @package Eve
 */
class Api extends BaseEve
{
	static protected function setupPheal()
	{
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
	static public function CallList()
	{
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('CallList');

		// return data
		return $response;
	}
}