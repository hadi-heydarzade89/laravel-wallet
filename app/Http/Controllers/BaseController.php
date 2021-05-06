<?php

namespace App\Http\Controllers;


use App\Services\ResponseServiceInterface;
use function PHPUnit\Framework\isEmpty;


class BaseController extends Controller
{
    protected $responseService;


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
            'status' => false,
            'message' => "empty result",
        ];
    }
}
