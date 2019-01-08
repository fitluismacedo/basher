<?php

namespace fitluismacedo\basher;

use App\Console\Commands\Basher\Clean;
use App\Console\Commands\Basher\Enviroment;
use App\Console\Commands\Basher\Push;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class basherServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'fitluismacedo');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'fitluismacedo');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__ . '/../config/basher.php', 'basher');

        // Register the service the package provides.
//        $this->app->singleton('basher', function ($app) {
//            return new basher;
//        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['basher'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
//        $this->publishes([
//            __DIR__.'/../config/basher.php' => config_path('basher.php'),
//        ], 'basher.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fitluismacedo'),
        ], 'basher.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fitluismacedo'),
        ], 'basher.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fitluismacedo'),
        ], 'basher.views');*/

        // Registering package commands.
        if (!is_dir('./app/Console/Commands')) {
            File::makeDirectory('./app/Console/Commands');
        }

        $src = "./packages/fitluismacedo/basher/src/Console/Commands/Basher";
        $dest = "./app/Console/Commands";
        File::copyDirectory($src, $dest);

        $this->commands([
            Clean::class,
            Enviroment::class,
            Push::class,
        ]);
    }
}
