<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('hospitalizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('unit_id')->constrained('healthcare_units');
            $table->foreignId('bed_id')->constrained('beds');
            $table->foreignId('responsible_professional_id')->constrained('healthcare_professionals');
            $table->dateTime('admission_date');
            $table->dateTime('discharge_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('hospitalizations');
    }
};

