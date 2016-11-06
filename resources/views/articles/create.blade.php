@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <h2>Create Article</h2>

            @include('articles.errors')

            {!! Form::open(['url' => 'articles']) !!}

            @include('articles.form', ['submitButtonName' => 'Add the Article'])

            {!! Form::close() !!}


        </div>
        
    </div>
</div>
@endsection

