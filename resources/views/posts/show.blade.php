@extends('layouts.app')

@section('content')
    <h1>{{ $post->question }}</h1>
    <h2>{{ $post->answer }}</h2>
    @foreach($post->posts as $child)
        <a href="/questions/{{ $child->id }}">{{ $child->question }}</a><br>
    @endforeach
@endsection

