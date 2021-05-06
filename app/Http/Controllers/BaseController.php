<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{

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
