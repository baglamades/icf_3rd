<?php

declare(strict_types=1);

namespace App\Src\Helpers;

use GuzzleHttp\Client;

class Server
{
    public static function getDataFromServer(string $url) : array
    {
        try {
            $client = new Client(['base_uri' => $url,]);

            $response = $client->request('GET');

            $arr = (array)json_decode($response->getBody()->getContents());

            if (count((array)$arr['data']) === 0) {
                return [
                    'success' => false,
                    'error' => 'reached_end_of_artworks',
                ];
            }

            return [
                'success' => true,
                'data' => $arr['data'],
            ];
        } catch (\Exception $e) {
            if ($e->getCode() === 404) {
                http_response_code(404);
                return [
                    'success' => false,
                    'error' => 'artwork_not_found',
                ];                
            }

            http_response_code(400);

            return [
                'success' => false,
                'error' => $e->getCode(),
            ];
        }
    }
}