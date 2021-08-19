<?php

namespace App\Services\Api;

use App\Models\ApiToken;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class ApiService implements IApiService
{
    // So Was working on the api auth system. and its complete. first see wjhat it was like before
    // in each request, new token get generated
    // now it generates one time for next 24 hours. and speed will be double than previous method
    /**
     * Todo: Work on refresh token
     */
    // -- in front end
    // try getting key from local storage -> on error,->(1. no key) make auth request -> store the key in local storage
    // try request -> on un auth error -> make auth request -> store new key
    //--  in back end
    // if it is auth req -> chq if long lived token available
    //          no -> via main credentials - get token, store in db, send back token
    //          yes -> send back token
    //


    /**
     * @return false|String
     */
    public function checkTokenAvailable()
    {
        $token = ApiToken::query()->first();
        // check token get not null
        if ($token) {
            // TODO: compare if token has enough time
            $now = Carbon::now();
            $age = $now->diff($token->updated_at)->format('%H');
            // token age is less than 22 hours?
            if ((int)$age < 22) {
                return $token->access_token;
            }
        }
        return false;
    }

    public function getNewToken()
    {
        try {
            $response = Http::post('http://35.175.135.183/oauth/token', [
                'username' => 'sdodds@sportsdata.com',
                'password' => 'sdodds2021',
                'grant_type' => 'password',
                'client_id' => '93b7a5b0-4374-4092-9d0c-cb516a995182',
                'client_secret' => 'V4s2EA64ZTvlcVnP1HZNZGE7Hwq6B6VNsdQwLMBZ'
            ]);

            if ($response->status() == 200) {
                $response = $response->Json();
                $this->storeNewToken($response);
                return $response['access_token'];
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Todo: error message wise response
            return false;
        }
    }

    private function storeNewToken($token)
    {
        ApiToken::query()->updateOrCreate(
            ['id' => 1],
            ['access_token' => $token['access_token'], 'refresh_token' => $token['refresh_token']]
        );
    }
}
