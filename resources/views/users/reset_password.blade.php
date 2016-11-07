@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password for user : <strong>{{ $user->username }}</strong> 
                    <a href="{{ url('users') }}" style="float: right;"> Users List</a>
                    <span style="float: right;margin: 0px 10px;">|</span>
                    <a href="{{ url("users/$user->users_id/edit") }}" style="float: right;">Edit User</a> 
                </div>
                <div class="panel-body">

                    @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                     
                    <!--<form class="form-horizontal" role="form" method="PATCH" action="{{ url('/users', $user->id) }}">-->
                    {!! Form::open(['method' => 'PATCH', 'url' => url('/users/'.$user->users_id.'/reset_password'), 'class' => 'form-horizontal']) !!}
                   
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                        
                    <!--</form>-->
                    {!! Form::close() !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

