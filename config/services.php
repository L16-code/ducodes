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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Analytics
    |--------------------------------------------------------------------------
    |
    | All null/unset by default on purpose — no placeholder or third-party IDs
    | are baked in. Set the real values in .env once you have them and the
    | corresponding snippet in frontend.partials.analytics will start firing.
    | See SEO_AUDIT.md for why no ID ships here out of the box.
    |
    */
    'analytics' => [
        'ga4_id' => env('GA4_MEASUREMENT_ID'),
        'gtm_id' => env('GTM_CONTAINER_ID'),
        'clarity_id' => env('MS_CLARITY_ID'),
        'meta_pixel_id' => env('META_PIXEL_ID'),
        'linkedin_partner_id' => env('LINKEDIN_PARTNER_ID'),
    ],

];
