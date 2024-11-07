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
        Schema::create('treatment_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->longText('patient_concern')->nullable();
            $table->longText('short_term_goals')->nullable();
            $table->longText('long_term_goals')->nullable();
            $table->longText('current_sleeping_patterns')->nullable();
            $table->longText('current_exercise_patterns')->nullable();
            $table->longText('medications')->nullable();
            $table->longText('interventions')->nullable();
            $table->foreignId('doctor_id')->nullable();
            $table->boolean('is_done')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_plans');
    }
};
