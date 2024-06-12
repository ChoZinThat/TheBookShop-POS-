<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //direct user list page
    public function listPage(){
        $users = User::where('role','user')->get();
        return view('user.UserInfo.UserList',compact('users'));
    }

     //user list delete
     public function userDelete($id){
        User::where('id',$id)->delete();
        return redirect()->route('user#listPage');
    }

    //user list detail
    public function userDetail($id){
        $user = User::where('id',$id)->first();
        return view('user.user_info.profile',compact('user'));
    }

    //user change role
    public function userChangeRole($id){
        User::where('id',$id)->update(['role' => 'admin']);

        return redirect()->route('user#listPage');
    }

    //user search
    public function userNameSearch(Request $request){
        $users = User::where('name','Like','%'.$request->userName.'%')
                 ->where('role','user')
                 ->get();
        return view('user.UserInfo.UserList',compact('users'));
    }
}
