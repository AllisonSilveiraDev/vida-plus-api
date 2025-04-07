<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() 
    {
        Schema::create('professional_types', function (Blueprint $table) {
            $table->id();
            $table->string('descriptive_id', 100);
            $table->string('name', 100);
            $table->string('description', 255);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('professional_types');
    }
};

