<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')
                  ->constrained('penjualan')
                  ->cascadeOnDelete();

            $table->foreignId('customer_id')
                  ->constrained('customer')
                  ->cascadeOnDelete();

            $table->date('date');
            $table->text('reason')->nullable();
            $table->integer('total_return');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
