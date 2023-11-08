<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function jsonSuccess($message = null, $data = null, $status = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data,
            'statusCode' => $status,
        ];

        return response()->json($response, $status);
    }

    public static function jsonError($message = null, $status = 400)
    {
        $response = [
            'success' => false,
            'message' => $message,
            'status' => $status,
        ];

        return response()->json($response, $status);
    }
}
