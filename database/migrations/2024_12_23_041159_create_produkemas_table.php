<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produkemas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('weight', 10, 2)->nullable(); // Berat dalam gram
            $table->decimal('price', 15, 2); // Harga per gram
            $table->string('photo')->nullable(); // Path foto emas
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produkemas');
    }
};
