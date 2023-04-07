<?php

return [
    // ok
    [
        'params' => [
            'id' => 111444,
        ],
        'result' => [
            'success' => true,
            'data' => [
                'id' => 'integer'
            ],
        ],
    ], 
    [
        'params' => [
            'id' => 116199,
        ],
        'result' => [
            'success' => true,
            'data' => [
                'id' => 'integer'
            ],
        ],
    ], 
    [
        'params' => [
            'id' => 104354,
        ],
        'result' => [
            'success' => true,
            'data' => [
                'id' => 'integer'
            ],
        ],
    ], 

    [
        'params' => [
            'id' => '111444',
        ],
        'result' => [
            'success' => true,
            'data' => [
                'id' => 'integer'
            ],
        ],
    ], 
    [
        'params' => [
            'id' => '116199',
        ],
        'result' => [
            'success' => true,
            'data' => [
                'id' => 'integer'
            ],
        ],
    ], 
    [
        'params' => [
            'id' => '104354',
        ],
        'result' => [
            'success' => true,
            'data' => [
                'id' => 'integer'
            ],
        ],
    ],

    // no artwork
    [
        'params' => [
            'id' => 1,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ], 
    [
        'params' => [
            'id' => 2,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ], 
    [
        'params' => [
            'id' => 3,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ], 

    // wrong id types/values
    [
        'params' => [
            'id' => '',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => ' ',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => null,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => 'null',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => false,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => 'false',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => 0,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => '0',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => 'aaa',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => 'bbb',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => 15.5,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => '15.5',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => -15.5,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => '-15.5',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => -123,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
    [
        'params' => [
            'id' => '-123',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_id_should_be_positive_integer',
        ],
    ],
];