<?php

namespace App\Providers;

use App\Nova\City;
use App\Nova\User;
use App\Nova\View;
use App\Nova\Admin;
use App\Nova\Agent;
use App\Nova\Seller;
use App\Nova\Listing;
use Laravel\Nova\Nova;
use App\Nova\SellerLead;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($admin) {
            return true;
            // return in_array($user->email, [
            //     'dustin@eugenerealtygroup.com',
            //     'shannon@eugenerealtygroup.com',
            // ]);
        });
    }

    /**
     * Register the application's Nova resources.
     *
     * @return void
     */
    protected function resources()
    {
        // Auto register all resources in the Nova directory
        //Nova::resourcesIn(app_path('Nova'));

        // Manually register resources
        Nova::resources([
            // Leads
            User::class,
            SellerLead::class,

            // Listings
            City::class,
            Seller::class,
            Listing::class,
            View::class,

            // Users
            Admin::class,
            Agent::class,
        ]);
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            //new Help,
            (new \App\Nova\Metrics\NewUsers)->width('1/3'),
            (new \App\Nova\Metrics\NewListings)->width('1/3'),
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
