<?php

namespace App\Providers;

use App\Models\Market;
use Illuminate\Support\ServiceProvider;
use App\Repositories\MarketRepository;
use App\Repositories\MarketRepositoryInterface;
use App\Services\MarketService;
use App\Services\FileUploadService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MarketRepositoryInterface::class, MarketRepository::class);
        $this->app->singleton(FileUploadService::class);

        $this->app->bind(MarketService::class, function ($app) {
            return new MarketService(
                $app->make(MarketRepositoryInterface::class),
                $app->make(FileUploadService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
