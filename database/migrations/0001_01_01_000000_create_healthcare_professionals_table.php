<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('healthcare_professionals', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('license_number', 25)->unique();
            $table->string('cpf', 25)->unique();
            $table->string('rg', 25)->nullable();
            $table->string('phone', 20);
            $table->string('email', 120)->unique();
            $table->text('address');
            $table->string('gender', 50);
            $table->foreignId('professional_type_id')->constrained('professional_types');
            $table->string('specialty', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('healthcare_professionals');
    }
};

