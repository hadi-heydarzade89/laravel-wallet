<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\BaseController;
use App\Http\Requests\TransactionRequest;
use App\Repositories\API\V1\CurrencyRepository;
use App\Repositories\API\V1\TransactionRepositoryInterface;
use App\Repositories\API\V1\WalletRepositoryInterface;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;


class APITransactionController extends BaseController
{
    private $transactionRepository;

    private $currencyRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        CurrencyRepository $currencyRepository
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->currencyRepository = $currencyRepository;
    }

    public function show($id)
    {
        return $this->response($this->transactionRepository->find($id)->get());
    }

    public function store(TransactionRequest $request)
    {
        $attributes = $request->all();
        $attributes['currency_id'] = $this->currencyRepository->findByName($attributes['currency_id'])->id;
        $this->transactionRepository->storeTransactionAndUpdateWalletAmount($attributes);

    }
}
