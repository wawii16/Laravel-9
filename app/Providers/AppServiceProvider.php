<?php

namespace App\Providers;

use App\Models\Brand;
use Illuminate\Support\ServiceProvider;
use App\Repositories\BrandRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\ProfileRepositoryInterface;
use App\Repositories\BrandRepositoryInterface;
use App\Services\BrandService;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind ProfileRepositoryInterface to ProfileRepository
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);


        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->singleton(FileUploadService::class);

        $this->app->bind(BrandService::class, function ($app) {
            return new BrandService(
                $app->make(BrandRepositoryInterface::class),
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
