<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPengembalian extends Model
{
     protected $fillable = ['return_id','product_id','qty','price','subtotal'];
}
