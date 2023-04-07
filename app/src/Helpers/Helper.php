<?php

declare(strict_types=1);

namespace App\Src\Helpers;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

use Illuminate\Database\Capsule\Manager as Capsule;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Helper
{
    public static function connectToDb() : void
    {
        $db_params = Helper::getConfig();

        $capsule = new Capsule;

        $capsule->addConnection([
           "driver" => "mysql",
           "host" => $db_params['host'],
           "database" => $db_params['db'],
           "username" => $db_params['usr'],
           "password" => $db_params['pwd'],
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public static function getConfig() : array
    {
        return require __DIR__ . './../../config.php';
    }
   
    public static function log($msg) : void
    {
        $logger = new Logger('mono');

        $logger->pushHandler(new StreamHandler(
            __DIR__ . '/../Logs/log', 
            Logger::DEBUG
        ));
        
        $logger->pushHandler(new FirePHPHandler());

        $logger->debug($msg);      
    }

    public static function logError(string $file, int $line, string $msg) : void
    {
        $base_url = self::getConfig()['base_url'];

        $file_name = ltrim($file, $_SERVER['DOCUMENT_ROOT'] . $base_url);

        $content = "in $file_name line $line - $msg";

        $logger = new Logger('mono');

        $logger->pushHandler(new StreamHandler(
            __DIR__ . '/../Logs/error_log', 
            Logger::ERROR
        ));
        
        $logger->pushHandler(new FirePHPHandler());

        $logger->error($content);   
    }

    public static function getTestToken() : string
    {
        return require __DIR__ . "./../../test/data/test_token.php";
    }

    public static function getTestData(string $name) : array
    {
        return require __DIR__ . "./../../test/data/data_$name.php";
    }

    public static function runAllTests() : void
    {
        $tests = [
            'auth',
            'artwork',
            'artworks',
            'buy_artwork',
            'user_artworks',
        ];

        $all_passed = array_reduce($tests, function($passed, $e) {
            return require __DIR__ . "./../../test/test_$e.php";

            return $passed && json_decode(
                file_get_contents(__DIR__ . './../../test/results/' . $e . '_test.json')
            )->all_passed;
        }, true);

        file_put_contents(__DIR__ . './../../test/results/all_test.json', json_encode(
            [
                'all_tests_passed' => (bool)$all_passed,
            ],
            JSON_PRETTY_PRINT
        ));
    }
}
