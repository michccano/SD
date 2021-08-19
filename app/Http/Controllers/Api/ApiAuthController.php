<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\IApiService;

class ApiAuthController extends Controller
{
    private $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function authenticate()
    {
        $available_token = $this->apiService->checkTokenAvailable();
        if ($available_token) {
            return $available_token;
        } else {
            return $this->apiService->getNewToken();
        }
    }
}
