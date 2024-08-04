<?php

return [
    /*
     *  Automatic registration of routes will only happen if this setting is `true`
     */
    'enabled' => true,

    /*
     * Controllers in these directories that have routing attributes
     * will automatically be registered.
     *
     * Optionally, you can specify group configuration by using key/values
     */
    'directories' => [
        /* Genres Routes */
        app_path('Domain/Genre/Directories/Web/Create') => ['middleware' => ['web', 'auth']],
        app_path('Domain/Genre/Directories/Web/Delete') => ['middleware' => ['web', 'auth']],
        app_path('Domain/Genre/Directories/Web/Edit') => ['middleware' => ['web', 'auth']],
        app_path('Domain/Genre/Directories/Web/Index') => ['middleware' => ['web', 'auth']],
        app_path('Domain/Genre/Directories/Web/Show') => ['middleware' => ['web', 'auth']],
        app_path('Domain/Genre/Directories/Web/Store') => ['middleware' => ['web', 'auth']],
        app_path('Domain/Genre/Directories/Web/Update') => ['middleware' => ['web', 'auth']],
        /*
        app_path('Http/Controllers/Api') => [
           'prefix' => 'api',
           'middleware' => 'api',
            // only register routes in files that match the patterns
           'patterns' => ['*Controller.php'],
           // do not register routes in files that match the patterns
           'not_patterns' => [],
        ],
        */
    ],

    /**
     * This middleware will be applied to all routes.
     */
    'middleware' => [
        \Illuminate\Routing\Middleware\SubstituteBindings::class
    ]
];
