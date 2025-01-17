<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
  public function register()
{
    $this->app->singleton('Excel', function () {
        return new \Maatwebsite\Excel\ExcelServiceProvider(app());
    });
}


    public function boot()
    {
        Paginator::useBootstrap();
    }
}
