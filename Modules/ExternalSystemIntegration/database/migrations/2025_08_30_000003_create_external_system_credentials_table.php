<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('external_system_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('external_system_id')->constrained('external_systems')->onDelete('cascade');
            $table->enum('auth_type', ['api_key', 'oauth2', 'jwt', 'basic_auth', 'custom']);
            $table->json('credentials');
            $table->dateTime('token_expiry')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('external_system_credentials');
    }
};