<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
Use Mail;
use App\Http\Requests;
use Auth;
use Image ;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class UserController extends Controller
{

    public function profile(){
        return view('profile', [
            'user'=> Auth::user(),
        ]);
    }
    public function update_avatar(Request $request) {
        //user avatars upload
        //use package image intervention
        if($request->hasFile('avatar')) {
            $avatar= $request->file('avatar');
            $filename=time() . '.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'. $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

        }
              return view('profile', [
            'user'=> Auth::user()
        ]);

    }

}
