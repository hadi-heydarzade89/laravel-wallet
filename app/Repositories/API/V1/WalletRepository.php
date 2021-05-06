<?php


namespace App\Repositories\API\V1;

use App\Models\Wallet;
use App\Repositories\BaseRepository;


class WalletRepository extends BaseRepository implements WalletRepositoryInterface
{
    public function __construct(Wallet $model)
    {
        parent::__construct($model);
    }

    public function find($id)
    {
        return $this->model->where('user_id', $id);
    }
}
