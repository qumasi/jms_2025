<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // https://judg.moj.gov.ye/
        // https://nwidart.com/laravel-modules/v6/introduction
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            // موضوع الشكوى
            $table->string('complaint_subject');
            // تفاصيل الشكوى
            $table->text('complaint_details');
            // تاريخ الشكوى
            $table->date('complaint_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
