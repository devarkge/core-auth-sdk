<?php
namespace Dark\Sdk\CoreAuth;

use Dark\Sdk\CoreAuth\Domain\Auth\DarkCoreAuthService;
use Dark\Sdk\CoreAuth\Support\DarkCoreClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;


class CoreAuthSdkServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/dark-auth.php' => config_path('dark-auth.php'),
        ], 'dark');
        Auth::provider('dark-auth', function ($app, $config) {
            return $app->make(DarkCoreAuthService::class, [
                'config' => $config,
            ]);
        });
    }

    public function register()
    {
        $this->app->singleton(
            DarkCoreClient::class,
            function() {
                return new DarkCoreClient();
            }
        );
        $this->app->alias(DarkCoreClient::class, 'dark-auth');
    }
}
