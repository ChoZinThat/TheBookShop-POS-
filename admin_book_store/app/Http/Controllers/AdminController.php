<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
        //admin info direct page
        public function adminInfo(){
            $admin = User::find(Auth::user()->id);
            return view('admin.admin_info.profile',compact('admin'));
        }
        //admin info update
        public function adminInfoUpdate(Request $request){
            $this->validateAdminData($request);
            $updateData = $this->getAdminData($request);


            if($request->hasFile('image')){
                $oldData = User::find(Auth::user()->id);
                $oldPhoto = $oldData->photo;

                if($oldPhoto != null){
                    Storage::delete('public/'.$oldPhoto);
                }

                $newPhoto = uniqid().$request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public',$newPhoto);
                $updateData['photo'] = $newPhoto;

            }

            User::where('id',Auth::user()->id)->update($updateData);

            return redirect()->route('admin#info')->with(['success' => "Admin's account updated successfully!"]);
        }



        //direct change password page
        public function passwordChangePage(){
            return view('admin.admin_info.password');
        }

        //change password
        public function changePassword(Request $request){
            $this->validatePassord($request);
            $db_password = Auth::user()->password;

            if(Hash::check($request->adminOldPassword, $db_password)){
                $newPassword = $request->adminNewPassword;
                $updatePassword = Hash::make($newPassword);
                User::where('id',Auth::user()->id)->update(['password'=>$updatePassword]);

                return redirect()->route('admin#changePWpage')->with(['updateSuccess' => "Password Updated Successfully!"]);
            }else{
                return redirect()->route('admin#changePWpage')->with(['fail' => "Old Password doesn't not match!Try Again"]);
            }
        }

        //admin direct list page
        public function adminList(){
            $admins = User::where('role',"admin")->get();
            return view('admin.admin_info.adminList',compact('admins'));
        }

        //admin search
        public function adminSearchname(Request $request){
            $admins = User::where('name','Like','%'.$request->adminName.'%')
                      ->where('role','admin')
                      ->get();
            return view('admin.admin_info.adminList',compact('admins'));
        }

        //admin list delete
        public function adminDelete($id){
            User::where('id',$id)->delete();
            return redirect()->route('admin#listPage');
        }

        //admin list detail
        public function adminDetail($id){
            $admin = User::where('id',$id)->first();
            return view('admin.admin_info.profile',compact('admin'));
        }

        //admin change role
        public function adminChangeRole($id){
            User::where('id',$id)->update(['role' => 'user']);

            return redirect()->route('admin#listPage');
        }

        //validate admin password
        private function validatePassord($request){
            Validator::make($request->all(),[
                'adminOldPassword' => 'required|min:4|max:12',
                'adminNewPassword' => 'required|min:4|max:12',
                'adminConfirmPassword' => 'required|min:4|max:12|same:adminNewPassword',
            ])->validate();
        }

        //validate admin data
        private function validateAdminData($request){
            Validator::make($request->all(),[
                'image' => 'mimes:png,jpg,jpeg,jfif,webp|file',
                'adminName' => 'required|min:3',
                'adminEmail' => 'required',
                'adminPhone' => 'required|min:9|max:15',
                'adminAddress' => 'required|min:3|max:15'
            ])->validate();
        }

        //get data for update admin account
        private function getAdminData($request){
            return [
                'name' => $request->adminName,
                'email' => $request->adminEmail,
                'phone' => $request->adminPhone,
                'address' => $request->adminAddress,
                'updated_at' => Carbon::now()
            ];
        }
}
