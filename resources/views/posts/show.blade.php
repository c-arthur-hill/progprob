@extends('layouts.app')

@section('content')
    <h1 class="align-center">{{ $post->question }}</h1>
    <p class="align-center"><i>{{ $post->answer }}</i></p>
    @for($i=0; $i<12; $i++)<div class="col-12"><div class="col-12-border">@foreach($post->posts as $child)<p><a href="/questions/{{ $child->id }}">{{ $child->question }}</a><br>{{ $child->answer }}</p>@endforeach</div></div>@endfor
@endsection

