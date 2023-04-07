<?php

declare(strict_types=1);

// require_once __DIR__ . './../../vendor/autoload.php';
require_once __DIR__ . './../vendor/autoload.php';

require_once __DIR__ . './..//src/Auth/Token.php';
require_once __DIR__ . './..//src/Controllers/AuthController.php';
require_once __DIR__ . './..//src/Controllers/PageController.php';
require_once __DIR__ . './..//src/Controllers/ArtworkController.php';
require_once __DIR__ . './..//src/Controllers/UserArtworkController.php';
require_once __DIR__ . './..//src/Helpers/Helper.php';
require_once __DIR__ . './..//src/Helpers/Server.php';
require_once __DIR__ . './..//src/Middlewares/Jwt.php';
require_once __DIR__ . './..//src/Models/User.php';
require_once __DIR__ . './..//src/Models/UserArtwork.php';
require_once __DIR__ . './..//src/Routes/PageNotFoundExceptionHandler.php';
require_once __DIR__ . './..//src/Routes/routes.php';

require_once __DIR__ . '/src/TestTrait.php';

require_once __DIR__ . '/src/ArtworksTest.php';
require_once __DIR__ . '/src/ArtworkTest.php';
require_once __DIR__ . '/src/AuthTest.php';
require_once __DIR__ . '/src/UserArtworksTest.php';
require_once __DIR__ . '/src/UserArtworkTest.php';


