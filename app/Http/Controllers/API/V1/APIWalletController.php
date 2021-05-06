<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\BaseController;
use App\Repositories\API\V1\WalletRepositoryInterface;


class APIWalletController extends BaseController
{
    private $wallet;

    public function __construct(WalletRepositoryInterface $wallet)
    {
        $this->wallet = $wallet;
    }

    public function __invoke($id)
    {
        return $this->response($this->wallet->find($id)->get());
    }
}
