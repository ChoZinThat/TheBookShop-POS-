<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'book_description',
        'category_id',
        'author_id',
        'image',
        'released_date',
        'price'
    ];
}
