@extends('layouts.app')

@section('content')
    <h1>Create Home Section</h1>
    {{ Form::Model($homeSection, array('route' => array('topics.update', $homeSection->id), 'files'=>true, 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        <div>
        <div>
            {{ Form::label('image') }}
            {{ Form::file('image') }}
        </div>
        <div>
            @foreach($posts as $post_object)
                {{ Form::checkbox('posts[]', $post_object->id) }}
                {{ $post_object->question }}
            @endforeach
        </div>
        <div>
            <button type="submit">Create Home Section</button>
        </div>
    </form>
@endsection
