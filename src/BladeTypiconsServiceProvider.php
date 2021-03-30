<?php

declare(strict_types=1);

namespace Codeat3\BladeTypicons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeTypiconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('typicons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'ti',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-ti'),
            ], 'blade-ti');
        }
    }
}
