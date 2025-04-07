<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('healthcare_professionals');
            $table->foreignId('patient_id')->constrained('patients');
            $table->date('issue_date');
            $table->text('prescription_text');
            $table->string('prescription_pdf', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
