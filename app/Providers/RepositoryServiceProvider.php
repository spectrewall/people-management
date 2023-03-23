<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function boot(): void
    {
        $this->app->singleton(\App\Repository\Interfaces\UserRepositoryInterface::class, \App\Repository\UserRepository::class);
        $this->app->singleton(\App\Repository\Interfaces\AddressRepositoryInterface::class, \App\Repository\AddressRepository::class);
        $this->app->singleton(\App\Repository\Interfaces\PersonRepositoryInterface::class, \App\Repository\PersonRepository::class);
    }
}
