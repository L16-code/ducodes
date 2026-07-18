<?php

// TEMPORARY DEPLOYMENT SCRIPT — DELETE THIS FILE IMMEDIATELY AFTER RUNNING IT ONCE.
// Runs pending migrations (CRM lead fields + FAQs table), seeds the FAQ
// content from config/service_pages.php into the database, then clears all
// caches so the new code/routes take effect immediately.

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
runArtisan('db:seed', ['--class' => 'FaqSeeder', '--force' => true]);
runArtisan('route:clear');
runArtisan('config:clear');
runArtisan('cache:clear');
runArtisan('view:clear');

echo "Done. DELETE THIS FILE NOW.\n";
