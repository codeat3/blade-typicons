<?php

declare(strict_types=1);

namespace Codeat3\BladeTypicons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

final class BladeTypiconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-typicons', []);

            $factory->add('typicons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });

    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-typicons.php', 'blade-typicons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-typicons'),
            ], 'blade-typ'); // TDOO: update this alias to `blade-typicons` in next major release

            $this->publishes([
                __DIR__.'/../config/blade-typicons.php' => $this->app->configPath('blade-typicons.php'),
            ], 'blade-typicons-config');
        }
    }
}
