@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to  TodoList Application</div>

                <div class="panel-body">
                   
                        {{-- <h3 class="title-tasks-page"> Welcome to  TodoList Application</h3> --}}
                        <div class="alert alert-success" role="alert"><b class="dash">Dashboard</b>
                            <ul class="dash_ul">
                                <li><a href="#"><i class="fa fa-check-square" aria-hidden="true"></i>Done</a></li>
                                <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i>In-Progress</a></li>
                                <li><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>New Task</a></li>
                            </ul>
                        </div>
                         
                        <div style="float:left;" >
                            <h3 style="padding-top: 20px">Your Tasks</h3>
                            <ul class ="list-group">
                            @foreach($tasks as $task)
                           
                                <section class="col-md-12 ">
                                    <article class="panel panel-default task-article">
                                        <div class="panel-title ">
                                            {{$task->title}}
                                        </div>
                                        <div class="panel-body">
                                            {{$task->body}}
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="owner item">
                                                Owner: <span style="color:blue;font-weight:bold">{{ App\User::find($task->owner_id)->first()->name}}</span>
                                           </div>
                                            <div>
                                                    Due-Date :{{$task->due_date}}
                                            </div class="item">
                                            <div class="item">
                                                    Status :{{$task->status}}
                                            </div >
                                            <div class="item">
                                                    AssignedTo :{{$task->assign_to}}
                                            </div>
                                            <div class="edit-delete item" >
                                               <a href="#"><i class="fa fa-pencil fa-2x" aria-hidden="true" ></i></a>
                                                <a href="#"><i (click)="onDelete()" class="fa fa-btn fa-trash fa-2x"></i></a>
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
