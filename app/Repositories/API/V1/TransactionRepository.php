<?php


namespace App\Repositories\API\V1;


use App\Models\Transaction;
use App\Repositories\BaseRepository;


class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }

    public function find($id)
    {
        return $this->model->where('user_id', $id);
    }
}
