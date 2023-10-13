<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contactCreate(Request $request){
        $user = new Contact;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->subject = $request->subject;
        $user->message = $request->message;
        $user->date = now();
        $user->save();
        toastr()->success("Form başarıyla gönderildi","Başarılı");
        return redirect()->back();
    }
}
