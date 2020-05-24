<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BusinessLogicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'MusicService',
            \App\Service\MusicService::class
        );

        $this->app->bind(
            'LyricsService',
            \App\Service\LyricsService::class
        );

        $this->app->bind(
            'PostsService',
            \App\Service\PostsService::class
        );
   
        $this->app->bind(
            'UserService',
            \App\Service\UserService::class
        );
  
        $this->app->bind(
            'CommentsService',
            \App\Service\CommentsService::class
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
