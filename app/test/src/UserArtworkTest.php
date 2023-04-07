<?php

declare(strict_types=1);

namespace App\Test\Src;

use App\Src\Controllers\UserArtworkController;
use App\Test\Src\TestTrait;
use App\Src\Helpers\Helper;

class UserArtworkTest
{
    use TestTrait;

    private object $user;

    public function __construct()
    {
        $this->test_name = 'BuyArtwork test';
        $this->file_name = 'buy_artwork_test';
        $this->user = $this->cerateDummyUser(1);
    }

    public function buyArtworkTest(array $tests) : void
    {
        global $user;
        $user = $this->user;

        $token = Helper::getTestToken();
        $_SERVER['HTTP_AUTHORIZATION'] = "Bearer $token";

        foreach ($tests as $test) {
            $artwork= new UserArtworkController();    
    
            $result = json_decode($artwork->create($test['params']['id']));

            $this->onSuccess($test, $result);
            $this->onFail($test, $result);

            $this->results[] = [
                'id' => $test['params']['id'],
                'pass' => $this->pass,
            ];
        }

        $this->getPassedTests();
        $this->getFailedTests();

        $this->logResults();
    }

    private function onSuccess(array $test, object $result) : void
    {
        if (isset($result->success) && $result->success) {
            $this->pass =
                $result->success === $test['result']['success'] &&
                (int)$result->data->user_id === $test['result']['data']['user_id'] &&
                (int)$result->data->artwork_id === $test['result']['data']['artwork_id']
                    ? true : false;
        }
    }

    private function onFail(array $test, object $result) : void 
    {
        if (isset($result->success) && !$result->success) {
            if ($result->success === $test['result']['success']) {
                $this->pass = $result->error === $test['result']['error']
                        ? true : false;

                if (
                    isset($result->error->status) && 
                    $result->error->status === $test['result']['error']['status']
                ) {
                    $this->pass = true;
                }
            } else {
                $this->pass = isset($result->success) ? true : false;
            }
        }
    }
}
