<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{

    protected function response($data, $code, $message = '')
    {
        if (!$data->isEmpty()) {
            return $this->success($data, $code, $message);
        }
        return $this->failed($data, $message);
    }

    private function success($data, $code, $message = '')
    {
        return [

            'data' => $data,
            'message' => $message,
            'status' => true,
            'code' => $code
        ];
    }

    private function failed($data, $message = '')
    {
        return [
            'data' => '',
            'message' => $message,
            'status' => false,
            'code' => Response::HTTP_NOT_FOUND,
        ];
    }
}
