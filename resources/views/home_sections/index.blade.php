@extends('layouts.app')

@section('content')
    <div class="col-1">
        <h1 class="align-center">Home Sections</h1>
        @foreach($homeSections as $key => $value)
            <a href="/topics/{{ $value->id }}/edit">{{ $value->name }}</a><br>   
        @endforeach
    </div>
@endsection
