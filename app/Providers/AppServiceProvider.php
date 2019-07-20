<?php

namespace App\Providers;

use App\Http\Repository\blog\BlogRepository;
use App\Http\Repository\blog\BlogRepositoryImpl;
use App\Http\Repository\category\CategoryRepository;
use App\Http\Repository\category\CategoryRepositoryImpl;
use App\Http\Service\blog\BlogService;
use App\Http\Service\blog\BlogServiceImpl;
use App\Http\Service\category\CategoryService;
use App\Http\Service\category\CategoryServiceImpl;
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
        $this->app->singleton(CategoryRepository::class, CategoryRepositoryImpl::class);
        $this->app->singleton(CategoryService::class, CategoryServiceImpl::class);
        $this->app->singleton(BlogService::class, BlogServiceImpl::class);
        $this->app->singleton(BlogRepository::class, BlogRepositoryImpl::class);
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
