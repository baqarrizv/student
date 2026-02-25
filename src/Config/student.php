<?php

/*
|--------------------------------------------------------------------------
| Student Module Configuration
|--------------------------------------------------------------------------
|
| Here you can configure the Student module settings.
|
*/

return [
    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | Define the middleware that should be applied to the student routes.
    | You can add authentication, verification, or custom middleware.
    |
    */
    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | Define a prefix for the student routes.
    |
    */
    'route_prefix' => 'students',

    /*
    |--------------------------------------------------------------------------
    | View Paths
    |--------------------------------------------------------------------------
    |
    | Define the paths where Inertia pages are located.
    |
    */
    'page_path' => 'Student',

    /*
    |--------------------------------------------------------------------------
    | Model Settings
    |--------------------------------------------------------------------------
    |
    | Configure the Student model settings.
    |
    */
    'model' => [
        'namespace' => 'Student\Domain\Models\Student',
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    |
    | Default validation rules for student creation and updates.
    |
    */
    'validation' => [
        'name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'age' => 'required|integer|min:1|max:150',
    ],
];
