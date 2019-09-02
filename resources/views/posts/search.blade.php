@extends('layouts.app')

@section('content')
<div class="col-1">
        <h1 class="align-center">Search Results</h1>
        @foreach($results as $key => $value)
            <a href="/questions/{{ $value->id }}">{{ $value->question }}</a><br>   
        @endforeach
</div>
@endsection
