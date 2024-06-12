<?php

namespace App\Http\Controllers;

use App\Models\BookWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class BookWriterController extends Controller
{
    //direct writer list page
    public function WriterListPage(){
        $writerList = BookWriter::get();
        return view('admin.author.author_list',compact('writerList'));
    }

    //create writer
    public function createWriter(Request $request){
        $this->validateName($request);
        $data = [
            'writer_name' => $request->name
        ];

        BookWriter::create($data);

        return redirect()->route('writer#list');
    }

    //delete witer
    public function deleteWriter($id){
        BookWriter::where('writer_id',$id)->delete();

        return redirect()->route('writer#list')->with(['deleteSuccess' => "Writer Deleted successfully!"]);
    }

    //edit direct page
    public function editPage($id){
        $writer = BookWriter::where('writer_id',$id)->first();
        $writerList = BookWriter::get();
        return view('admin.author.author_update',compact('writer','writerList'));
    }

    //update writer
    public function updateWriter(Request $request){

        $this->validateName($request);

        $updateData = [
            'writer_name' => $request->name
        ];

        BookWriter::where('writer_id',$request->id)->update($updateData);

        return redirect()->route('writer#list');
    }

    //search writer name
    public function searchWriter(Request $request){
        $key = $request->WriterSearch;
        $writerList = BookWriter::where('writer_name','Like','%'.$key.'%')->get();

        return view('admin.author.author_list',compact('writerList','key'));
    }


    //validate writer name
    private function validateName($request){
        Validator::make($request->all(),[
            'name' => 'required|min:1|max:50'
        ])->validate();
    }
}
