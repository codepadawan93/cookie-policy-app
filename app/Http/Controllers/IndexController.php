<?php

namespace App\Http\Controllers;

use App\ContactFormSubmission;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /* 
    *    Landing page controller 
    */
    function index()
    {
        return view("index");
    }

    function signup(Request $request)
    {
        dd($request);
        return redirect("/");
    }

    function contactUs(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:1000',
            'email'   => 'required|max:1000',
            'message' => 'required'
        ]);
        
        $name    = $request->get('name');
        $email   = $request->get('email');
        $message = $request->get('message');

        $contactFormSubmission = ContactFormSubmission::create([
            "name"    => $name,
            "email"   => $email,
            "message" => $message
        ]);

        return redirect("/");
    }
}
