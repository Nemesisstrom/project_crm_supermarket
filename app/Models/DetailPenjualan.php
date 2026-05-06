<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $fillable = ['penjualan_id', 'product_id', 'qty', 'harga', 'subtotal'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'product_id');
    }

}
