@extends('layout')

@section('title')
Edit Tweet
@endsection
@section('content')
<p>Use this form to edit your tweet.</p>
@include('partials.errors')
<form method="post" action="{{ route('tweets.update', $tweet->id) }}">
    @csrf
    @method('PATCH')
    {{-- ^^^ Cross-site request forgery protection --}}
    <label for="message">
        <strong>Input a Message:</strong>
        <textarea name="message" id="message" cols="30" rows="10">{{ $tweet->message }}</textarea>
    </label>
    {{--<label for="author">
        <strong>Author Name:</strong>
        <input type="text" name="author" id="author" value="{{ $tweet->author }}">
    </label>--}}
    <input type="submit" value="Update Tweet">
</form>
@endsection
