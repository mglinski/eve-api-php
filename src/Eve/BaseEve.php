<?php
namespace Eve;

use \Pheal\Pheal;
use \Pheal\Core\Config as PhealConfig;
use \Pheal\Log\FileStorage as PhealLogFileStorage;
use \Pheal\Cache\FileStorage as PhealCacheFileStorage;
use \Pheal\Access\StaticCheck as PhealAccessStaticCheck;
use \Pheal\Exceptions\AccessException as PhealAccessException;
use \Pheal\Exceptions\APIException as PhealAPIException;
use \Pheal\Exceptions\ConnectionException as PhealConnectionException;
use \Pheal\Exceptions\HTTPException as PhealHTTPException;
use \Pheal\Exceptions\PhealException;

use Eve\Api\EveKey;

/**
 * Class BaseEve
 * @package Eve
 */
Class BaseEve
{
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
	 * @var string
	 */
	protected static $clientInstances = array();

	/**
	 * Setter for callType static variable
	 * Various api call dir prefixes.
	 *
	 * Defined here:
	 * @link http://wiki.eve-id.net/APIv2_Page_Index
	 *
	 * @param $type string
	 */
	static protected function setScopeType($type)
	{
		$type = trim(strtolower($type));
		switch($type)
		{
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
	 *
	 * @return bool
	 */
	protected function isCorpApiKey(\ApiKey $key)
	{
		if($key->type->id == \ApiKeyType::corporationKeyType)
		{
			return true;
		}
		return false;
	}

	/**
	 * @param $keyID
	 * @param $keyVCode
	 * @param $scopeType
	 *
	 * @return bool
	 */
	protected static function getInstanceHash($keyID, $keyVCode, $scopeType)
	{
		return sha1($keyID . $keyVCode . $scopeType);
	}

	/**
	 * @param \ApiKey $key
	 *
	 * @return bool
	 */
	protected function isCharApiKey(\ApiKey $key)
	{
		if($key->type->id == \ApiKeyType::characterKeyType)
		{
			return true;
		}
		return false;
	}

	/**
	 *
	 */
	static protected function setupPheal()
	{
		// only setup cache folders the first time the api setup method is called
		if(self::$scopeType === null)
		{
			// get storage deployment location
			$dir = dirname(realpath(__FILE__)).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_storage';

			//PhealConfig::getInstance()->log = new PhealLogFileStorage($dir.DIRECTORY_SEPARATOR.'log');
			//PhealConfig::getInstance()->cache = new PhealCacheFileStorage($dir.DIRECTORY_SEPARATOR.'cache');
			PhealConfig::getInstance()->access = new PhealAccessStaticCheck();
			PhealConfig::getInstance()->http_user_agent = 'Brave Collective v1.2 [admin@braveineve.com]';
		}
	}

	/**
	 * Method to decode any API EveKey and Args and make the correct call to the remote API Servers.
	 *
	 * @param                      $name
	 * @param array                $args
	 * @param \Eve\Api\EveKey      $key
	 * @param null | string        $mask_override
	 *
	 * @return object | bool
	 */
	static protected function _apiCall($name, $args = array(), EveKey $key = null, $mask_override = null)
	{
		//self::setupPheal();


		if($key == null)
		{
			$pheal = new Pheal();

			$scope = self::$scopeType.'Scope';
			$pheal = $pheal->$scope;
		}
		else
		{
			// override default function name if required
			$mask = $name;
			if($mask_override != null)
			{
				$mask = $mask_override;
			}

			// figure out key type and check for access permission
			if($key->getType() == 'character')
			{
				// use default bitmask for a character based key for character scoped data
				$mask_list = EveKey::$masks_Character[$mask];

				// Eve data scope has some weird permissions we account for here
				if(self::$scopeType == self::EVE_API_DATA_SCOPE_EVE)
				{
					$mask_list = EveKey::$masks_Eve[$mask];
				}

				// Check key bitmask for valid data access
				if(!$key->hasNeededPermissions($mask_list))
				{
					return false;
				}
			}
			else if($key->getType() == 'corporation')
			{
				// thankfully, corporation scoped keys are a bit more sane
				if(!$key->hasNeededPermissions(EveKey::$masks_Corporation[$mask]))
				{
					return false;
				}
			}

			// resolve unique instance hash based on KEY_ID, KEY_VCODE, and DATA_SCOPE
			$hash = self::getInstanceHash($key->getKeyID(), $key->getKeyVCode(), self::$scopeType);

			// Reuse existing instance or make a new one
			if(isset(self::$clientInstances[$hash]))
			{
				$pheal = self::$clientInstances[$hash];
			}
			else
			{
				// build
				$pheal = new Pheal($key->getKeyID(), $key->getKeyVCode(), self::$scopeType);

				// save to instances array for future use
				self::$clientInstances[$hash] = $pheal;
			}
		}

		// Actually start trying to execute some data calls!
		try
		{

			// WOW So Magic
			$response = $pheal->$name($args);
			return $response;
		}
		catch( PhealException $e )
		{
			\Log::error($e->getMessage());
			return FALSE;
		}
		catch( PhealAPIException $e )
		{
			\Log::error($e->getMessage());
			return FALSE;
		}
		catch( PhealAccessException $e )
		{
			\Log::error($e->getMessage());
			return FALSE;
		}
		catch( PhealConnectionException $e )
		{
			\Log::error($e->getMessage());
			return FALSE;
		}
		catch( PhealHTTPException $e )
		{
			\Log::error($e->getMessage());
			return FALSE;
		}
		catch( Exception $e )
		{
			\Log::error($e->getMessage());
			return FALSE;
		}
	}
}