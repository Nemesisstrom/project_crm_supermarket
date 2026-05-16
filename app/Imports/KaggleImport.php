<?php

namespace App\Imports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaggleImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Produk([
            'nama_produk' => $row['product_name'] ?? $row['product'] ?? 'Produk',
            'harga'       => $row['sales'] ?? rand(10000, 500000),
            'stok'        => rand(1, 50),
            'currency'    => 'IDR',
        ]);
    }
}