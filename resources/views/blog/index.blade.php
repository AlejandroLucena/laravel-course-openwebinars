@extends('blog.layout')

@section('content')
    @if (count($posts) > 0)
        <h4>List of posts:</h4>
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ url('post', ['id' => $post->id]) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <h4>There are no posts here!</h4>
    @endif
@endsection