<?php

declare(strict_types=1);

namespace App\Src\Controllers;

use Pecee\SimpleRouter\SimpleRouter as Router;

use App\Src\Controllers\ArtworkController;
use App\Src\Models\UserArtwork;
use App\Src\Helpers\Helper;
use App\Src\Helpers\Server;

class UserArtworkController
{
    private string $endpoint;
    private string $fields;

    public function __construct()
    {
        $this->endpoint = Helper::getConfig()['parent_api_endpoint'];
        $this->fields = 'id,title,artist_title,thumbnail,image_id';
    }

    public function index(): string
    {
        $mode = Helper::getConfig()['mode'];

        if ($mode !== 'test') {
            $auth = Router::request()->authenticated;

            if (!$auth['success']) { 
                return json_encode($auth);
            }
        }

        if ($mode === 'test') {
            $auth['user_id'] = 1;
        }

        try {
            Helper::connectToDb();

            return json_encode([
                'success' => true,
                'data' => UserArtwork::where('user_id', $auth['user_id'])->get()->toArray(),
            ]);
        } catch (\Exception $e) {
            Helper::logError(__FILE__, __LINE__, $e->getMessage());
            return json_encode([
                'success' => false,
                'error' => 'error',
            ]);
        }
    }

    public function create($id) : string
    {
        $mode = Helper::getConfig()['mode'];

        if ($mode !== 'test') {
            $auth = Router::request()->authenticated;

            if (!$auth['success']) { 
                return json_encode($auth);
            }

            if (!isset($auth['user_id'])) {
                return json_encode([
                    'success' => false,
                    'error' => 'unauthorized',
                ]);
            }
        }

        if ($mode === 'test') {
            $auth['user_id'] = 1;
        }

        $artwork = new ArtworkController();
        $artwork_details = json_decode($artwork->show($id));

        if (!$artwork_details->success) { 
            return json_encode([
                'success' => false,
                'error' => 'artwork_not_found',
            ]);
        }

        if (!$id) {
            return json_encode([
                'success' => false,
                'error' => 'no_artwork_id',
            ]);
        }

        $artwork_already_sold_to = $this->getArtworkAlreadySoldTo($id);

        if (!$artwork_already_sold_to['success']) {
            return json_encode([
                'success' => false,
                'error' => 'error',
            ]);
        }

        if ($artwork_already_sold_to['user_id'] === $auth['user_id']) {
            http_response_code(405);
            return json_encode([
                'success' => false,
                'error' => 'already_sold_to_current_user',
            ]);
        }

        if ($artwork_already_sold_to['user_id']) {
            http_response_code(405);
            return json_encode([
                'success' => false,
                'error' => 'already_sold_to_someone_else',
            ]);
        }

        return json_encode($this->insertArtworkIntoDb($auth['user_id'], $id));

    }

    private function getArtworkAlreadySoldTo($id): array
    {
        try {
            Helper::connectToDb();

            $artworks = UserArtwork::where('artwork_id', $id)->get()->toArray();

            if (count($artworks) === 0) {
                return [
                    'success' => true,
                    'user_id' => null,
                ];
            }

            return [
                'success' => true,
                'user_id' => (int)$artworks[0]['user_id'],
            ];
        } catch (\Exception $e) {
            Helper::logError(__FILE__, __LINE__, $e->getMessage());
            return [
                'success' => false,
                'error' => 'error',
            ];
        }
    }

    private function insertArtworkIntoDb($user_id, $id): array
    {
        if (!$id) {
            return [
                'success' => false,
                'error' => 'no_artwork_id',
            ];
        }

        $artwork = $this->getArtworkDetailsFromServer($id)['data'];

        $thumbnail = json_encode($artwork->thumbnail);

        $data = [
            'user_id' => $user_id,
            'artwork_id' => $artwork->id,
            'title' => $artwork->title,
            'artist_title' => $artwork->artist_title,
            'thumbnail' => $thumbnail,
            'image_id' => $artwork->image_id,
        ];

        try {
            Helper::connectToDb();

            UserArtwork::insert($data);

            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            Helper::logError(__FILE__, __LINE__, $e->getMessage());
            return [
                'success' => false,
                'error' => 'error',
            ];
        }
    }

    private function getArtworkDetailsFromServer($id): array
    {
        $url = $this->endpoint . $id . "?fields=$this->fields";

        $response = Server::getDataFromServer($url);

        if (!$response['success']) {
            if ($response['error'] === 'Not found') {
                http_response_code(404);
                return [
                    'success' => false,
                    'error' => 'artwork_not_found',
                ];
            }

            http_response_code(400);
            return [
                'success' => false,
                'error' => $response['error'],
            ];
        }

        return $response;
    }
}
