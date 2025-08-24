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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            // start date
            $table->date('start_date');
            // case type
            $table->string('case_type');
            // المحافظة
            $table->string('governorate');
            // اسم المحكمة
            $table->string('court_name');
            // موضوع الدعوى
            $table->string('case_subject');
            // 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
