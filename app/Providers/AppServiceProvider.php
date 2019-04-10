<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Give all views Cities for use in SEO nav links
        if (Schema::hasTable('cities')) {
            $cities = \App\City::orderBy('name', 'asc')->get();
            view()->share('cityNavItems', $cities);
        }
    }
}
