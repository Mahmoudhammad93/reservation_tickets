<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function sendMail(Request $request){
        $msg = new Contact;
        $msg->name = $request['name'];
        $msg->email = $request['email'];
        $msg->phone = $request['phone'];
        $msg->message = $request['message'];

        $msg->save();
        return $msg;
    }

    public function getMails(){
        $mails = Contact::all();
        $new_mails = Contact::where('status',0)->get();
        $count_new_msg = count($new_mails);
        return ['mails'=>$mails, 'count'=>$count_new_msg];
    }

    public function openMail(Request $request){
        $id = $request['id'];
        $row = Contact::where('id',$id)->first();
        $row->status = 1;
        $row->save();
    }

    public function messages(){
        $mails = Contact::all();
        $new_mails = Contact::where('status',0)->get();
        $count_new_msg = count($new_mails);
        return view('admin.messages.index',compact('mails','new_mails','count_new_msg'));
    }
}
