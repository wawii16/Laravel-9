<?php

namespace App\Helpers;

class ApiHelpers
{
    public static function successResponse($data, $message = null)
    {
        return response()->json([
            'success' => true,
            'message' => 'Success to fetch data',
            'data' => $data
        ]);
    }

    public static function errorResponse($message, $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => 'Failed to fetch data',
            'data' => null
        ], $status);
    }
}
