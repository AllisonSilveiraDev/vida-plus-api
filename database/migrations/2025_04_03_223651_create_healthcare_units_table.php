<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('healthcare_units', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('cnpj', 20);
            $table->foreignId('type_id')->constrained('unit_types');
            $table->text('address');
            $table->boolean('is_archived')->default(false);
            $table->string('phone', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('healthcare_units');
    }
};
