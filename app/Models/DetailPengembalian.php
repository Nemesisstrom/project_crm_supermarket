<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPengembalian extends Model
{
    protected $table = 'detail_pengembalian';

    protected $fillable = [
        'pengembalian_id',
        'product_id',
        'qty',
        'price',
        'subtotal'
    ];

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }

    public function product()
    {
        return $this->belongsTo(Produk::class);
    }
}