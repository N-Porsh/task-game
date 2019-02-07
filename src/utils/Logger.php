<?php

namespace App\Utils;

use Monolog\Logger as MonologLogger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\UidProcessor;

class Logger
{
	private static $logger;

	private function __construct(){}

	/**
	 * @param $channelName
	 * @return MonologLogger
	 * @throws \Exception
	 */
	public static function getLogger($channelName)
	{
		$dateFormat = "Y-m-d H:i:s";
		$output = "[%datetime%] %channel%.%level_name%: %message% %extra% %context% \n";
		// create a formatter
		$formatter = new LineFormatter($output, $dateFormat);

		// Create a handler
		$stream = new StreamHandler(__DIR__ . LOGS_PATH, MonologLogger::DEBUG);
		$stream->setFormatter($formatter);

		static::$logger = new MonologLogger($channelName);
		static::$logger->pushProcessor(new UidProcessor());
		static::$logger->pushHandler($stream);
		return static::$logger;
	}
}
