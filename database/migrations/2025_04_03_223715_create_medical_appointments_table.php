<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('professional_id')->constrained('healthcare_professionals');
            $table->foreignId('unit_id')->constrained('healthcare_units');
            $table->foreignId('schedule_id')->constrained('schedules');;
            $table->foreignId('appointment_type_id')->constrained('appointment_types');
            $table->foreignId('status_id')->constrained('appointment_status');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('medical_appointments');
    }
};
