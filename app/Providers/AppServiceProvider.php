<?php

namespace App\Providers;

use App\Services\OrderService;
use App\Validations\ProductAvailabilityValidation;
use App\Validations\StockValidation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrderService::class, function ($app) {
            return new OrderService([
                new StockValidation(),
                new ProductAvailabilityValidation(),
            ]);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
