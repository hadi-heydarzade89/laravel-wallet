<?php


namespace App\Repositories\API\V1;


interface WalletRepositoryInterface
{
    public function find($id);

    public function create($request);

    public function update($request, $id);
}
