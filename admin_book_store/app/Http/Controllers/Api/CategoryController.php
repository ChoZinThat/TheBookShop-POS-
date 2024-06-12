<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //get category data
    public function getCategoryData(){
        $categories = Category::get();

        return response()->json(['category' => $categories]);
    }
}
