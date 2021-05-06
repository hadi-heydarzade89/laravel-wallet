<?php

namespace App\Providers;

use App\Repositories\API\V1\WalletRepository;
use App\Repositories\API\V1\WalletRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
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
        $this->app->bind(BaseRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(WalletRepositoryInterface::class,WalletRepository::class);
    }
}
