<?php

namespace App\Http\Controllers;


use App\Services\ResponseServiceInterface;
use function PHPUnit\Framework\isEmpty;


class BaseController extends Controller
{
    private $responseService;

    public function __construct(ResponseServiceInterface $responseService)
    {
        $this->responseService = $responseService;
    }

    protected function response($data)
    {
        if (!$data->isEmpty()) {
            return $this->success($data);
        }
        return $this->failed($data);
    }

    private function success($data)
    {
        return [
            'status' => true,
            'message' => $data,
        ];
    }

    private function failed($data)
    {
        return [
            'status' => true,
            'message' => "empty result",
        ];
    }
}
