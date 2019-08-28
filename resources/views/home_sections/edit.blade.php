@extends('layouts.app')

@section('content')
    <h1>Create Home Section</h1>
    {{ Form::Model($homeSection, array('route' => array('topics.update', $homeSection->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        <div>
        <div>
            <button type="submit">Edit Home Section</button>
        </div>
    </form>
@endsection
