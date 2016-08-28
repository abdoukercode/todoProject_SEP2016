@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default panel-success">
                <div class="panel-body">
                <img src="/images/puzzle.jpg" style="width:90%; height:180px;  display: block;
    margin: 0 auto; margin-bottom=150px;" >
                       <p style="margin-top:60px; font-weight:bold ;font-style:italic; font-size:15px">
                      
                       Dear {{$name}}
                       Thank you for your registration.

                       Your request is being processsed. A confirmation message will be sent to you at {{$email}} with your credentials !!!!

                       </p>
                       <p style="margin-top:60px; font-weight:bold ;font-style:italic; font-size:15px; color:blue">Can't wait to see you On board !!!</p>
                </div>
                <div class="panel-footer">@todo Team</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection