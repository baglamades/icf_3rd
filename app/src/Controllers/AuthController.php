<?php

declare(strict_types=1);

namespace App\Src\Controllers;

use App\Src\Auth\Token;
use App\Src\Models\User;

class AuthController
{
    private $token;

    public function __construct()
    {
        $this->token = new Token();
    }

    public function auth(): string
	{   
        $user = new User();
        $response =  $user->auth($this->token);

        return json_encode($response);
    }
}

