<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['DELETE', 'GET', 'POST', 'PUT'],
    'allowed_origins' => ['http://api.loc'],
    'allowed_origins_patterns' => ['/api\.loc:\d/'],
    'allowed_headers' => ['x-allowed-header', 'x-other-allowed-header'],
    'exposed_headers' => false,
    'max_age' => 600,
    'supports_credentials' => true,

];
