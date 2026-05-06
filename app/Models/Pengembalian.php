<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Penjualan;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';

    protected $fillable = [
        'penjualan_id',
        'customer_id',
        'tanggal',
        'status',
        'total'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPengembalian::class, 'pengembalian_id');
    }
}