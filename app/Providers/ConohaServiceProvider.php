<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\Rackspace\RackspaceAdapter;
use OpenCloud\OpenStack;

class ConohaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $filesystem = $this->app->make('filesystem');
        $filesystem->extend('conoha', function($app, $config) {
            $client = new OpenStack($config['auth_url'], [
                'username' => $config['username'],
                'password' => $config['password'],
                'tenantName' => $config['tenant_name'],
            ]);
            $client->authenticate();
            $service = $client->objectStoreService('Object Storage Service', $config['region']);
            $container = $service->getContainer($config['container']);

            return new Filesystem(new RackspaceAdapter($container));
        });
    }
}
