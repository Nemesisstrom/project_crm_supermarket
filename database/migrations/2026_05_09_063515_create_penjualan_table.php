<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {

            $table->id();

            // FK
            $table->foreignId('customer_id')
                ->constrained('customers')
                ->onDelete('cascade');

            $table->date('tanggal');

            $table->integer('total');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
