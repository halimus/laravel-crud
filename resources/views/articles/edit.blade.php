@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h2>Edit : {{ $article->title }} <a href="{{ url('articles') }}" style="float: right;font-size: 18px;">Articles List</a></h2>

            @include('articles.errors')


            {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

            @include('articles.form', ['submitButtonName' => 'Edit the Article'])

            {!! Form::close() !!}


        </div>

    </div>
</div>
@endsection

