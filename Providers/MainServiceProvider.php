<?php

namespace App\Containers\AppSection\Sanctum\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use Laravel\Sanctum\SanctumServiceProvider;

/**
 * The Main Service Provider of this container.
 * It will be automatically registered by the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    public array $serviceProviders = [
        // InternalServiceProviderExample::class,
        SanctumServiceProvider::class,
    ];

    public array $aliases = [
        // 'Foo' => Bar::class,
    ];

    public function register(): void
    {
        parent::register();
    }
}
