<?php

namespace Eve;

/**
 * Class Map
 *
 * @package Eve
 */
class Map extends BaseEve {

	/**
	 *
	 */
	static protected function setupPheal() {
		parent::setupPheal();

		// map scope data calls
		self::setScopeType(self::EVE_API_DATA_SCOPE_MAP);
	}

	// ------------------------------------------

	/**
	 * Returns a list of contestable solarsystems and the NPC faction currently occupying them.
	 * It should be noted that this file only returns a non-zero ID if the occupying faction
	 * is not the sovereign faction.
	 *
	 * @link https://neweden-dev.com/Map/FacWarSystems
	 * @return bool|object
	 */
	static public function FacWarSystems() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('FacWarSystems');

		// return data
		return $response;
	}

	/**
	 * Get a list of all system that have had gate or cyno jumps occur in the last hour.
	 * Note that only systems with jumps are shown, if the system has no jumps, it's not listed.
	 *
	 * @link https://neweden-dev.com/Map/Jumps
	 * @return bool|object
	 */
	static public function Jumps() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('Jumps');

		// return data
		return $response;
	}

	/**
	 * Returns the number of kills in solarsystems within the last hour.
	 * Only solar system where kills have been made are listed, so assume zero in case the system is not listed.
	 *
	 * @link https://neweden-dev.com/Map/Kills
	 * @return bool|object
	 */
	static public function Kills() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('Kills');

		// return data
		return $response;
	}

	/**
	 * Returns a list of solar systems and what faction or alliance controls them.
	 *
	 * @link https://neweden-dev.com/Map/Sovereignty
	 * @return bool|object
	 */
	static public function Sovereignty() {
		// setup classes
		self::setupPheal();

		// make api call
		$response = self::_apiCall('Sovereignty');

		// return data
		return $response;
	}
}