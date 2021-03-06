@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task</div>

                <div class="panel-body">
                    
                    <form  action="{{url('edit',$task->id)}}" method="post"  class="form-horizontal">
                        {{ csrf_field() }}
                     <input type="hidden" name="_method" value="patch">

                        <!-- Task title -->
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Task Title</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="title" class="form-control" value="{{$task->title}}">
                                   @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Task body/desc -->
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Task Body</label>
                            <div class="col-sm-6">
                            <textarea type="textarea" name="body" id="body" class="form-control">{{$task->body}}</textarea>
                               @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Task status -->
                        <div class="form-group select-group" >
                                <label for="status" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-6">
                                <select class="form-control" name="status" id="status">
                                    <option>{{$task->status}}</option>
                                    <option value="started">started</option>
                                    <option value="in-progress">in-progress</option>
                                    <option value="completed">completed</option>
                                    
                                </select>
                                </div>
                        </div>
                        
                        <!-- Task priority -->
                        <div class="form-group select-group" >
                                <label for="priority" class="col-sm-3 control-label">Priority</label>
                                <div class="col-sm-6">
                                <select name="priority" class="form-control" id="priority" >
                                    <option>{{$task->priority}}</option>
                                    <option value="started">low-priority</option>
                                    <option value="in-progress">medium-priority</option>
                                    <option value="high-priority">high-priority</option>
                                </select>
                                </div>
                        </div>
                        <!-- Due Date-->
                        <div class="form-group select-group" >
                                <label for="due_date" class="col-sm-3 control-label">Due Date</label>
                                <div class="col-sm-6">
                                <input type="date" name="due_date" id="due_date" class="form-control"  value="{{$task->due_date}}"> 
                                   @if ($errors->has('due_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('due_date') }}</strong>
                                    </span>
                                @endif
                                
                              </div>
                        </div>
                         <div class="form-group select-group" >
                                <label for="assign_to" class="col-sm-3 control-label" >Assign_to</label>
                                 <div class="col-sm-6">
                                <select class="form-control" name="assign_to" >
                                    <option>{{$task->assign_to}}</option>
                                     @foreach($items as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                   
                            </select>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    <i class="fa fa-plus-circle"></i> Update Task</a>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection