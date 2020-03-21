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

    <div class="form-group">
    <label for="message">
        <strong>Edit Message:</strong>
        <textarea name="message" id="message" cols="30" rows="10">{{ $tweet->message }}</textarea>
    </label>
    </div>

    <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Update Tweet">
    </div>
</form>
@endsection
