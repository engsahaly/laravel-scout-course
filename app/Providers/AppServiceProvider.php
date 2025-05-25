<?php

namespace App\Providers;

use App\Search\ArticlesAndPostsAggregator;
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
        // ArticlesAndPostsAggregator::bootSearchable();
    }
}
