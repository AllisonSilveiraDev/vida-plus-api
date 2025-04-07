<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('healthcare_professionals');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('unit_id')->constrained('healthcare_units');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('status_id')->constrained('appointment_status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
