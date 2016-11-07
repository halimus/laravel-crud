@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User : <strong>{{ $user->username }}</strong> <a href="{{ url("users/$user->id/edit")}}" style="float: right">Edit</a></div>
                <div class="panel-body">

                    <p>Username : <strong>{{ $user->username }}</strong></p>
                    <p>Email : <strong>{{ $user->email }}</strong></p>
                    <p>Created On : <strong>{{ $user->created_at->format('m/d/Y H:m:s') }}</strong></p>
                 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
