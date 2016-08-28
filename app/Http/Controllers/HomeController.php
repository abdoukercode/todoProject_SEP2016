<?php

namespace App\Http\Controllers;
use Auth;
use App\Task;
use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user();
        /*$user=User::all();*/

        
         $tasks= $user->tasks;
        /*$tasks =Task::all();*/
       /* dd($tasks);
        die();*/
        return view('home', [
            'tasks'=> $tasks,
            'user'=>$user

        ]);
    }
    public function getNew() {
        return view('new');

    }
    public function postNew() {
        
    }
}
