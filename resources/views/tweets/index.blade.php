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
@include('command.errors')
<p>List of Tweets:</p>
  <ul> 
    @foreach($tweets as $tweet)
     <li>
       <div class="card">
          <div class="card-header">
            <h2>
              <img src="#" alt="">
                <a href="{{route('profile.show', $tweet->user->id)}}">
                    {{$tweet->name}}
                </a>
            </h2>
          </div>
            <div class="card-body">
             <p class="card-text">
                {{$tweets->message}}
             </p>
            </div>
    <ul>
      <li>
         <a href="{{route('tweets.show', $tweet->id)}}" class="btn btn-primary">
             Read More
         </a>
      </li>
    @auth
      <li>
    @include('command.likes')
     </li>
      <li>
         <a href="{{route('tweets.edit', $tweet->id)}}" class="btn btn-primary">
            Edit Tweet
         </a>
      </li>
     <li>
        <form action="{{route('tweets.destroy', $tweet->id)}}" method="post">
           @csrf
             @method('DELETE')
             <input type="submit" value="Delete Tweet" class="btn btn-warning">
        </form>
     </li>
     @endauth
   </ul>
 </div>
</li>
@endforeach
</ul>

@endsection
