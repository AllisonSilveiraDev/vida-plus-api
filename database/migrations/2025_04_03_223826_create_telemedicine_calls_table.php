<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('telemedicine_calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained('medical_appointments');
            $table->string('room_url', 255);
            $table->string('token', 255);
            $table->date('date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('telemedicine_calls');
    }
};
