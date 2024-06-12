<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\BookWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    //direct book list page
    public function bookPage(){
        $bookList = Book::get();
        $categories = Category::get();
        $author = BookWriter::get();
        return view('admin.book.bookList',compact('bookList'));
    }

    //direct create book page
    public function createBookPage(){
        $categories = Category::get();
        $writers = BookWriter::get();
        return view('admin.book.createBook',compact('categories','writers'));
    }

    //create book
    public function bookCreate(Request $request){
        $this->validateCreateData($request);

        $data = $this->bookData($request);

        //prepaer to store book photo in publics
        if($request->hasFile('bookImage')){
            $newPhoto = uniqid().$request->file('bookImage')->getClientOriginalName();
            $request->file('bookImage')->storeAs('public',$newPhoto);
            $data['image'] = $newPhoto;
        }

        Book::create($data);

        return redirect()->route('book#list');
    }

    //delete book
    public function bookDelete($id){
        Book::where('book_id',$id)->delete();

        return redirect()->route('book#list')->with(['deleteSuccess' => 'One selected book deleted successfully']);
    }

    //book edit page
    public function editPage($id){
        $categories = Category::get();
        $writers = BookWriter::get();
        $book = Book::where('book_id',$id)->first();
        return view('admin.book.editBook',compact('book','categories','writers'));
    }

    //book update
    public function update(Request $request){
        $this->validateCreateData($request);
        $updateData = $this->bookData($request);

        if($request->hasFile('bookImage')){
            $oldData = Book::where('book_id',$request->id)->first();
            $oldImage = $oldData->image;

            if($oldImage != null){
                Storage::delete('public/'.$oldImage);
            }

            $newImage = uniqid().$request->file('bookImage')->getClientOriginalName();
            $request->file('bookImage')->storeAs('public',$newImage);
            $updateData['image'] = $newImage;
        }

        Book::where('book_id',$request->id)->update($updateData);

        return redirect()->route('book#list')->with(['updateSuccess' => 'Book Updated Successfully']);
    }

    //search book
    public function searchBook(Request $request){
        $result = Book::where('name','Like','%'.$request->bookSearch.'%')
                  ->orWhere('book_description','Like','%'.$request->bookSearch.'%')
                  ->get();

        $bookList = $result;
        $categories = Category::get();
        $author = BookWriter::get();

        return view('admin.book.bookList',compact('bookList','categories','author'));
    }



    //validate create data
    private function validateCreateData($request){
        Validator::make($request->all(),[
            "bookName" => "required|min:1|max:100",
            "writer" => "required|not_in:0",
            "category" => "required|not_in:0",
            "description" => "required|min:5|max:150",
            "bookImage" => 'mimes:png,jpg,jpeg,jfif,webp|file',
            "bookPrice" => "required",
            "releaseDate" => "required|date",
        ])->validate();
    }

    //data for create
    private function bookData($request){
        return [
            'name' => $request->bookName,
            'book_description' => $request->description,
            'category_id' => $request->category,
            'author_id' => $request->writer,
            'released_date' => $request->releaseDate,
            'price' => $request->bookPrice
        ];
    }
}
