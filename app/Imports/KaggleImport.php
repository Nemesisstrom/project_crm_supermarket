<?php

namespace App\Imports;

use App\Models\Produk;

use Maatwebsite\Excel\Concerns\ToModel;

class KaggleImport implements ToModel
{
    public function model(array $row)
    {
        return new Produk([

            'nama_produk' => $row[0],

            'harga' => $row[1],

            'stok' => $row[2],

            'currency' => 'IDR'

        ]);
    }
}