<?php

declare(strict_types=1);

namespace App\Src\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

use App\Src\Auth\Token;

class Jwt implements IMiddleware
{
	public function handle(Request $request) : void
	{
		$token = new Token();
		$request->authenticated = $token->validate();
	}
}