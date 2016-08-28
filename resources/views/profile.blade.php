@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px;height:150px; float:left; border-radius:50%; margin-right:25px" alt="">
            <h2>{{$user->name}}'s Profile</h2>
            <form action="/profile" enctype="multipart/form-data" method="POST">
            <label for="">Update Your Profile image</label>
            <input type="file" name="avatar">
             {{ csrf_field() }}
             <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
