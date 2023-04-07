<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

use App\Src\Routes\PageNotFoundExceptionHandler;
use App\Src\Middlewares\Jwt;

Router::group(
    ['exceptionHandler' => PageNotFoundExceptionHandler::class,],
    function () {
        Router::get(
            '/auth',
            'App\Src\Controllers\AuthController@auth'
        );

        Router::group(
            ['middleware' => Jwt::class,],
            function () {
                Router::get(
                    '/artwork/{id}',
                    'App\Src\Controllers\ArtworkController@show'
                );

                Router::get(
                    '/artworks/{page}/{limit}',
                    'App\Src\Controllers\ArtworkController@list'
                );

                Router::post(
                    '/buy-artwork/{id}',
                    'App\Src\Controllers\UserArtworkController@create'
                );

                Router::get(
                    '/user-artworks',
                    'App\Src\Controllers\UserArtworkController@index'
                );
            }
        );
    }
);
