<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\BaseController;
use App\Repositories\API\V1\TransactionRepositoryInterface;

class APITransactionController extends BaseController
{
    private $transactionRepository;
    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function __invoke($id)
    {
        return $this->response($this->transactionRepository->find($id)->get());
    }
}
