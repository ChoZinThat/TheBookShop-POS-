<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
    public function categoryListPage(){
        $categoryList = Category::get();
        return view('admin.categeory.category_list',compact('categoryList'));
    }

    //category create
    public function createCategory(Request $request){
        $this->validateData($request);
        $category = [
            'category_name' => $request->title,
            'category_description' => $request->description,
            'created_at' => Carbon::now()
        ];

        Category::create($category);

        return redirect()->route('category#list');
    }

    //category delete
    public function deleteCategory($id){
        Category::where('category_id',$id)->delete();
        return redirect()->route('category#list');
    }

    //category edit
    public function editPage($id){
        $category = Category::where('category_id',$id)->first();
        $categoryList = Category::get();
        return view('admin.categeory.update',compact('category','categoryList'));
    }

    //update category
    public function updateCategory(Request $request){
        $this->validateData($request);
        $updateData = [
            'category_name' => $request->title,
            'category_description' => $request->description,
            'updated_at' => Carbon::now()
        ];

        Category::where('category_id',$request->id)->update($updateData);

        return redirect()->route('category#list');
    }

    //search category
    public function searchCategory(Request $request){
        $key = $request->categorySearch;
        $categoryList = Category::orWhere('category_name','Like','%'.$key.'%')
                  ->orWhere('category_description','Like','%'.$key.'%')
                  ->get();

        return view('admin.categeory.category_list',compact('categoryList','key'));
    }

    //validate category data
    private function validateData($request){
        Validator::make($request->all(),[
            'title' => 'required|min:3|max:30',
            'description' => 'required|min:5|max:150'
        ])->validate();
    }
}
