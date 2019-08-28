@extends('layouts.app')

@section('content')
        <h1>Home Sections</h1>
        @foreach($homeSections as $key => $value)
            <a href="/topics/{{ $value->id }}/edit">{{ $value->name }}</a><br>   
        @endforeach
@endsection
