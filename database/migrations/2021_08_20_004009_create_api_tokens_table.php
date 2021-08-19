<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiTokensTable extends Migration
{
    public function up()
    {
        Schema::create('api_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('access_token');
            $table->text('refresh_token');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_tokens');
    }
}
