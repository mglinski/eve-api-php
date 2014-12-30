<?php

namespace Eve\Api;

use Monolog\Handler\ErrorLogHandler;

/**
 * EveApi Config Singleton
 *
 * @package Eve
 */
final class Config  {

	/**
	 * @var string
	 */
	public $log_name = '';

	/**
	 * @var string
	 */
	public $log_handler = '';

	/**
	 * @var string
	 */
	public $user_agent = '';

	/**
	 * Call this method to get singleton
	 *
	 * @return Config
	 */
	public static function Instance()
	{
		static $inst = null;
		if ($inst === null) {
			$inst = new Config();

			// user configurable values
			$inst->user_agent = '';
			$inst->log_name = 'eve-api';
			$inst->log_handler = new ErrorLogHandler(ErrorLogHandler::SAPI, Logger::WARNING);
		}
		return $inst;
	}

	/**
	 * Private construct so nobody else can instance it
	 *
	 */
	private function __construct()
	{

	}

	/**
	 * Private clone so nobody else can copy it
	 *
	 */
	private function __clone()
	{

	}
}