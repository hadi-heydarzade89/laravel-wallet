<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\BaseController;
use App\Http\Requests\TransactionRequest;
use App\Repositories\API\V1\CurrencyRepository;
use App\Repositories\API\V1\TransactionRepositoryInterface;
use App\Repositories\API\V1\WalletRepositoryInterface;
use Illuminate\Http\Client\Request;


class APITransactionController extends BaseController
{
    private $transactionRepository;

    private $walletRepository;

    private $currencyRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        WalletRepositoryInterface $walletRepository,
        CurrencyRepository $currencyRepository
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->walletRepository = $walletRepository;
        $this->currencyRepository = $currencyRepository;
    }

    public function show($id)
    {
        return $this->response($this->transactionRepository->find($id)->get());
    }

    public function store(TransactionRequest $request)
    {
        $attributes = $request->all();
        $attributes['status'] = 'confirm';
        $attributes['currency_id'] = $this->currencyRepository->find($attributes['currency_id'])->get()[0]->id;
        $this->transactionRepository->store($attributes);

        $amount = $this->walletRepository->find((int)$attributes['user_id'])->get()[0]->amount;
        if ($attributes['type'] !== 'deposit') {
            $attributes['amount'] = (-1 * $attributes['amount']);
        }

        $attributes['amount'] = $attributes['amount'] + $amount;
        unset($attributes['type']);
        unset($attributes['status']);
        $this->walletRepository->update($attributes, $attributes['user_id']);
    }
}
