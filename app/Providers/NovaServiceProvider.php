<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\LeadsCount;
use App\Nova\Metrics\CitiesCount;
use App\Nova\Metrics\ListingCount;
use Illuminate\Support\Facades\Gate;
use App\Nova\Metrics\SellerLeadsCount;
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
        Gate::define('viewNova', function ($user) {
            if ( $user->hasRole('agent') || $user->hasRole('admin') || $user->hasRole('webmaster') )
            {
                return true;
            }
            else
            {
                return false;
            }
            // return in_array($user->email, [
            //     'dustin@eugenerealtygroup.com',
            //     'shannon@eugenerealtygroup.com',
            // ]);
        });
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
            (new LeadsCount)->width('1/4'),
            (new SellerLeadsCount)->width('1/4'),
            (new ListingCount)->width('1/4'),
            (new CitiesCount)->width('1/4'),
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
