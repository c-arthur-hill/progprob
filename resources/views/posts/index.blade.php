@extends('layouts.app')

@section('content')
<div class="col-1">
        <h1 class="align-center">Questions</h1>
        @foreach($posts as $key => $value)
            <a href="/questions/{{ $value->id }}">{{ $value->question }}</a><br>   
        @endforeach
</div>
@endsection
