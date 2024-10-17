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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->string('appointment_no')->nullable();
            $table->string('appointment_date')->nullable();
            $table->time('appointment_time')->nullable();
            $table->string('doctor_id')->nullable();

            // $table->unsignedBigInteger('doctor_id');
            // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');

            $table->string('patient_name')->nullable();
            $table->string('patient_phone')->nullable();
            $table->string('total_fee')->nullable();
            $table->string('paid_amount')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
