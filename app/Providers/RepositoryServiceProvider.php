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
        $this->app->bind(
            \App\interfaces\PostsTableInterFace::class,
            \App\Repository\PostsRepository::class
        );

        $this->app->bind(
            \App\interfaces\CommentsTableInterFace::class,
            \App\Repository\CommentsRepository::class
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
