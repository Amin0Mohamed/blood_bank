<?php

namespace App\Http\Controllers\Dashboard;

use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactsController extends Controller
{

    public function index()
    {
       $contacts = Contact::all();
       return view('dashboard.contacts.index',compact('contacts'));
    }
    public function edit($id)
    {
        $contact=Contact::findOrFail($id);
        return view('dashboard.contacts.edit',compact('contact'));
    }

    public function replyMessage($id,Request $request)
    {
        $this->validate($request,
            [
                'reply'=>'required',
            ]
        );
        $message = Contact::findOrFail($id);
        Mail::send(new ResetPassword($message,$request->input('reply')));
        return redirect(route('reply-message',['id'=>$message->id]));
    }
}
