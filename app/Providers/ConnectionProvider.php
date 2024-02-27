<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ConnectionProvider extends ServiceProvider implements DeferrableProvider
{
    public $bindings = [
        \App\DatabaseConnectionInterface::class => \App\DatabaseConnection::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }

    public function provides(): array
    {
        return [
            \App\DatabaseConnectionInterface::class,
        ];
    }
}
