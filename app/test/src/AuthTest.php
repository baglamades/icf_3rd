<?php

declare(strict_types=1);

namespace App\Test\Src;

use App\Src\Controllers\AuthController;
use App\Test\Src\TestTrait;
use App\Src\Helpers\Helper;

class AuthTest
{
    use TestTrait;

    private string $url;

    public function __construct()
    {
        $this->url = Helper::getConfig()['api_endpoint'] . 'auth';
        $this->test_name = 'Auth test';
        $this->file_name = 'auth_test';
    }

    public function test($tests) : void
    {
        foreach ($tests as $test) {
            $_SERVER['PHP_AUTH_USER'] = $test['params']['username'];
            $_SERVER['PHP_AUTH_PW'] = $test['params']['password'];

            $auth = new AuthController();    
   
            $result = (array)json_decode($auth->auth());

            $this->onSuccess($test, $result);
            $this->onFail($test, $result);

            $this->results[] = [
                'username' => $test['params']['username'],
                'password' => $test['params']['password'],
                'pass' => $this->pass,
            ];
        }

        $this->getPassedTests();
        $this->getFailedTests();

        $this->logResults();
    }

    private function onSuccess(array $test, array $result) : void
    {
        if ($result['success']) { 
            $this->pass = 
                $result['success'] === $test['result']['success'] &&
                gettype($result['token']) === $test['result']['token']
                    ? true : false;
        }
    }

    private function onFail(array $test, array $result) : void
    {
        if (!$result['success']) { 
            $this->pass = 
                $result['success'] === $test['result']['success'] && 
                $result['error'] === $test['result']['error']
                    ? true : false;  
        }
    }
}
