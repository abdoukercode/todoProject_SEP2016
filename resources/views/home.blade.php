@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to  TodoList Application</div>

                <div class="panel-body">
                   
                        {{-- <h3 class="title-tasks-page"> Welcome to  TodoList Application</h3> --}}
                        <div class="alert alert-success sub-heading" role="alert"><b class="dash">Dashboard</b>
                            <ul class="dash_ul">
                                <li><a href="#"><i class="fa fa-check-square" aria-hidden="true"></i>Done</a></li>
                                <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i>In-Progress</a></li>
                                <li><a href="{{url('/new')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>New Task</a></li>
                            </ul>
                        </div>
                         
                        <div style="float:left;" >
                            <h3 style="padding-top: 20px" class="task-title">Your Tasks</h3>
                            <ul class ="list-group">
                            @foreach($tasks as $task)
                           
                                <section class="col-md-12 " >
                                    <article class="panel panel-default task-article">
                                        <div class="panel-title " >
                                            {{$task->title}}
                                        </div>
                                        <div class="panel-body task-panel-body " >
                                            {{$task->body}}
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="owner item">
                                                <span style="font-weight:bold">Owner</span>: <span style="color:blue;font-weight:bold">{{ App\User::find($task->owner_id)->name}}</span>
                                           </div>
                                            <div>
                                                    <span style="font-weight: bold">Due-Date</span> : {{$task->due_date}}
                                            </div class="item">
                                            <div class="item">
                                                    <span style="font-weight: bold">Status</span> : {{$task->status}}
                                            </div >
                                            <div class="item">
                                                    @if($task->assign_to !=null)
                                                    <span style="font-weight: bold">AssignedTo</span> : {{$task->assign_to}}
                                                    @endif
                                            </div>
                                            <div class="edit-delete item" >
                                               <a href="{{url('edit',$task->id)}}" ><i class="fa fa-pencil fa-2x" aria-hidden="true" ></i></a>
                                                <a href="{{url('/delete',$task->id)}}"><i (click)="onDelete()" class="fa fa-btn fa-trash fa-2x"></i></a>
                                            </div>
                                        </footer>
                                    </article>
                                </section>

                            @endforeach
                            </ul>
                        </div>
                    </br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
