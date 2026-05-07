<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPengembalian;

class DetailPengembalianSeeder extends Seeder
{
    public function run(): void
    {
        DetailPengembalian::create([
            'pengembalian_id' => 1,
            'produk_id' => 1,
            'qty' => 1,
            'harga' => 3500,
            'subtotal' => 3500
        ]);
    }
}