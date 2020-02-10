<?php

return [
    '__name' => 'admin-contact',
    '__version' => '0.0.2',
    '__git' => 'git@github.com:getmim/admin-contact.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/admin-contact' => ['install','update','remove'],
        'theme/admin/contact' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'admin' => NULL
            ],
            [
                'contact' => NULL
            ],
            [
                'lib-formatter' => NULL
            ],
            [
                'lib-form' => NULL
            ],
            [
                'lib-pagination' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'AdminContact\\Controller' => [
                'type' => 'file',
                'base' => 'modules/admin-contact/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'admin' => [
            'adminContact' => [
                'path' => [
                    'value' => '/contact'
                ],
                'method' => 'GET',
                'handler' => 'AdminContact\\Controller\\Contact::index'
            ],
            'adminContactReply' => [
                'path' => [
                    'value' => '/contact/(:id)',
                    'params' => [
                        'id'  => 'number'
                    ]
                ],
                'method' => 'GET|POST',
                'handler' => 'AdminContact\\Controller\\Contact::reply'
            ],
            'adminContactRemove' => [
                'path' => [
                    'value' => '/contact/(:id)/remove',
                    'params' => [
                        'id'  => 'number'
                    ]
                ],
                'method' => 'GET',
                'handler' => 'AdminContact\\Controller\\Contact::remove'
            ]
        ]
    ],
    'adminUi' => [
        'sidebarMenu' => [
            'items' => [
                'contact' => [
                    'label' => 'Contact',
                    'icon' => '<i class="fas fa-file-signature"></i>',
                    'priority' => 0,
                    'route' => ['adminContact'],
                    'perms' => 'manage_contact'
                ]
            ]
        ]
    ],
    'contact' => [
        'replyRoute' => 'adminContactReply'
    ],
    'libForm' => [
        'forms' => [
            'admin-contact.index' => [],
            'admin-contact.reply' => [
                'reply' => [
                    'label' => 'Reply',
                    'type' => 'summernote',
                    'nolabel' => true,
                    'rules' => [
                        'required' => true 
                    ]
                ]
            ]
        ]
    ]
];