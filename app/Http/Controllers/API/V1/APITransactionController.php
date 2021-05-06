<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\BaseController;
use App\Http\Requests\TransactionRequest;
use App\Repositories\API\V1\CurrencyRepository;
use App\Repositories\API\V1\CurrencyRepositoryInterface;
use App\Repositories\API\V1\TransactionRepositoryInterface;
use App\Repositories\API\V1\UserRepository;
use App\Repositories\API\V1\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class APITransactionController extends BaseController
{
    private $transactionRepository;

    private $currencyRepository;

    private $userRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        CurrencyRepositoryInterface $currencyRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->currencyRepository = $currencyRepository;
        $this->userRepository = $userRepository;
    }

    public function show($id)
    {
        return $this->response($this->transactionRepository->find($id)->get(), Response::HTTP_OK, '');
    }

    public function store(TransactionRequest $request)
    {
        $user = $this->userRepository->find($request->user_id);
        if (!$user->isEmpty()) {
            $attributes = $request->all();
            $attributes['currency_id'] = $this->currencyRepository->findByName($attributes['currency_id'])->id;
            return $this->response(
                $this->transactionRepository->storeTransactionAndUpdateWalletAmount($attributes),
                Response::HTTP_OK, 'Transaction created successfully and wallet updated'
            );
        }
        return $this->response(
            $user,
            Response::HTTP_NOT_FOUND, 'User does not exist'
        );
    }
}
