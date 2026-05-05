<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPengembalian extends Model
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

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function detailPengembalian()
    {
        return $this->hasMany(DetailPengembalian::class);
    }

    
}