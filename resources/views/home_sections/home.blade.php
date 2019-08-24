@extends('layouts.app')

@section('content')
    <h1 class="align-center">{{ $post->question }}</h1>
    <p class="align-center"><i>{{ $post->answer }}</i></p>
    @foreach($homeSections as $homeSection)<div class="col-12"><div class="col-12-border"><h2>{{ $homeSection }}</h2>@foreach($post->posts as $child)<p><a href="/questions/{{ $child->id }}">{{ $child->question }}</a><br>{{ $child->answer }}</p>@endforeach</div></div>@endforeach
@endsection

