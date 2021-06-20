<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\UserRepository\UserRepository;
use App\Domain\UserRepository\IUserRepository;
use App\Infrastucture\BaseRepository\BaseRepository;
use App\Domain\EtudiantRepository\EtudiantRepository;
use App\Domain\PersonneRepository\PersonneRepository;
use App\Infrastucture\BaseRepository\IBaseRepository;
use App\Domain\EtudiantRepository\IEtudiantRepository;
use App\Domain\PersonneRepository\IPersonneRepository;
use App\Business\UserService\Queries\UserQueriesService;
use App\Business\UserService\Queries\IUserQueriesService;
use App\Business\UserService\Commands\UserCommandsService;
use App\Business\UserService\Commands\IUserCommandsService;
use App\Business\EtudiantService\Queries\EtudiantQueriesService;
use App\Business\PersonneService\Queries\PersonneQueriesService;
use App\Business\EtudiantService\Queries\IEtudiantQueriesService;
use App\Business\PersonneService\Queries\IPersonneQueriesService;
use App\Business\EtudiantService\Commands\EtudiantCommandsService;
use App\Business\PersonneService\Commands\PersonneCommandsService;
use App\Business\EtudiantService\Commands\IEtudiantCommandsService;
use App\Business\PersonneService\Commands\IPersonneCommandsService;

class BaseModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IEtudiantRepository::class, EtudiantRepository::class);
        $this->app->bind(IPersonneRepository::class, PersonneRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);

        // Services
        $this->app->bind(IPersonneQueriesService::class, PersonneQueriesService::class);
        $this->app->bind(IPersonneCommandsService::class, PersonneCommandsService::class);
        $this->app->bind(IEtudiantQueriesService::class, EtudiantQueriesService::class);
        $this->app->bind(IEtudiantCommandsService::class, EtudiantCommandsService::class);
        $this->app->bind(IUserQueriesService::class, UserQueriesService::class);
        $this->app->bind(IUserCommandsService::class, UserCommandsService::class);
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
