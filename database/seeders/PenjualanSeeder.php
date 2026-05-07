<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        Penjualan::create([
            'customer_id' => 1,
            'tanggal' => now(),
            'total' => 8500
        ]);
    }
}