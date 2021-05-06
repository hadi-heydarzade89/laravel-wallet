<?php

namespace App\Providers;

use App\Repositories\API\V1\CurrencyRepository;
use App\Repositories\API\V1\CurrencyRepositoryInterface;
use App\Repositories\API\V1\TransactionRepository;
use App\Repositories\API\V1\TransactionRepositoryInterface;
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
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
    }
}
