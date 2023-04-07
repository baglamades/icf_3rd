<?php

declare(strict_types=1);

namespace App\Test\Src;

trait TestTrait 
{
    private string $test_name;
    private string $file_name;
    private array  $results = [];
    private bool $all_passed;
    private array $failed_tests;
    private array $passed_tests;
    private bool $pass;
   
    private function cerateDummyUser(int $id) : object
    {
        $user = new \stdClass();
        $user->id = $id;

        return $user;
    }
    
    private function getPassedTests() : void
    {
        $this->passed_tests = array_filter($this->results, function ($e) {
            if ($e['pass']) {
                return $e;
            }
        });
    }

    private function getFailedTests() : void
    {
        $this->all_passed = true;

        $this->failed_tests = array_filter($this->results, function ($e) {
            if (!$e['pass']) {
                $this->all_passed = false;
                return $e;
            }
        });
    }

    private function logResults() : void
    {
        $results = [
            'all_passed' => $this->all_passed,
            'failed_tests' => array_values($this->failed_tests),
            'passed_tests' => array_values($this->passed_tests),
        ];

        file_put_contents(
            __DIR__ . './../../test/results/' . $this->file_name . '.json', 
            json_encode($results, JSON_PRETTY_PRINT)
        );
    }
}