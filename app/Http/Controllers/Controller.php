<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function clientJsonResponse($message, $data = null): JsonResponse
    {
        return response()->json(['data' => $data, 'message' => $message], Response::HTTP_OK);
    }

    protected function successMessage(): string
    {
        return 'success';
    }
}
