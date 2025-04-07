<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointment_status', function (Blueprint $table) {
            $table->id();
            $table->string('descriptive_id', 100);
            $table->string('name', 100);
            $table->string('description', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointment_status');
    }
};
