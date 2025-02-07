<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RankingRepositoryInterface;
use App\Repositories\Eloquent\RankingRepository;
use App\Repositories\Interfaces\MovementRepositoryInterface;
use App\Repositories\Eloquent\MovementRepository;
use App\Repositories\Interfaces\PersonalRecordRepositoryInterface;
use App\Repositories\Eloquent\PersonalRecordRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RankingRepositoryInterface::class, RankingRepository::class);
        $this->app->bind(MovementRepositoryInterface::class, MovementRepository::class);
        $this->app->bind(PersonalRecordRepositoryInterface::class, PersonalRecordRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
