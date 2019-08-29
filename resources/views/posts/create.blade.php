@extends('layouts.app')

@section('content')
<div class="col-1">
    <h1 clas="align-center">Create Question</h1>
    {{ Form::Model($post, array('route' => array('questions.store', $post->id), 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('question', 'Question') }}
            {{ Form::text('question', null, array('class' => 'form-control')) }}
        <div>
        <div class="form-group">
            {{ Form::label('answer', 'Answer') }}
            {{ Form::text('answer', null, array('class' => 'form-control')) }}
        <div>
        <div>
            <h3>Children</h3>
            @foreach($posts as $post_object)
                {{ Form::checkbox('posts[]', $post_object->id) }}
                {{ $post_object->question }}<br>
            @endforeach
        </div>
        <div>
            <h3>Parents</h3>
            @foreach($posts as $post_object)
                {{ Form::checkbox('parents[]', $post_object->id) }}
                {{ $post_object->question }}<br>
            @endforeach
        </div>
        <div>
            <h3>Home Section</h3>
            @foreach($topics as $topic)
                {{ Form::radio('topic', $topic->id) }}
                {{ $topic->name }}<br>
            @endforeach
        <div>
            <button type="submit">Create Post</button>
        </div>
    </form>
</div>
@endsection
