<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    public function product() {
    return $this->belongsTo(Produk::class);
}
}
