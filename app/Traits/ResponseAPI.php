<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

trait ResponseAPI
{
    /**
     * Send any success response
     *
     * @param mixed $message
     * @param array|object $data
     * @param integer $statusCode
     * @return JsonResponse
     */
    public function success($message, $data, int $statusCode = 200): JsonResponse
    {
        return $this->coreResponse($message, $data, $statusCode);
    }

    /**
     * Core of response
     *
     * @param mixed $message
     * @param array|object $data
     * @param integer $statusCode
     * @param boolean $isSuccess
     * @return JsonResponse
     */
    public function coreResponse($message, $data = null, int $statusCode = 200, bool $isSuccess = true): JsonResponse
    {
        dd($message, $data, $statusCode,  $isSuccess);
        // Check the params
        if (!$message) return response()->json(['message' => 'Message is required'], 500);

        $message = Str::title($message);

        // Send the response

        return response()->json([
            'message' => $message,
            'code' => $statusCode,
            'error' => !$isSuccess,
            'results' => $data,
        ], $statusCode);
    }

    /**
     * Send any error response
     *
     * @param mixed $message
     * @param integer $statusCode
     * @return JsonResponse
     */
    public function error($message, int $statusCode = 500): JsonResponse
    {
        return $this->coreResponse($message, null, $statusCode, false);
    }

    public function errorNotAllowed($message = 'Ammmm! are you okay!! you are not allowed to do this request.',$statusCode = 405): JsonResponse
    {
        return $this->coreResponse($message, null, $statusCode, false);
    }
}
