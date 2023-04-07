<?php

declare(strict_types=1);

require_once __DIR__ . '/boot_tests.php';

use App\Test\Src\AuthTest;
use App\Src\Helpers\Helper;

$tests = Helper::getTestData('auth');

$auth = new AuthTest();
$auth->test($tests);







