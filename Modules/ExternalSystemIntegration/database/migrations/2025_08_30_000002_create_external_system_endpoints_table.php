<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('external_system_endpoints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('external_system_id')->constrained('external_systems')->onDelete('cascade');
            $table->string('name');
            $table->string('endpoint');
            $table->enum('http_method', ['GET', 'POST', 'PUT', 'DELETE']);
            $table->boolean('auth_required')->default(true);
            $table->json('payload_schema')->nullable();
            $table->json('response_schema')->nullable();
            $table->string('version')->default('v1');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('external_system_endpoints');
    }
};