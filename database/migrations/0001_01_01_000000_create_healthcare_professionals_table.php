<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('healthcare_professionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('professional_type_id')->nullable();
            $table->foreign('professional_type_id')->references('id')->on('professional_types')->onDelete('set null');
            $table->string('license_number', 25)->unique();
            $table->string('cpf', 25)->unique();
            $table->string('rg', 25)->nullable();
            $table->string('phone', 20);
            $table->text('address');
            $table->string('gender', 50);
            $table->boolean('is_validated')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->string('specialty', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('healthcare_professionals');
    }
};

