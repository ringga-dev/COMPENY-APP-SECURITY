<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'authfilter' => \App\Filters\AuthFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'authfilter' => [
                'except' => [
                    'auth', 'auth/*',
                    'userapi', 'userapi/*',
                    'globalview', 'globalview/*',
                    'dataterbuka', 'dataterbuka/*'
                ]
            ]
            // 'honeypot',
            // 'csrf',
        ],
        'after'  => [
            'authfilter' => [
                'except' => [
                    'home', 'home/*',
                    'admin', 'admin/*',
                    'globalview', 'globalview/*',
                    'userapi', 'userapi/*',
                    'dataterbuka', 'dataterbuka/*'

                ]
            ],
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
