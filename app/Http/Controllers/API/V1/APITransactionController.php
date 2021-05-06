<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\BaseController;
use App\Http\Requests\TransactionRequest;
use App\Repositories\API\V1\CurrencyRepository;
use App\Repositories\API\V1\TransactionRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

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
        return $this->response($this->transactionRepository->find($id)->get(),Response::HTTP_OK,'');
    }

    public function store(TransactionRequest $request)
    {
        $attributes = $request->all();
        $attributes['currency_id'] = $this->currencyRepository->findByName($attributes['currency_id'])->id;
        return $this->response(
            $this->transactionRepository->storeTransactionAndUpdateWalletAmount($attributes),
            Response::HTTP_OK, 'Transaction created successfully and wallet updated'
        );
    }
}
