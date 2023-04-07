<?php

declare(strict_types=1);

require_once __DIR__ . '/boot_tests.php';

use App\Test\Src\UserArtworksTest;
use App\Src\Helpers\Helper;

$tests = Helper::getTestData('user_artworks');

$artwork = new UserArtworksTest();
$artwork->getArtworksTest($tests);