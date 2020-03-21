@extends('layout')

@section('title')
Tweets Index
@endsection
@section('content')
@if ( session()->get('success') )
    <div role="alert">
        {{ session()->get('success') }}
    </div>
@endif
<p>List of Tweets:</p>
<ul>
    @foreach($tweets as $tweet)
        <li>
            <h2>{{ $tweet->name }}</h2>
            <p>
                {{ $tweet->message }}
            </p>
            <ul>
                <li>
                    <a href="{{ route('tweets.show', $tweet->id) }}">
                        Read More
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('tweets.edit', $tweet->id) }}">
                            Edit Tweet
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete Tweet">
                        </form>
                    </li>
                @endauth
            </ul>
        </li>
    @endforeach
</ul>
@endsection
