<?php

namespace App\Providers;

use App\Services\Api\ApiService;
use App\Services\Api\IApiService;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IApiService::class, ApiService::class);
    }

    public function boot()
    {
        //
    }
}
