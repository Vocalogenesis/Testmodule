<?php

namespace Vocalogenesis\Testmodule;

use Vocalogenesis\Testmodule\testmodule;
use Illuminate\Support\ServiceProvider;

class TestmoduleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Vocalogenesis\Testmodule\Controllers\TestmoduleController');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'testmodule');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            testmodule::class,
        ]);
        $this->loadRoutesFrom(__DIR__.'/routes/main.php');
        $this->publishes([
            __DIR__.'/public' => public_path('vocalogenesis/testmodule'),
        ], 'public');
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
