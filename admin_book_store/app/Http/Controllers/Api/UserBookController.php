<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserBookController extends Controller
{
    //get books data
    public function booksData(){
        $books = Book::get();
        return response()->json(['books' => $books , 'status' => 'success']);
    }

    //book detail
    public function bookDetail(Request $request){
        $id = $request->book_id;
        $result = Book::select('books.*','book_writers.*','categories.*')
                  ->where('book_id',$id)
                  ->leftJoin('book_writers','books.author_id','book_writers.writer_id')
                  ->leftJoin('categories','books.category_id','categories.category_id')
                  ->first();

        return response()->json(['searchData' => $result]);
    }

    //search book data
    public function userBook(Request $request){
        $key = $request->key;
        if($key == "latest"){
            $books = Book::orderBy('created_at', 'asc')->get();
            return response()->json(['books' => $books , 'status' => 'success']);
        }
        elseif($key == "newest"){
            $books = Book::orderBy('created_at', 'desc')->get();
            return response()->json(['books' => $books , 'status' => 'success']);
        }
        else{
            $books = Book::where('category_id',$request->key)->get();
            return response()->json(['books' => $books , 'status' => 'success']);
        }


    }

    //add to cart in cart table
    public function addToCart(Request $request){

        $data = [
            'book_id' => $request->bookId,
            'user_id' => $request->userId,
            'qty' => $request->orderNumber
        ];

        Cart::create($data);

        return response()->json(['status' => 'success']);
    }
}
