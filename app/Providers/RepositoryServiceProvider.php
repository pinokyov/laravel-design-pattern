<?php

namespace App\Providers;

use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\SupplierRepositoryInterface;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BrandRepositoryInterface::class,BrandRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
