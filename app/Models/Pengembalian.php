<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
     protected $table = 'returns';
    protected $fillable = ['sale_id','customer_id','date','reason','total_return'];

    public function details(){
        return $this->hasMany(ReturnDetail::class)
    }
}
