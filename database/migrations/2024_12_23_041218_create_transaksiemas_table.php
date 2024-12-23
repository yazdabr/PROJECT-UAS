<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksiemas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produkemas_id')->constrained('produkemas')->onDelete('cascade');
            $table->foreignId('personal_id')->constrained()->onDelete('cascade');
            $table->decimal('quantity', 8, 2); // Jumlah dalam gram
            $table->decimal('total_price', 15, 2); // Total harga
            $table->string('transaction_photo')->nullable(); // Path bukti transaksi
            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksiemas');
    }
};
