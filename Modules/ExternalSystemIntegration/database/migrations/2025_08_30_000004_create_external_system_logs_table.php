<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('external_system_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('external_system_id')->constrained('external_systems')->onDelete('cascade');
            $table->foreignId('external_system_endpoint_id')->nullable()->constrained('external_system_endpoints')->onDelete('set null');
            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();
            $table->integer('status_code')->nullable();
            $table->enum('status', ['success', 'failed', 'pending', 'retried'])->default('pending');
            $table->text('error_message')->nullable();
            $table->string('requested_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('external_system_logs');
    }
};