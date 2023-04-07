<?php

declare(strict_types=1);

namespace App\Src\Controllers;

use Pecee\SimpleRouter\SimpleRouter as Router;

use App\Src\Helpers\Server;
use App\Src\Helpers\Helper;

class ArtworkController 
{
    private string $endpoint;
    private string $fields;

    public function __construct()
    {
        $this->endpoint = Helper::getConfig()['parent_api_endpoint'];
        $this->fields = 'id,title,artist_title,thumbnail,image_id';
    }

    public function show($id): string
	{
        $mode = Helper::getConfig()['mode'];

        if ($mode !== 'test') {
            $auth = Router::request()->authenticated;

            if (!$auth['success']) { 
                return json_encode($auth);
            }
        }

        if (
            (string)$id !== (string)(int)$id || 
            (int)$id <= 0
        ) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'artwork_id_should_be_positive_integer',
            ]);
        } 

        $url = $this->endpoint . $id . "?fields=$this->fields";

        $response = Server::getDataFromServer($url);

        if (!$response['success']) { 
            if ($response['error'] === 'artwork_not_found') {
                http_response_code(404);
                return json_encode($response);
            }

            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => $response['error'],
            ]);
        }

        return json_encode($response);
	}

    public function list($page, $limit) : string
    {
        $mode = Helper::getConfig()['mode'];

        if ($mode !== 'test') {
            $auth = Router::request()->authenticated;

            if (!$auth['success']) { 
                return json_encode($auth);
            }
        }
        
        $max_page_size = Helper::getConfig()['max_page_size'];

        if (
            $page === null || 
            !$page ||
            (string)$page !== (string)(int)$page || 
            (int)$page <= 0
        ) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'page_should_be_positive_integer',
            ]);
        }

        if (
            $limit === null || 
            !$limit ||
            (string)$limit !== (string)(int)$limit || 
            (int)$limit <= 0
        ) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'limit_should_be_positive_integer',
            ]);
        }

        if ($limit > $max_page_size) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'exceeded_page_limit',
            ]);
        }

        $url = $this->endpoint . "?fields=$this->fields&" . "page=$page&limit=$limit";

        $response = Server::getDataFromServer($url);

        if (!$response['success']) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => $response['error'],
            ]);
        }

        return json_encode($response);
    }
}

