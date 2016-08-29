<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Task;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Input;
Use Validator;
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

        
         /*$tasks= $user->tasks;*/
         $tasks = Task::orderBy('created_at', 'desc')->where('owner_id', $user->id) ->get();
         /*$tasks= $user->tasks;*/
         
        /*$tasks =Task::all();*/
       /* dd($tasks);
        die();*/
        return view('home', [
            'tasks'=> $tasks,
            'user'=>$user

        ]);
    }
    
    public function getNew() {
        $items = User::all(['id', 'name']);
    return view('new', compact('items',$items));
    }


    public function postNew(Request $request) {
    $rules=[
        'title'=> 'required|min:10|max:50',
        'body'=> 'required|min:10|max:255',
            'due_date'=> 'required',
        'status'=> 'required',
        'priority'=> 'required',
    ];
    $validator=Validator::make($request->all(), $rules);

    if ($validator->fails()){
        return Redirect('new')->withErrors($validator)->withInput();
    
    }else{
        $task= new Task;
        $task->title      =   $request->input('title');
        $task->body       =   $request->input('body');
        $task->due_date   =   $request->input('due_date');
        $task->status     =   $request->input('status');
        $task->priority   =   $request->input('priority');

        $task->owner_id= Auth::user()->id;

        $task->save();
        return Redirect('home');
    }
    }
    public function getDelete(Task $item) {
       /* echo get_class($item);
        die();*/
        /*echo $task;
        $task = Task::find($task);
        if(!task){

        }*/

        $item->delete();
        return Redirect('home');
    }

    public function editTask($id){
        $items = User::all(['id', 'name']);
      $task=Task::FindOrFail($id);
    
  
    
    return view('edit',[
        'items'=>$items,
        'task'=>$task]);
    }
    public function updateTask($id){
         $task=Task::FindOrFail($id);
         $task->fill(Input::all());
         $task->save();
         dd($task);
        return redirect('home');

    }
}
