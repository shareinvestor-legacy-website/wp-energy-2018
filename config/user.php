<?php
/**
 * CMS settings
 */


return [

    'ir' => [
        'url' => env('IR_URL'),
        'timeout' => env('IR_TIMEOUT'),
        'connectTimeout' => env('IR_CONNECT_TIMEOUT'),
    ],

    //redirect url for auth
    'redirect' => [
        'authenticated' => 'admin/dashboard',
        'unauthenticated' => 'admin/login',
        'afterLogin' => 'admin/dashboard',
        'afterLogout' => 'admin/login'
    ],

    //permission list
    'auth' => [
        'web' =>
            [
                'name' => 'Web',
                'permissions' => [
                    'manage-web-menu' => 'Can Manage Menu',
                    'manage-web-page' => 'Can Manage Page',
                    'manage-web-post' => 'Can Manage Post',
                    'manage-web-media' => 'Can Manage Media',
                    'manage-web-category' => 'Can Manage Category',
                    'manage-web-gallery' => 'Can Manage Gallery',
                    'manage-web-tag' => 'Can Manage Tag',
                    'manage-web-text' => 'Can Manage Text'
                ],
            ],

        'jobboard' => [
            'name' => 'Jobboard',
            'permissions' => [
                'manage-jobboard-position' => 'Can Manage Position',
                'manage-jobboard-department' => 'Can Manage Department',
                'manage-jobboard-location' => 'Can Manage Location',
            ],
        ],

        'auth' => [
            'name' => 'Auth',
            'permissions' => [
                'manage-auth-user' => 'Can Manage User',
                'manage-auth-role' => 'Can Manage Role',
            ],
        ],

        'tool' => [
            'name' => 'Tool',
            'permissions' => [
                'manage-tool-audit' => 'Can Manage Audit Activity',
                'manage-tool-url' => 'Can Manage Update URLs',
                'manage-tool-sitemap' => 'Can Manage Sitemap',
            ],
        ],

        'setting' => [
            'name' => 'Setting',
            'permissions' => [
                'manage-setting-general' => 'Can Manage General Setting',
                'manage-setting-contact' => 'Can Manage Contact',
                'manage-setting-advance' => 'Can Manage Advance Setting',
            ],
        ]
    ]
];