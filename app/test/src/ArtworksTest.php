<?php

declare(strict_types=1);

namespace App\Test\Src;

use App\Src\Controllers\ArtworkController;
use App\Test\Src\TestTrait;

class ArtworksTest
{
    use TestTrait;

    public function __construct()
    {
        $this->test_name = 'Artworks test';
        $this->file_name = 'artworks_test';
    }

    public function getArtworksTest(array $tests) : void
    {        
        foreach ($tests as $test) {
            $artwork= new ArtworkController();    
   
            $result = json_decode($artwork->list($test['params']['page'], $test['params']['limit']));

            $this->onSuccess($test, $result);
            $this->onFail($test, $result);

            $this->results[] = [
                'page' => $test['params']['page'],
                'limit' => $test['params']['limit'],
                'pass' => $this->pass,
            ];
        }

        $this->getPassedTests();
        $this->getFailedTests();

        $this->logResults();
    }

    private function onSuccess(array $test, object $result) : void
    {
        $msg_result = $result->msg ?? null;
        $msg_test = $test['result']['msg'] ?? null;

        if (isset($result->success) && $result->success) {
            $this->pass =
                $result->success === $test['result']['success'] &&
                is_array($result->data) === true && 
                count($result->data) === $test['result']['count'] && 
                $msg_result === $msg_test
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
