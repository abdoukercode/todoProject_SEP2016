<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer;


use App\Http\Requests\UserregRequest;
use App\Http\Requests;

class regRequestController extends Controller
{
     public function create()
    {
        return view('auth.registrationRequest');
    }

    public function store(UserregRequest $request)
    {
            $name =$request->get('name');
            $email =$request->get('email');
            $password= $request->get('password');

            $data=[
            'name'=>$name,
            'email'=>$email,
            'password'=>$password ];

         
          
        Mail::send('auth.emails.regreqmail', $data , function($message) use ($data)
    {
    $message->to($data['email'], $data['name'])->subject('Registration Request');
        
        
    });

    return view('auth.sendRequest', [
            'name'=>$name,
            'email'=>$email,
            ]);
      

    }
}
