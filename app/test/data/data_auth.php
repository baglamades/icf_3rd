<?php

return [
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => 'password',
        ],
        'result' => [
            'success' => true,
            'token' => 'string',
        ],
    ],
    [
        'params' => [
            'username' => 'user2@email.com',
            'password' => 'password',
        ],
        'result' => [
            'success' => true,
            'token' => 'string',
        ],
    ],


    [
        'params' => [
            'username' => "' or 1=1--",
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => "' or 1=1/*",
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => "') or '1'='1--*",
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => "') or ('1'='1--",
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => "Select id from users where name='name' and password='password' or 1=1--+",
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],

    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => "' or 1=1--",
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => "' or 1=1/*",
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => "') or '1'='1--*",
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => "') or ('1'='1--",
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => "Select id from users where name='name' and password='password' or 1=1--+",
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],

    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => '111111',
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => '111111',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => '',
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => null,
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'null',
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => '0',
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 0,
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => '-15',
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => -15,
            'password' => 'password',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => '',
            'password' => '11111',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => null,
            'password' => '11111',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'null',
            'password' => '11111',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => '0',
            'password' => '11111',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
                    [
                        'params' => [
                            'username' => 0,
                            'password' => '11111',
                        ],
                        'result' => [
                            'success' => false,
                            'error' => 'no_such_user',
                        ],
                    ],
    [
        'params' => [
            'username' => '-15',
            'password' => '11111',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => -15,
            'password' => '11111',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => '',
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => null,
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => 'null',
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => 0,
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => '0',
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => -555,
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user1@email.com',
            'password' => '-555',
        ],
        'result' => [
            'success' => false,
            'error' => 'password_mismatch',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => '',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => null,
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => 'null',
            'error' => 'no_such_user',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => 0,
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => '0',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => -1,
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'user111111@email.com',
            'password' => '-1',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => '',
            'password' => '',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],

    [
        'params' => [
            'username' => null,
            'password' => null,
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
    [
        'params' => [
            'username' => 'null',
            'password' => 'null',
        ],
        'result' => [
            'success' => false,
            'error' => 'no_such_user',
        ],
    ],
];
