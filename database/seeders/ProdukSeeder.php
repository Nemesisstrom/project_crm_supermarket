<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'nama_barang' => 'Indomie Goreng',
            'harga' => 3500,
            'stok' => 100
        ]);

        Produk::create([
            'name_barang' => 'Aqua Botol',
            'harga' => 5000,
            'stok' => 50
        ]);

        Produk::create([
            'nama_barang' => 'Beras 5Kg',
            'harga' => 75000,
            'stok' => 20
        ]);
    }
}
