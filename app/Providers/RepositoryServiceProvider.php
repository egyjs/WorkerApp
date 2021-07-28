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
    public function register()
    {

        // user
        $this->app->bind(
            'App\Interfaces\User\UserInterface',
            'App\Repositories\User\UserRepository'
        );

        // user issues
        $this->app->bind(
            'App\Interfaces\User\IssueInterface',
            'App\Repositories\User\IssueRepository'
        );

        // worker
        $this->app->bind(
            'App\Interfaces\Worker\WorkerInterface',
            'App\Repositories\Worker\WorkerRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
