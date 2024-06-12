<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'qty',
        'order_code',
        'total_price',
        'delivery_id'
    ];
}
