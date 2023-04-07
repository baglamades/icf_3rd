<?php

declare(strict_types=1);

require_once __DIR__ . '/boot_tests.php';

use App\Test\Src\ArtworkTest;
use App\Src\Helpers\Helper;

$tests = Helper::getTestData('artwork');

$artwork = new ArtworkTest();
$artwork->getArtworkTest($tests);