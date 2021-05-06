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

            'data' => $data,
            'message' => '',
            'status' => true,
        ];
    }

    private function failed($data)
    {
        return [
            'data' => '',
            'message' => 'empty result',
            'status' => false,
        ];
    }
}
