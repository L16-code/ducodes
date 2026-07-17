<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site-wide SEO defaults
    |--------------------------------------------------------------------------
    |
    | Fallback values used whenever an individual page doesn't set its own
    | title/description/image. Every page under resources/views/frontend
    | should still set its own via @section('title', ...) and
    | @section('meta_description', ...) — these are last-resort fallbacks.
    |
    */

    'site_name' => 'DuCodes',

    'default_title' => 'DuCodes - Custom Software, AI & Web Development Company',

    'default_description' => 'DuCodes is a custom software development company building web platforms, mobile apps, AI solutions, and CRM/ERP integrations (Laravel, React, Node.js, Zoho, Salesforce, HubSpot) for growing businesses.',

    // Relative to public/ — used as the fallback Open Graph / Twitter Card image.
    'default_image' => 'assets/img/backgrounds/bg2.jpg',

    // Set to a real handle (e.g. "@ducodes") once one exists. Left null rather
    // than guessed, since a wrong twitter:site value attributes cards to the
    // wrong account.
    'twitter_handle' => null,

    /*
    |--------------------------------------------------------------------------
    | Organization identity (used for JSON-LD Organization/LocalBusiness)
    |--------------------------------------------------------------------------
    |
    | Only fields with verified real values from the codebase are filled in.
    | Do NOT add sameAs/social links, founder names, awards, or certifications
    | here unless they are real — fabricated entity data is a structured-data
    | policy violation, not an SEO win.
    |
    */
    'organization' => [
        'name' => 'DuCodes',
        'legal_name' => 'DuCodes',
        'url' => env('APP_URL', 'https://ducodes.com'),
        // No verified logo asset exists yet in the repo (the theme's logo.svg
        // is a generic template wordmark, not the real DuCodes brand mark).
        // Set this once a real logo file is added, e.g. 'assets/img/logo/ducodes-logo.svg'.
        'logo' => null,
        'telephone' => '+91-9119101224',
        'email' => 'support@ducodes.com',
        'address' => [
            'addressLocality' => 'Jaipur',
            'addressRegion' => 'Rajasthan',
            'addressCountry' => 'IN',
        ],
        // Add real social profile URLs here once they exist, e.g.
        // ['https://www.linkedin.com/company/ducodes', 'https://twitter.com/ducodes']
        'same_as' => [],
    ],

];
