<?php


namespace App\Repositories\API\V1;


interface TransactionRepositoryInterface
{
    public function find($id);

    public function store($attributes);

    public function storeTransactionAndUpdateWalletAmount($attributes);
}
