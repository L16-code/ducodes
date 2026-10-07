<?php

// TEMPORARY DEPLOYMENT SCRIPT — DELETE THIS FILE IMMEDIATELY AFTER RUNNING IT ONCE.
// Runs the new `services` table migration, migrates the 12 existing service
// pages out of config/service_pages.php into the database, adds the 12 new
// AI/agent/LLM service pages and their FAQs, then clears all caches.

require __DIR__.'/ducodes/vendor/autoload.php';

$app = require_once __DIR__.'/ducodes/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

header('Content-Type: text/plain');

function runArtisan(string $command, array $params = []): void
{
    echo "\$ php artisan {$command}\n";
    Illuminate\Support\Facades\Artisan::call($command, $params);
    echo Illuminate\Support\Facades\Artisan::output();
    echo "\n";
}

runArtisan('migrate', ['--force' => true]);
runArtisan('db:seed', ['--class' => 'ServiceSeeder', '--force' => true]);
runArtisan('db:seed', ['--class' => 'AiServiceFaqSeeder', '--force' => true]);
runArtisan('route:clear');
runArtisan('config:clear');
runArtisan('cache:clear');
runArtisan('view:clear');

echo "Done. DELETE THIS FILE NOW.\n";
