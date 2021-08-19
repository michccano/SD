<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    protected $fillable = ["access_token", "refresh_token"];
}
