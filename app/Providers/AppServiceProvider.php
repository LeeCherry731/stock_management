<?php

namespace App\Providers;

use App\Filament\Resources\ProductResource\Widgets\LowLimitProducts;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
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
         Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Store',
                'Import and Export',
                'Filament Shield',
            ]);

            Filament::getWidgets([
                LowLimitProducts::class,
            ]);
        });


    }
}
