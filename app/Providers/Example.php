<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Example extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('App\Example\Business\Abstraction\ICustomersService','App\Example\Business\Concrete\CustomersManager');
        $this->app->singleton('App\Example\DataAccess\Abstraction\ICustomersDataService', 'App\Example\DataAccess\Concrete\CustomersDataManager');

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
