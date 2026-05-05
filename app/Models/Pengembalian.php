<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'detail_pengembalian';

    protected $fillable = [
        'pengembalian_id',
        'produk_id',
        'qty',
        'price',
        'subtotal'
    ];

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
}