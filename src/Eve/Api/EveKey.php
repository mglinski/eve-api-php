<?php
/**
 * EveKey.php
 * Created by: Matthew
 * Date: 7/18/14 6:48 PM
 */

namespace Eve\Api;

use Eve\Account;

class EveKey extends EveBitMask {

	protected $id = null;
	protected $vcode = null;
	protected $type = null;
	protected $access_mask = null;
	protected $expire_date = null;
	protected $raw_key_info = null;

	public function __construct($key_id = 0, $key_vcode = '')
	{
		// if valid key
		if($key_id != 0 and $key_vcode != "")
		{
			$this->id = $key_id;
			$this->vcode = $key_vcode;

			$this->updateKeyWithAPI();
		}
	}

	public function getKey()
	{
		if($this->id != 0 and $this->vcode != "")
		{
			$key = new \stdClass();

			$key->id = $this->id;
			$key->vcode = $this->vcode;
			$key->type = $this->type;
			$key->access_mask = $this->access_mask;
			$key->expire_date = $this->expire_date;

			return $key;
		}
		else
		{
			return false;
		}
	}

	public function setKey($key_id, $key_vcode)
	{
		$this->id = $key_id;
		$this->vcode = $key_vcode;

		return $this->updateKeyWithAPI();
	}

	private function updateKeyWithAPI()
	{
		$key_info = Account::APIKeyInfo($this);
		$this->raw_key_info = $key_info;

		if($key_info != false and @$key_info->key->accessMask != 0)
		{
			$this->type = $this->scope = strtolower($key_info->key->type);
			$this->access_mask = $key_info->key->accessMask;

			if($key_info->key->expires == '')
			{
				$this->expire_date = -1;
			}
			else
			{
				$this->expire_date = strtotime($key_info->key->expires);
			}
			return true;
		}
		return false;
	}

	public function hasNeededPermissions()
	{
		return $this->areFlagsSet(func_get_args());
	}

	public function getRawKeyInfo()
	{
		return $this->raw_key_info;
	}

	public function getKeyID()
	{
		return $this->id;
	}

	public function setKeyID($id)
	{
		$this->id = $id;
	}

	public function getKeyVCode()
	{
		return $this->vcode;
	}

	public function setKeyVCode($vcode)
	{
		$this->vcode = $vcode;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setKeyType($type)
	{
		$this->vcode = $type;
	}

	public function getKeyAccessMask()
	{
		return $this->access_mask;
	}

	public function setKeyAccessMask($access_mask)
	{
		$this->access_mask = $access_mask;
	}

	public function getKeyExpireDate()
	{
		return $this->expire_date;
	}

	public function setKeyExpireDate($expire_date)
	{
		$this->expire_date = $expire_date;
	}

} 