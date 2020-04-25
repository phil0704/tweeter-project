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
         <strong>What's on your mind?</strong>
         <textarea name="message" id="message" cols="30" rows="5"></textarea>
     </label>
     </div>

     <div class="form-group">
     <label for="Image">
     <strong>Select image to upload</strong>
     <br>
     <input type="file" name="image" id="image"> 
     </label> 
 
     <div id="app1">
        <tweet-create-form submission-url="{{ route ('tweets.store') }}" >
            @csrf
        </tweet-create-form>
        <Giphy />
      </div>

     </div>
     <div class="form-group">
     <input type="submit" class="btn btn-warning" value="Publish Tweet">
     </div>
</form>
@endsection
