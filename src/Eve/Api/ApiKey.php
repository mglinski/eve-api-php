<?php
/**
 * ApiKey.php
 * Created by: Matthew
 * Date: 7/18/14 6:48 PM
 */

namespace Eve\Api;

use Eve\Account;

/**
 * Class ApiKey
 *
 * @package Eve\Api
 */
class ApiKey extends EveBitMask {

	/**
	 * @var int|null
	 */
	protected $id = null;

	/**
	 * @var null|string
	 */
	protected $vcode = null;

	/**
	 * @var null
	 */
	protected $type = null;

	/**
	 * @var null
	 */
	protected $access_mask = null;

	/**
	 * @var null
	 */
	protected $expire_date = null;

	/**
	 * @var null
	 */
	protected $raw_key_info = null;

	/**
	 * @param int $key_id
	 * @param string $key_vcode
	 */
	public function __construct($key_id = 0, $key_vcode = '') {
		// if valid key
		if ($key_id != 0 and $key_vcode != "") {
			$this->id = $key_id;
			$this->vcode = $key_vcode;

			$this->updateKeyWithAPI();
		}
	}

	/**
	 * @return bool|\stdClass
	 */
	public function getKey() {
		if ($this->id != 0 and $this->vcode != "") {
			$key = new \stdClass();

			$key->id = $this->id;
			$key->vcode = $this->vcode;
			$key->type = $this->type;
			$key->access_mask = $this->access_mask;
			$key->expire_date = $this->expire_date;

			return $key;
		}
		else {
			return false;
		}
	}

	/**
	 * @param $key_id
	 * @param $key_vcode
	 * @return bool
	 */
	public function setKey($key_id, $key_vcode) {
		$this->id = $key_id;
		$this->vcode = $key_vcode;

		return $this->updateKeyWithAPI();
	}

	/**
	 * @return bool
	 */
	private function updateKeyWithAPI() {
		$key_info = Account::APIKeyInfo($this);
		$this->raw_key_info = $key_info;

		if ($key_info != false and @$key_info->key->accessMask != 0) {
			$this->type = $this->scope = strtolower($key_info->key->type);
			$this->access_mask = $key_info->key->accessMask;

			if ($key_info->key->expires == '') {
				$this->expire_date = -1;
			}
			else {
				$this->expire_date = strtotime($key_info->key->expires);
			}
			return true;
		}
		return false;
	}

	/**
	 * @return bool
	 */
	public function hasNeededPermissions() {
		return $this->areFlagsSet(func_get_args());
	}

	/**
	 * @return null
	 */
	public function getRawKeyInfo() {
		return $this->raw_key_info;
	}

	/**
	 * @return int|null
	 */
	public function getKeyID() {
		return $this->id;
	}

	/**
	 * @param $id
	 */
	public function setKeyID($id) {
		$this->id = $id;
	}

	/**
	 * @return null|string
	 */
	public function getKeyVCode() {
		return $this->vcode;
	}

	/**
	 * @param $vcode
	 */
	public function setKeyVCode($vcode) {
		$this->vcode = $vcode;
	}

	/**
	 * @return null
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param $type
	 */
	public function setKeyType($type) {
		$this->vcode = $type;
	}

	/**
	 * @return null
	 */
	public function getKeyAccessMask() {
		return $this->access_mask;
	}

	/**
	 * @param $access_mask
	 */
	public function setKeyAccessMask($access_mask) {
		$this->access_mask = $access_mask;
	}

	/**
	 * @return null
	 */
	public function getKeyExpireDate() {
		return $this->expire_date;
	}

	/**
	 * @param $expire_date
	 */
	public function setKeyExpireDate($expire_date) {
		$this->expire_date = $expire_date;
	}

} 