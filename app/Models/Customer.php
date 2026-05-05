<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Nama tabel (opsional, kalau sesuai default bisa dihapus)
    protected $table = 'customers';

    // Field yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];

    // =========================
    // RELASI
    // =========================

    // 1. Customer punya banyak penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    // 2. Customer punya banyak pengembalian (retur)
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}