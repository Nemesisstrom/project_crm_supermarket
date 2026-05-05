<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public function details() {
    return $this->hasMany(DetailPenjualan::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
