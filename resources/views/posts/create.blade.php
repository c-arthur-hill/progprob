@extends('layouts.app')

@section('content')
    <h1>Create Question</h1>
    {{ Form::Model($post, array('route' => array('questions.store'), 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('question', 'Question') }}
            {{ Form::text('question', null, array('class' => 'form-control')) }}
        <div>
        <div class="form-group">
            {{ Form::label('answer', 'Answer') }}
            {{ Form::text('answer', null, array('class' => 'form-control')) }}
        <div>
        <div>
            @foreach($posts as $post_object)
                {{ Form::checkbox('posts[]', $post_object->id) }}
                {{ $post_object->question }}
            @endforeach
        </div>
        <div>
            <button type="submit">Create Post</button>
        </div>
    </form>
@endsection
