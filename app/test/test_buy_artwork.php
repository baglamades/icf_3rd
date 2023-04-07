<?php

declare(strict_types=1);

require_once __DIR__ . '/boot_tests.php';

use App\Test\Src\UserArtworkTest;
use App\Src\Helpers\Helper;

$tests = Helper::getTestData('buy_artwork');

$artwork = new UserArtworkTest();
$artwork->buyArtworkTest($tests);