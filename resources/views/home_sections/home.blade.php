@extends('layouts.app')

@section('content')
    <h1 class="align-center">{{ $post->question }}</h1>
    <p class="align-center"><i>{{ $post->answer }}</i></p>
    @foreach($homeSections as $homeSection)<div class="col-12"><div class="col-12-border"><h2>{{ $homeSection }}</h2>@foreach($homeSection->posts as $child)<p><a href="/questions/{{ $child->id }}">{{ $child->question }}</a><br>{{ $child->answer }}</p>@endforeach<p><a href="topics/{{ $homeSection->id }}">More</a></p></div></div>@endforeach
@endsection

