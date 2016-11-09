@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>
                    
                    <br>
                    <p>Your Laravel version is : <strong>{{ $curent_version }}</strong></p>
                    <br><br>
                    
                    <h2>Year from Custom Helpers : {{ \App\Helpers\Utils::getDate() }}</h2>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
