<?php

namespace App\Services\Api;

interface IApiService
{
    public function checkTokenAvailable();

    public function getNewToken();
}
