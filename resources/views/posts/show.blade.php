@extends('layouts.app')

@section('content')
    <h1 class="align-center">{{ $post->question }}</h1>
    <p class="align-center"><i>{{ $post->answer }}</i></p>
    @foreach($post->posts as $child)<div class="col-12"><div class="col-12-border"><p><a href="/questions/{{ $child->id }}">{{ $child->question }}</a><br>{{ $child->answer }}</p>@endforeach</div></div>
@endsection

