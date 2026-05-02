<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $fillable = ['penjualan_id','customer_id','date','reason','total_return'];

    public function details(){
        return $this->hasMany(detail_pengembalian::class)
    };
}
