<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/Auth/Token.php';
require_once __DIR__ . '/src/Controllers/AuthController.php';
require_once __DIR__ . '/src/Controllers/PageController.php';
require_once __DIR__ . '/src/Controllers/ArtworkController.php';
require_once __DIR__ . '/src/Controllers/UserArtworkController.php';
require_once __DIR__ . '/src/Helpers/Helper.php';
require_once __DIR__ . '/src/Helpers/Server.php';
require_once __DIR__ . '/src/Middlewares/Jwt.php';
require_once __DIR__ . '/src/Models/User.php';
require_once __DIR__ . '/src/Models/UserArtwork.php';
require_once __DIR__ . '/src/Routes/PageNotFoundExceptionHandler.php';
require_once __DIR__ . '/src/Routes/routes.php';

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::enableMultiRouteRendering(false);

echo Router::start();