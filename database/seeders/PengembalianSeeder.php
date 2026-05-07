<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengembalian;

class PengembalianSeeder extends Seeder
{
    public function run(): void
    {
        Pengembalian::create([
            'penjualan_id' => 1,
            'customer_id' => 1,
            'tanggal' => now(),
            'status' => 'pending',
            'total' => 3500
        ]);
    }
}