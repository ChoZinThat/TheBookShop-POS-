<?php

namespace App\Http\Controllers\Api;

use App\Models\BookWriter;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WriterController extends Controller
{
    //get category data
    public function getAuthorData(){
        $writers = BookWriter::get();

        return response()->json(['author' => $writers]);
    }

    //search by author
    public function searchByAuthor(Request $request){
        $books = Book::where('author_id',$request->key)->get();
        return response()->json(['books' => $books , 'status' => 'success']);
    }
}
