@extends('layouts.app')

@section('content')
<div class="col-1">
    <h1 class="align-center">Create Home Section</h1>
        {{ Form::Model($homeSection, array('route' => array('topics.update', $homeSection->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        <div>
        <div>
            @foreach($posts as $post_object)
                {{ Form::checkbox('posts[]', $post_object->id) }}
                {{ $post_object->question }}<br>
            @endforeach
        </div>
        <div>
            <button type="submit">Edit Home Section</button>
        </div>
    </form>
</div>
@endsection
