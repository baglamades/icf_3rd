<?php

declare(strict_types=1);

namespace App\Src\Controllers;

class PageController
{
    public function notFound(): string
	{   
        return json_encode([
            'success' => false,
            'error' => 'url_error',
        ]);
    }
}

