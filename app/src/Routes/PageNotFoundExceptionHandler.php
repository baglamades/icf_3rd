<?php

namespace App\Src\Routes;

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Handlers\IExceptionHandler;

class PageNotFoundExceptionHandler implements IExceptionHandler
{
    /**
     * @param Request $request
     * @param \Exception $error
     * @throws \Exception
     */
    public function handleError(Request $request, \Exception $error): void
    {
        if ($error instanceof NotFoundHttpException) {
            $request->setRewriteCallback('App\Src\Controllers\PageController@notFound');
            return;
        }

        throw $error;
    }
}