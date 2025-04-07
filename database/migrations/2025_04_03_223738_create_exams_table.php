<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('healthcare_professionals');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('unit_id')->constrained('healthcare_units');
            $table->string('name', 100);
            $table->dateTime('scheduled_date');
            $table->dateTime('performed_date');
            $table->text('result')->nullable();
            $table->foreignId('status_id')->constrained('exam_status');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('exams');
    }
};
