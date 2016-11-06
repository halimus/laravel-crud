@extends('layout.app')

@section('content')

    <h1>Edit : {{ $article->title }}</h1>
    
    @include('articles.errors')

    
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
    
        @include('articles.form', ['submitButtonName' => 'Edit the Article'])
         
    {!! Form::close() !!}
    
    
@stop

