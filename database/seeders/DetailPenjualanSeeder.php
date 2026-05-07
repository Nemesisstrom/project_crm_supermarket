<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPenjualan;

class DetailPenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DetailPenjualan::create([
            'penjualan_id' => 1,
            'product_id' => 1,
            'qty' => 1,
            'price' => 3500,
            'subtotal' => 3500
        ]);

        DetailPenjualan::create([
            'penjualan_id' => 1,
            'produk_id' => 2,
            'qty' => 1,
            'harga' => 5000,
            'subtotal' => 5000
        ]);
    }
}