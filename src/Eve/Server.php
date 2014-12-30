<?php

namespace Eve;

/**
 * Class Server
 * @package Eve
 */
class Server extends BaseEve
{
	static protected function setupPheal()
	{
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
	static public function ServerStatus()
	{
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('ServerStatus');

		// return data
		return $response;
	}
}