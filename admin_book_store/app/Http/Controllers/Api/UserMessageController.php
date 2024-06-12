<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMessageController extends Controller
{

    //   user side----------------------------------------------------
    // contact page

    public function contactSend(Request $request){

        $input = [
            'user_id' => $request->user_id,
            'status' => $request->subject,
            'message' => $request->message,
        ];

       Contact::create($input);

        return response()->json(['status'=>'success']);
    }

}
