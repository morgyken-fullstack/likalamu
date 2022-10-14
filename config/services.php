<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_CLIENT_REDIRECT_URI'),
    ],

     'facebook' => [
        'client_id' => '1308137999922254',
        'client_secret' => '7721a80c48b18c729fa0460342a7b414',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
    'client_id' => '976233905117-qphgpg36caecd253et0l0ppr77he5pq2.apps.googleusercontent.com',
    'client_secret' => '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',
    'redirect' => 'http://localhost:8000/auth/google/callback',
],

];
