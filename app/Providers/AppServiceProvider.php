<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('frontend.partials.header', function ($view) {
            $groups = Cache::remember('header.service_groups', now()->addHour(), function () {
                return Service::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get()
                    ->groupBy('category');
            });

            $view->with('headerServiceGroups', $groups);
        });
    }
}
