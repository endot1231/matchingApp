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
        
        $this->app->bind(
            \App\interfaces\UsersTableInterFace::class,
            \App\Repository\UsersRepository::class
        );
        
        $this->app->bind(
            \App\interfaces\MusicTableInterFace::class,
            \App\Repository\MusicRepository::class
        );
           
        $this->app->bind(
            \App\interfaces\LyricsTableInterFace::class,
            \App\Repository\LyricsRepository::class
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
