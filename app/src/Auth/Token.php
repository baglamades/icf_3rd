<?php

declare(strict_types=1);

namespace App\Src\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Src\Helpers\Helper;

class Token
{
    public function issueToken(array $user) : string
    { 
        $key = Helper::getConfig()['secret_key'];

        $payload = [
            'iss'  => Helper::getConfig()['iss'],    
            'iat'  => time(), 
            'nbf'  => time(), 
            'exp'  => time() + Helper::getConfig()['jwt_lifetime'],  
            'id' => $user['id'],  
            'name' => $user['name'],  
        ];
        
        $jwt = JWT::encode($payload, $key, 'HS256');

        return $jwt;
    }

    public function validate() : array
    { 
        $auth_type = $this->getAuthType();

        if (!$auth_type['success']) {
            return $auth_type;
        }

        if ($auth_type['type'] === 'Basic') {
            return $auth_type;
        }

        $token = ltrim(ltrim($_SERVER['HTTP_AUTHORIZATION'], 'Bearer'));

        $key = Helper::getConfig()['secret_key'];

        try {
            $token_decoded = JWT::decode($token, new Key($key, 'HS256'));

            return [
                'success' => true,
                'type' => 'Bearer',
                'user_id' => $token_decoded->id,
                'user_name' => $token_decoded->name,
            ];
        } catch (\Throwable $e) {
            Helper::log($e->getMessage());
            return [
                'success' => false,
                'error' => 'token_expired',
            ];
        }
    }

    private function getAuthType() : array
    {   
        if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
            return [
                'success' => false,
                'error' => 'unauthorized',
            ];
        }

        $auth_type = explode(' ', $_SERVER['HTTP_AUTHORIZATION']);

        if ($auth_type[0] === 'Basic') {   
            return [
                'success' => true,
                'type' => 'Basic',
            ];
        }

        if ($auth_type[0] === 'Bearer') {  
            return [
                'success' => true,
                'type' => 'Bearer',
            ];
        }
  
        return [
            'success' => false,
            'error' => 'auth_type_error',
        ];
    }
}
