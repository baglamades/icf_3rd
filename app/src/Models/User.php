<?php

declare(strict_types=1);

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

use App\Src\Auth\Token;
use App\Src\Helpers\Helper;

class User extends Eloquent 
{
    public function auth(Token $token) : array
    {
        $response = $this->getUser();

        if (!$response['success']) {
            http_response_code(401);
            return $response;
        }

        $password_match = $this->matchPwd($response['data']['password']);

        if (!$password_match) {
            http_response_code(401);
            return [
                'success' => false,
                'error' => 'password_mismatch',
            ];
        }

        return [
            'success' => true,
            'token' => $token->issueToken($response['data']),
        ];
    }

    private function getUser() : array
    {  
        try { 
            Helper::connectToDb();

            if (
                !isset($_SERVER['PHP_AUTH_USER']) || 
                !$_SERVER['PHP_AUTH_USER']
            ) { 
                return [
                    'success' => false,
                    'error' => 'no_such_user',
                ];
            }

            $users = User::where('name', $_SERVER['PHP_AUTH_USER'])->get()->toArray();

            if (count($users) === 0) { 
                return [
                    'success' => false,
                    'error' => 'no_such_user',
                ];
            }

            return [
                'success' => true,
                'data' => $users[0],
            ];
        } catch (\Exception $e) { Helper::log(333);
            Helper::logError(__FILE__, __LINE__, $e->getMessage());
            return [
                'success' => false,
                'error' => 'error',
            ];
        }
    }

    private function matchPwd(string $hash) : bool
    {
        if ($_SERVER['PHP_AUTH_PW'] === null) {
            return false;
        }

        return password_verify((string)$_SERVER['PHP_AUTH_PW'], $hash);
    }
}

