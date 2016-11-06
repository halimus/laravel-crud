@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Article</div>
                <div class="panel-body">

                    @include('articles.errors')

                    {!! Form::open(['url' => 'articles']) !!}

                    @include('articles.form', ['submitButtonName' => 'Add the Article'])

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

