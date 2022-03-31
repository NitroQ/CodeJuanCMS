<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Disaster;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){

            $view->with('disaster_nav', Disaster::get());

        });
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
