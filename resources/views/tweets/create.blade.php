@extends('layout')

@section('title')
Create Tweet Form
@endsection
@section('content')
<p>Fill out this form to create a Tweet!</p>

@include('command.errors')
<form method="post" action="{{ route('tweets.store') }}">
    @csrf
    {{-- ^^^ Cross-site request forgery protection --}}
    <div class="form-group">

     <label for="message">
         <strong>Create a Message:</strong>
         <textarea name="message" id="message" cols="30" rows="10"></textarea>
     </label>
     </div>

     <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Publish Tweet">
     </div>
     
</form>
@endsection
