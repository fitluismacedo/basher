<?php

namespace Fitluismacedo\Basher;

use Illuminate\Support\ServiceProvider;

class basherServiceProvider extends ServiceProvider
{
    /**
     * The console commands.
     *
     * @var bool
     */
    protected $commands = [
        'fitluismacedo\basher\Commands\Clean',
        'fitluismacedo\basher\Commands\Enviroment',
        'fitluismacedo\basher\Commands\Generate',
        'fitluismacedo\basher\Commands\Push',
        'fitluismacedo\basher\Commands\Revert',
        'fitluismacedo\basher\Commands\Tag',
        'fitluismacedo\basher\Commands\File',
        'fitluismacedo\basher\Commands\ForceComposerUpdate',
    ];
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
        $this->commands($this->commands);
    }
}
