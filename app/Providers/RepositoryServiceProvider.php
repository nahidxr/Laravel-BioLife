<?php

namespace App\Providers;

// use App\Interfaces\IOrderRepository;
// use App\Repositories\OrderRepository;
use App\Interfaces\IImageRepository;
use App\Repositories\ImageRepository;
use App\Interfaces\IProductRepository;
use App\Interfaces\ICategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        $this->app->bind(IImageRepository::class, ImageRepository::class);
        // $this->app->bind(IOrderRepository::class, OrderRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
