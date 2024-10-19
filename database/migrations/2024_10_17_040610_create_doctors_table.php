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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('department_id');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->nullable();

            $table->string('department_id')->nullable();
            $table->string('name')->nullable();
            $table->json('practice_day')->nullable();
            $table->string('visiting_hour')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('fee')->nullable();
            $table->json('date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
