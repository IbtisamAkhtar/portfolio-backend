<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | This file configures CORS for the application. For production you should
    | restrict the allowed origins to the domains you control. The list below
    | allows your Netlify frontend origins so the live site can call the API.
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    // Restrict to your deployed frontend(s) in production
    'allowed_origins' => [
        'https://ibtisam-akhtar-portfolio.netlify.app',
        'https://glowing-tartufo-adf1bb.netlify.app',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];