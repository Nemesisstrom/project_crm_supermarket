<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\DetailPenjualan;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    protected $fillable = [
        'customer_id',
        'tanggal',
        'total'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION CUSTOMER
    |--------------------------------------------------------------------------
    */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION DETAIL PENJUALAN
    |--------------------------------------------------------------------------
    */
    public function details()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION PENGEMBALIAN
    |--------------------------------------------------------------------------
    */
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
