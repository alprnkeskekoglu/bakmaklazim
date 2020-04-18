<?php

namespace Dawnstar;

use Dawnstar\Console\Kernel;
use Illuminate\Support\ServiceProvider;
use App\Console\Kernel as ConsoleKernel;

class DawnstarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected $commands = [
        'Dawnstar\Commands\SearchView',
    ];


    public function register()
    {
        $this->app->register(RouteServiceProvider::class);


        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'helpers.php')) {
            include_once __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'helpers.php';
        }

        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        $this->publishes([__DIR__ . DIRECTORY_SEPARATOR . 'Assets' => public_path('vendor/dawnstar/assets')], 'dawnstar');
        $this->loadViewsFrom(__DIR__ . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR, 'Dawnstar');
    }

}
