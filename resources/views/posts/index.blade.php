@extends('layouts.app')

@section('content')
        <h1>Questions</h1>
        @foreach($posts as $key => $value)
            <a href="/questions/{{ $value->id }}">{{ $value->question }}</a><br>   
        @endforeach
@endsection
