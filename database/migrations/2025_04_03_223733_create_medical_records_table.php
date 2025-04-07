<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained('medical_appointments');
            $table->text('notes');
            $table->text('diagnosis');
            $table->text('requested_exams');
            $table->foreignId('prescription_id')->nullable()->constrained('prescriptions');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('medical_records');
    }
};
