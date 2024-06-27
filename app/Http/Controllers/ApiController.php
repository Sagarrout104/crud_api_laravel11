<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{

    protected function successResponse($data, $message = 'success', $status = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }

    protected function errorMessage($message = 'error', $status = 404)
    {
        return response()->json([
            'message' => $message,
        ], $status);
    }
}
