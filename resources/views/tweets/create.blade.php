@extends('layout')

@section('title')
Create Tweet
@endsection
@section('content')


@include('command.errors')
<form method="post" action="{{ route('tweets.store') }}">
    @csrf
    {{-- ^^^ Cross-site request forgery protection --}}
    <div class="form-group">
     <label for="message">
         <strong>Create a Tweet</strong>
         <textarea name="message" id="message" cols="30" rows="5"></textarea>
     </label>
     
     </div>
     <div class="form-group">
     <input type="submit" class="btn btn-warning" value="Publish Tweet">
     </div>
</form>
@endsection
<div id="app">
        <tweet-create-form submission-url="{{ route ('tweets.store') }}" >
            @csrf
        </tweet-create-form>
        <Giphy />
 </div>