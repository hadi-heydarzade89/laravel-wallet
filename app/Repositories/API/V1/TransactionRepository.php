<?php


namespace App\Repositories\API\V1;


use App\Models\Transaction;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{
    private $walletRepository;

    public function __construct(
        Transaction $model,
        WalletRepositoryInterface $walletRepository
    )
    {
        $this->walletRepository = $walletRepository;
        parent::__construct($model);
    }

    public function find($id)
    {
        return $this->model->where('user_id', $id);
    }

    public function store($attributes)
    {
        $this->model->create($attributes);
    }

    public function storeTransactionAndUpdateWalletAmount($attributes)
    {
        DB::transaction(function () use ($attributes) {
            $this->store($attributes);
            $amount = $this->walletRepository->find((int)$attributes['user_id'])->amount;

            if ($attributes['type'] !== 'deposit') {
                $attributes['amount'] = (-1 * $attributes['amount']);
            }
            $attributes['amount'] = $attributes['amount'] + $amount;
            unset($attributes['type']);
            unset($attributes['status']);
           return $this->walletRepository->update($attributes, $attributes['user_id']);

        });

    }
}
