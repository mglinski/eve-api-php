<?php

namespace Eve\Api;

/**
 * Class BaseApi
 *
 * @package EveApi
 */
abstract class BaseApi {

	// Various API data scopes
	const EVE_API_DATA_SCOPE_ACCOUNT = 'account';
	const EVE_API_DATA_SCOPE_CHARACTER = 'char';
	const EVE_API_DATA_SCOPE_CORPORATION = 'corp';
	const EVE_API_DATA_SCOPE_EVE = 'eve';
	const EVE_API_DATA_SCOPE_MAP = 'map';
	const EVE_API_DATA_SCOPE_SERVER = 'server';
	const EVE_API_DATA_SCOPE_API = 'api';

	/**
	 * @var string
	 */
	protected static $scopeType = null;

	/**
	 * @var null
	 */
	protected static $logger = null;

	/**
	 * @var string
	 */
	protected static $clientInstances = array();

	/**
	 * Setter for callType static variable
	 * Various api call dir prefixes.
	 * Defined here:
	 *
	 * @link http://wiki.eve-id.net/APIv2_Page_Index
	 * @param $type string
	 */
	static protected function setScopeType($type) {
		$type = trim(strtolower($type));
		switch ($type) {
			case self::EVE_API_DATA_SCOPE_ACCOUNT:
				self::$scopeType = self::EVE_API_DATA_SCOPE_ACCOUNT;
				break;

			case self::EVE_API_DATA_SCOPE_API:
				self::$scopeType = self::EVE_API_DATA_SCOPE_API;
				break;

			case self::EVE_API_DATA_SCOPE_CHARACTER:
				self::$scopeType = self::EVE_API_DATA_SCOPE_CHARACTER;
				break;

			case self::EVE_API_DATA_SCOPE_CORPORATION:
				self::$scopeType = self::EVE_API_DATA_SCOPE_CORPORATION;
				break;

			case self::EVE_API_DATA_SCOPE_MAP:
				self::$scopeType = self::EVE_API_DATA_SCOPE_MAP;
				break;

			case self::EVE_API_DATA_SCOPE_SERVER:
				self::$scopeType = self::EVE_API_DATA_SCOPE_SERVER;
				break;

			case self::EVE_API_DATA_SCOPE_EVE:
				self::$scopeType = self::EVE_API_DATA_SCOPE_EVE;
				break;
		}
	}

	/**
	 * @param \ApiKey $key
	 * @return bool
	 */
	protected function isCorpApiKey(\ApiKey $key) {
		if ($key->type->id == \ApiKeyType::corporationKeyType) {
			return true;
		}
		return false;
	}

	/**
	 * @param $keyID
	 * @param $keyVCode
	 * @param $scopeType
	 * @return bool
	 */
	protected static function getInstanceHash($keyID, $keyVCode, $scopeType) {
		return sha1($keyID . $keyVCode . $scopeType);
	}

	/**
	 * @param \ApiKey $key
	 * @return bool
	 */
	protected function isCharApiKey(\ApiKey $key) {
		if ($key->type->id == \ApiKeyType::characterKeyType) {
			return true;
		}

		return false;
	}
}