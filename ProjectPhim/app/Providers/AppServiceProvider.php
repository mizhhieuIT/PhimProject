<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\repository\category\categoryinterface;
use App\repository\category\categoryrepo;
use App\repository\film\filminterface;
use App\repository\film\filmrepo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(categoryinterface::class,categoryrepo::class);
        $this->app->singleton(filminterface::class,filmrepo::class);
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
