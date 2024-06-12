<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminOrder extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'order_code',
        'delivery_id',
        'total_price'
    ];
}
