<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Published On:') !!}
    {!! Form::input('date', 'published_at', date('m/d/Y'), ['class' => 'form-control', 'placeholder' => 'MM/DD/YYYY']) !!}
</div>


<div class="form-group">
    {!! Form::submit($submitButtonName, ['class' => 'btn btn-primary']) !!}
</div>

