<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('birth_date');
            $table->string('cpf', 25)->unique();
            $table->string('rg', 25)->nullable();
            $table->string('phone', 20);
            $table->string('email', 150)->unique();
            $table->text('address');
            $table->string('gender', 20);
            $table->string('marital_status', 20)->nullable();
            $table->string('blood_type', 5)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('patients');
    }
};

