<?php

return [
    [
        'params' => [
            'page' => 1,
            'limit' => 1,
        ],
        'result' => [
            'success' => true,
            'count' => 1,
        ],
    ], 
    [
        'params' => [
            'page' => 1,
            'limit' => 10,
        ],
        'result' => [
            'success' => true,
            'count' => 10,
        ],
    ], 
    [
        'params' => [
            'page' => 1,
            'limit' => 21,
        ],
        'result' => [
            'success' => false,
            'error' => 'exceeded_page_limit',
        ],
    ], 

    [
        'params' => [
            'page' => 222,
            'limit' => 1,
        ],
        'result' => [
            'success' => true,
            'count' => 1,
        ],
    ], 
    [
        'params' => [
            'page' => 222,
            'limit' => 10,
        ],
        'result' => [
            'success' => true,
            'count' => 10,
        ],
    ], 
    [
        'params' => [
            'page' => 222,
            'limit' => 21,
        ],
        'result' => [
            'success' => false,
            'error' => 'exceeded_page_limit',
        ],
    ], 

    [
        'params' => [
            'page' => 999999999,
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'reached_end_of_artworks',
        ],
    ], 

    [
        'params' => [
            'page' => 999999999,
            'limit' => 21,
        ],
        'result' => [
            'success' => false,
            'error' => 'exceeded_page_limit',
        ],
    ], 

    [
        'params' => [
            'page' => -12,
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => -12.5,
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => '12.5',
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 12.5,
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => '12.5',
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => '',
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => null,
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 'null',
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 'aaaaaa',
            'limit' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'page_should_be_positive_integer',
        ],
    ], 

    [
        'params' => [
            'page' => 123,
            'limit' => -33,
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 123,
            'limit' => 33.5,
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'page' => 123,
            'limit' => -33.5,
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 123,
            'limit' => '-33.5',
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 123,
            'limit' => '',
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 123,
            'limit' => null,
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 123,
            'limit' => 'null',
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ], 
    [
        'params' => [
            'page' => 123,
            'limit' => 'aaaaaa',
        ],
        'result' => [
            'success' => false,
            'error' => 'limit_should_be_positive_integer',
        ],
    ],
];