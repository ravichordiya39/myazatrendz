<?php



return [



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



    'google' => [

      'client_id' => '530704131452-4tunikqgaacv0r9qcgmiahqhsv6b892e.apps.googleusercontent.com',

      'client_secret' => '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',

      'redirect' => 'https://myazatrendz.com/login/google/callback',

    ],



    'facebook' => [

      'client_id' => '602446884171967',

      'client_secret' => 'a08e9a8f7ab5a3ac033c7b122f60705f',

      'redirect' => 'https://myazatrendz.com/login/facebook/callback',

    ],



];

