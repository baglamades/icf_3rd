<?php

declare(strict_types=1);

namespace App\Test\Src;

use App\Src\Controllers\UserArtworkController;

use App\Test\Src\TestTrait;
use App\Src\Helpers\Helper;

class UserArtworksTest
{
    use TestTrait;

    private object $user;

    public function __construct()
    {
        $this->test_name = 'UserArtwork test';
        $this->file_name = 'user_artworks_test';
        $this->user = $this->cerateDummyUser(1);
    }

    public function getArtworksTest($tests)
    {
        global $user;
        $user = $this->user;

        foreach ($tests as $test) {
            $user_artworks = new UserArtworkController();
            $result = json_decode($user_artworks->index());

            $this->onSuccess($test, $result);
            $this->onFail($test, $result);

            $this->results[] = [
                'pass' => $this->pass,
            ];
        }

        $this->getPassedTests();
        $this->getFailedTests();

        $this->logResults();
    }

    private function onSuccess($test, $result)
    {
        if (isset($result->success) && $result->success) {
            $this->pass =
                $result->success === $test['result']['success'] &&
                gettype($result->data) === $test['result']['data'] && 
                count($result->data) === $test['result']['count']
                    ? true : false;
        }
    }

    private function onFail($test, $result)
    {
        if (isset($result->success) && !$result->success) {
            $this->pass = 
                $result->success === $test['result']['success']  
                    ? true : false;        
        }
    }
}
