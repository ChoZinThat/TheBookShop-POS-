<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //user login
    public function loginUser(Request $request){
        $userData = User::where('email',$request->email)->first();

        if(isset($userData)){
            if(Hash::check($request->password, $userData->password)){
                $data = [
                    'user' => $userData,
                    'token' => $userData->createToken(time())->plainTextToken
                ];
                return response()->json($data);
            }
            else{
                return response()->json([
                    'user'=> null,
                    'token' => null,
                ]);
            }
        }
        else{
            return response()->json([
                'user'=> null,
                'token' => null,
                'message'=>'Email no match']);
        }
    }

    //register user
    public function registerUser(Request $request){
        if($request->password = $request->confirmPassword){
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user'
            ];

            User::create($data);

            $user = User::where('email',$request->email)->first();

            return response()->json([
                'user' => $user,
                'token' => $user->createToken(time())->plainTextToken
            ]);

        }
        else{
            return response()->json([
                'user'=> null,
                'token' => null,
                'message'=>'Email no match']);
        }

    }

    //get user info
    public function getUserInfo(Request $request){
        $userInfo = User::where('id',$request->user_id)->first();
        return response()->json(['userInfo' =>$userInfo]);
    }
}
