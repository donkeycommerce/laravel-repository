<?php

namespace DonkeyCommerce\Repository\Providers;

use Illuminate\Support\ServiceProvider;
use DonkeyCommerce\Repository\Console\Commands\RepositoryMakeCommand;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function boot() 
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RepositoryMakeCommand::class
            ]);
        }
    }

    /**
     * Register any application services.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function register()
    {
        //
    }
}