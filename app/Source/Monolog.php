<?php


namespace Form\Source;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Monolog
{

    private const FILE_LOG = PATH_LOG . '/' . APP_NAME . '.log';

    private const CHANNEL = 'debug';


    private static function makeObject(): Logger
    {
        $log = new Logger(self::CHANNEL);

        $log->pushHandler(new StreamHandler(self::FILE_LOG, Logger::DEBUG));

        return $log;
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public static function INFO(string $message, array $context = []): void
    {
        self::makeObject()->info($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public static function NOTICE(string $message, array $context = []): void
    {
        self::makeObject()->notice($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public static function WARNING(string $message, array $context = []): void
    {
        self::makeObject()->warning($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public static function ERROR(string $message, array $context = []): void
    {
        self::makeObject()->error($message, $context);
    }
}
