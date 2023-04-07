<?php

declare(strict_types=1);

namespace App\Test\Src;

use App\Src\Controllers\ArtworkController;
use App\Test\Src\TestTrait;

class ArtworkTest
{
    use TestTrait;

    public function __construct()
    {
        $this->test_name = 'Artwork test';
        $this->file_name = 'artwork_test';
    }

    public function getArtworkTest(array $tests) : void
    {
        foreach ($tests as $test) {
            $artwork= new ArtworkController();    
   
            $result = json_decode($artwork->show($test['params']['id']));

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
                gettype($result->data->id) === $test['result']['data']['id']
                    ? true : false;
        }
    }

    private function onFail(array $test, object $result) : void
    {
        if (isset($result->success) && !$result->success) {
            $this->pass = 
                $result->success === $test['result']['success'] && 
                $result->error === $test['result']['error']
                    ? true : false;

            if ($result->success === $test['result']['success']) {
                if ($result->error === $test['result']['error']) {
                    $this->pass = true;
                }

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
