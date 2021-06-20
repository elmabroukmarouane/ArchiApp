<?php

namespace App\Providers;

use App\Infrastructure\UserRepository\IUserRepository;
use App\Infrastucture\BaseRepository\BaseRepository;
use App\Infrastucture\BaseRepository\IBaseRepository;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class BaseModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
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
