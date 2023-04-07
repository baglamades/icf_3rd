<?php

declare(strict_types=1);

require_once __DIR__ . '/boot_tests.php';

use App\Test\Src\ArtworksTest;
use App\Src\Helpers\Helper;

$tests = Helper::getTestData('artworks');

$artwork = new ArtworksTest();
$artwork->getArtworksTest($tests);