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
                'user_id' => 1,
                'artwork_id' => 111444,
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
                'user_id' => 1,
                'artwork_id' => 116199,
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
                'user_id' => 1,
                'artwork_id' => 104354,
            ],
        ],
    ], 

    // already in db
    [
        'params' => [
            'id' => 111444,
        ],
        'result' => [
            'success' => false,
            'error' => 'already_sold_to_current_user',
        ],
    ], 
    [
        'params' => [
            'id' => 116199,
        ],
        'result' => [
            'success' => false,
            'error' => 'already_sold_to_current_user',
        ],
    ], 
    [
        'params' => [
            'id' => 104354,
        ],
        'result' => [
            'success' => false,
            'error' => 'already_sold_to_current_user',
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
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => ' ',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => null,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => 'null',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => false,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => 'false',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => 0,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => '0',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => 'aaa',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => 'bbb',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => 15.5,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => '15.5',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => -15.5,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => '-15.5',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => -123,
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],
    [
        'params' => [
            'id' => '-123',
        ],
        'result' => [
            'success' => false,
            'error' => 'artwork_not_found',
        ],
    ],











    // /* db should be truncated before running these tests */
    // // ok
    // [
    //     'params' => [
    //         'id' => '111444',
    //     ],
    //     'result' => [
    //         'success' => true,
    //         'data' => [
    //             'user_id' => 1,
    //             'artwork_id' => 111444,
    //         ],
    //     ],
    // ], 
    // [
    //     'params' => [
    //         'id' => '116199',
    //     ],
    //     'result' => [
    //         'success' => true,
    //         'data' => [
    //             'user_id' => 1,
    //             'artwork_id' => 116199,
    //         ],
    //     ],
    // ], 
    // [
    //     'params' => [
    //         'id' => '104354',
    //     ],
    //     'result' => [
    //         'success' => true,
    //         'data' => [
    //             'user_id' => 1,
    //             'artwork_id' => 104354,
    //         ],
    //     ],
    // ],

    // // already in db
    // [
    //     'params' => [
    //         'id' => '111444',
    //     ],
    //     'result' => [
    //         'success' => true,
    //         'error' => 'already_sold_to_current_user',
    //     ],
    // ], 
    // [
    //     'params' => [
    //         'id' => '116199',
    //     ],
    //     'result' => [
    //         'success' => true,
    //         'error' => 'already_sold_to_current_user',
    //     ],
    // ], 
    // [
    //     'params' => [
    //         'id' => '104354',
    //     ],
    //     'result' => [
    //         'success' => true,
    //         'error' => 'already_sold_to_current_user',
    //     ],
    // ], 
];