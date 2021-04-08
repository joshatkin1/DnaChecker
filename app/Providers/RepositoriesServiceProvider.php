<?php

namespace App\Providers;

use App\Interfaces\DnaCheckerInterface;
use App\Services\DnaCheckerService;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(DnaCheckerInterface::class, DnaCheckerService::class);
    }
}
