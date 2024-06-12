<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //admin side-------------------------------------------------------------
    //contact List

    public function contactListPage(){

        $contact = Contact::select('contacts.*','users.*')
                    ->when(request('key'),function($query){
                    $query->where('name','like','%'.request('key').'%');})
                    ->leftJoin('users','contacts.user_id','users.id')
                    ->paginate(3);

        $contact->appends(request()->all());
        return view('admin.contact.contactList',compact('contact'));
    }

    public function deleteMessage($id){
        Contact::where('id',$id)->delete();
        return back()->with(['messageDelete'=> 'User Message deleted successfully!']);
    }


}
